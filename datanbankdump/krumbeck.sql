-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Okt 2019 um 14:15
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
-- Tabellenstruktur für Tabelle `categorys`
--

CREATE TABLE `categorys` (
  `categoryID` int(10) NOT NULL,
  `categoryNameDE` varchar(50) COLLATE utf8_bin NOT NULL,
  `categoryNameENG` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `categorys`
--

INSERT INTO `categorys` (`categoryID`, `categoryNameDE`, `categoryNameENG`) VALUES
(1, 'Handys', 'Mobiles'),
(2, 'Laptops', 'Laptops');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE `items` (
  `orderID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `productQuantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `itemID` int(10) NOT NULL,
  `orderDate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `productID` int(10) NOT NULL,
  `productNameDE` varchar(50) COLLATE utf8_bin NOT NULL,
  `productNameENG` varchar(50) COLLATE utf8_bin NOT NULL,
  `productDescriptionDE` text COLLATE utf8_bin NOT NULL,
  `productDescriptionENG` text COLLATE utf8_bin NOT NULL,
  `productImage` varchar(50) COLLATE utf8_bin NOT NULL,
  `productCategoryID` int(10) NOT NULL,
  `productPrice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`productID`, `productNameDE`, `productNameENG`, `productDescriptionDE`, `productDescriptionENG`, `productImage`, `productCategoryID`, `productPrice`) VALUES
(1, 'Iphone 8 (Grau)', 'Iphone 8  (Grey)', 'Das iPhone 8 Plus ist eine neue iPhone Generation. Es ist aus stabilem Glas gebaut, mit robusterem Rahmen aus einem Aluminium, das auch in der Raumfahrt verwendet wird.\r\n\r\nEs lädt kabellos.\r\nUnd es ist vor Spritzwasser und Staub geschützt.\r\nHat ein 5,5\" Retina HD Display mit True Tone.\r\nEine 12 Megapixel Dual-Kamera mit verbessertem Porträtmodus und neuem Porträtlicht.\r\nUnd der A11 Bionic ist der leistungsstärkste und intelligenteste Smartphone Chip aller Zeiten.\r\nEr unterstützt Augmented Reality Erlebnisse in Spielen und Apps.\r\nIntelligenz hat noch nie so gut ausgesehen wie beim iPhone 8.', 'The iPhone 8 and 8 Plus feature glass bodies that enable wireless charging, faster A11 processors, upgraded cameras, and True Tone displays. Launched on September 22, 2017.\r\n\r\n4.7 and 5.5-inch LCD display\r\nFaster A11 processor\r\nGlass body\r\nUpgraded camera\r\nLouder speakers\r\nWireless inductive charging', 'image2.jpg', 1, 200),
(2, 'Macbook 2014', 'Macbook 2014', 'Dünn. Leicht. Leistungsstark. Und bereit für alles.\r\nWas immer die Aufgabe ist – die Intel Core i5 und i7 Prozessoren der 5. Generation mit Intel HD Graphics 6000 sind ihr gewachsen. Alles geht unglaublich schnell, egal ob du Fotos bearbeitest oder im Web surfst. Die gesamte Power steckt in einem nur 1,7 cm dünnen Unibody-Design, das gerade einmal 1,35 kg wiegt.\r\n\r\n802.11ac WLAN. Kabellos. Mühelos.\r\nWenn du dich direkt über eine 802.11ac Basisstation verbindest, erlebst du bis zu 3x schnelleres WLAN als mit der vorherigen Generation. Und 802.11ac ist nicht nur schneller, sondern hat auch mehr Reichweite – und du kannst noch freier arbeiten.\r\n\r\nSSD Speicher. Und es läuft.\r\nDer SSD Speicher im MacBook Air ist bis zu 17x schneller als eine Festplatte mit 5400 U/Min. So ist alles flüssiger und reagiert schneller. Und dank SSD Speicher und Intel Core Prozessoren der fünften Generation wacht das MacBook Air extrem schnell aus dem Ruhezustand auf.\r\n\r\nmacOS\r\nmacOS ist das Betriebssystem hinter allem, was du auf einem Mac machst. macOS High Sierra bringt neue zukunftsweisende Technologien und verbesserte Features auf deinen Mac. Das ist macOS auf hoher Niveau.', '\r\nMacBook Pro features a new quad-core Intel processor for up to 90 percent faster performance.¹ A brilliant and colorful Retina display with True Tone technology for a more comfortable viewing experience. Touch ID. The latest Apple-designed keyboard. And dynamic, contextual controls with Touch Bar. So you can take productivity to the next level.\r\nFeatures\r\nQuad-core 8th-generation Intel Core i5 processor\r\n\r\nBrilliant Retina display with True Tone technology\r\n\r\nTouch Bar and Touch ID\r\n\r\nIntel Iris Plus Graphics 645\r\n\r\nUltrafast SSD\r\n\r\nTwo Thunderbolt 3 (USB Type-C) ports\r\n\r\nUp to 10 hours of battery life²\r\n\r\n802.11ac Wi-Fi\r\n\r\nLatest Apple-designed keyboard\r\n\r\nForce Touch trackpad\r\n\r\nAvailable in space gray and silver\r\n\r\nmacOS Mojave, inspired by pros but designed for everyone, with Dark Mode, Stacks, easier screenshots, useful built-in apps, and more\r\n\r\n¹ Compared to previous 13-inch MacBook Pro with dual-core processor.\r\n\r\n² Battery life varies by use and configuration. See www.apple.com/batteries for more information.', 'macbook2016.jpg', 2, 150);

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
-- Indizes für die Tabelle `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categorys`
--
ALTER TABLE `categorys`
  MODIFY `categoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
