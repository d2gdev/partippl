-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 06:49 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `party`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `a_name` varchar(55) NOT NULL,
  `a_pass` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `a_name`, `a_pass`) VALUES
(1, 'kanchonkumar', '1234abc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apply`
--

CREATE TABLE `tbl_apply` (
  `id` int(11) NOT NULL,
  `j_id` int(25) NOT NULL,
  `a_from` varchar(55) NOT NULL,
  `a_status` varchar(55) NOT NULL,
  `a_to` varchar(55) NOT NULL,
  `a_id` int(55) NOT NULL,
  `a_date` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_apply`
--

INSERT INTO `tbl_apply` (`id`, `j_id`, `a_from`, `a_status`, `a_to`, `a_id`, `a_date`) VALUES
(1, 954555068, 'proshanto21@gmail.com', 'Selected', 'kanchonkumar49@gmail.com', 75224775, '2021-07-10'),
(2, 588201034, 'proshanto21@gmail.com', 'Rejected', 'kapsul45@gmail.com', 1973528899, '2021-07-11'),
(3, 591029906, 'proshanto21@gmail.com', 'Selected', 'simanto69@gmail.com', 2130562194, '2021-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int(11) NOT NULL,
  `c_message` text NOT NULL,
  `c_from` varchar(55) NOT NULL,
  `c_to` varchar(55) NOT NULL,
  `c_date_time` varchar(55) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES
(1, 'Hello Proshanto Kumar Ray', 'kapsul45@gmail.com', 'proshanto21@gmail.com', '2021-07-11 04:30:49 PM', 1122575936),
(2, 'How are you', 'kapsul45@gmail.com', 'proshanto21@gmail.com', '2021-07-11 04:43:46 PM', 1936528858),
(3, 'What is you doing now', 'kapsul45@gmail.com', 'proshanto21@gmail.com', '2021-07-11 04:50:10 PM', 612500370),
(4, 'how ', 'kapsul45@gmail.com', 'proshanto21@gmail.com', '2021-07-11 04:52:27 PM', 331025484),
(5, 'Hello', 'kapsul45@gmail.com', 'proshanto21@gmail.com', '2021-07-11 04:56:10 PM', 861748277),
(6, 'Hello Proshanto', 'kapsul45@gmail.com', 'proshanto21@gmail.com', '2021-07-11 04:58:59 PM', 1456304318),
(7, 'I am fine you', 'proshanto21@gmail.com', 'kapsul45@gmail.com', '2021-07-11 05:09:16 PM', 1768100026),
(8, 'OK', 'kapsul45@gmail.com', 'proshanto21@gmail.com', '2021-07-11 05:11:06 PM', 1983009721),
(9, 'Hello Laxman', 'kapsul45@gmail.com', 'laxman68@gmail.com', '2021-07-11 05:11:40 PM', 962533167),
(10, 'What is you doing now', 'proshanto21@gmail.com', 'kapsul45@gmail.com', '2021-07-11 05:48:47 PM', 1306897730),
(11, 'how are you', 'proshanto21@gmail.com', 'kapsul45@gmail.com', '2021-07-11 05:51:33 PM', 536166660),
(12, 'Hello simanto', 'proshanto21@gmail.com', 'simanto69@gmail.com', '2021-07-11 05:51:54 PM', 1602282862),
(13, 'Hello', 'proshanto21@gmail.com', 'kapsul45@gmail.com', '2021-07-11 05:55:14 PM', 1318246767),
(14, 'How are you', 'proshanto21@gmail.com', 'simanto69@gmail.com', '2021-07-11 05:55:29 PM', 2085563964),
(15, '', 'proshanto21@gmail.com', 'simanto69@gmail.com', '2021-07-11 05:57:24 PM', 1562725613),
(16, 'Hi', 'proshanto21@gmail.com', 'simanto69@gmail.com', '2021-07-11 06:03:06 PM', 183559091);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collect_email`
--

CREATE TABLE `tbl_collect_email` (
  `id` int(11) NOT NULL,
  `c_email` varchar(55) NOT NULL,
  `c_date_time` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copy_rights`
--

CREATE TABLE `tbl_copy_rights` (
  `id` int(11) NOT NULL,
  `copy_text_name` varchar(55) NOT NULL,
  `copy_date_time` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_copy_rights`
--

INSERT INTO `tbl_copy_rights` (`id`, `copy_text_name`, `copy_date_time`) VALUES
(1, 'All CopyRights &copy; Reversed 2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employe`
--

CREATE TABLE `tbl_employe` (
  `id` int(11) NOT NULL,
  `e_name` varchar(55) NOT NULL,
  `e_title` varchar(55) NOT NULL,
  `e_type` varchar(55) NOT NULL,
  `e_location` varchar(55) NOT NULL,
  `e_img` varchar(55) NOT NULL,
  `e_nationality` varchar(55) NOT NULL,
  `e_age` varchar(55) NOT NULL,
  `e_gender` varchar(55) NOT NULL,
  `e_description` text NOT NULL,
  `e_from` varchar(55) NOT NULL,
  `e_date` varchar(55) NOT NULL,
  `e_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employe`
--

INSERT INTO `tbl_employe` (`id`, `e_name`, `e_title`, `e_type`, `e_location`, `e_img`, `e_nationality`, `e_age`, `e_gender`, `e_description`, `e_from`, `e_date`, `e_id`) VALUES
(1, 'Kanchon Kumar Shill', 'Freelancer', 'Private Employer', 'Talisay', 'pm1.jpg', 'Bangladeshi', '22', 'Male', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'kanchonkumar49@gmail.com', '2021-07-10', 721758804),
(2, 'Kapsul Chandra Ray', 'Freelancer', 'Private Employer', 'Toldedo', 'pm2.jpg', 'Bangladeshi', '22', 'Male', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'kapsul45@gmail.com', '2021-07-10', 230613803),
(3, 'Simanto Kumar Sarkar', 'Student', 'Private Employer', 'Danao', 'pm3.jpg', 'Bangladeshi', '22', 'Male', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'simanto69@gmail.com', '2021-07-10', 1268362918),
(4, 'Lucky Rahman', 'Senior Officer', 'Compnay Employer', 'Danao', 'pf1.jpg', 'Bangladeshi', '21', 'Female', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'lucky38@gmail.com', '2021-07-10', 980769728),
(5, 'Sumi Akanda', 'Marketing Officer', 'Compnay Employer', 'Danao', 'pf2.jpg', 'Bangladeshi', '21', 'Female', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'sumi21@gmail.com', '2021-07-10', 579418057);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_post`
--

CREATE TABLE `tbl_job_post` (
  `id` int(11) NOT NULL,
  `j_title` varchar(55) NOT NULL,
  `j_booking_location` varchar(55) NOT NULL,
  `j_type` varchar(55) NOT NULL,
  `j_booking_date` varchar(55) NOT NULL,
  `j_booking_time` varchar(55) NOT NULL,
  `j_payment` varchar(55) NOT NULL,
  `j_work_hour` varchar(55) NOT NULL,
  `j_description` text NOT NULL,
  `j_post_by` varchar(55) NOT NULL,
  `j_id` int(55) NOT NULL,
  `j_date` varchar(55) NOT NULL,
  `j_status` varchar(55) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job_post`
--

INSERT INTO `tbl_job_post` (`id`, `j_title`, `j_booking_location`, `j_type`, `j_booking_date`, `j_booking_time`, `j_payment`, `j_work_hour`, `j_description`, `j_post_by`, `j_id`, `j_date`, `j_status`) VALUES
(1, 'Looking Bartender', 'Minglanilla', 'Male Bartender', '2021-07-17', '10:30:PM', '3000', '3', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', 'kanchonkumar49@gmail.com', 954555068, '2021-07-10', 'Approved'),
(2, 'Looking Waiter', 'Minglanilla', 'Waiter', '2021-07-13', '10:30:AM', '2000', '2', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'kapsul45@gmail.com', 588201034, '2021-07-10', 'Approved'),
(3, 'Looking Entertainer', 'Cebu City', 'Male Entertainers', '2021-07-14', '04:30:PM', '2000', '2', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'simanto69@gmail.com', 591029906, '2021-07-10', 'Approved'),
(4, 'Looking Bartender', 'Compostella', 'Female Bartender', '2021-07-13', '12:10:AM', '3000', '3', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'lucky38@gmail.com', 647199463, '2021-07-10', 'Approved'),
(5, 'Looking Waitress', 'Carmen', 'Waitress', '2021-07-20', '10:30:PM', '2000', '2', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'sumi21@gmail.com', 158139071, '2021-07-10', 'Approved'),
(6, 'Looking Bartender', 'Liloan', 'Male Bartender', '2021-07-13', '10:30:AM', '3000', '2', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', 'kapsul45@gmail.com', 1697669855, '2021-07-11', 'Not Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_seeker`
--

CREATE TABLE `tbl_job_seeker` (
  `id` int(55) NOT NULL,
  `j_name` varchar(55) NOT NULL,
  `j_title` varchar(55) NOT NULL,
  `j_interest` varchar(55) NOT NULL,
  `j_location` varchar(55) NOT NULL,
  `j_nationality` varchar(55) NOT NULL,
  `j_img` varchar(100) NOT NULL,
  `j_skill` varchar(55) NOT NULL,
  `j_age` varchar(55) NOT NULL,
  `j_gender` varchar(55) NOT NULL,
  `j_description` text NOT NULL,
  `j_from` varchar(55) NOT NULL,
  `j_id` varchar(55) NOT NULL,
  `j_date` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job_seeker`
--

INSERT INTO `tbl_job_seeker` (`id`, `j_name`, `j_title`, `j_interest`, `j_location`, `j_nationality`, `j_img`, `j_skill`, `j_age`, `j_gender`, `j_description`, `j_from`, `j_id`, `j_date`) VALUES
(1, 'Proshanto Kumar Ray', 'Bartender', 'Male Bartender', 'CarCar', 'Bangladeshi', 'pm4.jpg', 'Skill 2', '23', 'Male', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ', 'proshanto21@gmail.com', '2039582835', '2021-07-10'),
(2, 'Laxman Kumar Ray', 'Entertainer', 'Male Entertainer', 'Liloan', 'Bangladeshi', 'pm5.jpg', 'Skill 3', '24', 'Male', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', 'laxman68@gmail.com', '23777407', '2021-07-10'),
(3, 'Akhi Rahman', 'Bartender', 'Female Bartender', 'Minglanilla', 'Bangladeshi', 'pf3.jpg', 'Skill 4', '22', 'Female', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', 'akhi15@gmail.com', '700502351', '2021-07-10'),
(4, 'Mohona Rahman', 'Waitress', 'Waitress', 'Talisay', 'Bangladeshi', 'pf4.jpg', 'Skill 2', '22', 'Female', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', 'mohona54@gmail.com', '707972115', '2021-07-10'),
(5, 'Asha Khatun', 'Promotions', 'Female Promotions', 'Lapu Lapu', 'Bangladeshi', 'pf5.jpg', 'Skill 2', '22', 'Female', 'Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit ', 'asha25@gmail.com', '1645895044', '2021-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `r_comment` text NOT NULL,
  `r_from` varchar(55) NOT NULL,
  `r_to` varchar(55) NOT NULL,
  `r_rating` int(11) NOT NULL,
  `r_id` int(55) NOT NULL,
  `r_date` varchar(55) NOT NULL,
  `j_id` int(55) NOT NULL,
  `r_publish_date` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `r_comment`, `r_from`, `r_to`, `r_rating`, `r_id`, `r_date`, `j_id`, `r_publish_date`) VALUES
(1, 'Wow amazing work by this job seeker', 'simanto69@gmail.com', 'proshanto21@gmail.com', 5, 732547405, '2021-07-11', 591029906, '2021-07-28'),
(2, 'Really Good', 'proshanto21@gmail.com', 'simanto69@gmail.com', 5, 1848872566, '2021-07-11', 591029906, '2021-07-28'),
(3, 'Nice person i like you', 'kanchonkumar49@gmail.com', 'proshanto21@gmail.com', 5, 1031016220, '2021-07-11', 954555068, '2021-07-28'),
(4, 'Very Good Person', 'proshanto21@gmail.com', 'kanchonkumar49@gmail.com', 5, 1859609025, '2021-07-11', 954555068, '2021-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sign`
--

CREATE TABLE `tbl_sign` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `active_status` varchar(55) NOT NULL DEFAULT 'Deactive',
  `last_activity` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sign`
--

INSERT INTO `tbl_sign` (`id`, `email`, `pass`, `active_status`, `last_activity`) VALUES
(1, 'kanchonkumar49@gmail.com', '12345a', 'Deactive', '21-07-11 06:46:11'),
(2, 'kapsul45@gmail.com', '12345a', 'Deactive', '21-07-11 05:22:00'),
(3, 'simanto69@gmail.com', '12345a', 'Deactive', '21-07-11 11:45:09'),
(4, 'proshanto21@gmail.com', '12345a', 'Active', '21-07-11 06:46:52'),
(5, 'laxman68@gmail.com', '12345a', 'Deactive', '21-07-10 11:44:56'),
(6, 'lucky38@gmail.com', '12345a', 'Deactive', '21-07-10 07:49:34'),
(7, 'sumi21@gmail.com', '12345a', 'Deactive', '21-07-10 12:49:46'),
(8, 'akhi15@gmail.com', '12345a', 'Deactive', '21-07-10 11:46:56'),
(9, 'mohona54@gmail.com', '12345a', 'Deactive', '21-07-10 11:48:14'),
(10, 'asha25@gmail.com', '12345a', 'Deactive', '21-07-10 11:51:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_apply`
--
ALTER TABLE `tbl_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_collect_email`
--
ALTER TABLE `tbl_collect_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copy_rights`
--
ALTER TABLE `tbl_copy_rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_post`
--
ALTER TABLE `tbl_job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_seeker`
--
ALTER TABLE `tbl_job_seeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sign`
--
ALTER TABLE `tbl_sign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_apply`
--
ALTER TABLE `tbl_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_collect_email`
--
ALTER TABLE `tbl_collect_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_copy_rights`
--
ALTER TABLE `tbl_copy_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employe`
--
ALTER TABLE `tbl_employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_job_post`
--
ALTER TABLE `tbl_job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_job_seeker`
--
ALTER TABLE `tbl_job_seeker`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sign`
--
ALTER TABLE `tbl_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
