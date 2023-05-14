<?php

$controlador = $_POST['controlador'];
$operacion = $_POST['operacion'];

if($controlador == "estudiante"){

    require_once("../modelos/estudiantes.php");
    require_once("../controladores/controladorestudiante.php");

    $numeroIdentificacion = $_POST['numeroIdentificacion'];
    $tipoIdentificacion = $_POST['tipoIdentificacion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $placaVehiculo = $_POST['placaVehiculo'];

    $estudiante = new Estudiante($numeroIdentificacion,$tipoIdentificacion,$nombres,$apellidos,$placaVehiculo);

    $controladorEstudiante = new ControladorEstudiante();

   
    if($operacion =="Guardar"){

        $resultado = $controladorEstudiante->guardar($estudiante);   

        if($resultado == false){
            echo "El estudiante fue guardado";
        }else{
            echo "El estudiante no fue guardado";
        }

    }elseif($operacion == "Eliminar"){
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
    
}elseif($controlador == "usuario"){
    require_once("../modelos/usuarios.php");
    require_once("../controladores/controladorusuario.php");

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $usuarios = new Usuario($usuario,$contraseña);

    $controladorUsuarios = new ControladorUsuarios();

    if($operacion = "iniciarSesion"){
        $resultado = $controladorUsuarios->consultarRegistro($usuarios);
        $tipo = $resultado;

        switch($tipo){
            case "Administrador":
                header("Location: ../vistas/administrador.html");
                break;
            case "Estudiante":
                echo("Usted es un estudiante, por favor ingrese a la aplicacion");
                break;
            default: 
                echo("Usuario o contraseña incorrectos");
        }
    }


}

?>