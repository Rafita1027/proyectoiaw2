<?php
    //Establezco conexión
    require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Partido</title>
    <link rel="icon" type="image/png" href="images/laliga_logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
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

        .title {
            font-size: 24px;
            font-weight: bold;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin: 20px auto;
            max-width: 600px;
        }
        h2 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
        .resultado {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
        }
        .volver {
            background-color: #ff0000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
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
    <div class="container">
    <?php
    
    // Verifica si se enviaron datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $equipoLocal = $_POST["local"];
        $equipoVisitante = $_POST["visitante"];

        $golesLocal = rand(0, 5);
        $golesVisitante = rand(0, 3); 

        $resultado = "";
        if ($golesLocal > $golesVisitante) {
            $resultado = "Ganador: {$equipoLocal}";
            $puntosLocal = 3;
            $puntosVisitante = 0;
        } elseif ($golesLocal < $golesVisitante) {
            $resultado = "Ganador: {$equipoVisitante}";
            $puntosLocal = 0;
            $puntosVisitante = 3;
        } else {
            $resultado = "Empate";
            $puntosLocal = 1;
            $puntosVisitante = 1;
        }

       $sqlLocal = "UPDATE equipos SET puntos = puntos + $puntosLocal, p_jugados = p_jugados + 1, g_favor = g_favor + $golesLocal, g_contra = g_contra + $golesVisitante WHERE nombre = '$equipoLocal'";
       $sqlVisitante = "UPDATE equipos SET puntos = puntos + $puntosVisitante, p_jugados = p_jugados + 1, g_favor = g_favor + $golesVisitante, g_contra = g_contra + $golesLocal WHERE nombre = '$equipoVisitante'";

        if ($mysqli->query($sqlLocal) === TRUE && $mysqli->query($sqlVisitante) === TRUE) {
        } else {
            echo "Error al actualizar datos" . $mysqli->error;
        }

        $sqlEscudosLocal = "SELECT img FROM equipos WHERE nombre = '$equipoLocal'";
        $sqlEscudosVisitante = "SELECT img FROM equipos WHERE nombre = '$equipoVisitante'";
        $resultEscudosLocal = $mysqli->query($sqlEscudosLocal);
        $resultEscudosVisitante = $mysqli->query($sqlEscudosVisitante);

        echo "<h2>Resultado del Partido</h2>";
        if ($resultEscudosLocal->num_rows > 0 && $resultEscudosVisitante->num_rows > 0) {
            $rowEscudoLocal = $resultEscudosLocal->fetch_assoc();
            $rowEscudoVisitante = $resultEscudosVisitante->fetch_assoc();
            echo "<img src='{$rowEscudoLocal['img']}' alt='{$equipoLocal}' style='width: 50px; height: 50px;'>";
            echo "<p>{$equipoLocal} {$golesLocal} - {$golesVisitante} {$equipoVisitante}</p>";
            echo "<img src='{$rowEscudoVisitante['img']}' alt='{$equipoVisitante}' style='width: 50px; height: 50px;'>";
        } else {
            echo "No se encontraron imágenes de los escudos de los equipos.";
        }
        echo "<p class='resultado'>{$resultado}</p>";
    } else {
        // Si no se enviaron datos del formulario, muestra un mensaje de error
        echo "<p>No se recibieron datos del formulario.</p>";
    }
?>

        <a href="index.php" class="volver">Volver a inicio</a>
    </div>
</body>
</html>
