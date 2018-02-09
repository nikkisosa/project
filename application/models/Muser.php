<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Author:
Date Created:January 06,2018
Description:
*/
class Muser extends CI_Model{

	function __construct(){
		$this->load->database();
		date_default_timezone_set('Asia/Manila');
		$this->time = date('M d, Y');
	}
	/**
	 * @param table = table name 
	 * @param where = where clause
	*/
	function count_affected_rows($table,$where = array()){
		$this->db->select('*')
				 ->from($table)
				 ->where($where);
		$count = $this->db->count_all_results();
		return $count;
	}

	function user($username,$password){
		$this->db->select('a.account_id,a.fname,a.mname,a.lname,a.img,b.type,c.username')
				 ->from('role as b')
				 ->join('users as c','c.role_id = b.role_id')
				 ->join('account as a','a.user_id = c.user_id')
				 ->where('c.username',$username)
				 ->where('c.password',$password)
				 ->where('a.is_archive','false')
				 ->limit(1);
		$query = $this->db->get()->result_array();
		return $query;
	}

	function login($username){
		$this->db->set('action','login')
				 ->where('username',$username)
				 ->update('users');
	}

	function logout($username){
		$this->db->set('action','logout')
				 ->where('username',$username)
				 ->update('users');
	}

	function user_login(){
		$this->db->select('r.type,CONCAT(a.fname," ",a.lname) as name,a.img')
				 ->from('role as r')
				 ->join('users as s','s.role_id = r.role_id')
				 ->join('account as a','a.user_id = s.user_id')
				 ->where('s.action','login')
				 ->order_by('a.fname,a.lname','ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}

	function count_student(){
		$this->db->select('count(a.account_id) as total_student')
				 ->from('account as a')
				 ->join('users as c','a.user_id = c.user_id')
				 ->join('role as b','c.role_id = b.role_id')
				 ->where('b.type','student');
		$query = $this->db->get()->row('total_student');
		return $query;
	}

	function count_teacher(){
		$this->db->select('count(a.account_id) as total_teacher')
				 ->from('account as a')
				 ->join('users as c','a.user_id = c.user_id')
				 ->join('role as b','c.role_id = b.role_id')
				 ->where('b.type','teacher');
		$query = $this->db->get()->row('total_teacher');
		return $query;
	}

	function get_account_id_by_name($name){
		$this->db->select('account_id')
				 ->from('account')
				 ->where('CONCAT(account.fname," ",account.lname)=',$name)
				 ->limit(1);
		$query = $this->db->get()->row('account_id');
		return $query;
	}

	function get_id($table,$field,$where = array()){
		$this->db->select($field)
				 ->from($table)
				 ->where($where)
				 ->limit(1);
		$query = $this->db->get()->row($field);
		return $query;
	}
	//////////////////FORUM///////////////
	function category(){
		$this->db->select('*')
				 ->from('category')
				 ->where('is_deleted','false')
				 ->order_by('category','ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}

	function get_category_by_id($id,$thread_id = null){
		$this->db->select('b.thread_id,c.category_id,b.title,CONCAT(a.fname," ",a.lname) as name,b.content,b.is_close,c.category,b.date_created')
				 ->from('account as a')
				 ->join('thread as b','b.account_id = a.account_id')
				 ->join('category as c','b.category_id = c.category_id');
				 $this->db->where('c.category_id',$id);
				 if($thread_id == null){
					
				 }else{
					 $this->db->where('b.thread_id',$thread_id);
				 }
				 
		$this->db->order_by('date_created','ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}

	function get_all_commentator_id($thread_id){
		$this->db->select('c.commentator_id')
				 ->from('account as a')
				 ->join('thread as b','b.account_id = a.account_id')
				 ->join('comment as c','b.thread_id = c.thread_id')
				 ->where('c.thread_id',$thread_id)
				 ->order_by('comment_id','ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	function get_content_by_id($thread_id){
		$this->db->select('concat(a.fname," ",a.lname) as name,c.commentator_id,c.comment,r.type,c.date_commented')
				 ->from('account as a')
				 ->join('comment as c','c.commentator_id = a.account_id')
				 ->join('users as u','a.user_id = u.user_id')
				 ->join('role as r','u.role_id = r.role_id');
				 $this->db->where('c.thread_id',$thread_id)
				 			->order_by('comment_id','ASC');
		$query = $this->db->get()->result_array();
		return $query;
	}
	/**
	 * @param thread_id = the id of the thread
	 * @param account_id = id of author
	 * 
	*/
	function get_thread_author($thread_id='',$account_id = ''){
		$this->db->select('CONCAT(a.fname," ",a.lname) as name,b.title,b.content,b.date_created,b.is_close,b.thread_id,c.category_id,c.category')
				 ->from('account as a')
				 ->join('thread as b','b.account_id = a.account_id')
				 ->join('category as c','c.category_id = b.category_id');				 
				 if($account_id == ''){
					$this->db->where('b.thread_id',$thread_id)
							 ->limit(1);
				 }else{
					 $this->db->where('b.account_id',$account_id)
				 			  ->order_by('b.thread_id','ASC');
				 }
				 
		$query = $this->db->get()->result_array();
		return $query;	 
	}

	function list_of_thread(){
		$this->db->select('r.type,CONCAT(a.fname," ",a.lname) as name,t.title,t.content,t.is_close,t.date_created,c.category,c.category_id,t.thread_id')
				 ->from('role as r')
				 ->join('users as u','u.role_id = r.role_id')
				 ->join('account as a','a.user_id = u.user_id')
				 ->join('thread as t','t.account_id = a.account_id')
				 ->join('category as c','t.category_id = c.category_id')
				 ->order_by('t.date_created','DESC');
		$query = $this->db->get()->result_array();
		return $query;	 
	}

	function post_coment($thread_id,$comment,$name){
		$account_id = $this->get_account_id_by_name($name);
		if(empty($account_id)){
			return 'error';
		}else{
			$this->db->set('comment',$comment,true)
				 ->set('thread_id',$thread_id,true)
				 ->set('commentator_id',$account_id,true)
				 ->set('date_commented',$this->time,true)
				 ->insert('comment');
			return 'commented';
		}
	}

	function save_category($category,$id = ''){
		$count = $this->count_affected_rows('category',['category'=>$category]);
		if($count > 0){
			$is_deleted = $this->count_affected_rows('category',['category'=>$category,'is_deleted'=>'true']);
			if($is_deleted > 0){
				$this->db->set('is_deleted','false',true);
				$this->db->where('category',$category,true)
						->update('category');
				return 'Category already exist. but change to false';
			}else{
				return 'Category already exist.';
			}
			
		}else{
			$this->db->set('category',$category,true)
				 ->set('is_deleted','false',true);
			if($id == ''){
				$this->db->insert('category');
				return 'successfully save';
			}else{
				$this->db->where('category_id',$id,true)
						->update('category');
				return 'successfully update';
			}

			
		}
		
	}

	function category_delete($id){
		$this->db->set('is_deleted','true')
				 ->where('category_id',$id)
				 ->update('category');
		return 'successfully deleted';
	}

	
	function post($name,$title,$content,$category_id,$priority=''){
		$account_id = $this->get_account_id_by_name($name);
		$this->db->set('title',$title)
					 ->set('content',$content)
					 ->set('account_id',$account_id)
					 ->set('is_close','false')
					 ->set('category_id',$category_id)
					 ->set('date_created',$this->time);
		if($priority == ''){
		
			$count = $this->count_affected_rows('thread',['title'=>$title]);
			if($count > 0){
			return 'thread with title of '.$title.' is already exist.';
			}else{

				//$category_id = $this->get_id('category','category_id',['category'=>$category]);
					$this->db->insert('thread');
					return 'successfully';
			}
		}else{
			$this->db->where('thread_id',$priority,true)
					->update('thread');
			return 'successfully';
		}
	}

	function thread_close($id){
		$this->db->set('is_close','true')
				 ->where('thread_id',$id)
				 ->update('thread');
		return 'successfully close';
	}

	function notification($name){
		$this->db->select('CONCAT(a.fname," ",a.lname) as name,c.thread_id,c.date_commented')
				 ->from('account as a')
				 ->join('comment as c','c.commentator_id = a.account_id')
				 ->where('CONCAT(a.fname," ",a.lname) !=',$name)
				 ->group_by('c.commentator_id')
				 ->order_by('comment_id','DESC')
				 ->limit(5); 
		$query = $this->db->get()->result_array();
		return $query;
	}
	//////////////////END OF FORUM///////////////

	
}