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
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jqueryUI-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery.masonry.min.js"></script>
</head>
<body>
<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>

<div class="main main_width">
    <div class="page_banner" style="background-image:url(<?php echo site_url()?>assets/templates/images/banner_about.jpg);"></div>
    <div class="b9_main main_width_1024">
        <div class="ci_title">ISO輔導項目</div>
        <div id="container" class="b2_detail">
          
                <?php if (isset($iso)): ?>
                    <?php foreach ($iso as $key => $value): ?>                                
                         <div class="b2_block">
                            <div class="b2_block_title"><?php echo $key ?></div>
                            <div class="b2_block_table">
                                <?php foreach ($value as $key1 => $value1): ?>
                                       <a href="<?php echo site_url()."home/iso_coach_detail/".$value1->id."?type=".$value1->type ?>"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i><?php echo $value1->title ?></div></a>
                                <?php endforeach ?>
                            </div>
                        </div>                        
                    <?php endforeach ?>
                <?php endif ?>
           <!--  <div class="b2_block_title">品質管理</div>
                <div class="b2_block_table">
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>什麼是ISO 14971 醫療器材風險管理？</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 9001：2008 品質管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>SGS Qualicert 服務驗證</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 17025：2005實驗室認證</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO/TS 16949：2009汽車業品管管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>IECQ QC080000：2012HSPM有害物質流程管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 13485：2003（EN ISO 13485:2012）醫療器材品質管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>TL9000通訊電子業品質管制系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 29990 ︰2010 學習服務品質管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 20121︰2012 公眾活動永續經營管理系統</div></a>
                </div>
            </div>
            <div class="b2_block">
                <div class="b2_block_title">食品安全</div>
                <div class="b2_block_table">
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>食品安全品質標準（Safe Quality Food，SQF）</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>BRC 英國零售商管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>HACCP 危害分析重要管制點系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 22000：2005 食品安全管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>FSSC 22000 食品安全系統驗證標準</div></a>
                </div>
            </div>
            <div class="b2_block">
                <div class="b2_block_title">驗廠與社會責任</div>
                <div class="b2_block_table">
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>CSR 報告書編製，依據 GRI G4.0版 ＆ AA1000 標準撰寫</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>EICC 電子產業行為準則 4.0版</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 26000 社會責任指引</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>迪士尼驗廠 Disney ILS Audit Checklist</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>Wal-Mart 沃爾瑪驗廠</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>SA 8000社會責任管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>BSCI 企業社會責任準則</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ICTI 驗廠</div></a>
                </div>
            </div>
            <div class="b2_block">
                <div class="b2_block_title">環境管理</div>
                <div class="b2_block_table">
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 14001：2015 （DIS版）環境管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>FSC 森林管理委員會認證</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 50001：2011能源管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 14064-1溫室氣體盤查標準</div></a>
                </div>
            </div>
            <div class="b2_block">
                <div class="b2_block_title">供應鏈安全</div>
                <div class="b2_block_table">
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 28000：2007 供應鏈安全管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>C-TPAT美國海關商貿反恐聯盟</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>AEO安全認證優質企業</div></a>
                </div>
            </div>
            <div class="b2_block">
                <div class="b2_block_title">風險管理</div>
                <div class="b2_block_table">
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 27001：2013 資訊安全管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>OHSAS 18001職業安全衛生管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 31000 : 2009 風險管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 22301 營運持續管理系統</div></a>
                </div>
            </div>
            <div class="b2_block">
                <div class="b2_block_title">資訊安全</div>
                <div class="b2_block_table">
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>ISO 27001：2013 資訊安全管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>BS 10012：2009 個人資料管理系統</div></a>
                    <a href="#"><div class="b2_block_table_list"><i class="fa fa-file-text-o"></i>TPIPAS臺灣個人資料保護與管理制度規範</div></a>
                </div>
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
    $('#container').imagesLoaded(function() {
        $('#container').masonry({
            itemSelector: '.b2_block',
            animate: true
        });
    });
    $('.b2_block').on({
        mouseover: function() {
            $(this).css("opacity", '1');
        },
        mouseleave: function() {
            $(this).css("opacity", '0.8');
        }
    });
</script>