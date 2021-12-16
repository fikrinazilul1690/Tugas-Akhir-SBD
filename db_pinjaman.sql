-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 12:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pinjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `cicilan`
--

CREATE TABLE `cicilan` (
  `id_paket` int(10) NOT NULL,
  `lama_cicilan` int(2) NOT NULL,
  `bunga_cicilan` float NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cicilan`
--

INSERT INTO `cicilan` (`id_paket`, `lama_cicilan`, `bunga_cicilan`, `is_delete`) VALUES
(1, 1, 1.42, b'0'),
(2, 3, 1.46, b'0'),
(3, 6, 1.46, b'0'),
(4, 9, 1.46, b'0'),
(5, 12, 2.2, b'0'),
(6, 18, 2.5, b'0'),
(7, 24, 4, b'0'),
(8, 28, 5, b'0'),
(9, 20, 3, b'1'),
(10, 28, 5, b'1'),
(11, 28, 5, b'1'),
(12, 30, 4, b'1'),
(13, 40, 7, b'1'),
(14, 10, 10, b'1'),
(15, 32, 6, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `penghasilan` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `is_block` bit(1) NOT NULL DEFAULT b'0',
  `level` varchar(20) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id_user`, `nama`, `nik`, `penghasilan`, `email`, `username`, `pass`, `is_block`, `level`) VALUES
