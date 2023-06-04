<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control roles</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>ADMINISTRADOR - CONTROL DE ROLES</h1>
    </header>

    <nav>
        <div>
            <ul class="list">
                <li>
                    <a href="CRUDvehiculos.php">Gestionar vehÍculos</a> 
                </li>
                <li>
                    <a href="CRUDusuarios.php">Gestion usuarios</a> 
                </li>
                <li>
                    <a href="CRUDparqueadero.php">Gestión parqueadero</a> 
                </li>
                <li>
                    <a href="CRUDpuestos.php">Control puestos</a> 
                </li>
            </ul>
        </div>
    </nav>

    <div class="div-article">

        <form action="../controladores/controladorformulario.php" method="post" class="form">
            <div class="estilosform">
                <label>Ingrese nombre del rol</label>
                <input type="text" name="Nombre" id="" require>
                
                <input type="submit" name="operacion" value="Guardar" style="margin-top:5px;"></input>
                
                <input type="text" name="controlador" value ="roles" id="" hidden>
            </div>
        </form>
    </div>
</body>
</html>