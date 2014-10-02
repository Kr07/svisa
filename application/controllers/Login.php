<?php
/**
 * Description of Login
 *
 * @author Kroz
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct(){
   parent::__construct();
 }

 function index(){
     $this->load->helper(array('form'));
     if($this->session->userdata('logged_in')){
         redirect('Home', 'refresh');
     }else{
         
        $this->load->view('login_view');
     }
 }

}

?>
