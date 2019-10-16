-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Okt 2019 um 13:36
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `krumbeck`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `userName` varchar(50) COLLATE utf8_bin NOT NULL,
  `userMail` varchar(50) COLLATE utf8_bin NOT NULL,
  `userPassword` varchar(50) COLLATE utf8_bin NOT NULL,
  `userSecretQuestion` varchar(50) COLLATE utf8_bin NOT NULL,
  `userAnswer` varchar(50) COLLATE utf8_bin NOT NULL,
  `userSalution` varchar(50) COLLATE utf8_bin NOT NULL,
  `userSurname` varchar(50) COLLATE utf8_bin NOT NULL,
  `userMainname` varchar(50) COLLATE utf8_bin NOT NULL,
  `userTelephone` varchar(50) COLLATE utf8_bin NOT NULL,
  `userStreet` varchar(50) COLLATE utf8_bin NOT NULL,
  `userHouseNr` varchar(50) COLLATE utf8_bin NOT NULL,
  `userPostcode` varchar(50) COLLATE utf8_bin NOT NULL,
  `userCity` varchar(50) COLLATE utf8_bin NOT NULL,
  `userCountry` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `userName`, `userMail`, `userPassword`, `userSecretQuestion`, `userAnswer`, `userSalution`, `userSurname`, `userMainname`, `userTelephone`, `userStreet`, `userHouseNr`, `userPostcode`, `userCity`, `userCountry`) VALUES
(1, 'Sven', 'sven.krumbeck@gmail.com', 'e3f023a610879e1e34e0f1fe0cb7b554', 'Animal', 'Sam', 'Herr', 'Sven', 'Krumbeck', '01622005938', 'Knooperweg', '179', '24118', 'Kiel', 1),
(13, 'Kalzifer', 'sven@svens-blog.com', 'b49794efc3f8f7568190c3b921d27768', '', '', 'Herr', 'Peter', 'Pan', '0190666666', 'Pupsgaße', '99', '24119', 'Berlin', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
