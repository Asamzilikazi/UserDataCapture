-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 10:04 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `idnumber` varchar(13) NOT NULL,
  `cell` bigint(10) NOT NULL,
  `province` varchar(20) NOT NULL,
  `primarylang` varchar(20) NOT NULL,
  `secondarylang` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`firstname`, `lastname`, `idnumber`, `cell`, `province`, `primarylang`, `secondarylang`) VALUES
('asavela', 'mzilikazi', '789966584', 0, 'Western Cape', 'Isixhosa', 'English'),
('Mnqobi', 'bodla', '181002', 122222222, 'Western Cape', 'Isixhosa', 'English'),
('Lindo', 'Mabuya', '930420', 548899, 'Mpumalanga', 'Swati', 'English'),
('Zinhle', 'ndimlibele', '94155555', 5458, 'Afrikaans', '', 'English'),
('Milisa', 'sanda', '2011011', 899999, 'Western Cape', 'IsiXhosa', 'English');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`idnumber`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
