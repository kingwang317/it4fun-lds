<?php
/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/
$config['nav']['train'] = array(
'train/lists'		=> '教育訓練',
);

// deterines whether to use this configuration below or the database for controlling the blogs behavior
$config['crawleruse_db_table_settings'] = TRUE;

// the cache folder to hold blog cache files
$config['train'] = 'train';

$config['tables']['mod_train'] = 'mod_train';


$config['train_javascript'] = array(
    site_url().'assets/admin_js/jquery.js',
    site_url().'assets/admin_js/bootstrap.min.js', 
	site_url().'assets/admin_js/jquery-ui.min.js',
);

$config['train_ck_javascript'] = array(
    site_url().'assets/admin_js/ckeditor/ckeditor.js',
	site_url().'assets/admin_js/ckfinder/ckfinder.js'
);

$config['train_css'] = array(
	site_url().'assets/admin_css/bootstrap.min.css',
	site_url().'assets/admin_css/style.css',
	site_url().'assets/admin_css/style-responsive.css'
	// site_url().'assets/admin_css/datepicker.css'
);

?>