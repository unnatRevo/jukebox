-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.31-0ubuntu0.15.10.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for JukeBox
CREATE DATABASE IF NOT EXISTS `JukeBox` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `JukeBox`;

-- Dumping structure for procedure JukeBox.demo1
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `demo1`(in _param1 DateTime , in _param2 varchar(50))
BEGIN
	-- set _param1 = current_date ();
	-- _param2 = 'this is my first test';
    select _param1 as dt , _param2 as myText;
END//
DELIMITER ;

-- Dumping structure for table JukeBox.filedetails
CREATE TABLE IF NOT EXISTS `filedetails` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `filesize` varchar(50) NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `fileextension` varchar(10) NOT NULL,
  `filepath` varchar(500) NOT NULL,
  `fileuploaderror` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table JukeBox.logindetail
CREATE TABLE IF NOT EXISTS `logindetail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  PRIMARY KEY (`Username`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for procedure JukeBox.sp_CheckUserdetails
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CheckUserdetails`(
	IN `_username` VARCHAR(40),
	IN `_password` VARCHAR(40)

)
BEGIN
	SELECT
		Username,
		Password
	FROM
		logindetail
	WHERE
		Username like _username AND
		Password like _password;
END//
DELIMITER ;

-- Dumping structure for procedure JukeBox.sp_GetFileDetails
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_GetFileDetails`(IN `_username` VARCHAR(40))
BEGIN
	SELECT
		jukebox.filedetails.filename,
		jukebox.filedetails.filesize,
		jukebox.filedetails.filetype,
		jukebox.filedetails.fileextension
	FROM
		filedetails
	WHERE
		username like _username;
END//
DELIMITER ;

-- Dumping structure for procedure JukeBox.sp_SetFileDetails
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_SetFileDetails`(
	IN `username` VARCHAR(40),
	IN `_filename` VARCHAR(250),
	IN `_filesize` VARCHAR(50),
	IN `_filetype` VARCHAR(50),
	IN `_fileextension` VARCHAR(10),
	IN `_filepath` VARCHAR(500),
	IN `_fileuploaderror` INT
)
BEGIN
        	INSERT INTO filedetails VALUES (
     		   	 DEFAULT,
                `username`,
                `_filename`,
                `_filesize`,
                `_filetype`,
                `_fileextension`,
                `_filepath`,
                _fileuploaderror);
END//
DELIMITER ;

-- Dumping structure for procedure JukeBox.sp_SetUserDetails
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_SetUserDetails`(IN `_fullname` VARCHAR(100), IN `_gender` VARCHAR(5), IN `_birthdate` DATE, IN `_mobile` VARCHAR(15), IN `_email` VARCHAR(50))
BEGIN
	INSERT INTO userdetails
	VALUES (
		_fullname,
		_gender,
		_birthdate,
		_mobile,
		_email
	);
END//
DELIMITER ;

-- Dumping structure for procedure JukeBox.sp_Signup_user
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Signup_user`(IN `_username` varchar(40), IN `_password` varchar(40))
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

-- Dumping structure for table JukeBox.userdetails
CREATE TABLE IF NOT EXISTS `userdetails` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `birthdate` date NOT NULL,
  `mobilenumber` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`mobilenumber`),
  UNIQUE KEY `email` (`email`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
