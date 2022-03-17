<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function helper_log($tipe = "", $str = "")
 {

    $ci =& get_instance();
    $ci->load->database();
    $ci->load->library('user_agent');

 
    if (strtolower($tipe) == "login"){
        $log_tipe   = 0;
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe   = 1;
    }
    elseif(strtolower($tipe) == "view"){
        $log_tipe   = 2;
    }
    elseif(strtolower($tipe) == "view1"){
        $log_tipe   = 3;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe   = 4;
    }
    else{
        $log_tipe   = 5;
    }

    if ($ci->agent->is_browser()){
        $agent = $ci->agent->browser().' '.$ci->agent->version();
    }elseif ($ci->agent->is_robot()){
        $agent = $ci->agent->robot();
    }elseif ($ci->agent->is_mobile()){
        $agent = $ci->agent->mobile();
    }else{
        $agent = 'Data user gagal di dapatkan';
    }

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $os = $ci->agent->platform();
    $ip = $ci->input->ip_address().':'.$ip;
    // paramter
    $lg_user      = $ci->session->userdata('nama');
    $lg_tipe      = $log_tipe;
    $lg_desc      = $str;
    
    $param = array('log_user' => $lg_user, 'log_tipe' => $lg_tipe, 'log_desc' => $lg_desc, 'log_browser'=>$agent, 'log_os'=>$os, 'log_ip'=>$ip);
    //load model log
    $ci->load->model("M_log");
    //save to database
    $ci->M_log->save_log($param);
 }
