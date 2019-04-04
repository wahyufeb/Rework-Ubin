-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2019 at 04:59 AM
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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `problem_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id_cost`, `id_user`, `province`, `city`, `courier`, `service`, `postal_code`, `street_adress`, `total_cost`) VALUES
(1, 29, 'Bangka Belitung', 'Bangka', 'jne', '56000,REG(Layanan Reguler)', 11321, 'Jl. Bangka No 143', 56000),
(2, 30, 'Kepulauan Riau', 'Lingga', 'jne', '60000,REG(Layanan Reguler)', 14658, 'Jl. Lingga No 1324', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `status` enum('paid','unpaid','confirmation process','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id_invoice`, `id_user`, `date`, `due_date`, `status`) VALUES
(1, 29, '2019-04-02 11:13:13', '2019-04-04 11:13:13', 'paid'),
(2, 30, '2019-04-02 11:39:58', '2019-04-04 11:39:58', 'paid');

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
  `total` bigint(20) NOT NULL,
  `transaction_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_invoice`, `id_user`, `id_product`, `qty`, `id_cost`, `total`, `transaction_code`) VALUES
(1, 1, 29, 23, 1, 1, 300000, 'ZLPXWLJJTP'),
(2, 1, 29, 13, 1, 1, 300000, 'ZLPXWLJJTP'),
(3, 1, 29, 7, 1, 1, 30000, 'ZLPXWLJJTP'),
(4, 2, 30, 9, 1, 2, 200000, '52E34YBL20'),
(5, 2, 30, 2, 1, 2, 200000, '52E34YBL20'),
(6, 2, 30, 17, 1, 2, 170000, '52E34YBL20'),
(7, 2, 30, 22, 1, 2, 230000, '52E34YBL20'),
(8, 2, 30, 23, 1, 2, 300000, '52E34YBL20');

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
(1, '2.jpg', 'Gucci gang', 100000, 120, 'lorem ipsum is amet', 96, 'gucci', 34, 90),
(2, '3.jpg', 'Mugs', 200000, 100, 'beautiful mugs', 14, 'Mugs', 46, 0),
(4, '1.jpg', 'ceramics', 200000, 100, 'lorem ipsum is amet', 57, 'ceramics', 33, 0),
(6, '4.jpg', 'Cup Starbucks', 100000, 200, '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, quos! Veniam minima voluptate inventore fuga eligendi molestiae. Placeat eius perferendis minus, a repellat tempora, ipsa provident animi expedita sequi voluptatum!\r\n     Lorem ipsum dolo', 57, '', 33, 70),
(7, '5.jpg', 'Black Mugs', 150000, 300, 'Black Mugs is beautiful', 276, 'Mugs', 78, 80),
(8, 'Witch-City-Mugs1.jpg', 'Brown Cups', 200000, 300, 'Brown Mugs ', 19, 'Mugs', 1, 50),
(9, 'mugs.jpg', 'Mugs tigers', 200000, 100, 'Mugs Tigers beautiful', 8, 'Mugs', 74, 0),
(10, 'vase.jpg', 'Vase', 100000, 200, 'White Vase', 31, 'Vase', 119, 10),
(13, '71A+vgWQD4L__SX425_.jpg', 'Mugs 3D', 300000, 200, 'Beautiful 3D Mugs', 8, 'mugs', 2, 0),
(17, 'il_340x270_1555536095_3ykt.jpg', 'Ceramic Mug', 170000, 120, 'Beautifull Mugs', 37, 'mugs', 3, 0),
(19, 'Witch-City-Mugs.jpg', 'Twin Mug', 300000, 80, 'Beautifull Twin Mugs', 47, 'mugs', 3, 0),
(22, '81gHNg19u1L__SX425_.jpg', 'Dino Mugs', 230000, 120, '\r\n        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde libero illum quos nesciunt ad officiis consequuntur cum quibusdam consequatur iste. Animi possimus, nesciunt cumque ex deleniti sunt unde. Ea, aspernatur?', 35, 'mugs', 5, 0),
(23, 'images.jpg', 'Ninja Mug', 300000, 120, '\r\n        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde libero illum quos nesciunt ad officiis consequuntur cum quibusdam consequatur iste. Animi possimus, nesciunt cumque ex deleniti sunt unde. Ea, aspernatur?', 97, 'mugs', 3, 0),
(24, 'unicornn.jpg', 'Unicorn Mug', 200000, 120, '\r\n        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde libero illum quos nesciunt ad officiis consequuntur cum quibusdam consequatur iste. Animi possimus, nesciunt cumque ex deleniti sunt unde. Ea, aspernatur?\r\n        Lorem ipsum dolor s', 97, 'mugs', 3, 0);

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
(1, 30, 7, 'bagus sekali...', '30-Mar-2019'),
(2, 29, 2, 'good sangad...', '30-Mar-2019'),
(3, 29, 2, 'packing rapih :v', '30-Mar-2019');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `transaction_code` varchar(10) NOT NULL,
  `transaction_image` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_payment` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `transaction_code`, `transaction_image`, `id_user`, `total_payment`) VALUES
(4, 'ZLPXWLJJTP', 'IMG-20180111-WA0144.jpg', 29, 686000),
(5, '52E34YBL20', 'IMG-20180111-WA01441.jpg', 30, 1160000);

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
(26, 'admin@gmail.com', '', 'face23.jpg', 'admin admin', '', '', '', '', '$2y$10$LG1rEpVSgVfUSUtIwNGkpuou32tj3FcJBSwWfwVKyi0IjD0r9mVXy', 'admin', 1),
(29, 'user1@gmail.com', '', 'user.svg', 'user 1', 'Jawa Timur', 'Malang', 'Jl. Lorem Malang wkwkwkwk', '08969696961212', '$2y$10$ff7RSKCV/1Sq10kLa2LC9OfMuOcfBSCUzvxm44oV7QpfNBjTyJkMK', 'member', 0),
(30, 'febriantowahyu63@gmail.com', '0.6127523035649369', 's.jpg', 'Wahyu Febrianto', '', '', '', '', '$2y$10$t7MnRFVn3eoBA4UoSypFoOmX05YRBWaZ6UyECv6r1vAPRRGozUYVC', 'member', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`);

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id_cost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
