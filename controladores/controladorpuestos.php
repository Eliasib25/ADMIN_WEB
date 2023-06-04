<?php

require_once("../componentes/conectarmysql.php");
require_once("interfazcontrolador.php");

class ControladorPuestos extends ConectarMySQL implements InterfazControlador {
    private $tabla = "puestos";

    public function guardar($objeto){
        $sql = "call GestionarPuesto(0,?,?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("ssi",$objeto->EstadoPuesto,$objeto->Numero,$objeto->parqueadero_id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
    }

    public function eliminar($objeto){
        $sql = "call GestionarPuesto(1,?,?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("ssi",$objeto->EstadoPuesto,$objeto->Numero,$objeto->parqueadero_id);
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