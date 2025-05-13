@extends('layout.master')

@section('title', 'news')

@section('extra_head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<style>
  .event-header {
    margin-bottom: 30px;
  }

  .event-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .event-date {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 20px;
  }

  .event-content {
    margin-bottom: 40px;
    line-height: 1.8;
  }

  .event-gallery {
    margin-top: 30px;
    margin-bottom: 40px;
  }

  .gallery-item {
    margin-bottom: 15px;
  }

  .gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
    transition: transform 0.3s ease;
  }

  .gallery-item img:hover {
    transform: scale(1.03);
  }

  .event-navigation {
    margin-top: 50px;
    padding-top: 20px;
    border-top: 1px solid #eee;
  }

  .nav-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #f8f9fa;
    border-radius: 5px;
    color: #333;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .nav-link:hover {
    background-color: #e9ecef;
  }

  .nav-disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .img-error {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    color: #666;
    height: 200px;
    border-radius: 5px;
  }
</style>
@endsection

@section('content')
<section class="first">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <a href="{{ route('news') }}" class="btn btn-outline-secondary mb-4">
          <i class="fas fa-arrow-left"></i> 返回活動列表
        </a>

        <div class="event-header">
          <h1 class="event-title">{{ $event->title }}</h1>
          <div class="event-date">
            <i class="far fa-calendar-alt"></i> {{ $event->event_date->format('Y-m-d') }}
            @if($event->alliance)
            <span class="badge badge-primary ml-2">{{ $event->alliance->name }}</span>
            @endif
          </div>
        </div>

        @if($event->cover_image)
        <div class="event-cover mb-4">
          <img src="{{ url('/get-image?path='.$event->cover_image) }}" alt="{{ $event->title }}" class="img-fluid rounded" onerror="this.style.display='none';this.parentNode.innerHTML='<div class=\'img-error\'>圖片無法顯示</div>';">
        </div>
        @endif

        <div class="event-content">
          {!! $event->content !!}
        </div>

        @if($event->images->count() > 0)
        <h3 class="mb-4">活動照片</h3>
        <div class="event-gallery">
          <div class="row">
            @foreach($event->images as $image)
            <div class="col-md-4 col-sm-6 gallery-item">
              <a href="{{ url('/get-image?path='.$image->image_path) }}" data-lightbox="event-gallery" data-title="{{ $event->title }}">
                <img src="{{ url('/get-image?path='.$image->image_path) }}" class="img-fluid" alt="Event Image" onerror="this.style.display='none';this.parentNode.innerHTML='<div class=\'img-error\'>圖片無法顯示</div>';">
              </a>
            </div>
            @endforeach
          </div>
        </div>
        @endif

        <div class="event-navigation">
          <div class="row">
            <div class="col-6 text-left">
              @if($prevEvent)
              <a href="{{ route('news.show', $prevEvent->id) }}" class="nav-link">
                <i class="fas fa-chevron-left"></i> 上一個活動
              </a>
              @else
              <span class="nav-link nav-disabled">
                <i class="fas fa-chevron-left"></i> 上一個活動
              </span>
              @endif
            </div>
            <div class="col-6 text-right">
              @if($nextEvent)
              <a href="{{ route('news.show', $nextEvent->id) }}" class="nav-link">
                下一個活動 <i class="fas fa-chevron-right"></i>
              </a>
              @else
              <span class="nav-link nav-disabled">
                下一個活動 <i class="fas fa-chevron-right"></i>
              </span>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
  lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true
  });

  // 修復內容中的圖片路徑
  document.addEventListener('DOMContentLoaded', function() {
    const contentImages = document.querySelectorAll('.event-content img');
    contentImages.forEach(img => {
      // 檢查是否為相對路徑
      if (img.src.indexOf('/storage/') !== -1) {
        // 轉換為使用 get-image 路由
        const path = img.src.split('/storage/')[1];
        img.src = '{{ url("/get-image?path=") }}' + path;
      }

      // 添加錯誤處理
      img.onerror = function() {
        this.style.display = 'none';
        const errorDiv = document.createElement('div');
        errorDiv.className = 'img-error';
        errorDiv.innerHTML = '圖片無法顯示';
        this.parentNode.insertBefore(errorDiv, this);
      };
    });
  });
</script>
@endsection