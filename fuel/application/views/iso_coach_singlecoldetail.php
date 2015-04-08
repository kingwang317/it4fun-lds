<!DOCTYPE html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width; initial-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 最佳的IE兼容模式 -->

<title>Isoleader GRI Training System</title>

<link href="<?php echo site_url()?>assets/templates/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/style.css" rel="stylesheet" type="text/css"/>
<!--link font awesome to use the icon-->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery.masonry.min.js"></script>

<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jqueryUI-1.11.1.js"></script>

<script src="<?php echo site_url()?>assets/templates/js/autoresize.js" type="text/javascript"></script>
</head>

<body>

<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>


<div class="main main_width">

    <div class="width1024">

        <div class="location">

            <div class="location_left"><font color="black"><a href="<?php echo site_url() ?>">首頁</a> / <a href="<?php echo site_url().'home/iso_coach' ?>">ISO 認證輔導</a> / <a href="<?php echo site_url().'home/iso_coach_list/'.$news_type->code_id ?>"><?php echo $news_type->code_name ?>系列</a> /</font> <?php echo $news->title ?></div>

            <div class="location_right">

                <div class="browse_count"><font color="black">瀏覽數：</font><?php echo $news->view_count ?>+</div>

                <div class="facebook_like"><img src="<?php echo site_url() ?>assets/templates/images/b3_c/fb.jpg"></div>

            </div>

        </div>

        <div class="b3_d_main">

            <div class="b3_d_top">

                <div class="b3_d_top_title"><?php echo $news->title ?></div>

                <div class="b3_d_top_date"><?php 
                    //$date = date_create($news->date);
                    //echo date_format($date, 'Y-m-d')
                    echo dateconvert($news->date)
                ?></div>

            </div>

            <div class="b3_d_text">
            <?php echo htmlspecialchars_decode($news->content) ?>
            </div>

         
            

            <div class="b3_d_extend">

                <div class="b3_d_extend_left">



                    <?php if (isset($interest_news) && sizeof($interest_news) > 0): ?>

                        <div class="new_title_config extend_title">延伸閱讀</div>

                        <div class="under_line"></div>
                    
                        <?php foreach ($interest_news as $key => $value): ?>
                             <a href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id.'?news_type='.$value->type ?>"><div class="extend_list"><i class="fa fa-file-text-o"></i><?php echo $value->title ?></div></a>
                        <?php endforeach ?>
                    <?php endif ?>

                   <!--  <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>BRC 英國零售商管理系統</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>HACCP 危害分析重要管制點系統</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>ISO 22000：2005 食品安全管理系統</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>FSSC 22000 食品安全系統驗證標準</div></a> -->

                </div>

                <div class="b3_d_extend_right">

                    <div class="new_title_config b3_d_extend_title">推薦閱讀</div>

                    <div class="under_line"></div>

                    <?php if (isset($recommand_news)): ?>
                        <?php foreach ($recommand_news as $key => $value): ?>
                             <a href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id.'?news_type='.$recommand_name ?>"><div class="extend_list"><i class="fa fa-file-text-o"></i><?php echo $value->title ?></div></a>
                        <?php endforeach ?>
                    <?php endif ?>

                  <!--   <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>BRC 英國零售商管理系統</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>HACCP 危害分析重要管制點系統</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>ISO 22000：2005 食品安全管理系統</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>FSSC 22000 食品安全系統驗證標準</div></a> -->

                </div>

            </div>

        </div>

    </div>

</div>

<!-- 最底宣告 -->

<?php  $this->load->view('_blocks/foot')?>

<div id="iviewer">
    <div class="loader"></div>
    <div class="viewer"></div>
    <ul class="controls">
        <li class="close"></li>
        <li class="zoomin"></li>
        <li class="zoomout"></li>
    </ul>
</div>

</body>

</html>



<!--Script放後面加速頁面產生-->

<script type="text/javascript">
$(".b3_d_text img").each(function(){
            $(this).wrap($('<a>',{
               href:  this.src,
               class:'go'

            }))
});
</script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/jquery.mousewheel.min.js" ></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/jquery.iviewer.min.js" ></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/main.js" ></script>