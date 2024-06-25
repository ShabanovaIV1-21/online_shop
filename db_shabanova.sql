-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 29 2024 г., 11:31
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_shabanova`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES
(1, 1, 'Статья о том, как я погулял', 'Шёл я,  значит, по тротуару, как вдруг ... ', '2024-02-14 17:27:02'),
(2, 1, 'Пост о жизни', 'Сидел я тут на кухне с друганом, и тут он задал такой вопрос', '2024-02-14 17:27:02');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `parent_id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `description`) VALUES
(1, 0, 'Для питьевой воды', NULL),
(2, 0, 'Сменные модули', NULL),
(3, 0, 'Для ванной', NULL),
(4, 0, 'В коттедж', NULL),
(5, 1, 'Стационарные системы с краном', NULL),
(6, 1, 'Смарт-фильтры', NULL),
(7, 2, 'Картриджи для фильтров-кувшинов и смарт-фильтров', NULL),
(8, 2, 'Модули и наборы для стационарных систем', NULL),
(9, 3, 'Комплекты', NULL),
(10, 3, 'Корпуса', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qty` tinyint UNSIGNED NOT NULL,
  `total` decimal(6,2) NOT NULL DEFAULT '0.00',
  `status` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `user_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `qty` tinyint UNSIGNED NOT NULL,
  `total` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `old_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no-image.png',
  `is_offer` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `content`, `price`, `old_price`, `description`, `img`, `is_offer`) VALUES
(1, 5, 'Аквафор DWM-101S Морион', 'Мини-завод питьевой воды для большой семьи. Абсолютная безопасность для людей с аллергиями, чувствительным пищеварением и новорожденных.', '0.00', '0.00', NULL, 'img1.jpg', 0),
(2, 6, 'J.SHMIDT 501 мобильная система фильтрации', 'Глубокая очистка водопроводной воды, которая всегда под рукой. Подходит всем, кто часто меняет место жительства, ездит в командировки, путешествует и продолжает заботиться о своем здоровье. ', '0.00', '0.00', NULL, 'img2.jpg', 0),
(3, 7, 'Сменный модуль А5', 'Повышенный ресурс очистки в условиях сложной воды. Минерализация магнием.', '50.00', '0.00', NULL, 'img3.jpg', 0),
(4, 8, 'Комплект сменных модулей для Аквафор ECO H Pro', 'Модуль Pro H рассчитан на воду малой или средней жесткости (до 5 мг-экв/л) и требует регенерации соляным раствором, при высокой жесткости — раз в 2-3 недели.', '0.00', '0.00', NULL, 'img4.jpg', 0),
(5, 9, 'АКВАФОР Викинг 300 для холодной воды + сменный модуль B520 PRO', 'Для всех, кто заботится о чистоте воды во всем доме, здоровье кожи и качестве жизни. ', '0.00', '0.00', NULL, 'img5.jpg', 0),
(6, 10, 'Корпус Аквафор Викинг 300', 'Долговечный магистральный фильтр для всех, кто заботится о ежедневном комфорте, здоровье кожи и бесперебойной работе техники.', '0.00', '0.00', NULL, 'img6.jpg', 0),
(7, 4, 'Умягчитель АКВАФОР WS1000 (А1000, S1000)', 'Очистка воды от железа, марганца и солей жесткости.', '70.00', '0.00', NULL, 'img7.jpg', 0),
(8, 5, 'Аквафор Фаворит', 'Подходит для ситуаций повышенной потребности в питьевой воде, удобен для большой семьи, подходит для коттеджа, офиса, детского сада или медицинского учреждения.', '0.00', '0.00', NULL, 'img8.jpg', 0),
(9, 7, 'Сменный модуль А6', 'Повышенный ресурс очистки в условиях сложной воды. Замедление образования накипи', '0.00', '0.00', NULL, 'img9.jpg', 0),
(10, 8, 'Комплект сменных модулей для АКВАФОР Baby Pro', 'Дополнительная защита от гормонов и антибиотиков в воде для семей с детьми любого возраста и людей склонных к аллергиям.', '0.00', '0.00', NULL, 'img10.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `nickname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `is_confirmed`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, 'admin', 'hash1', 'token1', '2024-02-14 17:18:50'),
(2, 'user', 'user@gmail.com', 1, 'user', 'hash2', 'token2', '2024-02-14 17:18:50'),
(3, 'aboba', 'aboba@aboba.com', 1, 'user', '$2y$10$jILlrN/AuPbFz7PrhghvT.eAbpQ7HAnTYxF2PmgDEmGHaogAIO5sG', '176e6f6c3942bb563153ed7b336d56304dbf831de9174a60f3d552bc06abf9a7fbfad1c5eddc883f', '2024-03-27 16:01:53');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
