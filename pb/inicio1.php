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

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
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
      border-radius: 5%;
      object-fit: cover;
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
      padding: 50px 20px 20px;
      text-align: center;
    }

    .carousel-section h2 {
      margin-bottom: 20px;
      font-size: 24px;
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
      transition: transform 0.3s;
    }

    .carousel-track img:hover {
      transform: scale(1.05);
    }

    @keyframes scroll {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }

    .content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      padding: 40px;
    }

    .box {
      background-color: var(--azul-claro);
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 0 12px rgba(255, 255, 255, 0.1);
      color: var(--blanco);
    }

    .box h3 {
      color: var(--amarillo);
      margin-bottom: 10px;
    }

    .box p {
      text-align: justify;
    }

    .zona-descuentos img {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 10px;
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
    <h2>🎬 Las Películas Más Taquilleras</h2>
    <div class="hero-carousel">
      <div class="carousel-track">
        <img src="https://musicart.xboxlive.com/7/baa66500-0000-0000-0000-000000000002/504/image.jpg">
        <img src="https://lumiere-a.akamaihd.net/v1/images/p_disneyplusoriginals_avatar_thewayofwater_poster_rebra_fa08636d.jpeg">
        <img src="https://pics.filmaffinity.com/Titanic-733113285-large.jpg">
        <img src="https://m.media-amazon.com/images/I/91xZGOnCFSL._AC_UF894,1000_QL80_.jpg">
        <img src="https://i.etsystatic.com/37166133/r/il/60f034/4087791906/il_570xN.4087791906_jcbj.jpg">
        <img src="https://musicart.xboxlive.com/7/baa66500-0000-0000-0000-000000000002/504/image.jpg">
        <img src="https://lumiere-a.akamaihd.net/v1/images/p_disneyplusoriginals_avatar_thewayofwater_poster_rebra_fa08636d.jpeg">
        <img src="https://pics.filmaffinity.com/Titanic-733113285-large.jpg">
        <img src="https://m.media-amazon.com/images/I/91xZGOnCFSL._AC_UF894,1000_QL80_.jpg">
        <img src="https://i.etsystatic.com/37166133/r/il/60f034/4087791906/il_570xN.4087791906_jcbj.jpg">
      </div>
    </div>
  </section>

  <div class="content">
    <div class="box" data-aos="fade-right">
      <h3>🎥 Últimas Noticias</h3>
      <p>Apple TV+ trabaja en la secuela de <strong>F1: La película</strong> tras recaudar 150 M$ en su primer fin de semana.</p>
      <p>Disney prepara la continuación del remake en acción real de <strong>Lilo & Stitch</strong>.</p>
      <p><strong>Jurassic World: El Renacer</strong> se estrena el 2 de julio con nuevos dinosaurios y elenco estelar.</p>
      <p>Se lanza el primer tráiler animado de <strong>The Cat in the Hat</strong>, con Bill Hader como voz principal (estreno: febrero 2026).</p>
      <p>Christopher Nolan presenta el primer póster de <strong>La Odisea</strong>, con Matt Damon y Zendaya, estreno en 2026.</p>
      <p><strong>Tom Cruise</strong> recibirá un Oscar honorífico por su impacto en la experiencia cinematográfica (noviembre 2025).</p>
      <p>James Gunn critica el modelo actual: “Muchas películas empiezan sin guion completo”.</p>
      <p>Aumenta la popularidad del cine basado en cómics sin superhéroes, desde Europa y América Latina.</p>
    </div>

    <div class="box" data-aos="zoom-in">
      <h3>¿Quiénes somos?</h3>
      <p>En CineXtreme somos un equipo apasionado conformado por estudiantes de la Universidad Autónoma de Ciudad Juárez (UACJ), comprometidos con la creación de una plataforma innovadora y completa para los amantes del cine. Nuestra iniciativa nace del entusiasmo compartido por el séptimo arte y el deseo de ofrecer una experiencia digital que conecte a las personas con lo mejor del entretenimiento audiovisual.</p>
      <p>Este proyecto académico tiene como objetivo desarrollar un espacio web intuitivo, dinámico y actualizado donde los usuarios puedan acceder fácilmente a recomendaciones personalizadas de películas, mantenerse informados con las últimas noticias del mundo del cine, explorar los próximos estrenos en cartelera y aprovechar promociones especiales a través de una sección exclusiva de cupones.</p>
      <p>En CineXtreme creemos que el cine es más que una forma de entretenimiento: es cultura, arte y una poderosa herramienta para contar historias que nos inspiran y conectan. Por eso, hemos diseñado esta plataforma pensando en ofrecer una experiencia única para todos los públicos, desde cinéfilos apasionados hasta espectadores ocasionales que buscan una buena recomendación.</p>
      <p>Te invitamos a unirte a nuestra comunidad y vivir el cine como nunca antes, con contenido curado, actualizaciones constantes y una interfaz pensada para que explorar el mundo cinematográfico sea tan emocionante como disfrutar una gran película.</p>
    </div>

    <div class="box zona-descuentos" data-aos="fade-left">
      <h3>🎟 Zona de Descuentos</h3>
      <img src="https://www.reporteindigo.com/__export/1739701234129/sites/reporteindigo/img/2024/02/27/Cine-a-29-pesos-y-dulceria-con-descuento-Cuando-660x660.jpeg_1617166805.jpeg">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1MwT5DLU1lukATIgMkIaewvCd8MDdjYygXA&s">
    </div>
  </div>

    <footer data-aos="fade-up">
    <div class="footer-links">
      <a href="#">Contáctanos</a>
    </div>
    <div class="footer-social">
      <a href="#" title="Instagram">
        <img src="img/ins.png" alt="Instagram" style="height: 30px; width: 30px; border-radius: 50%;">
      </a>
      <a href="#" title="Meta">
        <img src="img/meta.png" alt="Meta" style="height: 30px; width: 30px; border-radius: 50%;">
      </a>
      <a href="#" title="X">
        <img src="img/x.png" alt="X" style="height: 30px; width: 30px; border-radius: 50%;">
      </a>
    </div>
    <div>© 2025 CineXtreme. Todos los derechos reservados.</div>
  </footer>


  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
