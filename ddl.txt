-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-03-2023 a las 09:39:13
-- Versión del servidor: 8.0.32-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `preinscripciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int NOT NULL,
  `nombre_comercial` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `nombre_comercial`, `created_at`, `updated_at`) VALUES
(56, 'CLONAZEPAN', '2023-03-11 23:59:40', NULL),
(57, 'DIAZEPAN', '2023-03-12 00:00:51', NULL),
(59, 'DICLOFEAC', '2023-03-12 12:20:39', NULL),
(60, 'FABAMOX', '2023-03-12 12:22:19', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`, `created_at`, `updated_at`) VALUES
(78, 'ALAN', 'GARDEL', '45677', '2023-03-07', '2023-03-11 23:59:21', '2023-03-12 12:31:29'),
(79, 'CELESTE', 'CEL', '45323', '2023-03-07', '2023-03-12 00:00:00', NULL),
(80, 'SIGMAYER', 'DE CATARINA', '8978', '2023-03-07', '2023-03-12 00:00:42', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_medicamento`
--

CREATE TABLE `persona_medicamento` (
  `id` int NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `persona_id` int NOT NULL,
  `medicamento_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `persona_medicamento`
--

INSERT INTO `persona_medicamento` (`id`, `observaciones`, `persona_id`, `medicamento_id`, `created_at`, `updated_at`) VALUES
(47, 'TOMAR CADA 8 HORAS', 78, 56, '2023-03-12 00:00:15', NULL),
(48, 'TOMAR CADA 8', 79, 57, '2023-03-12 00:01:19', NULL),
(50, 'TOMAR CADA 8', 78, 59, '2023-03-12 12:21:18', '2023-03-12 12:23:40'),
(52, 'TOMAR HOY', 79, 60, '2023-03-12 12:33:54', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_comercial` (`nombre_comercial`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `persona_medicamento`
--
ALTER TABLE `persona_medicamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `medicamento_id` (`medicamento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `persona_medicamento`
--
ALTER TABLE `persona_medicamento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona_medicamento`
--
ALTER TABLE `persona_medicamento`
  ADD CONSTRAINT `medicamento_id` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_id` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
