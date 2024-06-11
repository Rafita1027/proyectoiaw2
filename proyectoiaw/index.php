<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Liga EA Sports</title>
    <link rel="icon" type="image/png" href="images/laliga_logo.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: url('https://i.pinimg.com/736x/57/23/75/572375e4dbb97c31f09de149b9fc1a5b.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
            max-width: 600px;
            padding: 40px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .container img {
            width: 150px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2.5em;
            color: #e30613;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #e30613;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px 0;
            display: inline-block;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #c20410;
        }

        .btn-primary i {
            margin-right: 8px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 2em;
            }

            .btn-primary {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <img src="images/laliga_logo.png" alt="La Liga EA Sports">
        <h1>Bienvenido a La Liga EA Sports</h1>
        <div class="row">
            <a href="clasificacion.php" class="btn-primary"><i class="fas fa-list-ol"></i> Ver Clasificación</a><br>
            <a href="simular.php" class="btn-primary"><i class="fas fa-futbol"></i> Simular Partido</a><br>
            <a href="traspasos.php" class="btn-primary"><i class="fas fa-exchange-alt"></i> Mercado de Fichajes</a><br>
        </div>
    </div>
</body>
</html>
