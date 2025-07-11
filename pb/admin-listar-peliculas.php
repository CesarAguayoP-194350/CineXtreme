<?php 
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== "administrador") {
    header("Location: login.php");
    exit();
}

require_once 'includes/db.php';

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
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
    $sqlDel = "DELETE FROM peliculas WHERE id = ?";
    $stmtDel = $conn->prepare($sqlDel);
    $stmtDel->bind_param("i", $id);
    $stmtDel->execute();
}

$sql = "SELECT * FROM peliculas ORDER BY id DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Películas - Administrador</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
            background: linear-gradient(135deg, var(--azul-oscuro), var(--azul-claro));
            color: var(--blanco);
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: var(--amarillo);
        }

        .agregar {
           display: inline-block;
           margin: 0 auto 30px;
           background-color: var(--amarillo);
           color: var(--azul-oscuro);
           padding: 12px 25px;
           font-weight: bold;
           border-radius: 10px;
           text-decoration: none;
           transition: background 0.3s ease;
           max-width: 250px;
           text-align: center;
        }


        .agregar:hover {
            background-color: var(--rojo);
            color: var(--blanco);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
            background-color: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: var(--azul-claro);
            color: var(--blanco);
        }

        tr:nth-child(even) {
            background-color: rgba(255,255,255,0.03);
        }

        tr:hover {
            background-color: rgba(255,255,255,0.08);
        }

        img {
            border-radius: 10px;
            height: 80px;
            object-fit: cover;
        }

        .acciones a {
            margin: 0 8px;
            color: var(--amarillo);
            font-size: 16px;
            text-decoration: none;
        }

        .acciones a:hover {
            color: var(--rojo);
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 40px;
            color: var(--blanco);
            font-weight: bold;
            text-decoration: none;
        }

        .volver:hover {
            color: var(--amarillo);
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }

            img {
                height: 60px;
            }
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
                <a href="admin-editar-pelicula.php?id=<?php echo $row['id']; ?>">✏️ Editar</a>
                <a href="?eliminar=<?php echo $row['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar esta película?');">🗑️ Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a class="volver" href="admin-dashboard.php">❌</a>
</body>
</html>
