<?php 
//link the controller to the nav link

$route[FUEL_ROUTE.'train/lists'] 			        = TRAIN_FOLDER.'/train_manage/lists';
$route[FUEL_ROUTE.'train/lists/(:num)'] 			= TRAIN_FOLDER.'/train_manage/lists/$1';
$route[FUEL_ROUTE.'train/create'] 			        = TRAIN_FOLDER.'/train_manage/create';
$route[FUEL_ROUTE.'train/edit/(:num)'] 		        = TRAIN_FOLDER.'/train_manage/edit/$1';
$route[FUEL_ROUTE.'train/del/(:num)'] 		        = TRAIN_FOLDER.'/train_manage/do_del/$1';
$route[FUEL_ROUTE.'train/do_create'] 		        = TRAIN_FOLDER.'/train_manage/do_create';
$route[FUEL_ROUTE.'train/do_edit/(:num)'] 	        = TRAIN_FOLDER.'/train_manage/do_edit/$1';
$route[FUEL_ROUTE.'train/do_multi_del'] 		    = TRAIN_FOLDER.'/train_manage/do_multi_del';  

 