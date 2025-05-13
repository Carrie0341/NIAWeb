@extends('layout.master')

@section('title' , 'register')

@section('extra_head')
<script>
    function showPassword(elt)
    {
        let password = document.getElementById("password");
        password.type = (password.type == "password") ? "text" : "password";
        elt.textContent = (password.type == "password") ? "顯示" : "隱藏";
    }

    function showConfirm(elt)
    {
        let confirm = document.getElementById("confirm");
        confirm.type = (confirm.type == "password") ? "text" : "password";
        elt.textContent = (confirm.type == "password") ? "顯示" : "隱藏";
    }
</script>
@endsection

@section('content')
    <section class="first">
        <div class="join-us">
            <div class="row justify-content-end">
                <div class="col-7 about">Join Us</div>
                <div class="col-7 main">加入我們</div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-8 col-sm-12">
                <form style="padding-top:75px;">

                    <!-- 連結區 -->
                    <div class="linked-area">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="title">基本資料</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-xs-6">
                                <a href="{{route('register.teacher')}}"><span class="btn btn-block mask">我是教師</span></a>
                            </div>
                            <div class="form-group col-md-6 col-xs-6">
                                <a href="{{route('register.company')}}"><span class="btn btn-block mask-deep">我是企業</span></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name">聯絡人姓名</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
                            <small class="form-text hint">*此為必填欄位</small>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="phone">連絡電話</label>
                            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phone">
                            <!-- <small id="" class="form-text text-muted"></small> -->
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="account">帳號</label>
                            <input type="text" class="form-control" id="account" name="account" aria-describedby="account">
                            <!-- <small id="" class="form-text text-muted"></small> -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="password">密碼</label>
                            <div class="form-control password d-flex justify-content-between align-items-center">
                                <input type="password" id="password" name="Password" aria-describedby="password">
                                <span class="visable-password" onclick="showPassword(this)">顯示</span>
                            </div>
                            <!-- <small id="" class="form-text text-muted"></small> -->
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="confirm">再次確認密碼</label>
                            <div class="form-control password d-flex justify-content-between align-items-center">
                                <input type="password" id="confirm" name="confirm" aria-describedby="confirm">
                                <span class="visable-password" onclick="showConfirm(this)">顯示</span>
                            </div>
                            <!-- <small id="" class="form-text text-muted"></small> -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="company">公司名稱</label>
                            <input type="text" class="form-control" id="company" aria-describedby="company">
                            <!-- <small id="" class="form-text text-muted"></small> -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="jobTitle">職稱</label>
                            <input type="text" class="form-control" id="jobTitle" name="jobTitle" aria-describedby="jobTitle">
                            <!-- <small id="" class="form-text text-muted"></small> -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="contactEmail">聯絡信箱</label>
                            <input type="text" class="form-control" id="contactEmail" name="contactEmail" aria-describedby="contactEmail">
                            <!-- <small id="" class="form-text text-muted"></small> -->
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="title">個人設定</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-1 d-flex flex-column justify-content-center align-items-center">
                            <input id="checkbox1" type="checkbox"/>
                            <label for="checkbox1" ><span></span></label>
                        </div>
                        <div class="form-group col-11">
                            <input type="text" class="form-control" disabled value="延展實境應用技術產學聯盟">
                        </div>
                    </div>

                    <div class="form-row flex">
                        <div class="form-group col-1 d-flex flex-column justify-content-center align-items-center">
                            <input id="checkbox2" type="checkbox"/>
                            <label for="checkbox2" ><span></span></label>
                        </div>
                        <div class="form-group col-11">
                            <input type="text" class="form-control" disabled value="化學迴路程序於資源化技術聯盟">
                        </div>
                    </div>

                    <br><br><br><br><br><br>
                    
                    <div class="form-row">
                        <div class="col-12 apply-confirm text-center">
                            <h2>申請確認</h2>
                            <br>
                            <div>
                                <label>恭喜您完成申請，服務專員會再主動與您電話連絡，確認申請資料</label>
                            </div>
                            <br><br>
                            <input type="submit" value="完成" class="btn-rad dark"/>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection