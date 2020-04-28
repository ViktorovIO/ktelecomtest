-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2020 г., 21:28
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ktelecomtest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `city_bk` varchar(50) DEFAULT NULL,
  `contract` int(20) NOT NULL,
  `abonent_name` varchar(100) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `zip_code` int(6) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `district` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `dtc` datetime NOT NULL,
  `dtu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`city_bk`, `contract`, `abonent_name`, `phone`, `last_name`, `first_name`, `second_name`, `birth_date`, `zip_code`, `country`, `region`, `district`, `city`, `street`, `dtc`, `dtu`) VALUES
('', 112, 'K-Telecom', 556412, 'Р?РІР°РЅРѕРІ', 'Р?РІР°РЅ', 'Р?РІР°РЅРѕРІРёС‡', '1984-04-11', 620135, 'Р РѕСЃСЃРёСЏ', 'РЎРІРµСЂРґР»РѕРІСЃРєР°СЏ', '', 'Р•РєР°С‚РµСЂРёРЅР±СѓСЂРі', 'Р¤СЂРµР·РµСЂРѕРІС‰РёРєРѕРІ', '2020-04-23 20:24:19', '2020-04-23 22:25:30');

--
-- Триггеры `employee`
--
DELIMITER $$
CREATE TRIGGER `employee_before_del_tr` BEFORE DELETE ON `employee` FOR EACH ROW BEGIN
         SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DELETE canceled';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`) VALUES
(1, 'ktelecomtest', '000000');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD UNIQUE KEY `contract` (`contract`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
