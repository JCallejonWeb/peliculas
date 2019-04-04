<?php
    include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Generos extends Seguridad{
        public function __construct() {
            parent::__construct();
            $this->load->model("generosModel");
        }

        
        public function homeGenders(){
            if ($this->security_check()){
                $data["genList"] = $this->generosModel->getAll();
                $data["nombreVista"]="genMenu";
                $this->load->view("plantillaBack",$data);
            }
        }
        public function insertGenero(){
            if ($this->security_check()){
                $nombre = $this->input->get_post("nombre");
                $resultado = $this->generosModel->insertGenero($nombre);
                if ($resultado == 0) {

                    $data["mensaje"] = "Error al insertar el genero en la base de datos";
                           
                    } else {
                        redirect('generos/homeGenders','refresh');
                    }
                
 
            }
        } 

        public function eliminarGenero($id){
            if ($this->security_check()){
                $resultado = $this->generosModel->eliminarGenero($id);
    
                if ($resultado) {

                    redirect('generos/homeGenders','refresh');

                } else {
                    echo "No se pudo eliminar el genero.";
                    redirect('generos/homeGenders','refresh');

                }
    
            }
        }
            public function modificarGenero(){
                if ($this->security_check()){
                    $id = $this->input->post('id');
                    $nombre = $this->input->post('nombre');
                    
                    $resultado = $this->generosModel->modificarGenero($id, $nombre);
                    if ($resultado) {
                        redirect('generos/homeGenders','refresh');
                    } else {
                        redirect('generos/homeGenders','refresh');
                    }
                }
            }
    }