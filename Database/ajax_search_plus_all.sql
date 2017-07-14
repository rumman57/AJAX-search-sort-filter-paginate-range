-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 08:28 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax_search_plus_all`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(6, 'Apple Cinema 30" ', 'images/8a2fb32f0c.jpg', 107.34),
(7, 'Canon EOS 5D', 'images/ca9f21feb0.jpg', 96.00),
(8, 'Ipad Classic', 'images/17ac7e3511.jpg', 1300.34),
(9, 'iPad Retina 2', 'images/20c83ddd2c.jpg', 1500.34),
(10, 'iPhone 4s', 'images/941386561d.jpg', 2000.34),
(11, 'iPhone 5s', 'images/0db3dfa755.jpg', 2300.34),
(12, 'Laptop Treo Pro', 'images/b245f8cc65.jpg', 3000.43),
(13, 'Nikon D300', 'images/02347b3545.jpg', 2534.23),
(14, 'iPhone 4s', 'images/615dcb0b19.jpg', 2323.23),
(15, 'Ipad Classic', 'images/044583c5f2.jpg', 3424.23),
(16, 'Canon EOS 5D', 'images/a182a42da9.jpg', 4323.43),
(17, 'Apple Cinema 30" ', 'images/4dea4feed6.jpg', 432.40),
(18, 'Canon EOS 5D', 'images/f2798bec10.jpg', 342.43),
(19, 'iPad Retina 2', 'images/152bf1ad5e.jpg', 3423.34),
(20, 'Laptop Treo Pro', 'images/a75ea2a69c.jpg', 5423.34),
(21, 'Nikon D300', 'images/8a586a9c2c.jpg', 4234.34),
(22, 'Canon EOS 5D', 'images/f28fdece9c.jpg', 452.43),
(23, 'iPhone 5s', 'images/70114fdd33.jpg', 6345.42),
(24, 'Apple Cinema 30" ', 'images/60f123b62e.jpg', 3242.42),
(25, 'Canon EOS 5D', 'images/3f970edaef.jpg', 974.43),
(26, 'Laptop Treo Pro', 'images/8afd611a9b.jpg', 7645.42),
(27, 'Nikon D300', 'images/706c549712.jpg', 4322.34),
(28, 'Ipad Classic', 'images/8f300604c2.jpg', 423.45),
(29, 'iPad Retina 2', 'images/66c34c3ad0.jpg', 6532.43),
(30, 'Laptop Treo Pro', 'images/cbc33ebb1d.jpg', 8235.32),
(31, 'iPhone 4s', 'images/42c2940265.jpg', 5436.43),
(32, 'Canon EOS 5D', 'images/16b245fe3e.jpg', 645.43),
(33, 'Laptop Treo Pro', 'images/b85e15bcfd.jpg', 7454.42),
(34, 'Ipad Classic', 'images/0cfd0fe300.jpg', 9244.34),
(35, 'Apple Cinema 30" ', 'images/68f5b20980.jpg', 10423.40),
(36, 'Nikon D300', 'images/e9b1a333f3.jpg', 5424.32),
(37, 'iPhone 5s', 'images/6c1c64774b.jpg', 9424.32),
(38, 'iPad Retina 2', 'images/8861805a98.jpg', 8243.42),
(39, 'Laptop Treo Pro', 'images/5b0976bc69.jpg', 7424.23),
(40, 'Ipad Classic', 'images/cdecbca5f7.jpg', 6432.43),
(41, 'Nikon D300', 'images/de836fd7c1.jpg', 7421.42),
(42, 'Laptop Treo Pro', 'images/f86be11b38.jpg', 11000.00),
(43, 'Apple Cinema 30" ', 'images/522911f934.jpg', 8234.43),
(44, 'iPad Retina 2', 'images/334acabcd1.jpg', 5234.42),
(45, 'iPhone 4s', 'images/b6ddbb34a2.jpg', 6345.43),
(46, 'iPhone 5s', 'images/726401924a.jpg', 6233.42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
