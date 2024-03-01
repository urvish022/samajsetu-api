<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('_d')) {

    function _d($data, $exit = FALSE) {
        echo '<pre style="height:500px;width:1000px;margin-left:400px;margin-top:50px;">';
        print_r($data);
        echo '</pre>';
        if ($exit)
            exit;
    }
}

if(!function_exists('change_mytheme')){
	
	function change_mytheme($theme){
		$set_session_status = setsessionData('theme_color',$theme);
		return $set_session_status;
	}
}

if(!function_exists('change_language')){
	
	function change_language($lang){
		$set_session_status = setsessionData('site_lang',$lang);
		return $set_session_status;
	}
}

if(!function_exists('get_current_theme')){
function get_current_theme(){
    $CI =& get_instance();
    if(!$CI->session->userdata('theme_color'))
    $theme = 'default';
    else
    $theme = $CI->session->userdata('theme_color');

    return $theme;
  }
}

if (!function_exists('sessionExist'))
{
    function sessionExist($key){
        $CI =& get_instance();
        $key_exist = $CI->session->userdata($key);
        if(empty($key_exist))
        {
        	return 0;
        }
        else
	    {
	    	return 1;
	    }
    }
}

if(!function_exists('setsessionData'))
{
	function setsessionData($key,$val)
	{
		$CI =& get_instance();
		$status = $CI->session->set_userdata($key,$val);
		return $status;
	}
}

if(!function_exists('datetosqlformat'))
{
  function datetosqlformat($date)
  {
    return date('Y-m-d', strtotime($date));
  }
}

if(!function_exists('sqltodateformat'))
{
  function sqltodateformat($date)
  {
    return date('d-m-Y', strtotime($date));
  }
}

if(!function_exists('my_simple_crypt'))
{
  function my_simple_crypt( $string, $action = 'e' ) {
      // you may change these values to your own
      $secret_key = 'urvish';
      $secret_iv = 'patel';
  
      $output = false;
      $encrypt_method = "AES-256-CBC";
      $key = hash( 'sha256', $secret_key );
      $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  
      if( $action == 'e' ) {
          $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
      }
      else if( $action == 'd' ){
          $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
      }
  
      return $output;
  }
}

if(!function_exists('call_notification_curl'))
{
  function call_notification_curl($id)
  {
    $apiUrl = NOTIFICATION_API_URL; // Replace with your Laravel API endpoint URL

    // Create cURL resource
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    // Set POST data (assuming Laravel API expects the ID in the request body)
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id' => $id]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        $error_message = 'Curl error: ' . curl_error($ch);
        log_message('error', $error_message);
    } else {
        // Log success response
        log_message('info', 'API Response: ' . $response);
        // Handle the response from the Laravel API
        // $response contains the API response data
    }
    // Close cURL resource
    curl_close($ch);
  }
}

if(!function_exists('call_app_curl'))
{
  function call_app_curl($id,$apiUrl)
  {
    // Create cURL resource
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    // Set POST data (assuming Laravel API expects the ID in the request body)
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id' => $id]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    
    // Check for cURL errors
    if (curl_errno($ch)) {
        $error_message = 'Curl error: ' . curl_error($ch);
        log_message('error', $error_message);
    } else {
        // Log success response
        log_message('info', 'API Response: ' . $response);
        // Handle the response from the Laravel API
        // $response contains the API response data
    }
    // Close cURL resource
    curl_close($ch);
  }
}
?>