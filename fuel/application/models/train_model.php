<?php
class Train_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_list($is_free){
        $sql = @"select * from mod_train where is_free = '$is_free' order by train_date";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    } 

    public function get_train_by_id($id){
        $sql = @"select * from mod_train where id = '$id' ";
        $query = $this->db->query($sql);
        // echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->row();

            return $result;
        }
    }
 

}