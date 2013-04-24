-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2013 at 05:06 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

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
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(38, 'Services'),
(39, ''),
(40, 'Services yeah!');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `body`, `created`, `modified`, `poster`, `date`, `location`) VALUES
(26, 'Career Launchpad Student Conference', '<p><p>Ever wondered what it''s like to work for a startup? Want the lowdown on what''s happening in the European startup community? The Startup Career Launchpad is a huge event with the likes of Raspberry Pi, MindCandy and LastMinute founders, amongst some 50 other keynote speakers. It''s happening over April 18 and 19 in London, organised by&nbsp;NACUE.</p><p>Plymouth Entrepreneurs Society may be able to pay all travel, accommodation and conference costs. Sign up if you are interested in attending!</p><p><a href="http://www.startupcareerlaunchpad.com/">www.startupcareerlaunchpad.com</a><br><br>REGISTER YOUR INTEREST AT:&nbsp;<a href="http://www.doodle.com/bkqmxzfk4w3vy4g6">http://www.doodle.com/bkqmxzfk4w3vy4g6</a></p></p>', '2013-04-24 05:01:37', '2013-04-24 05:01:37', 'a034ba1e606b05e0a99477118d393dfa.png', '2013-04-18 08:30:00', 'The Light, London'),
(27, ' Lecture Delivered by Wilfred Emmanuel-Jones', '<p>On behalf of our Vice-Chancellor, Professor Wendy Purcell, we are writing to invite you to a Prestige Lecture by Wilfred Emmanuel-Jones.<br><br>Please see your invitation below for full details and we hope that you will be able to join us for this very special occasion.<br><br>More information can be found on the University events page and to reserve a place please book here;<a href="https://www.surveymonkey.com/s/PrestigeLectureWilfredEmmanuel-Jones">https://www.surveymonkey.com/s/PrestigeLectureWilfredEmmanuel-Jones</a><br><br>The event is taking place at the Robbins Conference Centre from 6.00 pm and the nearest car park is on Regent Street. However, free parking is available after 4.00 pm on campus and is just a short walk across campus to the Robbins Conference Centre. Please see the link below for more information regarding car parking and for campus maps.<br><br><a href="http://www.plymouth.ac.uk/pages/view.asp?page=17148">http://www.plymouth.ac.uk/pages/view.asp?page=17148</a><br><br>If you require this email invitation in an alternative format please contact us on 01752 586005 or email&nbsp;<a href="mailto:prestigelectures@plymouth.ac.uk">prestigelectures@plymouth.ac.uk</a><br></p>', '2013-04-24 05:02:42', '2013-04-24 05:02:42', 'cebfb25ba17e587182cf3209f85eddca.png', '2013-04-11 18:00:00', 'Robbins Conference Centre'),
(28, 'Lecture from Sir Alan Sugar', '<p>Alan sugar&nbsp;ennit<br></p>', '2013-04-24 05:03:24', '2013-04-24 05:03:24', 'ac79fac6ca4e4cb083019baabbfd7e69.png', '2013-04-26 09:00:00', 'Rolle - 301');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `in_header` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `permalink`, `created`, `modified`, `category_id`, `in_header`) VALUES
(41, 'Mentoring', '<blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><p>Mentoring page</p></blockquote>', 'mentoring', '2013-04-24 04:20:37', '2013-04-24 04:39:36', 38, 1),
(42, 'Finding Investors', '<blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><p>Finding Investors</p></blockquote>', 'finding-investors', '2013-04-24 04:27:12', '2013-04-24 04:27:12', 38, 1),
(43, 'About Us', '<h1>Our mission is to foster and encourage entrepreneurship through a broad range of exciting avenues.</h1>\r\n<h3>Business support &amp; mentoring</h3>\r\n<p>Want to start a business? We offer a wide range of support such as financing, mentoring by industry experts, meeting rooms, access to lawyers and accountants, registration guidance, investment sourcing and more! Got an idea? Email entrepreneurs@upsu.com asking for a “Start-Up Meeting”</p>\r\n<h3>Keynote Guest Speakers</h3>\r\n<p>Become inspired by experienced global and local entrepreneurs and business leaders. We always have an exciting calendar of free lectures which enrich your university experience. Past speakers have included Doug Richard from Dragon’s Den!</p>\r\n<h3>Commercial Projects</h3>\r\n<p>Get involved with real life business start-ups and develop your skills as an entrepreneur. Perfect for CV building, meeting people and making some money for yourself!</p>\r\n<h3>Practical workshops</h3>\r\n<p>Sharpen your business skills! Learn from our free sales, marketing and negotiation workshops presented by leading experts and consultants, often valued at hundreds of pounds.&nbsp;</p>\r\n<h3>Networking</h3>\r\n<p>Meet like-minded individuals and become part of a dynamic community of student entrepreneurs. We also partner with similar societies such as Enactus, Marketing, and Management so you are constantly meeting new and interesting people.</p>\r\n<h3>Trips</h3>\r\n<p>Get funded to join us at local, national, and global events! We’ve recently sent 20 society members to visit the UK’s leading student enterprise conference (travel, tickets and Hilton Hotel rooms included).</p>\r\n<h3> Professional Development Opportunities</h3>\r\n<p>Apply for professional development funding. We currently offer our members CIMA (Certificate in Management Accounting) for only £20 (Normal Price: £1,200). Our partner societies also offer similar highly-regarded qualifications for low prices, which we can put you in touch with!</p>\r\n', 'about', '2013-04-24 04:28:13', '2013-04-24 04:28:13', 39, 1),
(44, 'Contact', '<p></p><table><tbody><tr><td>email</td><td>phone</td><td>address</td></tr><tr><td><a href="mailto:tom.scott@plymouth.ac.uk">tom.scott@plymouth.ac.uk</a></td><td>0712-3456-789</td><td>5 Tavistock Place<br>Plymouth<br>PL4 8AU</td></tr></tbody></table><br><p></p>\r\n', 'contact', '2013-04-24 04:28:45', '2013-04-24 04:50:48', 39, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `user_id`, `cover_photo`, `alt_text`) VALUES
(96, 'WARNING - New Scam Targeting Ambitious Entrepreneurs!', '<p>A number of websites are popping up claiming young people are entitled to start-up and marketing grants from government agencies.&nbsp;<br><br>You apply, get approved for around £5,000 - £9,000 and then are asked to pay ''admin fees'' (because it''s a third party company) before the funds are transferred.&nbsp;<br>Yep, you guessed it...the funds never arrive.&nbsp;<br><br>The websites I''ve been made aware of include: businessgrantsdirect.org.uk, usagrantfunding.org, and australiangrantfunding.org but I''m sure there''s more.&nbsp;<br><br>Good news though!!! The Entrepreneurs Society currently has access to numerous legitimate grants which you can take advantage of for FREE. Claim upto £200 for any business expense or upto £5,500 for a social enterprise start-up. T&amp;Cs apply.<br></p>', '2013-04-08 04:56:32', '2013-04-08 05:18:08', 52, NULL, NULL),
(97, 'Enterprise Bursary', '<p>Setting up a business and require a financial boost for things such as stock, marketing material, web hosting, training courses, patents, registering your business and other legal costs?...<br><br>Then apply for an Enterprise Bursary today and we can fund you up to £200! It might not sound like a lot, but in business that can go a long way - Lets not forget how Alan Sugar started with much less!<br><br>If you have any questions, contact me at <a href="mailto:tom.scott@plymouth.ac.uk">tom.scott@plymouth.ac.uk</a><br></p>', '2013-04-08 04:58:39', '2013-04-08 05:18:05', 52, NULL, NULL),
(98, 'Santander Universities Entrepreneurship Awards', '<p>Submit a business plan and win £5,000 or £20,000!<br></p><p><a href="https://exchange.plymouth.ac.uk/intranet/communities/m/stuevent/public/announcements/Santander%20Universities%20Entrepreneurship%20Awards.htm">Santander Universities Entrepreneurship Awards</a><br></p>', '2013-04-08 05:00:03', '2013-04-08 05:18:02', 52, NULL, NULL),
(99, 'Plymouth University Crowdfunding Workshop', '<p>Our friends at Peoplefund.it awarded £500 to these students yesterday at the fantastic crowd-funding workshop organised by Plymouth Entrepreneur''s Society!<br>Well done to everyone involved!!! :)</p><p><a href="https://www.facebook.com/media/set/?set=a.488259644572156.1073741825.186241674773956&amp;type=1">Plymouth University Crowdfunding Workshop</a><br></p>\r\n', '2013-04-08 05:01:10', '2013-04-08 05:17:59', 52, NULL, NULL),
(100, 'Placement Opportunities at Johnson Media', '<p></p><p>I''ve just been contacted by the Marketing &amp; PR Director of Johnson Media (one of the largest marketing agencies in America) who would like to create some fantastic opportunities for the members of this society.</p><p>If you would like a free copy of ''The Entrepreneur Mind: 100 Beliefs, Characteristics, and Habits of Elite Entrepreneurs'', please send your name and a short description of yourself (why you''re interested in entrepreneurship, business ideas, how you''ve got involved with the society, what inspires you in terms of business, role-models etc).&nbsp;</p><p>This list of names and paragraphs will then be posted onto the book website and give purchasers an opportunity to select a name (or multiple names) off the list and purchase a copy (or copies) to be donated to them directly.&nbsp;</p><p>Additionally, participating members are encouraged to include their Email and/or Twitter so that the donor of the book can get in contact, which adds a dimension of personalisation to the project and an amazing networking opportunity.&nbsp;</p><p>This is not only an easy way to get a free book about entrepreneurship, but also possibly get yourself a successful mentor. Kevin (the owner), as described in a previous post, has some huge contacts in business and it will be those sort of people who donate the books. There is a real opportunity to make some fantastic contacts who could provide valuable business advice, access to their network, and even internships.&nbsp;</p><p>To see the kind of people/companies Johnson Media has worked with, visit the website:&nbsp;<a href="http://www.johnsonmedia.com/clients.php">http://www.johnsonmedia.com/clients.php</a></p><p>Please send your short paragraphs to my university email so I can collate and pass on. <a href="mailto:James.Holden1@students.plymouth.ac.uk">James.Holden1@students.plymouth.ac.uk</a></p><p></p>\r\n', '2013-04-08 05:03:43', '2013-04-08 05:17:49', 52, NULL, NULL),
(101, 'Want a grant of up to £500?', '<p>If you have an idea that can make a difference in your community, we want to hear from you. Plymouth Entrepreneurs Society is working with both UnLtd and Lloyds Banking Group to offer innovative leading programmes for social entrepreneurs and grants to develop and grow your project. Only applicable while you''re a student! Why wait!?<br><br>Do you have an idea?<br><br>UnLtd offer grants (money you never have to repay) of up to £500 to test out a social enterprise idea you have. If the test is successful, you can apply for a further £5,000.<br>Lloyds Banking Group offer £4,000 for your project, providing you take part in the free Plymouth based business workshops.<br><br>Do you already have a Social Enterprise Company?<br><br>UnLtd offer growth grants between £5,000 and £15,000. With this, you will receive an award manager who acts as a mentor to guide you through fast, profitable growth.<br>Lloyds Banking Group also offers a scale-up course to help you grow your organisation. On completion, you will be given a grant of £15,000 along with the tools you need to maximise social impact.<br><br>To find out more information email:&nbsp;<a href="mailto:entrepreneurs@upsu.com">entrepreneurs@upsu.com</a><br></p>', '2013-04-08 05:23:41', '2013-04-08 05:23:41', 52, NULL, NULL),
(102, 'Participation Needed', '<p>Plymouth Entrepreneurs Society is currently lobbying Plymouth University for a fund to offer grants, loans and equity funding for new and current student businesses.&nbsp;<br><br>We need as many people to participate in this survey as possible. Results may be presented to the Vice Chancellor within the next few weeks.<br><br>Very short and light-hearted.&nbsp;<br>Your participation could help make this society the most funded society on campus!!!<br></p><p><a href="http://www.surveymonkey.com/s/9R8KHJ9">Seed Funding 2013/2014 Survey</a><br></p>', '2013-04-08 05:28:32', '2013-04-08 05:28:32', 52, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `firstname`, `lastname`, `picture`, `email`, `course`, `bio`, `modified`, `last_active`, `experience`) VALUES
(36, 52, 'John', 'Smith', 'user.png', 'john.smith@gmail.com', 'BSc Web Applications Development', 'I like the web. And stuff.', '2013-04-08 06:11:56', 1366772722, 'I like boobies'),
(41, 57, 'Jake', 'Champion', 'a663058890769571c8da9d9684c6ebf6.png', 'jakechampion.jake2@gmail.com', 'Web Applications Development', '', '2013-04-08 06:11:00', 1365394261, ''),
(42, 58, 'John', 'Doe', 'user.png', 'name@email.com', '', '', '2013-04-23 21:37:01', NULL, '');

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
(41, 25),
(41, 26);

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
(26, 'Java'),
(25, 'JavaScript');

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
(4, 'Android', 'b84dbcaea5471de055a0585e52bb7e7f.png'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created`, `activation`, `activated`) VALUES
(52, 'john.smith@gmail.com', '$2a$10$rJbS0LnagNb3DjqSWEH0UeEgyK8ucLUrKLqlbIA.Ui8vO.9A.0/HO', 1, '2013-02-12 03:07:40', '4f8a070a4a24a9676ab6ae6a8dfad2a2', 1),
(57, 'jakechampion.jake2@gmail.com', '$2a$10$PLIDaSUQx6IPhYSIhDtQ5ugjeCn2bsI1vGZ8CTsQ.ToIbdM0LoOZ.', 0, '2013-04-08 05:36:43', '904c42601948b790933deaa46f752c1a', 1),
(58, 'name@email.com', '$2a$10$QNBEYMiBXU.2QumiJuDV0eW7/8W9Wz4kbCWVTCfNpyVh/EkCGeqH6', 0, '2013-04-23 21:37:00', 'b51e5fff047e34e8ff12aa403562d5f0', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

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
