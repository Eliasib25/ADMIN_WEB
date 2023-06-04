<?php

require_once("../componentes/conectarmysql.php");
require_once("interfazcontrolador.php");

class ControladorRoles extends ConectarMySQL implements InterfazControlador {
    private $tabla = "roles";

    public function guardar($objeto){
        $sql = "insert into ".$this->tabla." values(0, ?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("s",$objeto->Nombre);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
    }

    public function eliminar($objeto){
    }

    public function listar(){
    }

    public function consultarRegistro($objeto){
    }
        
    public function getDatos($sql){
    }
}
?>