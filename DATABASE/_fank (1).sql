-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 06:38 PM
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT 'assets/img/default-painter.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `painters`
--

INSERT INTO `painters` (`id`, `name`, `email`, `contact_number`, `location`, `price_per_day`, `work_experience`, `profile_image`, `rating`, `availability`, `specialization`, `created_at`, `image`) VALUES
(1, 'Rahim Mia', 'rahim.painter@gmail.com', '01711-222333', 'Mirpur, Dhaka', 1200.00, 10, 'default.jpg', 5.0, 0, 'Wall Painting, Texture', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(2, 'Kamal Hossain', 'kamal.paint@gmail.com', '01819-444555', 'Dhanmondi, Dhaka', 1500.00, 15, 'default.jpg', 0.0, 1, 'Interior, Exterior', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(3, 'Abdul Karim', 'karim.painter@yahoo.com', '01612-666777', 'Uttara, Dhaka', 1300.00, 8, 'default.jpg', 0.0, 1, 'Wall Art, Texture', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(4, 'Mostafa Khan', 'mostafa.paint@gmail.com', '01911-888999', 'Gulshan, Dhaka', 2000.00, 12, 'default.jpg', 0.0, 1, 'Commercial Painting', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(5, 'Jamal Uddin', 'jamal.painter@yahoo.com', '01515-111222', 'Banani, Dhaka', 1800.00, 14, 'default.jpg', 0.0, 1, 'Residential Painting', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(6, 'Sohel Rana', 'sohel.paint@gmail.com', '01712-333444', 'Mohammadpur, Dhaka', 1400.00, 9, 'default.jpg', 0.0, 1, 'Wall Painting', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(7, 'Masud Ahmed', 'masud.painter@gmail.com', '01818-555666', 'Badda, Dhaka', 1600.00, 11, 'default.jpg', 0.0, 1, 'Interior Design', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(8, 'Faruk Hasan', 'faruk.paint@yahoo.com', '01617-777888', 'Motijheel, Dhaka', 1700.00, 13, 'default.jpg', 0.0, 1, 'Commercial, Residential', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(9, 'Nasir Uddin', 'nasir.painter@gmail.com', '01912-999000', 'Khilgaon, Dhaka', 1300.00, 7, 'default.jpg', 0.0, 1, 'Wall Texture', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(10, 'Rubel Miah', 'rubel.paint@gmail.com', '01716-112233', 'Rampura, Dhaka', 1500.00, 10, 'default.jpg', 0.0, 1, 'Interior Painting', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(11, 'Jahangir Alam', 'jahangir.painter@yahoo.com', '01813-445566', 'Malibagh, Dhaka', 1400.00, 8, 'default.jpg', 0.0, 1, 'Exterior Painting', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(12, 'Shahin Khan', 'shahin.paint@gmail.com', '01613-778899', 'Tejgaon, Dhaka', 1900.00, 16, 'default.jpg', 0.0, 1, 'Commercial Projects', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(13, 'Mizan Rahman', 'mizan.painter@gmail.com', '01913-001122', 'Farmgate, Dhaka', 1600.00, 12, 'default.jpg', 0.0, 1, 'Residential Projects', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(14, 'Babul Miah', 'babul.paint@yahoo.com', '01714-334455', 'Mohakhali, Dhaka', 2100.00, 18, 'default.jpg', 0.0, 1, 'Interior, Exterior', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(15, 'Liton Das', 'liton.painter@gmail.com', '01814-667788', 'Pallabi, Dhaka', 1400.00, 9, 'default.jpg', 0.0, 1, 'Wall Painting', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(16, 'Rashed Khan', 'rashed.paint@gmail.com', '01614-990011', 'Cantonment, Dhaka', 1700.00, 13, 'default.jpg', 0.0, 1, 'Texture Specialist', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(17, 'Monir Hossain', 'monir.painter@yahoo.com', '01914-223344', 'Kalyanpur, Dhaka', 1500.00, 11, 'default.jpg', 0.0, 1, 'Wall Art', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(18, 'Sharif Uddin', 'sharif.paint@gmail.com', '01715-556677', 'Shyamoli, Dhaka', 1800.00, 15, 'default.jpg', 0.0, 1, 'Commercial Painting', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(19, 'Kabir Ahmed', 'kabir.painter@gmail.com', '01815-889900', 'Agargaon, Dhaka', 1600.00, 12, 'default.jpg', 0.0, 1, 'Residential Painting', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg'),
(20, 'Dulal Miah', 'dulal.paint@yahoo.com', '01615-112233', 'Kazipara, Dhaka', 1400.00, 10, 'default.jpg', 0.0, 1, 'Interior Design', '2024-11-15 08:58:45', 'assets/img/default-painter.jpg');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `painter_id`, `amount`, `payment_intent_id`, `status`, `booking_date`, `created_at`) VALUES
(1, 86, 1, 1200.00, 'pi_3QLMsoJcVq5mfW9U0sKMcoSC', 'completed', '2024-11-27', '2024-11-15 10:38:11'),
(2, 86, 2, 1500.00, 'pi_3QLN2xJcVq5mfW9U0pptbxUb', 'completed', '2024-11-29', '2024-11-15 10:48:11'),
(3, 97, 1, 1200.00, 'pi_3QLTOEJcVq5mfW9U0bAuyFlg', 'completed', '2024-11-17', '2024-11-15 17:33:44');

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
-- Indexes for table `electricians`
--
ALTER TABLE `electricians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD KEY `painter_id` (`painter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `electricians`
--
ALTER TABLE `electricians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `painters`
--
ALTER TABLE `painters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`painter_id`) REFERENCES `painters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
