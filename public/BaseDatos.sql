-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2024 a las 17:34:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `optica`
--
CREATE DATABASE IF NOT EXISTS `optica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `optica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` smallint(6) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` tinyint(4) NOT NULL DEFAULT 0,
  `activo` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `password`, `nombre`, `email`, `token_password`, `password_request`, `activo`, `fecha_alta`) VALUES
(1, 'admin', '$2y$10$pO7fsqtreuRN3Ysd1iV4g.LanYyRoY/9NtB85ymklD2TYYBdIF/oq', 'Administrador', 'admin@dominio.com', NULL, 0, 1, '2024-03-12 23:22:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `activo`) VALUES
(1, 'LENTES', 1),
(2, 'GAFAS', 1),
(3, 'ACCESORIOS', 1),
(4, 'SERVICIOS', 1),
(5, 'PROMOCIONES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `email`, `telefono`, `dni`, `estatus`, `fecha_alta`, `fecha_modifica`, `fecha_baja`) VALUES
(1, 'Edison', 'Gonzalez', 'edisongonzalezalberca1@gmail.com', '0999811148', '1719444224', 1, '2024-08-19 21:49:49', NULL, NULL),
(2, 'fernando', 'fernando', 'fernando@fernando.com', 'fernando', 'fernando', 1, '2024-08-27 00:10:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `medio_pago` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`, `medio_pago`) VALUES
(1, '4DY6007998425124F', '2024-08-21 06:23:55', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 2899.00, 'paypal'),
(2, '28J595533R789904D', '2024-08-27 02:07:11', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 2899.00, 'paypal'),
(3, '4WS36827E42091223', '2024-08-27 07:14:45', 'COMPLETED', 'fernando@fernando.com', '2', 13978.15, 'paypal'),
(4, '71R12286GX733690K', '2024-08-27 18:39:04', 'COMPLETED', 'fernando@fernando.com', '2', 11369.05, 'paypal'),
(5, '0DD72013FT400564P', '2024-08-27 18:41:23', 'COMPLETED', 'fernando@fernando.com', '2', 13409.10, 'paypal'),
(6, '6TL59288EM882550M', '2024-08-27 18:42:51', 'COMPLETED', 'fernando@fernando.com', '2', 3178.15, 'paypal'),
(7, '1UD59667AA7371226', '2024-08-27 19:12:20', 'COMPLETED', 'fernando@fernando.com', '2', 10800.00, 'paypal'),
(8, '73Y023843S5913359', '2024-08-27 23:41:33', 'COMPLETED', 'fernando@fernando.com', '2', 13409.10, 'paypal'),
(9, '7WE74957FD8217303', '2024-08-28 00:06:19', 'COMPLETED', 'fernando@fernando.com', '2', 2609.10, 'paypal'),
(10, '5SA905029D517990S', '2024-08-28 00:15:10', 'COMPLETED', 'fernando@fernando.com', '2', 400.00, 'paypal'),
(11, '9N764691KH365361A', '2024-08-28 00:56:36', 'COMPLETED', 'fernando@fernando.com', '2', 54100.00, 'paypal'),
(12, '4R699997UC357622F', '2024-08-28 01:00:28', 'COMPLETED', 'fernando@fernando.com', '2', 21600.00, 'paypal'),
(13, '3BY92937802289544', '2024-08-29 05:25:39', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 13409.10, 'paypal'),
(14, '9A045281WD891321T', '2024-09-01 05:30:47', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 13489.10, 'paypal'),
(15, '1ET4906380903851E', '2024-09-01 05:36:13', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 10800.00, 'paypal'),
(16, '6J203979MC5937301', '2024-09-01 05:46:33', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 80.00, 'paypal'),
(17, '2TD15744FW282681M', '2024-09-01 05:50:23', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 80.00, 'paypal'),
(18, '08J651038B3345028', '2024-09-01 05:53:32', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 80.00, 'paypal'),
(19, '2EN23561UN1634906', '2024-09-01 06:12:13', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 13409.10, 'paypal'),
(20, '2AL955399F081320M', '2024-09-01 06:13:57', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 13489.10, 'paypal'),
(21, '7F611208E51876357', '2024-09-11 03:56:25', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 180.00, 'paypal'),
(22, '66R244957H392702Y', '2024-09-11 04:48:33', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 60.00, 'paypal'),
(23, '2RR25886RT392084P', '2024-09-15 04:23:32', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 150.00, 'paypal'),
(24, '6YR717099X6184056', '2024-09-15 04:37:43', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 80.00, 'paypal'),
(25, '2TV227526G383782U', '2024-09-16 04:27:44', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 80.00, 'paypal'),
(26, '74A729032X163350M', '2024-09-16 04:45:52', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 60.00, 'paypal'),
(27, '23794113YL343664W', '2024-09-22 14:02:02', 'COMPLETED', 'edisongonzalezalberca1@gmail.com', '1', 330.00, 'paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `valor`) VALUES
(1, 'tienda_nombre', 'Óptica Soleil'),
(2, 'tienda_telefono', '0999811148'),
(3, 'tienda_moneda', '$'),
(4, 'correo_smtp', 'mail.dominio.com'),
(5, 'correo_email', 'correo@dominio.com'),
(6, 'correo_password', 'HPlQ4rTnVrhJZoxgYNL0MJ/vTja64PApVtl8bR3TOTI='),
(7, 'correo_puerto', '465'),
(8, 'paypal_cliente', 'ARgrqcmfePkfx7-eT355JVOq9IpPyoKlg1Nh6Gz7abJbsEMo2_vbDg-t92v_7kxwXtUe9UEWCADsXoES'),
(9, 'paypal_moneda', 'USD'),
(10, 'mp_token', 'APP_USR-8499883828799661-062409-bf057c51fc05f87eba5608328f869879-446566691'),
(11, 'mp_clave', 'APP_USR-42b97c30-2799-44018a99-e30b6112ddb8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `precio`, `cantidad`) VALUES
(1, 1, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2899.00, 1),
(2, 2, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2899.00, 1),
(3, 3, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(4, 3, 1, 'Zapatos color cafe', 569.05, 1),
(5, 3, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2609.10, 1),
(6, 4, 1, 'Zapatos color cafe', 569.05, 1),
(7, 4, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(8, 5, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2609.10, 1),
(9, 5, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(10, 6, 1, 'Zapatos color cafe', 569.05, 1),
(11, 6, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2609.10, 1),
(12, 7, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(13, 8, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(14, 8, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2609.10, 1),
(15, 9, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2609.10, 1),
(16, 10, 4, 'Familia', 100.00, 4),
(17, 11, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 5),
(18, 11, 4, 'Familia', 100.00, 1),
(19, 12, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 2),
(20, 13, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2609.10, 1),
(21, 13, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(22, 14, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(23, 14, 4, 'Familia', 80.00, 1),
(24, 14, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2609.10, 1),
(25, 15, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(26, 16, 4, 'Familia', 80.00, 1),
(27, 17, 4, 'Familia', 80.00, 1),
(28, 18, 4, 'Familia', 80.00, 1),
(29, 19, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(30, 19, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2609.10, 1),
(31, 20, 2, 'Laptop 15.6\" con Windows 11', 10800.00, 1),
(32, 20, 3, 'Smartphone Negro 32gb Dual Sim 3gb Ram', 2609.10, 1),
(33, 20, 4, 'Familia', 80.00, 1),
(34, 21, 5, 'Ray-Ban Wayfarer Classic Mirror Blue', 180.00, 1),
(35, 22, 9, 'Lentes oftálmicos Totto TTJ300', 60.00, 1),
(36, 23, 6, 'Gafas Aviador Ray-Ban RB3025', 150.00, 1),
(37, 24, 7, 'Lentes Totto V442 Gun C3', 80.00, 1),
(38, 25, 20, 'Exámenes de la vista computarizados', 20.00, 1),
(39, 25, 9, 'Lentes oftálmicos Totto TTJ300', 60.00, 1),
(40, 26, 9, 'Lentes oftálmicos Totto TTJ300', 60.00, 1),
(41, 27, 5, 'Gafas Ray-Ban Wayfarer Classic Mirror Blue', 180.00, 1),
(42, 27, 6, 'Gafas Aviador Ray-Ban RB3025', 150.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(4) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `slug`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`, `id_categoria`, `activo`) VALUES
(5, 'gafas-ray-ban-wayfarer-classic-mirror-blue', 'Gafas Ray-Ban Wayfarer Classic Mirror Blue', '<ul><li>Estas gafas de sol Ray-Ban Wayfarer son un clásico atemporal. Están diseñadas con un armazón de acetato duradero y ligero, lo que proporciona un ajuste cómodo. Las lentes de espejo azul no solo ofrecen un estilo llamativo, sino también una alta protección UV. Son ideales para quienes buscan combinar estilo y funcionalidad, siendo uno de los modelos más icónicos de Ray-Ban.</li><li><strong>Material</strong>: Armazón de acetato y lentes de cristal con revestimiento de espejo.</li></ul>', 180.00, 0, 18, 2, 1),
(6, 'gafas-aviador-ray-ban-rb3025', 'Gafas Aviador Ray-Ban RB3025', '<ul><li><strong>Material</strong>: Marco de metal, lo que las hace ligeras y resistentes. Los lentes suelen ser de cristal, proporcionando alta claridad visual.</li><li><strong>Lentes</strong>: Con tratamiento polarizado (en la mayoría de los modelos), que ofrece una protección adicional contra el resplandor.</li><li><strong>Color</strong>: Disponibles en diversos colores de lente, como marrón degradado o negro polarizado.</li><li><strong>Características</strong>: Almohadillas nasales ajustables, ideales para adaptarse a diferentes tipos de nariz.</li></ul>', 150.00, 0, 13, 2, 1),
(7, 'lentes-totto-v442-gun-c3', 'Lentes Totto V442 Gun C3', '<ul><li><strong>Material</strong>: Montura de metal en la parte superior, sin montura en la parte inferior (lentes al aire).</li><li><strong>Accesorios</strong>: Incluye estuche de la marca Totto, paño de limpieza de microfibra y un spray limpiador con el logo de \"Ópticas Sooleil.\"</li><li><strong>Características</strong>: Lentes sin montura en la parte inferior, diseño ligero y moderno, ideal para uso diario y con un ajuste cómodo en la nariz.</li></ul>', 80.00, 0, 24, 1, 1),
(8, 'lentes-de-sol-vazrobe-blanco', 'Lentes de Sol Vazrobe Blanco', '<p>Los lentes de sol Vazrobe Blanco destacan por su diseño moderno y minimalista, perfecto para quienes buscan estilo y protección en un solo accesorio. Con una montura ligera y resistente, fabricada en policarbonato de alta calidad, ofrecen un ajuste cómodo y duradero. Las lentes cuentan con protección UV400, asegurando la máxima defensa contra los rayos solares. El color blanco de la montura añade un toque elegante y versátil que complementa cualquier outfit, ideal para uso diario o actividades al aire libre.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura ligera de policarbonato</li><li>Lentes con protección UV400</li><li>Diseño elegante y moderno en color blanco</li><li>Perfectos para uso en exteriores</li></ul>', 50.00, 0, 50, 1, 1),
(9, 'lentes-oft-lmicos-totto-ttj300', 'Lentes oftálmicos Totto TTJ300', '<p>Los lentes Totto J300 combinan funcionalidad y estilo en un diseño versátil. Su montura ligera está fabricada en acetato de alta resistencia, garantizando durabilidad y comodidad durante su uso. Estos lentes cuentan con bisagras metálicas reforzadas que ofrecen mayor estabilidad y un ajuste seguro. El modelo TTJ300 está disponible en una variedad de colores, lo que los hace ideales para quienes buscan complementar su estilo personal mientras disfrutan de una excelente protección ocular. Las lentes proporcionan protección UV, asegurando que tus ojos estén protegidos de los rayos dañinos del sol.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura de acetato de alta calidad</li><li>Bisagras reforzadas para mayor durabilidad</li><li>Protección UV para tus ojos</li><li>Diseño ligero y cómodo para uso prolongado</li></ul>', 60.00, 0, 17, 1, 1),
(10, 'lentes-de-vista-everlast', 'Lentes de Vista Everlast', '<p>Los lentes de vista Everlast están diseñados para ofrecer durabilidad, confort y un estilo moderno. Con una montura de acetato resistente y flexible, estos lentes son ideales para el uso diario, proporcionando un ajuste cómodo durante largas jornadas. Las bisagras reforzadas aseguran que los lentes mantengan su forma y durabilidad con el paso del tiempo. El diseño ligero de la montura permite una comodidad prolongada, y su estilo clásico hace que estos lentes sean perfectos tanto para el trabajo como para momentos casuales. Disponibles en varias combinaciones de colores para ajustarse a tu estilo personal.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura de acetato ligera y flexible</li><li>Bisagras reforzadas para mayor durabilidad</li><li>Diseño clásico y moderno</li><li>Adecuados para el uso diario prolongado</li></ul>', 100.00, 0, 15, 1, 1),
(11, 'lentes-converse-designer-eyeglasses-q006', 'Lentes Converse Designer Eyeglasses Q006', '<p>Los lentes Converse Designer Eyeglasses Q006 presentan un diseño contemporáneo que refleja el espíritu juvenil y urbano de la marca Converse. La montura está elaborada en acetato de alta calidad, ofreciendo una combinación de resistencia y ligereza. Su forma rectangular y líneas limpias se adaptan a diversos tipos de rostro, brindando un estilo versátil y moderno. Las bisagras flexibles aseguran comodidad y durabilidad, permitiendo un ajuste perfecto. Estos lentes son ideales para quienes buscan un accesorio que combine funcionalidad y tendencia.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura de acetato duradero y ligero</li><li>Diseño rectangular moderno y versátil</li><li>Bisagras flexibles para mayor comodidad</li><li>Estilo urbano característico de Converse</li><li>Compatibles con lentes graduadas y opciones de protección UV</li></ul>', 130.00, 0, 15, 1, 1),
(12, 'lentes-reef-5190-03', 'Lentes REEF 5190 03', '<p>Los <strong>Lentes REEF 5190 03</strong> se destacan por su estilo contemporáneo y diseño robusto, ideales para quienes buscan un look moderno y funcional. Su montura está fabricada en TR90, un material ligero, flexible y resistente a impactos, lo que los convierte en una excelente opción para el uso diario. Las bisagras de resorte proporcionan un ajuste perfecto y duradero. Este modelo incluye lentes con protección UV, garantizando el cuidado de tus ojos frente a la exposición solar. Con un acabado mate en tonos oscuros, estos lentes ofrecen una estética sobria y elegante, adaptable a cualquier ocasión.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura TR90 ligera, flexible y resistente</li><li>Protección UV en las lentes</li><li>Bisagras de resorte para mayor comodidad</li><li>Diseño moderno y funcional</li></ul>', 75.00, 0, 20, 1, 1),
(13, 'lentes-lacoste-l-2707', 'Lentes Lacoste L 2707', '<p>Los <strong>Lacoste L 2707 421</strong> son el complemento perfecto para quienes buscan un equilibrio entre elegancia y comodidad. Con una montura de acetato premium, estos lentes presentan un diseño sofisticado y moderno, característico de la marca Lacoste. El modelo cuenta con detalles exclusivos, como el icónico logotipo del cocodrilo en las patillas. Su estructura ligera y flexible garantiza un ajuste cómodo y duradero, ideal para el uso prolongado. Los lentes proporcionan un estilo versátil que se adapta tanto a ambientes profesionales como casuales.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura de acetato de alta calidad</li><li>Detalles exclusivos de la marca Lacoste</li><li>Diseño ligero y flexible</li><li>Elegante y adecuado para cualquier ocasión</li></ul>', 160.00, 0, 10, 1, 1),
(14, 'lentes-diesel-graduados-dl', 'Lentes Diesel Graduados DL', '<p>Los <strong>Diesel DL</strong> son una elección audaz para quienes buscan estilo y funcionalidad en sus gafas graduadas. Con una montura hecha de acetato resistente, estos lentes ofrecen durabilidad y confort durante el uso diario. El diseño presenta un estilo moderno y vanguardista, característico de la marca Diesel, con detalles distintivos en las patillas que aportan un toque único y sofisticado. Son ligeros, cómodos y ergonómicos, adaptándose perfectamente a diferentes tipos de rostros, lo que los convierte en una opción ideal para uso diario en el trabajo o actividades sociales.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura de acetato duradero y ligero</li><li>Diseño moderno y atrevido con detalles exclusivos de Diesel</li><li>Ajuste cómodo y ergonómico</li><li>Perfectos para el uso diario</li></ul>', 180.00, 0, 10, 1, 1),
(15, 'lentes-gant-graduados-ga', 'Lentes Gant Graduados GA', '<p>Los <strong>Lentes Gant GA</strong> ofrecen una mezcla perfecta de estilo clásico y confort. Su montura está hecha de acetato de alta calidad, lo que asegura una durabilidad y resistencia superior. Este modelo se caracteriza por su diseño minimalista y elegante, con un toque sofisticado, ideal para quienes buscan un accesorio versátil que se pueda usar en el día a día. Los lentes Gant GA 4145 036 cuentan con bisagras flexibles que brindan un ajuste cómodo y seguro. Además, sus patillas delgadas y ligeras los hacen cómodos para un uso prolongado sin comprometer el estilo.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura de acetato resistente y duradero</li><li>Diseño clásico y elegante</li><li>Bisagras flexibles para mayor comodidad</li><li>Ideal para uso diario</li></ul>', 160.00, 0, 12, 1, 1),
(16, 'lentes-puma-pu0348o', 'Lentes Puma PU0348O', '<p>Los <strong>Lentes Puma PU0348O</strong> están diseñados para el hombre moderno que busca una combinación de estilo deportivo y comodidad. Su montura de acero inoxidable es resistente y liviana, ideal para el uso diario. El diseño en color azul agrega un toque dinámico y fresco, manteniendo una apariencia sofisticada. Estos lentes incluyen detalles ergonómicos que garantizan un ajuste cómodo y seguro durante todo el día. Las patillas flexibles y las bisagras de alta calidad aseguran una mayor durabilidad, haciéndolos una excelente opción para quienes valoran tanto la funcionalidad como el diseño.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura de acero inoxidable ligera y duradera</li><li>Diseño ergonómico para mayor confort</li><li>Color azul que agrega estilo y versatilidad</li><li>Perfectos para uso diario</li></ul>', 150.00, 0, 25, 1, 1),
(17, 'lentes-ocean-pacific-refreshing-strawberry', 'Lentes Ocean Pacific Refreshing-Strawberry', '<p>Los <strong>Lentes Ocean Pacific Refreshing-Strawberry</strong> destacan por su frescura y estilo juvenil. Este modelo, inspirado en la vida al aire libre, está fabricado con una montura de policarbonato liviano y resistente, ideal para actividades cotidianas y momentos al aire libre. Su color vibrante de fresa (Strawberry) le da un toque único y desenfadado, perfecto para quienes buscan expresarse a través de su estilo. Estos lentes cuentan con protección UV400, lo que garantiza una excelente protección ocular frente a los rayos solares, haciendo de este modelo una opción segura y a la moda.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura de policarbonato ligera y resistente</li><li>Protección UV400 para máxima protección solar</li><li>Diseño juvenil en vibrante color fresa</li><li>Ideales para actividades al aire libre</li></ul>', 50.00, 0, 20, 1, 1),
(18, 'gafas-de-sol-hawkers-brigitte', 'Gafas de Sol Hawkers Brigitte', '<p>Los <strong>Lentes de Sol Hawkers Brigitte</strong> son la combinación perfecta de elegancia y modernidad. Con un diseño oversized de inspiración retro, estos lentes están pensados para quienes buscan destacar con un accesorio de moda sin comprometer la funcionalidad. Su montura está hecha de acetato de alta calidad, lo que les confiere durabilidad y una apariencia lujosa. Las lentes cuentan con protección UV400, ofreciendo una protección total contra los rayos ultravioleta. El modelo Brigitte es ideal para cualquier ocasión, aportando un toque de glamour y sofisticación.</p><p><strong>Puntos destacados</strong>:</p><ul><li>Montura oversized de acetato de alta calidad</li><li>Protección UV400 para tus ojos</li><li>Diseño retro y elegante</li><li>Perfectos para un look sofisticado y moderno</li></ul>', 80.00, 0, 10, 2, 1),
(19, 'evaluaciones-completas-de-salud-ocular', 'Evaluaciones completas de salud ocular', '<p><strong>Óptica Sooleil</strong> ofrece un servicio de <strong>evaluaciones completas de salud ocular</strong>, diseñado para garantizar el cuidado integral de la visión. Este servicio incluye un análisis detallado de diversos aspectos de la salud ocular, como la revisión de la presión intraocular, el estado de la retina y la detección de enfermedades oculares como el glaucoma, cataratas y degeneración macular. Con el uso de tecnología avanzada y un equipo de especialistas, las evaluaciones permiten identificar problemas oculares de manera temprana, facilitando un tratamiento oportuno y eficaz para mantener una visión saludable.</p>', 20.00, 0, 100, 4, 1),
(20, 'ex-menes-de-la-vista-computarizados', 'Exámenes de la vista computarizados', '<p><strong>Óptica Sooleil</strong> ofrece un servicio especializado de <strong>exámenes de la vista computarizados</strong>, utilizando tecnología avanzada para garantizar un diagnóstico preciso y personalizado. Estos exámenes permiten detectar problemas visuales como miopía, hipermetropía, astigmatismo, entre otros, de manera rápida y eficiente. Gracias a la precisión de los equipos computarizados, los pacientes pueden recibir recetas exactas para sus lentes o lentes de contacto, asegurando una corrección visual óptima y el máximo confort en su vida diaria.</p>', 20.00, 0, 99, 4, 1),
(21, 'promoci-n-vuelta-a-clases-ptica-sooleil', 'Promoción \"Vuelta a Clases\" - Óptica Sooleil', '<p>Prepárate para el nuevo ciclo escolar con la <strong>Promoción \"Vuelta a Clases\"</strong> de Óptica Sooleil. Asegúrate de que tus hijos comiencen las clases con una visión clara y saludable. Realiza un examen visual computarizado durante las vacaciones y obtén <strong>descuentos especiales</strong> en marcos de calidad y lentes graduados. Queremos que cada estudiante vea el mundo con claridad y estilo, ofreciendo opciones asequibles y de alta calidad para todos.</p><p><strong>Detalles de la Promoción</strong>:</p><ul><li><strong>Examen visual computarizado</strong> con un <strong>20% de descuento</strong>.</li><li><strong>10% de descuento adicional</strong> en lentes graduados si adquieres tu examen visual en Óptica Sooleil.</li><li><strong>Combo especial</strong>: Compra lentes graduados y llévate un par de lentes de sol infantiles con <strong>protección UV400</strong> a un precio reducido.</li></ul><h3>Incentivos adicionales:</h3><ul><li><strong>Garantía</strong>: Todos los marcos incluyen una garantía de un año por defectos de fabricación.</li><li><strong>Plan de pagos</strong>: Facilidades de pago con <strong>6 meses sin intereses</strong> en compras con tarjetas de crédito.</li></ul><p>¡No dejes pasar esta oportunidad para que tus hijos empiecen el año escolar con la mejor visión! Aprovecha la <strong>Promoción \"Vuelta a Clases\"</strong> en Óptica Sooleil.</p>', 20.00, 20, 100, 5, 1),
(22, 'diagn-stico-y-tratamiento-del-glaucoma', 'Diagnóstico y Tratamiento del Glaucoma', '<p>Basándonos en la importancia de la prevención y detección temprana del glaucoma, Óptica Sooleil ofrece un <strong>Servicio Integral de Evaluación de la Salud Ocular</strong>, especialmente diseñado para identificar y tratar el glaucoma, una de las principales causas de ceguera en el mundo.</p><h3>¿Qué incluye el servicio?</h3><ol><li><strong>Examen Computarizado de la Vista</strong>: Evaluación inicial para detectar anomalías visuales.</li><li><strong>Medición de la Presión Intraocular (Tonometría)</strong>: Detección temprana de glaucoma a través de la medición de la presión ocular.</li><li><strong>Examen del Nervio Óptico (Oftalmoscopia)</strong>: Análisis profundo del nervio óptico para identificar cualquier daño causado por el glaucoma.</li><li><strong>Campimetría Visual</strong>: Prueba para evaluar el campo visual y detectar áreas de visión afectadas.</li><li><strong>Asesoría Personalizada</strong>: En caso de detección de glaucoma o riesgo, se brindará asesoría sobre los siguientes pasos y posibles tratamientos.</li></ol><h3>Promoción:</h3><p>Durante este mes, <strong>Óptica Sooleil</strong> ofrece un <strong>15% de descuento</strong> en la evaluación completa de salud ocular para la detección del glaucoma.</p><p>No dejes que el glaucoma te robe la visión de manera silenciosa. <strong>Agenda tu cita hoy mismo</strong> y asegúrate de cuidar tu salud visual a tiempo.</p>', 20.00, 15, 100, 4, 1),
(23, 'diagn-stico-y-correcci-n-de-la-miop-a', 'Diagnóstico y Corrección de la Miopía', '<p>Óptica Sooleil ofrece un servicio integral para el diagnóstico y tratamiento de la <strong>miopía</strong>, una condición visual que dificulta ver claramente los objetos lejanos. Si has notado que entornas los ojos para enfocar, te acercas a los objetos para verlos, o experimentas fatiga visual y dolores de cabeza, es posible que tengas miopía.</p><h3>¿Qué incluye el servicio?</h3><ol><li><strong>Examen de la Vista Computarizado</strong>: Evaluación precisa y rápida de la agudeza visual para determinar el grado de miopía.</li><li><strong>Prueba de Corrección Visual</strong>: Prueba de lentes para encontrar la corrección perfecta según las necesidades del paciente.</li><li><strong>Asesoría en Monturas y Lentes</strong>: Te ayudamos a elegir entre una amplia gama de marcos de calidad y lentes con filtros especiales que mejoran tu comodidad visual, como el filtro de luz azul.</li><li><strong>Lentes de Contacto Graduados</strong>: Ofrecemos la opción de lentes de contacto graduados para aquellos que prefieren no usar gafas.</li><li><strong>Seguimiento Personalizado</strong>: Revisión periódica de tu salud ocular para monitorear la evolución de tu visión y ajustar el tratamiento si es necesario.</li></ol><h3>Promoción Especial:</h3><p>Por tiempo limitado, <strong>Óptica Sooleil</strong> ofrece un <strong>10% de descuento</strong> en la compra de lentes graduados al realizar tu examen visual para detectar la miopía.</p><p>No dejes que la miopía afecte tu calidad de vida. <strong>Agenda tu cita hoy</strong> y obtén la mejor solución para mejorar tu visión en Óptica Sooleil. ¡Tu visión está en buenas manos!</p>', 20.00, 10, 100, 4, 1),
(24, 'lentes-de-contacto', 'Lentes de Contacto', '<p>Óptica Sooleil te ofrece una amplia gama de <strong>lentes de contacto</strong> diseñados para brindarte comodidad y una visión clara, sin la necesidad de usar gafas. Los lentes de contacto son una opción práctica y estética para corregir problemas de visión como miopía, hipermetropía, astigmatismo y presbicia. Nuestro equipo de profesionales está capacitado para asesorarte y ofrecerte la mejor opción según tus necesidades visuales.</p><h3>Tipos de Lentes de Contacto Disponibles:</h3><p><strong>Lentes de Contacto Blandos</strong>:</p><ul><li>Ideales para uso diario o prolongado.</li><li>Cómodos y fáciles de adaptar.</li><li>Disponibles en presentaciones diarias, mensuales o trimestrales.</li></ul><p><strong>Lentes de Contacto Rígidos (RGP)</strong>:</p><ul><li>Mayor duración y mejor corrección visual para casos de astigmatismo alto.</li><li>Requieren un periodo de adaptación, pero ofrecen una excelente calidad visual.</li></ul><p><strong>Lentes de Contacto para Astigmatismo (Tóricos)</strong>:</p><ul><li>Especialmente diseñados para corregir el astigmatismo con comodidad y precisión.</li></ul><p><strong>Lentes Multifocales</strong>:</p><ul><li>Permiten ver de cerca y de lejos con la misma corrección, perfectos para personas con presbicia.</li></ul><p><strong>Lentes de Contacto Cosméticos</strong>:</p><ul><li>Cambia el color de tus ojos con opciones de lentes de contacto de colores con o sin corrección visual.</li></ul><h3>Servicios Relacionados:</h3><ul><li><strong>Examen Visual Computarizado</strong> para determinar tu graduación exacta y el tipo de lente que mejor se adapta a tu visión.</li><li><strong>Capacitación</strong> para colocación, remoción y cuidado de los lentes de contacto.</li><li><strong>Revisión y Seguimiento</strong>: Monitoreo del uso de los lentes de contacto para garantizar la salud de tus ojos.</li></ul><h3>Promoción Especial:</h3><ul><li><strong>10% de descuento</strong> en la compra de tu primer par de lentes de contacto, incluyendo un kit de limpieza y mantenimiento.</li><li><strong>Evaluación gratuita</strong> para probar diferentes tipos de lentes antes de la compra.</li></ul><p>¡Visítanos en Óptica Sooleil y encuentra la solución perfecta para tu estilo de vida y necesidades visuales!</p>', 120.00, 10, 40, 1, 1),
(25, 'estuches-para-lentes', 'Estuches para Lentes', '<p>En <strong>Óptica Sooleil</strong>, puedes encontrar una variedad de <strong>estuches para lentes</strong>, diseñados para proteger tus gafas y mantenerlas en perfectas condiciones. Los estuches vienen en diferentes estilos, tamaños y materiales para adaptarse a tus necesidades y preferencias.</p><p>&nbsp;</p><h3>Promoción Especial:</h3><p>En algunas promociones, al comprar tus lentes graduados en <strong>Óptica Sooleil</strong>, puedes recibir un <strong>estuche gratis</strong> o con <strong>descuento especial</strong> en ciertos modelos.</p><p>Estos estuches son perfectos para asegurar la durabilidad y el cuidado de tus lentes en todo momento. ¡Encuentra el que mejor se adapte a tu estilo y necesidades en Óptica Sooleil!</p>', 10.00, 20, 100, 3, 1),
(26, 'pa-os-de-microfibra', 'Paños de microfibra', '<p>Los <strong>paños de microfibra</strong> son una excelente opción para mantener las lentes limpias y libres de rayones. En <strong>Óptica Sooleil</strong>, ofrecemos paños de microfibra de alta calidad, ideales para limpiar gafas, lentes de cámaras y pantallas sin dejar residuos ni dañar las superficies.</p><h3>Características de los Paños de Microfibra:</h3><ul><li><strong>Material suave y no abrasivo</strong>: Perfecto para limpiar sin riesgo de rayar las lentes.</li><li><strong>Eficiente en la eliminación de huellas dactilares, polvo y manchas</strong>.</li><li><strong>Tamaño compacto</strong>: Fácil de llevar en el estuche de tus gafas o en el bolsillo.</li><li><strong>Colores variados</strong>: Disponibles en una gama de colores como azul, verde, amarillo, gris, y blanco, para adaptarse a tu estilo.</li></ul><p>Estos paños son reutilizables y pueden lavarse fácilmente sin perder su capacidad de limpieza. ¡Mantén tus lentes siempre impecables con los paños de microfibra de Óptica Sooleil!</p>', 2.00, 0, 100, 3, 1),
(27, 'soluciones-y-l-quidos-para-lentes-de-contacto', 'Soluciones y líquidos para lentes de contacto', '<p>En <strong>Óptica Sooleil</strong> ofrecemos una amplia variedad de <strong>soluciones y líquidos para lentes de contacto</strong>, esenciales para el cuidado y mantenimiento adecuado de tus lentes. Estos productos ayudan a mantener tus lentes limpios, desinfectados y cómodos para su uso diario, asegurando una mayor durabilidad y salud ocular.</p><h3>Promoción Especial:</h3><ul><li>Compra tu <strong>solución multiuso</strong> en <strong>Óptica Sooleil</strong> y recibe un <strong>estuche de lentes de contacto gratis</strong>.</li><li><strong>Descuentos</strong> de hasta un 10% en paquetes de soluciones y gotas humectantes al adquirir un par de lentes de contacto.</li></ul><p>Recuerda que el uso adecuado de las soluciones es fundamental para mantener tus lentes de contacto limpios, cómodos y seguros para tus ojos. ¡Visítanos en Óptica Sooleil y elige la solución que mejor se adapte a tus necesidades!</p>', 8.00, 0, 100, 3, 1),
(28, 'reparaci-n-y-mantenimiento-de-lentes-y-gafas', 'Reparación y mantenimiento de lentes y gafas', '<p>En <strong>Óptica Sooleil</strong>, ofrecemos un servicio completo de <strong>reparación y mantenimiento de lentes y gafas</strong> para garantizar que tus accesorios visuales estén siempre en las mejores condiciones. Sabemos que los lentes son una inversión importante y, con el cuidado adecuado, pueden durar mucho más tiempo. Nuestro equipo de profesionales está capacitado para realizar desde pequeños ajustes hasta reparaciones más complejas.</p><h3>Servicios de Reparación y Mantenimiento:</h3><p><strong>Ajuste de Monturas</strong>:</p><ul><li>Si tus gafas están flojas o incómodas, ajustamos las patillas y los puentes para que se adapten perfectamente a tu rostro.</li><li><strong>Precio aproximado</strong>: $5 - $10, dependiendo del ajuste requerido.</li></ul><p><strong>Cambio de Almohadillas Nasales</strong>:</p><ul><li>Reemplazamos las almohadillas desgastadas o dañadas, mejorando la comodidad y el ajuste de tus gafas.</li><li><strong>Precio aproximado</strong>: $3 - $5.</li></ul><p><strong>Reemplazo de Tornillos</strong>:</p><ul><li>Si tus gafas tienen tornillos sueltos o perdidos, los reemplazamos para asegurar la estabilidad de la montura.</li><li><strong>Precio aproximado</strong>: $2 - $4 por tornillo.</li></ul><p><strong>Reparación de Bisagras</strong>:</p><ul><li>Reparamos bisagras dañadas o sueltas en monturas de metal o acetato, prolongando la vida útil de tus gafas.</li><li><strong>Precio aproximado</strong>: $8 - $15.</li></ul><p><strong>Cambio de Lentes</strong>:</p><ul><li>Si los lentes de tus gafas están rayados o dañados, podemos reemplazarlos por unos nuevos según tu receta o preferencia.</li><li><strong>Precio aproximado</strong>: Varía dependiendo del tipo de lentes (graduados, fotocromáticos, de sol, etc.).</li></ul><p><strong>Limpieza Profunda y Pulido de Lentes</strong>:</p><ul><li>Servicio de limpieza profesional con productos especializados para eliminar manchas difíciles y rayones menores.</li><li><strong>Precio aproximado</strong>: $5 - $10.</li></ul><p><strong>Reparación de Monturas</strong>:</p><ul><li>Si tu montura está rota o dañada, evaluamos la posibilidad de reparación con soldadura en el caso de monturas metálicas o ajuste especializado en monturas de acetato.</li><li><strong>Precio aproximado</strong>: $15 - $30, dependiendo del daño.</li></ul><h3>Mantenimiento Preventivo:</h3><ul><li>Recomendamos realizar un <strong>mantenimiento preventivo</strong> cada seis meses para garantizar que tus gafas y lentes estén siempre en las mejores condiciones.</li><li><strong>Servicio de mantenimiento gratuito</strong> en los primeros seis meses con la compra de gafas en Óptica Sooleil.</li></ul><h3>Promociones Especiales:</h3><ul><li><strong>Revisión gratuita</strong> de tus gafas al traerlas a nuestro centro de servicio.</li><li><strong>Descuento del 10%</strong> en servicios de reparación al presentar tu carnet de cliente frecuente de Óptica Sooleil.</li></ul><p>Mantén tus gafas en perfecto estado con nuestro servicio de <strong>reparación y mantenimiento especializado</strong>. ¡Visítanos en Óptica Sooleil y deja tus lentes en manos de expertos!</p>', 5.00, 0, 1000, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `activacion` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `activacion`, `token`, `token_password`, `password_request`, `id_cliente`) VALUES
(1, 'Edison', '$2y$10$8Kkb69cBeYgPfsNeRvm/Xehykv1RP6ktYNZPR5RxnYjOOQad.U9.e', 1, 'e033142c5725bcbc2b606924201e0a10', '', 0, 1),
(2, 'fernando', '$2y$10$8NUrr14kC.U9hilshi1hAuAGi6IWmxsOxV33nUe5afWJWWSVj6f62', 1, 'bd0bc6068e3e6fb14a5103fba205d5af', NULL, 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
