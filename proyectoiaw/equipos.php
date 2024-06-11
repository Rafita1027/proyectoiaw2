<?php
    // Establezco conexión
    require 'conexion.php';
    $equipo = $_GET['id'];
    // Preparo la sentencia SQL
    $sql = "SELECT * FROM jugadores WHERE id_equipo = '$equipo'";
    // Ejecuto la sentencia y guardo el resultado
    $resultado = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Liga EA SPORTS</title>
    <link rel="icon" type="image/png" href="images/laliga_logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #e30613;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #e30613;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            max-width: 50px;
            max-height: 50px;
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
    <div class="container">
        <div class="row">
            <img src="images/laliga_logo.png" alt="La Liga EA Sports" style="max-width: 150px; margin-bottom: 20px;">
            <h1>Jugadores</h1>
        </div>
        <br>
        
        <table id="tabla" class="display">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Valor (M€)</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['valor'] . "</td>";
                        echo "<td><img src='" . $fila['img'] . "' alt='Foto Jugador'></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn-volver">Volver al inicio</a>
    </div>
</body>
</html>
