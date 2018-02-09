<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Author:
Date Created:January 06,2018
Description:
*/
class Admin extends CI_Model{

	function __construct(){
		$this->load->database();
	}

	function createAdminAccount($fname,$mname,$lname,$mobile,$email,$username,$password,$image) {

		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username',$username);
		$this->db->limit(1);
		$query = $this->db->get()->result_array();
		$user['data'] = $query;
		$arrCount = count($user['data']);
		if($arrCount == 1) {
			return 'Username already exist.';
		}
		else {
			$data1 = array(
			'username'=>$username,
			'password'=>$password,
			'role_id'=>1
			);
			$this->db->insert('users',$data1);

			$this->db->select('user_id');
			$this->db->from('users');
			//$this->db->order_by('user_id','DESC');
			$this->db->where('username',$username);
			$this->db->limit(1);
			$query1 = $this->db->get()->result_array();
			$user1['data1'] = $query1;
			$img = '';
			if($image != 'nothing') {
				$img = 'profile/'.$image;
			}
			foreach ($user1['data1'] as $value) {
				$id = $value['user_id'];
				$data = array(
					'user_id'=>$id,
					'fname'=>$fname,
					'mname'=>$mname,
					'lname'=>$lname,
					'mobile_no'=>$mobile,
					'email'=>$email,
					'img'=>$img,
					'is_archive'=>'false'
					);
				$this->db->insert('account',$data);
			}
			return 'success';
		}
	}
	function createTeacherAccount($fname,$mname,$lname,$mobile,$email,$username,$password,$image) {

		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username',$username);
		$this->db->limit(1);
		$query = $this->db->get()->result_array();
		$user['data'] = $query;
		$arrCount = count($user['data']);
		if($arrCount == 1) {
			return 'Username already exist.';
		}
		else {
			$data1 = array(
			'username'=>$username,
			'password'=>$password,
			'role_id'=>3
			);
			$this->db->insert('users',$data1);

			$this->db->select('user_id');
			$this->db->from('users');
			//$this->db->order_by('user_id','DESC');
			$this->db->where('username',$username);
			$this->db->limit(1);
			$query1 = $this->db->get()->result_array();
			$user1['data1'] = $query1;
			$img = '';
			if($image != 'nothing') {
				$img = 'profile/'.$image;
			}
			foreach ($user1['data1'] as $value) {
				$id = $value['user_id'];
				$data = array(
					'user_id'=>$id,
					'fname'=>$fname,
					'mname'=>$mname,
					'lname'=>$lname,
					'mobile_no'=>$mobile,
					'email'=>$email,
					'img'=>$img,
					'is_archive'=>'false'
					);
				$this->db->insert('account',$data);
			}
			return 'success';
		}
	}
	function createStudentAccount($fname,$mname,$lname,$mobile,$email,$username,$password,$image) {

		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username',$username);
		$this->db->limit(1);
		$query = $this->db->get()->result_array();
		$user['data'] = $query;
		$arrCount = count($user['data']);
		if($arrCount == 1) {
			return 'Username already exist.';
		}
		else {
			$data1 = array(
			'username'=>$username,
			'password'=>$password,
			'role_id'=>2
			);
			$this->db->insert('users',$data1);

			$this->db->select('user_id');
			$this->db->from('users');
			//$this->db->order_by('user_id','DESC');
			$this->db->where('username',$username);
			$this->db->limit(1);
			$query1 = $this->db->get()->result_array();
			$user1['data1'] = $query1;
			$img = '';
			if($image != 'nothing') {
				$img = 'profile/'.$image;
			}
			foreach ($user1['data1'] as $value) {
				$id = $value['user_id'];
				$data = array(
					'user_id'=>$id,
					'fname'=>$fname,
					'mname'=>$mname,
					'lname'=>$lname,
					'mobile_no'=>$mobile,
					'email'=>$email,
					'img'=>$img,
					'is_archive'=>'false'
					);
				$this->db->insert('account',$data);
			}
			return 'success';
		}
	}

	function createParentAccount($fname,$mname,$lname,$mobile,$email,$username,$password,$image) {

		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username',$username);
		$this->db->limit(1);
		$query = $this->db->get()->result_array();
		$user['data'] = $query;
		$arrCount = count($user['data']);
		if($arrCount == 1) {
			return 'Username already exist.';
		}
		else {
			$data1 = array(
			'username'=>$username,
			'password'=>$password,
			'role_id'=>4
			);
			$this->db->insert('users',$data1);

			$this->db->select('user_id');
			$this->db->from('users');
			//$this->db->order_by('user_id','DESC');
			$this->db->where('username',$username);
			$this->db->limit(1);
			$query1 = $this->db->get()->result_array();
			$user1['data1'] = $query1;
			$img = '';
			if($image != 'nothing') {
				$img = 'profile/'.$image;
			}
			foreach ($user1['data1'] as $value) {
				$id = $value['user_id'];
				$data = array(
					'user_id'=>$id,
					'fname'=>$fname,
					'mname'=>$mname,
					'lname'=>$lname,
					'mobile_no'=>$mobile,
					'email'=>$email,
					'img'=>$img,
					'is_archive'=>'false'
					);
				$this->db->insert('account',$data);
			}
			return 'success';
		}
	}

	function get_admin_list() {
		$users = array();
		$this->db->select('a.account_id,a.user_id,c.role_id,a.fname,a.mname,a.lname,a.img,a.mobile_no,a.email,a.is_archive')
		->from('account as a')
		->join('users as b','a.user_id = b.user_id')
		->join('role as c','b.role_id = c.role_id')
		->where('a.is_archive','false')
		->where('b.role_id',1)
		->order_by('a.account_id','desc');
		/*$this->db->select('*');
		$this->db->from('account');*/
		$query = $this->db->get();
		if ($query && $query->num_rows() > 0) {
        	return $query->result_array();
    	}
    	else {
			return $users;
		}
	}

