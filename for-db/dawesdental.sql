-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2017 at 01:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dawesdental`
--

-- --------------------------------------------------------



--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `hashed_password` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `ChatThread`
--

CREATE TABLE `ChatThread` (
  `id` int(11) NOT NULL,
  `fascilitator_user_id` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `ChatMessage`
--

CREATE TABLE `ChatMessage` (
  `id` int(12) NOT NULL,
  `chat_thread_id` int(11) NOT NULL,
  `chatter_user_id` int(11) DEFAULT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_new` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `ChatMsgSeenLog`
--

CREATE TABLE `ChatMsgSeenLog` (
  `chat_msg_id` int(12) NOT NULL,
  `seen_by_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;









--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

  -- AUTO_INCREMENT for table `Users`
  --
  ALTER TABLE `Users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


    --
    -- Indexes for table `ChatThread`
    --
    ALTER TABLE `ChatThread`
      ADD PRIMARY KEY (`id`),
      ADD KEY `id` (`id`),
      ADD KEY `fascilitator_user_id` (`fascilitator_user_id`);


      --
      -- AUTO_INCREMENT for table `ChatThread`
      --
      ALTER TABLE `ChatThread`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

        --
        -- Constraints for table `ChatThread`
        --
        ALTER TABLE `ChatThread`
          ADD CONSTRAINT `chatthread_ibfk_1` FOREIGN KEY (`fascilitator_user_id`) REFERENCES `Users` (`id`);



          --
          -- Indexes for table `ChatMessage`
          --
          ALTER TABLE `ChatMessage`
            ADD PRIMARY KEY (`id`),
            ADD KEY `chat_thread_id` (`chat_thread_id`),
            ADD KEY `chatter_user_id` (`chatter_user_id`);

            --
            -- AUTO_INCREMENT for table `ChatMessage`
            --
            ALTER TABLE `ChatMessage`
              MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;


              -- Constraints for table `ChatMessage`
              --
              ALTER TABLE `ChatMessage`
                ADD CONSTRAINT `chatmessage_ibfk_1` FOREIGN KEY (`chat_thread_id`) REFERENCES `ChatThread` (`id`),
                ADD CONSTRAINT `chatmessage_ibfk_2` FOREIGN KEY (`chatter_user_id`) REFERENCES `Users` (`id`);

            --




--
-- Indexes for dumped tables
--


--
-- Indexes for table `ChatMsgSeenLog`
--
ALTER TABLE `ChatMsgSeenLog`
  ADD PRIMARY KEY (`chat_msg_id`,`seen_by_user_id`),
  ADD KEY `chat_msg_id` (`chat_msg_id`),
  ADD KEY `seen_by_user_id` (`seen_by_user_id`);





--
-- AUTO_INCREMENT for dumped tables
--



--
-- Constraints for dumped tables
--

--


--
-- Constraints for table `ChatMsgSeenLog`
--
ALTER TABLE `ChatMsgSeenLog`
  ADD CONSTRAINT `chatmsgseenlog_ibfk_1` FOREIGN KEY (`chat_msg_id`) REFERENCES `ChatMessage` (`id`),
  ADD CONSTRAINT `chatmsgseenlog_ibfk_2` FOREIGN KEY (`seen_by_user_id`) REFERENCES `Users` (`id`);










-- --------------------------------------------------------




-- --------------------------------------------------------







--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `hashed_password`) VALUES
(4, 'brenbren', '$2y$10$VY0Rkpf7phZAk9Ytc5YEbOZqoZujetmrY92UvWl4uXnsrwGjDImmG');

--
-- Dumping data for table `ChatThread`
--

INSERT INTO `ChatThread` (`id`, `fascilitator_user_id`, `is_deleted`, `date_created`) VALUES
(41, 4, b'0', '2017-10-06 11:40:05'),
(42, 4, b'0', '2017-10-06 11:40:45'),
(43, 4, b'0', '2017-10-12 11:15:00');

-- --------------------------------------------------------


--
-- Dumping data for table `ChatMessage`
--

INSERT INTO `ChatMessage` (`id`, `chat_thread_id`, `chatter_user_id`, `date_posted`, `message`, `is_new`) VALUES
(280, 41, NULL, '2017-10-06 11:40:16', 'Hello', b'0'),
(281, 41, 4, '2017-10-06 11:41:30', 'Hello.. Welcome to Bucad-Javier-Dental.. :)\nHow can we help you?', b'0'),
(282, 41, NULL, '2017-10-06 11:41:59', 'Hi. My name is CJ. I have appointment today..', b'0'),
(283, 42, NULL, '2017-10-06 11:42:25', 'Hi my name is Yeye..', b'0'),
(284, 42, NULL, '2017-10-07 22:40:53', 'I wanna ask how much you charge for the braces?', b'0'),
(285, 42, 4, '2017-10-07 22:41:32', 'Ok sir Yeye.. Around $200..', b'0'),
(286, 43, NULL, '2017-10-12 11:16:50', 'hello.. I am Bren..', b'0'),
(287, 43, 4, '2017-10-12 11:17:29', 'Hello sir Bren.. Welcome to Dawes Place Customer Service.. How can we help you?', b'0'),
(288, 43, NULL, '2017-10-12 11:19:56', 'I have an appointment today..', b'0'),
(289, 43, 4, '2017-10-12 11:20:14', 'Yes sir..', b'0'),
(290, 43, NULL, '2017-10-12 11:22:06', 'Can i be late by 15 mins?', b'0'),
(291, 43, 4, '2017-10-12 11:24:41', 'It\'s ok sir..', b'0'),
(292, 43, NULL, '2017-10-12 11:25:16', 'Ok :)', b'0'),
(293, 43, 4, '2017-10-12 11:25:29', 'Great', b'0'),
(294, 43, NULL, '2017-10-12 11:26:00', 'Thanks', b'1'),
(295, 41, 4, '2017-10-12 11:26:17', 'cool', b'0');



--
-- Dumping data for table `ChatMsgSeenLog`
--

INSERT INTO `ChatMsgSeenLog` (`chat_msg_id`, `seen_by_user_id`) VALUES
(280, 4),
(281, 4),
(282, 4),
(283, 4),
(284, 4),
(285, 4),
(286, 4),
(287, 4),
(288, 4),
(289, 4),
(290, 4),
(291, 4),
(292, 4),
(293, 4),
(295, 4);






/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
