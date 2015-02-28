<script type="text/javascript" src="js/jquery.sticky.js"></script>
<style>
.top{
    margin: 0px auto;
    text-align:center;
}
.top_width_1024{
    width:1024px;
    margin: 0px auto;
    text-align:left;
    border-bottom:solid 1px #ff9a9a;
    padding:24px 0 20px 0;
    font-size:10px;
}
.top_menu{
    font-size:13px;
    color:#4e4e4e;
    padding:0px 12px 0px 10px;
}
.top_menu a:hover{
    color:red;
}
#menu{
    padding-left:14px;
}
.main_title{
    width:1024px;
    margin: 0px auto;
    text-align:left;
    display:inline-block;
    padding:20px 0 0 0;
}
.search .fa{
    padding-right:2px;
}
.search{
    color:#b5b5b5;
    height:25px;
    line-height:25px;
    vertical-align: middle;
    float:right;
    width:250px;
    padding:5px;
    border:solid 1px #ccc;
    border-radius: 2px;
    -moz-border-radius: 2px; 
    -webkit-border-radius: 2px;
    margin-top:-10px;
}
.top_title{
    margin: 0px auto;
    align:center;
    z-index: 1; 
}
.top_title li{
    font-size:15px;
    color:#202020;
}
.logo{
    background-image:url("images/logo.png");
    height:44px;
    width:216px;
    display:inline-block;
}
.menu{
    display:inline-block;
    vertical-align:top;
    padding:14px 0 0 0;

}
.top_title_menu{
    padding:0 30px 0 0;
    display:inline-block;
    height:50px;
    position:relative;

}
.top_title_menu a:hover{
    color:#ed1b23;
}
.top_title_menu ul {
    font-size:14px;
    -moz-border-radius: 2px; 
    -webkit-border-radius: 2px;
    height:auto;
    border:solid 1px #ccc;
    position: absolute;
    top:20px;
    display:none;
    background-color:#FeFeFe;
    z-index:1;
    padding:0 20px 30px 0 ;
    width:310px;
}
.top_title_menu ul li{
    padding:20px 0 0 20px;
}
.top_title_scroll{
    -webkit-box-shadow: 0 1px 10px gray;
    -moz-box-shadow: 0 1px 10px gray;
    box-shadow: 0 1px 10px gray;
    border-top:solid 1px red;
    height:80px;
}
.top_title_scroll .top_title_menu ul {
    top:28px;
}
.second_menu{
    margin-top:30px;
}
.arrow_t_int{
    width:0px;
    height:0px;
    border-width:10px;
    border-style:solid;
    border-color:transparent transparent #333 transparent ;
    position:absolute;
    top:-20px;
    left:20px;
}

.arrow_t_out{
    width:0px;
    height:0px;
    border-width:10px;
    border-style:solid;
    border-color:transparent transparent #fff transparent ;
    position:absolute;
    top:-20px;
    left:20px;
}
::-webkit-search-cancel-button{
    -webkit-appearance: none;
}
::-webkit-search-cancel-button:after {
    content: '';
    display: block;
    width: 14px;
    height: 10px;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAn0lEQVR42u3UMQrDMBBEUZ9WfQqDmm22EaTyjRMHAlM5K+Y7lb0wnUZPIKHlnutOa+25Z4D++MRBX98MD1V/trSppLKHqj9TTBWKcoUqffbUcbBBEhTjBOV4ja4l4OIAZThEOV6jHO8ARXD+gPPvKMABinGOrnu6gTNUawrcQKNCAQ7QeTxORzle3+sDfjJpPCqhJh7GixZq4rHcc9l5A9qZ+WeBhgEuAAAAAElFTkSuQmCC);
    background-repeat: no-repeat;
    background-size: 12px;
    background-position: top left;
}
</style>
<div class="top main_width">
    <div class="top_width_1024">
    <span class='top_menu' style="padding-left:0;"><a href="b17.php">關於我們</a></span>| 
    <span class='top_menu'><a href="b6.php">CI設計</a></span>| 
    <span class='top_menu'><a href="b9.php">ISO教育訓練</a></span>| 
    <span class='top_menu'><a href="b2.php">ISO輔導項目</a></span>| 
    <span class='top_menu'><a href="http://www.isoleader.com.tw/phpBB3/" onclick="window.open(this.href);
            return false;">討論區</a></span>| 
    <span class='top_menu'><a href="b7.php">ISO小學堂</a></span>| 
    <span class='top_menu'><a href="b4.php">最新消息</a></span>| 
    <span class='top_menu'><a href="b10.php">與我們聯絡</a></span>
    <span class="search" ><span class="fa fa-search"> </span><input type="search" id="search_box" style="height:15px;width:230px; background-color:#fafafa;" placeholder="關鍵字搜尋" autocomplete="off"></span>
    </div>
</div>
<div id="sticky" class="top_title main_width">
    <div class="main_title">
        <a href="index.php"><div class="logo"></div></a>
        <div class="menu">
            <ul id="menu">
                <li class="top_title_menu"><a href="#">品質管理</a>
                    <ul class="second_menu">
                        <span class="arrow_t_int"></span>
                        <span class="arrow_t_out"></span>
                        <li><a href="b3_c.php">什麼是 ISO 14971 醫療器材風險管理？</a></li>
                        <li><a href="b3_d.php">ISO 9001：2008 品質管理系統</a></li>
                        <li><a href="#">SGS Qualicert 服務驗證</a></li>
                        <li><a href="#">ISO 17025：2005實驗室認證</a></li>
                        <li><a href="#">ISO/TS 16949：2009汽車業品質管理系統</a></li>
                        <li><a href="#">IECQ QC080000：2012HSPM有害物質流程管理系統</a></li>
                        <li><a href="#">ISO 13485：2003（EN ISO 13485:2012）醫療器材品質管理系統</a></li>
                        <li><a href="#">TL9000通訊電子業品質管制系統</a></li>
                        <li><a href="#">ISO 29990 ︰2010 學習服務品質管理系統</a></li>
                        <li><a href="#">ISO 20121︰2012 公眾活動永續經營管理系統</a></li>
                    </ul>
                </li>
                <li class="top_title_menu"><a href="#">食品安全</a>
                    <ul class="second_menu">
                        <span class="arrow_t_int"></span>
                        <span class="arrow_t_out"></span>
                        <li><a href="#">食品安全品質標準（Safe Quality Food，SQF）</a></li>
                        <li><a href="#">BRC 英國零售商管理系統</a></li>
                        <li><a href="#">HACCP 危害分析重要管制點系統</a></li>
                        <li><a href="#">ISO 22000：2005 食品安全管理系統</a></li>
                        <li><a href="#">FSSC 22000 食品安全系統驗證標準</a></li>
                    </ul>
                </li>
                <li class="top_title_menu"><a href="#">驗廠&社會責任</a>
                    <ul class="second_menu">
                        <span class="arrow_t_int"></span>
                        <span class="arrow_t_out"></span>
                        <li><a href="#">CSR 報告書編製，依據 GRI G4.0版 ＆ AA1000 標準撰寫</a></li>
                        <li><a href="#">EICC 電子產業行為準則 4.0版</a></li>
                        <li><a href="#">ISO 26000 社會責任指引</a></li>
                        <li><a href="#">迪士尼驗廠 Disney ILS Audit Checklist</a></li>
                        <li><a href="#">Wal-Mart 沃爾瑪驗廠</a></li>
                        <li><a href="#">SA 8000社會責任管理系統</a></li>
                        <li><a href="#">BSCI 企業社會責任準則</a></li>
                        <li><a href="#">ICTI 驗廠</a></li>
                    </ul>
                </li>
                <li class="top_title_menu"><a href="#">環境管理</a>
                    <ul class="second_menu">
                        <span class="arrow_t_int"></span>
                        <span class="arrow_t_out"></span>
                        <li><a href="#">ISO 14001：2015 （DIS版）環境管理系統</a></li>
                        <li><a href="#">FSC 森林管理委員會認證</a></li>
                        <li><a href="#">ISO 50001：2011能源管理系統</a></li>
                        <li><a href="#">ISO 14064-1溫室氣體盤查標準</a></li>
                    </ul>
                </li>
                <li class="top_title_menu"><a href="#">供應鏈安全</a>
                    <ul class="second_menu">
                        <span class="arrow_t_int"></span>
                        <span class="arrow_t_out"></span>
                        <li><a href="#">ISO 28000：2007 供應鏈安全管理系統</a></li>
                        <li><a href="#">C-TPAT美國海關商貿反恐聯盟</a></li>
                        <li><a href="#">AEO安全認證優質企業</a></li>
                    </ul>
                </li>
                <li class="top_title_menu"><a href="#">風險管理</a>
                    <ul class="second_menu">
                        <span class="arrow_t_int"></span>
                        <span class="arrow_t_out"></span>
                        <li><a href="#">ISO 27001：2013 資訊安全管理系統</a></li>
                        <li><a href="#">OHSAS 18001職業安全衛生管理系統</a></li>
                        <li><a href="#">ISO 31000 : 2009 風險管理系統</a></li>
                        <li><a href="#">ISO 22301 營運持續管理系統</a></li>
                    </ul>
                </li>
                <li class="top_title_menu"><a href="#">資訊安全</a>
                    <ul class="second_menu">
                        <span class="arrow_t_int"></span>
                        <span class="arrow_t_out"></span>
                        <li><a href="#">ISO 27001：2013 資訊安全管理系統</a></li>
                        <li><a href="#">BS 10012：2009 個人資料管理系統</a></li>
                        <li><a href="#">TPIPAS臺灣個人資料保護與管理制度規範</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
        $('.top_title_menu').on({
            mouseover: function() {
                $('ul', this).fadeIn(100);
            },
            mouseleave: function() {
                $('ul', this).fadeOut(100);
            }
        });
        $(".top_title").sticky({topSpacing: 0, center: true, className: "top_title_scroll"});

        $("#search_box").keypress(function(e) {
            code = (e.keyCode ? e.keyCode : e.which);
            //if enter key is pressed
            if (code == 13) {
                //click the button and go to page
               window.location = "b15.php";
            }
        });
</script>
