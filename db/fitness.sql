-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 17 2020 г., 20:04
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fitness`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `title`) VALUES
(1, 'Xiaomi'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Garmin'),
(5, 'Huawei'),
(6, 'Elari');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `watch_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp() COMMENT 'когда создан',
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `watch_id`, `date`, `text`) VALUES
(1, 6, 1, '2020-11-17 16:13:45', 'Отличные часы!');

-- --------------------------------------------------------

--
-- Структура таблицы `comparison`
--

CREATE TABLE `comparison` (
  `id` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comparison`
--

INSERT INTO `comparison` (`id`, `watch_id`, `user_id`) VALUES
(1, 1, 6),
(2, 2, 6),
(3, 3, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `role_id`) VALUES
(6, 'user@gmail.com', '$2y$13$5R8ZS0hRzIkOfskHm2R5PO/Z/ktFbsJv/kTa15R4P1ytYa9yhevwK', 'Виталий', 'Россь', 3),
(8, 'admin@gmail.com', '$2y$13$iyj3YkCtDL6.ToaUPtEpe.9V8qSj7MoPBcY0zs1ywWwFgkZ7yFpRe', 'Администратор', 'Администраторович', 1),
(9, 'moderator@mail.comg', '$2y$13$0SsBjkjH1WGqXkp3kdVldeG5WNR/Q5GjZgEhL7Mncsq2k6N2eB.62', 'Модератор', 'Модераторович', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `isModerator` int(11) NOT NULL DEFAULT 0 COMMENT 'права модератора',
  `isAdmin` int(11) NOT NULL DEFAULT 0 COMMENT 'права администратора'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id`, `isModerator`, `isAdmin`) VALUES
