-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 07:50 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `edit_tiket`
--

CREATE TABLE `edit_tiket` (
  `kode_tiket` varchar(50) NOT NULL,
  `nama_tiket` varchar(50) NOT NULL,
  `harga_tiket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `edit_tiket`
--

INSERT INTO `edit_tiket` (`kode_tiket`, `nama_tiket`, `harga_tiket`) VALUES
('tk-12', 'Ultimate Experience (CAT 1)', '10000000'),
('TK-14', 'CAT 1', '4500000'),
('TK-17', 'Legendary Moment', '11000000'),
('tk-33', 'CAT 2', '5000000'),
('tk-414', 'Festival', '4000000'),
('tk-42', 'My Universe', '4000000'),
('tk-441', 'CAT 5', '800000'),
('tk-50', 'CAT 3', '1000000'),
('tk-78', 'koncreng', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`fullname`, `username`, `email`, `password`, `hak`) VALUES
('Made Andien Putri Wijaya', 'ella', 'andienw@gmail.com', '1234', 'member'),
('Nuel', 'Nuelbagus', 'nuel@gmail.com', 'nuel1234', 'member'),
('Putu Agus Rama Abdiyasa', 'rama', 'ramaabdiyasa@gmail.com', '12345678', 'member'),
('Putu Agus Prana Dhiva Satvika', 'sirloinn_', 'odhivpds01@gmail.com', 'odeep888', 'admin'),
('Yulia Sekar Ayu', 'yulia', 'yuliaayu@gmail.com', 'yulia1234', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tbtiket`
--

CREATE TABLE `tbtiket` (
  `Kode_Pemesanan` varchar(50) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `Jenis_tiket` varchar(50) NOT NULL,
  `Jumlah` int(50) NOT NULL,
  `Akomodasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtiket`
--

INSERT INTO `tbtiket` (`Kode_Pemesanan`, `Nama`, `Alamat`, `Jenis_tiket`, `Jumlah`, `Akomodasi`) VALUES
('12', 'Putu Agus Prana Dhiva Satvika', 'Tampaksiring', 'tk-12', 2, 'Pesawat Datang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `edit_tiket`
--
ALTER TABLE `edit_tiket`
  ADD PRIMARY KEY (`kode_tiket`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `UNIQUE` (`email`);

--
-- Indexes for table `tbtiket`
--
ALTER TABLE `tbtiket`
  ADD PRIMARY KEY (`Kode_Pemesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
