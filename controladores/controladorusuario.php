<?php

require_once("../componentes/conectarmysql.php");
require_once("interfazcontrolador.php");

class ControladorUsuarios extends ConectarMySQL implements InterfazControlador
{
    private $tabla = "usuarios";

    public function guardar($objeto){}

    public function eliminar($objeto){}

    public function listar(){}

    public function consultarRegistro($objeto){
        $sql = "select Tipo from ".$this->tabla. " where Identificacion = ? and contraseña=?";
        $sentencia = $this->getconexion()->prepare($sql);
        $sentencia->bind_param("is",$objeto->identificacion,$objeto->contraseña);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        // return $resultado;
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $tipo = $fila['Tipo'];
            return $tipo;
        } else {
            return null;
        }
    }
}

?>