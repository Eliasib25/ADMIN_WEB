<?php

require_once("../componentes/conectarmysql.php");
require_once("interfazcontrolador.php");

class ControladorParqueadero extends ConectarMySQL implements InterfazControlador {
    private $tabla = "parqueaderos";

    public function guardar($objeto){
        $sql = "call GestionParqueadero(0,?,?,?,?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("isiss",$objeto->Id,$objeto->Nombre,$objeto->CapacidadTotal,$objeto->Ubicacion,$objeto->Disponibilidad);
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
        $sql = "select Id, Nombre from ".$this->tabla;
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        return $result;
    }

    public function consultarRegistro($objeto){
        $sql = "select count(1) from ".$this->tabla. " where Nombre = ?";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("s",$objeto->Nombre);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        return $result;
    }

    public function consultarIdentificadorParqueadero($Nombre){
        $sql = "select Id from ".$this->tabla. " where Nombre = ?";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("s",$Nombre);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        return $result;
    }
        
    public function getDatos($sql){
    }
}
?>