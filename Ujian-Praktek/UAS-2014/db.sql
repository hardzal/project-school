-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2014 at 05:55 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `latihan`
--
CREATE DATABASE IF NOT EXISTS `uas_2014` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uas_2014`;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `judul`, `pengarang`, `penerbit`) VALUES
(1, 'Demi Alis', 'Alisan', 'Chaika'),
(2, 'Nggak Nafas Nggak Hidup', 'Cak Kamfret', 'JIS'),
(3, 'Pengambara Politik', 'Fadlay Zen', 'Folitical'),
(7, 'Mencari Harta Hantu Tutut', 'Tuti Simulah', 'Jayakarta'),
(9, 'Dora dan Emon', 'Eman Santoso', 'Java Komikus');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
