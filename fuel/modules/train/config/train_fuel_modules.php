<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['train_manage'] = array(
		'module_name' => '教育訓練',
		'model_name' => 'train_manage_model',
		'module_uri' => 'train/lists',
		'model_location' => 'train',
		'permission' => 'train/manage',
		'nav_selected' => 'train/lists',
		'archivable' => TRUE,
		'instructions' => '新增/修改'
	);
?>