<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(EVENT_FOLDER, EVENT_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_train']); // table name
	}

	public function get_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_train $filter ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_event_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT * , (SELECT COUNT(*) FROM mod_register WHERE mod_register.train_id = mod_train.id ) reg_count FROM mod_train $filter ORDER BY train_date DESC LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_reg_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_register $filter ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_reg_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT *  FROM mod_register $filter ORDER BY train_date,modi_date DESC LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_reg_detail($id)
	{
		$sql = @"SELECT *,(SELECT train_title FROM mod_train WHERE mod_train.id = mod_register.train_id ) AS train_title FROM mod_register WHERE id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->row();

			return $result;
		}

		return;
	}

	// public function get_regi_event_list($dataStart, $dataLen, $filter)
	// {
	// 	$sql = @"SELECT a.*,b.train_title FROM mod_register a LEFT JOIN mod_train b ON a.id = b.id $filter ORDER BY a.modi_date LIMIT $dataStart, $dataLen";
	
	// 	$query = $this->db->query($sql);

	// 	if($query->num_rows() > 0)
	// 	{
	// 		$result = $query->result();

	// 		return $result;
	// 	}

	// 	return;
	// } 

	// public function do_regi_event($id, $account)
	// {
	// 	$sql = @"INSERT INTO mod_register (
	// 			id,
	// 			account,
	// 			drop_date,
	// 			regi_type)
	// 			VALUES(?, ?, NOW(), 0)";
	// 	$para = array($id, $account);
	// 	$success = $this->db->query($sql, $para);

	// 	if($success)
	// 	{
	// 		return true;
	// 	}

	// 	return;
	// }

	public function insert($data)
	{
		$sql = @"INSERT INTO mod_train (
				`is_free`, 
				`train_title`, 
				`train_detail`, 
				`train_price`, 
				`train_time_s`,
				`train_time_e`,
				`train_date`, 
				`train_days`,
				`train_hours`,
				`coll_unit`,
				`train_place`,
				`train_place_s`,
				`host_unit`, 
				`file_path`, 
				`notify_date`, 
				`modi_date` )
				VALUES (?,?, ?, ?, ?, ?, ?, ? ,?, ?,?, ?, ?,?,?, NOW())
				";
		$para = array(
				$data['is_free'],
				$data['train_title'],
				$data['train_detail'],
				$data['train_price'],
				$data['train_time_s'],
				$data['train_time_e'],
				$data['train_date'],
				$data['train_days'],
				$data['train_hours'],
				$data['coll_unit'],
				$data['train_place'],
				$data['train_place_s'],
				$data['host_unit'],
				$data['file_path'],
				$data['notify_date']
			);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function modify($data, $id)
	{
		$sql = @"UPDATE mod_train SET is_free=?, 
									  train_title=?, 
									  train_detail=?, 
									  train_price=?, 
									  train_time_s=?, 
									  train_time_e=?,
									  train_date=?, 
									  train_days=?,
									  train_hours=?, 
									  coll_unit=?, 
									  train_place=?, 
									  train_place_s=?, 
									  host_unit=?, 
									  file_path=?, 
									  notify_date=?, 
									  modi_date=NOW() 
									  WHERE id=?";
		$para = array(
				$data['is_free'],
				$data['train_title'],
				$data['train_detail'],
				$data['train_price'],
				$data['train_time_s'],
				$data['train_time_e'],
				$data['train_date'],
				$data['train_days'],
				$data['train_hours'],
				$data['coll_unit'],
				$data['train_place'],
				$data['train_place_s'],
				$data['host_unit'],
				$data['file_path'],
				$data['notify_date'],
				$id
			);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	} 

	public function get_event_detail($id)
	{
		$sql = @"SELECT * FROM mod_train WHERE id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->row();

			return $result;
		}

		return;
	}

	public function del($id)
	{
		$sql = "DELETE FROM mod_train WHERE id=?";
		$para = array($id);
		$success= $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function multi_del($ids)
	{
		$sql = "DELETE FROM mod_train WHERE id IN ($ids)";
		$success = $this->db->query($sql);

		if($success)
		{
			return true;
		}

		return;
	}

	public function multi_update_regi_type($regi_ids, $regi_type)
	{
		$sql = "UPDATE mod_register SET  regi_type = ? WHERE regi_id IN ($regi_ids)";
		$para = array($regi_type);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function get_regi_limit($id)
	{
		$sql = @"SELECT regi_limit_num FROM mod_train WHERE id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->regi_limit_num;
		}

		return 0;
	}

	public function get_regi_num($id)
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_register WHERE id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->total_rows;
		}

		return 0;
	}

	public function do_chk_limit($id)
	{
		$regi_limit = $this->get_regi_limit($id);
		$regi_num 	= $this->get_regi_num($id);

		if($regi_num < $regi_limit)
		{
			return true;
		}

		return false;
	}

	public function do_chk_regied($id, $account)
	{
		$sql = @"SELECT account FROM mod_register WHERE id=? AND account=?";
		$para = array($id, $account);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			return false;
		}

		return true;
	}
	
}
?>