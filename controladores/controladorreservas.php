<?php

require_once("../componentes/conectarmysql.php");
require_once("interfazcontrolador.php");

class ControladorReservas extends ConectarMySQL implements InterfazControlador {
    private $tabla = "reservas";

    public function guardar($objeto){
        $sql = "call GestionarReserva(0,?,?,?,?,?,?,?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("isssssii",$objeto->Identificador,$objeto->HoraInicio,$objeto->Fecha,$objeto->EstadoReserva,$objeto->Placa_Vehiculo,$objeto->HoraFin,$objeto->NumeroIdentificacion,$objeto->NumeroPuesto);
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