-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Lip 2022, 13:44
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `aurora_creation_task`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(2500) NOT NULL,
  `status` enum('-1','1') DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `status`, `category_id`, `author`) VALUES
(21, 'A strange problem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae porta ex, sed finibus tellus. Vestibulum congue ipsum ut lorem faucibus, in volutpat arcu finibus. Vestibulum vel volutpat ante. Phasellus rutrum sapien vitae lacus vestibulum volutpat. Aliquam erat volutpat. Vestibulum diam neque, dapibus ac condimentum nec, volutpat sagittis odio. Phasellus dignissim, lacus quis maximus pharetra, ex sem finibus turpis, id lacinia enim urna eu nulla. Etiam et sapien non nulla tincidunt non', '-1', 1, 'admin'),
(22, 'How to do things?', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sagittis metus congue laoreet mollis. Donec lobortis tincidunt massa, quis lacinia augue blandit ac. Praesent accumsan posuere elit, quis lobortis mi tempus vel. Maecenas nec orci nec augue ultricies pretium sit amet sed nisi. Mauris ligula justo, molestie a dignissim vitae, molestie commodo neque. Suspendisse potenti. Proin placerat urna nulla, vitae convallis ipsum pretium ac. Nullam semper sapien sem, ac bibendum risus elementum dui.', '1', 4, 'user1'),
(23, 'Bedroom cleaning tutorial', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sapien elit, scelerisque nec laoreet id, eleifend in dolor. Nulla facilisi. Curabitur tincidunt ipsum vitae dolor eleifend aliquam. Donec et nulla nisl. Morbi eu eros nec leo vestibulum lobortis eu et lorem. Maecenas pharetra consectetur orci vitae accumsan. Duis fermentum lectus sit amet bibendum suscipit. Suspendisse vel tortor tempus, eleifend nisl a, ultricies leo. Nulla facilisi. Integer commodo scelerisque velit vel mollis. Aenean suscipit quam congue lacus dapibus blandit.\r\n\r\nNullam commodo maximus felis sit amet egestas. Pellentesque eget erat est. Mauris aliquam elit quis magna laoreet, et sagittis diam accumsan. Sed varius lorem ante, quis hendrerit ligula congue id. Quisque vel risus ac lacus rutrum ultrices. Sed efficitur.', '-1', 3, 'user1'),
(25, 'Do you need a gardener?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a fringilla quam. Quisque imperdiet vestibulum sapien, non blandit orci pretium sit amet. Maecenas maximus elit ut metus mattis, vitae sollicitudin dolor lobortis. Morbi sodales tincidunt neque eu malesuada. Sed tempor tortor vitae lectus dictum, quis semper neque ornare. Nullam sed semper ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed lorem risus, semper a pellentesque eu, rutrum a nisl. Aenean ac lectus at neque semper feugiat non tincidunt purus. Fusce mollis in nisi id pharetra. Mauris eget rutrum est. Nunc feugiat interdum finibus. Nam sit amet tortor justo. In dignissim nulla sit amet augue consequat, id gravida risus maximus. Donec sagittis metus non est pellentesque consectetur. Fusce venenatis bibendum lorem ac auctor. Vestibulum volutpat dui eros, at maximus erat interdum eu. Ut porttitor lobortis enim id ultricies. Praesent ornare blandit molestie. Etiam a scelerisque mauris, quis ultrices ipsum. Nullam ultricies ipsum vitae eros commodo suscipit. Nullam hendrerit nulla eget laoreet eleifend. Integer quis nisl auctor augue condimentum ullamcorper at quis mauris. Praesent dui purus, sollicitudin non turpis eu, pretium egestas massa. Pellentesque eleifend aenean.', '1', 2, 'user2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Kitchen'),
(2, 'Garden'),
(3, 'Bedroom'),
(4, 'Bathroom');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `login` varchar(16) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`login`, `password`, `email`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.pl'),
('user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 'user@user.pl'),
('user2', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', 'user2@user2.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author` (`author`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
