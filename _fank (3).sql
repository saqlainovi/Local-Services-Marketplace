-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 07:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `@fank`
--

-- --------------------------------------------------------

--
-- Table structure for table `battery_services`
--

CREATE TABLE `battery_services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `battery_types` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `battery_services`
--

INSERT INTO `battery_services` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_service`, `work_experience`, `image`, `rating`, `battery_types`, `created_at`, `availability`) VALUES
(1, 'Power Plus', 'power@email.com', '01712345743', 'Dhaka', 300.00, 5, 'default.jpg', 4.5, 'Car, Motorcycle', '2024-11-16 18:07:46', 1),
(2, 'Quick Charge', 'quick@email.com', '01812345744', 'Chittagong', 250.00, 4, 'default.jpg', 4.3, 'All Types', '2024-11-16 18:07:46', 1),
(3, 'Battery Master', 'master@email.com', '01912345745', 'Sylhet', 350.00, 7, 'default.jpg', 4.8, 'Industrial', '2024-11-16 18:07:46', 1),
(4, 'Volt Service', 'volt@email.com', '01612345746', 'Rajshahi', 280.00, 5, 'default.jpg', 4.4, 'Automotive', '2024-11-16 18:07:46', 1),
(5, 'Pro Battery', 'probat@email.com', '01512345747', 'Khulna', 320.00, 6, 'default.jpg', 4.7, 'UPS, Inverter', '2024-11-16 18:07:46', 1),
(6, 'City Power', 'citypower@email.com', '01712345748', 'Barisal', 270.00, 4, 'default.jpg', 4.2, 'Home Backup', '2024-11-16 18:07:46', 1),
(7, 'Expert Battery', 'expert@email.com', '01812345749', 'Rangpur', 290.00, 6, 'default.jpg', 4.5, 'Solar', '2024-11-16 18:07:46', 1),
(8, 'Royal Power', 'royal@email.com', '01912345750', 'Dhaka', 330.00, 8, 'default.jpg', 4.9, 'Premium Service', '2024-11-16 18:07:46', 1),
(9, 'Budget Battery', 'budget@email.com', '01612345751', 'Chittagong', 260.00, 5, 'default.jpg', 4.3, 'Basic Service', '2024-11-16 18:07:46', 1),
(10, 'Care Battery', 'care@email.com', '01512345752', 'Dhaka', 310.00, 7, 'default.jpg', 4.6, 'Emergency Service', '2024-11-16 18:07:46', 1),
(11, 'Swift Power', 'swift@email.com', '01712345753', 'Sylhet', 340.00, 8, 'default.jpg', 4.7, 'Quick Service', '2024-11-16 18:07:46', 1),
(12, 'Easy Battery', 'easy@email.com', '01812345754', 'Rajshahi', 295.00, 6, 'default.jpg', 4.4, 'Mobile Service', '2024-11-16 18:07:46', 1),
(13, 'Smart Power', 'smart@email.com', '01912345755', 'Khulna', 275.00, 5, 'default.jpg', 4.2, 'Jump Start', '2024-11-16 18:07:46', 1),
(14, 'Prime Battery', 'prime@email.com', '01612345756', 'Barisal', 325.00, 7, 'default.jpg', 4.5, 'All Brands', '2024-11-16 18:07:46', 1),
(15, 'Value Power', 'value@email.com', '01512345757', 'Rangpur', 285.00, 4, 'default.jpg', 4.1, 'Economic Service', '2024-11-16 18:07:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_mechanics`
--

CREATE TABLE `car_mechanics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `specialization` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_mechanics`
--

INSERT INTO `car_mechanics` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_hour`, `work_experience`, `image`, `rating`, `specialization`, `created_at`, `availability`) VALUES
(1, 'Habib Rahman', 'habib@email.com', '01712345698', 'Dhaka', 600.00, 7, 'default.jpg', 4.7, 'Engine Specialist', '2024-11-16 18:07:46', 1),
(2, 'Kalam Miah', 'kalam@email.com', '01812345699', 'Chittagong', 550.00, 5, 'default.jpg', 4.4, 'Transmission Expert', '2024-11-16 18:07:46', 1),
(3, 'Dulal Khan', 'dulal@email.com', '01912345700', 'Sylhet', 650.00, 9, 'default.jpg', 4.9, 'Japanese Cars', '2024-11-16 18:07:46', 1),
(4, 'Shamim Ahmed', 'shamim@email.com', '01612345701', 'Rajshahi', 580.00, 6, 'default.jpg', 4.5, 'European Cars', '2024-11-16 18:07:46', 1),
(5, 'Jalal Uddin', 'jalal@email.com', '01512345702', 'Khulna', 620.00, 8, 'default.jpg', 4.8, 'Brake Specialist', '2024-11-16 18:07:46', 1),
(6, 'Iqbal Hossain', 'iqbal@email.com', '01712345703', 'Barisal', 570.00, 5, 'default.jpg', 4.3, 'Electrical Systems', '2024-11-16 18:07:46', 1),
(7, 'Mamun Khan', 'mamun@email.com', '01812345704', 'Rangpur', 590.00, 7, 'default.jpg', 4.6, 'AC Repair', '2024-11-16 18:07:46', 1),
(8, 'Sajib Ali', 'sajib@email.com', '01912345705', 'Dhaka', 630.00, 10, 'default.jpg', 4.9, 'Diagnostics Expert', '2024-11-16 18:07:46', 1),
(9, 'Omar Faruk', 'omar@email.com', '01612345706', 'Chittagong', 560.00, 6, 'default.jpg', 4.4, 'Suspension Expert', '2024-11-16 18:07:46', 1),
(10, 'Mahbub Alam', 'mahbub@email.com', '01512345707', 'Dhaka', 610.00, 8, 'default.jpg', 4.7, 'Engine Repair', '2024-11-16 18:07:46', 1),
(11, 'Sumon Miah', 'sumon@email.com', '01712345708', 'Sylhet', 640.00, 9, 'default.jpg', 4.8, 'Transmission Repair', '2024-11-16 18:07:46', 1),
(12, 'Arif Khan', 'arif@email.com', '01812345709', 'Rajshahi', 595.00, 7, 'default.jpg', 4.5, 'Brake Expert', '2024-11-16 18:07:46', 1),
(13, 'Babu Miah', 'babu@email.com', '01912345710', 'Khulna', 575.00, 6, 'default.jpg', 4.3, 'General Repair', '2024-11-16 18:07:46', 1),
(14, 'Jewel Rana', 'jewel@email.com', '01612345711', 'Barisal', 625.00, 8, 'default.jpg', 4.6, 'Electrical Expert', '2024-11-16 18:07:46', 1),
(15, 'Saikat Ahmed', 'saikat@email.com', '01512345712', 'Rangpur', 585.00, 5, 'default.jpg', 4.2, 'AC Specialist', '2024-11-16 18:07:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `electricians`
--

CREATE TABLE `electricians` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `profile_image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electricians`
--

INSERT INTO `electricians` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_hour`, `work_experience`, `profile_image`, `rating`, `created_at`, `availability`) VALUES
(1, 'Md. Karim Rahman', 'karim.rahman@gmail.com', '01711-234567', 'Mirpur, Dhaka', 500.00, 8, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(2, 'Abdul Hamid', 'hamid.electric@yahoo.com', '01819-876543', 'Dhanmondi, Dhaka', 600.00, 12, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1),
(3, 'Rafiqul Islam', 'rafiq.electrician@gmail.com', '01612-345678', 'Uttara, Dhaka', 450.00, 5, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(4, 'Jamal Uddin', 'jamal.electric@gmail.com', '01911-987654', 'Gulshan, Dhaka', 800.00, 15, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1),
(5, 'Shahidul Haque', 'shahid.electric@yahoo.com', '01515-123456', 'Banani, Dhaka', 700.00, 10, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(6, 'Nurul Islam', 'nurul.electrician@gmail.com', '01712-345678', 'Mohammadpur, Dhaka', 550.00, 7, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1),
(7, 'Masud Rana', 'masud.electric@gmail.com', '01818-234567', 'Badda, Dhaka', 480.00, 6, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(8, 'Zahirul Islam', 'zahir.electric@yahoo.com', '01617-876543', 'Motijheel, Dhaka', 650.00, 9, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1),
(9, 'Farid Ahmed', 'farid.electrician@gmail.com', '01912-345678', 'Khilgaon, Dhaka', 520.00, 8, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(10, 'Sohel Rana', 'sohel.electric@gmail.com', '01716-987654', 'Rampura, Dhaka', 580.00, 11, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1),
(11, 'Rubel Hossain', 'rubel.electric@yahoo.com', '01813-123456', 'Malibagh, Dhaka', 490.00, 7, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(12, 'Kamrul Hasan', 'kamrul.electrician@gmail.com', '01613-345678', 'Tejgaon, Dhaka', 600.00, 13, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1),
(13, 'Mizanur Rahman', 'mizan.electric@gmail.com', '01913-234567', 'Farmgate, Dhaka', 550.00, 9, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(14, 'Shahin Alam', 'shahin.electric@yahoo.com', '01714-876543', 'Mohakhali, Dhaka', 720.00, 14, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1),
(15, 'Nasir Uddin', 'nasir.electrician@gmail.com', '01814-345678', 'Pallabi, Dhaka', 480.00, 6, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(16, 'Jahangir Alam', 'jahangir.electric@gmail.com', '01614-987654', 'Cantonment, Dhaka', 650.00, 12, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1),
(17, 'Babul Miah', 'babul.electric@yahoo.com', '01914-123456', 'Kalyanpur, Dhaka', 530.00, 8, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(18, 'Rahim Sheikh', 'rahim.electrician@gmail.com', '01715-345678', 'Shyamoli, Dhaka', 570.00, 10, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1),
(19, 'Monir Hossain', 'monir.electric@gmail.com', '01815-234567', 'Agargaon, Dhaka', 600.00, 11, 'default.jpg', 0.0, '2024-11-15 06:17:33', 0),
(20, 'Liton Das', 'liton.electric@yahoo.com', '01615-876543', 'Kazipara, Dhaka', 510.00, 7, 'default.jpg', 0.0, '2024-11-15 06:17:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locksmiths`
--

CREATE TABLE `locksmiths` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `specialization` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locksmiths`
--

INSERT INTO `locksmiths` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_service`, `work_experience`, `image`, `rating`, `specialization`, `created_at`, `availability`) VALUES
(1, 'Secure Lock', 'secure@email.com', '01712345728', 'Dhaka', 400.00, 5, 'default.jpg', 4.5, 'Emergency Lockout', '2024-11-16 18:07:46', 1),
(2, 'Quick Key', 'quickkey@email.com', '01812345729', 'Chittagong', 350.00, 4, 'default.jpg', 4.3, 'Car Locks', '2024-11-16 18:07:46', 1),
(3, 'Master Lock', 'master@email.com', '01912345730', 'Sylhet', 450.00, 7, 'default.jpg', 4.8, 'Digital Locks', '2024-11-16 18:07:46', 1),
(4, 'Safe Key', 'safekey@email.com', '01612345731', 'Rajshahi', 380.00, 5, 'default.jpg', 4.4, 'Home Security', '2024-11-16 18:07:46', 1),
(5, 'Pro Lock', 'prolock@email.com', '01512345732', 'Khulna', 420.00, 6, 'default.jpg', 4.7, 'Safe Opening', '2024-11-16 18:07:46', 1),
(6, 'City Lock', 'citylock@email.com', '01712345733', 'Barisal', 370.00, 4, 'default.jpg', 4.2, 'Residential', '2024-11-16 18:07:46', 1),
(7, 'Expert Key', 'expertkey@email.com', '01812345734', 'Rangpur', 390.00, 6, 'default.jpg', 4.5, 'Commercial', '2024-11-16 18:07:46', 1),
(8, 'Royal Lock', 'royal@email.com', '01912345735', 'Dhaka', 430.00, 8, 'default.jpg', 4.9, 'High Security', '2024-11-16 18:07:46', 1),
(9, 'Budget Lock', 'budget@email.com', '01612345736', 'Chittagong', 360.00, 5, 'default.jpg', 4.3, 'Basic Services', '2024-11-16 18:07:46', 1),
(10, 'Care Lock', 'carelock@email.com', '01512345737', 'Dhaka', 410.00, 7, 'default.jpg', 4.6, 'Auto Locksmith', '2024-11-16 18:07:46', 1),
(11, 'Swift Key', 'swiftkey@email.com', '01712345738', 'Sylhet', 440.00, 8, 'default.jpg', 4.7, 'Emergency Service', '2024-11-16 18:07:46', 1),
(12, 'Easy Lock', 'easylock@email.com', '01812345739', 'Rajshahi', 395.00, 6, 'default.jpg', 4.4, 'Lock Installation', '2024-11-16 18:07:46', 1),
(13, 'Smart Lock', 'smart@email.com', '01912345740', 'Khulna', 375.00, 5, 'default.jpg', 4.2, 'Key Cutting', '2024-11-16 18:07:46', 1),
(14, 'Prime Lock', 'prime@email.com', '01612345741', 'Barisal', 425.00, 7, 'default.jpg', 4.5, 'Security Systems', '2024-11-16 18:07:46', 1),
(15, 'Value Lock', 'value@email.com', '01512345742', 'Rangpur', 385.00, 4, 'default.jpg', 4.1, 'General Service', '2024-11-16 18:07:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `profile_image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` tinyint(1) DEFAULT 1,
  `specialization` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packers_movers`
--

CREATE TABLE `packers_movers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `vehicle_type` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packers_movers`
--

INSERT INTO `packers_movers` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_hour`, `work_experience`, `image`, `rating`, `vehicle_type`, `created_at`, `availability`) VALUES
(1, 'Fast Movers', 'fast@email.com', '01712345713', 'Dhaka', 1000.00, 5, 'default.jpg', 4.5, 'Pickup, Truck', '2024-11-16 18:07:46', 1),
(2, 'City Shifters', 'city@email.com', '01812345714', 'Chittagong', 950.00, 4, 'default.jpg', 4.3, 'Van, Large Truck', '2024-11-16 18:07:46', 1),
(3, 'Quick Move', 'quick@email.com', '01912345715', 'Sylhet', 1050.00, 7, 'default.jpg', 4.8, 'All Types', '2024-11-16 18:07:46', 1),
(4, 'Safe Transit', 'safe@email.com', '01612345716', 'Rajshahi', 980.00, 5, 'default.jpg', 4.4, 'Covered Van', '2024-11-16 18:07:46', 1),
(5, 'Home Shifters', 'home@email.com', '01512345717', 'Khulna', 1020.00, 6, 'default.jpg', 4.7, 'Mini Truck, Large Truck', '2024-11-16 18:07:46', 1),
(6, 'Pro Movers', 'pro@email.com', '01712345718', 'Barisal', 970.00, 4, 'default.jpg', 4.2, 'Pickup, Van', '2024-11-16 18:07:46', 1),
(7, 'Expert Movers', 'expert@email.com', '01812345719', 'Rangpur', 990.00, 6, 'default.jpg', 4.5, 'All Sizes', '2024-11-16 18:07:46', 1),
(8, 'Royal Shift', 'royal@email.com', '01912345720', 'Dhaka', 1030.00, 8, 'default.jpg', 4.9, 'Premium Vehicles', '2024-11-16 18:07:46', 1),
(9, 'Budget Movers', 'budget@email.com', '01612345721', 'Chittagong', 960.00, 5, 'default.jpg', 4.3, 'Economic Options', '2024-11-16 18:07:46', 1),
(10, 'Care Movers', 'care@email.com', '01512345722', 'Dhaka', 1010.00, 7, 'default.jpg', 4.6, 'Specialized Transport', '2024-11-16 18:07:46', 1),
(11, 'Swift Shift', 'swift@email.com', '01712345723', 'Sylhet', 1040.00, 8, 'default.jpg', 4.7, 'Express Service', '2024-11-16 18:07:46', 1),
(12, 'Easy Move', 'easy@email.com', '01812345724', 'Rajshahi', 995.00, 6, 'default.jpg', 4.4, 'Local Transport', '2024-11-16 18:07:46', 1),
(13, 'Smart Movers', 'smart@email.com', '01912345725', 'Khulna', 975.00, 5, 'default.jpg', 4.2, 'City Moving', '2024-11-16 18:07:46', 1),
(14, 'Prime Packers', 'prime@email.com', '01612345726', 'Barisal', 1025.00, 7, 'default.jpg', 4.5, 'Interstate Moving', '2024-11-16 18:07:46', 1),
(15, 'Value Movers', 'value@email.com', '01512345727', 'Rangpur', 985.00, 4, 'default.jpg', 4.1, 'Budget Friendly', '2024-11-16 18:07:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `painters`
--

CREATE TABLE `painters` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_day` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `profile_image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `availability` tinyint(1) DEFAULT 1,
  `specialization` varchar(200) NOT NULL,
  `service_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT 'assets/img/default-painter.jpg',
  `rate` decimal(10,2) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `painters`
--

INSERT INTO `painters` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_day`, `work_experience`, `profile_image`, `rating`, `availability`, `specialization`, `service_type`, `created_at`, `image`, `rate`, `address`) VALUES
(1, 'Rahim Mia', 'rahim.painter@gmail.com', '01711-222333', 'Mirpur, Dhaka', 1200.00, 10, 'default.jpg', 5.0, 0, 'Painter', 'Painter', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(2, 'Kamal Hossain', 'kamal.paint@gmail.com', '01819-444555', 'Dhanmondi, Dhaka', 1500.00, 15, 'default.jpg', 0.0, 0, 'Interior, Exterior', 'Interior, Exterior', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(3, 'Abdul Karim', 'karim.painter@yahoo.com', '01612-666777', 'Uttara, Dhaka', 1300.00, 8, 'default.jpg', 0.0, 1, 'Wall Art, Texture', 'Wall Art, Texture', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(4, 'Mostafa Khan', 'mostafa.paint@gmail.com', '01911-888999', 'Gulshan, Dhaka', 2000.00, 12, 'default.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(5, 'Jamal Uddin', 'jamal.painter@yahoo.com', '01515-111222', 'Banani, Dhaka', 1800.00, 14, 'default.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(6, 'Sohel Rana', 'sohel.paint@gmail.com', '01712-333444', 'Mohammadpur, Dhaka', 1400.00, 9, 'default.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(7, 'Masud Ahmed', 'masud.painter@gmail.com', '01818-555666', 'Badda, Dhaka', 1600.00, 11, 'default.jpg', 0.0, 1, 'Interior Design', 'Interior Design', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(8, 'Faruk Hasan', 'faruk.paint@yahoo.com', '01617-777888', 'Motijheel, Dhaka', 1700.00, 13, 'default.jpg', 0.0, 1, 'Commercial, Residential', 'Commercial, Residential', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(9, 'Nasir Uddin', 'nasir.painter@gmail.com', '01912-999000', 'Khilgaon, Dhaka', 1300.00, 7, 'default.jpg', 0.0, 1, 'Wall Texture', 'Wall Texture', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(10, 'Rubel Miah', 'rubel.paint@gmail.com', '01716-112233', 'Rampura, Dhaka', 1500.00, 10, 'default.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(11, 'Jahangir Alam', 'jahangir.painter@yahoo.com', '01813-445566', 'Malibagh, Dhaka', 1400.00, 8, 'default.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(12, 'Shahin Khan', 'shahin.paint@gmail.com', '01613-778899', 'Tejgaon, Dhaka', 1900.00, 16, 'default.jpg', 0.0, 1, 'Commercial Projects', 'Commercial Projects', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(13, 'Mizan Rahman', 'mizan.painter@gmail.com', '01913-001122', 'Farmgate, Dhaka', 1600.00, 12, 'default.jpg', 0.0, 1, 'Residential Projects', 'Residential Projects', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(14, 'Babul Miah', 'babul.paint@yahoo.com', '01714-334455', 'Mohakhali, Dhaka', 2100.00, 18, 'default.jpg', 0.0, 1, 'Interior, Exterior', 'Interior, Exterior', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(15, 'Liton Das', 'liton.painter@gmail.com', '01814-667788', 'Pallabi, Dhaka', 1400.00, 9, 'default.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(16, 'Rashed Khan', 'rashed.paint@gmail.com', '01614-990011', 'Cantonment, Dhaka', 1700.00, 13, 'default.jpg', 0.0, 1, 'Texture Specialist', 'Texture Specialist', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(17, 'Monir Hossain', 'monir.painter@yahoo.com', '01914-223344', 'Kalyanpur, Dhaka', 1500.00, 11, 'default.jpg', 0.0, 1, 'Wall Art', 'Wall Art', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(18, 'Sharif Uddin', 'sharif.paint@gmail.com', '01715-556677', 'Shyamoli, Dhaka', 1800.00, 15, 'default.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(19, 'Kabir Ahmed', 'kabir.painter@gmail.com', '01815-889900', 'Agargaon, Dhaka', 1600.00, 12, 'default.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address'),
(20, 'Dulal Miah', 'dulal.paint@yahoo.com', '01615-112233', 'Kazipara, Dhaka', 1400.00, 10, 'default.jpg', 0.0, 1, 'Interior Design', 'Interior Design', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg', 500.00, 'Sample Address');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `painter_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_intent_id` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `booking_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `electrician_id` int(11) DEFAULT NULL,
  `plumber_id` int(11) DEFAULT NULL,
  `tv_technician_id` int(11) DEFAULT NULL,
  `mechanic_id` int(11) DEFAULT NULL,
  `packer_mover_id` int(11) DEFAULT NULL,
  `locksmith_id` int(11) DEFAULT NULL,
  `battery_service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `painter_id`, `amount`, `payment_intent_id`, `status`, `booking_date`, `created_at`, `electrician_id`, `plumber_id`, `tv_technician_id`, `mechanic_id`, `packer_mover_id`, `locksmith_id`, `battery_service_id`) VALUES
(1, 86, 1, 1200.00, 'pi_3QLMsoJcVq5mfW9U0sKMcoSC', 'completed', '2024-11-27', '2024-11-15 10:38:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 86, 2, 1500.00, 'pi_3QLN2xJcVq5mfW9U0pptbxUb', 'completed', '2024-11-29', '2024-11-15 10:48:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 97, 1, 1200.00, 'pi_3QLTOEJcVq5mfW9U0bAuyFlg', 'completed', '2024-11-17', '2024-11-15 17:33:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 97, 2, 1500.00, 'pi_3QLkv3JcVq5mfW9U0UB9x57T', 'completed', '2024-11-25', '2024-11-16 12:16:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 97, 3, 1300.00, 'pi_3QLlDjJcVq5mfW9U1acMdVAY', 'completed', '2024-11-24', '2024-11-16 12:35:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 97, 4, 2000.00, 'pi_3QLlVTJcVq5mfW9U0bzmIyzE', 'completed', '2024-11-27', '2024-11-16 12:54:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 97, 5, 1800.00, 'pi_3QLlaFJcVq5mfW9U1hXoRQtR', 'completed', '2024-11-19', '2024-11-16 12:58:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 97, 6, 1400.00, 'pi_3QLly0JcVq5mfW9U1dRtoglO', 'completed', '2024-11-20', '2024-11-16 13:23:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 97, 1, 1200.00, 'pi_3QLpJkJcVq5mfW9U06aX9Rw0', 'completed', '2024-11-19', '2024-11-16 16:58:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 97, 2, 600.00, 'pi_3QLzcLJcVq5mfW9U10WJFBJe', 'completed', '2024-11-20', '2024-11-17 03:58:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 97, 2, 600.00, 'pi_3QLzdXJcVq5mfW9U0JtZ4txy', 'completed', '2024-11-19', '2024-11-17 03:59:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 86, 1, 1200.00, 'pi_3QM1bNJcVq5mfW9U09b2YQqT', 'completed', '2024-11-26', '2024-11-17 06:05:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plumbers`
--

CREATE TABLE `plumbers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `specialization` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plumbers`
--

INSERT INTO `plumbers` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_service`, `work_experience`, `image`, `rating`, `specialization`, `created_at`, `availability`) VALUES
(1, 'Kamal Hassan', 'kamal@email.com', '01712345678', 'Dhaka', 500.00, 5, 'default.jpg', 0.0, 'Pipe Fitting, Bathroom Installation', '2024-11-16 18:01:27', 1),
(2, 'Rahim Khan', 'rahim@email.com', '01812345678', 'Chittagong', 450.00, 3, 'default.jpg', 0.0, 'Emergency Plumbing, Water Heater', '2024-11-16 18:01:27', 1),
(3, 'Kamal Hassan', 'kamal@email.com', '01712345678', 'Dhaka', 500.00, 5, 'default.jpg', 4.5, 'Pipe Fitting, Bathroom Installation', '2024-11-16 18:07:18', 1),
(4, 'Rahim Khan', 'rahim@email.com', '01812345679', 'Chittagong', 450.00, 3, 'default.jpg', 4.0, 'Emergency Plumbing', '2024-11-16 18:07:18', 1),
(5, 'Jamal Uddin', 'jamal@email.com', '01912345670', 'Sylhet', 550.00, 7, 'default.jpg', 4.8, 'Water Heater Specialist', '2024-11-16 18:07:18', 1),
(6, 'Sohel Ahmed', 'sohel@email.com', '01612345671', 'Rajshahi', 480.00, 4, 'default.jpg', 4.2, 'Drainage Expert', '2024-11-16 18:07:18', 1),
(7, 'Masud Rana', 'masud@email.com', '01512345672', 'Khulna', 520.00, 6, 'default.jpg', 4.6, 'Commercial Plumbing', '2024-11-16 18:07:18', 1),
(8, 'Farid Miah', 'farid@email.com', '01712345673', 'Barisal', 470.00, 3, 'default.jpg', 4.1, 'Residential Plumbing', '2024-11-16 18:07:18', 1),
(9, 'Nasir Uddin', 'nasir@email.com', '01812345674', 'Rangpur', 490.00, 5, 'default.jpg', 4.4, 'Pipe Installation', '2024-11-16 18:07:18', 1),
(10, 'Kabir Ahmed', 'kabir@email.com', '01912345675', 'Dhaka', 530.00, 8, 'default.jpg', 4.7, 'Bathroom Specialist', '2024-11-16 18:07:18', 1),
(11, 'Rafiq Islam', 'rafiq@email.com', '01612345676', 'Chittagong', 460.00, 4, 'default.jpg', 4.3, 'Emergency Services', '2024-11-16 18:07:18', 1),
(12, 'Shahid Khan', 'shahid@email.com', '01512345677', 'Dhaka', 510.00, 6, 'default.jpg', 4.5, 'Water Line Expert', '2024-11-16 18:07:18', 1),
(13, 'Monir Hossain', 'monir@email.com', '01712345678', 'Sylhet', 540.00, 7, 'default.jpg', 4.6, 'Commercial Expert', '2024-11-16 18:07:18', 1),
(14, 'Jasim Uddin', 'jasim@email.com', '01812345679', 'Rajshahi', 495.00, 5, 'default.jpg', 4.4, 'Residential Expert', '2024-11-16 18:07:18', 1),
(15, 'Liton Das', 'liton@email.com', '01912345680', 'Khulna', 475.00, 4, 'default.jpg', 4.2, 'Pipe Repair', '2024-11-16 18:07:18', 1),
(16, 'Shahin Alam', 'shahin@email.com', '01612345681', 'Barisal', 525.00, 6, 'default.jpg', 4.5, 'Water Heater Expert', '2024-11-16 18:07:18', 1),
(17, 'Rashed Khan', 'rashed@email.com', '01512345682', 'Rangpur', 485.00, 3, 'default.jpg', 4.1, 'General Plumbing', '2024-11-16 18:07:18', 1),
(18, 'Kamal Hassan', 'kamal@email.com', '01712345678', 'Dhaka', 500.00, 5, 'default.jpg', 4.5, 'Pipe Fitting, Bathroom Installation', '2024-11-16 18:07:46', 1),
(19, 'Rahim Khan', 'rahim@email.com', '01812345679', 'Chittagong', 450.00, 3, 'default.jpg', 4.0, 'Emergency Plumbing', '2024-11-16 18:07:46', 1),
(20, 'Jamal Uddin', 'jamal@email.com', '01912345670', 'Sylhet', 550.00, 7, 'default.jpg', 4.8, 'Water Heater Specialist', '2024-11-16 18:07:46', 1),
(21, 'Sohel Ahmed', 'sohel@email.com', '01612345671', 'Rajshahi', 480.00, 4, 'default.jpg', 4.2, 'Drainage Expert', '2024-11-16 18:07:46', 1),
(22, 'Masud Rana', 'masud@email.com', '01512345672', 'Khulna', 520.00, 6, 'default.jpg', 4.6, 'Commercial Plumbing', '2024-11-16 18:07:46', 1),
(23, 'Farid Miah', 'farid@email.com', '01712345673', 'Barisal', 470.00, 3, 'default.jpg', 4.1, 'Residential Plumbing', '2024-11-16 18:07:46', 1),
(24, 'Nasir Uddin', 'nasir@email.com', '01812345674', 'Rangpur', 490.00, 5, 'default.jpg', 4.4, 'Pipe Installation', '2024-11-16 18:07:46', 1),
(25, 'Kabir Ahmed', 'kabir@email.com', '01912345675', 'Dhaka', 530.00, 8, 'default.jpg', 4.7, 'Bathroom Specialist', '2024-11-16 18:07:46', 1),
(26, 'Rafiq Islam', 'rafiq@email.com', '01612345676', 'Chittagong', 460.00, 4, 'default.jpg', 4.3, 'Emergency Services', '2024-11-16 18:07:46', 1),
(27, 'Shahid Khan', 'shahid@email.com', '01512345677', 'Dhaka', 510.00, 6, 'default.jpg', 4.5, 'Water Line Expert', '2024-11-16 18:07:46', 1),
(28, 'Monir Hossain', 'monir@email.com', '01712345678', 'Sylhet', 540.00, 7, 'default.jpg', 4.6, 'Commercial Expert', '2024-11-16 18:07:46', 1),
(29, 'Jasim Uddin', 'jasim@email.com', '01812345679', 'Rajshahi', 495.00, 5, 'default.jpg', 4.4, 'Residential Expert', '2024-11-16 18:07:46', 1),
(30, 'Liton Das', 'liton@email.com', '01912345680', 'Khulna', 475.00, 4, 'default.jpg', 4.2, 'Pipe Repair', '2024-11-16 18:07:46', 1),
(31, 'Shahin Alam', 'shahin@email.com', '01612345681', 'Barisal', 525.00, 6, 'default.jpg', 4.5, 'Water Heater Expert', '2024-11-16 18:07:46', 1),
(32, 'Rashed Khan', 'rashed@email.com', '01512345682', 'Rangpur', 485.00, 3, 'default.jpg', 4.1, 'General Plumbing', '2024-11-16 18:07:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `painter_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `electrician_id` int(11) DEFAULT NULL,
  `plumber_id` int(11) DEFAULT NULL,
  `tv_technician_id` int(11) DEFAULT NULL,
  `mechanic_id` int(11) DEFAULT NULL,
  `packer_mover_id` int(11) DEFAULT NULL,
  `locksmith_id` int(11) DEFAULT NULL,
  `battery_service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `payment_id`, `user_id`, `painter_id`, `rating`, `review_text`, `created_at`, `updated_at`, `electrician_id`, `plumber_id`, `tv_technician_id`, `mechanic_id`, `packer_mover_id`, `locksmith_id`, `battery_service_id`) VALUES
(1, 8, 97, 6, 3, 'asdasdsadasddasffads', '2024-11-16 21:57:19', '2024-11-16 22:15:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 7, 97, 5, 3, 'adsddasd', '2024-11-16 21:57:28', '2024-11-16 21:59:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 6, 97, 4, 2, 'fs', '2024-11-16 22:01:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 97, 3, 2, 'asd', '2024-11-16 22:10:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 4, 97, 2, 4, 'ad', '2024-11-16 22:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 8, 97, 6, 3, 'hu', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 4, 97, 2, 4, 'asdasf', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 3, 97, 1, 5, 'asd', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, 97, 1, 3, 'saf', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 9, 97, 1, 5, 'safadsdadfsadfs', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 10, 97, 2, 4, 'very good', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 12, 86, 1, 3, 'sad', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tv_repair`
--

CREATE TABLE `tv_repair` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `work_experience` int(11) DEFAULT NULL,
  `brand_expertise` text DEFAULT NULL,
  `services_offered` text DEFAULT NULL,
  `service_charge` decimal(10,2) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT 1,
  `rating` decimal(3,2) DEFAULT NULL,
  `total_reviews` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tv_repair`
--

INSERT INTO `tv_repair` (`id`, `name`, `profile_image`, `location`, `contact_number`, `email`, `work_experience`, `brand_expertise`, `services_offered`, `service_charge`, `availability`, `rating`, `total_reviews`, `created_at`) VALUES
(1, 'Rakib Ahmed', NULL, 'Dhaka', '01711-123456', 'rakib.ahmed@email.com', 8, 'Samsung, LG, Sony', 'Display Repair, Sound Issues, Smart TV Setup', 1200.00, 1, 4.50, 0, '2024-11-16 15:00:58'),
(2, 'Masud Khan', NULL, 'Chittagong', '01812-234567', 'masud.khan@email.com', 5, 'All Brands', 'Panel Repair, Software Update, Hardware Fix', 1000.00, 1, 4.20, 0, '2024-11-16 15:00:58'),
(3, 'Jamal Uddin', NULL, 'Sylhet', '01913-345678', 'jamal.uddin@email.com', 12, 'Sony, Samsung', 'Screen Replacement, Circuit Repair', 1500.00, 1, 4.80, 0, '2024-11-16 15:00:58'),
(4, 'Kamal Hassan', NULL, 'Rajshahi', '01614-456789', 'kamal.hassan@email.com', 6, 'LG, Samsung', 'Backlight Repair, Power Issues', 900.00, 1, 4.00, 0, '2024-11-16 15:00:58'),
(5, 'Nurul Islam', NULL, 'Khulna', '01515-567890', 'nurul.islam@email.com', 10, 'All Brands', 'Full Service, Emergency Repair', 1300.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(6, 'Shahid Ali', NULL, 'Barisal', '01816-678901', 'shahid.ali@email.com', 7, 'Samsung, TCL', 'Smart TV Apps, Network Setup', 1100.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(7, 'Rahim Miah', NULL, 'Dhaka', '01717-789012', 'rahim.miah@email.com', 9, 'Sony, LG', 'Display Issues, Audio Problems', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58'),
(8, 'Kabir Ahmed', NULL, 'Chittagong', '01818-890123', 'kabir.ahmed@email.com', 4, 'All Brands', 'Basic Repairs, Installation', 800.00, 1, 3.90, 0, '2024-11-16 15:00:58'),
(9, 'Sohel Rana', NULL, 'Sylhet', '01919-901234', 'sohel.rana@email.com', 15, 'Samsung, LG, Sony', 'Expert Repairs, All Services', 1600.00, 1, 4.90, 0, '2024-11-16 15:00:58'),
(10, 'Farid Uddin', NULL, 'Rajshahi', '01620-012345', 'farid.uddin@email.com', 8, 'LG, TCL', 'General Repairs, Maintenance', 1000.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(11, 'Abdul Karim', NULL, 'Dhaka', '01721-123456', 'abdul.karim@email.com', 6, 'All Brands', 'Full Service, Smart TV Setup', 1100.00, 1, 4.20, 0, '2024-11-16 15:00:58'),
(12, 'Mohsin Ali', NULL, 'Chittagong', '01822-234567', 'mohsin.ali@email.com', 9, 'Samsung, Sony', 'Display Repair, Circuit Fix', 1300.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(13, 'Nasir Khan', NULL, 'Khulna', '01923-345678', 'nasir.khan@email.com', 7, 'LG, Samsung', 'Panel Repair, Software Update', 1200.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(14, 'Omar Faruk', NULL, 'Sylhet', '01624-456789', 'omar.faruk@email.com', 11, 'Sony, TCL', 'Screen Replacement, Hardware Fix', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58'),
(15, 'Rashid Ahmed', NULL, 'Rajshahi', '01525-567890', 'rashid.ahmed@email.com', 5, 'All Brands', 'Basic Repairs, Maintenance', 900.00, 1, 4.00, 0, '2024-11-16 15:00:58'),
(16, 'Sajid Hasan', NULL, 'Barisal', '01826-678901', 'sajid.hasan@email.com', 8, 'Samsung, LG', 'Smart TV Apps, Audio Issues', 1200.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(17, 'Tarik Islam', NULL, 'Dhaka', '01727-789012', 'tarik.islam@email.com', 13, 'Sony, Samsung', 'Expert Repairs, All Services', 1500.00, 1, 4.80, 0, '2024-11-16 15:00:58'),
(18, 'Usman Ali', NULL, 'Chittagong', '01828-890123', 'usman.ali@email.com', 6, 'LG, TCL', 'Display Issues, Power Problems', 1000.00, 1, 4.10, 0, '2024-11-16 15:00:58'),
(19, 'Wahid Miah', NULL, 'Sylhet', '01929-901234', 'wahid.miah@email.com', 10, 'All Brands', 'Full Service, Emergency Repair', 1300.00, 1, 4.50, 0, '2024-11-16 15:00:58'),
(20, 'Yasir Khan', NULL, 'Rajshahi', '01630-012345', 'yasir.khan@email.com', 7, 'Samsung, Sony', 'General Repairs, Installation', 1100.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(21, 'Zahir Uddin', NULL, 'Dhaka', '01731-123456', 'zahir.uddin@email.com', 9, 'LG, Samsung', 'Display Repair, Smart TV Setup', 1300.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(22, 'Arif Hassan', NULL, 'Chittagong', '01832-234567', 'arif.hassan@email.com', 5, 'All Brands', 'Panel Repair, Circuit Fix', 1000.00, 1, 4.10, 0, '2024-11-16 15:00:58'),
(23, 'Babul Akter', NULL, 'Khulna', '01933-345678', 'babul.akter@email.com', 12, 'Sony, Samsung', 'Screen Replacement, Software Update', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58'),
(24, 'Dulal Miah', NULL, 'Sylhet', '01634-456789', 'dulal.miah@email.com', 7, 'Samsung, TCL', 'Hardware Fix, Audio Issues', 1100.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(25, 'Ershad Ali', NULL, 'Rajshahi', '01535-567890', 'ershad.ali@email.com', 10, 'All Brands', 'Full Service, Maintenance', 1300.00, 1, 4.50, 0, '2024-11-16 15:00:58'),
(26, 'Firoz Ahmed', NULL, 'Barisal', '01836-678901', 'firoz.ahmed@email.com', 6, 'LG, Sony', 'Smart TV Apps, Power Problems', 1000.00, 1, 4.20, 0, '2024-11-16 15:00:58'),
(27, 'Gias Uddin', NULL, 'Dhaka', '01737-789012', 'gias.uddin@email.com', 14, 'Samsung, LG', 'Expert Repairs, All Services', 1500.00, 1, 4.80, 0, '2024-11-16 15:00:58'),
(28, 'Hanif Khan', NULL, 'Chittagong', '01838-890123', 'hanif.khan@email.com', 8, 'Sony, TCL', 'Display Issues, Network Setup', 1200.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(29, 'Imran Ali', NULL, 'Sylhet', '01939-901234', 'imran.ali@email.com', 11, 'All Brands', 'Full Service, Emergency Repair', 1400.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(30, 'Jalal Miah', NULL, 'Rajshahi', '01640-012345', 'jalal.miah@email.com', 5, 'Samsung, LG', 'Basic Repairs, Installation', 900.00, 1, 4.00, 0, '2024-11-16 15:00:58'),
(31, 'Kader Ahmed', NULL, 'Dhaka', '01741-123456', 'kader.ahmed@email.com', 8, 'Sony, Samsung', 'Display Repair, Circuit Fix', 1200.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(32, 'Liton Khan', NULL, 'Chittagong', '01842-234567', 'liton.khan@email.com', 13, 'All Brands', 'Panel Repair, Smart TV Setup', 1500.00, 1, 4.80, 0, '2024-11-16 15:00:58'),
(33, 'Mizan Ali', NULL, 'Khulna', '01943-345678', 'mizan.ali@email.com', 6, 'LG, TCL', 'Screen Replacement, Software Update', 1000.00, 1, 4.10, 0, '2024-11-16 15:00:58'),
(34, 'Noman Uddin', NULL, 'Sylhet', '01644-456789', 'noman.uddin@email.com', 9, 'Samsung, Sony', 'Hardware Fix, Audio Issues', 1300.00, 1, 4.50, 0, '2024-11-16 15:00:58'),
(35, 'Obaid Rahim', NULL, 'Rajshahi', '01545-567890', 'obaid.rahim@email.com', 7, 'All Brands', 'Full Service, Maintenance', 1100.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(36, 'Parvez Ahmed', NULL, 'Barisal', '01846-678901', 'parvez.ahmed@email.com', 11, 'LG, Samsung', 'Smart TV Apps, Power Problems', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58'),
(37, 'Quamrul Hassan', NULL, 'Dhaka', '01747-789012', 'quamrul.hassan@email.com', 5, 'Sony, TCL', 'Basic Repairs, Network Setup', 900.00, 1, 4.00, 0, '2024-11-16 15:00:58'),
(38, 'Rubel Miah', NULL, 'Chittagong', '01848-890123', 'rubel.miah@email.com', 10, 'All Brands', 'Expert Repairs, All Services', 1300.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(39, 'Shamim Khan', NULL, 'Sylhet', '01949-901234', 'shamim.khan@email.com', 8, 'Samsung, LG', 'Display Issues, Emergency Repair', 1200.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(40, 'Tofazzal Ali', NULL, 'Rajshahi', '01650-012345', 'tofazzal.ali@email.com', 12, 'Sony, Samsung', 'Full Service, Installation', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `tv_repair_technicians`
--

CREATE TABLE `tv_repair_technicians` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `specialization` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tv_repair_technicians`
--

INSERT INTO `tv_repair_technicians` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_service`, `work_experience`, `image`, `rating`, `specialization`, `created_at`, `availability`) VALUES
(1, 'Abdul Karim', 'abdul@email.com', '01712345683', 'Dhaka', 800.00, 6, 'default.jpg', 4.6, 'LCD/LED TV Repair', '2024-11-16 18:07:46', 1),
(2, 'Mohsin Ali', 'mohsin@email.com', '01812345684', 'Chittagong', 750.00, 4, 'default.jpg', 4.3, 'Smart TV Expert', '2024-11-16 18:07:46', 1),
(3, 'Zahir Uddin', 'zahir@email.com', '01912345685', 'Sylhet', 850.00, 8, 'default.jpg', 4.8, 'All Brands Specialist', '2024-11-16 18:07:46', 1),
(4, 'Faisal Ahmed', 'faisal@email.com', '01612345686', 'Rajshahi', 780.00, 5, 'default.jpg', 4.4, 'Samsung Specialist', '2024-11-16 18:07:46', 1),
(5, 'Kamrul Hasan', 'kamrul@email.com', '01512345687', 'Khulna', 820.00, 7, 'default.jpg', 4.7, 'LG Expert', '2024-11-16 18:07:46', 1),
(6, 'Nurul Islam', 'nurul@email.com', '01712345688', 'Barisal', 770.00, 4, 'default.jpg', 4.2, 'Sony Specialist', '2024-11-16 18:07:46', 1),
(7, 'Saiful Islam', 'saiful@email.com', '01812345689', 'Rangpur', 790.00, 6, 'default.jpg', 4.5, 'Panasonic Expert', '2024-11-16 18:07:46', 1),
(8, 'Ripon Miah', 'ripon@email.com', '01912345690', 'Dhaka', 830.00, 9, 'default.jpg', 4.9, 'Display Specialist', '2024-11-16 18:07:46', 1),
(9, 'Manik Khan', 'manik@email.com', '01612345691', 'Chittagong', 760.00, 5, 'default.jpg', 4.3, 'Circuit Expert', '2024-11-16 18:07:46', 1),
(10, 'Jahid Hasan', 'jahid@email.com', '01512345692', 'Dhaka', 810.00, 7, 'default.jpg', 4.6, 'Smart TV Repair', '2024-11-16 18:07:46', 1),
(11, 'Shahed Ali', 'shahed@email.com', '01712345693', 'Sylhet', 840.00, 8, 'default.jpg', 4.7, 'LCD Specialist', '2024-11-16 18:07:46', 1),
(12, 'Rasel Khan', 'rasel@email.com', '01812345694', 'Rajshahi', 795.00, 6, 'default.jpg', 4.4, 'LED Expert', '2024-11-16 18:07:46', 1),
(13, 'Milon Miah', 'milon@email.com', '01912345695', 'Khulna', 775.00, 5, 'default.jpg', 4.2, 'General Repair', '2024-11-16 18:07:46', 1),
(14, 'Sohrab Hossain', 'sohrab@email.com', '01612345696', 'Barisal', 825.00, 7, 'default.jpg', 4.5, 'Display Expert', '2024-11-16 18:07:46', 1),
(15, 'Rubel Ahmed', 'rubel@email.com', '01512345697', 'Rangpur', 785.00, 4, 'default.jpg', 4.1, 'Circuit Repair', '2024-11-16 18:07:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tv_technicians`
--

CREATE TABLE `tv_technicians` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `profile_image` varchar(255) DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT 0.0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `availability` tinyint(1) DEFAULT 1,
  `specialization` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(190) NOT NULL,
  `phone` varchar(190) NOT NULL,
  `email` varchar(190) NOT NULL,
  `password` varchar(190) NOT NULL,
  `verify_token` varchar(190) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no, 1=yes',
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `phone`, `email`, `password`, `verify_token`, `verify_status`, `id`, `created_at`, `reset_token`) VALUES
('md siyam saqlain ovi', '01531707311', 'ih134857@gmail.com', 'ih134857@gmail.com', 'f968dcc6fc089f1757d9bd91ce57f8a6', 1, 74, '2024-11-12 17:11:39', NULL),
('jobair', '0123456789', 'mg8733770@gmail.com', '123123', 'd370633dd343471f67a95265d790c210', 1, 75, '2024-11-13 03:42:59', NULL),
('md siyam saqlain ovi', '01531707311', 'ihqw134857@gmail.com', 'qw', '8511c01ebbc188edf181510a2c30bdd7', 0, 76, '2024-11-13 05:32:03', NULL),
('md siyam saqlain ovi', '01531707311', 'asdasddsaddd57@gmail.com', 'asadsdasd', '5db44fc91c01438029f1e3a198276ed8', 0, 77, '2024-11-13 12:43:34', NULL),
('asdd', 'asd', 'asdasd', '', '8d45a3a00c7e7e676879e6979585bf06', 0, 78, '2024-11-13 12:44:20', NULL),
('as', 'dads', 'asd', 'asd', 'e62425601ea4bb270315f1ec19e06bb9', 0, 79, '2024-11-13 12:44:24', NULL),
('', '', '', '', '8e9c1a8f47363fb1b660dd342bc95d82', 0, 80, '2024-11-13 12:50:49', NULL),
('asd', 'adsd', 'asas', 'asdasd', '82f5302230e00d4b51c468593be1df32', 0, 81, '2024-11-13 12:52:39', NULL),
('md siyam saqlain ovi', '01531707311', 'qwe@gmail.com', 'qw', '3f8f6f852cb5ec6d587744ad95e3b3aa', 0, 82, '2024-11-13 14:00:28', NULL),
('md siyam saqlain ovi', '01531707311', 'qwewq857@gmail.com', 'eqweweqe', '9179892f6347078b022800f30deef11e', 0, 83, '2024-11-13 14:01:04', NULL),
('siuam', '01531707311', '212002082ovi@gmail.com', '123123', '0480486c2ae6b7b8dfddc02b3318c5cc', 0, 84, '2024-11-13 14:07:17', NULL),
('knox subber', '01531707311', 'mdsiyamsaqlainovi@gmail.com', 'asd', 'eab6f429d98d64cfe129a89448d8ecd5', 0, 85, '2024-11-13 14:08:47', NULL),
('kazi lotif', '0123456789', 'siyamovix86@gmail.com', '$2y$10$BIND2vA98K6tTtiRIzKjLeeS6tASro7wfmzzGGx/2WzuK8sBLkEKy', '7c2f9d75d8f0890c6c0c544f24d903f3', 1, 86, '2024-11-13 14:09:55', NULL),
('codu', '015848748951', 'siuampk@gmail.com', '1dfnias51844784', 'd8f5ce2348519ec1f31b393390914bb8', 1, 87, '2024-11-13 16:22:30', NULL),
('md siyam saqlain ovi', '01531707311', 'asd857@gmail.com', 'asdasd', '67a84c0bb86bf505ca8188eee74669b9', 0, 88, '2024-11-15 05:32:22', NULL),
('as', 'as', 'as', 'as', '06910708c48c3fe2ebdd05f7c36984dc', 0, 89, '2024-11-15 11:24:24', NULL),
('as', '01780044606', 'siyamovix96@gmail.com', '4321', '09e604aeafa6c543ce18b7a0910a9f49', 0, 90, '2024-11-15 11:33:33', NULL),
('A', '01531707311', 'GHJJKmovix86@gmail.com', '4321', '07792896f75a5a78106d36c469fe10ab', 0, 91, '2024-11-15 11:33:56', NULL),
('asm saqlain ovi', '01555370731', 'sdassadvix86@gmail.com', '$2y$10$miXUI3szCRJP4lo/JrAM6eeAQuLDyZn1FlZlxpuMcRiXUcm296636', '', 0, 92, '2024-11-15 16:15:14', NULL),
('md siyam saqlain ovi', '01533470731', 'siySDFEWix86@gmail.com', 'OVI123456', '13d95a989bdffa8282e5ce4ae703826f', 0, 94, '2024-11-15 16:18:37', NULL),
('md siyam saqlain ovi', '01531707311', 'sisddvix86@gmail.com', '$2y$10$hJwOKUzrcCO9m8Wnor.q9.x9bdlbxLp12cImOFffyW0e4Bw4T.ytO', 'f513cafe7a766491d8bfc24588849b7f', 0, 95, '2024-11-15 16:32:02', NULL),
('knox subber bad guy', '01531707311', 'aade89973@gmail.com', '$2y$10$awnFf.i8b8LlSR0VEP4Z/eTbgxVRJsz1pYgdxy7QzDxYL8nETev32', '9a19ce554689b6f68978ddfb847257b6', 1, 97, '2024-11-15 16:39:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `battery_services`
--
ALTER TABLE `battery_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_mechanics`
--
ALTER TABLE `car_mechanics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electricians`
--
ALTER TABLE `electricians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `locksmiths`
--
ALTER TABLE `locksmiths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packers_movers`
--
ALTER TABLE `packers_movers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `painters`
--
ALTER TABLE `painters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `painter_id` (`painter_id`),
  ADD KEY `electrician_id` (`electrician_id`),
  ADD KEY `plumber_id` (`plumber_id`),
  ADD KEY `tv_technician_id` (`tv_technician_id`),
  ADD KEY `mechanic_id` (`mechanic_id`),
  ADD KEY `packer_mover_id` (`packer_mover_id`),
  ADD KEY `locksmith_id` (`locksmith_id`),
  ADD KEY `battery_service_id` (`battery_service_id`);

--
-- Indexes for table `plumbers`
--
ALTER TABLE `plumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `painter_id` (`painter_id`),
  ADD KEY `electrician_id` (`electrician_id`),
  ADD KEY `plumber_id` (`plumber_id`),
  ADD KEY `tv_technician_id` (`tv_technician_id`),
  ADD KEY `mechanic_id` (`mechanic_id`),
  ADD KEY `packer_mover_id` (`packer_mover_id`),
  ADD KEY `locksmith_id` (`locksmith_id`),
  ADD KEY `battery_service_id` (`battery_service_id`);

--
-- Indexes for table `tv_repair`
--
ALTER TABLE `tv_repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_repair_technicians`
--
ALTER TABLE `tv_repair_technicians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_technicians`
--
ALTER TABLE `tv_technicians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `battery_services`
--
ALTER TABLE `battery_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `car_mechanics`
--
ALTER TABLE `car_mechanics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `electricians`
--
ALTER TABLE `electricians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `locksmiths`
--
ALTER TABLE `locksmiths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packers_movers`
--
ALTER TABLE `packers_movers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `painters`
--
ALTER TABLE `painters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plumbers`
--
ALTER TABLE `plumbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tv_repair`
--
ALTER TABLE `tv_repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tv_repair_technicians`
--
ALTER TABLE `tv_repair_technicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tv_technicians`
--
ALTER TABLE `tv_technicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`painter_id`) REFERENCES `painters` (`id`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`electrician_id`) REFERENCES `electricians` (`id`),
  ADD CONSTRAINT `payments_ibfk_4` FOREIGN KEY (`plumber_id`) REFERENCES `plumbers` (`id`),
  ADD CONSTRAINT `payments_ibfk_5` FOREIGN KEY (`tv_technician_id`) REFERENCES `tv_technicians` (`id`),
  ADD CONSTRAINT `payments_ibfk_6` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`id`),
  ADD CONSTRAINT `payments_ibfk_7` FOREIGN KEY (`packer_mover_id`) REFERENCES `packers_movers` (`id`),
  ADD CONSTRAINT `payments_ibfk_8` FOREIGN KEY (`locksmith_id`) REFERENCES `locksmiths` (`id`),
  ADD CONSTRAINT `payments_ibfk_9` FOREIGN KEY (`battery_service_id`) REFERENCES `battery_services` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `reviews_ibfk_10` FOREIGN KEY (`battery_service_id`) REFERENCES `battery_services` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`painter_id`) REFERENCES `painters` (`id`),
  ADD CONSTRAINT `reviews_ibfk_4` FOREIGN KEY (`electrician_id`) REFERENCES `electricians` (`id`),
  ADD CONSTRAINT `reviews_ibfk_5` FOREIGN KEY (`plumber_id`) REFERENCES `plumbers` (`id`),
  ADD CONSTRAINT `reviews_ibfk_6` FOREIGN KEY (`tv_technician_id`) REFERENCES `tv_technicians` (`id`),
  ADD CONSTRAINT `reviews_ibfk_7` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`id`),
  ADD CONSTRAINT `reviews_ibfk_8` FOREIGN KEY (`packer_mover_id`) REFERENCES `packers_movers` (`id`),
  ADD CONSTRAINT `reviews_ibfk_9` FOREIGN KEY (`locksmith_id`) REFERENCES `locksmiths` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
