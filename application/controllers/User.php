	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Author:
Date Created:January 06,2018
Description:
*/
class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','security','html');
		$this->load->library('session','form_validation');
		$this->load->model('muser');
	}

	function index(){
		$data['title'] = 'Login';
		$this->load->view('user/login',$data);
	}

	function authentication(){
		$data['title'] = 'Login';
		if(!empty($this->session->userdata('name'))){
			$user = $this->session->userdata('role');
			if($user == 'admin'){

				redirect('view/dashboard');

			}else if($user == 'student'){

				redirect('view/dashboard');

			}else if($user == 'teacher'){

				redirect('view/dashboard');

			}else{
				if($user == 'admin'){

					redirect('view/dashboard');

				}else if($user == 'dashboard'){

					redirect('view/dashboard');

				}else if($user == 'teacher'){

					redirect('view/dashboard');

				}else if($user == 'parent'){

					redirect('view/dashboard');

				}
			}

		}else{

			$submit = $this->input->post('submit');
			if(!isset($submit)){

				$this->load->view('user/login',$data);

			}else{

				$this->form_validation->set_rules('username', 'Username', 'trim|required',TRUE);
				$this->form_validation->set_rules('password', 'Password', 'trim|required',TRUE);
				if ($this->form_validation->run() == FALSE)
		        {
		            //$this->load->view('layout/header');
					$this->load->view('user/login',$data);
					$this->load->view('layout/footer');
		        } else {

					$user = $this->input->post('username',TRUE);
		        	$pass = $this->input->post('password',TRUE);
					$user_data['data'] = $this->muser->user($user,$pass);
					if(!empty($user_data['data'])){
						foreach ($user_data['data'] as $value) {
							echo $value['fname'];
							$session = [
								'name'=>$value['fname'].' '.$value['lname'],
								'role'=>$value['type'],
								'img'=>$value['img'],
								'userid'=>$value['account_id'],
								'account_id'=>$value['account_id'],
								'username'=>$value['username']
							];
							$this->session->set_userdata($session);
							$this->muser->login($this->session->userdata('username'));
							if($value['type'] == 'admin'){

								redirect('view/dashboard');

							}else if($value['type'] == 'student'){

								redirect('view/dashboard');

							}else if($value['type'] == 'teacher'){

								redirect('view/dashboard');

							}else if($value['type'] == 'parent'){

								redirect('view/dashboard');

							}

							$this->session->unset_flashdata();
						}
					}else{
						$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid user</div>');
						$this->load->view('user/login',$data);
					}
				}

			}

		}

	}

	function logout(){
		$this->muser->logout($this->session->userdata('username'));
		$this->session->sess_destroy();
		redirect('user/authentication');
	}
}
