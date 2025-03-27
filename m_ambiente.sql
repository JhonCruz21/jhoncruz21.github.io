-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2025 a las 06:23:15
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
-- Base de datos: `m_ambiente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `IDMaterial` int(11) NOT NULL,
  `Nombre_material` varchar(40) DEFAULT NULL,
  `Tipo_residuo` varchar(30) DEFAULT NULL,
  `Tipo_material` varchar(30) DEFAULT NULL,
  `Capacidad` int(10) NOT NULL,
  `Reciclable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`IDMaterial`, `Nombre_material`, `Tipo_residuo`, `Tipo_material`, `Capacidad`, `Reciclable`) VALUES
(1, 'Carpeta de cartón', 'RESIDUOS APROVECHABLES', 'Cartón', 10, 'Sí'),
(2, 'Lata de aluminio', 'RESIDUOS APROVECHABLES', 'Metal', 15, 'Sí'),
(3, 'Paquete', 'RESIDUOS APROVECHABLES', 'Plástico', 8, 'Sí'),
(4, 'Botella plastica', 'RESIDUOS APROVECHABLES', 'Plástico', 8, 'Sí'),
(5, 'Hojas', 'RESIDUOS APROVECHABLES', 'Papel', 12, 'Sí');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `Nombres` varchar(30) DEFAULT NULL,
  `Apellidos` varchar(30) DEFAULT NULL,
  `TipoDocumento` varchar(20) NOT NULL,
  `NumeroIdentificacion` int(20) NOT NULL,
  `CorreoElectronico` varchar(30) NOT NULL,
  `Contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `Nombres`, `Apellidos`, `TipoDocumento`, `NumeroIdentificacion`, `CorreoElectronico`, `Contraseña`) VALUES
(0, 'Pepito', 'Jimenez', 'Cédula de Ciudadanía', 1111111111, 'Pepito@hotmail.com', '12345678'),
(0, 'jhon', 'Cruz', 'Cédula de Ciudadanía', 102453791, 'jhon@hotmail.com', '1234'),
(0, 'jhon jairo', 'Cruz', 'Cédula de Ciudadanía', 10000001, 'jhonjairo@hotmail.com', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`IDMaterial`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `IDMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
