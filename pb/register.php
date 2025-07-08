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
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Registro exitoso</title>
            <script>
                setTimeout(function() {
                    window.location.href = 'login.php';
                }, 3000);
            </script>
            <style>
                :root {
                    --azul-oscuro: #1C1F4A;
                    --azul-claro: #4F73C3;
                    --gris-claro: #F2F2F2;
                    --blanco: #FFFFFF;
                    --rojo: #E63946;
                    --amarillo: #F6D55C;
                }
                body {
                    background-color: var(--azul-oscuro);
                    color: var(--amarillo);
                    font-family: 'Poppins', sans-serif;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                    text-align: center;
                    padding: 20px;
                }
                h1 {
                    font-size: 28px;
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
        $mensaje = "❌ Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - CineXtreme</title>
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
            background-color: var(--azul-oscuro);
            font-family: 'Poppins', sans-serif;
            color: var(--blanco);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .register-container {
            background-color: var(--azul-claro);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 450px;
            width: 100%;
        }

        h2 {
            margin-bottom: 25px;
            color: var(--amarillo);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background-color: var(--gris-claro);
            color: var(--azul-oscuro);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: var(--amarillo);
            color: var(--azul-oscuro);
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: var(--rojo);
            color: var(--blanco);
        }

        p {
            margin-top: 15px;
            color: var(--rojo);
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Registro de usuario</h2>
        <form method="post">
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="text" name="usuario" placeholder="Nombre de usuario" required>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Registrarse</button>
        </form>
        <p><?php echo $mensaje; ?></p>
    </div>
</body>
</html>
