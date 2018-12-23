-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2016 at 09:34 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lks_sekolah_2015`
--
CREATE DATABASE IF NOT EXISTS `lks_sekolah_2015` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lks_sekolah_2015`;

-- --------------------------------------------------------

--
-- Table structure for table `blog_artikel`
--

CREATE TABLE IF NOT EXISTS `blog_artikel` (
  `artikel_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `tanggal_artikel` date NOT NULL,
  `img_artikel` text NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`artikel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `blog_artikel`
--

INSERT INTO `blog_artikel` (`artikel_id`, `user_id`, `kategori_id`, `judul_artikel`, `tanggal_artikel`, `img_artikel`, `isi`) VALUES
(6, 1, 4, 'Menambahkan Ilmu Kekinian yang tidak lagi sulit', '2015-12-15', 'Desert.jpg', 'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\n\r\n'),
(10, 1, 4, 'Let''s Trying New Path', '2015-12-15', 'wallpapermotivasi_21.jpg', 'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\n'),
(11, 1, 4, 'Trying new Method to Control Our Self to Destroy A', '2015-12-15', 'wallpapermotivasi_9.jpg', 'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\n'),
(12, 1, 4, 'Apa sih Pengetahuan tu Tau gak?', '2015-12-15', 'wallpapermotivasi_11.jpg', 'Nggak Tau deh kamu ini siapa sih On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\n'),
(13, 1, 4, 'Apa sih Pengetahuan tu Tau gak?', '2015-12-15', 'wallpapermotivasi_11.jpg', 'Nggak Tau deh kamu ini siapa sih On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\nOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `blog_bukutamu`
--

CREATE TABLE IF NOT EXISTS `blog_bukutamu` (
  `pesan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `email` text NOT NULL,
  `url` text NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`pesan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_kategori`
--

CREATE TABLE IF NOT EXISTS `blog_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_kategori` varchar(32) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blog_kategori`
--

INSERT INTO `blog_kategori` (`kategori_id`, `judul_kategori`, `keterangan`) VALUES
(3, 'Mawan Ganteng', 'Kamu ingin menjadi seorang fisika? temukan disini'),
(4, 'Kimia', 'Kimia merupakan salah satu unsur penting kehidupan, jadi tidak ada salahnya memplejari hal itu?');

-- --------------------------------------------------------

--
-- Table structure for table `blog_komentar`
--

CREATE TABLE IF NOT EXISTS `blog_komentar` (
  `komentar_id` int(11) NOT NULL AUTO_INCREMENT,
  `artikel_id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tgl_komentar` date NOT NULL,
  `email` text NOT NULL,
  `url` text NOT NULL,
  `isi` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`komentar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blog_komentar`
--

INSERT INTO `blog_komentar` (`komentar_id`, `artikel_id`, `nama_lengkap`, `tgl_komentar`, `email`, `url`, `isi`, `status`) VALUES
(1, 2, 'Pemula', '2015-12-15', 'email@google.com', 'http://www.facebook.com', 'Well This Blog Like a Wordpress, So Good!', 1),
(2, 2, 'Pembelajar', '2015-12-15', 'belajar@google.com', 'http://www.facebook.com', 'Tested Tested', 1),
(3, 2, 'Belajar lagi', '2015-12-15', 'belajar@google.com', 'http://www.facebook.com', 'Testing again Testing Again', 1),
(4, 2, 'Semangat', '2015-12-15', 'semangat@google.com', 'http://www.facebook.com', 'So The Hell this blog well', 0),
(5, 2, 'Cacking', '2015-12-15', 'cak@google.com', 'http://www.facebook.com', 'Try Again to Fix Your Self to be The New One', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_statistik`
--

CREATE TABLE IF NOT EXISTS `blog_statistik` (
  `id_stats` int(11) NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  PRIMARY KEY (`id_stats`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `blog_statistik`
--

INSERT INTO `blog_statistik` (`id_stats`, `ip`) VALUES
(1, '::1'),
(2, '::1'),
(3, '::1'),
(4, '::1'),
(5, '::1'),
(6, '::1'),
(7, '::1'),
(8, '::1'),
(9, '::1'),
(10, '::1'),
(11, '::1'),
(12, '::1'),
(13, '::1'),
(14, '::1'),
(15, '::1'),
(16, '::1'),
(17, '::1'),
(18, '::1'),
(19, '::1'),
(20, '::1'),
(21, '::1'),
(22, '::1'),
(23, '127.0.0.1'),
(24, '::1'),
(25, '::1'),
(26, '::1'),
(27, '::1'),
(28, '::1'),
(29, '::1'),
(30, '::1'),
(31, '::1'),
(32, '::1'),
(33, '::1'),
(34, '::1'),
(35, '::1'),
(36, '::1'),
(37, '::1'),
(38, '::1'),
(39, '::1'),
(40, '::1'),
(41, '::1'),
(42, '::1'),
(43, '::1'),
(44, '::1'),
(45, '::1'),
(46, '::1'),
(47, '::1'),
(48, '::1'),
(49, '::1'),
(50, '::1'),
(51, '::1'),
(52, '::1'),
(53, '::1'),
(54, '::1'),
(55, '::1'),
(56, '::1'),
(57, '::1'),
(58, '::1'),
(59, '::1'),
(60, '::1'),
(61, '::1'),
(62, '::1'),
(63, '::1'),
(64, '::1'),
(65, '::1'),
(66, '::1'),
(67, '::1'),
(68, '::1'),
(69, '::1'),
(70, '::1'),
(71, '::1'),
(72, '::1'),
(73, '::1'),
(74, '::1'),
(75, '::1'),
(76, '::1'),
(77, '::1'),
(78, '::1'),
(79, '::1'),
(80, '::1'),
(81, '::1'),
(82, '::1'),
(83, '::1'),
(84, '::1'),
(85, '::1'),
(86, '::1'),
(87, '::1'),
(88, '::1'),
(89, '::1'),
(90, '::1'),
(91, '::1'),
(92, '::1'),
(93, '::1'),
(94, '::1'),
(95, '::1'),
(96, '::1'),
(97, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `blog_user`
--

CREATE TABLE IF NOT EXISTS `blog_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_user`
--

INSERT INTO `blog_user` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin_master', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@badu.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
