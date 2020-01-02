-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Jan 2020 um 10:22
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
-- Tabellenstruktur für Tabelle `admins`
--

CREATE TABLE `admins` (
  `adminID` int(10) NOT NULL,
  `adminName` varchar(50) COLLATE utf8_bin NOT NULL,
  `adminPassword` varchar(50) COLLATE utf8_bin NOT NULL,
  `locked` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `admins`
--

INSERT INTO `admins` (`adminID`, `adminName`, `adminPassword`, `locked`) VALUES
(1, 'Sven', 'e3f023a610879e1e34e0f1fe0cb7b554', 0),
(2, 'Krumbeck', 'ae8962ed9c1f74b84e8c20d23ea65b2e', 0),
(3, 'SvenKrumbeck', 'ae8962ed9c1f74b84e8c20d23ea65b2e', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categorys`
--

CREATE TABLE `categorys` (
  `categoryID` int(10) NOT NULL,
  `categoryNameDE` varchar(50) COLLATE utf8_bin NOT NULL,
  `categoryNameENG` varchar(50) COLLATE utf8_bin NOT NULL,
  `locked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `categorys`
--

INSERT INTO `categorys` (`categoryID`, `categoryNameDE`, `categoryNameENG`, `locked`) VALUES
(1, 'Handys', 'Mobiles', 0),
(2, 'Laptops', 'Laptops', 0),
(3, 'Zubehör', 'Accessories', 0),
(4, 'Schreibtisch Computer', 'Desktop Computer', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `orderID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `productQuantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `items`
--

INSERT INTO `items` (`itemID`, `orderID`, `productID`, `productQuantity`) VALUES
(1, 6, 2, 1),
(2, 6, 1, 1),
(3, 7, 2, 1),
(4, 7, 1, 1),
(5, 8, 1, 1),
(6, 8, 2, 2),
(7, 0, 1, 3),
(8, 0, 1, 1),
(9, 0, 1, 1),
(10, 12, 1, 1),
(11, 13, 2, 1),
(12, 14, 1, 1),
(13, 15, 2, 1),
(14, 16, 4, 4),
(15, 16, 2, 4),
(16, 17, 1, 3),
(17, 17, 2, 1),
(18, 18, 4, 1),
(19, 19, 4, 1),
(20, 20, 1, 1),
(21, 21, 1, 0),
(22, 22, 4, 1),
(23, 24, 1, 3),
(24, 24, 4, 1),
(25, 25, 1, 1),
(26, 25, 8, 1),
(27, 25, 2, 1),
(28, 25, 4, 1),
(29, 26, 1, 2),
(30, 26, 4, 2),
(31, 27, 9, 5),
(32, 27, 8, 8),
(33, 28, 1, 5),
(34, 29, 1, 1),
(35, 30, 9, 4),
(36, 30, 2, 2),
(37, 31, 4, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `orderDate`) VALUES
(6, 1, '2019-10-25'),
(7, 1, '2019-10-25'),
(8, 1, '2019-10-25'),
(12, 1, '2019-10-25'),
(13, 1, '2019-09-18'),
(14, 1, '2019-01-01'),
(15, 1, '2019-06-13'),
(16, 1, '2019-11-06'),
(17, 1, '2019-11-06'),
(18, 1, '2019-11-06'),
(19, 1, '2019-11-06'),
(20, 1, '2019-11-06'),
(21, 1, '2019-11-08'),
(22, 1, '2019-11-08'),
(23, 1, '2019-11-08'),
(24, 1, '2019-11-08'),
(25, 14, '2019-01-01'),
(26, 14, '2019-01-11'),
(27, 15, '2019-01-21'),
(28, 15, '2019-01-21'),
(29, 16, '2019-12-05'),
(30, 13, '2019-01-29'),
(31, 14, '2019-12-12');

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
  `productPrice` int(10) NOT NULL,
  `locked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`productID`, `productNameDE`, `productNameENG`, `productDescriptionDE`, `productDescriptionENG`, `productImage`, `productCategoryID`, `productPrice`, `locked`) VALUES
(1, 'Iphone 8 (Grau)', 'Iphone 8  (Grey)', 'Das iPhone 8 Plus ist eine neue iPhone Generation. Es ist aus stabilem Glas gebaut, mit robusterem Rahmen aus einem Aluminium, das auch in der Raumfahrt verwendet wird.\r\n\r\nEs lädt kabellos.\r\nUnd es ist vor Spritzwasser und Staub geschützt.\r\nHat ein 5,5\" Retina HD Display mit True Tone.\r\nEine 12 Megapixel Dual-Kamera mit verbessertem Porträtmodus und neuem Porträtlicht.\r\nUnd der A11 Bionic ist der leistungsstärkste und intelligenteste Smartphone Chip aller Zeiten.\r\nEr unterstützt Augmented Reality Erlebnisse in Spielen und Apps.\r\nIntelligenz hat noch nie so gut ausgesehen wie beim iPhone 8.', 'The iPhone 8 and 8 Plus feature glass bodies that enable wireless charging, faster A11 processors, upgraded cameras, and True Tone displays. Launched on September 22, 2017.\r\n\r\n4.7 and 5.5-inch LCD display\r\nFaster A11 processor\r\nGlass body\r\nUpgraded camera\r\nLouder speakers\r\nWireless inductive charging', 'image2.jpg', 1, 200, 0),
(2, 'Macbook 2014', 'Macbook 2014', 'Dünn. Leicht. Leistungsstark. Und bereit für alles.\r\nWas immer die Aufgabe ist – die Intel Core i5 und i7 Prozessoren der 5. Generation mit Intel HD Graphics 6000 sind ihr gewachsen. Alles geht unglaublich schnell, egal ob du Fotos bearbeitest oder im Web surfst. Die gesamte Power steckt in einem nur 1,7 cm dünnen Unibody-Design, das gerade einmal 1,35 kg wiegt.\r\n\r\n802.11ac WLAN. Kabellos. Mühelos.\r\nWenn du dich direkt über eine 802.11ac Basisstation verbindest, erlebst du bis zu 3x schnelleres WLAN als mit der vorherigen Generation. Und 802.11ac ist nicht nur schneller, sondern hat auch mehr Reichweite – und du kannst noch freier arbeiten.\r\n\r\nSSD Speicher. Und es läuft.\r\nDer SSD Speicher im MacBook Air ist bis zu 17x schneller als eine Festplatte mit 5400 U/Min. So ist alles flüssiger und reagiert schneller. Und dank SSD Speicher und Intel Core Prozessoren der fünften Generation wacht das MacBook Air extrem schnell aus dem Ruhezustand auf.\r\n\r\nmacOS\r\nmacOS ist das Betriebssystem hinter allem, was du auf einem Mac machst. macOS High Sierra bringt neue zukunftsweisende Technologien und verbesserte Features auf deinen Mac. Das ist macOS auf hoher Niveau.', '\r\nMacBook Pro features a new quad-core Intel processor for up to 90 percent faster performance.¹ A brilliant and colorful Retina display with True Tone technology for a more comfortable viewing experience. Touch ID. The latest Apple-designed keyboard. And dynamic, contextual controls with Touch Bar. So you can take productivity to the next level.\r\nFeatures\r\nQuad-core 8th-generation Intel Core i5 processor\r\n\r\nBrilliant Retina display with True Tone technology\r\n\r\nTouch Bar and Touch ID\r\n\r\nIntel Iris Plus Graphics 645\r\n\r\nUltrafast SSD\r\n\r\nTwo Thunderbolt 3 (USB Type-C) ports\r\n\r\nUp to 10 hours of battery life²\r\n\r\n802.11ac Wi-Fi\r\n\r\nLatest Apple-designed keyboard\r\n\r\nForce Touch trackpad\r\n\r\nAvailable in space gray and silver\r\n\r\nmacOS Mojave, inspired by pros but designed for everyone, with Dark Mode, Stacks, easier screenshots, useful built-in apps, and more\r\n\r\n¹ Compared to previous 13-inch MacBook Pro with dual-core processor.\r\n\r\n² Battery life varies by use and configuration. See www.apple.com/batteries for more information.', 'macbook2016.jpg', 2, 150, 0),
(4, 'MacMini 2018', 'MacMini 2018', 'Der Mac mini ist jetzt mit Intel-Prozessoren der 8. Generation ausgestattet. Er verfügt über schnellen 2666 MHz DDR4 Arbeitsspeicher und viele verschiedene neue Anschlüsse wie Thunderbolt 3, HDMI 2.0 und superschnellen Flash Speicher, mit dem du schneller als je zuvor riesige Dateien lädst und Apps startest. Der überarbeitete Mac mini ist leistungsstärker als je zuvor. Jeder Platz ist ein Arbeitsplatz.', 'In addition to being a great desktop computer, Mac mini powers everything from home automation to giant render farms. And now with eighth-generation Intel quad-core and 6-core processors and Intel UHD Graphics 630, Mac mini has even more compute power for industrial-grade tasks. So whether you’re running a live concert sound engine or testing your latest iOS or iPadOS app, Mac mini is the shortest distance between a great idea and a great result.', 'refurb-mac-mini-2018_AV3.jpg', 2, 50, 0),
(5, 'Modernes Lederarmband Aubergine ', 'Aubergine Modern Buckle', 'Eine kleine, 1803 gegründete französische Gerberei produziert das weiche Granada-Leder für dieses elegante Armband. Das geschmeidige Leder wird schonend gewalkt, um die edle Textur zu erhalten. Was nach einem einteiligen Schnallenverschluss aussieht, ist tatsächlich ein zweiteiliger Magnetverschluss, der sich leicht öffnen und schließen lässt. Außerdem haben wir eine Innenschicht aus Vectran hinzugefügt, um das Material zu verstärken. Dasselbe Material wurde von der NASA für die Lande-Airbags des Mars-Rover verwendet.', 'A small French tannery established in 1803 produces the supple Granada leather for this elegant band. The smooth top-grain leather is lightly milled and tumbled to maintain its refined texture. What looks like a solid buckle is actually a two-piece magnetic closure that’s delightfully simple to secure. We also added an inner layer of Vectran weave for strength and stretch resistance. It’s the same material NASA used to make the landing airbags for the Mars rover spacecraft.', 'MWRL2.jpg', 3, 50, 0),
(8, 'iPhone 11 Pro', 'iPhone 11 Pro', 'Bedienungs­hilfen helfen Menschen mit Behinderung, ihr neues iPhone 11 Pro optimal zu nutzen. Mit der integrierten Unterstützung für Seh‑ und Hörvermögen, Mobilität und Lernen kannst du das persönlichste Gerät der Welt voll und ganz erleben.', 'Accessibility features help people with disabilities get the most out of their new iPhone 11 Pro. With built‑in support for vision, hearing, mobility, and learning, you can fully enjoy the world’s most personal device.', 'MWYK2.jpg', 1, 100, 0),
(9, 'iMac 2019', 'iMac 2019', 'Die Vision hinter dem iMac war schon immer, das Desktoperlebnis zu\r\nverändern – mit leistungs­starker, leicht zu bedienender Technologie in einem eleganten All-in-One Design. Der neue iMac bringt diese Idee auf die nächste Ebene, mit noch mehr großartigen Tools, um so ziemlich alles zu machen. Der iMac kommt mit den neuesten Prozessoren, schnellerem Arbeits­speicher und phänomenaler Grafik. Und all das siehst du auf dem hellsten, brillantesten Retina Display, das es je beim Mac gab. Er ist alles, was du willst.\r\nMit noch mehr Leistung.', 'The vision behind iMac has never wavered: Transform the desktop experience by fitting powerful, easy-to-use technology into an elegant, all-in-one design. The new iMac takes that idea to the next level — giving you even more amazing tools to do just about anything. iMac is packed with the latest processors, faster memory, and phenomenal graphics. All coming to life on the brightest, most vibrant Retina display ever on a Mac. It’s the total package — powered up.', 'imac-27-cto-hero-201903.jpg', 4, 250, 0);

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
  `userCountry` int(10) NOT NULL,
  `locked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `userName`, `userMail`, `userPassword`, `userSecretQuestion`, `userAnswer`, `userSalution`, `userSurname`, `userMainname`, `userTelephone`, `userStreet`, `userHouseNr`, `userPostcode`, `userCity`, `userCountry`, `locked`) VALUES
(1, 'Sven', 'sven.krumbeck@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Animal', 'Sam', 'Herr', 'Sven', 'Krumbeck', '01622005938', 'Knooperweg', '179', '24118', 'Kiel', 1, 0),
(13, 'Peter', 'peter@panzer.de', 'd41d8cd98f00b204e9800998ecf8427e', 'Hospital', 'Panzer Krankenhaus', 'Herr', 'Peter', 'Panzer', '0190666666', 'Pupsgaße', '99', '24119', 'Berlin', 3, 0),
(14, 'Lucas', 'lucas.bernard@fanzmail.fr', 'd41d8cd98f00b204e9800998ecf8427e', 'School', 'Französische Schule', 'Herr', 'Lucas', 'Bernhard', '+33 1 53 01 82 00', 'Rue Réaumur', '60', '75003', 'Paris', 2, 0),
(15, 'Björk', 'bjoerk@smorrebred.dk', 'ae8962ed9c1f74b84e8c20d23ea65b2e', 'Animal', 'Ulv', 'Herr', 'Björk', 'Smorrebred', '+45 33 73 03 73', 'Købmagergade ', '52A', '1150', ' København', 4, 0),
(16, 'TerryTest', 'terry@test.de', 'd41d8cd98f00b204e9800998ecf8427e', 'School', 'Test Schule', 'Herr', 'Terry', 'Test', '0190666666', 'Teststraße', '123', '12345', 'Testort', 1, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indizes für die Tabelle `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indizes für die Tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

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
-- AUTO_INCREMENT für Tabelle `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `categorys`
--
ALTER TABLE `categorys`
  MODIFY `categoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
