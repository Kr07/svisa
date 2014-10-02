<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Kroz
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends Main_Controller {

 function __construct(){
   parent::__construct();
 }

 function index(){
   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['id_usuario'] = $session_data['id_usuario'];
     $this->load->view('../views/include/header');
      $this->load->view('home_view', $data);
      $this->load->view('../views/include/footer');
     
   }
   else{
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout(){
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>
