-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-01-2025 a las 03:05:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clothing-shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_job`) VALUES
(2, 'Administrator', 'admin@mail.com', '1234', 'user-profile-min.png', '7777775500', 'Front-End Developer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` decimal(10,2) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(10) DEFAULT NULL,
  `coupon_used` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(1, 1, 'Descuento Navidad', 50.00, 'XMAS50', 100, 20),
(2, 5, 'Descuento Verano', 30.00, 'SUMMER30', 200, 80),
(3, 10, 'Descuento Black Friday', 75.00, 'BF75', 50, 10),
(4, 15, 'Descuento Año Nuevo', 40.00, 'NEWYEAR40', 150, 49),
(5, 20, 'Descuento de Invierno', 60.00, 'WINTER60', 80, 21);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(1, 'Dael', 'dholde0@trellian.com', 'gC6))m', 'Indonesia', 'Winduraja', 'Apt 896', '8574198838', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png'),
(2, 'Caspar', 'cleng1@nytimes.com', 'sK0v	', 'Russia', 'Yelets', 'PO Box 44640', '1318131154', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png'),
(3, 'Priscella', 'pstrode2@omniture.com', 'kG1rG+v', 'France', 'Lyon', 'PO Box 56279', '8230733023', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(4, 'Donnamarie', 'dmaffei3@weibo.com', 'cB22', 'United Kingdom', 'Milton', 'Suite 61', '3170220721', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(5, 'Rorie', 'rlivingstone4@home.pl', 'kR5)', 'China', 'Huo-erqi', 'Suite 63', '8422986299', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(6, 'Barnard', 'baylett5@un.org', 'lW8$', 'Canada', 'High River', 'Suite 44', '3083903057', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png'),
(7, 'Janella', 'jtuminini6@yolasite.com', 'yZ8q9', 'China', 'Hengshui', 'Apt 432', '6790308776', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(8, 'Aldon', 'apibworth7@home.pl', 'dV2TFW', 'Indonesia', 'Cibeureum', 'Room 1509', '4763748521', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png'),
(9, 'Nixie', 'nslaughter8@sitemeter.com', 'jO5{4~!L', 'China', 'Jingzhou', 'Suite 88', '9165800087', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(10, 'Moise', 'mbreinl9@usda.gov', 'eW1*', 'New Zealand', 'Paihia', 'Suite 52', '2349187403', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png'),
(11, 'Jolie', 'jransoma@who.int', 'sV79IM', 'China', 'Xihuachi', 'Apt 1169', '2579740562', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(12, 'Brita', 'bdyeb@who.int', 'zC1P', 'China', 'Sanrao', 'PO Box 6883', '9464380977', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(13, 'Belva', 'bwhifec@artisteer.com', 'qD4e', 'China', 'Guyi', 'PO Box 93864', '8327244191', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(14, 'Tildie', 'tkeeld@liveinternet.ru', 'qY6}#', 'Croatia', 'Podhum', 'Apt 1956', '7767772888', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(15, 'Muffin', 'mlevee@themeforest.net', 'oA8F&G', 'China', 'Yonggu', 'Room 325', '3668838836', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png'),
(16, 'Sibella', 'sdoudneyf@slate.com', 'xR3C6!>a', 'China', 'Zhujiang', 'Room 6', '5571429062', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(17, 'Dominique', 'dmathysg@dagondesign.com', 'fP0OdU', 'Brazil', 'Arcos', 'Room 682', '6947846595', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(18, 'Whitney', 'wwabbh@cbc.ca', 'tX8Z5', 'Albania', 'Laç', '7th Floor', '1731763212', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg'),
(19, 'Kilian', 'khalmsi@icio.us', 'bU3`mv', 'South Korea', 'Kyosai', 'PO Box 98908', '5798060470', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png'),
(20, 'Imojean', 'ibeckfordj@google.com', 'rV9Ym', 'Thailand', 'Wiphawadi', '8th Floor', '4572689377', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png'),
(10101, 'Andev', 'andev@gmail.com', 'andev', 'Bolivia', 'La Paz', '81276345', 'xxxx-xxx-xx-x-x', 'https://res.cloudinary.com/dn2zvlabb/image/upload/v1718511912/MarcusAurelius_lnmssb.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` decimal(10,2) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 3, 49.99, 'INV1001', 2, 'M', '2023-11-15 08:00:00', 'pending'),
(2, 5, 89.99, 'INV1002', 1, 'L', '2023-12-10 08:00:00', 'complete'),
(3, 7, 29.99, 'INV1003', 3, 'S', '2023-10-22 08:00:00', 'pending'),
(4, 1, 19.99, 'INV1004', 1, 'M', '2022-09-18 08:00:00', 'complete'),
(5, 10, 54.99, 'INV1005', 2, 'XL', '2021-07-30 08:00:00', 'pending'),
(6, 15, 44.99, 'INV1006', 4, 'L', '2023-01-25 08:00:00', 'complete'),
(7, 8, 64.99, 'INV1007', 1, 'M', '2022-06-05 08:00:00', 'pending'),
(8, 12, 39.99, 'INV1008', 2, 'S', '2021-04-12 08:00:00', 'complete'),
(9, 14, 79.99, 'INV1009', 1, 'L', '2023-05-20 08:00:00', 'pending'),
(10, 4, 34.99, 'INV1010', 1, 'M', '2020-11-02 08:00:00', 'complete'),
(11, 6, 29.99, 'INV1011', 3, 'XL', '2022-03-16 08:00:00', 'pending'),
(12, 9, 19.99, 'INV1012', 2, 'S', '2023-08-01 08:00:00', 'complete'),
(13, 11, 49.99, 'INV1013', 1, 'L', '2023-09-14 08:00:00', 'pending'),
(14, 2, 44.99, 'INV1014', 2, 'M', '2021-12-23 08:00:00', 'complete'),
(15, 20, 74.99, 'INV1015', 1, 'XL', '2022-10-28 08:00:00', 'pending'),
(16, 13, 89.99, 'INV1016', 2, 'S', '2023-02-14 08:00:00', 'complete'),
(17, 18, 64.99, 'INV1017', 3, 'L', '2021-05-07 08:00:00', 'pending'),
(18, 17, 54.99, 'INV1018', 1, 'M', '2023-03-19 08:00:00', 'complete'),
(19, 16, 39.99, 'INV1019', 4, 'S', '2022-07-11 08:00:00', 'pending'),
(20, 19, 49.99, 'INV1020', 1, 'XL', '2023-11-30 08:00:00', 'complete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text DEFAULT NULL,
  `manufacturer_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(1, 'Nike', 'yes', ''),
(2, 'Adidas', 'no', ''),
(3, 'Zara', 'no', ''),
(4, 'H&M', 'yes', ''),
(5, 'Levis', 'no', ''),
(6, 'Tommy Hilfiger', 'no', ''),
(7, 'Calvin Klein', 'no', ''),
(8, 'Gucci', 'yes', ''),
(9, 'Prada', 'yes', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 3, 'INV1001', 4, 2, 'M', 'pending'),
(2, 5, 'INV1002', 3, 1, 'L', 'complete'),
(4, 1, 'INV1004', 4, 1, 'M', 'complete'),
(5, 10, 'INV1005', 5, 2, 'XL', 'pending'),
(6, 15, 'INV1006', 8, 4, 'L', 'complete'),
(7, 8, 'INV1007', 16, 1, 'M', 'pending'),
(8, 12, 'INV1008', 9, 2, 'S', 'complete'),
(9, 14, 'INV1009', 1, 1, 'L', 'pending'),
(10, 4, 'INV1010', 11, 1, 'M', 'complete'),
(11, 6, 'INV1011', 6, 3, 'XL', 'pending'),
(13, 11, 'INV1013', 12, 1, 'L', 'pending'),
(15, 20, 'INV1015', 17, 1, 'XL', 'pending'),
(17, 18, 'INV1017', 19, 3, 'L', 'pending'),
(18, 17, 'INV1018', 13, 1, 'M', 'complete'),
(19, 16, 'INV1019', 2, 4, 'S', 'pending'),
(20, 19, 'INV1020', 7, 1, 'XL', 'complete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_stock` int(10) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_psp_price` decimal(10,2) DEFAULT NULL,
  `product_desc` text NOT NULL,
  `product_features` text DEFAULT NULL,
  `product_keywords` text DEFAULT NULL,
  `product_label` text NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--


INSERT INTO `products` (`product_id`, `p_cat_id`, `manufacturer_id`, `product_title`, `product_url`, `product_img1`, `product_stock`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_keywords`, `product_label`, `status`, `date`, `product_user_type`) VALUES
(1, 8, 1, 'Adidas Winter Coat', 'adidas-winter-coat', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033059/img-1_cd7tpv.jpg', 20, 199.99, 179.99, 'Warm and water-resistant winter coat by Adidas, ideal for cold weather.', 'Insulated, water-resistant, zipper pockets', 'winter, coat, Adidas, insulated, water-resistant', 'New', 'Available', '2025-01-01 10:00:00', 'M'),
(2, 6, 4, 'Levis Slim-Fit Jeans', 'levis-slim-fit-jeans', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033058/img-2_pxncw4.jpg', 50, 89.99, NULL, 'Dark blue slim-fit jeans from Levis, perfect for modern and casual looks.', 'High-quality stitching, durable fabric', 'jeans, slim-fit, Levis, casual, modern', 'Bestseller', 'Available', '2025-01-02 11:30:00', 'M'),
(3, 12, 2, 'Zara Casual T-Shirt', 'zara-casual-tshirt', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033058/img-3_x74pyf.jpg', 100, 29.99, 24.99, 'Soft cotton t-shirt from Zara, ideal for everyday wear.', 'Breathable fabric, lightweight', 't-shirt, casual, Zara, soft cotton', 'Sale', 'Available', '2025-01-03 09:45:00', 'M'),
(4, 4, 3, 'H&M Summer Dress', 'hm-summer-dress', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033057/img-4_qmjflm.jpg', 35, 49.99, NULL, 'Lightweight floral-patterned summer dress by H&M.', 'Flowy design, vibrant pattern', 'summer, dress, H&M, floral, lightweight', 'Featured', 'Available', '2025-01-04 14:15:00', 'F'),
(5, 5, 6, 'Calvin Klein Leather Jacket', 'calvin-klein-leather-jacket', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033059/img-5_c2ogtx.jpg', 15, 299.99, 269.99, 'Sleek black leather jacket from Calvin Klein, perfect for a stylish look.', 'Genuine leather, slim fit', 'leather jacket, Calvin Klein, stylish, black', 'Limited', 'Available', '2025-01-05 12:00:00', 'M'),
(6, 10, 5, 'Tommy Hilfiger Suit Set', 'tommy-hilfiger-suit-set', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033058/img-6_t35azf.jpg', 10, 499.99, 459.99, 'Elegant navy blue suit set by Tommy Hilfiger, tailored for formal occasions.', 'Premium fabric, precise stitching', 'suit set, Tommy Hilfiger, formal, navy blue', 'Exclusive', 'Available', '2025-01-06 13:25:00', 'M'),
(7, 13, 2, 'Zara Sleeveless Top', 'zara-sleeveless-top', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033058/img-7_t3stdl.jpg', 80, 19.99, NULL, 'Pastel pink sleeveless top from Zara, perfect for summer.', 'Breathable, lightweight', 'sleeveless top, Zara, summer, pastel pink', 'Trending', 'Available', '2025-01-07 15:45:00', 'F'),
(8, 11, 3, 'H&M Wool Sweater', 'hm-wool-sweater', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033151/img-8_bujpbu.jpg', 40, 59.99, 49.99, 'Beige wool sweater by H&M, cozy for chilly days.', 'Soft wool fabric, textured design', 'sweater, wool, H&M, cozy', 'Classic', 'Available', '2025-01-08 10:15:00', 'F'),
(9, 7, 8, 'Prada Silk Shirt', 'prada-silk-shirt', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033058/img-9_zbb44e.jpg', 25, 399.99, 379.99, 'Ivory white silk shirt by Prada, luxurious and elegant.', 'Smooth silk fabric, premium quality', 'silk shirt, Prada, luxurious, elegant', 'Premium', 'Available', '2025-01-09 11:00:00', 'F'),
(10, 8, 4, 'Levis Denim Shorts', 'levis-denim-shorts', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033058/img-10_n2nmew.jpg', 60, 49.99, NULL, 'Classic blue denim shorts from Levis, casual and durable.', 'High-quality denim, casual design', 'denim shorts, Levis, casual, durable', 'Hot', 'Available', '2025-01-10 14:00:00', 'M'),
(11, 1, 7, 'Gucci Silk Blouse', 'gucci-silk-blouse', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033058/img-11_rng43m.jpg', 12, 599.99, 549.99, 'Deep emerald green silk blouse by Gucci, sleek and luxurious.', 'High-quality silk, elegant design', 'silk blouse, Gucci, luxurious, emerald green', 'Exclusive', 'Available', '2025-01-11 16:00:00', 'F'),
(12, 9, 5, 'Tommy Hilfiger Skirt', 'tommy-hilfiger-skirt', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033057/img-12_kwjhfb.jpg', 30, 79.99, 69.99, 'Dark gray skirt by Tommy Hilfiger, with a modern and classic design.', 'Premium fabric, classic cut', 'skirt, Tommy Hilfiger, classic, gray', 'Trending', 'Available', '2025-01-12 11:45:00', 'F'),
(13, 2, 1, 'Adidas Cardigan', 'adidas-cardigan', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033057/img-13_g7gr6p.jpg', 25, 69.99, NULL, 'Light gray cardigan by Adidas, stylish and comfortable.', 'Soft fabric, casual design', 'cardigan, Adidas, light gray, casual', 'Bestseller', 'Available', '2025-01-13 13:30:00', 'M'),
(14, 12, 6, 'Calvin Klein T-Shirt', 'calvin-klein-tshirt', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033056/img-14_sbywfz.jpg', 100, 34.99, 29.99, 'Black cotton t-shirt by Calvin Klein, simple and durable.', 'Soft cotton, high-quality stitching', 't-shirt, Calvin Klein, casual, black', 'Sale', 'Available', '2025-01-14 09:00:00', 'M'),
(15, 4, 8, 'Prada Elegant Dress', 'prada-elegant-dress', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033056/img-15_tx2oqu.jpg', 8, 899.99, 849.99, 'Deep crimson elegant dress by Prada, perfect for special occasions.', 'Luxurious fabric, refined design', 'elegant dress, Prada, luxurious, crimson', 'Exclusive', 'Available', '2025-01-15 17:15:00', 'F'),
(16, 12, 7, 'Gucci Casual T-shirt', 'gucci-casual-tshirt', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033057/img-16_nsrio0.jpg', 100, 129.99, 109.99, 'Trendy navy blue t-shirt for casual wear.', 'Premium fabric, modern fit', 'tshirt, gucci', 'New', 'Active', '2023-09-01 10:00:00', 'M'),
(17, 5, 3, 'H&M Quilted Jacket', 'hm-quilted-jacket', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033057/img-17_xhye9k.jpg', 40, 99.99, 89.99, 'Insulated olive green quilted jacket.', 'Warm, durable design', 'jacket, quilted, h&m', 'Hot', 'Active', '2023-11-15 13:00:00', 'M'),
(18, 8, 2, 'Zara Denim Shorts', 'zara-denim-shorts', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033056/img-18_qdfgix.jpg', 110, 39.99, NULL, 'Trendy light blue denim shorts.', 'Comfortable, durable', 'shorts, denim, zara', 'Trending', 'Active', '2023-06-10 16:15:00', 'F'),
(19, 5, 6, 'Calvin Klein Wool Coat', 'ck-wool-coat', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033056/img-19_kdk6y2.jpg', 30, 189.99, NULL, 'Premium wool coat for winter.', 'Warm, elegant fit', 'coat, wool, ck', 'Luxury', 'Active', '2023-12-20 08:45:00', 'M'),
(20, 13, 4, 'Levis Casual Top', 'levis-casual-top', 'https://res.cloudinary.com/andevstorage/image/upload/v1738033056/img-20_enmenj.jpg', 140, 24.99, 19.99, 'Lightweight casual top in pastel blue.', 'Soft, trendy design', 'top, casual, levis', 'Sale', 'Active', '2023-10-10 14:30:00', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`) VALUES
(1, 'Sweater', ''),
(2, 'T-shirts', ''),
(3, 'Tops', ''),
(4, 'Shirts', ''),
(5, 'Blouses', ''),
(6, 'Pants', ''),
(7, 'Jeans', ''),
(8, 'Shorts', ''),
(9, 'Coats', ''),
(10, 'Cardigans', ''),
(11, 'Underwear', ''),
(12, 'Jackets', ''),
(13, 'Dresses', ''),
(14, 'Skirts', ''),
(15, 'Suits and Sets', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indices de la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indices de la tabla `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indices de la tabla `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `invoice_no` (`invoice_no`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `p_cat_id` (`p_cat_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- Indices de la tabla `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10102;

--
-- AUTO_INCREMENT de la tabla `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20105;

--
-- AUTO_INCREMENT de la tabla `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30304;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10202;

--
-- AUTO_INCREMENT de la tabla `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `customer_orders` (`invoice_no`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD CONSTRAINT `pending_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pending_orders_ibfk_2` FOREIGN KEY (`invoice_no`) REFERENCES `customer_orders` (`invoice_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `pending_orders_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`p_cat_id`) REFERENCES `product_categories` (`p_cat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`manufacturer_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
