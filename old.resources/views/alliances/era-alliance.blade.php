@extends('layout.master')

@section('title', 'era-alliance')

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
    <h1>延展實境應用技術產學聯盟</h1>
    <p>Extended Reality Application Alliance</p>

    <div class="title">
        <h1>聯盟介紹</h1>
        <div class="under"></div>
        <p class="context">
            為整合國內與校內外跨系所之資訊科技與創新服務研發等相關研究資源，
            進行跨領域研究團隊組成與合作、全面性創新資訊服務應用產業界所殷切需求之人才培育、
            技術與產品創新研發以協助企業解決問題，進而加乘研發成果的潛在價值，以建立本校獨特特色、
            提升國內創新資訊服務應用產業人員技術及研發能力與創新能量、促進產業升級並引領國際，
            以提升國家的經濟發展之整體競爭力，爰設立本聯盟。
        </p>
        <p class="context">
            我們將匯集產學資源，聯合業界指標性公司，並整合各專長領域教授、
            研究人員組成菁英培育實驗室進行尖端、實用之產業相關之研發工作；
            計有第一類別：遊戲設計創新、遊戲互動模式、遊戲內容自動化生成、
            遊戲人工智慧、遊戲系統架構、遊戲繪圖與引擎技術開發領域；
            第二類別：AR、VR、MR與相關之電腦視覺、人機互動、機電整合系統等核心應用技術的開發領域；
            第三類別：大數據分析、電腦繪圖學、電腦視覺、人工智慧、深度學習、網路計算等核心基礎技術領域。
        </p>
    </div>
</section>



<section id="advantage" class="adv">
    <h1>技術優勢</h1>
    <div class="under"></div>

    <a id="select-title" onclick="select()">
        虛實整合
        <img src="/images/button_down.svg">
    </a>
    <ul id="select-list" class="tab">
        <li><a class="active" data-target="#adv1" onclick="swTab(this)">虛實整合</a></li>
        <li><a data-target="#adv2" onclick="swTab(this)">創新人機互動</a></li>
        <li><a data-target="#adv3" onclick="swTab(this)">實景重建技術</a></li>
        <li><a data-target="#adv4" onclick="swTab(this)">VR互動</a></li>
    </ul>

    <div class="content">
        <div id="adv1" class="tab-c show">

            <h2>虛實合成</h2>
            <div class="context">
                隨著電腦繪圖能力的進步，近期在深度學習領域興起一股在模擬環境(Simulation)中執行深度神經網路訓練與驗證的潮流，
                相對於由全虛擬物件產生的模擬結果，將現實影像當作場景並合成虛擬物件的虛實合成技術，不但大幅降低場景產生與變更的成本，
                現實影像更多的細節，也有助於深度學習學習到更接近使用情境的資料，另一方面，部分虛擬的物件也可以維持大量產生極端測資該項使用模擬環境的優點。
            </div>
            <div class="media-ctext">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/u7EViqJzn9I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/BH85gCksKu4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <h2>360影像虛擬光源合成</h2>
            <div class="context">
                由於人眼對於影像中光線資訊的變化是十分敏感，因此，不論是常見的擴增實境或是更進階的虛實整合，
                虛擬物件與現實場景光源的統一，都是結果是否真實十分重要的指標，
                藉由人工智慧偵測360影像中光源資訊，並可及時套用於虛擬物件上製造出正確的光影效果，甚至部分材質上有著環境的反射等，
                使虛擬物件能更加真實的與影像中場景合而為一。
            </div>
            <div class="media-ctext" style="justify-content: space-around;">
                <img src="/images/ERA/non_ibr.jpg" class="Mask">
                <img src="/images/ERA/ibr.jpg" class="Mask">
            </div>
        </div>

        <div id="adv2" class="tab-c">
            <h2>智慧手套</h2>
            <div class="context">
                人機互動科技在電腦科學中都是十分熱門的領域，從最原始的鍵盤滑鼠，到目前最新穎的Kinect，
                足可知道人機互動在電腦科學中一直都有舉足輕重的地位，而穿戴科技則是人機互動下一個重要發展指標，
                隨著google 眼鏡及各式各樣的健康手環上市，穿戴科技已經慢慢地開始萌芽，因此現階段將是切入的最好時機點。
                有鑒於此，我們希望能將穿戴科技作更廣泛的延伸，主持人利用低功率的中央控制器，實作出成本低廉的互動式手套。
            </div>
            <div class="media-ctext">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/ebXD7CzD__g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <img src="/images/ERA/gloves_news.jpg" class="Mask">
            </div>
            <h2>數位VR牙醫訓練評測系統</h2>
            <div class="context">
                該專案目的在於製作牙醫訓練虛擬裝置，將現實中的手部動作與手機位置真實反映在虛擬實境中。
                由於一般控制器只能在虛擬環境中表現其粗略的位置與轉向，
                無法真實地反映手指彎曲、伸張等細微的動作，亦無法完全將抓取、觸摸物體時物體的反應體現，
                而牙科訓練對於手勢、手指擺放位置與手指用力程度等都必須有適當要能偵測與反應，
                因此，結合上述「智慧手套」之技術進行手勢姿態的抓取，再利用磁力定位來捕捉牙科訓練時的細微操作，
                並反應於虛擬實境中，並提供自動評分、紀錄、多視角回放等功能，協助牙醫訓練教學。
            </div>
            <div class="media-ctext">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/sHnY4XIWwhA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div id="adv3" class="tab-c">
            <h2>Tango</h2>
            <div class="context">
                Tango手機藉由深度的資訊與區域學習(Area Learn)機制將實景重建成3D模型，
                藉由這些3D資訊可以讓程式更加理解現實的場域，從而達到精準且穩定的定位，
                甚至讓虛擬物件可與現實物件進行互動而達到混合實境(Mixed Reality，MR)的效果。
            </div>
            <div class="media-ctext">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/qYLpczJ8x2w" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/pHHy4MPvR9s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <h2>360室內場景重建(DuLa Net)</h2>
            <div class="context">
                過去幾年WebGL技術的成熟賦予了網頁顯示3D模型的能力，並大量被運用到展示或導覽等場域，
                其中3D模型需要花費大量的人力與時間來建置，像是室內導覽就需要根據場域各自建模，無疑提高整體成本，
                該技術利用深度學習技術賦予現實影像3D空間資訊藉此自動產生室內空間模型，為後續各式互動快速提供穩固的基礎。
            </div>
            <div class="media-ctext">
                <img src="/images/ERA/CVPR_2019_DuLa-Net.jpg" class="Mask">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/laBktb51t48" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div id="adv4" class="tab-c">
            <h2>VR互動遊戲</h2>
            <div class="context">
                虛擬實境(Virtual Reality)隨著硬體的逐漸改善，除了沉浸式的觀賞體驗，更提供全新的互動模式，
                你可以坐在高級跑車中享受街頭賽車的刺激，也可以穿越歷史或橫渡海洋來趟生態人文之旅，盡情享受各式奇幻的冒險，
                這也使得遊戲的操作不再侷限於按按鍵盤、動動滑鼠，藉由各式定位系統與客製化的輔具，可以真實的與場景中的3D物件互動，
                提供更佳的遊戲體驗。
            </div>
            <div class="media-ctext">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/XNrWYUgR0ug" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/cVGK_bmyscU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="media-ctext">
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/oXOvYbWgBH0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe class="VideoFrame" src="https://www.youtube.com/embed/RSSCCOlQpr0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

