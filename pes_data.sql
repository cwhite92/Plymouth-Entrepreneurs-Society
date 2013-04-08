-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2013 at 05:13 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pes`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `body`, `title`) VALUES
(1, '<h1>Our mission is to foster and encourage entrepreneurship through a broad range of exciting avenues.</h1>\r\n<h3>Business support &amp; mentoring</h3>\r\n<p>Want to start a business? We offer a wide range of support such as financing, mentoring by industry experts, meeting rooms, access to lawyers and accountants, registration guidance, investment sourcing and more! Got an idea? Email entrepreneurs@upsu.com asking for a “Start-Up Meeting”</p>\r\n<h3>Keynote Guest Speakers</h3>\r\n<p>Become inspired by experienced global and local entrepreneurs and business leaders. We always have an exciting calendar of free lectures which enrich your university experience. Past speakers have included Doug Richard from Dragon’s Den!</p>\r\n<h3>Commercial Projects</h3>\r\n<p>Get involved with real life business start-ups and develop your skills as an entrepreneur. Perfect for CV building, meeting people and making some money for yourself!</p>\r\n<h3>Practical workshops</h3>\r\n<p>Sharpen your business skills! Learn from our free sales, marketing and negotiation workshops presented by leading experts and consultants, often valued at hundreds of pounds.&nbsp;</p>\r\n<h3>Networking</h3>\r\n<p>Meet like-minded individuals and become part of a dynamic community of student entrepreneurs. We also partner with similar societies such as Enactus, Marketing, and Management so you are constantly meeting new and interesting people.</p>\r\n<h3>Trips</h3>\r\n<p>Get funded to join us at local, national, and global events! We’ve recently sent 20 society members to visit the UK’s leading student enterprise conference (travel, tickets and Hilton Hotel rooms included).</p>\r\n<h3> Professional Development Opportunities</h3>\r\n<p>Apply for professional development funding. We currently offer our members CIMA (Certificate in Management Accounting) for only £20 (Normal Price: £1,200). Our partner societies also offer similar highly-regarded qualifications for low prices, which we can put you in touch with!</p>\r\n', 'About Us');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
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

CREATE TABLE `events` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `body`, `created`, `modified`, `poster`, `date`, `location`) VALUES
(24, 'Career Launchpad Student Conference', '<p>Ever wondered what it''s like to work for a startup? Want the lowdown on what''s happening in the European startup community? The Startup Career Launchpad is a huge event with the likes of Raspberry Pi, MindCandy and LastMinute founders, amongst some 50 other keynote speakers. It''s happening over April 18 and 19 in London, organised by NACUE.<br></p><p><br></p><p>Plymouth Entrepreneurs Society may be able to pay all travel, accommodation and conference costs. Sign up if you are interested in attending!<br></p><p><br></p><p><a href="http://www.startupcareerlaunchpad.com/">www.startupcareerlaunchpad.com</a><br><br>REGISTER YOUR INTEREST AT:&nbsp;<a href="http://www.doodle.com/bkqmxzfk4w3vy4g6">http://www.doodle.com/bkqmxzfk4w3vy4g6</a><br></p>', '2013-04-08 04:52:49', '2013-04-08 04:52:49', '27e1390bda132dd12daf6650527cf02b.png', '2013-04-18 08:30:00', 'The Light, London'),
(25, ' Lecture Delivered by Wilfred Emmanuel-Jones', '<p>On behalf of our Vice-Chancellor, Professor Wendy Purcell, we are writing to invite you to a Prestige Lecture by Wilfred Emmanuel-Jones.<br><br>Please see your invitation below for full details and we hope that you will be able to join us for this very special occasion.<br><br>More information can be found on the University events page and to reserve a place please book here;<a href="https://www.surveymonkey.com/s/PrestigeLectureWilfredEmmanuel-Jones">https://www.surveymonkey.com/s/PrestigeLectureWilfredEmmanuel-Jones</a>&nbsp;<br><br>The event is taking place at the Robbins Conference Centre from 6.00 pm and the nearest car park is on Regent Street. However, free parking is available after 4.00 pm on campus and is just a short walk across campus to the Robbins Conference Centre. Please see the link below for more information regarding car parking and for campus maps.<br><br><a href="http://www.plymouth.ac.uk/pages/view.asp?page=17148">http://www.plymouth.ac.uk/pages/view.asp?page=17148</a><br><br>If you require this email invitation in an alternative format please contact us on 01752 586005 or email <a href="mailto:prestigelectures@plymouth.ac.uk">prestigelectures@plymouth.ac.uk</a><br></p>', '2013-04-08 05:12:04', '2013-04-08 05:12:04', 'fbb47e65dafbfe22197b7e3a1115da8f.png', '2013-04-11 18:00:00', 'Robbins Conference Centre');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `user_id`, `cover_photo`, `alt_text`) VALUES
(96, 'WARNING - New Scam Targeting Ambitious Entrepreneurs!', '<p>A number of websites are popping up claiming young people are entitled to start-up and marketing grants from government agencies.&nbsp;<br><br>You apply, get approved for around £5,000 - £9,000 and then are asked to pay ''admin fees'' (because it''s a third party company) before the funds are transferred.&nbsp;<br>Yep, you guessed it...the funds never arrive.&nbsp;<br><br>The websites I''ve been made aware of include: businessgrantsdirect.org.uk, usagrantfunding.org, and australiangrantfunding.org but I''m sure there''s more.&nbsp;<br><br>Good news though!!! The Entrepreneurs Society currently has access to numerous legitimate grants which you can take advantage of for FREE. Claim upto £200 for any business expense or upto £5,500 for a social enterprise start-up. T&amp;Cs apply.<br></p>', '2013-04-08 04:56:32', '2013-04-08 04:56:32', 52, NULL, NULL),
(97, 'Enterprise Bursary', '<p>Setting up a business and require a financial boost for things such as stock, marketing material, web hosting, training courses, patents, registering your business and other legal costs?...<br><br>Then apply for an Enterprise Bursary today and we can fund you up to £200! It might not sound like a lot, but in business that can go a long way - Lets not forget how Alan Sugar started with much less!<br><br>If you have any questions, contact me at <a href="mailto:tom.scott@plymouth.ac.uk">tom.scott@plymouth.ac.uk</a><br></p>', '2013-04-08 04:58:39', '2013-04-08 04:58:39', 52, NULL, NULL),
(98, 'Santander Universities Entrepreneurship Awards', '<p>Submit a business plan and win £5,000 or £20,000!<br></p><p><a href="https://exchange.plymouth.ac.uk/intranet/communities/m/stuevent/public/announcements/Santander%20Universities%20Entrepreneurship%20Awards.htm">Santander Universities Entrepreneurship Awards</a><br></p>', '2013-04-08 05:00:03', '2013-04-08 05:00:03', 52, NULL, NULL),
(99, 'Plymouth University Crowdfunding Workshop', '<p>Our friends at Peoplefund.it awarded £500 to these students yesterday at the fantastic crowd-funding workshop organised by Plymouth Entrepreneur''s Society!<br>Well done to everyone involved!!! :)<br></p><p><br></p><p><a href="https://www.facebook.com/media/set/?set=a.488259644572156.1073741825.186241674773956&amp;type=1">Plymouth University Crowdfunding Workshop</a><br></p>', '2013-04-08 05:01:10', '2013-04-08 05:01:10', 52, NULL, NULL),
(100, 'Placement Opportunities at Johnson Media', '<p><p>I''ve just been contacted by the Marketing &amp; PR Director of Johnson Media (one of the largest marketing agencies in America) who would like to create some fantastic opportunities for the members of this society.</p><br><p>If you would like a free copy of ''The Entrepreneur Mind: 100 Beliefs, Characteristics, and Habits of Elite Entrepreneurs'', please send your name and a short description of yourself (why you''re interested in entrepreneurship, business ideas, how you''ve got involved with the society, what inspires you in terms of business, role-models etc).&nbsp;</p></p><p><br><p>This list of names and paragraphs will then be posted onto the book website and give purchasers an opportunity to select a name (or multiple names) off the list and purchase a copy (or copies) to be donated to them directly.&nbsp;</p></p><p><br><p>Additionally, participating members are encouraged to include their Email and/or Twitter so that the donor of the book can get in contact, which adds a dimension of personalisation to the project and an amazing networking opportunity.&nbsp;</p><br><p>This is not only an easy way to get a free book about entrepreneurship, but also possibly get yourself a successful mentor. Kevin (the owner), as described in a previous post, has some huge contacts in business and it will be those sort of people who donate the books. There is a real opportunity to make some fantastic contacts who could provide valuable business advice, access to their network, and even internships.&nbsp;</p><br><p>To see the kind of people/companies Johnson Media has worked with, visit the website:&nbsp;<a href="http://www.johnsonmedia.com/clients.php">http://www.johnsonmedia.com/clients.php</a></p><br><p>Please send your short paragraphs to my university email so I can collate and pass on. <a href="mailto:James.Holden1@students.plymouth.ac.uk">James.Holden1@students.plymouth.ac.uk</a></p></p>', '2013-04-08 05:03:43', '2013-04-08 05:03:43', 52, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `firstname`, `lastname`, `picture`, `email`, `course`, `bio`, `modified`, `last_active`, `experience`) VALUES
(36, 52, 'John', 'Smith', 'user.png', 'john.smith@gmail.com', 'BSc Web Applications Development', 'I like the web. And stuff.', '2013-04-07 21:14:44', 1365390730, 'I like boobies'),
(37, 53, 'Bob', 'Doe', '5923c5e979cf9c30d555fb0cec442b0d.png', 'bob@gmail.com', '', '', '2013-04-06 00:04:02', 1365199738, ''),
(38, 54, 'Liza', 'Doe', 'user.png', 'liza@gmail.com', '', '', '2013-04-05 21:36:35', 1365202400, ''),
(39, 55, 'gemma', 'pike', '8b3286ba312b5d6077ea9fd2d4c82da5.png', 'gemma.pike@students.plymouth.ac.uk', 'International Tourism Management', 'I''m a badass', '2013-04-06 19:24:53', 1365269095, '21 years of being a badass'),
(40, 56, 'Jake', 'McAlman', 'user.png', 'me@jakechampion.name', '', '', '2013-04-07 21:17:22', 1365362995, '');

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
(36, 62),
(36, 63),
(36, 64),
(36, 37),
(36, 65);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
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

CREATE TABLE `skills` (
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

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `picture`) VALUES
(4, 'Android', 'b84dbcaea5471de055a0585e52bb7e7f.png'),
(5, 'dribbble', '233fff9e433f9ad92224c97c98cc6b0f.png'),
(6, 'Google', '1f3337f44bef5f471f77e47044defd31.png'),
(7, 'Smashing Magazine', '0cf67a32161ed286503a5481282f51ab.png');

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
