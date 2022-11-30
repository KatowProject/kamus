-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 09:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(126) DEFAULT NULL,
  `username` varchar(126) DEFAULT NULL,
  `password` varchar(126) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'M. Naufal Faqih', 'katowwo', '$2a$12$1ovpa1TqaV12Xb5r7RhTue2axlFOjBXLDy4GgvB/cHNk0IB/ypQ.W');

-- --------------------------------------------------------

--
-- Table structure for table `lang_type`
--

CREATE TABLE `lang_type` (
  `id` int(10) NOT NULL,
  `lang` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`id`, `name`, `translated`, `type_id`) VALUES
(95, 'Pagi', 'isuk', 2),
(96, 'ini', 'ieu', 2),
(97, 'menemani', 'maturan', 2),
(98, 'ke', 'ka', 2),
(99, 'kampus', 'kampus', 2),
(100, 'untuk', 'kanggo', 2),
(101, 'menyaksikan', 'nyaksian', 2),
(102, 'ujian', 'ujian', 2),
(103, 'Sebenarnya', 'saleresna', 2),
(104, 'sekali', 'kalintang', 2),
(105, 'karena', 'margi', 2),
(106, 'nanti', 'antos', 2),
(107, 'akan', 'bade', 2),
(108, 'berhadapan', 'pahareup-hareup', 2),
(109, 'dengan', 'kalawan', 2),
(110, 'yang', 'anu', 2),
(111, 'telah', 'atos', 2),
(112, 'ia', 'manehna', 2),
(113, 'tulis', 'serat', 2),
(114, 'Tetapi', 'nanging', 2),
(115, 'terus', 'teras', 2),
(116, 'dan', 'sarta', 2),
(117, 'agar', 'supados', 2),
(118, 'tidak', 'henteu', 2),
(119, 'sudah', 'atos', 2),
(120, 'pernah', 'kantos', 2),
(121, 'melewati', 'ngaliwatan', 2),
(122, 'jadi', 'janten', 2),
(123, 'dia', 'anjeunna', 2),
(124, 'tahu', 'terang', 2),
(125, 'sedang', 'nuju', 2),
(126, 'rasakan', 'rasakeun', 2),
(127, 'sekarang', 'ayeuna', 2),
(128, 'Detik', 'detik', 2),
(129, 'akhirnya', 'ahirna', 2),
(130, 'datang', 'dongkap', 2),
(131, 'juga', 'oge', 2),
(132, 'memasuki', 'ngasupan', 2),
(133, 'ruangan', 'rohangan', 2),
(134, 'perasaan', 'rarasaan', 2),
(135, 'mencoba', 'mecakan', 2),
(136, 'mengendalikan', 'ngadalikeun', 2),
(137, 'Pagi', 'isuk', 3),
(138, 'ini', 'ieu', 3),
(139, 'menemani', 'maturan', 3),
(140, 'ke', 'ka', 3),
(141, 'kampus', 'kampus', 3),
(142, 'untuk', 'haturan', 3),
(143, 'menyaksikan', 'nyaksian', 3),
(144, 'ujian', 'ujian', 3),
(145, 'Sebenarnya', 'saleresna', 3),
(146, 'sekali', 'kalintang', 3),
(147, 'karena', 'margi', 3),
(148, 'nanti', 'antos', 3),
(149, 'akan', 'bade', 3),
(150, 'berhadapan', 'pahareup-hareup', 3),
(151, 'dengan', 'kalawan', 3),
(152, 'yang', 'anu', 3),
(153, 'telah', 'parantos', 3),
(154, 'ia', 'manehna', 3),
(155, 'tulis', 'serat', 3),
(156, 'Tetapi', 'nanging', 3),
(157, 'terus', 'teras', 3),
(158, 'dan', 'sarta', 3),
(159, 'agar', 'supados', 3),
(160, 'tidak', 'henteu', 3),
(161, 'sudah', 'parantos', 3),
(162, 'pernah', 'kantos', 3),
(163, 'melewati', 'ngaliwatan', 3),
(164, 'jadi', 'janten', 3),
(165, 'dia', 'anjeunna', 3),
(166, 'tahu', 'uninga', 3),
(167, 'sedang', 'nuju', 3),
(168, 'rasakan', 'rasakeun', 3),
(169, 'sekarang', 'ayeuna', 3),
(170, 'Detik', 'detik', 3),
(171, 'akhirnya', 'ahirna', 3),
(172, 'datang', 'sumping', 3),
(173, 'juga', 'oge', 3),
(174, 'memasuki', 'ngasupan', 3),
(175, 'ruangan', 'rohangan', 3),
(176, 'perasaan', 'raraosan', 3),
(177, 'mencoba', 'mecakan', 3),
(178, 'mengendalikan', 'ngadalikeun', 3),
(179, 'Pagi', 'isuk', 4),
(180, 'ini', 'ieu', 4),
(181, 'menemani', 'maturan', 4),
(182, 'ke', 'ka', 4),
(183, 'kampus', 'kampus', 4),
(184, 'untuk', 'keur', 4),
(185, 'menyaksikan', 'nyaksikeun', 4),
(186, 'ujian', 'ujian', 4),
(187, 'Sebenarnya', 'saleresna', 4),
(188, 'sekali', 'kacida', 4),
(189, 'karena', 'sabab', 4),
(190, 'nanti', 'engke', 4),
(191, 'akan', 'arek', 4),
(192, 'berhadapan', 'pahareup-hareup', 4),
(193, 'dengan', 'kalawan', 4),
(194, 'yang', 'nu', 4),
(195, 'telah', 'enggeus', 4),
(196, 'ia', 'manehna', 4),
(197, 'tulis', 'serat', 4),
(198, 'Tetapi', 'tapi', 4),
(199, 'terus', 'laju', 4),
(200, 'dan', 'sarta', 4),
(201, 'agar', 'sangkan', 4),
(202, 'tidak', 'teu', 4),
(203, 'sudah', 'enggeus', 4),
(204, 'pernah', 'kungsi', 4),
(205, 'melewati', 'ngaliwatan', 4),
(206, 'jadi', 'jadi', 4),
(207, 'dia', 'manehna', 4),
(208, 'tahu', 'nyaho', 4),
(209, 'sedang', 'keur', 4),
(210, 'rasakan', 'rasakeun', 4),
(211, 'sekarang', 'ayeuna', 4),
(212, 'Detik', 'detik', 4),
(213, 'akhirnya', 'ahirna', 4),
(214, 'datang', 'datang', 4),
(215, 'juga', 'oge', 4),
(216, 'memasuki', 'ngasupan', 4),
(217, 'ruangan', 'rohangan', 4),
(218, 'perasaan', 'rarasaan', 4),
(219, 'mencoba', 'nyobaan', 4),
(220, 'mengendalikan', 'ngadalikeun', 4),
(221, 'aku', 'urang', 2),
(222, 'aku', 'abdi', 3),
(223, 'aku', 'aing', 4),
(224, 'kau', 'anjeun', 3),
(225, 'berangkat', 'angkat', 3),
(226, 'sekolah', 'sakola', 3),
(227, 'mau', 'hoyong', 2),
(228, 'berangkat', 'mios', 2),
(229, 'sekolah', 'sakola', 2),
(230, 'mau', 'palay', 3),
(231, 'pengen', 'hayang', 2),
(232, 'makan', 'neda', 2),
(233, 'nasi', 'sangu', 2),
(234, 'goreng', 'goreng', 2),
(235, 'pengen', 'hayang', 3),
(236, 'makan', 'tuang', 3),
(237, 'nasi', 'sangu', 3),
(238, 'goreng', 'goreng', 3),
(239, 'ku', 'abdi', 2),
(240, 'menonton', 'nongton', 2),
(241, 'ku', 'aing', 4),
(242, 'menonton', 'lalajo', 4),
(243, 'Kontol', 'larangan', 2),
(244, 'Kontol', 'sirit', 4),
(245, 'Kontol', 'zakar', 1),
(246, 'Kontol', 'larangan', 3),
(247, 'membaca', 'maos', 2),
(248, 'kamus', 'kamus', 2),
(249, 'sunda', 'sunda', 2),
(250, 'menyukai', 'mikaresep', 2),
(251, 'permainan', 'kaulinan', 2),
(252, 'bola', 'bal', 2),
(253, 'menyukai', 'mikaresep', 3),
(254, 'permainan', 'kaulinan', 3),
(255, 'bola', 'bal', 3),
(256, 'menyukai', 'mikaresep', 4),
(257, 'permainan', 'kaulinan', 4),
(258, 'bola', 'bal', 4),
(259, 'manehna', 'dia', 1),
(260, 'mikaresep', 'menyukai', 1),
(261, 'kaulinan', 'permainan', 1),
(262, 'bal', 'bola', 1),
(263, 'kacang', 'kacang', 3),
(264, 'rebus', 'kulub', 3),
(265, 'buah', 'buah', 3),
(266, 'pepaya', 'gedang', 3),
(267, 'mangga', 'manggah', 2),
(268, 'nonton', 'lalajo', 3),
(269, 'saya', 'aing', 4),
(270, 'pengen', 'hayang', 4),
(271, 'nonton', 'lalajo', 4),
(272, 'puguh', 'pasti', 1),
(273, 'godog', 'rebus', 1),
(274, 'Tidur', 'kulem', 3),
(275, 'Tidur', 'mondok', 2),
(276, 'muka', 'pameunteu', 3),
(277, 'dua', 'dua', 3),
(278, 'suka', 'resep', 4),
(279, 'bermain', 'ulin', 4),
(280, 'main', 'ulin', 4),
(281, 'suka', 'resep', 2),
(282, 'nonton', 'lalajo', 2),
(283, 'saya', 'abdi', 2),
(284, 'bermain', 'ulin', 2),
(285, 'lagi', 'nuju', 2),
(286, 'lagi', 'nuju', 4),
(287, 'makan', 'dahar', 4),
(288, 'Kucing', 'ucing', 2),
(289, 'itu', 'eta', 2),
(290, 'sangat', 'pisan', 2),
(291, 'lucu', 'lucu', 2),
(292, 'sakit', 'udur', 2),
(293, 'pergi', 'mios', 2),
(294, 'kantor', 'kantor', 2),
(295, 'ingin', 'hoyong', 2),
(296, 'diam', 'cicing', 3),
(297, 'gila', 'gelo', 2),
(298, 'bunga', 'kembang', 2),
(299, 'rumah', 'imah', 4),
(300, 'hilang', 'ical', 2),
(301, 'kamu', 'anjeun', 2),
(302, 'memilih', 'milih', 2),
(303, 'kehilangan', 'kaleungitan', 2),
(304, 'tapi', 'nanging', 3),
(305, 'lelah', 'lungse', 3),
(306, 'berjuang', 'bajoang', 3),
(307, 'sanggup', 'sanggup', 4),
(308, 'sampai', 'dugi', 2),
(309, 'ujung', 'tungtung', 2),
(310, 'waktu', 'wanci', 2),
(311, 'ingin', 'palay', 3),
(312, 'selalu', 'sok', 3),
(313, 'kamu', 'anjeun', 3),
(314, 'membawa', 'ngabantun', 3),
(315, 'bahagia', 'bingah', 3),
(316, 'mungkin', 'manawi', 2),
(317, 'mungkin', 'manawi', 3),
(318, 'mungkin', 'sugan', 4),
(319, 'bisa', 'bisa', 4),
(320, 'membuat', 'nyieun', 4),
(321, 'bahagia', 'bungah', 4),
(322, 'kabar', 'wartos', 2),
(323, 'mendengar', 'ngadenge', 2),
(324, 'balik', 'balik', 4),
(325, 'nya', 'na', 4),
(326, 'Urang', 'kita', 1),
(327, 'balik', 'balik', 1),
(328, 'ti', 'dari', 1),
(329, 'nya', 'ya', 1),
(330, 'saya', 'abdi', 3),
(331, 'mau', 'hayang', 4),
(332, 'berangkat', 'indit', 4),
(333, 'sekolah', 'sakola', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

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
