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
        function obtener_cReactivos($id_seccion_reactivo,$num_encuesta,$alcance){

            $query = $this -> db -> select('c_seccion_encuesta.id_seccion_reactivo, c_seccion_encuesta.num_encuesta, c_seccion_encuesta.nom_seccion, '
                    . 'c_seccion_encuesta.status, c_seccion_encuesta.alcance,c_reactivos.id_reactivos, c_reactivos.id_padre, c_reactivos.tpo_reactivo,'
                    . 'c_reactivos.reactivo, c_reactivos.ponderacion ')
                    -> from('c_reactivos')
                    ->join('c_seccion_encuesta','c_reactivos.id_seccion_reactivo = c_seccion_encuesta.id_seccion_reactivo', 'inner')
                    -> where('c_seccion_encuesta.num_encuesta', $num_encuesta)
                    -> where('c_seccion_encuesta.alcance', $alcance)
                    -> where('c_seccion_encuesta.id_seccion_reactivo', $id_seccion_reactivo)
                    -> where('status', 1)
                    -> get();
            $dept = array();
            echo $query->num_rows();
            if ($query->num_rows() > 0){
                $row = $query->result_array(); 
                for($i=0;$i<$query->num_rows();$i++){
                    $dep[$i]['id_seccion_reactivo'] = $row[$i]['id_seccion_reactivo'];
                    $dep[$i]['num_encuesta'] = $row[$i]['num_encuesta'];
                    $dep[$i]['nom_seccion'] = $row[$i]['nom_seccion'];
                    $dep[$i]['status'] = $row[$i]['status'];
                    $dep[$i]['alcance'] = $row[$i]['alcance'];
                    $dep[$i]['id_reactivos'] = $row[$i]['id_reactivos'];
                    $dep[$i]['id_padre'] = $row[$i]['id_padre'];
                    $dep[$i]['reactivo'] = $row[$i]['reactivo'];
                    $dep[$i]['ponderacion']= $row[$i]['ponderacion'];
                    if($row[$i]['tpo_reactivo']== 2){
                        $query2 = $this -> db -> select('id_opciones, id_reactivo, id_seccion_reactivo, respuesta, inciso')
                                        -> from('c_opciones')
                                        -> where ('id_reactivo', $row[$i]['id_reactivos'])
                                        -> where ('id_seccion_reactivo', $row[$i]['id_seccion_reactivo'])
                                        ->get();

                        $r = $query2->result_array(); 
                        $dep[$i]['tpo_reactivo']=array();
                        for($j=0;$j<$query2->num_rows();$j++){
                            
                            $dep[$i]['tpo_reactivo'][$j]['id_opciones']= $r[$j]['id_opciones'];
                            //$dep[$i]['tpo_reactivo'][]  = $r[$j]['id_reactivo'];
                            //$dep[$i]['tpo_reactivo'][]  = $r[$j]['id_seccion_reactivo'];
                            $dep[$i]['tpo_reactivo'][$j]['respuesta']= $r[$j]['respuesta'];
                            $dep[$i]['tpo_reactivo'][$j]['inciso']= $r[$j]['inciso'];
                        }

                        
                    }
                    else{
                        $dep[$i]['tpo_reactivo'] = $row[$i]['tpo_reactivo'];
                    }
                }

                return $dep;
            }
            else{
                return false;
            }
        }
        
        //put your code here
    }
