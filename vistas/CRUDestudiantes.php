<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro estudiantes</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>ADMINISTRADOR - AGREGAR USUARIO</h1>
    </header>

    <nav>
        <div>
            <ul class="list">
                <li>
                    <a href="CRUDvehiculos.php">Gestionar vehÍculos</a> 
                </li>
                <li>
                    <a href="CRUDcontrolsalidavehiculos.php">Control salida vehÍculos</a> 
                </li>
                <li>
                    <a href="Asociarvehiculousuario.php">Asociar vehiculo-usuario</a> 
                </li>
            </ul>
        </div>
    </nav>

    <div class="div-article">

        <form action="../controladores/controladorformulario.php" method="post" class="form">
            <div class="estilosform">
                <label>Ingrese el nombre de usuario</label>
                <input type="text" name="NombreUsuario" id="">

                <label>Ingrese la contraseña del usuario</label>
                <input type="text" name="Contraseña" id="">

                <label>Ingrese el número de indentificacion</label>
                <input type="number" name="NumeroIdentificacion" id="">
                
                <label>Ingres el tipo de indentificacion</label>
                <select name="TipoIdentificacion" id="">
                    <option value="CC">Cedula</option>
                    <option value="CE">Cedula de extranjeria</option>
                    <option value="TI">Tarjeta de identidad</option>
                </select>
                
                <label>Ingrese los nombres</label>
                <input type="text" name="Nombres" id="">
                
                <label>Ingrese los apellidos</label>
                <input type="text" name="Apellidos" id="">

                <label>Ingrese la fecha de nacimiento</label>
                <input type="date" name="FechaNacimiento" id="">

                <label>Ingrese el tipo de sangre</label>
                <select name="TipoSangre" id="">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="o+">o+</option>
                    <option value="o-">o-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                </select>

                <label>Ingrese la foto</label>
                <input type="text" name="Foto" id="">

                <label>Ingrese el programa</label>
                <input type="text" name="Programa" id="">
                
                <label>Ingrese la placa del vehículo</label>
                <input type="text" name="PlacaVehiculo" id="">
                
                <input type="submit" name="operacion" value="Guardar"></input>
                <input type="submit" name="operacion" value="Eliminar"></input>
                
                <input type="text" name="controlador" value ="estudiante" id="" hidden>
            </div>
        </form>
    </div>
</body>
</html>