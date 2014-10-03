<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatosGenerales
 *
 * @author lenovo
 */
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class DatosGenerales extends CI_Controller{
        
        function mostrar_DatosGenerales(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            
            $cct = $this->input->post('cct');
            $entidad= $this->session->userdata('id_entidad');//$this->input->post('entidad');
            
            /*if($entidad == null)
                $entidad = 9;*/
            $this->load->model('c_CCT');
            $datosGenerales = $this->c_CCT->busca_cCCT($entidad, $cct);
            
            $this->load->view('home_view', $datosGenerales);
        }
        function actualiza_cCCT(){
		//$this->load->helper('form');
		/*$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]');
		$this->form_validation->set_rules('sueldo', 'Sueldo', 'required|numeric');*/
			
		//if($this->form_validation->run() === true){
			//Si la validación es correcta, cogemos los datos de la variable POST
			//y los enviamos al modelo
                //$tel_cct, $matricula, $no_docente, $e_mail, $num_aulas
                $id_cct = $this->input->post('id_cct');
		$tel_cct = $this->input->post('tel_cct');
		$matricula = $this->input->post('matricula');
                $no_docente = $this->input->post('no_docente');
		$e_mail = $this->input->post('e_mail');
                $num_aulas = $this->input->post('num_aulas');
                        
                $data = array(
                    'tel_cct'   => $tel_cct,
                    'matricula' => $matricula,
                    'no_docente'=> $no_docente,
                    'e_mail'    => $e_mail,
                    'num_aulas' => $num_aulas
		);
		
		$this->load->model('empleados_model');
		$this->empleados_model->actualiza_cCCT($id_cct, $data);
		//}
			
		$this->load->view("home_view");
	}
    }

?>
