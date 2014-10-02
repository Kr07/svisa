<?php


/**
 * Description of User
 *
 * @author Kroz
 */
class User extends CI_Model{
    
    function login($username, $password){
        $this -> db -> select('id_usuario,username,password,status,id_rol,id_institucion,id_entidad');
        $this -> db -> from('usuario');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', substr(MD5($password),0,20));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1){
          return $query->result();
        }
        else{
          return false;
        }
 }

}

?>
