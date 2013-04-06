-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2013 at 10:06 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pes`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `file_name` (`file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attending`
--

CREATE TABLE `attending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_id` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `body`, `created`, `modified`, `picture`, `date`, `location`) VALUES
(1, 'First event', '<p>Description of said event</p>', '2013-04-06 16:34:43', '2013-04-06 18:18:11', 'boob.png', '2013-04-06 16:34:00', 'Ed''s front room');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `body` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

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
(33, 'another post', '<h1>heading</h1><div>gandhi said I''m a cunt</div><div><hr></div>', '2013-04-06 19:27:30', '2013-04-06 19:27:30', 52, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_attachments`
--

CREATE TABLE `posts_attachments` (
  `post_id` int(11) NOT NULL,
  `attachment_id` int(11) NOT NULL,
  KEY `post_id` (`post_id`),
  KEY `attachment_id` (`attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `firstname`, `lastname`, `picture`, `email`, `course`, `bio`, `modified`, `last_active`, `experience`) VALUES
(36, 52, 'John', 'Smith', 'user.png', 'john.smith@gmail.com', 'BSc Web Applications Development', 'I like the web. And stuff.', '2013-04-06 17:04:30', 1365278485, 'I like boobies'),
(37, 53, 'Bob', 'Doe', '5923c5e979cf9c30d555fb0cec442b0d.png', 'bob@gmail.com', '', '', '2013-04-06 00:04:02', 1365199738, ''),
(38, 54, 'Liza', 'Doe', 'user.png', 'liza@gmail.com', '', '', '2013-04-05 21:36:35', 1365202400, ''),
(39, 55, 'gemma', 'pike', '8b3286ba312b5d6077ea9fd2d4c82da5.png', 'gemma.pike@students.plymouth.ac.uk', 'International Tourism Management', 'I''m a badass', '2013-04-06 19:24:53', 1365269095, '21 years of being a badass');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_skills`
--

CREATE TABLE `profiles_skills` (
  `profile_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  KEY `profile_id` (`profile_id`),
  KEY `skill_id` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles_skills`
--

INSERT INTO `profiles_skills` (`profile_id`, `skill_id`) VALUES
(36, 33),
(36, 34),
(36, 35),
(36, 36),
(39, 32),
(39, 49),
(39, 50),
(39, 51),
(39, 52);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `skill` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(49, '   css'),
(51, '   english'),
(52, '   french'),
(50, '   marketing'),
(45, '  css'),
(47, '  english'),
(48, '  french'),
(46, '  marketing'),
(41, ' css'),
(43, ' english'),
(44, ' french'),
(36, ' HTML5'),
(34, ' Java'),
(42, ' marketing'),
(35, ' PHP'),
(24, 'C#'),
(37, 'css'),
(39, 'english'),
(40, 'french'),
(32, 'HTML'),
(26, 'Java'),
(25, 'JavaScript'),
(27, 'jQuery'),
(38, 'marketing'),
(23, 'MySQL'),
(22, 'PHP'),
(33, 'SQL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `activation` varchar(32) CHARACTER SET utf8 NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created`, `activation`, `activated`) VALUES
(52, 'john.smith@gmail.com', '$2a$10$9nLSM4BucqPPBTRaOTzxBu2xao4l.V6YtAp.Dz1VT3sBtoM9FIZuW', 1, '2013-02-12 03:07:40', '4f8a070a4a24a9676ab6ae6a8dfad2a2', 1),
(53, 'bob@gmail.com', '$2a$10$E9TAzT/g3ZOTY1vQ7Xv58uifn9FoXvFiAExGbDEzgGMsUj5T.RbX2', 0, '2013-04-05 21:36:03', '23629a764cd13939155f00d593e4dc2a', 1),
(54, 'liza@gmail.com', '$2a$10$oIaRoZBHAakDMuG6MgTnluFXa.La2CFGXl/uACS3gid.AX2qjGIUu', 0, '2013-04-05 21:36:35', '3a723c799ce8e9078fcb1eb000abb6ed', 1),
(55, 'gemma.pike@students.plymouth.ac.uk', '$2a$10$TmBD3te5vYtk/Y8T8US8FuzRl8AwXGAgyC2dsLX3Hx8GP5BSguuJG', 0, '2013-04-06 19:20:58', '0cc33626216a68e4b8345e963f910bbb', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts_attachments`
--
ALTER TABLE `posts_attachments`
ADD CONSTRAINT `posts_attachments_ibfk_2` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`),
ADD CONSTRAINT `posts_attachments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

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
