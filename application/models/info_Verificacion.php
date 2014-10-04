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
 */
    class info_Verificacion extends CI_Model {
        function __construct(){
            $this -> load -> database();
        }
        function insertar_infVerificacion($usuario, $cct, $semaforo){
            $data = array(
                'id_usuario' => $usuario,
                'id_cct' => $cct,
                'fch_verificacion' => now(),
                'semaforo' => $semaforo                
            );
            $this->db->insert('ver_aula', $data); 
            
            
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
        function obtener_ultimoInsertado($cct, $usuario){
            $query = $this->db->select('id_verificacion')
                    ->from('info_verificacion')
                    ->where('id_usuario', $usuario)
                    ->where('id_cct', $cct)
                    ->order_by('id_verificacion', 'desc')
                    ->limit(1)
                    ->get();
            return $query;
        }
        //put your code here
    }
