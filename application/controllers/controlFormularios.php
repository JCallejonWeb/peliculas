<?php
    include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class controlFormularios extends Seguridad {

        public function __construct() {

            parent::__construct();
            $this->load->model("controlFormulariosModel");

        }

        public function ComprobarTitulo(){
           
            $titulo = $this->input->post("nombre");
            $resultado = $this->controlFormulariosModel->ComprobarTitulo($titulo);
            echo $resultado;
            
        }

        public function ComprobarDirector(){
           
            $nombre = $this->input->post("nombre");
            $resultado = $this->controlFormulariosModel->ComprobarDirector($nombre);
            echo $resultado;
            
        }

        public function ComprobarGenero(){
           
            $nombre = $this->input->post("nombre");
            $resultado = $this->controlFormulariosModel->ComprobarGenero($nombre);
            echo $resultado;
            
        }

        public function ComprobarUsuario(){
           
            $usuario = $this->input->post("usuario");
            $resultado = $this->controlFormulariosModel->ComprobarUsuario($usuario);
            echo $resultado;
            
        }

        
        
    }
    