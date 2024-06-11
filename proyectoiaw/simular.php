<?php
    //Establezco conexión
    require 'conexion.php';
    //Preparo la sentencia SQL
    $sql = "SELECT nombre FROM equipos";

    // Ejecuto la sentencia y guardo el resultado
    $resultado= $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Liga EA SPORTS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #e30613;
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


        form {
            text-align: center;
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
        <h1>Simulador de Partidos de La Liga</h1>
        <form action="simular2.php" method="post">
            <label for="local">Equipo Local:</label>
            <select name="local" id="local">
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
            <label for="visitante">Equipo Visitante:</label>
            <select name="visitante" id="visitante">
                <?php
                $resultado->data_seek(0);
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
            <input type="submit" value="Simular">
        </form>
        <a href="index.php" class="btn-volver">Volver al inicio</a>
    </div>
</body>
</html>
