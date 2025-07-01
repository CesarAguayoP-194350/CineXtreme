<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: login.php");
    exit();
}

require_once 'includes/db.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $resumen = $_POST["resumen"];
    $genero = $_POST["genero"];
    $fecha = $_POST["fecha_publicacion"];
    $puntuacion = $_POST["puntuacion"];
    $imagen = $_POST["imagen"]; // URL

    $sql = "INSERT INTO peliculas (titulo, resumen, genero, fecha_publicacion, imagen, puntuacion) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $titulo, $resumen, $genero, $fecha, $imagen, $puntuacion);

    if ($stmt->execute()) {
        $mensaje = "✅ Película agregada correctamente.";
    } else {
        $mensaje = "❌ Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Película - CineXtreme</title>
    <style>
        body {
            background-color: #0B1B36;
            color: #FFD700;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .form-container {
            background-color: #112244;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 161, 157, 0.5);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            color: #00A19D;
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="url"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #FFD700;
            color: #0B1B36;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e6c200;
        }

        p {
            text-align: center;
            color: #00FFAA;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #00A19D;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        label {
            color: #FFD700;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>🎬 Agregar Nueva Película</h2>

        <form method="post">
            <label>Título:</label>
            <input type="text" name="titulo" placeholder="Título de la película" required>

            <label>Resumen:</label>
            <textarea name="resumen" placeholder="Resumen" rows="4" required></textarea>

            <label>Género:</label>
            <select name="genero" required>
                <option value="Acción">Acción</option>
                <option value="Comedia">Comedia</option>
                <option value="Drama">Drama</option>
                <option value="Fantasía">Fantasía</option>
                <option value="Terror">Terror</option>
                <option value="Romance">Romance</option>
                <option value="Ciencia Ficción">Ciencia Ficción</option>
                <option value="Suspenso">Suspenso</option>
                <option value="Animación">Animación</option>
                <option value="Otro">Otro</option>
            </select>

            <label>Fecha de publicación:</label>
            <input type="date" name="fecha_publicacion" required>

            <label>URL de la imagen:</label>
            <input type="url" name="imagen" placeholder="https://ejemplo.com/imagen.jpg" required>

            <label>Puntuación:</label>
            <select name="puntuacion" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <button type="submit">📥 Guardar Película</button>
        </form>

        <p><?php echo $mensaje; ?></p>
        <a href="admin-dashboard.php">← Volver al Dashboard</a>
    </div>
</body>
</html>

