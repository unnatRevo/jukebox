-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2016 at 01:14 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jukebox`
--

-- --------------------------------------------------------

--
-- Table structure for table `filedetails`
--

CREATE TABLE `filedetails` (
  `ID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `filesize` decimal(5,2) NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `fileextension` varchar(10) NOT NULL,
  `filepath` varchar(500) NOT NULL,
  `fileuploaderror` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filedetails`
--

INSERT INTO `filedetails` (`ID`, `username`, `filename`, `filesize`, `filetype`, `fileextension`, `filepath`, `fileuploaderror`) VALUES
(1, 'demo', 'temp', '5.20', 'JPG', 'aa', 'aa', 1),
(2, 'demo', 'temp', '5.20', 'JPG', 'aa', 'aa', 1),
(3, 'demo', 'I Miss U.mp3', '0.00', '', 'mp3', '../../userdata/demoI Miss U.mp3', 1),
(4, 'demo', 'Haar Gya Dil.mp3', '6.21', 'audio/mpeg', 'mp3', '../../userdata/demo/Haar Gya Dil.mp3', 0),
(5, 'demo', 'I Miss U.mp3', '4.30', 'audio/mpeg', 'mp3', '../../userdata/demo/I Miss U.mp3', 0),
(6, 'test', 'Aisi Diwangi ko.mp3', '4.57', 'audio/mpeg', 'mp3', '../../userdata/test/Aisi Diwangi ko.mp3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logindetail`
--

CREATE TABLE `logindetail` (
  `ID` int(11) NOT NULL,
  `Username` varchar(40) DEFAULT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindetail`
--

INSERT INTO `logindetail` (`ID`, `Username`, `Password`) VALUES
(3, 'demo', 'demo'),
(4, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(40) NOT NULL,
  `Lastname` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filedetails`
--
ALTER TABLE `filedetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `logindetail`
--
ALTER TABLE `logindetail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filedetails`
--
ALTER TABLE `filedetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logindetail`
--
ALTER TABLE `logindetail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
