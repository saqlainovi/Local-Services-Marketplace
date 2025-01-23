-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2024 at 11:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

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
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `battery_types` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `battery_services`
--

INSERT INTO `battery_services` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_service`, `work_experience`, `image`, `rating`, `battery_types`, `created_at`, `availability`) VALUES
(1, 'Power Plus', 'power@email.com', '01712345743', 'Dhaka', 300.00, 5, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.5, 'Car, Motorcycle', '2024-11-16 18:07:46', 0),
(2, 'Quick Charge', 'quick@email.com', '01812345744', 'Chittagong', 250.00, 4, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.3, 'All Types', '2024-11-16 18:07:46', 0),
(3, 'Battery Master', 'master@email.com', '01912345745', 'Sylhet', 350.00, 7, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.8, 'Industrial', '2024-11-16 18:07:46', 1),
(4, 'Volt Service', 'volt@email.com', '01612345746', 'Rajshahi', 280.00, 5, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.4, 'Automotive', '2024-11-16 18:07:46', 1),
(5, 'Pro Battery', 'probat@email.com', '01512345747', 'Khulna', 320.00, 6, 'People/scan0005 - Copy.jpg', 4.7, 'UPS, Inverter', '2024-11-16 18:07:46', 1),
(6, 'City Power', 'citypower@email.com', '01712345748', 'Barisal', 270.00, 4, 'People/scan0005 - Copy.jpg', 4.2, 'Home Backup', '2024-11-16 18:07:46', 1),
(7, 'Expert Battery', 'expert@email.com', '01812345749', 'Rangpur', 290.00, 6, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.5, 'Solar', '2024-11-16 18:07:46', 1),
(8, 'Royal Power', 'royal@email.com', '01912345750', 'Dhaka', 330.00, 8, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.9, 'Premium Service', '2024-11-16 18:07:46', 1),
(9, 'Budget Battery', 'budget@email.com', '01612345751', 'Chittagong', 260.00, 5, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.3, 'Basic Service', '2024-11-16 18:07:46', 1),
(10, 'Care Battery', 'care@email.com', '01512345752', 'Dhaka', 310.00, 7, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.6, 'Emergency Service', '2024-11-16 18:07:46', 1),
(11, 'Swift Power', 'swift@email.com', '01712345753', 'Sylhet', 340.00, 8, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.7, 'Quick Service', '2024-11-16 18:07:46', 1),
(12, 'Easy Battery', 'easy@email.com', '01812345754', 'Rajshahi', 295.00, 6, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.4, 'Mobile Service', '2024-11-16 18:07:46', 1),
(13, 'Smart Power', 'smart@email.com', '01912345755', 'Khulna', 275.00, 5, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.2, 'Jump Start', '2024-11-16 18:07:46', 1),
(14, 'Prime Battery', 'prime@email.com', '01612345756', 'Barisal', 325.00, 7, 'People/download.jpg', 4.5, 'All Brands', '2024-11-16 18:07:46', 1),
(15, 'Value Power', 'value@email.com', '01512345757', 'Rangpur', 285.00, 4, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.1, 'Economic Service', '2024-11-16 18:07:46', 1),
(16, 'Power Plus', 'power.plus@gmail.com', '01712345741', 'Mirpur', 400.00, 8, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.5, 'Car, Motorcycle', '2024-12-07 19:35:12', 1),
(17, 'Quick Charge', 'quick.charge@gmail.com', '01812345742', 'Dhanmondi', 350.00, 6, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.2, 'All Types', '2024-12-07 19:35:12', 1),
(18, 'Battery Master', 'battery.master@gmail.com', '01912345743', 'Gulshan', 500.00, 10, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.8, 'Industrial', '2024-12-07 19:35:12', 1),
(19, 'Volt Service', 'volt.service@gmail.com', '01612345744', 'Uttara', 300.00, 4, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.0, 'Automotive', '2024-12-07 19:35:12', 1),
(20, 'Pro Battery', 'pro.battery@gmail.com', '01512345745', 'Banani', 450.00, 7, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.6, 'UPS, Inverter', '2024-12-07 19:35:12', 1),
(21, 'Expert Power', 'expert.power@gmail.com', '01412345746', 'Mohammadpur', 380.00, 5, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.3, 'Home Backup', '2024-12-07 19:35:12', 1),
(22, 'Smart Battery', 'smart.battery@gmail.com', '01312345747', 'Badda', 480.00, 9, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.7, 'Solar', '2024-12-07 19:35:12', 1),
(23, 'Quick Fix Battery', 'quick.fix.battery@gmail.com', '01212345748', 'Khilgaon', 320.00, 3, 'People/download.jpg', 3.9, 'Basic Service', '2024-12-07 19:35:12', 1),
(24, 'Royal Power', 'royal.power@gmail.com', '01712345749', 'Motijheel', 550.00, 12, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.9, 'Premium Service', '2024-12-07 19:35:12', 1),
(25, 'Easy Battery', 'easy.battery@gmail.com', '01812345750', 'Rampura', 360.00, 5, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.1, 'Emergency Service', '2024-12-07 19:35:12', 1),
(26, 'Prime Power', 'prime.power@gmail.com', '01912345751', 'Malibagh', 400.00, 7, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.4, 'Car Battery', '2024-12-07 19:35:12', 1),
(27, 'Swift Battery', 'swift.battery@gmail.com', '01612345752', 'Tejgaon', 420.00, 8, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.5, 'Motorcycle Battery', '2024-12-07 19:35:12', 1),
(28, 'Care Battery', 'care.battery@gmail.com', '01512345753', 'Farmgate', 370.00, 6, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.2, 'UPS Battery', '2024-12-07 19:35:12', 1),
(29, 'Metro Power', 'metro.power@gmail.com', '01412345754', 'Mohakhali', 490.00, 9, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.6, 'Industrial Battery', '2024-12-07 19:35:12', 1),
(30, 'City Battery', 'city.battery@gmail.com', '01312345755', 'Pallabi', 330.00, 4, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.0, 'Solar Battery', '2024-12-07 19:35:12', 1),
(31, 'Star Power', 'star.power@gmail.com', '01212345756', 'Cantonment', 500.00, 11, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.8, 'All Types', '2024-12-07 19:35:12', 1),
(32, 'Fast Battery', 'fast.battery@gmail.com', '01712345757', 'Kalyanpur', 410.00, 7, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.3, 'Car, UPS', '2024-12-07 19:35:12', 1),
(33, 'Safe Power', 'safe.power@gmail.com', '01812345758', 'Shyamoli', 350.00, 5, 'People/download.jpg', 4.1, 'Basic Service', '2024-12-07 19:35:12', 1),
(34, 'Quick Power', 'quick.power@gmail.com', '01912345759', 'Agargaon', 440.00, 8, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.5, 'Premium Service', '2024-12-07 19:35:12', 1),
(35, 'Pro Power', 'pro.power@gmail.com', '01612345760', 'Kazipara', 380.00, 6, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.2, 'Emergency Service', '2024-12-07 19:35:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `booking_id` varchar(50) NOT NULL,
  `user_id` int NOT NULL,
  `provider_id` int NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `payment_intent_id` varchar(255) DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_id`, `user_id`, `provider_id`, `service_type`, `booking_date`, `payment_intent_id`, `payment_id`, `status`, `created_at`) VALUES
