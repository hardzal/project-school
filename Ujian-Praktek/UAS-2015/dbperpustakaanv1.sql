-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2015 at 02:57 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaanv1`
--
CREATE DATABASE IF NOT EXISTS `uas_2015` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uas_2015`;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','member') NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama_lengkap`, `email`, `alamat`, `level`, `status`) VALUES
(1, 'admin_master', '5f4dcc3b5aa765d61d8327deb882cf99', 'Web Master', 'official@web.master', 'Cyber Street Number 7', 'admin', 1),
(2, 'member', '827ccb0eea8a706c4c34a16891f84e7b', 'Adam', 'member@pustaka.master', 'Street Pustakaa', 'member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `gambar_buku` text NOT NULL,
  `file_buku` text NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `stok` text NOT NULL,
  `sinopsis` text NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `gambar_buku`, `file_buku`, `pengarang`, `penerbit`, `stok`, `sinopsis`) VALUES
(1, 'Where Heaven Can Be Real', '7.jpg', 'A380_British_Airways.pdf', 'Pengatrang', 'DSKAODJOA', '2', 'Wellllcoeg baget'),
(2, 'Where Heaven Can Be Real', '7.jpg', 'A380_British_Airways.pdf', 'Pengatrang', 'DSKAODJOA', '2', 'Wellllcoeg baget');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
