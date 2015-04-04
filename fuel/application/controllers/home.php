<?php
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('core_model');  
		$this->load->model('code_model');  
		$this->load->library('comm');	
		$this->load->helper('ajax');
		$this->load->library('email');
		$this->load->model('train_model');  
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

		$performance = $this->code_model->get_code_info("NEWS_TYPE","PERFORMANCE");
		// print_r($performance);
		// die;
		$vars['performance_name'] = $performance[0]->code_name;

		$iso_news_type = $this->code_model->get_iso_news_type();
		$result = array();

		foreach ($iso_news_type as $key => $value) { 	
			if ($value->code_key == 'FREE_TRAIN') {
				$free_train = $this->train_model->get_list(0);
				if (is_array($free_train) && sizeof($free_train) > 0) {
					$value->detail = (object)array('title'=>$free_train[0]->train_title,'img'=>$free_train[0]->file_path,'url'=>site_url().'iso_train?type=free');
				}else{
					$value->detail =  (object)array('title'=>'','img'=>'','url'=>site_url());
				}
				$result[$value->code_id] = $value;
			}else{
				$detail = $this->code_model->get_iso_news_items($value->code_id);				
				if (is_array($detail) && sizeof($detail) > 0) {
					$value->detail = (object)array('title'=>$detail[0]->title,'img'=>$detail[0]->img,'url'=>site_url().'home/iso_news?news_type='.$value->code_name);//$detail[0];
				}else{
					$value->detail = (object)array('title'=>'','img'=>'','url'=>site_url());
				}
				$result[$value->code_id] = $value;
			}			
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
		$this->code_model->update_news_viewcount($id);

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

		$this->code_model->update_news_viewcount($id);

		$vars['news'] = $news;


		

		$vars['interest_news'] = $this->get_extension_news($news->keyword);//$this->code_model->get_coach_by_type($news->type);
		//$vars['interest_news2'] = $this->code_model->get_random_all_news();
		$vars['news_series'] = $this->code_model->get_random_coach();
		$vars['news_type'] = $this->code_model->get_series_info($news->type);

		if ($news->layout_type <> 1) {
			$vars['views'] = 'iso_coach_2coldetail';
			$vars['base_url'] = base_url();
			$page_init = array('location' => 'iso_coach_2coldetail');
			$this->fuel->pages->render("iso_coach_2coldetail", $vars);
		}else{
			$recommand = $this->code_model->get_code_info("NEWS_TYPE","RECOMMEND");	 
			$vars['recommand_name'] = $recommand[0]->code_name;
			$vars['recommand_news'] = $this->code_model->get_recommand_news(10);
			$vars['views'] = 'iso_coach_singlecoldetail';
			$vars['base_url'] = base_url();
			$page_init = array('location' => 'iso_coach_singlecoldetail');
			$this->fuel->pages->render("iso_coach_singlecoldetail", $vars);
		}
	 
	}

	function get_extension_news($keyword){
		if (isset($keyword)) {
			$k_ary = explode(',', $keyword);
			$filter = ' AND ( ';
			for($i=0;$i<sizeof($k_ary);$i++){
				$k = $k_ary[$i];

				$filter.=" title like '%$k%' ";

				if ($i != sizeof($k_ary)-1) {
					$filter.=" OR ";
				} 				
			}
			$filter .= ' )';
			// echo $filter;
			// die;
			$extension_news = $this->code_model->get_extension_news(4,$filter,'',' limit 0,10 ');//最新消息
			$extension_coach = $this->code_model->get_extension_news(2,$filter,'',' limit 0,10 ');//ISO輔導項目

			return array_slice(array_merge($extension_news, $extension_coach),0,10);

		}else{
			return array();
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
	function iso_coach_list($type)
	{	
		$lang_code = $this->uri->segment(1);

		$news_type = $this->code_model->get_series_info($type);

		if (!isset($news_type)) {
			$this->comm->plu_redirect(site_url(), 0, "找不到資料");
			die;
		}

		$vars['news_type'] = $news_type;
		$vars['news_series'] = $this->code_model->get_coach_by_type($type);

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
		$vars['coor_unit'] = $this->code_model->get_coor_unit();
		$vars['inquiry_topic'] = $this->code_model->get_inquiry_topic();
		$vars['do_contact_url'] = base_url()."home/do_contact";
		$vars['views'] = 'contactus';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'contactus');
		$this->fuel->pages->render("contactus", $vars);
	 
	}
	function iso_class($type="-1")
	{	
		$lang_code = $this->uri->segment(1);
		$vars['iso'] = $this->code_model->get_iso_class_news($type);
		$vars['coach_type'] = $this->code_model->get_iso_coach_type();
		$vars['interest_news'] = $this->code_model->get_random_all_news();
		$vars['views'] = 'iso_class';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_class');
		$this->fuel->pages->render("iso_class", $vars);
	 
	}
	function iso_class_detail($id)
	{	
		$lang_code = $this->uri->segment(1);

		$news = $this->code_model->get_news_by_id($id);

		if (!isset($news)) {
			$this->comm->plu_redirect(site_url(), 0, "找不到資料");
			die;
		}

		$this->code_model->update_news_viewcount($id);

		$vars['news'] = $news;
		$vars['interest_news'] = $this->get_extension_news($news->keyword);//$this->code_model->get_random_all_news();
		// $vars['interest_news2'] = $this->code_model->get_random_all_news();
		$recommand = $this->code_model->get_code_info("NEWS_TYPE","RECOMMEND");	 
		$vars['recommand_name'] = $recommand[0]->code_name;
		$vars['recommand_news'] = $this->code_model->get_recommand_news(5);
		$vars['news_series'] = $this->code_model->get_random_coach();
		$vars['news_type'] = $this->code_model->get_series_info($news->type);

		$vars['views'] = 'iso_class_detail';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_class_detail');
		$this->fuel->pages->render("iso_class_detail", $vars);
	 
	}

	function iso_news($news_id='')
	{	
		// print_r($news_id);
		// die;
		$lang_code = $this->uri->segment(1);
		$iso_news_type = $this->code_model->get_iso_news_type();
		$result = array();
		$news_type = $this->input->get_post('news_type'); 

		foreach ($iso_news_type as $key => $value) { 
			$result[$value->code_name] = $this->code_model->get_iso_news_items($value->code_id); 
		} 

		if (isset($news_type) && empty($news_type)) {
			$news_type = $iso_news_type[0]->code_name;
		}
		// var_dump(is_int((int)'139'));

		if (is_int(((int)$news_type))) {
			// print_r($news_type);
			$code_info = $this->code_model->get_series_info($news_type);
				// print_r($code_info);
			if (isset($code_info)) {
				// print_r($code_info);
				$news_type = $code_info->code_name;
			}
		}

		// print_r($news_type);
		// die;
		$vars['news_id'] = $news_id;
		$vars['news'] = $result;
		$vars['views'] = 'news';
		$vars['news_type'] = $news_type;
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'news');
		$this->fuel->pages->render("news", $vars);
	}


	function search_result($keyword)
	{	
		$lang_code = $this->uri->segment(1);
		$keyword = urldecode($keyword);
		$vars['result'] = $this->code_model->get_serach_news($keyword);
		$vars['views'] = 'search_result';
		$vars['keyword'] = $keyword;
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

	function do_contact()
	{
		if(is_ajax())
		// if(true)
		{  
			$post_arr = $this->input->post();

			$managers = $this->code_model->get_code("ISO_EMAIL_GROUP","zh-TW");
			// print_r($managers);
			// die;

		    

		    $subject = "CONTACT US FROM WEBSITE"; //信件標題 
	 
	 		$name = $post_arr['name'];
            $email = $post_arr['email'];
            $inquiry_topic = $this->code_model->get_series_info($post_arr['inquiry_topic'])->code_name;
            $coor_unit = $this->code_model->get_series_info($post_arr['coor_unit'])->code_name;
            $msg2 = $post_arr['msg'];

			// $msg = "
 
			// <html xmlns='http://www.w3.org/1999/xhtml'>
			// <head>
			// <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			// <meta name='viewport' content='width=device-width; initial-scale=1.0' /> <!-- 於手機觀看時不會自動放大 -->
			// <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <!-- 最佳的IE兼容模式 -->
			// </head>
			// <body style='margin: 0px auto;text-align:center;background-color:#f1f1f1;'>
			// <div style='margin: 0px auto;text-align:left;width:600px;background-color:#f1f1f1;'>
			//     <div style='padding:30px 0 10px 0;'>
			//         <img src='http://a-wei.lionfree.net/leadership/images/mail/logo.png'>
			//         <div style='font-size:12px;display:inline-block;float:right;line-height:50px;padding-right:5px;'><a href='http://a-wei.lionfree.net/leadership/index.php' style='color:black;text-decoration: none;'>回領導力官網</a></div>
			//     </div>
			//     <div style='background-color:#fff;padding:50px;min-height:500px;'>
			//         <div style='margin: 0px auto;text-align:center;'><img src='http://a-wei.lionfree.net/leadership/images/mail/head.jpg'></div>
			//         <div style='font-size:26px;margin-bottom:50px;'>你好：<br>領導力企管有一封新的線上留言。</div>
			//         <div style='line-height:30px;'>
			//             <div style='vertical-align:top;font-weight:bold;font-size:14px;margin-right:5px;display:inline-block;width:75px;'>姓　　名：</div><div style='width:420px;font-size:14px;display:inline-block;'>$name</div>
			//         </div>
			//         <div style='line-height:30px;'>
			//             <div style='vertical-align:top;font-weight:bold;font-size:14px;margin-right:5px;display:inline-block;width:75px;'>電子信箱：</div><div style='width:420px;font-size:14px;display:inline-block;'>$email</div>
			//         </div>
			//         <div style='line-height:30px;'>
			//             <div style='vertical-align:top;font-weight:bold;font-size:14px;margin-right:5px;display:inline-block;width:75px;'>服務：</div><div style='width:420px;font-size:14px;display:inline-block;'>$inquiry_topic</div>
			//         </div>
			//         <div style='line-height:30px;'>
			//             <div style='vertical-align:top;font-weight:bold;font-size:14px;margin-right:5px;display:inline-block;width:75px;'>驗證機構：</div><div style='width:420px;font-size:14px;display:inline-block;'>$coor_unit</div>
			//         </div>
			//         <div style='line-height:30px;'>
			//             <div style='vertical-align:top;font-weight:bold;font-size:14px;margin-right:5px;display:inline-block;width:75px;'>留言內容：</div><div style='width:420px;font-size:14px;display:inline-block;'>$msg2</div>
			//         </div>
			//     </div>
			//     <div style='background-color:#fafafa;padding:30px 0 30px 50px;border-top:solid 2px #f1f1f1;'>
			//         <div style='font-size:14px;margin-bottom:10px;'>若你還有其它問題，歡迎來信或來電洽詢。</div>
			//         <div style='font-size:14px;margin-bottom:10px;'>全省免費諮詢電話 0800-222-007</div>
			//         <div style='font-size:14px;margin-bottom:10px;'>E-Mail：Service@isoleader.com.tw</div>
			//         <div style='margin-top:30px;font-size:14px;font-weight:bold;'>領導力企管客服部 敬上</div>
			//     </div>
			//     <div style='font-size:12px;margin: 0px auto;text-align:center;line-height:30px;'>若無法正常閱讀本郵件，請點選此<a href='mail.php' style='color:#eb1d23;'><font style='color:#eb1d23;'>連結</font></a></div>
			// </div>
			// </body>
			// </html>


			// ";

			$url = site_url();
			$image_url = $url.'assets/templates/images/mail/logo.png';

			$msg = "

				<html xmlns='http://www.w3.org/1999/xhtml'>
				<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<meta name='viewport' content='width=device-width; initial-scale=1.0' /> <!-- 於手機觀看時不會自動放大 -->
				<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <!-- 最佳的IE兼容模式 -->
				</head>
				<body style='margin: 0px auto;text-align:center;background-color:#f1f1f1;'>
				<div style='margin: 0px auto;text-align:left;width:600px;background-color:#f1f1f1;'>
				    <div style='padding:30px 0 10px 0;'>
				        <img src='$image_url'>
				        <div style='font-size:12px;display:inline-block;float:right;line-height:50px;padding-right:5px;'><a href='$url' style='color:black;text-decoration: none;'>回領導力官網</a></div>
				    </div>
				    <div style='background-color:#fff;padding:20px 50px 20px 50px;'>
				        <!--<div style='margin: 0px auto;text-align:center;'><img src='http://a-wei.lionfree.net/leadership/images/mail/head.jpg'></div>-->
				        <div style='font-size:14px;line-height:26px;'>你好：<br>我們已收到您的線上留言。將儘快與您聯繫。</div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>姓名：</div><div style='font-size:14px;display:inline-block;'>$name</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>電子信箱：</div><div style='font-size:14px;display:inline-block;'>$email</div>
				        </div> 
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>詢問主旨：</div><div style='font-size:14px;display:inline-block;'>$inquiry_topic</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>公司人數：</div><div style='font-size:14px;display:inline-block;'>$coor_unit</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>詢價內容：</div><div style='font-size:14px;display:inline-block;'>$msg2</div>
				        </div>
				    </div>
				    <div style='background-color:#fafafa;padding:20px 0 20px 50px;border-top:solid 2px #f1f1f1;'>
				        <div style='font-size:14px;margin-bottom:10px;'>若你還有其它問題，歡迎來信或來電洽詢。</div>
				        <div style='font-size:14px;margin-bottom:10px;'>全省免費諮詢電話 0800-222-007</div>
				        <div style='font-size:14px;margin-bottom:10px;'>E-Mail：Service@isoleader.com.tw</div>
				        <div style='margin-top:30px;font-size:14px;'>領導力企管客服部 敬上</div>
				    </div>
				    <div style='font-size:12px;margin: 0px auto;text-align:center;line-height:26px;'>若無法正常閱讀本郵件，請點選此<a href='mail.php' style='color:#eb1d23;'><font style='color:#eb1d23;'>連結</font></a></div>
				</div>
				</body>
				</html>

			";

			// echo $msg;
			// die;

			 
			if (isset($managers)) {
				foreach ($managers as $row) {
					// $result[$row->code_id] = $row->code_value1; 
					$m_email = $row->code_value1; 
					$this->email->from('service@isoleader.com.tw', 'Leadership');
					$this->email->to($m_email); 
					$this->email->subject($subject);
					// $this->email->message(fuel_block('contact_content'));
					$this->email->message($msg); 
					$success = $this->email->send();
					// echo "1 $success <br/>";
					// if ( ! $this->email->send() )
					//   {
					//     echo 'Failed';

					//     // Loop through the debugger messages.
					//     foreach ( $this->email->get_debugger_messages() as $debugger_message )
					//       echo $debugger_message;

					//     // Remove the debugger messages as they're not necessary for the next attempt.
					//     $this->email->clear_debugger_messages();
					//   }
					//   else
					//     echo 'Sent';
				}
			}

			$this->email->from('service@isoleader.com.tw', 'Leadership');
			$this->email->to($email); 
			$this->email->subject($subject); 
			$this->email->message($msg);
			$success = $this->email->send();

			// echo "2 $success <br/>";

			$this->code_model->insert_mod_contact($post_arr);

			$result['status'] = 1; 
			echo json_encode($result);
		}
		else
		{
			// redirect(site_url(), 'refresh');
			$result['status'] = -1;
			$result['msg'] = "發生錯誤,請再試一次";
			echo json_encode($result);
		}

		die();
	}
	 
}