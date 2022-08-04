-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 08:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `achat`
--

CREATE TABLE `achat` (
  `id_achat` int(11) NOT NULL,
  `date_achat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qte_achat` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_fourn` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `note_achat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_prenom_client` varchar(150) NOT NULL,
  `adresse_client` varchar(150) NOT NULL,
  `tele_client` varchar(50) NOT NULL,
  `note_client` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom_prenom_client`, `adresse_client`, `tele_client`, `note_client`) VALUES
(1, 'omar', 'N°20 mkinsia sale', '0866528255', ''),
(3, 'mohamed amine belfencha', '03 rus sidi mchich sale', '0655763420', '');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id_fourn` int(11) NOT NULL,
  `nom_fourn` varchar(150) NOT NULL,
  `adresse_fourn` varchar(150) NOT NULL,
  `tele_fourn` varchar(30) NOT NULL,
  `note_fourn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fourn`, `nom_fourn`, `adresse_fourn`, `tele_fourn`, `note_fourn`) VALUES
(1, 'DSA Manufacturing', 'Kirazli Mahallesi Mahmutbey Caddesi No 126/102 Bagcilar Istanbul 34200', '0600000000', ''),
(2, 'nike', 'Casablanca Marina-Centre Commercial, Boulevard des Almohades, Casablanca, Casablanca 20000', '05224-73397', ''),
(15, 'mohamed amine belfencha', '03 rus sidi mchich sale', '0655763422', '');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_prod` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `pu_prod` float NOT NULL,
  `type_prod` varchar(50) NOT NULL,
  `prix_vente` float NOT NULL,
  `note_prod` text NOT NULL,
  `code_serie` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_prod`, `libelle`, `pu_prod`, `type_prod`, `prix_vente`, `note_prod`, `code_serie`) VALUES
(3, 'zara', 150, 'basket', 200, '', '884hjghrh'),
(4, 'zara', 150, 'basket', 200, '', '884hjghrh'),
(5, 'zara', 150, 'basket', 200, '', '884hjghrh'),
(6, 'zara', 150, 'basket', 200, '', '884hjghrh'),
(7, 'zara', 150, 'basket', 200, '', '884hjghrh'),
(8, 'zara', 150, 'basket', 200, '', '884hjghrh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `CodeCin` varchar(30) NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `tele_user` varchar(50) NOT NULL,
  `type_user` varchar(35) NOT NULL,
  `note` text NOT NULL,
  `log` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `CodeCin`, `login_user`, `password_user`, `nom_user`, `prenom_user`, `tele_user`, `type_user`, `note`, `log`, `status`) VALUES
(1, 'AE182514', 'medamene', '1234', 'belfencha', 'mohamed amine', '0655763422', 'admin', '', '14-07-22 07:20:20', 1),
(2, 'AB11144', 'em_akram', '123456', 'akram', 'elhaimer', '0688888888', 'employee', '', '14-07-22 07:20:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `id_vente` int(11) NOT NULL,
  `date_vente` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qte_vente` int(11) NOT NULL,
  `pu_vente` float NOT NULL,
  `mouvement` varchar(150) NOT NULL,
  `rn_vente` varchar(50) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pu_achat` float NOT NULL,
  `note_vente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id_achat`),
  ADD KEY `id_fourn_fkn` (`id_fourn`),
  ADD KEY `id_prod_fkn` (`id_prod`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id_fourn`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id_vente`),
  ADD KEY `id_prod_fkn_vente` (`id_prod`),
  ADD KEY `id_user_fkn_vente` (`id_user`),
  ADD KEY `id_client_fkn_vente` (`id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achat`
--
ALTER TABLE `achat`
  MODIFY `id_achat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id_fourn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `id_vente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `id_fourn_fkn` FOREIGN KEY (`id_fourn`) REFERENCES `fournisseurs` (`id_fourn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_prod_fkn` FOREIGN KEY (`id_prod`) REFERENCES `produits` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `id_client_fkn_vente` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_prod_fkn_vente` FOREIGN KEY (`id_prod`) REFERENCES `produits` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_fkn_vente` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
