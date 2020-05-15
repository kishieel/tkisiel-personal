-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql32.mydevil.net
-- Czas generowania: 01 Kwi 2019, 16:26
-- Wersja serwera: 5.7.21-20-log
-- Wersja PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `m11573_besian`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `allegro`
--

CREATE TABLE `allegro` (
  `auction_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `allegro`
--

INSERT INTO `allegro` (`auction_id`, `item_id`, `cena`, `owner_id`) VALUES
(0, 7, 123, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `enemies`
--

CREATE TABLE `enemies` (
  `idprzeciwnika` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `maxhp` int(11) NOT NULL,
  `maxmana` int(11) NOT NULL,
  `basespeed` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `item1` int(11) NOT NULL,
  `item2` int(11) NOT NULL,
  `item3` int(11) NOT NULL,
  `AI` text COLLATE utf8_polish_ci NOT NULL,
  `lokalizacja` int(11) NOT NULL,
  `expreward` int(11) NOT NULL,
  `grafika` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `enemies`
--

INSERT INTO `enemies` (`idprzeciwnika`, `nazwa`, `min`, `max`, `maxhp`, `maxmana`, `basespeed`, `lvl`, `item1`, `item2`, `item3`, `AI`, `lokalizacja`, `expreward`, `grafika`) VALUES
(1, 'Bober', 3, 6, 80, 20, 80, 3, 1, 2, 3, 'Bober.php', 0, 0, 'Bober.png'),
(2, 'Wilk', 12, 20, 140, 60, 120, 6, 1, 2, 3, 'Wilk.php', 0, 20, 'Wilk.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `params` varchar(512) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`itemID`, `name`, `type`, `params`, `img`) VALUES
(1, 'Drewniana Pałka', 'weapon', '{\"Min. Obrażenia \": 1,\"Max. Obrażenia \": 5,\"Wymagany poziom\": 1}', 'item1'),
(2, 'Kij Samobij', 'weapon', '{\r\n  \"Min. Obrażenia \": 3,\r\n  \"Max. Obrażenia \": 17,\r\n  \"Siła magiczną\": 5,\r\n  \"Wymagany poziom\": 3\r\n}', 'item2'),
(3, 'Laska Podporucznika', 'weapon', '{\r\n  \"Min. Obrażenia \": 21,\r\n  \"Max. Obrażenia \": 37,\r\n  \"Siła magiczną\": 13,\r\n  \"Wymagany poziom\": 5\r\n}', 'item3'),
(4, 'Hełm Thanosa', 'helmet', '{\r\n  \"Pancerz\": 5,\r\n  \"Życie\": 15,\r\n  \"Mana\": 7,\r\n  \"Bonus do szybkości\": 20,\r\n  \"Wymagany poziom\": 3\r\n}', 'item4'),
(5, 'Orcza Czacha', 'helmet', '{\r\n  \"Pancerz\": 7,\r\n  \"Życie\": 25,\r\n  \"Mana\": 0,\r\n  \"Bonus do szybkości\": 10,\r\n  \"Wymagany poziom\": 4\r\n}', 'item5'),
(6, 'Pierścionek Zaręczynowy', 'talisman', '{\r\n  \"Pancerz\": 1,\r\n  \"Życie\": 13,\r\n  \"Mana\": 2,\r\n  \"Bonus do szybkości\": 12,\r\n  \"Wymagany poziom\": 2\r\n}', 'item6'),
(7, 'Sokola Bransoleta', 'talisman', '{\r\n  \"Pancerz\": 7,\r\n  \"Życie\": 5,\r\n  \"Mana\": 20,\r\n  \"Bonus do szybkości\": 4,\r\n  \"Wymagany poziom\": 6\r\n}', 'item7'),
(8, 'Skarabeusz', 'talisman', '{\r\n  \"Pancerz\": 2,\r\n  \"Życie\": 30,\r\n  \"Mana\": 7,\r\n  \"Bonus do szybkości\": 6,\r\n  \"Wymagany poziom\": 8\r\n}', 'item8'),
(9, 'Tarcza z Tokarki', 'shield', '{\r\n  \"Pancerz\": 2,\r\n  \"Życie\": 30,\r\n  \"Mana\": 7,\r\n  \"Bonus do szybkości\": 6,\r\n  \"Wymagany poziom\": 8\r\n}', 'item9'),
(10, 'Stare drzwi', 'shield', '{\r\n  \"Pancerz\": 7,\r\n  \"Życie\": 3,\r\n  \"Mana\": 20,\r\n  \"Bonus do szybkości\": 3,\r\n  \"Wymagany poziom\": 3\r\n}', 'item10'),
(11, 'Koło od wozu', 'shield', '{\r\n  \"Pancerz\": 2,\r\n  \"Życie\": 13,\r\n  \"Mana\": 4,\r\n  \"Bonus do szybkości\": -10,\r\n  \"Wymagany poziom\": 6\r\n}', 'item11'),
(12, 'Cyplowa Kolczuga', 'armor', '{\r\n  \"Pancerz\": 13,\r\n  \"Życie\": 3,\r\n  \"Mana\": 4,\r\n  \"Bonus do szybkości\": 2,\r\n  \"Wymagany poziom\": 2\r\n}', 'item12'),
(13, 'Smocza Skóra', 'armor', '{\r\n  \"Pancerz\": 12,\r\n  \"Życie\": 5,\r\n  \"Mana\": 10,\r\n  \"Bonus do szybkości\":3,\r\n  \"Wymagany poziom\": 4\r\n}', 'item13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `player_eq`
--

CREATE TABLE `player_eq` (
  `playerID` int(11) NOT NULL,
  `f1` int(11) NOT NULL DEFAULT '0',
  `f2` int(11) NOT NULL DEFAULT '0',
  `f3` int(11) NOT NULL DEFAULT '0',
  `f4` int(11) NOT NULL DEFAULT '0',
  `f5` int(11) NOT NULL DEFAULT '0',
  `f6` int(11) NOT NULL DEFAULT '0',
  `f7` int(11) NOT NULL DEFAULT '0',
  `f8` int(11) NOT NULL DEFAULT '0',
  `f9` int(11) NOT NULL DEFAULT '0',
  `f10` int(11) NOT NULL DEFAULT '0',
  `f11` int(11) NOT NULL DEFAULT '0',
  `f12` int(11) NOT NULL DEFAULT '0',
  `f13` int(11) NOT NULL DEFAULT '0',
  `f14` int(11) NOT NULL DEFAULT '0',
  `f15` int(11) NOT NULL DEFAULT '0',
  `f16` int(11) NOT NULL DEFAULT '0',
  `f17` int(11) NOT NULL DEFAULT '0',
  `f18` int(11) NOT NULL DEFAULT '0',
  `f19` int(11) NOT NULL DEFAULT '0',
  `f20` int(11) NOT NULL DEFAULT '0',
  `f21` int(11) NOT NULL DEFAULT '0',
  `f22` int(11) NOT NULL DEFAULT '0',
  `f23` int(11) NOT NULL DEFAULT '0',
  `f24` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `player_eq`
--

INSERT INTO `player_eq` (`playerID`, `f1`, `f2`, `f3`, `f4`, `f5`, `f6`, `f7`, `f8`, `f9`, `f10`, `f11`, `f12`, `f13`, `f14`, `f15`, `f16`, `f17`, `f18`, `f19`, `f20`, `f21`, `f22`, `f23`, `f24`) VALUES
(1, 1, 2, 0, 0, 4, 0, 0, 8, 10, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 1, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 1, 10, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `player_location`
--

CREATE TABLE `player_location` (
  `playerID` int(11) NOT NULL,
  `loc100` varchar(512) NOT NULL DEFAULT '{   "type": "city",   "enabled": true,   "location": "loc100" }',
  `loc101` varchar(512) NOT NULL DEFAULT '{   "type": "exp",   "enabled": false,   "location": "loc101", "guardian": 1 }',
  `loc102` varchar(512) NOT NULL DEFAULT '{   "type": "exp",   "enabled": true,   "location": "loc102" }',
  `loc103` varchar(512) NOT NULL DEFAULT '{   "type": "city",   "enabled": false,   "location": "loc103",   "dependence": [     "loc102",     "loc101"   ] }',
  `loc104` varchar(512) NOT NULL DEFAULT '{   "type": "exp",   "enabled": false,   "location": "loc104",   "guardian": 2 }',
  `loc105` varchar(512) NOT NULL DEFAULT '{   "type": "elit",   "enabled": false,   "location": "loc105",   "dependence": [     "loc106",     "loc107"   ] }',
  `loc106` varchar(512) NOT NULL DEFAULT '{   "type": "exp",   "enabled": false,   "location": "loc106",   "guardian": 3 }',
  `loc107` varchar(512) NOT NULL DEFAULT '{   "type": "exp",   "enabled": false,   "location": "loc107",   "guardian": 4 }'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `player_location`
--

INSERT INTO `player_location` (`playerID`, `loc100`, `loc101`, `loc102`, `loc103`, `loc104`, `loc105`, `loc106`, `loc107`) VALUES
(1, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }'),
(2, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }'),
(3, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }'),
(4, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }'),
(5, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }'),
(6, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }'),
(7, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }'),
(8, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }'),
(9, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }'),
(10, '{   \"type\": \"city\",   \"enabled\": true,   \"location\": \"loc100\" }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc101\", \"guardian\": 1 }', '{   \"type\": \"exp\",   \"enabled\": true,   \"location\": \"loc102\" }', '{   \"type\": \"city\",   \"enabled\": false,   \"location\": \"loc103\",   \"dependence\": [     \"loc102\",     \"loc101\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc104\",   \"guardian\": 2 }', '{   \"type\": \"elit\",   \"enabled\": false,   \"location\": \"loc105\",   \"dependence\": [     \"loc106\",     \"loc107\"   ] }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc106\",   \"guardian\": 3 }', '{   \"type\": \"exp\",   \"enabled\": false,   \"location\": \"loc107\",   \"guardian\": 4 }');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `player_set`
--

CREATE TABLE `player_set` (
  `playerID` int(11) NOT NULL,
  `helmet` int(11) NOT NULL DEFAULT '0',
  `weapon` int(11) NOT NULL DEFAULT '0',
  `armor` int(11) NOT NULL DEFAULT '0',
  `shield` int(11) NOT NULL DEFAULT '0',
  `talisman` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `player_set`
--

INSERT INTO `player_set` (`playerID`, `helmet`, `weapon`, `armor`, `shield`, `talisman`) VALUES
(1, 5, 1, 13, 9, 7),
(2, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0),
(5, 0, 1, 12, 10, 0),
(6, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0),
(8, 0, 1, 0, 10, 0),
(9, 0, 1, 0, 10, 0),
(10, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nick` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT '1',
  `exp` int(11) NOT NULL DEFAULT '0',
  `Wola` int(11) NOT NULL DEFAULT '5',
  `Duch` int(11) NOT NULL DEFAULT '5',
  `Umysl` int(11) NOT NULL DEFAULT '5',
  `skill1` varchar(25) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Kamienna skora',
  `skill2` varchar(25) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Miazdzacy cios',
  `skill3` varchar(25) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Podwojne uderzenie',
  `cash` int(11) NOT NULL DEFAULT '2137'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `nick`, `password`, `lvl`, `exp`, `Wola`, `Duch`, `Umysl`, `skill1`, `skill2`, `skill3`, `cash`) VALUES
