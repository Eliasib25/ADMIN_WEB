<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculo-Usuario</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>ADMINISTRADOR - ASOCIAR VEHÍCULO A USUARIO</h1>
    </header>

    <nav>
        <div>
            <ul class="list">
                <li>
                    <a href="CRUDvehiculos.php">Gestionar vehÍculos</a> 
                </li>
                <li>
                    <a href="CRUDestudiantes.php">Gestionar estudiante</a> 
                </li>
                <li>
                    <a href="CRUDcontrolsalidavehiculos.php">Control salida vehÍculos</a> 
                </li>
            </ul>
        </div>
    </nav>

    <div class="div-article">

        <form action="../controladores/controladorformulario.php" method="post" class="form">
            <div class="estilosform">
                <label>Ingrese numero identificacion del usuario</label>
                <input type="number" name="NumeroIdentificacion" id="">

                <label>Ingres el tipo de indentificacion del usuario</label>
                <select name="TipoIdentificacion" id="">
                    <option value="CC">Cedula</option>
                    <option value="CE">Cedula de extranjeria</option>
                    <option value="TI">Tarjeta de identidad</option>
                </select>

                <label>Ingrese la placa del vehículo de ese usuario</label>
                <input type="number" name="PlacaVehiculo" id="">
                
                <input type="submit" name="operacion" value="Guardar" style="margin-top:5px;"></input>
                
                <input type="text" name="controlador" value ="AsociarVehiculoUsuario" id="" hidden>
            </div>
        </form>
    </div>
</body>
</html>