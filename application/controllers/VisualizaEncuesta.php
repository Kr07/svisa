<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VisualizaEncuesta
 *
 * @author lenovo
 */
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class VisualizaEncuesta extends CI_Controller{
    
            function visualiza_encuesta(){
                $this->load->model('Encuesta');
                $lstEncuesta = $this->Encuesta->obtener_cReactivos(1,1,1);
                
                print_r($lstEncuesta);
                $this->load->view('../views/include/header');
                $this->load->view('encuesta', $lstEncuesta);
                $this->load->view('../views/include/footer');
            }
            function inserta_encuesta(){
                if($this->session->userdata('logged_in')){
                    $data = $this->input->post('arreglo');
                    
                    $this->load->model('info_Verificacion');
                    $this->Encuesta->insertar_infVerificacion($usuario, $cct, $semaforo);
                    $this->load->model('Encuesta');
                    $respuesta = $this->Encuesta->insertar_Encuesta($data);
                    if($respuesta != false){
                        //siguiente encuenta
                        $lstEncuesta = $this->Encuesta->obtener_cReactivos($respuesta['id_seccion_reactivo'],$respuesta['num_encuesta'],$respuesta['alcance']);
                    }
                    else{
                        //mandar mensaje de error
                        
                    }
                    $this->load->view('../views/include/header');
                    $this->load->view('encuesta', $lstEncuesta);
                    $this->load->view('../views/include/footer');
                }
            }

    //put your code here
    }
