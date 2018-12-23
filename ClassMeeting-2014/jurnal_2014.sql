-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2014 at 12:38 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jurnal_2014`
--
CREATE DATABASE IF NOT EXISTS `jurnal_2014` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jurnal_2014`;

-- --------------------------------------------------------

--
-- Table structure for table `db_jurnal`
--

CREATE TABLE IF NOT EXISTS `db_jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl_buat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kategori` varchar(32) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_jurnal`),
  KEY `judul` (`judul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_jurnal`
--

INSERT INTO `db_jurnal` (`id_jurnal`, `judul`, `tgl_buat`, `kategori`, `isi`) VALUES
(1, 'Ketika Sebaris Kode ', '2014-12-15 04:23:14', 'Other', 'Sed nisl ligula, suscipit id arcu vitae, vulputate ullamcorper erat. Duis tempus sodales diam, ac porttitor mauris mattis nec. Nullam gravida mi neque, porta pretium nisi sollicitudin ac. Vestibulum sodales ipsum eu massa volutpat, sed dignissim ligula egestas. Donec massa nisi, placerat vel suscipit sit amet, vestibulum eu neque. Quisque a sapien posuere, luctus orci laoreet, vulputate erat. Aenean in augue ut augue eleifend fermentum non blandit sem. Phasellus sed scelerisque odio. Suspendisse eu congue quam, vitae pretium urna. Nam in ligula vitae justo molestie dictum. Vivamus dignissim porta elit, vel sodales magna ultrices id. Curabitur id odio ac tortor pharetra accumsan. Curabitur a tortor nulla.'),
(2, 'Menggambar Dengan Canvas HTML5!', '2014-12-15 19:27:50', 'HTML5', 'sed lectus in, ullamcorper commodo mi. Proin ornare pellentesque neque vitae hendrerit. Pellentesque porta nec magna et suscipit. Nam vel consectetur justo. Aliquam blandit orci eget enim interdum, non placerat magna porttitor. Duis convallis quam vel quam rhoncus, nec gravida nisi dictum. Sed tempus sit amet orci laoreet pellentesque. Mauris iaculis orci euismod eros convallis, sit amet porttitor erat sagittis. Pellentesque aliquet lectus nibh, vel tempor nibh luctus nec.'),
(3, 'Perbedaan Antara Kode X dan Y ', '2014-12-15 19:27:50', 'Aneh', ' non placerat magna porttitor. Duis convallis quam vel quam rhoncus, nec gravida nisi dictum. Sed tempus sit amet orci laoreet pellentesque. Mauris iaculis orci euismod eros convallis, sit amet porttitor erat sagittis. Pellentesque aliquet lectus nibh, vel tempor nibh luctus nec.');

-- --------------------------------------------------------

--
-- Table structure for table `db_news`
--

CREATE TABLE IF NOT EXISTS `db_news` (
  `id_news` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl_buat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kategori` varchar(32) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_news`),
  KEY `judul` (`judul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_news`
--

INSERT INTO `db_news` (`id_news`, `judul`, `tgl_buat`, `kategori`, `isi`) VALUES
(1, 'Ajang Unjuk Gigi di Pepsodent', '2014-12-15 19:31:29', 'Kesehatan', 'Mauris eu tincidunt sapien. Vivamus malesuada magna ac felis egestas, nec egestas lacus imperdiet. Vestibulum lobortis tristique vehicula. Donec dictum nisl quis turpis porta, ac pharetra nisl faucibus. Quisque tristique nibh ac nibh tincidunt, a auctor nisi interdum. Vivamus facilisis urna vitae ipsum luctus viverra.'),
(2, 'Antara Musyrik atau syirik?', '2014-12-15 19:31:29', 'Agama', 'Terkadang kita sendiri juga melakukan hal yang kita tidak bisa hindari entah itu apa ...');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `deskripsi`) VALUES
(1, 'kesehatan', 'Artikel tentang berbagai macam tips tentang kesehatan.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `usr_login` varchar(32) NOT NULL,
  `usr_password` varchar(32) NOT NULL,
  `usr_hak` varchar(10) NOT NULL,
  PRIMARY KEY (`usr_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_login`, `usr_password`, `usr_hak`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
('user', '202cb962ac59075b964b07152d234b70', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
