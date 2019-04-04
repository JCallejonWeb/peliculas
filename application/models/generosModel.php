<?php
    class GenerosModel extends CI_Model {
        public function getAll() {
            $r = $this->db->query("SELECT id, nombre FROM genero");
            $generos=array();
            foreach($r->result()as $gen){
                $generos[]=$gen;
            }
            return $generos;     
        }
        public function insertGenero($nombre) {
            $this->db->query("Insert into genero(nombre)
            Values('$nombre')");
            return $this->db->affected_rows();
            
        }
        public function eliminarGenero($id){
            $this->db->query("DELETE FROM genero where id='$id'");
            return $this->db->affected_rows();
        }

        public function modificarGenero($id, $nombre){
                
            $this->db->query("UPDATE genero Set nombre ='$nombre' Where id='$id'");
                
            return $this->db->affected_rows();
        }

    }
