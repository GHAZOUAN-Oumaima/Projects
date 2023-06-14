-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 02:09 PM
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
-- Database: `gl`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num_telephone` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `adresse`, `email`, `num_telephone`, `ville`, `code_postal`, `password`) VALUES
(1, 'GHAZOUAN', 'Oumaima', 'dcheira', 'admin@gmail.com', 2147483647, 'agadir', 86352, '1234'),
(14, 'GHAZOUAN', 'sara', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', 'oumayma070502@gmail.com', 2147483647, 'agadir', 86352, '1111'),
(15, 'GHAZOUAN', 'sara', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', 'sara2005ghazouan@gmail.com', 2147483647, 'agadir', 86352, '0000'),
(16, 'GHAZOUAN', 'sara', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', 'oumaima_ghazouan@um5.ac.ma', 2147483647, 'agadir', 86352, '1111'),
(17, 'GHAZOUAN', 'sara', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', 'oumaimaghazouan@gmail.com', 2147483647, 'agadir', 86352, '1111'),
(18, 'GHAZOUAN', 'sara', 'HAY RABIAA RUE 771 NR 13 DCHEIRA', 'saraghazouan@gmail.com', 2147483647, 'agadir', 86352, '1111');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `statut_commande` tinyint(1) NOT NULL,
  `id_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contenir`
--

CREATE TABLE `contenir` (
  `quantité_commandée` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `file_name` varchar(100) NOT NULL,
  `uploaded_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manuel`
--

CREATE TABLE `manuel` (
  `id_manuel` int(11) NOT NULL,
  `titre_manuel` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `matière` varchar(100) NOT NULL,
  `niveau` varchar(100) NOT NULL,
  `édition` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantité_de_stock` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manuel`
--

INSERT INTO `manuel` (`id_manuel`, `titre_manuel`, `description`, `matière`, `niveau`, `édition`, `prix`, `quantité_de_stock`) VALUES
(1, 'Manuel d\'arabe ', 'manuel scolaire', 'arabe ', '1', '3', 35, 100),
(2, 'Manuel d\'arabe', 'manuel scolaire', 'arabe ', '2', '3', 80, 100),
(3, 'Manuel d\'arabe', 'manuel scolaire', 'arabe ', '3', '3', 40, 100),
(4, 'Manuel d\'arabe ', 'manuel scolaire', 'arabe ', '4', '3', 35, 100),
(5, 'Manuel d\'arabe ', 'manuel scolaire', 'arabe ', '5', '3', 35, 100),
(6, 'Manuel d\'arabe ', 'manuel scolaire', 'arabe ', '6', '3', 35, 100),
(7, 'Manuel de francais ', 'manuel scolaire', 'francais ', '1', '3', 35, 100),
(8, 'Manuel de francais ', 'manuel scolaire', 'francais ', '2', '3', 35, 100),
(9, 'Manuel de francais ', 'manuel scolaire', 'francais ', '3', '3', 35, 100),
(10, 'Manuel de francais ', 'manuel scolaire', 'francais ', '4', '3', 35, 100),
(11, 'Manuel de francais ', 'manuel scolaire', 'francais ', '5', '3', 35, 100),
(12, 'Manuel de francais ', 'manuel scolaire', 'francais ', '6', '3', 35, 100),
(13, 'Manuel de maths ', 'manuel scolaire', 'francais ', '1', '3', 35, 100),
(14, 'Manuel de maths ', 'manuel scolaire', 'maths ', '2', '3', 35, 100);

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiment` int(11) NOT NULL,
  `date_paiment` int(11) NOT NULL,
  `id_commande` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`login`, `password`) VALUES
('admin@gmail.com', '1234'),
('ouma@gmail.com', '1234'),
('oumaimaghazouan@gmail.com', '1111'),
('oumaima_ghazouan@um5.ac.ma', '1111'),
('oumayma070502@gmail.com', '1111'),
('sara2005ghazouan@gmail.com', '0000'),
('saraghazouan@gmail.com', '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_commande_client` (`id_client`);

--
-- Indexes for table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`quantité_commandée`);

--
-- Indexes for table `manuel`
--
ALTER TABLE `manuel`
  ADD PRIMARY KEY (`id_manuel`);

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD KEY `fk_paiment_commande` (`id_commande`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `UNIQUE` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contenir`
--
ALTER TABLE `contenir`
  MODIFY `quantité_commandée` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manuel`
--
ALTER TABLE `manuel`
  MODIFY `id_manuel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Constraints for table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `fk_paiment_commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
