<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contáctanos - CineXtreme</title>
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
      font-family: 'Poppins', sans-serif;
      background-color: var(--azul-oscuro);
      color: var(--blanco);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .form-container {
      background-color: var(--azul-claro);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
      width: 100%;
      max-width: 500px;
    }

    .form-container h2 {
      margin-bottom: 20px;
      color: var(--amarillo);
      text-align: center;
    }

    label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      font-weight: 600;
    }

    input, textarea {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      background-color: var(--gris-claro);
      color: var(--azul-oscuro);
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    button {
      background-color: var(--amarillo);
      color: var(--azul-oscuro);
      border: none;
      padding: 12px 20px;
      border-radius: 10px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 20px;
      width: 100%;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: var(--rojo);
      color: var(--blanco);
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Contáctanos</h2>
    <form id="formulario-contacto">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required>

      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" required></textarea>

      <button type="submit">Enviar mensaje</button>
    </form>
  </div>

  <script>
    document.getElementById('formulario-contacto').addEventListener('submit', function(e) {
      e.preventDefault(); // Detener envío real
      alert('✅ ¡Gracias por contactarnos! Nos estaremos comunicando contigo a la brevedad.');

      // Redirigir al dashboard después de 1 segundo
      setTimeout(function() {
        window.location.href = 'usuario-dashboard.php';
      }, 1000);
    });
  </script>
</body>
</html>
