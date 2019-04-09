<?php
    class BuscadorModel extends CI_Model{
        public function consulta ($valor) {
            $r=$this->db->query("SELECT peliculas.id , peliculas.nombre FROM peliculas, peliculasdirectores, director WHERE peliculas.id = peliculasdirectores.idPelicula AND peliculasdirectores.idDirector = director.id AND director.nombre = '$valor'
                                union
                                SELECT peliculas.id , peliculas.nombre FROM peliculas, peliculasgeneros, genero WHERE peliculas.id = peliculasgeneros.idPelicula AND peliculasgeneros.idGenero = genero.id AND genero.nombre = '$valor'
                                union
                                SELECT id, nombre FROM peliculas where nombre= '$valor'"); 
                        
            $busqueda=array();

            foreach($r->result()as $consulta){

                $busqueda[]=$consulta;

            } 
            return $busqueda;    
        }

        public function busquedaCartel($valor){
            $r=$this->db->query("SELECT peliculas.cartel FROM peliculas WHERE nombre=$valor");
        }

    }