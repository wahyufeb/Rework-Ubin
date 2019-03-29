-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2019 at 07:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ubin`
--

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id_cost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `courier` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `postal_code` bigint(100) NOT NULL,
  `street_adress` varchar(100) NOT NULL,
  `total_cost` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `status` enum('paid','unpaid','canceled','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` bigint(100) NOT NULL,
  `id_cost` int(11) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` bigint(100) NOT NULL,
  `weight` bigint(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock` bigint(100) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `sold` bigint(100) NOT NULL,
  `discount` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `image`, `name`, `price`, `weight`, `description`, `stock`, `catagory`, `sold`, `discount`) VALUES
(1, '2.jpg', 'Gucci gang', 100000, 120, 'lorem ipsum is amet', 99, 'gucci', 31, 90),
(2, '3.jpg', 'Mugs', 200000, 100, 'beautiful mugs', 19, 'Mugs', 41, 0),
(4, '1.jpg', 'ceramics', 200000, 100, 'lorem ipsum is amet', 59, 'ceramics', 31, 0),
(6, '4.jpg', 'Cup Starbucks', 100000, 200, '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, quos! Veniam minima voluptate inventore fuga eligendi molestiae. Placeat eius perferendis minus, a repellat tempora, ipsa provident animi expedita sequi voluptatum!\r\n     Lorem ipsum dolo', 59, '', 31, 70),
(7, '5.jpg', 'Black Mugs', 150000, 300, 'Black Mugs is beautiful', 287, 'Mugs', 67, 80),
(8, 'Witch-City-Mugs1.jpg', 'Brown Cups', 200000, 300, 'Brown Mugs ', 19, 'Mugs', 1, 50),
(9, 'mugs.jpg', 'Mugs tigers', 200000, 100, 'Mugs Tigers beautiful', 15, 'Mugs', 67, 0),
(10, 'vase.jpg', 'Vase', 100000, 200, 'White Vase', 37, 'Vase', 113, 10),
(13, '71A+vgWQD4L__SX425_.jpg', 'Mugs 3D', 300000, 200, 'Beautiful 3D Mugs', 9, 'mugs', 1, 0),
(17, 'il_340x270_1555536095_3ykt.jpg', 'Ceramic Mug', 170000, 120, 'Beautifull Mugs', 39, 'mugs', 1, 0),
(19, 'Witch-City-Mugs.jpg', 'Twin Mug', 300000, 80, 'Beautifull Twin Mugs', 48, 'mugs', 2, 0),
(22, '81gHNg19u1L__SX425_.jpg', 'Dino Mugs', 230000, 120, '\r\n        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde libero illum quos nesciunt ad officiis consequuntur cum quibusdam consequatur iste. Animi possimus, nesciunt cumque ex deleniti sunt unde. Ea, aspernatur?', 37, 'mugs', 3, 0),
(23, 'images.jpg', 'Ninja Mug', 300000, 120, '\r\n        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde libero illum quos nesciunt ad officiis consequuntur cum quibusdam consequatur iste. Animi possimus, nesciunt cumque ex deleniti sunt unde. Ea, aspernatur?', 99, 'mugs', 1, 0),
(24, 'unicornn.jpg', 'Unicorn Mug', 200000, 120, '\r\n        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde libero illum quos nesciunt ad officiis consequuntur cum quibusdam consequatur iste. Animi possimus, nesciunt cumque ex deleniti sunt unde. Ea, aspernatur?\r\n        Lorem ipsum dolor s', 98, 'mugs', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id_comment`, `id_user`, `id_product`, `comment`, `date_created`) VALUES
(3, 27, 2, 'asdas', '26-Mar-2019'),
(4, 27, 9, 'Packing bagus banget', '26-Mar-2019'),
(5, 27, 9, 'Harganya bersahabat', '26-Mar-2019'),
(7, 27, 9, 'good', '26-Mar-2019');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `transaction_code` varchar(10) NOT NULL,
  `transaction_image` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('member','admin','super_admin','') NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `token`, `photo`, `name`, `province`, `city`, `street`, `telephone`, `password`, `level`, `active`) VALUES
(26, 'admin@gmail.com', '', 'user.svg', 'admin admin', '', '', '', '', '$2y$10$LG1rEpVSgVfUSUtIwNGkpuou32tj3FcJBSwWfwVKyi0IjD0r9mVXy', 'admin', 1),
(29, 'user1@gmail.com', '', 'user.svg', 'user 1', 'Jawa Timur', 'Malang', 'Jl. Lorem Malang wkwkwkwk', '08969696961212', '$2y$10$ff7RSKCV/1Sq10kLa2LC9OfMuOcfBSCUzvxm44oV7QpfNBjTyJkMK', 'member', 1),
(30, 'febriantowahyu63@gmail.com', '0.6127523035649369', 's.jpg', 'Wahyu Febrianto', '', '', '', '', '$2y$10$t7MnRFVn3eoBA4UoSypFoOmX05YRBWaZ6UyECv6r1vAPRRGozUYVC', 'member', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id_cost`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_cost` (`id_cost`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id_cost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
