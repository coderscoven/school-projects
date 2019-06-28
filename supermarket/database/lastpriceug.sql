-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 07:31 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lastpriceug`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_details`
--

CREATE TABLE `admin_login_details` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(64) DEFAULT NULL,
  `admin_user_name` varchar(10) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login_details`
--

INSERT INTO `admin_login_details` (`admin_id`, `admin_email`, `admin_user_name`, `admin_password`, `reg_date`) VALUES
(1, 'ruperic25@gmail.com', 'oliver', '$2y$10$Acp6lc9bqHj5F4gMM3rPweLiNOh.Q4JobUHR7mRsIyMZ2ytpiZHjW', '2018-02-19 10:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `all_users_login_details`
--

CREATE TABLE `all_users_login_details` (
  `Cmplx_id` int(11) NOT NULL,
  `Cmplx_username` varchar(12) NOT NULL,
  `Cmplx_phone` varchar(13) NOT NULL,
  `Cmplx_email` varchar(64) DEFAULT NULL,
  `Cmplx_password_hash` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_users_login_details`
--

INSERT INTO `all_users_login_details` (`Cmplx_id`, `Cmplx_username`, `Cmplx_phone`, `Cmplx_email`, `Cmplx_password_hash`) VALUES
(1, 'thenewt', '0772473175', 'ruperic25@gmail.com', '$2y$10$5BPrtSeGXyYCYs/LvN8q0eCuAWytHes1E5G7mQL3it.GLBQIG399e');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'Electronics'),
(2, 'Grocery Store'),
(3, 'Photos, Gifts & Office Supplies'),
(4, 'Health & Beauty');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `user_name_query` varchar(10) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `user_name_query`, `phone`, `email`, `date`) VALUES
(5, 'thenewt', '0787916686', NULL, '2018-02-16 15:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer_account_delete`
--

CREATE TABLE `customer_account_delete` (
  `customer_id` int(11) NOT NULL,
  `customer_uname` varchar(10) NOT NULL,
  `customer_reason` varchar(70) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(11) NOT NULL,
  `customer_username` varchar(15) NOT NULL,
  `full_names` varchar(25) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` varchar(20) NOT NULL,
  `item_qty` varchar(10) NOT NULL,
  `item_size` varchar(30) DEFAULT NULL,
  `item_color` varchar(20) DEFAULT NULL,
  `item_brand` varchar(30) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery` varchar(25) NOT NULL,
  `payment_status` varchar(15) NOT NULL,
  `order_status` varchar(15) NOT NULL,
  `order_receipt` varchar(15) NOT NULL,
  `notes` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `customer_username`, `full_names`, `product_code`, `item_name`, `item_price`, `item_qty`, `item_size`, `item_color`, `item_brand`, `location`, `date_ordered`, `delivery`, `payment_status`, `order_status`, `order_receipt`, `notes`) VALUES
(4, 'thenewt', 'Rupiny Eric', '8658610', 'Camera', '95000', '1', NULL, NULL, NULL, '', '2018-04-11 19:07:41', 'In-person', 'Not Paid', 'New order', 'KTOcd27', 'Lorem Ipsum'),
(3, 'thenewt', 'Rupiny Eric', '5957020', 'Exercise book', '5000', '1', NULL, NULL, NULL, '', '2018-04-11 19:07:41', 'In-person', 'Not Paid', 'New order', 'KTOcd27', 'Lorem Ipsum'),
(5, 'thenewt', 'Rupiny Eric', '9959656', 'Flat iron', '25000', '1', NULL, NULL, NULL, 'Namugongo - Jjanda', '2018-04-11 19:28:37', 'Delivery', 'Not Paid', 'New order', '1luSgNB', 'Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `grouped_orders`
--

CREATE TABLE `grouped_orders` (
  `id` int(11) NOT NULL,
  `customer_username` varchar(15) NOT NULL,
  `order_receipt` varchar(15) NOT NULL,
  `order_status` varchar(15) NOT NULL,
  `payment_status` varchar(15) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `full_names` varchar(25) NOT NULL,
  `total_amount` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grouped_orders`
--

INSERT INTO `grouped_orders` (`id`, `customer_username`, `order_receipt`, `order_status`, `payment_status`, `date_time`, `full_names`, `total_amount`) VALUES
(2, 'thenewt', 'KTOcd27', 'New order', 'Not Paid', '2018-04-11 19:07:41', 'Rupiny Eric', '100000'),
(3, 'thenewt', '1luSgNB', 'New order', 'Not Paid', '2018-04-11 19:28:37', 'Rupiny Eric', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed`
--

CREATE TABLE `recently_viewed` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `product_code` varchar(15) DEFAULT NULL,
  `image_one` varchar(100) DEFAULT NULL,
  `smkt_name` varchar(100) DEFAULT NULL,
  `smkt_price` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `scat_id` int(11) NOT NULL,
  `scategory` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`scat_id`, `scategory`) VALUES
(1, 'Personal Health'),
(2, 'Home Appliances'),
(3, 'Food Store'),
(4, 'Beverages'),
(5, 'Office Stationary');

-- --------------------------------------------------------

--
-- Table structure for table `supermarket_products`
--

CREATE TABLE `supermarket_products` (
  `smkt_id` int(11) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `smkt_name` varchar(25) NOT NULL,
  `smkt_qty` int(11) NOT NULL,
  `smkt_price` int(11) NOT NULL,
  `smkt_size` varchar(50) DEFAULT NULL,
  `smkt_color` varchar(25) DEFAULT NULL,
  `smkt_category` varchar(100) NOT NULL,
  `smkt_subcategory` varchar(50) NOT NULL,
  `smkt_description` varchar(250) NOT NULL,
  `smkt_availability` varchar(25) DEFAULT NULL,
  `smkt_condition` varchar(100) DEFAULT NULL,
  `smkt_brand` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_one` varchar(200) DEFAULT NULL,
  `image_two` varchar(200) DEFAULT NULL,
  `image_three` varchar(200) DEFAULT NULL,
  `image_four` varchar(200) DEFAULT NULL,
  `image_five` varchar(200) DEFAULT NULL,
  `image_six` varchar(200) DEFAULT NULL,
  `recommended` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supermarket_products`
--

INSERT INTO `supermarket_products` (`smkt_id`, `product_code`, `smkt_name`, `smkt_qty`, `smkt_price`, `smkt_size`, `smkt_color`, `smkt_category`, `smkt_subcategory`, `smkt_description`, `smkt_availability`, `smkt_condition`, `smkt_brand`, `date`, `image_one`, `image_two`, `image_three`, `image_four`, `image_five`, `image_six`, `recommended`) VALUES
(1, '5957020', 'Exercise book', 11, 5000, '', '', 'Photos, Gifts & Office Supplies', 'Office Stationary', 'Fusce semper, nibh eu sollicitudin imperdiet, dolor magna vestibulum mi, \r\n								vel tincidunt augue ipsum nec erat.<br>', NULL, NULL, NULL, '2018-01-31 17:42:21', 'ae29e48827e4940eea07af9ffa668952.jpg', 'f448c2c28f3920328fdd5be74f022bd3.jpg', '72cedb416f4c924b355ff037198b25ec.', '0935e46249640e092981a489e8b65372.jpg', '3b9da4270e996a05cce7716c338fa402.', '3646bdfa93fdf7d451526a24397f4450.', 'Yes'),
(2, '8658610', 'Camera', 22, 95000, '', '', 'Electronics', 'Home Appliances', 'Fusce semper, nibh eu sollicitudin imperdiet, dolor magna vestibulum mi, \r\n								vel tincidunt augue ipsum nec erat.<br>', NULL, NULL, NULL, '2018-02-05 17:48:10', 'fa2cacd3c68806a1706f8eb649a4406e.png', '46abdc548541d98a51082ee8ffe8a0ca.', 'af2e637905754dc3c7d4192f0ab8dfcb.', '963e1c28506b89c9d5c96387e3168f47.', '9d81f7313723f71c325fb951f0df4bda.', '58015df7eba53bcd526db24946537e32.', 'Yes'),
(3, '8997255', 'Bread', 6, 4000, '', '', 'Grocery Store', 'Food Store', 'Fusce semper, nibh eu sollicitudin imperdiet, dolor magna vestibulum mi, \r\n								vel tincidunt augue ipsum nec erat.<br>', NULL, NULL, NULL, '2018-02-26 18:02:55', '0d74d904f0a5d34c1747cf7a7e783fd9.jpeg', '58d939f919e3b409f864ad2295260bbb.jpeg', '3c5848fe3a90d19756dd4e1ceceb631a.', '4cb6a3f8350acb915cd36ddb262e2fcc.jpeg', '6118e3fa7cfbe645d359a9523ea7c658.', '8a217368edcf50943b3f767d4b38f741.', 'Yes'),
(4, '4127535', 'Wine', 6, 2000, '', '', 'Grocery Store', 'Beverages', 'Fusce semper, nibh eu sollicitudin imperdiet, dolor magna vestibulum mi, \r\n								vel tincidunt augue ipsum nec erat.<br>', NULL, NULL, NULL, '2018-02-26 18:03:36', '4c199841e21d9e1792ec4f2c7abc6bb5.jpeg', '56160f137f13b4b92cdde30cb68bee81.jpeg', '2af2e3b9df9a5634e5ae31da63058b2d.', '786c17dbc0eec5f3d8c9734ae255101d.', '1f32671697bf62159e22efa6e365c8cf.', '07640d8272eb53a6245ae4ab74f4a8dd.', 'No'),
(5, '9062831', 'Pineapples', 5, 5000, '', '', 'Grocery Store', 'Food Store', 'Fusce semper, nibh eu sollicitudin imperdiet, dolor magna vestibulum mi, \r\n								vel tincidunt augue ipsum nec erat.<br><br>', NULL, NULL, NULL, '2018-02-26 18:05:32', 'aafbb9ea5cb8c0275081e25e7d3fd897.jpeg', '61b7f4fd2b43fa8e2fca9a26438e9bc1.', 'a6d160d8cb84a5d8228c7d0aa8c6ecb7.', 'd2334069c71303b8747c8e31521d1251.jpeg', 'd92ae9c1ea230514ccfe4ea80d4d3e96.', '363ef2cab4a31394d7e97b36be9e21a4.', ''),
(6, '1100416', 'Pens', 23, 700, '', '', 'Photos, Gifts & Office Supplies', 'Office Stationary', '<i><b>Fusce semper, nibh eu sollicitudin imperdiet, dolor magna vestibulum mi, \r\n								vel tincidunt augue ipsum nec erat.</b></i><br><br>', NULL, NULL, NULL, '2018-02-26 18:06:17', '6f8afe96479f4baff32e728717bb8250.jpeg', '50b7bb2296ac605729d04df9bc8c31c7.jpeg', 'ba9dc335e209fafcab8f8cffdfde2471.', '55be6e9c5dcda58550fde1ec48332874.', 'f7533fca335f049980cf0663dd613db9.', '613a64dbc3f13a8a6ef6728bad9eb246.', 'Yes'),
(7, '9959656', 'Flat iron', 6, 25000, '', '', 'Electronics', 'Home Appliances', 'Vestibulum congue leo elementum \r\n								ullamcorper commodo. Class aptent taciti sociosqu ad litora torquent \r\n								per conubia nostra, per inceptos himenaeos.<br><br><br>', NULL, NULL, NULL, '2018-02-26 18:06:56', '06f8e4fdf16ed54a53d1386219163af8.jpeg', 'ff6ff736bd81dbb9285962d643b918f0.jpeg', '45a55cc1696a03ce4bfb9a640c47dcba.', 'aac623064ca246c189fcb750be7c784d.', '4ed4f68a069c117626d2bcaf303d9d5d.', 'b54bf9b4e1079ed270d3a9570876dd59.', 'Yes'),
(8, '7546919', 'Soap', 30, 2500, '', '', 'Health & Beauty', 'Personal Health', 'Vestibulum congue leo elementum \r\n								ullamcorper commodo. Class aptent taciti sociosqu ad litora torquent \r\n								per conubia nostra, per inceptos himenaeos.<br>', NULL, NULL, NULL, '2018-02-26 18:17:19', 'eb00ce4320fe5e34b1fb3d18e6c0b138.jpeg', '41fea5a2d9b7dd072f17f5ac50314036.jpeg', 'e6a5957de26fcfbb7eb8a049105aed0b.', 'a3c0558c544d720c8a5681821d70fc0f.', '611cbd5ee491b870d5a907764e6051cc.', 'd3ea52cba74c4e24ce6fdf7a7101aa95.', 'No'),
(9, '2776302', 'Alcohol', 24, 3200, '', '', 'Grocery Store', 'Beverages', 'Vestibulum congue leo elementum \r\n								ullamcorper commodo. Class aptent taciti sociosqu ad litora torquent \r\n								per conubia nostra, per inceptos himenaeos.<br>', NULL, NULL, NULL, '2017-12-05 18:18:02', 'f2a86e85c6d532fc800879fa368c54aa.png', 'a2905114f494b05058834f35f9f9c6ad.jpg', 'a45037f56fc0db745092624f3305b9fc.', 'f99daa8650490728b07c451fe4704b29.jpg', 'ef4835660080ec680b88f8c8b653deab.', '58c804a545a22406ee045f455e7ee2ea.', ''),
(10, '0302557', 'Bananas', 20, 3500, '', '', 'Grocery Store', 'Food Store', 'Vestibulum congue leo elementum \r\n								ullamcorper commodo. Class aptent taciti sociosqu ad litora torquent \r\n								per conubia nostra, per inceptos himenaeos.<br>', NULL, NULL, NULL, '2018-02-26 18:18:58', 'ddec3e29dda218fdac64aeb036ee8916.jpeg', '26a686d770b366ed9bebfd6372e3caad.jpeg', 'a6270a7492aa36ccdf8f92810ca17b62.', '6a9aa579ead9f91625c1da0444e7eac3.jpeg', 'a269061881ffd02e93f1f5de70490bba.', '1fe05fd25c0e64d7e1011c973856c117.', 'Yes'),
(11, '9531350', 'Milk', 15, 1200, '', '', 'Grocery Store', 'Beverages', '<i>Vestibulum congue leo elementum \r\n								ullamcorper commodo. Class aptent taciti sociosqu ad litora torquent \r\n								per conubia nostra, per inceptos himenaeos.</i><br>', NULL, NULL, NULL, '2018-01-03 18:19:50', 'd46411c55df030488caf9a1dd900b69c.jpeg', '281a576c8e0a5e370e01c0cb405459c8.jpeg', '25ae842f8f91d5e4889ce0add497f32d.jpeg', '8f392b3337e7227420ee70725f10f556.', '4fefc5314f8d4249f6791cc5812cf40a.', '5aac58b704544a48437848144a3c0b1b.', 'Yes'),
(12, '8939741', 'Perfumes', 15, 15000, '', '', 'Health & Beauty', 'Personal Health', 'Vestibulum congue leo elementum \r\n								ullamcorper commodo. Class aptent taciti sociosqu ad litora torquent \r\n								per conubia nostra, per inceptos himenaeos.<br>', NULL, NULL, NULL, '2018-02-26 18:20:41', '1b14443eabb0151d2b8e251825e77e47.jpeg', '14c3eb8771891efffb837717ea96a8c9.jpeg', '938d09e19c8f73b1cb3a3932002a465d.', '649d2d76cb44d9ee0362f3f898d9f174.jpeg', '65e2c872151387477481faa70e5b8d57.', 'eee5b469120c756bed21a9a778b9c6b7.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login_details`
--
ALTER TABLE `admin_login_details`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `all_users_login_details`
--
ALTER TABLE `all_users_login_details`
  ADD PRIMARY KEY (`Cmplx_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_account_delete`
--
ALTER TABLE `customer_account_delete`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grouped_orders`
--
ALTER TABLE `grouped_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`scat_id`);

--
-- Indexes for table `supermarket_products`
--
ALTER TABLE `supermarket_products`
  ADD PRIMARY KEY (`smkt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login_details`
--
ALTER TABLE `admin_login_details`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `all_users_login_details`
--
ALTER TABLE `all_users_login_details`
  MODIFY `Cmplx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_account_delete`
--
ALTER TABLE `customer_account_delete`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `grouped_orders`
--
ALTER TABLE `grouped_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `scat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `supermarket_products`
--
ALTER TABLE `supermarket_products`
  MODIFY `smkt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
