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
 * @modify Kroz
 */
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class VisualizaEncuesta extends CI_Controller{
    
        function getEncuestaData(){
            
            if($this->session->userdata('logged_in')){
                
                $this->load->model('Encuesta');
//                $id_cct = $this->input->post('id_cct');
    //            $num_aulas = $this->input->post('num_aulas');
                
                $seccion= $this->input->post('seccion');
                $encuesta= $this->input->post('encuesta');
                $alcance= $this->input->post('alcance');

                $lstEncuesta = $this->Encuesta->obtener_cReactivos($seccion,$encuesta,$alcance);
               
                header('Content-Type: application/json');
                echo json_encode( $lstEncuesta );
                
            }else{redirect('Login', 'refresh');}
            
        }
        
        function setResultados(){
        if($this->session->userdata('logged_in')){
            $this->load->model('info_Verificacion');
            $this->load->model('Encuesta');
            
            $id_cct = $this->input->post('id_cct');
            $id_usuario= $this->session->userdata('logged_in')['id_usuario'];
            $id_verificacion = $this->input->post('id_verificacion');
            $aula=$this->input->post('aula');
            $alcance=$this->input->post('alcance');
            $num_encuesta=$this->input->post('num_encuesta');
            $id_seccion_reactivo=$this->input->post('id_seccion_reactivo');
           
            if($id_verificacion==0){
                $id_verificacion=$this->info_Verificacion->obtener_ultimoInsertado($id_cct, $id_usuario);
            }
            
            if($id_verificacion==false){
                if($this->info_Verificacion->insertar_infVerificacion($id_usuario, $id_cct, 0)){
                    $id_verificacion=$this->info_Verificacion->obtener_ultimoInsertado($id_cct, $id_usuario);
                }else{
                    header('Content-Type: application/json');
                    echo json_encode( array('mensaje' => 'No fue posible insertar[info_verificacion]'));
                    return false;
                }
            }
            /*********************************************/
            //lstRespuesta
            /***************************************************/

            $lstRespuesta = $this->input->post('lstRespuesta',TRUE);
            foreach ($lstRespuesta as &$valor) {
                $valor['id_verificacion'] = $id_verificacion;
            }
            unset($valor);
            
            if($alcance==1){
                if(!$this->Encuesta->setVerEscuela($lstRespuesta)){
                    header('Content-Type: application/json');
                    echo json_encode( array('mensaje' => 'No fue posible insertar[info_verificacion]'));
                    return false;
                }
            }
            
            if($alcance==2){
                foreach ($lstRespuesta as &$valor) {
                    $valor['aula'] = $aula;
                }
                unset($valor);
                if(!$this->Encuesta->setVerAula($lstRespuesta)){
                    header('Content-Type: application/json');
                    echo json_encode( array('mensaje' => 'No fue posible insertar[info_verificacion]'));
                    return false;
                }
            }
            
            $seccionData=$this->Encuesta->getSeccionEncuesta(($id_seccion_reactivo+1),$num_encuesta);

            $cambioAula=false;
            if($seccionData==false){
                $seccionData=$this->Encuesta->getFirstSeccionEncuesta($num_encuesta,$alcance);
                $cambioAula=true;
            }
            $data = array(
                'seccionData' => $seccionData,
                'cambioAula' => $cambioAula,
                'id_verificacion' => $id_verificacion           
            );
            
            header('Content-Type: application/json');
            echo json_encode( $data ); 
        }else{redirect('Login', 'refresh');}
        }
        
    //put your code here
    }
