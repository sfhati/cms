-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2014 at 12:27 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sfhati`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive1`
--

CREATE TABLE IF NOT EXISTS `archive1` (
`id` int(20) NOT NULL,
  `type` int(20) NOT NULL DEFAULT '0',
  `number1` int(20) NOT NULL DEFAULT '0',
  `number2` int(20) NOT NULL DEFAULT '0',
  `number3` int(20) NOT NULL DEFAULT '0',
  `number4` int(20) NOT NULL DEFAULT '0',
  `number5` int(20) NOT NULL DEFAULT '0',
  `number6` int(20) NOT NULL DEFAULT '0',
  `number7` int(20) NOT NULL DEFAULT '0',
  `number8` int(20) NOT NULL DEFAULT '0',
  `number9` int(20) NOT NULL DEFAULT '0',
  `number10` int(20) NOT NULL DEFAULT '0',
  `number11` int(20) NOT NULL DEFAULT '0',
  `number12` int(20) NOT NULL DEFAULT '0',
  `number13` int(20) NOT NULL DEFAULT '0',
  `number14` int(20) NOT NULL DEFAULT '0',
  `number15` int(20) NOT NULL DEFAULT '0',
  `number16` int(20) NOT NULL DEFAULT '0',
  `number17` int(20) NOT NULL DEFAULT '0',
  `number18` int(20) NOT NULL DEFAULT '0',
  `number19` int(20) NOT NULL DEFAULT '0',
  `number20` int(20) NOT NULL DEFAULT '0',
  `string1` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `string2` longtext NOT NULL,
  `string3` longtext NOT NULL,
  `string4` longtext NOT NULL,
  `string5` longtext NOT NULL,
  `string6` longtext NOT NULL,
  `string7` longtext NOT NULL,
  `string8` longtext NOT NULL,
  `string9` longtext NOT NULL,
  `string10` longtext NOT NULL,
  `date1` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date2` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date3` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date4` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date5` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `bool1` int(1) NOT NULL DEFAULT '0',
  `bool2` int(1) NOT NULL DEFAULT '0',
  `bool3` int(1) NOT NULL DEFAULT '0',
  `bool4` int(1) NOT NULL DEFAULT '0',
  `bool5` int(1) NOT NULL DEFAULT '0',
  `file1` longblob NOT NULL,
  `file2` longblob NOT NULL,
  `file3` longblob NOT NULL,
  `file4` longblob NOT NULL,
  `file5` longblob NOT NULL,
  `md5` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `archive2`
--

CREATE TABLE IF NOT EXISTS `archive2` (
`id` int(20) NOT NULL,
  `type` int(20) NOT NULL DEFAULT '0',
  `number1` int(20) NOT NULL DEFAULT '0',
  `number2` int(20) NOT NULL DEFAULT '0',
  `number3` int(20) NOT NULL DEFAULT '0',
  `number4` int(20) NOT NULL DEFAULT '0',
  `number5` int(20) NOT NULL DEFAULT '0',
  `number6` int(20) NOT NULL DEFAULT '0',
  `number7` int(20) NOT NULL DEFAULT '0',
  `number8` int(20) NOT NULL DEFAULT '0',
  `number9` int(20) NOT NULL DEFAULT '0',
  `number10` int(20) NOT NULL DEFAULT '0',
  `string1` longtext NOT NULL,
  `string2` longtext NOT NULL,
  `string3` longtext NOT NULL,
  `string4` longtext NOT NULL,
  `string5` longtext NOT NULL,
  `string6` longtext NOT NULL,
  `string7` longtext NOT NULL,
  `string8` longtext NOT NULL,
  `string9` longtext NOT NULL,
  `string10` longtext NOT NULL,
  `date1` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `date2` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `date3` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `date4` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `date5` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `bool1` int(1) NOT NULL DEFAULT '0',
  `bool2` int(1) NOT NULL DEFAULT '0',
  `bool3` int(1) NOT NULL DEFAULT '0',
  `bool4` int(1) NOT NULL DEFAULT '0',
  `bool5` int(1) NOT NULL DEFAULT '0',
  `md5` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `archive3`
--

CREATE TABLE IF NOT EXISTS `archive3` (
`id` int(20) NOT NULL,
  `type` int(20) NOT NULL DEFAULT '0',
  `number1` int(20) NOT NULL DEFAULT '0',
  `number2` int(20) NOT NULL DEFAULT '0',
  `number3` int(20) NOT NULL DEFAULT '0',
  `number4` int(20) NOT NULL DEFAULT '0',
  `number5` int(20) NOT NULL DEFAULT '0',
  `number6` int(20) NOT NULL DEFAULT '0',
  `number7` int(20) NOT NULL DEFAULT '0',
  `number8` int(20) NOT NULL DEFAULT '0',
  `number9` int(20) NOT NULL DEFAULT '0',
  `number10` int(20) NOT NULL DEFAULT '0',
  `string1` longtext NOT NULL,
  `string2` longtext NOT NULL,
  `string3` longtext NOT NULL,
  `string4` longtext NOT NULL,
  `string5` longtext NOT NULL,
  `string6` longtext NOT NULL,
  `string7` longtext NOT NULL,
  `string8` longtext NOT NULL,
  `string9` longtext NOT NULL,
  `string10` longtext NOT NULL,
  `string11` longtext NOT NULL,
  `string12` longtext NOT NULL,
  `string13` longtext NOT NULL,
  `string14` longtext NOT NULL,
  `string15` longtext NOT NULL,
  `string16` longtext NOT NULL,
  `string17` longtext NOT NULL,
  `string18` longtext NOT NULL,
  `string19` longtext NOT NULL,
  `string20` longtext NOT NULL,
  `string21` longtext NOT NULL,
  `string22` longtext NOT NULL,
  `string23` longtext NOT NULL,
  `string24` longtext NOT NULL,
  `string25` longtext NOT NULL,
  `string26` longtext NOT NULL,
  `string27` longtext NOT NULL,
  `string28` longtext NOT NULL,
  `string29` longtext NOT NULL,
  `string30` longtext NOT NULL,
  `string31` longtext NOT NULL,
  `string32` longtext NOT NULL,
  `string33` longtext NOT NULL,
  `string34` longtext NOT NULL,
  `string35` longtext NOT NULL,
  `string36` longtext NOT NULL,
  `string37` longtext NOT NULL,
  `string38` longtext NOT NULL,
  `string39` longtext NOT NULL,
  `string40` longtext NOT NULL,
  `string41` longtext NOT NULL,
  `string42` longtext NOT NULL,
  `string43` longtext NOT NULL,
  `string44` longtext NOT NULL,
  `string45` longtext NOT NULL,
  `string46` longtext NOT NULL,
  `string47` longtext NOT NULL,
  `string48` longtext NOT NULL,
  `string49` longtext NOT NULL,
  `string50` longtext NOT NULL,
  `date1` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date2` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date3` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date4` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date5` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `bool1` int(1) NOT NULL DEFAULT '0',
  `bool2` int(1) NOT NULL DEFAULT '0',
  `bool3` int(1) NOT NULL DEFAULT '0',
  `bool4` int(1) NOT NULL DEFAULT '0',
  `bool5` int(1) NOT NULL DEFAULT '0',
  `md5` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`id` int(20) NOT NULL,
  `type` int(20) NOT NULL DEFAULT '0',
  `number1` int(20) NOT NULL DEFAULT '0',
  `number2` int(20) NOT NULL DEFAULT '0',
  `number3` int(20) NOT NULL DEFAULT '0',
  `number4` int(20) NOT NULL DEFAULT '0',
  `number5` int(20) NOT NULL DEFAULT '0',
  `number6` int(20) NOT NULL DEFAULT '0',
  `number7` int(20) NOT NULL DEFAULT '0',
  `number8` int(20) NOT NULL DEFAULT '0',
  `number9` int(20) NOT NULL DEFAULT '0',
  `number10` int(20) NOT NULL DEFAULT '0',
  `number11` int(20) NOT NULL DEFAULT '0',
  `number12` int(20) NOT NULL DEFAULT '0',
  `number13` int(20) NOT NULL DEFAULT '0',
  `number14` int(20) NOT NULL DEFAULT '0',
  `number15` int(20) NOT NULL DEFAULT '0',
  `number16` int(20) NOT NULL DEFAULT '0',
  `number17` int(20) NOT NULL DEFAULT '0',
  `number18` int(20) NOT NULL DEFAULT '0',
  `number19` int(20) NOT NULL DEFAULT '0',
  `number20` int(20) NOT NULL DEFAULT '0',
  `string1` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `string2` longtext NOT NULL,
  `string3` longtext NOT NULL,
  `string4` longtext NOT NULL,
  `string5` longtext NOT NULL,
  `string6` longtext NOT NULL,
  `string7` longtext NOT NULL,
  `string8` longtext NOT NULL,
  `string9` longtext NOT NULL,
  `string10` longtext NOT NULL,
  `date1` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date2` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date3` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date4` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date5` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `bool1` int(1) NOT NULL DEFAULT '0',
  `bool2` int(1) NOT NULL DEFAULT '0',
  `bool3` int(1) NOT NULL DEFAULT '0',
  `bool4` int(1) NOT NULL DEFAULT '0',
  `bool5` int(1) NOT NULL DEFAULT '0',
  `file1` longblob NOT NULL,
  `file2` longblob NOT NULL,
  `file3` longblob NOT NULL,
  `file4` longblob NOT NULL,
  `file5` longblob NOT NULL,
  `md5` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(20) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pass` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` int(4) NOT NULL DEFAULT '0',
  `type_to` int(20) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `number1` int(20) NOT NULL DEFAULT '0',
  `number2` int(20) NOT NULL DEFAULT '0',
  `number3` int(20) NOT NULL DEFAULT '0',
  `number4` int(20) NOT NULL DEFAULT '0',
  `number5` int(20) NOT NULL DEFAULT '0',
  `number6` int(20) NOT NULL DEFAULT '0',
  `number7` int(20) NOT NULL DEFAULT '0',
  `number8` int(20) NOT NULL DEFAULT '0',
  `number9` int(20) NOT NULL DEFAULT '0',
  `number10` int(20) NOT NULL DEFAULT '0',
  `date1` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date2` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date3` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date4` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date5` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date6` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date7` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date8` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date9` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date10` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `info` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info1` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info2` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info3` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info4` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info5` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info6` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info7` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info8` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info9` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info10` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info11` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info12` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info13` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info14` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info15` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info16` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info17` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info18` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info19` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info20` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info21` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info22` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info23` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info24` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info25` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info26` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info27` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info28` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info29` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info30` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info31` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info32` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info33` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info34` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info35` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info36` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info37` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info38` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info39` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info40` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info41` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info42` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info43` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info44` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info45` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info46` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info47` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info48` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info49` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info50` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` longblob NOT NULL,
  `file_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_date` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_update` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM  DEFAULT CHARSET=cp1256 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `pass`, `email`, `type`, `type_to`, `active`, `number1`, `number2`, `number3`, `number4`, `number5`, `number6`, `number7`, `number8`, `number9`, `number10`, `date1`, `date2`, `date3`, `date4`, `date5`, `date6`, `date7`, `date8`, `date9`, `date10`, `info`, `info1`, `info2`, `info3`, `info4`, `info5`, `info6`, `info7`, `info8`, `info9`, `info10`, `info11`, `info12`, `info13`, `info14`, `info15`, `info16`, `info17`, `info18`, `info19`, `info20`, `info21`, `info22`, `info23`, `info24`, `info25`, `info26`, `info27`, `info28`, `info29`, `info30`, `info31`, `info32`, `info33`, `info34`, `info35`, `info36`, `info37`, `info38`, `info39`, `info40`, `info41`, `info42`, `info43`, `info44`, `info45`, `info46`, `info47`, `info48`, `info49`, `info50`, `file`, `file_name`, `created_date`, `last_update`) VALUES
(1, 'admin', '123456', 'you@site.com', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1418489897', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1418487649', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(20) NOT NULL,
  `page_name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `page_cont` longtext COLLATE latin1_general_ci NOT NULL,
  `page_sort` int(3) NOT NULL DEFAULT '0',
  `page_place` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `page_active` int(1) NOT NULL DEFAULT '0',
  `last_update` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `linklabel` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `powers` int(2) NOT NULL DEFAULT '0',
  `template` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `image` mediumblob NOT NULL,
  `image_name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `url` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `slave` int(11) NOT NULL DEFAULT '0',
  `page_key` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_cont`, `page_sort`, `page_place`, `page_active`, `last_update`, `linklabel`, `powers`, `template`, `description`, `image`, `image_name`, `url`, `slave`, `page_key`) VALUES
(1, 'Home', 'Welcome :) <br>this is sfhati CMS <br><br>Thank you , your site is work fine :)<br>', 0, 'header_menu_horisantal,header_menu_vertical,menu_top_bar', 1, '1418484655', '', 0, 'green', 'Click to edit...', '', '', '', 0, ''),
(2, 'About us', '<div style="margin: 0px; padding: 0px; position: relative; quotes: â€˜, â€™, â€œ, â€; color: rgb(15, 86, 98); font-family: Tahoma, Geneva, sans-serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: right; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h4 style="margin: 0px; padding: 0px; position: relative; quotes: â€˜, â€™, â€œ, â€; color: rgb(15, 86, 98); font-family: Tahoma, Geneva, sans-serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: right; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Ù…Ø¬Ù„Ø© ØµÙØ­ØªÙŠ , Ù†Ø¸Ø§Ù… Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù…Ø­ØªÙˆÙ‰ Ù„Ù„Ù…ÙˆØ§Ù‚Ø¹ Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠÙ‡</h4><h4 style="margin: 0px; padding: 0px; position: relative; quotes: â€˜, â€™, â€œ, â€; color: rgb(15, 86, 98); font-family: Tahoma, Geneva, sans-serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: right; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">&nbsp; <br></h4></div><div align="right">ÙÙŠ Ù‡Ø°Ù‡ Ø§Ù„Ù…Ø¬Ù„Ù‡ Ù‚Ù…Ù†Ø§ Ø¨Ø¹Ù…Ù„ Ø±Ø§Ø¦Ø¹ ÙŠØ¹Ø·ÙŠÙƒ ØªØ¬Ø±Ø¨Ù‡ ÙØ±ÙŠØ¯Ø© ÙÙŠ Ø¥Ù†Ø´Ø§Ø¡ ÙˆØªØµÙ…ÙŠÙ… Ø§Ù„Ù…ÙˆØ§Ù‚Ø¹ Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠÙ‡ Ø¯ÙˆÙ† Ø£ÙŠ Ù…Ø­Ø¯Ø¯Ø§Øª Ø£Ùˆ Ø¹ÙˆØ§Ø¦Ù‚ ÙÙ‚Ø¯ ØªÙ…ÙƒÙ†Ø§ Ù…Ù† Ø¬Ø¹Ù„ Ø§Ù„Ù…Ø¬Ù„Ù‡ Ù„Ø¹Ø¯Ø© Ù…Ø³ØªÙˆÙŠØ§Øª Ø¨Ø­ÙŠØ« ÙŠÙ…ÙƒÙ† Ù„Ù„Ù…Ø¨ØªØ¯Ø¦ Ø¥Ù†Ø´Ø§Ø¡ Ù…ÙˆÙ‚Ø¹ ØªÙØ§Ø¹Ù„ÙŠ ÙƒØ§Ù…Ù„ Ø¯ÙˆÙ† Ø§Ù„Ø­Ø§Ø¬Ù‡ Ù„ÙƒØªØ§Ø¨Ø© Ø³Ø·Ø± ÙƒÙˆØ¯ ÙˆØ§Ø­Ø¯ ÙƒÙ…Ø§ ÙŠÙ…ÙƒÙ† Ù„Ù„Ù…ØµØµÙ… ØªØµÙ…ÙŠÙ… Ø³Ù…Ø§Øª ÙˆÙ‚ÙˆØ§Ù„Ø¨ Ù„Ù„Ù…Ø¬Ù„Ù‡ Ø¨Ø¯ÙˆÙ† Ø£Ù† ÙŠÙƒØªØ¨ ÙƒÙˆØ¯&nbsp; Ø¨ÙŠ Ø£ØªØ´ Ø¨ÙŠ ÙˆÙŠÙ…ÙƒÙ† Ø£Ù† ÙŠØ­ØªØ§Ø¬ Ø¥Ù„Ù‰ ÙƒØªØ§Ø¨Ø© Ø£ÙƒÙˆØ§Ø¯ Ù‡ØªÙ…Ù„ ÙˆØ¬Ø§ÙØ§Ø³ÙƒØ±ÙŠØ¨Øª ÙˆØ³ØªØ§ÙŠÙ„ ÙÙŠ Ø­Ø§Ù„ Ù„Ù… ÙŠØªÙ…ÙƒÙ† Ù…Ù† Ø¥Ù†Ø¬Ø§Ø² Ø§Ù„Ø¹Ù…Ù„ Ù…Ù† Ø®Ù„Ø§Ù„ Ø§Ù„Ø£Ø¯ÙˆØ§Øª Ø§Ù„Ø¬Ø§Ù‡Ø²Ù‡ Ù„Ù„ØªØµÙ…ÙŠÙ… ÙˆØ§Ù„Ù…Ø±ÙÙ‚Ù‡ Ù…Ø¹ Ø§Ù„Ù…Ø¬Ù„Ù‡ , Ø§Ù…Ø§ Ø§Ù„Ù…Ø·ÙˆØ± Ø§Ù„Ù…Ø­ØªØ±Ù ÙÙ‚Ø¯ Ø£Ø¹Ø·ÙŠÙ†Ø§Ù‡ Ø§Ù„Ù…Ø¬Ø§Ù„ Ù„Ø¥Ù†Ø´Ø§Ø¡ Ø¥Ø¶Ø§ÙØ§Øª ÙˆØ§Ù„ØªØ­ÙƒÙ… Ø¨Ù‡Ø§ ÙˆÙƒØªØ§Ø¨Ø© Ø£ÙƒÙˆØ§Ø¯ , ÙˆØ£Ø®ÙŠØ±Ø§ Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù… Ø§Ù„Ù†Ù‡Ø§Ø¦ÙŠ Ø³ÙŠØªÙ…ÙƒÙ† Ù…Ù† Ø§Ù„ØªØ­ÙƒÙ… ÙÙŠ Ø§Ù„Ù…Ø­ØªÙˆÙ‰ Ø¨ÙƒÙ„ Ø³Ù‡ÙˆÙ„Ù‡ Ø¯ÙˆÙ† Ø§Ù„Ø­Ø§Ø¬Ù‡ Ù„Ø£ÙŠ Ù…Ø³Ø§Ø¹Ø¯Ø©<span style="color: rgb(15, 86, 98); font-family: Tahoma, Geneva, sans-serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: right; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);"> . </span><br><span style="color: rgb(15, 86, 98); font-family: Tahoma, Geneva, sans-serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: right; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);"></span></div><span style="color: rgb(15, 86, 98); font-family: Tahoma, Geneva, sans-serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: right; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);"><br>Ø§Ù„Ù…Ø·ÙˆØ± : Ø¨Ø³Ø§Ù… Ø§Ù„Ø¹ÙŠØ³Ø§ÙˆÙŠ <br></span>', 0, 'header_menu_horisantal,header_menu_vertical,menu_top_bar', 1, '1418486493', '', 0, 'green', 'Click to edit...', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE IF NOT EXISTS `table1` (
`id` int(20) NOT NULL,
  `type` int(20) NOT NULL DEFAULT '0',
  `number1` int(20) NOT NULL DEFAULT '0',
  `number2` int(20) NOT NULL DEFAULT '0',
  `number3` int(20) NOT NULL DEFAULT '0',
  `number4` int(20) NOT NULL DEFAULT '0',
  `number5` int(20) NOT NULL DEFAULT '0',
  `number6` int(20) NOT NULL DEFAULT '0',
  `number7` int(20) NOT NULL DEFAULT '0',
  `number8` int(20) NOT NULL DEFAULT '0',
  `number9` int(20) NOT NULL DEFAULT '0',
  `number10` int(20) NOT NULL DEFAULT '0',
  `number11` int(20) NOT NULL DEFAULT '0',
  `number12` int(20) NOT NULL DEFAULT '0',
  `number13` int(20) NOT NULL DEFAULT '0',
  `number14` int(20) NOT NULL DEFAULT '0',
  `number15` int(20) NOT NULL DEFAULT '0',
  `number16` int(20) NOT NULL DEFAULT '0',
  `number17` int(20) NOT NULL DEFAULT '0',
  `number18` int(20) NOT NULL DEFAULT '0',
  `number19` int(20) NOT NULL DEFAULT '0',
  `number20` int(20) NOT NULL DEFAULT '0',
  `string1` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `string2` longtext NOT NULL,
  `string3` longtext NOT NULL,
  `string4` longtext NOT NULL,
  `string5` longtext NOT NULL,
  `string6` longtext NOT NULL,
  `string7` longtext NOT NULL,
  `string8` longtext NOT NULL,
  `string9` longtext NOT NULL,
  `string10` longtext NOT NULL,
  `date1` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date2` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date3` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date4` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date5` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `bool1` int(1) NOT NULL DEFAULT '0',
  `bool2` int(1) NOT NULL DEFAULT '0',
  `bool3` int(1) NOT NULL DEFAULT '0',
  `bool4` int(1) NOT NULL DEFAULT '0',
  `bool5` int(1) NOT NULL DEFAULT '0',
  `file1` longblob NOT NULL,
  `file2` longblob NOT NULL,
  `file3` longblob NOT NULL,
  `file4` longblob NOT NULL,
  `file5` longblob NOT NULL,
  `md5` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `type`, `number1`, `number2`, `number3`, `number4`, `number5`, `number6`, `number7`, `number8`, `number9`, `number10`, `number11`, `number12`, `number13`, `number14`, `number15`, `number16`, `number17`, `number18`, `number19`, `number20`, `string1`, `string2`, `string3`, `string4`, `string5`, `string6`, `string7`, `string8`, `string9`, `string10`, `date1`, `date2`, `date3`, `date4`, `date5`, `bool1`, `bool2`, `bool3`, `bool4`, `bool5`, `file1`, `file2`, `file3`, `file4`, `file5`, `md5`) VALUES
(35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery.cookie.js', 'jquery.cookie.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jQuery.contextMenu.1.3.js', 'jQuery.contextMenu.1.3.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery.colorpicker.js', 'jquery.colorpicker.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(32, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery.ajaxupload.3.6.js', 'jquery.ajaxupload.3.6.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery-te-1.4.0.min.js', 'jquery-te-1.4.0.min.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/html2canvas.js', 'html2canvas.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(9, 0, 23, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '00_cache', '', '', 'http://urorbit.com/plugin/00_cache', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 0, 0, '', '', '', '', '', 'PLUGIN_S'),
(29, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/Base64.js', 'Base64.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(11, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'panel', '', '', 'http://urorbit.com/plugin/panel', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 1, 0, '', '', '', '', '', 'PLUGIN_S'),
(28, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/3jquery.easing-1.3.js', '3jquery.easing-1.3.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/2jquery.validationEngine.js', '2jquery.validationEngine.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(15, 0, 14, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'syntax', '', '', 'http://urorbit.com/plugin/syntax', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 1, 0, '', '', '', '', '', 'PLUGIN_S'),
(26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/2jquery.mousewheel-3.0.4.js', '2jquery.mousewheel-3.0.4.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(17, 0, 12, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'plugin_manager', '', '', 'http://urorbit.com/plugin/plugin_manager', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 0, 0, '', '', '', '', '', 'PLUGIN_S'),
(25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/1jquery-ui-1.8.7.custom.js', '1jquery-ui-1.8.7.custom.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(19, 0, 9, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pages', '', '', 'http://urorbit.com/plugin/pages', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 0, 0, '', '', '', '', '', 'PLUGIN_S'),
(20, 0, 8, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'other', '', '', 'http://urorbit.com/plugin/other', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 0, 0, '', '', '', '', '', 'PLUGIN_S'),
(21, 0, 7, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'member', '', '', 'http://urorbit.com/plugin/member', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 0, 0, '', '', '', '', '', 'PLUGIN_S'),
(22, 0, 6, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'filemanager', '', '', 'http://urorbit.com/plugin/filemanager', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 0, 0, '', '', '', '', '', 'PLUGIN_S'),
(24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/0jquery-1.4.4.js', '0jquery-1.4.4.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(36, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery.fancybox-1.3.4.js', 'jquery.fancybox-1.3.4.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(37, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery.inputvalidation.js', 'jquery.inputvalidation.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(38, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery.jeditable.js', 'jquery.jeditable.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(39, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery.mCustomScrollbar.js', 'jquery.mCustomScrollbar.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery.plugin.html2canvas.js', 'jquery.plugin.html2canvas.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(41, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery.qtip-1.0.0-rc3.js', 'jquery.qtip-1.0.0-rc3.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(42, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'library/js/jquery_ImageLoader.js', 'jquery_ImageLoader.js', 'library', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles'),
(125, 0, 16, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'themer', '', '', 'http://urorbit.com/plugin/themer', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 0, 0, '', '', '', '', '', 'PLUGIN_S'),
(51, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'themer/js/menu.js', 'menu.js', 'themer', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, '', '', '', '', '', 'jsfiles');

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE IF NOT EXISTS `table2` (
`id` int(20) NOT NULL,
  `type` int(20) NOT NULL DEFAULT '0',
  `number1` int(20) NOT NULL DEFAULT '0',
  `number2` int(20) NOT NULL DEFAULT '0',
  `number3` int(20) NOT NULL DEFAULT '0',
  `number4` int(20) NOT NULL DEFAULT '0',
  `number5` int(20) NOT NULL DEFAULT '0',
  `number6` int(20) NOT NULL DEFAULT '0',
  `number7` int(20) NOT NULL DEFAULT '0',
  `number8` int(20) NOT NULL DEFAULT '0',
  `number9` int(20) NOT NULL DEFAULT '0',
  `number10` int(20) NOT NULL DEFAULT '0',
  `string1` longtext NOT NULL,
  `string2` longtext NOT NULL,
  `string3` longtext NOT NULL,
  `string4` longtext NOT NULL,
  `string5` longtext NOT NULL,
  `string6` longtext NOT NULL,
  `string7` longtext NOT NULL,
  `string8` longtext NOT NULL,
  `string9` longtext NOT NULL,
  `string10` longtext NOT NULL,
  `date1` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `date2` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `date3` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `date4` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `date5` varchar(100) NOT NULL DEFAULT '0000-00-00',
  `bool1` int(1) NOT NULL DEFAULT '0',
  `bool2` int(1) NOT NULL DEFAULT '0',
  `bool3` int(1) NOT NULL DEFAULT '0',
  `bool4` int(1) NOT NULL DEFAULT '0',
  `bool5` int(1) NOT NULL DEFAULT '0',
  `md5` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `table3`
--

CREATE TABLE IF NOT EXISTS `table3` (
`id` int(20) NOT NULL,
  `type` int(20) NOT NULL DEFAULT '0',
  `number1` int(20) NOT NULL DEFAULT '0',
  `number2` int(20) NOT NULL DEFAULT '0',
  `number3` int(20) NOT NULL DEFAULT '0',
  `number4` int(20) NOT NULL DEFAULT '0',
  `number5` int(20) NOT NULL DEFAULT '0',
  `number6` int(20) NOT NULL DEFAULT '0',
  `number7` int(20) NOT NULL DEFAULT '0',
  `number8` int(20) NOT NULL DEFAULT '0',
  `number9` int(20) NOT NULL DEFAULT '0',
  `number10` int(20) NOT NULL DEFAULT '0',
  `string1` longtext NOT NULL,
  `string2` longtext NOT NULL,
  `string3` longtext NOT NULL,
  `string4` longtext NOT NULL,
  `string5` longtext NOT NULL,
  `string6` longtext NOT NULL,
  `string7` longtext NOT NULL,
  `string8` longtext NOT NULL,
  `string9` longtext NOT NULL,
  `string10` longtext NOT NULL,
  `string11` longtext NOT NULL,
  `string12` longtext NOT NULL,
  `string13` longtext NOT NULL,
  `string14` longtext NOT NULL,
  `string15` longtext NOT NULL,
  `string16` longtext NOT NULL,
  `string17` longtext NOT NULL,
  `string18` longtext NOT NULL,
  `string19` longtext NOT NULL,
  `string20` longtext NOT NULL,
  `string21` longtext NOT NULL,
  `string22` longtext NOT NULL,
  `string23` longtext NOT NULL,
  `string24` longtext NOT NULL,
  `string25` longtext NOT NULL,
  `string26` longtext NOT NULL,
  `string27` longtext NOT NULL,
  `string28` longtext NOT NULL,
  `string29` longtext NOT NULL,
  `string30` longtext NOT NULL,
  `string31` longtext NOT NULL,
  `string32` longtext NOT NULL,
  `string33` longtext NOT NULL,
  `string34` longtext NOT NULL,
  `string35` longtext NOT NULL,
  `string36` longtext NOT NULL,
  `string37` longtext NOT NULL,
  `string38` longtext NOT NULL,
  `string39` longtext NOT NULL,
  `string40` longtext NOT NULL,
  `string41` longtext NOT NULL,
  `string42` longtext NOT NULL,
  `string43` longtext NOT NULL,
  `string44` longtext NOT NULL,
  `string45` longtext NOT NULL,
  `string46` longtext NOT NULL,
  `string47` longtext NOT NULL,
  `string48` longtext NOT NULL,
  `string49` longtext NOT NULL,
  `string50` longtext NOT NULL,
  `date1` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date2` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date3` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date4` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `date5` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `bool1` int(1) NOT NULL DEFAULT '0',
  `bool2` int(1) NOT NULL DEFAULT '0',
  `bool3` int(1) NOT NULL DEFAULT '0',
  `bool4` int(1) NOT NULL DEFAULT '0',
  `bool5` int(1) NOT NULL DEFAULT '0',
  `md5` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=266 ;

--
-- Dumping data for table `table3`
--

INSERT INTO `table3` (`id`, `type`, `number1`, `number2`, `number3`, `number4`, `number5`, `number6`, `number7`, `number8`, `number9`, `number10`, `string1`, `string2`, `string3`, `string4`, `string5`, `string6`, `string7`, `string8`, `string9`, `string10`, `string11`, `string12`, `string13`, `string14`, `string15`, `string16`, `string17`, `string18`, `string19`, `string20`, `string21`, `string22`, `string23`, `string24`, `string25`, `string26`, `string27`, `string28`, `string29`, `string30`, `string31`, `string32`, `string33`, `string34`, `string35`, `string36`, `string37`, `string38`, `string39`, `string40`, `string41`, `string42`, `string43`, `string44`, `string45`, `string46`, `string47`, `string48`, `string49`, `string50`, `date1`, `date2`, `date3`, `date4`, `date5`, `bool1`, `bool2`, `bool3`, `bool4`, `bool5`, `md5`) VALUES
(258, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'language', 'en', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(65, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'home_page', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(177, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'member', '[login_form]', 'login_form', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(178, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'member', '[register_form]', 'register_form', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(179, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'member', '[reset_password_form]', 'reset_password_form', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(263, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'jshash2', 'f47844e8fe9a5f871fdf4b6487780f2e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(264, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'jshash1', '14784434151fbf888be4fd9e7d9524ae', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(265, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'csshash', '34dbeb3e67f113d97513e2e1ee4dccb2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(163, 0, 11, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'paragraph_editor', '', '', 'http://urorbit.com/plugin/paragraph_editor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(192, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'filechangepaneltheme', 'panel/themes/89.css', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(181, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'member', '[login_welcome]', 'login_welcome', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(168, 0, 4, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'backup', '', '', 'http://urorbit.com/plugin/backup', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(175, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'other', '[other_1417586344]', 'other_1417586344', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(172, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'other', '[login]', 'login', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(173, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'other', '[other_1417439311]', 'other_1417439311', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(159, 0, 15, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'smart_url', '', '', 'http://urorbit.com/plugin/smart_url', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(170, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'other', '[header_menu_horisantal]', 'header_menu_horisantal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(174, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'other', '[other_1417565023]', 'other_1417565023', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(157, 0, 18, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'urorbit_tools', '', '', 'http://urorbit.com/plugin/urorbit_tools', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(155, 0, 22, 5, 1, 0, 0, 0, 0, 0, 0, 0, 'under_construction', '', '', 'http://urorbit.com/plugin/under_construction', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(176, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'themer', '[themer_container_menu]', 'themer_container_menu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(259, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'langhash', 'fb151e7ef6657a29936c36be3d7264cb', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(171, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'other', '[header_menu_vertical]', 'header_menu_vertical', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(161, 0, 13, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'SEO', '', '', 'http://urorbit.com/plugin/SEO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(180, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'member', '[login]', 'login', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(153, 0, 25, 6, 1, 0, 0, 0, 0, 0, 0, 0, 'subdomain', '', '', 'http://urorbit.com/plugin/subdomain', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(169, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'plugin_index_run', '00_cache;filemanager;member;other;pages;panel;plugin_manager;syntax;themer;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(151, 0, 27, 2, 1, 0, 0, 0, 0, 0, 0, 0, 'ads', '', '', 'http://urorbit.com/plugin/ads', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(146, 0, 36, 2, 1, 0, 0, 0, 0, 0, 0, 0, 'maillist', '', '', 'http://urorbit.com/plugin/maillist', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(147, 0, 34, 2, 1, 0, 0, 0, 0, 0, 0, 0, 'form_builder', '', '', 'http://urorbit.com/plugin/form_builder', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(148, 0, 33, 2, 1, 0, 0, 0, 0, 0, 0, 0, 'google_map', '', '', 'http://urorbit.com/plugin/google_map', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(152, 0, 26, 7, 1, 0, 0, 0, 0, 0, 0, 0, 'email_account', '', '', 'http://urorbit.com/plugin/email_account', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(149, 0, 31, 2, 1, 0, 0, 0, 0, 0, 0, 0, 'blog', '', '', 'http://urorbit.com/plugin/blog', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(150, 0, 28, 3, 1, 0, 0, 0, 0, 0, 0, 0, 'nivoslider', '', '', 'http://urorbit.com/plugin/nivoslider', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_active'),
(131, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'title', 'sfhati CMS ::', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(248, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'savejqueryui', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(193, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'changepaneltheme1', '#666666', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(194, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'changepaneltheme2', '#0d0d0d', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(185, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'themer', '[themer_logo]', 'themer_logo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(186, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'themer', '[themer_search]', 'themer_search', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(187, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'themer', '[themer_icon_socials]', 'themer_icon_socials', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 1, 0, 0, 0, 'widget'),
(188, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'side_view_top1_1', 'true', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(247, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'groupCSS_font_theme_save', '                  .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}                                                                                                    .global_wrapper{background-color:rgb(250, 250, 250);}  ul.icon_socials li.ic_facebook{background-position:0 0;} ul.icon_socials li.ic_twitter{background-position:-32px 0;} ul.icon_socials li.ic_rss{background-position:-64px 0;} ul.icon_socials li.ic_mail{background-position:-96px 0;} ul.icon_socials li.ic_plus{background-position:-128px 0;} ul.icon_socials li.ic_linkedin{background-position:-160px 0;} ul.icon_socials li.ic_rssmail{background-position:-192px 0;} ul.icon_socials li.ic_skype{background-position:-224px 0;} ul.icon_socials li{background-image:url(http://server.sfhati.com/uploaded/element/social-network/setpack_social_009.png);} ul.icon_socials li{height:33px;} ul.icon_socials li{width:32px;}      #site_logo{background-image: url(http://server.sfhati.com/uploaded/element/logo/logo_001.png);} #site_logo{height:50px;} #site_logo{width:143px;}        .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}                              .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}                                             .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}                              .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}               .container_menu ul li a{font-family:''Trebuchet MS, Arial'', Helvetica, sans;}        .container_menu{background-image:url(http://server.sfhati.com/uploaded/element/menu/menu_026.png);} .container_menu{height:50px;} .container_menu{width:960px;}  .container_menu ul li a{line-height:49px;} .container_menu ul li a{color:#eae4e4;} .container_menu ul li a{font-size:15px;} .container_menu ul li a{font-family:Tahoma, Geneva;} .container_menu ul li.back{top:2px;} .container_menu ul li.back .left{background-image:url(http://server.sfhati.com/uploaded/element/menu/menu_026_current.png);} .container_menu ul li.back .left{height:45px;} .container_menu ul li.back{background-image:url(http://server.sfhati.com/uploaded/element/menu/menu_026_current.png);} .container_menu ul li.back{height:45px;} .container_menu ul ul{top:90px;} .container_menu ul li.back .left{margin-right:5px;} .clipart{background-image: url(http://server.sfhati.com/uploaded/element/clipart/clipart_065.png);} .clipart{background-position:center bottom;}  .wrapper_header{background-color:rgb(1, 169, 219);} .wrapper_footer{background-color:rgb(1, 169, 219);}         body{background-color:rgb(46, 46, 46);}                                                                                                                                                                                                                                                                                                                                                                                                                         #header{height:152px;}                                               #footer{height:6px;}                                         body .header_shadow{display:block;} body .header_shadow{background-image: url(http://server.sfhati.com/uploaded/element/shadows/shadow_008.png);} body .header_shadow{height:undefinedpx;} body .header_shadow{bottom:undefinedpx;} body .header_shadow{background-repeat:no-repeat;}                             .header_shine{background-image: url(http://server.sfhati.com/uploaded/element/shines/shine_037.png);}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'CSS_GROUP'),
(197, 0, 9, 1, 1, 0, 1, 0, 0, 0, 0, 0, '818763', 'themer_container_menu.inc', 'themer_container_menu', '', 'themer', '', 'All', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, 'plugin_show'),
(200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'groupCSS_widget818763', '  #widget_818763{z-index:99;}     #widget_818763{top:88px;} #widget_818763{left:1px;} #widget_818763{width:962px;} #widget_818763{height:39px;}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'CSS_GROUP'),
(201, 0, 9, 2, 1, 0, 1, 0, 0, 0, 0, 0, '317574', 'themer_logo.inc', 'themer_logo', '', 'themer', '', 'All', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, 'plugin_show'),
(204, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'groupCSS_widget317574', '  #widget_317574{z-index:99;}     #widget_317574{width:237px;} #widget_317574{height:72px;} #widget_317574{top:8px;} #widget_317574{left:-9px;}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'CSS_GROUP'),
(205, 0, 9, 3, 1, 0, 1, 0, 0, 0, 0, 0, '64219', 'themer_icon_socials.inc', 'themer_icon_socials', '', 'themer', '', 'All', '', '', '', '', '', '', '', '', '', '', '', '', 'https://www.facebook.com/sfhati?ref=hl', 'https://twitter.com/sfhati_com', '', '', 'https://plus.google.com/u/0/b/115653095050193582354/106924188061042146428/posts', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '0', '0', '1', '0', '0', '0', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, 0, 0, 0, 0, 'plugin_show'),
(217, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'groupCSS_widget64219', '   #widget_64219{z-index:99;}       #widget_64219{width:135px;} #widget_64219{height:33px;}      #widget_64219{top:45px;} #widget_64219{left:856px;}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'CSS_GROUP'),
(218, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'CachePageTime', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(219, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'CacheSQLTime', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(220, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'CacheFileTime', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(221, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'CachePluginTime1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(222, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'CachePluginTime2', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(223, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'CachePluginTime3', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(224, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'CachePluginTime4', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(225, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'msg_name_alredy_register', '[msg_name_alredy_register]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(226, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'msg_email_alredy_register', 'msg_email_alredy_register', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(227, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'msg_must_fill_name', 'msg_must_fill_name', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(228, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'msg_must_fill_pass', 'msg_must_fill_pass', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(229, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'msg_must_fill_valid_email', 'msg_must_fill_valid_email', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(230, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'msg_register_done', 'msg_register_done', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(231, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'subject email active your account', 'subject email active your account', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(232, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'content email active your account', 'content email active your account', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(233, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'invaled_password', 'invaled_password', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(234, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'changed_password_done', 'changed_password_done', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(235, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'changed_image_done', 'changed image done', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(236, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'image_file_invaled', 'image file invaled', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(237, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Active_user_message', 'Active user message', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(238, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'After_Active_user_message', 'After active user message', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(239, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'changed_information_done', '[changed information done]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(240, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'send_by_email_information_done', '[send by email information done]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(241, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'email_not_in_our_data', '[email not in our data]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(242, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'user_not_active', '[user not active]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(243, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'login_error', '[login error]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(244, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'you_are_login_alredy', '[you are login alredy]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING'),
(249, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'other', '[other_page_content]', 'other_page_content', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'widget'),
(250, 0, 1, 4, 1, 0, 1, 0, 0, 0, 0, 0, '732803', 'other_page_content.inc', 'Home Page', '', 'other', '', 'All', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'plugin_show'),
(251, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'groupCSS_widget732803', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'CSS_GROUP'),
(252, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'side_view_top1_2', 'true', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 'SETTING');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive1`
--
ALTER TABLE `archive1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive2`
--
ALTER TABLE `archive2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive3`
--
ALTER TABLE `archive3`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table2`
--
ALTER TABLE `table2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table3`
--
ALTER TABLE `table3`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive1`
--
ALTER TABLE `archive1`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `archive2`
--
ALTER TABLE `archive2`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `archive3`
--
ALTER TABLE `archive3`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `table2`
--
ALTER TABLE `table2`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table3`
--
ALTER TABLE `table3`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=266;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
