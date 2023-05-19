<?php

$controlador = $_POST['controlador'];
$operacion = $_POST['operacion'];

if($controlador == "estudiante"){

    require_once("../modelos/usuarios.php");
    require_once("controladorestudiante.php");
    
    $Identificador = 0;
    $NombreUsuario = $_POST['NombreUsuario'];//aa
    $Contraseña = $_POST['Contraseña'];//aa
    $NumeroIdentificacion = $_POST['NumeroIdentificacion'];
    $TipoIdentificacion = $_POST['TipoIdentificacion'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $FechaNacimiento = $_POST['FechaNacimiento'];//aa
    $TipoSangre = $_POST['TipoSangre'];//aa
    $Foto = $_POST['Foto'];//aa
    $Programa = $_POST['Programa'];

    $estudiante = new Estudiante($Identificador, $NombreUsuario, $Contraseña, $NumeroIdentificacion,$TipoIdentificacion,$Nombres,$Apellidos, $FechaNacimiento, $TipoSangre, $Foto, $Programa);

    $controladorEstudiante = new ControladorEstudiante();

    if($operacion =="Guardar"){

        $resultado = $controladorEstudiante->guardar($estudiante);   

        if($resultado == false){
            echo "El estudiante fue guardado";
        }else{
            echo "El estudiante no fue guardado";
        }

    }elseif($operacion == "Eliminar"){
        $NumeroIdentificacion = $_POST['NumeroIdentificacion'];
        $TipoIdentificacion = $_POST['TipoIdentificacion'];

        $estudiante = new Estudiante($Identificador, $NombreUsuario, $Contraseña, $NumeroIdentificacion,$TipoIdentificacion,$Nombres,$Apellidos, $FechaNacimiento, $TipoSangre, $Foto, $Programa);

        $controladorEstudiante = new ControladorEstudiante();

        $resultado = $controladorEstudiante->eliminar($estudiante);

        if($resultado == false){
            echo "El estudiante fue eliminado";
        }else{
            echo "El estudiante no fue eliminado";
        }
    }
    
}elseif($controlador == "vehiculo"){
    require_once("../modelos/vehiculo.php");
    require_once("controladorvehiculo.php");

    $idVehiculos = 0;
    $Nombre = $_POST['Nombre'];
    $Modelo = $_POST['Modelo'];
    $PlacaVehiculo = $_POST['PlacaVehiculo'];
    $Color = $_POST['Color'];

    $vehiculo = new Vehiculo($idVehiculos, $Nombre, $Modelo, $PlacaVehiculo,$Color);

    $controladorVehiculo = new ControladorVehiculo();

    if($operacion =="Guardar"){

        $resultado = $controladorVehiculo->guardar($vehiculo);   

        if($resultado == false){
            echo "El vehículo fue guardado";
        }else{
            echo "El vehículo no fue guardado";
        }

    }elseif($operacion == "Eliminar"){
        $PlacaVehiculo = $_POST['PlacaVehiculo'];

        $vehiculo = new Vehiculo($idVehiculos, $Nombre, $Modelo, $PlacaVehiculo,$Color);

        $controladorVehiculo = new ControladorVehiculo();

        $resultado = $controladorVehiculo->eliminar($vehiculo);

        if($resultado == false){
            echo "El vehículo fue eliminado";
        }else{
            echo "El vehículo no fue eliminado";
        }
    }

}

?>