-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2023 a las 23:56:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP DATABASE IF EXISTS bd_veterinaria; 
CREATE DATABASE bd_veterinaria;
USE bd_veterinaria;

--
-- Base de datos: `bd_veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `apellido_cli` varchar(100) NOT NULL,
  `nombre_cli` varchar(100) NOT NULL,
  `dni_cli` varchar(20) NOT NULL,
  `nacimiento_cli` date NOT NULL,
  `direccion_cli` varchar(200) NOT NULL,
  `telefono_cli` varchar(50) NOT NULL,
  `correo_cli` varchar(100) NOT NULL,
  `registro_cli` datetime NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `apellido_cli`, `nombre_cli`, `dni_cli`, `nacimiento_cli`, `direccion_cli`, `telefono_cli`, `correo_cli`, `registro_cli`, `idusuario`) VALUES
(1, 'Obono Arpal', 'Marlen', '12312322', '1992-04-08', 'San Gines No. 414', '7882221', 'cgmaialenb6@yopmail.com ', '2023-07-04 09:59:36', 1),
(2, 'Alan RaulB2', 'Robles GrilloB5', '123123123', '2000-01-01', 'Colonial', '123123123', 'alanrobles@gmail.com', '2023-07-04 10:27:43', 1),
(3, 'Jacobo V2', 'Brian V2', '123123', '2000-03-01', 'Lima Zona SJL', '123141', 'brian@gmail.com', '2023-07-04 22:53:13', 1),
(4, 'Reyna V2', 'JonathanV2', '12415115', '2010-09-19', 'Magdalena B2', '15124', 'prueba@gmail.com', '2023-07-04 23:28:19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `idespecie` int(11) NOT NULL,
  `nom_especie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`idespecie`, `nom_especie`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Conejo'),
(4, 'Hamster'),
(5, 'Pez'),
(6, 'Cuy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esterilizacion`
--

CREATE TABLE `esterilizacion` (
  `idesterilizacion` int(11) NOT NULL,
  `nom_esterilizacion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `esterilizacion`
--

INSERT INTO `esterilizacion` (`idesterilizacion`, `nom_esterilizacion`) VALUES
(1, 'Esterilizado'),
(2, 'No Esterilizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idmascota` int(11) NOT NULL,
  `nom_mascota` varchar(50) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `nacimiento_mascota` date NOT NULL,
  `color_mascota` varchar(30) NOT NULL,
  `registro_mascota` datetime NOT NULL,
  `foto_mascota` text NOT NULL,
  `esterilizado` int(1) NOT NULL,
  `idraza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idmascota`, `nom_mascota`, `idcliente`, `nacimiento_mascota`, `color_mascota`, `registro_mascota`, `foto_mascota`, `esterilizado`, `idraza`) VALUES
(1, 'Alan', 1, '2000-07-18', 'Blancon1', '2023-07-06 09:43:48', '/xampp/htdocs/carevet_proy/Vista/Mascotas_Fotos/Alan-Marlen_Obono Arpal_12312322/10-48-12_06-07-2023.png', 1, 1),
(2, 'Jonathan', 2, '2023-07-04', 'Blanco', '2023-07-06 10:50:54', '/xampp/htdocs/carevet_proy/Vista/Mascotas_Fotos/Jonathan-Robles GrilloB5_Alan RaulB2_123123123/05-50-54_06-07-2023.mp4', 2, 1),
(3, 'Prueba B4', 4, '2023-01-03', 'Negro', '2023-07-06 15:36:25', '/xampp/htdocs/carevet_proy/Vista/Mascotas_Fotos/Prueba B4-JonathanV2_Reyna V2_12415115/11-16-22_06-07-2023.mp4', 2, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `idraza` int(11) NOT NULL,
  `nom_raza` varchar(50) NOT NULL,
  `id_especie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`idraza`, `nom_raza`, `id_especie`) VALUES
(1, 'Pitbull', 1),
(2, 'Persa', 2),
(3, 'Pastor Aleman', 1),
(4, 'Labrador', 1),
(5, 'Poodle', 1),
(6, 'Siamés', 2),
(7, 'Bengala', 2),
(8, 'Ragdoll', 2),
(9, 'Chihuahua', 1),
(10, 'YorkShire', 1),
(11, 'Pug', 1),
(12, 'Schnauzer', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `idsesion` int(11) NOT NULL,
  `key_ses` varchar(128) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fexpiracion_ses` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`idsesion`, `key_ses`, `idusuario`, `fexpiracion_ses`) VALUES
(28, '7029df142294110e7588e33bb403222eaf406c89497a0e327ea5e1023bda4a87', 1, '2023-07-06 11:17:29'),
(29, 'ac051fee29306c0e0459a27b5ceb6d419dad46544700afd494b2c6d285fa979a', 1, '2023-07-06 13:55:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `ape_usuario` varchar(100) NOT NULL,
  `nom_usuario` varchar(100) NOT NULL,
  `dni_usuario` varchar(8) NOT NULL,
  `direccion_usuario` varchar(200) NOT NULL,
  `nacimiento_usuario` date NOT NULL,
  `telefono_usuario` varchar(20) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL,
  `contrato_usuario` varchar(50) NOT NULL,
  `idarea` int(11) NOT NULL,
  `usu_usuario` varchar(100) NOT NULL,
  `pass_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `ape_usuario`, `nom_usuario`, `dni_usuario`, `direccion_usuario`, `nacimiento_usuario`, `telefono_usuario`, `correo_usuario`, `contrato_usuario`, `idarea`, `usu_usuario`, `pass_usuario`) VALUES
(1, 'Admin', 'Admin', '88888888', 'Lima', '1990-01-01', '123123123', 'test@test.com', 'TP', 1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(2, 'Robles', 'Alan', '123124', 'Lima', '1990-01-01', '1512341', 'prueb@gmail.com', 'TP', 1, 'admin2', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_area`
--

CREATE TABLE `usuario_area` (
  `idusuario_area` int(11) NOT NULL,
  `nom_area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_area`
--

INSERT INTO `usuario_area` (`idusuario_area`, `nom_area`) VALUES
(1, 'Administrador'),
(2, 'Veterinario'),
(3, 'Recepcionista');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idespecie`);

--
-- Indices de la tabla `esterilizacion`
--
ALTER TABLE `esterilizacion`
  ADD PRIMARY KEY (`idesterilizacion`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idmascota`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`idraza`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`idsesion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `usuario_area`
--
ALTER TABLE `usuario_area`
  ADD PRIMARY KEY (`idusuario_area`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `idespecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `esterilizacion`
--
ALTER TABLE `esterilizacion`
  MODIFY `idesterilizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idmascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `idraza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idsesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario_area`
--
ALTER TABLE `usuario_area`
  MODIFY `idusuario_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
