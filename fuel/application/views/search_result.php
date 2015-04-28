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
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jqueryUI-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery.highlight-5.js"></script>
<style> 

.highlight { background-color: yellow }

</style>
</head>
<body>
<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>

<div class="main main_width">
    <div class="page_banner" style="background-image:url(<?php echo site_url()?>assets/templates/images/banner_about.jpg);"></div>
    <div class="width1024">
        <div class="ci_title">搜尋結果</div>
        <div class="b15_main">

            <?php if (isset($result)): ?>
                <?php foreach ($result as $key => $value): ?>
                    <div class="b15_block">
                        <a href="<?php echo site_url().'home/'.news_kind_controller($value->news_kind).'/'.$value->id ?>"><div class="b15_block_title"><?php echo $value->title ?>﹙<?php echo dateconvert($value->date) ?>﹚</div></a>
                        <div class="b15_block_text"><?php echo mb_substr(strip_tags(htmlspecialchars_decode($value->content)),0,100,'UTF-8') ?></div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
            <!-- <div class="b15_block">
                <div class="b15_block_title">ISO 28000：2007 供應鏈安全管理系統<font color="#eb1d23">認證課程</font>﹙2012年3月﹚</div>
                <div class="b15_block_text">專業ISO認證輔導能量，創下許多同業第一。專業ISO認證輔導能量，創下許多同業第一。專業ISO<font color="#eb1d23">認證課程</font>，創下許多同業第一。專業ISO認證輔導能量，創下許多同業第一。</div>
            </div>
            <div class="b15_block">
                <div class="b15_block_title">ISO 28000：2007 供應鏈安全管理系統<font color="#eb1d23">認證課程</font>﹙2012年3月﹚</div>
                <div class="b15_block_text">專業ISO認證輔導能量，創下許多同業第一。專業ISO認證輔導能量，創下許多同業第一。專業ISO認證輔導能量，創下許多同業第一。專業ISO<font color="#eb1d23">認證課程</font>，創下許多同業第一。</div>
            </div>
            <div class="b15_block">
                <div class="b15_block_title">ISO 28000：2007 供應鏈安全管理系統<font color="#eb1d23">認證課程</font>﹙2012年3月﹚</div>
                <div class="b15_block_text">專業ISO認證輔導能量，創下許多同業第一。專業ISO認證輔導能量，創下許多同業第一。專業ISO<font color="#eb1d23">認證課程</font>，創下許多同業第一。專業ISO認證輔導能量，創下許多同業第一。</div>
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
    $(document).ready(function() { 
      
        $('.b15_block_title').highlight('<?php echo $keyword ?>');
        $('.b15_block_text').highlight('<?php echo $keyword ?>');
    });
</script>