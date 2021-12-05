-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 03:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(3) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `catering` text NOT NULL,
  `booking_status` varchar(255) NOT NULL,
  `event_category` varchar(255) NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_package` varchar(255) NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_firstname`, `user_lastname`, `user_role`, `user_email`, `catering`, `booking_status`, `event_category`, `event_venue`, `event_date`, `event_package`, `timeslot`) VALUES
(12, 'Peter', 'James', 'employee', 'peterjames@gmail.com', 'yes', 'Pending', '4', '3', '2021-12-15', 'Basic', '10:00AM-11:00AM'),
(13, 'Jacobo', 'Ileyi', 'customer', 'jake@gmail.com', 'no', 'Pending', '3', '4', '2021-12-04', 'Basic', '14:00PM-15:00PM'),
(14, 'Daniel', 'Rose', 'customer', 'dan@dan.com', 'no', 'Approved', '1', '2', '2021-12-04', 'Basic', '13:00PM-14:00PM'),
(15, 'Peter', 'James', 'customer', 'peterjames@gmail.com', 'yes', 'Pending', '1', '1', '2021-12-25', 'Basic', '12:00PM-13:00PM'),
(16, 'Jacobo', 'Francis', 'customer', 'jake@gmail.com', 'yes', 'Pending', '1', '2', '2021-12-26', 'Deluxe', '15:00PM-16:00PM'),
(17, 'Peter', 'James', 'customer', 'peterjames@gmail.com', 'yes', 'Pending', '1', '1', '2022-02-02', 'Deluxe', '08:00AM-09:00AM'),
(18, 'Test', 'User', 'admin', 'test@test.com', 'yes', 'Pending', '3', '4', '2022-02-02', 'Deluxe', '16:00PM-17:00PM'),
(19, 'Oluwatimilehin', 'Akinnubi', 'customer', 'timmieprince@gmail.com', 'yes', 'Approved', '1', '1', '2021-12-04', 'Premium', '11:00AM-12:00PM'),
(20, 'Oluwatimilehin', 'Akinnubi', 'customer', 'timmieprince@gmail.com', 'yes', 'Pending', '1', '1', '2021-12-04', 'Premium', '16:00PM-17:00PM'),
(21, 'Oluwatimilehin', 'Akinnubi', 'customer', 'timmieprince@gmail.com', 'yes', 'Pending', '5', '1', '2021-12-04', 'Basic', '15:00PM-16:00PM'),
(22, 'Peter', 'James', 'customer', 'peterjames@gmail.com', 'yes', 'Approved', '1', '1', '2021-12-08', 'Deluxe', '09:00AM-10:00AM'),
(23, 'Oluwatimilehin', 'Akinnubi', 'employee', 'timmieprince@gmail.com', 'yes', 'Pending', '1', '1', '2021-12-08', 'Premium', '10:00AM-11:00AM'),
(24, 'Peter', 'James', 'customer', 'peterjames@gmail.com', 'yes', 'Approved', '1', '1', '2021-12-08', 'Basic', '16:00PM-17:00PM'),
(25, 'Jacobo', 'Ileyi', 'employee', 'jake@gmail.com', 'yes', 'Approved', '5', '2', '2022-02-02', 'Deluxe', '19:00PM-20:00PM'),
(26, 'Daniel', 'Rose', 'customer', 'dan@dan.com', 'yes', 'Pending', '1', '1', '2021-12-15', 'Deluxe', '14:00PM-15:00PM'),
(27, 'Peter', 'James', 'customer', 'peterjames@gmail.com', 'yes', 'Pending', '1', '1', '2021-12-16', 'Deluxe', '08:00AM-09:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'User Conference'),
(2, 'Birthday'),
(3, 'Product Launch'),
(4, 'Weddings'),
(5, 'Cottage Rental'),
(7, 'Workshops');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiry_id` int(3) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_inquiry` varchar(255) NOT NULL,
  `inquiry_status` varchar(555) NOT NULL,
  `inquiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inquiry_id`, `customer_name`, `customer_email`, `customer_inquiry`, `inquiry_status`, `inquiry_date`) VALUES
