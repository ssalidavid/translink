-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 08:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savings`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(250) NOT NULL,
  `account_balance` double(10,2) NOT NULL,
  `charges_amount` double(10,2) NOT NULL,
  `created_at` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_name`, `account_balance`, `charges_amount`, `created_at`) VALUES
(1, 'Saving Account', 130000.00, 3000.00, '2019-11-18 12:44:55 PM');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `member_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `account_balance` double(10,2) NOT NULL,
  `username` varchar(100) NOT NULL,
  `birthday` varchar(1000) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nok_name` varchar(25) NOT NULL,
  `nok_contact` varchar(13) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `member_id`, `name`, `account_no`, `account_balance`, `username`, `birthday`, `sex`, `address`, `phone`, `nok_name`, `nok_contact`, `nationality`, `designation`, `photo`, `join_date`, `date`) VALUES
(2, '19002', 'David', '8691340257', 10000.00, 'Ssali David', '2019-11-21', 'Male', 'Jinja', '+256751603010', 'Jenna', '+25675890467', 'Ugandan', '2', 'David1.png', '2019-12-20 13:01:36', '2019-11-18'),
(3, '19001', 'Jenna', '5620739814', 10000.00, 'jennine', '1999-10-16', 'Female', 'kampala', '+2567677603010', 'ssali', '+256785643219', 'Ugandan', '1', 'Jenna.png', '2019-12-20 13:01:52', '2019-11-18'),
(5, '19004', 'Sarah', '', 0.00, 'Sarah', '1998-02-05', 'Female', 'Jinja', '+2567895632', 'Joseph', '+25678563267', 'Ugandan', '4', 'Sarah.png', '2019-12-20 13:02:07', '2019-11-22'),
(7, '19005', 'Daniel', '8160275493', 48000.00, 'Joseph', '2019-12-18', 'Male', 'Kampala', '+256774649641', 'Joseph', '+256774649641', 'Ugandan', '2', 'Daniel.png', '2019-12-20 13:02:23', '2019-12-18'),
(8, '19006', 'Danfodio', '0436729815', 0.00, 'Daniel', '2019-12-12', 'Male', 'Kampala', '+256706551841', 'Daniel', '+256706551981', 'Uganda', '2', 'Danfodio.png', '2019-12-20 13:02:37', '2019-12-11'),
(9, '19007', 'David Norris', '9247135806', 0.00, 'David', '2019-12-25', 'Male', 'Kampala', '+256751603010', 'David Norris', '+256897565433', 'Ugandan', '2', '', '2019-12-20 13:02:47', '2019-12-11'),
(10, '19008', 'Nayosi', '8794603521', 0.00, 'nayosi', '2019-12-17', 'Male', 'Kampala', '+256754685345', 'Nayosi', '+256785632882', 'Ugandan', '2', '', '2019-12-20 13:02:59', '2019-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) NOT NULL,
  `role` int(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role_type` varchar(100) NOT NULL DEFAULT 'custom'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `name`, `role_type`) VALUES
(1, 1, 'Administrator', 'System'),
(2, 2, 'Member', 'System'),
(3, 3, 'Accountant', 'System');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sid` int(11) NOT NULL,
  `sname` varchar(60) NOT NULL,
  `spname` varchar(60) NOT NULL,
  `smotto` varchar(60) NOT NULL,
  `semail` varchar(60) NOT NULL,
  `sphone` varchar(60) NOT NULL,
  `saddress` varchar(250) NOT NULL,
  `spobox` varchar(60) NOT NULL,
  `swurl` varchar(250) NOT NULL,
  `sphoto` varchar(60) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 100,
  `sbackgphoto` varchar(60) NOT NULL,
  `min_deposit_amount` double(10,2) NOT NULL,
  `max_deposit_amount` double(10,2) NOT NULL,
  `min_withdraw_amount` double(10,2) NOT NULL,
  `max_withdraw_amount` double(10,2) NOT NULL,
  `sosname` varchar(60) NOT NULL,
  `sversion` varchar(10) NOT NULL,
  `sapp_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sid`, `sname`, `spname`, `smotto`, `semail`, `sphone`, `saddress`, `spobox`, `swurl`, `sphoto`, `status`, `sbackgphoto`, `min_deposit_amount`, `max_deposit_amount`, `min_withdraw_amount`, `max_withdraw_amount`, `sosname`, `sversion`, `sapp_name`) VALUES
(1, 'Nayosi Investment International Limited', 'Nayosi International ', 'We Change your mind set from failure to success', 'admin@nayosi.biz', '0785632882', 'Kampala', '', 'www.nayosi.biz', '1575552141137.png', 100, '1573670960429.jpg', 10000.00, 1000000.00, 20000.00, 2000000.00, 'SMS', '1.0.0', 'Savings Management System');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `member_id` varchar(100) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `transaction_type` varchar(60) NOT NULL,
  `payment_type` varchar(60) NOT NULL,
  `member_account_no` varchar(60) NOT NULL,
  `transaction_amount` double(10,2) NOT NULL,
  `transaction_charge` double(10,2) NOT NULL,
  `description` text NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `account_id`, `member_id`, `member_name`, `transaction_type`, `payment_type`, `member_account_no`, `transaction_amount`, `transaction_charge`, `description`, `transaction_date`, `transaction_at`) VALUES
(2, 1, '19002', 'David', 'deposit', 'cash', '8691340257', 10000.00, 0.00, '', '2019-11-18', '12:51:30 PM'),
(3, 1, '19001', 'Jenna', 'deposit', 'cash', '5620739814', 10000.00, 0.00, '', '2019-11-18', '12:52:35 PM'),
(9, 1, '19005', 'Daniel', 'deposit', 'cash', '8160275493', 50000.00, 0.00, '', '2019-12-18', '12:53:18 PM'),
(10, 1, '19005', 'Daniel', 'withdraw', 'cash', '8160275493', 100000.00, 2000.00, '', '2019-12-18', '01:21:44 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `role` int(11) NOT NULL,
  `member_id` varchar(60) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'inactive',
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `jdate` date NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `member_id`, `username`, `password`, `status`, `name`, `phone`, `photo`, `jdate`, `created_at`) VALUES
(15, 1, '19002', '', 'm?—²š\ZL<iÐ', 'active', 'David Opio', '+256 751603010', 'DAVID_DAVJEN.png', '2019-11-11', '08:57:25pm'),
(21, 2, '19003', 'Danfodio', 'Å’¡', 'active', 'Danfodio', '+256706551432', 'Danfodio.png', '2019-11-18', '01:32:09 PM'),
(22, 3, '19004', 'Sarah', 'Å’¡', 'active', 'Sarah', '+2567895632', '', '2019-11-22', '12:31:27pm'),
(27, 2, '19008', 'nayosi', 'egŠ¥P©¦0P', 'active', 'Nayosi', '+256754685345', '', '2019-12-12', '11:04:51am');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `encodepassword` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.PASSWORD = ENCODE(NEW.PASSWORD,'sitmPKEY')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
