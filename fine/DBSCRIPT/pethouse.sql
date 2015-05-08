-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2015 at 07:01 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pethouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `dateofposting` date NOT NULL,
  `rentpermonth` int(11) NOT NULL,
  `animaltypes` varchar(250) NOT NULL,
  `landlorddesc` text NOT NULL,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`id`, `uname`, `dateofposting`, `rentpermonth`, `animaltypes`, `landlorddesc`, `img`) VALUES
(1, 'user001', '2015-05-07', 400, 'Dog', 'These kings of the jungle can weigh between 250 and 550 pounds, depending on sex and age and can grow up to be 14 years old in the wild and over the age of 20 years old in captivity. They become capable at hunting at the age of two and are fully grown after 5 or 6 years. Male lions are distinguishable for their impressive manes, which signifies their masculinity and reflects their health. The darker and thicker the mane, the healthier the lion. It allows the lions to appear stronger and frightening to warn off enemies, particularly humans, and appeals to lionesses that are scientifically proven to mate more with lions with thick and dark manes. Lions with no manes are either genetically inbred or have been castrated.', 'uploads/1431019921dog.jpg'),
(12, 'user001', '2015-05-07', 500, 'Cat', 'These kings of the jungle can weigh between 250 and 550 pounds, depending on sex and age and can grow up to be 14 years old in the wild and over the age of 20 years old in captivity. They become capable at hunting at the age of two and are fully grown after 5 or 6 years. Male lions are distinguishable for their impressive manes, which signifies their masculinity and reflects their health. The darker and thicker the mane, the healthier the lion. It allows the lions to appear stronger and frightening to warn off enemies, particularly humans, and appeals to lionesses that are scientifically proven to mate more with lions with thick and dark manes. Lions with no manes are either genetically inbred or have been castrated.', 'uploads/1431021081cat.jpg'),
(13, 'user001', '2015-05-07', 300, 'Fish', 'These kings of the jungle can weigh between 250 and 550 pounds, depending on sex and age and can grow up to be 14 years old in the wild and over the age of 20 years old in captivity. They become capable at hunting at the age of two and are fully grown after 5 or 6 years. Male lions are distinguishable for their impressive manes, which signifies their masculinity and reflects their health. The darker and thicker the mane, the healthier the lion. It allows the lions to appear stronger and frightening to warn off enemies, particularly humans, and appeals to lionesses that are scientifically proven to mate more with lions with thick and dark manes. Lions with no manes are either genetically inbred or have been castrated.', 'uploads/1431021108fish.jpg'),
(14, 'user001', '2015-05-07', 1500, 'lion', 'These kings of the jungle can weigh between 250 and 550 pounds, depending on sex and age and can grow up to be 14 years old in the wild and over the age of 20 years old in captivity. They become capable at hunting at the age of two and are fully grown after 5 or 6 years. Male lions are distinguishable for their impressive manes, which signifies their masculinity and reflects their health. The darker and thicker the mane, the healthier the lion. It allows the lions to appear stronger and frightening to warn off enemies, particularly humans, and appeals to lionesses that are scientifically proven to mate more with lions with thick and dark manes. Lions with no manes are either genetically inbred or have been castrated.', 'uploads/1431022597cat.jpg'),
(15, 'user001', '2015-05-07', 1500, 'Dog, All Small Animals, Cat, Fish, Bird, Reptile, lion', 'These kings of the jungle can weigh between 250 and 550 pounds, depending on sex and age and can grow up to be 14 years old in the wild and over the age of 20 years old in captivity. They become capable at hunting at the age of two and are fully grown after 5 or 6 years. Male lions are distinguishable for their impressive manes, which signifies their masculinity and reflects their health. The darker and thicker the mane, the healthier the lion. It allows the lions to appear stronger and frightening to warn off enemies, particularly humans, and appeals to lionesses that are scientifically proven to mate more with lions with thick and dark manes. Lions with no manes are either genetically inbred or have been castrated.', 'uploads/1431022661cat.jpg');

-- --------------------------------------------------------



--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usertype` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Login Table' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `usertype`) VALUES
(1, 'user001', 'user001', 'sahu_gopal@rediffmai.com', 'L'),
(2, 'user002', 'user002', 'sahu_gopal@rediffmai.com', 'L'),
(3, 'user006', 'user006', 'sahu_gopal@rediffmail.com', 'L'),
(4, 'user007', 'user007', 'sahugopal123@gmail.com', 'R'),
(5, 'user003', 'user003', 'sahugopal123@gmail.com', 'R'),
(6, 'user004', 'user004', 'sahugopal123@gmail.com', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE IF NOT EXISTS `renter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `dateofposting` date NOT NULL,
  `rentpermonth` int(11) NOT NULL,
  `animaltypes` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`id`, `uname`, `dateofposting`, `rentpermonth`, `animaltypes`) VALUES
(1, 'user007', '2015-05-03', 900, 'All Small Animals, Fish, Bird'),
(2, 'user007', '2015-05-03', 900, 'All Small Animals, Fish, Bird'),
(3, 'user004', '2015-05-07', 700, 'Dog');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
