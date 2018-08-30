-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ago 30, 2018 alle 13:55
-- Versione del server: 10.1.30-MariaDB
-- Versione PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `footballleagues`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `league`
--

CREATE TABLE `league` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `league`
--

INSERT INTO `league` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Premier league', '2018-08-25 12:43:02', '2018-08-25 12:44:51'),
(2, 'Champions league', '2018-08-25 12:43:24', '2018-08-25 12:43:24'),
(3, 'League one', '2018-08-25 12:45:35', '2018-08-25 12:45:35'),
(4, 'League two', '2018-08-25 12:45:48', '2018-08-25 12:45:48'),
(14, 'League three', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'League four', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'League five', '2018-08-25 00:00:00', '2018-08-25 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180825091417');

-- --------------------------------------------------------

--
-- Struttura della tabella `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `league_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `team`
--

INSERT INTO `team` (`id`, `league_id`, `title`, `city`, `web`, `created_at`, `updated_at`) VALUES
(1, 1, 'Manchester City', 'Manchester', 'www.manchestercity.com', '2018-08-25 13:26:19', '2018-08-25 13:26:19'),
(2, 1, 'Manchester Utd', 'Manchester', 'www.tottenham.com', '2018-08-25 13:27:00', '2018-08-25 13:27:00'),
(3, 1, 'Tottenam', 'London', 'www.tottenam.com', '2018-08-25 13:31:18', '2018-08-25 13:31:40'),
(4, 1, 'Liverpool', 'Liverpool', 'www.liverpoolteam.com', '2018-08-25 13:32:21', '2018-08-25 13:32:21'),
(5, 1, 'Chelsea', 'London', 'www.chelseafootball.com', '2018-08-25 13:32:54', '2018-08-25 13:32:54'),
(6, 1, 'Arsenal', 'London', 'www.arsenalfootball.com', '2018-08-25 13:33:25', '2018-08-25 13:33:25'),
(7, 1, 'Burnley', 'Burnley', 'www.burnleyfootball.com', '2018-08-25 13:34:02', '2018-08-25 13:34:02'),
(8, 1, 'Everton', 'Everton', 'www.evertonfootball.com', '2018-08-25 13:34:29', '2018-08-25 13:34:29'),
(9, 1, 'Leicester', 'Leicester', 'www.leicesterfootball.com', '2018-08-25 13:34:57', '2018-08-25 13:34:57'),
(10, 1, 'Newcastle', 'New Castle', 'www.newcastlefootball.com', '2018-08-25 13:35:29', '2018-08-25 13:35:29'),
(11, 1, 'Crystal palace', 'Crystal palace', 'www.crystalpalacefootball.com', '2018-08-25 13:36:26', '2018-08-25 13:36:26'),
(12, 1, 'Bournemouth', 'Bourne mouth city', 'www.bournemouthfootball.com', '2018-08-25 13:37:19', '2018-08-25 13:37:19'),
(13, 1, 'West Ham', 'West Ham', 'www.westhamfootball.com', '2018-08-25 13:38:24', '2018-08-25 13:38:24'),
(14, 1, 'Watford', 'Watford', 'www.watfordfootball.com', '2018-08-25 13:38:55', '2018-08-25 13:38:55'),
(15, 1, 'Brighton', 'Brighton', 'www.brightonfootball.com', '2018-08-25 13:39:24', '2018-08-25 13:39:24'),
(16, 1, 'Huddersfield', 'Huddersfield', 'www.huddersfield.com', '2018-08-25 13:39:57', '2018-08-25 13:39:57'),
(17, 1, 'Southampton', 'Southampton', 'www.southamptonfootball.com', '2018-08-25 13:40:31', '2018-08-25 13:40:31'),
(18, 1, 'Swansea', 'Swansea', 'www.swanseafootball.com', '2018-08-25 13:40:58', '2018-08-25 13:40:58'),
(19, 1, 'Stoke', 'Stoke', 'www.stokefootball.com', '2018-08-25 13:41:30', '2018-08-25 13:41:30'),
(20, 1, 'West Brom', 'West Brom', 'www.westbromfootball.com', '2018-08-25 13:42:05', '2018-08-25 13:42:05'),
(21, 2, 'Middlesbrough', 'Middlesbrough', 'www.middlesbroughfootball.com', '2018-08-25 00:00:00', '2018-08-25 00:00:00'),
(22, 2, 'Leeds', 'Leeds', 'www.Leedsfootball.com', '2018-08-25 00:00:00', '2018-08-25 00:00:00'),
(23, 2, 'Bolton', 'Bolton', 'www.boltonfootbacll.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(24, 2, 'Brentford', 'Brentford', 'www.Brentfordfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(25, 2, 'Aston Villa', 'Aston Villa', 'www.AstonVillafootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(26, 2, 'Wigan', 'Wigan', 'www.Wiganfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(27, 2, 'Blackburn', 'Blackburn', 'www.blackburnfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(28, 2, 'Nottingham Forest', 'Nottingham', 'www.nottinghamforestfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(29, 2, 'Derby', 'Derby', 'www.Derbyfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(30, 2, 'Sheffield Utd', 'Sheffield', 'www.SheffieldUtdfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(31, 2, 'Bristol City', 'Bristol', 'www.BristolCityfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(32, 2, 'Millwall', 'Millwall', 'www.Millwallfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(33, 2, 'Norwich', 'Norwich', 'www.Norwichfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(34, 2, 'Hull', 'Hull', 'www.Hullfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(35, 2, 'Sheffield Wed', 'Sheffield Wed', 'www.SheffieldWedfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(36, 2, 'Preston', 'Preston', 'www.Prestonfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(37, 2, 'Rotherham', 'Rotherham', 'www.Rotherhamfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(38, 2, 'Birmingham', 'Birmingham', 'www.Birminghamfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(39, 2, 'Ipswich', 'Ipswich', 'www.Ipswichfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(40, 2, 'Stoke', 'Stoke', 'www.Stokefootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(41, 2, 'Reading', 'Reading', 'www.Readingfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(42, 2, 'QPR', 'QPR', 'www.QPRfootball.com', '2018-08-25 13:31:00', '2018-08-25 13:31:00'),
(43, 3, 'Peterborough United', 'Peterborough', 'www.Peterboroughfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(44, 3, 'Portsmouth', 'Portsmouth', 'www.portsmouthfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(45, 3, 'Barnsley', 'Barnsley', 'www.Barnsleyfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(46, 3, 'Sunderland', 'Sunderland', 'www.Sunderlandfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(47, 3, 'Walsall', 'walsall', 'www.walsallfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(48, 3, 'Fleetwood Town', 'Fleetwood Town', 'www.fleetwoodfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(49, 3, 'Doncaster Rovers', 'Doncaster Rovers', 'www.doncasterroversfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(50, 3, 'Accrington Stanley', 'Accrington Stanley', 'www.accringtonstanleyfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(51, 3, 'Gillingham', 'Gillingham', 'www.gillinghamfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(52, 3, 'Bradford City', 'Bradford', 'www.bradfordcityfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(53, 3, 'Blackpool', 'Blackpool', 'www.blackpoolfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(54, 3, 'AFC Wimbledon', 'London', 'www.afcwimbledonfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(55, 3, 'Southend United', 'Southend', 'www.southendunitedfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(56, 3, 'Charlton Athletic', 'Charlton', 'www.charltonfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(57, 3, 'Luton Town', 'Luton', 'www.Lutonfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(58, 3, 'Coventry City', 'Coventry', 'www.coventrycityfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(59, 3, 'Rochdale', 'Rochdale', 'www.Rochdalefootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(60, 3, 'Scunthorpe United', 'Scunthorpe', 'www.Scunthorpefootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(61, 3, 'Bristol Rovers', 'Bristol', 'www.bristolfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(62, 3, 'Burton Albion', 'Burton', 'www.burtonfootball.com', '2018-08-25 14:00:00', '2018-08-25 14:00:00'),
(63, 4, 'Exeter City', 'Exeter', 'www.Exetercityfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(64, 4, 'Lincoln City', 'Lincoln', 'www.linconlcityfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(65, 4, 'Colchester United', 'Colchester', 'www.colchesterfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(66, 4, 'Stevenage', 'Stevenage', 'www.stevenagefootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(67, 4, 'Milton keynes Dons', 'Milton', 'www.miltonfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(68, 4, 'Carlisle United', 'Carlisle', 'www.carlislefootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(69, 4, 'Swindon Town', 'Swindon', 'www.swindonfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(70, 4, 'Newport County AFC', 'Newport', 'www.newportfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(71, 4, 'Forest Green Rovers', 'Forest Green', 'www.forestgreenfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(72, 4, 'Mansfield Town', 'mansfield', 'www.mansfieldtownfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(73, 4, 'Port Vale', 'Port Vale', 'www.portvalefootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(74, 4, 'Yeovil Town', 'Yeovil Town', 'www.yeovielfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(75, 4, 'Oldham Athletic', 'Oldham', 'www.oldhamathleticfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(76, 4, 'Tranmere Rovers', 'Tranmere', 'www.tranmereroversfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00'),
(77, 4, 'Grimsby Town', 'Grimsby', 'www.grmsbyfootball.com', '2018-08-25 15:00:00', '2018-08-25 15:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_active`) VALUES
(1, 'johndoe', '$2y$13$HFNU.2y8yOvq1Qdzd0FkIu1Oz2a/jbbHzKSGiuNJBht91ATtDt3Hm', 1),
(3, 'johndoeTwo', '$2y$13$gvliZFhAVm2DOjc2346gT.pc8TYgo65qkZx80juyh/VHqLpquUPTq', 1),
(4, 'johndoeDue', '$2y$13$Lizi22Hqukfy38Yu7vakw.NWKSU3SmWDevnZPVmNcbha713HbqfWG', 1),
(11, 'johndoeDueTre', '$2y$13$NtXkdTb2eku6H5LN1z9C8.cmvHZmO34H78OSp.QU9iT0HZ87JUuq.', 1),
(12, 'CommPeople', '$2y$13$lIVarwfg4Ykp3npXb7trYeXXBfy4uQsi8d1QK7h/tVcwolYxnCRlC', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indici per le tabelle `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C4E0A61F58AFC4DE` (`league_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `league`
--
ALTER TABLE `league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `FK_C4E0A61F58AFC4DE` FOREIGN KEY (`league_id`) REFERENCES `league` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
