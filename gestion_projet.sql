-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 11:34 PM
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
(1, 'hello', '2025-01-04', 17, 61),
(2, 'HELLO', '2025-01-04', 20, 56),
(3, 'hi', '2025-01-04', 13, 54),
(4, 'cette tache est terminé', '2025-01-04', 6, 61),
(5, 'cette tache est terminé', '2025-01-04', NULL, 60),
(6, 'cette tache est importante', '2025-01-04', 21, 62),
(7, 'hello', '2025-01-04', 20, 63),
(8, 'hi', '2025-01-23', 20, 56),
(9, 'hello', '2025-01-23', 19, 54),
(10, 'hello', '2025-01-23', 19, 52),
(11, 'hello , this task is done', '2025-01-24', 19, 54),
(12, 'il faut effectuer cette tache', '2025-01-24', 19, 62);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id_notification` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `role_user` varchar(30) NOT NULL,
  `id_projet` int(11) DEFAULT NULL,
  `id_tache` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id_notification`, `text`, `id_user`, `role_user`, `id_projet`, `id_tache`) VALUES
(1, 'le membre :id_membre a modifier le statut du tache', 20, 'membre', NULL, NULL),
(2, 'le membre :id_membre a modifier le statut du tache', 20, 'membre', NULL, NULL),
(3, 'le membre :id_membre a modifier le statut du tache', 20, 'membre', NULL, NULL),
(4, 'une notification', 4, 'membre', NULL, NULL),
(5, 'le membre 20 a modifier le statut du tache', 20, 'membre', NULL, NULL),
(6, 'le membre 20 a modifier le statut du tache 42', 20, 'membre', NULL, NULL),
(7, 'a modifier le projet <strong>oracle 2</strong>', 17, 'chef', NULL, NULL),
(8, 'a modifier le projet <strong>mysql</strong>', 21, 'chef', NULL, NULL),
(9, 'le membre 20 a modifier le statut du tache 46', 20, 'membre', NULL, NULL),
(10, 'le membre 20 a modifier le statut du tache 42', 20, 'membre', NULL, NULL),
(11, 'le membre 20 a modifier le statut du tache 47', 20, 'membre', NULL, NULL),
(12, 'le membre 13 a modifier le statut du tache 1', 13, 'membre', NULL, NULL),
(13, 'le membre 13 a modifier le statut du tache 1', 13, 'membre', NULL, NULL),
(14, 'le membre 13 a modifier le statut du tache 30', 13, 'membre', NULL, NULL),
(15, 'le membre 20 a modifier le statut du tache 32', 20, 'membre', NULL, NULL),
(16, 'le membre 13 a modifier le statut du tache 1', 13, 'membre', NULL, NULL),
(17, 'le membre 13 a modifier le statut du tache 4', 13, 'membre', NULL, NULL),
(18, 'le membre 13 a modifier le statut du tache 48', 13, 'membre', NULL, NULL),
(19, 'le membre 13 a modifier le statut du tache 48 dans le projet : oracle 2', 13, 'membre', NULL, NULL),
(20, 'le membre 13 a modifier le statut du tache 48 dans le projet : oracle 2', 13, 'membre', NULL, NULL),
(21, 'le membre 13 a modifier le statut du tache 48 dans le projet : oracle 2', 13, 'membre', NULL, NULL),
(22, 'a modifier le projet <strong>oracle</strong>', 17, 'chef', NULL, NULL),
(23, 'a modifier le projet <strong>teste est ce que tous est bien</strong>', 17, 'chef', NULL, NULL),
(25, 'ADMIN a supprimer le projet 9', 19, 'admin', NULL, NULL),
(26, 'ADMIN a supprimer le projet 9', 19, 'admin', NULL, NULL),
(27, 'a modifier le projet <strong>oracle</strong>', 17, 'chef', NULL, NULL),
(28, 'a modifier le projet <strong>application</strong>', 17, 'chef', NULL, NULL),
(29, 'a modifier le projet <strong>application</strong>', 17, 'chef', NULL, NULL),
(30, 'a modifier le projet <strong>oracle</strong>', 17, 'chef', NULL, NULL),
(31, 'le membre 20 a modifier le statut du tache 56 dans le projet : oracle', 20, 'membre', 32, 56),
(32, 'le membre 13 a modifier le statut du tache 54 dans le projet : oracle', 13, 'membre', 32, 54),
(33, 'le membre 6 a modifier le statut du tache 52 dans le projet : oracle', 6, 'membre', 32, 52),
(34, 'le membre 6 a modifier le statut du tache 61 dans le projet : application', 6, 'membre', 35, 61),
(35, 'le membre 5 a modifier le statut du tache 60 dans le projet : oracle', 5, 'membre', 32, 60),
(36, 'le membre 5 a modifier le statut du tache 67 dans le projet : analyse des rapports', 5, 'membre', 36, 67),
(37, 'le membre 6 a modifier le statut du tache 62 dans le projet : gestion des exeptions', 6, 'membre', 33, 62),
(38, 'le membre 13 a modifier le statut du tache 64 dans le projet : gestion des exeptions', 13, 'membre', 33, 64),
(39, 'le membre 20 a modifier le statut du tache 63 dans le projet : gestion des exeptions', 20, 'membre', 33, 63),
(40, 'le membre 20 a modifier le statut du tache 66 dans le projet : analyse des rapports', 20, 'membre', 36, 66),
(41, 'le membre 20 a modifier le statut du tache 56 dans le projet : oracle', 20, 'membre', 32, 56);

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
(21, 'eeeeee', 'eeeeeee', '2024-12-02', '2024-12-11', 'Terminé', NULL),
(31, 'Application des maths', 'Application des maths', '2024-12-30', '2025-01-11', 'pas commence', 14),
(32, 'oracle', 'oracle ', '2025-01-06', '2025-01-30', 'pas commence', 17),
(33, 'gestion des exeptions', 'gestion des exeptions', '2025-01-07', '2025-01-17', 'pas commence', 21),
(34, 'construction d\'un siteweb', 'construction d\'un siteweb', '2025-01-14', '2025-01-16', 'pas commence', 14),
(35, 'application', 'application QT', '2025-01-06', '2025-01-09', 'pas commence', 17),
(36, 'analyse des rapports', 'analyse des rapports', '2025-01-13', '2025-01-12', 'pas commence', 21);

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
(52, 'créer un accueil', 'créer un accueil', '2025-01-07', '2025-01-15', '2025-01-09', 'En cours', 'Haute', 6, 32),
(54, 'login et logout', 'login et logout', '2025-01-14', '2025-01-24', '2025-02-06', 'Bloquée', 'Moyenne', 13, 32),
(56, 'centrage des divs', 'centrage des divs', '2025-01-14', '2025-01-09', '2025-01-25', 'Terminé', 'Haute', 20, 32),
(58, 'presentation', 'presentation', '2025-01-07', '2025-01-12', '2025-01-23', 'pas commence', 'Haute', 7, 32),
(60, 'simulation', 'simulation', '2025-01-14', '2025-01-17', '2025-01-23', 'Terminé', 'Moyenne', NULL, 32),
(61, 'ecrire un rapport', 'ecrire un rapport', '2025-01-14', '2025-01-18', '2025-01-30', 'Terminé', 'Haute', 6, 35),
(62, 'tache1', 'tache1', '2025-01-15', '2025-01-11', '2025-01-24', 'En cours', 'Haute', 6, 33),
(63, 'centrage des divs', 'centrage des divs', '2025-01-14', '2025-01-16', '2025-01-09', 'Terminé', 'Haute', 20, 33),
(64, 'connexion et deconexion', 'connexion et deconexion', '2025-01-13', '2025-01-09', '2024-12-30', 'Bloquée', 'Haute', 13, 33),
(65, 'centrage des divs', 'a', '2025-01-14', '2025-01-24', '2025-01-31', 'pas commence', 'Haute', 7, 36),
(66, 'centrage des divs', 'g', '2025-01-20', '2025-01-24', '2025-01-08', 'Bloquée', 'Haute', 20, 36),
(67, 'login et logout', 'l', '2025-01-07', '2025-01-18', '2025-01-30', 'En cours', 'Haute', NULL, 36);

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
(6, 'junaid', 'junaiduthman370@gmail.com', '$2y$10$IdYwEwsCdEuPMyJ5DufyCOInmXG4B8KmlW5aVxejecdgaw13Rqihm', 'membre'),
(7, 'yeyeyy', 'taghmawi@gmail.com', '$2y$10$FsdAI7YrL9FkzyDjY6aS3OD', 'membre'),
(13, 'slawi amin', 'slawi@amin.com', '$2y$10$IdYwEwsCdEuPMyJ5DufyCOInmXG4B8KmlW5aVxejecdgaw13Rqihm', 'membre'),
(14, 'chef number222 flmghrib', 'numbre22@gmail.com', '$2y$10$IdYwEwsCdEuPMyJ5DufyCOInmXG4B8KmlW5aVxejecdgaw13Rqihm', 'chef'),
(15, 'rtyu', 'ghjk@ghj', '$2y$10$o1kxf65t.aUeNI3b0xBaPe8', 'membre'),
(17, 'junaid uthman', 'junaiduthman123@gmail.com', '$2y$10$IdYwEwsCdEuPMyJ5DufyCOInmXG4B8KmlW5aVxejecdgaw13Rqihm', 'chef'),
(18, 'ana', 'ana@ana', '', 'membre'),
(19, 'JUNAID UTHMAN', 'junaiduthman370@gmail.com', '$2y$10$IdYwEwsCdEuPMyJ5DufyCOInmXG4B8KmlW5aVxejecdgaw13Rqihm', 'admin'),
(20, 'membre1', 'membre@gmail.com', '$2y$10$52gqO8c8f3eOF.t.il2ocuXjOXKIxlKS1ljb.ToYdr9IdLFF7cnFG', 'membre'),
(21, 'salah', 'chef@gmail.com', '$2y$10$3Bw7kCThp.nJurde/C8uieZD7QI90rJqTrN6O818lXp6ACqnF9aKm', 'chef');

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
  ADD KEY `id_user` (`id_user`),
  ADD KEY `notifications_ibfk_1` (`id_projet`),
  ADD KEY `id_tache` (`id_tache`);

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
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tache`
--
ALTER TABLE `tache`
  MODIFY `id_tache` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`id_tache`) REFERENCES `tache` (`id_tache`) ON DELETE SET NULL ON UPDATE SET NULL;

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
