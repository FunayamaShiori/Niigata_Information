-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2020 年 6 月 24 日 10:42
-- サーバのバージョン： 5.7.29
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ec`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL,
  `field` int(128) NOT NULL,
  `totalprice` int(128) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `carts`
--

INSERT INTO `carts` (`id`, `users_id`, `items_id`, `field`, `totalprice`, `created`, `modified`) VALUES
(29, 1, 1, 12, 24000, '2020-06-09 09:36:47', '2020-06-09 09:36:47'),
(30, 1, 1, 10, 20000, '2020-06-12 03:10:01', '2020-06-12 03:10:01'),
(31, 1, 1, 20, 40000, '2020-06-12 03:13:26', '2020-06-12 03:13:26'),
(32, 1, 3, 10, 30000, '2020-06-12 03:15:03', '2020-06-12 03:15:03'),
(33, 1, 2, 10, 30000, '2020-06-16 04:07:10', '2020-06-16 04:07:10'),
(34, 1, 1, 10, 20000, '2020-06-16 04:26:31', '2020-06-16 04:26:31'),
(35, 1, 2, 13, 39000, '2020-06-24 08:57:34', '2020-06-24 08:57:34'),
(36, 1, 1, 10, 20000, '2020-06-24 09:40:47', '2020-06-24 09:40:47');

-- --------------------------------------------------------

--
-- テーブルの構造 `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `img_path` varchar(32) NOT NULL,
  `detail` varchar(256) NOT NULL,
  `price` int(8) NOT NULL,
  `capacity` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `items`
--

INSERT INTO `items` (`id`, `name`, `img_path`, `detail`, `price`, `capacity`) VALUES
(1, '日本酒', 'items/sake.jpg', '辛口がおすすめです', 2000, '750ml'),
(2, '米', 'items/rice.jpg', '炊き立てがおいしいです', 3000, '1袋30㎏'),
(3, '野菜セット', 'items/vegetables.jpg', '新鮮です', 3000, '10kg'),
(4, '雑貨セット', 'items/goods.jpg', 'すべてハンドメイドです', 3000, '5個');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(16) NOT NULL,
  `name` varchar(16) NOT NULL,
  `kana` varchar(16) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` int(12) DEFAULT NULL COMMENT '0:一般ユーザ 1:管理者'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `kana`, `tel`, `mail`, `address`, `password`, `role`) VALUES
(1, '伊藤', 'イトウ', '09012345678', 'ito@gmail.com', '東京都品川区', '$2y$10$ZxHkF37gskALXbLpgPGexeqoDnVTIG30nVUaKM/ZH8Cje1W96cVyW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
