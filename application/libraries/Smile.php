<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Smile {

	static $baseUrl = "https://smsgateway.me";

	var $CI;
	function __construct(){
	    
	    $this->CI =& get_instance();

	    $this->CI->load->helper('url');
	    $this->CI->config->item('base_url');
	}

	function icons($default = '20px'){
		$icon = array(
		'<img src="'.base_url().'smiley/emojis/anger.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/burn.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/confused.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/cool.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/cry.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/fire.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/grimace.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/love.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/miao.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/prettiness.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/question.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/shout.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/slobber.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/smile.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/spook.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/startle.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/surprise.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/sweat.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/thirst.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/emojis/vomit.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/1.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/2.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/3.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/4.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/5.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/6.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/7.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/8.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/9.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/10.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/11.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/12.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/13.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/14.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/15.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/16.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/17.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/18.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/19.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/20.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/21.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/22.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/23.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/24.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/25.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/26.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/flat/27.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/consultant/attention.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/consultant/bling.png" id="emoji" " style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/consultant/indicate.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/consultant/products.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/consultant/showing.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/teenage/chuckle.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/teenage/confused.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/teenage/idea.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/teenage/love.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/teenage/motivated.png" id="emoji"  style="width:'.$default.';height:'.$default.';">',
		'<img src="'.base_url().'smiley/teenage/swear.png" id="emoji"  style="width:'.$default.';height:'.$default.';">'

		);

		return $icon;
	}

	function replacers(){
		$replacer = array(

			':anger:',':burn:',':confused:',':cool:',
			':cry:',':fire:',':grimace:',':love:',
			':mioa:',':prettines:',':question:',':shout:',
			':slobber:',':smile:',':spook:',':startle:',
			':surprise:',':sweat:',':thirst:',':vomit:',
			':-)',':<',':"(','(0)',
			':roll:',':nose:','o.o','shock',
			':-/','<3',':-D','smile-hand',
			':semi-cry:',':tears:',':snizz:',':*',
			':sleep:',':down:',':shout:',':whistle:',
			'(o0)',':()',':blush:',';"(',
			':">','(x)',':-s',
			':col-attention:',':col-bling:',':col-indicate:',':col-products:',
			':col-showing:',':girl-chuckle:',':girl-confused:',':girl-love:',
			':girl-motivated:',':girl-swear:'

		);

		return $replacer;
	}
}
?>