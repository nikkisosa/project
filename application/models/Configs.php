<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Author:
Date Created:January 06,2018
Description:
*/
class Configs extends CI_Model{

	function __construct(){
		$this->load->database();
	}

    function get_all_user($role = ''){
        $this->db->select('CONCAT(a.fname," ",a.lname) as name,a.account_id,r.type,a.mobile_no')
                 ->from('account as a')
                 ->join('users as u','a.user_id = u.user_id')
                 ->join('role as r','u.role_id = r.role_id')
                 ->where('a.is_archive','false');
                if($role == ''){

                }else if($role == 'Students'){
                    $this->db->where('r.type','student');
                }else if($role == 'Teachers'){
                    $this->db->where('r.type','teacher');
                }else if($role == 'Parents'){
                    $this->db->where('r.type','parent');
                }else if($role == 'All'){

                }
        $query = $this->db->get()->result_array();
        return $query;

    }
	function save_sms($email,$password,$deviceid,$name){
		$this->db->select('username')
				 ->from('sms')
                 ->where('username',$email)
                 ->where('modem_name',$name)
				 ->limit(1);
        $query = $this->db->get()->row('username');
        if(!empty($query)){
            return 'Account Already exist!';
        }else{
            $this->db->set('username',$email,true)
                     ->set('password',$password,true)
                     ->set('device_id',$deviceid,true)
                     ->set('modem_name',$name,true)
                     ->insert('sms');
            return 'Account successfully save.';
        }
    }

    function update_sms($id,$email,$password,$deviceid,$name){
         $this->db->set('username',$email,true)
                     ->set('password',$password,true)
                     ->set('device_id',$deviceid,true)
                     ->set('modem_name',$name,true)
                     ->where('modem_id',$id)
                     ->update('sms');
         return 'Account successfully update.';
    }

    function delete_sms($id){
        $this->db->where('modem_id',$id)
                 ->delete('sms');
    }

