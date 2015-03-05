<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 最佳的IE兼容模式 -->
<title>Isoleader GRI Training System</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<!--link font awesome to use the icon-->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jqueryUI-1.11.1.js"></script>
</head>
<body>
<!-- 上方檔案 ↓ -->
<?php include 'top.php'; ?>

<div class="main main_width">
    <div><img src="images/b10/b10_banner.jpg"></div>
    <div class="width1024 b10_width">
        <div class="ci_title b10_title">與我們聯絡</div>
        <div class="ci_detail b7_detail b10_left">
           <div class="b10_detail_title1">ISO認證線上詢價，24h快速回覆！百大企業的選擇，也是您的選擇，歡迎洽詢</div>
           <div class="b10_detail_title2">領導力企管創下許多全國第一。國內ISO輔導資源最充足的顧問公司，協助您取得各項ISO認證，所有ISO認證問題找領導力企管就對了！我們的專業輔導能量，創下許多同業第一。</div>
           <div class="b10_detail_input">
                <div class="input_block">
                    <span class="holder">姓名或公司名<span class="red"> ﹙必填﹚</span></span>
                    <input id="name" class="b10_input" type="text" autocomplete="off">
                </div>
                <div class="input_block">
                    <span class="holder">電子信箱<span class="red"> ﹙必填﹚</span></span>
                    <input id="mail" class="b10_input" type="text" autocomplete="off">
                </div>
                <div class="input_block">
                    <select class="b10_select">
                        <option value="0">選擇詢價主旨</option>
                        <option value="1" color="black">選擇詢價主旨1</option>
                        <option value="2">選擇詢價主旨2</option>
                        <option value="3">選擇詢價主旨3</option>
                    </select>
                </div>
                <div class="input_block">
                    <select class="b10_select">
                        <option value="0">預計配合的驗證機構</option>
                        <option value="1">預計配合的驗證機構1</option>
                        <option value="2">預計配合的驗證機構2</option>
                        <option value="3">預計配合的驗證機構3</option>
                    </select>
                </div>
                <div class="input_block"><textarea class="b10_textarea" rows="10" placeholder="留言內容" autocomplete="off"></textarea></div>
           </div>
           <div class='b10_submit'>確認送出</div>
        </div>
        <div class="b7_right b10_right">
            <div class="b10_right_title">領導力企業管理顧問有限公司</div>
            <div class="b10_right_block">
                <div class="b10_right_block_title">台北</div>
                <div class="b10_right_block_detail">
                (02)2362-7919</br>
                台北市大安區浦城街13巷14號1樓
                </div>
            </div>
            <div class="b10_right_block">
                <div class="b10_right_block_title">台中</div>
                <div class="b10_right_block_detail">
                (04)2265-3849</br>
                台中市南區五權南路516號
                </div>
            </div>
            <div class="b10_right_block">
                <div class="b10_right_block_title">高雄</div>
                <div class="b10_right_block_detail">
                (07)7927-146</br>
                高雄市小港區新昌街21之23號
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 最底宣告 -->
<?php include 'foot.php'; ?>
</body>
</html>

<!--Script放後面加速頁面產生-->
<script type="text/javascript">
    $("span.holder + input").keyup(function() {
        if ($(this).val().length) {
            $(this).prev('span.holder').hide();
        } else {
            $(this).prev('span.holder').show();
        }
    });
    $("span.holder").click(function() {
        $(this).next().focus();
    });
    $(".b10_submit").click(function() {
        if (!$("#name").val()){
            alert("請輸入姓名或公司名");
            $("#name").focus();
            return false;
        }
        if (!$("#mail").val()){
            alert("請輸入電子信箱");
            $("#mail").focus();
            return false;
        }
    });
</script>