<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Película - CineXtreme</title>
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
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: linear-gradient(145deg, var(--azul-oscuro), var(--azul-claro));
      font-family: 'Poppins', sans-serif;
      color: var(--blanco);
      min-height: 100vh;
      padding: 60px 20px;
      display: flex;
      justify-content: center;
      overflow-y: auto;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      padding: 35px;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
      max-width: 600px;
      width: 100%;
    }

    h2 {
      color: var(--amarillo);
      text-align: center;
      margin-bottom: 25px;
    }

    label {
      font-weight: 600;
      margin-top: 15px;
      display: block;
      color: var(--gris-claro);
    }

    input[type="text"],
    input[type="url"],
    input[type="date"],
    textarea,
    select {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: none;
      background-color: var(--gris-claro);
      color: var(--azul-oscuro);
      font-size: 15px;
    }

    textarea {
      resize: vertical;
    }

    button {
      background-color: var(--amarillo);
      color: var(--azul-oscuro);
      font-weight: bold;
      padding: 14px;
      border: none;
      border-radius: 10px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: var(--rojo);
      color: var(--blanco);
    }

    .mensaje {
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
      color: var(--amarillo);
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 25px;
      color: var(--blanco);
      text-decoration: none;
      font-weight: bold;
    }

    .back-link:hover {
      color: var(--amarillo);
    }

    @media (max-width: 600px) {
      .form-container {
        padding: 25px;
      }

      body {
        padding: 40px 15px;
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>🎬 Agregar Nueva Película</h2>

    <form method="post">
      <label for="titulo">Título:</label>
      <input type="text" name="titulo" id="titulo" required placeholder="Ej: El Templo de los Huesos">

      <label for="resumen">Resumen:</label>
      <textarea name="resumen" id="resumen" rows="4" required placeholder="Describe brevemente la trama..."></textarea>

      <label for="genero">Género:</label>
      <select name="genero" id="genero" required>
        <option value="">Seleccionar género</option>
        <option>Acción</option>
        <option>Comedia</option>
        <option>Drama</option>
        <option>Fantasía</option>
        <option>Terror</option>
        <option>Romance</option>
        <option>Ciencia Ficción</option>
        <option>Suspenso</option>
        <option>Animación</option>
        <option>Otro</option>
      </select>

      <label for="fecha_publicacion">Fecha de publicación:</label>
      <input type="date" name="fecha_publicacion" id="fecha_publicacion" required>

      <label for="imagen">URL de la imagen:</label>
      <input type="url" name="imagen" id="imagen" placeholder="https://ejemplo.com/poster.jpg" required>

      <label for="puntuacion">Puntuación:</label>
      <select name="puntuacion" id="puntuacion" required>
        <option value="">Califica del 1 al 5</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>

      <button type="submit">📥 Guardar Película</button>
    </form>

    <?php if (!empty($mensaje)): ?>
      <p class="mensaje"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <a href="admin-dashboard.php" class="back-link">⬅ Volver al panel</a>
  </div>
</body>
</html>
