<?php
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('core_model');  
		
		$this->load->library('comm');
	}

	function home() 
	{
		parent::Controller(); 
	} 

	// function index($lang_code){
	// 	echo $lang_code;
	// 	die;
	// 	return;
	// }

	function index()
	{	
		// $lang_code = $this->input->get("lang_code");
		$lang_code = $this->uri->segment(1);
		// print_r( $lang_code);
		// die;
		$vars['views'] = 'home';
		//$vars['css'] = site_url()."assets/templates/css/index.css";
		$index_list = $this->core_model->get_cate_list(); 
 		$vars['index_list'] = $index_list;
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		// print_r($vars);
		// die;
		$this->fuel->pages->render("home", $vars);
	 
	}

	function detail()
	{	
	 	$chapter_id = $this->input->get("id");
		$lang_code = $this->uri->segment(1);
		// print_r( $lang_code);
		// die;
		$vars['views'] = 'detail';
		//$vars['css'] = site_url()."assets/templates/css/index.css";
 		$chapter_detail = $this->core_model->get_chapter_detail($chapter_id); 
 		$vars['chapter_detail'] = $chapter_detail;
 		$chapter_list = $this->core_model->get_chapter_list_by_kind($chapter_detail[0]->cp_kind);
 		$vars['chapter_list'] = $chapter_list;
 		$vars['sample_list'] = $this->core_model->get_chapter_samples($chapter_id);
 		$vars['input_list'] = $this->core_model->get_chapter_inputs($chapter_id);
 		$vars['kind_name'] = $this->core_model->get_kind_name($chapter_detail[0]->cp_kind);
 		//echo $this->core_model->get_breadcrumb($chapter_detail[0]->cp_kind);
 		//die();
 		$vars['breadcrumb'] = $this->core_model->get_breadcrumb($chapter_detail[0]->cp_kind);
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'detail');
		// print_r($vars);
		// die;
		$this->fuel->pages->render("detail", $vars);
	 
	}
	
	 
}