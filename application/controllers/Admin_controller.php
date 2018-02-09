<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Author:sti
Date Created:January 03,2018
Description:
*/
class Admin_controller extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','security','html');
		$this->load->library('session','form_validation');
		$this->load->model('Admin');
	}

	function index(){
		
	}
	function create_admin() {
		if(isset($_POST['username'])) {
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$image = $_POST['image'];
			$str = $this->Admin->createAdminAccount($fname,$mname,$lname,$mobile,$email,$username,$password,$image);
			echo $str;
		}
	}

	function create_teacher() {
		if(isset($_POST['username'])) {
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$image = $_POST['image'];
			$str = $this->Admin->createTeacherAccount($fname,$mname,$lname,$mobile,$email,$username,$password,$image);
			echo $str;
		}
	}
	function create_student() {
		if(isset($_POST['username'])) {
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$image = $_POST['image'];
			$str = $this->Admin->createStudentAccount($fname,$mname,$lname,$mobile,$email,$username,$password,$image);
			echo $str;
		}
	}

	function create_parent() {
		if(isset($_POST['username'])) {
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$image = $_POST['image'];
			$str = $this->Admin->createParentAccount($fname,$mname,$lname,$mobile,$email,$username,$password,$image);
			echo $str;
		}
	}

	function delete_user() {
		if(isset($_POST['id'])) {
			$this->Admin->delete_user($_POST['id']);
		}
	}

	function edit_admin() {
		if(isset($_POST['id'])) {
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$no = $_POST['no'];
			$email = $_POST['email'];
			$img = $_POST['img'];
			$this->Admin->edit_admin($id,$fname,$mname,$lname,$no,$email,$img);
			echo 'success';
		}
	}
	function edit_teacher() {
		if(isset($_POST['id'])) {
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$no = $_POST['no'];
			$email = $_POST['email'];
			$img = $_POST['img'];
			$this->Admin->edit_admin($id,$fname,$mname,$lname,$no,$email,$img);
			echo 'success';
		}
	}
	function edit_student() {
		if(isset($_POST['id'])) {
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$no = $_POST['no'];
			$email = $_POST['email'];
			$img = $_POST['img'];
			$this->Admin->edit_admin($id,$fname,$mname,$lname,$no,$email,$img);
			echo 'success';
		}
	}
	function edit_parent() {
		if(isset($_POST['id'])) {
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$no = $_POST['no'];
			$email = $_POST['email'];
			$img = $_POST['img'];
			$this->Admin->edit_admin($id,$fname,$mname,$lname,$no,$email,$img);
			echo 'success';
		}
	}

	function upload_user_profile() {
		if(isset($_FILES['name_pic_profile']["name"])) {
			$config['upload_path'] = './profile/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			//$config['max_size']             = 1000; // allowed max size 
			//$config['max_width']            = 1024; // max widh
			//$config['max_height']           = 768;	// max height
			$config['overwrite']           	= true;	// boolean
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('name_pic_profile')) {
				echo $this->upload->display_errors();
			}
			else {
				$data = $this->upload->data();
				//echo '<img src = "'.base_url().'image/'.$data["file_name"].'" />';
				//echo base_url();
			}
			//$this->upload->do_upload('name_pic_profile');
		}
		/*$sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
		$targetPath = base_url() . "profile/".$_FILES['file']['name']; // Target path where file is to be stored
		move_uploaded_file($sourcePath,$targetPath) ;*/
	}

}