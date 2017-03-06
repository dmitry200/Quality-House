-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 07 2017 г., 01:38
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `qh`
--
CREATE DATABASE IF NOT EXISTS `qh` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `qh`;

-- --------------------------------------------------------

--
-- Структура таблицы `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id_area` int(11) NOT NULL,
  `name` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `areas`
--

TRUNCATE TABLE `areas`;
-- --------------------------------------------------------

--
-- Структура таблицы `area_rc`
--

DROP TABLE IF EXISTS `area_rc`;
CREATE TABLE IF NOT EXISTS `area_rc` (
  `id_rc` int(11) NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `area_rc`
--

TRUNCATE TABLE `area_rc`;
-- --------------------------------------------------------

--
-- Структура таблицы `builders`
--

DROP TABLE IF EXISTS `builders`;
CREATE TABLE IF NOT EXISTS `builders` (
  `id_builder` int(11) NOT NULL,
  `name` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `builders`
--

TRUNCATE TABLE `builders`;
--
-- Дамп данных таблицы `builders`
--

INSERT INTO `builders` (`id_builder`, `name`) VALUES
(1, 'ПИК');

-- --------------------------------------------------------

--
-- Структура таблицы `flats`
--

DROP TABLE IF EXISTS `flats`;
CREATE TABLE IF NOT EXISTS `flats` (
  `id_flat` int(11) NOT NULL,
  `count_rooms` int(11) NOT NULL,
  `square` int(11) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `repair` char(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `flats`
--

TRUNCATE TABLE `flats`;
-- --------------------------------------------------------

--
-- Структура таблицы `flat_status`
--

DROP TABLE IF EXISTS `flat_status`;
CREATE TABLE IF NOT EXISTS `flat_status` (
  `id_status` int(11) NOT NULL,
  `description` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `flat_status`
--

TRUNCATE TABLE `flat_status`;
-- --------------------------------------------------------

--
-- Структура таблицы `homes`
--

DROP TABLE IF EXISTS `homes`;
CREATE TABLE IF NOT EXISTS `homes` (
  `id_home` int(11) NOT NULL,
  `count_floors` int(11) NOT NULL,
  `count_proch` int(11) NOT NULL,
  `count_flats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `homes`
--

TRUNCATE TABLE `homes`;
-- --------------------------------------------------------

--
-- Структура таблицы `home_flat`
--

DROP TABLE IF EXISTS `home_flat`;
CREATE TABLE IF NOT EXISTS `home_flat` (
  `id_home` int(11) NOT NULL,
  `id_flat` int(11) NOT NULL,
  `price_flat` int(11) NOT NULL,
  `porch` int(11) NOT NULL,
  `floor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `home_flat`
--

TRUNCATE TABLE `home_flat`;
-- --------------------------------------------------------

--
-- Структура таблицы `rcs`
--

DROP TABLE IF EXISTS `rcs`;
CREATE TABLE IF NOT EXISTS `rcs` (
  `id_rc` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_builder` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `address` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `rcs`
--

TRUNCATE TABLE `rcs`;
--
-- Дамп данных таблицы `rcs`
--

INSERT INTO `rcs` (`id_rc`, `status`, `id_builder`, `name`, `address`) VALUES
(1, 1, 1, 'First', 'No address');

-- --------------------------------------------------------

--
-- Структура таблицы `rc_home`
--

DROP TABLE IF EXISTS `rc_home`;
CREATE TABLE IF NOT EXISTS `rc_home` (
  `id_rc` int(11) NOT NULL,
  `id_home` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `rc_home`
--

TRUNCATE TABLE `rc_home`;
-- --------------------------------------------------------

--
-- Структура таблицы `rc_status`
--

DROP TABLE IF EXISTS `rc_status`;
CREATE TABLE IF NOT EXISTS `rc_status` (
  `id_status` int(11) NOT NULL,
  `description` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `rc_status`
--

TRUNCATE TABLE `rc_status`;
--
-- Дамп данных таблицы `rc_status`
--

INSERT INTO `rc_status` (`id_status`, `description`) VALUES
(2, 'Сдано'),
(1, 'Строится');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `area_rc`
--
ALTER TABLE `area_rc`
  ADD PRIMARY KEY (`id_rc`,`id_area`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_rc` (`id_rc`);

--
-- Индексы таблицы `builders`
--
ALTER TABLE `builders`
  ADD PRIMARY KEY (`id_builder`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id_flat`),
  ADD KEY `id_flat` (`id_flat`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `flat_status`
--
ALTER TABLE `flat_status`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `description` (`description`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id_home`),
  ADD KEY `id_home` (`id_home`);

--
-- Индексы таблицы `home_flat`
--
ALTER TABLE `home_flat`
  ADD PRIMARY KEY (`id_home`,`id_flat`),
  ADD KEY `home_flat` (`id_flat`);

--
-- Индексы таблицы `rcs`
--
ALTER TABLE `rcs`
  ADD PRIMARY KEY (`id_rc`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id_rc` (`id_rc`),
  ADD KEY `id_builder` (`id_builder`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `rc_home`
--
ALTER TABLE `rc_home`
  ADD PRIMARY KEY (`id_rc`,`id_home`),
  ADD KEY `id_rc` (`id_rc`),
  ADD KEY `id_home` (`id_home`);

--
-- Индексы таблицы `rc_status`
--
ALTER TABLE `rc_status`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `description` (`description`),
  ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `builders`
--
ALTER TABLE `builders`
  MODIFY `id_builder` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `rcs`
--
ALTER TABLE `rcs`
  MODIFY `id_rc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `area_rc`
--
ALTER TABLE `area_rc`
  ADD CONSTRAINT `area_rc` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rc_area` FOREIGN KEY (`id_rc`) REFERENCES `rcs` (`id_rc`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `flats`
--
ALTER TABLE `flats`
  ADD CONSTRAINT `flat_status` FOREIGN KEY (`status`) REFERENCES `flat_status` (`id_status`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `home_flat`
--
ALTER TABLE `home_flat`
  ADD CONSTRAINT `flat_home` FOREIGN KEY (`id_home`) REFERENCES `homes` (`id_home`) ON UPDATE CASCADE,
  ADD CONSTRAINT `home_flat` FOREIGN KEY (`id_flat`) REFERENCES `flats` (`id_flat`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `rcs`
--
ALTER TABLE `rcs`
  ADD CONSTRAINT `rc_builder` FOREIGN KEY (`id_builder`) REFERENCES `builders` (`id_builder`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rc_stat` FOREIGN KEY (`status`) REFERENCES `rc_status` (`id_status`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `rc_home`
--
ALTER TABLE `rc_home`
  ADD CONSTRAINT `home_rc` FOREIGN KEY (`id_home`) REFERENCES `homes` (`id_home`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rc_home` FOREIGN KEY (`id_rc`) REFERENCES `rcs` (`id_rc`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
