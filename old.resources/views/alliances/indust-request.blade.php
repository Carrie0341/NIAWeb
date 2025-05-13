@if( isset($indust_reqs) && count($indust_reqs) > 0 )
    @foreach($indust_reqs as $index => $request)
        <li class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$index}}">
                    {{$request->company}} ： {{$request->request}}
                </a>
            </div>
            <div id="collapse{{$index}}" class="panel-collapse collapse in">
                <div class="panel-body">
                    {{$request->describe}}
                </div>
            </div>
        </li>
    @endforeach
@else
    <h2>暫無企業提案</h2>
@endif