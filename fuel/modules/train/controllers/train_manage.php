<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Train_manage extends Fuel_base_controller {
	public $view_location = 'train';
	public $nav_selected = 'train/manage';
	public $module_name = 'train manage';
	public $module_uri = 'fuel/train/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('train/manage');
		$this->load->module_model(TRAIN_FOLDER, 'train_manage_model');
		$this->load->module_model(CODEKIND_FOLDER, 'codekind_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
		$this->load->library('session');
		$this->load->library('comm');
	}
	
	function lists($dataStart=0)//train_kind 0=>最新消息 1=>CI設計 2=>ISO輔導項目3=>ISO小學堂
	{
		$base_url = base_url();

		$train_name = $this->train_name_by_kind($train_kind);

		$search_keyword = $this->input->get_post('search_keyword'); 
		
		$filter = " WHERE train_kind = '$train_kind' "; 

		if ($search_keyword != "") {
			$filter .= " AND (title like '%$search_keyword%' || content like '%$search_keyword%') "; 
			$this->session->set_userdata('search_keyword', $search_keyword);
		}else{
			if (!isset($search_keyword) ) {
				$search_keyword = $this->session->userdata('search_keyword'); 
				if ($search_keyword != "") {
					$search_keyword = $search_keyword;
					$filter .= " AND (title like '%$search_keyword%' || content like '%$search_keyword%') "; 
				} 
			}else{
				$this->session->set_userdata('search_keyword', "");
			}					
		}

		// print_r($filter);

		$target_url = $base_url."fuel/train/lists/$train_kind/";

		$total_rows = $this->train_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config); 

		$results = $this->train_manage_model->get_train_list($dataStart, $dataLen,$filter);

		$vars['train_name'] = $train_name;
		$vars['search_keyword'] = $search_keyword;
		$vars['total_rows'] = $total_rows; 
		$vars['form_action'] = $base_url."fuel/train/lists/$train_kind";
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url."fuel/train/create/$train_kind";
		$vars['edit_url'] = $base_url.'fuel/train/edit/';
		$vars['del_url'] = $base_url.'fuel/train/del/';
		$vars['multi_del_url'] = $base_url.'fuel/train/do_multi_del';
		$vars['results'] = $results;
		$vars['total_rows'] = $total_rows; 
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/train_lists_view', $vars);

	}

 
	function create()
	{
		// $total_rows = $this->train_manage_model->get_total_rows(" WHERE 1=1 ");
		// $vars['train_order'] = $total_rows + 1; 
		$vars['form_action'] = base_url().'fuel/train/do_create';
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		

		$vars['module_uri'] = base_url().$this->module_uri;
		$vars['view_name'] = "新增";

		$type = $this->codekind_manage_model->get_code_list_for_other_mod("trainTYPE");
		$vars['type'] = $type;

		$lang = $this->codekind_manage_model->get_code_list_for_other_mod("LANG_CODE");
		$vars['lang'] = $lang;
 

		$this->fuel->admin->render("_admin/train_create_view", $vars);
	}

	function do_create()
	{
		$post_arr = $this->input->post();		
		$train_kind = $post_arr['train_kind'];
		$root_path = assets_server_path('train_img/'.$post_arr['train_kind'].'/');
		if (!file_exists($root_path)) {
		    mkdir($root_path, 0777, true);
		}
		 
		$post_arr["content"] = htmlspecialchars($post_arr["content"]);	
		$module_uri = base_url().$this->module_uri.'/'.$train_kind;
		 
		$post_arr = $this->input->post();
		$config['upload_path'] = $root_path;
		$config['allowed_types'] = 'png';
		$config['max_size']	= '9999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload',$config); 

	 	// $name = 'train_img/'.$post_arr['type']."/".$post_arr['title'].".png"; 

        if ($this->upload->do_upload('img'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["img"] = 'train_img/'.$post_arr['train_kind']."/".$data["upload_data"]["file_name"];
			
		 
		} else{ 
			 $post_arr["img"] = '';				 
		} 

		//調整順序
		$lang = $post_arr["lang"];
		$type = $post_arr["type"];
		$total_rows = $this->train_manage_model->get_total_rows(" WHERE 1=1 AND lang='$lang' AND type='$type' ");
		if ($post_arr['train_order'] > $total_rows + 1) {
			$post_arr['train_order'] = $total_rows + 1;
		}else if($post_arr['train_order'] < 1){
			$post_arr['train_order'] = 1;
		}else{
			$this->train_manage_model->did_insert_order_modify($post_arr['train_order'],$post_arr);
		}

		 
		$success = $this->train_manage_model->insert($post_arr);
			// $success = true;
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
	 
	function edit($id)
	{ 
		$train;
		if(isset($id))
		{
			$train = $this->train_manage_model->get_train_detail($id);
		} 

		if(!isset($id) || !isset($train))
		{
			$this->plu_redirect(base_url().'fuel/train/lists', 0, "找不到資料");
			die;
		}

		$train_kind = $train->train_kind;
	    $train_name = $this->train_name_by_kind($train_kind);
		$vars['train_name'] = $train_name;
		$vars['train_kind'] = $train_kind;
		$vars['form_action'] = base_url()."fuel/train/do_edit/$id";
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	

	    $vars['train'] = $train; 
		$vars['module_uri'] = base_url().$this->module_uri.'/'.$train_kind;
	 
		$vars["view_name"] = "修改";
		$this->fuel->admin->render('_admin/train_edit_view', $vars);
	}

	function do_edit($id)
	{ 
		$post_arr = $this->input->post();
		$train_kind = $post_arr['train_kind'];
		$module_uri = base_url().$this->module_uri.'/'.$train_kind;
		
		$root_path = assets_server_path("train_img/$train_kind/");
		if (!file_exists($root_path)) {
		    mkdir($root_path, 0777, true);
		} 

		$post_arr["content"] = htmlspecialchars($post_arr["content"]);	
		 
		$post_arr = $this->input->post();
		$config['upload_path'] = $root_path;
		$config['allowed_types'] = 'png';
		$config['max_size']	= '9999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload',$config); 

	 	// $name = 'train_img/'.$post_arr['type']."/".$post_arr['title'].".png"; 

        if ($this->upload->do_upload('img'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["img"] = "train_img/$train_kind/".$data["upload_data"]["file_name"];
		 
		} else{ 
			$post_arr["img"] = $post_arr["exist_img"];				 
		} 

		$post_arr["id"] = $id;

		//調整順序 
		if ($post_arr['train_ori_order'] != $post_arr['train_order']) {
			$ori_obj = $this->train_manage_model->get_order($post_arr);
			if (isset($ori_obj)) {
				$ori_id = $ori_obj->id;
				$this->train_manage_model->update_order($post_arr['train_order'],$id);
				$this->train_manage_model->update_order($post_arr['train_ori_order'],$ori_id);
			}
		} 

		$success = $this->train_manage_model->update($post_arr); 

		if($success)
		{
			$this->plu_redirect($module_uri, 0, "更新成功");
			die();
		}
		else
		{
			$this->plu_redirect($module_uri, 0, "更新失敗");
			die();
		}
		return;
	} 

	function do_multi_del(){
		$result = array();

		$ids = $this->input->get_post("ids");


		if($ids)
		{
			// $im_ids = implode(",", $ids);
			// $result['im_ids'] = $im_ids;
			foreach ($ids as $key) {
				$this->do_del($key);
			}
			$success = true;
			// $success = $this->train_manage_model->do_multi_del($im_ids);
		}
		else
		{
			$success = false;
		}



		if(isset($success))
		{
			$result['status'] = 1;
		}
		else
		{
			$result['status'] = $ids;
		}


		if(is_ajax())
		{
			echo json_encode($result);
		}
	} 

	function do_del($id)
	{
		$response = array();
		if(!empty($id))
		{
			$record = $this->train_manage_model->get_train_detail($id);
			if (isset($record)) {
				$success = $this->train_manage_model->del($id);
				$this->train_manage_model->delete_order($record); 
				if($success)
				{
					$response['status'] = 1;
				}
				else
				{
					$response['status'] = -1;
				}
			}else{
				$response['status'] = -1;
			} 
		}
		else
		{
			$response['status'] = -1;
		}

		echo json_encode($response);
	}
 

}