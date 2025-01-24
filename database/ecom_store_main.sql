-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-01-2025 a las 06:30:33
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
-- Base de datos: `ecom_store`
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
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(2, 'Administrator', 'admin@mail.com', '1234', 'user-profile-min.png', '7777775500', 'Morocco', 'Front-End Developer', ' Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical ');

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
  `coupon_limit` int(10) NOT NULL,
  `coupon_used` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(1, 1, 'Descuento Navidad', 50.00, 'XMAS50', 100, 20),
(2, 5, 'Descuento Verano', 30.00, 'SUMMER30', 200, 80),
(3, 10, 'Descuento Black Friday', 75.00, 'BF75', 50, 10),
(4, 15, 'Descuento Año Nuevo', 40.00, 'NEWYEAR40', 150, 49),
(5, 20, 'Descuento de Invierno', 60.00, 'WINTER60', 80, 21),
(6, 25, 'Descuento Especial', 20.00, 'SPECIAL20', 300, 179);

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
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`) VALUES
(1, 'Dael', 'dholde0@trellian.com', 'gC6))m', 'Indonesia', 'Winduraja', 'Apt 896', '8574198838', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png', '2983300714', ''),
(2, 'Caspar', 'cleng1@nytimes.com', 'sK0v	', 'Russia', 'Yelets', 'PO Box 44640', '1318131154', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png', '1888871830', ''),
(3, 'Priscella', 'pstrode2@omniture.com', 'kG1rG+v', 'France', 'Lyon', 'PO Box 56279', '8230733023', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '4733049234', ''),
(4, 'Donnamarie', 'dmaffei3@weibo.com', 'cB22', 'United Kingdom', 'Milton', 'Suite 61', '3170220721', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '5238227302', ''),
(5, 'Rorie', 'rlivingstone4@home.pl', 'kR5)', 'China', 'Huo-erqi', 'Suite 63', '8422986299', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '5340422755', ''),
(6, 'Barnard', 'baylett5@un.org', 'lW8$', 'Canada', 'High River', 'Suite 44', '3083903057', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png', '3258424977', ''),
(7, 'Janella', 'jtuminini6@yolasite.com', 'yZ8q9', 'China', 'Hengshui', 'Apt 432', '6790308776', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '1330194586', ''),
(8, 'Aldon', 'apibworth7@home.pl', 'dV2TFW', 'Indonesia', 'Cibeureum', 'Room 1509', '4763748521', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png', '5114546406', ''),
(9, 'Nixie', 'nslaughter8@sitemeter.com', 'jO5{4~!L', 'China', 'Jingzhou', 'Suite 88', '9165800087', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '0803892861', ''),
(10, 'Moise', 'mbreinl9@usda.gov', 'eW1*', 'New Zealand', 'Paihia', 'Suite 52', '2349187403', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png', '2245833120', ''),
(11, 'Jolie', 'jransoma@who.int', 'sV79IM', 'China', 'Xihuachi', 'Apt 1169', '2579740562', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '3715879351', ''),
(12, 'Brita', 'bdyeb@who.int', 'zC1P', 'China', 'Sanrao', 'PO Box 6883', '9464380977', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '9815458086', ''),
(13, 'Belva', 'bwhifec@artisteer.com', 'qD4e', 'China', 'Guyi', 'PO Box 93864', '8327244191', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '1566888670', ''),
(14, 'Tildie', 'tkeeld@liveinternet.ru', 'qY6}#', 'Croatia', 'Podhum', 'Apt 1956', '7767772888', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '2022077830', ''),
(15, 'Muffin', 'mlevee@themeforest.net', 'oA8F&G', 'China', 'Yonggu', 'Room 325', '3668838836', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png', '5199050044', ''),
(16, 'Sibella', 'sdoudneyf@slate.com', 'xR3C6!>a', 'China', 'Zhujiang', 'Room 6', '5571429062', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '4035492604', ''),
(17, 'Dominique', 'dmathysg@dagondesign.com', 'fP0OdU', 'Brazil', 'Arcos', 'Room 682', '6947846595', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '3631142943', ''),
(18, 'Whitney', 'wwabbh@cbc.ca', 'tX8Z5', 'Albania', 'Laç', '7th Floor', '1731763212', 'https://as1.ftcdn.net/v2/jpg/01/16/24/44/1000_F_116244459_pywR1e0T3H7FPk3LTMjG6jsL3UchDpht.jpg', '4939530221', ''),
(19, 'Kilian', 'khalmsi@icio.us', 'bU3`mv', 'South Korea', 'Kyosai', 'PO Box 98908', '5798060470', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png', '9519500723', ''),
(20, 'Imojean', 'ibeckfordj@google.com', 'rV9Ym', 'Thailand', 'Wiphawadi', '8th Floor', '4572689377', 'https://icons.veryicon.com/png/o/miscellaneous/user-avatar/user-avatar-male-5.png', '9426740732', ''),
(10101, 'Andev', 'andev@gmail.com', 'andev', 'Bolivia', 'La Paz', '81276345', 'xxxx-xxx-xx-x-x', 'https://res.cloudinary.com/dn2zvlabb/image/upload/v1718511912/MarcusAurelius_lnmssb.jpg', '2', '');

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
(1, 3, 49.99, 'INV1001', 2, 'M', '2023-11-15 04:00:00', 'pending'),
(2, 5, 89.99, 'INV1002', 1, 'L', '2023-12-10 04:00:00', 'complete'),
(3, 7, 29.99, 'INV1003', 3, 'S', '2023-10-22 04:00:00', 'pending'),
(4, 1, 19.99, 'INV1004', 1, 'M', '2022-09-18 04:00:00', 'complete'),
(5, 10, 54.99, 'INV1005', 2, 'XL', '2021-07-30 04:00:00', 'pending'),
(6, 15, 44.99, 'INV1006', 4, 'L', '2023-01-25 04:00:00', 'complete'),
(7, 8, 64.99, 'INV1007', 1, 'M', '2022-06-05 04:00:00', 'pending'),
(8, 12, 39.99, 'INV1008', 2, 'S', '2021-04-12 04:00:00', 'complete'),
(9, 14, 79.99, 'INV1009', 1, 'L', '2023-05-20 04:00:00', 'pending'),
(10, 4, 34.99, 'INV1010', 1, 'M', '2020-11-02 04:00:00', 'complete'),
(11, 6, 29.99, 'INV1011', 3, 'XL', '2022-03-16 04:00:00', 'pending'),
(12, 9, 19.99, 'INV1012', 2, 'S', '2023-08-01 04:00:00', 'complete'),
(13, 11, 49.99, 'INV1013', 1, 'L', '2023-09-14 04:00:00', 'pending'),
(14, 2, 44.99, 'INV1014', 2, 'M', '2021-12-23 04:00:00', 'complete'),
(15, 20, 74.99, 'INV1015', 1, 'XL', '2022-10-28 04:00:00', 'pending'),
(16, 13, 89.99, 'INV1016', 2, 'S', '2023-02-14 04:00:00', 'complete'),
(17, 18, 64.99, 'INV1017', 3, 'L', '2021-05-07 04:00:00', 'pending'),
(18, 17, 54.99, 'INV1018', 1, 'M', '2023-03-19 04:00:00', 'complete'),
(19, 16, 39.99, 'INV1019', 4, 'S', '2022-07-11 04:00:00', 'pending'),
(20, 19, 49.99, 'INV1020', 1, 'XL', '2023-11-30 04:00:00', 'complete'),
(20104, 10101, 2.40, '290819', 1, 'medium', '2025-01-17 04:36:07', 'pending');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
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
(3, 7, 'INV1003', 21, 3, 'S', 'pending'),
(4, 1, 'INV1004', 4, 1, 'M', 'complete'),
(5, 10, 'INV1005', 5, 2, 'XL', 'pending'),
(6, 15, 'INV1006', 8, 4, 'L', 'complete'),
(7, 8, 'INV1007', 16, 1, 'M', 'pending'),
(8, 12, 'INV1008', 9, 2, 'S', 'complete'),
(9, 14, 'INV1009', 1, 1, 'L', 'pending'),
(10, 4, 'INV1010', 11, 1, 'M', 'complete'),
(11, 6, 'INV1011', 6, 3, 'XL', 'pending'),
(12, 9, 'INV1012', 21, 2, 'S', 'complete'),
(13, 11, 'INV1013', 12, 1, 'L', 'pending'),
(14, 2, 'INV1014', 28, 2, 'M', 'complete'),
(15, 20, 'INV1015', 17, 1, 'XL', 'pending'),
(16, 13, 'INV1016', 25, 2, 'S', 'complete'),
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
  `product_psp_price` decimal(10,2) NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_label` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `manufacturer_id`, `product_title`, `product_url`, `product_img1`, `product_stock`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_keywords`, `product_label`, `status`, `date`, `product_user_type`) VALUES
