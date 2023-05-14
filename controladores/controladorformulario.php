<?php

$controlador = $_POST['controlador'];
$operacion = $_POST['operacion'];

if($controlador == "estudiante" && $operacion == "Guardar"){
    require_once("../modelos/estudiantes.php");
    require_once("../controladores/controladorestudiante.php");

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

}

?>