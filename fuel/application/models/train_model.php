<?php
class Train_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_list($is_free){
        $sql = @"select * from mod_train where ( '$is_free'='-1' || is_free = '$is_free') order by train_date";
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

    public function insert_mod_register($insert_data){
        $sql = @"INSERT INTO mod_register (
                                            company_name, 
                                            dep_name,
                                            customer_name, 
                                            sex,   
                                            email,
                                            contact_tel,
                                            train_id,
                                            train_price,
                                            train_place,
                                            train_date,
                                            invoice_type,
                                            invoice_title,
                                            company_serialno,
                                            is_vegetarian,
                                            is_agree,
                                            register_msg,
                                            modi_date

                                        ) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())"; 

        $para = array(
                $insert_data['company_name'], 
                $insert_data['dep'],
                $insert_data['name'],
                $insert_data['sex'],  
                $insert_data['mail'],
                $insert_data['phone'],
                $insert_data['train_id'],
                $insert_data['price'],
                $insert_data['place'],
                $insert_data['datepicker'],
                $insert_data['invoice'],
                $insert_data['invoice_title'],
                $insert_data['Uniform'],
                $insert_data['lunch_box'],
                $insert_data['agree'],
                $insert_data['register_msg']
            );
        $success = $this->db->query($sql, $para);

        if($success)
        {
            return true;
        }

        return;
    }
 

}