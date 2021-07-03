-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2020 at 08:59 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_1`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_1`;
CREATE TABLE IF NOT EXISTS `userid_1` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_2`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_2`;
CREATE TABLE IF NOT EXISTS `userid_2` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_3`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_3`;
CREATE TABLE IF NOT EXISTS `userid_3` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_4`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_4`;
CREATE TABLE IF NOT EXISTS `userid_4` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_5`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_5`;
CREATE TABLE IF NOT EXISTS `userid_5` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_6`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_6`;
CREATE TABLE IF NOT EXISTS `userid_6` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_7`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_7`;
CREATE TABLE IF NOT EXISTS `userid_7` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_8`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_8`;
CREATE TABLE IF NOT EXISTS `userid_8` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_9`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_9`;
CREATE TABLE IF NOT EXISTS `userid_9` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_10`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_10`;
CREATE TABLE IF NOT EXISTS `userid_10` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_11`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_11`;
CREATE TABLE IF NOT EXISTS `userid_11` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_12`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_12`;
CREATE TABLE IF NOT EXISTS `userid_12` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userid_13`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `userid_13`;
CREATE TABLE IF NOT EXISTS `userid_13` (
`id` int(11)
,`user_id` int(11)
,`post_username` varchar(255)
,`post_fullname` varchar(255)
,`post_userprofile_pic` varchar(255)
,`post_time` datetime
,`post_caption` varchar(1000)
,`post_img` varchar(255)
,`post_likers` varchar(255)
,`post_comments` varchar(10000)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT 'img/default-profile.jpg',
  `cover_pic` varchar(255) DEFAULT 'img/default_cover.jpg',
  `Bio` varchar(1000) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Birth_date` varchar(255) DEFAULT NULL,
  `joined_date` varchar(255) DEFAULT NULL,
  `privacy_status` varchar(255) DEFAULT 'Public',
  `viewed_till` int(11) DEFAULT '0',
  `followers` varchar(255) DEFAULT 'n_value',
  `following` varchar(255) DEFAULT 'n_value',
  `request_by` varchar(10000) DEFAULT '1:2',
  `user_images` varchar(10000) DEFAULT NULL,
  `blocked_by` varchar(10000) NOT NULL DEFAULT '1:2',
  `Notification` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Un_uname` (`user_name`),
  UNIQUE KEY `Un_email` (`email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `password`, `email_id`, `profile_pic`, `cover_pic`, `Bio`, `Location`, `Gender`, `Birth_date`, `joined_date`, `privacy_status`, `viewed_till`, `followers`, `following`, `request_by`, `user_images`, `blocked_by`, `Notification`) VALUES
