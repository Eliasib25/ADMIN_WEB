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
    $RolUsuario = $_POST['RolUsuario'];

    $estudiante = new Estudiante($Identificador, $NombreUsuario, $Contraseña, $NumeroIdentificacion,$TipoIdentificacion,$Nombres,$Apellidos, $FechaNacimiento, $TipoSangre, $Foto, $Programa, $RolUsuario);

    $controladorEstudiante = new ControladorEstudiante();

    if($operacion =="Guardar"){

        $resultado = $controladorEstudiante->guardar($estudiante);   

        if ($resultado == false) {
            echo '<script>alert("El estudiante fue guardado");</script>';
            echo "<script>
            window.location.href = '../vistas/CRUDusuarios.php';
            </script>";
        } else {
            echo '<script>alert("El estudiante no fue guardado");</script>';
            echo "<script>
            window.location.href = '../vistas/CRUDusuarios.php';
            </script>";
        }

    }elseif($operacion == "Eliminar"){
        $NumeroIdentificacion = $_POST['NumeroIdentificacion'];
        $TipoIdentificacion = $_POST['TipoIdentificacion'];

        $estudiante = new Estudiante($Identificador, $NombreUsuario, $Contraseña, $NumeroIdentificacion,$TipoIdentificacion,$Nombres,$Apellidos, $FechaNacimiento, $TipoSangre, $Foto, $Programa);

        $controladorEstudiante = new ControladorEstudiante();

        $resultado = $controladorEstudiante->eliminar($estudiante);

        if ($resultado == false) {
            echo '<script>alert("El estudiante fue eliminado");</script>';
            echo "<script>
            window.location.href = '../vistas/CRUDusuarios.php';
            </script>";
        } else {
            echo '<script>alert("El estudiante no fue eliminado");</script>';
            echo "<script>
            window.location.href = '../vistas/CRUDusuarios.php';
            </script>";
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
    $NumeroIdentificacion = $_POST['NumeroIdentificacion'];
    $TipoIdentificacion = $_POST['TipoIdentificacion'];

    $vehiculo = new Vehiculo($idVehiculos, $Nombre, $Modelo, $PlacaVehiculo,$Color, $NumeroIdentificacion, $TipoIdentificacion);

    $controladorVehiculo = new ControladorVehiculo();

    if($operacion =="Guardar"){

        $resultado = $controladorVehiculo->guardar($vehiculo);   

        if($resultado == false){
            echo "El vehículo fue guardado";
            echo "<script>
            window.location.href = '../vistas/CRUDvehiculos.php';
            </script>";
        }else{
            echo "El vehículo no fue guardado";
            echo "<script>
            window.location.href = '../vistas/CRUDvehiculos.php';
            </script>";
        }

    }elseif($operacion == "Eliminar"){
        $PlacaVehiculo = $_POST['PlacaVehiculo'];

        $vehiculo = new Vehiculo($idVehiculos, $Nombre, $Modelo, $PlacaVehiculo,$Color);

        $controladorVehiculo = new ControladorVehiculo();

        $resultado = $controladorVehiculo->eliminar($vehiculo);

        if($resultado == false){
            echo "El vehículo fue eliminado";
            echo "<script>
            window.location.href = '../vistas/CRUDvehiculos.php';
            </script>";
            
        }else{
            echo "El vehículo no fue eliminado";
            echo "<script>
            window.location.href = '../vistas/CRUDvehiculos.php';
            </script>";
        }
    }

}elseif($controlador == "puestos"){
    require_once("../modelos/puestos.php");
    require_once("controladorpuestos.php");

    $Id = 0;
    $EstadoPuesto = $_POST['EstadoPuesto'];
    $Numero = $_POST['Numero'];
    $parqueadero_id = $_POST['parqueaderos_id'];

    $puesto = new Puestos($Id, $Numero, $EstadoPuesto, $parqueadero_id);

    $controladorPuestos = new ControladorPuestos();

    $resultado = $controladorPuestos->guardar($puesto);   

    echo "El estado del puesto se ha cambiado";
    echo "<script>
            window.location.href = '../vistas/CRUDpuestos.php';
            </script>";
        
}elseif($controlador == "parqueadero"){
    require_once("../modelos/parqueadero.php");
    require_once("controladorparqueadero.php");

    $Id = 0;
    $Nombre = $_POST['Nombre'];
    $Capacidad_Total = $_POST['Capacidad_Total'];
    $Ubicacion = $_POST['Ubicacion'];
    $Disponibilidad = $_POST['Disponibilidad'];
    $parqueadero = new Parqueaderos($Id, $Nombre, $Capacidad_Total, $Ubicacion, $Disponibilidad);

    $controladorParqueadero = new ControladorParqueadero();

    $resultado = $controladorParqueadero->guardar($parqueadero);   

    echo "<script>
            window.location.href = '../vistas/CRUDparqueadero.php';
            </script>";
}elseif($controlador == "roles"){
    require_once("../modelos/rol.php");
    require_once("controladorroles.php");

    $Id = 0;
    $Nombre = $_POST['Nombre'];
    $rol = new Roles($Id, $Nombre);

    $controladorRol = new ControladorRoles();

    $resultado = $controladorRol->guardar($rol);   

    echo "<script>
            window.location.href = '../vistas/CRUDroles.php';
            </script>";
}elseif($controlador == "reservas"){
    require_once("../modelos/reservas.php");
    require_once("controladorreservas.php");

    $Id = 0;
    $HoraInicio = $_POST['HoraInicio'];
    $HoraFin = $_POST['HoraFin'];
    $Fecha = $_POST['Fecha'];
    $EstadoReserva = $_POST['EstadoReserva'];
    $Placa_Vehiculo = $_POST['Placa_Vehiculo'];
    $NumeroIdentificacion = $_POST['NumeroIdentificacion'];
    $NumeroPuesto = $_POST['NumeroPuesto'];
    $reserva = new Reserva($Id, $HoraInicio, $Fecha, $EstadoReserva, $Placa_Vehiculo, $HoraFin, $NumeroIdentificacion, $NumeroPuesto);

    $controladorReserva = new ControladorReservas();

    $resultado = $controladorReserva->guardar($reserva);   

    echo "<script>
            window.location.href = '../vistas/CRUDreservas.php';
            </script>";
}

?>