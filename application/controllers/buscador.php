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

        public function listaGeneros() {

            $data["totalGeneros"]=$this->buscadorModel->totalGeneros();

            $data["nombreVista"] = "listaGeneros";

            $this->load->view("plantillaFront", $data);

        }

        public function buscadorGenero($id) {
            
            $data["totalGeneros"]=$this->BuscadorModel->consultaGeneros($id);
            $data["listaBusqueda"]=$this->BuscadorModel->peliculasGenero($id);

            $data["nombreVista"] = "vistaBuscador";

          $this->load->view("plantillaFront", $data);
        }


        public function consultaGeneros($valor){
            $data["listaBusqueda"]=$this->buscadorModel->consultaGeneros($valor);
            $data["tituloBusqueda"] = 'Géneros';
            $data["nombreVista"] = "vistaGenero";

            $this->load->view("plantillaFront", $data);
        }

    }
