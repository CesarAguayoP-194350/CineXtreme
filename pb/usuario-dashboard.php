<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== "usuario") {
    header("Location: login.php");
    exit();
}

require_once 'includes/db.php';

$filtro_genero = isset($_GET['genero']) ? $_GET['genero'] : '';

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

$sql_top5 = "SELECT * FROM peliculas ORDER BY puntuacion DESC, fecha_publicacion DESC LIMIT 5";
$top5 = $conn->query($sql_top5);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Usuario - CineXtreme</title>
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
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--azul-oscuro);
            color: var(--amarillo);
            transition: background 0.3s ease, color 0.3s ease;
        }
        body.light-mode {
            background-color: var(--gris-claro);
            color: var(--azul-oscuro);
        }
        nav {
            background-color: var(--azul-claro);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
        }
        nav .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        nav .logo img {
            height: 40px;
        }
        nav .logo span {
            color: var(--amarillo);
            font-size: 24px;
            font-weight: bold;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        nav ul li a {
            color: var(--blanco);
            text-decoration: none;
            font-weight: 600;
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
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px;
            width: 250px;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
            color: inherit;
            transition: transform 0.3s ease;
            text-align: justify;
        }
        .pelicula:hover, .top-pelicula:hover {
            transform: scale(1.05);
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
            color: var(--azul-claro);
            text-align: center;
        }
        .top5 .peliculas {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            justify-items: center;
        }
        .img-wrapper {
            position: relative;
        }
        .ranking {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: var(--amarillo);
            color: var(--azul-oscuro);
            font-weight: bold;
            font-size: 18px;
            padding: 5px 10px;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }
        .logout {
            text-align: center;
            margin-top: 40px;
        }
        .logout a {
            color: var(--amarillo);
            text-decoration: none;
            font-weight: bold;
        }
        .logout a:hover {
            text-decoration: underline;
        }
        button.theme-toggle {
            background: none;
            border: none;
            color: var(--amarillo);
            font-size: 20px;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .top5 .peliculas {
                overflow-x: auto;
                display: flex;
                flex-wrap: nowrap;
            }
            .top-pelicula {
                flex: 0 0 auto;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="img/logo-img.png" alt="Logo">
            
        </div>
        <ul>
          
            <li><a href="logout.php">Cerrar sesión</a></li>
            <li><button onclick="toggleTheme()" class="theme-toggle">🌙/☀️</button></li>
        </ul>
    </nav>

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
                <?php
                $pos = 1;
                while ($top = $top5->fetch_assoc()):
                ?>
                    <div class="top-pelicula">
                        <div class="img-wrapper">
                            <img src="<?php echo $top['imagen']; ?>" alt="Poster">
                            <div class="ranking"><?php echo $pos; ?></div>
                        </div>
                        <h3><?php echo $top['titulo']; ?></h3>
                        <p><strong>Puntuación:</strong> <?php echo $top['puntuacion']; ?>/5</p>
                    </div>
                <?php
                $pos++;
                endwhile;
                ?>
            </div>
        </div>

        <div class="logout">
            <a href="logout.php">🔒 Cerrar sesión</a>
        </div>
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle('light-mode');
        }
    </script>
</body>
</html>