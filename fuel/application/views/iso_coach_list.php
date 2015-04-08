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

<script src="<?php echo site_url()?>assets/templates/js/autoresize.js" type="text/javascript"></script>

</head>

<style>



</style>

<body>

<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>


<div class="main main_width">

    <div class="width1024">

        <div class="location">

            <div class="location_left"><font color="black">首頁 / </font><?php echo $news_type->code_name ?>系列</div>

        </div>

        <div class="ci_title"><?php echo $news_type->code_name ?>系列</div>

        <div class="b11_main">

            <?php if (isset($news_series)): ?>
                <?php foreach ($news_series as $key => $value): ?>
                <div class="b11_block"><a href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id ?>">

                    <div class="b11_image"><img onload="AutoResizeImage('235','',this);" src="<?php echo site_url()."assets/$value->img" ?>"></div>

                    <div class="b11_text1"><?php echo $value->title ?></div>

                    <div class="b11_text2"><?php echo mb_substr(strip_tags(htmlspecialchars_decode($value->content)),0,100,'UTF-8') ?></div>

                    </a>

                </div>
                <?php endforeach ?>
            <?php endif ?>

            

          <!--   <div class="b11_block"><a href='#'>

                <div class="b11_image"><img src="images/b11/b11_1.png"></div>

                <div class="b11_text1">什麼是ISO 17971 醫療器材風險管理？</div>

                <div class="b11_text2">醫療器材的安全與品質直接關係病患與操作者的安全醫療器材的安全與品質直接關係病患與操作者的安全</div>

                </a>

            </div>

            <div class="b11_block"><a href='#'>

                <div class="b11_image"><img src="images/b11/b11_1.png"></div>

                <div class="b11_text1">什麼是ISO 17971 醫療器材風險管理？</div>

                <div class="b11_text2">醫療器材的安全與品質直接關係病患與操作者的安全醫療器材的安全與品質直接關係病患與操作者的安全</div>

                </a>

                </a>

            </div>

            <div class="b11_block"><a href='#'>

                <div class="b11_image"><img src="images/b11/b11_1.png"></div>

                <div class="b11_text1">什麼是ISO 17971 醫療器材風險管理？</div>

                <div class="b11_text2">醫療器材的安全與品質直接關係病患與操作者的安全醫療器材的安全與品質直接關係病患與操作者的安全</div>

                </a>

            </div>

            <div class="b11_block"><a href='#'>

                <div class="b11_image"><img src="images/b11/b11_1.png"></div>

                <div class="b11_text1">什麼是ISO 17971 醫療器材風險管理？</div>

                <div class="b11_text2">醫療器材的安全與品質直接關係病患與操作者的安全醫療器材的安全與品質直接關係病患與操作者的安全</div>

                </a>

            </div>

            <div class="b11_block"><a href='#'>

                <div class="b11_image"><img src="images/b11/b11_1.png"></div>

                <div class="b11_text1">什麼是ISO 17971 醫療器材風險管理？</div>

                <div class="b11_text2">醫療器材的安全與品質直接關係病患與操作者的安全醫療器材的安全與品質直接關係病患與操作者的安全</div>

                </a>

            </div>

            <div class="b11_block"><a href='#'>

                <div class="b11_image"><img src="images/b11/b11_1.png"></div>

                <div class="b11_text1">什麼是ISO 17971 醫療器材風險管理？</div>

                <div class="b11_text2">醫療器材的安全與品質直接關係病患與操作者的安全醫療器材的安全與品質直接關係病患與操作者的安全</div>

                </a>

            </div>

            <div class="b11_block"><a href='#'>

                <div class="b11_image"><img src="images/b11/b11_1.png"></div>

                <div class="b11_text1">什麼是ISO 17971 醫療器材風險管理？</div>

                <div class="b11_text2">醫療器材的安全與品質直接關係病患與操作者的安全醫療器材的安全與品質直接關係病患與操作者的安全</div>

                </a>

            </div>

            <div class="b11_block"><a href='#'>

                <div class="b11_image"><img src="images/b11/b11_1.png"></div>

                <div class="b11_text1">什麼是ISO 17971 醫療器材風險管理？</div>

                <div class="b11_text2">醫療器材的安全與品質直接關係病患與操作者的安全醫療器材的安全與品質直接關係病患與操作者的安全</div>

                </a>

            </div>

            <div class="b11_block"><a href='#'>

                <div class="b11_image"><img src="images/b11/b11_1.png"></div>

                <div class="b11_text1">什麼是ISO 17971 醫療器材風險管理？</div>

                <div class="b11_text2">醫療器材的安全與品質直接關係病患與操作者的安全醫療器材的安全與品質直接關係病患與操作者的安全</div>

                </a>

            </div> -->

        </div>

    </div>

</div>

<!-- 最底宣告 -->
<?php  $this->load->view('_blocks/foot')?>

</body>

</html>



<!--Script放後面加速頁面產生-->

<script type="text/javascript">

$('.b11_block').on({

        mouseover: function() {

            $(this).css("opacity",'1');

        },

        mouseleave: function() {

            $(this).css("opacity",'0.8');

        }

    });

</script>