-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2025 at 11:31 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelify`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` bigint UNSIGNED DEFAULT NULL,
  `old_values` json DEFAULT NULL,
  `new_values` json DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `meta` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `model_type`, `model_id`, `old_values`, `new_values`, `ip_address`, `user_agent`, `meta`, `created_at`, `updated_at`) VALUES
(1, 4, 'seeded_example', 'Booking', 1, NULL, '\"{\\\"note\\\":\\\"sample seed\\\"}\"', '127.0.0.1', NULL, NULL, '2025-12-22 01:02:11', '2025-12-22 01:02:11'),
(2, 43, 'create', 'Cancellation', 3, NULL, '\"{\\\"booking_id\\\":20,\\\"reason\\\":\\\"malas\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-22T08:07:04.000000Z\\\",\\\"created_at\\\":\\\"2025-12-22T08:07:04.000000Z\\\",\\\"id\\\":3}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', NULL, '2025-12-22 01:07:04', '2025-12-22 01:07:04'),
(61, 1, 'update', 'Cancellation', 1, '\"{\\\"status\\\":\\\"requested\\\"}\"', '\"{\\\"id\\\":1,\\\"booking_id\\\":16,\\\"user_id\\\":4,\\\"reason\\\":\\\"Perlu membatalkan karena jadwal berubah\\\",\\\"status\\\":\\\"approved\\\",\\\"admin_note\\\":null,\\\"created_at\\\":\\\"2025-12-22T08:01:37.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-26T14:01:23.000000Z\\\",\\\"processed_by\\\":1,\\\"refund_amount\\\":\\\"700000.00\\\",\\\"booking\\\":{\\\"id\\\":16,\\\"user_id\\\":4,\\\"service_id\\\":1,\\\"booking_code\\\":\\\"AR-20251222-BKU6\\\",\\\"total_price\\\":\\\"700000.00\\\",\\\"status\\\":\\\"cancelled\\\",\\\"payment_status\\\":\\\"pending\\\",\\\"created_at\\\":\\\"2025-12-22T08:01:37.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-26T14:01:23.000000Z\\\",\\\"check_in\\\":\\\"2025-12-25T00:00:00.000000Z\\\",\\\"check_out\\\":\\\"2025-12-26T00:00:00.000000Z\\\",\\\"guest_count\\\":2,\\\"guest_info\\\":{\\\"name\\\":\\\"Hifzhedine Zahares Samto\\\",\\\"email\\\":\\\"hifzhedine8@student.uns.ac.id\\\"}}}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 07:01:23', '2025-12-26 07:01:23'),
(62, 1, 'update', 'Cancellation', 3, '\"{\\\"status\\\":\\\"requested\\\"}\"', '\"{\\\"id\\\":3,\\\"booking_id\\\":20,\\\"user_id\\\":null,\\\"reason\\\":\\\"malas\\\",\\\"status\\\":\\\"rejected\\\",\\\"admin_note\\\":null,\\\"created_at\\\":\\\"2025-12-22T08:07:04.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-26T14:25:38.000000Z\\\",\\\"processed_by\\\":1,\\\"refund_amount\\\":null,\\\"booking\\\":{\\\"id\\\":20,\\\"user_id\\\":43,\\\"service_id\\\":2,\\\"booking_code\\\":\\\"AR-20251222-DW3F\\\",\\\"total_price\\\":\\\"4017200000.00\\\",\\\"status\\\":\\\"booked\\\",\\\"payment_status\\\":\\\"pending\\\",\\\"created_at\\\":\\\"2025-12-22T08:06:21.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-22T08:07:04.000000Z\\\",\\\"check_in\\\":\\\"2025-12-04T00:00:00.000000Z\\\",\\\"check_out\\\":\\\"2030-12-04T00:00:00.000000Z\\\",\\\"guest_count\\\":4,\\\"guest_info\\\":{\\\"name\\\":\\\"Fakhru\\\",\\\"email\\\":\\\"fakhrurifqi08@student.uns.ac.id\\\",\\\"phone\\\":\\\"08348348237\\\"}}}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 07:25:38', '2025-12-26 07:25:38'),
(63, 1, 'update', 'Booking', 20, '\"{\\\"status\\\":\\\"booked\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 07:31:31', '2025-12-26 07:31:31'),
(64, 1, 'update', 'Cancellation', 2, '\"{\\\"status\\\":\\\"requested\\\"}\"', '\"{\\\"id\\\":2,\\\"booking_id\\\":19,\\\"user_id\\\":4,\\\"reason\\\":\\\"Perlu membatalkan karena jadwal berubah\\\",\\\"status\\\":\\\"rejected\\\",\\\"admin_note\\\":null,\\\"created_at\\\":\\\"2025-12-22T08:02:11.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-26T15:45:03.000000Z\\\",\\\"processed_by\\\":1,\\\"refund_amount\\\":null,\\\"booking\\\":{\\\"id\\\":19,\\\"user_id\\\":4,\\\"service_id\\\":1,\\\"booking_code\\\":\\\"AR-20251222-5MDF\\\",\\\"total_price\\\":\\\"700000.00\\\",\\\"status\\\":\\\"pending\\\",\\\"payment_status\\\":\\\"pending\\\",\\\"created_at\\\":\\\"2025-12-22T08:02:11.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-22T08:02:11.000000Z\\\",\\\"check_in\\\":\\\"2025-12-25T00:00:00.000000Z\\\",\\\"check_out\\\":\\\"2025-12-26T00:00:00.000000Z\\\",\\\"guest_count\\\":2,\\\"guest_info\\\":{\\\"name\\\":\\\"Hifzhedine Zahares Samto\\\",\\\"email\\\":\\\"hifzhedine8@student.uns.ac.id\\\"}}}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 08:45:03', '2025-12-26 08:45:03'),
(65, 1, 'update', 'Cancellation', 2, '\"{\\\"status\\\":\\\"rejected\\\"}\"', '\"{\\\"id\\\":2,\\\"booking_id\\\":19,\\\"user_id\\\":4,\\\"reason\\\":\\\"Perlu membatalkan karena jadwal berubah\\\",\\\"status\\\":\\\"rejected\\\",\\\"admin_note\\\":null,\\\"created_at\\\":\\\"2025-12-22T08:02:11.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-26T15:45:03.000000Z\\\",\\\"processed_by\\\":1,\\\"refund_amount\\\":null,\\\"booking\\\":{\\\"id\\\":19,\\\"user_id\\\":4,\\\"service_id\\\":1,\\\"booking_code\\\":\\\"AR-20251222-5MDF\\\",\\\"total_price\\\":\\\"700000.00\\\",\\\"status\\\":\\\"pending\\\",\\\"payment_status\\\":\\\"pending\\\",\\\"created_at\\\":\\\"2025-12-22T08:02:11.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-22T08:02:11.000000Z\\\",\\\"check_in\\\":\\\"2025-12-25T00:00:00.000000Z\\\",\\\"check_out\\\":\\\"2025-12-26T00:00:00.000000Z\\\",\\\"guest_count\\\":2,\\\"guest_info\\\":{\\\"name\\\":\\\"Hifzhedine Zahares Samto\\\",\\\"email\\\":\\\"hifzhedine8@student.uns.ac.id\\\"}}}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 08:45:03', '2025-12-26 08:45:03'),
(66, 7, 'update', 'Booking', 48, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 08:49:51', '2025-12-26 08:49:51'),
(67, 7, 'create', 'Cancellation', 14, NULL, '\"{\\\"booking_id\\\":48,\\\"reason\\\":\\\"malas\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-26T15:50:15.000000Z\\\",\\\"created_at\\\":\\\"2025-12-26T15:50:15.000000Z\\\",\\\"id\\\":14}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 08:50:15', '2025-12-26 08:50:15'),
(68, 1, 'update', 'Cancellation', 14, '\"{\\\"status\\\":\\\"requested\\\"}\"', '\"{\\\"id\\\":14,\\\"booking_id\\\":48,\\\"user_id\\\":null,\\\"reason\\\":\\\"malas\\\",\\\"status\\\":\\\"approved\\\",\\\"admin_note\\\":null,\\\"created_at\\\":\\\"2025-12-26T15:50:15.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-26T15:55:05.000000Z\\\",\\\"processed_by\\\":1,\\\"refund_amount\\\":\\\"2750000.00\\\",\\\"booking\\\":{\\\"id\\\":48,\\\"user_id\\\":7,\\\"service_id\\\":2,\\\"booking_code\\\":\\\"AR-20251226-TOTE\\\",\\\"total_price\\\":\\\"2750000.00\\\",\\\"status\\\":\\\"cancelled\\\",\\\"payment_status\\\":\\\"pending\\\",\\\"created_at\\\":\\\"2025-12-26T15:49:42.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-26T15:55:05.000000Z\\\",\\\"check_in\\\":\\\"2025-12-25T00:00:00.000000Z\\\",\\\"check_out\\\":\\\"2025-12-30T00:00:00.000000Z\\\",\\\"guest_count\\\":2,\\\"guest_info\\\":{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null}}}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 08:55:05', '2025-12-26 08:55:05'),
(69, 7, 'update', 'Booking', 59, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 17:59:09', '2025-12-26 17:59:09'),
(70, 7, 'update', 'Booking', 56, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 18:03:19', '2025-12-26 18:03:19'),
(71, 7, 'update', 'Booking', 60, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 18:04:12', '2025-12-26 18:04:12'),
(72, 7, 'update', 'Booking', 58, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 18:07:28', '2025-12-26 18:07:28'),
(73, 7, 'update', 'Booking', 61, '\"{\\\"status\\\":\\\"cancelled\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 18:10:23', '2025-12-26 18:10:23'),
(74, 7, 'update', 'Booking', 62, '\"{\\\"status\\\":\\\"cancelled\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 18:26:24', '2025-12-26 18:26:24'),
(75, 7, 'update', 'Booking', 49, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-26 18:27:05', '2025-12-26 18:27:05'),
(76, 7, 'update', 'Booking', 57, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-28 21:44:52', '2025-12-28 21:44:52'),
(77, 7, 'create', 'Cancellation', 15, NULL, '\"{\\\"booking_id\\\":57,\\\"reason\\\":\\\"malasbang\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-29T04:54:17.000000Z\\\",\\\"created_at\\\":\\\"2025-12-29T04:54:17.000000Z\\\",\\\"id\\\":15}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-28 21:54:18', '2025-12-28 21:54:18'),
(78, 7, 'update', 'Booking', 52, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-28 23:55:13', '2025-12-28 23:55:13'),
(79, 7, 'update', 'Booking', 53, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-28 23:57:41', '2025-12-28 23:57:41'),
(80, 7, 'create', 'Cancellation', 16, NULL, '\"{\\\"booking_id\\\":53,\\\"reason\\\":\\\"Karena salah pesan\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-29T07:16:09.000000Z\\\",\\\"created_at\\\":\\\"2025-12-29T07:16:09.000000Z\\\",\\\"id\\\":16}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 00:16:09', '2025-12-29 00:16:09'),
(81, 6, 'update', 'Booking', 63, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 00:21:40', '2025-12-29 00:21:40'),
(82, 1, 'create', 'Service', 31, NULL, '\"{\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"5\\\",\\\"price_per_night\\\":\\\"1500000\\\",\\\"description\\\":null,\\\"is_available\\\":\\\"1\\\",\\\"updated_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"created_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"id\\\":31}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 01:05:59', '2025-12-29 01:05:59'),
(83, 1, 'update', 'Service', 31, '\"{\\\"id\\\":31,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":5,\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"price_per_night\\\":\\\"1500000.00\\\"}\"', '\"{\\\"id\\\":31,\\\"type\\\":\\\"Executive Suite\\\",\\\"capacity\\\":\\\"5\\\",\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-29T08:09:54.000000Z\\\",\\\"is_available\\\":\\\"1\\\",\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"price_per_night\\\":\\\"1500000.00\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 01:09:54', '2025-12-29 01:09:54'),
(84, 1, 'update', 'Service', 31, '\"{\\\"id\\\":31,\\\"type\\\":\\\"Executive Suite\\\",\\\"capacity\\\":5,\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-29T08:09:54.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"price_per_night\\\":\\\"1500000.00\\\"}\"', '\"{\\\"id\\\":31,\\\"type\\\":\\\"Family Suite\\\",\\\"capacity\\\":\\\"5\\\",\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-29T08:10:17.000000Z\\\",\\\"is_available\\\":\\\"1\\\",\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"price_per_night\\\":\\\"1500000.00\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 01:10:17', '2025-12-29 01:10:17'),
(85, 1, 'update', 'Service', 31, '\"{\\\"id\\\":31,\\\"type\\\":\\\"Family Suite\\\",\\\"capacity\\\":5,\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-29T08:10:17.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"price_per_night\\\":\\\"1500000.00\\\"}\"', '\"{\\\"id\\\":31,\\\"type\\\":\\\"Family Suite\\\",\\\"capacity\\\":\\\"5\\\",\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-29T08:10:40.000000Z\\\",\\\"is_available\\\":\\\"1\\\",\\\"name\\\":\\\"Kamar  Tulip\\\",\\\"price_per_night\\\":\\\"1500000.00\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 01:10:40', '2025-12-29 01:10:40'),
(86, 1, 'update', 'Service', 31, '\"{\\\"id\\\":31,\\\"type\\\":\\\"Family Suite\\\",\\\"capacity\\\":5,\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-29T08:10:40.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"Kamar  Tulip\\\",\\\"price_per_night\\\":\\\"1500000.00\\\"}\"', '\"{\\\"id\\\":31,\\\"type\\\":\\\"Family Suite\\\",\\\"capacity\\\":\\\"5\\\",\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-29T08:05:59.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-29T08:23:25.000000Z\\\",\\\"is_available\\\":\\\"1\\\",\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"price_per_night\\\":\\\"1500000.00\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 01:23:25', '2025-12-29 01:23:25'),
(87, 7, 'update', 'Booking', 64, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 01:26:18', '2025-12-29 01:26:18'),
(88, 7, 'update', 'Booking', 65, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 01:27:43', '2025-12-29 01:27:43'),
(89, 7, 'update', 'Booking', 66, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:01:14', '2025-12-29 02:01:14'),
(90, 7, 'update', 'Booking', 67, '\"{\\\"status\\\":\\\"cancelled\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:04:38', '2025-12-29 02:04:38'),
(91, 1, 'create', 'Service', 32, NULL, '\"{\\\"name\\\":\\\"Kamar Tulip 900\\\",\\\"type\\\":\\\"Executive Suite\\\",\\\"capacity\\\":\\\"5\\\",\\\"price_per_night\\\":\\\"1234567890\\\",\\\"description\\\":\\\"iuytrewq\\\",\\\"is_available\\\":\\\"1\\\",\\\"updated_at\\\":\\\"2025-12-29T09:07:46.000000Z\\\",\\\"created_at\\\":\\\"2025-12-29T09:07:46.000000Z\\\",\\\"id\\\":32}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:07:46', '2025-12-29 02:07:46'),
(92, 1, 'create', 'Service', 33, NULL, '\"{\\\"name\\\":\\\"Fadhil\\\",\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"123\\\",\\\"price_per_night\\\":\\\"1234\\\",\\\"description\\\":\\\"qwertyui\\\",\\\"is_available\\\":\\\"0\\\",\\\"updated_at\\\":\\\"2025-12-29T09:08:07.000000Z\\\",\\\"created_at\\\":\\\"2025-12-29T09:08:07.000000Z\\\",\\\"id\\\":33}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:08:07', '2025-12-29 02:08:07'),
(93, 7, 'update', 'Booking', 68, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:09:43', '2025-12-29 02:09:43'),
(94, 7, 'create', 'Cancellation', 17, NULL, '\"{\\\"booking_id\\\":68,\\\"reason\\\":\\\"DFGDAFG\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-29T09:10:01.000000Z\\\",\\\"created_at\\\":\\\"2025-12-29T09:10:01.000000Z\\\",\\\"id\\\":17}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:10:01', '2025-12-29 02:10:01'),
(95, 7, 'update', 'Booking', 69, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:16:44', '2025-12-29 02:16:44'),
(96, 7, 'create', 'Cancellation', 18, NULL, '\"{\\\"booking_id\\\":69,\\\"reason\\\":\\\"aa\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-29T09:17:10.000000Z\\\",\\\"created_at\\\":\\\"2025-12-29T09:17:10.000000Z\\\",\\\"id\\\":18}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:17:10', '2025-12-29 02:17:10'),
(97, 7, 'update', 'Cancellation', 18, '\"{\\\"status\\\":\\\"rejected\\\",\\\"reason\\\":\\\"aa\\\"}\"', '\"{\\\"id\\\":18,\\\"booking_id\\\":69,\\\"user_id\\\":null,\\\"reason\\\":\\\"ada\\\",\\\"status\\\":\\\"requested\\\",\\\"admin_note\\\":null,\\\"created_at\\\":\\\"2025-12-29T09:17:10.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-29T09:17:53.000000Z\\\",\\\"processed_by\\\":null,\\\"refund_amount\\\":null}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:17:53', '2025-12-29 02:17:53'),
(98, 7, 'update', 'Booking', 70, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:19:26', '2025-12-29 02:19:26'),
(99, 7, 'update', 'Booking', 71, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:21:49', '2025-12-29 02:21:49'),
(100, 7, 'update', 'Booking', 72, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:22:45', '2025-12-29 02:22:45'),
(101, 7, 'update', 'Booking', 73, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:23:21', '2025-12-29 02:23:21'),
(102, 7, 'update', 'Booking', 74, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:33:06', '2025-12-29 02:33:06'),
(103, 7, 'update', 'Booking', 75, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:33:45', '2025-12-29 02:33:45'),
(104, 1, 'update', 'Booking', 66, '\"{\\\"status\\\":\\\"checked_in\\\"}\"', '\"{\\\"status\\\":\\\"pending\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:54:56', '2025-12-29 02:54:56'),
(105, 1, 'update', 'Booking', 66, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"checked_in\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 02:56:25', '2025-12-29 02:56:25'),
(106, 7, 'update', 'Booking', 76, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 03:12:53', '2025-12-29 03:12:53'),
(107, 7, 'update', 'Booking', 77, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 03:18:14', '2025-12-29 03:18:14'),
(108, 6, 'update', 'User', 6, '\"{\\\"name\\\":\\\"Fadhil\\\",\\\"email\\\":\\\"fadhil@gmail.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":null}\"', '\"{\\\"name\\\":\\\"Fadhil\\\",\\\"email\\\":\\\"fadhil@gmail.com\\\",\\\"phone\\\":\\\"087824584588\\\",\\\"profile_photo\\\":null}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 03:23:26', '2025-12-29 03:23:26'),
(109, 7, 'update', 'Booking', 78, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 03:30:02', '2025-12-29 03:30:02'),
(110, 7, 'update', 'User', 7, '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":null}\"', '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":\\\"profile-photos\\\\/JAfFF5PncCdHnVRhWXcWXxnXGOsHdTWI8XtOqErK.jpg\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 03:48:52', '2025-12-29 03:48:52'),
(111, 7, 'update', 'Booking', 79, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 20:49:39', '2025-12-29 20:49:39'),
(112, 7, 'update', 'User', 7, '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":\\\"profile-photos\\\\/JAfFF5PncCdHnVRhWXcWXxnXGOsHdTWI8XtOqErK.jpg\\\"}\"', '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":\\\"profile-photos\\\\/DsFj05khA7OjdqaBpXa9LDxRXjFHNWVX28wURBst.png\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 23:26:02', '2025-12-29 23:26:02'),
(113, 7, 'update', 'User', 7, '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":\\\"profile-photos\\\\/DsFj05khA7OjdqaBpXa9LDxRXjFHNWVX28wURBst.png\\\"}\"', '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":\\\"profile-photos\\\\/Cm2CDISs2BTktN5YlUzXda9CvLGFfhT2q7duUuAk.png\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 23:26:03', '2025-12-29 23:26:03'),
(114, 7, 'update', 'User', 7, '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":\\\"profile-photos\\\\/Cm2CDISs2BTktN5YlUzXda9CvLGFfhT2q7duUuAk.png\\\"}\"', '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":\\\"profile-photos\\\\/9VcM3KYBTqwlXzsv7UMq6j2kakHoxJPUNePLvKjF.png\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-29 23:26:29', '2025-12-29 23:26:29'),
(115, 7, 'update', 'Booking', 81, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 00:00:07', '2025-12-30 00:00:07'),
(116, 38, 'login', 'User', 38, NULL, '{\"login_at\": \"2025-11-10 14:35:53.000000\"}', '192.168.1.81', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-16 07:35:53', '2025-11-14 07:35:53'),
(117, 26, 'login', 'User', 26, NULL, '{\"login_at\": \"2025-12-15 14:35:53.000000\"}', '192.168.1.11', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-24 07:35:53', '2025-12-10 07:35:53'),
(118, 10, 'login', 'User', 10, NULL, '{\"login_at\": \"2025-12-30 14:35:53.000000\"}', '192.168.1.104', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-20 07:35:53', '2025-10-04 07:35:53'),
(119, 58, 'login', 'User', 58, NULL, '{\"login_at\": \"2025-10-18 14:35:53.000000\"}', '192.168.1.249', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-15 07:35:53', '2025-11-24 07:35:53'),
(120, 49, 'login', 'User', 49, NULL, '{\"login_at\": \"2025-10-14 14:35:53.000000\"}', '192.168.1.47', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-25 07:35:53', '2025-12-19 07:35:53'),
(121, 43, 'login', 'User', 43, NULL, '{\"login_at\": \"2025-12-14 14:35:53.000000\"}', '192.168.1.114', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-11 07:35:53', '2025-12-10 07:35:53'),
(122, 26, 'login', 'User', 26, NULL, '{\"login_at\": \"2025-11-05 14:35:53.000000\"}', '192.168.1.239', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-09 07:35:53', '2025-11-29 07:35:53'),
(123, 52, 'login', 'User', 52, NULL, '{\"login_at\": \"2025-11-19 14:35:53.000000\"}', '192.168.1.232', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-11 07:35:53', '2025-11-26 07:35:53'),
(124, 18, 'login', 'User', 18, NULL, '{\"login_at\": \"2025-10-10 14:35:53.000000\"}', '192.168.1.102', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-02 07:35:53', '2025-10-15 07:35:53'),
(125, NULL, 'login', 'User', 12, NULL, '{\"login_at\": \"2025-12-10 14:35:53.000000\"}', '192.168.1.18', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-10 07:35:53', '2025-10-17 07:35:53'),
(126, 9, 'login', 'User', 9, NULL, '{\"login_at\": \"2025-12-16 14:35:53.000000\"}', '192.168.1.219', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-12 07:35:53', '2025-11-11 07:35:53'),
(127, 11, 'login', 'User', 11, NULL, '{\"login_at\": \"2025-12-25 14:35:53.000000\"}', '192.168.1.165', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-27 07:35:53', '2025-10-29 07:35:53'),
(128, 7, 'login', 'User', 7, NULL, '{\"login_at\": \"2025-11-04 14:35:53.000000\"}', '192.168.1.194', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-15 07:35:53', '2025-11-28 07:35:53'),
(129, NULL, 'login', 'User', 46, NULL, '{\"login_at\": \"2025-11-07 14:35:53.000000\"}', '192.168.1.91', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-10 07:35:53', '2025-10-24 07:35:53'),
(130, 28, 'login', 'User', 28, NULL, '{\"login_at\": \"2025-10-18 14:35:53.000000\"}', '192.168.1.153', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-04 07:35:53', '2025-10-02 07:35:53'),
(131, 8, 'login', 'User', 8, NULL, '{\"login_at\": \"2025-12-20 14:35:53.000000\"}', '192.168.1.220', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-29 07:35:53', '2025-10-27 07:35:53'),
(132, 45, 'login', 'User', 45, NULL, '{\"login_at\": \"2025-11-25 14:35:53.000000\"}', '192.168.1.186', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-20 07:35:53', '2025-10-20 07:35:53'),
(133, 3, 'login', 'User', 3, NULL, '{\"login_at\": \"2025-12-13 14:35:53.000000\"}', '192.168.1.177', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-11 07:35:53', '2025-10-14 07:35:53'),
(134, 22, 'login', 'User', 22, NULL, '{\"login_at\": \"2025-12-19 14:35:53.000000\"}', '192.168.1.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-02 07:35:53', '2025-11-09 07:35:53'),
(135, 29, 'login', 'User', 29, NULL, '{\"login_at\": \"2025-12-10 14:35:53.000000\"}', '192.168.1.78', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-13 07:35:53', '2025-12-03 07:35:53'),
(136, 28, 'login', 'User', 28, NULL, '{\"login_at\": \"2025-11-29 14:35:53.000000\"}', '192.168.1.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-16 07:35:53', '2025-10-23 07:35:53'),
(137, 4, 'login', 'User', 4, NULL, '{\"login_at\": \"2025-10-30 14:35:53.000000\"}', '192.168.1.152', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-07 07:35:53', '2025-10-07 07:35:53'),
(138, 53, 'login', 'User', 53, NULL, '{\"login_at\": \"2025-11-02 14:35:53.000000\"}', '192.168.1.205', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-17 07:35:53', '2025-12-13 07:35:53'),
(139, 9, 'login', 'User', 9, NULL, '{\"login_at\": \"2025-11-24 14:35:53.000000\"}', '192.168.1.91', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-04 07:35:53', '2025-11-05 07:35:53'),
(140, 57, 'login', 'User', 57, NULL, '{\"login_at\": \"2025-10-29 14:35:53.000000\"}', '192.168.1.107', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-14 07:35:53', '2025-10-13 07:35:53'),
(141, 16, 'login', 'User', 16, NULL, '{\"login_at\": \"2025-11-19 14:35:53.000000\"}', '192.168.1.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-08 07:35:53', '2025-11-11 07:35:53'),
(142, 8, 'login', 'User', 8, NULL, '{\"login_at\": \"2025-11-24 14:35:53.000000\"}', '192.168.1.93', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-07 07:35:53', '2025-11-19 07:35:53'),
(143, 32, 'login', 'User', 32, NULL, '{\"login_at\": \"2025-12-25 14:35:53.000000\"}', '192.168.1.26', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-02 07:35:53', '2025-10-22 07:35:53'),
(144, 4, 'login', 'User', 4, NULL, '{\"login_at\": \"2025-12-29 14:35:53.000000\"}', '192.168.1.76', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-13 07:35:53', '2025-10-08 07:35:53'),
(145, 11, 'login', 'User', 11, NULL, '{\"login_at\": \"2025-11-22 14:35:53.000000\"}', '192.168.1.46', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-10 07:35:53', '2025-11-11 07:35:53'),
(146, 3, 'login', 'User', 3, NULL, '{\"login_at\": \"2025-11-18 14:35:53.000000\"}', '192.168.1.152', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-07 07:35:53', '2025-11-13 07:35:53'),
(147, 62, 'login', 'User', 62, NULL, '{\"login_at\": \"2025-12-04 14:35:53.000000\"}', '192.168.1.194', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-16 07:35:53', '2025-10-07 07:35:53'),
(148, 29, 'login', 'User', 29, NULL, '{\"login_at\": \"2025-10-05 14:35:53.000000\"}', '192.168.1.25', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-13 07:35:53', '2025-10-25 07:35:53'),
(149, 1, 'login', 'User', 1, NULL, '{\"login_at\": \"2025-10-10 14:35:53.000000\"}', '192.168.1.22', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-05 07:35:53', '2025-11-01 07:35:53'),
(150, 42, 'login', 'User', 42, NULL, '{\"login_at\": \"2025-10-09 14:35:53.000000\"}', '192.168.1.124', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-23 07:35:53', '2025-10-29 07:35:53'),
(151, 61, 'login', 'User', 61, NULL, '{\"login_at\": \"2025-10-30 14:35:53.000000\"}', '192.168.1.113', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-24 07:35:53', '2025-12-03 07:35:53'),
(152, 51, 'login', 'User', 51, NULL, '{\"login_at\": \"2025-11-17 14:35:53.000000\"}', '192.168.1.155', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-07 07:35:53', '2025-11-14 07:35:53'),
(153, 9, 'login', 'User', 9, NULL, '{\"login_at\": \"2025-10-08 14:35:53.000000\"}', '192.168.1.25', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-02 07:35:53', '2025-10-20 07:35:53'),
(154, 55, 'login', 'User', 55, NULL, '{\"login_at\": \"2025-10-29 14:35:53.000000\"}', '192.168.1.14', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-05 07:35:53', '2025-11-28 07:35:53'),
(155, 33, 'login', 'User', 33, NULL, '{\"login_at\": \"2025-12-24 14:35:53.000000\"}', '192.168.1.187', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-15 07:35:53', '2025-11-04 07:35:53'),
(156, 17, 'login', 'User', 17, NULL, '{\"login_at\": \"2025-11-27 14:35:53.000000\"}', '192.168.1.49', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-06 07:35:53', '2025-12-10 07:35:53'),
(157, 56, 'login', 'User', 56, NULL, '{\"login_at\": \"2025-11-09 14:35:53.000000\"}', '192.168.1.111', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-09 07:35:53', '2025-12-18 07:35:53'),
(158, 38, 'login', 'User', 38, NULL, '{\"login_at\": \"2025-12-18 14:35:53.000000\"}', '192.168.1.89', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-05 07:35:53', '2025-10-28 07:35:53'),
(159, 47, 'login', 'User', 47, NULL, '{\"login_at\": \"2025-12-02 14:35:53.000000\"}', '192.168.1.99', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-22 07:35:53', '2025-12-14 07:35:53'),
(160, 22, 'login', 'User', 22, NULL, '{\"login_at\": \"2025-12-01 14:35:53.000000\"}', '192.168.1.253', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-03 07:35:53', '2025-12-13 07:35:53'),
(161, 25, 'login', 'User', 25, NULL, '{\"login_at\": \"2025-10-10 14:35:53.000000\"}', '192.168.1.234', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-21 07:35:53', '2025-12-15 07:35:53'),
(162, 14, 'login', 'User', 14, NULL, '{\"login_at\": \"2025-12-21 14:35:53.000000\"}', '192.168.1.193', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-10 07:35:53', '2025-10-15 07:35:53'),
(163, 42, 'login', 'User', 42, NULL, '{\"login_at\": \"2025-10-27 14:35:53.000000\"}', '192.168.1.72', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-26 07:35:53', '2025-11-18 07:35:53'),
(164, 52, 'login', 'User', 52, NULL, '{\"login_at\": \"2025-11-03 14:35:53.000000\"}', '192.168.1.18', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-30 07:35:53', '2025-12-24 07:35:53'),
(165, NULL, 'login', 'User', 36, NULL, '{\"login_at\": \"2025-12-29 14:35:53.000000\"}', '192.168.1.242', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-08 07:35:53', '2025-12-13 07:35:53'),
(166, 6, 'login', 'User', 6, NULL, '{\"login_at\": \"2025-10-07 14:35:53.000000\"}', '192.168.1.87', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-02 07:35:53', '2025-11-23 07:35:53'),
(167, 7, 'login', 'User', 7, NULL, '{\"login_at\": \"2025-12-03 14:35:53.000000\"}', '192.168.1.55', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-14 07:35:53', '2025-11-26 07:35:53'),
(168, 48, 'login', 'User', 48, NULL, '{\"login_at\": \"2025-12-10 14:35:53.000000\"}', '192.168.1.205', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-25 07:35:53', '2025-12-30 07:35:53'),
(169, 49, 'login', 'User', 49, NULL, '{\"login_at\": \"2025-12-10 14:35:53.000000\"}', '192.168.1.155', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-30 07:35:53', '2025-10-03 07:35:53'),
(170, 27, 'login', 'User', 27, NULL, '{\"login_at\": \"2025-11-10 14:35:53.000000\"}', '192.168.1.224', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-15 07:35:53', '2025-12-13 07:35:53'),
(171, 24, 'login', 'User', 24, NULL, '{\"login_at\": \"2025-12-13 14:35:53.000000\"}', '192.168.1.103', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-23 07:35:53', '2025-12-13 07:35:53'),
(172, 35, 'login', 'User', 35, NULL, '{\"login_at\": \"2025-12-25 14:35:53.000000\"}', '192.168.1.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-12 07:35:53', '2025-11-14 07:35:53'),
(173, 37, 'login', 'User', 37, NULL, '{\"login_at\": \"2025-11-07 14:35:53.000000\"}', '192.168.1.177', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-11 07:35:53', '2025-10-31 07:35:53'),
(174, 54, 'login', 'User', 54, NULL, '{\"login_at\": \"2025-12-22 14:35:53.000000\"}', '192.168.1.101', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-07 07:35:53', '2025-12-28 07:35:53'),
(175, 18, 'login', 'User', 18, NULL, '{\"login_at\": \"2025-10-03 14:35:53.000000\"}', '192.168.1.249', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-04 07:35:53', '2025-10-10 07:35:53'),
(176, 56, 'login', 'User', 56, NULL, '{\"login_at\": \"2025-11-18 14:35:53.000000\"}', '192.168.1.19', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-17 07:35:53', '2025-12-03 07:35:53'),
(177, 58, 'login', 'User', 58, NULL, '{\"login_at\": \"2025-11-25 14:35:53.000000\"}', '192.168.1.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-14 07:35:53', '2025-10-27 07:35:53'),
(178, 48, 'login', 'User', 48, NULL, '{\"login_at\": \"2025-12-09 14:35:53.000000\"}', '192.168.1.161', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-02 07:35:53', '2025-10-16 07:35:53'),
(179, 43, 'login', 'User', 43, NULL, '{\"login_at\": \"2025-11-05 14:35:53.000000\"}', '192.168.1.28', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-24 07:35:53', '2025-10-12 07:35:53'),
(180, 11, 'login', 'User', 11, NULL, '{\"login_at\": \"2025-11-02 14:35:53.000000\"}', '192.168.1.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-31 07:35:53', '2025-11-21 07:35:53'),
(181, 17, 'login', 'User', 17, NULL, '{\"login_at\": \"2025-11-03 14:35:53.000000\"}', '192.168.1.234', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-22 07:35:53', '2025-12-11 07:35:53'),
(182, 16, 'login', 'User', 16, NULL, '{\"login_at\": \"2025-10-23 14:35:53.000000\"}', '192.168.1.191', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-12 07:35:53', '2025-11-24 07:35:53'),
(183, 20, 'login', 'User', 20, NULL, '{\"login_at\": \"2025-12-05 14:35:53.000000\"}', '192.168.1.218', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-14 07:35:53', '2025-11-20 07:35:53'),
(184, 23, 'login', 'User', 23, NULL, '{\"login_at\": \"2025-11-24 14:35:53.000000\"}', '192.168.1.21', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-20 07:35:53', '2025-10-23 07:35:53'),
(185, 7, 'login', 'User', 7, NULL, '{\"login_at\": \"2025-10-15 14:35:53.000000\"}', '192.168.1.146', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-15 07:35:53', '2025-10-05 07:35:53'),
(186, 1, 'login', 'User', 1, NULL, '{\"login_at\": \"2025-12-27 14:35:53.000000\"}', '192.168.1.105', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-07 07:35:53', '2025-11-06 07:35:53'),
(187, 52, 'login', 'User', 52, NULL, '{\"login_at\": \"2025-11-06 14:35:53.000000\"}', '192.168.1.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-20 07:35:53', '2025-11-24 07:35:53'),
(188, 31, 'login', 'User', 31, NULL, '{\"login_at\": \"2025-11-07 14:35:53.000000\"}', '192.168.1.85', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-02 07:35:53', '2025-12-16 07:35:53'),
(189, 44, 'login', 'User', 44, NULL, '{\"login_at\": \"2025-12-22 14:35:53.000000\"}', '192.168.1.9', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-29 07:35:53', '2025-11-16 07:35:53'),
(190, NULL, 'login', 'User', 30, NULL, '{\"login_at\": \"2025-12-27 14:35:53.000000\"}', '192.168.1.159', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-30 07:35:53', '2025-11-08 07:35:53'),
(191, 55, 'login', 'User', 55, NULL, '{\"login_at\": \"2025-11-09 14:35:53.000000\"}', '192.168.1.187', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-31 07:35:53', '2025-11-03 07:35:53'),
(192, 60, 'login', 'User', 60, NULL, '{\"login_at\": \"2025-11-16 14:35:53.000000\"}', '192.168.1.84', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-15 07:35:53', '2025-12-29 07:35:53'),
(193, 44, 'login', 'User', 44, NULL, '{\"login_at\": \"2025-11-26 14:35:53.000000\"}', '192.168.1.131', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-25 07:35:53', '2025-10-20 07:35:53'),
(194, 16, 'login', 'User', 16, NULL, '{\"login_at\": \"2025-10-06 14:35:53.000000\"}', '192.168.1.212', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-08 07:35:53', '2025-11-27 07:35:53'),
(195, 33, 'login', 'User', 33, NULL, '{\"login_at\": \"2025-12-02 14:35:53.000000\"}', '192.168.1.79', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-31 07:35:53', '2025-11-25 07:35:53'),
(196, 62, 'login', 'User', 62, NULL, '{\"login_at\": \"2025-11-17 14:35:53.000000\"}', '192.168.1.240', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-10 07:35:53', '2025-11-27 07:35:53'),
(197, 37, 'login', 'User', 37, NULL, '{\"login_at\": \"2025-10-22 14:35:53.000000\"}', '192.168.1.205', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-20 07:35:53', '2025-10-08 07:35:53'),
(198, 27, 'login', 'User', 27, NULL, '{\"login_at\": \"2025-11-08 14:35:53.000000\"}', '192.168.1.146', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-12 07:35:53', '2025-12-05 07:35:53'),
(199, 49, 'login', 'User', 49, NULL, '{\"login_at\": \"2025-11-16 14:35:53.000000\"}', '192.168.1.193', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-11 07:35:53', '2025-11-08 07:35:53'),
(200, 59, 'login', 'User', 59, NULL, '{\"login_at\": \"2025-12-17 14:35:53.000000\"}', '192.168.1.125', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-05 07:35:53', '2025-10-05 07:35:53'),
(201, 23, 'login', 'User', 23, NULL, '{\"login_at\": \"2025-12-04 14:35:53.000000\"}', '192.168.1.184', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-01 07:35:53', '2025-10-27 07:35:53'),
(202, 34, 'login', 'User', 34, NULL, '{\"login_at\": \"2025-12-22 14:35:53.000000\"}', '192.168.1.22', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-13 07:35:53', '2025-10-29 07:35:53'),
(203, 35, 'login', 'User', 35, NULL, '{\"login_at\": \"2025-10-31 14:35:53.000000\"}', '192.168.1.207', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-08 07:35:53', '2025-11-05 07:35:53'),
(204, 8, 'login', 'User', 8, NULL, '{\"login_at\": \"2025-11-13 14:35:53.000000\"}', '192.168.1.252', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-30 07:35:53', '2025-10-17 07:35:53'),
(205, 10, 'login', 'User', 10, NULL, '{\"login_at\": \"2025-10-17 14:35:53.000000\"}', '192.168.1.114', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-22 07:35:53', '2025-11-27 07:35:53'),
(206, 20, 'login', 'User', 20, NULL, '{\"login_at\": \"2025-11-04 14:35:53.000000\"}', '192.168.1.105', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-11 07:35:53', '2025-11-06 07:35:53'),
(207, 27, 'login', 'User', 27, NULL, '{\"login_at\": \"2025-10-18 14:35:53.000000\"}', '192.168.1.218', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-13 07:35:53', '2025-12-15 07:35:53'),
(208, 43, 'login', 'User', 43, NULL, '{\"login_at\": \"2025-11-26 14:35:53.000000\"}', '192.168.1.197', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-07 07:35:53', '2025-10-18 07:35:53'),
(209, 32, 'login', 'User', 32, NULL, '{\"login_at\": \"2025-10-17 14:35:53.000000\"}', '192.168.1.16', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-06 07:35:53', '2025-12-08 07:35:53'),
(210, 39, 'login', 'User', 39, NULL, '{\"login_at\": \"2025-12-26 14:35:53.000000\"}', '192.168.1.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-21 07:35:53', '2025-11-26 07:35:53'),
(211, 39, 'login', 'User', 39, NULL, '{\"login_at\": \"2025-10-24 14:35:53.000000\"}', '192.168.1.219', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-15 07:35:53', '2025-11-06 07:35:53'),
(212, 58, 'login', 'User', 58, NULL, '{\"login_at\": \"2025-12-11 14:35:53.000000\"}', '192.168.1.90', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-27 07:35:53', '2025-11-11 07:35:53'),
(213, 61, 'login', 'User', 61, NULL, '{\"login_at\": \"2025-10-16 14:35:53.000000\"}', '192.168.1.123', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-24 07:35:53', '2025-12-08 07:35:53'),
(214, 42, 'login', 'User', 42, NULL, '{\"login_at\": \"2025-12-24 14:35:53.000000\"}', '192.168.1.33', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-04 07:35:53', '2025-11-04 07:35:53'),
(215, NULL, 'login', 'User', 36, NULL, '{\"login_at\": \"2025-12-05 14:35:53.000000\"}', '192.168.1.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-30 07:35:53', '2025-11-09 07:35:53'),
(216, 53, 'login', 'User', 53, NULL, '{\"login_at\": \"2025-11-09 14:35:53.000000\"}', '192.168.1.112', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-13 07:35:53', '2025-10-06 07:35:53'),
(217, 1, 'login', 'User', 1, NULL, '{\"login_at\": \"2025-12-08 14:35:53.000000\"}', '192.168.1.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-15 07:35:53', '2025-10-22 07:35:53'),
(218, 14, 'login', 'User', 14, NULL, '{\"login_at\": \"2025-11-24 14:35:53.000000\"}', '192.168.1.54', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-23 07:35:53', '2025-10-16 07:35:53'),
(219, 45, 'login', 'User', 45, NULL, '{\"login_at\": \"2025-11-28 14:35:53.000000\"}', '192.168.1.103', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-07 07:35:53', '2025-10-11 07:35:53'),
(220, 60, 'login', 'User', 60, NULL, '{\"login_at\": \"2025-12-19 14:35:53.000000\"}', '192.168.1.194', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-27 07:35:53', '2025-11-20 07:35:53'),
(221, 6, 'login', 'User', 6, NULL, '{\"login_at\": \"2025-10-02 14:35:53.000000\"}', '192.168.1.189', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-24 07:35:53', '2025-10-22 07:35:53'),
(222, 54, 'login', 'User', 54, NULL, '{\"login_at\": \"2025-12-04 14:35:53.000000\"}', '192.168.1.52', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-15 07:35:53', '2025-11-27 07:35:53'),
(223, 47, 'login', 'User', 47, NULL, '{\"login_at\": \"2025-11-26 14:35:53.000000\"}', '192.168.1.211', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-24 07:35:53', '2025-10-12 07:35:53'),
(224, 15, 'login', 'User', 15, NULL, '{\"login_at\": \"2025-11-26 14:35:53.000000\"}', '192.168.1.212', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-21 07:35:53', '2025-12-30 07:35:53'),
(225, 47, 'login', 'User', 47, NULL, '{\"login_at\": \"2025-12-17 14:35:53.000000\"}', '192.168.1.251', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-23 07:35:53', '2025-11-27 07:35:53'),
(226, 18, 'login', 'User', 18, NULL, '{\"login_at\": \"2025-11-02 14:35:53.000000\"}', '192.168.1.73', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-26 07:35:53', '2025-10-04 07:35:53'),
(227, 23, 'login', 'User', 23, NULL, '{\"login_at\": \"2025-11-07 14:35:53.000000\"}', '192.168.1.224', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-01 07:35:53', '2025-10-14 07:35:53'),
(228, 6, 'login', 'User', 6, NULL, '{\"login_at\": \"2025-10-18 14:35:53.000000\"}', '192.168.1.185', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-12 07:35:53', '2025-10-03 07:35:53');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `model_type`, `model_id`, `old_values`, `new_values`, `ip_address`, `user_agent`, `meta`, `created_at`, `updated_at`) VALUES
(229, 62, 'login', 'User', 62, NULL, '{\"login_at\": \"2025-12-05 14:35:53.000000\"}', '192.168.1.58', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-28 07:35:53', '2025-10-28 07:35:53'),
(230, 44, 'login', 'User', 44, NULL, '{\"login_at\": \"2025-11-15 14:35:53.000000\"}', '192.168.1.121', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-23 07:35:53', '2025-10-08 07:35:53'),
(231, 13, 'login', 'User', 13, NULL, '{\"login_at\": \"2025-12-13 14:35:53.000000\"}', '192.168.1.158', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-18 07:35:53', '2025-12-23 07:35:53'),
(232, 54, 'login', 'User', 54, NULL, '{\"login_at\": \"2025-12-23 14:35:53.000000\"}', '192.168.1.152', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-04 07:35:53', '2025-10-11 07:35:53'),
(233, 38, 'login', 'User', 38, NULL, '{\"login_at\": \"2025-11-10 14:35:53.000000\"}', '192.168.1.24', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-14 07:35:53', '2025-10-09 07:35:53'),
(234, 20, 'login', 'User', 20, NULL, '{\"login_at\": \"2025-11-22 14:35:53.000000\"}', '192.168.1.222', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-12 07:35:53', '2025-11-25 07:35:53'),
(235, 34, 'login', 'User', 34, NULL, '{\"login_at\": \"2025-11-07 14:35:53.000000\"}', '192.168.1.186', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-18 07:35:53', '2025-12-07 07:35:53'),
(236, 37, 'login', 'User', 37, NULL, '{\"login_at\": \"2025-10-03 14:35:53.000000\"}', '192.168.1.103', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-31 07:35:53', '2025-11-22 07:35:53'),
(237, 53, 'login', 'User', 53, NULL, '{\"login_at\": \"2025-12-13 14:35:53.000000\"}', '192.168.1.65', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-12 07:35:53', '2025-11-22 07:35:53'),
(238, 57, 'login', 'User', 57, NULL, '{\"login_at\": \"2025-10-09 14:35:53.000000\"}', '192.168.1.154', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-22 07:35:53', '2025-12-23 07:35:53'),
(239, 24, 'login', 'User', 24, NULL, '{\"login_at\": \"2025-10-09 14:35:53.000000\"}', '192.168.1.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-14 07:35:53', '2025-10-14 07:35:53'),
(240, 25, 'login', 'User', 25, NULL, '{\"login_at\": \"2025-10-10 14:35:53.000000\"}', '192.168.1.3', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-18 07:35:53', '2025-11-04 07:35:53'),
(241, 50, 'login', 'User', 50, NULL, '{\"login_at\": \"2025-10-08 14:35:53.000000\"}', '192.168.1.158', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-20 07:35:53', '2025-12-15 07:35:53'),
(242, 10, 'login', 'User', 10, NULL, '{\"login_at\": \"2025-11-25 14:35:53.000000\"}', '192.168.1.182', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-18 07:35:53', '2025-10-11 07:35:53'),
(243, 31, 'login', 'User', 31, NULL, '{\"login_at\": \"2025-11-05 14:35:53.000000\"}', '192.168.1.195', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-19 07:35:53', '2025-12-17 07:35:53'),
(244, 45, 'login', 'User', 45, NULL, '{\"login_at\": \"2025-11-23 14:35:53.000000\"}', '192.168.1.32', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-29 07:35:53', '2025-12-09 07:35:53'),
(245, 21, 'login', 'User', 21, NULL, '{\"login_at\": \"2025-10-23 14:35:53.000000\"}', '192.168.1.203', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-22 07:35:53', '2025-10-16 07:35:53'),
(246, 15, 'login', 'User', 15, NULL, '{\"login_at\": \"2025-12-02 14:35:53.000000\"}', '192.168.1.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-22 07:35:53', '2025-12-12 07:35:53'),
(247, 25, 'login', 'User', 25, NULL, '{\"login_at\": \"2025-12-09 14:35:53.000000\"}', '192.168.1.230', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-16 07:35:53', '2025-10-25 07:35:53'),
(248, 26, 'login', 'User', 26, NULL, '{\"login_at\": \"2025-10-04 14:35:53.000000\"}', '192.168.1.16', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-01 07:35:53', '2025-11-24 07:35:53'),
(249, NULL, 'login', 'User', 30, NULL, '{\"login_at\": \"2025-11-19 14:35:53.000000\"}', '192.168.1.145', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-08 07:35:53', '2025-11-10 07:35:53'),
(250, 15, 'login', 'User', 15, NULL, '{\"login_at\": \"2025-11-04 14:35:53.000000\"}', '192.168.1.153', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-02 07:35:53', '2025-10-28 07:35:53'),
(251, 48, 'login', 'User', 48, NULL, '{\"login_at\": \"2025-11-16 14:35:53.000000\"}', '192.168.1.249', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-10 07:35:53', '2025-12-03 07:35:53'),
(252, 59, 'login', 'User', 59, NULL, '{\"login_at\": \"2025-12-17 14:35:53.000000\"}', '192.168.1.28', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-23 07:35:53', '2025-11-03 07:35:53'),
(253, 57, 'login', 'User', 57, NULL, '{\"login_at\": \"2025-11-07 14:35:53.000000\"}', '192.168.1.102', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-22 07:35:53', '2025-12-25 07:35:53'),
(254, 17, 'login', 'User', 17, NULL, '{\"login_at\": \"2025-11-04 14:35:53.000000\"}', '192.168.1.105', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-09 07:35:53', '2025-11-01 07:35:53'),
(255, 51, 'login', 'User', 51, NULL, '{\"login_at\": \"2025-12-17 14:35:53.000000\"}', '192.168.1.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-13 07:35:53', '2025-11-16 07:35:53'),
(256, 14, 'login', 'User', 14, NULL, '{\"login_at\": \"2025-10-30 14:35:53.000000\"}', '192.168.1.59', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-28 07:35:53', '2025-11-18 07:35:53'),
(257, NULL, 'login', 'User', 36, NULL, '{\"login_at\": \"2025-11-09 14:35:53.000000\"}', '192.168.1.105', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-04 07:35:53', '2025-11-22 07:35:53'),
(258, 3, 'login', 'User', 3, NULL, '{\"login_at\": \"2025-10-23 14:35:53.000000\"}', '192.168.1.168', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-15 07:35:53', '2025-10-08 07:35:53'),
(259, 13, 'login', 'User', 13, NULL, '{\"login_at\": \"2025-11-13 14:35:53.000000\"}', '192.168.1.207', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-15 07:35:53', '2025-12-03 07:35:53'),
(260, 24, 'login', 'User', 24, NULL, '{\"login_at\": \"2025-12-12 14:35:53.000000\"}', '192.168.1.191', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-20 07:35:53', '2025-12-01 07:35:53'),
(261, 34, 'login', 'User', 34, NULL, '{\"login_at\": \"2025-10-12 14:35:53.000000\"}', '192.168.1.124', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-07 07:35:53', '2025-12-26 07:35:53'),
(262, NULL, 'login', 'User', 12, NULL, '{\"login_at\": \"2025-11-17 14:35:53.000000\"}', '192.168.1.207', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-04 07:35:53', '2025-11-25 07:35:53'),
(263, 39, 'login', 'User', 39, NULL, '{\"login_at\": \"2025-11-04 14:35:53.000000\"}', '192.168.1.164', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-10 07:35:53', '2025-12-09 07:35:53'),
(264, NULL, 'login', 'User', 30, NULL, '{\"login_at\": \"2025-10-28 14:35:53.000000\"}', '192.168.1.171', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-14 07:35:53', '2025-11-18 07:35:53'),
(265, 32, 'login', 'User', 32, NULL, '{\"login_at\": \"2025-10-06 14:35:53.000000\"}', '192.168.1.31', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-24 07:35:53', '2025-12-18 07:35:53'),
(266, 60, 'login', 'User', 60, NULL, '{\"login_at\": \"2025-12-06 14:35:53.000000\"}', '192.168.1.100', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-12 07:35:53', '2025-12-12 07:35:53'),
(267, 22, 'login', 'User', 22, NULL, '{\"login_at\": \"2025-12-14 14:35:53.000000\"}', '192.168.1.197', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-09 07:35:53', '2025-12-03 07:35:53'),
(268, 50, 'login', 'User', 50, NULL, '{\"login_at\": \"2025-12-20 14:35:53.000000\"}', '192.168.1.144', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-11 07:35:53', '2025-12-19 07:35:53'),
(269, 51, 'login', 'User', 51, NULL, '{\"login_at\": \"2025-11-01 14:35:53.000000\"}', '192.168.1.20', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-26 07:35:53', '2025-12-07 07:35:53'),
(270, 59, 'login', 'User', 59, NULL, '{\"login_at\": \"2025-11-01 14:35:53.000000\"}', '192.168.1.173', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-09 07:35:53', '2025-12-10 07:35:53'),
(271, 4, 'login', 'User', 4, NULL, '{\"login_at\": \"2025-12-25 14:35:53.000000\"}', '192.168.1.194', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-30 07:35:53', '2025-10-17 07:35:53'),
(272, NULL, 'login', 'User', 46, NULL, '{\"login_at\": \"2025-11-04 14:35:53.000000\"}', '192.168.1.123', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-28 07:35:53', '2025-11-05 07:35:53'),
(273, 21, 'login', 'User', 21, NULL, '{\"login_at\": \"2025-10-13 14:35:53.000000\"}', '192.168.1.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-06 07:35:53', '2025-12-18 07:35:53'),
(274, 29, 'login', 'User', 29, NULL, '{\"login_at\": \"2025-10-02 14:35:53.000000\"}', '192.168.1.193', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-31 07:35:53', '2025-11-26 07:35:53'),
(275, 31, 'login', 'User', 31, NULL, '{\"login_at\": \"2025-11-17 14:35:53.000000\"}', '192.168.1.220', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-18 07:35:53', '2025-11-03 07:35:53'),
(276, NULL, 'login', 'User', 46, NULL, '{\"login_at\": \"2025-10-18 14:35:53.000000\"}', '192.168.1.238', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-04 07:35:53', '2025-10-03 07:35:53'),
(277, NULL, 'login', 'User', 12, NULL, '{\"login_at\": \"2025-11-21 14:35:53.000000\"}', '192.168.1.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-22 07:35:53', '2025-10-17 07:35:53'),
(278, 55, 'login', 'User', 55, NULL, '{\"login_at\": \"2025-10-30 14:35:53.000000\"}', '192.168.1.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-06 07:35:53', '2025-12-03 07:35:53'),
(279, 50, 'login', 'User', 50, NULL, '{\"login_at\": \"2025-12-10 14:35:53.000000\"}', '192.168.1.108', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-13 07:35:53', '2025-10-31 07:35:53'),
(280, 33, 'login', 'User', 33, NULL, '{\"login_at\": \"2025-12-05 14:35:53.000000\"}', '192.168.1.162', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-13 07:35:53', '2025-10-24 07:35:53'),
(281, 35, 'login', 'User', 35, NULL, '{\"login_at\": \"2025-10-28 14:35:53.000000\"}', '192.168.1.83', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-12 07:35:53', '2025-11-10 07:35:53'),
(282, 56, 'login', 'User', 56, NULL, '{\"login_at\": \"2025-11-13 14:35:53.000000\"}', '192.168.1.126', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-17 07:35:53', '2025-12-17 07:35:53'),
(283, 61, 'login', 'User', 61, NULL, '{\"login_at\": \"2025-10-06 14:35:53.000000\"}', '192.168.1.46', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-12 07:35:53', '2025-12-16 07:35:53'),
(284, 21, 'login', 'User', 21, NULL, '{\"login_at\": \"2025-11-14 14:35:53.000000\"}', '192.168.1.76', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-10-28 07:35:53', '2025-10-04 07:35:53'),
(285, 28, 'login', 'User', 28, NULL, '{\"login_at\": \"2025-10-09 14:35:53.000000\"}', '192.168.1.198', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-12-06 07:35:53', '2025-11-09 07:35:53'),
(286, 13, 'login', 'User', 13, NULL, '{\"login_at\": \"2025-10-26 14:35:53.000000\"}', '192.168.1.189', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', NULL, '2025-11-25 07:35:53', '2025-10-19 07:35:53'),
(371, 7, 'create_booking', 'Booking', 80, NULL, '{\"code\": \"AR-20251230-Y1QK\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-29 23:59:26', '2025-12-29 23:59:26'),
(372, 7, 'create_booking', 'Booking', 81, NULL, '{\"code\": \"AR-20251230-WDW2\", \"amount\": 6650000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-30 00:00:01', '2025-12-30 00:00:01'),
(373, 26, 'create_booking', 'Booking', 82, NULL, '{\"code\": \"BK-2bbd03e9\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-02 07:35:53', '2025-10-02 07:35:53'),
(374, 7, 'create_booking', 'Booking', 83, NULL, '{\"code\": \"BK-2bbbdfa1\", \"amount\": 1050000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-12 07:35:53', '2025-12-12 07:35:53'),
(375, 16, 'create_booking', 'Booking', 84, NULL, '{\"code\": \"BK-2bbb3da7\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-10 07:35:53', '2025-10-10 07:35:53'),
(376, 24, 'create_booking', 'Booking', 85, NULL, '{\"code\": \"BK-2bbcee1b\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-03 07:35:53', '2025-12-03 07:35:53'),
(377, 11, 'create_booking', 'Booking', 86, NULL, '{\"code\": \"BK-2bbbf51f\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-01 07:35:53', '2025-11-01 07:35:53'),
(378, 23, 'create_booking', 'Booking', 87, NULL, '{\"code\": \"BK-2bbb7f4f\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-30 07:35:53', '2025-10-30 07:35:53'),
(379, 9, 'create_booking', 'Booking', 88, NULL, '{\"code\": \"BK-2bbbbc8b\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-11 07:35:53', '2025-12-11 07:35:53'),
(380, 47, 'create_booking', 'Booking', 89, NULL, '{\"code\": \"BK-2bbc668b\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-24 07:35:53', '2025-11-24 07:35:53'),
(381, 55, 'create_booking', 'Booking', 90, NULL, '{\"code\": \"BK-2bbbaf93\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-17 07:35:53', '2025-11-17 07:35:53'),
(382, 9, 'create_booking', 'Booking', 91, NULL, '{\"code\": \"BK-2bbce46b\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-17 07:35:53', '2025-11-17 07:35:53'),
(383, 22, 'create_booking', 'Booking', 92, NULL, '{\"code\": \"BK-2bbc2f93\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-07 07:35:53', '2025-12-07 07:35:53'),
(384, 53, 'create_booking', 'Booking', 93, NULL, '{\"code\": \"BK-2bbbd2a7\", \"amount\": 1050000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-05 07:35:53', '2025-11-05 07:35:53'),
(385, 9, 'create_booking', 'Booking', 94, NULL, '{\"code\": \"BK-2bbc872e\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-21 07:35:53', '2025-11-21 07:35:53'),
(386, 34, 'create_booking', 'Booking', 95, NULL, '{\"code\": \"BK-2bbcd756\", \"amount\": 4650000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-01 07:35:53', '2025-10-01 07:35:53'),
(387, 13, 'create_booking', 'Booking', 96, NULL, '{\"code\": \"BK-2bbc10be\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-18 07:35:53', '2025-11-18 07:35:53'),
(388, 11, 'create_booking', 'Booking', 97, NULL, '{\"code\": \"BK-2bbc19d8\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-25 07:35:53', '2025-10-25 07:35:53'),
(389, 32, 'create_booking', 'Booking', 98, NULL, '{\"code\": \"BK-2bbb8c72\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-13 07:35:53', '2025-11-13 07:35:53'),
(390, 23, 'create_booking', 'Booking', 99, NULL, '{\"code\": \"BK-2bbcf277\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-27 07:35:53', '2025-12-27 07:35:53'),
(391, 37, 'create_booking', 'Booking', 100, NULL, '{\"code\": \"BK-2bbb68bd\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-06 07:35:53', '2025-11-06 07:35:53'),
(392, 24, 'create_booking', 'Booking', 101, NULL, '{\"code\": \"BK-2bbba6ec\", \"amount\": 1050000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-14 07:35:53', '2025-12-14 07:35:53'),
(393, 25, 'create_booking', 'Booking', 102, NULL, '{\"code\": \"BK-2bbcb892\", \"amount\": 3150000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-12 07:35:53', '2025-10-12 07:35:53'),
(394, 20, 'create_booking', 'Booking', 103, NULL, '{\"code\": \"BK-2bbcab9b\", \"amount\": 1050000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-18 07:35:53', '2025-10-18 07:35:53'),
(395, 45, 'create_booking', 'Booking', 104, NULL, '{\"code\": \"BK-2bbb525a\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-22 07:35:53', '2025-10-22 07:35:53'),
(396, 37, 'create_booking', 'Booking', 105, NULL, '{\"code\": \"BK-2bbc82a7\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-18 07:35:53', '2025-12-18 07:35:53'),
(397, 43, 'create_booking', 'Booking', 106, NULL, '{\"code\": \"BK-2bbc26ea\", \"amount\": 11400000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-07 07:35:53', '2025-10-07 07:35:53'),
(398, 20, 'create_booking', 'Booking', 107, NULL, '{\"code\": \"BK-2bbc7466\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-01 07:35:53', '2025-10-01 07:35:53'),
(399, 16, 'create_booking', 'Booking', 108, NULL, '{\"code\": \"BK-2bbb9e16\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-26 07:35:53', '2025-12-26 07:35:53'),
(400, 45, 'create_booking', 'Booking', 109, NULL, '{\"code\": \"BK-2bbbd6f8\", \"amount\": 3150000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-28 07:35:53', '2025-10-28 07:35:53'),
(401, 25, 'create_booking', 'Booking', 110, NULL, '{\"code\": \"BK-2bbb83ac\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-16 07:35:53', '2025-12-16 07:35:53'),
(402, 29, 'create_booking', 'Booking', 111, NULL, '{\"code\": \"BK-2bbc52dc\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-11 07:35:53', '2025-10-11 07:35:53'),
(403, 23, 'create_booking', 'Booking', 112, NULL, '{\"code\": \"BK-2bbb6d1c\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-26 07:35:53', '2025-10-26 07:35:53'),
(404, 58, 'create_booking', 'Booking', 113, NULL, '{\"code\": \"BK-2bbbc9f9\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-17 07:35:53', '2025-10-17 07:35:53'),
(405, 11, 'create_booking', 'Booking', 114, NULL, '{\"code\": \"BK-2bbca73a\", \"amount\": 3150000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-28 07:35:53', '2025-12-28 07:35:53'),
(406, NULL, 'create_booking', 'Booking', 115, NULL, '{\"code\": \"BK-2bbc57d1\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-16 07:35:53', '2025-11-16 07:35:53'),
(407, 17, 'create_booking', 'Booking', 116, NULL, '{\"code\": \"BK-2bbb5b82\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-25 07:35:53', '2025-10-25 07:35:53'),
(408, NULL, 'create_booking', 'Booking', 117, NULL, '{\"code\": \"BK-2bbb7174\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-14 07:35:53', '2025-12-14 07:35:53'),
(409, 34, 'create_booking', 'Booking', 118, NULL, '{\"code\": \"BK-2bbc2b41\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-24 07:35:53', '2025-11-24 07:35:53'),
(410, 26, 'create_booking', 'Booking', 119, NULL, '{\"code\": \"BK-2bbc7d32\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-26 07:35:53', '2025-10-26 07:35:53'),
(411, 23, 'create_booking', 'Booking', 120, NULL, '{\"code\": \"BK-2bbb7677\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-19 07:35:53', '2025-10-19 07:35:53'),
(412, 60, 'create_booking', 'Booking', 121, NULL, '{\"code\": \"BK-2bbb7aec\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-24 07:35:53', '2025-11-24 07:35:53'),
(413, 33, 'create_booking', 'Booking', 122, NULL, '{\"code\": \"BK-2bbcc187\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-01 07:35:53', '2025-11-01 07:35:53'),
(414, 42, 'create_booking', 'Booking', 123, NULL, '{\"code\": \"BK-2bbbb3e6\", \"amount\": 3150000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-05 07:35:53', '2025-12-05 07:35:53'),
(415, 37, 'create_booking', 'Booking', 124, NULL, '{\"code\": \"BK-2bbb6451\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-01 07:35:53', '2025-10-01 07:35:53'),
(416, 33, 'create_booking', 'Booking', 125, NULL, '{\"code\": \"BK-2bbb5fef\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-28 07:35:53', '2025-10-28 07:35:53'),
(417, 15, 'create_booking', 'Booking', 126, NULL, '{\"code\": \"BK-2bbcb446\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-21 07:35:53', '2025-10-21 07:35:53'),
(418, 25, 'create_booking', 'Booking', 127, NULL, '{\"code\": \"BK-2bbcf6ce\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-07 07:35:53', '2025-10-07 07:35:53'),
(419, 7, 'create_booking', 'Booking', 128, NULL, '{\"code\": \"BK-2bbb56f7\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-06 07:35:53', '2025-12-06 07:35:53'),
(420, 52, 'create_booking', 'Booking', 129, NULL, '{\"code\": \"BK-2bbc6f69\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-03 07:35:53', '2025-10-03 07:35:53'),
(421, 14, 'create_booking', 'Booking', 130, NULL, '{\"code\": \"BK-2bbd0c8c\", \"amount\": 11400000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-12 07:35:53', '2025-11-12 07:35:53'),
(422, 38, 'create_booking', 'Booking', 131, NULL, '{\"code\": \"BK-2bbc1573\", \"amount\": 8550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-04 07:35:53', '2025-10-04 07:35:53'),
(423, 11, 'create_booking', 'Booking', 132, NULL, '{\"code\": \"BK-2bbbe84b\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-31 07:35:53', '2025-10-31 07:35:53'),
(424, 25, 'create_booking', 'Booking', 133, NULL, '{\"code\": \"BK-2bbbc0e4\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-22 07:35:53', '2025-10-22 07:35:53'),
(425, 26, 'create_booking', 'Booking', 134, NULL, '{\"code\": \"BK-2bbbfeb8\", \"amount\": 3100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-06 07:35:53', '2025-10-06 07:35:53'),
(426, 20, 'create_booking', 'Booking', 135, NULL, '{\"code\": \"BK-2bbb9523\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-18 07:35:53', '2025-12-18 07:35:53'),
(427, 9, 'create_booking', 'Booking', 136, NULL, '{\"code\": \"BK-2bbbb839\", \"amount\": 1050000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-14 07:35:53', '2025-11-14 07:35:53'),
(428, 37, 'create_booking', 'Booking', 137, NULL, '{\"code\": \"BK-2bbc8b92\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-18 07:35:53', '2025-12-18 07:35:53'),
(429, 53, 'create_booking', 'Booking', 138, NULL, '{\"code\": \"BK-2bbc615b\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-04 07:35:53', '2025-12-04 07:35:53'),
(430, 8, 'create_booking', 'Booking', 139, NULL, '{\"code\": \"BK-2bbc2292\", \"amount\": 3800000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-11 07:35:53', '2025-12-11 07:35:53'),
(431, 57, 'create_booking', 'Booking', 140, NULL, '{\"code\": \"BK-2bbc1e31\", \"amount\": 5700000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-06 07:35:53', '2025-12-06 07:35:53'),
(432, 60, 'create_booking', 'Booking', 141, NULL, '{\"code\": \"BK-2bbcd2f3\", \"amount\": 3100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-14 07:35:53', '2025-11-14 07:35:53'),
(433, 32, 'create_booking', 'Booking', 142, NULL, '{\"code\": \"BK-2bbba292\", \"amount\": 3150000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-20 07:35:53', '2025-11-20 07:35:53'),
(434, 35, 'create_booking', 'Booking', 143, NULL, '{\"code\": \"BK-2bbd1143\", \"amount\": 11400000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-02 07:35:53', '2025-11-02 07:35:53'),
(435, 38, 'create_booking', 'Booking', 144, NULL, '{\"code\": \"BK-2bbc0c3c\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-03 07:35:53', '2025-11-03 07:35:53'),
(436, 55, 'create_booking', 'Booking', 145, NULL, '{\"code\": \"BK-2bbb9978\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-14 07:35:53', '2025-11-14 07:35:53'),
(437, 17, 'create_booking', 'Booking', 146, NULL, '{\"code\": \"BK-2bbcce9d\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-17 07:35:53', '2025-12-17 07:35:53'),
(438, NULL, 'create_booking', 'Booking', 147, NULL, '{\"code\": \"BK-2bbc33e7\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-05 07:35:53', '2025-10-05 07:35:53'),
(439, 35, 'create_booking', 'Booking', 148, NULL, '{\"code\": \"BK-2bbc78d5\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-26 07:35:53', '2025-11-26 07:35:53'),
(440, 10, 'create_booking', 'Booking', 149, NULL, '{\"code\": \"BK-2bbb4d34\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-18 07:35:53', '2025-11-18 07:35:53'),
(441, 28, 'create_booking', 'Booking', 150, NULL, '{\"code\": \"BK-2bbb8810\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-29 07:35:53', '2025-11-29 07:35:53'),
(442, 43, 'create_booking', 'Booking', 151, NULL, '{\"code\": \"BK-2bbcca45\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-30 07:35:53', '2025-11-30 07:35:53'),
(443, 25, 'create_booking', 'Booking', 152, NULL, '{\"code\": \"BK-2bbcfb28\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-02 07:35:53', '2025-10-02 07:35:53'),
(444, 8, 'create_booking', 'Booking', 153, NULL, '{\"code\": \"BK-2bbca2db\", \"amount\": 3150000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-22 07:35:53', '2025-10-22 07:35:53'),
(445, 6, 'create_booking', 'Booking', 154, NULL, '{\"code\": \"BK-2bbcafed\", \"amount\": 3150000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-09 07:35:53', '2025-12-09 07:35:53'),
(446, 10, 'create_booking', 'Booking', 155, NULL, '{\"code\": \"BK-2bbc4e2e\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-21 07:35:53', '2025-10-21 07:35:53'),
(447, 42, 'create_booking', 'Booking', 156, NULL, '{\"code\": \"BK-2bbc3f6f\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-16 07:35:53', '2025-10-16 07:35:53'),
(448, NULL, 'create_booking', 'Booking', 157, NULL, '{\"code\": \"BK-2bbc9e56\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-22 07:35:53', '2025-10-22 07:35:53'),
(449, 7, 'create_booking', 'Booking', 158, NULL, '{\"code\": \"BK-2bbbf02c\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-30 07:35:53', '2025-10-30 07:35:53'),
(450, 15, 'create_booking', 'Booking', 159, NULL, '{\"code\": \"BK-2bbce025\", \"amount\": 3100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-09-29 07:35:53', '2025-09-29 07:35:53'),
(451, 60, 'create_booking', 'Booking', 160, NULL, '{\"code\": \"BK-2bbbdb4a\", \"amount\": 1050000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-13 07:35:53', '2025-10-13 07:35:53'),
(452, 37, 'create_booking', 'Booking', 161, NULL, '{\"code\": \"BK-2bbc07d9\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-22 07:35:53', '2025-10-22 07:35:53'),
(453, NULL, 'create_booking', 'Booking', 162, NULL, '{\"code\": \"BK-2bbd0839\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-15 07:35:53', '2025-11-15 07:35:53'),
(454, 6, 'create_booking', 'Booking', 163, NULL, '{\"code\": \"BK-2bbc8ff5\", \"amount\": 1050000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-22 07:35:53', '2025-10-22 07:35:53'),
(455, 38, 'create_booking', 'Booking', 164, NULL, '{\"code\": \"BK-2bbcff96\", \"amount\": 8550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-03 07:35:53', '2025-10-03 07:35:53'),
(456, 22, 'create_booking', 'Booking', 165, NULL, '{\"code\": \"BK-2bbbab3f\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-03 07:35:53', '2025-12-03 07:35:53'),
(457, 4, 'create_booking', 'Booking', 166, NULL, '{\"code\": \"BK-2bbc47ce\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-22 07:35:53', '2025-10-22 07:35:53'),
(458, 45, 'create_booking', 'Booking', 167, NULL, '{\"code\": \"BK-2bbc0383\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-19 07:35:53', '2025-12-19 07:35:53'),
(459, 10, 'create_booking', 'Booking', 168, NULL, '{\"code\": \"BK-2bbc5c2a\", \"amount\": 1900000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-09-28 07:35:53', '2025-09-28 07:35:53'),
(460, 53, 'create_booking', 'Booking', 169, NULL, '{\"code\": \"BK-2bbcbcea\", \"amount\": 3150000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-24 07:35:53', '2025-12-24 07:35:53'),
(461, 42, 'create_booking', 'Booking', 170, NULL, '{\"code\": \"BK-2bbc3833\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-22 07:35:53', '2025-10-22 07:35:53'),
(462, 13, 'create_booking', 'Booking', 171, NULL, '{\"code\": \"BK-2bbcc5f0\", \"amount\": 3150000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-28 07:35:53', '2025-11-28 07:35:53'),
(463, 27, 'create_booking', 'Booking', 172, NULL, '{\"code\": \"BK-2bbbce51\", \"amount\": 1050000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-14 07:35:53', '2025-10-14 07:35:53'),
(464, NULL, 'create_booking', 'Booking', 173, NULL, '{\"code\": \"BK-2bbcdbcf\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-11 07:35:53', '2025-12-11 07:35:53'),
(465, 52, 'create_booking', 'Booking', 174, NULL, '{\"code\": \"BK-2bbce99c\", \"amount\": 3100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-07 07:35:53', '2025-12-07 07:35:53'),
(466, 53, 'create_booking', 'Booking', 175, NULL, '{\"code\": \"BK-2bbbc581\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-29 07:35:53', '2025-10-29 07:35:53'),
(467, 26, 'create_booking', 'Booking', 176, NULL, '{\"code\": \"BK-2bbc6b0b\", \"amount\": 950000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-11 07:35:53', '2025-10-11 07:35:53'),
(468, 21, 'create_booking', 'Booking', 177, NULL, '{\"code\": \"BK-2bbb90cb\", \"amount\": 2850000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-09 07:35:53', '2025-11-09 07:35:53'),
(469, 11, 'create_booking', 'Booking', 178, NULL, '{\"code\": \"BK-2bbc98f8\", \"amount\": 2100000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-11-09 07:35:53', '2025-11-09 07:35:53'),
(470, 60, 'create_booking', 'Booking', 179, NULL, '{\"code\": \"BK-2bbc9451\", \"amount\": 1050000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-16 07:35:53', '2025-10-16 07:35:53'),
(471, 23, 'create_booking', 'Booking', 180, NULL, '{\"code\": \"BK-2bbbe3f1\", \"amount\": 1550000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-12-02 07:35:53', '2025-12-02 07:35:53'),
(472, 32, 'create_booking', 'Booking', 181, NULL, '{\"code\": \"BK-2bbbfa0a\", \"amount\": 4650000.00}', '10.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', NULL, '2025-10-06 07:35:53', '2025-10-06 07:35:53'),
(498, 7, 'create', 'Cancellation', 26, NULL, '\"{\\\"booking_id\\\":81,\\\"reason\\\":\\\"coba\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-30T07:42:20.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T07:42:20.000000Z\\\",\\\"id\\\":26}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 00:42:20', '2025-12-30 00:42:20'),
(499, 7, 'update', 'Booking', 210, '\"{\\\"status\\\":\\\"cancelled\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 00:43:06', '2025-12-30 00:43:06'),
(500, 7, 'update', 'Booking', 211, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 00:44:12', '2025-12-30 00:44:12'),
(501, 7, 'update', 'Booking', 213, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 00:45:12', '2025-12-30 00:45:12'),
(502, 7, 'update', 'Booking', 214, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 00:45:49', '2025-12-30 00:45:49'),
(503, 53, 'payment_success', 'Transaction', 215, NULL, '{\"amount\": 3100000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-08 07:57:58', '2025-11-08 07:57:58'),
(504, 53, 'payment_success', 'Transaction', 216, NULL, '{\"amount\": 3150000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-08 07:57:58', '2025-11-08 07:57:58'),
(505, 53, 'payment_success', 'Transaction', 217, NULL, '{\"amount\": 3100000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-12-04 07:57:58', '2025-12-04 07:57:58'),
(506, 54, 'payment_success', 'Transaction', 218, NULL, '{\"amount\": 6200000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-11 07:57:58', '2025-11-11 07:57:58'),
(507, 59, 'payment_success', 'Transaction', 219, NULL, '{\"amount\": 3150000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-12 07:57:58', '2025-11-12 07:57:58'),
(508, 55, 'payment_success', 'Transaction', 220, NULL, '{\"amount\": 1900000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-16 07:57:58', '2025-11-16 07:57:58'),
(509, 57, 'payment_success', 'Transaction', 221, NULL, '{\"amount\": 11400000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-12-13 07:57:58', '2025-12-13 07:57:58'),
(510, 53, 'payment_success', 'Transaction', 222, NULL, '{\"amount\": 4650000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-01 07:57:58', '2025-11-01 07:57:58'),
(511, 54, 'payment_success', 'Transaction', 223, NULL, '{\"amount\": 3800000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-18 07:57:58', '2025-11-18 07:57:58'),
(512, 57, 'payment_success', 'Transaction', 224, NULL, '{\"amount\": 2100000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-07 07:57:58', '2025-11-07 07:57:58'),
(513, 60, 'payment_success', 'Transaction', 225, NULL, '{\"amount\": 4650000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-29 07:57:58', '2025-11-29 07:57:58'),
(514, 58, 'payment_success', 'Transaction', 226, NULL, '{\"amount\": 4650000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-25 07:57:58', '2025-11-25 07:57:58'),
(515, 57, 'payment_success', 'Transaction', 227, NULL, '{\"amount\": 3800000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-03 07:57:58', '2025-11-03 07:57:58'),
(516, 51, 'payment_success', 'Transaction', 228, NULL, '{\"amount\": 4650000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-28 07:57:58', '2025-11-28 07:57:58'),
(517, 52, 'payment_success', 'Transaction', 229, NULL, '{\"amount\": 7600000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-10-31 07:57:58', '2025-10-31 07:57:58'),
(518, 58, 'payment_success', 'Transaction', 230, NULL, '{\"amount\": 3800000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-04 07:57:58', '2025-11-04 07:57:58'),
(519, 58, 'payment_success', 'Transaction', 231, NULL, '{\"amount\": 3150000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-01 07:57:58', '2025-11-01 07:57:58'),
(520, 57, 'payment_success', 'Transaction', 232, NULL, '{\"amount\": 3150000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-12-09 07:57:58', '2025-12-09 07:57:58'),
(521, 55, 'payment_success', 'Transaction', 233, NULL, '{\"amount\": 4200000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-27 07:57:58', '2025-11-27 07:57:58'),
(522, 54, 'payment_success', 'Transaction', 234, NULL, '{\"amount\": 3800000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-30 07:57:58', '2025-11-30 07:57:58'),
(523, 58, 'payment_success', 'Transaction', 235, NULL, '{\"amount\": 11400000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-23 07:57:58', '2025-11-23 07:57:58'),
(524, 55, 'payment_success', 'Transaction', 236, NULL, '{\"amount\": 2100000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-29 07:57:58', '2025-11-29 07:57:58'),
(525, 53, 'payment_success', 'Transaction', 237, NULL, '{\"amount\": 2100000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-12-10 07:57:58', '2025-12-10 07:57:58'),
(526, 60, 'payment_success', 'Transaction', 238, NULL, '{\"amount\": 3800000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-12 07:57:58', '2025-11-12 07:57:58'),
(527, 56, 'payment_success', 'Transaction', 239, NULL, '{\"amount\": 1900000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-12-09 07:57:58', '2025-12-09 07:57:58'),
(528, 53, 'payment_success', 'Transaction', 240, NULL, '{\"amount\": 3800000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-12-04 07:57:58', '2025-12-04 07:57:58'),
(529, 51, 'payment_success', 'Transaction', 241, NULL, '{\"amount\": 6200000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-11-17 07:57:58', '2025-11-17 07:57:58'),
(530, 52, 'payment_success', 'Transaction', 242, NULL, '{\"amount\": 3800000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-12-01 07:57:58', '2025-12-01 07:57:58'),
(531, 55, 'payment_success', 'Transaction', 243, NULL, '{\"amount\": 2850000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-10-27 07:57:58', '2025-10-27 07:57:58'),
(532, 54, 'payment_success', 'Transaction', 244, NULL, '{\"amount\": 2100000.00, \"status\": \"paid\"}', '10.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X)', NULL, '2025-10-30 07:57:58', '2025-10-30 07:57:58'),
(534, 7, 'update', 'Booking', 308, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 01:14:06', '2025-12-30 01:14:06'),
(535, 7, 'update', 'Booking', 309, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 01:18:39', '2025-12-30 01:18:39'),
(536, 7, 'update', 'Booking', 310, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 01:23:36', '2025-12-30 01:23:36'),
(537, 7, 'create', 'Cancellation', 27, NULL, '\"{\\\"booking_id\\\":310,\\\"reason\\\":\\\"Jadwal saya padat, mendadak ada acara lain\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-30T08:45:49.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T08:45:49.000000Z\\\",\\\"id\\\":27}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 01:45:49', '2025-12-30 01:45:49'),
(538, 7, 'update', 'User', 7, '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":\\\"profile-photos\\\\/9VcM3KYBTqwlXzsv7UMq6j2kakHoxJPUNePLvKjF.png\\\"}\"', '\"{\\\"name\\\":\\\"user\\\",\\\"email\\\":\\\"user@example.com\\\",\\\"phone\\\":\\\"087824584588\\\",\\\"profile_photo\\\":\\\"profile-photos\\\\/5szIIVzymJqgo18gM5udjaTZCkGcsQ8RZgnxCEnS.jpg\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 02:02:18', '2025-12-30 02:02:18'),
(539, 1, 'update', 'Booking', 310, '\"{\\\"status\\\":\\\"booked\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 02:35:35', '2025-12-30 02:35:35'),
(540, 7, 'update', 'Booking', 311, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 02:41:51', '2025-12-30 02:41:51'),
(541, 7, 'create', 'Cancellation', 28, NULL, '\"{\\\"booking_id\\\":311,\\\"reason\\\":\\\"Saya mengajukan pembatalan reservasi dikarenakan ada keperluan lain yang mendadak dan tidak bisa ditinggalkan\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-30T09:42:44.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T09:42:44.000000Z\\\",\\\"id\\\":28}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 02:42:44', '2025-12-30 02:42:44'),
(542, 1, 'update', 'Booking', 311, '\"{\\\"status\\\":\\\"booked\\\"}\"', '\"{\\\"status\\\":\\\"cancelled\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 02:47:15', '2025-12-30 02:47:15'),
(543, 1, 'create', 'Service', 184, NULL, '\"{\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"9\\\",\\\"price_per_night\\\":\\\"909090\\\",\\\"description\\\":\\\"hihihi\\\",\\\"is_available\\\":\\\"1\\\",\\\"updated_at\\\":\\\"2025-12-30T09:57:47.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T09:57:47.000000Z\\\",\\\"id\\\":184}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 02:57:47', '2025-12-30 02:57:47'),
(544, 1, 'create', 'Service', 185, NULL, '\"{\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"9\\\",\\\"price_per_night\\\":\\\"909090\\\",\\\"description\\\":\\\"hihihi\\\",\\\"is_available\\\":\\\"1\\\",\\\"updated_at\\\":\\\"2025-12-30T10:02:08.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T10:02:08.000000Z\\\",\\\"id\\\":185}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:02:09', '2025-12-30 03:02:09'),
(545, 66, 'update', 'Booking', 312, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:34:02', '2025-12-30 03:34:02'),
(546, 66, 'update', 'Booking', 313, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:34:34', '2025-12-30 03:34:34'),
(547, 66, 'create', 'Cancellation', 29, NULL, '\"{\\\"booking_id\\\":313,\\\"reason\\\":\\\"iseng hehee\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-30T10:35:18.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T10:35:18.000000Z\\\",\\\"id\\\":29}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:35:18', '2025-12-30 03:35:18'),
(548, 66, 'update', 'User', 66, '\"{\\\"name\\\":\\\"Fadhil1\\\",\\\"email\\\":\\\"fadhil1@gmail.com\\\",\\\"phone\\\":null,\\\"profile_photo\\\":null}\"', '\"{\\\"name\\\":\\\"Fadhil1\\\",\\\"email\\\":\\\"fadhil1@gmail.com\\\",\\\"phone\\\":\\\"087824584500\\\",\\\"profile_photo\\\":\\\"profile-photos\\\\/tp2la48zwOkAWP0kNEti5oDMbkbspuoLuGQSEeJE.jpg\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:36:09', '2025-12-30 03:36:09'),
(549, 1, 'update', 'Service', 84, '\"{\\\"id\\\":84,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":2,\\\"description\\\":\\\"Kamar nyaman seluas 24m\\\\u00b2 dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.\\\",\\\"created_at\\\":\\\"2025-12-30T11:09:54.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T11:09:54.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"101\\\",\\\"price_per_night\\\":\\\"950000.00\\\"}\"', '\"{\\\"id\\\":84,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"2\\\",\\\"description\\\":\\\"Kamar nyaman seluas 24m\\\\u00b2 dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.\\\",\\\"created_at\\\":\\\"2025-12-30T11:09:54.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:38:01.000000Z\\\",\\\"is_available\\\":\\\"1\\\",\\\"name\\\":\\\"1011\\\",\\\"price_per_night\\\":\\\"950000.00\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:38:02', '2025-12-30 03:38:02');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `model_type`, `model_id`, `old_values`, `new_values`, `ip_address`, `user_agent`, `meta`, `created_at`, `updated_at`) VALUES
(550, 1, 'update', 'Service', 84, '\"{\\\"id\\\":84,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":2,\\\"description\\\":\\\"Kamar nyaman seluas 24m\\\\u00b2 dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.\\\",\\\"created_at\\\":\\\"2025-12-30T11:09:54.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:38:01.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"1011\\\",\\\"price_per_night\\\":\\\"950000.00\\\"}\"', '\"{\\\"id\\\":84,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"2\\\",\\\"description\\\":\\\"Kamar nyaman seluas 24m\\\\u00b2 dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.\\\",\\\"created_at\\\":\\\"2025-12-30T11:09:54.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:38:14.000000Z\\\",\\\"is_available\\\":\\\"1\\\",\\\"name\\\":\\\"101\\\",\\\"price_per_night\\\":\\\"950000.00\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:38:14', '2025-12-30 03:38:14'),
(551, 1, 'create', 'Service', 186, NULL, '\"{\\\"name\\\":\\\"user\\\",\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"9\\\",\\\"price_per_night\\\":\\\"9\\\",\\\"description\\\":null,\\\"is_available\\\":\\\"1\\\",\\\"updated_at\\\":\\\"2025-12-30T10:38:33.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T10:38:33.000000Z\\\",\\\"id\\\":186}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:38:33', '2025-12-30 03:38:33'),
(552, 1, 'delete', 'Service', 186, '\"{\\\"id\\\":186,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":9,\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-30T10:38:33.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:38:33.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"user\\\",\\\"price_per_night\\\":\\\"9.00\\\"}\"', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:38:59', '2025-12-30 03:38:59'),
(553, 1, 'create', 'Service', 187, NULL, '\"{\\\"name\\\":\\\"user\\\",\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"8\\\",\\\"price_per_night\\\":\\\"9\\\",\\\"description\\\":null,\\\"is_available\\\":\\\"1\\\",\\\"updated_at\\\":\\\"2025-12-30T10:39:46.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T10:39:46.000000Z\\\",\\\"id\\\":187}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:39:46', '2025-12-30 03:39:46'),
(554, 1, 'delete', 'Service', 187, '\"{\\\"id\\\":187,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":8,\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-30T10:39:46.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:39:46.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"user\\\",\\\"price_per_night\\\":\\\"9.00\\\"}\"', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:40:07', '2025-12-30 03:40:07'),
(555, 1, 'update', 'Booking', 313, '\"{\\\"status\\\":\\\"booked\\\"}\"', '\"{\\\"status\\\":\\\"cancelled\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:40:33', '2025-12-30 03:40:33'),
(556, 1, 'delete', 'Service', 184, '\"{\\\"id\\\":184,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":9,\\\"description\\\":\\\"hihihi\\\",\\\"created_at\\\":\\\"2025-12-30T09:57:47.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T09:57:47.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"price_per_night\\\":\\\"909090.00\\\"}\"', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:42:29', '2025-12-30 03:42:29'),
(557, 1, 'update', 'Service', 185, '\"{\\\"id\\\":185,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":9,\\\"description\\\":\\\"hihihi\\\",\\\"created_at\\\":\\\"2025-12-30T10:02:08.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:02:08.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"Kamar  Tulip 969\\\",\\\"price_per_night\\\":\\\"909090.00\\\"}\"', '\"{\\\"id\\\":185,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"9\\\",\\\"description\\\":\\\"hihihi\\\",\\\"created_at\\\":\\\"2025-12-30T10:02:08.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:45:27.000000Z\\\",\\\"is_available\\\":\\\"1\\\",\\\"name\\\":\\\"Kamar  Tulip 9696\\\",\\\"price_per_night\\\":\\\"909090.00\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:45:27', '2025-12-30 03:45:27'),
(558, 1, 'create', 'Service', 188, NULL, '\"{\\\"name\\\":\\\"user\\\",\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"1\\\",\\\"price_per_night\\\":\\\"1\\\",\\\"description\\\":\\\"1\\\",\\\"is_available\\\":\\\"1\\\",\\\"updated_at\\\":\\\"2025-12-30T10:49:33.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T10:49:33.000000Z\\\",\\\"id\\\":188}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:49:33', '2025-12-30 03:49:33'),
(559, 7, 'update', 'Booking', 314, '\"{\\\"status\\\":\\\"pending\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:51:18', '2025-12-30 03:51:18'),
(560, 7, 'create', 'Cancellation', 30, NULL, '\"{\\\"booking_id\\\":314,\\\"reason\\\":\\\"p\\\",\\\"status\\\":\\\"requested\\\",\\\"updated_at\\\":\\\"2025-12-30T10:51:25.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T10:51:25.000000Z\\\",\\\"id\\\":30}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:51:25', '2025-12-30 03:51:25'),
(561, 1, 'update', 'Booking', 314, '\"{\\\"status\\\":\\\"booked\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:51:53', '2025-12-30 03:51:53'),
(562, 1, 'delete', 'Service', 188, '\"{\\\"id\\\":188,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":1,\\\"description\\\":\\\"1\\\",\\\"created_at\\\":\\\"2025-12-30T10:49:33.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:49:33.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"user\\\",\\\"price_per_night\\\":\\\"1.00\\\"}\"', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:52:25', '2025-12-30 03:52:25'),
(563, 1, 'create', 'Service', 189, NULL, '\"{\\\"name\\\":\\\"user\\\",\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"4\\\",\\\"price_per_night\\\":\\\"4\\\",\\\"description\\\":null,\\\"is_available\\\":\\\"1\\\",\\\"updated_at\\\":\\\"2025-12-30T10:56:52.000000Z\\\",\\\"created_at\\\":\\\"2025-12-30T10:56:52.000000Z\\\",\\\"id\\\":189}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:56:52', '2025-12-30 03:56:52'),
(564, 1, 'delete', 'Service', 189, '\"{\\\"id\\\":189,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":4,\\\"description\\\":null,\\\"created_at\\\":\\\"2025-12-30T10:56:52.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:56:52.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"user\\\",\\\"price_per_night\\\":\\\"4.00\\\"}\"', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:57:02', '2025-12-30 03:57:02'),
(565, 7, 'update', 'Cancellation', 30, '\"{\\\"status\\\":\\\"rejected\\\",\\\"reason\\\":\\\"p\\\"}\"', '\"{\\\"id\\\":30,\\\"booking_id\\\":314,\\\"user_id\\\":null,\\\"reason\\\":\\\"halah\\\",\\\"status\\\":\\\"requested\\\",\\\"admin_note\\\":null,\\\"created_at\\\":\\\"2025-12-30T10:51:25.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:57:42.000000Z\\\",\\\"processed_by\\\":null,\\\"refund_amount\\\":null}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:57:42', '2025-12-30 03:57:42'),
(566, 1, 'update', 'Booking', 314, '\"{\\\"status\\\":\\\"booked\\\"}\"', '\"{\\\"status\\\":\\\"booked\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 03:58:00', '2025-12-30 03:58:00'),
(567, 1, 'update', 'Service', 84, '\"{\\\"id\\\":84,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":2,\\\"description\\\":\\\"Kamar nyaman seluas 24m\\\\u00b2 dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.\\\",\\\"created_at\\\":\\\"2025-12-30T11:09:54.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T10:38:14.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"101\\\",\\\"price_per_night\\\":\\\"950000.00\\\"}\"', '\"{\\\"id\\\":84,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"3\\\",\\\"description\\\":\\\"Kamar nyaman seluas 24m\\\\u00b2 dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.\\\",\\\"created_at\\\":\\\"2025-12-30T11:09:54.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T11:02:33.000000Z\\\",\\\"is_available\\\":\\\"1\\\",\\\"name\\\":\\\"101\\\",\\\"price_per_night\\\":\\\"950000.00\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 04:02:33', '2025-12-30 04:02:33'),
(568, 1, 'update', 'Service', 84, '\"{\\\"id\\\":84,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":3,\\\"description\\\":\\\"Kamar nyaman seluas 24m\\\\u00b2 dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.\\\",\\\"created_at\\\":\\\"2025-12-30T11:09:54.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T11:02:33.000000Z\\\",\\\"is_available\\\":1,\\\"name\\\":\\\"101\\\",\\\"price_per_night\\\":\\\"950000.00\\\"}\"', '\"{\\\"id\\\":84,\\\"type\\\":\\\"Standard Room\\\",\\\"capacity\\\":\\\"2\\\",\\\"description\\\":\\\"Kamar nyaman seluas 24m\\\\u00b2 dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.\\\",\\\"created_at\\\":\\\"2025-12-30T11:09:54.000000Z\\\",\\\"updated_at\\\":\\\"2025-12-30T11:02:40.000000Z\\\",\\\"is_available\\\":\\\"1\\\",\\\"name\\\":\\\"101\\\",\\\"price_per_night\\\":\\\"950000.00\\\"}\"', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, '2025-12-30 04:02:40', '2025-12-30 04:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `excerpt`, `body`, `author_id`, `published_at`, `featured_image`, `created_at`, `updated_at`) VALUES
(3, 'Seni Packing Ringkas: Liburan Gaya Tanpa Beban Berlebih', 'seni-packing-ringkas-liburan-gaya-tanpa-beban-berlebih', 'Membawa banyak barang seringkali justru merepotkan. Simak strategi capsule wardrobe dan teknik packing cerdas agar koper Anda tetap ringan namun tetap stylish.', 'Apakah Anda sering merasa koper terlalu penuh padahal liburan hanya berlangsung tiga hari? Kunci utama dari light packing bukanlah sekadar mengurangi jumlah baju, melainkan menerapkan konsep capsule wardrobe. Pilihlah pakaian dengan palet warna senada (misalnya putih, krem, atau denim) yang bisa dipadu-padankan (mix and match). Dengan membawa tiga atasan dan dua bawahan yang serasi, Anda sudah memiliki enam kombinasi gaya yang berbeda tanpa harus membawa satu lemari.\r\n\r\nSelain pemilihan warna, teknik melipat juga sangat menentukan. Cobalah teknik menggulung pakaian ala militer (ranger roll) alih-alih melipat tumpuk biasa. Teknik ini tidak hanya menghemat ruang koper hingga 30%, tetapi juga menjaga pakaian agar tidak mudah kusut saat dikeluarkan. Manfaatkan juga ruang kosong di dalam sepatu untuk menyimpan kaus kaki atau botol toiletries kecil agar tidak ada ruang yang terbuang sia-sia.\r\n\r\nTerakhir, belajarlah untuk tega meninggalkan barang \"jaga-jaga\". Jaket tebal yang belum tentu dipakai atau tiga pasang sepatu seringkali hanya menjadi beban. Ingat, hotel kami menyediakan layanan laundry dan perlengkapan mandi lengkap. Bepergian dengan ringkas akan membuat mobilitas Anda lebih lancar, mulai dari bandara hingga tiba di lobi hotel kami. Liburan ringan, pikiran pun tenang.', 4, '2025-12-21 00:55:30', 'blog-posts/dymnYonOtBwFPMAFdMJdQIf1xxrNcPMyy1w4yM31.jpg', '2025-12-22 00:55:30', '2025-12-26 08:18:04'),
(4, '4 Cara Menikmati Staycation Agar Benar-Benar Healing', '4-cara-menikmati-staycation-agar-benar-benar-healing', 'Jangan biarkan staycation Anda berlalu begitu saja. Ikuti panduan ini untuk memaksimalkan waktu istirahat dan memulihkan energi secara total di hotel.', 'Di tengah hiruk-pikuk rutinitas, staycation sering menjadi pelarian singkat yang paling masuk akal. Namun, seringkali kita justru memindahkan pekerjaan ke kamar hotel. Aturan pertama untuk staycation berkualitas adalah: Lakukan detoks digital. Matikan notifikasi email pekerjaan begitu Anda check-in. Biarkan diri Anda menikmati suasana kamar yang sejuk dan kasur empuk berkualitas premium tanpa gangguan dering telepon kantor.\r\n\r\nManfaatkan fasilitas hotel yang sering terlewatkan. Bangunlah sedikit lebih pagi untuk berenang saat kolam masih sepi dan udara masih segar, atau nikmati sesi spa relaksasi di sore hari. Fasilitas ini didesain untuk memanjakan Anda, jadi sangat disayangkan jika Anda hanya menghabiskan waktu dengan tidur seharian atau bermain gadget di dalam kamar.\r\n\r\nCobalah pengalaman slow living dengan memesan sarapan di kamar (in-room dining). Menikmati sarapan lezat di atas tempat tidur atau di balkon kamar memberikan sensasi kemewahan tersendiri yang tidak bisa Anda dapatkan di rumah. Tujuannya adalah memanjakan diri sendiri. Pulang dari staycation haruslah dengan perasaan segar dan energi yang terisi penuh, siap menghadapi hari Senin kembali.', 4, '2025-12-20 00:55:30', 'blog-posts/CFiNPy9BFF5w02j6Te849T4A595TQae2ffbhAsGz.jpg', '2025-12-22 00:55:30', '2025-12-26 09:15:57'),
(5, 'Berburu Kuliner Lokal: Cara Menemukan \"Hidden Gem\" di Sekitar Hotel', 'berburu-kuliner-lokal-cara-menemukan-hidden-gem-di-sekitar-hotel', 'Lupakan rekomendasi umum di internet. Temukan cita rasa otentik yang menjadi favorit warga lokal dengan tips sederhana ini.', 'Salah satu bagian terbaik dari bepergian adalah mencicipi rasa baru. Namun, seringkali wisatawan terjebak di restoran yang overpriced dengan rasa yang sudah disesuaikan untuk lidah turis. Jika Anda ingin petualangan rasa yang sesungguhnya, jangan hanya terpaku pada aplikasi ulasan populer yang seringkali bias. Tempat makan terbaik seringkali tidak memiliki akun media sosial yang estetik.\r\n\r\nTips paling ampuh adalah bertanya kepada staf lokal hotel, seperti petugas keamanan, bellboy, atau resepsionis. Tanyakan, \"Di mana biasanya Anda makan siang yang enak dan murah?\" Jawaban mereka biasanya akan mengarahkan Anda ke warung legendaris atau kedai kecil di gang sempit yang menawarkan rasa paling otentik. Jangan ragu untuk mencoba menu yang namanya terdengar asing di telinga Anda.\r\n\r\nPerhatikan juga antrean. Jika sebuah tempat makan dipenuhi oleh warga lokal—bukan turis—itu adalah indikator kuat bahwa makanannya lezat. Mulailah petualangan kuliner Anda dengan berjalan kaki di sekitar area hotel saat sore menjelang malam. Seringkali, aroma masakan kaki lima lebih jujur daripada foto di menu restoran mewah. Selamat berpetualang rasa!', 4, '2025-12-19 00:55:30', 'blog-posts/jKazMxuqOsZOrqUez40y2z6QmNmrLLFvWpv2dH5r.jpg', '2025-12-22 00:55:30', '2025-12-29 21:00:18'),
(6, 'Rahasia Smart Traveler: Kapan Waktu Terbaik Booking Hotel?', 'rahasia-smart-traveler-kapan-waktu-terbaik-booking-hotel', 'Ingin menginap mewah dengan harga hemat? Ketahui waktu terbaik memesan kamar dan keuntungan memesan langsung melalui situs resmi.', 'Mendapatkan harga hotel terbaik adalah seni tersendiri. Mitos bahwa memesan jauh-jauh hari selalu lebih murah tidak sepenuhnya benar. Untuk periode high season (Libur Lebaran, Natal, Tahun Baru), memesan 2-3 bulan di awal memang wajib. Namun, untuk hari biasa (low season), hotel sering merilis harga promo \"last-minute\" satu atau dua hari sebelum tanggal menginap untuk mengisi kamar kosong.\r\n\r\nSelain waktu pemesanan, channel atau tempat Anda memesan juga berpengaruh. Banyak traveler terbiasa menggunakan Online Travel Agent (OTA), padahal memesan langsung melalui website resmi hotel (seperti Hotelify) seringkali memberikan keuntungan lebih. Kami sering memberikan harga spesial khusus member, jaminan harga termurah, hingga free upgrade kamar yang tidak tersedia di aplikasi pihak ketiga.\r\n\r\nPerhatikan juga \"Shoulder Season\", yaitu waktu di antara musim puncak dan musim sepi. Misalnya, bepergian di bulan Februari atau Oktober. Di waktu-waktu ini, cuaca biasanya masih bersahabat, tempat wisata tidak terlalu padat, dan harga hotel jauh lebih terjangkau dibandingkan saat musim liburan sekolah. Menjadi smart traveler berarti tahu kapan harus menekan tombol \"Book Now\".', 4, '2025-12-18 00:55:30', 'blog-posts/PVeO4YnRiN775iwmeSkveebmCdpBC9UE6HoTuPYc.jpg', '2025-12-22 00:55:30', '2025-12-29 21:06:05'),
(10, 'Solo Traveling: Panduan Aman dan Menyenangkan untuk Pemula', 'solo-traveling-panduan-aman-dan-menyenangkan-untuk-pemula', 'Bepergian sendiri bisa menjadi pengalaman yang mengubah hidup. Simak tips keamanan dan cara menikmati kesendirian tanpa merasa kesepian.', 'Solo traveling sedang menjadi tren global, dan untuk alasan yang bagus. Bepergian sendiri memberikan Anda kebebasan mutlak untuk mengatur jadwal. Ingin bangun siang? Silakan. Ingin mengubah rencana secara mendadak? Tidak perlu diskusi alot. Ini adalah momen terbaik untuk mengenal diri sendiri (self-discovery) dan melatih kemandirian. Namun, faktor keamanan tentu menjadi prioritas utama.\r\n\r\nSelalu lakukan riset mendalam tentang area tempat Anda menginap. Pilihlah hotel dengan resepsionis 24 jam dan ulasan keamanan yang baik. Bagikan itinerary dan lokasi terkini (live location) kepada orang terdekat atau keluarga. Saat berada di tempat umum, berjalanlah dengan percaya diri seolah Anda tahu arah dan tujuan, karena terlihat bingung seringkali memancing perhatian yang tidak diinginkan.\r\n\r\nJangan takut merasa kesepian. Justru saat sendirian, Anda akan lebih mudah membuka percakapan dengan orang baru, entah itu sesama traveler di lobi hotel atau warga lokal di kedai kopi. Bawa buku favorit atau jurnal perjalanan untuk menemani waktu santai Anda. Solo traveling bukan berarti Anda sendirian, melainkan Anda sedang menikmati waktu berkualitas dengan diri Anda sendiri.', 1, '2025-12-26 09:14:45', 'blog-posts/LRdRauXiK9fQQkhv8p9KzuZjrJ1MJn0EFZarO6t8.jpg', '2025-12-26 09:14:45', '2025-12-29 21:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `booking_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `status` enum('pending','booked','checked_in','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('pending','paid','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `guest_count` int NOT NULL DEFAULT '1',
  `guest_info` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `service_id`, `booking_code`, `total_price`, `status`, `payment_status`, `created_at`, `updated_at`, `check_in`, `check_out`, `guest_count`, `guest_info`) VALUES
(277, 60, 148, 'VIP-da50aa3e', '2850000.00', 'completed', 'paid', '2025-11-21 08:09:24', '2025-12-30 08:09:24', '2025-11-26', '2025-11-29', 3, '{\"name\": \"Luna Maya\", \"email\": \"luna@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567010\"}'),
(278, 60, 104, 'VIP-da51a7a4', '2100000.00', 'completed', 'paid', '2025-12-12 08:09:24', '2025-12-30 08:09:24', '2025-12-17', '2025-12-19', 2, '{\"name\": \"Luna Maya\", \"email\": \"luna@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567010\"}'),
(279, 52, 107, 'VIP-da51ae88', '3150000.00', 'completed', 'paid', '2025-11-10 08:09:24', '2025-12-30 08:09:24', '2025-11-15', '2025-11-18', 3, '{\"name\": \"Dimas Anggara\", \"email\": \"dimas@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567002\"}'),
(280, 54, 121, 'VIP-da51b62e', '6200000.00', 'completed', 'paid', '2025-11-07 08:09:24', '2025-12-30 08:09:24', '2025-11-12', '2025-11-16', 1, '{\"name\": \"Fatin Shidqia\", \"email\": \"fatin@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567004\"}'),
(281, 57, 168, 'VIP-da51bd56', '4200000.00', 'completed', 'paid', '2025-10-29 08:09:24', '2025-12-30 08:09:24', '2025-11-03', '2025-11-07', 4, '{\"name\": \"Irfan Hakim\", \"email\": \"irfan@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567007\"}'),
(282, 57, 159, 'VIP-da51c3e8', '3150000.00', 'completed', 'paid', '2025-11-09 08:09:24', '2025-12-30 08:09:24', '2025-11-14', '2025-11-17', 4, '{\"name\": \"Irfan Hakim\", \"email\": \"irfan@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567007\"}'),
(283, 51, 162, 'VIP-da51c9f1', '2100000.00', 'completed', 'paid', '2025-12-05 08:09:24', '2025-12-30 08:09:24', '2025-12-10', '2025-12-12', 2, '{\"name\": \"Citra Kirana\", \"email\": \"citra@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567001\"}'),
(284, 57, 160, 'VIP-da51d02e', '2100000.00', 'completed', 'paid', '2025-11-12 08:09:24', '2025-12-30 08:09:24', '2025-11-17', '2025-11-19', 2, '{\"name\": \"Irfan Hakim\", \"email\": \"irfan@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567007\"}'),
(285, 54, 86, 'VIP-da51d63d', '2850000.00', 'completed', 'paid', '2025-12-01 08:09:24', '2025-12-30 08:09:24', '2025-12-06', '2025-12-09', 2, '{\"name\": \"Fatin Shidqia\", \"email\": \"fatin@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567004\"}'),
(286, 56, 114, 'VIP-da51dbdc', '2100000.00', 'completed', 'paid', '2025-12-04 08:09:24', '2025-12-30 08:09:24', '2025-12-09', '2025-12-11', 3, '{\"name\": \"Hesti Purwadinata\", \"email\": \"hesti@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567006\"}'),
(287, 52, 161, 'VIP-da51e0f5', '4200000.00', 'completed', 'paid', '2025-12-06 08:09:24', '2025-12-30 08:09:24', '2025-12-11', '2025-12-15', 4, '{\"name\": \"Dimas Anggara\", \"email\": \"dimas@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567002\"}'),
(288, 55, 106, 'VIP-da51e554', '3150000.00', 'completed', 'paid', '2025-12-02 08:09:24', '2025-12-30 08:09:24', '2025-12-07', '2025-12-10', 4, '{\"name\": \"Gading Marten\", \"email\": \"gading@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567005\"}'),
(289, 54, 152, 'VIP-da51e98b', '1900000.00', 'completed', 'paid', '2025-12-05 08:09:24', '2025-12-30 08:09:24', '2025-12-10', '2025-12-12', 2, '{\"name\": \"Fatin Shidqia\", \"email\": \"fatin@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567004\"}'),
(290, 55, 175, 'VIP-da51eeb2', '6200000.00', 'completed', 'paid', '2025-10-27 08:09:24', '2025-12-30 08:09:24', '2025-11-01', '2025-11-05', 3, '{\"name\": \"Gading Marten\", \"email\": \"gading@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567005\"}'),
(291, 53, 145, 'VIP-da51f2bb', '1900000.00', 'completed', 'paid', '2025-11-14 08:09:24', '2025-12-30 08:09:24', '2025-11-19', '2025-11-21', 3, '{\"name\": \"Eka Gustiwana\", \"email\": \"eka@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567003\"}'),
(292, 53, 103, 'VIP-da51f896', '1900000.00', 'completed', 'paid', '2025-11-12 08:09:24', '2025-12-30 08:09:24', '2025-11-17', '2025-11-19', 3, '{\"name\": \"Eka Gustiwana\", \"email\": \"eka@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567003\"}'),
(293, 53, 107, 'VIP-da51fea5', '2100000.00', 'completed', 'paid', '2025-11-14 08:09:24', '2025-12-30 08:09:24', '2025-11-19', '2025-11-21', 2, '{\"name\": \"Eka Gustiwana\", \"email\": \"eka@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567003\"}'),
(294, 59, 135, 'VIP-da52030f', '3800000.00', 'completed', 'paid', '2025-11-28 08:09:24', '2025-12-30 08:09:24', '2025-12-03', '2025-12-07', 2, '{\"name\": \"Kunto Aji\", \"email\": \"kunto@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567009\"}'),
(295, 52, 148, 'VIP-da520713', '2850000.00', 'completed', 'paid', '2025-10-31 08:09:24', '2025-12-30 08:09:24', '2025-11-05', '2025-11-08', 3, '{\"name\": \"Dimas Anggara\", \"email\": \"dimas@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567002\"}'),
(296, 55, 89, 'VIP-da520a2c', '3800000.00', 'completed', 'paid', '2025-10-29 08:09:24', '2025-12-30 08:09:24', '2025-11-03', '2025-11-07', 3, '{\"name\": \"Gading Marten\", \"email\": \"gading@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567005\"}'),
(297, 51, 112, 'VIP-da520e95', '2100000.00', 'completed', 'paid', '2025-11-22 08:09:24', '2025-12-30 08:09:24', '2025-11-27', '2025-11-29', 1, '{\"name\": \"Citra Kirana\", \"email\": \"citra@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567001\"}'),
(298, 51, 118, 'VIP-da5214bb', '4200000.00', 'completed', 'paid', '2025-11-05 08:09:24', '2025-12-30 08:09:24', '2025-11-10', '2025-11-14', 2, '{\"name\": \"Citra Kirana\", \"email\": \"citra@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567001\"}'),
(299, 53, 113, 'VIP-da521ace', '4200000.00', 'completed', 'paid', '2025-12-05 08:09:24', '2025-12-30 08:09:24', '2025-12-10', '2025-12-14', 2, '{\"name\": \"Eka Gustiwana\", \"email\": \"eka@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567003\"}'),
(300, 57, 172, 'VIP-da52215f', '3100000.00', 'completed', 'paid', '2025-11-23 08:09:24', '2025-12-30 08:09:24', '2025-11-28', '2025-11-30', 2, '{\"name\": \"Irfan Hakim\", \"email\": \"irfan@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567007\"}'),
(301, 57, 112, 'VIP-da5226fb', '2100000.00', 'completed', 'paid', '2025-11-12 08:09:24', '2025-12-30 08:09:24', '2025-11-17', '2025-11-19', 2, '{\"name\": \"Irfan Hakim\", \"email\": \"irfan@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567007\"}'),
(302, 56, 123, 'VIP-da522d33', '6200000.00', 'completed', 'paid', '2025-11-27 08:09:24', '2025-12-30 08:09:24', '2025-12-02', '2025-12-06', 4, '{\"name\": \"Hesti Purwadinata\", \"email\": \"hesti@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567006\"}'),
(303, 54, 109, 'VIP-da523448', '4200000.00', 'completed', 'paid', '2025-11-05 08:09:24', '2025-12-30 08:09:24', '2025-11-10', '2025-11-14', 2, '{\"name\": \"Fatin Shidqia\", \"email\": \"fatin@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567004\"}'),
(304, 54, 112, 'VIP-da5239e4', '4200000.00', 'completed', 'paid', '2025-11-25 08:09:24', '2025-12-30 08:09:24', '2025-11-30', '2025-12-04', 3, '{\"name\": \"Fatin Shidqia\", \"email\": \"fatin@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567004\"}'),
(305, 60, 170, 'VIP-da524053', '3100000.00', 'completed', 'paid', '2025-11-23 08:09:24', '2025-12-30 08:09:24', '2025-11-28', '2025-11-30', 1, '{\"name\": \"Luna Maya\", \"email\": \"luna@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567010\"}'),
(306, 52, 151, 'VIP-da5245ef', '2850000.00', 'completed', 'paid', '2025-11-29 08:09:24', '2025-12-30 08:09:24', '2025-12-04', '2025-12-07', 4, '{\"name\": \"Dimas Anggara\", \"email\": \"dimas@example.com\", \"notes\": \"Tamu VIP - Fixed Data\", \"phone\": \"081234567002\"}'),
(308, 7, 84, 'AR-20251230-TGWA', '20900000.00', 'checked_in', 'pending', '2025-12-30 01:13:58', '2025-12-30 01:14:17', '2025-12-10', '2026-01-01', 1, '{\"name\": \"user\", \"email\": \"user@example.com\", \"phone\": null}'),
(309, 7, 85, 'AR-20251230-BQDA', '1900000.00', 'checked_in', 'pending', '2025-12-30 01:17:46', '2025-12-30 01:21:41', '2025-12-29', '2025-12-31', 1, '{\"name\": \"user\", \"email\": \"user@example.com\", \"phone\": null}'),
(310, 7, 86, 'AR-20251230-KFUT', '950000.00', 'checked_in', 'pending', '2025-12-30 01:23:28', '2025-12-30 02:37:55', '2025-12-30', '2025-12-31', 1, '{\"name\": \"user\", \"email\": \"user@example.com\", \"phone\": null}'),
(311, 7, 181, 'AR-20251230-JIH5', '5700000.00', 'cancelled', 'pending', '2025-12-30 02:41:46', '2025-12-30 02:47:15', '2025-12-29', '2025-12-31', 1, '{\"name\": \"user\", \"email\": \"user@example.com\", \"phone\": \"087824584588\"}'),
(312, 66, 180, 'AR-20251230-JM4Z', '5700000.00', 'checked_in', 'pending', '2025-12-30 03:33:49', '2025-12-30 03:34:13', '2025-12-29', '2025-12-31', 1, '{\"name\": \"Fadhil1\", \"email\": \"fadhil1@gmail.com\", \"phone\": null}'),
(313, 66, 106, 'AR-20251230-YRNG', '2100000.00', 'cancelled', 'pending', '2025-12-30 03:34:28', '2025-12-30 03:40:33', '2025-12-29', '2025-12-31', 1, '{\"name\": \"Fadhil1\", \"email\": \"fadhil1@gmail.com\", \"phone\": null}'),
(314, 7, 107, 'AR-20251230-H51F', '2100000.00', 'booked', 'pending', '2025-12-30 03:51:13', '2025-12-30 03:51:18', '2025-12-30', '2026-01-01', 1, '{\"name\": \"user\", \"email\": \"user@example.com\", \"phone\": \"087824584588\"}');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cancellations`
--

CREATE TABLE `cancellations` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'requested',
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `processed_by` bigint UNSIGNED DEFAULT NULL,
  `refund_amount` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancellations`
--

INSERT INTO `cancellations` (`id`, `booking_id`, `user_id`, `reason`, `status`, `admin_note`, `created_at`, `updated_at`, `processed_by`, `refund_amount`) VALUES
(27, 310, NULL, 'Jadwal saya padat, mendadak ada acara lain', 'rejected', NULL, '2025-12-30 01:45:49', '2025-12-30 02:35:35', 1, NULL),
(28, 311, NULL, 'Saya mengajukan pembatalan reservasi dikarenakan ada keperluan lain yang mendadak dan tidak bisa ditinggalkan', 'approved', NULL, '2025-12-30 02:42:44', '2025-12-30 02:47:15', 1, NULL),
(29, 313, NULL, 'iseng hehee', 'approved', NULL, '2025-12-30 03:35:18', '2025-12-30 03:40:33', 1, NULL),
(30, 314, NULL, 'halah', 'rejected', NULL, '2025-12-30 03:51:25', '2025-12-30 03:58:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"ff3fb96a-c457-45f8-b94f-2c8eb8924a09\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"1afbede4-fb4e-4e3c-b397-16edc50a0c67\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766479640,\"delay\":null}', 0, NULL, 1766479640, 1766479640),
(2, 'default', '{\"uuid\":\"d76caea1-6a9f-4f1c-b95c-900b7e4156ae\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"1afbede4-fb4e-4e3c-b397-16edc50a0c67\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766479641,\"delay\":null}', 0, NULL, 1766479641, 1766479641),
(3, 'default', '{\"uuid\":\"48a6539f-9549-43f1-a866-08b3d5f2df53\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"598f1db3-a5cd-46dd-ab3f-9772ade78bb6\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766483909,\"delay\":null}', 0, NULL, 1766483909, 1766483909),
(4, 'default', '{\"uuid\":\"c9200909-2863-435c-8378-83ed5b50d603\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"598f1db3-a5cd-46dd-ab3f-9772ade78bb6\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766483909,\"delay\":null}', 0, NULL, 1766483909, 1766483909),
(5, 'default', '{\"uuid\":\"fcee265f-1ab6-43ef-8fef-185069bcf8d7\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"13783631-077d-4981-8980-3c2cc3a32475\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766484479,\"delay\":null}', 0, NULL, 1766484479, 1766484479),
(6, 'default', '{\"uuid\":\"d4b11fc6-4c42-4dec-85ec-ed8997c1f66d\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"13783631-077d-4981-8980-3c2cc3a32475\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766484479,\"delay\":null}', 0, NULL, 1766484479, 1766484479),
(7, 'default', '{\"uuid\":\"50fcc7bb-820b-4020-9bcf-020642e13ad6\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"cef99f5d-057a-4d9d-8891-cfd8f0d856de\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766637127,\"delay\":null}', 0, NULL, 1766637127, 1766637127),
(8, 'default', '{\"uuid\":\"9cc28efa-ec75-4b67-92b8-ef53d395b632\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:9;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"cef99f5d-057a-4d9d-8891-cfd8f0d856de\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766637127,\"delay\":null}', 0, NULL, 1766637127, 1766637127),
(9, 'default', '{\"uuid\":\"01df9aa3-5cf9-4849-a588-b8765571fb27\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"1251d5bd-e43e-46f5-9daf-2858d80e5a7b\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766637450,\"delay\":null}', 0, NULL, 1766637450, 1766637450),
(10, 'default', '{\"uuid\":\"6d2df40c-d2c4-4011-bfbf-0553e1605aa8\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"1251d5bd-e43e-46f5-9daf-2858d80e5a7b\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766637450,\"delay\":null}', 0, NULL, 1766637450, 1766637450),
(11, 'default', '{\"uuid\":\"8916694c-b491-4320-8023-b35eae7c71d3\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"5fb7585c-3057-4842-906a-88fe86d632ac\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766638502,\"delay\":null}', 0, NULL, 1766638502, 1766638502),
(12, 'default', '{\"uuid\":\"b0fa7b3c-07bd-40e3-8c0b-e136a977c91f\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:11;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"5fb7585c-3057-4842-906a-88fe86d632ac\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766638502,\"delay\":null}', 0, NULL, 1766638502, 1766638502),
(13, 'default', '{\"uuid\":\"a8573dcb-0295-45d6-bbd6-7c884ad9100d\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"1772afd7-1b8e-4d84-9697-60b020163ac0\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766644537,\"delay\":null}', 0, NULL, 1766644538, 1766644538),
(14, 'default', '{\"uuid\":\"a2ea904d-f9ee-4aa6-86f3-bc8524c069d8\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:12;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"1772afd7-1b8e-4d84-9697-60b020163ac0\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766644538,\"delay\":null}', 0, NULL, 1766644538, 1766644538),
(15, 'default', '{\"uuid\":\"e9b92d80-5a48-445d-9212-4c679b2b3453\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"67df72fc-de9d-4ae2-b351-3c0a4b70aae7\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766644641,\"delay\":null}', 0, NULL, 1766644641, 1766644641),
(16, 'default', '{\"uuid\":\"e5c0177c-27b1-40df-aeb0-eaa6e336ad34\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:13;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"67df72fc-de9d-4ae2-b351-3c0a4b70aae7\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766644641,\"delay\":null}', 0, NULL, 1766644641, 1766644641),
(17, 'default', '{\"uuid\":\"745e1d50-fc28-44b4-8e29-94b09cda1ffe\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"cdd28434-db0c-40bf-bd15-0be291fec8e4\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766757684,\"delay\":null}', 0, NULL, 1766757684, 1766757684),
(18, 'default', '{\"uuid\":\"49034f4d-98a6-4c4b-88f7-42a818fd5474\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"cdd28434-db0c-40bf-bd15-0be291fec8e4\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766757684,\"delay\":null}', 0, NULL, 1766757684, 1766757684),
(19, 'default', '{\"uuid\":\"d5c4318c-07eb-4ab5-be52-e3788302f4e0\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:43;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"958be385-52be-4b5c-aaed-2cace11b4c42\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766759138,\"delay\":null}', 0, NULL, 1766759138, 1766759138),
(20, 'default', '{\"uuid\":\"a59bd82e-47f4-4994-8540-f164775ba2a7\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:43;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"958be385-52be-4b5c-aaed-2cace11b4c42\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766759138,\"delay\":null}', 0, NULL, 1766759138, 1766759138),
(21, 'default', '{\"uuid\":\"59633ab3-aeb3-4b8c-b283-1c539e23e116\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"4c1f9098-032e-47d3-accd-64bff02fb67f\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766763904,\"delay\":null}', 0, NULL, 1766763904, 1766763904),
(22, 'default', '{\"uuid\":\"50e8d5a5-23fa-467e-becb-0b0798e1fd50\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"d40be55f-2b2a-48fe-af82-662908f1735c\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766763904,\"delay\":null}', 0, NULL, 1766763904, 1766763904),
(23, 'default', '{\"uuid\":\"81178b13-1f89-4ce7-a793-f4ce2241a246\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"4c1f9098-032e-47d3-accd-64bff02fb67f\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766763904,\"delay\":null}', 0, NULL, 1766763904, 1766763904),
(24, 'default', '{\"uuid\":\"4a8e04e3-adc5-4ea1-969a-0da365e4a6ad\",\"displayName\":\"App\\\\Notifications\\\\CancellationRejectedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:4;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\CancellationRejectedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"d40be55f-2b2a-48fe-af82-662908f1735c\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766763904,\"delay\":null}', 0, NULL, 1766763904, 1766763904),
(25, 'default', '{\"uuid\":\"ec1635aa-50e1-49f2-9651-3859227ce67d\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"0c082413-3e91-4f47-b9ee-f01629da9169\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1766764505,\"delay\":null}', 0, NULL, 1766764505, 1766764505),
(26, 'default', '{\"uuid\":\"0de1732c-21da-4802-b58b-b6e2f82d3781\",\"displayName\":\"App\\\\Notifications\\\\RefundApprovedNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:7;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\RefundApprovedNotification\\\":2:{s:12:\\\"cancellation\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\Cancellation\\\";s:2:\\\"id\\\";i:14;s:9:\\\"relations\\\";a:2:{i:0;s:7:\\\"booking\\\";i:1;s:12:\\\"booking.user\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"0c082413-3e91-4f47-b9ee-f01629da9169\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"},\"createdAt\":1766764505,\"delay\":null}', 0, NULL, 1766764505, 1766764505);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_12_21_064059_create_users_table', 1),
(4, '2025_12_21_064142_create_services_table', 1),
(5, '2025_12_21_064202_create_bookings_table', 1),
(6, '2025_12_21_064216_create_cancellations_table', 1),
(7, '2025_12_21_064230_create_blog_posts_table', 1),
(8, '2025_12_21_064245_create_transactions_table', 1),
(9, '2025_12_21_064300_create_activity_logs_table', 1),
(10, '2025_12_21_065757_create_sessions_table', 1),
(11, '2025_12_22_054858_create_payments_table', 2),
(12, '2025_12_22_072657_add_is_available_to_services_table', 3),
(13, '2025_12_22_075054_normalize_service_columns', 4),
(14, '2025_12_22_075443_add_missing_columns_to_users_table', 5),
(15, '2025_12_22_075624_normalize_bookings_columns', 6),
(16, '2025_12_22_075800_normalize_transactions_columns', 7),
(17, '2025_12_22_080500_change_transactions_status_to_string', 8),
(18, '2025_12_22_081000_change_bookings_status_to_string', 9),
(19, '2025_12_22_081200_change_cancellations_status_to_string', 10),
(20, '2025_12_22_081400_add_missing_columns_to_activity_logs', 11),
(21, '2025_12_23_000000_add_processed_by_to_cancellations_table', 12),
(22, '2025_12_23_000001_make_excerpt_nullable_in_blog_posts', 12),
(23, '2025_12_23_000002_add_refund_amount_to_cancellations_table', 12),
(24, '2025_12_23_000003_add_payment_date_to_transactions_table', 12),
(25, '2025_12_23_100000_add_profile_photo_to_users_table', 12),
(26, '2025_12_25_000000_update_bookings_status_enum', 12);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_per_night` decimal(12,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `type`, `capacity`, `description`, `created_at`, `updated_at`, `is_available`, `name`, `price_per_night`) VALUES
(84, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:02:40', 1, '101', '950000.00'),
(85, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '102', '950000.00'),
(86, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '103', '950000.00'),
(87, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '104', '950000.00'),
(88, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '105', '950000.00'),
(89, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '106', '950000.00'),
(90, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '107', '950000.00'),
(91, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '108', '950000.00'),
(92, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '109', '950000.00'),
(93, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '110', '950000.00'),
(94, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '111', '950000.00'),
(95, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '112', '950000.00'),
(96, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '113', '950000.00'),
(97, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '114', '950000.00'),
(98, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '115', '950000.00'),
(99, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '116', '950000.00'),
(100, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '117', '950000.00'),
(101, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '118', '950000.00'),
(102, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '119', '950000.00'),
(103, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '120', '950000.00'),
(104, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '201', '1050000.00'),
(105, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '202', '1050000.00'),
(106, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '203', '1050000.00'),
(107, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '204', '1050000.00'),
(108, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '205', '1050000.00'),
(109, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '206', '1050000.00'),
(110, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '207', '1050000.00'),
(111, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '208', '1050000.00'),
(112, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '209', '1050000.00'),
(113, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '210', '1050000.00'),
(114, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '211', '1050000.00'),
(115, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '212', '1050000.00'),
(116, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '213', '1050000.00'),
(117, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '214', '1050000.00'),
(118, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '215', '1050000.00'),
(119, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '301', '1550000.00'),
(120, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '302', '1550000.00'),
(121, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '303', '1550000.00'),
(122, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '304', '1550000.00'),
(123, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '305', '1550000.00'),
(124, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '306', '1550000.00'),
(125, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '307', '1550000.00'),
(126, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '308', '1550000.00'),
(127, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '309', '1550000.00'),
(128, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '310', '1550000.00'),
(129, 'Executive Suite', 3, 'Suite mewah dengan ruang tamu terpisah, bathtub jacuzzi, akses ke Executive Lounge, dan sarapan eksklusif.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '401', '2850000.00'),
(130, 'Executive Suite', 3, 'Suite mewah dengan ruang tamu terpisah, bathtub jacuzzi, akses ke Executive Lounge, dan sarapan eksklusif.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '402', '2850000.00'),
(131, 'Executive Suite', 3, 'Suite mewah dengan ruang tamu terpisah, bathtub jacuzzi, akses ke Executive Lounge, dan sarapan eksklusif.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '403', '2850000.00'),
(132, 'Family Suite', 4, 'Unit apartemen 2 kamar tidur, dilengkapi dapur kecil, ruang makan, konsol game, dan area bermain anak.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '501', '3800000.00'),
(133, 'Family Suite', 4, 'Unit apartemen 2 kamar tidur, dilengkapi dapur kecil, ruang makan, konsol game, dan area bermain anak.', '2025-12-30 04:09:54', '2025-12-30 04:09:54', 1, '502', '3800000.00'),
(134, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '121', '950000.00'),
(135, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '122', '950000.00'),
(136, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '123', '950000.00'),
(137, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '124', '950000.00'),
(138, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '125', '950000.00'),
(139, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '126', '950000.00'),
(140, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '127', '950000.00'),
(141, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '128', '950000.00'),
(142, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '129', '950000.00'),
(143, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '130', '950000.00'),
(144, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '131', '950000.00'),
(145, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '132', '950000.00'),
(146, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '133', '950000.00'),
(147, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '134', '950000.00'),
(148, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '135', '950000.00'),
(149, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '136', '950000.00'),
(150, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '137', '950000.00'),
(151, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '138', '950000.00'),
(152, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '139', '950000.00'),
(153, 'Standard Room', 2, 'Kamar nyaman seluas 24m² dengan fasilitas dasar lengkap, TV kabel, WiFi cepat, dan shower air hangat.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '140', '950000.00'),
(154, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '216', '1050000.00'),
(155, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '217', '1050000.00'),
(156, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '218', '1050000.00'),
(157, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '219', '1050000.00'),
(158, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '220', '1050000.00'),
(159, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '221', '1050000.00'),
(160, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '222', '1050000.00'),
(161, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '223', '1050000.00'),
(162, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '224', '1050000.00'),
(163, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '225', '1050000.00'),
(164, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '226', '1050000.00'),
(165, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '227', '1050000.00'),
(166, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '228', '1050000.00'),
(167, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '229', '1050000.00'),
(168, 'Twin Bed Room', 2, 'Ideal untuk teman perjalanan, dilengkapi dua kasur single terpisah, meja kerja ergonomis, dan amenities premium.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '230', '1050000.00'),
(169, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '311', '1550000.00'),
(170, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '312', '1550000.00'),
(171, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '313', '1550000.00'),
(172, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '314', '1550000.00'),
(173, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '315', '1550000.00'),
(174, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '316', '1550000.00'),
(175, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '317', '1550000.00'),
(176, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '318', '1550000.00'),
(177, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '319', '1550000.00'),
(178, 'Deluxe Room', 3, 'Kamar luas 36m² dengan pemandangan kota, sofa bed tambahan, Smart TV 50 inch, dan akses minibar gratis.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '320', '1550000.00'),
(179, 'Executive Suite', 3, 'Suite mewah dengan ruang tamu terpisah, bathtub jacuzzi, akses ke Executive Lounge, dan sarapan eksklusif.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '404', '2850000.00'),
(180, 'Executive Suite', 3, 'Suite mewah dengan ruang tamu terpisah, bathtub jacuzzi, akses ke Executive Lounge, dan sarapan eksklusif.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '405', '2850000.00'),
(181, 'Executive Suite', 3, 'Suite mewah dengan ruang tamu terpisah, bathtub jacuzzi, akses ke Executive Lounge, dan sarapan eksklusif.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '406', '2850000.00'),
(182, 'Family Suite', 4, 'Unit apartemen 2 kamar tidur, dilengkapi dapur kecil, ruang makan, konsol game, dan area bermain anak.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '503', '3800000.00'),
(183, 'Family Suite', 4, 'Unit apartemen 2 kamar tidur, dilengkapi dapur kecil, ruang makan, konsol game, dan area bermain anak.', '2025-12-30 06:54:13', '2025-12-30 06:54:13', 1, '504', '3800000.00'),
(185, 'Standard Room', 9, 'hihihi', '2025-12-30 03:02:08', '2025-12-30 03:45:27', 1, 'Kamar  Tulip 9696', '909090.00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cTDbFomXC0JIL1In1APcH2T6tHAthEu9dmopArEs', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnlDNzlBN1RwWGNva1dESDZuYXRQeDVSNFZuRW1YR01la2dPRUZTdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9ob3RlbGlmeS50ZXN0L2NoZWNraW4iO3M6NToicm91dGUiO047fX0=', 1767092830),
('zySPOO7p85sSOjWXVxtmWQyso2YgLJRXKC6wTPMO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0RYeEcwZXZJUXczam9YNm9IN3k3djVHaHNQS1hZSVJKM3g4OXpBaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9ob3RlbGlmeS50ZXN0L2hlcm8tYmciO3M6NToicm91dGUiO3M6NzoiaGVyby5iZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767088922);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `meta` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `booking_id`, `amount`, `status`, `meta`, `created_at`, `updated_at`, `payment_method`, `transaction_code`, `payment_date`) VALUES
(277, 277, '2850000.00', 'paid', NULL, '2025-11-21 08:09:24', '2025-11-21 08:09:24', 'credit_card', 'TRX-VIP-da56a739', '2025-11-21 08:09:24'),
(278, 278, '2100000.00', 'paid', NULL, '2025-12-12 08:09:24', '2025-12-12 08:09:24', 'bank_transfer', 'TRX-VIP-da56a8a6', '2025-12-12 08:09:24'),
(279, 279, '3150000.00', 'paid', NULL, '2025-11-10 08:09:24', '2025-11-10 08:09:24', 'bank_transfer', 'TRX-VIP-da56a952', '2025-11-10 08:09:24'),
(280, 280, '6200000.00', 'paid', NULL, '2025-11-07 08:09:24', '2025-11-07 08:09:24', 'bank_transfer', 'TRX-VIP-da56a9ec', '2025-11-07 08:09:24'),
(281, 281, '4200000.00', 'paid', NULL, '2025-10-29 08:09:24', '2025-10-29 08:09:24', 'bank_transfer', 'TRX-VIP-da56aa85', '2025-10-29 08:09:24'),
(282, 282, '3150000.00', 'paid', NULL, '2025-11-09 08:09:24', '2025-11-09 08:09:24', 'credit_card', 'TRX-VIP-da56ab19', '2025-11-09 08:09:24'),
(283, 283, '2100000.00', 'paid', NULL, '2025-12-05 08:09:24', '2025-12-05 08:09:24', 'qris', 'TRX-VIP-da56abaa', '2025-12-05 08:09:24'),
(284, 284, '2100000.00', 'paid', NULL, '2025-11-12 08:09:24', '2025-11-12 08:09:24', 'bank_transfer', 'TRX-VIP-da56ac3c', '2025-11-12 08:09:24'),
(285, 285, '2850000.00', 'paid', NULL, '2025-12-01 08:09:24', '2025-12-01 08:09:24', 'credit_card', 'TRX-VIP-da56acf0', '2025-12-01 08:09:24'),
(286, 286, '2100000.00', 'paid', NULL, '2025-12-04 08:09:24', '2025-12-04 08:09:24', 'qris', 'TRX-VIP-da56ad7f', '2025-12-04 08:09:24'),
(287, 287, '4200000.00', 'paid', NULL, '2025-12-06 08:09:24', '2025-12-06 08:09:24', 'qris', 'TRX-VIP-da56ae0d', '2025-12-06 08:09:24'),
(288, 288, '3150000.00', 'paid', NULL, '2025-12-02 08:09:24', '2025-12-02 08:09:24', 'bank_transfer', 'TRX-VIP-da56aea1', '2025-12-02 08:09:24'),
(289, 289, '1900000.00', 'paid', NULL, '2025-12-05 08:09:24', '2025-12-05 08:09:24', 'credit_card', 'TRX-VIP-da56af5e', '2025-12-05 08:09:24'),
(290, 290, '6200000.00', 'paid', NULL, '2025-10-27 08:09:24', '2025-10-27 08:09:24', 'bank_transfer', 'TRX-VIP-da56b00d', '2025-10-27 08:09:24'),
(291, 291, '1900000.00', 'paid', NULL, '2025-11-14 08:09:24', '2025-11-14 08:09:24', 'bank_transfer', 'TRX-VIP-da56b09f', '2025-11-14 08:09:24'),
(292, 292, '1900000.00', 'paid', NULL, '2025-11-12 08:09:24', '2025-11-12 08:09:24', 'qris', 'TRX-VIP-da56b12e', '2025-11-12 08:09:24'),
(293, 293, '2100000.00', 'paid', NULL, '2025-11-14 08:09:24', '2025-11-14 08:09:24', 'bank_transfer', 'TRX-VIP-da56b1b9', '2025-11-14 08:09:24'),
(294, 294, '3800000.00', 'paid', NULL, '2025-11-28 08:09:24', '2025-11-28 08:09:24', 'credit_card', 'TRX-VIP-da56b259', '2025-11-28 08:09:24'),
(295, 295, '2850000.00', 'paid', NULL, '2025-10-31 08:09:24', '2025-10-31 08:09:24', 'qris', 'TRX-VIP-da56b2f2', '2025-10-31 08:09:24'),
(296, 296, '3800000.00', 'paid', NULL, '2025-10-29 08:09:24', '2025-10-29 08:09:24', 'credit_card', 'TRX-VIP-da56b37c', '2025-10-29 08:09:24'),
(297, 297, '2100000.00', 'paid', NULL, '2025-11-22 08:09:24', '2025-11-22 08:09:24', 'credit_card', 'TRX-VIP-da56b408', '2025-11-22 08:09:24'),
(298, 298, '4200000.00', 'paid', NULL, '2025-11-05 08:09:24', '2025-11-05 08:09:24', 'qris', 'TRX-VIP-da56b495', '2025-11-05 08:09:24'),
(299, 299, '4200000.00', 'paid', NULL, '2025-12-05 08:09:24', '2025-12-05 08:09:24', 'credit_card', 'TRX-VIP-da56b51c', '2025-12-05 08:09:24'),
(300, 300, '3100000.00', 'paid', NULL, '2025-11-23 08:09:24', '2025-11-23 08:09:24', 'qris', 'TRX-VIP-da56b5a5', '2025-11-23 08:09:24'),
(301, 301, '2100000.00', 'paid', NULL, '2025-11-12 08:09:24', '2025-11-12 08:09:24', 'qris', 'TRX-VIP-da56b62b', '2025-11-12 08:09:24'),
(302, 302, '6200000.00', 'paid', NULL, '2025-11-27 08:09:24', '2025-11-27 08:09:24', 'credit_card', 'TRX-VIP-da56b6ba', '2025-11-27 08:09:24'),
(303, 303, '4200000.00', 'paid', NULL, '2025-11-05 08:09:24', '2025-11-05 08:09:24', 'qris', 'TRX-VIP-da56b74a', '2025-11-05 08:09:24'),
(304, 304, '4200000.00', 'paid', NULL, '2025-11-25 08:09:24', '2025-11-25 08:09:24', 'bank_transfer', 'TRX-VIP-da56b7d4', '2025-11-25 08:09:24'),
(305, 305, '3100000.00', 'paid', NULL, '2025-11-23 08:09:24', '2025-11-23 08:09:24', 'bank_transfer', 'TRX-VIP-da56b861', '2025-11-23 08:09:24'),
(306, 306, '2850000.00', 'paid', NULL, '2025-11-29 08:09:24', '2025-11-29 08:09:24', 'bank_transfer', 'TRX-VIP-da56b8fe', '2025-11-29 08:09:24'),
(308, 308, '20900000.00', 'completed', '{\"bank\": \"BNI\", \"account_number\": \"294893438438\"}', '2025-12-30 01:13:58', '2025-12-30 01:14:06', 'BNI', 'CJ7QIYPNV8', '2025-12-30 01:14:06'),
(309, 309, '1900000.00', 'completed', '{\"bank\": \"BCA\", \"account_number\": \"294893438438\"}', '2025-12-30 01:17:46', '2025-12-30 01:18:39', 'BCA', '32FJJ5O9R8', '2025-12-30 01:18:39'),
(310, 310, '950000.00', 'completed', '{\"bank\": \"BCA\", \"account_number\": \"78099797967679\"}', '2025-12-30 01:23:28', '2025-12-30 01:23:36', 'BCA', 'PA87GEHG1P', '2025-12-30 01:23:36'),
(311, 311, '5700000.00', 'completed', '{\"bank\": \"BRI\", \"account_number\": \"78099797967679\"}', '2025-12-30 02:41:46', '2025-12-30 02:41:51', 'BRI', 'BFN9PRGJ70', '2025-12-30 02:41:51'),
(312, 312, '5700000.00', 'completed', '{\"bank\": \"BRI\", \"account_number\": \"34413290909\"}', '2025-12-30 03:33:49', '2025-12-30 03:34:02', 'BRI', 'RT0ZOYHB9L', '2025-12-30 03:34:02'),
(313, 313, '2100000.00', 'completed', '{\"bank\": \"Mandiri\", \"account_number\": \"78099797967679\"}', '2025-12-30 03:34:28', '2025-12-30 03:34:34', 'Mandiri', 'L9Y1EEHF3O', '2025-12-30 03:34:34'),
(314, 314, '2100000.00', 'completed', '{\"bank\": \"BRI\", \"account_number\": \"78099797967679\"}', '2025-12-30 03:51:13', '2025-12-30 03:51:18', 'BRI', 'CCVIGYZUD7', '2025-12-30 03:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','staff','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `profile_photo`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', 'Zw56jw4khv4UjacrtFDMNDuDRVTygW1zxAw6DXIuH3Li7zykbwRyK3Ru1ikz', NULL, NULL, 'admin', '2025-12-21 02:49:07', '2025-12-21 02:49:07'),
(3, 'Fakhru Rifqi Ma\'arif', 'fakhrurifqi08@student.uns.ac.id', NULL, '$2y$12$BQJIPhdb/1TjHuEr3D0KpemCPElrf5Nphy4RpMxy7CWJQP9ya.LrC', NULL, NULL, NULL, 'admin', '2025-12-21 03:09:42', '2025-12-21 03:09:42'),
(4, 'Hifzhedine Zahares Samto', 'hifzhedine8@student.uns.ac.id', NULL, '$2y$12$dgH9ONNSp4RymHcn1/KFRO.ZQXGNOnJoKefmmayoSTBNs/FfuWI0m', NULL, NULL, NULL, 'user', '2025-12-21 18:27:10', '2025-12-21 18:27:10'),
(6, 'Fadhil', 'fadhil@gmail.com', NULL, '$2y$12$DX58tuO0tCtd1.K0JHhlpeRnW.LdJsmvx6M1X/552TM1j39ieun8a', NULL, '087824584588', NULL, 'user', '2025-12-21 21:23:41', '2025-12-29 03:23:26'),
(7, 'user', 'user@example.com', NULL, '$2y$12$jal2XM5Fjl3Wd.XD.izxY.18WSJkalu8G4Me12XfEF7buzunioyIu', 'JpNDL5jFETpqCaUMmcCMdvLKBloEHPDuEdqJ4f2Eh8XlTrYcZGsr4h8hJElb', '087824584588', 'profile-photos/5szIIVzymJqgo18gM5udjaTZCkGcsQ8RZgnxCEnS.jpg', 'user', '2025-12-22 00:32:04', '2025-12-30 02:02:18'),
(8, 'Ms. Nellie O\'Reilly II', 'lweber@example.org', '2025-12-22 00:55:30', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', 'a1X16wms65', NULL, NULL, 'user', '2025-12-22 00:55:30', '2025-12-22 00:55:30'),
(9, 'Kolby Predovic', 'obarrows@example.net', '2025-12-22 00:55:30', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', 'FXXIkQ08MN', NULL, NULL, 'user', '2025-12-22 00:55:30', '2025-12-22 00:55:30'),
(10, 'Prof. Brown Auer', 'harber.esperanza@example.com', '2025-12-22 00:55:30', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', 'WAT9tU3NMv', NULL, NULL, 'user', '2025-12-22 00:55:30', '2025-12-22 00:55:30'),
(11, 'Zetta Rogahn', 'caufderhar@example.org', '2025-12-22 00:55:30', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', 'BrFXYgMKkb', NULL, NULL, 'user', '2025-12-22 00:55:30', '2025-12-22 00:55:30'),
(13, 'Dr. Murray Hansen', 'schmidt.tomasa@example.com', '2025-12-22 00:57:41', '$2y$12$xI5eEYFLSYCKkB3iFymzd.81pGAUB/ALFym.J.4398ip/jn.V5ytO', 'sgkZdNjXJk', NULL, NULL, 'user', '2025-12-22 00:57:41', '2025-12-22 00:57:41'),
(14, 'Yessenia Parker III', 'mittie49@example.net', '2025-12-22 00:57:41', '$2y$12$xI5eEYFLSYCKkB3iFymzd.81pGAUB/ALFym.J.4398ip/jn.V5ytO', 'QclXcd1pIu', NULL, NULL, 'user', '2025-12-22 00:57:41', '2025-12-22 00:57:41'),
(15, 'Novella McGlynn', 'kemmer.zane@example.com', '2025-12-22 00:57:41', '$2y$12$xI5eEYFLSYCKkB3iFymzd.81pGAUB/ALFym.J.4398ip/jn.V5ytO', 'Af4KjYzc8M', NULL, NULL, 'user', '2025-12-22 00:57:41', '2025-12-22 00:57:41'),
(16, 'Mr. Junius Morissette', 'vchristiansen@example.org', '2025-12-22 00:57:41', '$2y$12$xI5eEYFLSYCKkB3iFymzd.81pGAUB/ALFym.J.4398ip/jn.V5ytO', 'dX4dCYmjPc', NULL, NULL, 'user', '2025-12-22 00:57:41', '2025-12-22 00:57:41'),
(17, 'Kennedi McClure II', 'rkris@example.net', '2025-12-22 00:57:41', '$2y$12$xI5eEYFLSYCKkB3iFymzd.81pGAUB/ALFym.J.4398ip/jn.V5ytO', '0yQxY2r2oF', NULL, NULL, 'user', '2025-12-22 00:57:41', '2025-12-22 00:57:41'),
(18, 'Teresa Braun', 'hipolito82@example.net', '2025-12-22 00:58:24', '$2y$12$a8a5TAi0cV13G.flZjYP0./P6Y/EZtKhrWCDIPH.ZreBrXX2wqP7W', '0rwveq6MDq', NULL, NULL, 'user', '2025-12-22 00:58:24', '2025-12-22 00:58:24'),
(20, 'Rebecca Gutkowski', 'anthony52@example.org', '2025-12-22 00:58:24', '$2y$12$a8a5TAi0cV13G.flZjYP0./P6Y/EZtKhrWCDIPH.ZreBrXX2wqP7W', 'Uu85pUZ412', NULL, NULL, 'user', '2025-12-22 00:58:24', '2025-12-22 00:58:24'),
(21, 'Kameron Osinski', 'vkoch@example.com', '2025-12-22 00:58:24', '$2y$12$a8a5TAi0cV13G.flZjYP0./P6Y/EZtKhrWCDIPH.ZreBrXX2wqP7W', 'vzc9NNGKYG', NULL, NULL, 'user', '2025-12-22 00:58:24', '2025-12-22 00:58:24'),
(22, 'Ellsworth Grady', 'kulas.curtis@example.org', '2025-12-22 00:58:24', '$2y$12$a8a5TAi0cV13G.flZjYP0./P6Y/EZtKhrWCDIPH.ZreBrXX2wqP7W', '80jqzo4hLO', NULL, NULL, 'user', '2025-12-22 00:58:24', '2025-12-22 00:58:24'),
(23, 'Freda Jacobs', 'ned.bernier@example.com', '2025-12-22 01:00:50', '$2y$12$LZyJ37WzUQA44Zkmm3VIye.4HeoBigbx2MIZAXY8J1r.q0JSKclr2', 'rTVpr6JC13', NULL, NULL, 'user', '2025-12-22 01:00:50', '2025-12-22 01:00:50'),
(24, 'Kevin Ratke', 'linda08@example.com', '2025-12-22 01:00:50', '$2y$12$LZyJ37WzUQA44Zkmm3VIye.4HeoBigbx2MIZAXY8J1r.q0JSKclr2', 'ST6wRVFwW2', NULL, NULL, 'user', '2025-12-22 01:00:50', '2025-12-22 01:00:50'),
(25, 'Naomi Harber', 'khermann@example.org', '2025-12-22 01:00:50', '$2y$12$LZyJ37WzUQA44Zkmm3VIye.4HeoBigbx2MIZAXY8J1r.q0JSKclr2', 'ihInvWJoNg', NULL, NULL, 'user', '2025-12-22 01:00:50', '2025-12-22 01:00:50'),
(26, 'Sierra Mills', 'eric01@example.com', '2025-12-22 01:00:50', '$2y$12$LZyJ37WzUQA44Zkmm3VIye.4HeoBigbx2MIZAXY8J1r.q0JSKclr2', 'gPeRsm1GEw', NULL, NULL, 'user', '2025-12-22 01:00:50', '2025-12-22 01:00:50'),
(27, 'Ashlee Cassin', 'emely.jacobson@example.net', '2025-12-22 01:00:50', '$2y$12$LZyJ37WzUQA44Zkmm3VIye.4HeoBigbx2MIZAXY8J1r.q0JSKclr2', 'XWndAjG4cp', NULL, NULL, 'user', '2025-12-22 01:00:50', '2025-12-22 01:00:50'),
(28, 'Skyla Wolff', 'isaias.berge@example.org', '2025-12-22 01:01:15', '$2y$12$H2z7yXoNCGB9mjf9g1cIf.C494Nqt540b6Bp4aLaiXktEXJOiQnpW', 'ZDk0AMgMSo', NULL, NULL, 'user', '2025-12-22 01:01:15', '2025-12-22 01:01:15'),
(29, 'Maya McKenzie', 'curt.okon@example.net', '2025-12-22 01:01:15', '$2y$12$H2z7yXoNCGB9mjf9g1cIf.C494Nqt540b6Bp4aLaiXktEXJOiQnpW', 'mR6tBdWJsR', NULL, NULL, 'user', '2025-12-22 01:01:15', '2025-12-22 01:01:15'),
(31, 'Elyssa McGlynn', 'leilani.hansen@example.org', '2025-12-22 01:01:15', '$2y$12$H2z7yXoNCGB9mjf9g1cIf.C494Nqt540b6Bp4aLaiXktEXJOiQnpW', '7er1WW5z0V', NULL, NULL, 'user', '2025-12-22 01:01:15', '2025-12-22 01:01:15'),
(32, 'Marc Pacocha', 'oberbrunner.aaron@example.com', '2025-12-22 01:01:15', '$2y$12$H2z7yXoNCGB9mjf9g1cIf.C494Nqt540b6Bp4aLaiXktEXJOiQnpW', '0ZKqwmT5fZ', NULL, NULL, 'user', '2025-12-22 01:01:15', '2025-12-22 01:01:15'),
(33, 'Dr. Abdullah Fay', 'owill@example.org', '2025-12-22 01:01:37', '$2y$12$CBQovFnUEYAZ8cKvcOf3weSaOc0fNQ4kpyUIITs0GQpwVlVYdn5Fe', 'Kg4Hg0fSpX', NULL, NULL, 'user', '2025-12-22 01:01:37', '2025-12-22 01:01:37'),
(34, 'Miss Vida Rogahn', 'lisandro.cole@example.com', '2025-12-22 01:01:37', '$2y$12$CBQovFnUEYAZ8cKvcOf3weSaOc0fNQ4kpyUIITs0GQpwVlVYdn5Fe', 'hpxE4EzRqn', NULL, NULL, 'user', '2025-12-22 01:01:37', '2025-12-22 01:01:37'),
(35, 'Sheridan Botsford', 'ufahey@example.org', '2025-12-22 01:01:37', '$2y$12$CBQovFnUEYAZ8cKvcOf3weSaOc0fNQ4kpyUIITs0GQpwVlVYdn5Fe', 'wJ29EBeEhu', NULL, NULL, 'user', '2025-12-22 01:01:37', '2025-12-22 01:01:37'),
(37, 'Kaycee Thiel', 'ntoy@example.com', '2025-12-22 01:01:37', '$2y$12$CBQovFnUEYAZ8cKvcOf3weSaOc0fNQ4kpyUIITs0GQpwVlVYdn5Fe', '5btnu6GW4P', NULL, NULL, 'user', '2025-12-22 01:01:37', '2025-12-22 01:01:37'),
(38, 'Dr. Dee Reichert V', 'umetz@example.org', '2025-12-22 01:02:11', '$2y$12$b5AyqBcS9CdwQFVjAkhidOvFeh8LpZg0kiS8AE7VJNK2GTa7a90K2', '5teYPCtot2', NULL, NULL, 'user', '2025-12-22 01:02:11', '2025-12-22 01:02:11'),
(39, 'Julia Barrows', 'eva39@example.com', '2025-12-22 01:02:11', '$2y$12$b5AyqBcS9CdwQFVjAkhidOvFeh8LpZg0kiS8AE7VJNK2GTa7a90K2', 'L2kacBwNH2', NULL, NULL, 'user', '2025-12-22 01:02:11', '2025-12-22 01:02:11'),
(42, 'Dr. Gwendolyn Orn', 'khill@example.org', '2025-12-22 01:02:11', '$2y$12$b5AyqBcS9CdwQFVjAkhidOvFeh8LpZg0kiS8AE7VJNK2GTa7a90K2', 'JePXMMWUyh', NULL, NULL, 'user', '2025-12-22 01:02:11', '2025-12-22 01:02:11'),
(43, 'Watevr', 'bukanorang795@gmail.com', NULL, '$2y$12$evAbW2eWPzOmQLbo9Rq6/.Qr7xfMJu44x1ZW0luScNqIDxwflOGxy', NULL, NULL, NULL, 'user', '2025-12-22 01:04:17', '2025-12-22 01:04:17'),
(44, 'John Traveler', 'john.traveler@example.com', '2025-11-14 17:00:00', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', NULL, '+628123456789', NULL, 'user', '2025-11-10 01:30:00', '2025-12-15 03:20:00'),
(45, 'Lisa Explorer', 'lisa.explorer@example.com', '2025-10-19 17:00:00', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', NULL, '+628987654321', NULL, 'user', '2025-10-15 07:45:00', '2025-12-20 02:15:00'),
(47, 'Sarah Adventurer', 'sarah.adventurer@example.com', '2025-08-29 17:00:00', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', NULL, '+628556677889', NULL, 'user', '2025-08-25 02:10:00', '2025-12-05 07:25:00'),
(48, 'Michael Wanderer', 'michael.wanderer@example.com', '2025-07-14 17:00:00', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', NULL, '+628998877665', NULL, 'user', '2025-07-10 06:35:00', '2025-12-25 04:50:00'),
(49, 'Hotel Staff 1', 'staff1@hotelify.test', '2025-06-09 17:00:00', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', NULL, '+628123123123', NULL, 'staff', '2025-06-05 03:15:00', '2025-12-28 01:30:00'),
(50, 'Hotel Staff 2', 'staff2@hotelify.test', '2025-05-19 17:00:00', '$2y$12$O7hASkXBTkhQ7h0xj9pArO9h3QegOoGfLhyRfVmC3D4zZqAoQJ2U.', NULL, '+628456456456', NULL, 'staff', '2025-05-15 08:40:00', '2025-12-22 05:45:00'),
(51, 'Citra Kirana', 'citra@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567001', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(52, 'Dimas Anggara', 'dimas@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567002', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(53, 'Eka Gustiwana', 'eka@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567003', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(54, 'Fatin Shidqia', 'fatin@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567004', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(55, 'Gading Marten', 'gading@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567005', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(56, 'Hesti Purwadinata', 'hesti@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567006', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(57, 'Irfan Hakim', 'irfan@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567007', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(58, 'Jessica Mila', 'jessica@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567008', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(59, 'Kunto Aji', 'kunto@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567009', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(60, 'Luna Maya', 'luna@example.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081234567010', NULL, 'user', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(61, 'Admin Manager', 'manager2@hotelify.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '089999999888', NULL, 'admin', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(62, 'Resepsionis Malam', 'receptionist@hotelify.com', '2025-12-30 07:35:53', '$2y$12$v63GDwIDbwgBLbXd880bD.vkZnUqHUyQT1TI5UCdw6Q5aWfXNIAxq', NULL, '081111112222', NULL, 'staff', '2025-12-30 07:35:53', '2025-12-30 07:35:53'),
(63, 'test@email.com', 'test@email.com', NULL, '$2y$12$4NGXiGO1WK5EVUokZgWAW.xcb9LWC/pnUspW5.f3FnANOcYI8Asm2', NULL, NULL, NULL, 'user', '2025-12-30 02:12:02', '2025-12-30 02:12:02'),
(64, 'coba@gmail.com', 'coba@gmail.com', NULL, '$2y$12$YcmeLC3zkFBO/dDWsFdhL./befZdma0WuOfgAMlz9LyvuXegihtrW', NULL, NULL, NULL, 'user', '2025-12-30 02:13:58', '2025-12-30 02:13:58'),
(65, 'cobaakun', 'cobaakun@gmail.com', NULL, '$2y$12$S651.Bhz4yfut4mhzXwXEeZSfICElfXekhlLX3gJsKsS1O19No57S', NULL, NULL, NULL, 'user', '2025-12-30 02:19:28', '2025-12-30 02:19:28'),
(66, 'Fadhil1', 'fadhil1@gmail.com', NULL, '$2y$12$hLK8yGdk25lwgqbmbT6SCu5bfv7HaD4qtSwjT0J/F4e7itxk1uP/a', NULL, '087824584500', 'profile-photos/tp2la48zwOkAWP0kNEti5oDMbkbspuoLuGQSEeJE.jpg', 'user', '2025-12-30 03:33:24', '2025-12-30 04:00:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`),
  ADD KEY `blog_posts_author_id_foreign` (`author_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_booking_code_unique` (`booking_code`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cancellations`
--
ALTER TABLE `cancellations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancellations_booking_id_foreign` (`booking_id`),
  ADD KEY `cancellations_user_id_foreign` (`user_id`),
  ADD KEY `cancellations_processed_by_foreign` (`processed_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `cancellations`
--
ALTER TABLE `cancellations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cancellations`
--
ALTER TABLE `cancellations`
  ADD CONSTRAINT `cancellations_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cancellations_processed_by_foreign` FOREIGN KEY (`processed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cancellations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
