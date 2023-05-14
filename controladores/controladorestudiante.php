<?php

require_once("../componentes/conectarmysql.php");
require_once("interfazcontrolador.php");

class ControladorEstudiante extends ConectarMySQL 
implements InterfazControlador
{
    private $tabla = "estudiante";

    public function guardar($objeto){
        $sql = "select 1 from ". $this->tabla." where NumeroIdentificacion = ? and TipoIdentificacion = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("is",$objeto->numeroIdentificacion,$objeto->tipoIdentificacion);
        $sentencia->execute();
        $result = $sentencia -> get_result();

        if($result->num_rows == 0){
            $sql = "insert into ".$this->tabla." values (?,?,?,?,?)";
            $sentencia = $this->getConexion()->prepare($sql);
            $sentencia->bind_param("issss",$objeto->numeroIdentificacion,$objeto->tipoIdentificacion,$objeto->nombres,$objeto->apellidos,$objeto->placaVehiculo);
            $sentencia->execute();
            $resultado = $sentencia->get_result();
        }else{
            $sql = "update ".$this->tabla." set Nombres=?, Apellidos=?, PlacaVehiculo=?  where NumeroIdentificacion=? and TipoIdentificacion=?";
            $sentencia = $this->getConexion()->prepare($sql);
            $sentencia->bind_param("sssis",$objeto->nombres,$objeto->apellidos,$objeto->placaVehiculo,$objeto->numeroIdentificacion,$objeto->tipoIdentificacion);
            $sentencia->execute();
            $resultado = $sentencia->get_result();
        }
        return $resultado;
    }

    public function eliminar($objeto){
        $sql = "delete from ".$this->tabla." where NumeroIdentificacion = ? and TipoIdemtificacion = ?";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bindparam("is",$objeto->numeroIdentificacion,$objeto->tipoIdentificacion);
        $sentencia->execute();
    }

    // public function getDatos($sql){
    //     $sentencia = $this->getconexion()->prepare($sql);
    //     $sentencia->execute();
    //     $resultado = $sentencia->get_result();
    //     return $resultado;
    // }

    public function listar(){}
    public function consultarRegistro($objeto){}
}


?>