<?php
    include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Peliculas extends Seguridad{
        public function __construct() {
            parent::__construct();
            $this->load->model("peliculasModel");
            $this->load->model("directoresModel");
            $this->load->model("generosModel");
            $this->load->model("buscadorModel");
        }

        public function index(){
            $data["ultimasPeliculas"]=$this->buscadorModel->ultimasPeliculas();
            $data["nombreVista"]="frontPage";
            $this->load->view("plantillaFront",$data);
        }

        public function homeFilms(){
            if ($this->security_check()){
                
                $data["pelList"] = $this->peliculasModel->getAll();
                $data["dirList"] = $this->directoresModel->getAll();
                $data["genList"] = $this->generosModel->getAll();
                
                $data["listaPeliculasDirectores"] = $this->peliculasModel->getPeliculasDirectores();
                $data["listaPeliculasGeneros"] = $this->peliculasModel->getPeliculasGeneros();

                $data["nombreVista"]="mainMenu";
                $this->load->view("plantillaBack",$data);
            }
        }
        public function insertPelicula(){
            if ($this->security_check()){
               
                $nombre = $this->input->get_post("nombre");
                $anyo = $this->input->get_post("anyo");
                $sinopsis = $this->input->get_post("sinopsis");
                $sinopsis = $this->input->post('sinopsis');
                $idGenero = $this->input->post('idGenero');
                $idDirector = $this->input->post('idDirector');

                $resultado_subida = $this->peliculasModel->uploadImg();
                if ($resultado_subida["codigo"] == 1){
                    $img_name=$resultado_subida["mensaje"];

                    $cartel = "./imgs/films/".$img_name;

                    $resultado = $this->peliculasModel->insertPelicula($nombre,$anyo,$sinopsis,$cartel);
                    $id=$this->peliculasModel->getMax();
                    for ($i = $cont=0; $i < count($idDirector); $i++) {
                        $dir = $idDirector[$i];
                        $r=$this->peliculasModel->insertarPeliculaDirector($id,$dir);
                    }

                    for ($i = $cont=0; $i < count($idGenero); $i++) {
                        $gen = $idGenero[$i];
                        $r=$this->peliculasModel->InsertarPeliculaGenero($id,$gen);
                    }
      
                } else {
                    $data["mensaje"] = "Error al subir la imagen de la película";
                }

                redirect('peliculas/homeFilms','refresh');
 
            }
        } 

        public function eliminarPelicula($id){
            if ($this->security_check()){
                
                $resultado = $this->peliculasModel->eliminarPelicula($id);
    
                if ($resultado) {

                    redirect('peliculas/homeFilms','refresh');

                } else {
                    echo "No se pudo eliminar la pelicula.";
                    redirect('peliculas/homeFilms','refresh');

                }
    
            }
        }
            public function modificarPelicula(){
                if ($this->security_check()){
                    $id = $this->input->post('id');
                    $nombre = $this->input->post('nombre');
                    $anyo = $this->input->post('anyo');
                    $sinopsis = $this->input->post('sinopsis');
                    $idGenero = $this->input->post('idGenero');
                    $idDirector = $this->input->post('idDirector');

                    $resultado = $this->peliculasModel->modificarPelicula($id, $nombre, $anyo, $sinopsis);

                    $r1=$this->peliculasModel->eliminarPeliculaDirector($id);
                    $r2=$this->peliculasModel->eliminarPeliculaGenero($id);
                    //Guarda el array de directores y los inserta en la tabla peliculasdirectores
                    for ($i = $cont=0; $i < count($idDirector); $i++) {
                        $dir = $idDirector[$i];
                        $r=$this->peliculasModel->insertarPeliculaDirector($id,$dir);
                    }
        
                    //Guarda el array de generos y los inserta en la tabla peliculasgeneros
                    for ($i = $cont=0; $i < count($idGenero); $i++) {
                        $gen = $idGenero[$i];
                        $r=$this->peliculasModel->insertarPeliculaGenero($id,$gen);
                    }  

                    if ($resultado) {
                        redirect('peliculas/homeFilms','refresh');
                    } else {
                        redirect('peliculas/homeFilms','refresh');
                    }
                }
            }

            public function filmSpin(){

                    $data["pelList"] = $this->peliculasModel->getAll();

                    $data["nombreVista"]="filmSpin";
                    $this->load->view("plantillaFront",$data);
                
            }


    }