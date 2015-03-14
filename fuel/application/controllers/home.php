<?php
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('core_model');  
		$this->load->model('code_model');  
		$this->load->library('comm');
	}

	function home() 
	{
		parent::Controller(); 
	} 


	function index()
	{	
		$lang_code = $this->uri->segment(1);
		//$vars['coach_item'] = $this->core_model->get_coach_item($this->core_model->get_cate_list("COACH_TYPE"));
		/*echo "<pre>";
		print_r($vars['coach_item']);
		echo "</pre>";
		die();*/

		$vars['banner'] = $this->code_model->get_banner();
		// $vars['news'] = $this->code_model->get_home_news();
		$vars['performance'] = $this->code_model->get_performance();

		$iso_news_type = $this->code_model->get_iso_news_type();
		$result = array();

		foreach ($iso_news_type as $key => $value) { 
			$detail = $this->code_model->get_iso_news_items($value->code_id);
			
			if (is_array($detail) && sizeof($detail) > 0) {
				$value->detail = $detail[0];
			}else{
				$value->detail = stdClass();
			}
			$result[$value->code_id] = $value;
		} 
		// print_r($result);
		// die;

		$vars['news'] = $result; 
		$vars['views'] = 'index';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'index');

		$this->fuel->pages->render("index", $vars);
	 
	}
	function ci_design()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['ci'] = $this->code_model->get_ci_news();
		$vars['views'] = 'ci_design';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'ci_design');
		$this->fuel->pages->render("ci_design", $vars);
	 
	}
	function ci_design_detail($id)
	{	
		$lang_code = $this->uri->segment(1);

		$news = $this->code_model->get_news_by_id($id);

		if (!isset($news)) {
			$this->comm->plu_redirect(site_url(), 0, "找不到資料");
			die;
		}

		$vars['news'] = $news;
		$vars['interest_news'] = $this->code_model->get_random_ci();
		$vars['views'] = 'ci_design_detail';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'ci_design_detail');
		$this->fuel->pages->render("ci_design_detail", $vars);
	 
	}
	function iso_coach()
	{	
		$lang_code = $this->uri->segment(1);
		$iso_coach_type = $this->code_model->get_iso_coach_type();
		$result = array();

		foreach ($iso_coach_type as $key => $value) {
			// print_r($value);
			$result[$value->code_name] = $this->code_model->get_iso_coach_news($value->code_id);
			// print_r($this->code_model->get_iso_coach_news($value->code_id));
		}
		// print_r($result);
		// die;
		$vars['iso'] = $result;
		$vars['views'] = 'iso_coach';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_coach');
		$this->fuel->pages->render("iso_coach", $vars);
	 
	}
	function iso_coach_detail($id)
	{	
		$lang_code = $this->uri->segment(1);

		$news = $this->code_model->get_news_by_id($id);

		if (!isset($news)) {
			$this->comm->plu_redirect(site_url(), 0, "找不到資料");
			die;
		}

		$vars['news'] = $news;
		$vars['interest_news'] = $this->code_model->get_random_all_news();
		$vars['interest_news2'] = $this->code_model->get_random_all_news();
		$vars['news_series'] = $this->code_model->get_random_coach();
		$vars['news_type'] = $this->code_model->get_series_info($news->type);

		if ($news->layout_type <> 1) {
			$vars['views'] = 'iso_coach_2coldetail';
			$vars['base_url'] = base_url();
			$page_init = array('location' => 'iso_coach_2coldetail');
			$this->fuel->pages->render("iso_coach_2coldetail", $vars);
		}else{
			$vars['views'] = 'iso_coach_singlecoldetail';
			$vars['base_url'] = base_url();
			$page_init = array('location' => 'iso_coach_singlecoldetail');
			$this->fuel->pages->render("iso_coach_singlecoldetail", $vars);
		}
	 
	}
	// function iso_coach_detail2()
	// {	
	// 	$lang_code = $this->uri->segment(1);
	// 	$vars['views'] = 'iso_coach_singlecoldetail';
	// 	$vars['base_url'] = base_url();
	// 	$page_init = array('location' => 'iso_coach_singlecoldetail');
	// 	$this->fuel->pages->render("iso_coach_singlecoldetail", $vars);
	 
	// }
	function iso_coach_list()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'iso_coach_list';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_coach_list');
		$this->fuel->pages->render("iso_coach_list", $vars);
	 
	}
	function _aboutus()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'aboutus';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'aboutus');
		$this->fuel->pages->render("aboutus", $vars);
	 
	}
	function contactus()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'contactus';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'contactus');
		$this->fuel->pages->render("contactus", $vars);
	 
	}
	function iso_class()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['iso'] = $this->code_model->get_iso_class_news();
		$vars['views'] = 'iso_class';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_class');
		$this->fuel->pages->render("iso_class", $vars);
	 
	}
	function iso_class_detail()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'iso_class_detail';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_class_detail');
		$this->fuel->pages->render("iso_class_detail", $vars);
	 
	}

	function iso_news()
	{	
		$lang_code = $this->uri->segment(1);
		$iso_news_type = $this->code_model->get_iso_news_type();
		$result = array();

		foreach ($iso_news_type as $key => $value) { 
			$result[$value->code_name] = $this->code_model->get_iso_news_items($value->code_id); 
		} 

		$vars['news'] = $result;
		$vars['views'] = 'news';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'news');
		$this->fuel->pages->render("news", $vars);
	}


	function search_result()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'search_result';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'search_result');
		$this->fuel->pages->render("search_result", $vars);
	}

	function _team_info()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'team_info';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'team_info');
		$this->fuel->pages->render("team_info", $vars);
	}
	 
}