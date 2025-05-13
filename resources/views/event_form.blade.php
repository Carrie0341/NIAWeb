@extends('layout.master')

@section('title', 'news')

@section('extra_head')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
  .form-section {
    margin-bottom: 30px;
  }

  .form-section-title {
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
  }

  .image-preview {
    margin-top: 15px;
  }

  .image-preview img {
    max-width: 200px;
    max-height: 150px;
    margin-right: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    padding: 5px;
  }

  .existing-images {
    margin-top: 15px;
  }

  .image-item {
    position: relative;
    display: inline-block;
    margin-right: 15px;
    margin-bottom: 15px;
  }

  .image-item img {
    width: 150px;
    height: 100px;
    object-fit: cover;
    border: 1px solid #ddd;
  }

  .image-item .delete-checkbox {
    position: absolute;
    top: 5px;
    right: 5px;
  }

  .required-field::after {
    content: "*";
    color: red;
    margin-left: 4px;
  }
</style>
@endsection

@section('content')
<section class="first">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1>{{ isset($event) ? '編輯活動' : '新增活動' }}</h1>
          <a href="{{ route('news.manage') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> 返回活動列表
          </a>
        </div>

        @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif

        <form action="{{ isset($event) ? secure_url('news/'.$event->id.'/update') : secure_url('news/store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-section">
            <h3 class="form-section-title">活動資訊</h3>

            <div class="form-group">
              <label for="title" class="required-field">活動標題</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $event->title ?? '') }}" required>
            </div>

            <div class="form-group">
              <label for="event_date" class="required-field">活動日期</label>
              <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date', isset($event) ? $event->event_date->format('Y-m-d') : date('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
              <label for="alliance_id">所屬聯盟</label>
              <select class="form-control" id="alliance_id" name="alliance_id">
                @if(isset($alliances) && count($alliances) > 0)
                @foreach($alliances as $alliance)
                <option value="{{ $alliance->id }}" {{ old('alliance_id', $event->alliance_id ?? '') == $alliance->id ? 'selected' : '' }}>
                  {{ $alliance->name }}
                </option>
                @endforeach
                @endif
                <option value="">無</option>
              </select>
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ old('is_active', $event->is_active ?? true) ? 'checked' : '' }}>
                <label class="custom-control-label" for="is_active">啟用活動</label>
              </div>
            </div>
          </div>

          <div class="form-section">
            <h3 class="form-section-title">活動內容</h3>

            <div class="form-group">
              <label for="content" class="required-field">活動詳細內容</label>
              <textarea class="form-control summernote" id="content" name="content" rows="10" required>{{ old('content', $event->content ?? '') }}</textarea>
            </div>
          </div>

          <div class="form-section">
            <h3 class="form-section-title">封面圖片</h3>

            <div class="form-group">
              <label for="cover_image">上傳封面圖片</label>
              <input type="file" class="form-control-file" id="cover_image" name="cover_image" accept="image/*">
              <!-- <small class="form-text text-muted">建議尺寸：1200 x 800 像素，最大檔案大小：2MB</small> -->

              @if(isset($event) && $event->cover_image)
              <div class="image-preview mt-3">
                <p>當前封面圖片：</p>
                <img src="{{ url('/get-image?path='.$event->cover_image) }}" alt="封面圖片">
              </div>
              @endif
            </div>
          </div>

          <div class="form-section">
            <h3 class="form-section-title">活動相關圖片</h3>

            <div class="form-group">
              <label for="event_images">上傳活動圖片（可多選）</label>
              <input type="file" class="form-control-file" id="event_images" name="event_images[]" accept="image/*" multiple>
              <!-- <small class="form-text text-muted">最多可上傳 10 張圖片，每張最大檔案大小：2MB</small> -->
            </div>

            @if(isset($event) && $event->images->count() > 0)
            <div class="existing-images">
              <p>現有圖片（勾選要刪除的圖片）：</p>

              @foreach($event->images as $image)
              <div class="image-item">
                <img src="{{ url('/get-image?path='.$image->image_path) }}" alt="活動圖片">
                <div class="delete-checkbox">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="delete_image_{{ $image->id }}" name="delete_images[]" value="{{ $image->id }}">
                    <label class="custom-control-label" for="delete_image_{{ $image->id }}">刪除</label>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            @endif
          </div>

          <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary btn-lg">
              <i class="fas fa-save"></i> {{ isset($event) ? '更新活動' : '創建活動' }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js"></script>

<script>
  $(document).ready(function() {
    $('.summernote').summernote({
      height: 300,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });

    // 處理封面圖片壓縮
    $('#cover_image').on('change', function(e) {
      const file = e.target.files[0];
      if (!file) return;

      // 顯示正在處理的提示
      const statusMsg = $('<div class="alert alert-info mt-2">正在處理圖片，請稍候...</div>');
      $(this).after(statusMsg);

      new Compressor(file, {
        quality: 0.6, // 壓縮質量，0.6 通常是個不錯的平衡點
        maxWidth: 1200,
        maxHeight: 800,
        success(result) {
          // 創建新的 File 對象
          const compressedFile = new File([result], file.name, {
            type: result.type,
          });

          // 替換原始文件
          const dataTransfer = new DataTransfer();
          dataTransfer.items.add(compressedFile);
          e.target.files = dataTransfer.files;

          // 更新狀態消息
          statusMsg.removeClass('alert-info').addClass('alert-success')
            .text(`圖片已壓縮: ${(file.size / 1024 / 1024).toFixed(2)}MB → ${(compressedFile.size / 1024 / 1024).toFixed(2)}MB`);
        },
        error(err) {
          console.error(err.message);
          statusMsg.removeClass('alert-info').addClass('alert-danger')
            .text('圖片壓縮失敗，請嘗試選擇較小的圖片');
        },
      });
    });

    // 處理多張活動圖片壓縮
    $('#event_images').on('change', function(e) {
      const files = e.target.files;
      if (!files.length) return;

      // 顯示正在處理的提示
      const statusMsg = $('<div class="alert alert-info mt-2">正在處理圖片，請稍候...</div>');
      $(this).after(statusMsg);

      const compressedFiles = [];
      let processedCount = 0;

      // 處理每一張圖片
      Array.from(files).forEach(file => {
        new Compressor(file, {
          quality: 0.6,
          maxWidth: 1200,
          maxHeight: 800,
          success(result) {
            // 創建新的 File 對象
            const compressedFile = new File([result], file.name, {
              type: result.type,
            });

            compressedFiles.push(compressedFile);
            processedCount++;

            // 當所有圖片都處理完成時
            if (processedCount === files.length) {
              // 替換原始文件
              const dataTransfer = new DataTransfer();
              compressedFiles.forEach(file => {
                dataTransfer.items.add(file);
              });
              e.target.files = dataTransfer.files;

              // 更新狀態消息
              statusMsg.removeClass('alert-info').addClass('alert-success')
                .text(`${files.length} 張圖片已壓縮完成`);
            }
          },
          error(err) {
            console.error(err.message);
            processedCount++;

            if (processedCount === files.length) {
              statusMsg.removeClass('alert-info').addClass('alert-warning')
                .text('部分圖片壓縮失敗，請嘗試選擇較小的圖片');
            }
          },
        });
      });
    });
  });
</script>
@endsection