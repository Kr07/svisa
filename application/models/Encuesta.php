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
        function obtener_cReactivos($no_seccion){

            $query = $this -> db -> select('c_seccion_encuesta.id_seccion_reactivo, c_seccion_encuesta.num_encuesta, c_seccion_encuesta_nom_seccion, '
                    . 'c_seccion_encuesta.status, c_seccion_encuesta.alcance,c_reactivos.id_reactivos, c_reactivos.id_padre, c_reactivos.tipo_reactivo,'
                    . 'c_reactivos.reactivo, c_reactivos.ponderacion ')
                    -> from('c_reactivos')
                    ->join('c_seccion_encuesta','c_reactivos.id_seccion_reactivo = c_seccion_encuesta.id_seccion_reactivos', 'inner')
                    -> where('c_seccion_encuesta.num_encuesta', $no_seccion)
                    -> where('status', 1)
                    -> get();
            $dept = array();
            if ($query->num_rows() > 0){
                $row = $query->row_array(); 
                
                while($row = mysql_fetch_array($result)){
                    $dep[]['id_seccion_reactivo'] = $row['c_seccion_encuesta.id_seccion_reactivo'];
                    $dep[]['num_encuesta'] = $row['c_seccion_encuesta.num_encuesta'];
                    $dep[]['nom_seccion'] = $row['c_seccion_encuesta.nom_seccion'];
                    $dep[]['status'] = $row['c_seccion_encuesta.status'];
                    $dep[]['alcance'] = $row['c_seccion_encuesta.alcance'];
                    $dep[]['id_reactivos'] = $row['c_reactivos.id_reactivos'];
                    $dep[]['id_padre'] = $row['c_reactivos.id_padre'];
                    $dep[]['reactivo'] = $row['c_reactivos.reactivo'];
                    $dep[]['ponderacion']= $row['c_reactivos.ponderacion'];
                    if($row['c_reactivos.tipo_reactivo']== 2){
                        $query2 = $this -> db -> select('id_opciones, id_reactivo, id_seccion_reactivo, respuesta, inciso')
                                        -> from('c_opciones')
                                        -> where ('id_reactivo', $row['c_reactivos.id_reactivos'])
                                        -> where ('id_seccion_reactivo', $row['c_seccion_encuesta.id_seccion_reactivo'])
                                        ->get();
                        $dep[]['tipo_reactivo'][] = $query2->row_array(); 
                    }
                    else{
                        $dep[]['tipo_reactivo'] = $row['c_reactivos.tipo_reactivo'];
                    }
                }
                return $dept;
            }
            else{
                return false;
            }
        }
        
        //put your code here
    }