(1, 0, 1),
(2, 1, 0),
(3, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `watch`
--

CREATE TABLE `watch` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL COMMENT 'название часов',
  `img` varchar(255) NOT NULL COMMENT 'изображение',
  `description` varchar(255) NOT NULL COMMENT 'описание',
  `price` int(11) NOT NULL COMMENT 'цена',
  `pulse` tinyint(4) DEFAULT 0 COMMENT 'функция измерения пульса',
  `nfc` tinyint(4) DEFAULT 0 COMMENT 'функция NFC',
  `brand_id` int(11) DEFAULT NULL COMMENT 'брэнд (связь с таблицей)',
  `charging_id` int(11) DEFAULT NULL COMMENT 'тип зарядки (связь с таблицей)',
  `system_id` int(11) DEFAULT NULL COMMENT 'совместимая система',
  `mic` tinyint(4) DEFAULT 0 COMMENT 'наличие микрофона',
  `display` tinyint(4) DEFAULT 1 COMMENT 'наличие дисплея',
  `type_id` int(11) NOT NULL COMMENT 'тип (часы или браслет)',
  `calories` tinyint(4) DEFAULT 0 COMMENT 'мониторинг калорий',
  `sleep` tinyint(4) DEFAULT 0 COMMENT 'мониторинг сна',
  `moisture` tinyint(4) DEFAULT 0 COMMENT 'влагозащита',
  `weather` tinyint(4) DEFAULT NULL COMMENT 'показывают погоду',
  `date` date DEFAULT current_timestamp() COMMENT 'дата выхода'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `watch`
--

INSERT INTO `watch` (`id`, `title`, `img`, `description`, `price`, `pulse`, `nfc`, `brand_id`, `charging_id`, `system_id`, `mic`, `display`, `type_id`, `calories`, `sleep`, `moisture`, `weather`, `date`) VALUES
(1, 'Xiaomi Mi Band 5', 'xiaomi-mi-band-5.png', 'Xiaomi Mi Band 5', 1, 1, 0, 1, 1, 1, 0, 1, 2, 1, 1, 1, 1, '2020-05-14'),
(2, 'Huawei Band 3 Pro', 'huawei-band-3-pro.png', 'Huawei Band 3 Pro', 1000, 1, 1, 5, 1, 1, 1, 1, 2, 1, 1, 0, 1, '2020-05-31'),
(3, 'Apple Watch Series 6', 'apple-watch-serires-6.png', 'Apple Watch Series 6', 16000, 0, 1, 3, 2, 2, 1, 1, 1, 0, 1, 0, 1, '2020-07-10'),
(4, 'Apple Watch SE', 'apple-watch-SE.png', 'Apple Watch SE', 26000, 1, 1, 3, 2, 2, 1, 1, 1, 1, 1, 0, 1, '2020-11-15'),
(5, 'Garmin Descent MK2', 'garmin-descent-mk2.png', 'Garmin Descent MK2', 40000, 1, 1, 4, 2, 1, 1, 1, 1, 1, 1, 1, 1, '2020-11-13'),
(6, 'Elari SmartPay', 'elari-smartpay.png', 'Elari SmartPay', 1500, 1, 1, 6, 2, 1, 0, 0, 2, 0, 0, 1, 0, NULL),
(7, 'Samsung Galaxy Watch Active2', 'samsung-galaxy-watch-active2.png', 'Samsung Galaxy Watch Active2', 18000, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2020-11-01');

-- --------------------------------------------------------

--
-- Структура таблицы `watch_charging`
--

CREATE TABLE `watch_charging` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `watch_charging`
--

INSERT INTO `watch_charging` (`id`, `title`) VALUES
(1, 'USB type-c'),
(2, 'Свой');

-- --------------------------------------------------------

--
-- Структура таблицы `watch_os`
--

CREATE TABLE `watch_os` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `watch_os`
--

INSERT INTO `watch_os` (`id`, `title`) VALUES
(1, 'Android'),
(2, 'iOS');

-- --------------------------------------------------------

--
-- Структура таблицы `watch_type`
--

CREATE TABLE `watch_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `watch_type`
--

INSERT INTO `watch_type` (`id`, `title`) VALUES
(1, 'Умные часы'),
(2, 'Умный браслет');

-- --------------------------------------------------------

--
-- Структура таблицы `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `watch_id`) VALUES
(1, 6, 7),
(4, 6, 3),
(37, 8, 1),
(38, 8, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comparison`
--
ALTER TABLE `comparison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watch_id` (`watch_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `charging_id` (`charging_id`),
  ADD KEY `system_id` (`system_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Индексы таблицы `watch_charging`
--
ALTER TABLE `watch_charging`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `watch_os`
--
ALTER TABLE `watch_os`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `watch_type`
--
ALTER TABLE `watch_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `watch_id` (`watch_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `comparison`
--
ALTER TABLE `comparison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `watch`
--
ALTER TABLE `watch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `watch_charging`
--
ALTER TABLE `watch_charging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `watch_os`
--
ALTER TABLE `watch_os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `watch_type`
--
ALTER TABLE `watch_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comparison`
--
ALTER TABLE `comparison`
  ADD CONSTRAINT `comparison_ibfk_1` FOREIGN KEY (`watch_id`) REFERENCES `watch` (`id`),
  ADD CONSTRAINT `comparison_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `watch`
--
ALTER TABLE `watch`
  ADD CONSTRAINT `watch_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `watch_type` (`id`),
  ADD CONSTRAINT `watch_ibfk_2` FOREIGN KEY (`charging_id`) REFERENCES `watch_charging` (`id`),
  ADD CONSTRAINT `watch_ibfk_3` FOREIGN KEY (`system_id`) REFERENCES `watch_os` (`id`),
  ADD CONSTRAINT `watch_ibfk_4` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Ограничения внешнего ключа таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`watch_id`) REFERENCES `watch` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_3` FOREIGN KEY (`watch_id`) REFERENCES `watch` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_4` FOREIGN KEY (`watch_id`) REFERENCES `watch` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