(1, 3, 2, 'Casual T-Shirt', 'casual-t-shirt', '', 0, 15.99, 12.99, 'A comfortable cotton t-shirt for daily wear.', 'Soft fabric, breathable, machine washable.', 't-shirt, casual, cotton', 'New Arrival', 'product', '2022-03-15 04:00:00', NULL),
(2, 7, 4, 'Denim Jeans', 'denim-jeans', '', 0, 39.99, 29.99, 'Classic denim jeans with a modern fit.', 'Slim fit, durable fabric, multiple sizes.', 'jeans, denim, slim fit', 'Best Seller', 'product', '2023-01-25 04:00:00', NULL),
(3, 10, 1, 'Sports Jacket', 'sports-jacket', '', 0, 59.99, 49.99, 'Lightweight sports jacket perfect for outdoor activities.', 'Water-resistant, zip pockets, adjustable hood.', 'jacket, sports, outdoor', '', 'product', '2021-11-12 04:00:00', NULL),
(4, 5, 3, 'Floral Dress', 'floral-dress', '', 0, 45.99, 35.99, 'Elegant floral dress for casual or formal occasions.', 'Flowy fabric, vibrant prints, adjustable straps.', 'dress, floral, elegant', 'On Sale', 'product', '2020-06-30 04:00:00', NULL),
(5, 12, 6, 'Running Shoes', 'running-shoes', '', 0, 89.99, 74.99, 'Comfortable running shoes with excellent grip.', 'Lightweight, cushioned sole, breathable material.', 'shoes, running, fitness', 'Top Rated', 'product', '2023-04-10 04:00:00', NULL),
(6, 4, 8, 'Leather Wallet', 'leather-wallet', '', 0, 29.99, 24.99, 'Premium leather wallet with multiple compartments.', 'Durable, stylish, compact design.', 'wallet, leather, accessories', '', 'product', '2021-09-05 04:00:00', NULL),
(7, 14, 5, 'Winter Coat', 'winter-coat', '', 0, 120.99, 99.99, 'Warm winter coat with a sleek design.', 'Insulated, waterproof, adjustable fit.', 'coat, winter, insulated', '', 'product', '2022-12-20 04:00:00', NULL),
(8, 1, 9, 'Graphic Hoodie', 'graphic-hoodie', '\r\nhttps://res.cloudinary.com/dn2zvlabb/image/upload/v1737319558/sweater-2_bdnyiq.jpg', 0, 49.99, 39.99, 'Trendy hoodie with a unique graphic design.', 'Soft fleece, kangaroo pocket, hooded.', 'hoodie, graphic, casual', 'Limited Edition', 'product', '2025-01-19 23:27:34', NULL),
(9, 6, 7, 'Formal Shirt', 'formal-shirt', '', 0, 34.99, 29.99, 'Classic formal shirt for office or events.', 'Slim fit, wrinkle-free, multiple colors.', 'shirt, formal, office wear', '', 'product', '2020-08-23 04:00:00', NULL),
(10, 9, 2, 'Cargo Pants', 'cargo-pants', '', 0, 54.99, 44.99, 'Utility cargo pants with multiple pockets.', 'Relaxed fit, durable fabric, adjustable waist.', 'pants, cargo, utility', 'Trending', 'product', '2021-03-01 04:00:00', NULL),
(11, 13, 5, 'Yoga Leggings', 'yoga-leggings', '', 0, 25.99, 20.99, 'Stretchy and breathable yoga leggings.', 'High waist, quick-dry fabric, multiple colors.', 'leggings, yoga, fitness', 'Popular', 'product', '2021-05-11 04:00:00', NULL),
(12, 8, 4, 'Bomber Jacket', 'bomber-jacket', '', 0, 69.99, 55.99, 'Classic bomber jacket for a trendy look.', 'Lightweight, ribbed cuffs, zipper closure.', 'jacket, bomber, casual', '', 'product', '2022-10-18 04:00:00', NULL),
(13, 2, 6, 'Graphic Tee', 'graphic-tee', '', 0, 19.99, 14.99, 'Cool graphic tee with vibrant prints.', 'Soft cotton, unisex design, regular fit.', 't-shirt, graphic, casual', 'Hot', 'product', '2020-12-25 04:00:00', NULL),
(14, 15, 7, 'Chinos Pants', 'chinos-pants', '', 0, 49.99, 39.99, 'Comfortable chinos for work and casual wear.', 'Slim fit, stretchable fabric, wrinkle-resistant.', 'pants, chinos, casual', '', 'product', '2023-06-01 04:00:00', NULL),
(15, 11, 9, 'Puffer Vest', 'puffer-vest', '', 0, 59.99, 45.99, 'Warm and lightweight puffer vest.', 'Insulated, sleeveless, zip pockets.', 'vest, puffer, winter', 'Trending', 'product', '2021-01-15 04:00:00', NULL),
(16, 3, 2, 'Polka Dot Skirt', 'polka-dot-skirt', '', 0, 35.99, 29.99, 'Chic polka dot skirt for casual outings.', 'Flowy fabric, elastic waistband, knee-length.', 'skirt, polka dot, chic', '', 'product', '2022-08-22 04:00:00', NULL),
(17, 7, 8, 'Track Jacket', 'track-jacket', '', 0, 44.99, 34.99, 'Lightweight track jacket for sports.', 'Breathable fabric, zip closure, stylish design.', 'jacket, track, sports', 'New', 'product', '2021-04-12 04:00:00', NULL),
(18, 9, 3, 'Cropped Top', 'cropped-top', '', 0, 24.99, 19.99, 'Trendy cropped top for summer wear.', 'Soft fabric, short sleeves, relaxed fit.', 'top, cropped, summer', '', 'product', '2020-07-05 04:00:00', NULL),
(19, 4, 1, 'Plaid Scarf', 'plaid-scarf', '', 0, 19.99, 14.99, 'Cozy plaid scarf for cold weather.', 'Soft material, oversized design, trendy look.', 'scarf, plaid, winter', 'Best Seller', 'product', '2022-11-25 04:00:00', NULL),
(20, 14, 5, 'Oversized Hoodie', 'oversized-hoodie', '', 0, 39.99, 29.99, 'Comfortable oversized hoodie for a relaxed look.', 'Soft fleece, kangaroo pocket, adjustable hood.', 'hoodie, oversized, casual', 'Limited', 'product', '2023-03-14 04:00:00', NULL),
(21, 6, 3, 'V-Neck Sweater', 'v-neck-sweater', '', 0, 34.99, 29.99, 'Classic V-neck sweater for a casual or formal look.', 'Soft fabric, slim fit, multiple colors.', 'sweater, v-neck, casual', '', 'product', '2020-09-22 04:00:00', NULL),
(22, 12, 7, 'Raincoat', 'raincoat', '', 0, 59.99, 49.99, 'Waterproof raincoat with a hood.', 'Lightweight, packable, stylish design.', 'raincoat, waterproof, outdoor', '', 'product', '2021-02-14 04:00:00', NULL),
(23, 5, 2, 'Maxi Dress', 'maxi-dress', '', 0, 69.99, 54.99, 'Flowy maxi dress for special occasions.', 'Elegant design, breathable fabric, ankle-length.', 'dress, maxi, formal', 'New Arrival', 'product', '2022-04-05 04:00:00', NULL),
(24, 10, 6, 'Polo Shirt', 'polo-shirt', '', 0, 29.99, 24.99, 'Classic polo shirt for casual and semi-formal wear.', 'Soft cotton, breathable fabric, multiple sizes.', 'shirt, polo, semi-formal', '', 'product', '2023-05-07 04:00:00', NULL),
(25, 8, 9, 'Denim Jacket', 'denim-jacket', '', 0, 79.99, 64.99, 'Timeless denim jacket with a modern fit.', 'Durable fabric, stylish design, unisex.', 'jacket, denim, casual', 'Trending', 'product', '2022-01-12 04:00:00', NULL),
(26, 15, 4, 'Cargo Shorts', 'cargo-shorts', '', 0, 39.99, 29.99, 'Practical cargo shorts with multiple pockets.', 'Relaxed fit, durable fabric, adjustable waist.', 'shorts, cargo, utility', '', 'product', '2023-03-30 04:00:00', NULL),
(27, 9, 8, 'Workout Tank Top', 'workout-tank-top', '', 0, 19.99, 15.99, 'Breathable tank top for workouts.', 'Quick-dry fabric, racerback design, unisex.', 'tank top, workout, fitness', '', 'product', '2021-06-20 04:00:00', NULL),
(28, 1, 5, 'Graphic Sweater', 'graphic-sweater', 'https://res.cloudinary.com/dn2zvlabb/image/upload/v1737319577/sweater-4_s55mh4.jpg', 0, 49.99, 39.99, 'Trendy graphic sweater with bold prints.', 'Soft fleece, relaxed fit, vibrant colors.', 'sweater, graphic, casual', '', 'product', '2025-01-19 23:28:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL
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
