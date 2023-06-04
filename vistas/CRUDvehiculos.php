<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro vehículos</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>ADMINISTRADOR - GESTIONAR VEHÍCULO</h1>
    </header>

    <nav>
        <ul class="list">
            <li>
                <a href="CRUDusuarios.php">Gestión usuario</a>
            </li>
            <li>
                <a href="CRUDpuestos.php">Control puestos</a> 
            </li>
            <li>
                <a href="CRUDparqueadero.php">Gestión parqueadero</a> 
            </li>
            <li>
                <a href="CRUDroles.php">Gestión roles</a> 
            </li>
        </ul>
        
    </nav>

    <div class="div-article">
        <form action="../controladores/controladorformulario.php" method="post" class="form">
            <div class="estilosform">
                <label for="nombre">Nombre del vehículo</label>
                <input type="text" name="Nombre" id="nombre" require>

                <label for="modelo">Modelo del vehículo</label>
                <input type="text" name="Modelo" id="modelo" require>
                
                <label for="placa">Placa del vehículo</label>
                <input type="text" name="PlacaVehiculo" id="placa" require>
                
                <label for="color">Color del vehículo</label>
                <input type="text" name="Color" id="color" require>

                <label>Ingrese numero identificacion del usuario</label>
                <input type="text" name="NumeroIdentificacion" id="" require>

                <label>Ingres el tipo de indentificacion del usuario</label>
                <select name="TipoIdentificacion" id="" require>
                    <option value="CC">Cedula</option>
                    <option value="CE">Cedula de extranjeria</option>
                    <option value="TI">Tarjeta de identidad</option>
                </select>
                
                <input type="submit" name="operacion" value="Guardar">
                <input type="submit" name="operacion" value="Eliminar">
                
                <input type="hidden" name="controlador" value="vehiculo">
            </div>
        </form>
    </div>
</body>
</html>