-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2013 at 10:10 PM
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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `body`, `created`, `modified`, `poster`) VALUES
(4, 'event', '<p>eveveveveve</p>', '2013-04-05 20:09:58', '2013-04-05 20:25:02', 'welcome screen.png'),
(5, 'ababab', '<p>ababa</p>', '2013-04-05 20:15:06', '2013-04-05 20:15:06', NULL),
(6, 'rthyrdhhytdh', '<p>fghdfgdfg</p>', '2013-04-05 20:15:11', '2013-04-05 20:15:11', NULL),
(7, 'vdxbfvdfbv', 'Text', '2013-04-05 20:21:46', '2013-04-05 20:22:14', NULL);

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modifed`, `user_id`) VALUES
(1, 'rererere', 'rererererer', '2013-04-05 18:05:06', '0000-00-00 00:00:00', 0);

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `firstname`, `lastname`, `picture`, `email`, `course`, `bio`, `modified`, `last_active`, `experience`) VALUES
(36, 52, 'John', 'Smith', '06277a6f4baba62d13b3589324f4e0dc.png', 'john.smith@gmail.com', 'BSc Web Applications Development', 'I like the web. And stuff.', '2013-04-05 20:59:34', 1365192491, 'I like boobies'),
(37, 53, 'Bob', 'Doe', 'user.png', 'bob@gmail.com', '', '', '2013-04-05 21:36:03', 1365192491, ''),
(38, 54, 'Liza', 'Doe', 'user.png', 'liza@gmail.com', '', '', '2013-04-05 21:36:35', 1365192491, '');

--
-- Dumping data for table `profiles_skills`
--

INSERT INTO `profiles_skills` (`profile_id`, `skill_id`) VALUES
(36, 22),
(36, 23),
(36, 32),
(36, 25),
(36, 27),
(36, 24),
(36, 26);

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(24, 'C#'),
(32, 'HTML'),
(26, 'Java'),
(25, 'JavaScript'),
(27, 'jQuery'),
(23, 'MySQL'),
(22, 'PHP');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created`, `activation`, `activated`) VALUES
(52, 'john.smith@gmail.com', '$2a$10$9nLSM4BucqPPBTRaOTzxBu2xao4l.V6YtAp.Dz1VT3sBtoM9FIZuW', 1, '2013-02-12 03:07:40', '4f8a070a4a24a9676ab6ae6a8dfad2a2', 1),
(53, 'bob@gmail.com', '$2a$10$E9TAzT/g3ZOTY1vQ7Xv58uifn9FoXvFiAExGbDEzgGMsUj5T.RbX2', 0, '2013-04-05 21:36:03', '23629a764cd13939155f00d593e4dc2a', 1),
(54, 'liza@gmail.com', '$2a$10$oIaRoZBHAakDMuG6MgTnluFXa.La2CFGXl/uACS3gid.AX2qjGIUu', 0, '2013-04-05 21:36:35', '3a723c799ce8e9078fcb1eb000abb6ed', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
