@extends('layout.master')

@section('title' , 'request')

@section('extra_head')
<script>
@if( Session::has('success' ) )
    window.addEventListener('load' , function(){
        alert("提案成功!");
    });
@endif
</script>
@endsection

@section('content')

<section>
    <div class="row">
        <div class="col-12 d-flex justify-content-center" style="background:white; z-index:9">
            <div class="col-md-9">
                <form style="padding-top:75px;" method="POST" action='{{ route("request") }}'>
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="mainTitle">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <div class="col-12 about">Form</div>
                                <div class="col-12 main">企業提案</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name">聯絡人姓名</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="phone">連絡電話</label>
                            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phone" value="{{ $user->phone }}" readonly>
                            <small class="form-text" style="color:red">唯讀 (Read Only)</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="company">公司名稱</label>
                            <input type="text" class="form-control" id="company" name="company" aria-describedby="company" value="{{$info->companyName}}" readonly>
                            <small class="form-text" style="color:red">唯讀 (Read Only)</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="jobTitle">職稱</label>
                            <input type="text" class="form-control" id="jobTitle" name="jobTitle" aria-describedby="jobTitle" value="{{$info->jobTitle}}" required>
                            <!-- <small id="" class="form-text text-muted"></small> -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="contactEmail">聯絡信箱</label>
                            <input type="text" class="form-control" id="contactEmail" name="contactEmail" aria-describedby="contactEmail" value="{{$user->email}}" readonly>
                            <small class="form-text" style="color:red">唯讀 (Read Only)</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="request">需求主題</label>
                            <input type="text" class="form-control" id="request" name="request" aria-describedby="request" required>
                            <!-- <small id="" class="form-text text-muted"></small> -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="describe">需求敘述</label>
                            <textarea rows="6" class="form-control" id="describe" name="describe" aria-describedby="describe" required></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="alliance">提案聯盟</label>
                            <select class="form-control" id="alliance" name="alliance" aria-describedby="alliance">
                                
                                @if($alliances != null)
                                    @foreach( $alliances as $alliance )
                                        <option value="{{$alliance->id}}">{{$alliance->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row req-row">
                        
                        <div class="form-group">
                            <button class="btn-rad light">取消提案</button>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn-rad dark">確認提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection