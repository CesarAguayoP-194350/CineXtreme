<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== "usuario") {
    header("Location: login.php");
    exit();
}

require_once 'includes/db.php';

// Filtrar por género si está seleccionado
$filtro_genero = isset($_GET['genero']) ? $_GET['genero'] : '';

// Consulta para todas las películas (opcionalmente filtradas por género)
if ($filtro_genero && $filtro_genero !== 'todos') {
    $sql = "SELECT * FROM peliculas WHERE genero = ? ORDER BY fecha_publicacion DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $filtro_genero);
    $stmt->execute();
    $peliculas = $stmt->get_result();
} else {
    $sql = "SELECT * FROM peliculas ORDER BY fecha_publicacion DESC";
    $peliculas = $conn->query($sql);
}

// Consulta para top 5 películas con mayor puntuación
$sql_top5 = "SELECT * FROM peliculas ORDER BY puntuacion DESC, fecha_publicacion DESC LIMIT 5";
$top5 = $conn->query($sql_top5);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Usuario - CineXtreme</title>
    <style>
        body {
            background-color: #0B1B36;
            color: #FFD700;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
        }

        header {
            background-color: #00A19D;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
            color: #FFD700;
        }

        .container {
            padding: 30px;
        }

        .filter {
            margin-bottom: 30px;
        }

        select {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }

        .peliculas {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .pelicula, .top-pelicula {
            background-color: #112244;
            border-radius: 10px;
            padding: 15px;
            width: 250px;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
            color: #fff;
        }

        .pelicula img, .top-pelicula img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .top5 {
            margin-top: 50px;
        }

        .top5 h2 {
            color: #00A19D;
            text-align: center;
        }

        .logout {
            text-align: center;
            margin-top: 40px;
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
        <h1>Bienvenido a CineXtreme, <?php echo $_SESSION["usuario"] ?> 🍿</h1>
    </header>

    <div class="container">
        <div class="filter">
            <form method="get">
                <label for="genero">Filtrar por género:</label>
                <select name="genero" onchange="this.form.submit()">
                    <option value="todos">Todos</option>
                    <?php
                    $generos = ['Acción', 'Comedia', 'Drama', 'Fantasía', 'Terror', 'Romance', 'Ciencia Ficción', 'Suspenso', 'Animación', 'Otro'];
                    foreach ($generos as $genero) {
                        $selected = ($filtro_genero === $genero) ? 'selected' : '';
                        echo "<option value=\"$genero\" $selected>$genero</option>";
                    }
                    ?>
                </select>
            </form>
        </div>

        <div class="peliculas">
            <?php while ($p = $peliculas->fetch_assoc()): ?>
                <div class="pelicula">
                    <img src="<?php echo $p['imagen']; ?>" alt="Poster">
                    <h3><?php echo $p['titulo']; ?></h3>
                    <p><strong>Género:</strong> <?php echo $p['genero']; ?></p>
                    <p><strong>Fecha:</strong> <?php echo $p['fecha_publicacion']; ?></p>
                    <p><strong>Puntuación:</strong> <?php echo $p['puntuacion']; ?>/5</p>
                    <p><?php echo $p['resumen']; ?></p>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="top5">
            <h2>🎖️ Top 5 Películas Mejor Valoradas</h2>
            <div class="peliculas">
                <?php while ($top = $top5->fetch_assoc()): ?>
                    <div class="top-pelicula">
                        <img src="<?php echo $top['imagen']; ?>" alt="Poster">
                        <h3><?php echo $top['titulo']; ?></h3>
                        <p><strong>Puntuación:</strong> <?php echo $top['puntuacion']; ?>/5</p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="logout">
            <a href="logout.php">🔒 Cerrar sesión</a>
        </div>
    </div>
</body>
</html>
