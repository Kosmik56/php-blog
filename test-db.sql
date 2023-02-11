-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2023 at 11:07 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`, `created_at`, `user_id`) VALUES
(1, 1, 'Preum\'s', '2022-03-03 13:00:42', 1),
(2, 1, 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2022-03-03 13:01:42', 2),
(3, 2, 'trg\r\n', '2022-12-22 17:19:33', 4),
(4, 2, 'qwertyui', '2022-12-22 17:20:58', 4),
(5, 2, 'qwertyu', '2022-12-22 17:21:53', 4),
(6, 2, 'Bonjour tout le monde', '2022-12-22 17:37:26', 4),
(7, 2, 'bonswer', '2022-12-22 17:38:01', 3),
(8, 2, 'sf', '2023-01-10 15:23:45', 4),
(9, 8, 'Arthur', '2023-01-12 17:56:33', 4),
(10, 8, 'Arthur', '2023-01-12 17:57:03', 4),
(11, 8, 'Arthur', '2023-01-12 17:57:08', 4),
(12, 8, 'qwerty', '2023-01-18 12:14:45', 7),
(13, 8, 'Salut ruff', '2023-01-18 12:24:04', 7),
(14, 9, 'Merci encore :\)', '2023-01-18 13:00:47', 4),
(15, 15, 'Salut les p\'tits potes', '2023-01-26 16:29:39', 4),
(16, 15, 'boop', '2023-01-26 16:30:11', 8),
(17, 19, 'fghjk,', '2023-02-07 15:41:00', 4),
(18, 19, 'sdfgh', '2023-02-07 16:17:24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `pdf` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Bienvenue sur le blog de Lewis!', 'Je vous souhaite à toutes et à tous la bienvenue sur le blog qui parlera de je ne sais pas trop quoi encore mais on verra !', '2022-02-17 16:28:41'),
(2, 'Les mystères de l\'internet', 'Le mystère de l\'internet est un ARG créé par Antoine Daniel sur sa chaine youtube.', '2022-02-17 16:28:42'),
(3, 'hy', 'testing 1234', '2023-01-12 17:34:02'),
(4, 'qwertyuiop', 'asdfghjklzxcvbnm', '2023-01-12 17:34:49'),
(5, 'qwertyuiop', 'asdfghjklzxcvbnm', '2023-01-12 17:36:59'),
(6, 'qwer', 'qwert', '2023-01-12 17:42:35'),
(7, 'wfg', 'dfgh', '2023-01-12 17:47:42'),
(8, 'f', 'fheth', '2023-01-12 17:47:59'),
(9, 'Merci Thomas ', 'Merci pour toute ton aide!', '2023-01-18 13:00:30'),
(10, 'What is Lorem ipsum? ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-01-24 10:22:28'),
(11, 'Why do we use Lorem Ipsum?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2023-01-24 10:22:58'),
(12, 'Where does Lorem Ipsum come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-01-24 10:23:21'),
(13, 'Where can I get Lorem Ipsum?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2023-01-24 10:23:51'),
(14, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec lectus justo. Nunc laoreet accumsan mi. Vivamus ornare lobortis ligula, sed facilisis dolor mattis eget. Maecenas nec mauris sit amet lacus accumsan feugiat. In urna lacus, interdum a mollis a, aliquam in sapien. Curabitur finibus fringilla sollicitudin. Nunc urna dolor, ultricies a lectus ac, auctor posuere mauris. Maecenas laoreet porta ante molestie finibus. Nam mi sem, efficitur ac ligula sed, porta fermentum est. Curabitur consequat fringilla accumsan. Pellentesque eget rhoncus ipsum. Pellentesque suscipit odio ac posuere convallis. Morbi sapien justo, iaculis eget cursus et, maximus non nibh. Nullam id pulvinar mauris.', '2023-01-24 10:24:29'),
(15, 'Bonjour', 'Tout le monde', '2023-01-26 16:29:21'),
(19, 'qwertyh', 'sdfghj', '2023-02-07 15:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `admin`) VALUES
(1, 'lewis.kidd56@gmail.com', 'Lewis Kidd', 'Super Password', 0),
(2, 'lewis@gmail.com', 'wer', 'qwerty', 0),
(3, 'bob@gmail.com', 'qwerty', '$2y$10$9d1xd1ic9LLrZUoWvI47LuH1u98XGuWLRNZrw8AGsWV3M4HuVTyL2', 0),
(4, 'q@g.com', 'Jérome', '$2y$10$xoUbMn5gN3yzzYS4GZix8eYg6wiAkdGkSlHN/cXgcHUVx.crQAaM.', 1),
(5, '', '', '$2y$10$xO6aoEWE9hGSlH9E59iaXO2tEHAsxhf1BA/F/6RH8IlwGfMorGfJG', 0),
(6, 'qwert@qwert.qwert', 'qwert@qwert.qwert', '$2y$10$PUiqENyus6Br0jDbhxfD3./5BjDU2RtBi9ElVWB9JUpUBzjVIpN96', 0),
(7, 'a@a.a', 'a@a.a', '$2y$10$nxfnfI8XFT489xG.N3WSUOXV72yJ6mhK4VKlJ7bW5fT4LQ4FQQc3W', 0),
(8, 'qaz@qaz.qaz', 'qaz@qaz.qaz', '$2y$10$EhT9BlY0F5vlFpj1YpcweuEgWkkqoAfx/yuXVk/PohH.cXVGiaI6S', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;