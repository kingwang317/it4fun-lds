<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Event_manage extends Fuel_base_controller {
	public $view_location = 'event';
	public $nav_selected = 'event/manage';
	public $module_name = 'Event manage';
	public $module_uri = 'fuel/event/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('event/manage');
		$this->load->module_model(EVENT_FOLDER, 'event_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
		$this->load->library('session');
		$this->load->library('comm');
	}
	
	function lists($dataStart=0)
	{
		$base_url = base_url();

		$search_type = $this->input->get_post("search_type");
		$search_txt = $this->input->get_post("search_txt");
		$filter = "";

		switch ($search_type) 
		{
			case 0:
				$filter = " WHERE train_title LIKE '%".$search_txt."%'";
				break;
			case 1:
				$filter = " WHERE train_price='$search_txt'";
				break;
			case 2:
				$filter = " WHERE (train_place LIKE '%".$search_txt."%'  || train_place_s LIKE '%".$search_txt."%')";
				break;
			
			default:
				$filter = "";
				break;
		}

		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$target_url = $base_url.'fuel/event/lists/';

		$total_rows = $this->event_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);

		$results = $this->event_manage_model->get_event_list($dataStart, $dataLen, $filter);

		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url.'fuel/event/create';
		$vars['search_type'] = $search_type; 
		$vars['search_txt'] = $search_txt;  
		$vars['edit_url'] 			= $base_url.'fuel/event/edit?id='; 
		$vars['del_url'] 			= $base_url.'fuel/event/del?id=';
		$vars['multi_del_url'] 		= $base_url.'fuel/event/do_multi_del';
		$vars['results'] 			= $results;
		$vars['total_rows'] 		= $total_rows;
		$vars['search_url'] 		= $base_url.'fuel/event/lists';
		$vars['detail_url'] 		= $base_url.'fuel/reg/lists/';
		$vars['event_status_url']	= $base_url.'fuel/event/status/';
		$vars['CI'] = & get_instance();


		$this->fuel->admin->render('_admin/event_lists_view', $vars);

	} 

	function reg_lists($train_id,$dataStart=0)
	{

		$base_url = base_url();
		$module_uri = base_url().$this->module_uri; 

		if($train_id)
		{
			$result = $this->event_manage_model->get_event_detail($train_id);

			if(empty($result))
			{
				$this->comm->plu_redirect($module_uri, 0, "查無此id");
				die();
			}
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "查無此id");
			die();
		}

		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);
		$target_url = $base_url."fuel/reg/lists/$train_id/";
		$filter = " WHERE train_id='$train_id' ";
		$total_rows = $this->event_manage_model->get_reg_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);
		$results = $this->event_manage_model->get_reg_list($dataStart, $dataLen, $filter);
		$vars['page_jump'] = $this->pagination->create_links();	
		$vars['view_name'] = $result->train_title;		
		$vars['reg_detail_url'] 	= $base_url.'fuel/reg/detail/';
		$vars['results'] 			= $results;
		$vars['total_rows'] 		= $total_rows;
		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['CI'] = & get_instance();
		$this->fuel->admin->render('_admin/reg_lists_view', $vars);
	} 

	function reg_detail($reg_id)
	{ 
		$base_url = base_url();
		$module_uri = base_url().$this->module_uri; 

		if($reg_id)
		{
			$result = $this->event_manage_model->get_reg_detail($reg_id);

			if(empty($result))
			{
				$this->comm->plu_redirect($module_uri, 0, "查無此id");
				die();
			}
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "查無此id");
			die();
		}

		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		
		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['reg_list'] = base_url()."fuel/reg/lists/$result->train_id/0";
		$vars['row'] = $result;
		$vars['module_path'] = base_url().'fuel/modules/event/';
		$vars['view_name'] = "明細";

		$this->fuel->admin->render("_admin/reg_detail_view", $vars);
	}

 
	function create()
	{
		$vars['form_action'] = base_url().'fuel/event/do_create';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['module_path'] = base_url().'fuel/modules/event/';
		$vars['view_name'] = "新增";

		$this->fuel->admin->render("_admin/event_create_view", $vars);
	}

	function do_create()
	{
		$base_url = base_url();
		$module_uri = base_url().$this->module_uri;
		$post_arr = $this->input->post();	
		$post_arr['train_detail'] = htmlspecialchars($this->input->get_post("train_detail"));


		$root_path = assets_server_path('event/');
		if (!file_exists($root_path)) {
		    mkdir($root_path, 0777, true);
		}

		$config['upload_path'] = $root_path;
		$config['allowed_types'] = 'png|jpg';
		$config['max_size']	= '999999';
		$config['max_width']  = '*';
		$config['max_height']  = '*';

		$this->load->library('upload',$config); 

	 	// $name = 'news_img/'.$post_arr['type']."/".$post_arr['title'].".png"; 

        if ($this->upload->do_upload('file'))
		{			 
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["file_path"] = 'event/'.$data["upload_data"]["file_name"];
		 
		} else{ 
			$post_arr["file_path"] = '';				 
		} 

		// print_r($post_arr);
		// die;


		$success = $this->event_manage_model->insert($post_arr);		 

		if($success)
		{
			$this->comm->plu_redirect($module_uri, 0, "新增成功");
			die();
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "新增失敗");
			die();
		}

		return;
	}

	 
	function edit()
	{
		$module_uri = base_url().$this->module_uri;
		$id = $this->input->get("id");

		if($id)
		{
			$result = $this->event_manage_model->get_event_detail($id);

			if(empty($result))
			{
				$this->comm->plu_redirect($module_uri, 0, "查無此id");
				die();
			}
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "查無此id");
			die();
		}

		$vars['form_action'] = base_url().'fuel/event/do_edit?id='.$id;
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	
 
	 

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars["result"] = $result;
		$vars["view_name"] = "修改";
		$this->fuel->admin->render('_admin/event_edit_view', $vars);
	}

	function do_edit()
	{
		$base_url = base_url();
		$id = $this->input->get("id");		  
		$module_uri = $base_url.'fuel/event/edit?id='.$id; 
		$post_arr = $this->input->post();	 
		$post_arr['train_detail'] = htmlspecialchars($this->input->get_post("train_detail"));

		$root_path = assets_server_path("event/");
		if (!file_exists($root_path)) {
		    mkdir($root_path, 0777, true);
		}  
		 
		$post_arr = $this->input->post();
		$config['upload_path'] = $root_path;
		$config['allowed_types'] = 'png|jpg';
		$config['max_size']	= '9999';
		$config['max_width']  = '*';
		$config['max_height']  = '*';

		$this->load->library('upload',$config); 

	 	// $name = 'news_img/'.$post_arr['type']."/".$post_arr['title'].".png"; 

        if ($this->upload->do_upload('file'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["file_path"] = "event/".$data["upload_data"]["file_name"];
		 
		} else{ 
			$post_arr["file_path"] = $post_arr["exist_file"];				 
		} 
 
		$success = $this->event_manage_model->modify($post_arr, $id);
		
		if($success)
		{
			$this->comm->plu_redirect($module_uri, 0, "修改成功");
			die();
		}
		else
		{
			$this->comm->plu_redirect($module_uri, 0, "修改失敗");
			die();
		}
		return;
	} 

	function do_del()
	{
		$id = $this->input->get("id");
		$response = array();
		if(!empty($id))
		{
			$success = $this->event_manage_model->del($id);

			if($success)
			{
				$response['status'] = 1;
			}
			else
			{
				$response['status'] = -1;
			}
		}
		else
		{
			$response['status'] = -1;
		}

		echo json_encode($response);
	}

	function do_multi_del()
	{
		$ids = $this->input->get_post("eventids");
		$response = array();

		if(!empty($ids))
		{
			if(is_array($ids))
			{
				$ids = implode(",", $ids);
				$success = $this->event_manage_model->multi_del($ids);

				if($success)
				{
					$response['status']	= 1;
				}
				else
				{
					$response['status']	= -1;
				}
			}
			else
			{
				$response['status']	= -1;
			}

		}
		else
		{
			$response['status']	= -1;
		}

		echo json_encode($response);

		return;
	}


	function do_batch_regi_type()
	{
		$regi_ids = $this->input->get_post("regiids");
		$regi_type = $this->input->get_post("regi_type");
		$response = array();

		if(!empty($regi_ids))
		{
			if(is_array($regi_ids))
			{
				$ids = implode(",", $regi_ids);
				$success = $this->event_manage_model->multi_update_regi_type($ids, $regi_type);

				if($success)
				{
					$response['status']	= 1;
				}
				else
				{
					$response['status']	= -1;
				}
			}
			else
			{
				$response['status']	= -1;
			}

		}
		else
		{
			$response['status']	= -1;
		}

		echo json_encode($response);

		return;
	}

	// function plu_redirect($url, $delay, $msg)
	// {
	//     if( isset($msg) )
	//     {
	//         $this->notify($msg);
	//     }

	//     echo "<meta http-equiv='Refresh' content='$delay; url=$url'>";
	// }

	// function notify($msg)
	// {
	//     $msg = addslashes($msg);
	//     echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	//     echo "<script type='text/javascript'>alert('$msg')</script>\n";
	//     echo "<noscript>$msg</noscript>\n";
	//     return;
	// }

	public function set_session($key, $value, $op="=")
	{ 
		$filter = "";
	    if ($value != "") {
	    	if ($op=="like") {
	    		$filter = " AND $key like '%$value%' ";
	    	}else 
				$this->session->set_userdata($key, $value);
		}else{
			// if (!isset($$value) ) {
			// 	$value = $this->session->userdata($key); 
			// 	if ($value != "") {
			// 		$value = $value;
			// 		$filter = " AND $key = '$value'";
			// 	} 
			// }else{
				$this->session->set_userdata($key, "");
			// }				
		}
		return $filter;
	}

	private function gen_file_name()
	{
		$r_char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$file_name = "";

		for($i=0; $i<10; $i++)
		{
			$file_name .= $r_char[rand(0, strlen($r_char) - 1)];
		}

		return $file_name;
	}

}
?>