-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 10:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libray`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`) VALUES
(1, 'Rashida', 'Sohail', 'xyz', '17sw', 'admin@gmail.com', '03333333333');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`) VALUES
(1, 'Web Engineering:A Practitioner\'s Approach', 'Roger S Pressman', '3rd', 'Available', 98, 'Software'),
(2, 'The Complete Reference : Java', 'Herbert Schildt', '7th', 'Available', 72, 'Software'),
(3, 'Introduction to Software Engineering', 'Ronald J.Leach', '2nd', 'Available', 47, 'Software'),
(4, 'Patterns of Enterprise Application Architecture', 'Martin Fowler', '2nd', 'Available', 48, 'Software'),
(5, 'Professional Software Development', 'Steve McConnel', '2nd', 'Available', 49, 'Software '),
(6, 'Fundamentals of Electrical And Electronics Engineering', 'S.Chand', '1st', 'Available', 50, 'Electrical'),
(7, 'Basic Electrical Engineering', 'M.S Sukhija', '3rd', 'Available', 50, 'Electrical'),
(8, 'Principles of Electrical Engineering', 'V.K Mehta', '3rd', 'Available', 50, 'Electrical'),
(9, 'Electrical Power Engineering', 'K.C Agrawal', '2nd', 'Available', 50, 'Electrical'),
(10, 'Basic Civil Engineering', 'S.S Bhavikatti', '2nd', 'Available', 50, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`) VALUES
(6, 'rashida_sohail', 'When the 2nd edition of \"WEB APPLICATIONS WITH JAVA OR JAVASCRIPT\" will be available?'),
(9, 'Admin', 'Hello \"rashida_sohail\" the 2nd edition of \"WEB APPLICATIONS WITH JAVA OR JAVASCRIPT\" will be available in next week.'),
(11, 'shair_ali', 'When the book  \"SOFTWARE STRUCTURE AND DESIGN by Robert C. Martin\" will be available?'),
(14, 'aisha_munir', 'When the book \"SOLUTION MANUALS FOR COMPUTER SYSTEM ARCHITECTURE\" will be available?'),
(15, 'hassan_khan', 'When the book  \"FOUNDATION ENGINEERING  by Shivraj Gochar\" will be available?');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `bid`, `approve`, `issue`, `return`) VALUES
('rashidasohail', 3, 'Yes', '2021-03-16', '2021-04-16'),
('rashidasohail', 1, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>\r\n', '2021-02-12', '2021-03-31'),
('uzair_abid', 4, 'Yes', '2021-04-01', '2021-06-16'),
('shair_ali', 4, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2021-04-01', '2021/03/31'),
('uzair_abid', 5, 'Yes', '2020-03-05', '2021-05-05'),
('uzair_abid', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2021-03-05', '2021/03/31'),
('uzair_abid', 3, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2021-03-05', '2021-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rollno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`firstname`, `lastname`, `username`, `password`, `rollno`, `email`, `phone`) VALUES
('Uzair', 'Abid', 'uzair_abid', '123', '17sw113', 'uzair_abid@gmail.com', '03333333333'),
('Shair', 'Ali', 'shair_ali', '17sw37', '17sw37', 'shair_ali@gmail.com', '03333333333'),
('Rashida', 'Sohail', 'rashidasohail', 'rashda', '17sw27', 'rashda@gmail.com', '03333333333'),
('Hassan', 'Khan', 'hassan_khan', '19CE20', '19CE20', 'hassan_khan@gmail.com', '03333333333'),
('Aiman', 'Munir', 'aiman_munir', '19EE21', '19EE21', 'aiman_munirn@gmail.com', '03333333333'),
('Aisha', 'Munir', 'aisha_munir', '17EE55', '17CS55', 'aisha_munir@gmail.com', '03333333333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
