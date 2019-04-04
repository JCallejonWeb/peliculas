<?php
    include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Peliculas extends Seguridad{
        public function __construct() {
            parent::__construct();
            $this->load->model("peliculasModel");
        }
        public function vistaFormInsert(){
            if ($this->security_check()){
                $this->load->view("formInsert");
            }
        }
        
        public function redireccion(){
            $this->load->model("peliculasModel");
            $data["pelList"] = $this->peliculasModel->getAll();
            $data["nombreVista"]="mainMenu";
            $this->load->view("plantillaBack",$data);
        }
        public function insertPelicula(){
            if ($this->security_check()){
                $nombre = $this->input->get_post("nombre");
                $anyo = $this->input->get_post("anyo");
                $sinopsis = $this->input->get_post("sinopsis");
                $resultado_subida = $this->peliculasModel->uploadImg();
                if ($resultado_subida["codigo"] == 1){
                    $img_name=$resultado_subida["mensaje"];
                    var_dump($img_name);
                    $cartel = "./imgs/films/".$img_name;
                    $resultado = $this->peliculasModel->insertPelicula($nombre,$anyo,$sinopsis,$cartel);
                    if ($resultado == 0){
                        $data["mensaje"] = "Error al insertar la película en la base de datos";
                    } else{
                        $data["mensaje"] = "Película insertada con éxito";
                    }
            
                } else {
                    $data["mensaje"] = "Error al subir la imagen de la película";
                }

                redirect('peliculas/redireccion','refresh');
 
            }
        } 

        public function eliminarPelicula($id){
            if ($this->security_check()){
                $this->load->model("peliculasModel");
                $resultado = $this->peliculasModel->eliminarPelicula($id);
    
                if ($resultado) {

                    redirect('peliculas/redireccion','refresh');

                } else {
                    echo "No se pudo eliminar la pelicula.";
                    redirect('peliculas/redireccion','refresh');

                }
    
            }
        }
            public function modificarPelicula(){
                if ($this->security_check()){
                    $id = $this->input->post('id');
                    $nombre = $this->input->post('nombre');
                    $anyo = $this->input->post('anyo');
                    $sinopsis = $this->input->post('sinopsis');
                    $this->load->model("peliculasModel");
                    $resultado = $this->peliculasModel->modificarPelicula($id, $nombre, $anyo, $sinopsis);
                    if ($resultado) {
                        redirect('peliculas/redireccion','refresh');
                    } else {
                        redirect('peliculas/redireccion','refresh');
                    }
                }
            }
    }