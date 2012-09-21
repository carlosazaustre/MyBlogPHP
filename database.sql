-- phpMyAdmin SQL Dump
-- version 2.6.4-pl2
-- http://www.phpmyadmin.net
-- 
-- Servidor: mysql12.freehostia.com
-- Tiempo de generación: 17-03-2011 a las 14:21:18
-- Versión del servidor: 5.1.50
-- Versión de PHP: 5.2.6-1+lenny9
-- 
-- Base de datos: `paogar_blog`
-- 
CREATE DATABASE `paogar_blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE paogar_blog;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `comentarios`
-- 

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `hora` time NOT NULL DEFAULT '00:00:00',
  `entrada` int(11) NOT NULL DEFAULT '0',
  `texto` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `comentarios`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `entradas`
-- 

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `autor` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `texto` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `hora` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `entradas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `entradas_etiquetas`
-- 

CREATE TABLE `entradas_etiquetas` (
  `entrada` int(11) NOT NULL DEFAULT '0',
  `etiqueta` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `entradas_etiquetas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `etiquetas`
-- 

CREATE TABLE `etiquetas` (
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `etiquetas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `alias` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `fecha_nacimiento` date NOT NULL DEFAULT '0000-00-00',
  `ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `url` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `perfil` enum('autor','lector') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'autor',
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`alias`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;