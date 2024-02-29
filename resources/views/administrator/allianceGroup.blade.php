@extends('administrator.index')

@section('extra_script')
<script>
    const alliance = {!! $alliances->toJson() !!}

</script>
@endsection

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>聯盟名稱</th>
            <th class="text-center">動作</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alliances as $alliance)
        <tr>
            <td>{{ $alliance->name }}</td>
            <td class="text-center">
                <a href="{{ route('administrator.removeAlliance',['id' => $alliance->id])}}">
                    <button class="btn btn-danger btx-sm">移除聯盟</button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <form method="POST" action="{{ route('administrator.addAlliance') }}" id="add">
            <td class="d-flex justify-between">
                <input type="text" class="form-control" form="add" name="alliance" placeholder="聯盟名稱"/>
                {{ csrf_field() }}
            </td>
            <td class="text-center">
                <button class="btn btn-primary" form="add" id="basic-addon2">新增聯盟</button>
            </td>
            </form>
        </tr>
        <tr>
            <td colspan="2">
                {{ $alliances->render() }}
            </td>
        </tr>
    </tfoot>
</table>
@endsection