(8, '@roshan', 'Roshan Jha', '9911554411', 'kumarroshanjha786@gmail.com', 'img/user_8_1.jpg', 'img/user_8_0.jpg', 'I am Cool', 'New Delhi, India', 'Male', '2020-02-03', '14 February 2020', 'Public', 0, '8:7', '8:4:9:5:7:6', '1:2', 'img/user_8_0.jpg:img/user_8_1.jpg:img/user_8_2.jpg:img/user_8_3.jpg:img/user_8_4.png:img/user_8_5.png:img/user_8_6.png', '1:2', '{\"inactive\":[],\"active\":[{\"id_related\":\"5\",\"status\":\"seen\",\"link\":\"post?post_id=25\",\"type\":\"post_like\",\"post_id\":\"25\"},{\"id_related\":\"5\",\"status\":\"seen\",\"link\":\"post?post_id=24\",\"type\":\"post_like\",\"post_id\":\"24\"},{\"id_related\":\"5\",\"status\":\"seen\",\"link\":\"other_user.php?username=\",\"type\":\"follow\"},{\"id_related\":\"5\",\"status\":\"seen\",\"link\":\"other_user.php?username=@narendramodi\",\"type\":\"follow\"}]}'),
(3, '@iamsrk', 'Sharukh Khan', '9911554411', 'srk786@gmail.com', 'img/user_3_5.jpg', 'img/user_3_6.png', '', 'New Delhi, India', 'Prefer Not To Say', '2020-02-03', '14 February 2020', 'Private', 0, '3', '3', '1:2', 'img/user_3_0.jpg:img/user_3_1.jpg:img/user_3_2.jpg:img/user_3_3.jpg:img/user_3_4.png:img/user_3_5.jpg:img/user_3_6.png:img/user_3_7.png:img/user_3_8.jpg', '1:2', NULL),
(4, '@APJAbdulKalam', 'A.P.J.  Abdul Kalam', '9911554411', 'APJAbdulKalam@gmail.com', 'img/user_4_5.jpg', 'img/user_4_4.jpg', '', 'New Delhi, India', 'Male', '2020-02-03', '14 February 2020', 'Public', 0, '4:8', 'n_value', '1:2', 'img/user_4_0.jpg:img/user_4_1.jpg:img/user_4_2.jpg:img/user_4_3.jpg:img/user_4_4.jpg:img/user_4_5.jpg', '1:2', NULL),
(5, '@narendramodi', 'Narendra Modi', '9911554411', 'narendramodi@gmail.com', 'img/user_5_0.png', 'img/user_5_1.jpg', '', 'New Delhi, India', 'Male', '2020-02-04', '14 February 2020', 'Public', 0, '5:8', '5', '1:2', 'img/user_5_0.png:img/user_5_1.jpg', '1:2:8:13', NULL),
(6, '@ArvindKejriwal', 'Arvind  Kejriwal', '9911554411', 'Kejriwal@gmail.com', 'img/user_6_0.jpg', 'img/user_6_1.jpg', '', 'New Delhi, India', 'Prefer Not To Say', '2020-02-03', '14 February 2020', 'Public', 0, '6:8', 'n_value', '1:2', 'img/user_6_0.jpg:img/user_6_1.jpg', '1:2', '{\"inactive\":[{\"id_related\":\"8\",\"status\":\"unseen\",\"link\":\"other_user.php?username=@roshan\",\"type\":\"follow\"}],\"active\":[]}'),
(7, '@aliaa08', 'Alia  Bhatt', '9911554411', 'aliaa08@gmail.com', 'img/user_7_0.jpg', 'img/user_7_1.jpg', 'Beautifully chaotic :)', 'New Delhi, India', 'Prefer Not To Say', '2020-02-03', '14 February 2020', 'Public', 0, '7:8', '7:8', '1:2', 'img/user_7_0.jpg:img/user_7_1.jpg:img/user_7_2.jpg:img/user_7_3.jpg:img/user_7_4.jpg:img/user_7_5.jpg:img/user_7_6.jpg:img/user_7_7.jpg:img/user_7_8.jpg:img/user_7_9.jpg:img/user_7_10.png:img/user_7_11.jpg:img/user_7_12.jpg:img/user_7_13.png:img/user_7_14.png:img/user_7_15.jpg:img/user_7_16.jpg:img/user_7_17.jpg:img/user_7_18.jpg:img/user_7_19.jpg:img/user_7_20.jpg:img/user_7_21.jpg:img/user_7_22.jpg:img/user_7_23.png:img/user_7_24.jpg:img/user_7_25.jpg:img/user_7_26.jpg', '1:2', '{\"inactive\":[{\"id_related\":\"8\",\"status\":\"unseen\",\"link\":\"post?post_id=25&comment_id=5\",\"type\":\"post_reply\",\"post_id\":\"25\",\"comment_id\":5,\"comment\":\"<a href=profile.php?username=@aliaa08>@aliaa08</a> kaisi ho\"},{\"id_related\":\"8\",\"status\":\"unseen\",\"link\":\"other_user.php?username=@roshan\",\"type\":\"follow\"}],\"active\":[]}'),
(9, '@pankaj', 'Pankaj Jha', '9911554411', 'jhaji123@gmail.com', 'img/user_9_0.jpg', 'img/user_9_2.png', '', 'New Delhi, India', 'Male', '2020-02-03', '14 February 2020', 'Public', 0, '9:8', 'n_value', '1:2', 'img/user_9_0.jpg:img/user_9_1.jpg:img/user_9_2.png:img/user_9_3.jpg', '1:2', NULL),
(13, '@cool_pb', 'Priyanka Bhardwaj', '9911554411', 'abc@gmail.com', 'img/user_13_0.jpg', 'img/user_13_1.png', 'Doremon Lover, ', 'New Delhi, India', 'Fe-Male', '2020-02-05', '25 February 2020', 'Public', 0, '13', 'n_value', '1:2', 'img/user_13_0.jpg:img/user_13_1.png:img/user_13_2.jpg', '1:2', '{\"inactive\":[{\"id_related\":\"8\",\"status\":\"unseen\",\"link\":\"post?post_id=35\",\"type\":\"post_like\",\"post_id\":\"35\"},{\"id_related\":\"8\",\"status\":\"unseen\",\"link\":\"post?post_id=35&comment_id=2\",\"type\":\"post_comment\",\"post_id\":\"35\",\"comment_id\":2,\"comment\":\"aaaa\"}],\"active\":[{\"id_related\":\"8\",\"status\":\"seen\",\"link\":\"other_user.php?username=@roshan\",\"type\":\"follow\"},{\"id_related\":\"8\",\"status\":\"unseen\",\"link\":\"post?post_id=35&comment_id=1\",\"type\":\"post_comment\",\"post_id\":\"35\",\"comment_id\":1,\"comment\":\"Main Bhi jaunga\"}]}'),
(10, '@realDonaldTrump', 'Donald J. Trump', '9911554411', 'trump@gmail.com', 'img/user_10_2.jpg', 'img/user_10_3.jpg', '45th President of the United States of America', 'Washington, DC', 'Male', '2020-02-03', '24 February 2020', 'Public', 0, 'n_value', 'n_value', '1:2', 'img/user_10_0.jpg:img/user_10_1.jpg:img/user_10_2.jpg:img/user_10_3.jpg', '1:2', NULL),
(11, '@iTIGERSHROFF', 'Tiger  Shroff', '9911554411', 'iTIGERSHROFF@gmail.com', 'img/user_11_0.jpg', 'img/user_11_1.jpg', '', 'Mumbai, India', 'Male', '2020-02-16', '24 February 2020', 'Public', 0, 'n_value', 'n_value', '1:2', 'img/user_11_0.jpg:img/user_11_1.jpg:img/user_11_2.jpg:img/user_11_3.jpg', '1:2', NULL),
(12, '@elonmusk', 'Elon  Musk', '9911554411', 'Musk@gmail.com', 'img/user_12_2.jpg', 'img/user_12_1.jpg', 'Space enthusiasts', 'Los angeles, USA', 'Male', '2020-02-09', '24 February 2020', 'Public', 0, 'n_value', 'n_value', '1:2', 'img/user_12_0.jpg:img/user_12_1.jpg:img/user_12_2.jpg:img/user_12_3.jpg', '1:2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_posts`
--

DROP TABLE IF EXISTS `user_posts`;
CREATE TABLE IF NOT EXISTS `user_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_username` varchar(255) NOT NULL,
  `post_fullname` varchar(255) NOT NULL,
  `post_userprofile_pic` varchar(255) NOT NULL,
  `post_time` datetime NOT NULL,
  `post_caption` varchar(1000) DEFAULT NULL,
  `post_img` varchar(255) DEFAULT NULL,
  `post_likers` varchar(255) DEFAULT NULL,
  `post_comments` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_posts`
--

INSERT INTO `user_posts` (`id`, `user_id`, `post_username`, `post_fullname`, `post_userprofile_pic`, `post_time`, `post_caption`, `post_img`, `post_likers`, `post_comments`) VALUES
(31, 11, '@iTIGERSHROFF', 'Tiger  Shroff', 'img/user_11_0.jpg', '2020-02-24 11:37:12', 'Me vs promotions be like ... this battle i prob cant  march6th i see you', 'img/user_11_2.jpg', NULL, NULL),
(24, 8, '@roshan', 'Roshan Jha', 'img/user_8_1.jpg', '2020-02-18 11:55:55', 'sd', '', '8:5', NULL),
(25, 8, '@roshan', 'Roshan Jha', 'img/user_8_1.jpg', '2020-02-20 08:51:42', 'Hi', '', '7:8:5', '[{\"id\":\"8\",\"comment\":\"<a href=profile.php?username=@aliaa08>@aliaa08</a> kaisi ho\",\"likes\":\"\",\"rogue_id\":5},{\"id\":\"7\",\"comment\":\"vvvvv\",\"likes\":\"\",\"rogue_id\":4},{\"id\":\"8\",\"comment\":\"qqqq\",\"likes\":\"\",\"rogue_id\":1}]'),
(27, 10, '@realDonaldTrump', 'Donald J. Trump', 'img/user_10_2.jpg', '2020-02-24 11:31:42', 'à¤¹à¤® à¤­à¤¾à¤°à¤¤ à¤†à¤¨à¥‡ à¤•à¥‡ à¤²à¤¿à¤ à¤¤à¤¤à¥à¤ªà¤° à¤¹à¥ˆà¤‚ à¥¤ à¤¹à¤® à¤°à¤¾à¤¸à¥à¤¤à¥‡ à¤®à¥‡à¤‚ à¤¹à¥ˆà¤, à¤•à¥à¤› à¤¹à¥€ à¤˜à¤‚à¤Ÿà¥‹à¤‚ à¤®à¥‡à¤‚ à¤¹à¤® à¤¸à¤¬à¤¸à¥‡ à¤®à¤¿à¤²à¥‡à¤‚à¤—à¥‡!', '', NULL, NULL),
(30, 10, '@realDonaldTrump', 'Donald J. Trump', 'img/user_10_2.jpg', '2020-02-24 11:32:30', 'Crazy Bernie and the Democrats should see this. I have done far more for the African American community than any President. Secured funding for HBCUs, Criminal Justice Reform, Opportunity Zones, School Choice, Record Low Unemployment, and so much more. THE BEST IS YET TO COME!', '', NULL, NULL),
(29, 10, '@realDonaldTrump', 'Donald J. Trump', 'img/user_10_2.jpg', '2020-02-24 11:31:55', '95% Approval Rating in the Republican Party, a Record. 218 Federal Judges, also a Record. 2 Supreme Court Justices. Thank you!', '', NULL, NULL),
(32, 11, '@iTIGERSHROFF', 'Tiger  Shroff', 'img/user_11_0.jpg', '2020-02-24 11:38:17', ' ', 'img/user_11_3.jpg', NULL, NULL),
(33, 12, '@elonmusk', 'Elon  Musk', 'img/user_12_2.jpg', '2020-02-24 11:42:22', 'Science has gone too far', 'img/user_12_3.jpg', '', NULL),
(34, 12, '@elonmusk', 'Elon  Musk', 'img/user_12_2.jpg', '2020-02-24 11:43:05', 'Worth reading Asimovâ€™s Foundation\nhttps://en.m.wikipedia.org/wiki/Foundation_series', '', '', NULL),
(35, 13, '@cool_pb', 'Priyanka Bhardwaj', 'img/user_13_0.jpg', '2020-02-25 06:32:46', 'Hello World Baghi Dekhoge', 'img/user_13_2.jpg', '13:8', '[{\"id\":\"8\",\"comment\":\"aaaa\",\"likes\":\"\",\"rogue_id\":2},{\"id\":\"8\",\"comment\":\"Main Bhi jaunga\",\"likes\":\"\",\"rogue_id\":1}]'),
(36, 8, '@roshan', 'Roshan Jha', 'img/user_8_1.jpg', '2020-03-04 03:24:50', 'Hi', '', '', NULL);

-- --------------------------------------------------------

--
-- Structure for view `userid_1`
--
DROP TABLE IF EXISTS `userid_1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_1`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where (`user_posts`.`user_id` = 1) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_2`
--
DROP TABLE IF EXISTS `userid_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_2`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where (`user_posts`.`user_id` = 2) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_3`
--
DROP TABLE IF EXISTS `userid_3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_3`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where ((`user_posts`.`user_id` = 3) or (`user_posts`.`user_id` = 3)) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_4`
--
DROP TABLE IF EXISTS `userid_4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_4`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where (`user_posts`.`user_id` = 4) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_5`
--
DROP TABLE IF EXISTS `userid_5`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_5`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where ((`user_posts`.`user_id` = 5) or (`user_posts`.`user_id` = 5)) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_6`
--
DROP TABLE IF EXISTS `userid_6`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_6`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where (`user_posts`.`user_id` = 6) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_7`
--
DROP TABLE IF EXISTS `userid_7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_7`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where ((`user_posts`.`user_id` = 7) or (`user_posts`.`user_id` = 7) or (`user_posts`.`user_id` = 8)) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_8`
--
DROP TABLE IF EXISTS `userid_8`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_8`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where ((`user_posts`.`user_id` = 8) or (`user_posts`.`user_id` = 8) or (`user_posts`.`user_id` = 4) or (`user_posts`.`user_id` = 9) or (`user_posts`.`user_id` = 5) or (`user_posts`.`user_id` = 7) or (`user_posts`.`user_id` = 6)) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_9`
--
DROP TABLE IF EXISTS `userid_9`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_9`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where (`user_posts`.`user_id` = 9) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_10`
--
DROP TABLE IF EXISTS `userid_10`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_10`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where (`user_posts`.`user_id` = 10) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_11`
--
DROP TABLE IF EXISTS `userid_11`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_11`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where (`user_posts`.`user_id` = 11) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_12`
--
DROP TABLE IF EXISTS `userid_12`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_12`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where (`user_posts`.`user_id` = 12) ;

-- --------------------------------------------------------

--
-- Structure for view `userid_13`
--
DROP TABLE IF EXISTS `userid_13`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userid_13`  AS  select `user_posts`.`id` AS `id`,`user_posts`.`user_id` AS `user_id`,`user_posts`.`post_username` AS `post_username`,`user_posts`.`post_fullname` AS `post_fullname`,`user_posts`.`post_userprofile_pic` AS `post_userprofile_pic`,`user_posts`.`post_time` AS `post_time`,`user_posts`.`post_caption` AS `post_caption`,`user_posts`.`post_img` AS `post_img`,`user_posts`.`post_likers` AS `post_likers`,`user_posts`.`post_comments` AS `post_comments` from `user_posts` where (`user_posts`.`user_id` = 13) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
