<?php
require_once 'includes/db.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

    $rol = 'usuario'; // rol fijo

    $sql = "INSERT INTO usuarios (nombre, usuario, correo, contrasena, rol) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $usuario, $correo, $contrasena, $rol);

    if ($stmt->execute()) {
        // Mostrar mensaje y redirigir en 3 segundos
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Registro exitoso</title>
            <script>
                setTimeout(function() {
                    window.location.href = 'login.php';
                }, 3000); // 3 segundos
            </script>
            <style>
                body {
                    background-color: #0B1B36;
                    color: #FFD700;
                    font-family: 'Segoe UI', sans-serif;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                    text-align: center;
                }
                h1 {
                    font-size: 32px;
                    margin-bottom: 10px;
                }
                p {
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <h1>¡Bienvenido a la familia de CineXtreme!</h1>
            <p>Gracias por registrarte. Serás redirigido en unos segundos...</p>
        </body>
        </html>";
        exit();
    } else {
        $mensaje = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - CineXtreme</title>
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

        .register-container {
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
        input[type="email"],
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
    <div class="register-container">
        <h2>Registro de usuario</h2>
        <form method="post">
            <input type="text" name="nombre" placeholder="Nombre completo" required><br>
            <input type="text" name="usuario" placeholder="Nombre de usuario" required><br>
            <input type="email" name="correo" placeholder="Correo electrónico" required><br>
            <input type="password" name="contrasena" placeholder="Contraseña" required><br><br>
            <button type="submit">Registrarse</button>
        </form>
        <p><?php echo $mensaje; ?></p>
    </div>
</body>
</html>
