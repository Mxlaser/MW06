-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 14 avr. 2022 à 14:07
-- Version du serveur :  8.0.28-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `MW04_drone_nikola`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idcommande` int NOT NULL,
  `idvol` int NOT NULL,
  `idlisteCommandes` int NOT NULL,
  `valeur` int NOT NULL,
  `time_ms` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `drone`
--

CREATE TABLE `drone` (
  `iddrone` int NOT NULL,
  `marque` varchar(45) NOT NULL,
  `modele` varchar(45) NOT NULL,
  `refdrone` varchar(45) NOT NULL,
  `dateAchat` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `drone`
--

INSERT INTO `drone` (`iddrone`, `marque`, `modele`, `refdrone`, `dateAchat`) VALUES
(1, 'DJI', 'Tello', 'C4F41', '2018-01-09 23:00:00'),
(2, 'DJI', 'Tello', 'C4F52', '2018-01-09 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `idetat` int NOT NULL,
  `idvol` int NOT NULL,
  `pitch` float NOT NULL,
  `roll` float NOT NULL,
  `yaw` float NOT NULL,
  `vgx` float NOT NULL,
  `vgy` float NOT NULL,
  `vgz` float NOT NULL,
  `templ` int NOT NULL,
  `temph` int NOT NULL,
  `tof` int NOT NULL,
  `h` int NOT NULL,
  `bat` int NOT NULL,
  `baro` int NOT NULL,
  `time` int NOT NULL,
  `agx` float NOT NULL,
  `agy` float NOT NULL,
  `agz` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `listeCommande`
--

CREATE TABLE `listeCommande` (
  `idlisteCommande` int NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idutilisateur` int NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `naissance` date NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `mdp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `nom`, `prenom`, `email`, `naissance`, `pseudo`, `mdp`) VALUES
(1, 'Jean', 'Jacques', 'jean.jacques@protonmail.com', '1970-01-01', 'jeanjean', 'mdpDeJean01!'),
(2, 'ABATAN', 'Evan', 'Evan.ABATAN@protonmail.com', '1970-01-02', 'login1', 'mdp1'),
(3, 'AIT MANSOUR', 'Inas', 'Inas.AITMANSOUR@protonmail.com', '1970-01-03', 'login2', 'mdp2'),
(4, 'BECKER', 'Maxime', 'Maxime.BECKER@protonmail.com', '1970-01-04', 'login3', 'mdp3'),
(5, 'BERANGER', 'Aurelien', 'Aurelien.BERANGER@protonmail.com', '1970-01-05', 'login4', 'mdp4'),
(6, 'BLIN', 'Florent', 'Florent.BLIN@protonmail.com', '1970-01-06', 'login5', 'mdp5'),
(7, 'CESARI', 'Jeffrey', 'Jeffrey.CESARI@protonmail.com', '1970-01-07', 'login6', 'mdp6'),
(8, 'CHARLES', 'Dimitry', 'Dimitry.CHARLES@protonmail.com', '1970-01-08', 'login7', 'mdp7'),
(9, 'CHARTIER', 'Pierre', 'Pierre.CHARTIER@protonmail.com', '1970-01-09', 'login8', 'mdp8'),
(10, 'CHRISTON', 'Vincent', 'Vincent.CHRISTON@protonmail.com', '1970-01-10', 'login9', 'mdp9'),
(11, 'CONTE-LAY', 'Corentin', 'Corentin.CONTE-LAY@protonmail.com', '1970-01-11', 'login10', 'mdp10');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `idvol` int NOT NULL,
  `idutilisateur` int NOT NULL,
  `datevol` timestamp NOT NULL,
  `iddrone` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`idvol`, `idutilisateur`, `datevol`, `iddrone`) VALUES
(13, 1, '2019-12-19 23:00:00', 1),
(14, 1, '2019-12-20 14:43:24', 2),
(15, 1, '2019-12-20 14:54:38', 1),
(16, 1, '2019-12-20 14:57:30', 1),
(17, 1, '2020-01-14 12:45:57', 1),
(18, 1, '2020-01-14 12:55:53', 1),
(19, 1, '2020-01-15 08:22:50', 1),
(20, 1, '2020-01-15 09:00:10', 2),
(21, 1, '2020-01-15 10:10:55', 2),
(22, 1, '2020-01-16 07:34:27', 2),
(23, 1, '2020-01-16 10:45:16', 2),
(24, 1, '2020-01-16 11:32:14', 2),
(25, 1, '2020-11-05 09:45:09', 1),
(26, 1, '2020-11-05 09:56:57', 1),
(27, 1, '2020-11-05 11:17:33', 1),
(28, 1, '2020-11-05 11:23:51', 2),
(29, 3, '2020-12-16 07:30:13', 2),
(30, 3, '2020-12-16 07:39:02', 2),
(31, 3, '2020-12-16 07:52:16', 1),
(32, 3, '2020-12-16 07:52:54', 1),
(33, 3, '2020-12-16 07:56:35', 2),
(34, 3, '2020-12-16 07:59:08', 2),
(35, 3, '2020-12-16 08:02:28', 2),
(36, 3, '2020-12-16 08:04:27', 2),
(37, 3, '2020-12-16 08:24:02', 2),
(38, 3, '2020-12-16 08:28:36', 2),
(39, 3, '2020-12-16 08:32:47', 2),
(40, 2, '2021-01-13 07:36:03', 2),
(41, 2, '2021-01-13 07:37:19', 2),
(42, 2, '2021-01-13 07:42:02', 2),
(43, 2, '2021-01-13 07:42:37', 2),
(44, 2, '2021-01-13 07:47:57', 2),
(45, 2, '2021-01-13 07:58:01', 2),
(46, 2, '2021-01-13 08:02:57', 2),
(47, 2, '2021-01-13 08:05:41', 2),
(48, 2, '2021-01-13 08:20:43', 2),
(49, 2, '2021-01-13 08:25:15', 2),
(50, 2, '2021-01-13 09:37:34', 2),
(51, 2, '2021-01-13 09:50:13', 2),
(52, 2, '2021-01-13 09:57:45', 2),
(53, 2, '2021-01-13 10:06:55', 2),
(54, 2, '2021-01-13 10:17:22', 2),
(55, 2, '2021-01-13 10:30:28', 2),
(56, 2, '2021-01-27 09:52:22', 2),
(57, 2, '2021-01-27 10:12:01', 2),
(58, 2, '2021-01-27 10:44:46', 2),
(59, 2, '2021-01-27 10:56:35', 2),
(60, 2, '2021-01-29 13:20:53', 2),
(61, 2, '2021-01-29 15:35:12', 2),
(62, 2, '2021-01-29 15:40:16', 2),
(63, 2, '2021-01-29 15:44:53', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idcommande`),
  ADD KEY `idvol` (`idvol`,`idlisteCommandes`),
  ADD KEY `idlisteCommandes` (`idlisteCommandes`);

--
-- Index pour la table `drone`
--
ALTER TABLE `drone`
  ADD PRIMARY KEY (`iddrone`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`idetat`),
  ADD KEY `idvol` (`idvol`);

--
-- Index pour la table `listeCommande`
--
ALTER TABLE `listeCommande`
  ADD PRIMARY KEY (`idlisteCommande`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idutilisateur`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`idvol`),
  ADD KEY `idutilisateur` (`idutilisateur`),
  ADD KEY `iddrone` (`iddrone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idcommande` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `drone`
--
ALTER TABLE `drone`
  MODIFY `iddrone` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `idetat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `listeCommande`
--
ALTER TABLE `listeCommande`
  MODIFY `idlisteCommande` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `idvol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idvol`) REFERENCES `vol` (`idvol`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idlisteCommandes`) REFERENCES `listeCommande` (`idlisteCommande`);

--
-- Contraintes pour la table `etat`
--
ALTER TABLE `etat`
  ADD CONSTRAINT `etat_ibfk_1` FOREIGN KEY (`idvol`) REFERENCES `vol` (`idvol`);

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `vol_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `vol_ibfk_2` FOREIGN KEY (`iddrone`) REFERENCES `drone` (`iddrone`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
