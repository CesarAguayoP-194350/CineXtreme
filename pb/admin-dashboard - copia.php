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
    <title>Dashboard Administrador - CineXtreme</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0B1B36; /* Azul oscuro */
            color: white;
        }

        header {
            background-color: #00A19D; /* Verde azulado */
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
            color: #FFD700; /* Amarillo */
        }

        .container {
            padding: 40px;
            text-align: center;
        }

        .container h2 {
            color: #FFD700;
            font-size: 24px;
        }

        .btn-container {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn {
            background-color: #00A19D;
            color: #fff;
            padding: 15px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #FFD700;
            color: #0B1B36;
            font-weight: bold;
        }

        .logout {
            margin-top: 50px;
        }

        .logout a {
            color: #FFD700;
            text-decoration: none;
            font-weight: bold;
        }

        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Panel de Administración - CineXtreme 🎬</h1>
    </header>

    <div class="container">
        <h2>Hola, Admin <?php echo $_SESSION["usuario"]; ?> 👋</h2>
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
