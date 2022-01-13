-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 13 2022 г., 12:10
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `brand`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `home` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `state`, `city`, `street`, `home`) VALUES
(1, 1, 'Кузбасс', 'Кемерово', 'Ленина', '1'),
(3, 4, 'Кузбасс', 'Кемерово', 'Ленина', '45'),
(5, 66, 'Новосибирская область', 'Новосибирск', 'Красная', '54');

-- --------------------------------------------------------

--
-- Структура таблицы `brand_names`
--

CREATE TABLE `brand_names` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `metadata` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `media`
--

INSERT INTO `media` (`id`, `filename`, `metadata`) VALUES
(1, 'product1.png', NULL),
(2, 'product2.png', NULL),
(3, 'product3.png', NULL),
(4, 'product4.png', NULL),
(5, 'product5.png', NULL),
(6, 'product6.png', NULL),
(7, 'product7.png', NULL),
(8, 'product8.png', NULL),
(9, 'product9.png', NULL),
(10, 'product10.png', NULL),
(11, 'product11.png', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `number_products`
--

CREATE TABLE `number_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_product_id` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_product_id`, `created_at`, `updated_at`) VALUES
(1, 46, 1, '2022-01-10 15:59:13', '2022-01-10 15:59:13'),
(2, 46, 2, '2022-01-10 15:59:14', '2022-01-10 15:59:14'),
(3, 46, 3, '2022-01-10 15:59:15', '2022-01-10 15:59:15'),
(18, 3, 18, '2022-01-11 21:45:53', '2022-01-11 21:45:53'),
(19, 3, 19, '2022-01-11 21:45:54', '2022-01-11 21:45:54'),
(20, 3, 20, '2022-01-11 21:45:55', '2022-01-11 21:45:55'),
(28, 5, 28, '2022-01-12 08:07:48', '2022-01-12 08:07:48'),
(29, 5, 29, '2022-01-12 08:07:50', '2022-01-12 08:07:50'),
(30, 68, 30, '2022-01-12 08:33:49', '2022-01-12 08:33:49'),
(31, 68, 31, '2022-01-12 08:33:50', '2022-01-12 08:33:50'),
(34, 4, 34, '2022-01-12 14:22:46', '2022-01-12 14:22:46'),
(35, 4, 35, '2022-01-12 14:22:47', '2022-01-12 14:22:47'),
(36, 4, 36, '2022-01-12 14:22:48', '2022-01-12 14:22:48');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_product`
--

CREATE TABLE `orders_product` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED DEFAULT '11',
  `size_id` bigint UNSIGNED DEFAULT '5',
  `total` int UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders_product`
--

INSERT INTO `orders_product` (`id`, `product_id`, `color_id`, `size_id`, `total`) VALUES
(1, 4, 11, 5, 3),
(2, 1, 11, 5, 1),
(3, 9, 11, 5, 1),
(18, 8, 11, 5, 1),
(19, 7, 11, 5, 1),
(20, 1, 11, 5, 1),
(28, 10, 11, 5, 1),
(29, 7, 11, 5, 1),
(30, 7, 11, 5, 1),
(31, 8, 11, 5, 1),
(34, 7, 11, 5, 1),
(35, 5, 11, 5, 1),
(36, 3, 11, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `photo_products`
--

CREATE TABLE `photo_products` (
  `id` bigint UNSIGNED NOT NULL,
  `media_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `photo_products`
--

INSERT INTO `photo_products` (`id`, `media_id`, `product_id`, `color_id`) VALUES
(1, 1, 1, 1),
(2, 3, 3, 13),
(3, 4, 4, 14),
(4, 5, 5, 15),
(5, 6, 6, 16),
(6, 7, 7, 17),
(7, 8, 8, 18),
(8, 9, 9, 19),
(9, 10, 10, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `description` text,
  `price` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `brand_id`, `category_id`, `description`, `price`) VALUES
(1, 'The Park', NULL, 1, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '52.00'),
(2, 'Cardigan', NULL, 1, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '55.00'),
(3, 'Sweater', NULL, 1, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '50.50'),
(4, 'ELLERY X M\'O CAPSULE', NULL, 1, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '52.00'),
(5, 'Blazer', NULL, 2, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '62.00'),
(6, 'Romper', NULL, 2, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '72.00'),
(7, 'T-shirt', NULL, 1, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '42.72'),
(8, 'Bermuda', NULL, 1, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '35.80'),
(9, 'Leather jacket', NULL, 1, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '50.55'),
(10, 'Cardigan', NULL, 1, 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', '52.70');

-- --------------------------------------------------------

--
-- Структура таблицы `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` enum('men','women','kids','accesories') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product_categories`
--

INSERT INTO `product_categories` (`id`, `category`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'kids'),
(4, 'accesories');

-- --------------------------------------------------------

--
-- Структура таблицы `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `color` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product_colors`
--

INSERT INTO `product_colors` (`id`, `color`) VALUES
(1, 'Beige'),
(2, 'Lavender'),
(3, 'DarkSlateGray'),
(4, 'PaleGoldenRod'),
(5, 'PowderBlue'),
(6, 'Cyan'),
(7, 'PaleGoldenRod'),
(8, 'Orange'),
(9, 'MediumSlateBlue'),
(10, 'Peru'),
(11, 'White'),
(12, 'GreenYellow'),
(13, 'WhiteSmoke'),
(14, 'DarkViolet'),
(15, 'Ivory'),
(16, 'Tan'),
(17, 'DimGray'),
(18, 'DarkBlue'),
(19, 'DimGray'),
(20, 'BlanchedAlmond');

-- --------------------------------------------------------

--
-- Структура таблицы `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `size`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, 'XXXL'),
(8, 'XXXXL');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews_product`
--

CREATE TABLE `reviews_product` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews_shop`
--

CREATE TABLE `reviews_shop` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'anonymous',
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'anonymous',
  `email` varchar(120) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `roles` varchar(20) DEFAULT 'user',
  `password` varchar(100) DEFAULT NULL,
  `hash` varchar(120) DEFAULT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `gender`, `roles`, `password`, `hash`, `media_id`, `created_at`) VALUES
