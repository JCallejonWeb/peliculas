<?php
    include_once('seguridad.php');
class Login extends Seguridad {
    public function __construct(){
        parent::__construct();
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
            $this->load->model("peliculasModel");
            $data["pelList"] = $this->peliculasModel->getAll();
            $data["nombreVista"]="mainMenu";
            $this->load->view("plantillaBack",$data);
        }    
    }
    public function comprobarUsuario() {
        $this->load->view('formLoginAj');
    }

}