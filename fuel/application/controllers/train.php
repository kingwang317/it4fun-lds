<?php
class Train extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('core_model');  
	} 

	function index()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'iso_train';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_train');
		$this->fuel->pages->render("iso_train", $vars);
	}
	function detail()
	{	
		$lang_code = $this->uri->segment(1);
		$vars['views'] = 'iso_train_detail';
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