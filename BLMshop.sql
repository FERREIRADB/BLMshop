-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: BLMshop
-- ------------------------------------------------------
-- Server version	5.5.5-10.5.15-MariaDB-0+deb11u1
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8 */
;

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;

/*!40103 SET TIME_ZONE='+00:00' */
;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- Table structure for table `categorie`
--
USE 'BLMshop';

DROP TABLE IF EXISTS `categorie`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nameCategorie` varchar(255) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `categorie`
--
LOCK TABLES `categorie` WRITE;

/*!40000 ALTER TABLE `categorie` DISABLE KEYS */
;

INSERT INTO
  `categorie`
VALUES
  (1, 'Origine'),
(2, 'Préparé');

/*!40000 ALTER TABLE `categorie` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `commande`
--
DROP TABLE IF EXISTS `commande`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `commande` (
  `idUser` int(11) NOT NULL,
  `idProduits` int(11) NOT NULL,
  `dateAujo` date NOT NULL,
  PRIMARY KEY (`idUser`, `idProduits`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `commande`
--
LOCK TABLES `commande` WRITE;

/*!40000 ALTER TABLE `commande` DISABLE KEYS */
;

/*!40000 ALTER TABLE `commande` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `genre`
--
DROP TABLE IF EXISTS `genre`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `genre` (
  `idGenre` int(11) NOT NULL AUTO_INCREMENT,
  `nameGenre` varchar(100) NOT NULL,
  PRIMARY KEY (`idGenre`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `genre`
--
LOCK TABLES `genre` WRITE;

/*!40000 ALTER TABLE `genre` DISABLE KEYS */
;

INSERT INTO
  `genre`
VALUES
  (1, 'Homme'),
(2, 'Femme'),
(3, 'Autres');

/*!40000 ALTER TABLE `genre` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `modele`
--
DROP TABLE IF EXISTS `modele`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `modele` (
  `idModele` int(11) NOT NULL AUTO_INCREMENT,
  `nameModele` varchar(100) NOT NULL,
  PRIMARY KEY (`idModele`)
) ENGINE = InnoDB AUTO_INCREMENT = 22 DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `modele`
--
LOCK TABLES `modele` WRITE;

/*!40000 ALTER TABLE `modele` DISABLE KEYS */
;

INSERT INTO
  `modele`
VALUES
  (1, 'Série 1'),
(2, 'Série 2'),
(3, 'Série 3'),
(4, 'Série 4'),
(5, 'Série 5'),
(6, 'M2'),
(7, 'M3'),
(8, 'M4'),
(9, 'M5'),
(10, 'X1'),
(11, 'X2'),
(12, 'X3'),
(13, 'X4'),
(14, 'X5'),
(15, 'X6'),
(16, 'M6'),
(17, 'M1'),
(18, 'Série 6'),
(19, 'Série 7'),
(20, 'Série 8'),
(21, 'X7');

/*!40000 ALTER TABLE `modele` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `panier`
--
DROP TABLE IF EXISTS `panier`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `panier` (
  `idUser` int(11) NOT NULL,
  `idProduits` int(11) NOT NULL,
  KEY `panier_FK` (`idProduits`),
  KEY `panier_FK_1` (`idUser`),
  CONSTRAINT `panier_FK` FOREIGN KEY (`idProduits`) REFERENCES `produits` (`idProduits`),
  CONSTRAINT `panier_FK_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `panier`
--
LOCK TABLES `panier` WRITE;

/*!40000 ALTER TABLE `panier` DISABLE KEYS */
;

/*!40000 ALTER TABLE `panier` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `produits`
--
DROP TABLE IF EXISTS `produits`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `produits` (
  `idProduits` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `nameImage` varchar(255) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT 0,
  `puissance` int(11) NOT NULL DEFAULT 0,
  `couple` int(11) NOT NULL DEFAULT 0,
  `moteur` varchar(255) NOT NULL DEFAULT '0',
  `consoVille` int(11) NOT NULL DEFAULT 0,
  `consoAuto` int(11) NOT NULL DEFAULT 0,
  `idCategorie` int(11) DEFAULT NULL,
  `idModele` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProduits`),
  KEY `produits_FK` (`idCategorie`),
  KEY `produits_FK_1` (`idModele`),
  CONSTRAINT `produits_FK` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`),
  CONSTRAINT `produits_FK_1` FOREIGN KEY (`idModele`) REFERENCES `modele` (`idModele`)
) ENGINE = InnoDB AUTO_INCREMENT = 57 DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `produits`
--
LOCK TABLES `produits` WRITE;

/*!40000 ALTER TABLE `produits` DISABLE KEYS */
;

