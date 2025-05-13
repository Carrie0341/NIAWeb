<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\EventImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventAdminController extends Controller
{
  // 儲存新活動
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255',
      'event_date' => 'required|date',
      'content' => 'required',
      'cover_image' => 'nullable|image|max:2048',
      'alliance_id' => 'nullable|exists:alliances,id',
      'images.*' => 'nullable|image|max:2048'
    ]);

    // 處理封面圖片
    $coverImagePath = null;
    if ($request->hasFile('cover_image')) {
      $coverImagePath = $request->file('cover_image')->store('events/covers', 'public');
    }

    // 創建活動
    $event = Event::create([
      'title' => $request->title,
      'event_date' => $request->event_date,
      'content' => $request->content,
      'cover_image' => $coverImagePath,
      'alliance_id' => $request->alliance_id,
      'is_active' => $request->has('is_active')
    ]);

    // 處理多張圖片
    if ($request->hasFile('images')) {
      $sortOrder = 0;
      foreach ($request->file('images') as $image) {
        $imagePath = $image->store('events/gallery', 'public');

        EventImage::create([
          'event_id' => $event->id,
          'image_path' => $imagePath,
          'sort_order' => $sortOrder++
        ]);
      }
    }

    return redirect()->route('administrator.events')->with('success', '活動已成功創建');
  }

  // 更新活動
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|max:255',
      'event_date' => 'required|date',
      'content' => 'required',
      'cover_image' => 'nullable|image|max:2048',
      'alliance_id' => 'nullable|exists:alliances,id',
      'images.*' => 'nullable|image|max:2048'
    ]);

    $event = Event::findOrFail($id);

    // 處理封面圖片
    if ($request->hasFile('cover_image')) {
      // 刪除舊圖片
      if ($event->cover_image) {
        Storage::disk('public')->delete($event->cover_image);
      }

      $coverImagePath = $request->file('cover_image')->store('events/covers', 'public');
      $event->cover_image = $coverImagePath;
    }

    // 更新活動
    $event->title = $request->title;
    $event->event_date = $request->event_date;
    $event->content = $request->content;
    $event->alliance_id = $request->alliance_id;
    $event->is_active = $request->has('is_active');
    $event->save();

    // 處理多張圖片
    if ($request->hasFile('images')) {
      $sortOrder = $event->images->max('sort_order') + 1;
      foreach ($request->file('images') as $image) {
        $imagePath = $image->store('events/gallery', 'public');

        EventImage::create([
          'event_id' => $event->id,
          'image_path' => $imagePath,
          'sort_order' => $sortOrder++
        ]);
      }
    }

    return redirect()->route('administrator.events')->with('success', '活動已成功更新');
  }

  // 刪除活動
  public function destroy($id)
  {
    $event = Event::findOrFail($id);

    // 刪除封面圖片
    if ($event->cover_image) {
      Storage::disk('public')->delete($event->cover_image);
    }

    // 刪除所有相關圖片
    foreach ($event->images as $image) {
      Storage::disk('public')->delete($image->image_path);
    }

    // 刪除活動（會自動刪除相關的圖片記錄）
    $event->delete();

    return redirect()->route('administrator.events')->with('success', '活動已成功刪除');
  }

  // 刪除單張活動圖片
  public function deleteImage($id)
  {
    $image = EventImage::findOrFail($id);

    // 刪除實際圖片文件
    Storage::disk('public')->delete($image->image_path);

    // 刪除數據庫記錄
    $image->delete();

    return response()->json(['success' => true]);
  }

  // 更新圖片排序
  public function updateImageOrder(Request $request)
  {
    $request->validate([
      'images' => 'required|array',
      'images.*.id' => 'required|exists:event_images,id',
      'images.*.order' => 'required|integer|min:0'
    ]);

    foreach ($request->images as $imageData) {
      EventImage::where('id', $imageData['id'])->update(['sort_order' => $imageData['order']]);
    }

    return response()->json(['success' => true]);
  }
}
