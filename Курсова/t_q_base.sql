-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Трв 19 2020 р., 10:35
-- Версія сервера: 10.4.11-MariaDB
-- Версія PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `t&q_base`
--

-- --------------------------------------------------------

--
-- Структура таблиці `login_admin`
--

CREATE TABLE `login_admin` (
  `login_` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `login_admin`
--

INSERT INTO `login_admin` (`login_`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Структура таблиці `prod_serv`
--

CREATE TABLE `prod_serv` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `price` int(60) NOT NULL,
  `image` text NOT NULL,
  `period` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `prod_serv`
--

INSERT INTO `prod_serv` (`id`, `name`, `code`, `price`, `image`, `period`) VALUES
(3, 'Financial statement audit', 'FST1', 200, 'Image/audit.jpg', '1 week'),
(4, 'Risk Assurance', 'RA1', 300, 'Image/ra.jpg', '2 week'),
(5, 'IFRS reporting', 'IFRS1', 250, 'Image/ifrs.jpg', '0.5 week'),
(6, 'Consulting', 'CON2', 300, 'Image/cons.jpg', '1 week'),
(7, 'Rorecasting', 'FOR3', 200, 'Image/forc.jpg', '1 week');

-- --------------------------------------------------------

--
-- Структура таблиці `regustration_form`
--

CREATE TABLE `regustration_form` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `regustration_form`
--

INSERT INTO `regustration_form` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(1, 'Yuliia', 'sshevchuk@gmail.com', '123'),
(2, 'Yuliia', 'yulia@gmai.com', '456'),
(3, 'Yuliia', 'yua@gmai.com', '456'),
(4, 'Yuliia', 'shevchuk@gmail.com', '123'),
(5, 'Yuliia', 'yu@gmai.com', '123');

-- --------------------------------------------------------

--
-- Структура таблиці `tovaru`
--

CREATE TABLE `tovaru` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` varchar(60) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `tovaru`
--

INSERT INTO `tovaru` (`id`, `code`, `name`, `price`, `user`) VALUES
(88, 'RA1', 'Risk Assurance', '300', 'sshevchuk@gmail.com');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`login_`);

--
-- Індекси таблиці `prod_serv`
--
ALTER TABLE `prod_serv`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `regustration_form`
--
ALTER TABLE `regustration_form`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Індекси таблиці `tovaru`
--
ALTER TABLE `tovaru`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `login_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `prod_serv`
--
ALTER TABLE `prod_serv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `regustration_form`
--
ALTER TABLE `regustration_form`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `tovaru`
--
ALTER TABLE `tovaru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
