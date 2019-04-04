<?php 
class Seguridad extends CI_Controller{
  
    public function security_check(){
        $this->load->library("session");
        if(!isset($this->session->loguedIn)){
            echo("<script> alert('You shall not passsss!!!'); </script>");
            $this->load->view("formLoginAj");
            return false;
        } else {
            return true;
        }
    }
    public function crearLogin(){
        $this->load->library("session");
        $session_logued = array('loguedIn'=>TRUE);
        $this->session->set_userdata($session_logued);
    }
    public function cerrar_session(){
        $this->load->library("session");
        $this->session->sess_destroy();
        $this->load->view("formLoginAj");
    }
}