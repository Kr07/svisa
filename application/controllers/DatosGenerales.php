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
            if($this->session->userdata('logged_in')){
                
                $cct = $this->input->post('cct');
                $entidad= $this->session->userdata('logged_in')['id_entidad'];
                $this->load->model('c_CCT');
                $datosGenerales = $this->c_CCT->busca_cCCT($cct,$entidad );

                header('Pragma: no-cache');
                header('cache-control: no-cache');
                header('Content-Type: application/json');
                echo json_encode( $datosGenerales );
                
            }else{
                redirect('Login', 'refresh');
            }
        }
        
        function actualiza_cCCT(){
            if($this->session->userdata('logged_in')){
                $cve_cct = $this->input->post('cve_cct');
                $id_entidad= $this->session->userdata('logged_in')['id_entidad'];
                
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
		
		$this->load->model('c_CCT');
		$actualizado=$this->c_CCT->actualiza_cCCT($cve_cct,$id_entidad, $data);
                
                
                if ($actualizado){
                    $this->load->view('../views/include/header');
                    $this->load->view('encuesta_view');
                    $this->load->view('../views/include/footer');
                }else{
                    $this->load->view('../views/include/header');
                    $this->load->view('home_view');
                    $this->load->view('../views/include/footer');
                    echo "No fue posible actualizar";
                }
                
            }else{
                redirect('Login', 'refresh');
            }
	}
    }

?>
