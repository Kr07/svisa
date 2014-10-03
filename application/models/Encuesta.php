<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encuesta
 *
 * @author lenovo
 */
    class Encuesta extends CI_Model {
        function __construct(){
            $this -> load -> database();
        }
        function obtener_cSecciones($no_seccion){
            $query = $this -> db -> select('')
                                 -> from('c_secciones')
                                 -> where('num_encuesta', $no_seccion)
                                 -> get();

            return $query -> result_array();
        }
        function obtener_cReactivos(){
            $lstSecciones = array {
                'id' =>
                
            };
            obtener_cSecciones
            $query = $this -> db -> select('')
                                 -> from('c_reactivos')
                                 -> where('')
                    -> get();
            
            return $query -> result_array();
        }
        
        //put your code here
    }
