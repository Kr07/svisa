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
                    
                    
                    $this->load->model('seccion_encuesta');
                    $id_seccion = $this ->seccion_encuesta->obtener_ultimo($num_encuesta);
                    $this->load->model('info_Verificacion');
                    if($data['seccion'] == 1){
                        $this->info_Verificacion->insertar_infVerificacion($usuario, $cct, $semaforo);
                        $id_verificacion = obtener_ultimoInsertado($cct,$usuario );
                    }
                    if($id_seccion == $data['seccion']){
                        $this->info_Verificacion->actualizar_infVerificacion($id_verficacion,$usuario, $cct, $semaforo);
                    }
                    $this->load->model('Encuesta');
                    $respuesta = $this->Encuesta->insertar_Encuesta($id_verificacion,$data);
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
