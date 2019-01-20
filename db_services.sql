-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2019 a las 01:12:39
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_services`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` char(255) NOT NULL,
  `description` text,
  `type_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `code`, `name`, `description`, `type_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(1, '001', 'Electricidad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 3, 1, '2019-01-19 21:25:45', NULL, NULL, 1),
(2, '002', 'Auxilio Mecanico', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 1, 1, '2019-01-19 21:25:45', NULL, NULL, 1),
(3, '003', 'Chofer de reemplazo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 1, 1, '2019-01-19 21:25:45', NULL, NULL, 1),
(4, '004', 'Medico a domicilio', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 2, 1, '2019-01-19 21:25:45', NULL, NULL, 1),
(5, '005', 'Ambulancia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 2, 1, '2019-01-19 21:25:45', NULL, NULL, 1),
(6, '006', 'Gasfitero', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 3, 1, '2019-01-19 21:25:45', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` char(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `code`, `name`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(1, '001', 'Autos', 1, '2019-01-19 23:20:31', NULL, NULL, 1),
(2, '002', 'Salud', 1, '2019-01-19 23:20:31', NULL, NULL, 1),
(3, '003', 'Hogar', 1, '2019-01-19 23:20:31', NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