(1, 'BK202412064482', 107, 3, 'painter', '2024-12-17', NULL, NULL, 'pending', '2024-12-06 17:18:44'),
(2, 'BK202412066103', 107, 3, 'painter', '2024-12-17', NULL, NULL, 'pending', '2024-12-06 17:19:52'),
(3, 'BK202412065409', 107, 1, 'painter', '2024-12-24', NULL, NULL, 'pending', '2024-12-06 17:19:59'),
(4, 'BK202412068577', 107, 1, 'painter', '2024-12-17', NULL, NULL, 'pending', '2024-12-06 17:21:59'),
(5, 'BK202412068208', 107, 1, 'painter', '2024-12-16', NULL, NULL, 'pending', '2024-12-06 17:25:03'),
(6, 'BK202412064844', 107, 1, 'painter', '2024-12-24', NULL, NULL, 'pending', '2024-12-06 17:26:42'),
(34, 'BK202412069601', 107, 1, 'painter', '2024-12-07', NULL, 19, 'pending', '2024-12-06 18:45:29'),
(35, 'BK202412069190', 107, 1, 'painter', '2024-12-31', NULL, 20, 'pending', '2024-12-06 18:45:43'),
(42, 'BK202412071271', 107, 1, 'painter', '2024-12-08', 'pi_3QTN3yJcVq5mfW9U104yiWnV', 24, 'confirmed', '2024-12-07 12:24:39'),
(43, 'BK202412079798', 107, 1, 'painter', '2024-12-08', 'pi_3QTN71JcVq5mfW9U1Zs6ZOd8', 25, 'confirmed', '2024-12-07 12:27:48'),
(44, 'BK-67544eafb558f2.31562306', 1, 1, 'painter', '2024-12-08', NULL, NULL, 'confirmed', '2024-12-07 13:33:35'),
(45, 'BK-67544f3b54da06.29650297', 1, 1, 'painter', '2024-12-08', NULL, NULL, 'confirmed', '2024-12-07 13:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `car_mechanics`
--

CREATE TABLE `car_mechanics` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `specialization` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_mechanics`
--

INSERT INTO `car_mechanics` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_hour`, `work_experience`, `image`, `rating`, `specialization`, `created_at`, `availability`) VALUES
(1, 'Habib Rahman', 'habib@email.com', '01712345698', 'Dhaka', 600.00, 7, 'People/scan0005 - Copy.jpg', 4.7, 'Engine Specialist', '2024-11-16 18:07:46', 0),
(2, 'Kalam Miah', 'kalam@email.com', '01812345699', 'Chittagong', 550.00, 5, 'People/scan0005 - Copy.jpg', 4.4, 'Transmission Expert', '2024-11-16 18:07:46', 0),
(3, 'Dulal Khan', 'dulal@email.com', '01912345700', 'Sylhet', 650.00, 9, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.9, 'Japanese Cars', '2024-11-16 18:07:46', 1),
(4, 'Shamim Ahmed', 'shamim@email.com', '01612345701', 'Rajshahi', 580.00, 6, 'People/scan0005 - Copy.jpg', 4.5, 'European Cars', '2024-11-16 18:07:46', 1),
(5, 'Jalal Uddin', 'jalal@email.com', '01512345702', 'Khulna', 620.00, 8, 'People/scan0005 - Copy.jpg', 4.8, 'Brake Specialist', '2024-11-16 18:07:46', 1),
(6, 'Iqbal Hossain', 'iqbal@email.com', '01712345703', 'Barisal', 570.00, 5, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.3, 'Electrical Systems', '2024-11-16 18:07:46', 1),
(7, 'Mamun Khan', 'mamun@email.com', '01812345704', 'Rangpur', 590.00, 7, 'People/scan0005 - Copy.jpg', 4.6, 'AC Repair', '2024-11-16 18:07:46', 1),
(8, 'Sajib Ali', 'sajib@email.com', '01912345705', 'Dhaka', 630.00, 10, 'People/download.jpg', 4.9, 'Diagnostics Expert', '2024-11-16 18:07:46', 1),
(9, 'Omar Faruk', 'omar@email.com', '01612345706', 'Chittagong', 560.00, 6, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.4, 'Suspension Expert', '2024-11-16 18:07:46', 1),
(10, 'Mahbub Alam', 'mahbub@email.com', '01512345707', 'Dhaka', 610.00, 8, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.7, 'Engine Repair', '2024-11-16 18:07:46', 1),
(11, 'Sumon Miah', 'sumon@email.com', '01712345708', 'Sylhet', 640.00, 9, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.8, 'Transmission Repair', '2024-11-16 18:07:46', 1),
(12, 'Arif Khan', 'arif@email.com', '01812345709', 'Rajshahi', 595.00, 7, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.5, 'Brake Expert', '2024-11-16 18:07:46', 1),
(13, 'Babu Miah', 'babu@email.com', '01912345710', 'Khulna', 575.00, 6, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.3, 'General Repair', '2024-11-16 18:07:46', 1),
(14, 'Jewel Rana', 'jewel@email.com', '01612345711', 'Barisal', 625.00, 8, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.6, 'Electrical Expert', '2024-11-16 18:07:46', 1),
(15, 'Saikat Ahmed', 'saikat@email.com', '01512345712', 'Rangpur', 585.00, 5, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.2, 'AC Specialist', '2024-11-16 18:07:46', 1),
(16, 'Rakib Ahmed', 'rakib.mechanic@gmail.com', '01712345678', 'Mirpur', 800.00, 8, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.5, 'Engine Specialist', '2024-12-07 19:35:12', 1),
(17, 'Kamal Hossain', 'kamal.auto@gmail.com', '01812345679', 'Dhanmondi', 700.00, 6, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.2, 'Transmission Expert', '2024-12-07 19:35:12', 1),
(18, 'Mohammad Ali', 'ali.car@gmail.com', '01912345680', 'Gulshan', 1000.00, 10, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.8, 'Brake & Suspension', '2024-12-07 19:35:12', 1),
(19, 'Jamal Uddin', 'jamal.mechanic@gmail.com', '01612345681', 'Uttara', 600.00, 4, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.0, 'Electrical Systems', '2024-12-07 19:35:12', 0),
(20, 'Sohel Khan', 'sohel.auto@gmail.com', '01512345682', 'Banani', 900.00, 7, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.6, 'AC & Cooling Systems', '2024-12-07 19:35:12', 1),
(21, 'Rahim Miah', 'rahim.car@gmail.com', '01412345683', 'Mohammadpur', 750.00, 5, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.3, 'General Maintenance', '2024-12-07 19:35:12', 1),
(22, 'Nasir Ahmed', 'nasir.mechanic@gmail.com', '01312345684', 'Badda', 850.00, 9, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.7, 'Diagnostic Expert', '2024-12-07 19:35:12', 1),
(23, 'Imran Khan', 'imran.auto@gmail.com', '01212345685', 'Khilgaon', 650.00, 3, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 3.9, 'Engine Repair', '2024-12-07 19:35:12', 1),
(24, 'Faruk Hasan', 'faruk.mechanic@gmail.com', '01712345686', 'Motijheel', 950.00, 12, 'People/scan0005 - Copy.jpg', 4.9, 'Performance Tuning', '2024-12-07 19:35:12', 1),
(25, 'Jahid Islam', 'jahid.auto@gmail.com', '01812345687', 'Rampura', 700.00, 5, 'People/scan0005 - Copy.jpg', 4.1, 'Hybrid Systems', '2024-12-07 19:35:12', 1),
(26, 'Masud Rana', 'masud.car@gmail.com', '01912345688', 'Malibagh', 800.00, 7, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.4, 'Diesel Specialist', '2024-12-07 19:35:12', 1),
(27, 'Shahin Ali', 'shahin.mechanic@gmail.com', '01612345689', 'Tejgaon', 850.00, 8, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.5, 'Transmission Repair', '2024-12-07 19:35:12', 1),
(28, 'Liton Das', 'liton.auto@gmail.com', '01512345690', 'Farmgate', 750.00, 6, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.2, 'Brake Expert', '2024-12-07 19:35:12', 1),
(29, 'Rubel Miah', 'rubel.car@gmail.com', '01412345691', 'Mohakhali', 900.00, 9, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.6, 'Electrical Expert', '2024-12-07 19:35:12', 1),
(30, 'Kamrul Hasan', 'kamrul.mechanic@gmail.com', '01312345692', 'Pallabi', 650.00, 4, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.0, 'AC Repair', '2024-12-07 19:35:12', 1),
(31, 'Babul Khan', 'babul.auto@gmail.com', '01212345693', 'Cantonment', 950.00, 11, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.8, 'Engine Overhaul', '2024-12-07 19:35:12', 1),
(32, 'Mizan Rahman', 'mizan.car@gmail.com', '01712345694', 'Kalyanpur', 800.00, 7, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.3, 'Suspension Expert', '2024-12-07 19:35:12', 1),
(33, 'Sharif Uddin', 'sharif.mechanic@gmail.com', '01812345695', 'Shyamoli', 750.00, 5, 'People/scan0005 - Copy.jpg', 4.1, 'General Service', '2024-12-07 19:35:12', 1),
(34, 'Omar Faruk', 'omar.auto@gmail.com', '01912345696', 'Agargaon', 850.00, 8, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.5, 'Diagnostic Specialist', '2024-12-07 19:35:12', 1),
(35, 'Zahir Ahmed', 'zahir.car@gmail.com', '01612345697', 'Kazipara', 700.00, 6, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.2, 'Performance Expert', '2024-12-07 19:35:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `electricians`
--

CREATE TABLE `electricians` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electricians`
--

INSERT INTO `electricians` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_hour`, `work_experience`, `profile_image`, `rating`, `created_at`, `availability`) VALUES
(1, 'Md. Karim Rahman', 'karim.rahman@gmail.com', '01711-234567', 'Mirpur, Dhaka', 500.00, 8, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 0.0, '2024-11-15 06:17:33', 0),
(2, 'Abdul Hamid', 'hamid.electric@yahoo.com', '01819-876543', 'Dhanmondi, Dhaka', 600.00, 12, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 0.0, '2024-11-15 06:17:33', 1),
(3, 'Rafiqul Islam', 'rafiq.electrician@gmail.com', '01612-345678', 'Uttara, Dhaka', 450.00, 5, 'People/scan0005 - Copy.jpg', 0.0, '2024-11-15 06:17:33', 0),
(4, 'Jamal Uddin', 'jamal.electric@gmail.com', '01911-987654', 'Gulshan, Dhaka', 800.00, 15, 'People/download.jpg', 0.0, '2024-11-15 06:17:33', 1),
(5, 'Shahidul Haque', 'shahid.electric@yahoo.com', '01515-123456', 'Banani, Dhaka', 700.00, 10, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 0.0, '2024-11-15 06:17:33', 0),
(6, 'Nurul Islam', 'nurul.electrician@gmail.com', '01712-345678', 'Mohammadpur, Dhaka', 550.00, 7, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 0.0, '2024-11-15 06:17:33', 1),
(7, 'Masud Rana', 'masud.electric@gmail.com', '01818-234567', 'Badda, Dhaka', 480.00, 6, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 0.0, '2024-11-15 06:17:33', 0),
(8, 'Zahirul Islam', 'zahir.electric@yahoo.com', '01617-876543', 'Motijheel, Dhaka', 650.00, 9, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 0.0, '2024-11-15 06:17:33', 1),
(9, 'Farid Ahmed', 'farid.electrician@gmail.com', '01912-345678', 'Khilgaon, Dhaka', 520.00, 8, 'People/download.jpg', 0.0, '2024-11-15 06:17:33', 0),
(10, 'Sohel Rana', 'sohel.electric@gmail.com', '01716-987654', 'Rampura, Dhaka', 580.00, 11, 'People/scan0005 - Copy.jpg', 0.0, '2024-11-15 06:17:33', 1),
(11, 'Rubel Hossain', 'rubel.electric@yahoo.com', '01813-123456', 'Malibagh, Dhaka', 490.00, 7, 'People/scan0005 - Copy.jpg', 0.0, '2024-11-15 06:17:33', 0),
(12, 'Kamrul Hasan', 'kamrul.electrician@gmail.com', '01613-345678', 'Tejgaon, Dhaka', 600.00, 13, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 0.0, '2024-11-15 06:17:33', 1),
(13, 'Mizanur Rahman', 'mizan.electric@gmail.com', '01913-234567', 'Farmgate, Dhaka', 550.00, 9, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 0.0, '2024-11-15 06:17:33', 0),
(14, 'Shahin Alam', 'shahin.electric@yahoo.com', '01714-876543', 'Mohakhali, Dhaka', 720.00, 14, 'People/download.jpg', 0.0, '2024-11-15 06:17:33', 1),
(15, 'Nasir Uddin', 'nasir.electrician@gmail.com', '01814-345678', 'Pallabi, Dhaka', 480.00, 6, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 0.0, '2024-11-15 06:17:33', 0),
(16, 'Jahangir Alam', 'jahangir.electric@gmail.com', '01614-987654', 'Cantonment, Dhaka', 650.00, 12, 'People/download.jpg', 0.0, '2024-11-15 06:17:33', 1),
(17, 'Babul Miah', 'babul.electric@yahoo.com', '01914-123456', 'Kalyanpur, Dhaka', 530.00, 8, 'People/scan0005 - Copy.jpg', 0.0, '2024-11-15 06:17:33', 0),
(18, 'Rahim Sheikh', 'rahim.electrician@gmail.com', '01715-345678', 'Shyamoli, Dhaka', 570.00, 10, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 0.0, '2024-11-15 06:17:33', 1),
(19, 'Monir Hossain', 'monir.electric@gmail.com', '01815-234567', 'Agargaon, Dhaka', 600.00, 11, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 0.0, '2024-11-15 06:17:33', 0),
(20, 'Liton Das', 'liton.electric@yahoo.com', '01615-876543', 'Kazipara, Dhaka', 510.00, 7, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 0.0, '2024-11-15 06:17:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locksmiths`
--

CREATE TABLE `locksmiths` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `specialization` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locksmiths`
--

INSERT INTO `locksmiths` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_service`, `work_experience`, `image`, `rating`, `specialization`, `created_at`, `availability`) VALUES
(1, 'Secure Lock', 'secure@email.com', '01712345728', 'Dhaka', 400.00, 5, 'People/download.jpg', 4.5, 'Emergency Lockout', '2024-11-16 18:07:46', 0),
(2, 'Quick Key', 'quickkey@email.com', '01812345729', 'Chittagong', 350.00, 4, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.3, 'Car Locks', '2024-11-16 18:07:46', 1),
(3, 'Master Lock', 'master@email.com', '01912345730', 'Sylhet', 450.00, 7, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.8, 'Digital Locks', '2024-11-16 18:07:46', 1),
(4, 'Safe Key', 'safekey@email.com', '01612345731', 'Rajshahi', 380.00, 5, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.4, 'Home Security', '2024-11-16 18:07:46', 1),
(5, 'Pro Lock', 'prolock@email.com', '01512345732', 'Khulna', 420.00, 6, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.7, 'Safe Opening', '2024-11-16 18:07:46', 1),
(6, 'City Lock', 'citylock@email.com', '01712345733', 'Barisal', 370.00, 4, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.2, 'Residential', '2024-11-16 18:07:46', 1),
(7, 'Expert Key', 'expertkey@email.com', '01812345734', 'Rangpur', 390.00, 6, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.5, 'Commercial', '2024-11-16 18:07:46', 1),
(8, 'Royal Lock', 'royal@email.com', '01912345735', 'Dhaka', 430.00, 8, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.9, 'High Security', '2024-11-16 18:07:46', 1),
(9, 'Budget Lock', 'budget@email.com', '01612345736', 'Chittagong', 360.00, 5, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.3, 'Basic Services', '2024-11-16 18:07:46', 1),
(10, 'Care Lock', 'carelock@email.com', '01512345737', 'Dhaka', 410.00, 7, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.6, 'Auto Locksmith', '2024-11-16 18:07:46', 1),
(11, 'Swift Key', 'swiftkey@email.com', '01712345738', 'Sylhet', 440.00, 8, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.7, 'Emergency Service', '2024-11-16 18:07:46', 1),
(12, 'Easy Lock', 'easylock@email.com', '01812345739', 'Rajshahi', 395.00, 6, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.4, 'Lock Installation', '2024-11-16 18:07:46', 1),
(13, 'Smart Lock', 'smart@email.com', '01912345740', 'Khulna', 375.00, 5, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.2, 'Key Cutting', '2024-11-16 18:07:46', 1),
(14, 'Prime Lock', 'prime@email.com', '01612345741', 'Barisal', 425.00, 7, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.5, 'Security Systems', '2024-11-16 18:07:46', 1),
(15, 'Value Lock', 'value@email.com', '01512345742', 'Rangpur', 385.00, 4, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.1, 'General Service', '2024-11-16 18:07:46', 1),
(16, 'Secure Lock', 'secure.lock@gmail.com', '01712345721', 'Mirpur', 500.00, 8, 'People/download.jpg', 4.5, 'Emergency Service', '2024-12-07 19:35:12', 1),
(17, 'Quick Key', 'quick.key@gmail.com', '01812345722', 'Dhanmondi', 450.00, 6, 'People/download.jpg', 4.2, 'Residential', '2024-12-07 19:35:12', 1),
(18, 'Master Lock', 'master.lock@gmail.com', '01912345723', 'Gulshan', 600.00, 10, 'People/download.jpg', 4.8, 'Commercial', '2024-12-07 19:35:12', 1),
(19, 'Safe Key', 'safe.key@gmail.com', '01612345724', 'Uttara', 400.00, 4, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.0, 'Automotive', '2024-12-07 19:35:12', 1),
(20, 'Pro Lock', 'pro.lock@gmail.com', '01512345725', 'Banani', 550.00, 7, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.6, 'Emergency Service', '2024-12-07 19:35:12', 1),
(21, 'Expert Key', 'expert.key@gmail.com', '01412345726', 'Mohammadpur', 480.00, 5, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.3, 'Residential', '2024-12-07 19:35:12', 1),
(22, 'Smart Lock', 'smart.lock@gmail.com', '01312345727', 'Badda', 580.00, 9, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.7, 'Commercial', '2024-12-07 19:35:12', 1),
(23, 'Quick Fix', 'quick.fix@gmail.com', '01212345728', 'Khilgaon', 420.00, 3, 'People/scan0005 - Copy.jpg', 3.9, 'Automotive', '2024-12-07 19:35:12', 1),
(24, 'Royal Lock', 'royal.lock@gmail.com', '01712345729', 'Motijheel', 650.00, 12, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.9, 'Emergency Service', '2024-12-07 19:35:12', 1),
(25, 'Easy Key', 'easy.key@gmail.com', '01812345730', 'Rampura', 460.00, 5, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.1, 'Residential', '2024-12-07 19:35:12', 1),
(26, 'Prime Lock', 'prime.lock@gmail.com', '01912345731', 'Malibagh', 500.00, 7, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.4, 'Commercial', '2024-12-07 19:35:12', 1),
(27, 'Swift Key', 'swift.key@gmail.com', '01612345732', 'Tejgaon', 520.00, 8, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.5, 'Automotive', '2024-12-07 19:35:12', 1),
(28, 'Care Lock', 'care.lock@gmail.com', '01512345733', 'Farmgate', 470.00, 6, 'People/download.jpg', 4.2, 'Emergency Service', '2024-12-07 19:35:12', 1),
(29, 'Metro Lock', 'metro.lock@gmail.com', '01412345734', 'Mohakhali', 590.00, 9, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.6, 'Residential', '2024-12-07 19:35:12', 1),
(30, 'City Key', 'city.key@gmail.com', '01312345735', 'Pallabi', 430.00, 4, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.0, 'Commercial', '2024-12-07 19:35:12', 1),
(31, 'Star Lock', 'star.lock@gmail.com', '01212345736', 'Cantonment', 600.00, 11, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.8, 'Automotive', '2024-12-07 19:35:12', 1),
(32, 'Fast Key', 'fast.key@gmail.com', '01712345737', 'Kalyanpur', 510.00, 7, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.3, 'Emergency Service', '2024-12-07 19:35:12', 1),
(33, 'Safe Lock', 'safe.lock@gmail.com', '01812345738', 'Shyamoli', 450.00, 5, 'People/download.jpg', 4.1, 'Residential', '2024-12-07 19:35:12', 1),
(34, 'Quick Lock', 'quick.lock@gmail.com', '01912345739', 'Agargaon', 540.00, 8, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.5, 'Commercial', '2024-12-07 19:35:12', 1),
(35, 'Pro Key', 'pro.key@gmail.com', '01612345740', 'Kazipara', 480.00, 6, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.2, 'Automotive', '2024-12-07 19:35:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` tinyint(1) DEFAULT '1',
  `specialization` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packers_movers`
--

CREATE TABLE `packers_movers` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `vehicle_type` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packers_movers`
--

INSERT INTO `packers_movers` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_hour`, `work_experience`, `image`, `rating`, `vehicle_type`, `created_at`, `availability`) VALUES
(1, 'Fast Movers', 'fast@email.com', '01712345713', 'Dhaka', 1000.00, 5, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.5, 'Pickup, Truck', '2024-11-16 18:07:46', 0),
(2, 'City Shifters', 'city@email.com', '01812345714', 'Chittagong', 950.00, 4, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.3, 'Van, Large Truck', '2024-11-16 18:07:46', 1),
(3, 'Quick Move', 'quick@email.com', '01912345715', 'Sylhet', 1050.00, 7, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.8, 'All Types', '2024-11-16 18:07:46', 0),
(4, 'Safe Transit', 'safe@email.com', '01612345716', 'Rajshahi', 980.00, 5, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.4, 'Covered Van', '2024-11-16 18:07:46', 1),
(5, 'Home Shifters', 'home@email.com', '01512345717', 'Khulna', 1020.00, 6, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.7, 'Mini Truck, Large Truck', '2024-11-16 18:07:46', 1),
(6, 'Pro Movers', 'pro@email.com', '01712345718', 'Barisal', 970.00, 4, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.2, 'Pickup, Van', '2024-11-16 18:07:46', 1),
(7, 'Expert Movers', 'expert@email.com', '01812345719', 'Rangpur', 990.00, 6, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.5, 'All Sizes', '2024-11-16 18:07:46', 1),
(8, 'Royal Shift', 'royal@email.com', '01912345720', 'Dhaka', 1030.00, 8, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.9, 'Premium Vehicles', '2024-11-16 18:07:46', 1),
(9, 'Budget Movers', 'budget@email.com', '01612345721', 'Chittagong', 960.00, 5, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.3, 'Economic Options', '2024-11-16 18:07:46', 1),
(10, 'Care Movers', 'care@email.com', '01512345722', 'Dhaka', 1010.00, 7, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.6, 'Specialized Transport', '2024-11-16 18:07:46', 1),
(11, 'Swift Shift', 'swift@email.com', '01712345723', 'Sylhet', 1040.00, 8, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.7, 'Express Service', '2024-11-16 18:07:46', 1),
(12, 'Easy Move', 'easy@email.com', '01812345724', 'Rajshahi', 995.00, 6, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.4, 'Local Transport', '2024-11-16 18:07:46', 1),
(13, 'Smart Movers', 'smart@email.com', '01912345725', 'Khulna', 975.00, 5, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.2, 'City Moving', '2024-11-16 18:07:46', 1),
(14, 'Prime Packers', 'prime@email.com', '01612345726', 'Barisal', 1025.00, 7, 'People/download.jpg', 4.5, 'Interstate Moving', '2024-11-16 18:07:46', 1),
(15, 'Value Movers', 'value@email.com', '01512345727', 'Rangpur', 985.00, 4, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.1, 'Budget Friendly', '2024-11-16 18:07:46', 1),
(16, 'Fast Movers Ltd', 'fast.movers@gmail.com', '01712345701', 'Mirpur', 1200.00, 8, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.5, 'Large Truck', '2024-12-07 19:35:12', 1),
(17, 'City Shifters', 'city.shifters@gmail.com', '01812345702', 'Dhanmondi', 1000.00, 6, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.2, 'Medium Truck', '2024-12-07 19:35:12', 1),
(18, 'Express Packers', 'express.packers@gmail.com', '01912345703', 'Gulshan', 1500.00, 10, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.8, 'Large Truck', '2024-12-07 19:35:12', 1),
(19, 'Safe Move BD', 'safe.move@gmail.com', '01612345704', 'Uttara', 900.00, 4, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.0, 'Small Truck', '2024-12-07 19:35:12', 1),
(20, 'Pro Movers', 'pro.movers@gmail.com', '01512345705', 'Banani', 1300.00, 7, 'People/download.jpg', 4.6, 'Large Truck', '2024-12-07 19:35:12', 1),
(21, 'Quick Shift', 'quick.shift@gmail.com', '01412345706', 'Mohammadpur', 1100.00, 5, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.3, 'Medium Truck', '2024-12-07 19:35:12', 1),
(22, 'Expert Packers', 'expert.packers@gmail.com', '01312345707', 'Badda', 1400.00, 9, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.7, 'Large Truck', '2024-12-07 19:35:12', 1),
(23, 'Smart Move', 'smart.move@gmail.com', '01212345708', 'Khilgaon', 950.00, 3, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 3.9, 'Small Truck', '2024-12-07 19:35:12', 1),
(24, 'Royal Movers', 'royal.movers@gmail.com', '01712345709', 'Motijheel', 1600.00, 12, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.9, 'Large Truck', '2024-12-07 19:35:12', 1),
(25, 'Easy Shift', 'easy.shift@gmail.com', '01812345710', 'Rampura', 1050.00, 5, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.1, 'Medium Truck', '2024-12-07 19:35:12', 1),
(26, 'Prime Packers', 'prime.packers@gmail.com', '01912345711', 'Malibagh', 1200.00, 7, 'People/download.jpg', 4.4, 'Large Truck', '2024-12-07 19:35:12', 1),
(27, 'Swift Movers', 'swift.movers@gmail.com', '01612345712', 'Tejgaon', 1300.00, 8, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.5, 'Medium Truck', '2024-12-07 19:35:12', 1),
(28, 'Care Packers', 'care.packers@gmail.com', '01512345713', 'Farmgate', 1100.00, 6, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.2, 'Small Truck', '2024-12-07 19:35:12', 1),
(29, 'Metro Movers', 'metro.movers@gmail.com', '01412345714', 'Mohakhali', 1400.00, 9, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.6, 'Large Truck', '2024-12-07 19:35:12', 1),
(30, 'City Express', 'city.express@gmail.com', '01312345715', 'Pallabi', 950.00, 4, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.0, 'Medium Truck', '2024-12-07 19:35:12', 1),
(31, 'Star Packers', 'star.packers@gmail.com', '01212345716', 'Cantonment', 1500.00, 11, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.8, 'Large Truck', '2024-12-07 19:35:12', 1),
(32, 'Fast Track', 'fast.track@gmail.com', '01712345717', 'Kalyanpur', 1200.00, 7, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.3, 'Medium Truck', '2024-12-07 19:35:12', 1),
(33, 'Safe Hands', 'safe.hands@gmail.com', '01812345718', 'Shyamoli', 1100.00, 5, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.1, 'Small Truck', '2024-12-07 19:35:12', 1),
(34, 'Quick Move', 'quick.move@gmail.com', '01912345719', 'Agargaon', 1300.00, 8, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.5, 'Large Truck', '2024-12-07 19:35:12', 1),
(35, 'Pro Shift', 'pro.shift@gmail.com', '01612345720', 'Kazipara', 1000.00, 6, 'People/download.jpg', 4.2, 'Medium Truck', '2024-12-07 19:35:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `painters`
--

CREATE TABLE `painters` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_day` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `availability` tinyint(1) DEFAULT '1',
  `specialization` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `service_type` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'assets/img/default-painter.jpg',
  `rate` decimal(10,2) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `painters`
--

INSERT INTO `painters` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_day`, `work_experience`, `profile_image`, `rating`, `availability`, `specialization`, `service_type`, `created_at`, `image`, `rate`, `address`) VALUES
(1, 'Rahim Mia', 'rahim.painter@gmail.com', '01711-222333', 'Mirpur, Dhaka', 1200.00, 10, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 5.0, 0, 'Painter', 'Painter', '2024-11-15 08:58:45', 'People/scan0005 - Copy.jpg', 500.00, 'Sample Address'),
(2, 'Kamal Hossain', 'kamal.paint@gmail.com', '01819-444555', 'Dhanmondi, Dhaka', 1500.00, 15, 'People/download.jpg', 0.0, 0, 'Interior, Exterior', 'Interior, Exterior', '2024-11-15 08:58:45', 'People/scan0005 - Copy.jpg', 500.00, 'Sample Address'),
(3, 'Abdul Karim', 'karim.painter@yahoo.com', '01612-666777', 'Uttara, Dhaka', 1300.00, 8, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 0.0, 0, 'Wall Art, Texture', 'Wall Art, Texture', '2024-11-15 08:58:45', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 500.00, 'Sample Address'),
(4, 'Mostafa Khan', 'mostafa.paint@gmail.com', '01911-888999', 'Gulshan, Dhaka', 2000.00, 12, 'People/scan0005 - Copy.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 500.00, 'Sample Address'),
(5, 'Jamal Uddin', 'jamal.painter@yahoo.com', '01515-111222', 'Banani, Dhaka', 1800.00, 14, 'People/scan0005 - Copy.jpg', 0.0, 0, 'Painter', 'Painter', '2024-11-15 08:58:45', 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 500.00, 'Sample Address'),
(6, 'Sohel Rana', 'sohel.paint@gmail.com', '01712-333444', 'Mohammadpur, Dhaka', 1400.00, 9, 'People/scan0005 - Copy.jpg', 0.0, 0, 'Painter', 'Painter', '2024-11-15 08:58:45', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 500.00, 'Sample Address'),
(7, 'Masud Ahmed', 'masud.painter@gmail.com', '01818-555666', 'Badda, Dhaka', 1600.00, 11, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 0.0, 0, 'Interior Design', 'Interior Design', '2024-11-15 08:58:45', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 500.00, 'Sample Address'),
(8, 'Faruk Hasan', 'faruk.paint@yahoo.com', '01617-777888', 'Motijheel, Dhaka', 1700.00, 13, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 0.0, 1, 'Commercial, Residential', 'Commercial, Residential', '2024-11-15 08:58:45', 'People/scan0005 - Copy.jpg', 500.00, 'Sample Address'),
(9, 'Nasir Uddin', 'nasir.painter@gmail.com', '01912-999000', 'Khilgaon, Dhaka', 1300.00, 7, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 0.0, 0, 'Wall Texture', 'Wall Texture', '2024-11-15 08:58:45', 'People/scan0005 - Copy.jpg', 500.00, 'Sample Address'),
(10, 'Rubel Miah', 'rubel.paint@gmail.com', '01716-112233', 'Rampura, Dhaka', 1500.00, 10, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 500.00, 'Sample Address'),
(11, 'Jahangir Alam', 'jahangir.painter@yahoo.com', '01813-445566', 'Malibagh, Dhaka', 1400.00, 8, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 0.0, 0, 'Painter', 'Painter', '2024-11-15 08:58:45', 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 500.00, 'Sample Address'),
(12, 'Shahin Khan', 'shahin.paint@gmail.com', '01613-778899', 'Tejgaon, Dhaka', 1900.00, 16, 'People/scan0005 - Copy.jpg', 0.0, 1, 'Commercial Projects', 'Commercial Projects', '2024-11-15 08:58:45', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 500.00, 'Sample Address'),
(13, 'Mizan Rahman', 'mizan.painter@gmail.com', '01913-001122', 'Farmgate, Dhaka', 1600.00, 12, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 0.0, 1, 'Residential Projects', 'Residential Projects', '2024-11-15 08:58:45', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 500.00, 'Sample Address'),
(14, 'Babul Miah', 'babul.paint@yahoo.com', '01714-334455', 'Mohakhali, Dhaka', 2100.00, 18, 'People/scan0005 - Copy.jpg', 0.0, 0, 'Interior, Exterior', 'Interior, Exterior', '2024-11-15 08:58:45', 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 500.00, 'Sample Address'),
(15, 'Liton Das', 'liton.painter@gmail.com', '01814-667788', 'Pallabi, Dhaka', 1400.00, 9, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 0.0, 0, 'Painter', 'Painter', '2024-11-15 08:58:45', 'People/download.jpg', 500.00, 'Sample Address'),
(16, 'Rashed Khan', 'rashed.paint@gmail.com', '01614-990011', 'Cantonment, Dhaka', 1700.00, 13, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 0.0, 1, 'Texture Specialist', 'Texture Specialist', '2024-11-15 08:58:45', 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 500.00, 'Sample Address'),
(17, 'Monir Hossain', 'monir.painter@yahoo.com', '01914-223344', 'Kalyanpur, Dhaka', 1500.00, 11, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 0.0, 1, 'Wall Art', 'Wall Art', '2024-11-15 08:58:45', 'People/download.jpg', 500.00, 'Sample Address'),
(18, 'Sharif Uddin', 'sharif.paint@gmail.com', '01715-556677', 'Shyamoli, Dhaka', 1800.00, 15, 'People/download.jpg', 0.0, 1, 'Painter', 'Painter', '2024-11-15 08:58:45', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 500.00, 'Sample Address'),
(19, 'Kabir Ahmed', 'kabir.painter@gmail.com', '01815-889900', 'Agargaon, Dhaka', 1600.00, 12, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 0.0, 0, 'Painter', 'Painter', '2024-11-15 08:58:45', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 500.00, 'Sample Address'),
(20, 'Dulal Miah', 'dulal.paint@yahoo.com', '01615-112233', 'Kazipara, Dhaka', 1400.00, 10, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 0.0, 1, 'Interior Design', 'Interior Design', '2024-11-15 08:58:45', 'People/download.jpg', 500.00, 'Sample Address');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `painter_id` int DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_intent_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `booking_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `electrician_id` int DEFAULT NULL,
  `plumber_id` int DEFAULT NULL,
  `tv_technician_id` int DEFAULT NULL,
  `mechanic_id` int DEFAULT NULL,
  `packer_mover_id` int DEFAULT NULL,
  `locksmith_id` int DEFAULT NULL,
  `battery_service_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `painter_id` (`painter_id`),
  KEY `electrician_id` (`electrician_id`),
  KEY `plumber_id` (`plumber_id`),
  KEY `tv_technician_id` (`tv_technician_id`),
  KEY `mechanic_id` (`mechanic_id`),
  KEY `packer_mover_id` (`packer_mover_id`),
  KEY `locksmith_id` (`locksmith_id`),
  KEY `battery_service_id` (`battery_service_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`painter_id`) REFERENCES `painters` (`id`),
  CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`electrician_id`) REFERENCES `electricians` (`id`),
  CONSTRAINT `payments_ibfk_4` FOREIGN KEY (`plumber_id`) REFERENCES `plumbers` (`id`),
  CONSTRAINT `payments_ibfk_5` FOREIGN KEY (`tv_technician_id`) REFERENCES `tv_repair` (`id`),
  CONSTRAINT `payments_ibfk_6` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`id`),
  CONSTRAINT `payments_ibfk_7` FOREIGN KEY (`packer_mover_id`) REFERENCES `packers_movers` (`id`),
  CONSTRAINT `payments_ibfk_8` FOREIGN KEY (`locksmith_id`) REFERENCES `locksmiths` (`id`),
  CONSTRAINT `payments_ibfk_9` FOREIGN KEY (`battery_service_id`) REFERENCES `battery_services` (`id`)
);

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `painter_id`, `amount`, `payment_intent_id`, `status`, `booking_date`, `created_at`, `electrician_id`, `plumber_id`, `tv_technician_id`, `mechanic_id`, `packer_mover_id`, `locksmith_id`, `battery_service_id`) VALUES
(1, 86, 1, 1200.00, 'pi_3QLMsoJcVq5mfW9U0sKMcoSC', 'completed', '2024-11-27', '2024-11-15 10:38:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 86, 2, 1500.00, 'pi_3QLN2xJcVq5mfW9U0pptbxUb', 'completed', '2024-11-29', '2024-11-15 10:48:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 97, 1, 1200.00, 'pi_3QLTOEJcVq5mfW9U0bAuyFlg', 'completed', '2024-11-17', '2024-11-15 17:33:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 97, 2, 1500.00, 'pi_3QLkv3JcVq5mfW9U0UB9x57T', 'completed', '2024-11-25', '2024-11-16 12:16:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 97, 3, 1300.00, 'pi_3QLlDjJcVq5mfW9U1acMdVAY', 'completed', '2024-11-24', '2024-11-16 12:35:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 97, 4, 2000.00, 'pi_3QLlVTJcVq5mfW9U0bzmIyzE', 'completed', '2024-11-27', '2024-11-16 12:54:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 97, 5, 1800.00, 'pi_3QLlaFJcVq5mfW9U1hXoRQtR', 'completed', '2024-11-19', '2024-11-16 12:58:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 97, 6, 1400.00, 'pi_3QLly0JcVq5mfW9U1dRtoglO', 'completed', '2024-11-20', '2024-11-16 13:23:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 97, 1, 1200.00, 'pi_3QLpJkJcVq5mfW9U06aX9Rw0', 'completed', '2024-11-19', '2024-11-16 16:58:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 97, 2, 600.00, 'pi_3QLzcLJcVq5mfW9U10WJFBJe', 'completed', '2024-11-20', '2024-11-17 03:58:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 97, 2, 600.00, 'pi_3QLzdXJcVq5mfW9U0JtZ4txy', 'completed', '2024-11-19', '2024-11-17 03:59:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 86, 1, 1200.00, 'pi_3QM1bNJcVq5mfW9U09b2YQqT', 'completed', '2024-11-26', '2024-11-17 06:05:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 86, 2, 450.00, 'pi_3QM1jhJcVq5mfW9U1Bc8lUkl', 'completed', '2024-11-26', '2024-11-17 06:13:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 98, 3, 1300.00, 'pi_3QMj60JcVq5mfW9U01pr3X5Q', 'completed', '2024-12-04', '2024-11-19 04:31:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 74, 5, 1800.00, 'pi_3QQUnyJcVq5mfW9U1je6IrWo', 'completed', '2024-12-06', '2024-11-29 14:04:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 74, 1, 1200.00, 'pi_3QQV1XJcVq5mfW9U0ZtWDT4K', 'completed', '2024-12-04', '2024-11-29 14:18:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 107, 7, 1600.00, 'pi_3QQstmJcVq5mfW9U0VX3cjh8', 'completed', '2024-12-02', '2024-11-30 15:48:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 107, 6, 1400.00, 'pi_3QRaupJcVq5mfW9U15C3yM9C', 'completed', '2024-12-03', '2024-12-02 14:48:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 107, 1, 1320.00, NULL, 'pending', '2024-12-07', '2024-12-06 18:45:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 107, 1, 1320.00, NULL, 'pending', '2024-12-31', '2024-12-06 18:45:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 107, 1, 1320.00, 'pi_3QTN3yJcVq5mfW9U104yiWnV', 'completed', '2024-12-08', '2024-12-07 12:24:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 107, 1, 1320.00, 'pi_3QTN71JcVq5mfW9U1Zs6ZOd8', 'completed', '2024-12-08', '2024-12-07 12:27:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 107, 1, 1200.00, 'pi_3QTOCyJcVq5mfW9U1NcTR1rZ', 'completed', '2024-12-18', '2024-12-07 13:38:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 107, 14, 2100.00, 'pi_3QTPokJcVq5mfW9U0aMdBAa2', 'completed', '2024-12-11', '2024-12-07 15:21:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 107, 9, 1300.00, 'pi_3QTQWxJcVq5mfW9U0NqgNxFn', 'completed', '2024-12-26', '2024-12-07 16:06:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 107, 11, 1400.00, 'pi_3QTQapJcVq5mfW9U17FWly2W', 'completed', '2024-12-12', '2024-12-07 16:10:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 74, 15, 1400.00, 'pi_3QTQd0JcVq5mfW9U090uhY9f', 'completed', '2024-12-10', '2024-12-07 16:13:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 74, 1, 1200.00, 'pi_3QTSNdJcVq5mfW9U1TwEbUoI', 'completed', '2024-12-31', '2024-12-07 18:05:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 74, 1, 1200.00, 'pi_3QTSS6JcVq5mfW9U0OnB4ov5', 'completed', '2024-12-11', '2024-12-07 18:10:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 74, 1, 1200.00, 'pi_3QTSVjJcVq5mfW9U0IRNwehb', 'completed', '2024-12-31', '2024-12-07 18:13:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 74, 1, 800.00, 'pi_3QTTHJJcVq5mfW9U17Pt3SCd', 'completed', '2024-12-26', '2024-12-07 19:03:00', NULL, NULL, 1, NULL, NULL, NULL, NULL),
(38, 74, 1, 1200.00, 'pi_3QTTHqJcVq5mfW9U0cEzv2MM', 'completed', '2024-12-18', '2024-12-07 19:03:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 74, 1, 600.00, 'pi_3QTU6lJcVq5mfW9U1G57UIHk', 'completed', '2024-12-31', '2024-12-07 19:56:12', NULL, NULL, NULL, 19, NULL, NULL, NULL),
(41, 74, 1, 1200.00, 'pi_3QTU75JcVq5mfW9U1Mw2eMI8', 'completed', '2024-12-23', '2024-12-07 19:56:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 74, 1, 400.00, 'pi_3QTU7RJcVq5mfW9U0Yjc8LZj', 'completed', '2024-12-26', '2024-12-07 19:56:52', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(43, 74, 1, 300.00, 'pi_3QTUShJcVq5mfW9U1IfU0uqk', 'completed', '2024-12-30', '2024-12-07 20:18:52', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(44, 74, 1, 1000.00, 'pi_3QTV8UJcVq5mfW9U0HXlUj5C', 'completed', '2024-12-25', '2024-12-07 21:02:06', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(45, 74, 1, 1200.00, 'pi_3QU77YJcVq5mfW9U12zRi9o1', 'completed', '2024-12-11', '2024-12-09 07:35:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 74, 1, 1200.00, 'pi_3QWBWuAJvlwLoCAn3pubFKOk', 'completed', '2024-12-29', '2024-12-15 06:42:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 74, 1, 1200.00, 'pi_3QWEWAJcVq5mfW9U0NhB2D61', 'completed', '2024-12-17', '2024-12-15 09:53:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 74, 1, 600.00, 'pi_3QWFh7JcVq5mfW9U1n4UFb60', 'completed', '2024-12-16', '2024-12-15 11:09:22', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(49, 74, 1, 1200.00, 'pi_3QWFhjJcVq5mfW9U111lPYot', 'completed', '2024-12-24', '2024-12-15 11:09:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 74, 1, 250.00, 'pi_3QWFquJcVq5mfW9U0ifR6HTE', 'completed', '2024-12-17', '2024-12-15 11:19:24', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(51, 74, 19, 1600.00, 'pi_3QWFrjJcVq5mfW9U0OKH9srL', 'completed', '2024-12-25', '2024-12-15 11:20:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 74, 19, 1600.00, 'pi_3QWFsMJcVq5mfW9U1wr2o949', 'completed', '2024-12-25', '2024-12-15 11:20:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 74, 1, 550.00, 'pi_3QWFt6JcVq5mfW9U0fL4znur', 'completed', '2024-12-18', '2024-12-15 11:21:40', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(54, 74, 1, 1050.00, 'pi_3QWG4QJcVq5mfW9U1nFLJS4U', 'completed', '2024-12-24', '2024-12-15 11:33:20', NULL, NULL, NULL, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plumbers`
--

CREATE TABLE `plumbers` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `specialization` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plumbers`
--

INSERT INTO `plumbers` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_service`, `work_experience`, `image`, `rating`, `specialization`, `created_at`, `availability`) VALUES
(1, 'Kamal Hassan', 'kamal@email.com', '01712345678', 'Dhaka', 500.00, 5, 'People/download.jpg', 0.0, 'Pipe Fitting, Bathroom Installation', '2024-11-16 18:01:27', 1),
(2, 'Rahim Khan', 'rahim@email.com', '01812345678', 'Chittagong', 450.00, 3, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 0.0, 'Emergency Plumbing, Water Heater', '2024-11-16 18:01:27', 1),
(3, 'Kamal Hassan', 'kamal@email.com', '01712345678', 'Dhaka', 500.00, 5, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.5, 'Pipe Fitting, Bathroom Installation', '2024-11-16 18:07:18', 1),
(4, 'Rahim Khan', 'rahim@email.com', '01812345679', 'Chittagong', 450.00, 3, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.0, 'Emergency Plumbing', '2024-11-16 18:07:18', 1),
(5, 'Jamal Uddin', 'jamal@email.com', '01912345670', 'Sylhet', 550.00, 7, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.8, 'Water Heater Specialist', '2024-11-16 18:07:18', 1),
(6, 'Sohel Ahmed', 'sohel@email.com', '01612345671', 'Rajshahi', 480.00, 4, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.2, 'Drainage Expert', '2024-11-16 18:07:18', 1),
(7, 'Masud Rana', 'masud@email.com', '01512345672', 'Khulna', 520.00, 6, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.6, 'Commercial Plumbing', '2024-11-16 18:07:18', 1),
(8, 'Farid Miah', 'farid@email.com', '01712345673', 'Barisal', 470.00, 3, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.1, 'Residential Plumbing', '2024-11-16 18:07:18', 1),
(9, 'Nasir Uddin', 'nasir@email.com', '01812345674', 'Rangpur', 490.00, 5, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.4, 'Pipe Installation', '2024-11-16 18:07:18', 1),
(10, 'Kabir Ahmed', 'kabir@email.com', '01912345675', 'Dhaka', 530.00, 8, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.7, 'Bathroom Specialist', '2024-11-16 18:07:18', 1),
(11, 'Rafiq Islam', 'rafiq@email.com', '01612345676', 'Chittagong', 460.00, 4, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.3, 'Emergency Services', '2024-11-16 18:07:18', 1),
(12, 'Shahid Khan', 'shahid@email.com', '01512345677', 'Dhaka', 510.00, 6, 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 4.5, 'Water Line Expert', '2024-11-16 18:07:18', 1),
(13, 'Monir Hossain', 'monir@email.com', '01712345678', 'Sylhet', 540.00, 7, 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 4.6, 'Commercial Expert', '2024-11-16 18:07:18', 1),
(14, 'Jasim Uddin', 'jasim@email.com', '01812345679', 'Rajshahi', 495.00, 5, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.4, 'Residential Expert', '2024-11-16 18:07:18', 1),
(15, 'Liton Das', 'liton@email.com', '01912345680', 'Khulna', 475.00, 4, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.2, 'Pipe Repair', '2024-11-16 18:07:18', 1),
(16, 'Shahin Alam', 'shahin@email.com', '01612345681', 'Barisal', 525.00, 6, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.5, 'Water Heater Expert', '2024-11-16 18:07:18', 1),
(17, 'Rashed Khan', 'rashed@email.com', '01512345682', 'Rangpur', 485.00, 3, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.1, 'General Plumbing', '2024-11-16 18:07:18', 1),
(18, 'Kamal Hassan', 'kamal@email.com', '01712345678', 'Dhaka', 500.00, 5, 'People/download.jpg', 4.5, 'Pipe Fitting, Bathroom Installation', '2024-11-16 18:07:46', 1),
(19, 'Rahim Khan', 'rahim@email.com', '01812345679', 'Chittagong', 450.00, 3, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.0, 'Emergency Plumbing', '2024-11-16 18:07:46', 1),
(20, 'Jamal Uddin', 'jamal@email.com', '01912345670', 'Sylhet', 550.00, 7, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.8, 'Water Heater Specialist', '2024-11-16 18:07:46', 1),
(21, 'Sohel Ahmed', 'sohel@email.com', '01612345671', 'Rajshahi', 480.00, 4, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.2, 'Drainage Expert', '2024-11-16 18:07:46', 1),
(22, 'Masud Rana', 'masud@email.com', '01512345672', 'Khulna', 520.00, 6, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.6, 'Commercial Plumbing', '2024-11-16 18:07:46', 1),
(23, 'Farid Miah', 'farid@email.com', '01712345673', 'Barisal', 470.00, 3, 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 4.1, 'Residential Plumbing', '2024-11-16 18:07:46', 1),
(24, 'Nasir Uddin', 'nasir@email.com', '01812345674', 'Rangpur', 490.00, 5, 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 4.4, 'Pipe Installation', '2024-11-16 18:07:46', 1),
(25, 'Kabir Ahmed', 'kabir@email.com', '01912345675', 'Dhaka', 530.00, 8, 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 4.7, 'Bathroom Specialist', '2024-11-16 18:07:46', 1),
(26, 'Rafiq Islam', 'rafiq@email.com', '01612345676', 'Chittagong', 460.00, 4, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.3, 'Emergency Services', '2024-11-16 18:07:46', 1),
(27, 'Shahid Khan', 'shahid@email.com', '01512345677', 'Dhaka', 510.00, 6, 'People/scan0005 - Copy.jpg', 4.5, 'Water Line Expert', '2024-11-16 18:07:46', 1),
(28, 'Monir Hossain', 'monir@email.com', '01712345678', 'Sylhet', 540.00, 7, 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 4.6, 'Commercial Expert', '2024-11-16 18:07:46', 1),
(29, 'Jasim Uddin', 'jasim@email.com', '01812345679', 'Rajshahi', 495.00, 5, 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 4.4, 'Residential Expert', '2024-11-16 18:07:46', 1),
(30, 'Liton Das', 'liton@email.com', '01912345680', 'Khulna', 475.00, 4, 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 4.2, 'Pipe Repair', '2024-11-16 18:07:46', 1),
(31, 'Shahin Alam', 'shahin@email.com', '01612345681', 'Barisal', 525.00, 6, 'People/download.jpg', 4.5, 'Water Heater Expert', '2024-11-16 18:07:46', 1),
(32, 'Rashed Khan', 'rashed@email.com', '01512345682', 'Rangpur', 485.00, 3, 'People/download.jpg', 4.1, 'General Plumbing', '2024-11-16 18:07:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `payment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `painter_id` int NOT NULL,
  `rating` int NOT NULL,
  `review_text` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `electrician_id` int DEFAULT NULL,
  `plumber_id` int DEFAULT NULL,
  `tv_technician_id` int DEFAULT NULL,
  `mechanic_id` int DEFAULT NULL,
  `packer_mover_id` int DEFAULT NULL,
  `locksmith_id` int DEFAULT NULL,
  `battery_service_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `payment_id`, `user_id`, `painter_id`, `rating`, `review_text`, `created_at`, `updated_at`, `electrician_id`, `plumber_id`, `tv_technician_id`, `mechanic_id`, `packer_mover_id`, `locksmith_id`, `battery_service_id`) VALUES
(1, 8, 97, 6, 3, 'asdasdsadasddasffads', '2024-11-16 15:57:19', '2024-11-16 22:15:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 7, 97, 5, 3, 'adsddasd', '2024-11-16 15:57:28', '2024-11-16 21:59:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 6, 97, 4, 2, 'fs', '2024-11-16 16:01:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 97, 3, 2, 'asd', '2024-11-16 16:10:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 4, 97, 2, 4, 'ad', '2024-11-16 16:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 8, 97, 6, 3, 'hu', '2024-11-19 05:32:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 4, 97, 2, 4, 'asdasf', '2024-11-19 05:32:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 3, 97, 1, 5, 'asd', '2024-11-19 05:32:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, 97, 1, 3, 'saf', '2024-11-19 05:32:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 9, 97, 1, 5, 'safadsdadfsadfs', '2024-11-19 05:32:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 10, 97, 2, 4, 'very good', '2024-11-19 05:32:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 12, 86, 1, 3, 'sad', '2024-11-19 05:32:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 13, 86, 2, 5, 'as', '2024-11-19 05:32:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 13, 86, 2, 3, 'asddas', '2024-11-19 05:32:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 14, 98, 3, 3, 'hgggggggggggggg', '2024-11-19 05:32:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 14, 98, 3, 3, 'hgggggggggggggg', '2024-11-19 05:32:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 14, 98, 3, 4, 'hgggggggggggggg', '2024-11-19 05:32:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 15, 74, 5, 3, '545', '2024-11-29 14:04:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 16, 74, 1, 2, 'sd', '2024-11-29 14:26:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 16, 74, 1, 2, '23423', '2024-11-29 14:26:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 17, 107, 7, 2, 'asdasfsdfsd', '2024-11-30 15:48:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 18, 107, 6, 3, ';oiyoi+65+6', '2024-12-02 14:48:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 28, 107, 14, 5, 'adsadsads', '2024-12-07 15:21:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 51, 74, 19, 3, 'asd 5.20\r\n', '2024-12-15 11:20:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tv_repair`
--

CREATE TABLE `tv_repair` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `work_experience` int DEFAULT NULL,
  `brand_expertise` text COLLATE utf8mb4_general_ci,
  `services_offered` text COLLATE utf8mb4_general_ci,
  `service_charge` decimal(10,2) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT '1',
  `rating` decimal(3,2) DEFAULT NULL,
  `total_reviews` int DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tv_repair`
--

INSERT INTO `tv_repair` (`id`, `name`, `profile_image`, `location`, `contact_number`, `email`, `work_experience`, `brand_expertise`, `services_offered`, `service_charge`, `availability`, `rating`, `total_reviews`, `created_at`) VALUES
(1, 'Rakib Ahmed', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 'Dhaka', '01711-123456', 'rakib.ahmed@email.com', 8, 'Samsung, LG, Sony', 'Display Repair, Sound Issues, Smart TV Setup', 1200.00, 0, 4.50, 0, '2024-11-16 15:00:58'),
(2, 'Masud Khan', 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 'Chittagong', '01812-234567', 'masud.khan@email.com', 5, 'All Brands', 'Panel Repair, Software Update, Hardware Fix', 1000.00, 1, 4.20, 0, '2024-11-16 15:00:58'),
(3, 'Jamal Uddin', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 'Sylhet', '01913-345678', 'jamal.uddin@email.com', 12, 'Sony, Samsung', 'Screen Replacement, Circuit Repair', 1500.00, 1, 4.80, 0, '2024-11-16 15:00:58'),
(4, 'Kamal Hassan', 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 'Rajshahi', '01614-456789', 'kamal.hassan@email.com', 6, 'LG, Samsung', 'Backlight Repair, Power Issues', 900.00, 1, 4.00, 0, '2024-11-16 15:00:58'),
(5, 'Nurul Islam', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 'Khulna', '01515-567890', 'nurul.islam@email.com', 10, 'All Brands', 'Full Service, Emergency Repair', 1300.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(6, 'Shahid Ali', 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 'Barisal', '01816-678901', 'shahid.ali@email.com', 7, 'Samsung, TCL', 'Smart TV Apps, Network Setup', 1100.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(7, 'Rahim Miah', 'People/scan0005 - Copy.jpg', 'Dhaka', '01717-789012', 'rahim.miah@email.com', 9, 'Sony, LG', 'Display Issues, Audio Problems', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58'),
(8, 'Kabir Ahmed', 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 'Chittagong', '01818-890123', 'kabir.ahmed@email.com', 4, 'All Brands', 'Basic Repairs, Installation', 800.00, 1, 3.90, 0, '2024-11-16 15:00:58'),
(9, 'Sohel Rana', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 'Sylhet', '01919-901234', 'sohel.rana@email.com', 15, 'Samsung, LG, Sony', 'Expert Repairs, All Services', 1600.00, 1, 4.90, 0, '2024-11-16 15:00:58'),
(10, 'Farid Uddin', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 'Rajshahi', '01620-012345', 'farid.uddin@email.com', 8, 'LG, TCL', 'General Repairs, Maintenance', 1000.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(11, 'Abdul Karim', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 'Dhaka', '01721-123456', 'abdul.karim@email.com', 6, 'All Brands', 'Full Service, Smart TV Setup', 1100.00, 1, 4.20, 0, '2024-11-16 15:00:58'),
(12, 'Mohsin Ali', 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 'Chittagong', '01822-234567', 'mohsin.ali@email.com', 9, 'Samsung, Sony', 'Display Repair, Circuit Fix', 1300.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(13, 'Nasir Khan', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 'Khulna', '01923-345678', 'nasir.khan@email.com', 7, 'LG, Samsung', 'Panel Repair, Software Update', 1200.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(14, 'Omar Faruk', 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 'Sylhet', '01624-456789', 'omar.faruk@email.com', 11, 'Sony, TCL', 'Screen Replacement, Hardware Fix', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58'),
(15, 'Rashid Ahmed', 'People/download.jpg', 'Rajshahi', '01525-567890', 'rashid.ahmed@email.com', 5, 'All Brands', 'Basic Repairs, Maintenance', 900.00, 1, 4.00, 0, '2024-11-16 15:00:58'),
(16, 'Sajid Hasan', 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 'Barisal', '01826-678901', 'sajid.hasan@email.com', 8, 'Samsung, LG', 'Smart TV Apps, Audio Issues', 1200.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(17, 'Tarik Islam', 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 'Dhaka', '01727-789012', 'tarik.islam@email.com', 13, 'Sony, Samsung', 'Expert Repairs, All Services', 1500.00, 1, 4.80, 0, '2024-11-16 15:00:58'),
(18, 'Usman Ali', 'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg', 'Chittagong', '01828-890123', 'usman.ali@email.com', 6, 'LG, TCL', 'Display Issues, Power Problems', 1000.00, 1, 4.10, 0, '2024-11-16 15:00:58'),
(19, 'Wahid Miah', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 'Sylhet', '01929-901234', 'wahid.miah@email.com', 10, 'All Brands', 'Full Service, Emergency Repair', 1300.00, 1, 4.50, 0, '2024-11-16 15:00:58'),
(20, 'Yasir Khan', 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 'Rajshahi', '01630-012345', 'yasir.khan@email.com', 7, 'Samsung, Sony', 'General Repairs, Installation', 1100.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(21, 'Zahir Uddin', 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 'Dhaka', '01731-123456', 'zahir.uddin@email.com', 9, 'LG, Samsung', 'Display Repair, Smart TV Setup', 1300.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(22, 'Arif Hassan', 'People/download.jpg', 'Chittagong', '01832-234567', 'arif.hassan@email.com', 5, 'All Brands', 'Panel Repair, Circuit Fix', 1000.00, 1, 4.10, 0, '2024-11-16 15:00:58'),
(23, 'Babul Akter', 'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg', 'Khulna', '01933-345678', 'babul.akter@email.com', 12, 'Sony, Samsung', 'Screen Replacement, Software Update', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58'),
(24, 'Dulal Miah', 'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg', 'Sylhet', '01634-456789', 'dulal.miah@email.com', 7, 'Samsung, TCL', 'Hardware Fix, Audio Issues', 1100.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(25, 'Ershad Ali', 'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg', 'Rajshahi', '01535-567890', 'ershad.ali@email.com', 10, 'All Brands', 'Full Service, Maintenance', 1300.00, 1, 4.50, 0, '2024-11-16 15:00:58'),
(26, 'Firoz Ahmed', 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 'Barisal', '01836-678901', 'firoz.ahmed@email.com', 6, 'LG, Sony', 'Smart TV Apps, Power Problems', 1000.00, 1, 4.20, 0, '2024-11-16 15:00:58'),
(27, 'Gias Uddin', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 'Dhaka', '01737-789012', 'gias.uddin@email.com', 14, 'Samsung, LG', 'Expert Repairs, All Services', 1500.00, 1, 4.80, 0, '2024-11-16 15:00:58'),
(28, 'Hanif Khan', 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 'Chittagong', '01838-890123', 'hanif.khan@email.com', 8, 'Sony, TCL', 'Display Issues, Network Setup', 1200.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(29, 'Imran Ali', 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 'Sylhet', '01939-901234', 'imran.ali@email.com', 11, 'All Brands', 'Full Service, Emergency Repair', 1400.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(30, 'Jalal Miah', 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 'Rajshahi', '01640-012345', 'jalal.miah@email.com', 5, 'Samsung, LG', 'Basic Repairs, Installation', 900.00, 1, 4.00, 0, '2024-11-16 15:00:58'),
(31, 'Kader Ahmed', 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 'Dhaka', '01741-123456', 'kader.ahmed@email.com', 8, 'Sony, Samsung', 'Display Repair, Circuit Fix', 1200.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(32, 'Liton Khan', 'People/scan0005 - Copy.jpg', 'Chittagong', '01842-234567', 'liton.khan@email.com', 13, 'All Brands', 'Panel Repair, Smart TV Setup', 1500.00, 1, 4.80, 0, '2024-11-16 15:00:58'),
(33, 'Mizan Ali', 'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg', 'Khulna', '01943-345678', 'mizan.ali@email.com', 6, 'LG, TCL', 'Screen Replacement, Software Update', 1000.00, 1, 4.10, 0, '2024-11-16 15:00:58'),
(34, 'Noman Uddin', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 'Sylhet', '01644-456789', 'noman.uddin@email.com', 9, 'Samsung, Sony', 'Hardware Fix, Audio Issues', 1300.00, 1, 4.50, 0, '2024-11-16 15:00:58'),
(35, 'Obaid Rahim', 'People/scan0005 - Copy.jpg', 'Rajshahi', '01545-567890', 'obaid.rahim@email.com', 7, 'All Brands', 'Full Service, Maintenance', 1100.00, 1, 4.30, 0, '2024-11-16 15:00:58'),
(36, 'Parvez Ahmed', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 'Barisal', '01846-678901', 'parvez.ahmed@email.com', 11, 'LG, Samsung', 'Smart TV Apps, Power Problems', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58'),
(37, 'Quamrul Hassan', 'People/bb88d27dc9a113b5aacdada3297e3af1.jpg', 'Dhaka', '01747-789012', 'quamrul.hassan@email.com', 5, 'Sony, TCL', 'Basic Repairs, Network Setup', 900.00, 1, 4.00, 0, '2024-11-16 15:00:58'),
(38, 'Rubel Miah', 'People/scan0005 - Copy.jpg', 'Chittagong', '01848-890123', 'rubel.miah@email.com', 10, 'All Brands', 'Expert Repairs, All Services', 1300.00, 1, 4.60, 0, '2024-11-16 15:00:58'),
(39, 'Shamim Khan', 'People/6b66ad421e92fddce0e755814a1b9215.jpg', 'Sylhet', '01949-901234', 'shamim.khan@email.com', 8, 'Samsung, LG', 'Display Issues, Emergency Repair', 1200.00, 1, 4.40, 0, '2024-11-16 15:00:58'),
(40, 'Tofazzal Ali', 'People/99547160965b8b7edef2cb81632ed2a9.jpg', 'Rajshahi', '01650-012345', 'tofazzal.ali@email.com', 12, 'Sony, Samsung', 'Full Service, Installation', 1400.00, 1, 4.70, 0, '2024-11-16 15:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `tv_repair_technicians`
--

CREATE TABLE `tv_repair_technicians` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `specialization` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` tinyint(1) DEFAULT '1'
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
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_service` decimal(10,2) NOT NULL,
  `work_experience` int NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `rating` decimal(3,1) DEFAULT '0.0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` tinyint(1) DEFAULT '1',
  `specialization` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(190) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(190) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(190) COLLATE utf8mb4_general_ci NOT NULL,
  `verify_token` varchar(190) COLLATE utf8mb4_general_ci NOT NULL,
  `verify_status` tinyint NOT NULL DEFAULT '0' COMMENT '0=no, 1=yes',
  `id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reset_token` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `phone`, `email`, `password`, `verify_token`, `verify_status`, `id`, `created_at`, `reset_token`) VALUES
('md siyam saqlain ovi', '01531707311', 'ih134857@gmail.com', '$2y$10$7qiPL28OaqBk50ZnudOwC.zwD2pjsVu1WXMuTps62VAvyCu7.aQDy', '2b7b34c87421919bcc92f9c6f7292c55', 1, 74, '2024-11-12 17:11:39', NULL),
('jobair', '0123456789', 'mg8733770@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', 'd370633dd343471f67a95265d790c210', 1, 75, '2024-11-13 03:42:59', NULL),
('md siyam saqlain ovi', '01531707311', 'ihqw134857@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '8511c01ebbc188edf181510a2c30bdd7', 0, 76, '2024-11-13 05:32:03', NULL),
('md siyam saqlain ovi', '01531707311', 'asdasddsaddd57@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '5db44fc91c01438029f1e3a198276ed8', 0, 77, '2024-11-13 12:43:34', NULL),
('asdd', 'asd', 'asdasd', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '8d45a3a00c7e7e676879e6979585bf06', 0, 78, '2024-11-13 12:44:20', NULL),
('as', 'dads', 'asd', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', 'e62425601ea4bb270315f1ec19e06bb9', 0, 79, '2024-11-13 12:44:24', NULL),
('', '', '', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '8e9c1a8f47363fb1b660dd342bc95d82', 0, 80, '2024-11-13 12:50:49', NULL),
('asd', 'adsd', 'asas', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '82f5302230e00d4b51c468593be1df32', 0, 81, '2024-11-13 12:52:39', NULL),
('md siyam saqlain ovi', '01531707311', 'qwe@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '3f8f6f852cb5ec6d587744ad95e3b3aa', 0, 82, '2024-11-13 14:00:28', NULL),
('md siyam saqlain ovi', '01531707311', 'qwewq857@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '9179892f6347078b022800f30deef11e', 0, 83, '2024-11-13 14:01:04', NULL),
('siuam', '01531707311', '212002082ovi@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '0480486c2ae6b7b8dfddc02b3318c5cc', 0, 84, '2024-11-13 14:07:17', NULL),
('kazi lotif siddik', '0123456789', 'siyamovix86@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '3aa9dcdf86ba6ca7a48751d53a764a2d', 0, 86, '2024-11-13 14:09:55', '3aa9dcdf86ba6ca7a48751d53a764a2d'),
('codu', '015848748951', 'siuampk@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', 'd8f5ce2348519ec1f31b393390914bb8', 1, 87, '2024-11-13 16:22:30', NULL),
('md siyam saqlain ovi', '01531707311', 'asd857@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '67a84c0bb86bf505ca8188eee74669b9', 0, 88, '2024-11-15 05:32:22', NULL),
('as', 'as', 'as', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '06910708c48c3fe2ebdd05f7c36984dc', 0, 89, '2024-11-15 11:24:24', NULL),
('as', '01780044606', 'siyamovix96@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '09e604aeafa6c543ce18b7a0910a9f49', 0, 90, '2024-11-15 11:33:33', NULL),
('A', '01531707311', 'GHJJKmovix86@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '07792896f75a5a78106d36c469fe10ab', 0, 91, '2024-11-15 11:33:56', NULL),
('asm saqlain ovi', '01555370731', 'sdassadvix86@gmail.com', '$2y$10$miXUI3szCRJP4lo/JrAM6eeAQuLDyZn1FlZlxpuMcRiXUcm296636', '', 1, 92, '2024-11-15 16:15:14', NULL),
('md siyam saqlain ovi', '01533470731', 'siySDFEWix86@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', '13d95a989bdffa8282e5ce4ae703826f', 0, 94, '2024-11-15 16:18:37', NULL),
('md siyam saqlain ovi', '01531707311', 'sisddvix86@gmail.com', '$2y$10$hJwOKUzrcCO9m8Wnor.q9.x9bdlbxLp12cImOFffyW0e4Bw4T.ytO', 'f513cafe7a766491d8bfc24588849b7f', 0, 95, '2024-11-15 16:32:02', NULL),
('knox subber bad guy', '01531707311', 'aade89973@gmail.com', '$2y$10$awnFf.i8b8LlSR0VEP4Z/eTbgxVRJsz1pYgdxy7QzDxYL8nETev32', '9a19ce554689b6f68978ddfb847257b6', 1, 97, '2024-11-15 16:39:57', NULL),
('saqlain ovi', '01531707321', 'aabb99911222@gmail.com', '$2y$10$4gKVSgttHGUY0DQEgVQSXuEiheVxO9N/p09AmnVF4TSSdYEZF84/m', 'dd95cc941f5695886438328f16e03498', 1, 98, '2024-11-18 19:40:00', NULL),
('md siyam saqlain ovi', '01531707311', 'asabb99911222@gmail.com', '$2y$10$o2UP55V9Awu7JYvT/gnWiuIOk2lq0a8PbW8e28SQLvV5b6iH2I4Wi', 'c65a47cc752d5a3fecd0a55c12f77037', 0, 99, '2024-11-19 05:41:18', NULL),
('md siyam saqlain ovi', '01531707314', 'aa4bb99911222@gmail.com', '$2y$10$FVy.GFlfEPf.AaHikkU4g.sP.dVi75sp.BoeGKy40PgufTWCe9gei', 'a942dbbdf7eeb0e5841aed6a568a9985', 0, 100, '2024-11-19 05:42:54', NULL),
('a', '01531707311', 'test@gmail.com', '$2y$10$X0l5p8uI7ng2hj4ny81FLe2cNaZOeQ8mNVwtikQN9TaHrFUzJHUcS', 'e93b05ae0a3999d0e257e6780a4f0748', 0, 101, '2024-11-29 15:01:25', NULL),
('John123', '01531707311', 'asd2@gmail.com', '$2y$10$p6EHd1Ru2gCNagQ7MiN3fOZQlq3PMD8K7ilJrKmRQjRegMoh/VZca', '5122e27c7f118fe6bb5cab33703d59e2', 0, 102, '2024-11-29 15:02:03', NULL),
('John@Doe', '01531707311', 'ih13sdfsdd4857@gmail.com', '$2y$10$8oj4kuni9uM3stwVFFdcS.3xee71934QIvAysSMIZSd/NAQB9cCii', '77e14e174243a2000fa0b5558f03342f', 0, 103, '2024-11-29 15:02:27', NULL),
('asdasd', '01531707311', 'siyamovia15@gmail.com', '$2y$10$CeKKosVZ7TbOVi3qX3PBFexeD6kMNomI/l6mZf2lsnhUBlbDnE3Em', '19a203e6f172ebd99b46a029e3dbd3c1', 0, 104, '2024-11-30 15:22:13', NULL),
('knox subber', '01531703333', 'genzxishan@gmail.com', '$2y$10$PAF/2wDiWFWrSiBMyWhxGeBrkXi2.mOlv/V6HHFThUncQ/mpvI8s.', '08a14bca2a257d794c0d9615eb035511', 0, 105, '2024-11-30 15:32:52', NULL),
('asdfdsadf', '01531703333', 'asdfasdfasdfasdfdsadfsdfadsdf@gmail.com', '$2y$10$e8/cgREk4hOeBM0NFIF2tehvoqekz9YqYKZrZtHY3Qs1SWholf6tm', '8b16a85b0a26e4877be09163e4a02091', 0, 106, '2024-11-30 15:33:26', NULL),
('knox subber', '01531703333', 'mdsiyamsaqlainovi@gmail.com', '$2y$10$XYSbn74decCowIitQnSiduXlw1gz3WHNat3Cjsd2/gYfgffRstlJm', 'ae2e6a8d5e80768098a8311626961375', 1, 107, '2024-11-30 15:37:18', 'ae2e6a8d5e80768098a8311626961375');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `battery_services`
--
ALTER TABLE `battery_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `car_mechanics`
--
ALTER TABLE `car_mechanics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `electricians`
--
ALTER TABLE `electricians`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `locksmiths`
--
ALTER TABLE `locksmiths`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packers_movers`
--
ALTER TABLE `packers_movers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `painters`
--
ALTER TABLE `painters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `plumbers`
--
ALTER TABLE `plumbers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tv_repair`
--
ALTER TABLE `tv_repair`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tv_repair_technicians`
--
ALTER TABLE `tv_repair_technicians`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tv_technicians`
--
ALTER TABLE `tv_technicians`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
  ADD CONSTRAINT `payments_ibfk_5` FOREIGN KEY (`tv_technician_id`) REFERENCES `tv_repair` (`id`),
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
  ADD CONSTRAINT `reviews_ibfk_6` FOREIGN KEY (`tv_technician_id`) REFERENCES `tv_repair` (`id`),
  ADD CONSTRAINT `reviews_ibfk_7` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`id`),
  ADD CONSTRAINT `reviews_ibfk_8` FOREIGN KEY (`packer_mover_id`) REFERENCES `packers_movers` (`id`),
  ADD CONSTRAINT `reviews_ibfk_9` FOREIGN KEY (`locksmith_id`) REFERENCES `locksmiths` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
