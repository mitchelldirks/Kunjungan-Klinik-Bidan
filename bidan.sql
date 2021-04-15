-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 04:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `spesialisasi` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `tempatlahir`, `tanggallahir`, `tel`, `email`, `alamat`, `spesialisasi`, `reg_date`) VALUES
(9, 'Colonel Sanders', 'Kentuky', '1907-01-01', '14022', 'kfc@kfcindonesia.com', '', 'Kandungan', '2021-01-25 04:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(1) NOT NULL,
  `tanggal` date NOT NULL,
  `dokter` int(1) NOT NULL,
  `pasien` int(1) NOT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `tanggal`, `dokter`, `pasien`, `diagnosa`, `deskripsi`, `reg_date`) VALUES
(1, '2021-01-25', 9, 11, '', '', '2021-01-25 04:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(1) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `berat` int(1) NOT NULL,
  `jenis_obat` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `berat`, `jenis_obat`, `deskripsi`) VALUES
(1, 'Tramadol', 10, 'Tablet', 'Obat Pereda Nyeri');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `tempatlahir`, `tanggallahir`, `tel`, `email`, `alamat`, `reg_date`) VALUES
(1, 'Rahmawati, S.Ip', 'Kalapa Dua', '1998-01-01', '088888888888', 'Angginiep@gmail.com', 'Tinggal dikosan atau di Cibitung', '2021-01-25 01:21:49'),
(3, 'Rusandi', 'Bekasi', '1998-12-11', '087888769662', 'nugroho.adi@gmail.com', 'Rawa Bugel', '2021-01-25 01:21:49'),
(4, 'Muhammad Januri Rahmat', 'US', '2009-02-04', '1039301', 'Pinkguy@filthyFrank.tv', 'Shut The Fuck Up', '2021-01-25 01:21:49'),
(5, 'Imanuel OKtavianus Siadan', 'Jakarta', '2010-06-27', '083892828192', 'jeannylarasyida@gmail.com', 'Jl. Lele No. 65', '2021-01-25 01:21:49'),
(6, 'Wawan', 'Seragen', '1982-08-10', '085868675', 'test@gmail.com', 'Bekasi', '2021-01-25 01:21:49'),
(8, 'Muahamad Yusup', 'Bandung', '1980-05-12', '0876767', 'anton@gmail.com', 'Bekasi Timur', '2021-01-25 01:21:49'),
(10, 'Ari Kunarso', 'Jakarta', '1981-11-17', '0876767', 'test@gmail.com', 'asas', '2021-01-25 01:21:49'),
(11, 'Ai Agustini, M.pd', 'Tanjung Duren', '2020-02-22', '081211382132', 'M@ngkok.ku', 'Jalan Tanjung Duren Raya No.359c', '2021-01-25 01:21:49'),
(12, 'Rusdi', 'Banten', '2000-03-09', '09301992919', 'jamal@bar.bar', 'asd', '2021-01-25 01:21:49'),
(13, 'Nina Mariana, A.md', 'asd', '2020-02-06', '123141415151', '1sd@sf.s', 'asd', '2021-01-25 01:21:49'),
(14, 'Ardisa Valencia', 'Jakarta', '1970-01-01', '082918829111', 'Ardisa@walkbrains.com', '', '2021-01-25 01:21:49'),
(15, 'Neezya Marcel', 'Bekasi', '2002-03-24', '089392289911', 'neezyamarcel@yahoo.co.id', 'Jl. Bougenville V No. 65 Jakasampurna', '2021-01-25 01:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` int(1) NOT NULL,
  `id_kunjungan` int(1) NOT NULL,
  `id_obat` int(1) NOT NULL,
  `dosis` int(1) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level` varchar(15) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `last_activity`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2021-01-24 23:41:19'),
(2, 'Jamal Bahri', '3002910022210001', '3002910022210001', 'user', '2021-01-24 23:41:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;