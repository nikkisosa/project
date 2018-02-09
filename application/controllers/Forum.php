<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Author:
Date Created:January 22,2018
Description:
*/
class Forum extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','security','html');
		$this->load->library('form_validation','smsgateway');
		$this->load->model(array('Configs','admin','downloads','muser'));
	}

	function index(){
		$data['title'] = 'Home';
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$data['announcement'] = $this->downloads->get_all_approved_announcement();
		$data['category'] = $this->muser->category();
		$data['online'] = $this->muser->user_login();
		$role = $this->session->userdata('role');
		$data['threads'] = $this->muser->list_of_thread();
		if(!empty($role)){
			$this->load->view('forum/header',$data);
			$this->load->view('forum/content/home',$data);
			$this->load->view('forum/footer',$data);
		}else{
			redirect('user/authentication');
		}
	}

	function category(){
		$id = $this->input->get('id');
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$data['title'] = $this->input->get('category');
		$data['item'] = $this->muser->get_category_by_id($id);
		$data['category'] = $this->muser->category();
		$this->load->view('forum/header',$data);
		$this->load->view('forum/content/category',$data);
		$this->load->view('forum/footer',$data);
	}

	function content(){
		$category_id = $this->input->get('category_id');
		$thread_id = $this->input->get('thread_id');
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$data['category'] = $this->muser->category();
		$data['comment'] = $this->muser->get_content_by_id($thread_id);
		$author = $this->muser->get_category_by_id($category_id,$thread_id);
		foreach ($author as $value) {
			$data['post_content'] = $value['content'];
			$data['name'] = $value['name'];
			$data['title'] = $value['title'];
			$data['is_close'] = $value['date_created'];
			$data['categorys'] = $value['category'];
			$data['category_id'] = $value['category_id'];
			$data['thread_id'] = $value['thread_id'];
			$data['date_posted'] = $value['date_created'];
		}

		$submit = $this->input->post('submit');
		if(isset($submit)){
			$this->form_validation->set_rules('comment', 'Comment Box', 'trim|required',TRUE);
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('forum/header',$data);
				$this->load->view('forum/content/content',$data);
				$this->load->view('forum/footer',$data);
			} else {
				$comment = $this->input->post('comment');
				$name = $this->session->userdata('name');
				$id =  $this->input->get('thread_id');
				$commenting = $this->muser->post_coment($id,$comment,$name);
				if($commenting == 'error'){
					$this->session->set_flashdata('msg','<div class="error">invalid data... please repart this to admin</div>');
					$this->load->view('forum/header',$data);
					$this->load->view('forum/content/content',$data);
					$this->load->view('forum/footer',$data);
				}else{
					redirect('forum/content?category_id='.$category_id.'&thread_id='.$thread_id);
				}
			}
		}else{
			$this->load->view('forum/header',$data);
			$this->load->view('forum/content/content',$data);
			$this->load->view('forum/footer',$data);
		}
		
	}

	function category_list(){
		$data['title'] = 'Category List';
		$data['category'] = $this->muser->category();
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$submit = $this->input->post('category-save');
		if(isset($submit)){

			$this->form_validation->set_rules('categoryname', 'Category', 'trim|required|max_length[20]',TRUE);
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('forum/header',$data);
				$this->load->view('forum/content/category_list',$data);
				$this->load->view('forum/footer',$data);
			} else {
				$category = $this->input->post('categoryname');
				$id = $this->input->post('priority');
				$save = $this->muser->save_category($category,$id);
				
				redirect('forum/category_list');
				
			}
			
		}else{
			$this->load->view('forum/header',$data);
			$this->load->view('forum/content/category_list',$data);
			$this->load->view('forum/footer',$data);
		}
		
	}

	function category_delete(){
		$id = $this->input->post('id');
		echo $this->muser->category_delete($id);
	}

	function post(){
		$data['title'] = 'Post Question';
		$data['category'] = $this->muser->category();
		$data['notification'] = $this->muser->notification($this->session->userdata('name'));
		$account_id = $this->muser->get_id('account','account_id',['CONCAT(fname," ",lname)='=>$this->session->userdata('name')]);
		$data['threads'] = $this->muser->get_thread_author('',$account_id);
		$submit = $this->input->post('post-save');
		if(isset($submit)){
			
			$this->form_validation->set_rules('categoryname', 'Category', 'trim|required');
			$this->form_validation->set_rules('post-title', 'Title', 'trim|required|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('post-content', 'Content', 'trim|required|min_length[5]|max_length[500]');
			
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('forum/header',$data);
				$this->load->view('forum/content/post',$data);
				$this->load->view('forum/footer',$data);
			} else {
				$author = $this->session->userdata('name');//$this->muser->get_id('account','account_id',['CONCAT(fname," ",lname)='=>$this->session->userdata('name')]);
				$category = $this->input->post('categoryname');
				$title = $this->input->post('post-title');
				$content = $this->input->post('post-content');
				$priority = $this->input->post('priority');
				$posted = $this->muser->post($author,$title,$content,$category,$priority);
				if($posted == 'successfully'){
					
					redirect('forum/post');
					
				}else{
					$this->session->set_flashdata('msg','<div class="error">'.$posted.'</div>');
					$this->load->view('forum/header',$data);
					$this->load->view('forum/content/post',$data);
					$this->load->view('forum/footer',$data);
				}
			}
			
			
			
		}else{
			$this->load->view('forum/header',$data);
			$this->load->view('forum/content/post',$data);
			$this->load->view('forum/footer',$data);
		}
		
	}

	function thread_close(){
		$id =$this->input->post('id');
		echo $this->muser->thread_close($id);
	}


	

}