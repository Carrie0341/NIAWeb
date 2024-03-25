@extends('layout.master')

@section('title', 'sport-alliance')

@section('extra_head')
<script src="/js/rellax.min.js"></script>
@endsection

@section('content')
<!-- Banners -->
<div class="BG">
    <img src="/images/alliance/banner_l_01.png" class="ani-BG one rellax">
    <img src="/images/alliance/banner_l_02.png" data-rellax-speed="-4" class="ani-BG two rellax">
</div>
<a id="topBtn" class="go-to-top" onclick="topFunction()"><img src="/images/button_gotop.svg"></a>


<section id="introduce" class="intro">
    <label>Alliance</label>
    <h1>智能運動科技應用技術聯盟</h1>
    <p>Intelligent Sports Technology Application Alliance</p>

    <div class="title">
        <h1>聯盟介紹</h1>
        <div class="under"></div>
        <p class="context">
            本聯盟進行運動科技跨領域研究團隊之組成與合作，
            整合國立清華大學運動科技中心校內跨系所資源與友校國立臺灣科技大學數位內容研發中心跨校資源，
            共同培育運動科技應用產業界所殷切需求之人才，研發創新技術與產品，協助企業解決問題，
            進而加乘研發成果的潛在價值，並提升國內創新運動科技應用產業人員技術及研發能力，以建立聯盟獨特特色。
        </p>
        <p class="context">
            我們將整合團隊成員所累積之創新研發能量，促進產業升級並與國際接軌，
            以提升國家的運動科技經濟發展整體競爭力，相關研發成果亦將進一步導入健康照護產業。
            我們將匯集產學資源，聯合業界指標性公司與各專長領域教授、研究人員組成菁英培育實驗室進行尖端、
            實用之產業相關研發工作，包含智慧運動場館基礎建設（感測器部署、場館搭建、資料蒐集平台建置）、
            應用技術開發（XR技術、電腦視覺技術、電腦圖學技術）、
            其他核心技術應用（大數據分析、資料科學、人工智慧、深度學習、機器學習）。
        </p>
    </div>
</section>



