<?php

require_once("../componentes/conectarmysql.php");
require_once("interfazcontrolador.php");

class ControladorParqueadero extends ConectarMySQL implements InterfazControlador {
    private $tabla = "parqueaderos";

    public function guardar($objeto){
        $sql = "call GestionarParqueaderos(0,?,?,?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("siss",$objeto->Nombre,$objeto->CapacidadTotal,$objeto->Ubicacion,$objeto->Disponibilidad);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
    }

    public function eliminar($objeto){
        $sql = "call GestionarParqueaderos(1,?,?,?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("siss",$objeto->Nombre,$objeto->CapacidadTotal,$objeto->Ubicacion,$objeto->Disponibilidad);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
    }

    public function listar(){
    }

    public function consultarRegistro($objeto){
    }
        
    public function getDatos($sql){
    }
}
?>