    function select_sms($modem = 'default'){
        if($modem == 'default'){
            $this->db->select('*')
                        ->from('sms');
            $query = $this->db->get()->result_array();
            return $query;
        }else{
            $this->db->select('*')
                        ->from('sms')
                        ->where('modem_name',$modem)
                        ->limit(1);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    function view_all_template(){
        $this->db->select('t.type,n.notif_id,n.message,n.title,n.type_id,n.is_deleted')
                 ->from('notification as n')
                 ->join('type as t','t.type_id = n.type_id')
                 ->where('n.is_deleted','false');
        $query = $this->db->get()->result_array();
        return $query;
    }

    function get_all_type($deleted = 'false'){
        $this->db->select('t.*,n.*')
                    ->from('type as t')
                    ->join('notification as n','n.type_id = t.type_id');
                    if($deleted == 'false'){
                        $this->db->where('n.is_deleted',$deleted);
                    }else{
                        
                    }
                    
        $query = $this->db->get()->result_array();
        return $query;
    }

    function select_type($is_deleted = 'false'){
        $this->db->select('type,type_id')
                 ->from('type')
                 ->where('is_deleted',$is_deleted);
        $query = $this->db->get()->result_array();
        return $query;
    }

    function insert_or_update_type($type , $priority_id = ''){
        $count = $this->count_affected_rows('type','type',['type'=>$type]);
        $this->db->set('type',$type,true)
                 ->set('is_deleted','false');
        if($count > 0){
            $existed = $this->count_affected_rows('type','type',['type'=>$type,'is_deleted'=>'true']);
            if($existed > 0){
                $this->db->where('type',$type,true)
                         ->update('type');
                return 'successfully save.';
            }else{
                return 'already exist';
            }
        }else{

            if($priority_id == ''){
                $this->db->insert('type');
            }else{
                $this->db->where('type_id',$priority_id,true)
                         ->update('type');
            }
            return 'successfully save';
        }

        
    }

    function archive_type($id){
        $this->db->set('is_deleted','true')
                 ->where('type_id',$id,true)
                 ->update('type');
        return 'successfully delete';
    }

    /**
     * @param table string only
     * @param fields string only
     * @param where array / string
    */
    function count_affected_rows($table,$field,$where = array()){
        $this->db->select($field)
                 ->from($table)
                 ->where($where)
                 ->limit(1);
        $query = $this->db->count_all_results();
        return $query;
        
    }

    /**
     * @param title string  
     * @param message string
     * @param type string
    */
    function insert_or_update_template($title,$message,$type,$priority_id = ''){
        
        $count = $this->count_affected_rows('notification','title',['title'=>$title]);
         $this->db->set('title',$title,true)
                    ->set('message',$message,true)
                    ->set('type_id',$type,true)
                    ->set('is_deleted','false');
        if($count > 0){
            $is_deleted = $this->count_affected_rows('notification','title',['title'=>$title,'is_deleted'=>'true']);
            if($is_deleted > 0){
                $this->db->where('type_id',$priority_id)
                         ->update('notification');
                return 'Category already exist. but this will show again in the list';
            }else{
                return 'title already exist.';
            }
        }else{
           
            if($priority_id == ''){
                $this->db->insert('notification');
               
            }else{
                $this->db->where('notif_id',$priority_id,true)
                         ->update('notification');
                         
            }
            return 'success';
            
        }
    }

    function archive_template($id){
        $this->db->set('is_deleted','true')
                 ->where('notif_id',$id)
                 ->update('notification');
        return 'success';
    }

    function set_active_modem($id){
        $this->db->set('active','false')
                 ->update('sms');
        $this->db->set('active','true')
                 ->where('modem_id',$id)
                 ->update('sms');
    }

    function get_active_modem(){
        $this->db->select('*')
                 ->from('sms')
                 ->where('active','true')
                 ->limit(1);
        $query = $this->db->get()->result_array();
        return $query;        
    }

    function session(){
        $this->db->select('*')
                 ->from('session');
        $query = $this->db->get()->result_array();
        return $query;    
    }

    function set_session($id){
        $this->db->set('active','')
                 ->update('session');

        $this->db->set('active','active')
                 ->where('session_id',$id)
                 ->update('session');
        return 'success';
    }

    function select_year(){
        $this->db->select('y.year,y.year_id,s.session_id,s.session')
                 ->from('year as y')
                 ->join('session as s','s.session_id = y.session_id')
                 ->where('y.is_deleted','false');
        $query = $this->db->get()->result_array();
        return $query;
    }

    function save_year($year,$session_id,$priority_id = ''){
        $this->db->select('y.year')
                 ->from('year as y')
                 ->join('session as s','s.session_id = y.session_id')
                 ->where('y.year',$year)
                 ->where('y.session_id',$session_id);
        $count = $this->db->count_all_results();
        $this->db->set('year',$year)
                 ->set('is_deleted','false')
                 ->set('session_id',$session_id);
        if($priority_id == ''){
            if($count > 0){
                 $this->db->where('year',$year)
                          ->where('session_id',$session_id)
                          ->update('year');
                          //return $count;
            }else{
                $this->db->insert('year');
            }
        }else{
            $this->db->where('year_id',$priority_id)
                          ->update('year');
        }
        
        return 'success';
    }

    function archive_year($id){
        $this->db->set('is_deleted','true')
                 ->where('year_id',$id)
                 ->update('year');
        return 'success';
    }

    function select_section(){
        $this->db->select('a.section,y.year,a.year_id,s.session,a.section_id')
                 ->from('section as a')
                 ->join('year as y','a.year_id = y.year_id')
                 ->join('session as s','y.session_id = s.session_id')
                 ->where('a.is_deleted','false');

        $query = $this->db->get()->result_array();
        return $query;
    }

    function save_section($section,$year_id,$priority_id = ''){
        $this->db->select('a.section')
                 ->from('section as a')
                 ->join('year as y','a.year_id = y.year_id')
                 ->join('session as s','y.session_id = s.session_id')
                 ->where('a.section',$section)
                 ->where('a.year_id',$year_id);
        $count = $this->db->count_all_results();
        $this->db->set('year_id',$year_id)
                 ->set('is_deleted','false')
                 ->set('section',$section);
        if($priority_id == ''){
            if($count > 0){
                 $this->db->where('section',$section)
                          ->where('year_id',$year_id)
                          ->update('section');
                          //return $count;
            }else{
                $this->db->insert('section');
            }
        }else{
            $this->db->where('section_id',$priority_id)
                          ->update('section');
        }
        
        return 'success';
    }

    function archive_section($id){
        $this->db->set('is_deleted','true')
                 ->where('section_id',$id)
                 ->update('section');
        return 'success';
    }

    function select_subject(){
        $this->db->select('subject_id,subject')
                 ->from('subject')
                 ->where('is_deleted','false');
        $query = $this->db->get()->result_array();
        return $query;
    }

    function save_subject($subject,$priority_id = ''){
        $this->db->select('a.subject')
                 ->from('subject as a')
                 ->where('a.subject',$subject);
        $count = $this->db->count_all_results();
        $this->db->set('is_deleted','false')
                 ->set('subject',$subject);
        if($priority_id == ''){
            if($count > 0){
                 $this->db->where('subject',$subject)
                          ->update('subject');
                          //return $count;
            }else{
                $this->db->insert('subject');
            }
        }else{
            $this->db->where('subject_id',$priority_id)
                          ->update('subject');
        }
        
        return 'success';
    }

    function archive_subject($id){
        $this->db->set('is_deleted','true')
                 ->where('subject_id',$id)
                 ->update('subject');
        return 'success';
    }

    function select_assign($year_id = ''){
        $this->db->select('b.sub_id,c.section,a.subject,d.year,b.section_id,b.subject_id')
                 ->from('subject as a')
                 ->join('subject_section as b','b.subject_id = a.subject_id')
                 ->join('section as c','b.section_id = c.section_id')
                 ->join('year as d','c.year_id = d.year_id')
                 ->where('a.is_deleted','false');
                 if($year_id == ''){

                 }else{
                    $this->db->where('d.year_id',$year_id);
                 }
        $query = $this->db->get()->result_array();
        return $query;
    }

     function save_assign($subject_id,$section_id,$priority_id = ''){
        $this->db->select('a.subject_id')
                 ->from('subject_section as a')
                 ->where('a.subject_id',$subject_id)
                 ->where('a.section_id',$section_id);
        $count = $this->db->count_all_results();
        $this->db->set('is_deleted','false')
                 ->set('section_id',$section_id)
                 ->set('subject_id',$subject_id);
        if($priority_id == ''){
            if($count > 0){
                 $this->db->where('sub_id',$priority_id)
                          ->update('subject_section');
                          //return $count;
            }else{
                $this->db->insert('subject_section');
            }
        }else{
            $this->db->where('sub_id',$priority_id)
                          ->update('subject_section');
        }
        
        return 'success';
    }

    function deleted_assign_subject($id){
        $this->db->where('sub_id',$id)
                 ->delete('subject_section');
        return 'success';
    }

    function select_class_sched(){
        $this->db->select('a.class_id,b.year,a.year_id,a.class,a.time_id,c.time')
                 ->from('class_sched as a')
                 ->join('year as b','a.year_id = b.year_id')
                 ->join('time as c','c.time_id = a.time_id')
                 ->where('a.is_deleted','false');
        $query = $this->db->get()->result_array();
        return $query;
    }

     function save_class_sched($year_id,$class,$time_id,$priority_id = ''){
        $this->db->select('a.subject_id')
                 ->from('class_sched as a')
                 ->join('year as b','a.year_id = b.year_id')
                 ->join('time as c','c.time_id = a.time_id')
                 ->where('a.year_id',$year_id)
                 ->where('a.class',$class)
                 ->where('a.time_id',$time_id);

        $count = $this->db->count_all_results();
        $this->db->set('is_deleted','false')
                 ->set('year_id',$year_id)
                 ->set('time_id',$time_id)
                 ->set('class',$class);
        if($priority_id == ''){
            if($count > 0){
                 $this->db->where('class_id',$priority_id)
                          ->update('class_sched');
                          //return $count;
            }else{
                $this->db->insert('class_sched');
            }
        }else{
            $this->db->where('class_id',$priority_id)
                          ->update('class_sched');
        }
        
        return 'success';
    }

    function archive_class_sched($id){
        $this->db->where('class_id',$id)
                 ->delete('class_sched');
        return 'success';
    }

    function select_time($time_id = ''){
        $this->db->select('a.time,a.is_deleted,a.time_id')
                 ->from('time as a')
                 ->where('a.is_deleted','false');
                 if($time_id == ''){

                 }else{
                    $this->db->where('a.time_id',$time_id);
                 }
        $query = $this->db->get()->result_array();
        return $query;
    }

     function save_time($subject_id,$section_id,$priority_id = ''){
        $this->db->select('a.subject_id')
                 ->from('subject_section as a')
                 ->where('a.subject_id',$subject_id)
                 ->where('a.section_id',$section_id);
        $count = $this->db->count_all_results();
        $this->db->set('is_deleted','false')
                 ->set('section_id',$section_id)
                 ->set('subject_id',$subject_id);
        if($priority_id == ''){
            if($count > 0){
                 $this->db->where('sub_id',$priority_id)
                          ->update('subject_section');
                          //return $count;
            }else{
                $this->db->insert('subject_section');
            }
        }else{
            $this->db->where('sub_id',$priority_id)
                          ->update('subject_section');
        }
        
        return 'success';
    }

    function archive_time($id){
        $this->db->where('sub_id',$id)
                 ->delete('subject_section');
        return 'success';
    }





}
