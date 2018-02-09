<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Author:sti
Date Created:January 03,2018
Description:
*/
class View extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','security','html');
		$this->load->library('form_validation','smsgateway');
		$this->load->model(array('configs','admin','downloads','muser'));
	}

	function index(){
		$role = $this->session->userdata('role');
		if(!empty($role)){
			if($role == 'admin'){
				$this->admin();
			}else if($role == "student"){
				$this->student();
			}else if($role == "teacher"){
				$this->teacher();
			}
		}else{
			redirect('user/authentication');
		}
	}


	/* ADMIN FUNCTIONS */
	function admin_list() {
		$data['title'] = 'Admin';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$this->load->view('admin/include/header',$data);
		$users = $this->admin->get_admin_list();
		$data['users'] = $users;
		$this->load->view('admin/list_of_admin',$data);
		$this->load->view('admin/include/footer');
	}
	function student_list() {
		$data['title'] = 'Student';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$this->load->view('admin/include/header',$data);
		$users = $this->admin->get_student_list();
		$data['users'] = $users;
		$this->load->view('admin/list_of_student',$data);
		$this->load->view('admin/include/footer');
	}
	function teacher_list() {
		$data['title'] = 'Teacher';
		$data['footer'] = 'Sti Parañaque';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$this->load->view('admin/include/header',$data);
		$users = $this->admin->get_teacher_list();
		$data['users'] = $users;
		$this->load->view('admin/list_of_teacher',$data);
		$this->load->view('admin/include/footer');
	}
	function parent_list() {
		$data['title'] = 'Parent';
		$data['footer'] = 'Sti Parañaque';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$this->load->view('admin/include/header',$data);
		$users = $this->admin->get_parent_list();
		$data['users'] = $users;
		$this->load->view('admin/list_of_parent',$data);
		$this->load->view('admin/include/footer');
	}
  	function create_admin() {
		$data['title'] = 'Admin';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$this->load->view('admin/include/header',$data);
		$this->load->view('admin/create_admin',$data);
		$this->load->view('admin/include/footer');
	}
	function create_teacher() {
		$data['title'] = 'Teacher';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$this->load->view('admin/include/header',$data);
		$this->load->view('admin/create_teacher');
		$this->load->view('admin/include/footer');
	}
	function create_student() {
		$data['title'] = 'Student';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$this->load->view('admin/include/header',$data);
		$this->load->view('admin/create_student');
		$this->load->view('admin/include/footer');
	}
	function create_parent() {
		$data['title'] = 'Parent';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$this->load->view('admin/include/header',$data);
		$this->load->view('admin/create_parent');
		$this->load->view('admin/include/footer');
	}
	function edit_admin($id) {

		if($id != null || $id != '' || $id != ' ') {
			$data['title'] = 'Admin';
			$data['footer'] = 'Fr. Simpliciano Academy';
			$data['notification'] = $this->muser->notification($this->session->userdata('name'));
			$users = $this->admin->get_user_info($id);
			if(empty($users)){
				redirect('view/admin_list');
			}
			else {
				$data['users'] = $users;
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/edit_admin',$data);
				$this->load->view('admin/include/footer');
			}
		}
	}
	function edit_teacher($id) {
		if($id != null || $id != '' || $id != ' ') {
			$data['title'] = 'Teacher';
			$data['footer'] = 'Fr. Simpliciano Academy';
			$users = $this->admin->get_user_info($id);
			if(empty($users)){
				redirect('view/teacher_list');
			}
			else {
				$data['users'] = $users;
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/edit_teacher',$data);
				$this->load->view('admin/include/footer');
			}
		}
	}
	function edit_student($id) {
		if($id != null || $id != '' || $id != ' ') {
			$data['title'] = 'Student';
			$data['footer'] = 'Fr. Simpliciano Academy';
			$users = $this->admin->get_user_info($id);
			if(empty($users)){
				redirect('view/student_list');
			}
			else {
				$data['users'] = $users;
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/edit_student',$data);
				$this->load->view('admin/include/footer');
			}
		}
	}
	function edit_parent($id) {
		if($id != null || $id != '' || $id != ' ') {
			$data['title'] = 'Parent';
			$data['footer'] = 'Fr. Simpliciano Academy';
			$users = $this->admin->get_user_info($id);
			if(empty($users)){
				redirect('view/parent_list');
			}
			else {
				$data['users'] = $users;
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/edit_parent',$data);
				$this->load->view('admin/include/footer');
			}
		}
	}

	/* END OF ADMIN FUNCTIONS */




	


	function student(){
		$data['title'] = 'profile';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');

		if(!empty($role)){
			if($role == 'admin'){
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}else if($role == "student"){
				$this->load->view('student/include/header',$data);
				$this->load->view('student/profile/profile',$data);
				$this->load->view('student/include/footer');
			}else if($role == "teacher"){
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}else{
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}
		}else{
			redirect('user/authentication');
		}
	}

	function admin(){
		$data['title'] = 'profile';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		if(!empty($role)){
			if($role == 'admin'){
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/profile/profile',$data);
				$this->load->view('admin/include/footer');
			}else if($role == "student"){
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}else if($role == "teacher"){
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}else{
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}
		}else{
			redirect('user/authentication');
		}
	}

	function teacher(){
		$data['title'] = 'profile';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');

		if(!empty($role)){
			if($role == 'admin'){
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}else if($role == "student"){
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}else if($role == "teacher"){
				$this->load->view('teacher/include/header',$data);
				$this->load->view('teacher/profile/profile',$data);
				$this->load->view('teacher/include/footer');
			}else{
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}
		}else{
			redirect('user/authentication');
		}
	}

	function parent(){
		$data['title'] = 'profile';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');

		if(!empty($role)){
			if($role == 'admin'){
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}else if($role == "student"){
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}else if($role == "teacher"){
				$html = '<p><strong>Error:</strong></p>'.$this->uri->segment(2).' view does not exist..'
						.'<a href="dashboard">go back</a>';
				echo $html;
			}else{
				$this->load->view('parent/include/header',$data);
				$this->load->view('parent/profile/profile');
				$this->load->view('parent/include/footer');
			}
		}else{
			redirect('user/authentication');
		}
	}
	
	function register(){
		$data['title'] = 'register';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$this->load->view('layout/header',$data);
		$this->load->view('admin/profile/register',$data);
		$this->load->view('layout/footer');
	}

	function dashboard_by_role($role){
		return $role.'/profile/dashboard';
	}

	function header_by_role($role){
		return $role.'/include/header';
	}

	function footer_by_role($role){
		return $role.'/include/footer';
	}

	function dashboard(){
		$data['title'] = 'dashboard';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['pending'] = $this->downloads->count_pending_announcement();
		$data['post'] = $this->downloads->count_post_announcement();
		$data['announcement'] = $this->downloads->get_all_approved_announcement();
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		if(!empty($role)){
			$data['student'] = $this->muser->count_student();
			$data['teacher'] = $this->muser->count_teacher();
			$this->load->view($this->header_by_role($role),$data);
			$this->load->view($this->dashboard_by_role($role),$data);
			$this->load->view($this->footer_by_role($role));
		}else{

			redirect('user/authentication');

		}
	}

	/*
	 * Settings
	 * 	SMS
	 * 	Session
	*/

	function sms(){
		$data['title'] = 'sms';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		if(!empty($role)){
			$data['sms'] = $this->configs->select_sms();
			if($role == 'admin'){


				$submit = $this->input->post('save');
				if(isset($submit)){
					$this->form_validation->set_rules('email', 'Email', 'trim|required',TRUE);
					$this->form_validation->set_rules('password', 'Password', 'trim|required',TRUE);
					$this->form_validation->set_rules('deviceid', 'Device ID', 'trim|required',TRUE);
					$this->form_validation->set_rules('name', 'Modem Name', 'trim|required',TRUE);
					if ($this->form_validation->run() == FALSE) {
						$this->load->view('layout/header',$data);
						$this->load->view('admin/settings/sms',$data);
						$this->load->view('layout/footer');
					} else {
						$username = $this->input->post('email');
						$password = $this->input->post('password');
						$deviceid = $this->input->post('deviceid');
						$name = $this->input->post('name');
						//to check if need to update or insert new record
						$priority = $this->input->post('priority');
						if($priority == 'default'){
							$sms = $this->configs->save_sms($username,$password,$deviceid,$name);
						}else{
							$id = $this->input->post('priority');
							$sms = $this->configs->update_sms($id,$username,$password,$deviceid,$name);
						}

						if($sms == 'Account Already exist!'){
							$this->session->set_flashdata('msg',$sms);
							$this->load->view('admin/include/header',$data);
							$this->load->view('admin/settings/sms',$data);
							$this->load->view('admin/include/footer');
						}else{
							$this->session->set_flashdata('msg',$sms);
							redirect('view/sms','refresh');
						}

					}
				}else{
					$this->session->set_flashdata('msg');
					$this->load->view('admin/include/header',$data);
					$this->load->view('admin/settings/sms',$data);
					$this->load->view('admin/include/footer');
				}

			}else{
				$this->load->view('errors/html/error_404.php');
			}
		}else{

			redirect('user/authentication');

		}
	}

	function sms_delete(){
		$id = $this->input->post('id');
		$this->configs->delete_sms($id);
	}

	function sms_send(){
		$data['title'] = 'Send SMS';
		$data['footer'] = 'Fr. Simpliciano Academy';
		
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		
		$data['users'] = $this->configs->get_all_user();
		$data['type'] = $this->configs->get_all_type();
		$this->session->set_flashdata('sms', '');
		$submit = $this->input->post('save');
		if (isset($submit)) {
			$this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[5]|max_length[500]');
			$this->form_validation->set_rules('send-to', 'Send to', 'trim|required');
			$this->form_validation->set_rules('type', 'Type', 'trim|required|min_length[5]');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/settings/send',$data);
				$this->load->view('admin/include/footer');
			} else {
				$message = $this->input->post('message');
				$number = $this->input->post('number');
				$sendto = $this->input->post('send-to');
				$sms = $this->send_to($number,$message,$sendto);
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/settings/send',$data);
				$this->load->view('admin/include/footer');
			}
		}else{
			$this->load->view('admin/include/header',$data);
			$this->load->view('admin/settings/send',$data);
			$this->load->view('admin/include/footer');
		}
		
		

	}

	function send_to($number=array(),$message,$sent_to){
		$modem_data = $this->configs->get_active_modem();
		$users = $this->configs->get_all_user($sent_to);
		
		if($sent_to == "Specific"){
			if($number == ''){
				return 'Please enter a number';
			}else{
				$explode = explode(' ', $number);
				$implode = implode(',', $explode);
				if(!empty($modem_data)){
					foreach ($modem_data as $data) {
						$this->smsgateway->account_initialize($data['username'],$data['password']);
						$result = $this->smsgateway->sendMessageToManyNumbers($explode,$message,$data['device_id']);
						return $this->session->set_flashdata('sms', '<h3><span class="text-center label label-success" id="sms-flash">Message sent.</span></h3>');
					}
				}
			}
		}else{
			if(!empty($users)){
				$numbers_in_array = array();
				foreach ($users as $values) {
						array_push($numbers_in_array, array('number'=>$values['mobile_no']));
				}

				array_key_exists('number', $numbers_in_array);
				if(!empty($modem_data)){
					
					foreach ($modem_data as $data) {
						$this->smsgateway->account_initialize($data['username'],$data['password']);
						$result = $this->smsgateway->sendMessageToManyNumbers($numbers_in_array,$message,$data['device_id']);
							return $this->session->set_flashdata('sms', '<h3><span class="text-center label label-success" id="sms-flash">Message sent.</span></h3>');
					}	

					
				}
			}
		}

	}

	function set_active_sms_modem(){
		$id = $this->input->get('id');
		$this->configs->set_active_modem($id);
		redirect('view/sms');
	}

	function sms_type(){
		$data['title'] = 'Sms Types';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['type'] = $this->configs->select_type();
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));

		$submit = $this->input->post('save');
		if(isset($submit)){


			$this->form_validation->set_rules('title', 'Type', 'trim|required|min_length[5]|max_length[30]');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/settings/type',$data);
				$this->load->view('admin/include/footer');
			} else {
				$type = $this->input->post('title');
				$priority = $this->input->post('priority');
				$output = $this->configs->insert_or_update_type($type,$priority);
				if ($output == 'already exist') {
					$this->session->flashdata('msg',$output);
					$this->load->view('admin/include/header',$data);
					$this->load->view('admin/settings/type',$data);
					$this->load->view('admin/include/footer');
				}else{
					redirect('view/sms_type');
				}
			}

		}else{
			$this->load->view('admin/include/header',$data);
			$this->load->view('admin/settings/type',$data);
			$this->load->view('admin/include/footer');
		}
		
	}

	function sms_type_archive(){
		$id = $this->input->post('id');
		$this->configs->archive_type($id);
		return 'successfully deleted';
	}

	function upload_files(){
		$data['title'] = 'Download Centre';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$data['files'] = $this->downloads->get_all();
		$role = $this->session->userdata('role');
		$submit = $this->input->post('btn-save-download');

		if(isset($submit)){


			$save = $this->input->post('priority');
			if($save == 'default'){

					$this->form_validation->set_rules('filename', 'File Name', 'trim|required',TRUE);
					$this->form_validation->set_rules('allowed_user', 'Allowed user', 'trim|required',TRUE);
					if (empty($_FILES['filepath']['name']))
					{
					    $this->form_validation->set_rules('filepath', 'File', 'required');
					}
					if ($this->form_validation->run() == FALSE) {
						$this->load->view('admin/include/header',$data);
						$this->load->view('download/download',$data);
						$this->load->view('admin/include/footer');
					} else {
						$config['upload_path']          = 'download_section';
			            $config['allowed_types']        = 'gif|jpg|png|docx|pdf';
			            $config['max_size']             = 1000; // allowed max size 
			            $config['max_width']            = 1024; // max widh
			            $config['max_height']           = 768;	// max height
			            $config['overwrite']           	= true;	// boolean

			            $this->load->library('upload', $config);

			            if ( ! $this->upload->do_upload('filepath'))
			            {
			                    $data = array('error' => $this->upload->display_errors());

			                    $this->load->view('admin/include/header',$data);
								$this->load->view('download/download',$data);
								$this->load->view('admin/include/footer');
			            }
			            else
			            {
			            		$name = $this->input->post('filename');
			            		$filename = $this->upload->data();
			            		$allowed = $this->input->post('allowed_user');
			            		$upload_file = $this->downloads->save($name,$filename['file_name'],$allowed);
			            		//echo $upload_file;
			            		if($upload_file == "success"){
			            			redirect('view/upload_files','refresh');
			            		}else{
			            			$this->session->set_flashdata('msg','unable to save');
			            			$this->load->view('admin/include/header',$data);
									$this->load->view('download/download',$data);
									$this->load->view('admin/include/footer');
			            		}
			                    
			            }
			        }
			}else{
					$this->form_validation->set_rules('filename', 'File Name', 'trim|required',TRUE);
					$this->form_validation->set_rules('allowed_user', 'Allowed user', 'trim|required',TRUE);
					if ($this->form_validation->run() == FALSE) {
						$this->load->view('admin/include/header',$data);
						$this->load->view('download/download',$data);
						$this->load->view('admin/include/footer');
					} else {
						$name = $this->input->post('filename');
	            		$id = $save;
	            		$allowed = $this->input->post('allowed_user');
	            		$upload_file = $this->downloads->edit($id,$name,$allowed);
	            		//echo $upload_file;
	            		if($upload_file == "success"){
	            			redirect('view/upload_files','refresh');
	            		}else{
	            			$this->session->set_flashdata('msg','unable to save');
	            			$this->load->view('admin/include/header',$data);
							$this->load->view('download/download',$data);
							$this->load->view('admin/include/footer');
	            		}
			        }
			}

			
		}else{
			$this->session->set_flashdata('msg');
			$this->load->view($this->header_by_role($role),$data);
			$this->load->view('download/download',$data);
			$this->load->view($this->footer_by_role($role));
		}
		 		
	}

	function file_remover(){
		$id = $this->input->post('id');
		$remove = $this->downloads->remove($id);
		echo $remove;
	}

	function sms_notification(){
		$data['title'] = 'sms';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$data['sms'] = $this->configs->view_all_template();
		$data['type'] = $this->configs->select_type();
		$role = $this->session->userdata('role');
		if(!empty($role)){

			if($role == 'admin'){
				$submit = $this->input->post('save');
				if(isset($submit)){

					$this->form_validation->set_rules('type', 'Type', 'trim|required');
					$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[8]|max_length[50]');
					$this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[10]|max_length[500]');

					
					if ($this->form_validation->run() == FALSE) {
						$this->load->view('admin/include/header',$data);
						$this->load->view('admin/settings/notification',$data);
						$this->load->view('admin/include/footer',$data);
					} else {
						$title = $this->input->post('title');
						$message = $this->input->post('message');
						$type = $this->input->post('type');
						$priority = $this->input->post('priority');
						$template = $this->configs->insert_or_update_template($title,$message,$type,$priority);
						
						redirect('view/sms_notification');
						
					}

				}else{
					$this->load->view('admin/include/header',$data);
					$this->load->view('admin/settings/notification',$data);
					$this->load->view('admin/include/footer',$data);
				}
				
			}else{
				$this->load->view('errors/html/error_404');
			}
			
		}else{
			
			redirect('user/authentication');
			
		}
		
	}

	function delete_sms_template(){
		$id = $this->input->post('id');
		echo $this->configs->archive_template($id);
	}

	function downloads(){
		$data['title'] = 'Download Centre';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		$data['files'] = $this->downloads->get_all($role);
		if($role != 'admin'){
			$this->load->view($this->header_by_role($role),$data);
			$this->load->view('download/download',$data);
			$this->load->view($this->footer_by_role($role),$data);
		}else{
			echo 'Unable to access';
		}
	}

	function announcement(){
		$data['title'] = 'Announcement';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$name = $this->session->userdata('name');
	    $userid = $this->muser->get_account_id_by_name($name);
		$data['announcement'] = $this->downloads->get_all_announcement_by_id($userid);
		$role = $this->session->userdata('role');
		$submit = $this->input->post('save');
		if (isset($submit)) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[20]|max_length[500]');
			$this->form_validation->set_rules('date', 'Date', 'trim|required');
			// if (empty($_FILES['filepath']['name']))
			// {
			//     $this->form_validation->set_rules('filepath', 'File', 'required');
			// }
			if ($this->form_validation->run() == FALSE) {
				$this->load->view($this->header_by_role($role),$data);
				$this->load->view('announcement/post',$data);
				$this->load->view($this->footer_by_role($role),$data);
			} else {

				$content = $this->input->post('content');
	    		$title = $this->input->post('title');
	    		$priority = $this->input->post('priority');
	    		$top_priority = $this->input->post('top_priority');
	    		$date = $this->input->post('date');
	    		$upload_file = $this->downloads->post_announcement($userid,$title,'',$content,$priority,$date,$top_priority);
	    		//echo $upload_file;
	    		if($upload_file == "success"){
	    			redirect('view/announcement','refresh');
	    		}else{
	    			$this->session->set_flashdata('msg','<h3><span class="text-center label label-success" id="sms-flash">Title already exist.</span></h3>');
	    			$this->load->view($this->header_by_role($role),$data);
					$this->load->view('announcement/post',$data);
					$this->load->view($this->footer_by_role($role),$data);
	    		}
				// $config['upload_path']          = 'announcement';
	   //          $config['allowed_types']        = 'gif|jpg|png';
	   //          $config['max_size']             = 5000; // allowed max size 
	   //          $config['max_width']            = 3840; // max widh
	   //          $config['max_height']           = 2160;	// max height
	   //          $config['overwrite']           	= true;	// boolean

	   //          $this->load->library('upload', $config);

	   //          if ( ! $this->upload->do_upload('filepath'))
	   //          {
	   //                  $data = array('error' => $this->upload->display_errors());

	   //                  $this->load->view($this->header_by_role($role),$data);
				// 		$this->load->view('announcement/post',$data);
				// 		$this->load->view($this->footer_by_role($role),$data);
	   //          }
	   //          else
	   //          {
	   //          		$filename = $this->upload->data();
	   //          		$content = $this->input->post('content');
	   //          		$title = $this->input->post('title');
	   //          		$priority = $this->input->post('priority');
	            		
	   //          		$upload_file = $this->downloads->post_announcement($userid,$title,$filename['file_name'],$content,$priority);
	   //          		//echo $upload_file;
	   //          		if($upload_file == "success"){
	   //          			redirect('view/announcement','refresh');
	   //          		}else{
	   //          			$this->session->set_flashdata('msg','<h3><span class="text-center label label-success" id="sms-flash">Title already exist.</span></h3>');
	   //          			$this->load->view($this->header_by_role($role),$data);
				// 			$this->load->view('announcement/post',$data);
				// 			$this->load->view($this->footer_by_role($role),$data);
	   //          		}
	                    
	   //          }
			}
		}else{
			if($role != 'student' || $role != 'parent'){
				$this->load->view($this->header_by_role($role),$data);
				$this->load->view('announcement/post',$data);
				$this->load->view($this->footer_by_role($role),$data);
			}else{
				echo 'unable to access';
			}
		}
	}

	function announcement_approval(){
		$id = $this->input->post('id');
		$approval = $this->input->post('approval');

		$out = $this->downloads->approval($id,$approval);
		echo $out;
	}

	function annoucement_archived(){
		$id = $this->input->get('id');
		$output = $this->downloads->archive_announcement_by_id($id);
		echo $output;
	}


	function session(){
		$data['title'] = 'Session';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		$data['session'] = $this->configs->session();
		if(!empty($role)){
			$submit = $this->input->post('save');
			if(isset($submit)){
				$id = $this->input->post('id');
				return $this->configs->set_session($id);
			}else{
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/class/session',$data);
				$this->load->view('admin/include/footer',$data);
			}
		}else{
			redirect('user/authentication');
		}
	}

	function year(){
		$data['title'] = 'Year Level';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		$data['year'] = $this->configs->select_year();
		$data['session'] = $this->configs->session();
		if(!empty($role)){
			$submit = $this->input->post('save');
			if(isset($submit)){
				
				$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[20]');
				$this->form_validation->set_rules('sessions', 'Session', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/include/header',$data);
					$this->load->view('admin/class/year',$data);
					$this->load->view('admin/include/footer',$data);
				} else {
					$priority = $this->input->post('priority');
					$year = $this->input->post('title');
					$session_id = $this->input->post('sessions');

					$this->configs->save_year($year,$session_id,$priority);
					redirect('view/year');
				}

			}else{
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/class/year',$data);
				$this->load->view('admin/include/footer',$data);
			}
		}else{
			redirect('user/authentication');
		}
	}

	function archive_year(){
		$id = $this->input->post('id');
		$success = $this->configs->archive_year($id);
		return $success;
	}


	function section(){
		$data['title'] = 'Section';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		$data['year'] = $this->configs->select_year();
		$data['section'] = $this->configs->select_section();
		if(!empty($role)){
			$submit = $this->input->post('save');
			if(isset($submit)){
				
				$this->form_validation->set_rules('section', 'Section', 'trim|required|min_length[5]|max_length[20]');
				$this->form_validation->set_rules('year-level', 'Year level', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/include/header',$data);
					$this->load->view('admin/class/section',$data);
					$this->load->view('admin/include/footer',$data);
				} else {
					$priority = $this->input->post('priority');
					$section = $this->input->post('section');
					$year_id = $this->input->post('year-level');

					$this->configs->save_section($section,$year_id,$priority);
					redirect('view/section');
				}

			}else{
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/class/section',$data);
				$this->load->view('admin/include/footer',$data);
			}
		}else{
			redirect('user/authentication');
		}
	}

	function archive_section(){
		$id = $this->input->post('id');
		$success = $this->configs->archive_section($id);
		return $success;
	}

	function subject(){
		$data['title'] = 'Subject';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		$data['subject'] = $this->configs->select_subject();
		$data['section'] = $this->configs->select_section();
		if(!empty($role)){
			$submit = $this->input->post('save');
			if(isset($submit)){
				
				$this->form_validation->set_rules('subject', 'Subject', 'trim|required|min_length[5]|max_length[50]');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/include/header',$data);
					$this->load->view('admin/class/subject',$data);
					$this->load->view('admin/include/footer',$data);
				} else {
					$priority = $this->input->post('priority');
					$subject = $this->input->post('subject');

					$this->configs->save_subject($subject,$priority);
					redirect('view/subject');
				}

			}else{
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/class/subject',$data);
				$this->load->view('admin/include/footer',$data);
			}
		}else{
			redirect('user/authentication');
		}
	}

	function archive_subject(){
		$id = $this->input->post('id');
		$success = $this->configs->archive_subject($id);
		return $success;
	}

	function assign(){
		$data['title'] = 'Assign';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		$data['subject'] = $this->configs->select_subject();
		$data['section'] = $this->configs->select_section();
		$data['subject_section'] = $this->configs->select_assign();
		if(!empty($role)){
			$submit = $this->input->post('save');
			if(isset($submit)){
				
				$this->form_validation->set_rules('section-sub', 'Section', 'trim|required');
				$this->form_validation->set_rules('subject-sub', 'Subject', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/include/header',$data);
					$this->load->view('admin/class/assign',$data);
					$this->load->view('admin/include/footer',$data);
				} else {
					$priority = $this->input->post('priority');
					$subject_id = $this->input->post('subject-sub');
					$section_id = $this->input->post('section-sub');
					$this->configs->save_assign($subject_id,$section_id,$priority);
					redirect('view/assign');
				}

			}else{
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/class/assign',$data);
				$this->load->view('admin/include/footer',$data);
			}
		}else{
			redirect('user/authentication');
		}
	}

	function deleted_assign_subject(){
		$id = $this->input->post('id');
		$success = $this->configs->deleted_assign_subject($id);
		return $success;
	}


	function class_sched(){
		$data['title'] = 'Class schedule';
		$data['footer'] = 'Fr. Simpliciano Academy';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$role = $this->session->userdata('role');
		$data['time'] = $this->configs->select_time();
		$data['year'] = $this->configs->select_year();
		$data['class_sched'] = $this->configs->select_class_sched();
		if(!empty($role)){
			$submit = $this->input->post('save');
			if(isset($submit)){
				
				$this->form_validation->set_rules('year-sub', 'Year Level', 'trim|required');
				$this->form_validation->set_rules('subject-sub', 'Subject', 'trim|required');
				$this->form_validation->set_rules('time-sub', 'Time', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/include/header',$data);
					$this->load->view('admin/schedule/class_sched',$data);
					$this->load->view('admin/include/footer',$data);
				} else {
					$priority = $this->input->post('priority');
					$year_id = $this->input->post('year-sub');
					$class = $this->input->post('subject-sub');
					$time_id = $this->input->post('time-sub');
					$this->configs->save_class_sched($year_id,$class,$time_id,$priority);
					redirect('view/class_sched');
				}

			}else{
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/schedule/class_sched',$data);
				$this->load->view('admin/include/footer',$data);
			}
		}else{
			redirect('user/authentication');
		}
	}

	function deleted_class_sched(){
		$id = $this->input->post('id');
		$success = $this->configs->archive_class_sched($id);
		return $success;
	}

	function exam_sched(){

	}

	function student_dashboard(){

	}

	function teacher_dashboard(){

	}

	function get_subject(){
		$year_id = $this->input->post('year_id');
		$data = $this->configs->select_assign($year_id);
		echo json_encode($data);
	}

	function get_time(){
		$time_id = $this->input->post('time_id');
		$data = $this->configs->select_time($time_id);
		echo json_encode($data);
	}

		
}
