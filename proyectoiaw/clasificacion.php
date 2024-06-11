<?php
    //Establezco conexión
    require 'conexion.php';

    //Preparo la sentencia SQL

    $sql= "Select * from equipos order by puntos desc";

    // Ejecuto la sentencia y guardo el resultado
    $resultado= $mysqli->query($sql);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Liga EA SPORTS</title>
    <link rel="icon" type="image/png" href="images/laliga_logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; 
            color: #333; 
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        h1 {
            color: #ff0000; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc; 
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ff0000; 
            color: #fff; 
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2; 
        }
        tbody tr:hover {
            background-color: #ddd; 
        }
        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 100px; 
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
                width: 90%;
                margin: 10px auto;
            }
            h1 {
                font-size: 1.5em;
            }
            table, th, td {
                font-size: 12px;
                padding: 5px;
            }
            .logo {
                width: 0px;
            }
            .btn-volver {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <img class="logo" src="images/laliga_logo.png" alt="Logo de La Liga">
    <div class="container">
        <div class="row">
            <h1>Clasificación</h1>
        </div>
        <table id="tabla" class="display">
            <thead>
                <tr>
                    <th>Equipo</th>
                    <th>Puntos</th>
                    <th>PJ</th>
                    <th>GF</th>
                    <th>GC</th>
                    <th>DIF</th>
                    <th>ESTADIO</th>
                    <th>PRESUPUESTO (M€)</th>
                </tr>
            </thead>
            <tbody>
				<?php
					while($fila = $resultado->fetch_assoc()){
						echo "<tr>";
						echo "<td><a href='equipos.php?id=$fila[id]'>", $fila['nombre'],"</a></td>";
						echo "<td>", $fila['puntos'],"</td>";
						echo "<td>", $fila['p_jugados'],"</td>";
						echo "<td>", $fila['g_favor'],"</td>";
						echo "<td>", $fila['g_contra'],"</td>";
						echo "<td>", $fila['diferencia'],"</td>";
						echo "<td>", $fila['estadio'],"</td>";
						echo "<td>", $fila['presupuesto'],"</td>";
						echo "</tr>";
					}
				?>
            </tbody>
        </table>
        <a href="index.php" class="btn-volver">Volver al inicio</a>
    </div>
</body>
</html>					