<?php
    include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Usuarios extends Seguridad{
        public function __construct() {
            parent::__construct();
            $this->load->model("usuariosModel");
        }

        
        public function homeUsers(){
            if ($this->security_check()){
                $data["userList"] = $this->usuariosModel->getAll();
                $data["nombreVista"]="userMenu";
                $this->load->view("plantillaBack",$data);
            }
        }
        public function insertUsuario(){
            if ($this->security_check()){
                $usuario = $this->input->get_post("usuario");
                $contrasenya = $this->input->get_post("contrasenya");
                $resultado = $this->usuariosModel->insertUsuario($usuario, $contrasenya);
                if ($resultado == 0) {

                    $data["mensaje"] = "Error al insertar el usuario en la base de datos";
                           
                    } else {
                        redirect('usuarios/homeUsers','refresh');
                    }
                
 
            }
        } 

        public function eliminarUsuario($id){
            if ($this->security_check()){
                $resultado = $this->usuariosModel->eliminarUsuario($id);
    
                if ($resultado) {

                    redirect('usuarios/homeUsers','refresh');

                } else {
                    echo "No se pudo eliminar la pelicula.";
                    redirect('usuarios/homeUsers','refresh');

                }
    
            }
        }
            public function modificarUsuario(){
                if ($this->security_check()){
                    $id = $this->input->post('id');
                    $usuario = $this->input->post('usuario');
                    $contrasenya = $this->input->post('contrasenya');
                    
                    $resultado = $this->usuariosModel->modificarUsuario($id, $usuario, $contrasenya);
                    if ($resultado) {
                        redirect('usuarios/homeUsers','refresh');
                    } else {
                        redirect('usuarios/homeUsers','refresh');
                    }
                }
            }
    }