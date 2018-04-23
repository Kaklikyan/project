-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 15 2017 г., 07:49
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `football`
--

-- --------------------------------------------------------

--
-- Структура таблицы `challenges`
--

CREATE TABLE `challenges` (
  `id` int(11) NOT NULL,
  `challenge_key` varchar(255) NOT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `challenge_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `duration` varchar(255) DEFAULT NULL,
  `referee` int(11) DEFAULT NULL,
  `vest` int(11) DEFAULT NULL,
  `previous_match_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `challenges`
--

INSERT INTO `challenges` (`id`, `challenge_key`, `from`, `to`, `date`, `challenge_date`, `duration`, `referee`, `vest`, `previous_match_id`, `status`) VALUES
(104, '1312/1213', 13, 12, '1982-02-23 10:45:00', '2017-11-15 06:24:16', 'true', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `on_map` varchar(255) DEFAULT NULL,
  `gate_width` varchar(255) DEFAULT NULL,
  `gate_height` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `total_matches` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `halls`
--

INSERT INTO `halls` (`id`, `level`, `on_map`, `gate_width`, `gate_height`, `address`, `length`, `width`, `total_matches`, `description`) VALUES
(1, 3, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3047.201042169804!2d44.500311050816684!3d40.20459067928931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abd46e6e71181%3A0x5d5de8c70dd7a0f0!2sKomitas+23+BINEOLI!5e0!3m2!1sru!2s!4v', '4', '2', 'yuiyuiuyiyui', '40', '20', '10', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry\r\n'),
(4, 4, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3050.0759512217005!2d44.46853365081465!3d40.140591879296906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abebcc1c6447b%3A0xbab912bd1bcab076!2z0KfQsNGA0LHQsNGF!5e0!3m2!1sru!2s!4v1510312546682', '23', '123', '44', '555', '213', 'sdfsdf233', 'sdfsdfsdfsdfsdfsdfsdfsdfsddfsdfsdfsdf');

-- --------------------------------------------------------

--
-- Структура таблицы `home_page_messages`
--

CREATE TABLE `home_page_messages` (
  `id` int(11) NOT NULL,
  `Sender` varchar(255) NOT NULL,
  `SenderEmail` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `home_page_messages`
--

INSERT INTO `home_page_messages` (`id`, `Sender`, `SenderEmail`, `Message`, `Date`) VALUES
(1, 'asdasdas', 'armenshnik@mail.ru', 'dsfgdsfgdsfg', '2017-07-23 09:46:30'),
(2, '111', 'armenshnik@mail.ru', 'vg1fd11f11f1d1f', '2017-07-23 09:47:20'),
(3, '111', 'armenshnik@mail.ru', 'vg1fd11f11f1d1f', '2017-07-23 10:17:23'),
(4, 'asdfsdafsdfsadfsad', 'armenshnik@mail.ru', '12321312321', '2017-07-23 10:20:45'),
(5, 'asdfsdafsdfsadfsad', 'armenshnik@mail.ru', '12321312321', '2017-07-23 10:24:06'),
(6, 'dfgdfshgd', 'armenshnik@mail.ru', 'gdhdfghgfh', '2017-07-23 10:30:15'),
(7, 'dfgdfshgd', 'armenshnik@mail.ru', 'gdhdfghgfh', '2017-07-23 10:30:15'),
(8, 'asdasdas', 'armenshnik@mail.ru', 'sdfgdfgsdfgs', '2017-07-23 10:31:50'),
(9, 'dfgdfshgd', 'armenshnik@mail.ru', 'dsfsdfsdf', '2017-07-23 10:33:50'),
(10, 'dfghdfhdf', 'armenshnik@mail.ru', 'dasfsadfsdf', '2017-07-23 10:34:33'),
(11, 'dfgdfshgd', 'armenshnik@mail.ru', 'fdsgsdfgdf', '2017-07-23 10:35:53'),
(12, 'asdasdas', 'armenshnik@mail.ru', 'asdfasdfsadfasdf', '2017-07-23 10:36:25'),
(13, 'asdasdas', 'armenshnik@mail.ru', 'asdfasdfsadfasdf', '2017-07-23 10:36:25'),
(14, 'asdasdas', 'armenshnik@mail.ru', 'asdfasdfsadfasdf', '2017-07-23 10:36:38'),
(15, '111', 'armenshnik@mail.ru', 'hgfjfgj', '2017-07-23 11:14:30'),
(16, 'asdsad', 'armenshnik@mail.ru', 'asdasdasd', '2017-07-23 11:16:28'),
(17, 'fsdfs', 'armenshnik@mail.ru', 'sdfsdfsdf', '2017-07-23 11:18:54'),
(18, 'dfgdsfgds', 'dsfgdsfgdfsg@sdad.sd', 'dsfgdfsgdsfg', '2017-08-04 17:02:28');

-- --------------------------------------------------------

--
-- Структура таблицы `matches_info`
--

CREATE TABLE `matches_info` (
  `id` int(11) NOT NULL,
  `team_info_id` int(11) NOT NULL,
  `first_side` int(11) DEFAULT NULL,
  `second_side` int(11) DEFAULT NULL,
  `match_score` varchar(255) DEFAULT NULL,
  `match_winner` int(11) DEFAULT NULL,
  `match_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `matches_info`
--

INSERT INTO `matches_info` (`id`, `team_info_id`, `first_side`, `second_side`, `match_score`, `match_winner`, `match_date`) VALUES
(1, 1, 13, 12, '10:6', 13, '2017-10-28 08:30:08'),
(2, 1, 13, 11, '1 : 6', 13, '2017-10-30 09:11:06'),
(3, 1, 11, 13, '1 : 6', 13, '2017-10-30 09:42:13');

-- --------------------------------------------------------

--
-- Структура таблицы `matches_info_statistic`
--

CREATE TABLE `matches_info_statistic` (
  `id` int(11) NOT NULL,
  `match_info_id` int(11) DEFAULT NULL,
  `side` varchar(255) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `pass` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `matches_info_statistic`
--

INSERT INTO `matches_info_statistic` (`id`, `match_info_id`, `side`, `goal`, `pass`) VALUES
(1, 1, 'first', 11, 23),
(2, 3, 'second', 11, 23),
(3, 1, 'second', 23, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1500788219),
('m130524_201442_init', 1500788224),
('m170723_074122_create_homePage_messages', 1500796917),
('m170729_183416_create_teams_table', 1501354270),
('m170730_134107_gallery_manager', 1501422102),
('m170822_170947_create_team_players_table', 1503422287),
('m171005_082143_create_teams_information_table', 1507192143),
('m171005_084600_add_team_id_column_to_teams_information_table', 1507193205),
('m171006_074525_create_matches_info_table', 1507276213),
('m171031_093602_create_matches_info_statistic_table', 1509442976),
('m171031_124934_create_players_table', 1509455078),
('m171108_071355_create_halls_table', 1510125918),
('m171113_094933_create_challenges_table', 1510577614);

-- --------------------------------------------------------

--
-- Структура таблицы `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `is_user` int(11) DEFAULT NULL,
  `in_team` int(11) DEFAULT NULL,
  `goals` int(11) DEFAULT NULL,
  `passes` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `captain` int(11) DEFAULT NULL,
  `best_player_count` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `players`
--

INSERT INTO `players` (`id`, `is_user`, `in_team`, `goals`, `passes`, `name`, `date`, `captain`, `best_player_count`, `photo`) VALUES
(11, NULL, NULL, NULL, NULL, 'Kaklikyan Armen', NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, 'Khachik Khachatryan', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `challenge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `teams`
--

INSERT INTO `teams` (`id`, `creator`, `title`, `logo`, `challenge`) VALUES
(1, 1, 'dsfsdfsd', 'Снимокп.PNG', 1),
(2, 1, 'dfgdfgdfg', 'Снимок.PNG', 1),
(3, 1, 'sdfsdfsdfsdfsdf', 'Снимокп.PNG', 1),
(4, 1, 'adsadasdasd', 'Снимокп.PNG', 1),
(5, 1, 'sdfsdfsdf', 'Снимок.PNG', 1),
(6, 1, 'dfgfdgdfgfd', 'Снимокп.PNG', 0),
(7, 1, 'sdfsdfsdfgfhgfh', 'Снимокп.PNG', 1),
(8, 1, 'dfgf2ff2f44', 'Снимокп.PNG', 1),
(9, 1, 'df23ff2f', 'Снимокроо.PNG', 1),
(10, 1, '4tw42tsfdvfs', 'Снимок.PNG', 1),
(11, 1, 'gdsfgdfsgsdfg', 'Снимокп.PNG', 1),
(12, 1, 'dfsdfsdfsdfsdf', 'Снимокп.PNG', 0),
(13, 1, 'fbvgdfbs fv435', 'Снимокп.PNG', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teams_information`
--

CREATE TABLE `teams_information` (
  `id` int(11) NOT NULL,
  `games_count` int(11) DEFAULT NULL,
  `number_of_wins` int(11) DEFAULT NULL,
  `number_of_looses` int(11) DEFAULT NULL,
  `number_of_players` int(11) DEFAULT NULL,
  `last_game_link` varchar(255) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `teams_information`
--

INSERT INTO `teams_information` (`id`, `games_count`, `number_of_wins`, `number_of_looses`, `number_of_players`, `last_game_link`, `team_id`) VALUES
(1, 10, 5, 5, 6, '', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `team_players`
--

CREATE TABLE `team_players` (
  `id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `is_user` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `player_name` varchar(255) DEFAULT NULL,
  `captain` int(11) DEFAULT NULL,
  `player_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `team_players`
--

INSERT INTO `team_players` (`id`, `team_id`, `is_user`, `player_name`, `captain`, `player_date`) VALUES
(1, NULL, '', 'sdfsdf', 0, '2017-08-30'),
(2, NULL, '', 'sdfsdfsdf', 1, '2017-09-03'),
(3, NULL, '1', 'armen', 1, '0000-00-00'),
(4, NULL, '1', 'armen', 0, '0000-00-00'),
(5, NULL, '1', 'armen', 0, '0000-00-00'),
(6, NULL, '0', 'dfg', 0, '2017-09-03'),
(7, NULL, '0', '5345', 1, '2017-09-03'),
(8, NULL, '1', 'armen', 0, '0000-00-00'),
(9, NULL, '1', 'armen', 0, '0000-00-00'),
(10, NULL, '0', 'tfdg', 0, '2017-09-03'),
(11, 2, '0', '5345', 1, '2017-09-03'),
(12, 2, '1', 'armen', 0, '0000-00-00'),
(13, 2, '1', 'armen', 0, '0000-00-00'),
(14, 2, '0', 'tfdg', 0, '2017-09-03'),
(15, 3, '1', 'armen', 1, '0000-00-00'),
(16, 3, '1', 'armen', 0, '0000-00-00'),
(17, 3, '0', 'sdfsdf', 0, '2017-09-03'),
(18, 3, '1', 'armen', 0, '0000-00-00'),
(19, 5, '1', 'armen', 0, '0000-00-00'),
(20, 5, '0', 'ed1qd', 0, '2017-09-03'),
(21, 5, '1', 'armen', 1, '0000-00-00'),
(22, 5, '0', 'dsfsdf', 0, '2017-09-03'),
(23, 6, '0', 'fghfg', 0, '2017-09-06'),
(24, 5, '0', 'armen', 0, '0000-00-00'),
(25, 6, 'asdf', 'armen', 0, '0000-00-00'),
(26, 6, '0', 'ghd', 1, '2017-09-06'),
(27, 13, 'asdf', 'armen', 1, '0000-00-00'),
(28, 13, 'no', 'sdfsd', 0, '2017-09-10'),
(29, 13, 'no', 'fsd', 0, '2017-09-10'),
(30, 13, 'no', 'sdfsd', 0, '2017-09-10');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_team` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `invite_confirmed` int(11) DEFAULT NULL,
  `is_captain` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `date` date NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `token`, `email`, `in_team`, `team_id`, `invite_confirmed`, `is_captain`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'armen', 'jrhZTPC7XTMtrt5cVkfONL0C_i6EBnN9', '$2y$13$EoxKDy.NccWP/kek9cFHY.OBu2z3JUngDnTRvWBHBTE50f.RPQTLW', NULL, 'asdf', 'armen@gmail.com', 1, 13, 0, 0, 10, '0000-00-00', 1500788462, 1505037143),
(2, 'dsfsdf', 'asdfsadf', 'sadfasdf', 'sdfsdaf', 'lol', '', NULL, NULL, NULL, NULL, 10, '0000-00-00', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `home_page_messages`
--
ALTER TABLE `home_page_messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `matches_info`
--
ALTER TABLE `matches_info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `matches_info_statistic`
--
ALTER TABLE `matches_info_statistic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teams_information`
--
ALTER TABLE `teams_information`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `team_players`
--
ALTER TABLE `team_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `getTeam` (`team_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT для таблицы `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `home_page_messages`
--
ALTER TABLE `home_page_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `matches_info`
--
ALTER TABLE `matches_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `matches_info_statistic`
--
ALTER TABLE `matches_info_statistic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `teams_information`
--
ALTER TABLE `teams_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `team_players`
--
ALTER TABLE `team_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `team_players`
--
ALTER TABLE `team_players`
  ADD CONSTRAINT `getTeam` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;