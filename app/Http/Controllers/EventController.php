<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\EventImage;
use App\Model\Alliance;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
  // 創建必要的表
  public function createTables()
  {
    // 保持原有代碼不變
  }

  // 顯示所有活動列表
  public function index()
  {
    try {
      // 檢查表格是否存在
      if (!Schema::hasTable('events')) {
        return view('news', [
          'events' => collect([]),
          'alliances' => collect([]),
          'error' => '活動資料表尚未創建，請點擊下方按鈕設置資料庫',
          'setupUrl' => url('/TEST?action=createEventTables')
        ]);
      }

      $events = Event::where('is_active', true)
        ->orderBy('event_date', 'desc')
        ->paginate(9);

      $alliances = Alliance::all();

      return view('news', [
        'events' => $events,
        'alliances' => $alliances
      ]);
    } catch (\Exception $e) {
      // 記錄錯誤
      \Log::error('News page error: ' . $e->getMessage());

      return view('news', [
        'events' => collect([]),
        'alliances' => collect([]),
        'error' => '載入活動時發生錯誤：' . $e->getMessage(),
        'setupUrl' => url('/TEST?action=createEventTables')
      ]);
    }
  }

  // 顯示特定聯盟的活動
  public function byAlliance($id)
  {
    try {
      $events = Event::where('alliance_id', $id)
        ->where('is_active', true)
        ->orderBy('event_date', 'desc')
        ->paginate(9);

      $alliances = Alliance::all();
      $currentAlliance = Alliance::findOrFail($id);

      return view('news', [
        'events' => $events,
        'alliances' => $alliances,
        'currentAlliance' => $currentAlliance
      ]);
    } catch (\Exception $e) {
      return redirect()->route('news')->with('error', '找不到該聯盟或聯盟功能尚未啟用。');
    }
  }

  // 顯示單個活動詳情
  public function show($id)
  {
    try {
      $event = Event::findOrFail($id);

      // 獲取前一個和後一個活動（用於導航）
      $prevEvent = Event::where('is_active', true)
        ->where('event_date', '<=', $event->event_date)
        ->where('id', '!=', $event->id)
        ->orderBy('event_date', 'desc')
        ->orderBy('id', 'desc')
        ->first();

      $nextEvent = Event::where('is_active', true)
        ->where('event_date', '>=', $event->event_date)
        ->where('id', '!=', $event->id)
        ->orderBy('event_date', 'asc')
        ->orderBy('id', 'asc')
        ->first();

      return view('event_detail', [
        'event' => $event,
        'prevEvent' => $prevEvent,
        'nextEvent' => $nextEvent
      ]);
    } catch (\Exception $e) {
      return redirect()->route('news')->with('error', '找不到該活動或活動功能尚未啟用。');
    }
  }

  // 活動管理頁面
  public function manage()
  {
    $events = Event::orderBy('event_date', 'desc')->paginate(20);
    return view('event_manage', [
      'events' => $events
    ]);
  }

  // 創建活動頁面
  public function create()
  {
    $alliances = Alliance::all();
    return view('event_form', [
      'alliances' => $alliances,
      'event' => null
    ]);
  }

  // 保存新活動
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'event_date' => 'required|date',
      'content' => 'required|string',
      'alliance_id' => 'nullable|exists:alliance,id',
      'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'event_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    try {
      DB::beginTransaction();

      // 創建活動
      $event = new Event();
      $event->title = $request->title;
      $event->event_date = $request->event_date;
      $event->content = $request->content;
      $event->alliance_id = $request->alliance_id;
      $event->is_active = $request->has('is_active');

      // 處理封面圖片
      if ($request->hasFile('cover_image')) {
        $coverImage = $request->file('cover_image');
        $coverImagePath = $coverImage->store('event_covers', 'public');
        $event->cover_image = $coverImagePath;
      }

      $event->save();

      // 處理活動圖片
      if ($request->hasFile('event_images')) {
        $sortOrder = 1;
        foreach ($request->file('event_images') as $image) {
          $imagePath = $image->store('event_images', 'public');

          $eventImage = new EventImage();
          $eventImage->event_id = $event->id;
          $eventImage->image_path = $imagePath;
          $eventImage->sort_order = $sortOrder++;
          $eventImage->save();
        }
      }

      DB::commit();

      return redirect()->route('news.manage')->with('success', '活動創建成功！');
    } catch (\Exception $e) {
      DB::rollBack();
      return back()->with('error', '活動創建失敗：' . $e->getMessage())->withInput();
    }
  }

  // 編輯活動頁面
  public function edit($id)
  {
    try {
      $event = Event::findOrFail($id);
      $alliances = Alliance::all();

      return view('event_form', [
        'event' => $event,
        'alliances' => $alliances
      ]);
    } catch (\Exception $e) {
      return redirect()->route('news.manage')->with('error', '找不到該活動');
    }
  }

  // 更新活動
  public function update(Request $request, $id)
  {
    try {
      $request->validate([
        'title' => 'required|string|max:255',
        'event_date' => 'required|date',
        'content' => 'required|string',
        'alliance_id' => 'nullable', // 移除 exists:alliances,id 驗證
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        'event_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
      ]);

      DB::beginTransaction();

      $event = Event::findOrFail($id);
      $event->title = $request->title;
      $event->event_date = $request->event_date;
      $event->content = $request->content;
      $event->alliance_id = $request->alliance_id;
      $event->is_active = $request->has('is_active');

      // 處理封面圖片
      if ($request->hasFile('cover_image')) {
        // 刪除舊圖片
        if ($event->cover_image) {
          Storage::disk('public')->delete($event->cover_image);
        }

        $coverImage = $request->file('cover_image');
        $coverImagePath = $coverImage->store('event_covers', 'public');
        $event->cover_image = $coverImagePath;
      }

      $event->save();

      // 處理活動圖片
      if ($request->hasFile('event_images')) {
        $sortOrder = $event->images->count() + 1;
        foreach ($request->file('event_images') as $image) {
          $imagePath = $image->store('event_images', 'public');

          $eventImage = new EventImage();
          $eventImage->event_id = $event->id;
          $eventImage->image_path = $imagePath;
          $eventImage->sort_order = $sortOrder++;
          $eventImage->save();
        }
      }

      // 處理需要刪除的圖片
      if ($request->has('delete_images')) {
        foreach ($request->delete_images as $imageId) {
          $image = EventImage::find($imageId);
          if ($image && $image->event_id == $event->id) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
          }
        }
      }

      DB::commit();

      return redirect()->route('news.manage')->with('success', '活動更新成功！');
    } catch (\Exception $e) {
      DB::rollBack();

      // 添加更詳細的錯誤處理
      $errorMessage = $e->getMessage();
      \Log::error('Event update error: ' . $errorMessage);

      if (strpos($errorMessage, 'entity too large') !== false || strpos($errorMessage, '413') !== false) {
        $errorMessage = '上傳的圖片太大，請壓縮後再上傳（建議每張圖片不超過 2MB）';
      } elseif (strpos($errorMessage, 'alliances') !== false) {
        $errorMessage = '聯盟資料表不存在，請先創建資料表或聯繫管理員';
      }

      return back()->with('error', '活動更新失敗：' . $errorMessage)->withInput();
    }
  }

  // 刪除活動
  public function delete($id)
  {
    try {
      $event = Event::findOrFail($id);

      // 刪除封面圖片
      if ($event->cover_image) {
        Storage::disk('public')->delete($event->cover_image);
      }

      // 刪除所有相關圖片
      foreach ($event->images as $image) {
        Storage::disk('public')->delete($image->image_path);
      }

      // 刪除關聯的圖片記錄
      EventImage::where('event_id', $event->id)->delete();

      // 刪除活動
      $event->delete();

      return redirect()->route('news.manage')->with('success', '活動已成功刪除！');
    } catch (\Exception $e) {
      return redirect()->route('news.manage')->with('error', '刪除活動失敗：' . $e->getMessage());
    }
  }
  // 添加這個方法來獲取圖片
  public function getImage(Request $request)
  {
    try {
      $path = $request->query('path');

      // 安全檢查：確保路徑不包含 ..
      if (strpos($path, '..') !== false) {
        abort(403, '不允許的路徑');
      }

      $fullPath = storage_path('app/public/' . $path);

      if (!file_exists($fullPath)) {
        abort(404, '找不到圖片');
      }

      $type = File::mimeType($fullPath);
      $content = File::get($fullPath);

      return response($content)->header('Content-Type', $type);
    } catch (\Exception $e) {
      abort(500, '圖片載入失敗');
    }
  }
  // 添加一個方法來檢查和創建符號連結
  public function checkStorage()
  {
    try {
      // 檢查符號連結是否存在
      if (!file_exists(public_path('storage'))) {
        // 創建符號連結
        \Artisan::call('storage:link');
        return "符號連結已創建成功！";
      }

      // 檢查目錄權限
      $publicStoragePath = public_path('storage');
      $appPublicPath = storage_path('app/public');

      if (!is_writable($publicStoragePath)) {
        return "警告：public/storage 目錄沒有寫入權限！";
      }

      if (!is_writable($appPublicPath)) {
        return "警告：storage/app/public 目錄沒有寫入權限！";
      }

      // 檢查圖片是否存在
      $testImagePath = $appPublicPath . '/event_images';
      if (!file_exists($testImagePath)) {
        mkdir($testImagePath, 0755, true);
        return "event_images 目錄已創建！";
      }

      return "儲存設置正常！";
    } catch (\Exception $e) {
      return "錯誤：" . $e->getMessage();
    }
  }
}
