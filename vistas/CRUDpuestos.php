<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Puesto</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>ADMINISTRADOR - CONTROL DE PUESTOS</h1>
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
                <a href="CRUDroles.php">Gestión roles</a> 
                </li>
                <li>
                <a href="CRUDreservas.php">Gestión reservas</a> 
                </li>
            </ul>
        </div>
    </nav>

    <div class="div-article">

        <form action="../controladores/controladorformulario.php" method="post" class="form">
            <div class="estilosform">
                <label>Ingrese numero del puesto</label>
                <input type="number" name="Numero" id="" require>

                <label>Ingrese el estado que desea asignar al puesto</label>
                <select name="EstadoPuesto" id="" require>
                    <option value="Disponible">Disponible</option>
                    <option value="NoDisponible">No disponible</option>
                </select>

                <label>Seleccione el parqueadero</label>
                <?php
                require_once("../controladores/controladorparqueadero.php");
                
                $controladorPuestos = new ControladorParqueadero();

                $listado = $controladorPuestos->listar();

                echo '<select name ="parqueaderos_id">';
                while ($fila = $listado->fetch_assoc()){
                    echo '<option value="'.$fila['Id'].'">'.$fila['Nombre'].'</option>';
                }
                echo '</select>';
                ?>
                
                <input type="submit" name="operacion" value="Guardar" style="margin-top:5px;"></input>
                
                <input type="text" name="controlador" value ="puestos" id="" hidden>
            </div>
        </form>
    </div>
</body>
</html>