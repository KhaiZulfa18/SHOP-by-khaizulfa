-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 09:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `level` int(5) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `id_admin`, `email`, `username`, `nama`, `password`, `gender`, `telepon`, `level`, `waktu`) VALUES
(1, 'ADM-001', 'khaizulfa18@gmail.com', 'khaizulfa', 'Khaizuddin Zulfa', 'khaizulfa', '1', '0895383063231', 2, '2020-03-02 10:55:17'),
(34, 'ADM-003', 'admin123', 'admin123', 'admin123', 'admin123', '1', '08912000121', 1, '2020-03-26 21:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id` int(11) NOT NULL,
  `id_bank` varchar(20) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `atas_nama` varchar(30) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `status` int(4) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id`, `id_bank`, `nama_bank`, `atas_nama`, `no_rekening`, `status`, `waktu`) VALUES
(1, 'BANK-001', 'BRI', 'Khai Zulfa', '8090002312', 1, '2020-03-18 12:52:09'),
(2, 'BANK-002', 'BNI', 'Khai Zulfa', '8090012122', 1, '2020-03-21 14:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `id_checkout` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(5) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `id_user`, `id_produk`, `id_checkout`, `qty`, `status`, `waktu`) VALUES
(6, 'USER-011', 'SHP-002', '', 5, 2, '2020-03-14 19:37:02'),
(9, 'USER-011', 'SHP-005', '', 2, 2, '2020-03-17 12:01:12'),
(10, 'USER-013', 'SHP-003', '', 1, 1, '2020-03-24 20:46:31'),
(11, 'USER-011', 'SHP-002', '6', 3, 2, '2020-04-01 19:22:10'),
(12, 'USER-011', 'SHP-001', '6', 1, 2, '2020-04-01 19:25:28'),
(13, 'USER-011', 'SHP-003', 'CHK-007', 1, 2, '2020-04-01 19:29:05'),
(14, 'USER-011', 'SHP-002', 'CHK-007', 1, 2, '2020-04-01 19:29:13'),
(15, 'USER-011', 'SHP-002', 'CHK-008', 1, 2, '2020-04-02 15:05:17'),
(16, 'USER-011', 'SHP-002', 'CHK-011', 3, 2, '2020-04-07 20:35:49'),
(17, 'USER-011', 'SHP-002', 'CHK-012', 1, 2, '2020-04-14 20:21:19'),
(18, 'USER-011', 'SHP-001', 'CHK-013', 1, 2, '2020-04-14 20:30:07'),
(19, 'USER-011', 'SHP-005', 'CHK-014', 3, 2, '2020-04-17 13:40:53'),
(20, 'USER-011', 'SHP-002', 'CHK-014', 1, 2, '2020-04-17 17:06:15'),
(21, 'USER-011', 'SHP-005', 'CHK-015', 1, 2, '2020-04-18 00:23:24'),
(22, 'USER-011', 'SHP-004', 'CHK-017', 1, 2, '2020-04-18 00:25:15'),
(23, 'USER-015', 'SHP-002', '', 4, 1, '2020-04-18 22:24:47'),
(24, 'USER-015', 'SHP-006', '', 1, 1, '2020-04-18 22:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `id` int(11) NOT NULL,
  `id_checkout` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_invoice` varchar(70) NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total_barang` varchar(100) NOT NULL,
  `ongkir` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `catatan` text NOT NULL,
  `bank` varchar(10) NOT NULL,
  `kurir` varchar(10) NOT NULL,
  `status` int(5) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`id`, `id_checkout`, `id_user`, `id_invoice`, `nama_penerima`, `telepon`, `email`, `total_barang`, `ongkir`, `total`, `alamat`, `catatan`, `bank`, `kurir`, `status`, `waktu`) VALUES
(2, 'CHK-001', 'USER-011', 'INV-20200401070136', 'sadasda', 'asdasd', 'dasdasd', '462462', '', '', 'asdasdasd, Kode Pos : asdsada', 'asdasdas', 'BANK-002', 'jne', 2, '2020-04-01 19:01:36'),
(3, 'CHK-001', 'USER-011', 'INV-20200401070546', 'asdsad', 'asdsad', 'asdasd', '462462', '', '', 'asdasdsa, Kode Pos : adsadasd', 'asdasd', 'BANK-001', 'jne', 2, '2020-04-01 19:05:46'),
(10, 'CHK-007', 'USER-011', 'INV-20200401073025', 'Khai Zulfa', '087921231', 'khaizulfa@gmail.com', '2089000', '', '', 'Kendal, Kode Pos : 589891', 'Merah', 'BANK-001', 'jne', 2, '2020-04-01 19:30:25'),
(11, 'CHK-008', 'USER-011', 'INV-20200402030551', 'Luffy', 'sadasd', 'asdsad', '89000', '', '', 'asdasd, Kode Pos : sadasd', 'asdsad', 'BANK-002', 'jne', 2, '2020-04-02 15:05:51'),
(14, 'CHK-011', 'USER-011', 'INV-20200407083639', 'Garp', '08901200012', 'garp@gmail.com', '267000', '', '', 'Marineford, Kode Pos : 212332', 'Jangan sampai Rusak', 'BANK-001', 'tiki', 2, '2020-04-07 20:36:39'),
(15, 'CHK-012', 'USER-011', 'INV-20200414082814', 'Khai Zulfa', '08901203102', 'khaizulfa@gmail.com', '89000', '', '', 'Kendal, Kode Pos : 5123412', 'Barang warna Merah', 'BANK-001', 'jne', 1, '2020-04-14 20:28:14'),
(16, 'CHK-013', 'USER-011', 'INV-20200414083035', 'asdsad', 'asdasd', 'asdasd', '300000', '', '', 'asdsadas, Kode Pos : 123123', 'asdasdas', 'BANK-001', 'jne', 1, '2020-04-14 20:30:35'),
(17, 'CHK-014', 'USER-011', 'INV-20200418122255', 'Khai Zulfa', '089012310', 'khaizulfa18@gmail.com', '782693', '', '', 'Marineford, Kode Pos : 512903', 'warna merah', 'BANK-001', 'pos', 1, '2020-04-18 00:22:55'),
(18, 'CHK-015', 'USER-011', 'INV-20200418122403', 'K', '0890012013', 'xhaipotter18@gmail.com', '231231', '', '', 'ADASDASDAS, Kode Pos : 512903', 'KJKFSHKFJSDKJ', 'BANK-002', 'jne', 1, '2020-04-18 00:24:03'),
(19, 'CHK-016', 'USER-011', 'INV-20200418122435', 'adasd', 'asdasdas', 'asdasda', '782693', '', '', 'asdasda, Kode Pos : asdasd', 'asdasd', 'BANK-001', 'jne', 1, '2020-04-18 00:24:35'),
(20, 'CHK-017', 'USER-011', 'INV-20200418122550', 'Khai Zulfa', '0890889912', 'xhaipotter18@gmail.com', '200000', '', '', 'asasdasd, Kode Pos : 512903', 'dsadasdad', 'BANK-002', 'jne', 1, '2020-04-18 00:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `nama_ktg` varchar(30) NOT NULL,
  `url_ktg` varchar(30) NOT NULL,
  `status` int(5) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `id_kategori`, `nama_ktg`, `url_ktg`, `status`, `waktu`) VALUES
(3, 'KTG-003', 'T-SHIRT', 't_shirt', 1, '2020-03-01 22:08:12'),
(6, 'KTG-004', 'SEPATU', 'sepatu', 1, '2020-03-04 23:33:52'),
(7, 'KTG-005', 'SHIRT', 'shirt', 1, '2020-03-04 23:34:09'),
(8, 'KTG-006', 'GADGET', 'gadget', 1, '2020-04-20 21:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `id` int(11) NOT NULL,
  `id_invoice` varchar(50) NOT NULL,
  `nama_pengirim` varchar(30) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `nominal` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `status` int(5) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`id`, `id_invoice`, `nama_pengirim`, `bank`, `nominal`, `foto`, `status`, `waktu`) VALUES
(2, 'INV-20200401070546', 'asdasd', 'BNI', 'asdasd', 'chk1.PNG', 1, '2020-04-05 21:23:25'),
(3, 'INV-20200401070738', 'ASDASD', 'BRI', 'ASDASD', 'Discord.png', 1, '2020-04-05 21:26:39'),
(4, 'INV-20200401073025', 'asdasd', 'BRI', 'asdasd', 'images.jpg', 1, '2020-04-07 20:33:03'),
(5, 'INV-20200407083639', 'asdasd', 'BRI', 'asdasd', 'images1.jpg', 1, '2020-04-07 20:39:33'),
(6, 'INV-20200414082814', 'asdasd', 'BRI', 'asdasd', '1280x720-3328578-shigatsu-wa-kimi-no-uso-miyazono-kaori-smile.jpg', 1, '2020-04-17 16:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id` int(11) NOT NULL,
  `id_invoice` varchar(50) NOT NULL,
  `total` varchar(20) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `status` int(5) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id`, `id_invoice`, `total`, `tgl_penjualan`, `status`, `waktu`) VALUES
(1, 'INV-20200407083639', '', '2020-04-07', 1, '2020-04-07 21:54:15'),
(2, 'INV-20200401070605', '200000', '2020-04-07', 1, '2020-04-07 22:06:43'),
(3, 'INV-20200401073025', '', '2020-04-07', 1, '2020-04-07 22:08:48'),
(4, 'INV-20200401070738', '', '2020-04-07', 1, '2020-04-07 22:08:57'),
(5, 'INV-20200402030551', '', '2020-04-07', 1, '2020-04-07 22:09:15'),
(6, 'INV-20200401072810', '', '2020-04-07', 1, '2020-04-07 22:09:21'),
(7, 'INV-20200402030816', '', '2020-04-09', 1, '2020-04-09 15:23:38'),
(8, 'INV-20200402030626', '', '2020-04-09', 1, '2020-04-09 15:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id`, `nama`, `email`, `subjek`, `pesan`, `waktu`) VALUES
(1, 'Zulfa', 'khaizulfa18@gmail.com', 'Subjek', 'Halo, saya ingin menkritik anda', '2020-03-26 22:53:42'),
(3, 'Briliant', 'khaizulfa18@gmail.com', 'Sub', 'Halo', '2020-04-17 15:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--
-- Error reading structure for table shop.tbl_produk: #1932 - Table 'shop.tbl_produk' doesn't exist in engine
-- Error reading data for table shop.tbl_produk: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `shop`.`tbl_produk`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk1`
--

CREATE TABLE `tbl_produk1` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(10) NOT NULL,
  `catatan` text NOT NULL,
  `url` varchar(50) NOT NULL,
  `picture` varchar(70) NOT NULL,
  `picture_2` varchar(70) NOT NULL,
  `picture_3` varchar(70) NOT NULL,
  `status` int(5) NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk1`
--

INSERT INTO `tbl_produk1` (`id`, `id_produk`, `nama_produk`, `id_kategori`, `harga`, `stok`, `catatan`, `url`, `picture`, `picture_2`, `picture_3`, `status`, `id_admin`, `waktu`) VALUES
(2, 'SHP-002', 'T-Shirt 001', 'KTG-003', 89000, 42, 'Warna : Merah, Abu-abu, Hijau, Biru, Kuning, Hitam, dll. \nUkuran : S, M, L, XL, XLL.\nBahan : Cotton Combed 30s\nJahitan Rapi', 't-shirt_001', 'anomaly-WWesmHEgXDs-unsplash.jpg', 'taylor-dG4Eb_oC5iM-unsplash.jpg', 'who-du-nelson-alRAEyW1yFg-unsplash.jpg', 1, 'ADM-001', '2020-03-07 23:55:09'),
(3, 'SHP-003', 'T-Shirt 002', 'KTG-003', 2000000, 19, 'Bagus', 't-shirt_002', 'taylor-dG4Eb_oC5iM-unsplash1.jpg', 'who-du-nelson-alRAEyW1yFg-unsplash1.jpg', 'no-photo.jpg', 1, 'ADM-001', '2020-03-07 23:55:56'),
(4, 'SHP-004', 'Arsenal T-Shirt Original', 'KTG-003', 200000, 30, 'Bagus Asli dari tim peringkat 10', 'arsenal_t-shirt_original', 'who-du-nelson-alRAEyW1yFg-unsplash2.jpg', 'no-photo.jpg', 'no-photo.jpg', 1, 'ADM-001', '2020-03-08 00:10:19'),
(5, 'SHP-005', 'Nike Air-Minus', 'KTG-004', 900000, 20, 'Keren', 'nike_air-minus', 'revolt-164_6wVEHfI-unsplash.jpg', 'irene-kredenets-dwKiHoqqxk8-unsplash.jpg', 'no-photo.jpg', 1, 'ADM-001', '2020-03-08 00:11:03'),
(6, 'SHP-006', 'Vans KW 2', 'KTG-004', 300000, 30, 'Gak bagus sih, cuma enak aja dipake', 'vans_kw_2', 'paul-gaudriault-a-QH9MAAVNI-unsplash.jpg', 'no-photo.jpg', 'no-photo.jpg', 1, 'ADM-001', '2020-04-02 15:00:09'),
(7, 'SHP-007', 'Sepatu Buy 1 get 3', 'KTG-004', 400000, 100, 'Buy 1 Get 3', 'sepatu_buy_1_get_3', 'jakob-owens-Np_nvRuhpUo-unsplash.jpg', 'irene-kredenets-dwKiHoqqxk8-unsplash1.jpg', 'no-photo.jpg', 1, 'ADM-001', '2020-04-20 21:52:21'),
(8, 'SHP-008', 'Kemeja Hitam ala Yakuza', 'KTG-005', 1000000, 10, 'Keren, pernah dipakai yakuza', 'kemeja_hitam_ala_yakuza', 'gez-xavier-mansfield-b34E1vh1tYU-unsplash.jpg', 'no-photo.jpg', 'no-photo.jpg', 1, 'ADM-001', '2020-04-20 21:53:31'),
(9, 'SHP-009', 'Flanell Shirt', 'KTG-005', 100000, 30, 'Keren', 'flanell_shirt', 'bannon-morrissy-li2MZaE12BE-unsplash.jpg', 'no-photo.jpg', 'no-photo.jpg', 1, 'ADM-001', '2020-04-20 21:55:26'),
(10, 'SHP-010', 'Iphone Pro Max', 'KTG-006', 1000000000, 10, 'Iphone Pro Max Limited Edition', 'iphone_pro_max', 'freestocks-y90_oqvnbLE-unsplash.jpg', 'no-photo.jpg', 'no-photo.jpg', 1, 'ADM-001', '2020-04-20 21:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `url_facebook` varchar(100) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `url_instagram` varchar(100) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `url_twitter` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profil`
--

INSERT INTO `tbl_profil` (`id`, `nama`, `email`, `facebook`, `url_facebook`, `instagram`, `url_instagram`, `twitter`, `url_twitter`, `telepon`, `alamat`, `logo`, `status`, `waktu`) VALUES
(1, 'MonDshop', 'khaizulfa18@gmail.com', 'MonShop ID', 'www.facebook.com', '@monshop.id', 'www.instagram.com', '@monshop.id', 'www.twitter.com', '081807744811', 'Jalan Supernova no.69 Wanokuni, New World.', 'apple-icon.png', 'profil', '2020-03-05 19:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `text1` varchar(50) NOT NULL,
  `text2` varchar(50) NOT NULL,
  `picture` text NOT NULL,
  `status` int(5) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `text1`, `text2`, `picture`, `status`, `waktu`) VALUES
(6, 'Pacaran tuh sama Programmer', 'Titik koma aja diperhatiin, apalagi kamu :)', 'top-10-free-hd-wallpapers-for-pc-121.jpg', 1, '2020-04-12 22:11:38'),
(7, 'T-Shirt Sale', 'Sale! New T-Shirt Available in here ', 'parker-burchfield-tvG4WvjgsEY-unsplash.jpg', 1, '2020-04-20 21:42:56'),
(8, 'New Coming Iphone', 'Iphone 11 Pro Max Available! WOW!', 'freestocks-y90_oqvnbLE-unsplash.jpg', 1, '2020-04-20 21:44:33'),
(9, 'Shoes New Coming', 'Shoes New Coming in here', 'robin-worrall-FPt10LXK0cg-unsplash.jpg', 1, '2020-04-21 13:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(80) NOT NULL,
  `level` int(5) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_user`, `email`, `username`, `nama`, `password`, `telepon`, `gender`, `alamat`, `foto`, `level`, `waktu`) VALUES
(23, 'USER-010', 'asdsadas', 'asdasdd', 'adssdasd', 'adasdas', '2131231', '2', 'sdfsf', 'if-else-if.png', 1, '2020-03-02 22:07:44'),
(24, 'USER-011', 'raisa@gmail.com', 'user123', 'Raisa Adriana', 'raisa123', '08900020010', '1', 'Kendal', 'images_(1)2.jpg', 1, '2020-03-13 22:34:27'),
(25, 'USER-012', 'mondz18@gmail.com', 'Mondy', 'Mondy D. Zeet', 'mondy123', '0890231001', '1', 'Marineford, New World.', 'IMG_20190608_183033_617.jpg', 1, '2020-03-24 20:33:39'),
(26, 'USER-013', 'khaizulfa18@gmail.com', 'khaizulfa18', 'Khaizuddin Zulfa', 'khaizulfa', '089023123231', '1', 'Indonesia, Asia, Earth, Galaxy', 'IMG_20190608_183033_6171.jpg', 1, '2020-03-24 20:45:08'),
(27, 'USER-014', 'luffy@gmail.com', 'luffy123', 'Luffy', 'luffy123', '0890012312', '1', 'kendal', 'no-photo.png', 1, '2020-03-31 21:40:26'),
(28, 'USER-015', 'ihacky123@gmail.com', 'khaizulfa', 'Khaizuddin Zulfa', 'khaizulfa', '08901212312', '1', 'Candiroto RT.17 RW.01 Kec.Kota Kendal, Kab. Kendal.', 'IMG_20190608_183033_6172.jpg', 1, '2020-04-18 20:38:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk1`
--
ALTER TABLE `tbl_produk1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_produk1`
--
ALTER TABLE `tbl_produk1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
