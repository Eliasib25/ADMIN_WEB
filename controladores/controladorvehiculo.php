<?php

require_once("../componentes/conectarmysql.php");
require_once("interfazcontrolador.php");

class ControladorVehiculo extends ConectarMySQL implements InterfazControlador {
    private $tabla = "vehiculos";

    public function guardar($objeto){
        $sql = "call GestionarVehiculo(0,?,?,?,?,?,?,?)";    
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("issssss",$objeto->idVehiculos,$objeto->Nombre,$objeto->Modelo,$objeto->PlacaVehiculo,$objeto->Color,$objeto->NumeroIdentificacion,$objeto->TipoIdentificacion);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
    }

    public function eliminar($objeto){
        $sql = "call AsociarVehiculoUsuario(1,?,?,?,?,?,?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("issssss",$objeto->idVehiculos,$objeto->Nombre,$objeto->Modelo,$objeto->PlacaVehiculo,$objeto->Color,$objeto->NumeroIdentificacion,$objeto->TipoIdentificacion);
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