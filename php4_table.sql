-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2025 年 1 月 04 日 16:58
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `php3kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `php4_table`
--

CREATE TABLE `php4_table` (
  `id` int(11) NOT NULL,
  `sleep` tinyint(3) UNSIGNED NOT NULL,
  `mood` tinyint(3) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `php4_table`
--

INSERT INTO `php4_table` (`id`, `sleep`, `mood`, `text`, `date`) VALUES
(1, 8, 3, 'どうかな？', '2025-01-04 23:07:03'),
(2, 8, 3, 'どうかな？', '2025-01-04 23:07:15'),
(3, 6, 4, 'データベース難しいkousin', '2025-01-04 23:07:56'),
(4, 5, 5, '更新：課題のせいで時間が溶ける', '2025-01-04 23:09:25'),
(5, 10, 7, 'よく眠れた', '2025-01-04 23:51:32'),
(6, 8, 7, 'なんとかたどり着いた', '2025-01-05 00:03:25'),
(7, 5, 3, '不眠で体がだるい', '2025-01-05 00:41:51');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `php4_table`
--
ALTER TABLE `php4_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `php4_table`
--
ALTER TABLE `php4_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
