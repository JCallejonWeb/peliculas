<?php
    class BuscadorModel extends CI_Model{
        public function consulta ($valor) {
            $r=$this->db->query("SELECT peliculas.id , peliculas.nombre, peliculas.cartel, peliculas.sinopsis FROM peliculas, peliculasdirectores, director WHERE peliculas.id = peliculasdirectores.idPelicula AND peliculasdirectores.idDirector = director.id AND director.nombre like '%$valor%'
                                union
                                SELECT peliculas.id , peliculas.nombre, peliculas.cartel, peliculas.sinopsis FROM peliculas, peliculasgeneros, genero WHERE peliculas.id = peliculasgeneros.idPelicula AND peliculasgeneros.idGenero = genero.id AND genero.nombre like '%$valor%'
                                union
                                SELECT id, nombre, cartel, sinopsis FROM peliculas where nombre LIKE  '%$valor%'"); 
                        
            $busqueda=array();

            foreach($r->result()as $consulta){

                $busqueda[]=$consulta;

            } 
            return $busqueda;    
        }

        public function ultimasPeliculas(){
            $r = $this->db->query("SELECT id,nombre, cartel, sinopsis FROM peliculas ORDER BY id DESC limit 6"); 
            
            $peliculas = array();
            foreach ($r -> result()as $pelicula) {
                $peliculas[]=$pelicula;
          
           }
            
            return $peliculas;
            
        }

    }