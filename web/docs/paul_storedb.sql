-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 07 2016 г., 16:03
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
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_keyword` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`c_id`, `c_keyword`) VALUES
(1, 'phones'),
(2, 'tablets'),
(3, 'laptops');

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `rate` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6956883F5E237E06` (`name`),
  UNIQUE KEY `UNIQ_6956883F77153098` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `is_default`, `rate`) VALUES
(11, 'Złoty', 'PLN', 1, 1.0000),
(16, 'Euro', 'EUR', 0, 0.2000);

-- --------------------------------------------------------

--
-- Структура таблицы `c_translations`
--

CREATE TABLE IF NOT EXISTS `c_translations` (
  `c_id` int(5) NOT NULL,
  `lang_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `translation` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `c_translations`
--

INSERT INTO `c_translations` (`c_id`, `lang_code`, `translation`) VALUES
(1, 'en', 'Phones'),
(1, 'ru', 'Телефоны'),
(1, 'pl', 'Komórki');

-- --------------------------------------------------------

--
-- Структура таблицы `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword_val` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=93 ;

--
-- Дамп данных таблицы `keywords`
--

INSERT INTO `keywords` (`keyword_id`, `keyword_val`, `page_id`) VALUES
(76, 'login', 1),
(77, 'wishlist', 1),
(78, 'compare', 1),
(79, 'blog', 1),
(80, 'all_categories', 1),
(81, 'contact_us', 1),
(82, 'cart', 1),
(83, 'stores', 1),
(84, 'notice_js_disabled', 1),
(85, 'js_disabled', 1),
(88, 'Test', 1),
(90, 'more', 1),
(92, 'title', 2);

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
(1, 'header'),
(2, 'index'),
(3, 'category');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `c_keyword` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `translations`
--

CREATE TABLE IF NOT EXISTS `translations` (
  `keyword_id` int(5) NOT NULL,
  `lang_code` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `translation` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `translations`
--

INSERT INTO `translations` (`keyword_id`, `lang_code`, `translation`) VALUES
(76, 'en', 'Log in'),
(76, 'pl', 'Logowanie'),
(76, 'ru', 'Вход'),
(77, 'en', 'Wishlist'),
(77, 'pl', 'Ulubione'),
(77, 'ru', 'Избранное'),
(78, 'ru', 'Сравнение'),
(78, 'pl', 'Porównaj'),
(78, 'en', 'Compare'),
(79, 'en', 'Blog'),
(79, 'ru', 'Блог'),
(79, 'pl', 'Blog'),
(80, 'en', 'All Categories'),
(80, 'pl', 'Wszystkie kategorie'),
(80, 'ru', 'Все категории'),
(81, 'en', 'Contact us'),
(81, 'pl', 'Kontakt'),
(81, 'ru', 'Контакты'),
(82, 'pl', 'Koszyk'),
(82, 'ru', 'Корзина'),
(82, 'en', 'Cart'),
(83, 'en', 'Stores'),
(83, 'pl', 'Sklepy'),
(83, 'ru', 'Магазины'),
(84, 'en', 'Notice!'),
(84, 'ru', 'Внимание!'),
(84, 'pl', 'Uwaga!'),
(85, 'en', 'JavaScript is disabled. Please, enable JavaScript on your browser for correct work with system'),
(85, 'ru', 'Выполнение JavaScript отключено. Включите JavaScript для корректной работы сайта'),
(85, 'pl', 'JavaScript jest wyłączony. Proszę włączyć JavaScript dla poprawnego działania strony'),
(90, 'en', 'More'),
(90, 'ru', 'Больше'),
(90, 'pl', 'Więcej'),
(92, 'en', 'Smartstore'),
(92, 'pl', 'Smartstore'),
(92, 'ru', 'Smartstore');

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
