<?php
    //Establezco conexión
    require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Liga EA Sports</title>
    <link rel="icon" type="image/png" href="images/laliga_logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        #header {
            background-color: #e30613;
            padding: 20px;
            text-align: center;
        }

        #header img {
            max-width: 100px;
            height: auto;
            margin-top: 10px;
        }

        #container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #e30613;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c20410;
        }

        .error {
            color: red;
            margin-top: 5px;
        }

        .success {
            color: green;
            margin-top: 5px;
        }

        .btn-volver {
            background-color: #e30613;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
            text-decoration: none;
            text-align: center;
            width: fit-content;
        }

        .btn-volver:hover {
            background-color: #c20410;
        }
        @media (max-width: 600px) {
            .container {
                margin: 20px auto;
                padding: 10px;
            }

            table, th, td {
                font-size: 14px;
                padding: 5px;
            }

            img {
                max-width: 30px;
                max-height: 30px;
            }

            .btn-volver {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div id="header">
        <img src="images/laliga_logo.png" alt="La Liga EA Sports">
    </div>
    <div id="container">
    <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtiene los equipos seleccionados por el usuario
            $equipoComprador = $_POST["comprador"];
            $jugador = $_POST["jugador"];
    
            // Consulta para obtener el presupuesto del equipo comprador
            $consultaPresupuestoComprador = "SELECT presupuesto FROM equipos WHERE nombre = '$equipoComprador'";
            $resultadoPresupuestoComprador = $mysqli->query($consultaPresupuestoComprador);
    
            if ($resultadoPresupuestoComprador) {
                $filaPresupuestoComprador = $resultadoPresupuestoComprador->fetch_assoc();
                $presupuestoComprador = $filaPresupuestoComprador['presupuesto'];
    
                // Consulta para obtener el valor y el equipo vendedor del jugador
                $consultaInfoJugador = "SELECT valor, id_equipo FROM jugadores WHERE nombre = '$jugador'";
                $resultadoInfoJugador = $mysqli->query($consultaInfoJugador);
    
                if ($resultadoInfoJugador) {
                    $filaInfoJugador = $resultadoInfoJugador->fetch_assoc();
                    $valorJugador = $filaInfoJugador['valor'];
                    $equipoVendedorCod = $filaInfoJugador['id_equipo'];
    
                    // Verificar si el presupuesto es suficiente
                    if ($presupuestoComprador >= $valorJugador) {
                        // Consulta para obtener el nombre del equipo vendedor
                        $consultaEquipoVendedor = "SELECT nombre FROM equipos WHERE id = '$equipoVendedorCod'";
                        $resultadoEquipoVendedor = $mysqli->query($consultaEquipoVendedor);
    
                        if ($resultadoEquipoVendedor) {
                            $filaEquipoVendedor = $resultadoEquipoVendedor->fetch_assoc();
                            $equipoVendedor = $filaEquipoVendedor['nombre'];
    
                            // Actualiza el presupuesto del equipo comprador
                            $presupuestoActualizadoComprador = $presupuestoComprador - $valorJugador;
                            $actualizarPresupuestoComprador = "UPDATE equipos SET presupuesto = $presupuestoActualizadoComprador WHERE nombre = '$equipoComprador'";
                            $resultadoActualizacionComprador = $mysqli->query($actualizarPresupuestoComprador);
    
                            if ($resultadoActualizacionComprador) {
                                echo "<p>El presupuesto del equipo '$equipoComprador' se ha actualizado correctamente.</p>";
    
                                // Actualiza el presupuesto del equipo vendedor
                                $actualizarPresupuestoVendedor = "UPDATE equipos SET presupuesto = presupuesto + $valorJugador WHERE id = '$equipoVendedorCod'";
                                $resultadoActualizacionVendedor = $mysqli->query($actualizarPresupuestoVendedor);
    
                                if ($resultadoActualizacionVendedor) {
                                    echo "<p>El presupuesto del equipo '$equipoVendedor' se ha actualizado correctamente.</p>";
    
                                    // Actualiza el equipo del jugador
                                    $actualizarEquipoJugador = "UPDATE jugadores SET id_equipo = (SELECT id FROM equipos WHERE nombre = '$equipoComprador') WHERE nombre = '$jugador'";
                                    $resultadoActualizacionEquipoJugador = $mysqli->query($actualizarEquipoJugador);
                                    
                                    // Inserta el traspaso en la tabla traspasos
                                    $insertartraspaso = "INSERT INTO traspasos VALUES ('$jugador', '$equipoComprador', '$equipoVendedor', $valorJugador)";
                                    $insertartraspaso = $mysqli->query($insertartraspaso);

    
                                    if ($resultadoActualizacionEquipoJugador) {
                                        echo "<p>El equipo del jugador '$jugador' se ha actualizado correctamente.</p>";
                                    } else {
                                        echo "<p>Error al actualizar el equipo del jugador.</p>";
                                    }
                                } else {
                                    echo "<p>Error al actualizar el presupuesto del equipo vendedor.</p>";
                                }
                            } else {
                                echo "<p>Error al actualizar el presupuesto del equipo comprador.</p>";
                            }
                        } else {
                            echo "<p>Error al obtener el nombre del equipo vendedor.</p>";
                        }
                    } else {
                        echo "<p>El presupuesto del equipo comprador no es suficiente para comprar al jugador.</p>";
                    }
                } else {
                    echo "<p>Error al obtener la información del jugador.</p>";
                }
            } else {
                echo "<p>Error al obtener el presupuesto del equipo comprador.</p>";
            }
        } else {
            echo "<p>No se recibieron datos del formulario.</p>";
        }
    ?>
    <a href="index.php" class="btn-volver">Volver al inicio</a>
    </div>
</body>
</html>
