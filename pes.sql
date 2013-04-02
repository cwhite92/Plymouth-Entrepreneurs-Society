-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2013 at 02:49 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pes`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text,
  `body` longtext,
  `published` tinyint(1) NOT NULL,
  `sticky` tinyint(1) NOT NULL DEFAULT '0',
  `in_rss` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories`
--

CREATE TABLE `blog_post_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `rss_channel_title` varchar(255) DEFAULT NULL,
  `rss_channel_description` text,
  `blog_post_count` int(11) NOT NULL DEFAULT '0',
  `under_blog_post_count` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories_blog_posts`
--

CREATE TABLE `blog_post_categories_blog_posts` (
  `blog_post_category_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  PRIMARY KEY (`blog_post_category_id`,`blog_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags`
--

CREATE TABLE `blog_post_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `rss_channel_title` varchar(255) DEFAULT NULL,
  `rss_channel_description` text,
  `blog_post_count` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags_blog_posts`
--

CREATE TABLE `blog_post_tags_blog_posts` (
  `blog_post_tag_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  PRIMARY KEY (`blog_post_tag_id`,`blog_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_settings`
--

CREATE TABLE `blog_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` varchar(255) NOT NULL,
  `setting_text` varchar(255) NOT NULL,
  `tip` varchar(255) DEFAULT NULL,
  `value` text,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_text_UNIQUE` (`setting_text`),
  UNIQUE KEY `setting_UNIQUE` (`setting`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `blog_settings`
--

INSERT INTO `blog_settings` (`id`, `setting`, `setting_text`, `tip`, `value`, `modified`) VALUES
(1, 'meta_title', 'Meta Title', NULL, 'My New Blog', NULL),
(2, 'meta_description', 'Meta Description', NULL, '', '0000-00-00 00:00:00'),
(3, 'meta_keywords', 'Meta Keywords', NULL, '', NULL),
(4, 'rss_channel_title', 'RSS Channel Title', NULL, 'My New Blog', NULL),
(5, 'rss_channel_description', 'RSS Channel Description', NULL, '', NULL),
(6, 'show_summary_on_post_view', 'Show post summary on post detail page?', '''Yes'' or ''No''', 'No', NULL),
(7, 'show_categories_on_post_view', 'Show post categories on post detail page?', '''Yes'' or ''No''', 'No', NULL),
(8, 'show_tags_on_post_view', 'Show post tags on post detail page?', '''Yes'' or ''No''', 'Yes', NULL),
(9, 'use_summary_or_body_on_post_index', 'Use the summary or the post body on the post index page?', '''Summary'' or ''Body''', 'Summary', NULL),
(10, 'use_summary_or_body_in_rss_feed', 'Use the summary or the post body in the RSS feed?', '''Summary'' or ''Body''', 'Body', NULL),
(11, 'published_format_on_post_index', 'Published date/time format on post index page', 'e.g. ''d M Y'' see php.net/date', '<\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\d\\a\\y">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\m\\o\\n\\t\\h">M</\\s\\p\\a\\n> <\\s\\pa\\n \\c\\l\\a\\s\\s="\\y\\e\\a\\r">y</\\s\\p\\a\\n>', NULL),
(12, 'published_format_on_post_view', 'Published date/time format on post view page', 'e.g. ''d M Y'' see php.net/date', '<\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\d\\a\\y">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\m\\o\\n\\t\\h">M</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s="\\y\\e\\a\\r">y</\\s\\p\\a\\n>', NULL),
(13, 'og:site_name', 'Open Graph: Site Name', NULL, 'My New Blog', NULL),
(14, 'fb_admins', 'Facebook Admins', NULL, NULL, NULL),
(15, 'use_disqus', 'Use Disqus', '''Yes'' or ''No''', 'No', NULL),
(16, 'disqus_shortname', 'Disqus Shortname', NULL, NULL, NULL),
(17, 'disqus_developer', 'Disqus Developer Mode', '''Yes'' or ''No''', 'Yes', NULL),
(18, 'show_share_links', 'Show the share buttons on blog posts?', '''Yes'' or ''No''', 'Yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(36) CHARACTER SET utf8 NOT NULL DEFAULT 'user.jpg',
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `course` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bio` text CHARACTER SET utf8 NOT NULL,
  `modified` datetime NOT NULL,
  `last_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `firstname`, `lastname`, `picture`, `email`, `course`, `bio`, `modified`, `last_active`) VALUES
(36, 52, 'John', 'Smith', '0a885f7b5d8968bd5daabace240a91fd.jpg', 'john.smith@gmail.com', 'BSc Web Applications Development', 'I like the web. And stuff.', '2013-03-25 17:43:04', 1364906427);

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
(36, 22),
(36, 23),
(36, 32),
(36, 25),
(36, 27),
(36, 24),
(36, 26);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `skill` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `activation` varchar(32) CHARACTER SET utf8 NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created`, `activation`, `activated`) VALUES
(52, 'john.smith@gmail.com', '$2a$10$9nLSM4BucqPPBTRaOTzxBu2xao4l.V6YtAp.Dz1VT3sBtoM9FIZuW', 1, '2013-02-12 03:07:40', '4f8a070a4a24a9676ab6ae6a8dfad2a2', 1);

--
-- Constraints for dumped tables
--

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
