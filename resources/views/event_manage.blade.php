@extends('layout.master')

@section('title', 'news')

@section('extra_head')
<style>
  .event-table {
    margin-top: 30px;
  }

  .action-buttons {
    white-space: nowrap;
  }

  .action-buttons .btn {
    margin-right: 5px;
  }

  .status-active {
    color: green;
  }

  .status-inactive {
    color: red;
  }

  .event-title-cell {
    max-width: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
</style>
@endsection

@section('content')
<section class="first">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1>活動管理</h1>
      <a href="{{ route('news.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> 新增活動
      </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif

    <div class="table-responsive event-table">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>標題</th>
            <th>日期</th>
            <th>聯盟</th>
            <th>狀態</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          @foreach($events as $event)
          <tr>
            <td>{{ $event->id }}</td>
            <td class="event-title-cell">{{ $event->title }}</td>
            <td>{{ $event->event_date->format('Y-m-d') }}</td>
            <td>{{ $event->alliance ? $event->alliance->name : '無' }}</td>
            <td>
              @if($event->is_active)
              <span class="status-active">啟用</span>
              @else
              <span class="status-inactive">停用</span>
              @endif
            </td>
            <td class="action-buttons">
              <a href="{{ route('news.show', $event->id) }}" class="btn btn-sm btn-info" target="_blank">
                <i class="fas fa-eye"></i> 查看
              </a>
              <a href="{{ route('news.edit', $event->id) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> 編輯
              </a>
              <a href="#" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $event->id }}, '{{ $event->title }}')">
                <i class="fas fa-trash"></i> 刪除
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="pagination justify-content-center">
      {{ $events->links() }}
    </div>
  </div>
</section>

<!-- 確認刪除對話框 -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">確認刪除</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        您確定要刪除活動 "<span id="eventTitle"></span>" 嗎？此操作無法撤銷。
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <a href="#" id="confirmDeleteBtn" class="btn btn-danger">確認刪除</a>
      </div>
    </div>
  </div>
</div>

<script>
  function confirmDelete(id, title) {
    document.getElementById('eventTitle').textContent = title;
    // 修改為使用完整路徑
    document.getElementById('confirmDeleteBtn').href = "{{ url('news') }}/" + id + "/delete";
    $('#deleteModal').modal('show');
  }
</script>
@endsection