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
            
            $cct = $this->input->post('cve_cct');
            $entidad= $this->input->post('entidad');
            if($entidad == null)
                $entidad = 9;
            $this->load->model('c_CCT');
            $datosGenerales = $this->c_CCT->busca_cCCT($entidad, $cct);

            $this->load->view('home_view', $datosGenerales);
        }
    }

?>
