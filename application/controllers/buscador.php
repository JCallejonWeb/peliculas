<?php
//Controlador de Editoriales
  include_once("Seguridad.php");
    class Buscador extends seguridad {
        public function __construct() {
            parent::__construct();
            $this->load->model("buscadorModel");
        }
        public function buscador() {
            $valor = $this->input->get_post("buscador");
            $data["listaBusqueda"]=$this->buscadorModel->consulta($valor);
            
            $data["nombreVista"] = "vistaBuscador";
            $data["tituloBusqueda"] = $valor;
            $this->load->view("plantillaFront", $data);

        }
       
        
    }
    