(1, 'Testowy1', '$2y$10$SHsSLAks4/nLCSuA/TEQIu8shzdiRKwjnO2qPXZN9cdgQGgKuwP1O', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 804),
(2, 'Testowy2', '$2y$10$cgVLbv9X.4g7fjtCXdI7xeKogDvbFYh9aPYSdZDnYXy26YlP7vOlC', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 2248),
(3, 'Testowy3', '$2y$10$UHqPe4dDEHUj4Hii5tvKaO2tYvLo3dEY59w2wh9aDd1ZXbrPOpkVW', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 3359),
(4, 'Testowy4', '$2y$10$qz2NhDiypvCP/XIrdEClEeWQgvrKAHHj9Ff3Z9KqGcvpvJuUhC3sm', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 2149),
(5, 'Testowy8', '$2y$10$QyPpwki44DxbxFz.EKdif.S/qGb4NM6mqPLkOnR/4FysL.Bld01D.', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 2137),
(6, 'Testowy69', '$2y$10$yY74wXPHSI46UcEH7iPtvu2kz4/E9FsCVGsbxJbXzSa7UL4wyRIqq', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 2137),
(7, 'Testowy10', '$2y$10$GTVPIrCataK5YSPHhuemQunlGzvC12/kglN/nhwBTslcjFmQXDTOC', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 2137),
(8, 'Wodzu', '$2y$10$58HhFxU/6pJwjP.qKIr1We0j61OX4MWTXiI7o6iTxIxEP0WjYnMCa', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 2137),
(9, 'Bzyk', '$2y$10$U3iOxs37CuuMsw/99gWnxerjIPQyAN8SWZE2TiYpAVNjSHU3Waiji', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 2125),
(10, 'Alfa', '$2y$10$ftFCkY6.exOOvTJmmLVykuGyH5CwKKeY6sbggQj3rjTiB57uZ/s9u', 1, 0, 5, 5, 5, 'Kamienna skora', 'Miazdzacy cios', 'Podwojne uderzenie', 2137);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `player_eq`
--
ALTER TABLE `player_eq`
  ADD PRIMARY KEY (`playerID`);

--
-- Indeksy dla tabeli `player_location`
--
ALTER TABLE `player_location`
  ADD PRIMARY KEY (`playerID`);

--
-- Indeksy dla tabeli `player_set`
--
ALTER TABLE `player_set`
  ADD PRIMARY KEY (`playerID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `player_eq`
--
ALTER TABLE `player_eq`
  MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `player_location`
--
ALTER TABLE `player_location`
  MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `player_set`
--
ALTER TABLE `player_set`
  MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
