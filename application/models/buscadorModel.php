<?php
    class BuscadorModel extends CI_Model{
        public function consulta ($valor) {
            $r=$this->db->query("SELECT peliculas.id , peliculas.nombre, peliculas.cartel, peliculas.sinopsis, peliculas.trailer FROM peliculas, peliculasdirectores, director WHERE peliculas.id = peliculasdirectores.idPelicula AND peliculasdirectores.idDirector = director.id AND director.nombre like '%$valor%'
                                union
                                SELECT peliculas.id , peliculas.nombre, peliculas.cartel, peliculas.sinopsis, peliculas.trailer FROM peliculas, peliculasgeneros, genero WHERE peliculas.id = peliculasgeneros.idPelicula AND peliculasgeneros.idGenero = genero.id AND genero.nombre like '%$valor%'
                                union
                                SELECT id, nombre, cartel, sinopsis, trailer FROM peliculas where nombre LIKE  '%$valor%'"); 
                        
            $busqueda=array();

            foreach($r->result()as $consulta){

                $busqueda[]=$consulta;

            } 
            return $busqueda;    
        }

        public function ultimasPeliculas(){
            $r = $this->db->query("SELECT id,nombre, cartel, sinopsis, trailer FROM peliculas ORDER BY id DESC limit 6"); 
            
            $peliculas = array();
            foreach ($r -> result()as $pelicula) {
                $peliculas[]=$pelicula;
          
           }
            
            return $peliculas;
            
        }


        public function totalGeneros() {
           
            $r = $this->db->query("SELECT nombre ,id FROM genero"); 
            
            $genero = array();

           foreach ($r -> result()as $gen) {

            $genero[]=$gen;
          
           }
            
            return $genero;

        }

        public function consultaGeneros($valor){
            
            $r = $this->db->query("SELECT peliculas.id , peliculas.nombre, peliculas.cartel, peliculas.sinopsis, peliculas.trailer FROM peliculas, peliculasgeneros, genero WHERE peliculas.id = peliculasgeneros.idPelicula AND peliculasgeneros.idGenero = genero.id AND genero.id = '$valor'"); 
            
            $generos = array();
            foreach ($r -> result()as $gen) {
            $generos[]=$gen;
          
           }
            return $generos;
        }

    }