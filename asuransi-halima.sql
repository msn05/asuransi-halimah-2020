-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2021 at 01:49 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asuransi-halima`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id_access` int NOT NULL,
  `access_name` varchar(40) NOT NULL,
  `access_status` enum('be valid','not applicable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id_access`, `access_name`, `access_status`) VALUES
(1, 'customer service', 'be valid'),
(2, 'mechanic', 'be valid'),
(3, 'insurance', 'be valid'),
(4, 'customer insurance', 'be valid'),
(5, 'manager', 'not applicable'),
(6, 'cashier', 'be valid'),
(7, 'head_mechanic', 'be valid');

-- --------------------------------------------------------

--
-- Table structure for table `checkin_mechanic`
--

CREATE TABLE `checkin_mechanic` (
  `id_checkin_mechanic` int NOT NULL,
  `request_service_id` int NOT NULL,
  `chassis_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `engine_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mechanic_id` int DEFAULT NULL,
  `actions_checkin` enum('pending','done') NOT NULL,
  `estime_done` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `checkin_mechanic`
--

INSERT INTO `checkin_mechanic` (`id_checkin_mechanic`, `request_service_id`, `chassis_no`, `engine_no`, `created_at`, `mechanic_id`, `actions_checkin`, `estime_done`) VALUES
(1, 1, '2323232', '22222', '2021-07-11 21:50:18', 2, 'done', '2021-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `checkin_service_insurance`
--

CREATE TABLE `checkin_service_insurance` (
  `id_checkin_insurance` int NOT NULL,
  `nasabah_customer_id` int NOT NULL,
  `coments` text NOT NULL,
  `max_price` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `checkin_service_insurance`
--

INSERT INTO `checkin_service_insurance` (`id_checkin_insurance`, `nasabah_customer_id`, `coments`, `max_price`) VALUES
(4, 2, '<ol>\n	<li>adada</li>\n	<li>adad</li>\n	<li>a</li>\n	<li>dada</li>\n	<li>asda</li>\n	<li>ad</li>\n	<li>ad</li>\n	<li>ad</li>\n	<li>a</li>\n	<li>da</li>\n	<li>da</li>\n</ol>\n', 2000000),
(5, 3, '<ol>\n	<li>dak katek dasaaran be</li>\n</ol>\n', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int NOT NULL,
  `name_company` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone_number` bigint NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `name_company`, `address`, `phone_number`, `users_id`) VALUES
(1, 'dadada', 'jalan tanjung sari 22', 812735363581, 42),
(2, 'bank mandiri', 'jalan kapten a rivai', 845783478373, 43);

-- --------------------------------------------------------

--
-- Table structure for table `estimasi`
--

CREATE TABLE `estimasi` (
  `id_estimasi` int NOT NULL,
  `checkin_mechanic_id` int NOT NULL,
  `spare_part_id` varchar(30) DEFAULT NULL,
  `qty_sparepart` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `estimasi`
--

INSERT INTO `estimasi` (`id_estimasi`, `checkin_mechanic_id`, `spare_part_id`, `qty_sparepart`) VALUES
(9, 1, '6407A263', 2),
(10, 1, '6400A621', 6),
(11, 1, 'ada', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fee_service`
--

CREATE TABLE `fee_service` (
  `id_fee_service` int NOT NULL,
  `name_service` varchar(100) NOT NULL,
  `price` bigint NOT NULL,
  `checkin_mechanic_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fee_service`
--

INSERT INTO `fee_service` (`id_fee_service`, `name_service`, `price`, `checkin_mechanic_id`) VALUES
(3, 'ada', 2, 1),
(5, 'ada aja', 20000, 1),
(6, 'lah oke', 100000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_spare_parts`
--

CREATE TABLE `log_spare_parts` (
  `id_log_spare_part` int NOT NULL,
  `code_spare_part` varchar(30) NOT NULL,
  `stock_create` bigint NOT NULL,
  `stock_update` bigint NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `users_id` int NOT NULL,
  `coments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_spare_parts`
--

INSERT INTO `log_spare_parts` (`id_log_spare_part`, `code_spare_part`, `stock_create`, `stock_update`, `updated_at`, `users_id`, `coments`) VALUES
(1, '6400A621', 12, 12, '2021-07-10 15:00:48', 20, 'Baru Ditambahkan Sparepart Baru Oleh head_mekanik@gmail.com'),
(2, '6407A263', 12, 12, '2021-07-10 15:02:36', 20, 'Baru Ditambahkan Sparepart Baru Oleh head_mekanik@gmail.com'),
(5, 'dsfs', 23, 23, '2021-07-10 18:00:02', 20, 'Baru Ditambahkan Sparepart Baru Oleh head_mekanik@gmail.com'),
(6, 'ada', 12, 14, '2021-07-10 18:00:13', 20, 'Telah Dilakukan Pembaharuan Sparepart Baru Oleh head_mekanik@gmail.com'),
(7, '34343', 2, 2, '2021-07-10 18:57:03', 20, 'Baru Ditambahkan Sparepart Baru Oleh head_mekanik@gmail.com'),
(8, '34343', 3, 5, '2021-07-10 19:24:59', 20, 'Telah Dilakukan Pembaharuan Sparepart Baru Oleh head_mekanik@gmail.com'),
(10, '34343', 5, 0, '2021-07-10 19:41:18', 20, 'Telah Dilakukan Pengahupusan Stok Menjadi 0 Baru Oleh head_mekanik@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
  `id_mechanic` int NOT NULL,
  `mechanic_name` varchar(100) NOT NULL,
  `phone_mechanic` bigint NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`id_mechanic`, `mechanic_name`, `phone_mechanic`, `users_id`) VALUES
(2, 'sindi', 81293849583, 10),
(3, 'nabilas', 81293849582, 11),
(4, 'fahira', 81293849581, 12),
(7, 'andasaja', 8127353635220, 15),
(9, 'andai saja kau tidak', 812938429577, 17),
(12, 'kepala mekanik', 8497392792, 20),
(14, 'adad', 32424242, 22);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah_customer`
--

CREATE TABLE `nasabah_customer` (
  `id_nasabah` int NOT NULL,
  `customers_id` int NOT NULL,
  `name_nasabah` varchar(100) NOT NULL,
  `phone_number_nasabah` bigint NOT NULL,
  `address_nasabah` text NOT NULL,
  `number_nik` bigint NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `vehicle_plate` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `open_check_in` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nasabah_customer`
--

INSERT INTO `nasabah_customer` (`id_nasabah`, `customers_id`, `name_nasabah`, `phone_number_nasabah`, `address_nasabah`, `number_nik`, `vehicle_type`, `vehicle_plate`, `email`, `open_check_in`) VALUES
(2, 2, 'sindi', 83474834728, 'alamat', 16727364783727, 'Avanza', 'BG 1234 AC', 'email@email.com', NULL),
(3, 2, 'halima', 812743674834, 'alamat', 16727364783727, 'Fortuner', 'BG 1234 ACD', 'email@email.com', NULL),
(4, 2, 'amelia', 812743674834, 'alamat', 16727364783727, 'Pajero', 'BG 1234 ACC', 'email@email.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_services`
--

CREATE TABLE `request_services` (
  `id_request_service` int NOT NULL,
  `check_service_insurance_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_checkin` datetime DEFAULT NULL,
  `file_genered` text,
  `actions` enum('pending apporved','apporved','pending','non approved','failed','in service','done') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `request_services`
--

INSERT INTO `request_services` (`id_request_service`, `check_service_insurance_id`, `created_at`, `customer_checkin`, `file_genered`, `actions`) VALUES
(1, 4, '2021-07-11 11:52:45', '2021-07-11 13:19:13', 'bank mandiri-sindi.pdf', 'done'),
(2, 5, '2021-07-11 12:21:29', NULL, NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

CREATE TABLE `spare_parts` (
  `code_spare_parts` varchar(30) NOT NULL,
  `spare_part_name` varchar(100) NOT NULL,
  `price` bigint NOT NULL,
  `stock_spare_part` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spare_parts`
--

INSERT INTO `spare_parts` (`code_spare_parts`, `spare_part_name`, `price`, `stock_spare_part`, `created_at`, `updated_at`, `users_id`) VALUES
('34343', 'adad', 343, 0, '2021-07-10 18:57:03', '2021-07-10 19:41:18', 20),
('6400A621', 'garnish atas bumper fr lh', 354000, 23, '2021-07-10 15:00:48', '2021-07-10 17:14:51', 20),
('6407A263', 'garnish bawah bpr fr lh', 145000, 32, '2021-07-10 15:02:36', '2021-07-10 17:42:27', 20),
('ada', 'sss', 2600000, 14, '2021-07-10 17:59:00', '2021-07-11 14:44:26', 20),
('dsfs', 'sdfsd', 322, 23, '2021-07-10 18:00:02', '2021-07-10 20:25:23', 20);

-- --------------------------------------------------------

--
-- Table structure for table `start_repair`
--

CREATE TABLE `start_repair` (
  `id_start_repair` int NOT NULL,
  `request_service_id` int NOT NULL,
  `actions_repair` enum('open','close') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `start_repair`
--

INSERT INTO `start_repair` (`id_start_repair`, `request_service_id`, `actions_repair`) VALUES
(1, 1, 'close');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access_id` int NOT NULL,
  `status_users` enum('Active','Non Active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `created_at`, `access_id`, `status_users`) VALUES
(2, 'halima@gmail.com', '$2y$10$UpbzYjldklYkIQCbGLZnP.uARwRF6VBQe6zVuH4kZQQk8FTEYdAa2', '2021-07-09 14:48:17', 1, 'Active'),
(10, 'sindi@gmail.com', '$2y$10$8xqVZsX47zqDCx/L9dTs9.tCHP4sVRfyy2BNb/sYE5044uehvKxPi', '2021-07-10 02:08:14', 2, 'Non Active'),
(11, 'nabila@gmail.com', '$2y$10$noD2qMjlDzCUfv2ABFYB8OL/a2k/0U5kZqnwwDwVXYpYHs.RtZvQC', '2021-07-10 02:08:51', 2, 'Non Active'),
(12, 'fahirssa@gmail.com', '$2y$10$UpbzYjldklYkIQCbGLZnP.uARwRF6VBQe6zVuH4kZQQk8FTEYdAa2', '2021-07-10 02:09:04', 2, 'Active'),
(15, 'halima21@gmail.com', '$2y$10$oqEQIEorfCNydY46d.RKNOQyc8yH/TCiho1oiYt.JDmavTaWHPfw6', '2021-07-10 10:20:17', 2, 'Non Active'),
(17, 'nabsilokea@gmail.com', '$2y$10$uye3d3Tk9crtveNnDPiaD.Q4VRIw4sCzIYwBGIbnFjI3dWZCnnbw2', '2021-07-10 10:32:08', 2, 'Active'),
(20, 'head_mekanik@gmail.com', '$2y$10$UpbzYjldklYkIQCbGLZnP.uARwRF6VBQe6zVuH4kZQQk8FTEYdAa2', '2021-07-10 14:11:07', 7, 'Active'),
(29, 'ada@gmail.com', '$2y$10$4jjluvMtvfPvqI.ji55on.zn4ShVm.zorFJ7AV1Z0C8KlLF/kBuJG', '2021-07-10 22:12:53', 3, 'Active'),
(42, 'dw@gmail.com', '$2y$10$dMqTfPWyj7F1sUJQYUJkBOS9N7/IHMBP40hM6fggXYHpw3Flr54.i', '2021-07-11 00:09:01', 3, 'Active'),
(43, 'bca_insurance@gmail.com', '$2y$10$UpbzYjldklYkIQCbGLZnP.uARwRF6VBQe6zVuH4kZQQk8FTEYdAa2', '2021-07-11 00:13:30', 3, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indexes for table `checkin_mechanic`
--
ALTER TABLE `checkin_mechanic`
  ADD PRIMARY KEY (`id_checkin_mechanic`),
  ADD KEY `request_service_id` (`request_service_id`),
  ADD KEY `mechanic_id` (`mechanic_id`);

--
-- Indexes for table `checkin_service_insurance`
--
ALTER TABLE `checkin_service_insurance`
  ADD PRIMARY KEY (`id_checkin_insurance`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `estimasi`
--
ALTER TABLE `estimasi`
  ADD PRIMARY KEY (`id_estimasi`),
  ADD KEY `spare_part_id` (`spare_part_id`),
  ADD KEY `checkin_mechanic_id` (`checkin_mechanic_id`);

--
-- Indexes for table `fee_service`
--
ALTER TABLE `fee_service`
  ADD PRIMARY KEY (`id_fee_service`),
  ADD KEY `checkin_mechanic_id` (`checkin_mechanic_id`);

--
-- Indexes for table `log_spare_parts`
--
ALTER TABLE `log_spare_parts`
  ADD PRIMARY KEY (`id_log_spare_part`),
  ADD KEY `code_spare_part` (`code_spare_part`);

--
-- Indexes for table `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`id_mechanic`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `nasabah_customer`
--
ALTER TABLE `nasabah_customer`
  ADD PRIMARY KEY (`id_nasabah`),
  ADD KEY `customers_id` (`customers_id`);

--
-- Indexes for table `request_services`
--
ALTER TABLE `request_services`
  ADD PRIMARY KEY (`id_request_service`);

--
-- Indexes for table `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`code_spare_parts`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `start_repair`
--
ALTER TABLE `start_repair`
  ADD PRIMARY KEY (`id_start_repair`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id_access` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkin_mechanic`
--
ALTER TABLE `checkin_mechanic`
  MODIFY `id_checkin_mechanic` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkin_service_insurance`
--
ALTER TABLE `checkin_service_insurance`
  MODIFY `id_checkin_insurance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `estimasi`
--
ALTER TABLE `estimasi`
  MODIFY `id_estimasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fee_service`
--
ALTER TABLE `fee_service`
  MODIFY `id_fee_service` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_spare_parts`
--
ALTER TABLE `log_spare_parts`
  MODIFY `id_log_spare_part` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mechanic`
--
ALTER TABLE `mechanic`
  MODIFY `id_mechanic` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nasabah_customer`
--
ALTER TABLE `nasabah_customer`
  MODIFY `id_nasabah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_services`
--
ALTER TABLE `request_services`
  MODIFY `id_request_service` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `start_repair`
--
ALTER TABLE `start_repair`
  MODIFY `id_start_repair` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
