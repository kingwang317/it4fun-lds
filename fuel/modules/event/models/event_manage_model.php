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
		$sql = @"SELECT * FROM mod_train $filter ORDER BY modi_date DESC LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_regi_event_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT a.*,b.event_title FROM mod_register a LEFT JOIN mod_train b ON a.event_id = b.event_id $filter ORDER BY a.drop_date DESC LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_status_list($event_id)
	{
		$sql = @"SELECT a.regi_id, a.event_id, a.account, a.drop_date, a.regi_type, b.name, c.event_title,b.contact_tel FROM mod_register a, mod_resume b, mod_train c WHERE a.event_id=? AND a.account=b.account AND a.event_id=c.event_id";
		$para = array($event_id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function do_regi_event($event_id, $account)
	{
		$sql = @"INSERT INTO mod_register (
				event_id,
				account,
				drop_date,
				regi_type)
				VALUES(?, ?, NOW(), 0)";
		$para = array($event_id, $account);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function insert($data)
	{
		$sql = @"INSERT INTO mod_train (
				event_title, 
				event_start_date, 
				event_end_date, 
				regi_start_date, 
				regi_end_date, 
				event_charge,
				event_place, 
				event_list_photo,
				event_photo,
				regi_limit_num,
				event_detail,
				create_time, 
				update_time)
				VALUES (?,?, ?, ?, ?, ?, ? ,?, ?, ?, ?, NOW(), NOW())
				";
		$para = array(
				$data['event_title'],
				$data['event_start_date'],
				$data['event_end_date'],
				$data['regi_start_date'],
				$data['regi_end_date'],
				$data['event_charge'],
				$data['event_place'],
				$data['event_list_photo'],
				$data['event_photo'],
				$data['regi_limit_num'],
				$data['event_detail']
			);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function modify($data, $event_id)
	{
		$sql = @"UPDATE mod_train SET event_title=?, event_start_date=?, event_end_date=?, regi_start_date=?, regi_end_date=?, event_charge=?, event_place=?, regi_limit_num=?, event_detail=?, update_time=NOW() WHERE event_id=?";
		$para = array(
				$data['event_title'],
				$data['event_start_date'],
				$data['event_end_date'],
				$data['regi_start_date'],
				$data['regi_end_date'],
				$data['event_charge'],
				$data['event_place'],
				$data['regi_limit_num'],
				$data['event_detail'],
				$event_id
			);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function modify_photo_name($column_name = 'event_photo',$file_name, $event_id)
	{
		$sql = "UPDATE mod_train SET $column_name = ?, update_time = NOW() WHERE event_id = ?";
		$para = array($file_name, $event_id);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function get_photo_name($column_name = 'event_photo',$event_id)
	{
		$sql = "SELECT $column_name FROM mod_train WHERE event_id=?";
		$para = array($event_id);

		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$row = get_object_vars($row);
			return $row["$column_name"];
		}

		return;
	}

	public function get_event_detail($event_id)
	{
		$sql = @"SELECT * FROM mod_train WHERE event_id=?";
		$para = array($event_id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->row();

			return $result;
		}

		return;
	}

	public function del($event_id)
	{
		$sql = "DELETE FROM mod_train WHERE event_id=?";
		$para = array($event_id);
		$success= $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function multi_del($event_ids)
	{
		$sql = "DELETE FROM mod_train WHERE event_id IN ($event_ids)";
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

	public function get_regi_limit($event_id)
	{
		$sql = @"SELECT regi_limit_num FROM mod_train WHERE event_id=?";
		$para = array($event_id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->regi_limit_num;
		}

		return 0;
	}

	public function get_regi_num($event_id)
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_register WHERE event_id=?";
		$para = array($event_id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->total_rows;
		}

		return 0;
	}

	public function do_chk_limit($event_id)
	{
		$regi_limit = $this->get_regi_limit($event_id);
		$regi_num 	= $this->get_regi_num($event_id);

		if($regi_num < $regi_limit)
		{
			return true;
		}

		return false;
	}

	public function do_chk_regied($event_id, $account)
	{
		$sql = @"SELECT account FROM mod_register WHERE event_id=? AND account=?";
		$para = array($event_id, $account);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			return false;
		}

		return true;
	}
	
}
?>