<section id="advantage" class="adv">
    <h1>技術優勢</h1>
    <div class="under"></div>

    <a id="select-title" onclick="select()">
        影像分析輔助運動戰技解析
        <img src="/images/button_down.svg">
    </a>
    <ul id="select-list" class="tab">
        <li><a class="active" data-target="#adv1" onclick="swTab(this)">影像分析輔助運動戰技解析</a></li>
        <li><a data-target="#adv2" onclick="swTab(this)">延展實境輔助運動訓練</a></li>
        <li><a data-target="#adv3" onclick="swTab(this)">感測器輔助運動訓練</a></li>
        <li><a data-target="#adv4" onclick="swTab(this)">虛實整合輔助運動娛樂</a></li>
    </ul>

    <div class="content">
        <div id="adv1" class="tab-c show">

            <h2>籃球投籃分析</h2>
            <div class="context">
                提出一套精準籃球投籃分析系統，可應用於比賽分析、球員訓練和精彩片段生成。
                給定籃球比賽影片作為輸入，該系統首先偵測/切割候選投籃片段，
                然後即時地分析每個投籃候選片段的「投籃類型」、「投籃結果」和「球的狀態」。
                該方法有效運用球場物件的相對時空關聯性，與現有分析籃球投籃的方法相比，
                該算法可以更好地處理攝影機任意移動的影片，同時提高準確性。
            </div>
            <div class="media-ctext">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/tAY4gIYRazk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <img src="/images/SPORT/shoot_analysis.png" class="Mask">
            </div>

            <h2>籃球戰術分析</h2>
            <div class="context">
                基於鳥瞰軌跡或2D影像熱圖的籃球進攻戰術辨識及防守球員軌跡生成系統，
                由於目前的戰術識別方法大多基於鳥瞰軌跡訊息來學習球員的時空相關性，為了獲得正確的鳥瞰球員軌跡，
                強大的相機校準和球員追蹤技術是必不可少的。然而，對於攝影機來說，運動較大、球員遮擋嚴重、
                球員球衣相似的轉播影片，獲得準確的攝影機參數和球員追蹤結果具有很大的挑戰性，導致戰術分析性能較差。
                因此本研究亦設計一套不須應用攝影機校準和球員追蹤技術的戰術識別方法，
                在推理階段直接從2D攝影機影像的球員熱圖預測戰術類別。
                該方法達到了與當前依賴於完美鳥瞰圖軌跡輸入的戰術分類方法相當的精度。
            </div>
            <div class="media-ctext" style="justify-content: space-around;">
                <img src="/images/SPORT/tactical_analysis.jpg" class="Mask" style="width: 100%; height: auto;">
            </div>

            <h2>關鍵球員分析與事件偵測</h2>
            <div class="context">
                提出一個可執行即時事件偵測及關鍵人物分析的系統，提供球隊進行情報蒐集等應用。
                當今運動賽事正蓬勃發展，許多球隊為贏得比賽，皆透過情報蒐集了解對手優劣勢，以制定相應的戰術策略。
                然而，僅依靠基礎數據表(如整場比賽得分、各球員事件數量) 無法獲取球員比賽時較細節的資訊，
                使得球隊經常會聘請專業的分析師，藉由回放影片的方式重新定位事件發生的時間點與球員動態。
                這樣的方式極度耗費人力成本，因此團隊提出混合式方法，在兼顧執行速度的同時也能達到足夠的準度，
                透過粗略事件切分模組以及關鍵人物偵測模組，來達到初步的結果預測，之後使用該兩者資訊獲得最後精確之結果，
                包含事件種類及發生時間、對應該事件之動作人物以及關鍵人物資訊。
            </div>
            <div class="media-ctext" style="justify-content: space-around;">
                <img src="/images/SPORT/key_player.png" class="Mask" style="width: 100%; height: auto;">
            </div>

            <h2>即時投籃熱點分析</h2>
            <div class="context">
                提出一個可利用球場視角影像來分析投籃事件與投籃位置的即時投籃熱點分析系統，
                其分析的投籃事件包含兩分球、三分球、罰球事件。近年來，資訊技術已成為各種運動賽事中必不可少的一部分，
                藉由攝影機擷取場上的資訊，並透過電腦視覺和人工智慧技術對影片進行分析，使運動賽事可以提供更豐富的運動數據。
                這些數據的分析和應用，可以讓運動賽事在不同方面上得到更多的發展和進步。團隊提出一個將轉播視角相機拍攝之籃球影像，
                透過深度神經網路模組來預測投籃事件和投籃位置的系統。
            </div>
            <div class="media-ctext" style="justify-content: space-around;">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/gA2JbanK05c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <img src="/images/SPORT/omniscorer.png" class="Mask">
            </div>
        </div>

        <div id="adv2" class="tab-c">
            <h2>戰術訓練</h2>
            <div class="context">
                提出一個基於虛擬實境的戰術訓練系統，以提高球員理解進攻戰術的能力並幫助其正確練習戰術。
                教練可透過電子戰術板繪製戰術，系統自動將二維的戰術軌跡資訊轉換為三維的虛擬球員動畫，
                透過虛擬實境頭盔即可由任意視角觀看虛擬球員在球場上跑動的過程。
                使用者可使用第一人稱視角從某一特定球員的視角觀戰戰術跑動時的細節資訊
                (例如視野範圍內其他隊友何時何地會有空檔機會、當隊友幫忙擋人時自己該如何跑動才能在隊友幫忙製造出的有限空間中順利被掩護)，
                也可使用第三人稱視角觀看戰術全局如何跑動，提供不同程度沉浸感的訓練效果。
                同時，為了驗證使用沉浸式頭盔進行戰術教學與訓練能比用傳統戰術板的方法得到更好的學習成效，
                也開發輕量化的多攝影機球員追蹤系統，記錄和分析每個球員在戰術執行過程中的軌跡。
                基於多項主觀量測(包括模擬器暈動症、存在感和運動意象能力)，我們已驗證高沉浸式戰術訓練可以提高運動員的戰略想像能力。
            </div>
            <div class="media-ctext">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/-9uvrFCxy8Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <img src="/images/SPORT/Training-Assistant.png" class="Mask">
            </div>
            <h2>視野訓練</h2>
            <div class="context">
                提出了一套沉浸式籃球視野訓練系統，不僅訓練球員的視野，還要求球員穩定運球，模仿真實籃球比賽的情況。
                於運動員來說，視野訓練是贏得體育比賽的關鍵之一，傳統的視覺訓練方法適合只專注於球的運動。
                然而，對於籃球來說，球員需要在球場上同時觀察多個移動物體（即球和球員）。
                該系統允許使用者配戴虛擬實境頭盔時，可直接基於手勢和語音(而不是控制器)進行系統操作，
                更直觀地與系統互動。系統更可根據受訓者選擇的訓練配置來模擬訓練場景，
                並蒐集使用者訓練當下的影片及其於虛擬實境中的眼球運動軌跡，藉此分析受訓者的目光專注區域、運球動作和運球次數，
                進而分析使用者視野訓練之成效。
            </div>
            <div class="media-ctext">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/EQ0i3dVtB9g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <img src="/images/SPORT/vision-training.png" class="Mask">
            </div>
            <h2>進攻動作訓練</h2>
            <div class="context">
                提出了一種利用虛擬實境和動作辨識的籃球動作感知進攻決策訓練系統。動作決策在籃球進攻中有著至關重要的作用，
                進攻球員必須在各種防守情況下做出有效的動作決策才能較容易進攻得分。我們創建可控制、
                可重複練習的訓練場景來增強運動員做出最佳決策的能力。使用者於虛擬實境中將觀看不同的虛擬防守者防禦情境，
                並需要即時做出對應的進攻動作，系統會根據使用者所穿戴的感測器裝置來辨識其進攻動作為何，如做出錯誤決策時會收到決策建議。
            </div>
            <div class="media-ctext">
                <img src="/images/SPORT/offensive-training.png" class="Mask" style="width: 100%; height: auto;">
            </div>
            <h2>拳擊距離訓練</h2>
            <div class="context">
                提出了一套專為提升拳擊距離感而設計的虛擬實境訓練系統，藉由與拳擊專業人士進行需求訪談後，
                了解拳擊比賽的致勝關鍵在於擁有良好的距離感以觀察對手出拳的時機、距離、角度與速度，並做出相對應的反應。
                為了克服現有距離感訓練方式之空間與時間的限制，引入虛擬實境技術，設計並整合了各種視覺和聽覺輔助工具，
                並提供豐富的反饋機制。團隊也將此虛擬實境拳擊距離訓練系統提供給專業的拳擊教練體驗，
                驗證該系統能被融入日常訓練中，提供選手進行自主訓練，從而提高拳擊選手的整體訓練效果和表現。
            </div>
            <div class="media-ctext">
                <img src="/images/SPORT/boxing.png" class="Mask" style="width: 100%; height: auto;">
            </div>
        </div>

        <div id="adv3" class="tab-c">
            <h2>裁判動作訓練</h2>
            <div class="context">
                提出了一套基於多個慣性測量單元（IMU）感測器的動作辨識方法，
                透過感測器可以記錄肢體的加速度和角加速度訊號，並加以分析理解其動作為何。
                該系統採用了籃球官方裁判信號，高達65種手勢，包括大動作手部動作和細微動作手部動作，
                來進行動作辨識任務。經由實驗也證實該系統可以有效地增強使用者的裁判動作判決能力。
            </div>
            <div class="media-ctext">
                <img src="/images/SPORT/referee.png" class="Mask" style="width: 100%; height: auto;">
            </div>
        </div>

        <div id="adv4" class="tab-c">
            <h2>虛擬廣告擴增編輯器</h2>
            <div class="context">
                提出了一套可針對運動影片進行虛擬廣告編輯的系統，為了讓使用者更好地操作此編輯器，
                將編輯器移植至網頁系統，同時針對功能部分新增了素材清單，
                讓使用者可以透過拖放方式將素材庫中的圖片新增到畫面中，也於編輯介面讓使用者能夠調整圖片的大小、
                位置和旋轉等參數，以便更符合使用者需求來放置圖片。由於系統中新增了廣告看板和觀眾區域，
                因此在放置圖片時，會根據各區域的重建參數進行擺放，使圖片能夠與各區塊的平面貼合得更為自然。
                透過該系統，即可在一般運動影片內置入不過於突兀的3D虛擬廣告。
            </div>
            <div class="media-ctext">
                <img src="/images/SPORT/virtual.png" class="Mask" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>

