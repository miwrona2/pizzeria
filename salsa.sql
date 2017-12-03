-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lis 2017, 20:55
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `00094186_salsa`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `additions`
--

CREATE TABLE `additions` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ingredients` text NOT NULL,
  `price` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `additions`
--

INSERT INTO `additions` (`id`, `name`, `ingredients`, `price`) VALUES
(1, 'Aglio', 'Płaskie pieczywo na bazie ciasta do pizzy, skropione olejem czosnkowym, posypane rozmarynem i solą morską', 8.00),
(2, 'Focaccia', 'Puszyste pieczywo podane z sosem pomidorowym\r\n', 7.00),
(3, 'Chleb Napoli', 'Ciasto do pizzy upieczone z sosem pomidorowym, anchoise, kaparami, czarnymi olliwkami, oliwą, posypane natką pietruszki', 9.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `drinks`
--

CREATE TABLE `drinks` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ingredients` text NOT NULL,
  `price` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `ingredients`, `price`) VALUES
(1, 'Pepsi', '0,5l', 5.00),
(2, 'Fanta', '0,5l', 5.00),
(3, 'Nestea', '0,5l', 6.00),
(4, 'Woda Mineralna Niegazowana', '0,5l', 4.00),
(5, 'Woda Mineralna Gazowana', '0,5l', 4.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`) VALUES
(1, 'example@gmail.com'),
(9, 'mail1@gmail.com'),
(10, 'mail@gmail.com'),
(12, 'mail@pollub.edu.pl'),
(16, 'dziala@gmail.com'),
(17, 'mail3@gmail.com'),
(18, 'mail@wp.pl'),
(19, 'todziala@gmail.com'),
(20, 'michalaMAIL@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `nickname` varchar(255) NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `opinions`
--

INSERT INTO `opinions` (`id`, `content`, `rate`, `modified`, `nickname`, `test`) VALUES
(2, 'wszystko ok :)', 2, '2017-06-14 00:00:00', 'adam', 0),
(96, 'komentarz', 5, '2017-09-29 15:18:00', 'nick', 0),
(97, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet mollis nibh. Nullam a sem urna. Nam et metus tincidunt, imperdiet eros at, porta neque. Etiam posuere auctor luctus. Phasellus sit amet sapien quis nibh suscipit ornare a viverra est. Donec eu posuere neque, sit amet dictum eros. Proin a libero dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas accumsan, dui eget sagittis placerat, elit tellus bibendum est, eu bibendum nulla libero eu risus. Morbi eu nulla augue. Curabitur porta interdum turpis, eget faucibus odio porta a.', 4, '2017-10-02 11:31:45', 'michal', 0),
(100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet mollis nibh. Nullam a sem urna. Nam et metus tincidunt, imperdiet eros at, porta neque. Etiam posuere auctor luctus. Phasellus sit amet sapien quis nibh suscipit ornare a viverra est. Donec eu posuere neque, sit amet dictum eros. Proin a libero dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas accumsan, dui eget sagittis placerat, elit tellus bibendum est, eu bibendum nulla libero eu risus. Morbi eu nulla augue. Curabitur porta interdum turpis, eget faucibus odio porta a.', 2, '2017-10-04 12:44:34', 'nick', 0),
(104, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet mollis nibh. Nullam a sem urna. Nam et metus tincidunt, imperdiet eros at, porta neque. Etiam posuere auctor luctus. Phasellus sit amet sapien quis nibh suscipit ornare a viverra est. Donec eu posuere neque, sit amet dictum eros. Proin a libero dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas accumsan, dui eget sagittis placerat, elit tellus bibendum est, eu bibendum nulla libero eu risus. Morbi eu nulla augue. Curabitur porta interdum turpis, eget faucibus odio porta a.', 3, '2017-11-16 16:19:33', 'Autor', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pastas`
--

CREATE TABLE `pastas` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ingredients` text NOT NULL,
  `price` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pastas`
--

INSERT INTO `pastas` (`id`, `name`, `ingredients`, `price`) VALUES
(1, 'Spaghetti Bolognese', 'Makaron Spaghetti, Ragu (Wołowina, Wieprzowina, Koncentrat Pomidorowy, Mieszana Warzyw, Czerwone Wino, Bulion, Mleko), Natka Pietruszki, Bazylia', 15.00),
(2, 'Penne Arrabiata', 'Makaron Penne, Sos Pomidorowy, Olej Czosnkowy, Chilli, Pomidory Koktajlowe, Natka Pietruszki', 16.00),
(3, 'Strozzpreti Roberto', 'Makaron Strozapretti, Kiełbasa Luganega, Pancetta, Szpinak, Chilli, Parmezan, Natka Pietruszki', 15.00),
(4, 'Strozzapreti Pollo Picante', 'Makaron Strozapretti, Sos Pomidorowy, Pierś z Kurczaka, Sos Ostry Frank''s, Chilli, Natka Pietruszki', 15.00),
(5, 'Linguine Pescatore', 'Makaron Linguine, Sos Pomidorowy, Krewetki Królewskie, Małże, Pierścienie z Kalmarów, Białe Wino, Bulion, Olej Czosnkowy', 15.00),
(6, 'Ravioli', 'Pierożki Ravioli, Sos Pomidorowy, Pomidory Koktajlowe, Olej Czosnkowy, Bulion Warzywny, Zielone Pesto, Bazylia  ', 15.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ingredients` text NOT NULL,
  `sprice` float(9,2) NOT NULL,
  `bprice` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pizzas`
--

INSERT INTO `pizzas` (`id`, `name`, `ingredients`, `sprice`, `bprice`) VALUES
(1, 'Margherita', 'Sos, Ser, Bazylia ', 16.00, 22.00),
(2, 'Cotto', 'Sos, Ser, Szynka Cotto, Pieczarki, Oliwki', 19.00, 26.00),
(3, 'Funghi', 'Sos, Ser, Pieczarki', 18.00, 24.00),
(4, 'Parma', 'Sos, Mozzarella, Szynka parmeńska, Rukola', 20.00, 28.00),
(5, 'Puttanesca', 'Sos, Mozzarella, Anchoise, Kapary, Oliwki, ', 20.00, 28.00),
(6, 'Aspargi', 'Sos, Mozzarella, Szynka Cotto, Szparagi, Płatki Chilli, Bazylia', 21.00, 30.00),
(7, 'Frutti di mare ', 'Sos, Mozzarella, Krewetki, Pierścienie z Kalmarów, Płatki chilli', 21.00, 31.00),
(8, 'Formaggi', 'Sos, Mozzarella, Ser kozi, Pomidory suszone, Salsa verde', 23.00, 33.00),
(9, 'Carne Toscana ', 'Sos, Mozzarella, Kiełbasa Salsiccia, Kulki mięsne, Natka pietruszki', 23.00, 33.00),
(10, 'Rossa', 'Sos, Ser, Kiełbasa Salsiccia, Peperoncini, Cebulki prażone , Chilli, Szałwia', 23.00, 33.00),
(11, 'Vesuvio', 'Sos, Mozzarella, Kiełbasa ‘Nduja , Pepperoni, Chilli, Papryka wędzona', 25.00, 36.00),
(12, 'Napoli', 'Sos, Mozzarella, Oliwki, Szynka parmeńska, Parmezan, Pomidory koktajlowe', 23.00, 33.00),
(13, 'Campagna', ' Sos, Mozzarella, Pieczarki, Cebulki prażone, Pesto z orzechów włoskich, Szczypiorek', 25.00, 36.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `salads`
--

CREATE TABLE `salads` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ingredients` text NOT NULL,
  `price` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `salads`
--

INSERT INTO `salads` (`id`, `name`, `ingredients`, `price`) VALUES
(1, 'Sałatka Grecka ', 'Mix Sałat, Pomidory, Ser Feta, Oliwki', 14.00),
(2, 'Tricolore', 'Avokado, Buffalo Mozarella, Pomidory, Bazylia, Oliwa\n', 9.00),
(3, 'Sałatka Cezar', 'Mix Sałat, Pierś z Kurczaka, Grzanki, Sos Czosnkowy, Parmezan', 16.00),
(4, 'Sałatka z Łososiem', 'Mix Sałat, Łosoś Wędzony, Avokado, Pomidory Szuszone, Pomidory Koktajlowe, Rzodkiewka, Słonecznik Prażony\n', 18.00),
(5, 'Sałatka Milano', 'Mix Sałat, Grillowany Rostbef, Pomidory Koktajlowe, Parmezan, Grzanki\n', 18.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sauces`
--

CREATE TABLE `sauces` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ingredients` text NOT NULL,
  `price` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `sauces`
--

INSERT INTO `sauces` (`id`, `name`, `ingredients`, `price`) VALUES
(1, 'Sos Czosnkowy', '', 2.00),
(2, 'Sos Koperkowy', '', 2.00),
(3, 'Sos Ostry', '', 2.00),
(4, 'Sos Mieszany', '', 2.00);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `additions`
--
ALTER TABLE `additions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pastas`
--
ALTER TABLE `pastas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salads`
--
ALTER TABLE `salads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sauces`
--
ALTER TABLE `sauces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `additions`
--
ALTER TABLE `additions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT dla tabeli `pastas`
--
ALTER TABLE `pastas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `salads`
--
ALTER TABLE `salads`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `sauces`
--
ALTER TABLE `sauces`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
