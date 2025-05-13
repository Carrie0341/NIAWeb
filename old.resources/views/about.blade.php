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
            <h2 class="col-12">關於清大產學聯盟</h2>
            <p class="context col-sm-5 col-12">
                本聯盟整合團隊成員所累積之創新研發能量，促進產業升級並與國際接軌，
                以提升國家的運動科技經濟發展整體競爭力，相關研發成果亦將進一步導入健康照護產業。
                我們將匯集產學資源，聯合業界指標性公司與各專長領域教授、研究人員組成菁英培育實驗室進行尖端、
                實用之產業相關研發工作，包含智慧運動場館基礎建設（感測器部署、場館搭建、資料蒐集平台建置）、
            </p>

            <p class="context col-sm-5 col-12">
                應用技術開發（XR技術、電腦視覺技術、電腦圖學技術）、其他核心技術應用（大數據分析、資料科學、人工智慧、深度學習、機器學習）。
                本資訊平台著重於將研發成果推向產業商品化，配合人才培育模式以落實學用合一，
                持續創新研發以提升產業技術水平並貢獻國家發展，
                期望藉此「清大產學聯盟」的成立，橋接學研與產業應用。
            </p>
        </div>
    </div>
</section>
<!-- Copy second section style from home -->
<div class="home">
    <section class="second">
        <img src="/images/about-logo.png" srcset="/images/about-logo@2x.png 2x,
             /images/about-logo@3x.png 3x" class="pic_core">

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