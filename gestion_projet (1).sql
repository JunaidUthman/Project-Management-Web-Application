-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 11:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `text` varchar(300) NOT NULL,
  `date_cmnt` date NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_tache` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `text`, `date_cmnt`, `id_user`, `id_tache`) VALUES
(1, 'eee', '2024-12-02', NULL, 1),
(2, 'bonjour everybody', '0000-00-00', NULL, 3),
(3, 'bonjour everybody', '0000-00-00', NULL, 3),
(4, 'salam', '0000-00-00', NULL, 3),
(5, 'salam', '0000-00-00', NULL, 3),
(6, 'aaa', '0000-00-00', NULL, 3),
(7, 'aaa', '0000-00-00', NULL, 3),
(8, 'aaa', '0000-00-00', NULL, 3),
(9, 'aaa', '0000-00-00', NULL, 3),
(10, 'aaa', '0000-00-00', NULL, 3),
(11, 'hello', '0000-00-00', NULL, 3),
(12, 'hello', '0000-00-00', NULL, 3),
(13, 'hello', '0000-00-00', NULL, 3),
(14, 'hello', '0000-00-00', NULL, 3),
(15, 'hello', '0000-00-00', NULL, 3),
(16, 'hello', '0000-00-00', NULL, 3),
(17, 'hello', '0000-00-00', NULL, 3),
(18, 'hello', '0000-00-00', NULL, 3),
(19, 'aa', '0000-00-00', NULL, 3),
(20, 'sisi', '0000-00-00', NULL, 3),
(21, 'hello', '0000-00-00', NULL, 3),
(22, 'hello', '0000-00-00', NULL, 3),
(23, 'gg', '0000-00-00', NULL, 3),
(24, 'hello', '0000-00-00', NULL, 4),
(25, 'hi', '0000-00-00', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id_notification` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `role_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id_notification`, `text`, `id_user`, `role_user`) VALUES
(1, 'une tache est terminé', 14, 'chef'),
(2, 'tache 2 est terminé', 14, 'chef'),
(3, 'le projet 1 est terminé', 14, 'chef'),
(4, 'la tache 1 est terminé', 6, 'membre'),
(5, 'un tache est terminé', 5, 'membre');

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(300) NOT NULL,
  `description_projet` varchar(300) NOT NULL,
  `date_debut_projet` date NOT NULL,
  `date_fin_projet` date NOT NULL,
  `statut_projet` varchar(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom_projet`, `description_projet`, `date_debut_projet`, `date_fin_projet`, `statut_projet`, `id_user`) VALUES
(9, 'Analyse et applications', 'Développement d\'une solution pour analyser les données de campagne marketing et améliorer les performances.', '2024-07-01', '2024-09-30', 'Pas commencé', 14),
(12, 'Mise', 'Installation d\'un réseau de fibres optiques pour améliorer la connectivité.', '2024-10-01', '2024-12-01', 'Pas commencé', 14),
(18, 'gestion', 'ce projet est pour creer un site web pour faire la gestion du departement physique d\'une faculté ', '2024-12-03', '2024-12-25', 'En cours', 14),
(21, 'eeeeee', 'eeeeeee', '2024-12-02', '2024-12-11', 'Terminé', NULL),
(22, 'agence de voyage', 'ce projet est pour faire une programmations des voyages', '2024-11-25', '2025-01-03', 'En cours', 14),
(23, 'gestion des ecoles', 'c\'est un bom projet', '2024-12-03', '2024-12-20', 'En cours', 17),
(24, 'pages de login/signin ', 'c\'est un projet pour s\'entrener', '2024-12-09', '2024-12-20', 'Pas commencé', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tache`
--

CREATE TABLE `tache` (
  `id_tache` int(11) NOT NULL,
  `nom_tache` varchar(30) NOT NULL,
  `description_tache` varchar(300) NOT NULL,
  `date_debut_tache` date NOT NULL,
  `date_prévue_tache` date NOT NULL,
  `date_fin_tache` date NOT NULL,
  `statut_tache` varchar(30) NOT NULL,
  `priorite_tache` varchar(30) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tache`
--

INSERT INTO `tache` (`id_tache`, `nom_tache`, `description_tache`, `date_debut_tache`, `date_prévue_tache`, `date_fin_tache`, `statut_tache`, `priorite_tache`, `id_user`, `id_projet`) VALUES
(1, 'aaaaa', 'aaaaaa', '2024-12-10', '2024-12-20', '2024-12-01', 'aaaa', 'aaa', 13, 18),
(2, 'eeee', 'eeeeeee', '2024-12-10', '2024-12-06', '2024-12-08', 'eeee', 'eeee', 15, 18),
(3, 'tache 0', 'aaaaaaaaaaa', '2024-12-02', '2024-12-10', '2024-12-20', 'aaaa', 'aaaaa', 15, 9),
(4, 'tache 1', 'bzaaaf dlhdra', '2024-12-01', '2024-12-03', '2024-12-06', 'en cours', 'eleve', 13, 9),
(8, 'tache test', 'aaaaa', '2024-12-10', '2024-12-18', '2024-12-20', 'pas commence', 'pas commence', 5, 23),
(9, 'centrage des divs', 'centrer toute les div du sitewab', '2024-12-06', '2024-12-29', '2025-01-04', 'pas commence', 'pas commence', 7, 23),
(10, 'appelle des investisseurs', 'aaa', '2024-12-18', '2024-12-31', '2025-01-03', 'pas commence', 'pas commence', 6, 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `email`, `password`, `role`) VALUES
(1, 'junaid', 'junaiduthman370@gmail.com', '$2y$10$IdYwEwsCdEuPMyJ5DufyCOInmXG4B8KmlW5aVxejecdgaw13Rqihm', 'admin'),
(5, 'test', 'test@test.com', '$2y$10$r/5Tryzr75ev3OhIM46icOE', 'membre'),
(6, 'junaid', 'junaiduthman370@gmail.com', '$2y$10$5OViIvv7Z..OOXzqGO9Gzee', 'membre'),
(7, 'yeyeyy', 'taghmawi@gmail.com', '$2y$10$FsdAI7YrL9FkzyDjY6aS3OD', 'membre'),
(13, 'slawi amin', 'slawi@amin.com', '$2y$10$WnKxn6.iUUBt949GuLeEluT', 'membre'),
(14, 'chef number222 flmghrib', 'numbre22@gmail.com', '$2y$10$yix/PEYZf7fuFObkTx4npOV', 'chef'),
(15, 'rtyu', 'ghjk@ghj', '$2y$10$o1kxf65t.aUeNI3b0xBaPe8', 'membre'),
(17, 'junaid uthman', 'junaiduthman123@gmail.com', '$2y$10$IdYwEwsCdEuPMyJ5DufyCOInmXG4B8KmlW5aVxejecdgaw13Rqihm', 'chef'),
(18, 'ana', 'ana@ana', '', 'membre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `commentaire_ibfk_1` (`id_user`),
  ADD KEY `commentaire_ibfk_2` (`id_tache`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notification`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `projet_ibfk_1` (`id_user`);

--
-- Indexes for table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id_tache`),
  ADD KEY `tache_ibfk_1` (`id_user`),
  ADD KEY `tache_ibfk_2` (`id_projet`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tache`
--
ALTER TABLE `tache`
  MODIFY `id_tache` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_tache`) REFERENCES `tache` (`id_tache`) ON DELETE SET NULL;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL;

--
-- Constraints for table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL,
  ADD CONSTRAINT `tache_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
