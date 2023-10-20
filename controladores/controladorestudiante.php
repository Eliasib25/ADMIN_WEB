<?php

require_once("../componentes/conectarmysql.php");
require_once("interfazcontrolador.php");

class ControladorEstudiante extends ConectarMySQL implements InterfazControlador {
    private $tabla = "usuarios";

    public function guardar($objeto){
        $sql = "call CrearUsuario(0,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("sssssssssbss",$objeto->Identificador,$objeto->NombreUsuario,$objeto->Contraseña,$objeto->NumeroIdentificacion,$objeto->TipoIdentificacion,$objeto->Nombres,$objeto->Apellidos,$objeto->FechaNacimiento,$objeto->TipoSangre,$objeto->Foto,$objeto->Programa,$objeto->NombreRol);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
    }

    public function eliminar($objeto){
        $sql = "call CrearUsuario(1,?,?,?,?,?,?,?,?,?,?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("sssssssssbss",$objeto->Identificador,$objeto->NombreUsuario,$objeto->Contraseña,$objeto->NumeroIdentificacion,$objeto->TipoIdentificacion,$objeto->Nombres,$objeto->Apellidos,$objeto->FechaNacimiento,$objeto->TipoSangre,$objeto->Foto,$objeto->Programa,$objeto->NombreRol);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
    }

    public function listar(){
    }

    public function consultarRegistro($objeto){
    }
        
    public function getDatos($sql){
    }

    public function consultarRegistroCliente($NombreUsuario,$password){

        $sql = "call Login(?,?)";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("ss",$NombreUsuario,$password);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        return $result;
    }
}
?>