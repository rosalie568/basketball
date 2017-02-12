<?php

mysql_connect("localhost","root" ,"") or die ("Hey, check your server connection."); // will connect.

mysql_query('SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"');
mysql_query('SET time_zone = "+00:00"');

/*
// Table structure for table `friendList`
*/

mysql_query(" CREATE TABLE IF NOT EXISTS `friendList` (
      `email` varchar(99) NOT NULL,
      `contactEmail` varchar(99) NOT NULL,
      PRIMARY KEY (`email`,`contactEmail`),
      UNIQUE KEY `email` (`email`),
      UNIQUE KEY `contactEmail` (`contactEmail`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

");


/*
-- Table structure for table `gameLocations`
*/

mysql_query(" CREATE TABLE IF NOT EXISTS `gameLocations` (
      `locationId` int(50) NOT NULL AUTO_INCREMENT COMMENT 'id of game',
      `gameLocation` varchar(70) NOT NULL COMMENT 'location of the game',
      PRIMARY KEY (`locationId`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4
");

/*
-- Dumping data for table `gameLocations`
*/

mysql_query(" INSERT INTO `gameLocations` (`locationId`, `gameLocation`) VALUES
    (1, 'Millennium Park'),
    (2, 'Conway Park'),
    (3, 'C4 Competitive Court & Conditioning')
");


/*
-- Table structure for table `gameName`
*/

mysql_query(" CREATE TABLE IF NOT EXISTS `gameName` (
      `gameId` int(100) NOT NULL AUTO_INCREMENT,
      `createdBy` varchar(50) NOT NULL COMMENT 'who created game?',
      `gameTime` varchar(17) NOT NULL COMMENT 'year/month/day dd:dd',
      `location` varchar(70) NOT NULL COMMENT 'location of game',
      `playersRegistered` int(30) NOT NULL DEFAULT '1' COMMENT '# of players registered for each game',
      PRIMARY KEY (`gameId`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15
");

/*
-- Table structure for table `gameRegistered`
*/

mysql_query(" CREATE TABLE IF NOT EXISTS `gameRegistered` (
  `gameId` int(100) NOT NULL AUTO_INCREMENT COMMENT 'starts at 1 and increments by 1',
  `playerFirstName` varchar(32) DEFAULT NULL COMMENT 'no more than 32 characters',
  `playerLastName` varchar(32) DEFAULT NULL COMMENT 'no more than 32 characters',
  `playerEmail` varchar(99) NOT NULL COMMENT 'no more than 99 characters',
  PRIMARY KEY (`gameId`,`playerEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15
");


mysql_query(" CREATE TABLE IF NOT EXISTS `numPlayers` (
      `minPlayers` int(11) NOT NULL DEFAULT '1' COMMENT 'Minimum # of players',
      `maxPlayers` int(11) NOT NULL DEFAULT '30' COMMENT 'Max # of players'
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1
");

/*
-- Dumping data for table `numPlayers`
*/

mysql_query(" INSERT INTO `numPlayers` (`minPlayers`, `maxPlayers`) VALUES
(1, 50)
");


/*
-- Table structure for table `student`
*/

mysql_query(" CREATE TABLE IF NOT EXISTS `student` (
      `firstName` varchar(32) NOT NULL COMMENT 'no more than 32 characters',
      `lastName` varchar(32) NOT NULL COMMENT 'no more than 32 characters',
      `email` varchar(99) NOT NULL COMMENT 'maximum of 99 characters',
      `password` varchar(30) NOT NULL COMMENT 'no more thean 30 characters',
      `phoneNum` varchar(14) DEFAULT NULL COMMENT 'format is ddd ddd-dddd',
      `status` varchar(30) NOT NULL DEFAULT 'student' COMMENT 'person is student or admin?',
      PRIMARY KEY (`email`),
      UNIQUE KEY `email` (`email`),
      UNIQUE KEY `password` (`password`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1
");

/*
-- Dumping data for table `student`
*/

mysql_query(" INSERT INTO `student` (`firstName`, `lastName`, `email`, `password`, `phoneNum`, `status`) VALUES
    ('admin', 'admin', 'admin@mtsu.edu', 'admin', '', 'admin')
");

?>
