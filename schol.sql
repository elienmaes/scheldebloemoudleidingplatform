-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2020 at 12:18 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schol`
--

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `doc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc` varchar(300) NOT NULL,
  `created_on` date NOT NULL,
  `title` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`doc_id`, `user_id`, `doc`, `created_on`, `title`) VALUES
(27, 2, '5f95eae3eb1ac.pdf', '2020-10-25', 'concept website'),
(32, 17, '5fa29b21a45a1.pdf', '2020-11-04', 'Poster');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `dayofthemonth` int(2) NOT NULL,
  `month` varchar(20) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `timestring` varchar(40) NOT NULL,
  `location` varchar(100) NOT NULL DEFAULT 'nader te bepalen',
  `created_on` date DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `dayofthemonth`, `month`, `activity`, `timestring`, `location`, `created_on`, `date`) VALUES
(1, 9, 'oktober', 'Vrouwenweekend', '18u00-15u00', 'Chasse patat', '2020-10-25', '2020-10-09'),
(2, 18, 'november', 'Mosselsouper', '19u00', 'Gemeentehallen', '2020-10-26', '2020-11-18'),
(3, 31, 'december', 'Oudejaar', '18u00', 'nader te bepalen', '2020-10-26', '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `message` varchar(300) NOT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `user_id`, `message`, `created_on`) VALUES
(1, 1, 'Hallo iedereen en welkom op onze eigen chat! Laat jullie gaan!', '2020-10-20 13:37:30'),
(2, 2, 'Heeft er iemand een leuk idee voor de kids?', '2020-10-20 13:57:58'),
(3, 3, 'Wij gaan dit weekend naar de speeltuin. Zin om mee te gaan?', '2020-10-20 14:37:58'),
(5, 1, 'Boodschap van algemeen nut van jullie admin', '2020-10-25 11:21:49'),
(10, 1, 'Ga weg Corona!', '2020-11-04 13:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `page_id` int(10) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` varchar(300) NOT NULL,
  `template` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`page_id`, `slug`, `title`, `content`, `template`, `name`) VALUES
(1, 'Home', 'Home', '', 'home', 'home'),
(2, 'Documenten', 'Documenten', '', 'documenten', 'documenten'),
(3, 'Kalender', 'kalender', '', 'kalender', 'kalender'),
(4, 'Foto\'s', 'foto\'s', '', 'photo', 'foto\'s'),
(5, 'Chat', 'chat', '', 'chat', 'chat');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `created_on` date NOT NULL,
  `title` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `user_id`, `photo`, `created_on`, `title`) VALUES
(19, 2, '5f918fbd5752b.jpg', '2020-10-22', 'Chiroweekend  januari 2019'),
(24, 17, '5fa29b4636fe2.jpg', '2020-11-04', 'waterval');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '*D285543F6A11843AC8649BAB0B82DD96F3AFE00F', 0),
(2, 'Elien', 'Maes', 'elien_maes@hotmail.com', 'testing123', 0),
(3, 'Pauline', 'Peelemans', 'pauline.peelemans@hotmail.com', 'hoera123', 0),
(4, 'Ano', 'Niem', 'anoniem@gmail.com', '$2y$10$NM/O.B.IIVFPkMC.uq1Ntek6bFzr19VfHOK62MckkDrXtLtmh2BRW', 0),
(5, 'Ad', 'Min', 'admin@admin.be', '$2y$10$w5wevHSvL1i76Z6eR.UWHeZTFRyjKjNRhr.l5i0ds/5m.UpRUIG5S', 1),
(6, 'Cor', 'Ona', 'corona2020@belgium.be', '$2y$10$6CnME9T0JJDkGght1RMpYeOh6SJyOhfBquhnI41R0PWtuii1VVoEa', 0),
(7, 'Main', 'Index', 'main@hotmail.com', '$2y$10$1GD9875nzAra.jHwYTdukOL8Aiesns3pEEcUiEqCfIiW3zPkY0cia', 0),
(8, 'Student', 'PGM', 'student@artevelde.be', '$2y$10$jEHo6FLIBtsGb/ydZMhqau8l2PpXM0BjXCEYCie.xGG.4pZHHKd0O', NULL),
(9, 'Docent', 'PGM', 'docent@artevelde.be', '$2y$10$NgIOWooU6Jl9O3UWltQuG.WwxUQdyTNPRwg1W2cmby.32xQr/Jski', NULL),
(10, 'Docent', 'Arteveldehs', 'docent@arteveldehs.be', '$2y$10$KOKrVSdVzsZjD.v7Zjne6OxWkHP8OOtB46936ZEgf9HJr6IwloDiu', NULL),
(15, 'Romanie', 'Delporte', 'romanie@student.be', '$2y$10$FtNoWaO31ApD0Fqx50H0y.cWPrmK/Tg7ZNTXMXXzvDVHrxjbLHwqi', NULL),
(17, 'Corona', 'Virus', 'corona@virus.be', '$2y$10$/gIkLhpNqwaIzKHcGSD.jeQslWrVnSF4Tl14sexcMQyPMwSLwup/y', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `page_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
