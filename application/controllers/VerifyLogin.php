<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Verifylogin
 *
 * @author Kroz
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct(){
   parent::__construct();
   $this->load->model('User','',TRUE);
 }

 function index(){
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE){
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else{
     //Go to private area
     redirect('Home', 'refresh');
   }

 }

 function check_database($password){
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->User->login($username, $password);

   if($result){
     $sess_array = array();
     foreach($result as $row){
       $sess_array = array(
         'id_usuario' => $row->id_usuario,
         'username'=> $row->username,
         'status'=> $row->status,
         'id_rol'=> $row->id_rol,
         'id_institucion'=> $row->id_institucion,
         'id_entidad'=> $row->id_entidad
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }else{
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}

?>
