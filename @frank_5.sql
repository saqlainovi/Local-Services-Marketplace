-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2024 at 04:33 AM
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
('md siyam saqlain ovi', '01531707311', 'ih134857@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', 'f968dcc6fc089f1757d9bd91ce57f8a6', 1, 74, '2024-11-12 17:11:39', NULL),
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
('knox subber', '01531707311', 'mdsiyamsaqlainovi@gmail.com', '$2y$10$T8j8HUewa7djSy0HVoey7u2fcrraBPEyZV3B6CJ26Ajjt6845B6qG', 'eab6f429d98d64cfe129a89448d8ecd5', 0, 85, '2024-11-13 14:08:47', NULL),
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
('saqlain ovi', '01531707321', 'aabb99911222@gmail.com', '$2y$10$L0bcWAvuSfjN6f6jVTlFEOaGW/kzpMeNcEpaC8DfwE0r0kEH8X/Ni', '3ab973978c77fe9fde3bdbceec9cb06d', 1, 98, '2024-11-18 19:40:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `payment_intent_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `booking_id` varchar(50) NOT NULL,
  `user_id` int NOT NULL,
  `provider_id` int NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `payment_id` int DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `payment_id` (`payment_id`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