</section>



<section id="team" class="team">
    <h1>團隊成員</h1>
    <div class="under"></div>

    <ul class="grid">
        <li class="item">
            <img src="/images/member/Yao.jpg">
            <div class="left-line">
                主持人
                <span>姚智原</span>
            </div>
            <div> 臺科大資工系 副教授 </div>
            <div> 電腦圖學、電腦視覺、延展實境、人機互動、醫療影像3D重建 </div>
        </li>
        <li class="item">
            <img src="/images/member/Lin.jpg">
            <div class="left-line">
                共同主持人
                <span>林士勛</span>
            </div>
            <div> 海大資工系 助理教授 </div>
            <div> 電腦繪圖、資訊視覺化、圖形識別 </div>
        </li>
        <li class="item">
            <img src="/images/member/Lai.jfif">
            <div class="left-line">
                共同主持人
                <span>賴祐吉</span>
            </div>
            <div> 臺科大資工系 副教授 </div>
            <div> 電腦遊戲技術、電腦圖學、電腦影像生成、電腦動畫、3D模型重建、電腦視覺 </div>
        </li>
        <li class="item">
            <img src="/images/member/Hua.jfif">
            <div class="left-line">
                共同主持人
                <span>花凱龍</span>
            </div>
            <div> 臺科大資工系 教授 </div>
            <div> 多媒體大數據、深度學習、電腦視覺、行動多媒體應用、APP 程式開發 </div>
        </li>
        <li class="item">
            <img src="/images/member/Chu.jpg">
            <div class="left-line">
                共同主持人
                <span>朱宏國</span>
            </div>
            <div> 清華資工系 副教授 </div>
            <div> 計算機圖學、三維模型處理、貼圖紋理合成、視覺感知與應用 </div>
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
        <!-- <div class="level">
            <a class="lv-title" onclick="coll_right(this)">
                <picture>
                    <source srcset="/images/alliance/diamond.svg" media="(min-width: 576px)">
                    <source srcset="/images/alliance/diamond-m.svg" media="(max-width: 576px)">
                    <img src="/images/alliance/diamond.svg" class="lv-icon">
                </picture>
                <span>鑽石會員</span>
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
                <li>舉辦專屬攬才說明會(寒假、暑假各一次)</li>
                <li>產碩專班人才培育合作(1個免費名額)</li>
                <li>協助政府相關產學計畫提案合作</li>
                <li>每年依公司政策推薦合適教授媒合</li>
                <li>專人PM服務</li>
            </ul>
            <div class="price">NT$ <span>65</span> 萬元整</div>
        </div> -->
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