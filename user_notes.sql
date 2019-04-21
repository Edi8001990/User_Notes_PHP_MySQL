-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Gru 2017, 21:36
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `user_notes`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `notes`
--

INSERT INTO `notes` (`note_id`, `user_id`, `note`) VALUES
(266, 88, 'This is note1 from user1 '),
(267, 88, 'This is note2 from user1'),
(268, 88, 'This is note3 from user1'),
(269, 88, 'This is note4 from user1'),
(270, 88, 'This is note5 from user1'),
(271, 89, 'This is note1 from user2'),
(272, 89, 'This is note2 from user2'),
(273, 90, 'This is note1 from user3'),
(274, 90, 'This is note2 from user3'),
(275, 90, 'This is note3 from user3'),
(276, 91, 'This is note1 from user4'),
(277, 91, 'This is note2 from user4'),
(278, 91, 'This is note3 from user4'),
(279, 91, 'This is note4 from user4'),
(280, 92, 'This is note1 from user5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`) VALUES
(88, 'user1', '$2y$10$jMjAm3JJOKqet5XH3jSz7ukZZsRgxf6KvCSyYM1USSRaAqq8hlLBq'),
(89, 'user2', '$2y$10$0GDjfAbkEwEYpMy8C9Inf.0nTPvuL0jHieLNBe64MeMT/iCVobwIO'),
(90, 'user3', '$2y$10$6wuI5jEOKjT0Xn/IfabE1.rmi70IZmxVOVOc4u3iE3Wy2HbFyXZWu'),
(91, 'user4', '$2y$10$8LUhSk/szxT51xQnzunKPuc9FZPwMeccs5629FwBAFjrg7uYPHv8e'),
(92, 'user5', '$2y$10$fqWOWcqGH7l6a2w.s0mwoevuykdtqxoiV5BeBSCXLQTo7t5B5aDwq');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
