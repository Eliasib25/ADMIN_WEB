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
        <h1>ADMINISTRADOR - AGREGAR VEHÍCULO</h1>
    </header>

    <nav>
        <ul class="list">
            <li><a href="CRUDestudiantes.php">Gestión usuario</a></li>
        </ul>
    </nav>

    <div class="div-article">
        <form action="../controladores/controladorformulario.php" method="post" class="form">
            <div class="estilosform">
                <label for="nombre">Nombre del vehículo</label>
                <input type="text" name="Nombre" id="nombre">

                <label for="modelo">Modelo del vehículo</label>
                <input type="text" name="Modelo" id="modelo">
                
                <label for="placa">Placa del vehículo</label>
                <input type="text" name="PlacaVehiculo" id="placa">
                
                <label for="color">Color del vehículo</label>
                <input type="text" name="Color" id="color">
                
                <input type="submit" name="operacion" value="Guardar">
                <input type="submit" name="operacion" value="Eliminar">
                
                <input type="hidden" name="controlador" value="vehiculo">
            </div>
        </form>
    </div>
</body>
</html>