<?php 
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: login.php");
    exit();
}

require_once 'includes/db.php';

$id = $_GET['id'];
$mensaje = "";

// Obtener datos actuales
$sql = "SELECT * FROM peliculas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$pelicula = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $resumen = $_POST["resumen"];
    $genero = $_POST["genero"];
    $fecha = $_POST["fecha_publicacion"];
    $puntuacion = $_POST["puntuacion"];
    $imagen = $_POST["imagen"]; // ahora viene como URL

    $sqlUpdate = "UPDATE peliculas SET titulo=?, resumen=?, genero=?, fecha_publicacion=?, imagen=?, puntuacion=? WHERE id=?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("ssssssi", $titulo, $resumen, $genero, $fecha, $imagen, $puntuacion, $id);

    if ($stmt->execute()) {
        $mensaje = "✅ Película actualizada exitosamente.";
        header("Location: admin-listar-peliculas.php");
        exit();
    } else {
        $mensaje = "❌ Error al actualizar: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Película - CineXtreme</title>
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

        img {
            max-width: 100px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        p {
            text-align: center;
            color: #FF6B6B;
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
    </style>
</head>
<body>
    <div class="form-container">
        <h2>✏️ Editar Película</h2>
        <form method="post">
            <label>Título:</label>
            <input type="text" name="titulo" value="<?php echo $pelicula['titulo']; ?>" required>

            <label>Resumen:</label>
            <textarea name="resumen" rows="4" required><?php echo $pelicula['resumen']; ?></textarea>

            <label>Género:</label>
            <select name="genero" required>
                <?php
                $generos = ['Acción', 'Comedia', 'Drama', 'Fantasía', 'Terror', 'Romance', 'Ciencia Ficción', 'Suspenso', 'Animación', 'Otro'];
                foreach ($generos as $g) {
                    $selected = ($pelicula['genero'] == $g) ? "selected" : "";
                    echo "<option value='$g' $selected>$g</option>";
                }
                ?>
            </select>

            <label>Fecha de Publicación:</label>
            <input type="date" name="fecha_publicacion" value="<?php echo $pelicula['fecha_publicacion']; ?>" required>

            <label>URL de Imagen:</label>
            <input type="url" name="imagen" value="<?php echo $pelicula['imagen']; ?>" required>

            <?php if ($pelicula['imagen']): ?>
                <img src="<?php echo $pelicula['imagen']; ?>" alt="Previsualización">
            <?php endif; ?>

            <label>Puntuación:</label>
            <select name="puntuacion" required>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    $selected = ($pelicula['puntuacion'] == $i) ? "selected" : "";
                    echo "<option value='$i' $selected>$i</option>";
                }
                ?>
            </select>

            <button type="submit">💾 Guardar cambios</button>
        </form>

        <p><?php echo $mensaje; ?></p>
        <a href="admin-listar-peliculas.php">← Volver al listado</a>
    </div>
</body>
</html>
