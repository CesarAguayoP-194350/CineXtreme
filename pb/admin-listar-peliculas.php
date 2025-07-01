<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: login.php");
    exit();
}

require_once 'includes/db.php';

// Eliminar película si se recibe ID por GET
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];

    // Obtener ruta de imagen y eliminar archivo si existe
    $sqlImg = "SELECT imagen FROM peliculas WHERE id = ?";
    $stmtImg = $conn->prepare($sqlImg);
    $stmtImg->bind_param("i", $id);
    $stmtImg->execute();
    $resultImg = $stmtImg->get_result();
    if ($row = $resultImg->fetch_assoc()) {
        if ($row['imagen'] && file_exists($row['imagen'])) {
            unlink($row['imagen']);
        }
    }

    // Eliminar de la base de datos
    $sqlDel = "DELETE FROM peliculas WHERE id = ?";
    $stmtDel = $conn->prepare($sqlDel);
    $stmtDel->bind_param("i", $id);
    $stmtDel->execute();
}

// Obtener todas las películas
$sql = "SELECT * FROM peliculas ORDER BY id DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Películas - Administrador</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #0B1B36;
            color: #FFD700;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #00A19D;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #00A19D;
            font-weight: bold;
        }

        .agregar {
            display: block;
            width: fit-content;
            margin: 10px auto 20px auto;
            padding: 10px 20px;
            background-color: #FFD700;
            color: #0B1B36;
            border-radius: 6px;
        }

        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background-color: #112244;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 12px rgba(0,161,157,0.3);
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #00A19D;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #1A2C4D;
        }

        tr:hover {
            background-color: #223C60;
        }

        img {
            border-radius: 8px;
            max-height: 80px;
        }

        .acciones a {
            margin: 0 5px;
            color: #FFD700;
        }

        .acciones a:hover {
            color: #FF6B6B;
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 30px;
            color: #00A19D;
        }
    </style>
</head>
<body>
    <h2>🎬 Listado de Películas</h2>
    <a class="agregar" href="admin-agregar-pelicula.php">➕ Agregar Nueva</a>

    <table>
        <tr>
            <th>Título</th>
            <th>Género</th>
            <th>Fecha</th>
            <th>Puntuación</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['titulo']); ?></td>
            <td><?php echo htmlspecialchars($row['genero']); ?></td>
            <td><?php echo htmlspecialchars($row['fecha_publicacion']); ?></td>
            <td><?php echo htmlspecialchars($row['puntuacion']); ?></td>
            <td>
                <?php if ($row['imagen']): ?>
                    <img src="<?php echo htmlspecialchars($row['imagen']); ?>">
                <?php else: ?>
                    <span style="color:#ccc;">Sin imagen</span>
                <?php endif; ?>
            </td>
            <td class="acciones">
                <a href="admin-editar-pelicula.php?id=<?php echo $row['id']; ?>">✏️ Editar</a> |
                <a href="?eliminar=<?php echo $row['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar esta película?');">🗑️ Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a class="volver" href="admin-dashboard.php">← Volver al Dashboard</a>
</body>
</html>

