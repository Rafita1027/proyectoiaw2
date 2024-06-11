<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugador Añadido</title>
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
            text-align: center;
        }

        h1 {
            color: #e30613;
        }

        img {
            max-width: 100px;
            margin-bottom: 20px;
        }

        .btn-volver {
            background-color: #e30613;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-volver:hover {
            background-color: #c20410;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jugador Añadido Correctamente</h1>
        <?php
            $nombre = htmlspecialchars($_GET['nombre']);
            $img = htmlspecialchars($_GET['img']);
            echo "<img src='$img' alt='Imagen del jugador'>";
            echo "<p>Nombre: $nombre</p>";
        ?>
        <a href="index.php" class="btn-volver">Volver al inicio</a>
    </div>
</body>
</html>