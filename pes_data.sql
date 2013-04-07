-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2013 at 12:40 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pes`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `body`, `title`) VALUES
(1, 'asa', 'About Us');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attending`
--

CREATE TABLE IF NOT EXISTS `attending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_id` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `body`, `title`) VALUES
(1, '<p><table id="table74382"><tbody><tr><td>email</td><td>phone</td><td>address</td></tr><tr><td><a href="mailto:tom.scott@plymouth.ac.uk">tom.scott@plymouth.ac.uk</a></td><td>0712-3456-789</td><td>5 Tavistock Place<br>Plymouth<br>PL4 8AU</td></tr></tbody></table><p></p><br></p>', 'Contact');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `poster` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `body`, `created`, `modified`, `poster`, `date`, `location`) VALUES
(1, 'First event', '<p>Description of said event</p>', '2013-04-06 16:34:43', '2013-04-06 18:18:11', 'boob.png', '2013-04-06 16:34:00', 'Ed''s front room');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `body` longtext CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `user_id`, `cover_photo`, `alt_text`) VALUES
(23, 'Welcome to the site', '<p>This is a paragraph. With lots and lots of text lol.</p><p></p><ul><li>this is&nbsp;</li><li>an unordered</li><li>list</li></ul><ol><li>this is&nbsp;</li><li>an ordered</li><li>list</li></ol><p></p>\r\n', '2013-04-06 12:31:31', '2013-04-06 18:42:20', 52, NULL, NULL),
(24, 'Don''t play stupid with me... I''m better at it.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum semper elementum scelerisque. Fusce nibh turpis, pharetra sit amet consequat ac, malesuada vitae enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos ', '2013-04-06 14:22:21', '2013-04-06 14:22:21', 53, 'thumbnail.png', 'This is the alt_text n****'),
(26, 'Test Post for image inside body', '<p><img src="http://24.media.tumblr.com/959ae84c70f876ba4e305ecde5356f4a/tumblr_mkue1eF2ON1s7rwz8o1_500.jpg"><br></p>\r\n', '2013-04-06 18:38:33', '2013-04-06 18:38:53', 52, NULL, NULL),
(27, 'post with video embedded', '<p><iframe width="640" height="360" src="http://www.youtube.com/embed/q_Gh8TWpQE8?feature=player_detailpage" frameborder="0" allowfullscreen=""></iframe><br></p>', '2013-04-06 18:43:16', '2013-04-06 18:43:16', 52, NULL, NULL),
(28, 'post with tables', '<p><table id="table82812"><tbody><tr><td>cloumn</td><td>asd</td><td>dfdszg</td></tr><tr><td>fdgdfg</td><td>fdgdfg</td><td>gdfgdf</td></tr></tbody></table><p></p><br></p>', '2013-04-06 18:44:02', '2013-04-06 18:44:02', 52, NULL, NULL),
(29, 'strikethrough, bold and italic', '<p><strike>STRIKE</strike>,&nbsp;<span style="font-size: 15px; background-color: rgb(255, 255, 255); line-height: 1.45em; letter-spacing: 0px;"><b>BOLD</b>, <i>ITALIC</i></span></p>', '2013-04-06 18:44:51', '2013-04-06 18:44:51', 52, NULL, NULL),
(30, 'indented paragraghs', '<blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><p>fgdsgfsg</p></blockquote><span style="font-size: 15px; line-height: 1.45em; font-style: italic; letter-spacing: 0px;">fgsfdsgdsfgdsgdg</span><br>', '2013-04-06 18:45:13', '2013-04-06 18:45:13', 52, NULL, NULL),
(31, 'links', '<p><a href="http://www.google.com">google.com</a><br></p><p><a href="mailto:me@jakechampion.name">email</a><br></p><p><br></p>', '2013-04-06 18:46:08', '2013-04-06 18:46:08', 52, NULL, NULL),
(32, 'colours!!!', '<p><p><span style="color: #8db3e2;"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy te</span><span style="color: #17365d;">xt of the printing a</span><span style="color: #9bbb59;">nd typesetting industry. Lorem Ipsum has been the industry''s standard dum', '2013-04-06 18:47:09', '2013-04-06 18:47:09', 52, NULL, NULL),
(33, 'another post', '<h1>heading</h1><div>gandhi said I''m a cunt</div><div><hr></div>', '2013-04-06 19:27:30', '2013-04-06 19:27:30', 52, NULL, NULL),
(93, 'Attachment test', '<p>i hate this project</p>', '2013-04-07 18:44:37', '2013-04-07 18:44:37', 52, NULL, NULL),
(94, 'loads''a files', '<p>woop</p>', '2013-04-07 21:15:50', '2013-04-07 21:15:50', 52, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(36) CHARACTER SET utf8 NOT NULL DEFAULT 'user.png',
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bio` text CHARACTER SET utf8 NOT NULL,
  `modified` datetime NOT NULL,
  `last_active` int(11) DEFAULT NULL,
  `experience` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `firstname`, `lastname`, `picture`, `email`, `course`, `bio`, `modified`, `last_active`, `experience`) VALUES
(36, 52, 'John', 'Smith', 'user.png', 'john.smith@gmail.com', 'BSc Web Applications Development', 'I like the web. And stuff.', '2013-04-07 21:14:44', 1365374387, 'I like boobies'),
(37, 53, 'Bob', 'Doe', '5923c5e979cf9c30d555fb0cec442b0d.png', 'bob@gmail.com', '', '', '2013-04-06 00:04:02', 1365199738, ''),
(38, 54, 'Liza', 'Doe', 'user.png', 'liza@gmail.com', '', '', '2013-04-05 21:36:35', 1365202400, ''),
(39, 55, 'gemma', 'pike', '8b3286ba312b5d6077ea9fd2d4c82da5.png', 'gemma.pike@students.plymouth.ac.uk', 'International Tourism Management', 'I''m a badass', '2013-04-06 19:24:53', 1365269095, '21 years of being a badass'),
(40, 56, 'Jake', 'McAlman', 'user.png', 'me@jakechampion.name', '', '', '2013-04-07 21:17:22', 1365362995, '');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_skills`
--

CREATE TABLE IF NOT EXISTS `profiles_skills` (
  `profile_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  KEY `profile_id` (`profile_id`),
  KEY `skill_id` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles_skills`
--

INSERT INTO `profiles_skills` (`profile_id`, `skill_id`) VALUES
(36, 62),
(36, 63),
(36, 64),
(36, 37),
(36, 65);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `permalink` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`permalink`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `body`, `permalink`) VALUES
(1, 'Mentoring', 'Welcome to the Mentoring page!', 'mentoring'),
(2, 'How to find investors', '<p>AHHAHAHAHAHAHAHAHHAHA</p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p>You don''t need investors, you need a noose!</p>', 'how_to_find_investors'),
(3, 'gdsfgdsg', '<p>dfsgdfsgdfsg</p>', 'gdsgdsfg'),
(4, 'startup lectures', '<p>sdsdsd</p>', 'sdsd');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `skill` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(65, '5 spaces'),
(24, 'C#'),
(37, 'css'),
(58, 'dfg'),
(63, 'drugs'),
(39, 'english'),
(40, 'french'),
(60, 'ghj'),
(61, 'gj'),
(59, 'hgj'),
(32, 'HTML'),
(56, 'HTML5'),
(26, 'Java'),
(25, 'JavaScript'),
(27, 'jQuery'),
(57, 'loldfg'),
(38, 'marketing'),
(23, 'MySQL'),
(22, 'PHP'),
(64, 'rock ''n roll'),
(62, 'sex'),
(33, 'SQL');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `picture`) VALUES
(4, 'Android', '79d6cfc34d4b1b54cf1c3f50e656d1f2.png'),
(5, 'dribbble', '233fff9e433f9ad92224c97c98cc6b0f.png'),
(6, 'Google', '1f3337f44bef5f471f77e47044defd31.png'),
(7, 'Smashing Magazine', '0cf67a32161ed286503a5481282f51ab.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `activation` varchar(32) CHARACTER SET utf8 NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created`, `activation`, `activated`) VALUES
(52, 'john.smith@gmail.com', '$2a$10$9nLSM4BucqPPBTRaOTzxBu2xao4l.V6YtAp.Dz1VT3sBtoM9FIZuW', 1, '2013-02-12 03:07:40', '4f8a070a4a24a9676ab6ae6a8dfad2a2', 1),
(53, 'bob@gmail.com', '$2a$10$E9TAzT/g3ZOTY1vQ7Xv58uifn9FoXvFiAExGbDEzgGMsUj5T.RbX2', 0, '2013-04-05 21:36:03', '23629a764cd13939155f00d593e4dc2a', 1),
(54, 'liza@gmail.com', '$2a$10$oIaRoZBHAakDMuG6MgTnluFXa.La2CFGXl/uACS3gid.AX2qjGIUu', 0, '2013-04-05 21:36:35', '3a723c799ce8e9078fcb1eb000abb6ed', 1),
(55, 'gemma.pike@students.plymouth.ac.uk', '$2a$10$TmBD3te5vYtk/Y8T8US8FuzRl8AwXGAgyC2dsLX3Hx8GP5BSguuJG', 0, '2013-04-06 19:20:58', '0cc33626216a68e4b8345e963f910bbb', 1),
(56, 'me@jakechampion.name', '$2a$10$K20tkKkhMcYLfMlydCf0QeSFyoon4T0d3s7r5zLEu8UlnMSx0K8J2', 0, '2013-04-07 21:17:21', 'a6b2861c2ccbf733b9e5719d02a67bea', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profiles_skills`
--
ALTER TABLE `profiles_skills`
  ADD CONSTRAINT `profiles_skills_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `profiles_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
