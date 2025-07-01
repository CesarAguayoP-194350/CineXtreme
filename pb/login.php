<?php
require_once 'includes/db.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        if (password_verify($contrasena, $fila["contrasena"])) {
            session_start();
            $_SESSION["usuario"] = $fila["usuario"];
            $_SESSION["rol"] = $fila["rol"];
            
            if ($fila["rol"] === "administrador") {
                header("Location: admin-dashboard.php");
            } else {
                header("Location: usuario-dashboard.php");
            }
            exit;
        } else {
            $mensaje = "Contraseña incorrecta.";
        }
    } else {
        $mensaje = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión - CineXtreme</title>
    <style>
        body {
            background-color: #0B1B36;
            font-family: 'Segoe UI', sans-serif;
            color: #FFD700;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #112244;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 161, 157, 0.5);
            text-align: center;
            width: 350px;
        }

        h2 {
            margin-bottom: 20px;
            color: #00A19D;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #FFD700;
            color: #0B1B36;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        p {
            margin-top: 15px;
            color: #FF6B6B;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form method="post" action="">
            <input type="text" name="usuario" placeholder="Usuario" required><br>
            <input type="password" name="contrasena" placeholder="Contraseña" required><br>
            <button type="submit">Entrar</button>
        </form>
        <p><?php echo $mensaje; ?></p>
    </div>
</body>
</html>


