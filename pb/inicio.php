<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineXtreme - Inicio</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
    html {
      scroll-behavior: smooth;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--azul-oscuro);
      color: var(--gris-claro);
      line-height: 1.6;
    }
    header {
      position: sticky;
      top: 0;
      z-index: 999;
      background: var(--azul-claro);
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 6px rgba(0,0,0,0.2);
      transition: background 0.3s;
    }
    .logo {
      display: flex;
      align-items: center;
      font-weight: 800;
      font-size: 28px;
      color: var(--blanco);
    }
    .logo img {
      height: 50px;
      margin-right: 15px;
      border-radius: 10%;
      object-fit: cover;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }
    .acciones button {
      background-color: var(--amarillo);
      color: var(--azul-oscuro);
      border: none;
      padding: 10px 20px;
      border-radius: 20px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s;
    }
    .acciones button:hover {
      background-color: var(--rojo);
      color: var(--blanco);
      transform: scale(1.05);
    }
    .carousel-section {
      padding: 60px 20px 40px;
      text-align: center;
    }
    .carousel-section h2 {
      margin-bottom: 20px;
      font-size: 28px;
      color: var(--amarillo);
    }
    .hero-carousel {
      overflow: hidden;
      position: relative;
    }
    .carousel-track {
      display: flex;
      width: max-content;
      animation: scroll 40s linear infinite;
      gap: 20px;
    }
    .carousel-track img {
      width: 200px;
      height: 300px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 6px 10px rgba(0,0,0,0.4);
      transition: transform 0.3s ease;
    }
    .carousel-track img:hover {
      transform: scale(1.1);
    }
    @keyframes scroll {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .quienes-somos {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      background-color: var(--azul-claro);
      padding: 50px 30px;
      gap: 30px;
    }
    .quienes-somos img {
      height: 180px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }
    .quienes-somos .texto {
      flex: 1 1 100%;
      max-width: 800px;
      color: var(--blanco);
    }
    .quienes-somos h3 {
      color: var(--amarillo);
      margin-bottom: 15px;
    }
    .quienes-somos p {
      text-align: justify;
      margin-bottom: 10px;
    }
    .content-columns {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      padding: 50px;
    }
    .box {
      background-color: var(--azul-claro);
      padding: 25px;
      border-radius: 15px;
      color: var(--blanco);
      box-shadow: 0 0 12px rgba(255, 255, 255, 0.1);
    }
    .box h3 {
      color: var(--amarillo);
      margin-bottom: 10px;
    }
    .box p {
      text-align: justify;
      margin-bottom: 8px;
    }
    .zona-descuentos img {
      width: 70%;
      max-width: 160px;
      border-radius: 10px;
      margin: 10px auto;
      display: block;
    }
    footer {
      background-color: var(--azul-claro);
      text-align: center;
      padding: 30px 20px;
      color: var(--blanco);
      font-weight: bold;
      margin-top: 40px;
    }
    .footer-links {
      margin-bottom: 10px;
    }
    .footer-links a {
      color: var(--amarillo);
      margin: 0 10px;
      text-decoration: none;
    }
    .footer-social {
      margin: 15px 0;
    }
    .footer-social a {
      display: inline-block;
      margin: 0 10px;
      color: var(--blanco);
      font-size: 20px;
      transition: transform 0.3s;
    }
    .footer-social a:hover {
      transform: scale(1.2);
      color: var(--amarillo);
    }
    @media (max-width: 600px) {
      header {
        flex-direction: column;
        align-items: flex-start;
      }
      .acciones {
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
<?php
require_once 'includes/db.php';
$sql = "SELECT imagen FROM peliculas ORDER BY fecha_publicacion DESC LIMIT 10";
$resultado = $conn->query($sql);
?>
<header data-aos="fade-down">
  <div class="logo">
    <img src="img/logo-img.png" alt="CineXtreme Logo">
  </div>
  <div class="acciones">
    <button onclick="location.href='login.php'">Iniciar sesión</button>
    <button onclick="location.href='register.php'">Registrarse</button>
  </div>
</header>
<section class="carousel-section" data-aos="fade-up">
  <h2>🎮 Las Películas Más Taquilleras</h2>
  <div class="hero-carousel">
    <div class="carousel-track">
      <?php while ($fila = $resultado->fetch_assoc()): ?>
        <img src="<?php echo $fila['imagen']; ?>" alt="Póster de película">
      <?php endwhile; ?>
    </div>
  </div>
</section>
<section class="quienes-somos" data-aos="fade-up">
  <img src="img/logo-cesar.png" alt="Logo Cesar">
  <img src="img/logo-juann.png" alt="Logo Juann">
  <div class="texto">
    <h3>¿Quiénes somos?</h3>
    <p>En CineXtreme somos un equipo apasionado conformado por estudiantes de la Universidad Autónoma de Ciudad Juárez (UACJ), comprometidos con la creación de una plataforma innovadora y completa para los amantes del cine...</p>
    <p>Este proyecto académico tiene como objetivo desarrollar un espacio web intuitivo, dinámico y actualizado donde los usuarios puedan acceder fácilmente a recomendaciones personalizadas de películas, mantenerse informados con las últimas noticias del mundo del cine, explorar los próximos estrenos en cartelera y aprovechar promociones especiales a través de una sección exclusiva de cupones.</p>
      <p>En CineXtreme creemos que el cine es más que una forma de entretenimiento: es cultura, arte y una poderosa herramienta para contar historias que nos inspiran y conectan. Por eso, hemos diseñado esta plataforma pensando en ofrecer una experiencia única para todos los públicos, desde cinéfilos apasionados hasta espectadores ocasionales que buscan una buena recomendación.</p>
      <p>Te invitamos a unirte a nuestra comunidad y vivir el cine como nunca antes, con contenido curado, actualizaciones constantes y una interfaz pensada para que explorar el mundo cinematográfico sea tan emocionante como disfrutar una gran película.</p>
  </div>
  
</section>
<div class="content-columns">
  <div class="box">
    <h3>🎥 Últimas Noticias</h3>
    <p>Apple TV+ trabaja en la secuela de <strong>F1: La película</strong> tras recaudar 150 M$ en su primer fin de semana.</p>
  
      <p>Disney prepara la continuación del remake en acción real de <strong>Lilo & Stitch</strong>.<br><br></p>
      <p><strong>Jurassic World: El Renacer</strong> se estrena el 2 de julio con nuevos dinosaurios y elenco estelar.<br><br></p>
      <p>Se lanza el primer tráiler animado de <strong>The Cat in the Hat</strong>, con Bill Hader como voz principal (estreno: febrero 2026).<br><br></p>
      <p>Christopher Nolan presenta el primer póster de <strong>La Odisea</strong>, con Matt Damon y Zendaya, estreno en 2026.<br><br></p>
      <p><strong>Tom Cruise</strong> recibirá un Oscar honorífico por su impacto en la experiencia cinematográfica (noviembre 2025).<br><br></p>
      <p>James Gunn critica el modelo actual: “Muchas películas empiezan sin guion completo”.<br><br></p>
      <p>Aumenta la popularidad del cine basado en cómics sin superhéroes, desde Europa y América Latina.<br><br></p>
  </div>
  <div class="box zona-descuentos">
    <h3>🎟 Zona de Descuentos</h3>
    <img src="img/promo 0.png" alt="Promo 0">
    <img src="img/promo 1.png" alt="Promo 1">
    <img src="img/promo 2.png" alt="Promo 2">
    <img src="img/promo 3.png" alt="Promo 3">
  </div>
</div>
<footer data-aos="fade-up">
  <div class="footer-links">
    <a href="contactos.php">Contáctanos</a>
  </div>
  <div class="footer-social">
    <a href="#" title="Instagram"><img src="img/ins.png" alt="Instagram" style="height: 30px; width: 30px; border-radius: 50%;"></a>
    <a href="#" title="Meta"><img src="img/meta.png" alt="Meta" style="height: 30px; width: 30px; border-radius: 50%;"></a>
    <a href="#" title="X"><img src="img/x.png" alt="X" style="height: 30px; width: 30px; border-radius: 50%;"></a>
  </div>
  <div>© 2025 CineXtreme. Todos los derechos reservados.</div>
</footer>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script> AOS.init(); </script>
</body>
</html>
