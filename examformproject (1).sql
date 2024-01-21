-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 04:47 PM
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
-- Database: `examformproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `exam_key` varchar(20) DEFAULT NULL,
  `minutes` int(11) DEFAULT NULL,
  `choice1` varchar(255) DEFAULT NULL,
  `choice2` varchar(255) DEFAULT NULL,
  `choice3` varchar(255) DEFAULT NULL,
  `choice4` varchar(255) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `solution`, `exam_key`, `minutes`, `choice1`, `choice2`, `choice3`, `choice4`, `fullname`, `lastname`) VALUES
(1, 'What is the purpose of the serialize() function in PHP?', 'choice', 'Rurangwa345', 1, 'A. To convert a string into an array', 'B. To convert an array into a string', 'To serialize an object into a JSON format', 'To unserialize an object from a JSON format', 'CYIMANA', 'AXEL'),
(2, ' Which of the following is NOT a valid way to start a PHP session?', 'checkbox', 'Rurangwa345', 1, 'session_start()', 'start_session()', 'session_starting()', 'session_start_now()', 'CYIMANA', 'AXEL'),
(3, 'What is the php in full words?', 'Selects', '', 0, 'one', 'two', 'three', 'four', 'CYIMANA', 'AXEL'),
(4, 'What is the php in full words?', 'Selects', '', 0, 'one', 'two', 'three', 'four', 'CYIMANA', 'AXEL'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(12, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CYIMANA', 'AXEL'),
(18, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(19, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(20, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(21, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(22, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(23, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(24, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(25, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(26, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(27, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(28, 'Which of the following functions is used to include the contents of one PHP file into another PHP file?', 'checkbox', 'Rurangwa345', 1, 'require', 'include_once', 'include', 'require_once', 'CYIMANA', 'AXEL'),
(29, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(30, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(31, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(32, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(33, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(34, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(35, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(36, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(37, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(38, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(39, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(40, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(41, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(42, 'What is the php in full words?', 'Pragaraph', '', 0, '', '', '', '', 'CYIMANA', 'AXEL'),
(43, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(44, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(45, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(46, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(47, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(48, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(49, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(50, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(51, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(52, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(53, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(54, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(55, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(56, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(57, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL'),
(58, '.Which function is used to redirect users to a different URL in PHP?', 'choice', 'Rurangwa345', 1, 'redirect()`', 'header()`', 'location()`', 'forward()`', 'CYIMANA', 'AXEL');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE `solution` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `exam_key` varchar(20) DEFAULT NULL,
  `user_option` varchar(255) DEFAULT NULL,
  `user_checkbox` varchar(255) DEFAULT NULL,
  `user_select` varchar(50) DEFAULT NULL,
  `user_programming` text DEFAULT NULL,
  `Marks` int(11) NOT NULL,
  `Publish` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solution`
--

INSERT INTO `solution` (`id`, `firstname`, `lastname`, `exam_key`, `user_option`, `user_checkbox`, `user_select`, `user_programming`, `Marks`, `Publish`) VALUES
(1, 'CYIMANA', 'AXEL', 'Rurangwa345', 'B. To convert an array into a string', 'start_session(),session_starting()', 'received', 'okay', 78, 'Allowed'),
(2, 'CYIMANA', 'AXEL', 'Rurangwa345', 'B. To convert an array into a string', 'start_session(),session_starting()', '', '', 90, 'Allowed'),
(3, 'CYIMANA', 'AXEL', 'Rurangwa345', 'B. To convert an array into a string', 'session_start_now()', '', '', 30, 'Allowed'),
(4, 'CYIMANA', 'AXEL', 'Rurangwa345', 'B. To convert an array into a string', 'session_start_now()', '', '', 43, 'Allowed'),
(5, 'CYIMANA', 'AXEL', 'Rurangwa345', 'B. To convert an array into a string', 'session_start_now()', '', '', 7, 'Allowed'),
(6, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'To serialize an object into a JSON format', 'session_starting(),include,require_once', '', '', 80, 'Allowed'),
(46, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'A. To convert a string into an array', 'start_session()', '', '', 0, ''),
(47, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'To serialize an object into a JSON format', 'session_starting()', '', '', 0, ''),
(48, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'B. To convert an array into a string', 'session_starting(),require_once,include_once', '', '', 0, ''),
(49, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'B. To convert an array into a string', 'session_starting(),require_once,include_once', '', '', 0, ''),
(50, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'To serialize an object into a JSON format', 'session_start_now()', '', '', 0, ''),
(51, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'To serialize an object into a JSON format', 'session_start_now()', '', '', 0, ''),
(52, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'To unserialize an object from a JSON format', 'session_starting()', '', '', 0, ''),
(53, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'To unserialize an object from a JSON format', 'session_starting()', '', '', 0, ''),
(54, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'To serialize an object into a JSON format', 'start_session()', '', '', 0, ''),
(55, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'To serialize an object into a JSON format', 'start_session()', '', '', 0, ''),
(56, 'NIYOMUKIRANUTSI', 'Jacques', 'Rurangwa345', 'To serialize an object into a JSON format', 'session_start()', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'CYIMANA', 'AXEL', 'CYIMANA@gmail.com', 'axel22300#'),
(2, 'NIRAGIRE', 'Magnifique', 'magnifique@gmail.com', 'axel22300#'),
(3, 'NIYOMUKIRANUTSI', 'Jacques', 'jackues@gmail.com', 'JACKNiyo765'),
(4, 'CYIMANA', 'Jacques', 'jackues@gmail.com', 'JACKN'),
(5, 'CYIMANA', 'Jacques', 'jackues@gmail.com', '2121'),
(6, 'CYIMANA', 'Jacques', 'jackues@gmail.com', 'JACKNiyo765'),
(7, 'CYIMANA', 'Jacques', 'jackues@gmail.com', 'axel22300#456'),
(8, 'NIRAGIRE', 'Magnifique', 'jackues@gmail.com', 'JACKNiyo765');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
