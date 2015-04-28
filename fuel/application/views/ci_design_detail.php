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

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script type="<?php echo site_url()?>assets/templates/text/javascript" src="js/jquery-1.9.1.min.js"></script>

<script type="<?php echo site_url()?>assets/templates/text/javascript" src="js/jquery.masonry.min.js"></script>

<script type="<?php echo site_url()?>assets/templates/text/javascript" src="js/jqueryUI-1.11.1.js"></script>

<script src="<?php echo site_url()?>assets/templates/js/autoresize.js" type="text/javascript"></script>

</head>

<body>

<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>


<div class="main main_width">

    <div class="width1024 b14_width">

        <div class="location">

            <div class="location_left"><font color="black"><a href="<?php echo site_url() ?>">首頁</a> / <a href="<?php echo site_url().'home/ci_design' ?>">CI設計</a> / </font><?php echo $news->title ?></div>

        </div>

        <div class="b14_left">

            <div class="b14_title"><?php echo $news->title ?></div>

            <div class="b14_main">

                <?php echo htmlspecialchars_decode($news->content) ?>

            </div>

        </div>

        <div class="b14_right">

            <div class="new_title_config b14_right_title">你也許還會想看</div>

            <div class="under_line"></div>

                <div class="b14_right_image">
                    <?php if (isset($interest_news)): ?>
                        <?php foreach ($interest_news as $key => $value): ?>
                            <a href="<?php echo site_url().'home/ci_design_detail/'.$value->id ?>"><div class="b14_right_image_block"><img onload="AutoResizeImage('90','',this);" src="<?php echo site_url().'assets/'.$value->img ?>"></div></a>
                        <?php endforeach ?>
                    <?php endif ?>

                 <!--    <a href="#"><div class="b14_right_image_block"><img src="images/b14/b14_3.jpg"></div></a>

                    <a href="#"><div class="b14_right_image_block"><img src="images/b14/b14_4.jpg"></div></a>

                    <a href="#"><div class="b14_right_image_block"><img src="images/b14/b14_5.jpg"></div></a>

                    <a href="#"><div class="b14_right_image_block"><img src="images/b14/b14_6.jpg"></div></a>

                    <a href="#"><div class="b14_right_image_block"><img src="images/b14/b14_7.jpg"></div></a>

                    <a href="#"><div class="b14_right_image_block"><img src="images/b14/b14_8.jpg"></div></a>

                    <a href="#"><div class="b14_right_image_block"><img src="images/b14/b14_9.jpg"></div></a>

                    <a href="#"><div class="b14_right_image_block"><img src="images/b14/b14_10.jpg"></div></a>

                    <a href="#"><div class="b14_right_image_block"><img src="images/b14/b14_11.jpg"></div></a> -->

                <div>

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

</script>