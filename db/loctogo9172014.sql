-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2014 at 07:35 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loctogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE IF NOT EXISTS `analytics` (
  `idanalytics` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(128) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `iduser` int(11) NOT NULL,
  `session` text NOT NULL,
  `browser` text NOT NULL,
  `cdate` timestamp NOT NULL,
  `mdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idanalytics`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `idcities` int(11) NOT NULL,
  `idstates` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `longitude` varchar(16) DEFAULT NULL,
  `latitude` varchar(16) DEFAULT NULL,
  `wikilink` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idcities`),
  KEY `id_st_ct_idx` (`idstates`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `idcomments` int(11) NOT NULL,
  `idtodo` int(11) DEFAULT NULL,
  `description` text,
  `iduser` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idcomments`),
  KEY `fk_idtodo_idx` (`idtodo`),
  KEY `fk_com_usr_idx` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `idcountries` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idcountries`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `idfriends` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idfriend` int(11) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idfriends`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1410356442),
('m130524_201442_init', 1410356449);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `idscore` int(11) NOT NULL,
  `type` int(1) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `value` int(5) DEFAULT NULL,
  `idtodo` int(11) DEFAULT NULL,
  `idcomment` int(11) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idscore`),
  KEY `fk_scor_usr_idx` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `idstates` int(11) NOT NULL,
  `idcountry` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idstates`),
  KEY `fk_co_st_idx` (`idcountry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `idterms` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`idterms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
  `idtodo` int(11) NOT NULL,
  `idcities` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtodo`),
  KEY `id_ct_todo_idx` (`idcities`),
  KEY `id_us_todo_idx` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE IF NOT EXISTS `todolist` (
  `idtodolist` int(11) NOT NULL,
  `idtodo` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `name` varchar(1024) DEFAULT NULL,
  `reminder` timestamp NULL DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtodolist`),
  KEY `id_todo_tol_idx` (`idtodo`),
  KEY `id_us_tol_idx` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `todolist_friends`
--

CREATE TABLE IF NOT EXISTS `todolist_friends` (
  `idtodolist_friends` int(11) NOT NULL,
  `idtodolist` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idfriends` int(11) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtodolist_friends`),
  KEY `id_tol_tolf_idx` (`idtodolist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `todo_terms`
--

CREATE TABLE IF NOT EXISTS `todo_terms` (
  `idtodo_terms` int(11) NOT NULL AUTO_INCREMENT,
  `idtodo` int(11) NOT NULL,
  `idterms` int(11) NOT NULL,
  PRIMARY KEY (`idtodo_terms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `idcity` int(11) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `id_st_ct` FOREIGN KEY (`idstates`) REFERENCES `states` (`idstates`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_com_todo` FOREIGN KEY (`idtodo`) REFERENCES `todo` (`idtodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_com_usr` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `fk_scor_usr` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `fk_co_st` FOREIGN KEY (`idcountry`) REFERENCES `countries` (`idcountries`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `id_ct_todo` FOREIGN KEY (`idcities`) REFERENCES `cities` (`idcities`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_us_todo` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `id_todo_tol` FOREIGN KEY (`idtodo`) REFERENCES `todo` (`idtodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_us_tol` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `todolist_friends`
--
ALTER TABLE `todolist_friends`
  ADD CONSTRAINT `id_tol_tolf` FOREIGN KEY (`idtodolist`) REFERENCES `todolist` (`idtodolist`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
