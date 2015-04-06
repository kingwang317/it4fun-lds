<?php
class Train extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('core_model');  
		$this->load->model('train_model');  
		$this->load->model('code_model');  
		$this->load->library('comm');		
		$this->load->helper('ajax');
	} 

	function index()
	{	
		$lang_code = $this->uri->segment(1);
		$type = $this->input->get_post("type");
		// echo $type;
		if (isset($type) && !empty($type)) {
			if ($type == 'charge') {
				$vars['charge_train'] = $this->train_model->get_list(0);
			}else if ($type == 'free') {
				$vars['free_train'] = $this->train_model->get_list(1);
			}			 
		}else{
			$vars['free_train'] = $this->train_model->get_list(1);
			$vars['charge_train'] = $this->train_model->get_list(0);
		}		
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

		if ($train->is_free) {
			$vars['free_charge'] = 'free';
			$vars['free_charge_name'] = '免費課程';
		}else{
			$vars['free_charge'] = 'charge';
			$vars['free_charge_name'] = '付費課程';
		}

		$vars['train'] = $train;
		$vars['views'] = 'iso_train_detail';
		$vars['interest_news'] = $this->code_model->get_random_all_news();
		$vars['recommend_news'] = $this->code_model->get_extension_news("4"," AND type='139'",""," LIMIT 0,5");
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_train_detail');
		$this->fuel->pages->render("iso_train_detail", $vars);
	}

	function register()
	{	
		$lang_code = $this->uri->segment(1);
		// $train = $this->train_model->get_train_by_id($id);

		// if (!isset($train)) {
		// 	$this->comm->plu_redirect(site_url(), 0, "找不到課程資料");
		// 	die;
		// }
		// $vars['train'] = $train;
		$vars['all_train'] = $this->train_model->get_list(-1);
		$vars['register_url'] = base_url()."train/do_register";
		$vars['views'] = 'iso_train_register';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_train_register');
		$this->fuel->pages->render("iso_train_register", $vars);
	}

	function do_register()
	{
		if(is_ajax())
		// if(true)
		{ 
			// $train_id 				= $this->input->get_post("train_id");
			// $company_name 			= $this->input->get_post("company_name");
			// $dep 			        = $this->input->get_post("dep");
			// $name 					= $this->input->get_post("name");
			// $sex 				    = $this->input->get_post("sex");
			// $mail 			        = $this->input->get_post("mail");
			// $phone 			        = $this->input->get_post("phone");
			// $price 			        = $this->input->get_post("price");
			// $datepicker 			= $this->input->get_post("datepicker");
			// $invoice 			    = $this->input->get_post("invoice");
			// $invoice_title 			= $this->input->get_post("invoice_title");
			// $Uniform	            = $this->input->get_post("Uniform");
			// $lunch_box           	= $this->input->get_post("lunch_box");
			// $agree               	= $this->input->get_post("agree");
			// $register_msg           = $this->input->get_post("register_msg");
			$post_arr = $this->input->post();
		    $this->train_model->insert_mod_register($post_arr);
			$result['status'] = 1; 
			echo json_encode($result);
		}
		else
		{
			// redirect(site_url(), 'refresh');
			$result['status'] = -1;
			$result['msg'] = "報名發生錯誤,請再試一次";
			echo json_encode($result);
		}

		die();
	}
	 
	
}