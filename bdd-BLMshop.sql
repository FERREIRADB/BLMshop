-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 juin 2022 à 16:38
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10
DROP DATABASE IF EXISTS BLMshop;
CREATE DATABASE BLMshop;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

USE DATABASE `BLMshop`;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BLMshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `pseudo`, `email`, `password`) VALUES
(1, 'Brax', 'brax@gmail.com', '$2y$10$yd8Ur5ujlkV3ygM/cplazeZk6X7I39y5cYdlcnlJe75rqNNKu2lnO'),
(2, 'Lucas', 'lucas@gmail.com', '$2y$10$OlmcFHYUHpxNG.m2njaKL.sMd4dMsN2X9jxuptuv0GDBXJQs/FnQq'),
(3, 'Admin', 'admin@gmail.com', '$2y$10$yd8Ur5ujlkV3ygM/cplazeZk6X7I39y5cYdlcnlJe75rqNNKu2lnO');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idUser` int(11) NOT NULL,
  `idProduits` int(11) NOT NULL,
  `dateAujo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idUser`, `idProduits`, `dateAujo`) VALUES
(21, 19, '2022-06-03'),
(21, 27, '2022-06-03'),
(21, 44, '2022-06-03'),
(21, 46, '2022-06-03'),
(23, 1, '2022-06-03'),
(24, 1, '2022-06-03'),
(24, 2, '2022-06-03'),
(24, 3, '2022-06-03'),
(24, 7, '2022-06-03');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `idUser` int(11) NOT NULL,
  `idProduits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idUser`, `idProduits`) VALUES
(24, 2),
(24, 4),
(24, 5),
(27, 55);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idProduits` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `nameImage` varchar(255) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT 0,
  `productType` varchar(255) NOT NULL DEFAULT '0',
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduits`, `name`, `nameImage`, `price`, `productType`,) VALUES
(1, 'Bequet M Carbon', 'spoiler-arriere-en-carbone-bmw-m4-cs.jpg', 200, 'aileron'), 
(2, 'Nike Air Force 1 Low', 'Travis Scott Cactus Jack', 'air-jordan-4-retro-off-white-sail-w-1-1000.png', 483, 'shoes', 'Nike', '5');

-- --------------------------------------------------------
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arrivals`
--
ALTER TABLE `arrivals`
  ADD PRIMARY KEY (`idArrivals`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`,`idProduits`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`,`idProduits`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idProduits`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arrivals`
--
ALTER TABLE `arrivals`
  MODIFY `idArrivals` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idProduits` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;