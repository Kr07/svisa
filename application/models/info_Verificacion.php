<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of info_Verificacion
 *
 * @author lenovo
 * @modify Kroz
*/
    class info_Verificacion extends CI_Model {
        function __construct(){
            $this -> load -> database();
        }
        function insertar_infVerificacion($id_usuario, $id_cct, $semaforo){
            $data = array(
                'id_usuario' => $id_usuario,
                'id_cct' => $id_cct,
                'fch_verificacion' => date('Y-m-d G:i:s'),
                'semaforo' => $semaforo                
            );
            $this->db->trans_start();
            $this->db->insert('info_verificacion', $data); 
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE){
                return false;
            }else{
                return true;
            }
        }
        function actualizar_infVerificacion($id_verficacion,$usuario, $cct, $semaforo){
            $data = array(
                'id_usuario' => $usuario,
                'id_cct' => $cct,
                'fch_verificacion' => now(),
                'semaforo' => $semaforo                
            );
            $this->db->where('id_verificacion', $id_verficacion);
            $this->db->update('info_verificacion', $data); 
            
        }
        function obtener_ultimoInsertado($id_cct, $id_usuario){
            $query = $this->db->select('id_verificacion')
                    ->from('info_verificacion')
                    ->where('id_usuario', $id_usuario)
                    ->where('id_cct', $id_cct)
                    ->order_by('id_verificacion', 'desc')
                    ->limit(1)
                    ->get();
            if($query -> num_rows() == 1){
                $row = $query->row_array();
                return $row['id_verificacion'];
              }
              else{
                return false;
              }
        }
        //put your code here
    }