INSERT INTO
  `produits`
VALUES
  (
    1,
    'Bmw M1',
    'BMW-1M.png',
    55700,
    340,
    450,
    '6 Cylindres 3.0L',
    11,
    6,
    1,
    17
  ),
  (
    2,
    'Bmw M3 F80',
    'bmw-m3-f80.png',
    73400,
    430,
    550,
    '6 Cylindres 3.0L',
    12,
    7,
    1,
    7
  ),
  (
    3,
    'Bmw M3 G80',
    'bmw-m3-g80.png',
    105250,
    480,
    550,
    '6 Cyindres 3.0L TwinTurbo',
    12,
    9,
    1,
    7
  ),
  (
    4,
    'Bmw M4 F82',
    'bmw-m4-f82.png',
    159900,
    430,
    550,
    '6 cylindres 3.0L Bi-Turbo',
    12,
    7,
    1,
    8
  ),
  (
    5,
    'Bmw M4 F82 Tuned',
    'BMW-M4-F82-Tuning.png',
    189900,
    520,
    710,
    '6 cylindres 3.0L Bi-Turbo',
    13,
    8,
    2,
    8
  ),
  (
    6,
    'Bmw M4 G82',
    'bmw-m4-g82.png',
    158990,
    350,
    550,
    '6 Cyindres 3.0L TwinTurbo',
    16,
    8,
    1,
    8
  ),
  (
    7,
    'Bmw M6',
    'bmw-m6.png',
    153750,
    600,
    700,
    'V8 4.4L Bi-Turbo',
    14,
    8,
    1,
    16
  ),
  (
    8,
    'Bmw M2',
    'm2.png',
    71000,
    405,
    550,
    '6 cylindres 3.0L Bi-Turbo',
    14,
    10,
    1,
    6
  ),
  (
    9,
    'Bmw M5',
    'm5.jpg',
    115000,
    617,
    750,
    'V8 4.4L Bi-Turbo',
    15,
    8,
    1,
    9
  ),
  (
    10,
    'Bmw 118i e87',
    'Serie1_e87.jpg',
    7000,
    129,
    180,
    '4 Cylindre 2.0L',
    10,
    6,
    1,
    1
  ),
  (
    11,
    'Bmw 118i f20',
    'Serie1_f20.jpg',
    25690,
    170,
    250,
    '4 Cylindre 2.0L TwinTurbo',
    8,
    5,
    1,
    1
  );

/*!40000 ALTER TABLE `produits` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `idGenre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `users_FK` (`idGenre`),
  CONSTRAINT `users_FK` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`)
) ENGINE = InnoDB AUTO_INCREMENT = 35 DEFAULT CHARSET = utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `users`
--
LOCK TABLES `users` WRITE;

/*!40000 ALTER TABLE `users` DISABLE KEYS */
;

INSERT INTO
  `users`
VALUES
  (
    1,
    'Brax',
    'brax@gmail.com',
    '$2y$10$yd8Ur5ujlkV3ygM/cplazeZk6X7I39y5cYdlcnlJe75rqNNKu2lnO',
    1
  ),
  (
    2,
    'Admin',
    'admin@gmail.com',
    '$2y$10$7b9NZVGIPEQtPqo6Xu3EwuD.8B6olXiPHAVS7G8xkuv7UL0y2jyPy',
    1
  ),
(
    3,
    'Lucas',
    'lucas@gmail.com',
    '$2y$10$OlmcFHYUHpxNG.m2njaKL.sMd4dMsN2X9jxuptuv0GDBXJQs/FnQq',
    3
  );

/*!40000 ALTER TABLE `users` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Dumping routines for database 'BLMshop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2022-10-17  8:32:02