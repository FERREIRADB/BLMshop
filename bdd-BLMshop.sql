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

USE 'BLMshop';

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

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `idUser` int(11) NOT NULL,
  `idProduits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idProduits` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `nameImage` varchar(255) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT 0,
  `puissance` int(11) NOT NULL DEFAULT '0',
  `couple` int(11) NOT NULL DEFAULT '0',
  `moteur` varchar(255) NOT NULL DEFAULT '0',
  `consoVille` int(11) NOT NULL DEFAULT '0',
  `consoAuto` int(11) NOT NULL DEFAULT '0',
  `productType` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduits`,`name`, `nameImage`, `price`,`puissance`,`couple`,`moteur`,`consoVille`,`consoAuto`, `productType`) VALUES
(1,'Bmw M1','BMW-1M.png',55700,340,450,'6 Cylindres 3.0L',10.9,6.7,'Origine'),
(2,'Bmw M3 F80','bmw-m3-f80.png',73400,430,550,'6 Cylindres 3.0L',12,6.9,'Origine'),
(3,'Bmw M3 G80','bmw-m3-g80.png',105250,480,550,'6 Cyindres 3.0L TwinTurbo',12.2,8.5,'Origine'),
(4,'Bmw M4 F82','bmw-m4-f82.png',159900,430,550,'6 cylindres 3.0L Bi-Turbo',12,6.9,'Origine'),
(5,'Bmw M4 F82 Tuned','BMW-M4-F82-Tuning.png',189900,520,710,'6 cylindres 3.0L Bi-Turbo',13.1,8.2,'Préparé'),
(6,'Bmw M4 G82','bmw-m4-g82.png',158990,350,550,'6 Cyindres 3.0L TwinTurbo',16,7.8,'Origine'),
(7,'Bmw M6','bmw-m6.png',153750,600,700,'V8 4.4L Bi-Turbo',14.3,8,'Origine');


-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nameCategorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`,`nameCategorie`) VALUES
(1,'Origine'),
(2,'Préparé');


-- --------------------------------------------------------
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idUser`,`idProduits`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idUser`,`idProduits`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idProduits`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idProduits` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;