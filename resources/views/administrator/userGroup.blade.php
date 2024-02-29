@extends('administrator.index')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>名稱</th>
            <th>電話</th>
            <th>信箱</th>
            <th>類型</th>
            <th>部門</th>
            <th>公司名</th>
            <th>職稱</th>
            <th>註冊時間</th>
            <th>審查狀態</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->user_info->type}}</td>
            <td>{{$user->user_info->department}}</td>
            <td>{{$user->user_info->companyName}}</td>
            <td>{{$user->user_info->jobTitle}}</td>
            <td>{{$user->Created_at}}</td>
            <td>
                @if($user->Verified == "true")
                    <span class="btn btn-xs btn-success disabled">審查完成</span>
                @else
                    <a href="{{ route('administrator.approved',['id' => $user->id])}}">
                        <button class="btn btn-xs btn-info">同意申請</button>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="9">
            {{ $users->render() }}
        </td>
    </tr>
    </tfoot>
</table>
@endsection
