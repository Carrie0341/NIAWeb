@extends('layout.master')

@section('title' , 'register')

@section('extra_head')
<script>
    window.addEventListener('load', function() {
        const forTeacher = document.getElementById("forTeacher");
        const forCompany = document.getElementById("forCompany");
        const submitBtn = document.getElementById("submitBtn");
        const formType = document.getElementById("formType"); // 獲取隱藏欄位

        forTeacher.addEventListener("click", switchForm);
        forCompany.addEventListener("click", switchForm);

        function switchForm(evt) {
            document.getElementById("teacherForm").classList.remove("d-none");
            document.getElementById("companyForm").classList.remove("d-none");

            /* 切換至老師的表單 */
            if (evt.target == forTeacher) {
                document.getElementById("companyForm").classList.add("d-none");
                forCompany.classList.remove("mask-deep");
                forTeacher.classList.remove("mask");
                forCompany.classList.add("mask");
                forTeacher.classList.add("mask-deep");
                submitBtn.name = "teacher";
                formType.value = "teacher"; // 設置隱藏欄位的值
                [...document.getElementById("companyForm").getElementsByTagName("input")].forEach((elt) => {
                    elt.disabled = true;
                });
                [...document.getElementById("teacherForm").getElementsByTagName("input")].forEach((elt) => {
                    elt.disabled = false;
                });
                document.getElementById("T_contactEmail").required = true;
                document.getElementById("C_contactEmail").required = false;
            }

            /* 切換至企業的表單 */
            if (evt.target == forCompany) {
                document.getElementById("teacherForm").classList.add("d-none");
                forCompany.classList.remove("mask");
                forTeacher.classList.add("mask-deep");
                forCompany.classList.remove("mask");
                forTeacher.classList.remove("mask-deep");
                forCompany.classList.add("mask-deep");
                forTeacher.classList.add("mask");
                submitBtn.name = "company";
                formType.value = "company"; // 設置隱藏欄位的值
                [...document.getElementById("companyForm").getElementsByTagName("input")].forEach((elt) => {
                    elt.disabled = false;
                });
                [...document.getElementById("teacherForm").getElementsByTagName("input")].forEach((elt) => {
                    elt.disabled = true;
                });
                document.getElementById("T_contactEmail").required = false;
                document.getElementById("C_contactEmail").required = true;
            }
        }
    });
</script>
@if( Session::has('feedback') && Session::get('feedback') == "Teacher" )
<script>
    window.addEventListener('load', () => {
        forTeacher.click();
    });
</script>

@elseif( Session::has('feedback') && Session::get('feedback') == "Company" )
<script>
    window.addEventListener('load', () => {
        forCompany.click();
    });
</script>
@endif

@endsection

@section('content')

