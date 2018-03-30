-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2018 at 05:27 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pupper`
--
CREATE DATABASE IF NOT EXISTS `pupper` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pupper`;

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_ID` int(2) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Breed` varchar(25) NOT NULL,
  `Age` int(2) NOT NULL,
  `Adopted` int(1) NOT NULL,
  `UserId` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_ID`, `Name`, `Breed`, `Age`, `Adopted`, `UserId`) VALUES
(1, 'Scooby', 'Greyhound', 1, 0, NULL),
(2, 'Bruno', 'Golden Retreiver', 2, 0, NULL),
(3, 'Baloo', 'Shaggy Dog', 13, 0, NULL),
(5, 'Mage', 'Red Indian', 1, 0, NULL),
(6, 'Parry', 'Parakeet', 0, 0, NULL),
(7, 'Albie', 'Hamster', 1, 0, NULL),
(8, 'Rabby', 'Bunny Rabbit', 1, 0, NULL),
(9, 'Toothless', 'Cat', 1, 0, NULL),
(10, 'Mycroft', 'Cat', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Supplies`
--

CREATE TABLE `Supplies` (
  `P_ID` int(3) NOT NULL,
  `Products` varchar(50) NOT NULL,
  `Price` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Supplies`
--

INSERT INTO `Supplies` (`P_ID`, `Products`, `Price`) VALUES
(11, 'All4Pets Oat Coat Shampoo 200 ml', '295'),
(10, 'All4Pets Slicker Brush Small', '250'),
(9, 'Drools Adult Chicken in Gravy Dog Food', '150'),
(8, 'Hills Science Plan Adult Lamb and Rice', '5400'),
(7, 'Pedigree Adult Dog Combo Meat and Rice', '1550'),
(6, 'Pet Brands Cat litter Crystals 170 gms', '199'),
(5, 'Petsworld Self Cleaning Slicker Brush', '250'),
(4, 'priceRoyal Canin Veterinary Diet Dry Skin', '6855'),
(3, 'Royal Canin Medium Starter Dog Food 4 Kg', '2400'),
(2, 'Royal Canin Rottweiler Junior Dog Food 3 Kg', '1683'),
(1, 'Sera Air  550 R Plus Fish Aquarium Air Pump ', '3375');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserId` varchar(30) NOT NULL,
  `Passwd` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `cart` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserId`, `Passwd`, `Email`, `cart`) VALUES
('mehak', 'm123', 'mehak@gmail.com', '2+'),
('test', 'qwerty', 'test@test', ''),
('udaiAg', 'testtest', 'udaiag@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_ID`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `Supplies`
--
ALTER TABLE `Supplies`
  ADD PRIMARY KEY (`Products`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
