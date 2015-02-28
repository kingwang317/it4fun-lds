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


	function index()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'index';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'index');

		$this->fuel->pages->render("index", $vars);
	 
	}
	function ci_design()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'ci_design';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'ci_design');
		$this->fuel->pages->render("ci_design", $vars);
	 
	}
	function ci_design_detail()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'ci_design_detail';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'ci_design_detail');
		$this->fuel->pages->render("ci_design_detail", $vars);
	 
	}
	function iso_coach()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'iso_coach';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_coach');
		$this->fuel->pages->render("iso_coach", $vars);
	 
	}
	function iso_coach_detail()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'iso_coach_2coldetail';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_coach_2coldetail');
		$this->fuel->pages->render("iso_coach_2coldetail", $vars);
	 
	}
	function iso_coach_list()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'iso_coach_list';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_coach_list');
		$this->fuel->pages->render("iso_coach_list", $vars);
	 
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

	function team_info()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'team_info';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'team_info');
		$this->fuel->pages->render("team_info", $vars);
	}
	 
}