-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 02:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `explorebts`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `tourist_id` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_pict` varchar(255) NOT NULL,
  `category_code` char(4) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_pict`, `category_code`, `unit_price`, `vendor_id`, `product_desc`) VALUES
(1, 'Tenda Kapasitas 2-3 Orang Single Layer', 'tent-2-person.jfif', 'CMP', 18000, 2, 'Tenda Rei biru berkapasitas 2 sampai 3 orang. Single layer dengan kualitas premium'),
(2, 'Tenda Kapasitas 2-3 Orang Double Layer', 'tent-2-person-double-layer.jfif', 'CMP', 23000, 2, 'Tenda Rei orange berkapasitas 2 sampai 3 orang. Double layer dengan kualitas premium. Cocok saat udara dingin');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `category_code` char(4) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`category_code`, `category_name`, `category_desc`) VALUES
('CMP', 'Camping tools', 'Rental of camping tools for camping needs around Bromo-Tengger-Semeru.'),
('INN', 'Inn', 'Rent a temporary residence to rest while visiting Bromo-Tengger-Semeru.'),
('JEEP', 'Jeep', 'Rent a jeep as a vehicle to visit the Bromo-Tengger-Semeru area.'),
('TCK', 'Ticket', 'Electronic ticket to visit certain tourist attraction.'),
('TRV', 'Travel', 'Travel service rental to visit Bromo-Tengger-Semeru with certain packages.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(1) NOT NULL,
  `role_name` varchar(10) NOT NULL,
  `role_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'Vendor', 'Parties who sell or provide goods and services.'),
(2, 'Tourist', 'Tourists who will or are visiting Bromo-Tengger-Semeru National Park.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_pict` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `address`, `phone`, `email`, `password`, `role_id`, `profile_pict`) VALUES
(1, 'Staff Balai Besar TNBTS', 'staff.tnbts', 'Jl. Raden Intan No.6, Polowijen, Kec. Blimbing, Kota Malang, Jawa Timur 65125', '0341491828', 'balaibesartnbts@gmail.com', '446838a6412f45424dacc3ea306cc070', 1, NULL),
(2, 'Kalimati Outdoor', 'kalimatioutdoor', 'Jl. Raya Pulungdowo No.103, Jambu, Pulungdowo, Kec. Tumpang, Malang, Jawa Timur 65156', '085868765670', 'kalimatioutdoor@gmail.com', '082d03eeaf81f8d4347073bcb1543d79', 1, NULL),
(3, 'Nabilah Argyanti', 'nargyanti', 'Jl. Puntadewa Tumpang, Kecamatan Tumpang, Kabupaten Malang', '082257229963', 'nargyanti@gmail.com', '033e343f77ccd828522a48b5085644e9', 2, NULL),
(4, 'Arjuna Rental', 'arjunarental', 'Jl. Arjuna No. 119 Lowokwaru, Malang', '08983117948', 'arjunarental@gmail.com', '0be6b13437a0d536042be08f449c9bcb', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `tourist_id` (`tourist_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_code` (`category_code`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`category_code`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`tourist_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_code`) REFERENCES `product_categories` (`category_code`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
