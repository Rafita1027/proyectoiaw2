<?php
    // Establezco conexión
    require 'conexion.php';

    // Inicializo variables
    $nombre = $id_equipo = $valor = $img = "";
    $nombreErr = $id_equipoErr = $valorErr = $imgErr = "";

    // Verifico si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valid = true;

        // Validación de nombre
        if (empty($_POST["nombre"])) {
            $nombreErr = "El nombre es requerido";
            $valid = false;
        } else {
            $nombre = $_POST["nombre"];
        }

        // Validación de id_equipo
        if (empty($_POST["id_equipo"])) {
            $id_equipoErr = "El ID del equipo es requerido";
            $valid = false;
        } else {
            $id_equipo = $_POST["id_equipo"];
        }

        // Validación de valor
        if (empty($_POST["valor"])) {
            $valorErr = "El valor es requerido";
            $valid = false;
        } else {
            $valor = $_POST["valor"];
        }

        // Validación de img
        if (empty($_POST["img"])) {
            $imgErr = "La URL de la imagen es requerida";
            $valid = false;
        } else {
            $img = $_POST["img"];
        }

        // Si todas las entradas son válidas, inserto los datos en la base de datos
        if ($valid) {
            $sql = "INSERT INTO jugadores (nombre, id_equipo, valor, img) VALUES (?, ?, ?, ?)";

            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("sids", $nombre, $id_equipo, $valor, $img);

                if ($stmt->execute()) {
                    // Redirijo a la página añadir2.php con los datos del jugador
                    header("Location: añadir2.php?nombre=$nombre&img=$img");
                    exit;
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error: " . $mysqli->error;
            }
        }
    }

    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Jugador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
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
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="number"] {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .error {
            color: #e30613;
            font-size: 0.9em;
        }

        button {
            background-color: #e30613;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: fit-content;
            align-self: center;
        }

        button:hover {
            background-color: #c20410;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Añadir Jugador</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre;?>">
            <span class="error"><?php echo $nombreErr;?></span>

            <label for="id_equipo">ID del Equipo</label>
            <input type="number" id="id_equipo" name="id_equipo" value="<?php echo $id_equipo;?>">
            <span class="error"><?php echo $id_equipoErr;?></span>

            <label for="valor">Valor (M€)</label>
            <input type="number" id="valor" name="valor" step="0.01" value="<?php echo $valor;?>">
            <span class="error"><?php echo $valorErr;?></span>

            <label for="img">URL de la Imagen</label>
            <input type="text" id="img" name="img" value="<?php echo $img;?>">
            <span class="error"><?php echo $imgErr;?></span>

            <button type="submit">Añadir Jugador</button>
        </form>
    </div>
</body>
</html>
