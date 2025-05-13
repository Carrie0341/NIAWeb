<div class="wrapper" id="loginWrapper">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-4 login-box text-center">
            <div class="close" onclick ='document.body.removeChild( document.getElementById("loginWrapper") )'> &times; </div>
            <form class="text-left" method="POST" action="{{ route('login') }}" id="loginForm" onsubmit="return false;">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h3 class="info">登入</h3>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="loginAccount">帳號</label>
                        <input type="text" id="loginAccount" name="account" class="form-control" autocomplete="off" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="loginPassword">密碼</label>
                        <div class="form-control password d-flex justify-content-between align-items-center">
                            <input type="password" id="loginPassword" name="Password" aria-describedby="password" autocomplete="new-password">
                            <span class="visiable-password" onclick="passwordForget( document.getElementById('loginForm') )" >忘記密碼</span>
                        </div>
                    </div>
                </div>

                <div class="form-row" style="user-select:none;">
                    <div class="form-group col-12">
                        <input id="keep" name="keep" type="checkbox"/>
                        <label for="keep" style="width:100%;font-size:1.2rem;"><span style="margin-right:1rem;"></span>記住我</label>
                    </div>
                </div>

                <div class="form-row text-center">
                    <div class="form-group col-md-6 col-xs-12">
                        <button class="btn-rad light" onclick="location.href=`{{ route('register') }}`">加入我們</button>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <button class="btn-rad dark" onclick="login( document.getElementById('loginForm') )" autofocus>登入</button>
                    </div>
                </div>
            </form>
            <!--
            <div class="row lace">
                <div class="col-3" style="background:#122f51;"></div>
            </div>
            -->
        </div>
    </div>

    <template id="passwordForgetForm">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-12">
                <h3 class="info">忘記密碼</h3>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="ContactEmail"></label>
                <input type="text" id="ContactEmail" name="contactEmail" class="form-control" autocomplete="off" />
                <div>
                    <small class="text-danger">*請輸入聯絡信箱</small>
                </div>
            </div>
        </div>
        <div class="form-row text-center" style="margin-top:3rem;">
            <div class="form-group col-md-12 col-xs-12">
                <button class="btn-rad dark" onclick="passwordForgetFetch( document.getElementById('loginForm') )" autofocus>發送</button>
            </div>
        </div>
    </template>

    <template id="sendHintBox">
        <div class="row" style="padding:5rem;color:#122f51">
            <div class="col-12">
                <h2>帳戶驗證成功</h2>
                <p style="font-size:1.2rem;margin-top:5rem;">
                    親愛的用戶您好，請至您的信箱確認帳戶相關資訊，並根據指示重新設定帳戶相關資訊。
                </p>
            </div>
        </div>
    <template>
</div>

