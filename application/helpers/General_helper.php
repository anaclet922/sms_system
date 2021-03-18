<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('webSettings')){

	function webSettings(){

		$CI = get_instance();

    	$data = array();

    	$result = $CI->db->get('tbl_config');

    	$result = $result->result();

    	foreach ($result as $setting) {
    		$data[$setting->config_key] = $setting->value;
    	}

    	return $data;
	}

}

if(!function_exists('stream_server_url')){

    function stream_server_url(){
        $CI = get_instance();
        return $CI->config->item('STREAM_SERVER_BASE_URL');
    }
}

if(!function_exists('server_ip')){
    function server_ip(){
        $CI = get_instance();
        return $CI->config->item('server_ip');
    }
}