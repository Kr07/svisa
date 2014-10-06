<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * cambio
 */

/**
 * Description of c_CCT
 *
 * @author lenovo
 */
class c_CCT extends CI_Model {
    
    function __construct(){
        $this -> load -> database();
    }
    function obtener_cCCT(){
        $query = $this -> db -> get('c_cct');
        
        return $query -> result_array();
    }
    function busca_cCCT($cve_cct, $entidad){
        //$query = $this->db->query('');
        $query = $this -> db -> select('id_cct,id_entidad, nom_cct, cve_cct, nom_diretor, tel_cct, dir_cct, matricula,no_docente, id_municipio, id_localidad, e_mail, num_aulas')//;
        //$query = $this -> db 
                -> from('c_cct')
                -> where('id_entidad', $entidad)
                -> where('cve_cct', $cve_cct)
                -> get();
        
        if ($query->num_rows() > 0){
            $row = $query->row_array(); 
            /*******************************/
            //se busca la descripcion de la entidad para mostrar
            $ent_query = $this ->db -> select('nom_entidad')
                                    -> from('c_entidad')
                                    -> where('id_entidad', $row['id_entidad'])
                                    -> get();
            $id_ent    = $ent_query -> result_array();
            //se busca la descripcion de la localidad
            $loc_query = $this ->db -> select('nom_localidad')
                                    -> from('c_localidad')
                                    -> where('id_municipio', $row['id_municipio'])
                                    -> where('id_localidad', $row['id_localidad'])
                                    -> where('id_entidad', $row['id_entidad'])
                                    -> get();
            $id_loc    = $loc_query -> result_array();
            //se busca la descripcion de la municipio
            $mun_query = $this -> db -> select('nom_municipio')
                                     -> from('c_municipio')
                                     -> where('id_municipio', $row['id_municipio'])
                                     -> where('id_entidad', $row['id_entidad'])
                                     -> get();
            $id_mun    = $mun_query -> result_array();
            
            $data = array(
                        'id_cct'        => $row['id_cct'],
			'nom_entidad'   => $id_ent[0]['nom_entidad'],
			'nom_cct'       => $row['nom_cct'],
                        'cve_cct'       => $row['cve_cct'],
                        'nom_diretor'   => $row['nom_diretor'],
                        'tel_cct'       => $row['tel_cct'],
                        'dir_cct'       => $row['dir_cct'],
                        'matricula'     => $row['matricula'],
                        'no_docente'    => $row['no_docente'],
                        'nom_municipio' => $id_mun[0]['nom_municipio'],
                        'nom_localidad' => $id_loc[0]['nom_localidad'],
                        'e_mail'        => $row['e_mail'],
                        'num_aulas'     => $row['num_aulas']
            );
            return $data;
        }else{
            return false;
        }
    }
    
    function actualiza_cCCT($id_cct,$id_entidad, $data){// $tel_cct, $matricula, $no_docente, $e_mail, $num_aulas){
        $this->db->trans_start();
        $this->db->where('id_cct', $id_cct);
        $this->db->where('id_entidad', $id_entidad);
        $this->db->update('c_cct', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return false;
        }else{
            return true;
        }
    }
}

?>
