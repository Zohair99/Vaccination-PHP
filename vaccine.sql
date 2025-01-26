-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 05:45 AM
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
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `appoint_name` varchar(100) NOT NULL,
  `appoint_fname` varchar(100) NOT NULL,
  `appoint_age` int(11) NOT NULL,
  `appoint_number` varchar(15) NOT NULL,
  `appoint_gender` varchar(255) NOT NULL,
  `appoint_hosp_name` varchar(255) NOT NULL,
  `appointment_date` date DEFAULT current_timestamp(),
  `service_type` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appoint_name`, `appoint_fname`, `appoint_age`, `appoint_number`, `appoint_gender`, `appoint_hosp_name`, `appointment_date`, `service_type`, `user_id`) VALUES
(26, 'ALI AMIR', 'AMIR KHAN', 17, '12345678900', 'male', 'safiee', '2024-12-22', 'General Checkup', 49),
(27, 'ALI AMIR', 'AMIR KHAN', 17, '12345678900', 'male', 'safiee', '2024-12-22', 'General Checkup', 49),
(28, 'ALI AMIR', 'AMIR KHAN', 17, '12345678900', 'male', 'safiee', '2024-12-22', 'General Checkup', 49);

-- --------------------------------------------------------

--
-- Table structure for table `update_vaccine`
--

CREATE TABLE `update_vaccine` (
  `id` int(11) NOT NULL,
  `vaccine_hosp` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_gender` varchar(255) NOT NULL,
  `patient_no` varchar(255) NOT NULL,
  `patient_blood_type` varchar(255) NOT NULL,
  `vaccine_date` date NOT NULL,
  `vaccine_name` varchar(255) NOT NULL,
  `vaccine_dose` varchar(255) NOT NULL,
  `vaccine_status` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `vaccine_result` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `update_vaccine`
--

INSERT INTO `update_vaccine` (`id`, `vaccine_hosp`, `patient_name`, `patient_age`, `patient_gender`, `patient_no`, `patient_blood_type`, `vaccine_date`, `vaccine_name`, `vaccine_dose`, `vaccine_status`, `patient_id`, `vaccine_result`) VALUES
(18, 'safiee', 'Ali', 16, 'Male', '12345678902', '', '2024-12-22', 'Covaxin', '1 Dose', 'Fully Vaccinated', 49, NULL),
(19, 'Agha Khan', 'Khan Bhai ', 25, 'Male', '12345678902', '', '2024-12-25', 'Sinovac', '1 Dose', 'Partially Vaccinated', 53, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `c_pass` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_type` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `hosp_type` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `selected_hosp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `c_pass`, `phone`, `role`, `address`, `age`, `gender`, `blood_type`, `profile`, `hosp_type`, `action`, `selected_hosp_id`) VALUES
(49, 'Ali', 'ali@gmail.com', '$2y$10$lR9fKleHKiQUYpDE30pPcOTOj4wU7Zw3mqclEuW50Ilhc2MSzyoyS', '$2y$10$ABLkeyufvn5eEtSaKvTV.eN8U.8r6Hff0T1advHYQkAZVVaItb4B2', '12345678902', 'Patient', 'nazimabad ', '16', 'Male', NULL, NULL, NULL, 'Approved', 50),
(50, 'safiee', 'safiee@gmail.com', '$2y$10$.U/bcHy8vPoCCvQZoAOyQecj5tJ0WpRPUUX6yKT8ngInJ9dOlEgjC', '$2y$10$NWO/PUYoa4b98FvpkoAOJ.lnzO.H4AewY2OX74/HmoqAXTtXoBhBO', '12345678902', 'Hospital', 'gulshan', NULL, NULL, NULL, NULL, 'Government', 'Approved', NULL),
(51, 'Agha Khan', 'aghakhan@gmail.com', '$2y$10$nFdLCcBGbtaCgI6yj/0VjOTQMNokVoaD/v2XDdoLrg7pmptDGnSb2', '$2y$10$ZK.tQhoO3u/Zt84M7rO.OueN/9ga2NORzg9doyBZL2LZjJduxBylm', '12345678901', 'Hospital', 'Johor', NULL, NULL, NULL, NULL, 'Private', 'Approved', NULL),
(52, 'Ahmed Nadeem', 'ahmed@gmail.com', '$2y$10$7/HW6x7v4SkDnz9qANU9U.yIz0NSducLa7d.7qHmbgYgR6UVAg.Em', '$2y$10$rGRxhIK8erqK8cChoz0sdOTyVzpFHtss9xD0EjCxbMzaSTwr/VOs2', '12345678901', 'Patient', 'Fedral B area', '25', 'Male', NULL, NULL, NULL, NULL, 50),
(53, 'Khan Bhai ', 'khan@gmail.com', '$2y$10$IdoIjtnXfDOiQIQLhiywj.yk9hWF2mXIkJWJ7sX/FsfHBeRWEwm.a', '$2y$10$QPqoaVPM7XbC/QkUeFYVy.mbN31X4A9CxqX1LFX4Wl.Wojh68fTqa', '12345678902', 'Patient', 'Gulsan ', '25', 'Male', NULL, NULL, NULL, 'Approved', 51);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `vaccine_name` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `dose` varchar(255) NOT NULL,
  `approved` varchar(255) NOT NULL,
  `action` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `vaccine_name`, `manufacturer`, `added_date`, `dose`, `approved`, `action`) VALUES
(2, 'Pfizer-BioNTech	', 'Pfizer, Inc. / BioNTech	', '2024-09-17', 'dose-1', 'Approved by WHO', 'available'),
(3, 'Pfizer', 'BioNTech	', '2024-09-04', 'dose-2', 'Approved by WHO', 'available'),
(49, 'Moderna', 'Moderna inc', '2024-09-25', 'dose-1', 'Approved by WHO', 'available'),
(50, 'Sinovac', 'Sinovac Biotech', '2024-09-20', 'dose-2', 'Approved by WHO', 'available'),
(51, 'Covaxin', 'Bharat Biotech', '2024-09-28', 'dose-2', 'Approved by WHO', 'available'),
(55, 'Sore Throat', 'Major Pharmaceuticals', '2024-03-12', 'dose-1', 'Approved by WHO', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_vaccine`
--
ALTER TABLE `update_vaccine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `update_vaccine`
--
ALTER TABLE `update_vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
