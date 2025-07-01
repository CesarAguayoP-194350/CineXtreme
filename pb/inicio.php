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
      <p>Disneyland cerrará una atracción para dar paso a una experiencia de Avatar...</p>
      <p>Chris Evans revela que siente "FOMO" por "Avengers: Doomsday"...</p>
    </div>

    <div class="box" data-aos="zoom-in">
      <h3>¿Quiénes somos?</h3>
      <p>CineXtreme es tu plataforma de películas, noticias y cultura pop. Nos apasiona el cine y queremos compartir contigo lo mejor del entretenimiento audiovisual. Únete a nuestra comunidad y vive el cine como nunca antes.</p>
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
      <a href="#" title="Instagram">📷</a>
      <a href="#" title="Meta">📘</a>
      <a href="#" title="X">🐦</a>
    </div>
    <div>© 2025 CineXtreme. Todos los derechos reservados.</div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
