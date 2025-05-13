@extends('layout.master')

@section('title' , 'register')

@section('extra_head')
<script>
window.addEventListener('load' , function(){
    const forTeacher = document.getElementById("forTeacher");
    const forCompany = document.getElementById("forCompany");
    const submitBtn  = document.getElementById("submitBtn");
    forTeacher.addEventListener("click" , switchForm);
    forCompany.addEventListener("click" , switchForm);

    function switchForm(evt)
    {
        document.getElementById("teacherForm").classList.remove("d-none");
        document.getElementById("companyForm").classList.remove("d-none");

        /* 切換至老師的表單 */
        if(evt.target == forTeacher)
        {
            document.getElementById("companyForm").classList.add("d-none");
            forCompany.classList.remove("mask-deep");
            forTeacher.classList.remove("mask");
            forCompany.classList.add("mask");
            forTeacher.classList.add("mask-deep");
            submitBtn.name = "teacher";
            [...document.getElementById("companyForm").getElementsByTagName("input")].forEach( (elt) => {
                elt.disabled = true;
            });
            [...document.getElementById("teacherForm").getElementsByTagName("input")].forEach( (elt) => {
                elt.disabled = false;
            });
            document.getElementById("T_contactEmail").required = true;
            document.getElementById("C_contactEmail").required = false;
        }

        /* 切換至企業的表單 */
        if(evt.target == forCompany)
        {
            document.getElementById("teacherForm").classList.add("d-none");
            forCompany.classList.remove("mask");
            forTeacher.classList.add("mask-deep");
            forCompany.classList.remove("mask");
            forTeacher.classList.remove("mask-deep");
            forCompany.classList.add("mask-deep");
            forTeacher.classList.add("mask");
            submitBtn.name = "company";
            [...document.getElementById("companyForm").getElementsByTagName("input")].forEach( (elt) => {
                elt.disabled = false;
            });
            [...document.getElementById("teacherForm").getElementsByTagName("input")].forEach( (elt) => {
                elt.disabled = true;
            });
            document.getElementById("T_contactEmail").required = false;
            document.getElementById("C_contactEmail").required = true;
        }
    }

    
});

/* 密碼欄位 顯示/隱藏 */
function showPassword(elt)
{
    let password = document.getElementById("password");
    password.type = (password.type == "password") ? "text" : "password";
    elt.textContent = (password.type == "password") ? "顯示" : "隱藏";
}

/* 確認密碼欄位 顯示/隱藏 */
function showConfirm(elt)
{
    let confirm = document.getElementById("confirm");
    confirm.type = (confirm.type == "password") ? "text" : "password";
    elt.textContent = (confirm.type == "password") ? "顯示" : "隱藏";
}
</script>

    @if( Session::has('feedback') && Session::get('feedback') == "Teacher" )
    <script>
        window.addEventListener('load' , () => {forTeacher.click();} );
    </script>

    @elseif( Session::has('feedback') && Session::get('feedback') == "Company" )
    <script>
        window.addEventListener('load' , () => {forCompany.click();} );
    </script>
    @endif

@endsection