</section>



<section id="team" class="team">
    <h1>團隊成員</h1>
    <div class="under"></div>

    <ul class="grid">
        <li class="item">
            <img src="/images/member/MCHu.jpg">
            <div class="left-line">
                主持人
                <span>胡敏君</span>
            </div>
            <div> 清華資工系 教授 </div>
            <div> 電腦圖學、電腦視覺、延展實境、人機互動 </div>
        </li>
        <li class="item">
            <img src="/images/member/Chu.jpg">
            <div class="left-line">
                共同主持人
                <span>朱宏國</span>
            </div>
            <div> 清華資工系 教授 </div>
            <div> 計算機圖學、三維模型處理、貼圖紋理合成、視覺感知與應用 </div>
        </li>
        <li class="item">
            <img src="/images/member/Pan.png">
            <div class="left-line">
                共同主持人
                <span>潘則佑</span>
            </div>
            <div> 臺科大資工系 助理教授 </div>
            <div> 多媒體內容分析、電腦視覺、人機互動、延展實境 </div>
        </li>
    </ul>
</section>


<section id="member" class="member">
    <div class="force-bg-white"></div>
    <h1>會員列表</h1>
    <div class="under"></div>

    <div class="logos">
        {{--<img src="/images/alliance/industry/iStage.png" srcset="/images/alliance/industry/iStage@2x.png 2x,/images/alliance/industry/iStage@3x.png 3x" class="layer">--}}
        {{--<img src="/images/alliance/industry/cte.png" srcset="/images/alliance/industry/cte@2x.png 2x,/images/alliance/industry/cte@3x.png 3x" class="layer">--}}
        {{--<img src="/images/alliance/industry/tpk.png" srcset="/images/alliance/industry/tpk@2x.png 2x,/images/alliance/industry/tpk@3x.png 3x" class="layer">--}}
        {{--<img src="/images/alliance/industry/igs.png" srcset="/images/alliance/industry/igs@2x.png 2x,/images/alliance/industry/igs@3x.png 3x" class="layer">--}}
    </div>

    <img src="/images/oval.svg" class="blur-obj rellax">
