-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4999
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for JukeBox
CREATE DATABASE IF NOT EXISTS `JukeBox` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `JukeBox`;


-- Dumping structure for table JukeBox.filedetails
CREATE TABLE IF NOT EXISTS `filedetails` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `filesize` decimal(5,2) NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `fileextension` varchar(10) NOT NULL,
  `filepath` varchar(500) NOT NULL,
  `fileuploaderror` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table JukeBox.logindetail
CREATE TABLE IF NOT EXISTS `logindetail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(40) DEFAULT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table JukeBox.userdetails
CREATE TABLE IF NOT EXISTS `userdetails` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(40) NOT NULL,
  `Lastname` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` int(12) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for procedure JukeBox.demo1
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `demo1`(in _param1 DateTime , in _param2 varchar(50))
BEGIN
	-- set _param1 = current_date ();
	-- _param2 = 'this is my first test';
    select _param1 as dt , _param2 as myText;
END//
DELIMITER ;


-- Dumping structure for procedure JukeBox.sp_Signup_user
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Signup_user`(in _username varchar(40), in _password varchar(40))
BEGIN
	INSERT INTO logindetail
    values
    (
		default,
		_username,
        _password
    );
END//
DELIMITER ;


-- Dumping structure for procedure JukeBox.test
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `test`()
BEGIN
	select 1 as RowID;
END//
DELIMITER ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
