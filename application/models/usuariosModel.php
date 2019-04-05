<?php
    class usuariosModel extends CI_Model {
        public function getAll() {
            $r = $this->db->query("SELECT id, usuario, contrasenya FROM usuarios");
            $usuarios=array();
            foreach($r->result()as $user){
                $usuarios[]=$user;
            }
            return $usuarios;     
        }
        public function insertUsuario($usuario, $contrasenya) {
            $this->db->query("Insert into usuarios(usuario, contrasenya)
            Values('$usuario', '$contrasenya')");
            return $this->db->affected_rows();
            
        }
        public function eliminarUsuario($id){
            $this->db->query("DELETE FROM usuarios where id='$id'");
            return $this->db->affected_rows();
        }

        public function modificarUsuario($id, $usuario, $contrasenya){
                
            $this->db->query("UPDATE usuarios Set usuario ='$usuario', contrasenya = '$contrasenya' Where id='$id'");
                
            return $this->db->affected_rows();
        }

    }
