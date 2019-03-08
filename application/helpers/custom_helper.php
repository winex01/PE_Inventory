<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('csrf'))
{
    function csrf(){
        $ci =& get_instance();
                
        $csrf = array(
                'name' => $ci->security->get_csrf_token_name(),
                'hash' => $ci->security->get_csrf_hash()
        );
        echo '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
        
    }   
}

if ( ! function_exists('csrfName'))
{
    function csrfName(){
        $ci =& get_instance();
        echo $ci->security->get_csrf_token_name();
    }   
}
if ( ! function_exists('csrfHash'))
{
    function csrfHash(){
        $ci =& get_instance();
        echo $ci->security->get_csrf_hash();
    }   
}

// form not ajax
if ( ! function_exists('csrf'))
{
    function csrf(){
        $ci =& get_instance();
                
        $csrf = array(
                'name' => $ci->security->get_csrf_token_name(),
                'hash' => $ci->security->get_csrf_hash()
        );
        echo '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
        
    }   
}


// flash info 
if ( ! function_exists('flashInfo'))
{
    function flashInfo($msg)
    {
         $ci =& get_instance();
         
         $ci->session->set_flashdata('flashInfo', $msg);
        
    }   
}


// auth
if ( ! function_exists('auth'))
{
    function auth($param)
    {
        $ci =& get_instance();

        $data = $ci->session->userdata($param);
    
        if (empty($data)) {
          $data = 'invalid';
        }

        echo ucwords($data);
    }   
}

if ( ! function_exists('if_auth'))
{
    function if_auth()
    {
        $ci =& get_instance();

        return $ci->session->userdata('logged_in');
    
    }   
}


if ( ! function_exists('dd'))
{
    function dd($param)
    {
        echo '<pre>';
          var_dump($param);    
        echo '</pre>';    
        die;
    }   
}

if ( ! function_exists('dump'))
{
    function dump($param)
    {
        echo '<pre>';
          var_dump($param);    
        echo '</pre>';    
    }   
}

if ( ! function_exists('flash_msg'))
{
    function flash_msg($type, $value)
    {
        echo "<div class='alert alert-".$type."'>".$value."</div>";
    }   
}

// redirect if not authenticated
if ( ! function_exists('redirect_if_not_auth'))
{
    function redirect_if_not_auth()
    {
       $ci =& get_instance();
       
       if (!$ci->session->logged_in) {
            show_404();
       }
    }   
}

// helper for active clas
if ( ! function_exists('active'))
{
    function active($var = '')
    {
         $ci =& get_instance();
        
        if (!empty($var)) {
            if ( $ci->uri->uri_string() == $var ){
                echo 'active';
            }   
        }
    }   
}


// welcome msg
if ( ! function_exists('welcome'))
{
    function welcome()
    {
        $ci =& get_instance();

        return $ci->session->userdata('welcome');
    
    }   
}


// date now
if ( ! function_exists('date_now'))
{
    function date_now()
    {
        return date("Y-m-d");     
    }   
}
