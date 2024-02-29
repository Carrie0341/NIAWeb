@extends('layout.master')

@section('title', 'home')

@section('extra_head')
<script src="/js/rellax.min.js"></script>
<script src="/js/picturefill.min.js"></script>
@endsection

@section('content')
<section class="first">
    <picture>
        <source media="(max-width: 576px)" srcset="/images/empty.png">
        <img src="/images/home_l_01.png" class="ani-BG one">
    </picture>
    <picture>
        <source media="(max-width: 576px)" srcset="/images/empty.png">
        <img src="/images/home_l_02.png" data-rellax-speed="-7" class="ani-BG two rellax">
    </picture>
    <picture>
        <source media="(max-width: 576px)" srcset="/images/empty.png">
        <img src="/images/home_l_03.png" data-rellax-speed="-3" class="ani-BG three rellax">
    </picture>
    <picture>
        <source media="(max-width: 576px)" srcset="/images/empty.png">
        <img src="/images/home_l_04.png" data-rellax-speed="-5" class="ani-BG four rellax">
    </picture>

    <div class="home-title">
        <h1>清大產學聯盟</h1>
        <p class="context">
            「臺科⼤產學聯盟」透過聯盟會員連結產業與學界，
            以「合作計畫、技術移轉、創造技術商品化」做法為核心價值，
            協助產業界提升競爭能⼒。
        </p>
        <p class="buttons">
            <button class="btn-rad light" onclick="loginBox()">登入</button>
            <button class="btn-rad dark ml-1" onclick="location.href='/register'">加入我們</button>
        </p>
    </div>
    <img src="/images/scroll.svg" class="scroll">
</section>
<section class="second">

    <img src="/images/pic-core.png" srcset="/images/pic-core@2x.png 2x,
             /images/pic-core@3x.png 3x" class="pic_core">

    <div class="service">
        <h1>服務模式</h1>

        <ul class="nav tab">
            <li>
                <input type="radio" name="tabs" id="menu1" checked />
                <label for="menu1">技術交流</label>
                <div id="content1" class="tab-c">
                    <ul>
                        <li>技術諮詢、專家到場服務、分析儀器委託測量服務：針對會員廠商技術問題與需求，提供專業技術服務。</li>
                        <li>線上產學平台資源：會員廠商需求提案、教授發表技術成果之互動平台。</li>
                    </ul>
                </div>
            </li>
            <li>
                <input type="radio" name="tabs" id="menu2" />
                <label for="menu2">產學媒合</label>
                <div id="content2" class="tab-c">
                    <ul>
                        <li>產學合作：依據會員廠商需求，協助媒合產學合作、專利授權與技術移轉之合適對象。</li>
                        <li>產碩專班人才培育合作。</li>
                        <li>協助政府相關產學計畫提案合作。</li>
                    </ul>
                </div>
            </li>
            <li>
                <input type="radio" name="tabs" id="menu3" />
                <label class="last" for="menu3">活動舉辦</label>
                <div id="content3" class="tab-c">
                    <ul>
                        <li>技術論壇/研討會。</li>
                        <li>提供技術論壇企業展示攤位。</li>
                        <li>提供企業人才招募博覽會攤位。</li>
                    </ul>
                </div>
            </li>
        </ul>

        <button class="btn-rad light" onclick="location.href='/about'">了解更多</button>

    </div>

</section>

<script type="text/javascript">
    // Accepts any class name
    let rellax = new Rellax('.rellax');
</script>

@endsection