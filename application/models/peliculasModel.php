<?php
    class peliculasModel extends CI_Model {
        public function getAll() {
            $r = $this->db->query("SELECT id, nombre, anyo, sinopsis, cartel FROM peliculas");
            $peliculas=array();
            foreach($r->result()as $pel){
                $peliculas[]=$pel;
            }
            return $peliculas;     
        }
        public function insertPelicula($nombre, $anyo, $sinopsis, $cartel) {
            $this->db->query("Insert into peliculas(nombre, anyo, sinopsis, cartel)
            Values('$nombre', '$anyo', '$sinopsis', '$cartel')");
            return $this->db->affected_rows();
            
        }
        public function eliminarPelicula($id){
            $this->db->query("DELETE FROM peliculas where id='$id'");
            return $this->db->affected_rows();
        }

        public function modificarPelicula($id, $nombre, $anyo, $sinopsis){
                
            $this->db->query("UPDATE peliculas Set nombre ='$nombre', anyo = '$anyo', sinopsis ='$sinopsis' Where id='$id'");
                
            return $this->db->affected_rows();
        }

        public function uploadImg(){
            $config['upload_path'] = './imgs/films/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1000;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('cartel')){
                $resultado["codigo"] = 0;
                $resultado["mensaje"] = $this->upload->display_errors();
            } else {
                $resultado["codigo"] = 1;
                $resultado["mensaje"] = $this->upload->data("file_name");
            }
                return $resultado;
            }
    }
