<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Estudiantes</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <header>
        <h1>ADMINISTRADOR</h1>
    </header>

    <nav>
        <div>
            <ul class="list">
                <li></li>
            </ul>
        </div>
        <a href="iniciodesesion.php" style="justify-content: flex-end; ">Cerrar sesión</a>
    </nav>

    <div class="div-article">
        <form action="../controladores/controladorformulario.php" method="post" class="form">
            <div class="estilosform">
                <label for="">Ingrese el número de indentificacion</label>
            
                <input type="number" name="numeroIdentificacion" id="">
                
                <label for="">Ingres el tipo de indentificacion</label>
                
                <select name="tipoIdentificacion" id="">
                    <option value="CC">Cedula</option>
                    <option value="CE">Cedula de extranjeria</option>
                    <option value="TI">Tarjeta de identidad</option>
                    <option value="PP">Pasaporte</option>
                </select>
                
                <label for="">Ingrese los nombres</label>
                
                <input type="text" name="nombres" id="">
                
                <label for="">Ingrese los apellidos</label>
                
                <input type="text" name="apellidos" id="">
                
                <label for="">Ingrese la placa del vehículo</label>
                
                <input type="text" name="placaVehiculo" id="">
                
                <input type="submit" name="operacion" value="Guardar"></input>

                <input type="submit" name="operacion" value="Eliminar"></input>

                <input type="submit" name="operacion" value="consultarRegistro"></input>
                
                <input type="text" name="controlador" value ="estudiante" id="" hidden>
            </div>
            <div>
                <table>
                    <tr>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Placa vehículo</th>
                    </tr>
                    <?php
                        include '../controladores/controladorestudiante.php';
                        if (isset($_POST['operacion']) && $_POST['operacion'] === 'consultarRegistro') {
                            $placaVehiculo = $_POST['placaVehiculo'];
                            $estudiante = new Estudiante($placaVehiculo);
                            $resultado = $controladorEstudiante->consultarRegistro($estudiante);

                            // Mostrar los resultados en la tabla
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td style='border: 1px solid #000; vertical-align: center; text-align: center;'>".$fila['NumeroIdentificacion']."</td>";
                                echo "<td style='border: 1px solid #000; vertical-align: center; text-align: center;'>".$fila['Nombres']."</td>";
                                echo "<td style='border: 1px solid #000; vertical-align: center; text-align: center;'>".$fila['Apellidos']."</td>";
                                echo "<td style='border: 1px solid #000; vertical-align: center; text-align: center;'>".$fila['PlacaVehiculo']."</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
            </div>
        </form>
    </div>
</body>
</html>