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

            <div class="location_left"><font color="black">首頁 / ISO教育訓練 / </font><?php echo $train->train_title ?></div>

        </div>

        <div style="text-align:left;">

            <div class="b3_c_left">

                <div class="b3_c_left_title"><?php echo $train->train_title ?></div>

                <?php echo htmlspecialchars_decode($train->train_detail) ?>

                <div class="b12_info">

                    <div class="b12_info_title">

                        <i class="fa fa-exclamation-circle" style="color:#eb1d23;"></i>課程報名資訊<i class="fa fa-plus" style="color:#eb1d23;"></i>

                    </div>

                    <div class="b12_info_title_slider" style="display:none;">

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

                            <div class="b12_info_title_slider_text"><?php echo $train->train_date ?></div>

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

                        <div class="b12_block">

                            <div class="b12_block_title">上課地點</div>

                            <div class="b12_info_title_slider_text"><?php echo $train->train_place ?><br>﹙實際上課地點若有變更，將另行通知。﹚</div>

                        </div>

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

                <a href="<?php echo site_url().'train/register/'.$train->id ?>"><div class="b10_submit b12_submit">線上報名</div></a>

                <div class="b12_facebook_comment">

                    <div class="new_title_config extend_title">學員留言</div>

                    <div class="under_line"></div>

                    <div class="fb-comments" data-href="http://a-wei.lionfree.net/leadership/b12.php" data-width="600px" data-numposts="3" data-colorscheme="light"></div>

                    <div id="fb-root"></div>

                    <script>(function(d, s, id) {

                      var js, fjs = d.getElementsByTagName(s)[0];

                      if (d.getElementById(id)) return;

                      js = d.createElement(s); js.id = id;

                      js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=368298839984478&version=v2.0";

                      fjs.parentNode.insertBefore(js, fjs);

                    }(document, 'script', 'facebook-jssdk'));</script>

                </div>

            </div>

            <div class="b3_c_right">

                <div class="b3_c_right_block">

                    <div class="b3_c_right_title">其他人也瀏覽了</div>

                    <div class="b3_c_right_list">

                        <?php if (isset($interest_news)): ?>
                            <?php foreach ($interest_news as $key => $value): ?>
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

</body>

</html>



<!--Script放後面加速頁面產生-->

<script type="text/javascript">

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

</script>