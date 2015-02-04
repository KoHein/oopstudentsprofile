-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2015 at 04:01 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessgroup`
--

CREATE TABLE IF NOT EXISTS `accessgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `permission` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accessgroup`
--

INSERT INTO `accessgroup` (`id`, `name`, `permission`) VALUES
(1, 'Administrator', '{\r\n"admin": 1,\r\n"moderator": 1\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fromadd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `photo`, `username`, `password`, `salt`, `name`, `email`, `phone`, `address`, `fromadd`, `work`, `company`, `joined`, `group`) VALUES
(1, 'img/upload/377428d7da.jpg', 'Ko Hein', 'b564b96620dfc5fb6bacc5c244128af07987d0a95468498f6140530403425e6c', '5-ÍÆù\\š=ÕÖ¼¬_Œ»X}Ça¨×:ªçMÐYÕì', 'Ko Hein', 'mmdev.work@gmail.com', '09402605740', 'No.(240/A), 4th Floor, Bagaya Street, Yangon, Myanmar (Burma)', 'Mandalay', 'Web And Android Application Developer', 'Za Information Technology Co.,Ltd.', '2015-02-04 14:13:11', 1),
(2, 'img/upload/245a3249e5.jpg', 'yethusoe', '95bc618d542168a11740bdb79088892830062946319dee52aebb8fb46c25c820', '`''ÌŽÝðÑƒï=Ð¼/ë{w™P_6`EOŸ·¸#¥/Ôì', 'yethusoe', 'mr.yethusoe@gmail.com', '09456123', 'No(34), Yadanar bon street, ', 'dawei', 'nothing', 'za it service', '2015-02-04 15:03:37', 1),
(3, 'img/upload/348932405c.jpg', 'Tun Pai Soe', '5dbb5808b1bc1fd7c6553de089f4ba97e5920ebb767f1bfef40eeb599a51e7c5', 'ú\rP*\\gÄu7%¤c"Å¢?ÃëZõoÖi', 'koko soe', 'tunpaingsoe@gmail.com', '09254180848', 'H-71, Shwe Tharaphi (2) street, FMI City, Hlaing Thar Yar.', 'Kyauk Phyu Township, Arakan State.', 'Office Manager, Web Developer, Web Pentester', 'Za IT Services Co.Ltd.,', '2015-02-04 15:06:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
