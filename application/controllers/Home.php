<?php

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
       
     $this->load->view('../views/include/header');
     $this->load->view('home_view');
     $this->load->view('../views/include/footer');
     
   }
   else{
     //If no session, redirect to login page
     redirect('Login', 'refresh');
   }
 }

 function logout(){
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('Home', 'refresh');
 }

}

?>
