<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Author:
Date Created:January 06,2018
Description:
*/
class Downloads extends CI_Model{

	function __construct(){
		$this->load->database();
        $this->load->helper('url','html');
        date_default_timezone_set('Asia/Manila');
        $this->date = date('M d, Y');
	}

	function get_all($allowed = 'all'){
        $this->db->select('*')
                 ->from('files');
        if($allowed == 'all'){

        }else{
            $this->db->where('allowed_user',$allowed)
                     ->or_where('allowed_user','all');
        }
        $query = $this->db->get()->result_array();
        return $query;
    }

    function save($name,$filename,$allowed){
        $this->db->select('COUNT(filename) as counted')
                 ->from('files')
                 ->where('name',$name,true)
                 ->limit(1);
        $exist = $this->db->get()->row('counted');
        if($exist > 0 ){
            return 'Name already Exist';
        }else{
            $this->db->set('filename',$filename)
                     ->set('name',$name,true)
                     ->set('filepath','download_section/'.$filename,true)
                     ->set('allowed_user',$allowed,true)
                     ->insert('files');
            return 'success';
        }
        
    }

    function edit($id,$name,$allowed){
        $this->db->select('COUNT(filename) as counted')
                 ->from('files')
                 ->where('name',$name,true)
                 ->limit(1);
        $exist = $this->db->get()->row('counted');

        if($exist > 0 ){
            return 'Name already Exist';
        }else{
            $this->db->set('name',$name,true)
                     ->set('allowed_user',$allowed,true)
                     ->where('files_id',$id)
                     ->update('files');
            return 'success';
        }
    }

    function remove($id){

        $this->db->select('filepath')
                 ->from('files')
                 ->where('files_id',$id)
                 ->limit(1);
        $query = $this->db->get()->row('filepath');
        unlink(FCPATH.$query);

        $this->db->where('files_id',$id)
                 ->delete('files');

                 return base_url().$query;
    }

    /** Announcement section **/

    /**
    * count affected rows only accept a sql where clause
    * @param table string
    * @param field string
    * @param where array
    */
    function count_affected_rows($table,$field,$where=array()){
        $this->db->select($field)
                 ->from($table)
                 ->where($where)
                 ->limit(1);
        $query = $this->db->count_all_results();
        return $query;
    }
    /**
    * all parameter must be a string else will get and error..
    * @param author id this serve as account id 
    * @param title of the announcement
    * @param img of the content
    * @param content of announcement
    * @param priority_id serve as announcement db id
    *
    */
    function post_announcement($author_id,$title,$img,$content,$priority_id = '',$date,$top_priority){
        $this->db->set('account_id',$author_id,true)
                 ->set('title',$title,true)
                 ->set('img',"announcement/".$img,true)
                 ->set('content',$content)
                 ->set('date',$date)
                 ->set('priority',$top_priority);

        $count = $this->count_affected_rows('announcement','announcement_id',['title'=>$title]);
        if($priority_id == ''){
            if($count > 0){
                $count_again = $this->count_affected_rows('announcement','announcement_id',['title'=>$title,'is_deleted'=>'true']);
                if($count_again > 0){
                    $this->db->set('is_deleted','false')
                             ->set('date_created',$this->date);
                            if($this->session->userdata('role') == 'admin'){
                                $this->db->set('is_pending','false')
                                         ->set('disapproved','yes');
                            }else{
                                $this->db->set('is_pending','true')
                                         ->set('disapproved','notyet');
                            }

                             $this->db->where('announcement_id',$priority_id)
                             ->update('announcement');
                            return 'success';
                }else{
                    return 'Title already exist.please update';
                }
            }else{
                $this->db->set('is_deleted','false')
                         ->set('date_created',$this->date);
                if($this->session->userdata('role') == 'admin'){
                    $this->db->set('is_pending','false')
                             ->set('disapproved','yes');
                }else{
                    $this->db->set('is_pending','true')
                             ->set('disapproved','notyet');

                }
                $this->db->insert('announcement');
                         return 'success';
                        
                         
            }
        }else{
            $this->db->set('is_deleted','false')
                     ->where('announcement_id',$priority_id)
                     ->update('announcement');
                    return 'success';
        }
        
        

    }

    function get_all_announcement_by_id($account_id,$is_deleted = 'false'){
        $this->db->select('*')
                 ->from('announcement')
                 ->where('is_deleted',$is_deleted);
                 if($this->session->userdata('role') == 'admin'){
                    $this->db->where('disapproved','notyet')
                             ->or_where('disapproved','yes');


                 }else{
                    $this->db->where('account_id',$account_id);
                 }
        $this->db->order_by('date_created','DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    function archive_announcement_by_id($announcement_id){
        $this->db->set('is_deleted','true')
                 ->where('announcement_id',$announcement_id)
                 ->update('announcement');
        return 'success';
    }

    function approval($announcement_id,$approve = ''){
        $this->db->set('disapproved',$approve);
                if($approve == 'yes'){
                    $this->db->set('is_pending','false');
                }else{
                    $this->db->set('is_pending','true');
                }

        $this->db->where('announcement_id',$announcement_id)
                 ->update('announcement');
        return 'success';
    }

    function count_pending_announcement(){
        $this->db->select('COUNT(is_pending) as pending')
                 ->from('announcement')
                 ->where('is_pending','true');
        $query = $this->db->get()->row('pending');
        return $query;
    }

    function count_post_announcement(){
        $this->db->select('COUNT(is_pending) as post')
                 ->from('announcement')
                 ->where('is_pending','false');
        $query = $this->db->get()->row('post');
        return $query;
    }

    function get_all_approved_announcement(){
        $this->db->select('b.title,b.content,Concat(a.fname," ",a.lname) as name,b.date_created,b.priority')
                 ->from('account as a')
                 ->join('announcement as b','b.account_id = a.account_id')
                 ->where('b.is_pending','false')
                 ->where('b.is_deleted','false')
                 ->order_by('date_created','DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

}
