-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2017 at 08:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`) VALUES
(1, 'Lavern Sim', 'lavern', '123'),
(2, 'Gera', 'gera', '123');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `calendar_id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Inner Nutrition Programmes'),
(2, 'Weight Management Products - Packs'),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `initial_result`
--

CREATE TABLE `initial_result` (
  `ir_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ir_date` date NOT NULL,
  `ir_fat` int(11) NOT NULL,
  `ir_visceral` int(11) NOT NULL,
  `ir_bonemass` int(11) NOT NULL,
  `ir_restingmr` int(11) NOT NULL,
  `ir_metabolic_age` int(11) NOT NULL,
  `ir_muscle_mass` int(11) NOT NULL,
  `ir_physique_rating` int(11) NOT NULL,
  `ir_water` int(11) NOT NULL,
  `ir_ideal_weight` int(11) NOT NULL,
  `ir_excess_fat` int(11) NOT NULL,
  `ir_ideal_visceral` int(11) NOT NULL,
  `ir_height` int(11) NOT NULL,
  `ir_weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `initial_result`
--

INSERT INTO `initial_result` (`ir_id`, `id`, `ir_date`, `ir_fat`, `ir_visceral`, `ir_bonemass`, `ir_restingmr`, `ir_metabolic_age`, `ir_muscle_mass`, `ir_physique_rating`, `ir_water`, `ir_ideal_weight`, `ir_excess_fat`, `ir_ideal_visceral`, `ir_height`, `ir_weight`) VALUES
(1, 1, '2017-08-25', 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 150, 50);

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `meal_id` int(11) NOT NULL,
  `meal_time` varchar(30) NOT NULL,
  `meal` text NOT NULL,
  `calories` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`meal_id`, `meal_time`, `meal`, `calories`) VALUES
(1, 'Breakfast11', 'Shake1', '1501'),
(2, 'Lunch', '2 Pcs Banana', '200');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `monitor_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `sponsor` varchar(30) NOT NULL,
  `program_id` int(11) NOT NULL,
  `target` varchar(50) NOT NULL,
  `monitor_status` varchar(15) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`monitor_id`, `id`, `sponsor`, `program_id`, `target`, `monitor_status`, `start_date`) VALUES
(2, 1, '', 1, '', '', '2017-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(30) NOT NULL,
  `vol_pts` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `sc` int(11) NOT NULL,
  `sb` int(11) NOT NULL,
  `supv` int(11) NOT NULL,
  `retail` int(11) NOT NULL,
  `profitc` int(11) NOT NULL,
  `profitsc` int(11) NOT NULL,
  `profitsb` int(11) NOT NULL,
  `profitsupv` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `reorder` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `vol_pts`, `c`, `sc`, `sb`, `supv`, `retail`, `profitc`, `profitsc`, `profitsb`, `profitsupv`, `qty`, `reorder`, `cat_id`) VALUES
(1, 'Formula 1 Canister', 18, 10, 20, 30, 40, 1500, 10, 20, 30, 40, 9, 4, 1),
(2, 'Formula 2', 18, 10, 20, 30, 40, 1500, 10, 20, 30, 40, 20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`) VALUES
(1, 'Free Wellness'),
(2, 'Weight Gain'),
(3, 'Weight Loss');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`) VALUES
(1, 'Do you feel sick or get sick often?'),
(2, 'Do you easily get tired?'),
(3, 'Do you suffer from chronic health problems such as headaches, backaches or constipation?'),
(4, 'Do you feel your workplace-home-life stressful?');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `weighin_date` date NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `fat` decimal(5,2) NOT NULL,
  `visceral` decimal(5,2) NOT NULL,
  `bone_mass` decimal(5,2) NOT NULL,
  `rmr` decimal(5,2) NOT NULL,
  `metabolic_age` decimal(5,2) NOT NULL,
  `muscle_mass` decimal(5,2) NOT NULL,
  `physique_rating` decimal(5,2) NOT NULL,
  `water` decimal(5,2) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `monitor_id`, `weighin_date`, `weight`, `fat`, `visceral`, `bone_mass`, `rmr`, `metabolic_age`, `muscle_mass`, `physique_rating`, `water`, `remarks`) VALUES
(1, 2, '2017-08-25', '10.00', '20.00', '30.00', '40.00', '50.00', '60.00', '70.00', '80.00', '90.00', 'kjdksd'),
(2, 2, '2017-08-25', '40.00', '8.00', '8.00', '9.00', '9.00', '0.00', '7.00', '98.00', '0.00', 'jhj');

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `stockout_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stockin_qty` int(11) NOT NULL,
  `stockin_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `stockout_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stockout_qty` int(11) NOT NULL,
  `stockout_date` datetime NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockout`
--

INSERT INTO `stockout` (`stockout_id`, `prod_id`, `stockout_qty`, `stockout_date`, `id`) VALUES
(1, 1, 1, '2017-08-25 14:11:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplement`
--

CREATE TABLE `supplement` (
  `sup_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `sup_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplement`
--

INSERT INTO `supplement` (`sup_id`, `prod_id`, `sup_count`) VALUES
(1, 1, 10),
(2, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sup_taker`
--

CREATE TABLE `sup_taker` (
  `sup_taker` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sup_taker`
--

INSERT INTO `sup_taker` (`sup_taker`, `monitor_id`, `prod_id`, `count`) VALUES
(1, 2, 1, 9),
(2, 2, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `id`, `question_id`, `answer`) VALUES
(1, 1, 1, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `taker`
--

CREATE TABLE `taker` (
  `id` int(11) NOT NULL,
  `last` varchar(15) NOT NULL,
  `first` varchar(15) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bday` date NOT NULL,
  `referrer_name` varchar(30) NOT NULL,
  `referrer_contact` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(8) NOT NULL,
  `points` decimal(7,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `orig_weight` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taker`
--

INSERT INTO `taker` (`id`, `last`, `first`, `phone`, `gender`, `bday`, `referrer_name`, `referrer_contact`, `address`, `email`, `status`, `points`, `discount`, `height`, `orig_weight`) VALUES
(1, 'Cueva', 'Kaye', '09051914070', 'Female', '1994-10-24', 'Lee', '091367676', '', '', 'Active', '18.00', '1.00', '150.00', '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `taker_meal`
--

CREATE TABLE `taker_meal` (
  `taker_meal_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taker_meal`
--

INSERT INTO `taker_meal` (`taker_meal_id`, `meal_id`, `id`) VALUES
(3, 1, 1),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `points` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`calendar_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `initial_result`
--
ALTER TABLE `initial_result`
  ADD PRIMARY KEY (`ir_id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`monitor_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`stockout_id`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`stockout_id`);

--
-- Indexes for table `supplement`
--
ALTER TABLE `supplement`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `sup_taker`
--
ALTER TABLE `sup_taker`
  ADD PRIMARY KEY (`sup_taker`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `taker`
--
ALTER TABLE `taker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taker_meal`
--
ALTER TABLE `taker_meal`
  ADD PRIMARY KEY (`taker_meal_id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `calendar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `initial_result`
--
ALTER TABLE `initial_result`
  MODIFY `ir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `monitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockout_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `stockout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplement`
--
ALTER TABLE `supplement`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sup_taker`
--
ALTER TABLE `sup_taker`
  MODIFY `sup_taker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taker`
--
ALTER TABLE `taker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taker_meal`
--
ALTER TABLE `taker_meal`
  MODIFY `taker_meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
