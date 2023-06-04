<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro reservas</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>ADMINISTRADOR - GESTIONAR RESERVAS</h1>
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
                <li>
                <a href="CRUDusuarios.php">Gestión Usuarios</a> 
                </li>
            </ul>
        </div>
    </nav>

    <div class="div-article">

        <form action="../controladores/controladorformulario.php" method="post" class="form" >
            <div class="estilosform">
                <label>Ingrese la hora de inicio de la reserva</label>
                <input type="time" id="hora" name="HoraInicio" required>

                <label>Ingrese la hora de finalización de la reserva</label>
                <input type="time" id="hora" name="HoraFin" required>

                <label>Ingrese la fecha de la reserva</label>
                <input type="date" name="Fecha" id="">

                <label>Estado de la reserva</label>
                <select name="EstadoReserva" id="" required>
                    <option value="Activa">Activa</option>
                    <option value="Cancelada">Cancelada</option>
                    <option value="Completada">Completada</option>
                </select>

                <label>Ingrese la placa del vehículo</label>
                <input type="text" name="Placa_Vehiculo" id="">
                
                <label>Ingrese el numero de indentificacion del usuario</label>
                <input type="text" name="NumeroIdentificacion" id="" required>
                
                <label>Ingrese el puesto a asignar en la reserva</label>
                <input type="text" name="NumeroPuesto" id="">
                
                <input type="submit" name="operacion" value="Guardar">
                
                <input type="text" name="controlador" value ="reservas" id="" hidden>
            </div>
        </form>
    </div>
</body>
</html>