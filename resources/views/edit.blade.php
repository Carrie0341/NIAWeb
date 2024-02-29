@extends('layout.master')

@section('title' , 'edit')

@section('extra_head')
<script>
window.onload = function(){
    const submitBtn  = document.getElementById("submitBtn");
    const editBtn    = document.getElementById("editBtn");
    const cancelBtn  = document.getElementById("cancel");
    const submitArea = document.getElementById("submitArea");
    const passwordField  = document.getElementById("password");
    editBtn.addEventListener("click" , unlock);
    cancelBtn.addEventListener("click" , revert);

    function unlock(e)
    {
        const canEdit = document.getElementsByClassName("canEdit");
        [...canEdit].forEach( (input) => {
            input.classList.toggle("disabled");
            input.parentNode.classList.toggle("input-warpper");
            input.disabled = !input.disabled;
        });
        editBtn.classList.toggle("d-none");
        submitArea.classList.toggle("invisible");
    }

    function revert(e)
    {
        submitArea.classList.toggle("invisible");
        const canEdit = document.getElementsByClassName("canEdit");
        [...canEdit].forEach( (input) => {
            input.classList.toggle("disabled");
            input.parentNode.classList.toggle("input-warpper");
            input.disabled = !input.disabled;
        });
        editBtn.classList.toggle("d-none");
        document.getElementById("isChange").value = 0;
    }

    password.oninput = function() {
        document.getElementById("isChange").value = 1;
    }
}

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
@endsection

@section('content')

<section class="first">
    <div class="join-us">
        <div class="row justify-content-end">
            <div class="col-7 about">Personal</div>
            <div class="col-7 main">個人管理</div>

            @if( $info->type == 1 )
            <div class="col-7 about" style="margin-top:2rem;color:black;">教師</div>

            @else
            <div class="col-7 subTitle" style="">企業</div>

            @endif
        </div>
    </div>


    <div class="row justify-content-end">
        
        <div class="col-md-8 col-sm-12" style="padding-top:75px;">
            <div class="linked-area">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label class="title">基本資料</label>
                    </div>
                    <div class="form-group col-6 text-right">
                        <button id="editBtn" class="btn-edit-light">編輯</button>
                    </div>
                </div>
            </div>
            
            <form method="POST" action="{{ route('edit' , ['token' => $user->remember_token]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="justify-content-between">
                    <div class="form-row justify-content-between">
                        <div class="form-group input-warpper col-md-5 col-sm-12">
                            <label for="name">聯絡人姓名</label>
                            <input class="disabled form-control" id="name" name="name" aria-describedby="name" value="{{ $user->name }}" required disabled>
                        </div>
                        <div class="form-group input-warpper col-md-5 col-sm-12">
                            <label for="phone">連絡電話</label>
                            <input class="disabled form-control canEdit" id="phone" name="phone" aria-describedby="phone" placeholder="0900-000000" value="{{ $user->phone }}" pattern="[0-9]{4}-?[0-9]{6}" disabled>
                        </div>
                    </div>
                    
                    <div class="form-row justify-content-between">
                        <div class="form-group input-warpper col-md-5 col-sm-12">
                            <label for="account">帳號</label>
                            <input  class="disabled form-control" id="account" name="account" aria-describedby="account" value="{{ $user->account }}" disabled>
                        </div>

                    <div class="form-group input-warpper col-md-5 col-sm-12">
                            <label for="account">密碼</label>
                            <input type="hidden" id="isChange" name="isChange" value="0" />
                            <input type="password" class="disabled form-control canEdit" id="password" name="password" aria-describedby="password" placeholder="************" disabled>
                        </div>
                    </div>

                    
                    @if( $info->type == 1)
                    <!-- 老師 -->
                    <div class="form-row justify-content-between">
                        <div class="form-group input-warpper col-md-5 col-sm-12">
                            <label for="department">科系</label>
                            <input  class="disabled form-control canEdit" id="department" name="department" aria-describedby="department" value="{{ $info->department }}" disabled>
                        </div>
                        <div class="form-group input-warpper col-md-5 col-sm-12">
                            <label for="T_jobTitle">職稱</label>
                            <input  class="disabled form-control canEdit" id="T_jobTitle" name="jobTitle" aria-describedby="jobTitle" value="{{ $info->jobTitle }}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-warpper col-12">
                            <label for="T_contactEmail">聯絡信箱</label>
                            <input type="email" class="disabled form-control canEdit" id="T_contactEmail" name="contactEmail" aria-describedby="contactEmail" value="{{ $user->email }}" disabled>
                        </div>
                        @if( $errors->has('email') )
                        <small class="text-danger">該信箱已被使用</small>
                        @endif
                    </div>
                
                    @else
                    <!-- 給企業 -->
                    <div class="form-row">
                        <div class="form-group input-warpper col-12">
                            <label for="company">公司名稱</label>
                            <input  class="disabled form-control" id="company" name="company" aria-describedby="company" value="{{ $info->companyName }}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-warpper col-12">
                            <label for="C_jobTitle">職稱</label>
                            <input  class="disabled canEdit form-control" id="C_jobTitle" name="jobTitle" aria-describedby="jobTitle" value="{{ $info->jobTitle }}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-warpper col-12">
                            <label for="C_contactEmail">聯絡信箱</label>
                            <input type="email" class="disabled canEdit form-control" id="C_contactEmail" name="contactEmail" aria-describedby="contactEmail" value="{{ $user->email }}" disabled>
                        </div>
                        @if( $errors->has('email') )
                        <small class="text-danger">該信箱已被使用</small>
                        @endif
                    </div>
                    @endif
                    <div id="submitArea" class="form-row invisible">
                        <div class="form-group col-12 text-right">
                            <label for="cancel">
                                <input type="reset"  id="cancel"  class="d-none" value="取消" />
                                <span class="btn-edit-light">取消</span>
                            </label>
                            <label for="confirm">
                                <input type="submit" id="confirm"  class="d-none" value="確認"/>
                                <span class="btn-edit-dark">確認</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection