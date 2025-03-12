-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2025 a las 05:44:41
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
-- Base de datos: `videogames_api`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videogames`
--

CREATE TABLE `videogames` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `gender` enum('Action','Rhythmic','Aventure','Arcade','Racing','Sports','FPS','Strategy','Platforms','Roguelike','Sandbox','Rol') NOT NULL,
  `company` enum('2K Boston','343 Industries','Alexey Pajitnov','Arkane Studios','Asobo Studio','Nintendo','Rockstar Games','Riot Games','Bandai Namco','Bethesda','BioWare','Blizzard','Bluepoint Games','Bungie','Capcom','Mojang','Santamonica','Konami','miHoyo','Ubisoft','FromSoftware','Valve') NOT NULL,
  `release_date` date NOT NULL,
  `total_cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videogames`
--

INSERT INTO `videogames` (`id`, `title`, `gender`, `company`, `release_date`, `total_cost`) VALUES
(1, 'The Legend of Zelda', 'Action', 'Nintendo', '2023-01-01', 59.99),
(2, 'Gran Turismo 7', 'Racing', 'Rockstar Games', '2022-05-15', 49.99),
(3, 'Halo Infinite', 'FPS', '343 Industries', '2021-11-10', 69.99),
(4, 'Anno 1800', 'Strategy', 'Ubisoft', '2020-09-20', 39.99),
(5, 'The Elder Scrolls V: Skyrim', 'Rol', 'Bethesda', '2019-07-07', 29.99),
(6, 'Minecraft', 'Sandbox', 'Mojang', '2018-06-01', 19.99),
(7, 'Super Mario Odyssey', 'Platforms', 'Nintendo', '2017-03-03', 59.99),
(8, 'Dark Souls III', 'Roguelike', 'FromSoftware', '2016-12-12', 69.99),
(9, 'Street Fighter V', 'Arcade', 'Capcom', '2015-10-10', 39.99),
(10, 'Taiko no Tatsujin', 'Rhythmic', 'Bandai Namco', '2014-08-08', 49.99),
(11, 'Overwatch', 'Action', 'Blizzard', '2013-07-07', 59.99),
(12, 'Dishonored', 'Aventure', 'Arkane Studios', '2012-05-05', 69.99),
(13, 'Forza Horizon 4', 'Racing', 'Bungie', '2011-03-03', 29.99),
(14, 'Counter-Strike: Global Offensive', 'FPS', 'Valve', '2010-01-01', 19.99),
(15, 'BioShock', 'Strategy', '2K Boston', '2009-11-11', 39.99),
(16, 'God of War', 'Rol', 'Santamonica', '2008-09-09', 49.99),
(17, 'Metal Gear Solid', 'Sandbox', 'Konami', '2007-07-07', 59.99),
(18, 'Genshin Impact', 'Platforms', 'miHoyo', '2006-05-05', 69.99),
(19, 'Tetris', 'Roguelike', 'Alexey Pajitnov', '2005-03-03', 29.99),
(20, 'Shadow of the Colossus', 'Arcade', 'Bluepoint Games', '2004-01-01', 19.99),
(21, 'FIFA 23', 'Sports', 'Ubisoft', '2003-12-01', 49.99),
(22, 'Resident Evil 4', 'Action', 'Capcom', '2002-10-10', 59.99),
(23, 'Warcraft III', 'Strategy', 'Blizzard', '2001-08-15', 39.99),
(24, 'Fallout 3', 'Roguelike', 'Bethesda', '2000-06-20', 69.99),
(25, 'Destiny', 'FPS', 'Bungie', '1999-04-25', 29.99),
(26, 'Mass Effect', 'Rol', 'BioWare', '1998-02-10', 59.99),
(27, 'SimCity', 'Sandbox', 'Mojang', '1997-11-30', 19.99),
(28, 'Super Mario 64', 'Platforms', 'Nintendo', '1996-09-12', 59.99),
(29, 'Prey', 'Aventure', 'Arkane Studios', '1995-07-07', 49.99),
(30, 'Pac-Man', 'Arcade', 'Bandai Namco', '1994-05-05', 39.99);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `videogames`
--
ALTER TABLE `videogames`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `videogames`
--
ALTER TABLE `videogames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
