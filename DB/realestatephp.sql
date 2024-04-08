-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 01:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestatephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `adob` date NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `auser`, `aemail`, `apass`, `adob`, `aphone`) VALUES
(9, 'admin', 'admin@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '1994-12-06', '1470002569'),
(10, 'biraj', 'birajp@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2024-03-11', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `fdescription`, `status`, `date`) VALUES
(9, 38, 'This is the feedback from biraj', 0, '2024-03-26 20:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `sellerId` int(11) NOT NULL,
  `propertyId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `userId`, `sellerId`, `propertyId`, `name`, `email`, `phone`, `message`) VALUES
(2, NULL, 1, 1, 'KnowledgeForge', 'jedixo1250@wentcity.com', '1234567890', 'Hi there! I\'m really interested in this property and would love to learn more about it. Could you please provide additional details and possibly arrange a visit?'),
(11, NULL, 39, 4, 'Puskar Humagain', 'puskar@gmail.com', '9860658967', 'Hi there! I\'m really interested in this property and would love to learn more about it. Could you please provide additional details and possibly arrange a visit?');

-- --------------------------------------------------------

--
-- Table structure for table `property_list`
--

CREATE TABLE `property_list` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `ad_title` varchar(255) DEFAULT NULL,
  `category` enum('House','Apartment','Flat','Office') DEFAULT NULL,
  `sale_rent` enum('Sale','Rent') NOT NULL,
  `no_of_flat` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `living` int(11) DEFAULT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `all_rooms` int(11) DEFAULT NULL,
  `parking` enum('Moterbike','Car-1','Car-2','Car-3','Car-4','Car-5','Car-6-10') DEFAULT NULL,
  `built_year` varchar(50) DEFAULT NULL,
  `built_area` varchar(50) DEFAULT NULL,
  `road_size` varchar(50) DEFAULT NULL,
  `land_space` varchar(50) DEFAULT NULL,
  `direction` enum('North','North East','East','South East','South','South West','West','North West') DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `price_per_unit` enum('Month','Year','Flat','House') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `municipality` varchar(100) DEFAULT NULL,
  `main_location` varchar(255) DEFAULT NULL,
  `ward_no` varchar(50) DEFAULT NULL,
  `tole` varchar(100) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `google_map` longtext DEFAULT NULL,
  `status` enum('Available','Not Available') DEFAULT 'Available',
  `approved` tinyint(1) DEFAULT 0,
  `is_featured` tinyint(1) DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_list`
--

INSERT INTO `property_list` (`id`, `uid`, `ad_title`, `category`, `sale_rent`, `no_of_flat`, `bedroom`, `bathroom`, `living`, `kitchen`, `all_rooms`, `parking`, `built_year`, `built_area`, `road_size`, `land_space`, `direction`, `price`, `price_per_unit`, `description`, `state`, `district`, `municipality`, `main_location`, `ward_no`, `tole`, `image1`, `image2`, `image3`, `image4`, `google_map`, `status`, `approved`, `is_featured`, `date`) VALUES
(3, 38, 'New house for sale in Kupondole Lalitpur', 'House', '', 4, 2, 2, 2, 2, 4, 'Moterbike', '1983', '5 Ana', '4', '6 Ana', 'North', '76700000', 'House', 'This is very good house', 'Bagmati', 'Lalitpur', 'Lalitpur', 'Kupandol', '12', 'Tandukar', 'thumb_913961239.jpeg', 'thumb_9030846240.jpeg', 'thumb_7051166906.jpeg', 'thumb_1701277714.jpeg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d712.3678053995204!2d85.31291680772732!3d27.6874684226835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19b4ad7096dd%3A0x29fa3d73b99dcc97!2sKupondole%2C%20Lalitpur%2044600!5e0!3m2!1sen!2snp!4v1711453507043!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Available', 0, 1, '2024-03-26'),
(4, 39, 'House On Sale on Gatthaghar ', 'House', 'Sale', 3, 6, 5, 2, 2, 10, 'Moterbike', '2075', '4 aana 1.5 dam', '13ft', '4 aana 1.5 dam', 'South', '3,95,00,000', 'House', '3 storied building.... Lots of Parking Space.... Water Storage Tank (7000 L)....Link Road Kuleshore....Suitable also for Kindergarten School.... Inar(well) always water.... Dakshin Mohada.....Rectangular Shape.... 34 feet mohada... About 600 - 700 meters from Kuleshore Ganeshsthaan.', 'Bagmati', 'Bhaktapur', 'Madhyapur Thimi', 'Gatthaghar', '3', 'Tapa Tole', '2834615038.jpg', 'thumb_222111180.jpg', '2834615038 (1).jpg', '2834615038 (2).jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.362982137685!2d85.37493944188513!3d27.67517400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1b003264425d%3A0x71e314d3585f555e!2sMaskey%20Niwas%20(gatthaghar)!5e0!3m2!1sen!2snp!4v1711474279609!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Available', 1, 1, '2024-03-26'),
(39, 39, 'House for Rent Bhaisepati', 'House', 'Rent', 3, 6, 3, 1, 1, 12, 'Moterbike', '2076', '6.2 aana', '20 ft', '6.2 aana', 'South East', '1,30,000', 'Month', '6.2 आना जग्गामा निर्मित 2.5 तले घर तुरुन्त भाडामा\r\n1 pooja room\r\n1 Spacious terrace\r\nWashing Room\r\nSolar Panel\r\nElectric Heater\r\n✅ 5 Minute Driving Distance to Mediciti Hospital\r\n✅ 5 walking distance to KK Supermarket, Big Mart, Bhaisepati Mart, etc\r\n✅ 5 minute walking distance to clinics and pharmacies.\r\n✅ Grocery and a mini market are very nearby\r\n✅ Taxis and Public Vehicles are easily available\r\n↗️500 meters near to awas mantri quatars\r\nBank and ATM are near in 10 minute walking distance\r\n✅ 5 km from Ekantakuna ring road\r\n10-15 minutes walking distance to government office like telecom, electricity office, khanepani office, etc', 'Bagmati', 'Lalitpur', 'Lalitpur', 'Bhaisepati LMC', '3', 'Harke Colony', 'thumb_171068687.jpg', '2195380365.jpg', 'thumb_4573308850.jpg', 'thumb_328064958.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7068.0742435317425!2d85.30129345965166!3d27.654323172672246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1711474895885!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Available', 1, 0, '2024-03-26'),
(41, 41, 'Duplex House On Sale At Tikathali ,Sanagau School', 'House', 'Sale', 2, 5, 4, 2, 2, 14, 'Car-1', '2075', '3 Aana', '13ft', '3 Aana', 'South', '16700000', 'House', 'Duplex House at Tikathali, Lalipur !!\r\nललितपुर, इमाडोल टिकाथलि सनागाउ स्कुल नजिकै ३ जग्गामा निर्मित, १३ फुटे बाटोमा २.५ तल्ले नया दुप्लेस घर तुरुन्त बिक्रीमा !!\r\nअन्य जानकारीको लागि:\r\n=========================\r\n✅Land: 3 Aana\r\n✅Type: Duplex\r\n✅Bedroom: 5 (1 Attached)\r\n✅Bathroom: 4\r\n✅Living: 2\r\n✅Kitchen: 2\r\n✅Store Room: 1\r\n✅Puja Room: 1\r\n✅Furnishing: Semi Furnished\r\n✅Face: South\r\n✅Floor: 2.5 Storey\r\n✅Road: 13 Feet\r\n✅Parking: 1 Car and Few Bikes\r\n✅Price: 2.15 Cr.\r\n✅Location: Tikathali, Sanagaun School\r\n( 3 Km from Gwarko, 400 meter from Imadole Highways)', 'Bagmati', 'Lalitpur', 'Imadol', 'Tikathali, Sanagau School Chowk', '5', 'Sanagau School', '7641437872.jpg', 'thumb_6966926426.jpg', 'thumb_5048052762.jpg', 'thumb_9104684330.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28271.246407675295!2d85.358384!3d27.658386!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb10aa668e649f%3A0x302b443de16adbd5!2sTikathali%2C%20Mahalaxmi%2C%20Nepal!5e0!3m2!1sen!2sus!4v1712413955295!5m2!1sen!2sus\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Available', 1, 0, '2024-04-06'),
(42, 41, 'House for sell (Bhangal)', 'House', 'Sale', 8, 6, 4, 1, 1, 8, 'Car-2', '2076', '4 aana 1.5 dam', '15ft', '6.2 aana', 'South East', '3,95,00,000', 'House', '1.) Location: Bhangal (2 min from Bidya Devi Bhandari house)\r\n2.) 5 Anna Land. This 2.5-storied house was built after the earthquake.\r\n\r\n\r\n3.) East-facing house (with 24-hour facility of electricity, water, drainage, security)\r\n4.) Good environment and good neighbours.\r\n5.) Not furnished; therefore, the buyer can get it furnished how they like.\r\n6.) This house has been constructed for personal use, but due to a slight change in priorities, it is now being put up for sale.', 'Bagmati', 'Kathmandu', 'Budhanilkantha', 'Bhangal', '3', 'little moon school', '1924521655 (1).jpg', 'thumb_6717805088.jpg', 'thumb_3229822161.jpg', 'thumb_1666585306.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7060.973078100586!2d85.358652!3d27.763979!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1c0315842485%3A0x6af77b15f4097df6!2sBhangal%2C%20Budhanilkantha%2044600%2C%20Nepal!5e0!3m2!1sen!2sus!4v1712415348902!5m2!1sen!2sus\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Available', 1, 0, '2024-04-06'),
(43, 41, 'House On Sale- Sital Height, Imadol', 'House', 'Sale', 3, 6, 5, 2, 2, 10, 'Car-1', '2076', '4 aana 1.5 dam', '13ft', '6.2 aana', 'North', '3,95,00,000', 'House', 'Modular Kitchen and Dining:- 2\r\nFacing: South\r\nFurnishings:-Full Furnished\r\n13 Feet Gravelled Road\r\nParking:- Available\r\nLocation: Shital height, Imadol', 'Bagmati', 'Lalitpur', 'Mahalaxmi', 'Sital Height', '3', 'Harke Colony', '8199989012.jpeg', 'thumb_1996403948.jpeg', 'thumb_7391759253.jpeg', 'thumb_5469379545.jpeg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7068.403570912383!2d85.34753200000002!3d27.649228!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1751c9ffea81%3A0x28f194108e510fae!2sSital%20Height%20Housing%20Society!5e0!3m2!1sen!2sus!4v1712416182581!5m2!1sen!2sus\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Available', 1, 0, '2024-04-06'),
(44, 38, 'House On Sale-Lamatar ', 'House', 'Sale', 2, 3, 3, 1, 1, 5, 'Car-1', '2076', '3 aana 3 dam', '13ft', '980 sqft', 'South', '1,75,00,000', 'House', 'Facing: South\r\nFurnishings:- Full Furnished\r\nParking:- Available', 'Bagmati', 'Lalitpur', 'Mahalaxmi', 'Lamatar', '5', '', '446324721.jpeg', 'thumb_6694891290.jpeg', 'thumb_4168886935.jpeg', 'thumb_7391759253.jpeg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d56558.78986983477!2d85.393081!3d27.626859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb10f3f14d1b17%3A0x14bef3fe7e07ea92!2sLamatar%2C%20Nepal!5e0!3m2!1sen!2sus!4v1712416887589!5m2!1sen!2sus\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Available', 1, 0, '2024-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`) VALUES
(38, 'Aashish Timalsina', 'aashish123@gmail.com', '9860658967', '7c222fb2927d828af22f592134e8932480637c0d', 'Agent', '295859533_3070453713175268_8556035446627576243_n.jpg'),
(39, 'Daley Dai', 'daleydai@gmail.com', '9860658960', '7c222fb2927d828af22f592134e8932480637c0d', 'Agent', 'istockphoto-1200677760-612x612.jpg'),
(40, 'Ram Nepal', 'ramnepal@gmail.com', '9860658943', '8cb2237d0679ca88db6464eac60da96345513964', 'User', 'dr-asif-uddin.jpg'),
(41, 'Indus Property Nepal', 'indusproperty@gmail.com', '9845877861', '7c222fb2927d828af22f592134e8932480637c0d', 'Agent', 'Screenshot 2024-04-06 201213.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_list`
--
ALTER TABLE `property_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
