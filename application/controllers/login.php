<?php
    include_once('seguridad.php');
class Login extends Seguridad {
    public function __construct(){
        parent::__construct();
        $this->load->model("peliculasModel");
        $this->load->model("directoresModel");
        $this->load->model("generosModel");
    }
    public function index(){
        $this->load->view("formLoginAj");
    }
    public function checkLogin() {
        $usuario = $this->input->get_post("usuario");
        $contrasenya = $this->input->get_post("contrasenya");
        $this->load->model("loginModel");
        $resultado = $this->loginModel->checkLogin($usuario, $contrasenya);
        if ($resultado) {
            $this->crearLogin();
            //llamamos a la funcion main con la vista mainMenu
            $this->main();
        } else {
            $this->load->view("formLoginAj");
        }
    }
    public function main(){
        if($this->security_check()){

            $data["pelList"] = $this->peliculasModel->getAll();
            $data["dirList"] = $this->directoresModel->getAll();
            $data["genList"] = $this->generosModel->getAll();
            
            $data["listaPeliculasDirectores"] = $this->peliculasModel->getPeliculasDirectores();
            $data["listaPeliculasGeneros"] = $this->peliculasModel->getPeliculasGeneros();

            $data["nombreVista"]="mainMenu";
            $this->load->view("plantillaBack",$data);

        }    
    }
    public function comprobarUsuario() {
        $this->load->view('formLoginAj');
    }

}