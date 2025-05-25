-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 25, 2025 at 03:50 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

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
  `roomIsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
  MODIFY `idAR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `idRoom` int(11) NOT NULL AUTO_INCREMENT;

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
