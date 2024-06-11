<?php
    //Establezco conexión
    require 'conexion.php';

    //Preparo la sentencia SQL

    $sql = "SELECT nombre FROM equipos";
    $sql2= "SELECT nombre FROM jugadores";

    // Ejecuto la sentencia y guardo el resultado
    $resultado= $mysqli->query($sql);
    $resultado2= $mysqli->query($sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado de Fichajes de LaLiga</title>
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
            margin-bottom: 20px;
        }

        #header img {
            max-width: 100px;
            height: auto;
        }

        #container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #e30613;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #e30613;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background-color: #c20410;
        }

        .error {
            color: red;
            margin-top: 5px;
            text-align: center;
        }

        .success {
            color: green;
            margin-top: 5px;
            text-align: center;
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
        <h1>Mercado de Fichajes de LaLiga</h1>
        <form action="traspasar2.php" method="post">
            <label for="comprador">Equipo que realiza la compra:</label>
            <select name="comprador" id="comprador">
                <?php
                
                if ($resultado->num_rows > 0) {
                    while($row = $resultado->fetch_assoc()) {
                        echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                    }
                } else {
                    echo "0 resultados";
                }
                ?>
            </select>
            <br>
            <label for="jugador">Jugador que desea comprar:</label>
            <select name="jugador" id="jugador">
                <?php
                
                $resultado2->data_seek(0);
                
                if ($resultado2->num_rows > 0) {
                    while($row = $resultado2->fetch_assoc()) {
                        echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                    }
                } else {
                    echo "0 resultados";
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Seleccionar">
        </form>
        <a href="historial.php" class="btn-volver">Ver historial de traspasos</a>
        <a href="añadir.php" class="btn-volver">Añadir nuevo jugador</a>
        <a href="index.php" class="btn-volver">Volver al inicio</a>
    </div>
</body>
</html>