</section>


<!-- 會員權益 -->
<section id="right" class="member-right">
    <div class="force-bg-white"></div>
    <h1>會員權益</h1>
    <div class="under"></div>

    <div class="level-list">
        <div class="level">
            <a class="lv-title" onclick="coll_right(this)">
                <picture>
                    <source srcset="/images/alliance/sliver.svg" media="(min-width: 576px)">
                    <source srcset="/images/alliance/sliver-m.svg" media="(max-width: 576px)">
                    <img src="/images/alliance/sliver.svg" class="lv-icon">
                </picture>
                <span>金質會員</span>
                <picture>
                    <source srcset="/images/empty.png" media="(min-width: 576px)">
                    <source srcset="/images/button_plus.svg" media="(max-width: 576px)">
                    <img src="" class="lv-toggle">
                </picture>
            </a>
            <ul>
                <li>產學合作服務</li>
                <li>提供線上產學平台(企業需求提案)</li>
                <li>參與技術論壇/研討會(報名費打5折)</li>
                <li class="none">舉辦專屬攬才說明會</li>
                <li class="none">產碩專班人才培育合作</li>
                <li class="none">協助政府相關產學計畫提案合作</li>
                <li class="none">每年依公司政策推薦合適教授媒合</li>
                <li class="none">專人PM服務</li>
            </ul>
            <div class="price">NT$ <span>1</span> 萬元整</div>
        </div>
        <div class="level">
            <a class="lv-title" onclick="coll_right(this)">
                <picture>
                    <source srcset="/images/alliance/platinum.svg" media="(min-width: 576px)">
                    <source srcset="/images/alliance/platinum-m.svg" media="(max-width: 576px)">
                    <img src="/images/alliance/platinum.svg" class="lv-icon">
                </picture>
                <span>白金會員</span>
                <picture>
                    <source srcset="/images/empty.png" media="(min-width: 576px)">
                    <source srcset="/images/button_plus.svg" media="(max-width: 576px)">
                    <img src="" class="lv-toggle">
                </picture>
            </a>
            <ul>
                <li>產學合作服務</li>
                <li>提供線上產學平台(企業需求提案)</li>
                <li>參與技術論壇/研討會(免報名費)</li>
                <li>舉辦專屬攬才說明會(需自費)</li>
                <li>產碩專班人才培育合作</li>
                <li class="none">協助政府相關產學計畫提案合作</li>
                <li class="none">每年依公司政策推薦合適教授媒合</li>
                <li class="none">專人PM服務</li>
            </ul>
            <div class="price">NT$ <span>5</span> 萬元整</div>
        </div>
        <div class="level">
            <a class="lv-title" onclick="coll_right(this)">
                <picture>
                    <source srcset="/images/alliance/titanium.svg" media="(min-width: 576px)">
                    <source srcset="/images/alliance/titanium-m.svg" media="(max-width: 576px)">
                    <img src="/images/alliance/titanium.svg" class="lv-icon">
                </picture>
                <span>鈦金會員</span>
                <picture>
                    <source srcset="/images/empty.png" media="(min-width: 576px)">
                    <source srcset="/images/button_plus.svg" media="(max-width: 576px)">
                    <img src="" class="lv-toggle">
                </picture>
            </a>
            <ul>
                <li>產學合作服務</li>
                <li>提供線上產學平台(企業需求提案)</li>
                <li>參與技術論壇/研討會(免報名費)</li>
                <li>舉辦專屬攬才說明會(暑假一次)</li>
                <li>產碩專班人才培育合作</li>
                <li>協助政府相關產學計畫提案合作</li>
                <li class="none">每年依公司政策推薦合適教授媒合</li>
                <li class="none">專人PM服務</li>
            </ul>
            <div class="price">NT$ <span>10</span> 萬元整</div>
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


<!-- Floating menu -->
<div class="float-box">
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
        $('' + item.dataset.target).addClass('show');

        document.getElementById('select-list').classList.remove("active");
        document.getElementById('select-title').innerHTML = item.innerText + "<img src='/images/button_down.svg'>"
    }

    function selectTab(my_select) {
        $('.tab-c.show').removeClass('show');
        $('' + my_select.value).addClass('show');
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
    window.onscroll = function() {
        scrollFunction()
    }

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
        url: '/industryreq',
        type: 'post',
        data: {
            alliance: 1
        },
        success: function(res) {
            //console.log(res);
            $('#accordion').html(res);
        },
        error: function(err) {
            console.log(err);
        }
    });
</script>
@endsection
