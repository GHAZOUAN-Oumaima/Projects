-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 01:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grh`
--

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `numServ` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `sexe`, `adresse`, `dateNaissance`, `numServ`) VALUES
(15, 'hajar', 'choukri', 'femme', 'edrjfrnjrl', '2023-02-06', 2),
(18, 'Oumaima', 'GHAZOUAN', 'femme', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', '2023-03-06', 1),
(21, 'sara', 'GHAZOUAN', 'H', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', '2023-03-07', 3),
(22, 'sara', 'GHAZOUAN', 'H', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', '2023-03-07', 3),
(23, 'jolkj', 'nkl', 'H', 'nkl:', '2023-02-28', 3),
(24, 'jolkj', 'nkl', 'H', 'nkl:', '2023-02-28', 3),
(26, 'Oumaima', 'GHAZOUAN', 'femme', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', '2023-03-22', 2),
(27, 'sara', 'GHAZOUAN', 'femme', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', '2005-01-16', 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `numServ` int(11) NOT NULL,
  `designationServ` varchar(100) DEFAULT NULL,
  `descriptionServ` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`numServ`, `designationServ`, `descriptionServ`) VALUES
(1, 'vente', NULL),
(2, 'approvisionnement', NULL),
(3, 'réclamation', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `numUser` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `type` enum('AD','US') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`numUser`, `login`, `password`, `type`) VALUES
(11, 'salma', '238549', 'US'),
(12, 'meriem', '296276', 'US'),
(13, 'oumaima', '238269', 'AD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `numServ` (`numServ`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`numServ`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`numUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `numServ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `numUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_ibfk_1` FOREIGN KEY (`numServ`) REFERENCES `services` (`numServ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
