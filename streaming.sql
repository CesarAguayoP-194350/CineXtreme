-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2025 a las 00:25:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `streaming`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` text NOT NULL,
  `genero` enum('Acción','Comedia','Drama','Fantasía','Terror','Romance','Ciencia Ficción','Suspenso','Animación','Otro') NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `puntuacion` tinyint(4) NOT NULL CHECK (`puntuacion` between 1 and 5),
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `resumen`, `genero`, `fecha_publicacion`, `imagen`, `puntuacion`, `id_admin`) VALUES
(1, ' One of Them Days', 'Cuando Dreux y Alyssa, mejores amigos y compañeros de habitación, descubren que el novio de Alyssa se ha gastado el dinero del alquiler, se ven obligados a hacer todo lo posible para evitar el desalojo y mantener intacta su amistad.', 'Comedia', '2025-07-17', 'https://preview.redd.it/one-of-them-days-megathread-v0-g1qr6ysnczde1.jpeg?auto=webp&s=a49ba3a0c1cb510f2e3513fd21f00c48b4c3af48', 4, NULL),
(2, 'Dune: Part Two ', 'Paul Atreides se une a Chani y a los Fremen mientras busca venganza contra los conspiradores que destruyeron a su familia. Paul se enfrenta a una elección entre el amor de su vida y el destino del universo, y debe evitar un futuro terrible. ', 'Ciencia Ficción', '2025-03-15', 'https://upload.wikimedia.org/wikipedia/en/5/52/Dune_Part_Two_poster.jpeg ', 5, NULL),
(3, 'Mickey 17 ', 'Mickey 17 es un \"prescindible\" en una expedición humana enviada para colonizar el mundo helado de Niflheim. Tras morir durante la misión, se regenera en un nuevo cuerpo con la mayoria de sus recuerdos intactos', 'Ciencia Ficción', '2025-03-07', 'https://m.media-amazon.com/images/M/MV5BZGQwYmEzMzktYzBmMy00NmVmLTkyYTUtOTYyZjliZDNhZGVkXkEyXkFqcGc@._V1_.jpg ', 4, NULL),
(4, 'Snow White ', 'Huyendo de su madrastra, una joven princesa busca refugio en la casa de siete habitantes del bosque. Tras descubrir que está viva, la malvada madrastra ordena a sus subordinados que encuentren a Blancanieves y la maten. ', 'Fantasía', '2025-03-20', 'https://upload.wikimedia.org/wikipedia/en/1/1f/Snow_White_%282025_film%29_final_poster.jpg ', 1, NULL),
(5, 'Ghostbusters: Frozen Empire ', 'La familia Spengler regresa a la famosa estación de bomberos de la ciudad de Nueva York con los cazafantasmas originales. Cuando un antiguo artefacto desata una fuerza maligna, los cazafantasmas nuevos y antiguos deben unirse para proteger el mundo', 'Terror', '2025-03-24', 'https://m.media-amazon.com/images/I/91ok1ACU4IL._UF894,1000_QL80_.jpg ', 3, NULL),
(6, 'Godzilla x Kong: The New Empire ', 'Godzilla y Kong se enfrentan a una amenaza colosal escondida en lo profundo del planeta, desafiando su propia existencia y la supervivencia de la raza humana. ', 'Acción', '2025-03-29', 'https://upload.wikimedia.org/wikipedia/en/b/be/Godzilla_x_kong_the_new_empire_poster.jpg ', 4, NULL),
(7, 'How to Train Your Dragon ', 'Un niño vikingo llamado Hipo desafía la tradición al hacerse amigo de un dragón llamado Chimuelo. Cuando surge una antigua amenaza que pone en peligro a ambas especies, la amistad de Hipo con Chimuelo se convierte en la clave para un nuevo futuro. ', 'Animación', '2025-06-12', 'https://resizing.flixster.com/idSqXXW1SHplGNnq6W67KnkK-_s=/ems.cHJkLWVtcy1hc3NldHMvbW92aWVzLzQyMWQ0OTJhLThkYjYtNDY0MS1hMDNhLTU4NDk3YWExMDllMy5qcGc= ', 4, NULL),
(8, 'Wicked', 'Una mujer llamada Elphaba forja una improbable amistad con Glinda, una estudiante muy amada por todos. Pronto, su relación llega a una encrucijada, por lo que sus vidas toman caminos muy diferentes', 'Fantasía', '2025-07-31', 'https://m.media-amazon.com/images/M/MV5BOWMwYjYzYmMtMWQ2Ni00NWUwLTg2MzAtYzkzMDBiZDIwOTMwXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg ', 4, NULL),
(9, 'Zootopia', 'La metrópoli Zootopía es una ciudad de mamíferos, donde muchos animales viven y se desarrollan. Allí, la optimista agente Judy Hopps se convierte en la primera conejita de un cuerpo policial compuesto por animales duros y enormes. Judy está decidida a demostrar su valentía y se mete en un caso con Nick Wilde, un zorro parlanchín y estafador', 'Acción', '2026-02-16', 'https://m.media-amazon.com/images/M/MV5BOTMyMjEyNzIzMV5BMl5BanBnXkFtZTgwNzIyNjU0NzE@._V1_.jpg ', 4, NULL),
(10, 'The Bad Guys ', 'El señor Lobo, el señor Serpiente, el señor Piraña, el señor Tiburón y la señorita Tarántula tienen que fingir que se han convertido en chicos buenos para evitar ir a la cárcel. Conseguirlo se convierte en el mayor reto de sus carreras delictivas. ', 'Acción', '2025-04-01', 'https://upload.wikimedia.org/wikipedia/en/0/00/The_Bad_Guys_poster.jpeg ', 5, NULL),
(11, 'The Old Guard 2 ', 'La Vieja Guardia 2 es una película estadounidense de superhéroes de 2025 dirigida por Victoria Mahoney, con guion de Greg Rucka y Sarah L. Walker, basada en su cómic La Vieja Guardia. ', 'Fantasía', '2025-07-02', 'https://upload.wikimedia.org/wikipedia/en/thumb/5/54/The_Old_Guard_2.jpg/250px-The_Old_Guard_2.jpg ', 3, NULL),
(12, 'Happy Gilmore ', 'Un jugador de hockey triunfa al utilizar su famoso movimiento y su temperamento en los campos profesionales de golf\r\n', 'Comedia', '2025-07-16', 'https://m.media-amazon.com/images/M/MV5BMzMyZTM1MTMtNDdjOS00NzIzLTkxY2QtZTU4OGYxOTUwNDMxXkEyXkFqcGc@._V1_.jpg ', 4, NULL),
(13, 'Freakier Friday ', 'Dos galletas de la suerte provocan que una psicoterapeuta comprometida y su hija adolescente intercambien mágicamente sus cuerpos', 'Comedia', '2025-08-06', 'https://m.media-amazon.com/images/I/81eL675rloL._UF894,1000_QL80_.jpg ', 3, NULL),
(14, 'Tron', 'Un diseñador de videojuegos se hace parte del software de un usuario malvado dentro de una computadora', 'Acción', '2025-09-17', 'https://resizing.flixster.com/bIPJdBklQMFRpCLjn_sud5t8l4U=/fit-in/705x460/v2/https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p5390_v_v12_aa.jpg', 3, NULL),
(15, 'Thunderbolts', 'Thunderbolts* es una película de superhéroes estadounidense de 2025, basada en el equipo homónimo de Marvel Comics. Producida por Marvel Studios y distribuida por Walt Disney Studios Motion Pictures, esta es la película número 36 del Universo cinematográfico de Marvel. ', 'Ciencia Ficción', '2025-05-25', 'https://lumiere-a.akamaihd.net/v1/images/image003_929d0db0.jpeg?region=0,0,673,996 ', 4, NULL),
(16, 'Sinners', 'Con el objetivo de dejar atrás sus turbulentas vidas, dos hermanos gemelos regresan a su ciudad natal para comenzar de nuevo. Una vez allí, descubrirán que un mal espera al acecho para recibirlos.', 'Drama', '2025-04-17', 'https://m.media-amazon.com/images/M/MV5BNjIwZWY4ZDEtMmIxZS00NDA4LTg4ZGMtMzUwZTYyNzgxMzk5XkEyXkFqcGc@._V1_.jpg ', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('administrador','usuario') NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `correo`, `contrasena`, `rol`) VALUES
(1, 'cesar', 'cesar574', 'cesar574@hotmail.com', '$2y$10$QhImo82TxxtVsKsxot/iGOJfn73n8G0YKq8q9UjZfMR6bOYPk2tjG', 'usuario'),
(2, 'juan', 'juanchope574', 'juanchope574@hotmail.com', '$2y$10$8K5d/qAmoL3NY.0ounRiAe4mHZt/R8466QmDA9Pf2xo/vp6VTaq0S', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
