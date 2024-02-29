<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="icon" href="../../favicon.ico">--}}

    <title>NTUST-IA</title>

<!-- Bootstrap & JQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/app.css?v=0821" rel="stylesheet">
    @yield('extra_head')
</head>

<body>
    <nav class="ia-nav @yield('title')">
        <button class="nav-button d-block d-sm-none collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </button>

        <a class="sidelogo animated" href="/">
           <img>
        </a>
        <div id="navbarNav" class="navbar-collapse">
            <ul class="sidebar">
                <li id="about" class="sider">
                    <a href="/about" data-mobile="About">
                        關於平台
                        <img src="/images/menu.svg" style="width: 20px; height: 20px; object-fit: contain;">
                    </a>
                </li>
                <li id="alliance" class="sider">
                    <a href="/alliance" data-mobile="Alliance">
                        產學聯盟
                        <img src="/images/menu.svg" style="width: 20px; height: 20px; object-fit: contain;">
                    </a>
                </li>
                <li id="news" class="sider">
                    <a href="/news" data-mobile="News">
                        最新消息
                        <img src="/images/menu.svg" style="width: 20px; height: 20px; object-fit: contain;">
                    </a>

                </li>
                @if( !Session::has('user') || Session::has('isCompany'))
                    <li id="request" class="sider">
                        <a href="/request" data-mobile="Form">
                            企業提案
                            <img src="/images/menu.svg" style="width: 20px; height: 20px; object-fit: contain;">
                        </a>
                    </li>
                @endif

                @if( !Session::has('user') )
                    <li id="login" class="sider">
                        <a href="javascript:;" data-mobile="Log In" onclick="loginBox()">
                            登入平台
                            <img src="/images/menu.svg" style="width: 20px; height: 20px; object-fit: contain;">
                        </a>
                    </li>
                    <li id="register" class="btn-reg sider">
                        <a href="/register" data-mobile="Join Us">
                            加入我們
                        </a>
                    </li>
                
                @else
                    <li id="login" class="sider">
                        <a href="/edit/{{ session('user') }}" data-mobile="edit">
                            個人管理
                            <img src="/images/menu.svg" style="width: 20px; height: 20px; object-fit: contain;">
                        </a>
                    </li>
                    <li id="register" class="btn-reg btn-rad light sider">
                        <a href="/logout" data-mobile="Log out">
                            登出
                        </a>
                    </li>
                @endif
            </ul>
            <div class="nav-footer">
                <h4>訂閱電子報</h4>
                <form class="email">
                    <input type="email" placeholder="請輸入Email訂閱電子報">
                    <button>送出</button>
                </form>
                <div class="contact">
                    <p style="margin: 0;">張永生經理</p>
                    <p>886-2733-3713</p>
                    <p>yongshen@mail.ntust.edu.tw</p>
                    <p>
                        106台北市大安區基隆路四段43號國際大樓12F-1212室<br>
                        國立臺灣科技大學企業服務中心
                    </p>
                </div>
                <div class="flogos">
                    <div class="inline">
                        <img src="/images/footer/logo-iac.png" srcset="/images/footer/logo-iac@2x.png 2x,/images/footer/logo-iac@3x.png 3x" class="Group">
                        <img src="/images/footer/logo-most.png" srcset="/images/footer/logo-most@2x.png 2x,/images/footer/logo-most@3x.png 3x" class="Group">
                        <img src="/images/footer/logo-taiwan-tech.png" srcset="/images/footer/logo-taiwan-tech@2x.png 2x,/images/footer/logo-taiwan-tech@3x.png 3x" class="Group">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>科技部計畫補助 </p>
                        <div class="hl"></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- background line -->
        <div class="vl one d-block d-sm-none"></div>
        <div class="vl two d-block d-sm-none"></div>


    </nav>
    <div class="@yield('title') Rectangle">
        <div class="ia-container">
            @yield('content')
        </div>
    </div>

   @include('layout.footer')
</body>

<script>
    $('.nav').on('click','.sider',function(){
        $(this).addClass("active").siblings().removeClass("active");
        $(this).find( "a" )[0].click();
    });

    $('.nav-sidebar').on('click','.sider',function(){
        $(this).addClass("active").siblings().removeClass("active");
    });

    $( document ).ready(function () {
        $('#@yield('title')').children().addClass('active');
        $('.sidelogo').addClass('jackInTheBox');
    });


    function myFunction(x) {
        x.classList.toggle("change");
        $('#navbarNav').toggleClass("fadeInDown");
    }

/*
    $('.sidelogo').mouseenter(function () {
        $(this).addClass('rotateOut');
        $(this).removeClass('rotateIn');
    });
    $('.sidelogo').mouseleave(function () {
        $(this).removeClass('rotateOut');
        $(this).addClass('rotateIn');
    });
*/

    $('.sidelogo').on("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
        $(this).removeClass('jackInTheBox');
    });


    $('.sider').mouseenter(function () {
        $(this).addClass('side-hover-animate');
    });
    $('.sider').mouseleave(function () {
        $(this).removeClass('side-hover-animate');
    });

    function loginBox (e) {
        $.ajax({
            url : "/login",
            type: "get",
            success: function(res) {
                document.body.innerHTML += res;
            }
        })
    }

    function passwordForget( form ) {
        /* 清空目前表單 */
        while( form.firstElementChild != null && form.firstElementChild != undefined ) {
            form.removeChild( form.firstElementChild );
        }
        
        const cloneNode = document.getElementById("passwordForgetForm").content.cloneNode(true);
        form.appendChild( cloneNode );
    }

    function passwordForgetFetch( form ) {
        const formData = new FormData(form);
        const request = new Request('{{ route("passwordForget") }}' , {
            method : "POST",
            body : formData
        });
        
        fetch(request)
            .then( response => { 
                return response.json() 
            })
            .then( resData => {
                //驗證信箱失敗
                if( !resData.state )
                {
                    form.getElementsByTagName("input")[1].classList.add("is-invalid");
                    alert( resData.message );
                }

                //驗證信箱成功
                else
                {
                    form.getElementsByTagName("input")[1].classList.remove("is-invalid");
                    sendHint( form );
                }
            })
            .catch( (error) => {
                console.log("錯誤：" , error);
                alert('伺服器錯誤');
        }); 
    }

    function sendHint( form ) {
        const parentNodeRef = form.parentNode;
        const hintBox = document.getElementById("sendHintBox").content.cloneNode(true);
        form.parentNode.removeChild( form );
        parentNodeRef.appendChild( hintBox );
    }

    function login( form ) {
        console.log( form );
        const formData = new FormData(form);
        const request = new Request('{{ route("login") }}' , {
            method : "POST",
            body : formData,
        });
        fetch(request)
            .then( (response) => {
                return response.json();
            })
            .then( (resData) => {
                console.log(resData);

                //登入失敗
                if( !resData.state )
                {
                    form.getElementsByTagName("input")[1].classList.add("is-invalid");
                    alert( resData.message );
                }

                //登入成功
                else
                {
                    alert( resData.message );
                    location.href = '{{ route("home") }}';
                }
            })
            .catch( (error) => {
                console.log("錯誤：" , error);
                alert('伺服器錯誤');
        });
    }


</script>

@if( Session::has('feedback') & Session::get('feedback') == "notLogin")
<script>
    window.addEventListener('load' , function(){
        loginBox();
    })
</script>    
@endif

</html>
