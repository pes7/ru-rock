-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 27 2021 г., 19:47
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rurock`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albom`
--

CREATE TABLE `albom` (
  `id` int(8) NOT NULL,
  `bandId` int(8) NOT NULL,
  `lable` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `albomTag` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `albom`
--

INSERT INTO `albom` (`id`, `bandId`, `lable`, `image`, `albomTag`, `date`) VALUES
(1, 1, 'Albom1', 'img/alboms/Symphonia БГ.jpg', 'symphony', '2021-08-27');

-- --------------------------------------------------------

--
-- Структура таблицы `band`
--

CREATE TABLE `band` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `bandTag` varchar(150) NOT NULL,
  `discript` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `band`
--

INSERT INTO `band` (`id`, `name`, `image`, `bandTag`, `discript`) VALUES
(1, 'БГ', 'http://d1ob8phwwne29y.cloudfront.net/content/thumbs/3495221/1517145162_1440.jpeg_big.jpg', 'akvarium', 'радянський та російський рок-гурт, один з найдавніших нині діючих російських рок-гуртів. Дата заснування — 1972 рік. Незмінний член та лідер гурту — Борис Гребенщиков. Членами гурту в різний час були Анатолій Гуницький, Дюша Романов, Сергій Курьохін, Олег Сакмаров, Всеволод Гаккель та ін.');

-- --------------------------------------------------------

--
-- Структура таблицы `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `idAlbom` int(11) NOT NULL,
  `lable` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `track`
--

INSERT INTO `track` (`id`, `idAlbom`, `lable`, `url`) VALUES
(1, 1, '01. Увертюра _ Сирин, Алконост, Гамаюн (Live)', 'http://ru-rock.ua/music//akvarium/symphony/01. Увертюра _ Сирин, Алконост, Гамаюн (Live).mp3'),
(2, 1, '02. Дело мастера Бо (Live)', 'http://ru-rock.ua/music//akvarium/symphony/02. Дело мастера Бо (Live).mp3'),
(3, 1, '03. Из хрустального захолустья (Live)', 'http://ru-rock.ua/music//akvarium/symphony/03. Из хрустального захолустья (Live).mp3'),
(4, 1, '04. Навигатор (Live)', 'http://ru-rock.ua/music//akvarium/symphony/04. Навигатор (Live).mp3'),
(5, 1, '05. Фавн (Live)', 'http://ru-rock.ua/music//akvarium/symphony/05. Фавн (Live).mp3'),
(6, 1, '06. Интерлюдия (Live)', 'http://ru-rock.ua/music//akvarium/symphony/06. Интерлюдия (Live).mp3'),
(7, 1, '07. Небо цвета дождя (Live)', 'http://ru-rock.ua/music//akvarium/symphony/07. Небо цвета дождя (Live).mp3'),
(8, 1, '08. Туман над Янцзы (Live)', 'http://ru-rock.ua/music//akvarium/symphony/08. Туман над Янцзы (Live).mp3'),
(9, 1, '09. Жёлтая Луна (USB) (Live)', 'http://ru-rock.ua/music//akvarium/symphony/09. Жёлтая Луна (USB) (Live).mp3'),
(10, 1, '10. Цветы Йошивары (Live)', 'http://ru-rock.ua/music//akvarium/symphony/10. Цветы Йошивары (Live).mp3'),
(11, 1, '11. Stella Maris (Live)', 'http://ru-rock.ua/music//akvarium/symphony/11. Stella Maris (Live).mp3'),
(12, 1, '12. День радости (Live)', 'http://ru-rock.ua/music//akvarium/symphony/12. День радости (Live).mp3');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `albom`
--
ALTER TABLE `albom`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `albom`
--
ALTER TABLE `albom`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `band`
--
ALTER TABLE `band`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
