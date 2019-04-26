-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 26, 2019 at 10:19 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `phpcrudsample`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `procSaveMail` (IN `i_email_body` VARCHAR(3000), IN `i_email_subject` VARCHAR(255))  NO SQL
BEGIN
    insert into tb_email(email_body,email_subject) values(i_email_body,i_email_subject);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `procSaveMailLink` (IN `i_email_id` INT(11), IN `i_user_id` INT(11), IN `i_status` TINYINT(2))  NO SQL
BEGIN
    insert into tb_email_link(email_id,user_id, status) values(i_email_id,i_user_id, i_status);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `procSaveUser` (`i_id` INT, `i_firstname` VARCHAR(50), `i_lastname` VARCHAR(50), `i_email` VARCHAR(50), `i_city` VARCHAR(100), `i_company` VARCHAR(100), `i_country` VARCHAR(100), `i_password` VARCHAR(20))  BEGIN
    if(i_id=0) then
      insert into tb_user(firstname,lastname,email,city,company,country,password) values(i_firstname,i_lastname,i_email, i_city, i_company, i_country, i_password);
    Else
                 update tb_user set firstname=i_firstname,lastname=i_lastname,email=i_email, city=i_city, company=i_company, country=i_country,
                 password=i_password where id=i_id;
    end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUserStatus` (`i_id` INT, `i_is_block` BOOLEAN)  BEGIN
    update tb_user set is_block=i_is_block where id=i_id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_email`
--

CREATE TABLE `tb_email` (
  `email_id` int(11) NOT NULL,
  `email_body` varchar(3000) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='email information storage table';

--
-- Dumping data for table `tb_email`
--

INSERT INTO `tb_email` (`email_id`, `email_body`, `email_subject`, `created_on`) VALUES
(15, 'asdf', 'sadf', '2019-03-30 09:09:11'),
(16, 'asdf', 'sadf', '2019-03-30 09:09:51'),
(17, 'asdf', 'sadf', '2019-03-30 09:10:20'),
(18, 'asdf', 'sadf', '2019-03-30 09:31:06'),
(19, 'testing email', 'test', '2019-03-30 10:47:24'),
(20, 'testing email', 'test', '2019-03-30 10:49:12'),
(21, 'testing email', 'test', '2019-03-30 10:50:00'),
(22, 'testing email', 'test', '2019-03-30 10:52:38'),
(23, 'testing email', 'test', '2019-03-30 10:56:02'),
(24, 'testing email', 'test', '2019-03-30 10:56:51'),
(25, 'testing email', 'test', '2019-03-30 10:57:39'),
(26, 'testing email', 'test', '2019-03-30 10:58:23'),
(27, 'testing email', 'test', '2019-03-30 10:58:53'),
(28, 'testing email', 'test', '2019-03-30 10:59:13'),
(29, 'testing email', 'test', '2019-03-30 11:00:25'),
(30, 'testing email', 'test', '2019-03-30 11:01:03'),
(31, 'testing email', 'test', '2019-03-30 11:01:11'),
(32, 'testing email', 'test', '2019-03-30 11:01:27'),
(33, 'testing email', 'test', '2019-03-30 11:04:07'),
(34, '', '', '2019-03-30 11:17:20'),
(35, 'testing msg', 'test', '2019-03-31 07:39:50'),
(36, 'testing msg', 'test', '2019-03-31 07:40:31'),
(37, 'test msg', 'test', '2019-03-31 07:45:59'),
(38, 'test msg', 'test', '2019-03-31 07:48:31'),
(39, 'test msg', 'test', '2019-03-31 07:50:50'),
(40, 'test msg', 'test', '2019-03-31 07:52:20'),
(41, 'test msg', 'test', '2019-03-31 07:52:42'),
(42, 'test msg', 'test', '2019-03-31 07:59:12'),
(43, 'test msg', 'test', '2019-03-31 08:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_email_link`
--

CREATE TABLE `tb_email_link` (
  `id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table to link email to user';

--
-- Dumping data for table `tb_email_link`
--

INSERT INTO `tb_email_link` (`id`, `email_id`, `user_id`, `status`) VALUES
(1, 17, 3, 1),
(2, 18, 3, 1),
(3, 19, 3, 1),
(4, 20, 3, 1),
(5, 21, 3, 1),
(6, 22, 3, 1),
(7, 23, 3, 1),
(8, 24, 3, 1),
(9, 25, 3, 1),
(10, 26, 3, 1),
(11, 27, 3, 1),
(12, 28, 3, 1),
(13, 29, 3, 1),
(14, 30, 3, 1),
(15, 31, 3, 1),
(16, 32, 3, 1),
(17, 33, 3, 1),
(18, 34, 2, 0),
(19, 34, 3, 0),
(20, 35, 3, 1),
(21, 36, 3, 1),
(22, 37, 3, 1),
(23, 38, 3, 1),
(24, 39, 3, 1),
(25, 40, 3, 1),
(26, 41, 3, 1),
(27, 42, 3, 1),
(28, 43, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `is_block` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `firstname`, `lastname`, `email`, `city`, `company`, `country`, `password`, `is_admin`, `is_block`) VALUES
(1, 'Preethi', 'Rajkumar', 'preethi@email.com', 'pay lebar', 'abc company', 'singapore', 'abc', 0, 0),
(2, 'Jeyashree', 'Rajkumar', 'jey@email.com', 'kallang', 'lithan', 'singapore', '1234', 0, 0),
(3, 'Su Wei', 'Thien', 'suwei.thien@gmail.com', 'Singapore', 'Blink Technologies Pte Ltd', 'Singapore', '123123', 0, 0),
(4, 'Su Wei', 'Thien', 'suwei.thien.admin@gmail.com', 'Singapore', 'Blink Technologies Pte Ltd', 'Singapore', '123123', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_email`
--
ALTER TABLE `tb_email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `tb_email_link`
--
ALTER TABLE `tb_email_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_id` (`email_id`),
  ADD KEY `id` (`user_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_email`
--
ALTER TABLE `tb_email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_email_link`
--
ALTER TABLE `tb_email_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_email_link`
--
ALTER TABLE `tb_email_link`
  ADD CONSTRAINT `email id` FOREIGN KEY (`email_id`) REFERENCES `tb_email` (`email_id`),
  ADD CONSTRAINT `user id` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);
