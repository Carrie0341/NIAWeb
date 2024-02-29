@extends('layout.master')

@section('title', 'about')

@section('extra_head')
    <script src="/js/rellax.min.js"></script>
@endsection

@section('content')
    <picture>
        <source media="(max-width: 576px)" srcset="/images/empty.png">
        <img src="/images/About_banner_all.png" data-rellax-speed="-5" class="rellax BG">
    </picture>

    <div class="bg-vl">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
        <div class="four"></div>
        <div class="five"></div>
    </div>
    <section class="first">
        <div class="about-title">
            <h1>About</h1>
            <h1>關於平台</h1>

            <div class="row bottom">
                <h2 class="col-12">關於臺科大產學聯盟</h2>
                <p class="context col-sm-5 col-12">
                    科技部產學小聯盟旨在促使大專校院及學術研究機構有效運用研發能量，
                    以其已建立之核心技術與相關之上中下游產業界建構技術合作聯盟，
                    企業透過繳交會員費成為聯盟會員，進而衍生產學合作計畫、技術移轉、創造技術商品化的價值，
                    協助產業界提升競爭能力及產品價值。
                </p>

                <p class="context col-sm-5 col-12">
                    本資訊平台整合了臺科大執行科技部產學小聯盟計畫相關資源與資訊。
                    在這裡，您可找到您需要的技術團隊與相關服務窗口，也可以得知各個小聯盟團隊的活動訊息。
                    歡迎大家以此作為一個交流平台，提供本平台相關資訊與建議。
                </p>
            </div>
        </div>
    </section>
    <!-- Copy second section style from home -->
    <div class="home">
        <section class="second">
            <img src="/images/about-logo.png"
                 srcset="/images/about-logo@2x.png 2x,
             /images/about-logo@3x.png 3x"
                 class="pic_core">

            <div class="service">

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
            </div>
        </section>
    </div>

    <script type="text/javascript">
        // Accepts any class name
        let rellax = new Rellax('.rellax');
    </script>

@endsection