	function get_teacher_list() {
		$users = array();
		$this->db->select('a.account_id,a.user_id,c.role_id,a.fname,a.mname,a.lname,a.img,a.mobile_no,a.email,a.is_archive')
		->from('account as a')
		->join('users as b','a.user_id = b.user_id')
		->join('role as c','b.role_id = c.role_id')
		->where('a.is_archive','false')
		->where('b.role_id',3)
		->order_by('a.account_id','desc');
		/*$this->db->select('*');
		$this->db->from('account');*/
		$query = $this->db->get();
		if ($query && $query->num_rows() > 0) {
        	return $query->result_array();
    	}
    	else {
			return $users;
		}
	}
	function get_student_list() {
		$users = array();
		$this->db->select('a.account_id,a.user_id,c.role_id,a.fname,a.mname,a.lname,a.img,a.mobile_no,a.email,a.is_archive')
		->from('account as a')
		->join('users as b','a.user_id = b.user_id')
		->join('role as c','b.role_id = c.role_id')
		->where('a.is_archive','false')
		->where('b.role_id',2)
		->order_by('a.account_id','desc');
		/*$this->db->select('*');
		$this->db->from('account');*/
		$query = $this->db->get();
		if ($query && $query->num_rows() > 0) {
        	return $query->result_array();
    	}
    	else {
			return $users;
		}
	}

	function get_parent_list() {
		$users = array();
		$this->db->select('a.account_id,a.user_id,c.role_id,a.fname,a.mname,a.lname,a.img,a.mobile_no,a.email,a.is_archive')
		->from('account as a')
		->join('users as b','a.user_id = b.user_id')
		->join('role as c','b.role_id = c.role_id')
		->where('a.is_archive','false')
		->where('b.role_id',4)
		->order_by('a.account_id','desc');
		/*$this->db->select('*');
		$this->db->from('account');*/
		$query = $this->db->get();
		if ($query && $query->num_rows() > 0) {
        	return $query->result_array();
    	}
    	else {
			return $users;
		}
	}

	function get_user_info($id) {
		$users = array();
		$this->db->select('a.account_id,a.user_id,c.role_id,a.fname,a.mname,a.lname,a.img,a.mobile_no,a.email,a.is_archive')
		->from('account as a')
		->join('users as b','a.user_id = b.user_id')
		->join('role as c','b.role_id = c.role_id')
		->where('a.is_archive','false')
		->where('a.account_id',$id)
		->order_by('a.account_id','desc');
		/*$this->db->select('*');
		$this->db->from('account');*/
		$query = $this->db->get();
		if ($query && $query->num_rows() > 0) {
        	return $query->result_array();
    	}
	}

	function edit_admin($id,$fname,$mname,$lname,$no,$email,$img) {
		if($img == 'nothing') {
			$this->db->set('is_archive','false')
				->set('fname',$fname)
				->set('mname',$mname)
				->set('lname',$lname)
				->set('mobile_no',$no)
				->set('email',$email)
				 ->where('account_id', $id)
				 ->update('account');
		}
		else {
			$this->db->set('is_archive','false')
				->set('fname',$fname)
				->set('mname',$mname)
				->set('lname',$lname)
				->set('mobile_no',$no)
				->set('email',$email)
				->set('img','profile/'.$img)
				 ->where('account_id', $id)
				 ->update('account');
		}
	}
	function edit_teacher($id,$fname,$mname,$lname,$no,$email,$img) {
		if($img == 'nothing') {
			$this->db->set('is_archive','false')
				->set('fname',$fname)
				->set('mname',$mname)
				->set('lname',$lname)
				->set('mobile_no',$no)
				->set('email',$email)
				 ->where('account_id', $id)
				 ->update('account');
		}
		else {
			$this->db->set('is_archive','false')
				->set('fname',$fname)
				->set('mname',$mname)
				->set('lname',$lname)
				->set('mobile_no',$no)
				->set('email',$email)
				->set('img','profile/'.$img)
				 ->where('account_id', $id)
				 ->update('account');
		}
		
	}
	function edit_student($id,$fname,$mname,$lname,$no,$email,$img) {
		if($img == 'nothing') {
			$this->db->set('is_archive','false')
				->set('fname',$fname)
				->set('mname',$mname)
				->set('lname',$lname)
				->set('mobile_no',$no)
				->set('email',$email)
				 ->where('account_id', $id)
				 ->update('account');
		}
		else {
			$this->db->set('is_archive','false')
				->set('fname',$fname)
				->set('mname',$mname)
				->set('lname',$lname)
				->set('mobile_no',$no)
				->set('email',$email)
				->set('img','profile/'.$img)
				 ->where('account_id', $id)
				 ->update('account');
		}
		
	}
	function edit_parent($id,$fname,$mname,$lname,$no,$email,$img) {
		if($img == 'nothing') {
			$this->db->set('is_archive','false')
				->set('fname',$fname)
				->set('mname',$mname)
				->set('lname',$lname)
				->set('mobile_no',$no)
				->set('email',$email)
				 ->where('account_id', $id)
				 ->update('account');
		}
		else {
			$this->db->set('is_archive','false')
				->set('fname',$fname)
				->set('mname',$mname)
				->set('lname',$lname)
				->set('mobile_no',$no)
				->set('email',$email)
				->set('img','profile/'.$img)
				 ->where('account_id', $id)
				 ->update('account');
		}
		
	}


	function delete_user($id) {
		$this->db->set('is_archive','true')
				 ->where('account_id', $id)
				 ->update('account');
	}
}
