<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 最佳的IE兼容模式 -->
<title><?php echo $title; ?></title>
<link href="<?php echo site_url()?>assets/templates/css/main.css" rel="stylesheet" type="text/css" />
<!--link font awesome to use the icon-->
<meta property="og:image" content="<?php echo $image ?>" />
<meta property="og:title" content="<?php echo $title ?><" />
<meta property="og:description" content="<?php echo $description ?><" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $url ?>" />
<meta property="og:site_name" content="領導力企管" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jqueryUI-1.11.1.js"></script>
</head>
<body>
<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>

<div class="main main_width">
    <div class="page_banner" style="background-image:url(<?php echo site_url()?>assets/templates/images/b9/b9_banner.jpg);"></div>
    <!--<div><img src="<?php echo site_url()?>assets/templates/images/b9/b9_banner.jpg"></div>-->
    <div class="b9_main main_width_1024">
        <div class="b9_title">ISO教育訓練</div>
        <?php if (isset($free_train)): ?>
        <div class="table_block">
            <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="b9_table">
                <tr class="table_title" border="0">
                    <td class="table_title_first" width="380px">免費課程</td>
                    <td width="80px">費用</td>
                    <td width="150px">時間</td>
                    <td width="50px">天數</td>
                    <td width="50px">時數</td>
                    <td width="80px">合作單位</td>
                    <td width="200px">開課日期</td>
                    <td width="100px">上課地點</td>
                    <td width="150px"></td>
                </tr>
            <?php $i=0; ?>
                <?php foreach ($free_train as $key => $value): ?>
                    <tr class="table_detail <?php echo $i%2==0?"table_white":"table_gray" ?>">
                        <td class="table_detail_td table_detail_fist"><a href="<?php echo site_url().'iso_train/detail/'.$value->id ?>"><?php echo $value->train_title ?></a></td>
                        <td class="table_detail_td">免費</td>
                        <td class="table_detail_td"><?php echo $value->train_time_s ?>~<?php echo $value->train_time_e ?></td>
                        <td class="table_detail_td"><?php echo $value->train_days ?></td>
                        <td class="table_detail_td"><?php echo $value->train_hours ?></td>
                        <td class="table_detail_td"><?php echo $value->coll_unit ?></td>
                        <td class="table_detail_td">
                             <?php echo $value->train_date ?>
                        </td>
                        <td class="table_detail_td" align="center"><?php echo $value->train_place_s ?></td>
                        <td class="bottom_block"><a href="<?php echo site_url().'iso_train/detail/'.$value->id ?>"><div class="b9_button">我要報名</div></a></td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach ?>
            </table>
            
         <!--    <tr class="table_detail table_white">
                <td class="table_detail_td table_detail_fist"><a href="#">企業社會責任SA8000/CSR/BSCI/EICC相關標準改版說明會</a></td>
                <td class="table_detail_td">免費</td>
                <td class="table_detail_td">13:30~17:00</td>
                <td class="table_detail_td">1</td>
                <td class="table_detail_td">3.5</td>
                <td class="table_detail_td">Intertek</td>
                <td class="table_detail_td">
                    2015-1-19(周一)<br>
                    2015-2-09(周一)<br>
                    2015-3-16(周一)<br>
                    2015-4-11(周一)<br>
                    2015-4-13(周一)<br>
                </td>
                <td class="table_detail_td" align="center">新竹</td>
                <td class="bottom_block"><a href="b12.php"><div class="b9_button">我要報名</div></a></td>
            </tr>
            <tr class="table_detail table_gray">
                <td class="table_detail_td table_detail_fist"><a href="#">企業社會責任SA8000/CSR/BSCI/EICC相關標準改版說明會</a></td>
                <td class="table_detail_td">免費</td>
                <td class="table_detail_td">13:30~17:00</td>
                <td class="table_detail_td">1</td>
                <td class="table_detail_td">3.5</td>
                <td class="table_detail_td">Intertek</td>
                <td class="table_detail_td">2015-1-19(周一)</td>
                <td class="table_detail_td" align="center">新竹</td>
                <td class="bottom_block"><a href="#"><div class="b9_button">我要報名</div></a></td>
            </tr>
            <tr class="table_detail table_white">
                <td class="table_detail_td table_detail_fist"><a href="#">企業社會責任SA8000/CSR/BSCI/EICC相關標準改版說明會</a></td>
                <td class="table_detail_td">免費</td>
                <td class="table_detail_td">13:30~17:00</td>
                <td class="table_detail_td">1</td>
                <td class="table_detail_td">3.5</td>
                <td class="table_detail_td">Intertek</td>
                <td class="table_detail_td">2015-1-19(周一)</td>
                <td class="table_detail_td" align="center">新竹</td>
                <td class="bottom_block"><a href="#"><div class="b9_button">我要報名</div></a></td>
            </tr>
            <tr class="table_detail table_gray">
                <td class="table_detail_td table_detail_fist"><a href="#">企業社會責任SA8000/CSR/BSCI/EICC相關標準改版說明會</a></td>
                <td class="table_detail_td">免費</td>
                <td class="table_detail_td">13:30~17:00</td>
                <td class="table_detail_td">1</td>
                <td class="table_detail_td">3.5</td>
                <td class="table_detail_td">Intertek</td>
                <td class="table_detail_td">2015-1-19(周一)</td>
                <td class="table_detail_td" align="center">新竹</td>
                <td class="bottom_block"><a href="#"><div class="b9_button">我要報名</div></a></td>
            </tr> -->
            
        </div>
        <?php endif ?>
        <?php if (isset($charge_train)): ?>
        <div class="table_block ">
            <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="b9_table">
                <tr class="table_title" border="0">
                    <td class="table_title_first" width="380px">收費課程</td>
                    <td width="80px">費用</td>
                    <td width="150px">時間</td>
                    <td width="50px">天數</td>
                    <td width="50px">時數</td>
                    <td width="80px">合作單位</td>
                    <td width="200px">開課日期</td>
                    <td width="100px">上課地點</td>
                    <td width="150px"></td>
                </tr>
            <?php $i=0; ?>
                <?php foreach ($charge_train as $key => $value): ?>
                    <tr class="table_detail <?php echo $i%2==0?"table_white":"table_gray" ?>">
                        <td class="table_detail_td table_detail_fist"><a href="<?php echo site_url().'iso_train/detail/'.$value->id ?>"><?php echo $value->train_title ?></a></td>
                        <td class="table_detail_td">$<?php echo $value->train_price ?></td>
                        <td class="table_detail_td"><?php echo $value->train_time_s ?>~<?php echo $value->train_time_e ?></td>
                        <td class="table_detail_td"><?php echo $value->train_days ?></td>
                        <td class="table_detail_td"><?php echo $value->train_hours ?></td>
                        <td class="table_detail_td"><?php echo $value->coll_unit ?></td>
                        <td class="table_detail_td">
                             <?php echo $value->train_date ?>
                        </td>
                        <td class="table_detail_td" align="center"><?php echo $value->train_place_s ?></td>
                        <td class="bottom_block"><a href="<?php echo site_url().'iso_train/detail/'.$value->id ?>"><div class="b9_button">我要報名</div></a></td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach ?>
            </table>
          <!--   <tr class="table_detail table_white">
                <td class="table_detail_td table_detail_fist"><a href="#">企業社會責任SA8000/CSR/BSCI/EICC相關標準改版說明會</a></td>
                <td class="table_detail_td">$3,200</td>
                <td class="table_detail_td">13:30~17:00</td>
                <td class="table_detail_td">1</td>
                <td class="table_detail_td">3.5</td>
                <td class="table_detail_td">Intertek</td>
                <td class="table_detail_td">
                    2015-1-19(周一)<br>
                    2015-2-09(周一)<br>
                    2015-3-16(周一)<br>
                    2015-4-11(周一)<br>
                    2015-4-13(周一)<br>
                </td>
                <td class="table_detail_td" align="center">新竹</td>
                <td class="bottom_block"><a href="#"><div class="b9_button">我要報名</div></a></td>
            </tr>
            <tr class="table_detail table_gray">
                <td class="table_detail_td table_detail_fist"><a href="#">企業社會責任SA8000/CSR/BSCI/EICC相關標準改版說明會</a></td>
                <td class="table_detail_td">$3,200</td>
                <td class="table_detail_td">13:30~17:00</td>
                <td class="table_detail_td">1</td>
                <td class="table_detail_td">3.5</td>
                <td class="table_detail_td">Intertek</td>
                <td class="table_detail_td">2015-1-19(周一)</td>
                <td class="table_detail_td" align="center">新竹</td>
                <td class="bottom_block"><a href="#"><div class="b9_button">我要報名</div></a></td>
            </tr>
            <tr class="table_detail table_white">
                <td class="table_detail_td table_detail_fist"><a href="#">企業社會責任SA8000/CSR/BSCI/EICC相關標準改版說明會</a></td>
                <td class="table_detail_td">$3,200</td>
                <td class="table_detail_td">13:30~17:00</td>
                <td class="table_detail_td">1</td>
                <td class="table_detail_td">3.5</td>
                <td class="table_detail_td">Intertek</td>
                <td class="table_detail_td">2015-1-19(周一)</td>
                <td class="table_detail_td" align="center">新竹</td>
                <td class="bottom_block"><a href="#"><div class="b9_button">我要報名</div></a></td>
            </tr>
            <tr class="table_detail table_gray">
                <td class="table_detail_td table_detail_fist"><a href="#">企業社會責任SA8000/CSR/BSCI/EICC相關標準改版說明會</a></td>
                <td class="table_detail_td">$3,200</td>
                <td class="table_detail_td">13:30~17:00</td>
                <td class="table_detail_td">1</td>
                <td class="table_detail_td">3.5</td>
                <td class="table_detail_td">Intertek</td>
                <td class="table_detail_td">2015-1-19(周一)</td>
                <td class="table_detail_td" align="center">新竹<br>高雄<br>新竹<br>高雄</td>
                <td class="bottom_block"><a href="#"><div class="b9_button">我要報名</div></a></td>
            </tr> -->
        </div>
        <?php endif ?>
    </div>
</div>
<!-- 最底宣告 -->
<?php  $this->load->view('_blocks/foot')?>
</body>
</html>

<!--Script放後面加速頁面產生-->
<script type="text/javascript">
    $('.table_detail').on({
        mouseover: function() {
            $(this).css("color",'#202020');
        },
        mouseleave: function() {
            $(this).css("color", '#505050');
        }
    });
    
</script>