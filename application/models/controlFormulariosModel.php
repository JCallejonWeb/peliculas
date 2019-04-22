<?php
class controlformulariosModel extends CI_Model{


    public function ComprobarTitulo($titulo){
        $r = $this->db->query("select nombre from peliculas where nombre='$titulo'");
        return $r->num_rows();
    }
    public function ComprobarDirector($director){
        $r = $this->db->query("select nombre from director where nombre='$director'");
        return $r->num_rows();
    }
    public function ComprobarGenero($genero){
        $r = $this->db->query("select nombre from genero where nombre='$genero'");
        return $r->num_rows();
    }

    public function ComprobarUsuario($usuario){
        $r = $this->db->query("select usuario from usuarios where usuario='$usuario'");
        return $r->num_rows();
    }
}