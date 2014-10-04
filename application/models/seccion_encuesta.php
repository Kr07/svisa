<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of seccion_encuesta
 *
 * @author lenovo
 */
class seccion_encuesta extends CI_Model {
        function __construct(){
            $this -> load -> database();
        }
        function obtener_ultimo($num_encuesta){
            $query = $this->db->select('id_seccion_reactivo')
                    ->from('c_seccion_encuesta')
                    ->where('num_encuesta', $num_encuesta)
                    ->order_by('id_verificacion', 'desc')
                    ->limit(1)
                    ->get();
            return $query;
            
        }
    //put your code here
}
