-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 11:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamus-sunda`
--

-- --------------------------------------------------------

--
-- Table structure for table `lang_type`
--

CREATE TABLE `lang_type` (
  `id` int(10) NOT NULL,
  `lang` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lang_type`
--

INSERT INTO `lang_type` (`id`, `lang`) VALUES
(1, 'Indonesia'),
(2, 'Sunda Sedang'),
(3, 'Sunda Halus'),
(4, 'Sunda Kasar');

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE `word` (
  `id` int(100) NOT NULL,
  `name` varchar(256) NOT NULL,
  `translated` varchar(256) NOT NULL,
  `type_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`id`, `name`, `translated`, `type_id`) VALUES
(1, 'aku', 'aing', 4),
(5, 'aku', 'abdi', 2),
(6, 'lagi', 'nuju', 2),
(7, 'suka', 'resep', 2),
(8, 'main', 'ulin', 2),
(9, 'bermain', 'ulin', 2),
(10, 'kemudian', 'saterusna', 2),
(11, 'mandi', 'ibak', 2),
(12, 'pagi', 'isuk', 2),
(13, 'ini', 'ieu', 2),
(14, 'menemani', 'maturan', 2),
(15, 'ke', 'ka', 2),
(16, 'kampus', 'kampus', 2),
(17, 'untuk', 'kanggo', 2),
(18, 'menyaksikan', 'nyaksian', 2),
(19, 'ujian', 'ujian', 2),
(20, 'Sebenarnya', 'saleresna', 2),
(21, 'sekali', 'kalintang', 2),
(22, 'karena', 'margi', 2),
(23, 'nanti', 'antos', 2),
(24, 'akan', 'bade', 2),
(25, 'berhadapan', 'pahareup-hareup', 2),
(26, 'dengan', 'kalawan', 2),
(27, 'yang', 'anu', 2),
(28, 'telah', 'atos', 2),
(29, 'ia', 'manehna', 2),
(30, 'tulis', 'serat', 2),
(31, 'Tetapi', 'nanging', 2),
(32, 'terus', 'teras', 2),
(33, 'dan', 'sarta', 2),
(34, 'agar', 'supados', 2),
(35, 'tidak', 'henteu', 2),
(36, 'sudah', 'atos', 2),
(37, 'pernah', 'kantos', 2),
(38, 'melewati', 'ngaliwatan', 2),
(39, 'jadi', 'janten', 2),
(40, 'dia', 'anjeunna', 2),
(41, 'tahu', 'terang', 2),
(42, 'sedang', 'nuju', 2),
(43, 'rasakan', 'rasakeun', 2),
(44, 'sekarang', 'ayeuna', 2),
(45, 'kemudian', 'saterusna', 2),
(46, 'Lalu', 'kaliwat', 2),
(47, 'bola', 'bal', 2),
(48, 'kamu', 'anjeun', 3),
(49, 'membenci', 'mikangewa', 3),
(50, 'ku', 'aing', 4),
(51, 'menonton', 'lalajo', 4),
(52, 'ku', 'abdi', 2),
(53, 'menonton', 'nongton', 2),
(54, 'aku', 'kuring', 3),
(55, 'suka', 'seneng', 3),
(56, 'nonton', 'lalajo', 3),
(57, 'kamu', 'kamu', 2),
(58, 'membenci', 'membenci', 2),
(59, 'nonton', 'nonton', 2),
(60, 'kamu', 'kamu', 4),
(61, 'membaca', 'membaca', 4),
(62, 'kamus', 'kamus', 4),
(63, 'dia', 'dia', 3),
(64, 'dan', 'dan', 3),
(66, 'dia', 'dia', 4),
(67, 'dan', 'dan', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lang_type`
--
ALTER TABLE `lang_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `word`
--
ALTER TABLE `word`
  ADD CONSTRAINT `word_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `lang_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