(1, 'David', 'davidson@gmail.com', 'How can I avail your Deluxe Plan??', '', '2021-11-24'),
(2, 'Jacobo Francis', 'jake@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem placeat hic nisi exercitationem eius consectetur ab non laudantium ratione assumenda! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut facilis sunt ipsa dolor saepe autem ex nisi n', 'in-review', '2021-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 4, 'Palm Court', 'BackRoads Tour Company', '2021-11-16', 'wedding-hall.jpg', 'Host your birthday events and parties in our halls with a capacity of 150 - 300 pax', 'birthday, event, party', 0, 'draft'),
(2, 2, 'Crystal Ball Room', 'BackRoads Tour Company', '2021-11-16', 'product-launch.jpg', 'Restructured event center for your Weddings, Birthday Celebrations, Child Dedication etc.', 'wedding, venue, event', 0, 'published'),
(3, 5, 'Bengal Room', 'BackRoads Tour Company', '2021-11-16', 'cottage.jpg', 'Beautiful rooms available for booking now', 'cottage, rental, room', 0, 'draft'),
(4, 1, 'Wireless Conference Room', 'BackRoads Tour Company', '2021-11-16', 'wireless-conference-room.jpg', 'Book our  wireless conference room now', 'conference, wireless, room, event', 0, 'published'),
(5, 4, 'Red Petal Garden', 'BackRoads Tour Company', '2021-11-24', 'petal_garden.png', 'Every love story is beautiful, but yours should be unique. Book this Venue for your next event.', 'wedding, garden, flowers', 0, 'draft'),
(6, 2, 'Eastwood Richmond Hall', 'BackRoads Tour Company', '2021-11-24', 'eastwood_richmond_hall.jpg', 'Your dream event delivered. Book our venue for your next event', 'birthday, eastwood, hall', 0, 'draft'),
(7, 2, 'Retro Disco Hall', 'BackRoads Tour Company', '2021-11-24', 'retro_themed_hall.jpg', 'Creating the Best. Day. Ever. Book this Venue for your next event.', 'retro, classics, hall, birthday', 0, 'draft'),
(8, 5, 'Royal Suite Deluxe', 'BackRoads Tour Company', '2021-11-24', 'royal_suite_studio.jpg', 'Every detail matters. It’s all in the details. Precise coordination, extraordinary results. Book this Venue for your next event.', 'royal, suite, rental', 0, 'published'),
(9, 1, 'Colorful Birthday Hall', 'BackRoads Tour Company', '2021-11-24', 'birthday_hall_2.jpg', 'Designing your perfect day. Book our venue for your next event.', 'birthday, event, hall', 0, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_image`, `user_role`) VALUES
(8, 'felix', 'Felix', 'Ragnarok', 'felix@gmail.com', '321', '', 'employee'),
(9, 'Jacob', 'Jacobo', 'Elisha', 'jacob@gmail.com', '$2y$12$.9ekgPrkAK66fMZEJqg7fus6i/wflbTJCAWkGFD.bOEaSbK7QsT.m', '', 'admin'),
(10, 'Ellen', 'Elena', 'Jabs', 'elena@gmail.com', '*0', '', 'employee'),
(11, 'Jack', 'Jackie', 'Chan', 'jack@chan.com', '$2y$12$Q9zoq1KSmzkRxXmAPYcdA.XebUPyf8Bbn9HaIFZMNR0OSxQXah4QC', '', 'customer'),
(12, 'Pete', 'Peter', 'James', 'peterjames@gmail.com', '$2y$12$R99FkhkUdElYuc4hJKRL0uHg8PcSidOSoP/uML44vUMvRL8qvtXuS', '', 'customer'),
(13, 'TestUser', 'Test', 'User', 'test@test.com', '$2y$12$Bx6QwpSyjcbqTUkfvBRgIuQazSeAmwOMzAUyL4UTMkhSuEDy.1nvu', '', 'customer'),
(14, 'Dan', 'Daniel', 'Rose', 'dan@dan.com', '$2y$12$FBMplkWYfYN24NFSaIu9ZOSdQQSAV0vuzEyM1q6wDAr92IxHZpDsS', '', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(3) NOT NULL,
  `venue_title` varchar(255) NOT NULL,
  `venue_image` text NOT NULL,
  `venue_caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `venue_title`, `venue_image`, `venue_caption`) VALUES
(1, 'Palm Court (100 - 150 Pax)', 'wedding-hall.jpg', ''),
(2, 'Crystal Ball Room (200 - 300 Pax)', 'product-launch.jpg', ''),
(3, 'Bengal Cottage Room (4 - 7 Pax)', 'cottage.jpg', ''),
(4, 'Wireless Conference Room (10 - 20 Pax)', 'wireless-conference-room.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
