SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `comment`
-- 

CREATE TABLE `comment` (
  `id` int(10) NOT NULL auto_increment,
  `complaint_id` int(10) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `entry_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `comment`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `complaint`
-- 

CREATE TABLE `complaint` (
  `id` int(10) NOT NULL auto_increment,
  `ward` varchar(10) NOT NULL,
  `place` varchar(10) NOT NULL,
  `road` varchar(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `recommendation` text NOT NULL,
  `vote` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `entry_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `complaint`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `type`
-- 

CREATE TABLE `type` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `status` char(1) NOT NULL default 'Y',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `type`
-- 

INSERT INTO `type` (`id`, `name`, `status`) VALUES 
(1, 'Air Pollution', 'Y'),
(2, 'Water Pollution', 'Y');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `user`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `vote`
-- 

CREATE TABLE `vote` (
  `id` int(10) NOT NULL auto_increment,
  `complaint_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `entry_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `vote`
-- 

