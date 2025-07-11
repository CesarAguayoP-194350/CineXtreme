<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador - CineXtreme</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --azul-oscuro: #1C1F4A;
            --azul-claro: #4F73C3;
            --gris-claro: #F2F2F2;
            --blanco: #FFFFFF;
            --rojo: #E63946;
            --amarillo: #F6D55C;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, var(--azul-oscuro), #000428);
            color: var(--blanco);
            min-height: 100vh;
        }

        header {
            background-color: var(--azul-claro);
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        header h1 {
            color: var(--amarillo);
            font-size: 32px;
        }

        .container {
            padding: 60px 20px;
            text-align: center;
        }

        .container h2 {
            color: var(--amarillo);
            font-size: 26px;
            margin-bottom: 10px;
        }

        .container p {
            color: var(--gris-claro);
            font-size: 16px;
        }

        .btn-container {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .btn {
            background-color: var(--azul-claro);
            color: var(--blanco);
            padding: 18px 30px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .btn:hover {
            background-color: var(--amarillo);
            color: var(--azul-oscuro);
            transform: translateY(-3px);
        }

        .logout {
            margin-top: 60px;
        }

        .logout a {
            color: var(--amarillo);
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .logout a:hover {
            color: var(--rojo);
        }
    </style>
</head>
<body>
    <header>
        <h1>🎬 Panel de Administración</h1>
    </header>

    <div class="container">
        <h2>Administrador <?php echo $_SESSION["usuario"]; ?></h2>
        <p>Gestiona tus películas de manera sencilla:</p>

        <div class="btn-container">
            <a class="btn" href="admin-agregar-pelicula.php">➕ Agregar nueva película</a>
            <a class="btn" href="admin-listar-peliculas.php">📋 Ver / Editar / Eliminar películas</a>
        </div>

        <div class="logout">
            <a href="logout.php">🔒 Cerrar sesión</a>
        </div>
    </div>
</body>
</html>