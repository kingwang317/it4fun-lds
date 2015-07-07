<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 最佳的IE兼容模式 -->
<title><?php echo $title; ?></title>
<link href="<?php echo site_url()?>assets/templates/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url()?>assets/templates/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<!--link font awesome to use the icon-->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jqueryUI-1.11.1.js"></script>
</head>
<body>
<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>

<div class="main main_width">
    <div class="page_banner" style="background-image:url(<?php echo site_url()?>assets/templates/images/register.jpg);"></div>
    <div class="width1024 b10_width">
        <div class="ci_title b10_title">ISO教育網線上報名</div>
        <div class="ci_detail b7_detail b10_left">
           
           <div class="b10_detail_title1">
                請即刻填寫報名資訊，我們將儘速為您辦理。若在填寫過程中有任何問題，歡迎與我們聯絡。
           </div>
           <div class="b10_detail_title2">
            <div class="b10_detail_title2_phone"><span class="fa fa-phone"></span> 0800-222-007</div>
            <!--<span class="fa fa-envelope"></span> service@isoleader.com.tw<br>-->
            服務時間：週一～週五，09:00~18:00 
           </div>
           
           <div class="b10_detail_input">
                <div class="input_block">
                    <select class="b10_select train_register" id="train_register_date" name="train_register_date">
                        <?php 
                                $train_date = '';
                                $pos = strpos($train->train_date, ',');
                                // echo $pos;
                                if ($pos > 0) {
                                    $date_ary = explode(",", $train->train_date);
                                    foreach ($date_ary as $key => $value) {
                                        $train_date .= $value.'<br>';
                                    }
                                }else{
                                    $train_date = $train->train_date;
                                }
                             ?>
                        <?php if ($pos > 0): ?>
                                <?php 
                                    $date_ary = explode(",", $train->train_date);
                                    $i = 0;
                                 ?>
                                <?php foreach ($date_ary as $key => $value): ?>
                                     <div>
                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                    </div>
                                <?php endforeach ?>
                                <?php else: ?>
                                    <option value="<?php echo $train_date ?>"><?php echo $train_date ?></option>
                                <?php endif ?>
                    </select>
                </div>
                <div class="input_block">
                    <span class="holder">公司名稱<span class="red"> ﹙必填﹚</span></span>
                    <input id="company_name" class="b10_input" type="text" autocomplete="off">
                </div>
                <div class="input_block">
                    <span class="holder">部門＆單位<span class="red"> ﹙必填﹚</span></span>
                    <input id="dep" class="b10_input" type="text" autocomplete="off">
                </div>
                <div class="input_block">
                    <span class="holder">姓名<span class="red"> ﹙必填﹚</span></span>
                    <input id="name" class="b10_input" type="text" autocomplete="off">
                    <input id="sex1" type="radio" name="sex" value="1" checked="checked"><label for="sex1"><span><span></span></span><div class="b10_radio">男性</div></label>
                    <input id="sex2" type="radio" name="sex" value="2"><label for="sex2"><span><span></span></span><div class="b10_radio">女性</div></label>
                </div>
                <div class="input_block">
                    <span class="holder">電子信箱<span class="red"> ﹙必填﹚</span></span>
                    <input id="mail" class="b10_input" type="text" autocomplete="off">
                </div>
                <div class="input_block">
                    <span class="holder">聯絡電話<span class="red"> ﹙必填﹚</span></span>
                    <input id="phone" class="b10_input" type="text" autocomplete="off">
                </div>
                
                <div class='b10_submit b12_submit add_person'>增加名額</div>
                <div id="second_person" style="display:none;">
                    <div class="input_block">
                        <span class="holder">姓名</span>
                        <input id="name2" class="b10_input" type="text" autocomplete="off">
                        <input id="sex1_2" type="radio" name="sex_2" value="1" checked="checked"><label for="sex1_2"><span><span></span></span><div class="b10_radio">男性</div></label>
                        <input id="sex2_2" type="radio" name="sex_2" value="2"><label for="sex2_2"><span><span></span></span><div class="b10_radio">女性</div></label>
                    </div>
                    <div class="input_block">
                        <span class="holder">電子信箱</span>
                        <input id="mail2" class="b10_input" type="text" autocomplete="off">
                    </div>
                    <div class="input_block">
                        <span class="holder">聯絡電話</span>
                        <input id="phone2" class="b10_input" type="text" autocomplete="off">
                    </div>
                </div>
                <div class="input_block" style=" <?php echo $train->is_free?'display:none;':'' ?> ">
                     <div>
                        <span class="b13_title">餐盒選擇</span>
                        <span class="b13_remark">﹙全天付費課程有附中午餐點，一般半天課程或研討會則無需填寫﹚</span>
                    </div>
                         <div>
                            <input id="lunch_box1" type="radio" name="lunch_box" value="1" checked="checked"><label for="lunch_box1"><span><span></span></span><div class="b10_radio">一般</div></label>
                          </div>
                          <div>
                            <input id="lunch_box2" type="radio" name="lunch_box" value="2"><label for="lunch_box2"><span><span></span></span><div class="b10_radio">素食</div></label>
                          </div>
                </div>
                <div class="input_block" style="<?php echo $train->is_free?'display:none;':'' ?>">
                    <div class="b13_title">發票開立</div>
                         <div>
                            <input id="invoice1" type="radio" name="invoice" value="1" checked="checked"><label for="invoice1"><span><span></span></span><div class="b10_radio">二聯式</div></label>
                          </div>
                          <div>
                            <input id="invoice2" type="radio" name="invoice" value="2"><label for="invoice2"><span><span></span></span><div class="b10_radio">三聯式</div></label>
                          </div>
                </div>
                <div class="input_block" style="<?php echo $train->is_free?'display:none;':'' ?>">
                    <input id="invoice_title" class="b10_input" type="text" placeholder="發票抬頭" autocomplete="off">
                    <div class="b13_remark">﹙僅付費課程需填寫﹚</div>
                </div>
                 <div class="input_block" style="<?php echo $train->is_free?'display:none;':'' ?>">
                    <input id="Uniform" class="b10_input" type="text" placeholder="統一編號" autocomplete="off">
                    <div class="b13_remark">﹙僅付費課程需填寫﹚</div>
                </div>
                <div class="b12_info_register">
                    <input type="hidden" id="train_id" value="<?php echo $train->id ?>" />

                    <div class="b12_info_title_register">
                        <!--<i class="fa fa-exclamation-circle" style="color:#eb1d23;"></i>課程報名資訊<i class="fa fa-plus" style="color:#eb1d23;"></i>-->
                        <i class="fa fa-info-circle"></i>課程報名資訊

                    </div>

                    <div class="b12_info_title_slider" >

                        <div class="b12_block">

                            <div class="b12_block_title">課程名稱</div>

                            <div class="b12_info_title_slider_text"><?php echo $train->train_title ?></div>

                        </div>

                        <div class="b12_block">

                            <div class="b12_block_title">課程費用</div>

                            <div class="b12_info_title_slider_text">$<?php echo $train->train_price ?></div>

                        </div>

                        <div class="b12_block">

                            <div class="b12_block_title">開課日期</div>

                            <div class="b12_info_title_slider_text">
                                <span id="show_register_date"></span>
                            </div>

                        </div>

                        <div class="b12_block">

                            <div class="b12_block_title">上課天數</div>

                            <div class="b12_info_title_slider_text"><?php echo $train->train_days ?></div>

                        </div>

                        <div class="b12_block">

                            <div class="b12_block_title">上課時數</div>

                            <div class="b12_info_title_slider_text"><?php echo $train->train_hours ?></div>

                        </div>

                        <div class="b12_block">

                            <div class="b12_block_title">上課時間</div>

                            <div class="b12_info_title_slider_text"><?php echo $train->train_time_s ?>~<?php echo $train->train_time_e ?></div>

                        </div>

                        <?php 
                                $train_place = '';
                                $pos = strpos($train->train_place, ',');
                                // echo $pos;
                                if ($pos > 0) {
                                    $date_ary = explode(",", $train->train_place);
                                    foreach ($date_ary as $key => $value) {
                                        $train_place .= $value.'<br>';
                                    }
                                }else{
                                    $train_place = $train->train_place;
                                }
                             ?>
                        <div class="b12_block">

                            <div class="b12_block_title">主辦單位</div>

                            <div class="b12_info_title_slider_text"><?php echo $train->host_unit ?></div>

                        </div>

                        <div class="b12_block">

                            <div class="b12_block_title">合作單位</div>

                            <div class="b12_info_title_slider_text"><?php echo $train->coll_unit ?></div>

                        </div>

                    </div>

                </div>
                
             
                <div class="input_block" style="display:none;">
                    <input id="price" class="b10_input" type="text" placeholder="課程費用" autocomplete="off">
                    <div class="b13_remark">﹙請填寫課程費用，若不知課程費用，請前往ISO教育訓練網 <a href="<?php echo site_url().'iso-training-courses' ?>" onclick="window.open(this.href); return false;"><font color="#eb1d23">www.isoleader.com/iso9001training</font></a> 查詢﹚</div>
                </div>
                <div class="input_block" style="display:none;">
                    <div class="b13_title">請選擇上課地點</div>
                         <div>
                            <input id="place1" type="checkbox" name="place" value="台北" checked="checked"><label for="place1"><span></span>台北</label>
                          </div>
                          <div>
                            <input id="place2" type="checkbox" name="place" value="新竹"><label for="place2"><span></span>新竹</label>
                          </div>
                          <div>
                            <input id="place3" type="checkbox" name="place" value="台南"><label for="place3"><span></span>台南</label>
                          </div>
                          <div>
                            <input id="place4" type="checkbox" name="place" value="高雄"><label for="place4"><span></span>高雄</label>
                          </div>
                </div>
                <div class="input_block" style="display:none;">
                    <div>
                        <span class="b13_title">上課日期</span>
                        <span class="b13_remark">﹙請填寫你想上課的日期，詳細開課日期請前往ISO教育訓練網查詢﹚</span>
                    </div>
                    <div> <input id="datepicker" class="b10_input" type="text" placeholder="年/月/日" autocomplete="off"><i class="b13_calendar fa fa-calendar"></i></div>
                </div>
                <div class="input_block">
                     <div>
                        <span class="b13_title">我已了解並同意以下條款</span>
                        <span class="b13_remark"><font color="#eb1d23">﹙必填﹚</font></span>
                        <div class="b13_detail">領導力企管不會將您的個人資料傳輸給第三方，且將遵照以下原則於本國領域使用您的個人資料 1.僅使用於此次課程與後續相關事項 2.僅使用於領導力企管之活動訊息發送 3.僅使用於領導力企管之課程資訊及研討會發送。</div>
                    </div>
                    <div>
                            <input id="agree1" type="radio" name="agree" value="1" checked="checked"><label for="agree1"><span><span></span></span><div class="b10_radio">同意</div></label>
                          </div>
                          <div>
                            <input id="agree2" type="radio" name="agree" value="2"><label for="agree2"><span><span></span></span><div class="b10_radio">不同意</div></label>
                          </div>
                </div>
                <div class="input_block">
                     <div>
                        <span class="b13_title">留下您的意見＆報名注意事項</span>
                        <div class="b13_detail">繳費方式：每個課程將於開課前一周統計報名人數，若有達到開課人數，將會通知報名學員進行繳費，請報名完成或繳費後，來電領導力企管確認。開課前三個工作天內取消或延課者，酌收10%手續費。開課當日取消或延課者，酌收20%手續費。<br>聯絡電話：(07)7934287 洪小姐<br>傳真電話：(07)7927462<br>E-mail：service@isoleader.com.tw</div>
                        <textarea id="register_msg" class="b10_textarea" rows="10" placeholder="留言內容" autocomplete="off"></textarea>
                    </div>
                </div>
           </div>
           <div id="button_confirm" class='b10_submit'>確認送出</div>
        </div>
        <div class="b7_right b10_right">
            <div class="b10_right_title">領導力企業管理顧問有限公司</div>
            <div class="b10_right_block">
                <div class="b10_right_block_title">台北</div>
                <div class="b10_right_block_detail">
                (02)25039035</br>
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
    if ($("#train_register_date").val() !== ''){
            $("#show_register_date").text($("#train_register_date").val());
            $("#register_msg").text($("#train_register_date").val());
        }
        
    $(".add_person").click(function() {
        $(this).fadeOut("fast");
        $('#second_person').fadeIn("fast");
    });
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
    $("#button_confirm").click(function() {
        
        if (!$("#company_name").val()){
            alert("請輸入公司名稱");
            $("#company_name").focus();
            return false;
        }
        if (!$("#dep").val()){
            alert("請輸入部門＆單位");
            $("#dep").focus();
            return false;
        }
        
        if (!$("#name").val()){
            alert("請輸入姓名");
            $("#name").focus();
            return false;
        }
        if (!$("#mail").val()){
            alert("請輸入E-mail");
            $("#mail").focus();
            return false;
        }
        if (!$("#phone").val()){
            alert("請輸入聯絡電話");
            $("#phone").focus();
            return false;
        }

        $("#button_confirm").text("傳送中...");
        $("#button_confirm").unbind('click');
        $("#button_confirm").css('background-color','gray');
        $("#button_confirm").css('border-color','gray');

        // var train_date = '';
        // var train_place = '';

        // $('input[name="train_date"]:checked').each(function() {
        //    // console.log($(this).val());
        //    train_date += $(this).val() + ',';
        // });

        // if (train_date == ''){
        //     alert("請選擇上課日期");         
        //     return false;
        // }

        // $('input[name="train_place"]:checked').each(function() {
        //    // console.log($(this).val());
        //    train_place += $(this).val() + ',';
        // });

        // if (train_place == ''){
        //     alert("請選擇上課地點");         
        //     return false;
        // }

        var url = '<?php echo $register_url?>';    

        // var place = '';

        // $('input[name="place"]:checked').each(function() {
        //    // console.log($(this).val());
        //    place += $(this).val();
        // });
 
        var postData = {//"plan_id": $("#plan_id").val(),
                          "company_name": $("#company_name").val(),
                          "dep": $("#dep").val(),
                          "name": $("#name").val(),
                          "sex": $('input[name=sex]:checked').val(),
                          "mail": $("#mail").val(),
                          "name2": $("#name2").val(),
                          "sex2": $('input[name=sex_2]:checked').val(),
                          "mail2": $("#mail2").val(),
                          "phone": $("#phone").val(),
                          "phone2": $("#phone2").val(),
                          "train_id": $('#train_id').val(),
                          "price": $("#price").val(),
                          "place": $("#train_register_date").val(),//place,
                          "datepicker": $("#train_register_date").val(),//$("#datepicker").val(),
                          "invoice": $('input[name=invoice]:checked').val(),
                          "invoice_title": $("#invoice_title").val(),
                          "Uniform": $("#Uniform").val(),
                          "lunch_box": $('input[name=lunch_box]:checked').val(),
                          "agree": $('input[name=agree]:checked').val(),
                          "register_msg": $("#register_msg").val() 
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
              alert('報名成功！！');
              location.href = '<?php echo site_url() ?>iso-training-courses';
            }
            else
            {
              $("#button_confirm").text("確認送出");
              $("#button_confirm").bind('click'); 
              $("#button_confirm").css('background-color','#eb1d23');
              $("#button_confirm").css('border-color','#eb1d23');
              alert(data.msg);
            }
          }
        });

    });
    $( "#datepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
    
    $( ".b13_calendar" ).click(function() {
        $( "#datepicker" ).datepicker("show");
    });
    
    /* control the slide_title to show their own text */

    $('.b12_info_title').click(function() {

        if ($(this).next().attr("id") !== 'open') {

            $(this).next().slideDown(600);

            $('.fa-plus', this).removeClass("fa-plus").addClass("fa-minus");

            $(this).next().attr('id', 'open');

        } else {

            $(this).next().slideUp(300);

            $('.fa-minus', this).removeClass("fa-minus").addClass("fa-plus");

            $(this).next().removeAttr("id");

        }

    });
    $(".b10_select").change(function() {
        var target = $(this).val();
        if (target !== '') {
            $(this).css('color', 'black');
        } else {
            $(this).css('color', '#B3B3B3');
        }
    });
    $("#train_register_date").change(function() {
        //if ($("#train_register_date").val() !== ''){
            $("#show_register_date").text($("#train_register_date").val());
            $("#register_msg").text($("#train_register_date").val());
       // }
    });
</script>