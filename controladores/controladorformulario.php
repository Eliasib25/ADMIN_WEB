<?php

$controlador = $_POST['controlador'];
$operacion = $_POST['operacion'];


require_once("../modelos/estudiantes.php");
require_once("../controladores/controladorestudiante.php");

if($controlador == "estudiante" && $operacion == "Guardar"){

    $numeroIdentificacion = $_POST['numeroIdentificacion'];
    $tipoIdentificacion = $_POST['tipoIdentificacion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $placaVehiculo = $_POST['placaVehiculo'];

    $estudiante = new Estudiante($numeroIdentificacion,$tipoIdentificacion,$nombres,$apellidos,$placaVehiculo);

    $controladorEstudiante = new ControladorEstudiante();

    $resultado = $controladorEstudiante->guardar($estudiante);   
    
    if($resultado == false){
        echo "El estudiante fue guardado";
    }else{
        echo "El estudiante no fue guardado";
    }

}elseif ($controlador == "estudiante" && $operacion == "Eliminar") {

    $numeroIdentificacion = $_POST['numeroIdentificacion'];
    $tipoIdentificacion = $_POST['tipoIdentificacion'];

    $estudiante = new Estudiante($numeroIdentificacion,$tipoIdentificacion);

    $controladorEstudiante = new ControladorEstudiante();

    $resultado = $controladorEstudiante->eliminar($estudiante);

    if($resultado == false){
        echo "El estudiante fue eliminado";
    }else{
        echo "El estudiante no fue eliminado";
    }
}

?>