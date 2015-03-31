-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- ����: localhost
-- ����� ��������: ��� 17 2015 �., 14:33
-- ������ �������: 5.6.20
-- ������ PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- ���� ������: `BOOKSHOP`
--


--
-- ������� `AUTHORS`
--

CREATE TABLE IF NOT EXISTS `AUTHORS` (
`id_author` int(11) NOT NULL,
  `author` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- ������� `BASKET`
--

CREATE TABLE IF NOT EXISTS `BASKET` (
`id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- �������`BOOKAUTHORS`
--

CREATE TABLE IF NOT EXISTS `BOOK2AUTHORS` (
`id` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- ������� `BOOKGENRE`
--

CREATE TABLE IF NOT EXISTS `BOOK2GENRE` (
`id` int(11) NOT NULL,
  `id_ganre` int(11) NOT NULL,
  `id_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- ������� `GENRES`
--

CREATE TABLE IF NOT EXISTS `GENRES` (
`genres_id` int(11) NOT NULL,
  `genres` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;


--
-- ������� `CATALOGBOOKS`
--

CREATE TABLE IF NOT EXISTS `CATALOGBOOKS` (
`id_book` int(11) NOT NULL,
  `title_book` varchar(250) NOT NULL,
  `short_description` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- ������� `ORDERITEMS`
--

CREATE TABLE IF NOT EXISTS `ORDERITEMS` (
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- ������� `ORDERS`
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
-- ������� `PAYMENT`
--

CREATE TABLE IF NOT EXISTS `PAYMENT` (
`payment_id` int(11) NOT NULL,
  `payment_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- ������� `STATUSORDER`
--

CREATE TABLE IF NOT EXISTS `STATUSORDER` (
`status_id` int(11) NOT NULL,
  `status_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;



--
-- ������� `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
`user_id` int(11) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `discount_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;


--
-- ������� `DISCOUNT`
--

CREATE TABLE IF NOT EXISTS `DISCOUNT` (
	`discount_id` int(11) NOT NULL,
	`discount_size` int(5) NOT NULL	
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;


--
-- ������� ������� `AUTHORS`
--
ALTER TABLE `AUTHORS`
 ADD PRIMARY KEY (`id_author`);

--
-- ������� ������� `BASKET`
--
ALTER TABLE `BASKET`
 ADD PRIMARY KEY (`id`);

--
-- ������� ������� `BOOKAUTHORS`
--
ALTER TABLE `BOOKAUTHORS`
 ADD PRIMARY KEY (`id`);

--
-- ������� ������� `BOOKGENRE`
--
ALTER TABLE `BOOKGENRE`
 ADD PRIMARY KEY (`id`);

--
-- ������� ������� `GENRES`
--
ALTER TABLE `GENRES`
 ADD PRIMARY KEY (`genres_id`);

--
-- ������� ������� `KATALOGBOOKS`
--
ALTER TABLE `CATALOGBOOKS`
 ADD PRIMARY KEY (`id_book`);

--
-- ������� ������� `ORDERS`
--
ALTER TABLE `ORDERS`
 ADD PRIMARY KEY (`order_id`);

--
-- ������� ������� `PAYMENT`
--
ALTER TABLE `PAYMENT`
 ADD PRIMARY KEY (`payment_id`);

--
-- ������� ������� `STATUSORDER`
--
ALTER TABLE `STATUSORDER`
 ADD PRIMARY KEY (`status_id`);

--
-- ������� ������� `USER`
--
ALTER TABLE `USER`
 ADD PRIMARY KEY (`user_id`);

--
-- ������� ������� `DISCOUNT`
--
ALTER TABLE `DISCOUNT`
 ADD PRIMARY KEY (`discount_id`);
 
--
-- AUTO_INCREMENT ������� `AUTHORS`
--
ALTER TABLE `AUTHORS`
MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `BASKET`
--
ALTER TABLE `BASKET`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `BOOKAUTHORS`
--
ALTER TABLE `BOOKAUTHORS`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `BOOKGENRE`
--
ALTER TABLE `BOOKGENRE`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `GENRES`
--
ALTER TABLE `GENRES`
MODIFY `genres_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `KATALOGBOOKS`
--
ALTER TABLE `KATALOGBOOKS`
MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `ORDERS`
--
ALTER TABLE `ORDERS`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `PAYMENT`
--
ALTER TABLE `PAYMENT`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `STATUSORDER`
--
ALTER TABLE `STATUSORDER`
MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `USER`
--
ALTER TABLE `USER`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT ������� `DISCOUNT`
--
ALTER TABLE `DISCOUNT`
MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;