<section class="first">
    <div class="join-us">
        <div class="row d-flex">
            <div class="col-7 about">Contact Us</div>
            <div class="col-7 main">聯絡我們</div>
        </div>
    </div>
    <div class="row justify-content-end">

        <div class="col-md-8 col-sm-12" style="padding-top:75px;">

            <!-- 顯示成功訊息 -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- 顯示錯誤訊息 -->
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

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


            <form method="POST" action="{{ secure_url('register') }}" id="registerForm">
                <input type="hidden" name="ajax_submit" value="0">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="name">聯絡人姓名</label>
                        <input class="form-control" id="name" name="name" aria-describedby="name" value="{{ old('name') }}" required>
                        <small class="form-text hint">*此為必填欄位</small>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="phone">連絡電話</label>
                        <input class="form-control" id="phone" name="phone" aria-describedby="phone" placeholder="0900-000000" value="{{ old('phone') }}" pattern="[0-9]{4}-?[0-9]{6}" required>
                        <small class="form-text hint">*此為必填欄位</small>
                    </div>
                </div>

                <div id="teacherForm">
                    <!-- 給老師填寫 -->
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="department">科系</label>
                            <input class="form-control" id="department" name="department" aria-describedby="department" value="{{ old('department') }}">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="T_jobTitle">職稱</label>
                            <input class="form-control" id="T_jobTitle" name="jobTitle" aria-describedby="jobTitle" value="{{ old('jobTitle') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="T_contactEmail">聯絡信箱</label>
                            <input type="email" class="form-control  @if($errors->has('email')) is-invalid @endif" id="T_contactEmail" name="T_contactEmail" aria-describedby="contactEmail" value="{{ old('T_contactEmail') }}" required>
                            <small class="form-text hint">*此為必填欄位</small>
                            @if($errors->has('email') )
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div id="companyForm" class="d-none">
                    <!-- 給企業填寫 -->
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="company">公司名稱</label>
                            <input class="form-control" id="company" name="companyName" aria-describedby="company" value="{{ old('companyName') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="C_jobTitle">職稱</label>
                            <input class="form-control" id="C_jobTitle" name="jobTitle" aria-describedby="jobTitle" value="{{ old('jobTitle') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="C_contactEmail">聯絡信箱</label>
                            <input type="email" class="form-control" id="C_contactEmail" name="C_contactEmail" aria-describedby="contactEmail" value="{{ old('C_contactEmail') }}">
                            <small class="form-text hint">*此為必填欄位</small>
                            @if($errors->has('email') )
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- <div class="form-row">
                        <div class="form-group col-12">
                            <label class="title">個人設定</label>
                        </div>
                    </div>
                    @for($i = 0 ; $i < count($alliances) ; ++$i)
                        <div class="form-row">
                        <div class="form-group col-1 d-flex flex-column justify-content-center align-items-center">
                            <input name="setting[]" value="{{$alliances[$i]->id}}" id="checkbox{{$i}}" type="checkbox" />
                            <label for="checkbox{{$i}}"><span></span></label>
                        </div>
                        <div class="form-group col-11">
                            <input class="form-control" disabled value="{{$alliances[$i]->name}}" readonly>
                        </div>
                    </div>
                    @endfor -->
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="message">留言</label>
                        <input class="form-control" id="message" name="message" aria-describedby="message" value="{{ old('message') }}">
                    </div>
                </div>

                <div class="form-row" style="margin-top:5rem;">
                    <div class="col-12 text-center">
                        <input type="hidden" id="formType" name="formType" value="teacher">
                        <input id="submitBtn" type="submit" name="teacher" class="btn-rad dark" value="送出申請" />
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('registerForm');

        // 確保表單 action 使用 HTTPS
        if (form.action.startsWith('http:')) {
            form.action = form.action.replace('http:', 'https:');
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // 阻止默認表單提交

            // 確保表單類型已設置
            const formType = document.getElementById('formType');
            if (!formType.value) {
                alert('請選擇您的身份（教師或企業）');
                return;
            }

            // 顯示提交中訊息
            const submitBtn = document.getElementById('submitBtn');
            const originalValue = submitBtn.value;
            submitBtn.value = '提交中...';
            submitBtn.disabled = true;

            // 使用 Fetch API 提交表單
            fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (response.redirected) {
                        window.location.href = response.url;
                        return;
                    }
                    return response.text();
                })
                .then(data => {
                    try {
                        // 嘗試解析 JSON 響應
                        const jsonData = JSON.parse(data);
                        if (jsonData.success) {
                            // 成功提交
                            alert('申請已成功提交！服務專員會再主動使用電子郵件與您連絡。');
                            window.location.href = form.action.split('/register')[0];
                        } else {
                            // 顯示錯誤
                            alert('提交失敗: ' + (jsonData.message || '請稍後再試'));
                        }
                    } catch (e) {
                        // 如果不是 JSON，可能是直接返回的 HTML 或文本
                        if (data.includes('恭喜您完成申請') || data.includes('測試')) {
                            alert('申請已成功提交！服務專員會再主動使用電子郵件與您連絡。');
                            window.location.href = form.action.split('/register')[0];
                        } else {
                            // 顯示在頁面上
                            const resultDiv = document.createElement('div');
                            resultDiv.className = 'alert alert-info mt-3';
                            resultDiv.innerHTML = data;
                            form.parentNode.insertBefore(resultDiv, form.nextSibling);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('提交時發生錯誤，請稍後再試');
                })
                .finally(() => {
                    // 恢復提交按鈕
                    submitBtn.value = originalValue;
                    submitBtn.disabled = false;
                });
        });
    });
</script>