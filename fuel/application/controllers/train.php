<?php
class Train extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('core_model');  
		$this->load->model('train_model');  
		$this->load->model('code_model');  
		$this->load->library('comm');
	} 

	function index()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['free_train'] = $this->train_model->get_list(1);
		$vars['charge_train'] = $this->train_model->get_list(0);
		$vars['views'] = 'iso_train';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_train');
		$this->fuel->pages->render("iso_train", $vars);
	}
	function detail($id)
	{	
		$lang_code = $this->uri->segment(1);

		$train = $this->train_model->get_train_by_id($id);

		if (!isset($train)) {
			$this->comm->plu_redirect(site_url(), 0, "找不到資料");
			die;
		}
		$vars['train'] = $train;
		$vars['views'] = 'iso_train_detail';
		$vars['interest_news'] = $this->code_model->get_random_all_news();
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_train_detail');
		$this->fuel->pages->render("iso_train_detail", $vars);
	}
	function register()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'iso_train_register';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_train_register');
		$this->fuel->pages->render("iso_train_register", $vars);
	}
	 
	
}