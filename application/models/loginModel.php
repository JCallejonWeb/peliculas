<?php
class LoginModel extends CI_Model {
    public function checkLogin($usuario, $contrasenya) {
        $query = $this->db->query("SELECT id FROM usuarios WHERE usuario='$usuario' and contrasenya='$contrasenya'");
        return $query->num_rows();
    }
  
}