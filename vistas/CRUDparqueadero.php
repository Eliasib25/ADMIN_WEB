<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion parqueadero</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>ADMINISTRADOR - GESTIONAR PARQUEADEROS</h1>
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
                <a href="CRUDvehiculos.php">Gestión vehiuclos </a> 
            </li>
            <li>
                <a href="CRUDroles.php">Gestión roles</a> 
            </li>
            <li>
                <a href="CRUDreservas.php">Gestión reservas</a> 
            </li>
        </ul>
        
    </nav>

    <div class="div-article">
        <form action="../controladores/controladorformulario.php" method="post" class="form">
            <div class="estilosform">
                <label for="nombre">Nombre del parqueadero</label>
                <input type="text" name="Nombre" id="nombre" require>

                <label for="modelo">Ingrese la cantidad de puestos del parqueadero</label>
                <input type="text" name="Capacidad_Total" id="modelo" require>
                
                <label for="placa">Ubicación del parqueadero</label>
                <input type="text" name="Ubicacion" id="placa" require>

                <label>Disponibilidad del parqueadero</label>
                <select name="Disponibilidad" id="" require>
                    <option value="Disponible">Disponible</option>
                    <option value="NoDisponible">No disponible</option>
                </select>
                
                <input type="submit" name="operacion" value="Guardar">
                <input type="submit" name="operacion" value="Eliminar">
                
                <input type="hidden" name="controlador" value="parqueadero">
            </div>
        </form>
    </div>
</body>
</html>