(1, 'fikri', '3322182001000002', 50000000, 'fikrinazilul@gmail.com', 'fikrinazilul', 'd43ab110ab2489d6b9b2caa394bf920f', b'0', 'User'),
(2, 'Achmad', '3322182001000003', 50000000, 'achmadnazilul@gmail.com', 'achmad123', '202cb962ac59075b964b07152d234b70', b'0', 'User'),
(3, 'rifka', '3322182001000001', 50000000, 'rifkasari123@gmail.com', 'rifkasari', '202cb962ac59075b964b07152d234b70', b'0', 'User'),
(4, 'fikri', '3121354561564654', 0, 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', b'0', 'Admin'),
(5, 'karisa', '3322182001000007', 10000000, 'karisa@gmail.com', 'karisacantik', '202cb962ac59075b964b07152d234b70', b'0', 'User'),
(6, 'rifka1', '3322182001000009', 50000000, 'rifkasari1@gmail.com', 'rifka1', '202cb962ac59075b964b07152d234b70', b'0', 'User'),
(7, 'nazilul', '3322182001000008', 50000000, 'fikrinazilul123@gmail.com', 'fikrinazilul123', '202cb962ac59075b964b07152d234b70', b'0', 'User'),
(8, 'fariz', '3322100019300123', 10000000, 'fariz@gmail.com', 'fariz123', '202cb962ac59075b964b07152d234b70', b'0', 'User'),
(13, 'fikrinazilul', '3322182002000002', 50000000, 'fikrinazilul1690@gmail.com', 'fikrinazilul1690', '202cb962ac59075b964b07152d234b70', b'0', 'User'),
(14, 'gunawan', '3322182001000005', 50000000, 'gunawan@gmail.com', 'gunawan123', '202cb962ac59075b964b07152d234b70', b'0', 'User');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_pengajuan`
-- (See below for the actual view)
--
CREATE TABLE `detail_pengajuan` (
`nama` varchar(100)
,`penghasilan` int(10)
,`jmlh_pinj` int(10)
,`no_ajuan` int(10)
,`status_pinj` varchar(25)
,`tgl_ajuan` date
,`ang_perbln` int(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjaman`
--

CREATE TABLE `detail_pinjaman` (
  `no_pinj` int(10) NOT NULL,
  `ang_perbln` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_paket` int(10) NOT NULL,
  `no_ajuan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pinjaman`
--

INSERT INTO `detail_pinjaman` (`no_pinj`, `ang_perbln`, `id_user`, `id_paket`, `no_ajuan`) VALUES
(16, 845500, 1, 3, 20),
(17, 1521900, 2, 3, 21),
(18, 2367400, 5, 2, 22),
(19, 1183700, 2, 3, 23),
(20, 563667, 2, 4, 24),
(21, 766500, 2, 5, 25),
(22, 5060000, 5, 1, 26),
(23, 2367400, 5, 2, 27),
(24, 1521900, 5, 3, 28),
(25, 5060000, 1, 1, 29),
(26, 2367400, 1, 2, 30),
(27, 1521900, 1, 3, 31),
(29, 425833, 1, 5, 33),
(30, 425833, 5, 5, 34),
(31, 789133, 5, 4, 35),
(32, 2145833, 6, 7, 36),
(33, 425833, 7, 5, 37),
(34, 255500, 8, 5, 38),
(35, 227778, 8, 6, 39),
(36, 184286, 8, 8, 40),
(37, 5071000, 14, 1, 41),
(38, 1691000, 14, 2, 42),
(39, 845500, 14, 3, 43),
(40, 563667, 14, 4, 44),
(41, 425833, 14, 5, 45),
(42, 1521900, 1, 3, 46),
(43, 1014600, 1, 4, 47),
(44, 596167, 1, 5, 48),
(45, 1842857, 1, 8, 49),
(46, 2166667, 1, 7, 50),
(47, 1691000, 1, 2, 51),
(48, 1125000, 14, 8, 52);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `no_ajuan` int(10) NOT NULL,
  `jmlh_pinj` int(10) NOT NULL,
  `status_pinj` varchar(25) NOT NULL DEFAULT 'diproses',
  `id_user` int(10) NOT NULL,
  `id_paket` int(10) NOT NULL,
  `tgl_ajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`no_ajuan`, `jmlh_pinj`, `status_pinj`, `id_user`, `id_paket`, `tgl_ajuan`) VALUES
(20, 5000000, 'diterima', 1, 3, '2021-11-24'),
(21, 9000000, 'diterima', 2, 3, '2021-11-24'),
(22, 7000000, 'ditolak', 5, 2, '2021-11-24'),
(23, 7000000, 'ditolak', 2, 3, '2021-11-25'),
(24, 5000000, 'ditolak', 2, 4, '2021-11-25'),
(25, 9000000, 'ditolak', 2, 5, '2021-11-25'),
(26, 5000000, 'ditolak', 5, 1, '2021-11-25'),
(27, 7000000, 'ditolak', 5, 2, '2021-11-25'),
(28, 9000000, 'ditolak', 5, 3, '2021-11-25'),
(29, 5000000, 'ditolak', 1, 1, '2021-11-25'),
(30, 7000000, 'diterima', 1, 2, '2021-11-25'),
(31, 9000000, 'diterima', 1, 3, '2021-11-25'),
(32, 9000000, 'diproses', 1, 4, '2021-11-25'),
(33, 5000000, 'diterima', 1, 5, '2021-11-25'),
(34, 5000000, 'diproses', 5, 5, '2021-11-25'),
(35, 7000000, 'diterima', 5, 4, '2021-11-25'),
(36, 50000000, 'diterima', 6, 7, '2021-11-29'),
(37, 5000000, 'diterima', 7, 5, '2021-12-01'),
(38, 3000000, 'diterima', 8, 5, '2021-12-01'),
(39, 4000000, 'ditolak', 8, 6, '2021-12-01'),
(40, 5000000, 'diterima', 8, 8, '2021-12-01'),
(41, 5000000, 'diproses', 14, 1, '2021-12-14'),
(42, 5000000, 'diterima', 14, 2, '2021-12-14'),
(43, 5000000, 'diterima', 14, 3, '2021-12-14'),
(44, 5000000, 'diterima', 14, 4, '2021-12-14'),
(45, 5000000, 'diterima', 14, 5, '2021-12-14'),
(46, 9000000, 'diterima', 1, 3, '2021-12-14'),
(47, 9000000, 'diterima', 1, 4, '2021-12-14'),
(48, 7000000, 'ditolak', 1, 5, '2021-12-14'),
(49, 50000000, 'ditolak', 1, 8, '2021-12-14'),
(50, 50000000, 'diproses', 1, 7, '2021-12-14'),
(51, 5000000, 'diproses', 1, 2, '2021-12-14'),
(52, 30000000, 'diproses', 14, 8, '2021-12-14');

-- --------------------------------------------------------

--
-- Structure for view `detail_pengajuan`
--
DROP TABLE IF EXISTS `detail_pengajuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pengajuan`  AS SELECT `a`.`nama` AS `nama`, `a`.`penghasilan` AS `penghasilan`, `b`.`jmlh_pinj` AS `jmlh_pinj`, `b`.`no_ajuan` AS `no_ajuan`, `b`.`status_pinj` AS `status_pinj`, `b`.`tgl_ajuan` AS `tgl_ajuan`, `c`.`ang_perbln` AS `ang_perbln` FROM ((`detail_pinjaman` `c` join `db_user` `a` on(`a`.`id_user` = `c`.`id_user`)) join `pengajuan` `b` on(`c`.`no_ajuan` = `b`.`no_ajuan`)) WHERE `a`.`level` = 'User' AND `b`.`status_pinj` = 'diproses' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  ADD PRIMARY KEY (`no_pinj`),
  ADD KEY `Fk_id_user` (`id_user`),
  ADD KEY `Fk_id_paket` (`id_paket`),
  ADD KEY `FK_no_ajuan` (`no_ajuan`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`no_ajuan`),
  ADD KEY `Fk_user` (`id_user`),
  ADD KEY `Fk_paket` (`id_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cicilan`
--
ALTER TABLE `cicilan`
  MODIFY `id_paket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  MODIFY `no_pinj` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `no_ajuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  ADD CONSTRAINT `FK_no_ajuan` FOREIGN KEY (`no_ajuan`) REFERENCES `pengajuan` (`no_ajuan`),
  ADD CONSTRAINT `Fk_id_paket` FOREIGN KEY (`id_paket`) REFERENCES `cicilan` (`id_paket`),
  ADD CONSTRAINT `Fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `Fk_paket` FOREIGN KEY (`id_paket`) REFERENCES `cicilan` (`id_paket`),
  ADD CONSTRAINT `Fk_user` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
