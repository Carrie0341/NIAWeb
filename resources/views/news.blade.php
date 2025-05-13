@extends('layout.master')

@section('title', 'news')

@section('extra_head')
<style>
    .event-list {
        margin-top: 30px;
    }

    .event-item {
        padding: 20px;
        border-bottom: 1px solid #eee;
        transition: background-color 0.3s ease;
    }

    .event-item:hover {
        background-color: #f9f9f9;
    }

    .event-date {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 5px;
    }

    .event-title {
        font-size: 1.4rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .event-excerpt {
        color: #555;
        margin-bottom: 15px;
    }

    .read-more {
        color: #007bff;
        text-decoration: none;
    }

    .read-more:hover {
        text-decoration: underline;
    }

    .pagination {
        justify-content: center;
        margin-top: 40px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .admin-buttons {
        display: flex;
        gap: 10px;
    }

    .btn-manage {
        height: 45px;
        border-radius: 22.5px;
        background-color: #122f51;
        align-items: center;
        display: flex;
        justify-content: center;
        color: #fff;
    }
</style>
@endsection

@section('content')
<section class="first">
    <div class="container">
        <div class="page-header">
            <h1>最新消息</h1>
            <div class="admin-buttons">
                <a href="{{ route('news.manage') }}" class="btn-manage px-3">
                    <i class="fas fa-cog mr-1"></i> 管理活動
                </a>
            </div>
        </div>

        <div class="filters">
            <label class="alliance-title">選擇預顯示的聯盟</label>
            <select class="alliance-filter" onchange="filterByAlliance(this.value)">
                <option value="all" {{ !isset($currentAlliance) ? 'selected' : '' }}>全部</option>
                @foreach($alliances as $alliance)
                <option value="{{ $alliance->id }}" {{ isset($currentAlliance) && $currentAlliance->id == $alliance->id ? 'selected' : '' }}>
                    {{ $alliance->name }}
                </option>
                @endforeach
            </select>
        </div>

        @if($events->isEmpty())
        <div class="text-center py-5">
            <h3>目前沒有活動</h3>
            <p>請稍後再查看，或選擇其他聯盟</p>
        </div>
        @else
        <div class="event-list">
            @foreach($events as $event)
            <div class="event-item">
                <div class="event-date">{{ $event->event_date->format('Y-m-d') }}</div>
                <h3 class="event-title">{{ $event->title }}</h3>
                <div class="event-excerpt">
                    {!! Str::limit(strip_tags($event->content), 200) !!}
                </div>
                <a href="{{ route('news.show', $event->id) }}" class="read-more">查看更多 &raquo;</a>
            </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $events->links() }}
        </div>
        @endif
    </div>
</section>

<script>
    function filterByAlliance(allianceId) {
        if (allianceId === 'all') {
            window.location.href = "{{ route('news') }}";
        } else {
            window.location.href = "{{ url('news/alliance') }}/" + allianceId;
        }
    }
</script>
@endsection