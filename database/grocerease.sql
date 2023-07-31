-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 09:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerease`
--

-- --------------------------------------------------------

--
-- Table structure for table `manage_product`
--

CREATE TABLE `manage_product` (
  `prodID` int(11) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `prodCate` varchar(255) NOT NULL,
  `prodPrice` float(11,2) NOT NULL,
  `prodQuan` varchar(255) NOT NULL,
  `manufact` varchar(255) NOT NULL,
  `manuDate` date NOT NULL DEFAULT current_timestamp(),
  `expiDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_product`
--

INSERT INTO `manage_product` (`prodID`, `prodName`, `prodCate`, `prodPrice`, `prodQuan`, `manufact`, `manuDate`, `expiDate`) VALUES
(8, 'Lucky Me Pancit Canton', 'Instant Food', 16.00, '80kg', 'Monde Nissin', '2023-01-15', '2023-05-15'),
(9, 'Nissin Yakisoba', 'Instant Food', 11.00, '59g', 'Nissin F. Holdings', '2023-01-15', '2023-05-15'),
(10, 'Payless Xtra Big', 'Instant Food', 18.00, '130g', 'Nissin F. Holdings', '2023-01-15', '2023-05-15'),
(11, 'Shin Ramyun Ramen', 'Instant Food', 91.00, '120g', 'Nongshim', '2023-01-15', '2023-05-15'),
(12, 'Indomie Mi Goreng', 'Instant Food', 15.00, '80g', 'Indofood', '2023-01-15', '2023-05-15'),
(16, 'Hotdog', 'Frozen Foods', 20.00, '5kg', 'PureFoods', '2023-07-19', '2026-10-19'),
(21, 'Tomato Ketchup', 'Herbs and Spices', 100.00, '20pcs', 'Heinz', '2021-02-02', '2024-10-15'),
(22, 'Piattos', 'Snacks and Chips', 15.00, '25kg', 'Jack and Jill', '2023-07-01', '2023-06-07'),
(23, 'Piattos', 'Snacks and Chips', 12.00, '231kg', 'Jack and Jill', '2023-07-13', '2023-08-10'),
(25, 'Spaghetti', 'Canned Goods', 322.00, '233kg', 'Nissin', '2023-04-05', '2023-07-25'),
(26, 'Mango', 'Beverages', 30.00, '60kg', 'Zesto', '2022-12-06', '2023-08-05'),
(27, 'Tuna Afritada', 'Canned Goods', 35.00, '41kg', '555', '2024-10-15', '2023-08-04'),
(38, 'Sardines', 'Canned Goods', 36.00, '91kg', 'Mega', '2023-06-01', '2023-08-03'),
(39, 'Milk', 'Dairy', 125.00, '81kg', 'Nestle', '2023-05-08', '2023-08-02'),
(40, 'Ice Cream', 'Frozen Foods', 250.00, '30kg', 'Selecta', '2023-05-01', '2023-08-01'),
(41, 'Chicken', 'Meat Poultry', 190.00, '12kg', 'Bounty Fresh', '2023-01-19', '2023-07-31'),
(42, 'Bread', 'Bakery', 20.00, '70kg', 'Bread Talk', '2023-07-27', '2023-07-30'),
(43, 'Ham', 'Meat Poultry', 80.00, '65kg', 'CDO', '2023-01-26', '2023-08-06'),
(44, 'Meatloaf', 'Canned Goods', 31.00, '95kg', 'Argentina', '2023-01-23', '2023-08-07'),
(45, 'Pancit Canton Sweet & Spicy', 'Instant Food', 15.00, '30kg', 'Lucky Me', '2022-09-07', '2023-08-04'),
(46, 'Oreo', 'Snacks and Chips', 10.00, '50kg', 'Oreo', '2022-05-28', '2023-07-28'),
(47, 'Fudgee Barr', 'Snacks and Chips', 10.00, '21kg', 'Rebisco', '2022-05-11', '2023-07-26'),
(48, 'Fresh Milk', 'Dairy', 80.00, '1L', 'Farm Fresh Co.', '2023-07-05', '2023-12-14'),
(49, 'Chicken Nuggets', 'Meat Poultry', 120.00, '500g', 'Happy Farms Inc.', '2023-05-02', '2023-12-06'),
(50, 'Lettuce', 'Vegetables', 40.00, '250g', 'Green Fields Farm', '2023-06-12', '2023-09-04'),
(51, 'Fresh Orange Juice', 'Beverages', 60.00, '500L', 'Citrus Delight Inc.', '2023-06-07', '2023-09-25'),
(52, 'Sliced Bread', 'Bakery', 45.00, '400g', 'Gardenia', '2023-07-31', '2023-09-12'),
(53, 'Yogurt', 'Dairy', 30.00, '200g', 'Probiotic Delights Co.', '2023-07-11', '2023-09-23'),
(54, 'Tomatoes', 'Vegetables', 20.00, '30pcs', 'Fresh Harvest Farms', '2023-06-24', '2023-09-26'),
(55, 'Eggs', 'Meat Poultry', 6.00, '30kg', 'Eggnog', '2023-07-02', '2023-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`) VALUES
(39, 'Raven', 'williamminerva2112@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', ''),
(40, 'Nero', 'augustusnero2020@gmail.com', '698d51a19d8a121ce581499d7b701668', ''),
(41, 'Joshua', 'markjoshuamutya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manage_product`
--
ALTER TABLE `manage_product`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manage_product`
--
ALTER TABLE `manage_product`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
