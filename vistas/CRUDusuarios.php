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
        <h1>ADMINISTRADOR - GESTIONAR USUARIO</h1>
    </header>

    <nav>
        <div>
            <ul class="list">
                <li>
                    <a href="CRUDvehiculos.php">Gestionar vehÍculos</a> 
                </li>
                <li>
                    <a href="CRUDparqueadero.php">Gestionar parqueadero</a> 
                </li>
                <li>
                    <a href="CRUDpuestos.php">Control puestos</a> 
                </li>
                <li>
                <a href="CRUDroles.php">Gestión roles</a> 
            </li>
            </ul>
        </div>
    </nav>

    <div class="div-article">

        <form action="../controladores/controladorformulario.php" method="post" class="form" >
            <div class="estilosform">
                <label>Ingrese el nombre de usuario</label>
                <input type="text" name="NombreUsuario" id="" require>

                <label>Ingrese la contraseña del usuario</label>
                <input type="text" name="Contraseña" id="" require>

                <label>Ingrese el número de indentificacion</label>
                <input type="number" name="NumeroIdentificacion" id="" require>
                
                <label>Ingres el tipo de indentificacion</label>
                <select name="TipoIdentificacion" id="" require>
                    <option value="CC">Cedula</option>
                    <option value="CE">Cedula de extranjeria</option>
                    <option value="TI">Tarjeta de identidad</option>
                </select>
                
                <label>Ingrese los nombres</label>
                <input type="text" name="Nombres" id="" require>
                
                <label>Ingrese los apellidos</label>
                <input type="text" name="Apellidos" id="" require>

                <label>Ingrese la fecha de nacimiento</label>
                <input type="date" name="FechaNacimiento" id="" require>

                <label>Ingrese el tipo de sangre</label>
                <select name="TipoSangre" id="" require>
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
                <input type="text" name="Foto" id="" require>

                <label>Ingrese el programa</label>
                <input type="text" name="Programa" id="" require>
                
                <label>Ingrese la placa del vehículo</label>
                <input type="text" name="PlacaVehiculo" id="" require>

                <label>Ingrese el rol del usuario</label>
                <input type="text" name="RolUsuario" id="" require>
                
                <input type="submit" name="operacion" value="Guardar">
                <input type="submit" name="operacion" value="Eliminar"></input>
                
                <input type="text" name="controlador" value ="estudiante" id="" hidden>
            </div>
        </form>
    </div>
</body>
</html>