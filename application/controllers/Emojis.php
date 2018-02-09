<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Author:
Date Created:January 22,2018
Description:
*/
class Emojis extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','security','html');
		$this->load->library('form_validation','smsgateway','smile');
	}

	function icons(){
		$icon['icons'] = str_replace($this->smile->replacers(),$this->smile->icons("100px"), ':anger: :girl-confused:');
		$icon['show'] = $this->smile->icons("50px");
		$icon['alt'] = $this->smile->replacers();
		$this->load->view('emoticon',$icon);
	}

}