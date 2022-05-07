-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Maj 2022, 19:53
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lacznik-zsl`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administracja`
--

CREATE TABLE `administracja` (
  `ID` int(11) NOT NULL,
  `login` varchar(16) DEFAULT NULL,
  `haslo` varchar(41) DEFAULT NULL,
  `nazwa` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `administracja`
--

INSERT INTO `administracja` (`ID`, `login`, `haslo`, `nazwa`) VALUES
(1, 'Pioxini', '********', 'Piotr'),
(2, 'jj22', 'NiePowiem', 'Jacek'),
(3, 'Renia', 'haslo', 'Renata'),
(4, 'RybazPolski', 'haslasapodwojniehashowane', 'Ryba');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `login` varchar(16) NOT NULL,
  `haslo` varchar(41) NOT NULL,
  `imie` varchar(48) DEFAULT NULL,
  `nazwisko` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id`, `login`, `haslo`, `imie`, `nazwisko`) VALUES
(1, 'test', 'Niezgadniesz', 'Stefan', 'Burczymucha'),
(2, 'dwa', '1234', 'Hermenegilda', 'Kociubińska'),
(3, 'User', '*2E91BC4944863EF5544D42B70FDBBA7B2BCC090B', 'Jan ', 'Iksiński');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id` int(11) NOT NULL COMMENT 'Żeby dało się modyfikować w phpMyAdmin',
  `id_k` int(11) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  `ilosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id`, `id_k`, `id_p`, `ilosc`) VALUES
(17, 3, 4, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL,
  `dzien` int(11) DEFAULT NULL,
  `danie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `menu`
--

INSERT INTO `menu` (`id`, `nazwa`, `dzien`, `danie`) VALUES
(1, 'kotlet mielony z ziemniakami', 1, 2),
(2, 'rosół', 1, 1),
(3, 'spaghetti bolognese', 3, 2),
(4, 'panierowany filet z kurczaka z ziemniakami', 4, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL,
  `cena` float DEFAULT NULL,
  `zapas` int(11) DEFAULT NULL,
  `promocja` int(11) DEFAULT NULL,
  `zdjecie` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `cena`, `zapas`, `promocja`, `zdjecie`) VALUES
(1, 'zeton pierwsze danie', 5, 100, 0, 'zupa'),
(2, 'zeton drugie danie', 8, 50, 0, 'danie'),
(3, 'zeton drugie danie z sur', 10, 50, 0, 'daniesur'),
(4, 'snickers', 5, 10, 20, 'snickers');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `id_k` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `odebrano` enum('tak','nie') DEFAULT NULL,
  `anulowano` enum('tak','nie') DEFAULT NULL,
  `uwagi` text NOT NULL,
  `koszt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawartosc`
--

CREATE TABLE `zawartosc` (
  `id` int(11) NOT NULL,
  `id_z` int(11) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  `ilosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administracja`
--
ALTER TABLE `administracja`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zawartosc`
--
ALTER TABLE `zawartosc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `administracja`
--
ALTER TABLE `administracja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Żeby dało się modyfikować w phpMyAdmin', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zawartosc`
--
ALTER TABLE `zawartosc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
