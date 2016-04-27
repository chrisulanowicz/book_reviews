-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 27, 2016 at 10:42 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belt_prep`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Suzanne Collins', '2016-04-27 10:40:41', '2016-04-27 10:40:41'),
(2, 'George R.R. Martin', '2016-04-27 12:20:31', '2016-04-27 12:20:31'),
(3, 'Jim Cramer', '2016-04-27 14:07:26', '2016-04-27 14:07:26'),
(4, 'Teachers', '2016-04-27 14:43:22', '2016-04-27 14:43:22'),
(5, 'Stephen King', '2016-04-27 15:17:03', '2016-04-27 15:17:03'),
(6, 'Neil Gaiman', '2016-04-27 15:17:52', '2016-04-27 15:17:52'),
(7, 'Bill Bryson', '2016-04-27 15:19:05', '2016-04-27 15:19:05'),
(8, 'Laura Hillenbrand', '2016-04-27 15:21:00', '2016-04-27 15:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `author_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hunger Games', '2016-04-27 10:40:41', '2016-04-27 10:40:41'),
(2, 1, 'Hunger Games Catching Fire', '2016-04-27 11:09:53', '2016-04-27 11:09:53'),
(3, 1, 'Hunger Games Mockingjay', '2016-04-27 11:42:40', '2016-04-27 11:42:40'),
(4, 2, 'Game of Thrones', '2016-04-27 12:20:31', '2016-04-27 12:20:31'),
(5, 2, 'A Clash of Kings', '2016-04-27 14:05:27', '2016-04-27 14:05:27'),
(6, 3, 'Mad Money', '2016-04-27 14:07:26', '2016-04-27 14:07:26'),
(7, 4, 'Any Textbook', '2016-04-27 14:43:22', '2016-04-27 14:43:22'),
(8, 2, 'A Storm of Swords', '2016-04-27 15:14:22', '2016-04-27 15:14:22'),
(9, 5, 'The Stand', '2016-04-27 15:17:03', '2016-04-27 15:17:03'),
(10, 6, 'American Gods', '2016-04-27 15:17:52', '2016-04-27 15:17:52'),
(11, 7, 'A Short History of Nearly Everything', '2016-04-27 15:19:05', '2016-04-27 15:19:05'),
(12, 5, 'Under the Dome', '2016-04-27 15:19:52', '2016-04-27 15:19:52'),
(13, 8, 'Unbroken', '2016-04-27 15:21:00', '2016-04-27 15:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Awesome book, best of the trilogy', 4, '2016-04-27 10:40:41', '2016-04-27 10:40:41'),
(2, 3, 2, 'not as good as the first but still a good read', 4, '2016-04-27 11:09:53', '2016-04-27 11:09:53'),
(3, 4, 3, 'Worst of the trilogy but if you''ve read the first two then you have to at least see how it all ends.', 2, '2016-04-27 11:42:40', '2016-04-27 11:42:40'),
(4, 1, 4, 'Greatest epic fantasy novel ever!', 5, '2016-04-27 12:20:31', '2016-04-27 12:20:31'),
(9, 6, 5, 'Still Awesome', 5, '2016-04-27 14:05:27', '2016-04-27 14:05:27'),
(10, 6, 6, 'One of the greatest financial minds!', 5, '2016-04-27 14:07:26', '2016-04-27 14:07:26'),
(11, 6, 7, 'Tend to be boring', 2, '2016-04-27 14:43:22', '2016-04-27 14:43:22'),
(12, 7, 8, 'What else can be said?', 5, '2016-04-27 15:14:22', '2016-04-27 15:14:22'),
(13, 7, 9, 'Great Book for most of it, the end was a bit weak though.', 4, '2016-04-27 15:17:03', '2016-04-27 15:17:03'),
(14, 10, 10, 'A little tough to follow but an interesting story', 3, '2016-04-27 15:17:52', '2016-04-27 15:17:52'),
(15, 5, 11, 'lots of great info condensed down pretty good', 4, '2016-04-27 15:19:05', '2016-04-27 15:19:05'),
(16, 9, 12, 'Great for most of the book, the ending sucked though', 4, '2016-04-27 15:19:52', '2016-04-27 15:19:52'),
(17, 8, 13, 'Amazing book with an amazing story.', 5, '2016-04-27 15:21:00', '2016-04-27 15:21:00'),
(18, 2, 13, 'Agreed, very inspiring story', 5, '2016-04-27 15:26:41', '2016-04-27 15:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `alias`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Alan Shore', 'Spader', 'ashore@bostonlegal.com', '$2y$10$aGb/OqznDW02QUU0Y4Gh0eQMoqrqTXlu6RbpNr.T86UsSTF/Z3OAe', '2016-04-20 13:15:31', '2016-04-20 13:15:31'),
(2, 'Denny Crane', 'Shatner', 'dcrane@bostonlegal.com', '$2y$10$gSjw2mWYUBI6AJRli8/oGOyTT2NDEyIC9vJEStaU5wHMczgPWJBue', '2016-04-20 13:17:54', '2016-04-20 13:17:54'),
(3, 'Shirley Schmidt', 'Bergen', 'sschmidt@bostonlegal.com', '$2y$10$8QwnyLsgM0T/SzeuCThS..pD176Ss.Ibk/A1CvcOG.TD75wmRLOF.', '2016-04-20 20:29:16', '2016-04-20 20:29:16'),
(4, 'Denise Bauer', 'Bowen', 'dbauer@bostonlegal.com', '$2y$10$aZohw2dTo2C./snQhdALxeuPRuqXe3oi5GKQSXOB9sgjH.EdatlIu', '2016-04-26 16:46:30', '2016-04-26 16:46:30'),
(5, 'Brad Chase', 'Valley', 'bchase@bostonlegal.com', '$2y$10$RRs4dgOK1xtWWJX/gvoGVeD6nIDD1QTbIX7QLVaZnmUqtkA86izo6', '2016-04-26 16:49:43', '2016-04-26 16:49:43'),
(6, 'Paul Lewiston', 'Auberjonois', 'plewiston@bostonlegal.com', '$2y$10$GaFX4p2G/2IL60LQ8dviZuCb2OUVP1JLxngicASh6TRFrNvBiNxeG', '2016-04-26 16:50:43', '2016-04-26 16:50:43'),
(7, 'Jerry Espenson', 'Clemenson', 'jespenson@bostonlegal.com', '$2y$10$diWuiLLSR4xdhn5l5vSBKeJfl/5yDgAyDVfoE1aLgb.gBqKJ0R4TG', '2016-04-26 16:53:15', '2016-04-26 16:53:15'),
(8, 'Clarice Bell', 'Williams', 'cbell@bostonlegal.com', '$2y$10$ouu68bgwOdkTA64G6q4rJunWQS9.8Sc4f4UBm5V8LHLwJZSUmh26G', '2016-04-26 16:54:43', '2016-04-26 16:54:43'),
(9, 'Carl Sack', 'Larroquette', 'csack@bostonlegal.com', '$2y$10$Zi5DyNBAltuYZ8fdF6.ciuPSAVSUk9kIL6icid7eOAVMrgFdtmxyu', '2016-04-26 17:07:34', '2016-04-26 17:07:34'),
(10, 'Judge Clark Brown', 'Gibson', 'jcbrown@bostonlegal.com', '$2y$10$e8CNOgk1p8txp8.fBLxV8.njCXoi0avtSzc6xlEtng3MFN4a8OuK.', '2016-04-26 17:09:00', '2016-04-26 17:09:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authors.id` (`author_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users.id` (`user_id`),
  ADD KEY `books.id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
