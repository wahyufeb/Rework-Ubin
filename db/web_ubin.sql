-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Mar 2019 pada 15.55
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

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
-- Struktur dari tabel `costs`
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
  `total` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `costs`
--

INSERT INTO `costs` (`id_cost`, `id_user`, `province`, `city`, `courier`, `service`, `postal_code`, `street_adress`, `total`) VALUES
(1, 25, 'Bali', 'Buleleng', 'jne', '40000,REG(Layanan Reguler)', 12345, 'asdfgh', 440000),
(2, 25, 'Bali', 'Buleleng', 'jne', '40000,REG(Layanan Reguler)', 12345, 'asdfgh', 440000),
(3, 25, 'Bengkulu', 'Kepahiang', 'pos', '63500,Paket Kilat Khusus(Paket Kilat Khusus)', 13542, 'Jl. Raya No 23', 463500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `status` enum('paid','unpaid','canceled','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id_invoice`, `id_user`, `date`, `due_date`, `status`) VALUES
(1, 25, '2019-03-09 22:01:55', '2019-03-11 22:01:55', 'unpaid'),
(2, 25, '2019-03-09 22:25:09', '2019-03-11 22:25:09', 'unpaid'),
(3, 25, '2019-03-09 22:25:43', '2019-03-11 22:25:43', 'unpaid'),
(4, 25, '2019-03-10 21:33:03', '2019-03-12 21:33:03', 'unpaid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` bigint(100) NOT NULL,
  `id_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
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
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_product`, `image`, `name`, `price`, `weight`, `description`, `stock`, `catagory`, `sold`, `discount`) VALUES
(1, '2.jpg', 'Gucci gang', 100000, 120, 'lorem ipsum is amet', 99, 'gucci', 31, 90),
(2, '3.jpg', 'Mugs', 200000, 100, 'beautiful mugs', 25, 'Mugs', 35, 0),
(4, '1.jpg', 'ceramics', 200000, 100, 'lorem ipsum is amet', 62, 'ceramics', 28, 0),
(6, '4.jpg', 'Cup Starbucks', 100000, 200, '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, quos! Veniam minima voluptate inventore fuga eligendi molestiae. Placeat eius perferendis minus, a repellat tempora, ipsa provident animi expedita sequi voluptatum!\r\n     Lorem ipsum dolo', 59, '', 31, 70),
(7, '5.jpg', 'Black Mugs', 150000, 300, 'Black Mugs is beautiful', 298, 'Mugs', 56, 80),
(8, 'brown.jpg', 'Brown Cups', 200000, 300, 'Brown Mugs ', 19, 'Mugs', 1, 50),
(9, 'mugs.jpg', 'Mugs tigers', 200000, 100, 'Mugs Tigers beautiful', 22, 'Mugs', 60, 0),
(10, 'vase.jpg', 'Vase', 100000, 200, 'White Vase', 38, 'Vase', 112, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id_testi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `token`, `photo`, `name`, `province`, `city`, `street`, `telephone`, `password`, `level`, `active`) VALUES
(24, 'febriantowahyu083@gmail.com', '', 'user.svg', 'Wahyu Febrianto', '', '', '', '', '32c9e71e866ecdbc93e497482aa6779f', 'member', 1),
(25, 'febriantowahyu63@gmail.com', '', 'user.svg', 'Wahyu  Febrianto', '', '', '', '', '32c9e71e866ecdbc93e497482aa6779f', 'member', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id_cost`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_cost` (`id_cost`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `costs`
--
ALTER TABLE `costs`
  MODIFY `id_cost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
