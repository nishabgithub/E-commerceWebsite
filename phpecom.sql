-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 08:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(191) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` bigint(100) NOT NULL,
  `place` mediumtext NOT NULL,
  `area` varchar(191) NOT NULL,
  `landmark` varchar(191) NOT NULL,
  `pincode` int(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `cart_total` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `tracking_no`, `user_id`, `name`, `email`, `number`, `place`, `area`, `landmark`, `pincode`, `city`, `state`, `cart_total`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(20, 'user507983077978', 62, 'Deepa solanki', '', 7683077978, 'A4, building type1 police fire station', '  sector 58', 'nera police station', 201301, '  noida', 'Uttrakhand', 3600, 'COD', NULL, 0, NULL, '2024-02-15 11:33:03'),
(25, 'user928534567890', 66, 'sara', '', 1234567890, 'kjaukhdc', 'aisoisdc', 'oajdjad', 201301, 'lkasoa', 'Uttrakhand', 1500, 'COD', NULL, 0, NULL, '2024-02-21 10:59:14'),
(26, 'user743500773209', 62, 'Monika', '', 8800773209, 'Sec-4', '                Rohini', 'opposite Police station', 110090, '                delhi', '               Uttrakhand', 0, '', NULL, 0, NULL, '2024-02-23 06:31:54'),
(27, 'user258767565433', 64, 'gini', '', 7867565433, 'fusion homes', 'sector 30', 'near cheer county', 201301, 'noida', 'Uttrakhand', 0, '', NULL, 0, NULL, '2024-02-28 08:00:16'),
(29, 'user249483077978', 61, 'deepasolanki', '', 7683077978, 'Building type 1 , Room no A4 , police Fire Station ', 'sector-58', 'nera police station', 201301, 'noida', 'Uttrakhand', 0, '', NULL, 0, NULL, '2024-04-09 06:54:35'),
(30, 'user209983077978', 61, 'vishal', 'deepasolanki8403@gmail.com', 7683077978, 'archana enclave', 'khoda', 'near sahil public school', 201301, 'noida', 'Uttrakhand', 0, '', NULL, 0, NULL, '2024-04-09 09:50:08'),
(31, 'user787583077978', 68, 'deepa solanki', 'deepasolanki8403@gmail.com', 7683077978, 'Building type 1 room A4 police fire station', 'sector 58', 'near police station', 201301, 'noida', 'Uttrakhand', 0, '', NULL, 0, NULL, '2024-04-10 05:56:16'),
(32, 'user194283077978', 69, 'monika', 'deepa@gmail.com', 7683077978, 'hiuse', 'gali', 'mohalla', 345678, 'noida', 'Uttrakhand', 0, '', NULL, 0, NULL, '2024-04-10 06:31:55'),
(33, 'user284097811060', 71, 'Aryan', 'kularyan00@gmail.com', 6397811060, 'gali', 'mohalla', 'as pass', 555555, 'noida', 'Uttrakhand', 0, '', NULL, 0, NULL, '2024-04-10 08:04:39'),
(34, 'user569983077978', 72, 'deepasolanki', 'deepasolanki8403@gmail.com', 7683077978, 'building type 1 , A4 , Police fire station', ' sector 58', 'near police station', 201301, ' noida', 'Uttarpradesh', 0, '', NULL, 0, NULL, '2024-04-17 10:17:34'),
(35, 'user795576543210', 74, 'Nisha Bhardwaj', 'nisha@gmail.com', 9876543210, 'noida', 'bahlolpur', 'near RSM school', 343242, 'noida', 'Uttrakhand', 0, '', NULL, 0, NULL, '2024-05-28 07:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `size`, `prod_qty`, `created_at`) VALUES
(91, 62, 5, 'S', 2, '2024-04-02 09:36:59'),
(125, 62, 25, 'M', 2, '2024-05-08 10:00:50'),
(126, 72, 4, 'S', 1, '2024-05-22 08:02:05'),
(129, 74, 12, 'S', 1, '2024-05-28 07:36:09'),
(130, 74, 10, 'S', 1, '2024-05-28 07:36:23'),
(131, 75, 19, 'S', 4, '2024-07-03 07:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_arrival` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `new_arrival`) VALUES
(11, 'Skirts', 'Skirts', 'Korean cute Mini Skirts', 0, 1, '1712644543.webp', '', ' ', 'cute korean mini skirts', '2024-01-16 08:09:56', 1),
(12, 'shirt', 'shirt', 'womens shirts', 0, 1, '1705393040.webp', '', ' ', 'womens shirt', '2024-01-16 08:17:20', 0),
(13, 'Trousers', 'Trousers', 'womens Trousers', 0, 1, '1712645423.webp', 'womens Trousers', ' womens Trousers', 'womens Trousers', '2024-01-16 08:20:18', 0),
(14, 'saree', 'saree', 'silk saree', 0, 1, '1712644723.webp', 'silk saree', ' silk saree', 'silk saree', '2024-01-16 08:22:19', 0),
(15, 'Suit', 'Suit', 'womens party  suit', 0, 1, '1705393469.webp', 'party suit', ' party suit', 'party suit', '2024-01-16 08:24:29', 0),
(16, 'Dresess', 'Dresses', 'one piece dresses', 0, 1, '1705394345.webp', 'one piece', ' one piece', 'one piece', '2024-01-16 08:39:05', 0),
(17, 'crop top', 'crop top', 'womens crop top', 0, 1, '1712644679.webp', 'womens crop top', ' womens crop top', 'womens crop top', '2024-01-16 08:41:26', 0),
(18, 'cargo', 'cargo', 'cargo pants', 0, 1, '1712645302.jpg', 'cargo pants', ' cargo pants', 'cargo pants', '2024-01-16 08:42:56', 0),
(20, 'jacket', 'jacket', 'womens jacket', 1, 0, '1705734389.jpg', 'womens jacket', ' womens jacket', 'womens jacket', '2024-01-20 07:06:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`) VALUES
(1, 'monika@gmail.com'),
(3, 'putan3885@gmail.com'),
(4, 'putan@gmail.com'),
(5, 'putan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `cart_total` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `size` varchar(11) DEFAULT NULL,
  `payment_id` varchar(100) NOT NULL,
  `order_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `cart_total`, `created_at`, `size`, `payment_id`, `order_status`) VALUES
(74, 26, 7, 1, 1200, '2024-03-15 07:02:52', 'M', 'pay_NmXdJxRz3GHqdy', 'delivered'),
(75, 26, 5, 1, 1500, '2024-03-15 07:02:52', 'S', 'pay_NmXdJxRz3GHqdy', 'out for delivery'),
(76, 26, 4, 1, 1200, '2024-03-19 07:05:10', 'S', 'pay_No7oDUkOvh9u5a', 'out for delivery'),
(77, 27, 7, 2, 2400, '2024-03-21 08:58:53', 'S', 'pay_NowoYkoSOvMjky', 'Ordered'),
(78, 26, 7, 1, 1200, '2024-03-30 07:19:51', 'S', 'pay_NsTw3GyAwirz5K', 'Ordered'),
(79, 29, 26, 2, 980, '2024-04-09 06:55:04', 'S', 'pay_NwQr4PSMffA1ru', 'Ordered'),
(80, 30, 7, 1, 1200, '2024-04-09 09:51:13', 'S', 'pay_NwTr8osch6odnp', 'Ordered'),
(81, 30, 17, 1, 2000, '2024-04-09 10:26:59', 'L', 'pay_NwUSw0vXZhFXfv', 'Ordered'),
(82, 30, 7, 1, 1200, '2024-04-09 10:44:42', 'S', 'pay_NwUldlAY9y4faE', 'Ordered'),
(83, 30, 13, 1, 600, '2024-04-09 10:46:42', 'S', 'pay_NwUnjuSBWYKmIn', 'Ordered'),
(84, 30, 8, 1, 1200, '2024-04-09 10:56:30', 'S', 'pay_NwUy6LxX0Wh48o', 'Ordered'),
(85, 30, 12, 1, 600, '2024-04-09 12:03:51', 'S', 'pay_NwW7FgPSIGUg2e', 'Ordered'),
(86, 30, 5, 1, 1500, '2024-04-09 12:10:55', 'M', 'pay_NwWEi2B6jW9xNG', 'Ordered'),
(87, 31, 5, 1, 1500, '2024-04-10 05:56:43', 'S', 'pay_NwoOWb9H9Hu0iM', 'Ordered'),
(88, 31, 7, 1, 1200, '2024-04-10 06:04:26', 'S', 'pay_NwoWgwU1utmuAD', 'Ordered'),
(89, 31, 24, 1, 999, '2024-04-10 06:08:31', 'S', 'pay_Nwob07edHcyizv', 'Ordered'),
(90, 31, 16, 1, 1800, '2024-04-10 06:12:35', 'S', 'pay_NwofImx9A1MHLx', 'Ordered'),
(91, 31, 13, 1, 600, '2024-04-10 06:16:43', 'S', 'pay_NwojfWgbIwDeC5', 'Ordered'),
(92, 31, 18, 1, 5000, '2024-04-10 06:19:23', 'S', 'pay_NwomTnHd3HBFZF', 'Ordered'),
(93, 31, 7, 1, 1200, '2024-04-10 06:21:56', 'S', 'pay_NwopAJ0Tz7e9B2', 'Ordered'),
(94, 31, 8, 1, 1200, '2024-04-10 06:27:31', 'S', 'pay_Nwov4qgRmPFhIe', 'Ordered'),
(95, 32, 4, 1, 1200, '2024-04-10 06:32:13', 'S', 'pay_Nwp03CLW4LZsbC', 'Ordered'),
(96, 32, 13, 1, 600, '2024-04-10 06:33:32', 'S', 'pay_Nwp1OwLOqwimaY', 'Ordered'),
(97, 32, 26, 1, 490, '2024-04-10 06:37:00', 'S', 'pay_Nwp55PAoDctMVZ', 'Ordered'),
(98, 32, 7, 1, 1200, '2024-04-10 06:40:44', 'S', 'pay_Nwp91TKzlfF1YQ', 'Ordered'),
(99, 32, 7, 1, 1200, '2024-04-10 06:42:10', 'S', 'pay_NwpAW53zL21219', 'Ordered'),
(100, 32, 8, 1, 1200, '2024-04-10 06:46:39', 'S', 'pay_NwpFDvDmaI7d27', 'Ordered'),
(101, 32, 7, 1, 1200, '2024-04-10 06:52:35', 'S', 'pay_NwpLXEHLP54pix', 'Ordered'),
(102, 32, 5, 1, 1500, '2024-04-10 06:56:44', 'S', 'pay_NwpPumoa9ePrIL', 'Ordered'),
(103, 32, 8, 1, 1200, '2024-04-10 07:00:19', 'S', 'pay_NwpTjDQDTW5rfE', 'Ordered'),
(104, 32, 13, 1, 600, '2024-04-10 07:02:47', 'S', 'pay_NwpWJn9T3Eiugf', 'Ordered'),
(105, 32, 19, 1, 4200, '2024-04-10 07:05:20', 'S', 'pay_NwpZ1QyxpOG0r4', 'Ordered'),
(106, 32, 10, 1, 1500, '2024-04-10 07:06:12', 'S', 'pay_NwpZwHA2g63o11', 'Ordered'),
(107, 32, 9, 1, 1500, '2024-04-10 07:07:31', 'S', 'pay_NwpbJhHd3BOOPL', 'Ordered'),
(108, 33, 7, 1, 1200, '2024-04-10 08:04:59', 'S', 'pay_Nwqa2MTRa0zUXi', 'Ordered'),
(109, 34, 5, 2, 3000, '2024-04-17 10:17:57', 'M', 'pay_NzeaKqqOvQOJKt', 'Ordered'),
(110, 34, 5, 1, 1500, '2024-04-23 07:44:40', 'L', 'pay_O1zB7idRAtn7Ss', 'Ordered'),
(111, 34, 5, 2, 3000, '2024-05-21 11:22:55', 'S', 'pay_OD7r5ZE2uVGAAF', 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_arrival` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `new_arrival`) VALUES
(4, 11, 'Mini Skirt', 'Mini Skirt1', 'Girls Solid High Waist Flared Skater Short Mini Skirt', 'Girls Solid High Waist Flared Skater Short Mini Skirt', 1500, 1200, '1705559656.webp', 1, 0, 1, 'Girls Solid High Waist Flared Skater Short Mini Skirt', 'Girls Solid High Waist Flared Skater Short Mini Skirt', 'This skirts are simple plain without built-in short. But look classic and fabulous..\r\nFabric that breathes, is made to last and is good for you. Highly stretchable, soft and smooth in touch.\r\nA flexible design that addresses gaining or losing a few pounds\r\nClassic shapes and smart fabrications outlive trendy fads\r\nPull On Closure. Elasticated Waistband -I- Stretchable Fabric', '2024-01-18 06:34:16', 0),
(5, 11, 'Mini Skirts', 'Mini Skirt2', 'Womens High Cotton Waist Flared Knit Skart Short Stylish Skirt', 'Womens High Cotton Waist Flared Knit Skart Short Stylish Skirt', 1800, 1500, '1705559926.webp', 1, 0, 1, 'Womens High Cotton Waist Flared Knit Skart Short Stylish Skirt', 'Womens High Cotton Waist Flared Knit Skart Short Stylish Skirt', 'This skirts are simple plain without built-in short. But look classic and fabulous..\r\nFabric that breathes, is made to last and is good for you. Highly stretchable, soft and smooth in touch.\r\nA flexible design that addresses gaining or losing a few pounds\r\nClassic shapes and smart fabrications outlive trendy fads\r\nPull On Closure. Elasticated Waistband -I- Stretchable Fabric', '2024-01-18 06:38:46', 1),
(7, 11, 'Mini Skirt', 'Mini Skirt3', 'Womens Versatile Stretchy Flared High Waist All Time Trendy Plain Mini Skirt Skater', ' All Time Trendy Plain Mini Skirt Skater', 1900, 1200, '1705560189.webp', 1, 0, 1, 'Womens Versatile Stretchy Flared High Waist All Time Trendy Plain Mini Skirt Skater', 'Womens Versatile Stretchy Flared High Waist All Time Trendy Plain Mini Skirt Skater', 'This skirts are simple plain without built-in short. But look classic and fabulous..\r\nFabric that breathes, is made to last and is good for you. Highly stretchable, soft and smooth in touch.\r\nA flexible design that addresses gaining or losing a few pounds\r\nClassic shapes and smart fabrications outlive trendy fads\r\nPull On Closure. Elasticated Waistband -I- Stretchable Fabric', '2024-01-18 06:43:09', 1),
(8, 11, 'Mini Skirt', 'Mini Skirt4', 'Tomesect Womens Cotton  Midi Skirt with short height', 'Tomesect Womens Cotton  Midi Skirt with short height', 1400, 1200, '1705560379.webp', 1, 0, 1, 'Tomesect Womens Midi Skirt', 'Tomesect Womens Midi Skirt', 'This skirts are simple plain without built-in short. But look classic and fabulous..\r\nFabric that breathes, is made to last and is good for you. Highly stretchable, soft and smooth in touch.\r\nA flexible design that addresses gaining or losing a few pounds\r\nClassic shapes and smart fabrications outlive trendy fads\r\nPull On Closure. Elasticated Waistband -I- Stretchable Fabric', '2024-01-18 06:46:19', 0),
(9, 11, 'Mini Skirt', 'Mini Skirt5', 'Summer Collection New Morden Design for womens', 'Summer Collection New Morden Design for womens', 1800, 1500, '1705563776.webp', 1, 0, 1, 'Summer Collection New Morden Design for womens', 'Summer Collection New Morden Design for womens', 'This skirts are simple plain without built-in short. But look classic and fabulous..\r\nFabric that breathes, is made to last and is good for you. Highly stretchable, soft and smooth in touch.\r\nA flexible design that addresses gaining or losing a few pounds\r\nClassic shapes and smart fabrications outlive trendy fads\r\nPull On Closure. Elasticated Waistband -I- Stretchable Fabric', '2024-01-18 07:41:50', 0),
(10, 14, 'saree', 'sari2', 'Yashika Womens Saree', 'Yashika  Silk fabric sarees for womens', 2000, 1500, '1706167635.webp', 1, 0, 1, 'Yashika Womens Saree', 'Yashika Womens Saree', 'Yashika Womens Saree', '2024-01-25 07:27:15', 1),
(11, 12, ' Cotton shirt', 'shirt1', 'Regular Fit Striped White Colour Cotton shirt', 'Regular Fit Striped White Colour Cotton shirt', 600, 500, '1711435395.jpg', 10, 0, 0, 'Regular Fit Striped White Colour Cotton shirt', 'Regular Fit Striped White Colour Cotton shirt', 'Regular Fit Striped White Colour Cotton shirt', '2024-03-26 06:43:15', 1),
(12, 12, ' collar crop top ', 'Cinnamon brown collar crop top for women', 'Cinnamon brown collar crop top for women', 'Cinnamon brown collar crop top for women', 700, 600, '1711435710.webp', 10, 0, 1, 'Cinnamon brown collar crop top for women', 'Cinnamon brown collar crop top for women', 'Cinnamon brown collar crop top for women', '2024-03-26 06:48:30', 0),
(13, 12, ' Striped Shirt ', 'Couture Red Striped Shirt Style Pure Cotton', 'Couture Red Striped Shirt Style Pure Cotton', 'Couture Red Striped Shirt Style Pure Cotton', 1000, 600, '1711435886.webp', 10, 0, 1, 'Couture Red Striped Shirt Style Pure Cotton', 'Couture Red Striped Shirt Style Pure Cotton', 'Couture Red Striped Shirt Style Pure Cotton', '2024-03-26 06:51:26', 0),
(14, 12, ' Chic Shirt', 'Women Stylish Tie & Dye Chic Shirt', 'Women Stylish Tie & Dye Chic Shirt', 'Women Stylish Tie & Dye Chic Shirt', 900, 900, '1711436016.webp', 12, 0, 0, 'Women Stylish Tie & Dye Chic Shirt', 'Women Stylish Tie & Dye Chic Shirt', 'Women Stylish Tie & Dye Chic Shirt', '2024-03-26 06:53:36', 0),
(15, 13, 'KOTTY Women', 'KOTTY Women Polyester Blend Solid Trousers', 'KOTTY Women Polyester Blend Solid Trousers', 'KOTTY Women Polyester Blend Solid Trousers', 2200, 2000, '1711436319.webp', 10, 0, 1, 'KOTTY Women Polyester Blend Solid Trousers', 'KOTTY Women Polyester Blend Solid Trousers', 'KOTTY Women Polyester Blend Solid Trousers', '2024-03-26 06:58:39', 0),
(16, 13, 'Straight Fit Trousers', 'Womens Polyester Blend Straight Fit Trousers', 'Womens Polyester Blend Straight Fit Trousers', 'Womens Polyester Blend Straight Fit Trousers', 2000, 1800, '1711436585.webp', 10, 0, 1, 'Womens Polyester Blend Straight Fit Trousers', 'Womens Polyester Blend Straight Fit Trousers', 'Womens Polyester Blend Straight Fit Trousers', '2024-03-26 07:03:05', 0),
(17, 13, ' High-Waisted Pant ', ' High-Waisted Pant | Casual Office Straight Leg Trouser', ' High-Waisted Pant | Casual Office Straight Leg Trouser', ' High-Waisted Pant | Casual Office Straight Leg Trouser', 6500, 2000, '1711436722.webp', 10, 0, 0, ' High-Waisted Pant | Casual Office Straight Leg Trouser', ' High-Waisted Pant | Casual Office Straight Leg Trouser', ' High-Waisted Pant | Casual Office Straight Leg Trouser', '2024-03-26 07:05:22', 0),
(18, 14, 'Inddus Women ', 'Inddus Wo', 'Inddus Women Embellished Sequinned Embroidered Satin', 'Inddus Women Embellished Sequinned Embroidered Satin', 7000, 5000, '1711436948.webp', 12, 0, 0, 'Inddus Women Embellished Sequinned Embroidered Satin', 'Inddus Women Embellished Sequinned Embroidered Satin', 'Inddus Women Embellished Sequinned Embroidered Satin', '2024-03-26 07:09:08', 0),
(19, 14, 'Women Organza ', 'Women Organza ', 'Women Organza Silk Fabric Saree With  Real Mirror Work Pink Saree', 'Women Organza Silk Fabric Saree With  Real Mirror Work Pink Saree', 5000, 4200, '1711437149.webp', 20, 0, 1, 'Women Organza Silk Fabric Saree With  Real Mirror Work Pink Saree', 'Women Organza Silk Fabric Saree With  Real Mirror Work Pink Saree', 'Women Organza Silk Fabric Saree With  Real Mirror Work Pink Saree', '2024-03-26 07:12:29', 0),
(20, 15, ' Kurti and Dupatta Set.', 'Kurti and Dupatta Set.', 'Dupatta with Beautiful Multi Colour Kurti and Dupatta Set.', 'Dupatta with Beautiful Multi Colour Kurti and Dupatta Set.', 750, 500, '1711437452.jpg', 50, 0, 1, 'Dupatta with Beautiful Multi Colour Kurti and Dupatta Set.', 'Dupatta with Beautiful Multi Colour Kurti and Dupatta Set.', 'Fabric : cotton\r\n\r\nColor: multi\r\n\r\nPackage contain: 1 suit , 1 pants and dupatta\r\n\r\nwash: Dry clean\r\n', '2024-03-26 07:17:32', 0),
(21, 15, ' Multi Colour Kurti ', ' Multi Colour Kurti ', 'Dupatta with Beautiful Multi Colour Kurti and Dupatta Set.', 'Dupatta with Beautiful Multi Colour Kurti and Dupatta Set.', 1800, 1500, '1711437533.webp', 10, 0, 0, 'Dupatta with Beautiful Multi Colour Kurti and Dupatta Set.', 'Dupatta with Beautiful Multi Colour Kurti and Dupatta Set.', 'Dupatta with Beautiful Multi Colour Kurti and Dupatta Set.', '2024-03-26 07:18:53', 0),
(22, 15, 'Pants Suit Set ', 'Pants Suit Set ', 'Mabish By Sonal Jain Pants Suit Set with Printed Jacket For Women', 'Mabish By Sonal Jain Pants Suit Set with Printed Jacket For Women', 2070, 1700, '1711437641.webp', 30, 0, 0, 'Mabish By Sonal Jain Pants Suit Set with Printed Jacket For Women', 'Mabish By Sonal Jain Pants Suit Set with Printed Jacket For Women', 'Mabish By Sonal Jain Pants Suit Set with Printed Jacket For Women', '2024-03-26 07:20:41', 0),
(23, 16, 'Sheath Dress', ' Sheath Dress', 'Athena Women Solid Sheath Dress by clara couture', 'Athena Women Solid Sheath Dress by clara couture', 1272, 1128, '1711438236.webp', 12, 0, 1, 'Athena Women Solid Sheath Dress by clara couture', 'Athena Women Solid Sheath Dress by clara couture', 'Athena Women Solid Sheath Dress by clara couture', '2024-03-26 07:30:36', 0),
(24, 16, 'Cocktail Style Corset', 'Cocktail Style Corset ', 'Cocktail Style Corset Detail Bodycon One Piece Dress ', 'Cocktail Style Corset Detail Bodycon One Piece Dress ', 1098, 999, '1711438443.webp', 12, 0, 1, 'Cocktail Style Corset Detail Bodycon One Piece Dress In Latte Tone', 'Cocktail Style Corset Detail Bodycon One Piece Dress In Latte Tone', 'Cocktail Style Corset Detail Bodycon One Piece Dress In Latte Tone', '2024-03-26 07:34:03', 0),
(25, 16, 'TALLY WEiJL ', 'TALLY WEiJL ', 'TALLY WEiJL Ribbed Bodycon Dress For Women', 'TALLY WEiJL Ribbed Bodycon Dress For Women', 2200, 1800, '1711438646.webp', 12, 0, 0, 'TALLY WEiJL Ribbed Bodycon Dress For Women', 'TALLY WEiJL Ribbed Bodycon Dress For Women', 'TALLY WEiJL Ribbed Bodycon Dress For Women', '2024-03-26 07:37:26', 0),
(26, 17, 'Istyle Can ', 'Istyle Can ', 'Istyle Can Women Solid Cotton Rib Knit Crop Tank Top', 'Istyle Can Women Solid Cotton Rib Knit Crop Tank Top', 999, 490, '1711438860.jpg', 11, 0, 1, 'Istyle Can Women Solid Cotton Rib Knit Crop Tank Top', 'Istyle Can Women Solid Cotton Rib Knit Crop Tank Top', 'Istyle Can Women Solid Cotton Rib Knit Crop Tank Top', '2024-03-26 07:41:00', 0),
(27, 17, ' Ruched Front Puff ', 'Ruched Front Puff ', 'Sweetheart Neck Ruched Front Puff Sleeve/Half Sleeve', 'Sweetheart Neck Ruched Front Puff Sleeve/Half Sleeve', 800, 400, '1711438998.jpg', 23, 0, 1, 'Sweetheart Neck Ruched Front Puff Sleeve/Half Sleeve', 'Sweetheart Neck Ruched Front Puff Sleeve/Half Sleeve', 'Sweetheart Neck Ruched Front Puff Sleeve/Half Sleeve', '2024-03-26 07:43:18', 1),
(28, 17, 'Souled Store ', 'Souled Store ', 'Souled Store Original Varsity Green Women Oversized Crop Top', 'Souled Store Original Varsity Green Women Oversized Crop Top', 954, 899, '1711439211.webp', 21, 0, 0, 'Souled Store Original Varsity Green Women Oversized Crop Top', 'Souled Store Original Varsity Green Women Oversized Crop Top', 'Souled Store Original Varsity Green Women Oversized Crop Top', '2024-03-26 07:46:51', 0),
(29, 18, ' Women Cargo Pants', ' Women Cargo Pants', ' Women Cargo Pants with high and stretchable waist ', ' Women Cargo Pants with high and stretchable waist ', 3200, 2100, '1711439540.jpg', 12, 0, 0, ' Women Cargo Pants with high and stretchable waist ', ' Women Cargo Pants with high and stretchable waist ', ' Women Cargo Pants with high and stretchable waist ', '2024-03-26 07:52:20', 0),
(30, 18, 'Zizvo ', 'Zizvo ', 'Zizvo High Rise Cargo Pants with Flap Pockets For Women', 'Zizvo High Rise Cargo Pants with Flap Pockets For Women', 779, 680, '1711439707.webp', 13, 0, 1, 'Zizvo High Rise Cargo Pants with Flap Pockets For Women', 'Zizvo High Rise Cargo Pants with Flap Pockets For Women', 'Zizvo High Rise Cargo Pants with Flap Pockets For Women', '2024-03-26 07:55:07', 1),
(31, 18, 'Velcro High-Rise ', 'Velcro High-Rise ', 'Velcro High-Rise Brown Cargo Pants with side pockets', 'Velcro High-Rise Brown Cargo Pants with side pockets', 3286, 2269, '1711439971.webp', 12, 0, 1, 'Velcro High-Rise Brown Cargo Pants with side pockets', 'Velcro High-Rise Brown Cargo Pants with side pockets', 'Velcro High-Rise Brown Cargo Pants with side pockets', '2024-03-26 07:59:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Sno` int(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` bigint(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Sno`, `name`, `email`, `number`, `password`, `role_as`) VALUES
(62, 'monika', 'monika@gmail.com', 1234567890, 'qwe', 0),
(63, 'baby', 'b@gmail.com', 2147483647, 'upi90', 0),
(64, 'gini', 'gini@gmail.com', 2147483647, 'cuckoo', 0),
(65, 'Mona', 'cmona50@gmail.com', 2147483647, 'mona', 0),
(66, 'akansha singh', 'akansha@gmail.com', 2147483647, '90', 0),
(67, 'saiba', 'saiba@gmail.com', 2147483647, '1234', 1),
(69, 'monika', 'deepasolanki8403@gmail.com', 2147483647, 'monika', 0),
(71, 'Aryan', 'kularyan00@gmail.com', 6397811060, 'roshini', 0),
(72, 'Deepa Solanki', 'deepasolanki8403@gmail.com', 7683077978, 'jaimatadi', 1),
(73, 'aradhya', 'sharma@gmail.com', 8800773209, 'chalbasi', 0),
(74, 'nisha', 'nisha@gmail.com', 9876543210, 'nisha@123', 0),
(75, 'Monty', 'monty@gmail.com', 9876543210, 'monty', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `prod_id`, `created_at`) VALUES
(101, 64, 8, '2024-03-19 07:43:17'),
(104, 64, 10, '2024-03-21 10:48:41'),
(109, 64, 28, '2024-03-27 05:35:11'),
(110, 64, 26, '2024-03-27 11:17:44'),
(113, 62, 31, '2024-03-28 05:12:57'),
(119, 62, 27, '2024-03-28 11:26:19'),
(121, 62, 22, '2024-03-28 12:15:21'),
(122, 62, 8, '2024-03-29 05:28:58'),
(123, 61, 7, '2024-04-03 12:25:21'),
(124, 61, 26, '2024-04-03 12:25:50'),
(125, 72, 12, '2024-04-16 04:50:44'),
(126, 72, 31, '2024-04-16 04:51:28'),
(129, 74, 9, '2024-05-28 07:28:37'),
(131, 74, 5, '2024-05-28 07:28:44'),
(132, 74, 24, '2024-05-28 07:29:03'),
(133, 74, 12, '2024-05-28 07:36:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
