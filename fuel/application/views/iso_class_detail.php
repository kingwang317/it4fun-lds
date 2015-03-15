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

        <div class="location">

            <div class="location_left"><font color="black">首頁 / ISO 小學堂 / </font><?php echo $news->title ?></div>

        </div>

        <div class="b8_main">

            <div class="ppt_block">

                <iframe src="<?php echo $news->frame_url ?>" frameborder="0" width="1024" height="605" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>

            </div>

            <div class="b8_block">

                <div class="b8_block_left">

                    <div class="b3_d_top_title"><?php echo $news->title ?></div>

                    <div class="b3_d_contact">
                        <?php echo htmlspecialchars_decode($news->content) ?>
                    </div>

                    <div class="b3_d_extend_left">

                    <div class="new_title_config extend_title">延伸閱讀</div>

                    <div class="under_line"></div>

                    <?php if (isset($interest_news)): ?>
                        <?php foreach ($interest_news as $key => $value): ?>
                        <a href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id ?>"><div class="extend_list"><i class="fa fa-file-text-o"></i><?php echo $value->title ?></div></a>
                        <?php endforeach ?>
                    <?php endif ?>

                    <!-- <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>BRC 英國零售商管理系統</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>HACCP 危害分析重要管制點系統</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>ISO 22000：2005 食品安全管理系統</div></a>

                    <a href="#"><div class="extend_list"><i class="fa fa-file-text-o"></i>FSSC 22000 食品安全系統驗證標準</div></a> -->

                </div>

                </div>

                <div class="b8_block_right">

                    <div class="new_title_config b3_d_extend_title">其它人也瀏覽了</div>

                    <div class="under_line"></div>

                    <div class="b8_block_right_list">

                        <?php if (isset($interest_news2)): ?>
                            <?php $i=0; ?>
                            <?php foreach ($interest_news2 as $key => $value): ?>
                                <div class="b8_right_list_block <?php echo $i+1==sizeof($interest_news2)?"border_bottom_clen":"" ?>">
                                    <div class="b8_list_img"><img style="max-width:135px" src="<?php echo site_url() ?>assets/<?php echo $value->img ?>"></div>
                                    <div class="b8_list_text">
                                        <a href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id ?>">
                                        <div class="b8_list_text_title"><?php echo $value->title ?></div>
                                        <div class="b8_list_text_date"><?php echo dateconvert($value->date) ?></div>
                                        </a>
                                    </div>
                                </div>
                            <?php $i++; ?>
                            <?php endforeach ?>
                        <?php endif ?>

                    </div>

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



</script>