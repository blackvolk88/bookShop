-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 17 2015 г., 14:33
-- Версия сервера: 5.6.20
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- База данных: `BOOKSHOP`
--


--
-- Таблица `AUTHORS`
--

CREATE TABLE IF NOT EXISTS `AUTHORS` (
`id_author` int(11) NOT NULL,
  `author` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- Таблица `BASKET`
--

CREATE TABLE IF NOT EXISTS `BASKET` (
`id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- Таблица`BOOKAUTHORS`
--

CREATE TABLE IF NOT EXISTS `BOOK2AUTHORS` (
`id` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- Таблица `BOOKGENRE`
--

CREATE TABLE IF NOT EXISTS `BOOK2GENRE` (
`id` int(11) NOT NULL,
  `id_ganre` int(11) NOT NULL,
  `id_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- Таблица `GENRES`
--

CREATE TABLE IF NOT EXISTS `GENRES` (
`genres_id` int(11) NOT NULL,
  `genres` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;


--
-- Таблица `CATALOGBOOKS`
--

CREATE TABLE IF NOT EXISTS `CATALOGBOOKS` (
`id_book` int(11) NOT NULL,
  `title_book` varchar(250) NOT NULL,
  `short_description` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- Таблица `ORDERITEMS`
--

CREATE TABLE IF NOT EXISTS `ORDERITEMS` (
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- Таблица `ORDERS`
--

CREATE TABLE IF NOT EXISTS `ORDERS` (
`order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `datetime` date NOT NULL,
  `status_name` varchar(150) NOT NULL,
  `order_sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- Таблица `PAYMENT`
--

CREATE TABLE IF NOT EXISTS `PAYMENT` (
`payment_id` int(11) NOT NULL,
  `payment_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- Таблица `STATUSORDER`
--

CREATE TABLE IF NOT EXISTS `STATUSORDER` (
`status_id` int(11) NOT NULL,
  `status_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- Таблица `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
`user_id` int(11) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `discount_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;


--
-- Таблица `DISCOUNT`
--

CREATE TABLE IF NOT EXISTS `DISCOUNT` (
	`discount_id` int(11) NOT NULL,
	`discount_size` int(5) NOT NULL	
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;


--
-- Индексы таблицы `AUTHORS`
--
ALTER TABLE `AUTHORS`
 ADD PRIMARY KEY (`id_author`);

--
-- Индексы таблицы `BASKET`
--
ALTER TABLE `BASKET`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `BOOKAUTHORS`
--
ALTER TABLE `BOOKAUTHORS`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `BOOKGENRE`
--
ALTER TABLE `BOOKGENRE`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `GENRES`
--
ALTER TABLE `GENRES`
 ADD PRIMARY KEY (`genres_id`);

--
-- Индексы таблицы `KATALOGBOOKS`
--
ALTER TABLE `CATALOGBOOKS`
 ADD PRIMARY KEY (`id_book`);

--
-- Индексы таблицы `ORDERS`
--
ALTER TABLE `ORDERS`
 ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `PAYMENT`
--
ALTER TABLE `PAYMENT`
 ADD PRIMARY KEY (`payment_id`);

--
-- Индексы таблицы `STATUSORDER`
--
ALTER TABLE `STATUSORDER`
 ADD PRIMARY KEY (`status_id`);

--
-- Индексы таблицы `USER`
--
ALTER TABLE `USER`
 ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `DISCOUNT`
--
ALTER TABLE `DISCOUNT`
 ADD PRIMARY KEY (`discount_id`);
 
--
-- AUTO_INCREMENT таблицы `AUTHORS`
--
ALTER TABLE `AUTHORS`
MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `BASKET`
--
ALTER TABLE `BASKET`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `BOOKAUTHORS`
--
ALTER TABLE `BOOKAUTHORS`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `BOOKGENRE`
--
ALTER TABLE `BOOKGENRE`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `GENRES`
--
ALTER TABLE `GENRES`
MODIFY `genres_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `KATALOGBOOKS`
--
ALTER TABLE `KATALOGBOOKS`
MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `ORDERS`
--
ALTER TABLE `ORDERS`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `PAYMENT`
--
ALTER TABLE `PAYMENT`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `STATUSORDER`
--
ALTER TABLE `STATUSORDER`
MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `USER`
--
ALTER TABLE `USER`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT таблицы `DISCOUNT`
--
ALTER TABLE `DISCOUNT`
MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;
