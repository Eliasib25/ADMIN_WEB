<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control salida vehiculo</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>ADMINISTRADOR - CONTROL DE SALIDA DE VEHÍCULOS</h1>
    </header>

    <nav>
        <div>
            <ul class="list">
                <li>
                    <a href="CRUDvehiculos.php">Gestionar vehÍculos</a> 
                </li>
                <li>
                    <a href="CRUDestudiantes.php">Control salida vehÍculos</a> 
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
                <label>Ingrese numero del puesto</label>
                <input type="number" name="Numero" id="">

                <label>Ingrese el estado que desea asignar al puesto</label>
                <select name="EstadoPuesto" id="">
                    <option value="Ocupado">Ocupado</option>
                    <option value="Desocupado">Desocupado</option>
                </select>

                <label>Ingrese el numero del parqueadero al que pertenece</label>
                <input type="number" name="parqueaderos_id" id="">
                
                <input type="submit" name="operacion" value="Guardar" style="margin-top:5px;"></input>
                
                <input type="text" name="controlador" value ="" id="" hidden>
            </div>
        </form>
    </div>
</body>
</html>