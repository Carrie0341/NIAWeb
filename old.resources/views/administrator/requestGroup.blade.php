@extends('administrator.index')

@section('extra_script')
<script>
window.addEventListener('load' , () => {
    const requests = [...document.getElementsByClassName("requests")];
    alliancesFilter.addEventListener('change' , filter);

    function filter(e)
    {
        if(e.target.value == -1)
            location.href = `{{ route('administrator.request') }}`;

        else
            location.href = `{{ route('administrator.request.alliance') }}/${e.target.value}`;
    }
});

function toggleContent(self , target)
{
    self.dataset.open = self.dataset.open ^ 1;
    if(self.dataset.open == true)
    {
        self.textContent = "關閉內容";
        document.getElementById(target).classList.remove("d-none");
    }

    else
    {
        self.textContent = "查看內容";
        document.getElementById(target).classList.add("d-none");
    }
}

</script>
@endsection

@section('content')

<div>
    <select id="alliancesFilter">
        <option value="-1">顯示全部</option>
        @foreach($alliances as $alliance)
        <option @if($allianceID == $alliance->id) selected @endif value="{{$alliance->id}}">{{$alliance->name}}</option>
        @endforeach
    </select>
</div>
@if($requests->count() == 0)
<div class="card requests"  style="margin:2rem 0;">
    <div class="card-header d-flex justify-content-between text-info">
        <div class="d-inline-block">
            該聯盟尚無相關提案
            <span class="text-muted" style="font-size:0.5em"></span>
        </div>
    </div>
</div>
@endif

@foreach($requests as $request)
    <div class="card requests" data-alliance='{{$request->belongTo}}' style="margin:2rem 0;">
        <div class="card-header d-flex justify-content-between text-info">
            <div class="d-inline-block">
                <span style="font-size:1.15em">
                {{$request->request}}
                @if($request->accept == 0)
                    <span class="text-danger">
                        (已拒絕)
                    </span>
                @endif
                </span>
                <span class="text-muted" style="font-size:0.5em"> {{$request->company}} {{$request->belongTo}} </span>
            </div>
            <button class="btn btn-sm btn-info px-5" data-open="0" onclick="toggleContent(this , 'card-body-{{$request->id}}' )">查看內容</button>
        </div>
        <div class="d-none" id="card-body-{{$request->id}}">
            <div class="card-body">
                <p>{{$request->describe}}</p>

                <p class="text-muted" style="margin:0px 0.2rem"><small>聯絡人:  <span class="pl-1">{{ $request->name }}</span></small></p>
                <p class="text-muted" style="margin:0px 0.2rem"><small>聯絡電話:<span class="pl-1">{{ $request->phone }}</span></small></p>
                <p class="text-muted" style="margin:0px 0.2rem"><small>聯絡信箱:<span class="pl-1">{{ $request->email }}</span></small></p>
                <p class="text-muted" style="margin:0px 0.2rem"><small>申請時間:<span class="pl-1">{{ $request->created_at }}</span></small></p>
            </div>

            <div class="text-right pb-2 pr-4">

                <a href="{{route('administrator.toggleReq', ['id' => $request->id])}}">
                    @if($request->accept == 1)
                        <button class="btn btn-outline-danger px-3">
                            拒絕該提案
                        </button>
                    @else
                        <button class="btn btn-outline-success px-3">
                            同意該提案
                        </button>
                    @endif
                </a>

            </div>
        </div>
    </div>
@endforeach
{{ $requests->render() }}
@endsection
