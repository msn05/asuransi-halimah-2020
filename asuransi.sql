-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2021 at 02:32 PM
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
(2, 'superadmin', 'be valid'),
(3, 'insurance', 'be valid'),
(4, 'customer insurance', 'be valid'),
(5, 'manager', 'be valid'),
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
(6, 6, '2323232', 'A38292-ajaj2938', '2021-07-24 14:24:56', 20, 'done', '2021-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `checkin_service_insurance`
--

CREATE TABLE `checkin_service_insurance` (
  `id_checkin_insurance` int NOT NULL,
  `order_id` varchar(25) NOT NULL,
  `service_categori_id` int NOT NULL,
  `repair` int NOT NULL,
  `damage` enum('s','b','p') NOT NULL,
  `perbaikan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `checkin_service_insurance`
--

INSERT INTO `checkin_service_insurance` (`id_checkin_insurance`, `order_id`, `service_categori_id`, `repair`, `damage`, `perbaikan`) VALUES
(9, 'CA-TP002', 5, 1, 's', 1),
(10, 'CA-TP002', 8, 0, 'b', 1);

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
(2, 'bank mandiri', 'jalan veteran palembang', 845783478373, 43),
(3, 'MARI', 'jalan di panjaitan', 812374837382, 44);

-- --------------------------------------------------------

--
-- Table structure for table `estimasi`
--

CREATE TABLE `estimasi` (
  `id_estimasi` int NOT NULL,
  `checkin_mechanic_id` int NOT NULL,
  `spare_part_id` varchar(30) DEFAULT NULL,
  `qty_sparepart` int DEFAULT NULL,
  `disc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `estimasi`
--

INSERT INTO `estimasi` (`id_estimasi`, `checkin_mechanic_id`, `spare_part_id`, `qty_sparepart`, `disc`) VALUES
(18, 6, '6400A621', 1, 10);

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
(13, 'bumper atas', 100000, 6),
(14, 'Fender Blkg (Non Pintu)', 1000000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(30) NOT NULL,
  `start_repair_id` varchar(30) NOT NULL,
  `material_cost` bigint NOT NULL,
  `salvage` bigint NOT NULL,
  `pph` bigint NOT NULL,
  `admin_cost` bigint NOT NULL,
  `crane_fee` bigint NOT NULL,
  `amount_or` bigint NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `start_repair_id`, `material_cost`, `salvage`, `pph`, `admin_cost`, `crane_fee`, `amount_or`, `created_at`) VALUES
('INV-P001', 'SPK-K003', 1, 1, 1, 1, 1, 1, '2021-07-24');

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
(10, '34343', 5, 0, '2021-07-10 19:41:18', 20, 'Telah Dilakukan Pengahupusan Stok Menjadi 0 Baru Oleh head_mekanik@gmail.com'),
(11, '233', 20, 20, '2021-07-23 14:57:20', 2, 'Baru Ditambahkan Sparepart Baru Oleh halima@gmail.com');

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
  `phone_number_nasabah` varchar(16) NOT NULL,
  `address_nasabah` text NOT NULL,
  `number_nik` bigint NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nasabah_customer`
--

INSERT INTO `nasabah_customer` (`id_nasabah`, `customers_id`, `name_nasabah`, `phone_number_nasabah`, `address_nasabah`, `number_nik`, `email`) VALUES
(8, 2, 'halima', '08127436748', 'alamat saya stata', 16727364783727, 'email@email.com'),
(9, 2, 'sindi', '08127436700', 'alamat dimanassssssss', 16727364783700, 'testss@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_nasabah_customers`
--

CREATE TABLE `order_nasabah_customers` (
  `id_order` varchar(30) NOT NULL,
  `nasabah_customer_id` int NOT NULL,
  `plate` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `year` bigint NOT NULL,
  `color` varchar(40) NOT NULL,
  `actions_order` enum('done','pending','in proccess') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `coments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_nasabah_customers`
--

INSERT INTO `order_nasabah_customers` (`id_order`, `nasabah_customer_id`, `plate`, `type`, `merk`, `year`, `color`, `actions_order`, `created_at`, `coments`, `price`) VALUES
('CA-TP002', 8, 'BG 2020 AJT', 'g-sport', 'avanza', 2020, 'black', 'in proccess', '2021-07-22 01:09:00', '<ol>\n	<li>test bummper depan</li>\n	<li>test knalpot</li>\n</ol>\n', '2000000'),
('CA-TP003', 8, 'BG 420 AJA', 'Alparh', 'Toyota', 2021, 'Hitam', 'pending', '2021-07-23 22:26:44', NULL, '20000000'),
('CA-TP004', 9, 'BG 4205 AJA', 'Civic', 'Honda', 2020, 'Biru', 'pending', '2021-07-23 23:47:05', NULL, '100000000');

-- --------------------------------------------------------

--
-- Table structure for table `request_services`
--

CREATE TABLE `request_services` (
  `id_request_service` int NOT NULL,
  `order_id` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_checkin` datetime DEFAULT NULL,
  `file_genered` text,
  `actions` enum('pending apporved','apporved','pending','non approved','failed','in service','done') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `request_services`
--

INSERT INTO `request_services` (`id_request_service`, `order_id`, `created_at`, `customer_checkin`, `file_genered`, `actions`) VALUES
(6, 'CA-TP002', '2021-07-24 14:22:25', '2021-07-24 14:22:43', 'bank mandiri-halima.pdf', 'apporved');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id_service_categori` int NOT NULL,
  `name_service` varchar(100) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id_service_categori`, `name_service`, `group_name`, `created_at`) VALUES
(5, 'bumper atas', 'bumper', '2021-07-23 23:20:55'),
(6, 'Fender/Spakbor Dpn R/L', 'BAGIAN FENDER & SPION', '2021-07-23 23:21:14'),
(7, 'Fender/Spakbor Blk R/L', 'BAGIAN FENDER & SPION', '2021-07-23 23:21:30'),
(8, 'Fender Blkg (Non Pintu)', 'BAGIAN FENDER & SPION', '2021-07-23 23:22:10'),
(9, 'Over Vender', 'BAGIAN FENDER & SPION', '2021-07-23 23:22:22'),
(10, 'Pintu Dpn R/L', 'BAGIAN PINTU', '2021-07-23 23:37:14');

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
('233', 'test', 10000, 20, '2021-07-23 14:57:20', '2021-07-23 14:57:20', 2),
('34343', 'adad', 343, 0, '2021-07-10 18:57:03', '2021-07-10 19:41:18', 20),
('6400A621', 'garnish atas bumper fr lh', 354000, 25, '2021-07-10 15:00:48', '2021-07-23 14:56:13', 2),
('6407A263', 'garnish bawah bpr fr lh', 145000, 32, '2021-07-10 15:02:36', '2021-07-10 17:42:27', 20),
('ada', 'sss', 2600000, 14, '2021-07-10 17:59:00', '2021-07-11 14:44:26', 20),
('dsfs', 'sdfsd', 322, 23, '2021-07-10 18:00:02', '2021-07-10 20:25:23', 20);

-- --------------------------------------------------------

--
-- Table structure for table `start_repair`
--

CREATE TABLE `start_repair` (
  `id_start_repair` varchar(30) NOT NULL,
  `request_service_id` int NOT NULL,
  `actions_repair` enum('open','close') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `start_repair`
--

INSERT INTO `start_repair` (`id_start_repair`, `request_service_id`, `actions_repair`) VALUES
('SPK-K003', 6, 'close');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_code` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access_id` int NOT NULL,
  `status_users` enum('Active','Non Active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `user_code`, `password`, `created_at`, `access_id`, `status_users`) VALUES
(2, 'halima@gmail.com', 'SR-CS001', '$2y$10$EsrnXWxz/iEIi2INPSBQkuNFeui.VLfgXCKKI5Q7QTOGE.X8M7QV.', '2021-07-09 14:48:17', 1, 'Active'),
(20, 'head_mekanik@gmail.com', 'SR-HM001', '$2y$10$EsrnXWxz/iEIi2INPSBQkuNFeui.VLfgXCKKI5Q7QTOGE.X8M7QV.', '2021-07-10 14:11:07', 7, 'Active'),
(43, 'bca_insurance@gmail.com', 'SR-VA001', '$2y$10$EsrnXWxz/iEIi2INPSBQkuNFeui.VLfgXCKKI5Q7QTOGE.X8M7QV.', '2021-07-11 00:13:30', 3, 'Active'),
(44, 'mari@gmail.com', 'SR-VA002', '$2y$10$Ea7IXOg503zsxtGHjiwL9OmuCMczHjuJ9gw253FIeGTwkaIRyWVJG', '2021-07-21 21:46:32', 3, 'Active'),
(45, 'halima_cm@gmail.com', 'SR-CM001', '$2y$10$EsrnXWxz/iEIi2INPSBQkuNFeui.VLfgXCKKI5Q7QTOGE.X8M7QV.', '2021-07-09 14:48:17', 5, 'Active'),
(46, 'cashier@gmail.com', 'SR-CC001', '$2y$10$EsrnXWxz/iEIi2INPSBQkuNFeui.VLfgXCKKI5Q7QTOGE.X8M7QV.', '2021-07-10 14:11:07', 6, 'Active');

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
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

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
-- Indexes for table `order_nasabah_customers`
--
ALTER TABLE `order_nasabah_customers`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `request_services`
--
ALTER TABLE `request_services`
  ADD PRIMARY KEY (`id_request_service`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id_service_categori`);

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
  MODIFY `id_checkin_mechanic` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkin_service_insurance`
--
ALTER TABLE `checkin_service_insurance`
  MODIFY `id_checkin_insurance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estimasi`
--
ALTER TABLE `estimasi`
  MODIFY `id_estimasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fee_service`
--
ALTER TABLE `fee_service`
  MODIFY `id_fee_service` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `log_spare_parts`
--
ALTER TABLE `log_spare_parts`
  MODIFY `id_log_spare_part` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mechanic`
--
ALTER TABLE `mechanic`
  MODIFY `id_mechanic` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nasabah_customer`
--
ALTER TABLE `nasabah_customer`
  MODIFY `id_nasabah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_services`
--
ALTER TABLE `request_services`
  MODIFY `id_request_service` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id_service_categori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
