<?php
    class directoresModel extends CI_Model {
        public function getAll() {
            $r = $this->db->query("SELECT id, nombre FROM director");
            $directores=array();
            foreach($r->result()as $dir){
                $directores[]=$dir;
            }
            return $directores;     
        }
        public function insertDirector($nombre) {
            $this->db->query("Insert into director(nombre)
            Values('$nombre')");
            return $this->db->affected_rows();
            
        }
        public function eliminarDirector($id){
            $this->db->query("DELETE FROM director where id='$id'");
            return $this->db->affected_rows();
        }

        public function modificarDirector($id, $nombre){
                
            $this->db->query("UPDATE director Set nombre ='$nombre' Where id='$id'");
                
            return $this->db->affected_rows();
        }

    }
