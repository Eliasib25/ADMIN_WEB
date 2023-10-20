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

    $puesto = new Puestos($Id,$EstadoPuesto,$Numero, $parqueadero_id);

    $controladorPuestos = new ControladorPuestos();

    $resultado = $controladorPuestos->actualizarEstadoPuesto($puesto);   

    echo '<script type="text/javascript">alert("El estado del puesto fue cambiado con exito! 😁");</script>';
    echo "<script>
            window.location.href = '../vistas/CRUDpuestos.php';
            </script>";
        
}elseif($controlador == "parqueadero"){
    require_once("../modelos/parqueadero.php");
    require_once("controladorparqueadero.php");

    $Id = 0;
    $Nombre = $_POST['Nombre'];
    $Nombre = strtoupper($Nombre);
    $Capacidad_Total = $_POST['Capacidad_Total'];
    $Ubicacion = $_POST['Ubicacion'];
    $Disponibilidad = $_POST['Disponibilidad'];
    $parqueadero = new Parqueaderos($Id, $Nombre, $Capacidad_Total, $Ubicacion, $Disponibilidad);
    
    $controladorParqueadero = new ControladorParqueadero();

    $resultado = $controladorParqueadero->consultarRegistro($parqueadero);

    $fila = $resultado->fetch_assoc();

    if ($operacion == "Guardar"){
        require_once("../controladores/controladorpuestos.php");
        require_once("../modelos/puestos.php");
        
        //Consulta para traer el id del parqueadero.
        function ConsultarIdParqueadero($Nombre){

            $controladorParqueadero = new ControladorParqueadero();

            $resultado = $controladorParqueadero->consultarIdentificadorParqueadero($Nombre);

            $identificadorParqueadero = $resultado->fetch_assoc();

            return $identificadorParqueadero['Id'];
        }
        
        
        if($fila['count(1)'] == 0){

        $controladorPuestos = new ControladorPuestos();

        $resultado = $controladorParqueadero->guardar($parqueadero);

        $identificadorParqueadero = ConsultarIdParqueadero($Nombre);

        for ($NumeroPuesto=1; $NumeroPuesto <=$Capacidad_Total; $NumeroPuesto++) { 
            $puesto = new Puestos($Id=0,$Disponibilidad,$NumeroPuesto,$identificadorParqueadero);
            $controladorPuestos->guardar($puesto);
        }
        echo '<script type="text/javascript">alert("Se guardó el parqeadero y los puestos con exito! 😁");</script>';
        echo "<script>
            window.location.href = '../vistas/CRUDparqueadero.php';
            </script>";
    }
    elseif($fila['count(1)'] == 1){
        $identificadorParqueadero = ConsultarIdParqueadero($Nombre);

        $parqueadero = new Parqueaderos($identificadorParqueadero, $Nombre, $Capacidad_Total, $Ubicacion, $Disponibilidad);

        $resultado = $controladorParqueadero->guardar($parqueadero); 
        echo '<script type="text/javascript">alert("Se actualizó el estado del parqueadero! 😊");</script>'; 
        echo "<script>
            window.location.href = '../vistas/CRUDparqueadero.php';
            </script>";
    }
  }

}elseif($controlador == "roles"){
    require_once("../modelos/rol.php");
    require_once("controladorroles.php");

    $Id = 0;
    $Nombre = $_POST['Nombre'];
    $rol = new Roles($Id, $Nombre);

    $controladorRol = new ControladorRoles();

    $resultado = $controladorRol->guardar($rol);   

    echo "<script>
            // window.location.href = '../vistas/CRUDroles.php';
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

}elseif($controlador == "login"){
    require_once("../modelos/usuarios.php");
    require_once("controladorestudiante.php");

    $NombreUsuario = $_POST['NombreUsuario'];
    $Contraseña = $_POST['Contraseña'];

    $controladorLogin = new controladorestudiante();

    $resultado = $controladorLogin->consultarRegistroCliente($NombreUsuario,$Contraseña);   

    $fila = $resultado->fetch_assoc();

    $nombreRol = $fila['Nombre'];

    if($nombreRol == null){
        echo "Usted no tiene rol no puede acceder";
    }elseif ($nombreRol == "Administrador"){
        echo "<script>
            window.location.href = '../vistas/CRUDreservas.php';
            </script>";
    }else{
        echo "Con su rol no tiene privilegios para acceder";
    }

    
            
}

?>