@section('content')

    <section class="first">
        <div class="join-us">
            <div class="row d-flex">
                <div class="col-7 about">Join Us</div>
                <div class="col-7 main">加入我們</div>
            </div>
        </div>
        <div class="row justify-content-end">

            <div class="col-md-8 col-sm-12" style="padding-top:75px;">

                <div class="linked-area">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="title">基本資料</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-xs-6 col-md-6 ">
                            <span class="btn btn-block mask-deep" id="forTeacher">我是教師</span>
                        </div>
                        <div class="form-group col-xs-6 col-md-6 ">
                            <span class="btn btn-block mask" id="forCompany">我是企業</span>
                        </div>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name">聯絡人姓名</label>
                            <input class="form-control" class="form-control" id="name" name="name" aria-describedby="name" value="{{ old('name') }}" required>
                            <small class="form-text hint">*此為必填欄位</small>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="phone">連絡電話</label>
                            <input  class="form-control" id="phone" name="phone" aria-describedby="phone" placeholder="0900-000000" value="{{ old('phone') }}" pattern="[0-9]{4}-?[0-9]{6}" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="account">帳號</label>
                            <input  class="form-control" id="account" name="account" aria-describedby="account" value="{{ old('account') }}" required>
                            <small class="invalid-feedback">Test</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="password">密碼</label>
                            <div class="form-control password d-flex justify-content-between align-items-center">
                                <input type="password" size="12" id="password" name="password" aria-describedby="password" autocomplete="new-password" required>
                                <span class="visable-password" onclick="showPassword(this)">顯示</span>
                            </div>
                            
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="confirm">再次確認密碼</label>
                            <div class="form-control password d-flex justify-content-between align-items-center">
                                <input type="password" size="12" id="confirm" name="confirm" aria-describedby="confirm" autocomplete="new-password" required>
                                <span class="visable-password" onclick="showConfirm(this)">顯示</span>
                            </div>
                        </div>
                    </div>

                    <div id="teacherForm">
                        <!-- 給老師填寫 -->
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="department">科系</label>
                                <input  class="form-control" id="department" name="department" aria-describedby="department" value="{{ old('department') }}">
                                <!-- <small id="" class="form-text text-muted"></small> -->
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="T_jobTitle">職稱</label>
                                <input  class="form-control" id="T_jobTitle" name="jobTitle" aria-describedby="jobTitle" value="{{ old('jobTitle') }}">
                                <!-- <small id="" class="form-text text-muted"></small> -->
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="T_contactEmail">聯絡信箱(同為個人帳號)</label>
                                <input type="email" class="form-control  @if($errors->has('email')) is-invalid @endif" id="T_contactEmail" name="T_contactEmail" aria-describedby="contactEmail" value="{{ old('T_contactEmail') }}" required>
                                @if($errors->has('email') )
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <!-- <small id="" class="form-text text-muted"></small> -->
                            </div>
                        </div>
                    </div>
                
                    <div id="companyForm" class="d-none">
                        <!-- 給企業填寫 -->
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="company">公司名稱</label>
                                <input  class="form-control" id="company" name="companyName" aria-describedby="company" value="{{ old('companyName') }}">
                                <!-- <small id="" class="form-text text-muted"></small> -->
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="C_jobTitle">職稱</label>
                                <input  class="form-control" id="C_jobTitle" name="jobTitle" aria-describedby="jobTitle" value="{{ old('jobTitle') }}">
                                <!-- <small id="" class="form-text text-muted"></small> -->
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="C_contactEmail">聯絡信箱</label>
                                <input type="email" class="form-control" id="C_contactEmail" name="C_contactEmail" aria-describedby="contactEmail" value="{{ old('C_contactEmail') }}">
                                @if($errors->has('email') )
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="title">個人設定</label>
                            </div>
                        </div>
                        @for($i = 0 ; $i < count($alliances) ; ++$i)
                        <div class="form-row">
                            <div class="form-group col-1 d-flex flex-column justify-content-center align-items-center">
                                <input name="setting[]" value="{{$alliances[$i]->id}}" id="checkbox{{$i}}" type="checkbox"/>
                                <label for="checkbox{{$i}}" ><span></span></label>
                            </div>
                            <div class="form-group col-11">
                                <input  class="form-control" disabled value="{{$alliances[$i]->name}}" readonly>
                            </div>
                        </div>
                        @endfor
                    </div>
                
                <div class="form-row" style="margin-top:5rem;">
                    <div class="col-12 apply-confirm text-center">
                        <h2>申請確認</h2>
                        <br>
                        <div>
                            <label>恭喜您完成申請，服務專員會再主動與您電話連絡，確認申請資料</label>
                        </div>
                        <br><br>
                        <input id="submitBtn" type="submit" name="teacher" class="btn-rad dark" value="完成" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection