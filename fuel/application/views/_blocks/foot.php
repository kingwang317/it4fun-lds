<style>
.foot{
    width:100%;
    text-align:center;
    background-color:#3e3e3e;
    color:#c5c5c5;
    margin: 0px auto;
    padding:30px 0 30px 0;

}
.foot_block_all{
    text-align:left;
}
.foot_block{
    text-align:left;
    display:inline-block;
    width:170px;
    vertical-align:top;
    padding:0;
    padding-bottom:30px;
}
.title{
    font-size:16px;
    font-weight:bold;
    line-height:36px;
    
}
.contact{
    font-size:13px;
    line-height:36px;
    color:#888;
    text-align:left;
}
.contact_end{
    font-size:13px;
    line-height:26px;
    color:#888;
    text-align:left;
    width:1000px;
}
.contact a{
    color:#888;
}
.contact a:hover{
    color:#c5c5c5;
}
.foot_end{
    align:center;
    font-size:13px;
}
.main_foot{
    margin: 0px auto;
    max-width:1024px;
    
}
.end_left{
    display:inline-block;
    margin-right:50px;
    text-align:left;
}
.end_right{
    display:inline-block;
    text-align:left;
}
.contact .fa{
    padding:0 10px 0 20px;
}
</style>
<!-- Foot -->
<div id="foot" class="foot">
    <div class="main_foot">
    <div class="foot_block_all">
        <div class="foot_block">
            <div class="title">關於我們</div>
            <div class="contact"><a href="<?php echo site_url() ?>team_info">專業ISO認證輔導</a></div>
            <div class="contact"><a href="http://www.isoleader.com.tw/phpBB3/">ISO認證討論區</a></div>
        </div>
        <div class="foot_block">
            <div class="title">ISO認證輔導</div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_coach_list/73">品質管理</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_coach_list/74">食品安全</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_coach_list/75">驗廠與社會責任</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_coach_list/76">環境管理系列</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_coach_list/77">供應鏈安全</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_coach_list/78">資訊安全</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_coach_list/79">風險管理</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_coach_list/104">神秘客認證</a></div>
        </div>
        <div class="foot_block">
            <div class="title">最新消息</div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_succcase">輔導實績</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_news">ISO條文改版</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_news">免費課程</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_news">ISO認證常見問答</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_news">推薦閱讀</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>home/iso_news">產業新聞</a></div>
        </div>
        <div class="foot_block">
            <div class="title">ISO教育訓練</div>
            <div class="contact"><a href="<?php echo site_url() ?>iso_train">免費課程</a></div>
            <div class="contact"><a href="<?php echo site_url() ?>iso_train">收費課程</a></div>

        </div>
    </div>

    <?php
    //啟動 session
    session_start() ;
    session_register("counter") ;

    //訪客計數器-------------------------------
    if(!isset($_SESSION["counter"]))
    {
     //如果 $_SESSION["counter"] 不存在
     //讀取文字檔中的內容
     $count=file("counter.txt") ;
     $_SESSION["counter"]=$count[0] ;
     $_SESSION["counter"]++ ;

     //以寫入模式開啟文字檔
     //並將資料寫回文字檔
     $findex=fopen("counter.txt","w") ;
     fwrite($findex,$_SESSION["counter"]) ;
    }

    //echo "您是本站的第 <font color=#0000ff>".$_SESSION["counter"]."</font> 位貴賓！" ;
    ?>
    <div class="foot_end">
        <div class="contact_end">
            Copyright ⓒ 2015 Leadership, All Rights Reserved. 領導力企業管理顧問有限公司版權所有&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-phone"></span> 0800-222-007&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-envelope"></span> service@isoleader.com.tw
            <br>
            台北 02-25039035 台北市中山區建國北路二段87號2樓&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;台中 04-2265-3849 台中市南區五權南路516號&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;高雄 07-79278-146 高雄市小港區新昌街21之23號
            <br>
            法律顧問：正力法律事務所 吳永茂律師&nbsp;&nbsp;&nbsp;&nbsp;訪客人數：<?php echo  str_pad($_SESSION["counter"]+888888,8,'0',STR_PAD_LEFT); ?>(計數器)
        </div>
    </div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.3&appId=134756176598619";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</div>