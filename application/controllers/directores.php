<?php
    include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Directores extends Seguridad{
        public function __construct() {
            parent::__construct();
            $this->load->model("directoresModel");
        }

        
        public function homeDirectors(){
            if ($this->security_check()){
                $this->load->model("directoresModel");
                $data["dirList"] = $this->directoresModel->getAll();
                $data["nombreVista"]="dirMenu";
                $this->load->view("plantillaBack",$data);
            }
        }
        public function insertDirector(){
            if ($this->security_check()){
                $nombre = $this->input->get_post("nombre");
                $resultado = $this->directoresModel->insertDirector($nombre);
                if ($resultado == 0) {

                    $data["mensaje"] = "Error al insertar la categoria en la base de datos";
                           
                    } else {
                        redirect('directores/homeDirectors','refresh');
                    }
                
 
            }
        } 

        public function eliminarDirector($id){
            if ($this->security_check()){
                $resultado = $this->directoresModel->eliminarDirector($id);
    
                if ($resultado) {

                    redirect('directores/homeDirector','refresh');

                } else {
                    echo "No se pudo eliminar la pelicula.";
                    redirect('directores/homeDirector','refresh');

                }
    
            }
        }
            public function modificarDirector(){
                if ($this->security_check()){
                    $id = $this->input->post('id');
                    $nombre = $this->input->post('nombre');
                    
                    $this->load->model("directoresModel");
                    $resultado = $this->directoresModel->modificarDirector($id, $nombre, $anyo, $sinopsis);
                    if ($resultado) {
                        redirect('directores/homeDirector','refresh');
                    } else {
                        redirect('directores/homeDirector','refresh');
                    }
                }
            }
    }