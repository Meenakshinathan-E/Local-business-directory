-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 06:58 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project21ucs`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `con_person` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `catg` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `building` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `descrip` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`b_id`, `u_id`, `b_name`, `con_person`, `mobile`, `pincode`, `city`, `catg`, `year`, `building`, `street`, `landmark`, `descrip`, `image`, `status`) VALUES
(69, 4, 'Fish', 'Murugesh', '9876543210', '627000', 'Uvari', 3, '2024-12', 'Nainaar complex', 'Nainar road', 'Nainar', 'Fish selling fish restaureant\r\nadsfasdfadsfadf\r\ndsa\r\nfasdf\r\nsadf\r\nsdaf\r\nasdf\r\nasdf\r\nasdf\r\nasdf', 'png,png,', 'Verified'),
(70, 3, 'Dk hires', 'Darwin', '9003888600', '627008', 'Palayapettai', 1, '2024-06', 'Darwin complex', 'Darwin road', 'Darwin house', 'kjdsahfkhkjsdhksdfkjsdhkjfsldkdlscnkdsjnvkdslnsdlknvsldkbvfkllfkvnfdlbghhjdfhjhj', 'png,png,', 'Verified'),
(74, 12, 'Hotel', 'Mukesh ambani', '2341567890', '123456', 'Tvl', 3, '2024-04', 'Mk complex', 'Mk street', 'Mk hospital', 'erhthrglkjgj;elkglmvl;efpgrthjtykykilltryrtyrtyrtyrtyrt', 'png,png,', 'Verified'),
(75, 13, 'Mk Hotel', 'Muthu', '1245678992', '123456', 'Tvl', 3, '2024-06', 'Mk complex', 'Mk street', 'Mk hospital', 'dlkdfjkdlflsdjflkdjfjlkjdlkfjlkdsfjlkdfjlkdflkdfldjflkjlkfjlfgfhgfhgfhgh', 'png,png,', 'Verified'),
(81, 16, 'Food products', 'Sumitran S', '6749345523', '634755', 'Tvl', 3, '2023-02', 'Mn complex', 'Mn street', 'Mn bus stop', 'This is about the food products.', 'png,', 'Not verified'),
(84, 15, 'Food products', 'Sumi', '6749345544', '634755', 'Tvl', 4, '2024-02', 'Mn complex', 'Mn street', 'Mn bus stop', 'dlnkfgldfj;j;lkgj;fjlkgj;hj', 'png,png,', 'Verified'),
(85, 13, 'Food products', 'Sumit', '6749345547', '634755', 'Tvl', 4, '2024-01', 'Mn complex', 'Mn street', 'Mn bus stop', 'rt;lkk;rtk;lkrtl;kotrk;yktyrt;yp[puoityiouioop', 'png,png,', 'Verified'),
(86, 13, 'Bike shop', 'Meena', '6579567985', '656557', 'Tvl', 2, '2021-02', 'Mn complex', 'Mn street', 'Mn bus stop', 'This is about the Bike shop.', 'png,', 'Verified'),
(89, 14, 'Laptop Store', 'Jeyathish', '7868796899', '674769', 'Tvl', 4, '2024-01', 'Jeyathish Complex', 'Mn street', 'Dubai main road', 'k;er;kgfgdfgkl;dfjgkfklgj;lkdhgfhjhgjhgjhgjghjhgjh', 'png,', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(2, 'bike'),
(4, 'food'),
(3, 'hotel'),
(1, 'laptop'),
(5, 'medical');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `u_id` int(11) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`u_id`, `status`) VALUES
(3, 'Paid'),
(4, 'Paid'),
(12, 'Paid'),
(13, 'Paid'),
(14, 'Paid'),
(3, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `timing`
--

CREATE TABLE `timing` (
  `b_id` int(11) NOT NULL,
  `mon` varchar(11) NOT NULL,
  `tue` varchar(11) NOT NULL,
  `wed` varchar(11) NOT NULL,
  `thur` varchar(11) NOT NULL,
  `fri` varchar(11) NOT NULL,
  `sat` varchar(11) NOT NULL,
  `sun` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timing`
--

INSERT INTO `timing` (`b_id`, `mon`, `tue`, `wed`, `thur`, `fri`, `sat`, `sun`) VALUES
(69, '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*pm*12*pm', '12*am*12*pm'),
(70, '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm'),
(74, '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*pm*12*pm', '0*am*0*pm'),
(75, '10*am*8*pm', '10*am*8*pm', '10*am*8*pm', '10*am*8*pm', '10*am*8*pm', '10*am*8*pm', '0*am*0*pm'),
(81, '9*am*9*pm', '9*am*9*pm', '9*am*9*pm', '9*am*9*pm', '9*am*9*pm', '9*am*9*pm', '9*am*9*pm'),
(84, '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '0*pm*0*pm', '0*am*0*pm'),
(85, '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*pm*12*pm', '12*am*12*pm'),
(86, '10*am*11*pm', '10*am*11*pm', '10*am*11*pm', '10*am*11*pm', '10*am*11*pm', '10*am*11*pm', '0*am*0*pm'),
(89, '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*am*12*pm', '12*pm*12*pm', '0*am*0*pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `email`, `password`, `fname`, `lname`) VALUES
(3, 'Kumar', 'mn@gmail.com', 'Kumar', 'Kumar', 'E'),
(4, 'Charlie', 'ganapathy@gmail.com', 'Asdf', 'Ganapathy', 'R'),
(11, 'Js2', 'joe@gmail.com', 'Js7', 'Joe', 'Pio'),
(12, 'Mu01', 'm@gmail.com', 'Mk', 'Mukesh', 'ambani'),
(13, 'Meena', 'mn01@gmail.com', 'Mn01', 'Meenakshinathan', 'e'),
(14, 'Jeyathish', 'jeyathish098@gmail.com', 'Jey1', 'Jeyathish', 'J'),
(15, 'Murugesh ', 'muru@gmail.com', 'Muru123', 'Murugesh', 'S'),
(16, 'Sumitran', 'sumi@gmail.com', 'Sumi123', 'Sumitran', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `c_id_foreign` (`catg`),
  ADD KEY `u_id_foreign` (`u_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_name` (`c_name`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `foreign_user_id` (`u_id`);

--
-- Indexes for table `timing`
--
ALTER TABLE `timing`
  ADD KEY `foreign` (`b_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `c_id_foreign` FOREIGN KEY (`catg`) REFERENCES `category` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `foreign_user_id` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timing`
--
ALTER TABLE `timing`
  ADD CONSTRAINT `foreign` FOREIGN KEY (`b_id`) REFERENCES `business` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
