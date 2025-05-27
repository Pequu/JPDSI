-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 27, 2025 at 09:49 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escapedb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `accounts`
--

CREATE TABLE `accounts` (
  `idAccount` int(11) NOT NULL,
  `accName` varchar(25) NOT NULL,
  `accSurname` varchar(25) NOT NULL,
  `accBirthDate` date NOT NULL,
  `accIsActive` tinyint(1) NOT NULL,
  `accCreation` date NOT NULL,
  `accDeletion` date DEFAULT NULL,
  `accPass` varchar(255) NOT NULL,
  `accLogin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`idAccount`, `accName`, `accSurname`, `accBirthDate`, `accIsActive`, `accCreation`, `accDeletion`, `accPass`, `accLogin`) VALUES
(1, 'administrator', '', '0000-00-00', 1, '2025-05-23', NULL, '123', 'admin'),
(3, 'Mateusz', 'Rzymowski', '2002-09-27', 1, '2025-05-23', NULL, 'mati', 'mati'),
(4, 'Adrian', 'Kuc', '2002-03-18', 1, '2025-05-23', NULL, 'kuc', 'adrian');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `accroles`
--

CREATE TABLE `accroles` (
  `idAR` int(11) NOT NULL,
  `acc_idAccount` int(11) NOT NULL,
  `roles_idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `accroles`
--

INSERT INTO `accroles` (`idAR`, `acc_idAccount`, `roles_idRole`) VALUES
(1, 1, 1),
(4, 4, 3),
(7, 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `idReservation` int(11) NOT NULL,
  `resDate` date NOT NULL,
  `resPayment` int(11) DEFAULT NULL,
  `resPrice` int(11) NOT NULL,
  `resIsActive` int(11) NOT NULL,
  `rooms_idRoom` int(11) NOT NULL,
  `vouchers_idVoucher` int(11) NOT NULL,
  `accounts_idAccount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `idRole` int(11) NOT NULL,
  `roleName` varchar(25) NOT NULL,
  `roleIsActive` tinyint(1) NOT NULL,
  `roleCreation` date NOT NULL,
  `roleDeletion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRole`, `roleName`, `roleIsActive`, `roleCreation`, `roleDeletion`) VALUES
(1, 'admin', 1, '2025-05-25', NULL),
(2, 'pracownik', 1, '2025-05-25', NULL),
(3, 'klient', 1, '2025-05-25', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rooms`
--

CREATE TABLE `rooms` (
  `idRoom` int(11) NOT NULL,
  `roomName` varchar(25) NOT NULL,
  `roomDescription` varchar(500) DEFAULT NULL,
  `roomPrice` int(11) NOT NULL,
  `roomCreation` date NOT NULL,
  `roomDeletion` date DEFAULT NULL,
  `roomIsActive` tinyint(1) NOT NULL,
  `roomCover` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`idRoom`, `roomName`, `roomDescription`, `roomPrice`, `roomCreation`, `roomDeletion`, `roomIsActive`, `roomCover`) VALUES
(1, 'Wrota Tajemnic', 'Przejdź przez wrota i wkrocz w tajemniczy świat i rozwiąż łamiące umysł zagadki. Wciel się w role poszukiwaczy przygód szukających skarbu z mitycznej legendy!', 79, '2025-05-25', NULL, 1, 1),
(2, 'Podwodny Statek', 'Pogłoski okazały się prawdą i znalazłeś się z bandą w niedawno zatopionej łodzi straszliwego pirata, który siał postrach po 7 morzach i jesteście zdeterminowani do złamania szyfru i dotarcia do jego wielkiego skarbu! ', 89, '2025-05-13', NULL, 1, 2),
(3, 'Baza Księżycowa', 'W tej wyprawie udasz się w podróż na księżyc przy użyciu najnowocześniejszej rakiety Astrono V. Przy tej futurystycznej misji będziesz używał przyszłościowych narzędzi. chodzą pogłoski, że widziano tam Obce organizmy więc BĄDŹ UWAŻNY!', 129, '2025-04-09', NULL, 1, 6),
(4, 'Klątwa Faraona', 'Podczas eksploracji starożytnych piramid w celu odnalezienia sekretów Faraonów popełniliście jeden błąd... ktoś z was zabrał co nie należało do niech. Zmagajcie się z uciekającym tlenem w krypcie i ucieknijcie zanim stanie się waszym grobowcem.', 99, '2024-07-17', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vouchers`
--

CREATE TABLE `vouchers` (
  `idVoucher` int(11) NOT NULL,
  `voName` varchar(25) NOT NULL,
  `voAmount` int(11) NOT NULL,
  `voIsActive` tinyint(1) NOT NULL,
  `voCreation` date NOT NULL,
  `voDeletion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`idAccount`);

--
-- Indeksy dla tabeli `accroles`
--
ALTER TABLE `accroles`
  ADD PRIMARY KEY (`idAR`),
  ADD KEY `accro_acc` (`acc_idAccount`),
  ADD KEY `accro_roles` (`roles_idRole`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `res_rooms` (`rooms_idRoom`),
  ADD KEY `res_vo` (`vouchers_idVoucher`),
  ADD KEY `res_acc` (`accounts_idAccount`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indeksy dla tabeli `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`idRoom`);

--
-- Indeksy dla tabeli `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`idVoucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `idAccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `accroles`
--
ALTER TABLE `accroles`
  MODIFY `idAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `idRoom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `idVoucher` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accroles`
--
ALTER TABLE `accroles`
  ADD CONSTRAINT `accro_acc` FOREIGN KEY (`acc_idAccount`) REFERENCES `accounts` (`idAccount`),
  ADD CONSTRAINT `accro_roles` FOREIGN KEY (`roles_idRole`) REFERENCES `roles` (`idRole`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `res_acc` FOREIGN KEY (`accounts_idAccount`) REFERENCES `accounts` (`idAccount`),
  ADD CONSTRAINT `res_rooms` FOREIGN KEY (`rooms_idRoom`) REFERENCES `rooms` (`idRoom`),
  ADD CONSTRAINT `res_vo` FOREIGN KEY (`vouchers_idVoucher`) REFERENCES `vouchers` (`idVoucher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