(1, 'Владимир', 'Славгородский', 'Vladimir@vladimir.ru', 'male', 'admin', '$2y$10$gNPHzphNrt8bNOzGdy45MOGsKebgjouz2i8ZaTAcZGMbFRdZ.ZOvW', '419565561dfe76b3db632.12065384', NULL, '2022-01-06 22:31:26'),
(2, 'Василий', 'Васильев', 'Vasiliy@vasiliev.com', 'male', 'user', '$2y$10$Ph1aRM2s2fxIRVQir8L9xu0cF5.2BqhfIotBMDa2f.xhEag0OfVL6', NULL, NULL, '2022-01-07 09:33:43'),
(3, 'Ирина', 'Иванова', 'Irina@ivanova.com', 'female', 'user', '$2y$10$ihsCiZW3cNm6vwZXPqJSyO9Gi0vndhc7edAre3uuKlKvqSLQAqsVC', '59471530561dd96b77acca0.26488172', NULL, '2022-01-07 09:43:14'),
(4, 'Иван', 'Иванов', 'ivan@ivanov.com', 'male', 'user', '$2y$10$QPHKziMmHf/DyV5kop0X1eskR5yv9NlxfS2K1AZrNKhlZISGo1lQ.', '155821619661de81afb20246.38651236', NULL, '2022-01-07 22:59:25'),
(5, 'Василиса', 'Васильева', 'vasilisa@vasileva.com', 'female', 'user', '$2y$10$7ZGU/0LPexmcEBcsfK7ukemPOIb2inTsDMYjC/Iz457/DCAWBm4f6', '93953239861de29c65057f4.79848471', NULL, '2022-01-07 23:11:22'),
(6, 'Надежда', 'Надежкина', 'Nalia@Nadia.com', 'female', 'user', '$2y$10$Kyjm85Cn7IJr6JwKDctSnO6nq42/ZGJIxxWAGwZhFHo7z8hZHEp7O', NULL, NULL, '2022-01-07 23:15:48'),
(46, 'anonymous', 'anonymous', NULL, NULL, 'user', NULL, '1q6igh45jq1f9hm500s4hir3u26ae2hd', NULL, '2022-01-10 15:59:07'),
(66, 'Светлана', 'Светлая', 'svetlana@svetlaya.com', 'female', 'user', '$2y$10$QkKDN8szly6BrKbWI1BkQOmYbQUaQaxTIc5eBHSGsAAl3SbTN/7ku', '173945261961de639e36ee75.74773875', NULL, '2022-01-12 08:26:17'),
(68, 'Андрей ', 'Андреев', 'andrey@andreev.com', 'male', 'user', '$2y$10$9MtXPCEGkkuZutTrtmNeE.tQNvZMDmWmWCWprghneOLST4zX5rv4S', '6153266061de2ff5e848b1.94737540', NULL, '2022-01-12 08:28:09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `brand_names`
--
ALTER TABLE `brand_names`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `number_products`
--
ALTER TABLE `number_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_product_id` (`order_product_id`);

--
-- Индексы таблицы `orders_product`
--
ALTER TABLE `orders_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Индексы таблицы `photo_products`
--
ALTER TABLE `photo_products`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `media_id` (`media_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `product_categories`
--
ALTER TABLE `product_categories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `product_colors`
--
ALTER TABLE `product_colors`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `reviews_product`
--
ALTER TABLE `reviews_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `reviews_shop`
--
ALTER TABLE `reviews_shop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_firstname_lastname_idx` (`firstname`,`lastname`),
  ADD KEY `media_id` (`media_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `brand_names`
--
ALTER TABLE `brand_names`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `number_products`
--
ALTER TABLE `number_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `orders_product`
--
ALTER TABLE `orders_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `photo_products`
--
ALTER TABLE `photo_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `reviews_product`
--
ALTER TABLE `reviews_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reviews_shop`
--
ALTER TABLE `reviews_shop`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `number_products`
--
ALTER TABLE `number_products`
  ADD CONSTRAINT `number_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `number_products_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`),
  ADD CONSTRAINT `number_products_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `product_sizes` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_product_id`) REFERENCES `orders_product` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders_product`
--
ALTER TABLE `orders_product`
  ADD CONSTRAINT `orders_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_product_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`),
  ADD CONSTRAINT `orders_product_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `product_sizes` (`id`);

--
-- Ограничения внешнего ключа таблицы `photo_products`
--
ALTER TABLE `photo_products`
  ADD CONSTRAINT `photo_products_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`),
  ADD CONSTRAINT `photo_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `photo_products_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand_names` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `reviews_product`
--
ALTER TABLE `reviews_product`
  ADD CONSTRAINT `reviews_product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `reviews_shop`
--
ALTER TABLE `reviews_shop`
  ADD CONSTRAINT `reviews_shop_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
