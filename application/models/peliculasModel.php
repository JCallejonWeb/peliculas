<?php
    class peliculasModel extends CI_Model {
        public function getAll() {
            $r = $this->db->query("SELECT id, nombre, anyo, sinopsis, trailer, cartel FROM peliculas");
            $peliculas=array();
            foreach($r->result()as $pel){
                $peliculas[]=$pel;
            }
            return $peliculas;     
        }
        public function insertPelicula($nombre, $anyo, $sinopsis, $trailer, $cartel) {
            $this->db->query("Insert into peliculas(nombre, anyo, sinopsis, trailer, cartel)
            Values('$nombre', '$anyo', '$sinopsis', '$trailer', '$cartel')");
            return $this->db->affected_rows();
            
        }
        public function eliminarPelicula($id){
            $this->db->query("DELETE FROM peliculas where id='$id'");
            return $this->db->affected_rows();
        }

        public function modificarPelicula($id, $nombre, $anyo, $sinopsis, $trailer){
                
            $this->db->query("UPDATE peliculas Set nombre ='$nombre', anyo = '$anyo', sinopsis ='$sinopsis', trailer='$trailer' Where id='$id'");
                
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

        public function getPeliculasDirectores() {
            $r = $this->db->query("SELECT * FROM peliculasdirectores");
            $peliculasdirectores=array();
            foreach($r->result()as $pelDir){
                $peliculasdirectores[]=$pelDir;
            }
            return $peliculasdirectores;     
        }

        public function getPeliculasGeneros() {
            $r = $this->db->query("SELECT * FROM peliculasgeneros");
            $peliculasgeneros=array();
            foreach($r->result()as $pelGen){
                $peliculasgeneros[]=$pelGen;
            }
            return $peliculasgeneros;     
        }

        public function eliminarPeliculaDirector($idPelicula){
            $this->db->query("DELETE from peliculasdirectores where idPelicula=$idPelicula");
            return $this->db->affected_rows();
        }

        public function eliminarPeliculaGenero($idPelicula){
            $this->db->query("DELETE from peliculasgeneros where idPelicula=$idPelicula");
            return $this->db->affected_rows();
        }

        public function insertarPeliculaDirector($idPelicula, $idDirector){
            $r = $this->db->query("INSERT INTO peliculasdirectores(idPelicula,idDirector) VALUES ('$idPelicula','$idDirector')");                  
            return $r;
        }

        public function insertarPeliculaGenero($idPelicula, $idGenero){
            $r = $this->db->query("INSERT INTO peliculasgeneros(idPelicula, idGenero) VALUES ('$idPelicula', '$idGenero')");
            return $r;
        }

        public function getMax(){
            $r = $this->db->query("SELECT MAX(id)as id FROM peliculas ");
            $a= $r->result_array();
            return $a[0]['id'];
        }
    }
