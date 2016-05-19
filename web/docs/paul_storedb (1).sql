-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 18 2016 г., 16:28
-- Версия сервера: 5.5.49-0ubuntu0.14.04.1
-- Версия PHP: 5.5.10-1+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `paul_storedb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A2E0150FF85E0677` (`username`),
  UNIQUE KEY `UNIQ_A2E0150FE7927C74` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `is_active`) VALUES
(1, 'admin', '$2y$13$s7C3ETgSCEMnGy35RCFDNe8mpsjgpA1K5QtMjUcunPjsYYPZQj3t.', 'admin@admin.tk', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `rate` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6956883F5E237E06` (`name`),
  UNIQUE KEY `UNIQ_6956883F77153098` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `is_default`, `rate`) VALUES
(10, 'Гривна', 'грн', 0, 7.00),
(11, 'Polski złoty', 'pln', 1, 1.00);

-- --------------------------------------------------------

--
-- Структура таблицы `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword_val` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `keywords`
--

INSERT INTO `keywords` (`keyword_id`, `keyword_val`, `page_id`) VALUES
(1, 'login', 1),
(2, 'wishlist', 1),
(3, 'all_categories', 1),
(4, 'contact_us', 1),
(5, 'cart', 1),
(6, 'stores', 1),
(7, 'notice_js_disabled', 1),
(8, 'js_disabled', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `lang_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`lang_id`, `lang_code`, `lang_name`) VALUES
(1, 'en', 'English'),
(2, 'ru', 'Русский'),
(3, 'pl', 'Polski');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`) VALUES
(1, 'index'),
(2, 'category'),
(3, 'cart');

-- --------------------------------------------------------

--
-- Структура таблицы `translations`
--

CREATE TABLE IF NOT EXISTS `translations` (
  `keyword_id` int(11) NOT NULL,
  `lang_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `translation` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `translations`
--

INSERT INTO `translations` (`keyword_id`, `lang_code`, `translation`) VALUES
(1, 'en', 'Login'),
(1, 'pl', 'Logowanie'),
(1, 'ru', 'Вход'),
(2, 'en', 'Wishlist'),
(3, 'en', 'All categories'),
(4, 'en', 'Contacts'),
(5, 'en', 'Cart'),
(6, 'en', 'Stores'),
(7, 'en', 'Notice!'),
(8, 'en', 'JavaScript is disabled. Please, enable JavaScript on your browser for correct work with system');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
