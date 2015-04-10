<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 最佳的IE兼容模式 -->
<title>Isoleader GRI Training System</title>
<link href="<?php echo site_url()?>assets/templates/css/main.css" rel="stylesheet" type="text/css" />
<!--link font awesome to use the icon-->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jqueryUI-1.11.1.js"></script>
</head>
<body>
<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>

<div class="main main_width">
    <div class="page_banner" style="background-image:url(<?php echo site_url()?>assets/templates/images/banner_about.jpg);"></div>
         <!--<img src="<?php echo site_url()?>assets/templates/images/banner_about.jpg"></div>-->
    
    <div class="width1024 b10_width">
        <div class="ci_title b10_title">與我們聯絡</div>
        <div class="b10_detail_title1"  style="width:600px;">ISO認證線上詢價，24h快速回覆！百大企業的選擇，也是您的選擇，歡迎洽詢</div>
        <div class="ci_detail b7_detail b10_left">
           <!--<div class="b10_detail_title2">領導力企管創下許多全國第一。國內ISO輔導資源最充足的顧問公司，協助您取得各項ISO認證，所有ISO認證問題找領導力企管就對了！我們的專業輔導能量，創下許多同業第一。</div>-->
           <div class="b10_detail_input">
            <form method="post" action="<?php echo $do_contact_url?>" id="form_contact" >
                <div class="input_block">
                    <span class="holder">姓名<span class="red"> ﹙必填﹚</span></span>
                        <input id="name" name="name" class="b10_input" type="text" autocomplete="off">
                        <input id="radio1" type="radio" name="sex" value="male" checked="checked">
                        <label for="radio1"><span><span></span></span><div  class="b10_radio">先生</div></label>
                        <input id="radio2" type="radio" name="sex" value="female">
                        <label for="radio2"><span><span></span></span><div  class="b10_radio">小姐</div></label>
                </div>
                <div class="input_block">
                    <span class="holder">公司名稱<span class="red"> ﹙必填﹚</span></span>
                    <input id="company_name" name="company_name" class="b10_input" type="text" autocomplete="off">
                </div>
                <div class="input_block">
                    <span class="holder">電話號碼<span class="red"> ﹙必填﹚</span></span>
                    <input id="number" name="number" class="b10_input" type="text" autocomplete="off">
                </div>
                <div class="input_block">
                    <span class="holder">電子信箱<span class="red"> ﹙必填﹚</span></span>
                    <input id="mail" name="email" class="b10_input" type="text" autocomplete="off">
                </div>
                <div class="input_block">
                    <span class="holder">公司人數<span class="red"> ﹙必填﹚</span></span>
                    <input id="company_num" name="company_num" class="b10_input" type="text" autocomplete="off">
                </div>
                <div class="input_block">
                    <select class="b10_select" id="inquiry_topic" name="inquiry_topic">
                        <!-- <option value="0">選擇詢價主旨</option>
                        <option value="1" color="black">選擇詢價主旨1</option>
                        <option value="2">選擇詢價主旨2</option>
                        <option value="3">選擇詢價主旨3</option> -->
                        <option value="">您想申辦哪一類服務？</option>
                        <?php if (isset($inquiry_topic)): ?>
                            <?php foreach ($inquiry_topic as $key => $value): ?>
                                
                                <option value="<?php echo $value->code_id ?>"><?php echo $value->code_name ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>
                <div class="input_block">
                    <select class="b10_select" id="coor_unit" name="coor_unit">
                      <!--   <option value="0">預計配合的驗證機構</option>
                        <option value="1">預計配合的驗證機構1</option>
                        <option value="2">預計配合的驗證機構2</option>
                        <option value="3">預計配合的驗證機構3</option> -->
                        <option value="">您想選擇哪家驗證機構？</option>
                        <?php if (isset($coor_unit)): ?>
                            <?php foreach ($coor_unit as $key => $value): ?>
                                <option value="<?php echo $value->code_id ?>"><?php echo $value->code_name ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>
                <div class="input_block"><textarea name="msg" id="msg" class="b10_textarea" rows="10" placeholder="留言內容" autocomplete="off"></textarea></div>
            </form>
           </div>
           <div class='b10_submit'>確認送出</div>
        </div>
        <div class="b7_right b10_right">
            <div class="b10_right_title">領導力企業管理顧問有限公司</div>
            <div class="b10_right_block">
                <div class="b10_right_block_title">台北</div>
                <div class="b10_right_block_detail">
                (02)2503-9036</br>
                台北市中山區建國北路二段87號2樓
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
<?php  $this->load->view('_blocks/foot')?>
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
            alert("請輸入姓名");
            $("#name").focus();
            return false;
        }
        if (!$("#mail").val()){
            alert("請輸入電子信箱");
            $("#mail").focus();
            return false;
        }
        if (!$("#company_name").val()){
            alert("請輸入公司名稱");
            $("#mail").focus();
            return false;
        }
        if (!$("#number").val()){
            alert("請輸入電話號碼");
            $("#mail").focus();
            return false;
        }
        if (!$("#company_num").val()){
            alert("請輸入公司人數");
            $("#company_num").focus();
            return false;
        }

        // $("#form_contact").submit();

        // return;


        var url = '<?php echo $do_contact_url?>';   
      
        var postData = {//"plan_id": $("#plan_id").val(),
                          "name": $("#name").val(),
                          "sex":$('input[name=sex]:checked').val(),
                          "company_name": $("#company_name").val(),
                          "company_num": $("#company_num").val(),
                          "number": $("#number").val(),
                          "email": $("#mail").val(),
                          "inquiry_topic": $("#inquiry_topic").val(),
                          "coor_unit": $("#coor_unit").val(),
                          "msg": $("#msg").val()
                        };   

        console.log(postData);

       $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
          data: postData,
          success: function(data)
          {
            console.log(data);
            if(data.status == 1)
            {
              // $("#MerchantID").val(data.merchant_id);
              // $("#XMLData").val(data.encode_data);
              // $("#payment_form").attr('action', data.gateway);
              // $("#payment_form").submit();
              alert('送出成功！！');
              location.href = '<?php echo site_url() ?>home/contactus';
            }
            else
            {
              alert(data.msg);
            }
          }
        });
    });
    $(".b10_select").change(function(){
    var target = $(this).val();
    if (target !== ''){
        $(this).css('color','black');
    }else{
        $(this).css('color','#B3B3B3');
    }
});
</script>