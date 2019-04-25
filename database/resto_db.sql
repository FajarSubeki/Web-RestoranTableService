-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 11:42 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto_db`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_order`
-- (See below for the actual view)
--
CREATE TABLE `detail_order` (
`kd_detail` varchar(7)
,`order_kd` varchar(7)
,`user_kd` varchar(7)
,`menu_kd` varchar(7)
,`transaksi_kd` varchar(7)
,`total` int(11)
,`sub_total` int(11)
,`keterangan` text
,`status_keterangan` enum('T','S','N')
,`balasan_keterangan` text
,`status_detail` enum('pending','dimasak','siap','diambil')
,`kd_menu` varchar(7)
,`name_menu` varchar(50)
,`harga` int(11)
,`status` enum('tersedia','tidak_tersedia')
,`name` varchar(50)
,`level` enum('Admin','Waiter','Kasir','Owner','Pelanggan','Koki')
,`no_meja` int(11)
,`tanggal` date
,`nama_user` varchar(50)
,`status_order` enum('selesai_pembayaran','belum_bayar','belum_beli')
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `kd_detail` varchar(7) NOT NULL,
  `order_kd` varchar(7) NOT NULL,
  `user_kd` varchar(7) NOT NULL,
  `menu_kd` varchar(7) NOT NULL,
  `transaksi_kd` varchar(7) NOT NULL,
  `total` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_keterangan` enum('T','S','N') DEFAULT NULL,
  `balasan_keterangan` text NOT NULL,
  `status_detail` enum('pending','dimasak','siap','diambil') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`kd_detail`, `order_kd`, `user_kd`, `menu_kd`, `transaksi_kd`, `total`, `sub_total`, `keterangan`, `status_keterangan`, `balasan_keterangan`, `status_detail`) VALUES
('DM001', 'TR001', 'US012', 'MN005', 'TA001', 1, 20000, '', '', '', 'siap'),
('DM002', 'TR001', 'US012', 'MN008', 'TA001', 2, 20000, '', '', '', 'siap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_order_temporary`
--

CREATE TABLE `tb_detail_order_temporary` (
  `kd_detail` varchar(7) NOT NULL,
  `order_kd` varchar(7) NOT NULL,
  `user_kd` varchar(7) NOT NULL,
  `menu_kd` varchar(7) NOT NULL,
  `transaksi_kd` varchar(7) NOT NULL,
  `total` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_keterangan` enum('T','S','N') DEFAULT NULL,
  `balasan_keterangan` text NOT NULL,
  `status_detail` enum('pending','dimasak','siap','diambil') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kd_kategori` varchar(7) NOT NULL,
  `name_kategori` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kd_kategori`, `name_kategori`, `description`, `photo`) VALUES
('KT001', 'Ayam', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', '155434461764.png'),
('KT002', 'Nasi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', '1554344643755.jpg'),
('KT003', 'Sayuran', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', '1554344669506.jpg'),
('KT004', 'Coffe and Soft Drink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', '1554344693692.jpg'),
('KT005', 'Juice', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', '1554344709288.jpg'),
('KT006', 'Sup &amp; Soto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', '1554344447964.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Waiter'),
(3, 'Kasir'),
(4, 'Owner'),
(5, 'Pelanggan'),
(6, 'Koki');

-- --------------------------------------------------------

--
-- Table structure for table `tb_meja`
--

CREATE TABLE `tb_meja` (
  `id` int(11) NOT NULL,
  `no_meja` int(3) NOT NULL,
  `user_kd` varchar(7) NOT NULL,
  `status` enum('active','non-active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_meja`
--

INSERT INTO `tb_meja` (`id`, `no_meja`, `user_kd`, `status`) VALUES
(1, 1, 'US013', 'active'),
(2, 2, '', 'non-active'),
(3, 3, '', 'non-active'),
(4, 4, '', 'non-active'),
(5, 5, '', 'non-active'),
(6, 6, '', 'non-active'),
(7, 7, '', 'non-active'),
(8, 8, '', 'non-active'),
(9, 9, '', 'non-active'),
(10, 10, '', 'non-active'),
(11, 11, '', 'non-active'),
(12, 12, '', 'non-active'),
(13, 13, '', 'non-active'),
(14, 14, '', 'non-active'),
(15, 15, '', 'non-active'),
(16, 16, '', 'non-active'),
(17, 17, '', 'non-active'),
(18, 18, '', 'non-active'),
(19, 19, '', 'non-active'),
(20, 20, '', 'non-active'),
(21, 21, '', 'non-active'),
(22, 22, '', 'non-active'),
(23, 23, '', 'non-active'),
(24, 24, '', 'non-active'),
(25, 25, '', 'non-active'),
(26, 26, '', 'non-active'),
(27, 27, '', 'non-active'),
(28, 28, '', 'non-active'),
(29, 29, '', 'non-active'),
(30, 30, '', 'non-active'),
(31, 31, '', 'non-active'),
(32, 32, '', 'non-active'),
(33, 33, '', 'non-active'),
(34, 34, '', 'non-active'),
(35, 35, '', 'non-active'),
(36, 36, '', 'non-active'),
(37, 37, '', 'non-active'),
(38, 38, '', 'non-active'),
(39, 39, '', 'non-active'),
(40, 40, '', 'non-active'),
(41, 41, '', 'non-active'),
(42, 42, '', 'non-active'),
(43, 43, '', 'non-active'),
(44, 44, '', 'non-active'),
(45, 45, '', 'non-active'),
(46, 46, '', 'non-active'),
(47, 47, '', 'non-active'),
(48, 48, '', 'non-active'),
(49, 49, '', 'non-active'),
(50, 50, '', 'non-active'),
(51, 51, '', 'non-active'),
(52, 52, '', 'non-active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `kd_menu` varchar(7) NOT NULL,
  `name_menu` varchar(50) NOT NULL,
  `kategori_id` varchar(7) NOT NULL,
  `harga` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` enum('tersedia','tidak_tersedia') NOT NULL DEFAULT 'tersedia',
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`kd_menu`, `name_menu`, `kategori_id`, `harga`, `description`, `status`, `photo`) VALUES
('MN001', 'Ayam Serundeng', 'KT001', 30000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554350315287.jpg'),
('MN002', 'Ayam geprek', 'KT001', 25000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554350448179.jpg'),
('MN003', 'Opor Ayam', 'KT001', 30000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554350471862.jpg'),
('MN004', 'Nasi Kuning', 'KT002', 15000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554350514500.jpg'),
('MN005', 'Nasi Pecel', 'KT002', 20000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554350547631.jpg'),
('MN006', 'Nasi Goreng Ayam', 'KT002', 15000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554350588507.jpg'),
('MN007', 'Jus Alpukat', 'KT005', 10000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '155435061848.jpg'),
('MN008', 'Jus Anggur', 'KT005', 10000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554350648687.jpg'),
('MN009', 'Jus Jeruk', 'KT005', 10000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554350665679.jpg'),
('MN010', 'Sop sapi', 'KT006', 20000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554369912639.jpg'),
('MN011', 'Es teh manis', 'KT004', 5000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554369938443.jpg'),
('MN012', 'Jahe', 'KT004', 5000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554369966769.jpg'),
('MN013', 'Nasi Goreng Telur', 'KT002', 15000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554370011485.jpg'),
('MN014', 'Jus Tomat', 'KT005', 10000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua', 'tersedia', '1554370061484.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `kd_order` varchar(7) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_user` varchar(50) NOT NULL,
  `user_kd` varchar(7) NOT NULL,
  `keterangan` text,
  `status_order` enum('selesai_pembayaran','belum_bayar','belum_beli') NOT NULL DEFAULT 'belum_beli',
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`kd_order`, `no_meja`, `waktu`, `nama_user`, `user_kd`, `keterangan`, `status_order`, `tanggal`) VALUES
('TR001', 1, '2019-04-04 08:40:01', 'Subeki Mahmudin', 'US012', '', 'selesai_pembayaran', '2019-04-04'),
('TR002', 1, '2019-04-04 09:21:17', 'Hira Maulana', 'US013', '', 'belum_beli', '2019-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kd_pelanggan` varchar(7) NOT NULL,
  `name_pelanggan` varchar(100) NOT NULL,
  `no_meja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kd_pelanggan`, `name_pelanggan`, `no_meja`) VALUES
('PG001', 'Subeki Mahmudin', 1),
('PG002', 'Hira Maulana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kd_transaksi` varchar(7) NOT NULL,
  `order_kd` varchar(7) NOT NULL,
  `user_kd` varchar(7) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kd_transaksi`, `order_kd`, `user_kd`, `total_harga`, `tanggal`, `waktu`) VALUES
('TA001', 'TR001', 'US012', 40000, '2019-04-04', '2019-04-04 08:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kd_user` varchar(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('Admin','Waiter','Kasir','Owner','Pelanggan','Koki') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kd_user`, `name`, `email`, `username`, `password`, `level`) VALUES
('US001', 'Fajar Subeki', 'fajarsub06@gmail.com', 'fajarsubeki', 'YWRtaW4xMjM=', 'Admin'),
('US003', 'Dodi Mulyadi', 'dodi@gmail.com', 'dodi123', 'a29raTEyMw==', 'Koki'),
('US005', 'Dinda Aulia', 'dinda@gmail.com', 'dinda123', 'a2FzaXIxMjM=', 'Kasir'),
('US007', 'Putay', 'putay@gmail.com', 'putay123', 'd2FpdGVyMTIz', 'Waiter'),
('US011', 'Danu Wijaya', 'danu@gmail.com', 'danu123', 'b3duZXIxMjM=', 'Owner'),
('US012', 'Subeki Mahmudin', 'pelanggan@gmail.com', 'subeki mahmudin', 'MQ==', 'Pelanggan'),
('US013', 'Hira Maulana', 'pelanggan@gmail.com', 'hira maulana', 'MQ==', 'Pelanggan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `transaksi`
-- (See below for the actual view)
--
CREATE TABLE `transaksi` (
`kd_transaksi` varchar(7)
,`total_harga` int(11)
,`waktu` timestamp
,`tanggal` date
,`name` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `detail_order`
--
DROP TABLE IF EXISTS `detail_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_order`  AS  select `tb_detail_order`.`kd_detail` AS `kd_detail`,`tb_detail_order`.`order_kd` AS `order_kd`,`tb_detail_order`.`user_kd` AS `user_kd`,`tb_detail_order`.`menu_kd` AS `menu_kd`,`tb_detail_order`.`transaksi_kd` AS `transaksi_kd`,`tb_detail_order`.`total` AS `total`,`tb_detail_order`.`sub_total` AS `sub_total`,`tb_detail_order`.`keterangan` AS `keterangan`,`tb_detail_order`.`status_keterangan` AS `status_keterangan`,`tb_detail_order`.`balasan_keterangan` AS `balasan_keterangan`,`tb_detail_order`.`status_detail` AS `status_detail`,`tb_menu`.`kd_menu` AS `kd_menu`,`tb_menu`.`name_menu` AS `name_menu`,`tb_menu`.`harga` AS `harga`,`tb_menu`.`status` AS `status`,`tb_user`.`name` AS `name`,`tb_user`.`level` AS `level`,`tb_order`.`no_meja` AS `no_meja`,`tb_order`.`tanggal` AS `tanggal`,`tb_order`.`nama_user` AS `nama_user`,`tb_order`.`status_order` AS `status_order` from (((`tb_detail_order` join `tb_menu` on((`tb_detail_order`.`menu_kd` = `tb_menu`.`kd_menu`))) join `tb_user` on((`tb_detail_order`.`user_kd` = `tb_user`.`kd_user`))) join `tb_order` on((`tb_detail_order`.`order_kd` = `tb_order`.`kd_order`))) ;

-- --------------------------------------------------------

--
-- Structure for view `transaksi`
--
DROP TABLE IF EXISTS `transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksi`  AS  select `tb_transaksi`.`kd_transaksi` AS `kd_transaksi`,`tb_transaksi`.`total_harga` AS `total_harga`,`tb_transaksi`.`waktu` AS `waktu`,`tb_transaksi`.`tanggal` AS `tanggal`,`tb_user`.`name` AS `name` from (`tb_transaksi` join `tb_user` on((`tb_user`.`kd_user` = `tb_transaksi`.`user_kd`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`kd_detail`),
  ADD KEY `order_kd` (`order_kd`),
  ADD KEY `menu_kd` (`menu_kd`),
  ADD KEY `transaksi_kd` (`transaksi_kd`),
  ADD KEY `user_kd` (`user_kd`);

--
-- Indexes for table `tb_detail_order_temporary`
--
ALTER TABLE `tb_detail_order_temporary`
  ADD PRIMARY KEY (`kd_detail`),
  ADD KEY `order_kd` (`order_kd`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`kd_menu`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`kd_order`),
  ADD KEY `user_kd` (`user_kd`),
  ADD KEY `no_meja` (`no_meja`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `user_kd` (`user_kd`),
  ADD KEY `order_kd` (`order_kd`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_meja`
--
ALTER TABLE `tb_meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD CONSTRAINT `tb_detail_order_ibfk_1` FOREIGN KEY (`order_kd`) REFERENCES `tb_order` (`kd_order`),
  ADD CONSTRAINT `tb_detail_order_ibfk_2` FOREIGN KEY (`user_kd`) REFERENCES `tb_user` (`kd_user`),
  ADD CONSTRAINT `tb_detail_order_ibfk_3` FOREIGN KEY (`menu_kd`) REFERENCES `tb_menu` (`kd_menu`),
  ADD CONSTRAINT `tb_detail_order_ibfk_4` FOREIGN KEY (`transaksi_kd`) REFERENCES `tb_transaksi` (`kd_transaksi`);

--
-- Constraints for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `tb_menu_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori` (`kd_kategori`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`no_meja`) REFERENCES `tb_meja` (`id`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`user_kd`) REFERENCES `tb_user` (`kd_user`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`order_kd`) REFERENCES `tb_order` (`kd_order`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`user_kd`) REFERENCES `tb_user` (`kd_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
