-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Maj 2022, 19:20
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
  `login` varchar(16) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `haslo` varchar(41) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `nazwa` varchar(48) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
  `login` varchar(16) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `haslo` varchar(41) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `imie` varchar(48) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `nazwisko` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id`, `login`, `haslo`, `imie`, `nazwisko`) VALUES
(1, 'test', '*8642B73DB54C4B27F0374E0C3872DF25E7A88290', 'Stefan', 'Burczymucha'),
(2, 'dwa', '*4CB947971FACB7AB4E93FAF2078DD186A4C91A46', 'Hermenegilda', 'Kociubińska'),
(3, 'User', '*2E91BC4944863EF5544D42B70FDBBA7B2BCC090B', 'Jan ', 'Iksiński'),
(4, 'dudek', '*2688026025842C926CE5E850B45AD5EDCC1EB577', 'Andrzej', 'Duda');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id` int(11) NOT NULL,
  `id_k` int(11) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  `ilosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `dzien` int(11) DEFAULT NULL,
  `danie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
  `nazwa` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cena` float DEFAULT NULL,
  `zapas` int(11) DEFAULT NULL,
  `promocja` int(11) DEFAULT NULL,
  `zdjecie` varchar(75) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `cena`, `zapas`, `promocja`, `zdjecie`) VALUES
(1, 'zeton pierwsze danie', 5, 97, 0, 'zupa'),
(2, 'zeton drugie danie', 8, 47, 0, 'danie'),
(3, 'zeton drugie danie z sur', 10, 48, 0, 'daniesur'),
(4, 'snickers', 5, 7, 20, 'snickers');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `id_k` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `odebrano` enum('tak','nie') COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `anulowano` enum('tak','nie') COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `uwagi` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `koszt` float NOT NULL,
  `kod_odbioru` char(4) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT substr(rand(),3,4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id`, `id_k`, `data`, `odebrano`, `anulowano`, `uwagi`, `koszt`, `kod_odbioru`) VALUES
(1, 4, '2022-05-07', 'nie', 'nie', 'Tak', 4, '4670'),
(2, 4, '2022-05-07', 'nie', 'nie', '', 54, '9532'),
(3, 4, '2022-05-08', 'nie', 'nie', '', 4, '0120');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawartosc`
--

CREATE TABLE `zawartosc` (
  `id` int(11) NOT NULL,
  `id_z` int(11) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  `ilosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Zrzut danych tabeli `zawartosc`
--

INSERT INTO `zawartosc` (`id`, `id_z`, `id_p`, `ilosc`) VALUES
(1, 1, 4, 1),
(2, 2, 3, 2),
(3, 2, 2, 3),
(4, 2, 1, 2),
(5, 3, 4, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zawartosc`
--
ALTER TABLE `zawartosc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
