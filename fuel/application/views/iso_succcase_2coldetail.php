<!DOCTYPE html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width; initial-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 最佳的IE兼容模式 -->

<title><?php echo $title; ?></title>

<link href="<?php echo site_url()?>assets/templates/css/main.css" rel="stylesheet" type="text/css" />

<link href="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/style.css" rel="stylesheet" type="text/css"/>

<!--link font awesome to use the icon-->

<meta property="og:image" content="<?php echo $image ?>" />
<meta property="og:title" content="<?php echo $title ?>" />
<meta property="og:description" content="<?php echo $description ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $url ?>" />
<meta property="og:site_name" content="領導力企管" />

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

            <div class="location_left"><font color="black"><a href="<?php echo site_url() ?>">首頁</a> / <a href="<?php echo site_url().'home/iso-coaching-performance' ?>">輔導實績</a> / <a href="<?php echo site_url().'home/iso-coaching-performance?news_type='.$news_type->code_name ?>"><?php echo $news_type->code_name ?>系列</a> /</font> <?php echo $news->title ?></div>

            <div class="location_right">

                <div class="browse_count"><font color="black">瀏覽數：</font><?php echo $news->view_count ?>+</div>

                <?php

                $target_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                
                ?>

                <div class="facebook_like"><div class="fb-like" data-href="<?php echo $target_url; ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></div>

            </div>

        </div>

        <div style="text-align:left;">

            <div class="b3_c_left">

                <div class="b3_c_left_title"><?php echo $news->title ?></div>
                <div class="b3_c_left_img">
                    <?php if (isset($news->img) && !empty($news->img)): ?>
                        <img onload="AutoResizeImage('600','338',this);" src="<?php echo site_url().'assets/'.$news->img ?>">
                    <?php endif ?> 
                </div>
                <div class="b3_c_left_date"><?php 
                    $date = date_create($news->date);
                    echo date_format($date, 'Y-m-d')
                ?></div>
                <div class="b3_c_left_text">
                    <?php echo htmlspecialchars_decode($news->content) ?>
                </div>
                <div class="contact_us_center"><a href="<?php echo site_url()?>home/contactus" target="_blank"><div class="b10_submit contact_us">與我們聯繫 <span class="fa fa-arrow-circle-right"></span></div></a></div>
                <div class="b3_c_left_extend">
                    <?php if (isset($interest_news) && sizeof($interest_news) > 0): ?>
                        <div class="new_title_config extend_title">延伸閱讀</div>
                        <?php foreach ($interest_news as $key => $value): ?> 
                             <a  target="_blank" href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id.'?news_type='.$value->type ?>"><div class="extend_list"><i class="fa fa-file-text-o"></i><?php echo $value->title ?></div></a>
                        <?php endforeach ?>
                    <?php endif ?>

                </div>

            </div>

            <div class="b3_c_right">

                <div class="b3_c_right_block">

                    <div class="b3_c_right_title"><?php echo $news_type->code_name ?>系列</div>

                    <div class="b3_c_right_list">

                        <?php if (isset($news_series)): ?>
                            <?php foreach ($news_series as $key => $value): ?>
                                 <a href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id ?>"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i><?php echo $value->title ?></div></a>
                            <?php endforeach ?>
                        <?php endif ?>

                      <!--   <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block bottom_end"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a> -->

                    </div>

                </div>

                <div class="b3_c_right_block">

                    <div class="b3_c_right_title">推薦閱讀</div>

                    <div class="b3_c_right_list">

                        <?php if (isset($recommand_news)): ?>
                            <?php foreach ($recommand_news as $key => $value): ?>
                                 <a href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id ?>"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i><?php echo $value->title ?></div></a>
                            <?php endforeach ?>
                        <?php endif ?>

                       <!--  <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                        <a href="#"><div class="b3_c_right_list_block bottom_end"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a> -->

                    </div>

                </div>

                <div class="b3_c_right_block">

                    <div class="b3_c_right_list_advert">

                        <?php echo fuel_block("iso_coach_detail_ad") ?>

                    </div>

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

<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/jquery.mousewheel.min.js" ></script>

<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/jquery.iviewer.min.js" ></script>

<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/main.js" ></script>

<!--Script放後面加速頁面產生-->

<script type="text/javascript">
$(".b3_c_left img").each(function(){
            $(this).wrap( "<div class='b3_d_text_img'></div>" )
                   .wrap($('<a >',{
               href:  this.src,
               class:'go'

            }));
});
</script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/jquery.mousewheel.min.js" ></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/jquery.iviewer.min.js" ></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/iviewer_0.7.11/main.js" ></script>