<?php
class Train_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function get_list($is_free){
        // -99 : 隱藏
        // -98：變成歷史課程 , 出現在front-end iso 教育訓練網 list最下方
        $sql = @"select * from mod_train where ( '$is_free'='-1' || is_free = '$is_free') AND train_order not in ('-99','-98') order by train_date asc";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    } 

    public function get_his_list(){
        // -99 : 隱藏
        // -98：變成歷史課程 , 出現在front-end iso 教育訓練網 list最下方
        $sql = @"select * from mod_train where train_order='-98' order by train_date asc";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    } 

    public function get_train_by_id($id){
        $sql = @"select *, (SELECT COUNT(*) FROM mod_register WHERE mod_register.train_id = mod_train.id ) reg_count from mod_train where id = '$id' AND train_order not in ('-99','-98') ";
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
                                            customer_name2, 
                                            sex2,   
                                            email2,
                                            contact_tel2,
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
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())"; 

        $para = array(
                $insert_data['company_name'], 
                $insert_data['dep'],
                $insert_data['name'],
                $insert_data['sex'],  
                $insert_data['mail'],
                $insert_data['phone'],
                $insert_data['name2'],
                $insert_data['sex2'],  
                $insert_data['mail2'],
                $insert_data['phone2'],
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