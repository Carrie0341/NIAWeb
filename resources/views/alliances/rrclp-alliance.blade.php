@extends('layout.master')

@section('title', 'rrclp-alliance')

@section('extra_head')
    <script src="/js/rellax.min.js"></script>
@endsection

@section('content')
    <div class="BG">
        <img src="/images/alliance/banner_l_01.png" class="ani-BG one rellax">
        <img src="/images/alliance/banner_l_02.png" data-rellax-speed="-4" class="ani-BG two rellax">
    </div>
    <a id="topBtn" class="go-to-top" onclick="topFunction()"><img src="/images/button_gotop.svg"></a>
    <section id="introduce" class="intro">
        <label>Alliance</label>
        <h1>化學迴路程序於資源化技術聯盟</h1>
        <p>Alliance of Resource Recovery by Chemical Looping Process</p>

        <div class="title">
            <h1>聯盟介紹</h1>
            <div class="under"></div>
            <p class="context">
                本資源化技術聯盟為科技部產學技術聯盟合作計畫一員，旨在發展無焰式燃燒技術處理廢棄物與資源化之平台建立,
                亦即透過新式化學迴路燃燒(Chemical Looping Combustion, CLC)為主要技術。
                臺科大化學迴路團隊在近十年的化學迴路燃燒技術中載氧體材料開發(包括鐵礦、錳礦、集塵灰等)、
                反應器系統設計(包括移動式反應器與流體化床反應器)、廢棄物處理製程應用(包括稻殼、塑膠材料、
                廢溶劑等)與化工程序模擬進行質能平衡分析與評估等研究成果。
            </p>
        </div>
    </section>
    <section id="advantage" class="adv">
        <h1>技術優勢</h1>
        <div class="under"></div>

        <a id="select-title" onclick="select()">
            化學迴路燃燒程序
            <img src="/images/button_down.svg">
        </a>
        <ul id="select-list" class="tab">
            <li><a class="active" data-target="#adv1" onclick="swTab(this)">化學迴路燃燒程序</a></li>
            <li><a data-target="#adv2" onclick="swTab(this)">對於資源回收商</a></li>
            <li><a data-target="#adv3" onclick="swTab(this)">對於鍋爐業者</a></li>
            <li><a data-target="#adv4" onclick="swTab(this)">對於設備系統商</a></li>
        </ul>

        <div class="content">
            <div id="adv1" class="tab-c show">
                <h2>化學迴路燃燒程序</h2>
                <div class="context">
                    化學迴路燃燒程序（Chemical Looping Combustion, CLC）之原理為將燃料與空氣分離，
                    分成燃料反應器（Fuel reactor）以及空氣反應器(Air reactor)，並以稱作載氧體（Oxygen carrier）的金屬氧化物，
                    作為兩個氣反應器間氧化的媒介，由此可以達到高二氧化碳分離率或是氣體重組等多種燃燒應用，
                    同時亦為一種「無火燃燒」，可有效地減少氮氧化合物、硫氧化合物的產生並減少火焰所帶來的危險，
                    是種低成本、高能源效率、環境友善且可有效達到高二氧化碳捕獲率的新穎燃燒技術。
                </div>
                <div class="media-ctext">
                    <img src="/images/alliance/mask.jpg"
                         srcset="/images/alliance/mask@2x.jpg 2x,/images/alliance/mask@3x.jpg 3x"
                         class="Mask">
                    <img src="/images/alliance/mask.jpg"
                         srcset="/images/alliance/mask@2x.jpg 2x,/images/alliance/mask@3x.jpg 3x"
                         class="Mask">
                </div>
            </div>

            <div id="adv2" class="tab-c">
                <h2>對於資源回收商</h2>
                <div class="context">
                    化學迴路程序在不需消耗大量能量下，產生出高濃度二氧化碳與熱能，對產業經濟與環境保護層面而言，是一相當優良之循環經濟技術。
                </div>
                <div class="media-ctext">
                    <img src="/images/alliance/mask.jpg"
                         srcset="/images/alliance/mask@2x.jpg 2x,/images/alliance/mask@3x.jpg 3x"
                         class="Mask">
                    <img src="/images/alliance/mask.jpg"
                         srcset="/images/alliance/mask@2x.jpg 2x,/images/alliance/mask@3x.jpg 3x"
                         class="Mask">
                </div>
            </div>

            <div id="adv3" class="tab-c">
                <h2>對於鍋爐業者</h2>
                <div class="context">
                    化學迴路在燃燒過程中得以降低 NOx與 SOx之排放製程。
                </div>
                <div class="media-ctext">
                    <img src="/images/alliance/mask.jpg"
                         srcset="/images/alliance/mask@2x.jpg 2x,/images/alliance/mask@3x.jpg 3x"
                         class="Mask">
                    <img src="/images/alliance/mask.jpg"
                         srcset="/images/alliance/mask@2x.jpg 2x,/images/alliance/mask@3x.jpg 3x"
                         class="Mask">
                </div>
            </div>

            <div id="adv4" class="tab-c">
                <h2>對於設備系統商</h2>
                <div class="context">
                    實驗廠建置流程規劃與執行將可透過聯盟整合提供實際相關技術配合。
                </div>
                <div class="media-ctext">
                    <img src="/images/alliance/mask.jpg"
                         srcset="/images/alliance/mask@2x.jpg 2x,/images/alliance/mask@3x.jpg 3x"
                         class="Mask">
                    <img src="/images/alliance/mask.jpg"
                         srcset="/images/alliance/mask@2x.jpg 2x,/images/alliance/mask@3x.jpg 3x"
                         class="Mask">
                </div>
            </div>
        </div>

    </section>
    <section id="team" class="team">
        <h1>團隊成員</h1>
        <div class="under"></div>

        <ul class="grid">
            <li class="item">
                <img src="/images/member/default.jpg">
                <div class="left-line">
                    主持人
                    <span>郭俞麟</span>
                </div>
                <div> 臺科大機械系 教授 </div>
                <div> 常壓電漿製程技術與應用、中低溫型固態氧化物燃料電池材料元件開發、
                    化學迴路燃燒程序開發與應用、廢棄電子元件中之金屬回收、空氣電池材料開發 </div>
            </li>
            <li class="item">
                <img src="/images/member/default.jpg">
                <div class="left-line">
                    共同主持人
                    <span>顧洋</span>
                </div>
                <div> 臺科大化工系 教授 </div>
                <div> 高級氧化程序在污染防治應用之研究、螯合重金屬廢水之處理研究、有機氣體氧化處理之研究 </div>
            </li>
            <li class="item">
                <img src="/images/member/default.jpg">
                <div class="left-line">
                    共同主持人
                    <span>林昇佃</span>
                </div>
                <div> 臺科大化工系 教授 </div>
                <div> 燃料電池的電極觸媒研究、金觸媒的反應特性分析、甲醇縮合反應的測試與觸媒開發、功能性無機奈米結構材料製備 </div>
            </li>
            <li class="item">
                <img src="/images/member/default.jpg">
                <div class="left-line">
                    共同主持人
                    <span>曾堯宣</span>
                </div>
                <div> 臺科大化工系 副教授 </div>
                <div> 光觸媒材料合成、塗佈加工技術與室內與廠房空氣品質改善之應用、相間轉移觸媒催化技術、化學迴圈燃燒技術 </div>
            </li>
            <li class="item">
                <img src="/images/member/default.jpg">
                <div class="left-line">
                    共同主持人
                    <span>李豪業</span>
                </div>
                <div> 臺科大化工系 副教授 </div>
                <div> 綠色製程、反應蒸餾、共沸蒸餾、程序控制、程序設計及程序最適化 </div>
            </li>
        </ul>
    </section>

    <section id="member" class="member">
        <div class="force-bg-white">
            <img src="/images/alliance/welcome.png" data-rellax-speed="-7" data-rellax-percentage="0.8" class="bottom-img rellax">
        </div>
        <h1>會員列表</h1>
        <div class="under"></div>

        <div class="logos">
            <img src="/images/alliance/industry/uwin.png" srcset="/images/alliance/industry/uwin@2x.png 2x,/images/alliance/industry/uwin@3x.png 3x" class="layer">
            <img src="/images/alliance/industry/radium.png" srcset="/images/alliance/industry/radium@2x.png 2x,/images/alliance/industry/radium@3x.png 3x" class="layer">
            <img src="/images/alliance/industry/cte.png" srcset="/images/alliance/industry/cte@2x.png 2x,/images/alliance/industry/cte@3x.png 3x" class="layer">
        </div>

        <img src="/images/oval.svg" class="blur-obj rellax">
    </section>
    <section id="right" class="member-right">
        <div class="force-bg-white"></div>
        <h1>會員權益</h1>
        <div class="under"></div>

        <div class="level-list">
            <div class="level">
                <div class="lv-title">
                    <picture>
                        <source srcset="/images/alliance/sliver.svg" media="(min-width: 576px)">
                        <source srcset="/images/alliance/sliver-m.svg" media="(max-width: 576px)">
                        <img src="/images/alliance/sliver.svg" class="lv-icon">
                    </picture>
                    <span>銀質會員</span>
                </div>
                <ul>
                    <li>學界專家到場服務，一次/年</li>
                    <li>提供線上產學平台</li>
                    <li>參與技術論壇或研討會享五折優惠</li>
                    <li class="none">分析儀器委託測量服務 </li>
                    <li class="none">提供技術論壇擺攤攤位折扣</li>
                    <li class="none">提供企業博覽會攤位折扣</li>
                    <li class="none">協助策劃政府產學合作提案</li>
                </ul>
                <div class="price">NT$ <span>1</span> 萬元整</div>
            </div>
            <div class="level">
                <div class="lv-title">
                    <picture>
                        <source srcset="/images/alliance/titanium.svg" media="(min-width: 576px)">
                        <source srcset="/images/alliance/titanium-m.svg" media="(max-width: 576px)">
                        <img src="/images/alliance/platinum.svg" class="lv-icon">
                    </picture>
                    <span>金質會員</span>
                </div>
                <ul>
                    <li>學界專家到場服務，三次/年</li>
                    <li>提供線上產學平台</li>
                    <li>參與技術論壇或研討會享五折優惠</li>
                    <li>分析儀器委託測量服務 </li>
                    <li>提供技術論壇擺攤攤位折扣</li>
                    <li>提供企業博覽會攤位折扣</li>
                    <li class="none">協助策劃政府產學合作提案</li>
                </ul>
                <div class="price">NT$ <span>3</span> 萬元整</div>
            </div>
            <div class="level">
                <div class="lv-title">
                    <picture>
                        <source srcset="/images/alliance/platinum.svg" media="(min-width: 576px)">
                        <source srcset="/images/alliance/platinum-m.svg" media="(max-width: 576px)">
                        <img src="/images/alliance/titanium.svg" class="lv-icon">
                    </picture>
                    <span>白金會員</span>
                </div>
                <ul>
                    <li>學界專家到場服務，五次/年</li>
                    <li>提供線上產學平台</li>
                    <li>參與技術論壇或研討會享五折優惠</li>
                    <li>分析儀器委託測量服務 </li>
                    <li>提供技術論壇擺攤攤位折扣</li>
                    <li>提供企業博覽會攤位折扣</li>
                    <li>協助策劃政府產學合作提案</li>
                </ul>
                <div class="price">NT$ <span>5</span> 萬元整</div>
            </div>
        </div>
    </section>
    <!--未登入無法觀看企業需求 -->
    @if( Session::has('user') )
        <section id="industry" class="industry-req">
            <div class="force-bg"></div>
            <img src="/images/oval.svg" class="blur-obj rellax">
            <div class="req-title">
                <h1>企業需求</h1>
                <div class="under"></div>
            </div>
            <div class="req-list">
                <ul class="panel-group" id="accordion">
                    <!-- Ajax Add List -->
                </ul>
            </div>
        </section>
    @else
        <section class="join-us">
            <div class="force-bg-gray">
                <img src="/images/alliance/welcome.png" data-rellax-speed="-1" data-rellax-percentage="0.8" class="bottom-img rellax">
            </div>
            <h2>歡迎加入我們！</h2>
            <p class="context">簡述加入我們的文字簡述加入我們的文字簡述，加入我們的文字簡述加入我約40個字</p>
            <button class="btn-rad red" onclick="location.href='/register'">加入</button>
        </section>
    @endif

    <div class="float-box" >
        <ul id="tag-list">
            <li><a href="#introduce">聯盟介紹</a></li>
            <li><a href="#advantage">技術優勢</a></li>
            <li><a href="#team">團隊成員</a></li>
            <li><a href="#member">會員列表</a></li>
            <li><a href="#right">會員權益</a></li>
            <li><a href="#industry">企業需求</a></li>
        </ul>
        <button class=" nav-button collapsed" type="button" data-toggle="collapse" data-target="#tag-list" aria-controls="tag-list" aria-expanded="false" onclick="menu(this);">
            <div class="bar1"></div>
            <div class="bar3"></div>
        </button>
    </div>

    <script type="text/javascript">
        function swTab(item) {
            $('.tab li .active').removeClass('active');
            $('.tab-c.show').removeClass('show');

            item.classList.add('active');
            $(''+item.dataset.target).addClass('show');

            document.getElementById('select-list').classList.remove("active");
            document.getElementById('select-title').innerHTML = item.innerText + "<img src='/images/button_down.svg'>"
       }

        function selectTab(my_select) {
            $('.tab-c.show').removeClass('show');
            $(''+my_select.value).addClass('show');
        }

        function menu(btn) {
            btn.classList.toggle("change");
        }
        function select() {
            document.getElementById('select-list').classList.toggle("active");
        }
        function coll_right(_title) {
            _title.classList.toggle('active');
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <script type="text/javascript">
        // Accepts any class name
        let rellax = new Rellax('.rellax', {
            center: true
        });
    </script>

    <script type="text/javascript">
        window.onscroll = function() {scrollFunction()}
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("topBtn").style.display = "block";
            } else {
                document.getElementById("topBtn").style.display = "none";
            }
        }
    </script>

    <script>
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            url : '/industryreq',
            type: 'post',
            data: {alliance: 2},
            success: function (res) {
                //console.log(res);
                $('#accordion').html(res);
            },
            error : function (err) {
                console.log(err);
            }
        });

    </script>
@endsection