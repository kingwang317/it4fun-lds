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
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jqueryUI-1.11.1.js"></script>
</head>
<body>
<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>

<div class="main main_width">
    <div class="width1024">
        <div class="ci_title">ISO小學堂</div>
        <div id="container" class="ci_detail b7_detail">
             <?php if (isset($iso)): ?>
                <?php foreach ($iso as $key => $value): ?>                      
                    <div class="ci_block">
                        <div class="ci_image"><img src="<?php echo site_url()."assets/$value->img" ?>"></div>
                        <div class="ci_text">
                            <a href="<?php echo site_url().'home/iso_class_detail/'.$value->id ?>">
                            <div class="ci_text_title"><?php echo $value->title ?></div>
                            <div class="ci_text_detail"><?php echo htmlspecialchars_decode($value->content) ?></div>
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
             <!-- <div class="ci_block">
                <div class="ci_image"><img src="images/b6/ppt_1.png"></div>
                <div class="ci_text">
                    <a href="b8.php">
                    <div class="ci_text_title">年報PTTdemo_141107_02</div>
                    <div class="ci_text_detail">014ifrs年報季報. 股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費 股票斯貨選擇權手續費 股票斯貨選擇權手續費</div>
                    </a>
                </div>
            </div>
            <div class="ci_block">
                <div class="ci_image"><img src="images/b6/ppt_2.png"></div>
                <div class="ci_text">
                    <a href="#">
                    <div class="ci_text_title">年報PTTdemo_141107_02</div>
                    <div class="ci_text_detail">014ifrs年報季報. 股票期貨選擇 股票斯貨選擇權手續費 股票斯貨選擇權手續費 股票斯貨選擇權手續費</div>
                    </a>
                </div>
            </div>
            <div class="ci_block">
                <div class="ci_image"><img src="images/b6/ppt_3.png"></div>
                <div class="ci_text">
                    <a href="#">
                    <div class="ci_text_title">年報PTTdemo_141107_02</div>
                    <div class="ci_text_detail">014ifrs年報季報. 股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費</div>
                    </a>
                </div>
            </div>
            <div class="ci_block">
                <div class="ci_image"><img src="images/b6/ppt_4.png"></div>
                <div class="ci_text">
                    <a href="#">
                    <div class="ci_text_title">年報PTTdemo_141107_02</div>
                    <div class="ci_text_detail">014ifrs年報季報. 股票斯貨選擇權手續費 股票期貨選擇 股票斯貨選擇權手續費 股票斯貨選擇權手續費 股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費</div>
                    </a>
                </div>
            </div>
            <div class="ci_block">
                <div class="ci_image"><img src="images/b6/ppt_5.png"></div>
                <div class="ci_text">
                    <a href="#">
                    <div class="ci_text_title">年報PTTdemo_141107_02</div>
                    <div class="ci_text_detail">014ifrs年報季報. 股票斯貨選擇權手續費 </div>
                    </a>
                </div>
            </div>
            <div class="ci_block">
                <div class="ci_image"><img src="images/b6/ppt_6.png"></div>
                <div class="ci_text">
                    <a href="#">
                    <div class="ci_text_title">年報PTTdemo_141107_02</div>
                    <div class="ci_text_detail">014ifrs年報季報. 股票斯貨選擇權手續費 股票期貨選擇 股票斯貨選擇權手續費 股票斯貨選擇權手續費 股票斯貨選擇權手續費</div>
                    </a>
                </div>
            </div>
            <div class="ci_block">
                <div class="ci_image"><img src="images/b6/ppt_7.png"></div>
                <div class="ci_text">
                    <a href="#">
                    <div class="ci_text_title">年報PTTdemo_141107_02</div>
                    <div class="ci_text_detail">014ifrs年報季報. 股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費股票斯貨選擇權手續費  股票斯貨選擇權手續費</div>
                    </a>
                </div>
            </div>
            <div class="ci_block">
                <div class="ci_image"><img src="images/b6/ppt_8.png"></div>
                <div class="ci_text">
                    <a href="#">
                    <div class="ci_text_title">年報PTTdemo_141107_02</div>
                    <div class="ci_text_detail">014ifrs年報季報. 股票斯貨選擇權手續費 </div>
                    </a>
                </div>
            </div>-->
        </div> 
        <div class="b7_right">
            <div class="b7_right_top">
                <div class="b7_right_title1">分類項目</div>
                <div class="under_line"></div>
                    <?php if (isset($coach_type)): ?>
                        <?php $i=0 ?>
                        <?php foreach ($coach_type as $key => $value): ?>
                            <a href="<?php echo site_url().'home/iso_class/'.$value->code_id ?>"><div class=" b7_list_text <?php echo $i+1==sizeof($coach_type)?"border_hide":"" ?> "><?php echo $value->code_name ?></div></a>
                            <?php $i++ ?>
                        <?php endforeach ?>
                    <?php endif ?>
                    <!-- <a href="#"><div class=" b7_list_text">品質管理</div></a>
                    <a href="#"><div class=" b7_list_text">食品安全</div></a>
                    <a href="#"><div class=" b7_list_text">驗廠&社會責任</div></a>
                    <a href="#"><div class=" b7_list_text">環境管理</div></a>
                    <a href="#"><div class=" b7_list_text">供應鏈安全</div></a>
                    <a href="#"><div class=" b7_list_text">風險管理</div></a>
                    <a href="#"><div class=" b7_list_text border_hide">資訊安全</div></a> -->
                </div>
                <div class="b7_right_bottom">
                    <div class="b7_right_title1">推薦閱讀</div>
                    <div class="under_line"></div>
                    <?php if (isset($interest_news)): ?>
                        <?php foreach ($interest_news as $key => $value): ?>
                             <a href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id ?>"><div class="extend_list"><i class="fa fa-file-text-o"></i><?php echo $value->title ?></div></a>
                        <?php endforeach ?>
                    <?php endif ?>
                    <!-- <a href="#"><div class=" b7_list_text"><i class="fa fa-file-text-o"></i>ISO 22000食品安全管理</div></a>
                    <a href="#"><div class=" b7_list_text"><i class="fa fa-file-text-o"></i>HACCP 危害分析重要管制點</div></a>
                    <a href="#"><div class=" b7_list_text"><i class="fa fa-file-text-o"></i>ISO 114001環境管理系統</div></a>
                    <a href="#"><div class=" b7_list_text"><i class="fa fa-file-text-o"></i>ISO 13485醫療器材品質管理</div></a>
                    <a href="#"><div class=" b7_list_text"><i class="fa fa-file-text-o"></i>IECQ QC080000 有害物質管理</div></a>
                    <a href="#"><div class=" b7_list_text"><i class="fa fa-file-text-o"></i>ISO 17025：2005實驗室認證</div></a> -->
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
    $('#container').imagesLoaded(function() {
        $('#container').masonry({
            itemSelector: '.ci_block',
            animate: true
        });
    });
    $('.ci_block').on({
        mouseover: function() {
            $(this).css("opacity",'1');
            $(this).find(".ci_text_title").css("color",'#eb1d23');
        },
        mouseleave: function() {
            $(this).css("opacity",'0.8');
            $(this).find(".ci_text_title").css("color",'black');
        }
    });
</script>