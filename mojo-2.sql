-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 22 juin 2022 à 13:03
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mojo`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE `abonne` (
  `id_abonne` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `sexe` enum('homme','femme','','') NOT NULL,
  `email` text NOT NULL,
  `mdp` text NOT NULL,
  `birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `abonne`
--

INSERT INTO `abonne` (`id_abonne`, `nom`, `prenom`, `pseudo`, `sexe`, `email`, `mdp`, `birth`) VALUES
(12, 'lebaz', 'antoni', 'anto', 'homme', 'antonix233@gmail.com', '$2y$10$VYAaVvDkWUe6dn/BsZibFekUuFC.8Bd9nmNlDEd2jKSoaswjsSvgW', '2000-01-18'),
(13, 'aziza', 'noam', 'nono', 'homme', 'noam@gmail.com', '$2y$10$PQruXusWRqD9Fgbyjlwn/.tmE0qZWDRN/dQDILbEcV4t4yL1JdOmi', '2000-03-02'),
(14, 'varta', 'basile', 'baboss', 'homme', 'basile@gmail.com', '$2y$10$T36hKGAqKFfl1Iyr7K1STeceaWiTMpZ7k4w9IP1w5.vlnqImR/3wy', '2000-09-29'),
(15, 'dufour', 'ilan', 'duf', 'homme', 'ilan@gmail.com', '$2y$10$3uK0gkRb7HR0/.zXW1AtU.urHXQfVPy/XOUciq.wqQXibMkwBDyKy', '2001-02-02'),
(16, 'mimi', 'mimi', 'mimi', 'femme', 'mimi@mimi.fr', '$2y$10$xzPHryRFi.tT1KtoRBlivOjNG9hvQSlJ54p67GtICSluTlhrydCJq', '1997-08-01'),
(17, 'fefe', 'fefe', 'fefe', 'femme', 'fefe@fefe.fr', '$2y$10$mUFdWeMpCIByz4OeUUV3pegx0N7KZtFsrKnc9WfrUGfRSkeC31s/K', '2022-05-03'),
(18, 'Mumu', 'Mumu', 'Mumu', 'homme', 'mumu@mumu.fr', '$2y$10$R7LO9M3MHMXrMWnX0XDBreRGinBg.nK1czdP.u/a1exbOLoqjfHYK', '2012-02-02');

-- --------------------------------------------------------

--
-- Structure de la table `aime`
--

CREATE TABLE `aime` (
  `id_like` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_likeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `aime`
--

INSERT INTO `aime` (`id_like`, `id_post`, `id_likeur`) VALUES
(63, 42, 16),
(64, 41, 16),
(66, 39, 16),
(67, 38, 16),
(72, 43, 16),
(73, 40, 16);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `pseudo` varchar(11) NOT NULL,
  `content` text NOT NULL,
  `heure_message` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_post`, `pseudo`, `content`, `heure_message`) VALUES
(62, 29, 'anto', 'cool', '2022-03-23'),
(63, 30, 'anto', 'j\'adore', '2022-03-23'),
(64, 32, 'anto', 'tout pareil !', '2022-03-23'),
(65, 33, 'nono', 'trop frais ', '2022-03-23'),
(66, 32, 'nono', '=)', '2022-03-23'),
(67, 38, 'nono', 'trop frais', '2022-03-25'),
(68, 39, 'anto', 'bg', '2022-03-25'),
(69, 43, 'mimi', 'lalalala', '2022-03-31'),
(70, 43, 'mimi', 'bibibibi', '2022-03-31'),
(71, 40, 'mimi', '', '2022-04-06'),
(72, 43, 'mimi', 'labilabilabi', '2022-04-14'),
(73, 43, 'mimi', '', '2022-04-14'),
(74, 43, 'mimi', '', '2022-04-14'),
(75, 43, 'mimi', 'efe', '2022-04-14'),
(76, 41, 'mimi', 'grgrgrg', '2022-04-14'),
(77, 41, 'mimi', 'grgrgrg', '2022-04-14');

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

CREATE TABLE `follow` (
  `id_follow` int(11) NOT NULL,
  `id_abonne` int(11) NOT NULL,
  `id_suivi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `follow`
--

INSERT INTO `follow` (`id_follow`, `id_abonne`, `id_suivi`) VALUES
(2, 16, 12);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_abonne` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `photo` text NOT NULL,
  `heure_de_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `id_abonne`, `pseudo`, `content`, `photo`, `heure_de_post`) VALUES
(38, 12, 'anto', 'frais', '38.jpg', '2022-03-25'),
(39, 13, 'nono', 'Nouveau fond d\'écran !', '39.png', '2022-03-25'),
(40, 15, 'duf', 'pour ma room', '40.jpg', '2022-03-25'),
(41, 16, 'Mama', 'Playaaaa', '41.jpg', '2022-03-31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD PRIMARY KEY (`id_abonne`);

--
-- Index pour la table `aime`
--
ALTER TABLE `aime`
  ADD PRIMARY KEY (`id_like`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id_follow`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_abonne` (`id_abonne`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonne`
--
ALTER TABLE `abonne`
  MODIFY `id_abonne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `aime`
--
ALTER TABLE `aime`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `follow`
--
ALTER TABLE `follow`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
