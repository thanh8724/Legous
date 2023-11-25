-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2023 lúc 11:28 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `legous_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_detail` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: not default, 1: default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_coupon` int(10) NOT NULL,
  `id_shipping` int(11) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `phone_user` varchar(12) NOT NULL,
  `address_user` varchar(255) NOT NULL,
  `email_recipient` varchar(255) NOT NULL,
  `phone_recipient` varchar(12) NOT NULL,
  `address_recipient` varchar(255) NOT NULL,
  `name_recipient` varchar(255) NOT NULL,
  `total` int(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0' COMMENT '0: chờ xác nhận, 1: chờ lấy hàng, 2:đang giao hàng, 3: hoàn đơn,4: đã giao hàng,5: đã hủy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `id_user`, `id_coupon`, `id_shipping`, `id_payment`, `email_user`, `phone_user`, `address_user`, `email_recipient`, `phone_recipient`, `address_recipient`, `name_recipient`, `total`, `create_date`, `status`) VALUES
(3, 2, 1, 2, 1, 'ngoc@123', '0123456789', 'quan 12, tp.hcm', 'ngoc@123', '0123456789', 'quan 12, tphcm', 'hongngoc', 1000000, '2023-11-17 14:23:37', '0'),
(4, 2, 1, 1, 1, 'hn@123', '0123456789', 'tp.phcm', 'hn@123', '0123456789', 'tp.hcm', 'hngoc', 500000, '2023-11-17 09:27:32', '1'),
(5, 2, 1, 2, 1, 'ngoc@123', '0123456789', 'hcm', 'ngoc@123', '0123456789', 'hcm', 'hn', 1000000, '2023-11-22 07:11:25', ''),
(6, 2, 1, 2, 1, 'ngoc@123', '0123456789', 'hcm', 'ngoc@123', '0123456789', 'hcm', 'hn', 1000000, '2023-11-22 07:12:18', ''),
(7, 2, 1, 2, 1, 'ngoc@123', '0123456789', 'hcm', 'ngoc@123', '0123456789', 'hcm', 'hn', 1000000, '2023-11-22 07:12:56', ''),
(8, 2, 1, 1, 1, 'ngoc@123', '0123456789', 'hcm', 'ngoc@123', '0123456789', 'hcm', 'hn', 500000, '2023-11-22 07:13:56', ''),
(9, 2, 1, 2, 1, 'ngoc@123', '0123456789', 'hcm', 'ngoc@123', '0123456789', 'hcm', 'hn', 1000000, '2023-11-22 07:14:53', ''),
(10, 2, 1, 1, 1, 'ngoc@123', '0123456789', 'hcm', 'ngoc@123', '0123456789', 'hcm', 'hn', 500000, '2023-11-22 07:15:38', ''),
(11, 2, 1, 1, 1, 'ngoc@123', '0123456789', 'hcm', 'ngoc@123', '0123456789', 'ngoc@123', 'hn', 1000000, '2023-11-22 07:16:19', ''),
(12, 2, 1, 2, 1, 'ngoc@123', '0123456789', 'hcm', 'ngoc@123', '0123456789', 'ngoc@123', 'hn', 1000000, '2023-11-22 07:17:16', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `public_date` timestamp NULL DEFAULT NULL,
  `is_appear` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: disappear, 1: appear'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_blog` int(10) NOT NULL,
  `content` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL,
  `is_appear` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: disappear, 1: appear',
  `username` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `id_bill` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `qty` int(3) NOT NULL,
  `total_cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `bg_color` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL,
  `is_appear` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: disappear, 1: appear',
  `is_special` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: normal, 1: special'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `img`, `description`, `bg_color`, `create_date`, `update_date`, `is_appear`, `is_special`) VALUES
(1, 'Naruto', 'naruto_banner.webp', 'Trải nghiệm những mô hình thuộc bộ truyện Naruto với nhân vật bạn yêu thích', '#FF9534', '2023-11-13 03:42:45', NULL, 1, 0),
(2, 'Dragon Ball', 'dragonball_banner.jpg', 'Khám phá bộ sưu tập Dragon Ball bao gồm mô hình các nhân vật nổi tiếng', '#32E0B5', '2023-11-13 03:44:12', NULL, 1, 0),
(3, 'Jujustsu Kaisen', 'jujustu-kaisen_banner.jpg', 'Tận hưởng việc sưu tập mô hình nhân vật Jujutsu Kaisen với độ chi tiết tuyệt vời', '#558FFF', '2023-11-13 03:44:12', NULL, 1, 0),
(4, 'Kimetsu no Yaiba', 'kimetsu-no-yaiba_banner.jpg', 'Khám phá bộ sưu tập Kimetsu no Yaiba với các sản phẩm mô hình độc đáo.', '#FF6651', '2023-11-13 03:46:20', NULL, 1, 0),
(5, 'Gundam', 'gundam_banner.jpg', 'Các mô hình Gundam chất lượng cao và phụ kiện đi kèm.', '#636363', '2023-11-13 03:46:20', NULL, 1, 0),
(6, 'Genshin Impact', 'genshinimpact_banner.webp', 'Sưu tầm các mô hình nhân vật tuyệt đẹp, tái hiện chân thực các nhân vật yêu thích từ trò chơi Genshin Impact.', '#D55151', '2023-11-13 03:47:07', NULL, 1, 0),
(7, 'One Piece', 'one_piece_banner.jpg', 'Bước vào thế giới phiêu lưu đầy mạo hiểm với bộ sưu tập One Piece.', '#7254B7', '2023-11-13 03:47:07', NULL, 1, 0),
(8, 'Thẻ bài', 'card-pack_banner.jpg', 'Chúng tôi cung cấp các pack thẻ bài đa dạng, giá phải chăng và chất lượng. Khám phá và thu thập thẻ bài độc đáo', '#51D5CD', '2023-11-13 03:47:45', NULL, 1, 0),
(9, 'Lego Xe', 'car_banner.jpg', 'Khám phá ngay để trải nghiệm niềm hứng khởi và khám phá khả năng sáng tạo của bạn với Car Lego.', '#6D6D6D', '2023-11-20 15:11:09', NULL, 1, 0),
(10, 'Lego', 'lego_banner.png', 'Khám phá ngay để trải nghiệm niềm hứng khởi và khám phá khả năng sáng tạo của bạn với Lego', '#D55151', '2023-11-21 15:20:05', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `reported` tinyint(5) DEFAULT 0,
  `is_appear` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: là xuất hiện, 0 là ẩn',
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_product`, `username`, `email`, `content`, `reported`, `is_appear`, `create_date`, `update_date`) VALUES
(1, 2, 3, 'dcsaf', 'gsdklgnsol', 'hndsonvoisd', 100, 1, '2023-11-24 09:17:59', '0000-00-00 00:00:00'),
(2, 3, 4, 'fsdkfnosdnvoi', 'hfseodnvosnohoigho', 'hbosfinbosnobiwn', 0, 1, '2023-11-24 09:17:59', '0000-00-00 00:00:00'),
(12, 6, 1, 'aaaaa', 'aaa@gmail.com', 'Quả mô hình này ngon v~', 0, 1, '2023-11-25 08:07:38', '2023-11-25 08:07:38'),
(13, 6, 1, 'admin123', 'admin123', 'AAAAANDFLWNFLWES', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_img`
--

CREATE TABLE `comment_img` (
  `id` int(10) NOT NULL,
  `id_comment` int(10) NOT NULL,
  `src` varchar(100) NOT NULL,
  `alt` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id` int(10) NOT NULL,
  `coupon_code` varchar(10) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `expired_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `src` varchar(100) NOT NULL,
  `alt` varchar(100) DEFAULT NULL,
  `is_thumbnail` tinyint(1) NOT NULL DEFAULT 0,
  `is_banner` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `id_product`, `src`, `alt`, `is_thumbnail`, `is_banner`) VALUES
(1, 1, 'z4882234622510.png', 'Mô hình Naruto combo 6 nhân vật', 1, 0),
(2, 1, 'z4882234600990.png', 'Mô hình Naruto combo 6 nhân vật', 1, 0),
(3, 1, 'z4882234633384.png', 'Mô hình Naruto combo 6 nhân vật', 1, 0),
(4, 1, 'z4882138066438.png', 'Mô hình Naruto combo 6 nhân vật', 1, 0),
(5, 1, 'z4882138066438.png', 'Mô hình Naruto combo 6 nhân vật', 1, 0),
(6, 1, 'z4882234600907.png', 'Mô hình Naruto combo 6 nhân vật', 1, 0),
(7, 2, 'z4818762408429.png', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(8, 2, 'z4818762394442.png', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(9, 2, 'z4818762345556.png', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(10, 2, 'z4818762346261.png', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(11, 2, 'z4818762346369.png', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(12, 2, 'z4818762372657.png', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(13, 2, 'z4818762373415.png', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(14, 2, 'z4818762378474.png', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(15, 3, 'z4877391410410.png', 'Mô Hình Naruto Pain akatsuki', 1, 0),
(16, 3, 'z4877391685969.png', 'Mô Hình Naruto Pain akatsuki', 1, 0),
(17, 3, 'z4877391412934.png', 'Mô Hình Naruto Pain akatsuki', 1, 0),
(18, 3, 'z4877391414626.png', 'Mô Hình Naruto Pain akatsuki', 1, 0),
(19, 3, 'z4877391412936.png', 'Mô Hình Naruto Pain akatsuki', 1, 0),
(20, 3, 'z4877391414855.png', 'Mô Hình Naruto Pain akatsuki', 1, 0),
(21, 3, 'z4877391421222.png', 'Mô Hình Naruto Pain akatsuki', 1, 0),
(22, 3, 'z4877391442548.png', 'Mô Hình Naruto Pain akatsuki', 1, 0),
(23, 4, 'o1cn01bzi3ig1rmhk5ipiw6.png', 'Mô hình Naruto đệ nhị senju Tobirama chibi', 1, 0),
(24, 4, 'z4844271743263.png', 'Mô hình Naruto đệ nhị senju Tobirama chibi', 1, 0),
(25, 4, 'z4844271721927.png', 'Mô hình Naruto đệ nhị senju Tobirama chibi', 1, 0),
(26, 4, 'z4844271707687.png', 'Mô hình Naruto đệ nhị senju Tobirama chibi', 1, 0),
(27, 4, 'z4844271723454.png', 'Mô hình Naruto đệ nhị senju Tobirama chibi', 1, 0),
(28, 4, 'z4844271727939.png', 'Mô hình Naruto đệ nhị senju Tobirama chibi', 1, 0),
(29, 4, 'z4844271738925.png', 'Mô hình Naruto đệ nhị senju Tobirama chibi', 1, 0),
(30, 4, 'z4844271749786.png', 'Mô hình Naruto đệ nhị senju Tobirama chibi', 1, 0),
(31, 5, 'o1cn01rjfw6q1rmhkfmvptv.png', 'Mô hình Naruto Guy bát môn độn giáp Chibi', 1, 0),
(32, 5, 'z4845568353500.png', 'Mô hình Naruto Guy bát môn độn giáp Chibi', 1, 0),
(33, 5, 'z4845568337257.png', 'Mô hình Naruto Guy bát môn độn giáp Chibi', 1, 0),
(34, 5, 'z4845568329269.png', 'Mô hình Naruto Guy bát môn độn giáp Chibi', 1, 0),
(35, 5, 'z4845568345354.png', 'Mô hình Naruto Guy bát môn độn giáp Chibi', 1, 0),
(36, 5, 'z4845568353191.png', 'Mô hình Naruto Guy bát môn độn giáp Chibi', 1, 0),
(37, 5, 'z4845568362051.png', 'Mô hình Naruto Guy bát môn độn giáp Chibi', 1, 0),
(38, 5, 'z4845568365456.png', 'Mô hình Naruto Guy bát môn độn giáp Chibi', 1, 0),
(39, 6, 'z4807014606159.png', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo', 1, 0),
(40, 6, 'z4807014606278.png', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo', 1, 0),
(41, 6, 'z4807014608148.png', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo', 1, 0),
(42, 6, 'z4807014608181.png', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo', 1, 0),
(43, 6, 'z4807014608359.png', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo', 1, 0),
(44, 6, 'z4807014608360.png', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo', 1, 0),
(45, 6, 'z4807014615618.png', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo', 1, 0),
(46, 6, 'z4807014615619.png', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo', 1, 0),
(47, 7, 'z4825498334269.png', 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ', 1, 0),
(48, 7, 'z4825498346132.png', 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ', 1, 0),
(49, 7, 'z4825498319942.png', 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ', 1, 0),
(50, 7, 'z4825498324435.png', 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ', 1, 0),
(51, 7, 'z4825498333616.png', 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ', 1, 0),
(52, 7, 'z4825498342053.png', 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ', 1, 0),
(53, 7, 'z4825498351932.png', 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ', 1, 0),
(54, 8, 'z4825499022779.png', 'Mô Hình Naruto Hokaghe Kakashi', 1, 0),
(55, 8, 'z4825499003202.png', 'Mô Hình Naruto Hokaghe Kakashi', 1, 0),
(56, 8, 'z4825499008253.png', 'Mô Hình Naruto Hokaghe Kakashi', 1, 0),
(57, 8, 'z4825499010569.png', 'Mô Hình Naruto Hokaghe Kakashi', 1, 0),
(58, 8, 'z4825499014682.png', 'Mô Hình Naruto Hokaghe Kakashi', 1, 0),
(59, 8, 'z4825499029739.png', 'Mô Hình Naruto Hokaghe Kakashi', 1, 0),
(60, 8, 'z4825499032774.png', 'Mô Hình Naruto Hokaghe Kakashi', 1, 0),
(61, 9, 'z4662270827210.png', 'Mô hình Bán thân Naruto tỉ lệ 1:1', 1, 0),
(62, 9, 'z4662270808216.png', 'Mô hình Bán thân Naruto tỉ lệ 1:1', 1, 0),
(63, 9, 'z4662270814610.png', 'Mô hình Bán thân Naruto tỉ lệ 1:1', 1, 0),
(64, 9, 'z4662270815148.png', 'Mô hình Bán thân Naruto tỉ lệ 1:1', 1, 0),
(65, 9, 'z4662270815248.png', 'Mô hình Bán thân Naruto tỉ lệ 1:1', 1, 0),
(66, 9, 'z4662270827249.png', 'Mô hình Bán thân Naruto tỉ lệ 1:1', 1, 0),
(67, 9, 'z4662270836129.png', 'Mô hình Bán thân Naruto tỉ lệ 1:1', 1, 0),
(68, 10, 'na26-1693827549586.png', 'Mô Hình Naruto Minato', 1, 0),
(69, 10, 'z4681613437374.png', 'Mô Hình Naruto Minato', 1, 0),
(70, 10, 'z4681613392143.png', 'Mô Hình Naruto Minato', 1, 0),
(71, 10, 'z4681613394649.png', 'Mô Hình Naruto Minato', 1, 0),
(72, 10, 'z4681613395146.png', 'Mô Hình Naruto Minato', 1, 0),
(73, 10, 'z4681613404478.png', 'Mô Hình Naruto Minato', 1, 0),
(74, 10, 'z4681613413955.png', 'Mô Hình Naruto Minato', 1, 0),
(75, 10, 'z4681613391560.png', 'Mô Hình Naruto Minato', 1, 0),
(76, 10, 'z4681613427332.png', 'Mô Hình Naruto Minato', 1, 0),
(77, 11, 'z4605880353840.png', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 1, 0),
(78, 11, 'z4605880259900.png', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 1, 0),
(79, 11, 'z4605880257849.png', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 1, 0),
(80, 11, 'z4605880268336.png', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 1, 0),
(81, 11, 'z4605880243941.png', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 1, 0),
(82, 11, 'z4605880259170.png', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 1, 0),
(83, 11, 'z4605880259276.png', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 1, 0),
(84, 11, 'z4605880328217.png', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 1, 0),
(85, 11, 'z4605880353368.png', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 1, 0),
(86, 12, 'z4418594145759.png', 'Mô hình Naruto Bán Thân Uchiha Shisui', 1, 0),
(87, 12, 'z4418197822588.png', 'Mô hình Naruto Bán Thân Uchiha Shisui', 1, 0),
(88, 12, 'z4418594147820.png', 'Mô hình Naruto Bán Thân Uchiha Shisui', 1, 0),
(89, 12, 'z4418594109495.png', 'Mô hình Naruto Bán Thân Uchiha Shisui', 1, 0),
(90, 12, 'z4418594148448.jpg', 'Mô hình Naruto Bán Thân Uchiha Shisui', 1, 0),
(91, 12, 'z4418594121231.jpg', 'Mô hình Naruto Bán Thân Uchiha Shisui', 1, 0),
(92, 12, 'z4418594101954.jpg', 'Mô hình Naruto Bán Thân Uchiha Shisui', 1, 0),
(93, 12, 'z4418594130989.jpg', 'Mô hình Naruto Bán Thân Uchiha Shisui', 1, 0),
(94, 13, 'z4418211701733.jpg', 'Mô hình Naruto Bán Thân Đệ Lục Kakashi', 1, 0),
(95, 13, 'z4418197822588.jpg', 'Mô hình Naruto Bán Thân Đệ Lục Kakashi', 1, 0),
(96, 13, 'z4418211668410.jpg', 'Mô hình Naruto Bán Thân Đệ Lục Kakashi', 1, 0),
(97, 13, 'z4418211686740.jpg', 'Mô hình Naruto Bán Thân Đệ Lục Kakashi', 1, 0),
(98, 13, 'z4418211644945.jpg', 'Mô hình Naruto Bán Thân Đệ Lục Kakashi', 1, 0),
(99, 13, 'z4418211639773.jpg', 'Mô hình Naruto Bán Thân Đệ Lục Kakashi', 1, 0),
(100, 13, 'z4418211650570.jpg', 'Mô hình Naruto Bán Thân Đệ Lục Kakashi', 1, 0),
(101, 14, 'z4418140959826.jpg', 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade', 1, 0),
(102, 14, 'z4418197822588-1.jpg', 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade', 1, 0),
(103, 14, 'z4418140858756.jpg', 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade', 1, 0),
(104, 14, 'z4418140865284.jpg', 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade', 1, 0),
(105, 14, 'z4418140879138.jpg', 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade', 1, 0),
(106, 14, 'z4418140890841.jpg', 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade', 1, 0),
(107, 14, 'z4418140924446.jpg', 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade', 1, 0),
(108, 14, 'z4418140949147.jpg', 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade', 1, 0),
(109, 15, 'z4418581757201.jpg', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 1, 0),
(110, 15, 'z4418197822588-2.jpg', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 1, 0),
(111, 15, 'z4418581747754.jpg', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 1, 0),
(112, 15, 'z4418581733296.jpg', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 1, 0),
(113, 15, 'z4418581674651.jpg', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 1, 0),
(114, 15, 'z4418581670065.jpg', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 1, 0),
(115, 15, 'z4418581689479.jpg', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 1, 0),
(116, 15, 'z4418581700068.jpg', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 1, 0),
(117, 15, 'z4418581722593.jpg', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 1, 0),
(118, 16, 'z4418549907725.jpg', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 1, 0),
(119, 16, 'z4418197822588-3.jpg', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 1, 0),
(120, 16, 'z4418549894067.jpg', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 1, 0),
(121, 16, 'z4418549806030.jpg', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 1, 0),
(122, 16, 'z4418549812573.jpg', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 1, 0),
(123, 16, 'z4418549817078.jpg', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 1, 0),
(124, 16, 'z4418549834913.jpg', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 1, 0),
(125, 16, 'z4418549846752.jpg', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 1, 0),
(126, 16, 'z4418549869101.jpg', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 1, 0),
(127, 17, 'z4418541201453.jpg', 'Mô hình Naruto Bán Thân Uchiha Madara', 1, 0),
(128, 17, 'z4418197822588-4.jpg', 'Mô hình Naruto Bán Thân Uchiha Madara', 1, 0),
(129, 17, 'z4418541197668.jpg', 'Mô hình Naruto Bán Thân Uchiha Madara', 1, 0),
(130, 17, 'z4418541199200.jpg', 'Mô hình Naruto Bán Thân Uchiha Madara', 1, 0),
(131, 17, 'z4418541149294.jpg', 'Mô hình Naruto Bán Thân Uchiha Madara', 1, 0),
(132, 17, 'z4418541157653.jpg', 'Mô hình Naruto Bán Thân Uchiha Madara', 1, 0),
(133, 17, 'z4418541168729.jpg', 'Mô hình Naruto Bán Thân Uchiha Madara', 1, 0),
(134, 17, 'z4418541179690.jpg', 'Mô hình Naruto Bán Thân Uchiha Madara', 1, 0),
(135, 18, 'z4418534505209.jpg', 'Mô hình Naruto Bán Thân Uchiha Obito', 1, 0),
(136, 18, 'z4418197822588-5.jpg', 'Mô hình Naruto Bán Thân Uchiha Obito', 1, 0),
(137, 18, 'z4418534487223.jpg', 'Mô hình Naruto Bán Thân Uchiha Obito', 1, 0),
(138, 18, 'z4418534446465.jpg', 'Mô hình Naruto Bán Thân Uchiha Obito', 1, 0),
(139, 18, 'z4418534457549.jpg', 'Mô hình Naruto Bán Thân Uchiha Obito', 1, 0),
(140, 18, 'z4418534460444.jpg', 'Mô hình Naruto Bán Thân Uchiha Obito', 1, 0),
(141, 18, 'z4418534477105.jpg', 'Mô hình Naruto Bán Thân Uchiha Obito', 1, 0),
(142, 18, 'z4418534500277.jpg', 'Mô hình Naruto Bán Thân Uchiha Obito', 1, 0),
(143, 19, 'z4418571736591.jpg', 'Mô hình Naruto Bán Thân Uchiha sasuke', 1, 0),
(144, 19, 'z4418197822588-6.jpg', 'Mô hình Naruto Bán Thân Uchiha sasuke', 1, 0),
(145, 19, 'z4418571747897.jpg', 'Mô hình Naruto Bán Thân Uchiha sasuke', 1, 0),
(146, 19, 'z4418571724757.jpg', 'Mô hình Naruto Bán Thân Uchiha sasuke', 1, 0),
(147, 19, 'z4418571703015.jpg', 'Mô hình Naruto Bán Thân Uchiha sasuke', 1, 0),
(148, 19, 'z4418571711232.jpg', 'Mô hình Naruto Bán Thân Uchiha sasuke', 1, 0),
(149, 19, 'z4418571725946.jpg', 'Mô hình Naruto Bán Thân Uchiha sasuke', 1, 0),
(150, 19, 'z4418571739493.jpg', 'Mô hình Naruto Bán Thân Uchiha sasuke', 1, 0),
(151, 20, 'z4418560836936.jpg', 'Mô hình Naruto Bán Thân Uchiha itachi', 1, 0),
(152, 20, 'z4418197822588-7.jpg', 'Mô hình Naruto Bán Thân Uchiha itachi', 1, 0),
(153, 20, 'z4418560737772.jpg', 'Mô hình Naruto Bán Thân Uchiha itachi', 1, 0),
(154, 20, 'z4418560752861.jpg', 'Mô hình Naruto Bán Thân Uchiha itachi', 1, 0),
(155, 20, 'z4418560762485.jpg', 'Mô hình Naruto Bán Thân Uchiha itachi', 1, 0),
(156, 20, 'z4418560785807.jpg', 'Mô hình Naruto Bán Thân Uchiha itachi', 1, 0),
(157, 20, 'z4418560804417.jpg', 'Mô hình Naruto Bán Thân Uchiha itachi', 1, 0),
(158, 20, 'z4418560826049.jpg', 'Mô hình Naruto Bán Thân Uchiha itachi', 1, 0),
(159, 21, 'z4418526436827.jpg', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(160, 21, 'z4418197822588-8.jpg', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(161, 21, 'z4418526436718.jpg', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(162, 21, 'z4418526392266.jpg', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(163, 21, 'z4418526403603.jpg', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(164, 21, 'z4418526419789.jpg', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(165, 21, 'z4418526430199.jpg', 'Mô hình Naruto Bán Thân Naruto', 1, 0),
(166, 22, 'z4417475461858.jpg', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 1, 0),
(167, 22, 'z4417475460760.jpg', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 1, 0),
(168, 22, 'z4417475461459.jpg', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 1, 0),
(169, 22, 'z4417475427130.jpg', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 1, 0),
(170, 22, 'z4417475425450.jpg', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 1, 0),
(171, 22, 'z4417475374861.jpg', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 1, 0),
(172, 22, 'z4417475377540.jpg', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 1, 0),
(173, 22, 'z4417475401711.jpg', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 1, 0),
(174, 22, 'z4417475410388.jpg', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 1, 0),
(175, 23, 'z4386699762114.jpg', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu', 1, 0),
(176, 23, 'z4386699685498.jpg', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu', 1, 0),
(177, 23, 'z4386699686767.jpg', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu', 1, 0),
(178, 23, 'z4386699723049.jpg', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu', 1, 0),
(179, 23, 'z4386699686608.jpg', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu', 1, 0),
(180, 23, 'z4386699638498.jpg', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu', 1, 0),
(181, 23, 'z4386699662841.jpg', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu', 1, 0),
(182, 23, 'z4386699747050.jpg', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu', 1, 0),
(183, 24, 'z4384137408153.jpg', 'Mô hình Naruto Sasuke siêu ngầu', 1, 0),
(184, 24, 'o1cn015y18uz1otxugtaatv.jpg', 'Mô hình Naruto Sasuke siêu ngầu', 1, 0),
(185, 24, 'z4384137288211.jpg', 'Mô hình Naruto Sasuke siêu ngầu', 1, 0),
(186, 24, 'z4384137289362.jpg', 'Mô hình Naruto Sasuke siêu ngầu', 1, 0),
(187, 24, 'z4384137328550.jpg', 'Mô hình Naruto Sasuke siêu ngầu', 1, 0),
(188, 24, 'z4384137348365.jpg', 'Mô hình Naruto Sasuke siêu ngầu', 1, 0),
(189, 24, 'z4384137349700.jpg', 'Mô hình Naruto Sasuke siêu ngầu', 1, 0),
(190, 24, 'z4384137368691.jpg', 'Mô hình Naruto Sasuke siêu ngầu', 1, 0),
(191, 24, 'z4384137410085.jpg', 'Mô hình Naruto Sasuke siêu ngầu', 1, 0),
(192, 25, 'z4386971636053.jpg', 'Mô hình Naruto Kakashi dáng đứng siêu ngầu', 1, 0),
(193, 25, 'z4386971488658.jpg', 'Mô hình Naruto Kakashi dáng đứng siêu ngầu', 1, 0),
(194, 25, 'z4386971504437.jpg', 'Mô hình Naruto Kakashi dáng đứng siêu ngầu', 1, 0),
(195, 25, 'z4386971520979.jpg', 'Mô hình Naruto Kakashi dáng đứng siêu ngầu', 1, 0),
(196, 25, 'z4386971540666.jpg', 'Mô hình Naruto Kakashi dáng đứng siêu ngầu', 1, 0),
(197, 25, 'z4386971584107.jpg', 'Mô hình Naruto Kakashi dáng đứng siêu ngầu', 1, 0),
(198, 25, 'z4386971633912.jpg', 'Mô hình Naruto Kakashi dáng đứng siêu ngầu', 1, 0),
(199, 26, 'o1cn01jwq2fc1uoi5xjdt2v.jpg', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 1, 0),
(200, 26, 'z4249727203449.jpg', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 1, 0),
(201, 26, 'z4249727216602.jpg', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 1, 0),
(202, 26, 'z4249727197829.jpg', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 1, 0),
(203, 26, 'z4249727200571.jpg', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 1, 0),
(204, 26, 'z4249727204263.jpg', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 1, 0),
(205, 26, 'z4249727234808.jpg', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 1, 0),
(206, 26, 'z4249727250169.jpg', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 1, 0),
(207, 26, 'z4249727266334.jpg', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 1, 0),
(208, 27, 'o1cn01nng0xc1rmhbghqavo.jpg', 'Mô Hình Cữu Vĩ Kurama Cao 16cm', 1, 0),
(209, 27, '03.jpg', 'Mô Hình Cữu Vĩ Kurama Cao 16cm', 1, 0),
(210, 27, '04.jpg', 'Mô Hình Cữu Vĩ Kurama Cao 16cm', 1, 0),
(211, 27, '05.jpg', 'Mô Hình Cữu Vĩ Kurama Cao 16cm', 1, 0),
(212, 27, '06.jpg', 'Mô Hình Cữu Vĩ Kurama Cao 16cm', 1, 0),
(213, 28, 'o1cn01htawrz1bs2jbkmbka.jpg', 'Mô hình Uchiha Madara - Lục đạo', 1, 0),
(214, 28, 'gqhre-1658310473849.jpg', 'Mô hình Uchiha Madara - Lục đạo', 1, 0),
(215, 28, 'h99067b777f04426284b3ed2d27913f75s.jpg', 'Mô hình Uchiha Madara - Lục đạo', 1, 0),
(216, 28, 'o1cn01ccdejq1kzfsttlqxr.jpg', 'Mô hình Uchiha Madara - Lục đạo', 1, 0),
(217, 28, 'o1cn01so1tw21kzfsppf27g.jpg', 'Mô hình Uchiha Madara - Lục đạo', 1, 0),
(218, 28, 'o1cn01xn499m1kzfsppd9nk.jpg', 'Mô hình Uchiha Madara - Lục đạo', 1, 0),
(219, 28, 'o1cn01ic6jzj2gczzhs9f4q.jpg', 'Mô hình Uchiha Madara - Lục đạo', 1, 0),
(220, 29, '07-b8316791-0fca-.jpg', 'Mô Hình Itachi Uế Thổ Chuyển Sinh', 1, 0),
(221, 29, 'qhrtehert-1658309968777.jpg', 'Mô Hình Itachi Uế Thổ Chuyển Sinh', 1, 0),
(222, 29, '03-0cbde154-2c49.jpg', 'Mô Hình Itachi Uế Thổ Chuyển Sinh', 1, 0),
(223, 29, '04-5dd866db-4141.jpg', 'Mô Hình Itachi Uế Thổ Chuyển Sinh', 1, 0),
(224, 29, '05-91fa3edd.jpg', 'Mô Hình Itachi Uế Thổ Chuyển Sinh', 1, 0),
(225, 29, '06-e948bed9-a0d2.jpg', 'Mô Hình Itachi Uế Thổ Chuyển Sinh', 1, 0),
(226, 29, '15-87714362-0547.webp', 'Mô Hình Itachi Uế Thổ Chuyển Sinh', 1, 0),
(227, 114, 'z4806389075226.jpg', 'Mô Hình Kimetsu No Yaiba Ác quỷ Tanjiro', 1, 0),
(228, 114, 'z4806389063842.jpg', 'Mô Hình Kimetsu No Yaiba Ác quỷ Tanjiro', 1, 0),
(229, 114, 'z4806389069490.jpg', 'Mô Hình Kimetsu No Yaiba Ác quỷ Tanjiro', 1, 0),
(230, 114, 'z4806389069379.jpg', 'Mô Hình Kimetsu No Yaiba Ác quỷ Tanjiro', 1, 0),
(231, 114, 'z4806389083344.jpg', 'Mô Hình Kimetsu No Yaiba Ác quỷ Tanjiro', 1, 0),
(232, 114, 'z4806389083515.jpg', 'Mô Hình Kimetsu No Yaiba Ác quỷ Tanjiro', 1, 0),
(233, 115, 'o1cn01aufkzo1rmhks0dq6p.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(234, 115, 'z4759245258945.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(235, 115, 'z4759245241444.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(236, 115, 'z4759245243976.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(237, 115, 'z4759245249890.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(238, 115, 'z4759245269545.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(239, 115, 'z4759245217680.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(240, 115, 'z4759245227384.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(241, 115, 'z4759245238383.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(242, 115, 'z4759245227620.jpg', 'Thượng tam akaza dáng đứng siêu ngầu', 1, 0),
(243, 116, 'z4387166703697.jpg', 'Shinobu đứng trên mái siêu đẹp', 1, 0),
(244, 116, 'z4387167089910.jpg', 'Shinobu đứng trên mái siêu đẹp', 1, 0),
(245, 116, 'z4387166689226.jpg', 'Shinobu đứng trên mái siêu đẹp', 1, 0),
(246, 117, 'z4387274417825.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(247, 117, 'z4387274418298.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(248, 117, 'z4387274160074.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(249, 117, 'z4387274166627.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(250, 117, 'z4387274209971.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(251, 117, 'z4387274209972.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(252, 117, 'z4387274221048.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(253, 117, 'z4387274314472.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(254, 117, 'z4387274333698.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(255, 117, 'z4387274386414.jpg', 'Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 1, 0),
(256, 118, 'z4254057664987.jpg', 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 ', 1, 0),
(257, 118, 'z4254057638180.jpg', 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 ', 1, 0),
(258, 118, 'z4254057638651.jpg', 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 ', 1, 0),
(259, 118, 'z4254057640337.jpg', 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 ', 1, 0),
(260, 118, 'z4254057630276.jpg', 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 ', 1, 0),
(261, 118, 'z4254057623175.jpg', 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 ', 1, 0),
(262, 118, 'z4254057649523.jpg', 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 ', 1, 0),
(263, 118, 'z4254057650877.jpg', 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 ', 1, 0),
(264, 118, 'z4254057656629.jpg', 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 ', 1, 0),
(265, 119, 'o1cn01neo5km1iydp1foxjc.jpg', 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu', 1, 0),
(266, 119, 'o1cn01il4bhk1gnwyossc2q.jpg', 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu', 1, 0),
(267, 119, 'o1cn01r2o56b1iydorcvxe5.jpg', 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu', 1, 0),
(268, 119, 'o1cn01qz5kdu1iydorcvyhi.jpg', 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu', 1, 0),
(269, 119, 'o1cn0193ztxe1iydp6rjdja.jpg', 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu', 1, 0),
(270, 119, 'o1cn01htisgh1iydp1foppd.jpg', 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu', 1, 0),
(271, 119, 'o1cn01okexav1iydp2enweu.jpg', 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu', 1, 0),
(272, 119, 'o1cn01z5vqa21iydoyrxddq.jpg', 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu', 1, 0),
(273, 120, 'o1cn01lxyill1iydp6rgfis.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(274, 120, 'o1cn01ywq6cc1iydoyrxmzh.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(275, 120, 'o1cn011n6jsu1iydoyrxr8a.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(276, 120, 'o1cn01jnvgmh1iydp8fukj7.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(277, 120, 'o1cn01dpia981iydp6rildl-2214736640962-0-cib.webp', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(278, 120, 'o1cn01hznrpw1iydp6rh8oi.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(279, 120, 'o1cn01x7kp2d1iydoyrxion.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(280, 120, 'o1cn01xonzai1iydp4cycn8.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(281, 120, 'o1cn01zn3t0y1iydowjzka1.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(282, 120, 'o1cn01cvq0ci1iydp2egi69.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(283, 120, 'asdfasdfasdf.jpg', 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba', 1, 0),
(284, 121, 'z4171778974597.jpg', 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figur', 1, 0),
(285, 121, 'z4171778884542.jpg', 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figur', 1, 0),
(286, 121, 'z4171778887533.jpg', 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figur', 1, 0),
(287, 121, 'z4171778909758.jpg', 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figur', 1, 0),
(288, 121, 'z4171778931103.jpg', 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figur', 1, 0),
(289, 121, 'z4171778944549.jpg', 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figur', 1, 0),
(290, 121, 'z4171778965465.jpg', 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figur', 1, 0),
(291, 121, 'z4171778966562.jpg', 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figur', 1, 0),
(292, 121, 'z4171778974596.jpg', 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figur', 1, 0),
(293, 122, 'k03-1675857068146.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(294, 122, 'z4125798922273.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(295, 122, 'z4125798847221.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(296, 122, 'z4125798928252.webp', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(297, 122, 'z4125798928597.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(298, 122, 'z4125798941628.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(299, 122, 'z4125798941827.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(300, 122, 'z4125798961799.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(301, 122, 'z4125798974495.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(302, 122, 'z4125799001400.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh g', 1, 0),
(303, 123, 'z4129410687341.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(304, 123, 'z4129410703596.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(305, 123, 'z4129410703596-4ca8b48294f5e0785272413b681d60b9.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(306, 123, 'z4129410712822.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(307, 123, 'z4129410728100.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(308, 123, 'z4129410736775.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(309, 123, 'z4129410750424.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(310, 123, 'z4129410762762.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(311, 123, 'z4129410762887.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(312, 123, 'z4129410776333.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(313, 123, 'k02-1675857026774.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(314, 123, 'z4129410606530.jpg', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Than', 1, 0),
(315, 124, 'z4143591786018.jpg', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(316, 124, 'z4143591603808.jpg', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(317, 124, 'z4143591615010.jpg', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(318, 124, 'z4143591615016.webp', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(319, 124, 'z4143591641944.jpg', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(320, 124, 'z4143591668980.jpg', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(321, 124, 'z4143591710531.jpg', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(322, 124, 'z4143591732000.jpg', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(323, 124, 'z4143591763227.jpg', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(324, 124, 'z4143591812199.jpg', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - C', 1, 0),
(325, 125, 'z3948944117655.jpg', 'Mô Hình Kimetsu No Yaiba Zenitshu chiến đấu có led siêu đẹp cao 35cm - Figure Kimetsu No Yaiba - Có ', 1, 0),
(326, 125, 'z3948944106453.jpg', 'Mô Hình Kimetsu No Yaiba Zenitshu chiến đấu có led siêu đẹp cao 35cm - Figure Kimetsu No Yaiba - Có ', 1, 0),
(327, 125, 'z3948944106193.jpg', 'Mô Hình Kimetsu No Yaiba Zenitshu chiến đấu có led siêu đẹp cao 35cm - Figure Kimetsu No Yaiba - Có ', 1, 0),
(328, 125, 'z3948944106309.jpg', 'Mô Hình Kimetsu No Yaiba Zenitshu chiến đấu có led siêu đẹp cao 35cm - Figure Kimetsu No Yaiba - Có ', 1, 0),
(329, 125, 'z3948944106335.jpg', 'Mô Hình Kimetsu No Yaiba Zenitshu chiến đấu có led siêu đẹp cao 35cm - Figure Kimetsu No Yaiba - Có ', 1, 0),
(330, 125, 'z3948944102549.jpg', 'Mô Hình Kimetsu No Yaiba Zenitshu chiến đấu có led siêu đẹp cao 35cm - Figure Kimetsu No Yaiba - Có ', 1, 0),
(331, 126, 'o1cn01twv4vo1rmherw3h3n.jpg', 'Mô Hình Inosuke Cao 29cm , nặng 700 Gram - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(332, 126, 'o1cn0140redy22vl8l9un2r.jpg', 'Mô Hình Inosuke Cao 29cm , nặng 700 Gram - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(333, 126, 'o1cn01qlbgia22vl8luaijq.jpg', 'Mô Hình Inosuke Cao 29cm , nặng 700 Gram - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(334, 126, 'o1cn01rfy9dq1jxic8iscww.jpg', 'Mô Hình Inosuke Cao 29cm , nặng 700 Gram - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(335, 126, 'o1cn01atmrve1jxicdbq5b0.jpg', 'Mô Hình Inosuke Cao 29cm , nặng 700 Gram - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(336, 126, 'o1cn01cysjy81jxic3r6ftq.jpg', 'Mô Hình Inosuke Cao 29cm , nặng 700 Gram - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(337, 127, 'o1cn01nqwhgd2ltrows52tn.jpg', 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 1, 0),
(338, 127, '19395271467-940441246.jpg', 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 1, 0),
(339, 127, 'o1cn01evbpoc1lophyao5th.jpg', 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 1, 0),
(340, 127, 'o1cn01iaougi1es9dawtniq.jpg', 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 1, 0),
(341, 127, 'o1cn01mt802n2ltroz9wybd.jpg', 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 1, 0),
(342, 127, 'o1cn01n0ishv1es9dh1jstu.jpg', 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 1, 0),
(343, 127, 'o1cn01x43wtu1emxcio6x8b.jpg', 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 1, 0),
(344, 127, 'o1cn01z8jitr24dyxcjofis.jpg', 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 1, 0),
(345, 127, 'o1cn0125uzlr2ltrows4f0v.jpg', 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 1, 0),
(346, 128, '812-1659158962579.jpg', 'Mô Hình Thượng Lục Daki Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp màu', 1, 0),
(347, 128, 'o1cn01tidz2e1jxibn25ame-2200757714615.jpg', 'Mô Hình Thượng Lục Daki Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp màu', 1, 0),
(348, 128, 'o1cn01vh3nrk1i7fzpbooox-4200794366.jpg', 'Mô Hình Thượng Lục Daki Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp màu', 1, 0),
(349, 128, 'o1cn0115svcp1otxqumegve-2211249091764.jpg', 'Mô Hình Thượng Lục Daki Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp màu', 1, 0),
(350, 129, '813-1659159066516.jpg', 'Mô Hình Tsugikuni Yoriichi Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(351, 129, 'o1cn01tidz2e1jxibn25ame-2200757714615-1.jpg', 'Mô Hình Tsugikuni Yoriichi Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(352, 129, 'o1cn01tidz2e1jxibn25ame-2200757714615-1.jpg', 'Mô Hình Tsugikuni Yoriichi Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(353, 129, 'o1cn01tidz2e1jxibn25ame-2200757714615-1.jpg', 'Mô Hình Tsugikuni Yoriichi Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(354, 130, '811-1659158919593.jpg', 'Mô Hình Thượng Lục Gyuutarou Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(355, 130, 'o1cn01tidz2e1jxibn25ame-2200757714615-2.jpg', 'Mô Hình Thượng Lục Gyuutarou Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(356, 130, 'o1cn01vh3nrk1i7fzpbooox-4200794366-2.jpg', 'Mô Hình Thượng Lục Gyuutarou Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(357, 130, 'o1cn0115svcp1otxqumegve-2211249091764-3.jpg', 'Mô Hình Thượng Lục Gyuutarou Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(358, 131, '810-1659158869617.jpg', 'Mô Hình Thượng Nhất Kokushibou Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(359, 131, 'o1cn01tidz2e1jxibn25ame-2200757714615-3.jpg', 'Mô Hình Thượng Nhất Kokushibou Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(360, 131, 'o1cn01vh3nrk1i7fzpbooox-4200794366-3.jpg', 'Mô Hình Thượng Nhất Kokushibou Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 1, 0),
(361, 163, 'z4842157162877.jpg', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10k', 1, 0),
(362, 163, 'z4843151972265.jpg', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10k', 1, 0),
(363, 163, 'z4843151972816.jpg', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10k', 1, 0),
(364, 163, 'z4843151987752.jpg', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10k', 1, 0),
(365, 163, 'z4843152001496.jpg', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10k', 1, 0),
(366, 163, 'z4843152001580.jpg', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10k', 1, 0),
(367, 163, 'z4843152018225.jpg', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10k', 1, 0),
(368, 163, 'z4843152033787.jpg', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10k', 1, 0),
(369, 163, 'z4843152056285.jpg', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10k', 1, 0),
(370, 164, 'z4842806344834.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(371, 164, 'z4842806330975.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(372, 164, 'z4842806318174.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(373, 164, 'z4842806357662.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(374, 164, 'z4842806301123.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(375, 164, 'z4842806312918.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(376, 164, 'z4842806316307.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(377, 164, 'z4842806324052.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(378, 164, 'z4842806334644.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(379, 164, 'z4842806353839.jpg', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePi', 1, 0),
(380, 165, 'z4806927801249.jpg', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece -', 1, 0),
(381, 165, 'z4806927803897.jpg', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece -', 1, 0),
(382, 165, 'z4806927804083.jpg', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece -', 1, 0),
(383, 165, 'z4806927804304.jpg', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece -', 1, 0),
(384, 165, 'z4806927804305.jpg', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece -', 1, 0),
(385, 165, 'z4806927804306.jpg', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece -', 1, 0),
(386, 165, 'z4806927804307.jpg', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece -', 1, 0),
(387, 165, 'z4806927808882.jpg', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece -', 1, 0),
(388, 165, 'z4806927814042.jpg', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece -', 1, 0),
(389, 166, 'z4873102333596.jpg', 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu -', 1, 0),
(390, 166, 'z4873102101774.jpg', 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu -', 1, 0),
(391, 166, 'z4873102238026.jpg', 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu -', 1, 0),
(392, 166, 'z4873102049141.jpg', 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu -', 1, 0),
(393, 166, 'z4873102055506.jpg', 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu -', 1, 0),
(394, 166, 'z4873102059430.jpg', 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu -', 1, 0),
(395, 166, 'z4873102143882.jpg', 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu -', 1, 0),
(396, 166, 'z4873102304720.jpg', 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu -', 1, 0),
(397, 167, 'z4806997608749.jpg', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 1, 0),
(398, 167, 'z4806997615169.jpg', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 1, 0),
(399, 167, 'z4806997615173.jpg', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 1, 0),
(400, 167, 'z4806997615270.jpg', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 1, 0),
(401, 167, 'z4806997615408.jpg', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 1, 0),
(402, 167, 'z4806997615436.jpg', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 1, 0),
(403, 167, 'z4806997625024.jpg', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 1, 0),
(404, 167, 'z4806997625125.jpg', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 1, 0),
(405, 167, 'z4806997625126.jpg', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 1, 0),
(406, 168, 'z4818811807887.jpg', 'Mô Hình OnePiece Shanks và luffy đại chiến đảo đầu lâu - Cao 50cm - rộng 37cm - nặng 6kg5 - Figure O', 1, 0),
(407, 168, 'z4818811808572.jpg', 'Mô Hình OnePiece Shanks và luffy đại chiến đảo đầu lâu - Cao 50cm - rộng 37cm - nặng 6kg5 - Figure O', 1, 0),
(408, 168, 'z4818811787364.jpg', 'Mô Hình OnePiece Shanks và luffy đại chiến đảo đầu lâu - Cao 50cm - rộng 37cm - nặng 6kg5 - Figure O', 1, 0),
(409, 168, 'z4818811789057.jpg', 'Mô Hình OnePiece Shanks và luffy đại chiến đảo đầu lâu - Cao 50cm - rộng 37cm - nặng 6kg5 - Figure O', 1, 0),
(410, 168, 'z4818811808547.jpg', 'Mô Hình OnePiece Shanks và luffy đại chiến đảo đầu lâu - Cao 50cm - rộng 37cm - nặng 6kg5 - Figure O', 1, 0),
(411, 169, 'z4806381455966.jpg', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - C', 1, 0),
(412, 169, 'z4806381468953.jpg', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - C', 1, 0),
(413, 169, 'z4806381455947.jpg', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - C', 1, 0),
(414, 169, 'z4806381459322.jpg', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - C', 1, 0),
(415, 169, 'z4806381460217.jpg', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - C', 1, 0),
(416, 169, 'z4806381460276.jpg', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - C', 1, 0),
(417, 169, 'z4806381460435.jpg', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - C', 1, 0),
(418, 169, 'z4806381468961.jpg', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - C', 1, 0),
(419, 169, 'z4806381460539.jpg', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - C', 1, 0),
(420, 170, 'z4819219427154.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(421, 170, 'z4819219416504.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(422, 170, 'z4819219970565.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(423, 170, 'z4819219315611.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(424, 170, 'z4819219334928.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(425, 170, 'z4819219369427.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(426, 170, 'z4819219416502.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(427, 170, 'z4819219420857.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(428, 170, 'z4819219428590.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(429, 170, 'z4819219320642.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(430, 170, 'z4819219440087.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12k', 1, 0),
(431, 171, 'z4760077779118.jpg', 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 1, 0),
(432, 171, 'z4756315942357.jpg', 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 1, 0),
(433, 171, 'z4760077779113.jpg', 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 1, 0),
(434, 171, 'z4760077745280.jpg', 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 1, 0),
(435, 171, 'z4760077746269.jpg', 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 1, 0),
(436, 171, 'z4760077746271.jpg', 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 1, 0),
(437, 171, 'z4760077751498.jpg', 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 1, 0),
(438, 171, 'z4760077768432.jpg', 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 1, 0),
(439, 172, 'z4774160120774.jpg', 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu - Cao 50cm - rộng 26cm - nặng 3kg - Phụ Kiện : 5 đầu ', 1, 0),
(440, 172, 'z4774160130576.jpg', 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu - Cao 50cm - rộng 26cm - nặng 3kg - Phụ Kiện : 5 đầu ', 1, 0),
(441, 172, 'z4774160110851.jpg', 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu - Cao 50cm - rộng 26cm - nặng 3kg - Phụ Kiện : 5 đầu ', 1, 0),
(442, 172, 'z4774160098561.jpg', 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu - Cao 50cm - rộng 26cm - nặng 3kg - Phụ Kiện : 5 đầu ', 1, 0),
(443, 172, 'z4774160110499.jpg', 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu - Cao 50cm - rộng 26cm - nặng 3kg - Phụ Kiện : 5 đầu ', 1, 0),
(444, 172, 'z4774160130577.jpg', 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu - Cao 50cm - rộng 26cm - nặng 3kg - Phụ Kiện : 5 đầu ', 1, 0),
(445, 172, 'z4774160098560.jpg', 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu - Cao 50cm - rộng 26cm - nặng 3kg - Phụ Kiện : 5 đầu ', 1, 0),
(446, 173, 'o1cn012eofot1rmhkpldnez.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(447, 173, 'z4734595416681.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(448, 173, 'z4734595406075.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(449, 173, 'z4734595387504.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(450, 173, 'z4734595406015.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(451, 173, 'z4734595372007.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(452, 173, 'z4734595387487.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(453, 173, 'z4734595372448.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(454, 173, 'z4734595366883.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(455, 173, 'z4734595416621.jpg', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 ', 1, 0),
(456, 174, 'z4760423177401.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(457, 174, 'z4760423179045.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(458, 174, 'z4760423178120.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(459, 174, 'z4760423168718.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(460, 174, 'z4760423166743.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(461, 174, 'z4760423166745.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(462, 174, 'z4760423169786.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(463, 174, 'z4760423170560.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(464, 174, 'z4760423175221.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(465, 174, 'z4760423182669.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(466, 174, 'z4760423184436.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện', 1, 0),
(467, 175, 'z4736704794268.jpg', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece -', 1, 0);
INSERT INTO `images` (`id`, `id_product`, `src`, `alt`, `is_thumbnail`, `is_banner`) VALUES
(468, 175, 'z4736704758385.jpg', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece -', 1, 0),
(469, 175, 'z4736704776367.jpg', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece -', 1, 0),
(470, 175, 'z4736704792283.jpg', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece -', 1, 0),
(471, 175, 'z4736704781987.jpg', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece -', 1, 0),
(472, 175, 'z4736704792641.jpg', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece -', 1, 0),
(473, 175, 'z4736704792642.jpg', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece -', 1, 0),
(474, 175, 'z4736704794145.jpg', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece -', 1, 0),
(475, 175, 'z4736704773266.jpg', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece -', 1, 0),
(476, 176, 'z4665926866321.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(477, 176, 'z4665926808113.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(478, 176, 'z4665926808544.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(479, 176, 'z4665926812192.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(480, 176, 'z4665926813162.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(481, 176, 'z4665926822974.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(482, 176, 'z4665926822984.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(483, 176, 'z4665926836767.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(484, 176, 'z4665926850941.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(485, 176, 'z4665926864128.jpg', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu ', 1, 0),
(486, 177, 'z4761801601565.jpg', 'Mô Hình OnePiece ACE đại chiến Yamato - Cao 12cm - nặng 160gram - Phụ Kiện : Đế + chùy gai + lửa , F', 1, 0),
(487, 177, 'z4761801585400.jpg', 'Mô Hình OnePiece ACE đại chiến Yamato - Cao 12cm - nặng 160gram - Phụ Kiện : Đế + chùy gai + lửa , F', 1, 0),
(488, 177, 'z4761801589758.jpg', 'Mô Hình OnePiece ACE đại chiến Yamato - Cao 12cm - nặng 160gram - Phụ Kiện : Đế + chùy gai + lửa , F', 1, 0),
(489, 177, 'z4761801603868.jpg', 'Mô Hình OnePiece ACE đại chiến Yamato - Cao 12cm - nặng 160gram - Phụ Kiện : Đế + chùy gai + lửa , F', 1, 0),
(490, 178, 'z4734069985425.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(491, 178, 'z4734069984290.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(492, 178, 'z4734069895225.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(493, 178, 'z4734069960726.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(494, 178, 'z4734069947798.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(495, 178, 'z4734069902269.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(496, 178, 'z4734069902292.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(497, 178, 'z4734069914671.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(498, 178, 'z4734069925708.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(499, 178, 'z4734069938159.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(500, 178, 'z4734069972417.jpg', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Ha', 1, 0),
(501, 179, 'z4695903950580.jpg', 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu Cao 31cm - nặng 950gram - Phụ kiện', 1, 0),
(502, 179, 'z4695903933296.jpg', 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu Cao 31cm - nặng 950gram - Phụ kiện', 1, 0),
(503, 179, 'z4695903887485.jpg', 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu Cao 31cm - nặng 950gram - Phụ kiện', 1, 0),
(504, 179, 'z4695903892191.jpg', 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu Cao 31cm - nặng 950gram - Phụ kiện', 1, 0),
(505, 179, 'z4695903892748.jpg', 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu Cao 31cm - nặng 950gram - Phụ kiện', 1, 0),
(506, 179, 'z4695903898172.jpg', 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu Cao 31cm - nặng 950gram - Phụ kiện', 1, 0),
(507, 179, 'z4695903915092.jpg', 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu Cao 31cm - nặng 950gram - Phụ kiện', 1, 0),
(508, 180, 'z4695929506558.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(509, 180, 'z4695929426861.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(510, 180, 'z4695929342490.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(511, 180, 'z4695929404698.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(512, 180, 'z4695929464141.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(513, 180, 'z4695929486305.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(514, 180, 'z4695929337337.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(515, 180, 'z4695929342492.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(516, 180, 'z4695929368164.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(517, 180, 'z4695929384459.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(518, 180, 'z4695929404644.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(519, 180, 'z4695929440866.jpg', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện', 1, 0),
(520, 181, 'z4683328487826.jpg', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có', 1, 0),
(521, 181, 'z4683328462116.jpg', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có', 1, 0),
(522, 181, 'z4683328446329.jpg', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có', 1, 0),
(523, 181, 'z4683328393451.jpg', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có', 1, 0),
(524, 181, 'z4683328401032.jpg', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có', 1, 0),
(525, 181, 'z4683328401121.jpg', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có', 1, 0),
(526, 181, 'z4683328414330.jpg', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có', 1, 0),
(527, 181, 'z4683328427920.jpg', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có', 1, 0),
(528, 181, 'z4683328473982.jpg', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có', 1, 0),
(529, 182, 'z4713175845927.jpg', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi', 1, 0),
(530, 182, 'z4713175802364.jpg', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi', 1, 0),
(531, 182, 'z4713175818390.jpg', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi', 1, 0),
(532, 182, 'z4713175818391.jpg', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi', 1, 0),
(533, 182, 'z4713175819429.jpg', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi', 1, 0),
(534, 182, 'z4713175831799.jpg', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi', 1, 0),
(535, 182, 'z4713175807635.jpg', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi', 1, 0),
(536, 182, 'z4713175802221.jpg', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi', 1, 0),
(537, 182, 'z4713175855315.jpg', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi', 1, 0),
(538, 183, 'z4604185159873.jpg', 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm', 1, 0),
(539, 183, 'z4604185159875.jpg', 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm', 1, 0),
(540, 183, 'z4604185159219.jpg', 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm', 1, 0),
(541, 183, 'z4604185159871.jpg', 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm', 1, 0),
(542, 183, 'z4604185159874.jpg', 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm', 1, 0),
(543, 183, 'z4604185156657.jpg', 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm', 1, 0),
(544, 183, 'z4604185157856.jpg', 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm', 1, 0),
(545, 183, 'z4604185158150.jpg', 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm', 1, 0),
(546, 184, 'z4665609297998.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(547, 184, 'z4665609309171.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(548, 184, 'z4665609315790.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(549, 184, 'z4665609308856.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(550, 184, 'z4665609315820.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(551, 184, 'z4665609335800.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(552, 184, 'z4665609353671.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(553, 184, 'z4665609367169.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(554, 184, 'z4665609380271.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(555, 184, 'z4665609402265.jpg', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Bo', 1, 0),
(556, 185, 'o1cn01cbvqb41rmhkhohpba.jpg', 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(557, 185, 'z4669561606381.jpg', 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(558, 185, 'z4669561616776.jpg', 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(559, 185, 'z4669561574654.jpg', 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(560, 185, 'z4669561581654.jpg', 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(561, 185, 'z4669561581655.jpg', 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(562, 185, 'z4669561581656.jpg', 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(563, 185, 'z4669561593068.jpg', 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(564, 186, 'o1cn01ctmf0s1rmhka9clh4.jpg', 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(565, 186, 'z4669124751159.jpg', 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(566, 186, 'z4669124752381.jpg', 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(567, 186, 'z4669124758773.jpg', 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(568, 186, 'z4669124767093.jpg', 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(569, 186, 'z4669124786253.jpg', 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(570, 186, 'z4669124798948.jpg', 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(571, 186, 'z4669124816256.jpg', 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu', 1, 0),
(572, 187, 'z4511803759004.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(573, 187, 'z4511803731763.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(574, 187, 'z4511803819952.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(575, 187, 'z4511803819932.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(576, 187, 'z4511803716336.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(577, 187, 'z4511803819953.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(578, 187, 'z4511803819954.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(579, 187, 'z4511803759009.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(580, 187, 'z4511803759047.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(581, 187, 'z4511803759048.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(582, 187, 'z4511803793535.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(583, 187, 'z4511803793821.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(584, 187, 'z4511803847308.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(585, 187, 'z4511803733219.jpg', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đ', 1, 0),
(586, 188, 'z4514727547801.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(587, 188, 'z4514727523732.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(588, 188, 'z4514727423306.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(589, 188, 'z4514727423387.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(590, 188, 'z4514727416251.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(591, 188, 'z4514727423428.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(592, 188, 'z4514727438383.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(593, 188, 'z4514727463599.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(594, 188, 'z4514727480957.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(595, 188, 'z4514727489597.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(596, 188, 'z4514727507088.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(597, 189, 'z4537221331151.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(598, 189, 'z4537221322049.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(599, 189, 'z4537221331211.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(600, 189, 'z4537221333960.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(601, 189, 'z4537221391259.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(602, 189, 'z4537221416454.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(603, 189, 'z4537221444589.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(604, 189, 'z4537221507200.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(605, 189, 'z4537221522453.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(606, 189, 'z4537221570501.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(607, 189, 'z4537221631882.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(608, 189, 'z4537221703426.jpg', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePi', 1, 0),
(609, 190, 'z4619435016425.jpg', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đin', 1, 0),
(610, 190, 'z4619434901923.jpg', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đin', 1, 0),
(611, 190, 'z4619434919098.jpg', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đin', 1, 0),
(612, 190, 'z4619434993851.jpg', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đin', 1, 0),
(613, 190, 'z4619434926347.jpg', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đin', 1, 0),
(614, 190, 'z4619434871813.jpg', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đin', 1, 0),
(615, 190, 'z4619434818115.jpg', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đin', 1, 0),
(616, 190, 'z4619434822894.jpg', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đin', 1, 0),
(617, 190, 'z4619434842164.jpg', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đin', 1, 0),
(618, 30, 'z4762570494587.png', 'Mô Hình Genshin Impact Ganyu', 1, 0),
(619, 30, 'z4762570525349.png', 'Mô Hình Genshin Impact Ganyu', 1, 0),
(620, 30, 'z4762570504408.png', 'Mô Hình Genshin Impact Ganyu', 1, 0),
(621, 31, 'z4668734432591.png', 'Mô Hình Genshin Bộ 6 nhân vật Genshin Chibi', 1, 0),
(622, 31, 'z4668734532990.png', 'Mô Hình Genshin Bộ 6 nhân vật Genshin Chibi', 1, 0),
(623, 31, 'z4668734511296.png', 'Mô Hình Genshin Bộ 6 nhân vật Genshin Chibi', 1, 0),
(624, 32, 'z4730631675858.png', 'Mô Hình Genshin Impact nhân vật Raiden Shogun', 1, 0),
(625, 32, 'z4730631621938.png', 'Mô Hình Genshin Impact nhân vật Raiden Shogun', 1, 0),
(626, 32, 'z4730631627245.png', 'Mô Hình Genshin Impact nhân vật Raiden Shogun', 1, 0),
(627, 33, 'z4683384282663.png', 'Mô Hình Genshin Impact Ningguang', 1, 0),
(628, 33, 'z4683384254000.png', 'Mô Hình Genshin Impact Ningguang', 1, 0),
(629, 33, 'z4683384213034.png', 'Mô Hình Genshin Impact Ningguang', 1, 0),
(630, 34, 'z4590952482150.png', 'Mô Hình Genshin Bộ 6 nhân vật Jean , Lisa , Barbara , Noelle , Mona , Kaeya', 1, 0),
(631, 34, 'z4590952482164.png', 'Mô Hình Genshin Bộ 6 nhân vật Jean , Lisa , Barbara , Noelle , Mona , Kaeya', 1, 0),
(632, 34, 'z4590952506756.png', 'Mô Hình Genshin Bộ 6 nhân vật Jean , Lisa , Barbara , Noelle , Mona , Kaeya', 1, 0),
(633, 35, 'z4594026760408.png', 'Mô Hình Genshin Impact Venti', 1, 0),
(634, 35, 'z4595126939673.png', 'Mô Hình Genshin Impact Venti', 1, 0),
(635, 35, 'z4595126949760.png', 'Mô Hình Genshin Impact Venti', 1, 0),
(636, 36, 'z4595120085039.png', 'Mô Hình Genshin Impact Klee siêu dễ thương', 1, 0),
(637, 36, 'z4595120018543.png', 'Mô Hình Genshin Impact Klee siêu dễ thương', 1, 0),
(638, 36, 'z4594026760408.png', 'Mô Hình Genshin Impact Klee siêu dễ thương', 1, 0),
(639, 37, 'z4574864091316.png', 'Mô Hình Genshin Impact Beelzebub siêu đẹp', 1, 0),
(640, 37, 'z4574864095422.png', 'Mô Hình Genshin Impact Beelzebub siêu đẹp', 1, 0),
(641, 37, 'z4574864106495.png', 'Mô Hình Genshin Impact Beelzebub siêu đẹp', 1, 0),
(642, 38, 'z4564874637023.png', 'Mô Hình Genshin Impact Beelzebub chiến đấu', 1, 0),
(643, 38, 'z4564874640476.png', 'Mô Hình Genshin Impact Beelzebub chiến đấu', 1, 0),
(644, 38, 'z4564874645225.png', 'Mô Hình Genshin Impact Beelzebub chiến đấu', 1, 0),
(645, 39, 'z4564936159838.png', 'Mô Hình Genshin Impact Keqing chiến đấu', 1, 0),
(646, 39, 'z4564936042468.png', 'Mô Hình Genshin Impact Keqing chiến đấu', 1, 0),
(647, 39, 'z4564936049378.png', 'Mô Hình Genshin Impact Keqing chiến đấu', 1, 0),
(648, 40, 'z4542093360758.png', 'Mô Hình Genshin Impact Yae Miko', 1, 0),
(649, 40, 'z4542093286585.png', 'Mô Hình Genshin Impact Yae Miko', 1, 0),
(650, 40, 'z4542093297558.png', 'Mô Hình Genshin Impact Yae Miko', 1, 0),
(651, 41, 'z4542049720512.png', 'Mô Hình Genshin Impact Beelzebub chiến đấu', 1, 0),
(652, 41, 'z4542049631691.png', 'Mô Hình Genshin Impact Beelzebub chiến đấu', 1, 0),
(653, 41, 'z4542049702394.png', 'Mô Hình Genshin Impact Beelzebub chiến đấu', 1, 0),
(654, 42, 'z4542012306850.png', 'Mô Hình Genshin Impact Hu Tao chiến đấu', 1, 0),
(655, 42, 'z4542012331525.png', 'Mô Hình Genshin Impact Hu Tao chiến đấu', 1, 0),
(656, 42, 'z4542012347005.png', 'Mô Hình Genshin Impact Hu Tao chiến đấu', 1, 0),
(657, 43, 'z4541977158897.png', 'Mô Hình Genshin Impact Shenhe chiến đấu', 1, 0),
(658, 43, 'z4541977158899.png', 'Mô Hình Genshin Impact Shenhe chiến đấu', 1, 0),
(659, 43, 'z4541977170751.png', 'Mô Hình Genshin Impact Shenhe chiến đấu', 1, 0),
(660, 44, 'z4541944059462.png', 'Mô Hình Genshin Impact Ganyu chiến đấu', 1, 0),
(661, 44, 'z4541944064110.png', 'Mô Hình Genshin Impact Ganyu chiến đấu', 1, 0),
(662, 44, 'z4541944065367.png', 'Mô Hình Genshin Impact Ganyu chiến đấu', 1, 0),
(663, 45, 'z4539888044742.png', 'Mô Hình Genshin Bộ 6 nhân vật bản B', 1, 0),
(664, 45, 'z4539888051265.png', 'Mô Hình Genshin Bộ 6 nhân vật bản B', 1, 0),
(665, 45, 'z4539888051292.png', 'Mô Hình Genshin Bộ 6 nhân vật bản B', 1, 0),
(666, 46, 'z4539956850217.png', 'Mô Hình Genshin Bộ 6 nhân vật bản A', 1, 0),
(667, 46, 'z4539956851054.png', 'Mô Hình Genshin Bộ 6 nhân vật bản A', 1, 0),
(668, 46, 'z4539956859513.png', 'Mô Hình Genshin Bộ 6 nhân vật bản A', 1, 0),
(669, 47, 'z4518530842232.png', 'Mô Hình Genshin Impact Hu Tao chiến đấu', 1, 0),
(670, 47, 'z4518530832800.png', 'Mô Hình Genshin Impact Hu Tao chiến đấu', 1, 0),
(671, 47, 'z4518530792800.png', 'Mô Hình Genshin Impact Hu Tao chiến đấu', 1, 0),
(672, 48, 'z4518490428945.png', 'Mô Hình Genshin Impact Aether', 1, 0),
(673, 48, 'z45184904289469895.png', 'Mô Hình Genshin Impact Aether', 1, 0),
(674, 48, 'z4518490429549.png', 'Mô Hình Genshin Impact Aether', 1, 0),
(675, 49, 'z45184761665272131.jpg', 'Mô Hình Genshin Impact Lumine', 1, 0),
(676, 49, 'z451847618510023232.jpg', 'Mô Hình Genshin Impact Lumine', 1, 0),
(677, 49, 'z45184761851492352.jpg', 'Mô Hình Genshin Impact Lumine', 1, 0),
(678, 50, 'z4518365025657fasa2.png', 'Mô Hình Genshin Impact Nahida siêu đẹp', 1, 0),
(679, 50, 'z4518365032753saczxjb.png', 'Mô Hình Genshin Impact Nahida siêu đẹp', 1, 0),
(680, 50, 'z4518365051150asbnnfg.jpg', 'Mô Hình Genshin Impact Nahida siêu đẹp', 1, 0),
(681, 51, 'z4518329348846an932.png', 'Mô Hình Genshin Impact Kaedehara Kazuha siêu đẹp', 1, 0),
(682, 51, 'z4518329352094f09zn2.png', 'Mô Hình Genshin Impact Kaedehara Kazuha siêu đẹp', 1, 0),
(683, 51, 'z4518329359868jszo22f.png', 'Mô Hình Genshin Impact Kaedehara Kazuha siêu đẹp', 1, 0),
(684, 52, 'z4461307476644bjsid.png', 'Mô Hình Genshin Impact Qiqi siêu đẹp', 1, 0),
(685, 52, 'z4461307500710eoxp.png', 'Mô Hình Genshin Impact Qiqi siêu đẹp', 1, 0),
(686, 52, 'z4461307539695teshios.png', 'Mô Hình Genshin Impact Qiqi siêu đẹp', 1, 0),
(687, 53, 'z4461245023311safg347.png', 'Mô Hình Genshin Impact YAE MIKO siêu đẹp', 1, 0),
(688, 53, 'z4461244980311a023h.png', 'Mô Hình Genshin Impact YAE MIKO siêu đẹp', 1, 0),
(689, 53, 'z4461245003396fqr2.png', 'Mô Hình Genshin Impact YAE MIKO siêu đẹp', 1, 0),
(690, 54, 'z4457339772139a903.png', 'Mô Hình Genshin Impact Xiao siêu đẹp', 1, 0),
(691, 54, 'z445733978762200cwh.png', 'Mô Hình Genshin Impact Xiao siêu đẹp', 1, 0),
(692, 54, 'z4457339769889efsnj23.png', 'Mô Hình Genshin Impact Xiao siêu đẹp', 1, 0),
(693, 55, 'z4461271483916cscsd.png', 'Mô Hình Genshin Impact Zhongli', 1, 0),
(694, 55, 'z4461271419372eew92u12.png', 'Mô Hình Genshin Impact Zhongli', 1, 0),
(695, 55, 'z4461271437096acpe02.png', 'Mô Hình Genshin Impact Zhongli', 1, 0),
(696, 56, 'z4882048922304.png', 'Mô hình DragonBall Vegeta Majin có led ở base', 1, 0),
(697, 56, 'z4882048922610.png', 'Mô hình DragonBall Vegeta Majin có led ở base', 1, 0),
(698, 56, 'z4882048922502.png', 'Mô hình DragonBall Vegeta Majin có led ở base', 1, 0),
(699, 57, 'z4880185348024.png', 'Mô hình DragonBall Vegeta Majin dáng đứng siêu ngầu', 1, 0),
(700, 57, 'z4880185339812.png', 'Mô hình DragonBall Vegeta Majin dáng đứng siêu ngầu', 1, 0),
(701, 57, 'z4880185171520.png', 'Mô hình DragonBall Vegeta Majin dáng đứng siêu ngầu', 1, 0),
(702, 58, 'z4882058292711.png', 'Mô hình DragonBall Gohan Supper Saiyan', 1, 0),
(703, 58, 'z4882058271305.png', 'Mô hình DragonBall Gohan Supper Saiyan', 1, 0),
(704, 58, 'z4882058279226.png', 'Mô hình DragonBall Gohan Supper Saiyan', 1, 0),
(705, 59, 'z4881888594427.png', 'Mô hình DragonBall Gohan chibi chiến đấu', 1, 0),
(706, 59, 'z4881888595437.png', 'Mô hình DragonBall Gohan chibi chiến đấu', 1, 0),
(707, 59, 'z4881888598835.png', 'Mô hình DragonBall Gohan chibi chiến đấu', 1, 0),
(708, 60, 'z4820845764133.png', 'Mô hình DragonBall Gogeta ssj4', 1, 0),
(709, 60, 'z4820845764585.png', 'Mô hình DragonBall Gogeta ssj4', 1, 0),
(710, 60, 'z4820845731815.png', 'Mô hình DragonBall Gogeta ssj4', 1, 0),
(711, 61, 'z4844270565365.png', 'Mô hình DragonBall Goku ssj4 dáng đứng siêu đẹp', 1, 0),
(712, 61, 'z4820845764585.png', 'Mô hình DragonBall Goku ssj4 dáng đứng siêu đẹp', 1, 0),
(713, 61, 'z4820845731815.png', 'Mô hình DragonBall Goku ssj4 dáng đứng siêu đẹp', 1, 0),
(714, 62, 'z4842206821740.png', 'Hàng Loại 1 - Mô hình DragonBall Bộ tứ Vegeta , Goku , số 17 , Fieza đại chiến giữa các vũ trụ', 1, 0),
(715, 62, 'z4842206831978.png', 'Hàng Loại 1 - Mô hình DragonBall Bộ tứ Vegeta , Goku , số 17 , Fieza đại chiến giữa các vũ trụ', 1, 0),
(716, 62, 'z4842206853859.png', 'Hàng Loại 1 - Mô hình DragonBall Bộ tứ Vegeta , Goku , số 17 , Fieza đại chiến giữa các vũ trụ', 1, 0),
(717, 63, 'z4825478985342.png', 'Mô Hình Rồng YOYO', 1, 0),
(718, 63, 'z4825478989916.png', 'Mô Hình Rồng YOYO', 1, 0),
(719, 63, 'z4825478995734.png', 'Mô Hình Rồng YOYO', 1, 0),
(720, 64, 'z4792191247540.png', 'Hàng Loại 1 - Mô hình DragonBall SonGoku nâng cầu có led ở cầu và base siêu ngầu', 1, 0),
(721, 64, 'z4792191228035.png', 'Hàng Loại 1 - Mô hình DragonBall SonGoku nâng cầu có led ở cầu và base siêu ngầu', 1, 0),
(722, 64, 'z4792191219325.png', 'Hàng Loại 1 - Mô hình DragonBall SonGoku nâng cầu có led ở cầu và base siêu ngầu', 1, 0),
(723, 65, 'z4738394253117.png', 'Mô hình DragonBall Goku cưỡi mây cầm gậy', 1, 0),
(724, 65, 'z4738394261741.png', 'Mô hình DragonBall Goku cưỡi mây cầm gậy', 1, 0),
(725, 65, 'z4738394278740.png', 'Mô hình DragonBall Goku cưỡi mây cầm gậy', 1, 0),
(726, 66, 'z4699647869778.png', 'Mô Hình DragonBall Trunks chiến đấu', 1, 0),
(727, 66, 'z4699647897945.png', 'Mô Hình DragonBall Trunks chiến đấu', 1, 0),
(728, 66, 'z4699647906937.png', 'Mô Hình DragonBall Trunks chiến đấu', 1, 0),
(729, 67, 'z4713898054518.png', 'Mô hình DragonBall Goku cắn đuôi frieza', 1, 0),
(730, 67, 'z4713898054517.png', 'Mô hình DragonBall Goku cắn đuôi frieza', 1, 0),
(731, 67, 'z4713898042053.png', 'Mô hình DragonBall Goku cắn đuôi frieza', 1, 0),
(732, 68, 'z4669575390516.png', 'Mô Hình DragonBall Songoku Kid lái xe', 1, 0),
(733, 68, 'z4669575392874.png', 'Mô Hình DragonBall Songoku Kid lái xe', 1, 0),
(734, 68, 'z4669575408249.png', 'Mô Hình DragonBall Songoku Kid lái xe', 1, 0),
(735, 69, 'z4598772375733.png', 'Mô Hình DragonBall Frieza Gold siêu ngầu', 1, 0),
(736, 69, 'z4598772372801.png', 'Mô Hình DragonBall Frieza Gold siêu ngầu', 1, 0),
(737, 69, 'z4598772359769.png', 'Mô Hình DragonBall Frieza Gold siêu ngầu', 1, 0),
(738, 70, 'z4428854670785.png', 'Mô hình DragonBall -- Broly dáng đứng siêu ngầu có led', 1, 0),
(739, 70, 'z4428854678199.png', 'Mô hình DragonBall -- Broly dáng đứng siêu ngầu có led', 1, 0),
(740, 70, 'z4428854678468.png', 'Mô hình DragonBall -- Broly dáng đứng siêu ngầu có led', 1, 0),
(741, 71, 'z4384043686675.png', 'Mô Hình DragonBall Songoku Black có led', 1, 0),
(742, 71, 'z4384043716865.png', 'Mô Hình DragonBall Songoku Black có led', 1, 0),
(743, 71, 'z4384043686657.png', 'Mô Hình DragonBall Songoku Black có led', 1, 0),
(744, 72, 'z4385757796888.png', 'Mô hình DragonBall SonGoku Black SS3', 1, 0),
(745, 72, 'z4385757796967.png', 'Mô hình DragonBall SonGoku Black SS3', 1, 0),
(746, 72, 'z4385757765653.png', 'Mô hình DragonBall SonGoku Black SS3', 1, 0),
(747, 73, 'z4304716577409.png', 'Mô hình DragonBall Vegeta SSJ3', 1, 0),
(748, 73, 'z4304716601604.png', 'Mô hình DragonBall Vegeta SSJ3', 1, 0),
(749, 73, 'z4304716573504.png', 'Mô hình DragonBall Vegeta SSJ3', 1, 0),
(750, 74, 'z4362219682515.png', 'Mô hình DragonBall King Cold Bố của Frize', 1, 0),
(751, 74, 'z4362219709962.png', 'Mô hình DragonBall King Cold Bố của Frize', 1, 0),
(752, 74, 'z4362219593218.png', 'Mô hình DragonBall King Cold Bố của Frize', 1, 0),
(753, 75, 'z4242482114169.png', 'Mô Hình Dragon Ball Vegeta chiến đấu có 3 đầu thay thế', 1, 0),
(754, 75, 'z4242482093072.png', 'Mô Hình Dragon Ball Vegeta chiến đấu có 3 đầu thay thế', 1, 0),
(755, 75, 'z4242482085987.png', 'Mô Hình Dragon Ball Vegeta chiến đấu có 3 đầu thay thế', 1, 0),
(756, 76, 'z4031987059671.png', 'Mô Hình DragonBall Gohan Best siêu ngầu có led', 1, 0),
(757, 76, 'z4031987134428.png', 'Mô Hình DragonBall Gohan Best siêu ngầu có led', 1, 0),
(758, 76, 'z4031987155183.png', 'Mô Hình DragonBall Gohan Best siêu ngầu có led', 1, 0),
(759, 77, 'z3948882038771.png', 'Mô Hình DragonBall SonGoku SS4', 1, 0),
(760, 77, 'z3948882047008.png', 'Mô Hình DragonBall SonGoku SS4', 1, 0),
(761, 77, 'z3948882047036.png', 'Mô Hình DragonBall SonGoku SS4', 1, 0),
(762, 78, 'o1cn01yqtyjv1iydos2fzzz.png', 'Mô Hình DragonBall Dyspo', 1, 0),
(763, 78, 'o1cn01bo8zkd1iydoetgawp.png', 'Mô Hình DragonBall Dyspo', 1, 0),
(764, 78, 'o1cn01g64gc81iydoq1uzvh.png', 'Mô Hình DragonBall Dyspo', 1, 0),
(765, 79, '', 'Mô Hình Frlize cao 14cm - Có Hộp Màu', 1, 0),
(766, 79, '', 'Mô Hình Frlize cao 14cm - Có Hộp Màu', 1, 0),
(767, 79, '', 'Mô Hình Frlize cao 14cm - Có Hộp Màu', 1, 0),
(768, 80, 'guqhewhew.png', 'Mô Hình DragonBall Jiren', 1, 0),
(769, 80, 'gqwhewhrrjt.png', 'Mô Hình DragonBall Jiren', 1, 0),
(770, 80, 'guqhqwe.png', 'Mô Hình DragonBall Jiren', 1, 0),
(771, 101, 'z4877695904322a9324ha.png', 'Pack anime thẻ Naruto Cam ( 36 Pack 1 hộp - 1 Pack có 5 thẻ )', 1, 0),
(772, 101, 'z487769590548999asbdkaj.png', 'Pack anime thẻ Naruto Cam ( 36 Pack 1 hộp - 1 Pack có 5 thẻ )', 1, 0),
(773, 102, 'z487767542083442983.png', 'Pack anime thẻ Naruto vàng ( 36 Pack 1 hộp - 1 Pack có 5 thẻ )', 1, 0),
(774, 102, 'z4877675435635djsifhs.png', 'Pack anime thẻ Naruto vàng ( 36 Pack 1 hộp - 1 Pack có 5 thẻ )', 1, 0),
(775, 103, 'z4807099073709sadazi.png', 'Pack anime Dragonball Supper - 1 Hộp = 32PACK', 1, 0),
(776, 103, 'z4807099064720ad2ihsd.png', 'Pack anime Dragonball Supper - 1 Hộp = 32PACK', 1, 0),
(777, 104, 'z4807116650557dshoi2.png', 'Pack anime Dragonball Supper - 1 Hộp = 32PACK', 1, 0),
(778, 104, 'z4807099073709sadazi.png', 'Pack anime Dragonball Supper - 1 Hộp = 32PACK', 1, 0),
(779, 105, 'z4808265038639btbfc.png', 'Pack thẻ genshin impact - 1 Hộp = 32PACK', 1, 0),
(780, 105, 'z4808265037695andajk.png', 'Pack thẻ genshin impact - 1 Hộp = 32PACK', 1, 0),
(781, 106, 'z4807111491688wqdaxcqs.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(782, 106, 'z4807111485553czxghehe.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(783, 107, 'z4807091959065cascas.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(784, 107, 'z4807091951526asdas.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(785, 108, 'z48070797735065634dfgvd.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(786, 108, 'z480707977733asda.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(787, 109, 'z4625269739768hje63246t3.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(788, 109, 'z4625269742530jn4674.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(789, 110, 'z4625215586424h323t23.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(790, 110, 'z4625215586425gsds9.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(791, 111, 'z462518935085gse312.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(792, 111, 'z4625189369762f9213.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(793, 112, 'z4572732707828fj23.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(794, 112, '2a8832ecd75937a721.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(795, 113, 'z4572706304253zvf221.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(796, 113, 'dede3cf222fa8f56062bddcb2.png', 'Pack thẻ - 1 hộp = 32 PACK', 1, 0),
(797, 81, '42151_2.webp', 'Bugatti Bolide', 0, 0),
(798, 81, '42151_3.webp', 'Bugatti Bolide', 0, 0),
(799, 81, '42151_4.webp', 'Bugatti Bolide', 0, 0),
(800, 82, '42162_alt1_3.webp', 'Bugatti Bolide Agile Blue', 0, 0),
(801, 82, '42162_alt1_4.webp', 'Bugatti Bolide Agile Blue', 0, 0),
(802, 82, '42162_alt1_2.webp', 'Bugatti Bolide Agile Blue', 0, 0),
(803, 83, '42125_2.webp', 'Ferrari 488 GTE “AF Corse #51”', 0, 0),
(804, 83, '42125_3.webp', 'Ferrari 488 GTE “AF Corse #51”', 0, 0),
(805, 83, '42125_3.webp', 'Ferrari 488 GTE “AF Corse #51”', 0, 0),
(806, 84, '42143_alt2_2.webp', 'Ferrari Daytona SP3', 0, 0),
(807, 84, '42143_alt3_3.webp', 'Ferrari Daytona SP4', 0, 0),
(808, 84, '42143_alt3_4.webp', 'Ferrari Daytona SP5', 0, 0),
(809, 85, '42154_2.webp', 'Ford GT 2022', 0, 0),
(810, 85, '42154_3.webp', 'Ford GT 2023', 0, 0),
(811, 85, '42154_4.webp', 'Ford GT 2024', 0, 0),
(812, 86, '10265_2.webp', 'Ford Mustang', 0, 0),
(813, 86, '10265_3.webp', 'Ford Mustang', 0, 0),
(814, 86, '10265_4.webp', 'Ford Mustang', 0, 0),
(815, 87, '42138_alt2_2.webp', 'Ford Mustang Shelby® GT500®', 0, 0),
(816, 87, '42138_alt2_3.webp', 'Ford Mustang Shelby® GT500®', 0, 0),
(817, 87, '42138_alt2_4.webp', 'Ford Mustang Shelby® GT500®', 0, 0),
(818, 88, '76908_2.webp', 'Lamborghini Countach', 0, 0),
(819, 88, '76908_alt4_3.webp', 'Lamborghini Countach', 0, 0),
(820, 88, '76908_alt4_4.webp', 'Lamborghini Countach', 0, 0),
(821, 89, '42161_2.webp', 'Lamborghini Huracán Tecnica', 0, 0),
(822, 89, '42161_3.webp', 'Lamborghini Huracán Tecnica', 0, 0),
(823, 89, '42161_4.webp', 'Lamborghini Huracán Tecnica', 0, 0),
(824, 90, '42115_2.webp', 'Lamborghini Sián FKP 37', 0, 0),
(825, 90, '42115_3.webp', 'Lamborghini Sián FKP 38', 0, 0),
(826, 90, '42115_4.webp', 'Lamborghini Sián FKP 39', 0, 0),
(827, 90, '42115_5.webp', 'Lamborghini Sián FKP 40', 0, 0),
(828, 91, '76907_2.webp', 'Lotus Evija', 0, 0),
(829, 91, '76907_3.webp', 'Lotus Evija', 0, 0),
(830, 91, '76907_4.webp', 'Lotus Evija', 0, 0),
(831, 92, '42123_alt3_2.webp', 'McLaren Senna GTR™', 0, 0),
(832, 92, '42123_alt3_3.webp', 'McLaren Senna GTR™', 0, 0),
(833, 92, '42123_alt3_4.webp', 'McLaren Senna GTR™', 0, 0),
(834, 93, '42153_2.webp', 'NASCAR® Next Gen Chevrolet Camaro ZL1', 0, 0),
(835, 93, '42153_3.webp', 'NASCAR® Next Gen Chevrolet Camaro ZL2', 0, 0),
(836, 93, '42153_4.webp', 'NASCAR® Next Gen Chevrolet Camaro ZL3', 0, 0),
(837, 94, '76915_2.webp', 'Pagani Utopia', 0, 0),
(838, 94, '76915_3webp.webp', 'Pagani Utopia', 0, 0),
(839, 94, '76915_4.webp', 'Pagani Utopia', 0, 0),
(840, 95, '42156_2.webp', 'PEUGEOT 9X8 24H Le Mans Hybrid Hypercar', 0, 0),
(841, 95, '42156_3.webp', 'PEUGEOT 9X8 24H Le Mans Hybrid Hypercar', 0, 0),
(842, 95, '42156_4.webp', 'PEUGEOT 9X8 24H Le Mans Hybrid Hypercar', 0, 0),
(843, 96, '10295_2.webp', 'Porsche 911', 0, 0),
(844, 96, '10295_3.webp', 'Porsche 912', 0, 0),
(845, 96, '10295_4.webp', 'Porsche 913', 0, 0),
(846, 97, '42096_alt2_2.webp', 'Porsche 911 RSR', 0, 0),
(847, 97, '42096_alt2_3.webp', 'Porsche 911 RSR', 0, 0),
(848, 97, '42096_alt2_4.webp', 'Porsche 911 RSR', 0, 0),
(849, 98, '76916_alt2_2.webp', 'Porsche 963', 0, 0),
(850, 98, '76916_alt2_3.webp', 'Porsche 964', 0, 0),
(851, 98, '76916_alt2_4.webp', 'Porsche 965', 0, 0),
(852, 99, '42127_2.webp', 'THE BATMAN - BATMOBILE™', 0, 0),
(853, 99, '42127_3.webp', 'THE BATMAN - BATMOBILE™', 0, 0),
(854, 99, '42127_4.webp', 'THE BATMAN - BATMOBILE™', 0, 0),
(855, 100, '76901_2.webp', 'Toyota GR Supra', 0, 0),
(856, 100, '76901_3.webp', 'Toyota GR Supra', 0, 0),
(857, 100, '76901_4.webp', 'Toyota GR Supra', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partner`
--

CREATE TABLE `partner` (
  `id` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `is_appear` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: disappear, 1: appear'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `partner`
--

INSERT INTO `partner` (`id`, `img`, `name`, `link`, `description`, `is_appear`) VALUES
(1, 'behance.svg', 'behance', 'https://www.behance.net/', NULL, 1),
(2, 'Giphy.svg', 'Giphy', 'https://giphy.com/', NULL, 1),
(3, 'medium.svg', 'Medium', 'https://medium.com/', NULL, 1),
(4, 'openai.svg', 'Open AI', 'https://openai.com/', NULL, 1),
(5, 'unsplash.svg', 'Unsplash', 'https://unsplash.com/', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `promotion` int(3) NOT NULL,
  `img` varchar(100) NOT NULL,
  `qty` int(10) DEFAULT 0,
  `views` int(20) DEFAULT 0,
  `love` int(20) NOT NULL DEFAULT 0,
  `purchases` int(20) NOT NULL DEFAULT 0,
  `short_detail` varchar(1024) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_special` tinyint(4) NOT NULL DEFAULT 0,
  `is_trending` tinyint(4) NOT NULL DEFAULT 0,
  `is_feature` tinyint(4) NOT NULL DEFAULT 0,
  `is_upcomming` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `update_date` date DEFAULT NULL,
  `id_category` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `promotion`, `img`, `qty`, `views`, `love`, `purchases`, `short_detail`, `description`, `is_special`, `is_trending`, `is_feature`, `is_upcomming`, `create_date`, `update_date`, `id_category`) VALUES
(1, 'Mô hình Naruto combo 6 nhân vật', 45000, 0, 'z4882234622510.png', 100, 0, 0, 50, 'Mô hình Naruto combo 6 nhân vật bản B Cao 6-7cm - nặng 150Gram- Figure Naruto - No Box', 'Mô hình Naruto combo 6 nhân vật bản B Cao 6-7cm - nặng 150Gram- Figure Naruto - No Box. Chiếu Cao : 6-7cm\r\n\r\nTrọng Lượng : 150g\r\n\r\nPhụ kiện đi kèm : đế + gậy chống\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Bọc túi bóng Opp\r\n\r\nNhân vật : 6 ninja trong NARUTO\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(2, 'Mô hình Naruto Bán Thân Naruto', 41000, 0, 'z4818762394442.png', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Naruto - Cao 10cm - nặng 150gram - Figure Naruto - no box', 'Mô hình Naruto Bán Thân Naruto - Cao 10cm - nặng 150gram - Figure Naruto - no box\r\nChiếu Cao : 10cm \r\n\r\nTrọng Lượng : 150gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : no box\r\n\r\nNhân vật : NARUTO\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(3, 'Mô Hình Naruto Pain akatsuki', 259000, 0, 'z4877391410410.png', 100, 0, 0, 0, 'Mô Hình Naruto Pain akatsuki - Cao 26,5cm - rộng 18cm - nặng 1kg6 - Figure Naruto - Full Box', 'Mô Hình Naruto Pain akatsuki - Cao 26,5cm - rộng 18cm - nặng 1kg6 - Figure Naruto - Full Box - Hộp màu\r\n\r\nChiếu Cao : 26.5cm\r\n\r\nTrọng Lượng : 1600Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : có hộp màu\r\n\r\nNhân vật : PAIN\r\n\r\nFIGURE ANIME : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(4, 'Mô hình Naruto đệ nhị senju Tobirama chibi', 64000, 0, 'o1cn01bzi3ig1rmhk5ipiw6.png', 100, 0, 0, 0, 'Mô hình Naruto đệ nhị senju Tobirama chibi - Cao 11cm - rộng 9cm - nặng 120gram - Figure Naruto - có hộp màu', 'Mô hình Naruto đệ nhị senju Tobirama chibi - Cao 11cm - rộng 9cm - nặng 120gram - Figure Naruto - có hộp màu\r\nChiếu Cao : 11cm \r\n\r\nTrọng Lượng : 120gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : có hôp màu\r\n\r\nNhân vật : đệ nhị senju Tobirama\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(5, 'Mô hình Naruto Guy bát môn độn giáp Chibi', 64000, 0, 'o1cn01rjfw6q1rmhkfmvptv.png', 100, 0, 0, 0, 'Mô hình Naruto Guy bát môn độn giáp Chibi - Cao 11cm - rộng 8cm - nặng 160gram - Figure Naruto - có hộp màu', 'Mô hình Naruto Guy bát môn độn giáp Chibi - Cao 11cm - rộng 8cm - nặng 160gram - Figure Naruto - có hộp màu \r\nChiếu Cao : 11cm \r\n\r\nTrọng Lượng : 160gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : có hộp màu\r\n\r\nNhân vật : thầy gai\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(6, 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo', 357000, 0, 'z4807014606159.png', 100, 0, 0, 0, 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo - Cao 19cm - rộng 26cm - nặng 1kg3 - Phụ kiện : Có LED - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp chiến Madara lục đạo - Cao 19cm - rộng 26cm - nặng 1kg3 - Phụ kiện : Có LED - Figure Naruto - Có Hộp Màu\r\n\r\nChiếu Cao : 19cm \r\n\r\nTrọng Lượng : 1300gram \r\n\r\nPhụ kiện đi kèm : không \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Thầy Gai\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(7, 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ', 268000, 0, 'z4825498334269.png', 100, 0, 0, 0, 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ - Cao 28cm - rộng 16cm - nặng 1kg5 - Figure Naruto - Có hộp màu', 'Mô Hình Naruto Hokage Minato Phong ấn cửa vĩ - Cao 28cm - rộng 16cm - nặng 1kg5 - Figure Naruto - Có hộp màu\r\n\r\nChiếu Cao : 28cm\r\n\r\nTrọng Lượng : 1500Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : hộp màu\r\n\r\nNhân vật : MINATO\r\n\r\nFIGURE ANIME : Naruto', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(8, 'Mô Hình Naruto Hokaghe Kakashi', 247000, 0, 'z4825499022779.png', 100, 0, 0, 0, 'Mô Hình Naruto Hokaghe Kakashi - Cao 26cm - nặng 800gram - Figure Naruto - Có hộp màu', 'Mô Hình Naruto Hokaghe Kakashi - Cao 26cm - nặng 800gram - Figure Naruto - Có hộp màu\r\n\r\nChiếu Cao : 26cm\r\n\r\nTrọng Lượng : 800Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : hộp màu\r\n\r\nNhân vật : KAKASHI\r\n\r\nFIGURE ANIME : Naruto', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(9, 'Mô hình Bán thân Naruto tỉ lệ 1:1', 1969000, 0, 'z4662270827210.png', 100, 0, 0, 0, 'Mô hình Bán thân Naruto tỉ lệ 1:1 - Cao 50cm - rộng 36cm - nặng 5kg - Figure Naruto - Có hộp bìa', 'Mô hình Bán thân Naruto tỉ lệ 1:1 - Cao 50cm - rộng 36cm - nặng 5kg - Figure Naruto - Có hộp bìa\r\n\r\n\r\nChiếu Cao : 50cm \r\n\r\nTrọng Lượng : 5000gram \r\n\r\nPhụ kiện đi kèm : không \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : NARUTO\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(10, 'Mô Hình Naruto Minato', 279000, 0, 'na26-1693827549586.png', 100, 0, 0, 0, 'Mô Hình Naruto Minato Cao 22cm - nặng 600gram - FULL BOX + phụ kiện đi kèm 1 đầu + LED - Figure Naruto - có hộp màu', 'Mô Hình Naruto Minato Cao 22cm - nặng 600gram - FULL BOX + phụ kiện đi kèm 1 đầu + LED - Figure Naruto - có hộp màu\r\n\r\nChiếu Cao : 22cm\r\n\r\nTrọng Lượng : 600Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : hộp màu\r\n\r\nNhân vật : MINATO\r\n\r\nFIGURE ANIME : Naruto', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(11, 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón', 239000, 0, 'z4605880353840.png', 100, 0, 0, 0, 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón - Cao 29cm - nặng 820gram - Figure Naruto - Có Hộp đẹp', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ tay cầm nón - Cao 29cm - nặng 820gram - Figure Naruto - Có Hộp đẹp\r\nChiếu Cao : 29cm\r\n\r\nTrọng Lượng ~ 820gram\r\n\r\nPhụ kiện đi kèm : nón quạ\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : FULL BOX , hộp đẹp chắc chắn\r\n\r\nNhân vật : UCHIHA ITACHI\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(12, 'Mô hình Naruto Bán Thân Uchiha Shisui', 357000, 0, 'z4418594145759.png', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Uchiha Shisui - Cao 14cm - nặng 200gram - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Uchiha Shisui - Cao 14cm - nặng 200gram - Figure Naruto - Có Hộp Màu\r\n\r\nChiếu Cao : 14cm \r\n\r\nTrọng Lượng : 200gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Uchiha Shisui\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(13, 'Mô hình Naruto Bán Thân Đệ Lục Kakashi', 136000, 0, 'z4418211701733.jpg', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Đệ Lục Kakashi - Cao 17cm - nặng 300gram - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Đệ Lục Kakashi - Cao 17cm - nặng 300gram - Figure Naruto - Có Hộp Màu\r\n\r\nChiếu Cao : 17cm \r\n\r\nTrọng Lượng : 300gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Đệ Lục Kakashi\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(14, 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade', 357000, 0, 'z4418140959826.jpg', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade - Cao 15cm - nặng 300gram - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Đệ ngũ Tsunade - Cao 15cm - nặng 300gram - Figure Naruto - Có Hộp Màu\r\n\r\nChiếu Cao : 15cm \r\n\r\nTrọng Lượng : 300gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Đệ ngũ Tsunade\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(15, 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama', 136000, 0, 'z4418581757201.jpg', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama - Cao 14cm - nặng 300gram - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Đệ Nhị Senju Tobirama - Cao 14cm - nặng 300gram - Figure Naruto - Có Hộp Màu\r\nChiếu Cao : 14cm \r\n\r\nTrọng Lượng : 300gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Đệ Nhị Senju Tobirama\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(16, 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama', 136000, 0, 'z4418549907725.jpg', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama - Cao 15cm - nặng 250gram - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Đệ Nhất Senju Hashirama - Cao 15cm - nặng 250gram - Figure Naruto - Có Hộp Màu\r\n\r\nChiếu Cao : 15cm \r\n\r\nTrọng Lượng : 250gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Đệ Nhất Senju Hashirama\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(17, 'Mô hình Naruto Bán Thân Uchiha Madara', 136000, 0, 'z4418541201453.jpg', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Uchiha Madara - Cao 15cm - nặng 300gram - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Uchiha Madara - Cao 15cm - nặng 300gram - Figure Naruto - Có Hộp Màu\r\nChiếu Cao : 15cm \r\n\r\nTrọng Lượng : 300gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Uchiha Madara\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(18, 'Mô hình Naruto Bán Thân Uchiha Obito', 136000, 0, 'z4418534505209.jpg', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Uchiha Obito - Cao 15cm - nặng 200gram - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Uchiha Obito - Cao 15cm - nặng 200gram - Figure Naruto - Có Hộp Màu\r\nChiếu Cao : 15cm \r\n\r\nTrọng Lượng : 200gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Uchiha Obito\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(19, 'Mô hình Naruto Bán Thân Uchiha sasuke', 136000, 0, 'z4418571736591.jpg', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Uchiha sasuke - Cao 15cm - nặng 200gram - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Uchiha sasuke - Cao 15cm - nặng 200gram - Figure Naruto - Có Hộp Màu\r\n\r\nChiếu Cao : 15cm \r\n\r\nTrọng Lượng : 200gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Uchiha sasuke\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(20, 'Mô hình Naruto Bán Thân Uchiha itachi', 136000, 0, 'z4418560836936.jpg', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Uchiha itachi - Cao 14cm - nặng 200gram- Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Uchiha itachi - Cao 14cm - nặng 200gram- Figure Naruto - Có Hộp Màu\r\nChiếu Cao : 14cm \r\n\r\nTrọng Lượng : 200gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật :Uchiha itachi\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(21, 'Mô hình Naruto Bán Thân Naruto', 136000, 0, 'z4418526436827.jpg', 100, 0, 0, 0, 'Mô hình Naruto Bán Thân Naruto - Cao 15cm - nặng 200gram - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Bán Thân Naruto - Cao 15cm - nặng 200gram - Figure Naruto - Có Hộp Màu\r\nChiếu Cao : 15cm \r\n\r\nTrọng Lượng : 200gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : NARUTO\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(22, 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu', 426000, 0, 'z4417475461858.jpg', 100, 0, 0, 0, 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu có led ở base cao 40cm , nặng 1800g - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Lục Đạo dáng đứng siêu ngầu có led ở base cao 40cm , nặng 1800g - Figure Naruto - Có Hộp Màu\r\n\r\nChiếu Cao : 40cm \r\n\r\nTrọng Lượng : 1800gram \r\n\r\nPhụ kiện đi kèm : gậy cầm tay\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : NARUTO\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(23, 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu', 406000, 0, 'z4386699762114.jpg', 0, 0, 0, 0, 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu có led ở base cao 35cm , nặng 1400g - Figure Naruto - Có Hộp Màu', 'Mô hình Naruto Thầy Might Guy Bát Môn Độn Giáp dáng đứng siêu ngầu có led ở base cao 35cm , nặng 1400g - Figure Naruto - Có Hộp Màu\r\n\r\nChiếu Cao : 35cm \r\n\r\nTrọng Lượng : 1400gram \r\n\r\nPhụ kiện đi kèm : không \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : Thầy Gai\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(24, 'Mô hình Naruto Sasuke siêu ngầu có led ở base cao 39cm nặng 2100 gram - Figure Naruto - Có hộp màu to đẹp', 406000, 0, 'z4384137408153.jpg', 100, 0, 0, 0, 'Mô hình Naruto Sasuke siêu ngầu có led ở base cao 39cm nặng 2100 gram - Figure Naruto - Có hộp màu to đẹp', 'Mô hình Naruto Sasuke siêu ngầu có led ở base cao 39cm nặng 2100 gram - Figure Naruto - Có hộp màu to đẹp\r\n\r\nChiếu Cao : 39cm \r\n\r\nTrọng Lượng : 2100gram \r\n\r\nPhụ kiện đi kèm : 1 tay + 1 kiếm\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : SASUKE\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(25, 'Mô hình Naruto Kakashi dáng đứng siêu ngầu', 406000, 0, 'z4386971636053.jpg', 100, 0, 0, 0, 'Mô hình Naruto Kakashi dáng đứng siêu ngầu có led ở base cao 40cm nặng 1400 gram - Figure Naruto - Có hộp màu to đẹp', 'Mô hình Naruto Kakashi dáng đứng siêu ngầu có led ở base cao 40cm nặng 1400 gram - Figure Naruto - Có hộp màu to đẹp\r\n\r\nChiếu Cao : 40cm \r\n\r\nTrọng Lượng : 1400gram \r\n\r\nPhụ kiện đi kèm : không \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , Hộp đẹp chắc chắn\r\n\r\nNhân vật : KAKASHI\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(26, 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế', 419000, 0, 'o1cn01jwq2fc1uoi5xjdt2v.jpg', 100, 0, 0, 0, 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế - Cao 40cm , rộng 30 cm , nặng 2500 gram - Figure Naruto - Có Hộp đẹp', 'Mô hình Naruto Itachi Akatsuki đế Hắc Hỏa có quạ + 2 đầu thay thế - Cao 40cm , rộng 30 cm , nặng 2500 gram - Figure Naruto - Có Hộp Đẹp\r\n\r\n\r\nChiếu Cao : 40cm\r\n\r\nTrọng Lượng ~ 2.5 kg\r\n\r\nPhụ kiện đi kèm : đầu thay thế + quạ\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : FULL BOX , hộp đẹp chắc chắn\r\n\r\nNhân vật : UCHIHA ITACHI\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(27, 'Mô Hình Cữu Vĩ Kurama Cao 16cm', 305000, 0, 'o1cn01nng0xc1rmhbghqavo.jpg', 100, 0, 0, 0, 'Mô Hình Cữu Vĩ Kurama Cao 16cm - Full Box - Naruto - Hộp Màu', 'Mô Hình Cữu Vĩ Kurama Cao 16cm - Full Box - Naruto\r\n\r\n\r\nChiếu Cao : 16cm \r\n\r\nTrọng Lượng : 1,6 kg \r\n\r\nPhụ kiện đi kèm :không \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , hộp đẹp chắc chắn \r\n\r\nNhân vật : Cửu vĩ Kura,a\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(28, 'Mô hình Uchiha Madara - Lục đạo', 227000, 0, 'o1cn01htawrz1bs2jbkmbka.jpg', 100, 0, 0, 0, 'Mô Hình Đồ Chơi - Mô hình Uchiha Madara cao 38cm , nặng 1.2 kg - Naruto - Có Hộp Màu', 'Mô hình Naruto Uchiha Madara cao 27cm siêu đẹp có 3 đầu thay thế\r\n\r\nChiếu Cao : 38cm\r\n\r\nTrọng Lượng : 100gram\r\n\r\nPhụ kiện đi kèm : gậy cầm tay\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : FULL BOX , hộp đẹp chắc chắn\r\n\r\nNhân vật : MADARA\r\n\r\nFIGURE ANIME MANGA : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(29, 'Mô Hình Itachi Uế Thổ Chuyển Sinh', 279000, 0, '07-b8316791-0fca-.jpg', 100, 0, 0, 0, 'Mô Hình Itachi Uế Thổ Chuyển Sinh Cao 28cm - Naruto - Có Hộp Màu', 'Mô Hình Itachi Uế Thổ Chuyển Sinh Cao 28cm - Naruto - Box Màu\r\n\r\n\r\nChiếu Cao : 28 cm\r\n\r\nTrọng Lượng ~ 1,5 kg\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box đi kèm , box đẹp chắc chắn\r\n\r\nNhân vật : ITACHI\r\n\r\nFIGURE ANIME : NARUTO', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1),
(30, 'Mô Hình Genshin Impact Ganyu chiến đấu siêu đẹp - ganyu - Cao 23cm - nặng 200gram', 79000, 0, 'z4762570507752.png', 100, 0, 0, 0, '', 'Mô Hình Genshin Impact Ganyu chiến đấu siêu đẹp - ganyu - Cao 23cm - nặng 200gram - Figure Genshin Impact - Có Hộp màu\r\n\r\nChiếu Cao : 23cm\r\n\r\nTrọng Lượng : 200Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Ganyu\r\n\r\nFIGURE ANIME : Genshin Impact\r\n\r\n-------', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(31, 'Mô Hình Genshin Bộ 6 nhân vật Genshin Chibi - Cao 10cm - nặng 400gram', 169000, 0, 'z4668734533004.png', 100, 0, 0, 0, '', 'Mô Hình Genshin Bộ 6 nhân vật Genshin Chibi - Cao 10cm - nặng 400gram - Phụ kiện : đế + No Box : bọc túi - Figure Genshin Impact - no box\r\n\r\nChiếu Cao : 10cm\r\n\r\nTrọng Lượng : 400Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : no box\r\n\r\nNhân vật : Genshin\r\n\r\nFIGURE ANIME : Genshin Impact\r\n\r\n-------', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(32, 'Mô Hình Genshin Impact nhân vật Raiden Shogun - Cao 30cm - nặng 450gram', 239000, 0, 'z4730631694761.png', 100, 0, 0, 0, '', 'Hàng Cao Cấp - Mô Hình Genshin Impact nhân vật Raiden Shogun - Cao 30cm - nặng 450gram - Phụ kiện : kiếm - FULL BOX : BOX màu - Figure Genshin Impact - Có Hộp màu\r\n\r\nChiếu Cao : 30cm\r\n\r\nTrọng Lượng : 450Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp\r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Raiden Shogun\r\n\r\nFIGURE ANIME : Genshin Impact\r\n\r\n-------', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(33, 'Mô Hình Genshin Impact Ningguang ngồi ghế - Cao 19cm - rộng 22cm - nặng 900gram', 289000, 0, 'z4683384312286.png', 100, 0, 0, 0, '', 'Mô Hình Genshin Impact Ningguang ngồi ghế - Cao 19cm - rộng 22cm - nặng 900gram + Phụ kiện đi kèm : 1 Lư hương + tẩu thuốc cầm tay - FULL BOX : Box màu\r\n\r\nChiếu Cao : 19cm\r\n\r\nTrọng Lượng : 900Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Ningguang\r\n\r\nFIGURE ANIME : Genshin Impact\r\n\r\n-------', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(34, 'Mô Hình Genshin Bộ 6 nhân vật Jean , Lisa , Barbara , Noelle , Mona , Kaeya cao 10cm nặng 400 gram', 116000, 0, 'z4590952599093.png', 100, 0, 0, 0, '', 'Mô Hình Genshin Bộ 6 nhân vật Jean , Lisa , Barbara , Noelle , Mona , Kaeya cao 10cm nặng 400 gram - Figure Genshin Impact - no box\r\n\r\nChiếu Cao : 10cm\r\n\r\nTrọng Lượng : 400Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : no box\r\n\r\nNhân vật :\r\n\r\nFIGURE ANIME : Genshin Impact\r\n\r\n-------', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(35, 'Mô Hình Genshin Impact Venti siêu dễ thương - cao 11cm - nặng 190gram', 42000, 0, 'z4595126935457.png', 100, 0, 0, 0, '', 'Mô Hình Genshin Impact Venti siêu dễ thương - cao 11cm - nặng 190gram - Figure Genshin Impact - No Box\r\n\r\nChiếu Cao : 11cm\r\n\r\nTrọng Lượng : 190Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : No Box\r\n\r\nNhân vật : Venti\r\n\r\nFIGURE ANIME : Genshin Impact\r\n\r\n-------', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(36, 'Mô Hình Genshin Impact Klee siêu dễ thương - cao 11cm - nặng 190gram', 42000, 0, 'z4595120105014.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact Klee siêu dễ thương - cao 11cm - nặng 190gram - Figure Genshin Impact - No Box', 'Chiếu Cao : 11cm\r\n\r\nTrọng Lượng : 190Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : No Box\r\n\r\nNhân vật : Klee\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(37, 'Mô Hình Genshin Impact Beelzebub siêu đẹp - cao 23cm - nặng 170 gram', 114000, 0, 'z4574864135313.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact Beelzebub siêu đẹp - cao 23cm - nặng 170 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 23cm\r\n\r\nTrọng Lượng : 170Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Beelzebub\r\n\r\nFIGURE ANIME : Genshin Impact\r\n\r\n-------', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(38, 'Mô Hình Genshin Impact Beelzebub chiến đấu Cao 28cm - nặng 800gram', 528000, 0, 'z4564874718072.png', 100, 0, 0, 0, 'Hàng Cao Cấp - Mô Hình Genshin Impact Beelzebub chiến đấu Cao 28cm - nặng 800gram + FULL BOX + Phụ kiện có Kiếm + đế - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 28cm\r\n\r\nTrọng Lượng : 800Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Beelzebub\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(39, 'Mô Hình Genshin Impact Keqing chiến đấu Cao 28cm - rộng 15cm - nặng 800gram', 370000, 0, 'z4564936160467.png', 100, 0, 0, 0, 'Hàng Cao Cấp - Mô Hình Genshin Impact Keqing chiến đấu Cao 28cm - rộng 15cm - nặng 800gram + FULL BOX + Phụ kiện có 3 kiếm đi kèm - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 28cm\r\n\r\nTrọng Lượng : 800Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Keqing\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(40, 'Mô Hình Genshin Impact Yae Miko chiến đấu Cao 25cm - nặng 1kg', 389000, 0, 'z4542093364630.png', 100, 0, 0, 0, 'Hàng Cao Cấp - Mô Hình Genshin Impact Yae Miko chiến đấu Cao 25cm - nặng 1kg - FULL BOX + vũ khí cầm tay + 1 đuôi cáo - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 25cm\r\n\r\nTrọng Lượng : 1000Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Yae Miko\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(41, 'Mô Hình Genshin Impact Beelzebub chiến đấu Cao 28cm - nặng 700gram + FULL BOX', 562000, 0, 'z4542049738731.png', 100, 0, 0, 0, 'Hàng Cao Cấp - Mô Hình Genshin Impact Beelzebub chiến đấu Cao 28cm - nặng 700gram + FULL BOX + 1 Kiếm đi kèm - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 28cm\r\n\r\nTrọng Lượng : 700Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Beelzebub\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(42, 'Mô Hình Genshin Impact Hu Tao chiến đấu Cao 27cm - nặng 900gram + FULL BOX + có 1 Thương Đi kèm', 537000, 0, 'z4542012364892.png', 100, 0, 0, 0, 'Hàng Cao Cấp - Mô Hình Genshin Impact Hu Tao chiến đấu Cao 27cm - nặng 900gram + FULL BOX + có 1 Thương Đi kèm - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 27cm\r\n\r\nTrọng Lượng : 900Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Hu Tao\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(43, 'Mô Hình Genshin Impact Shenhe chiến đấu Cao 29cm - nặng 1kg', 534000, 0, 'z4541977252210.png', 100, 0, 0, 0, 'Hàng Cao Cấp - Mô Hình Genshin Impact Shenhe chiến đấu Cao 29cm - nặng 1kg + FULL BOX - Vũ khí Thương Đi kèm - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 29cm\r\n\r\nTrọng Lượng : 1000Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Shenhe\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(44, 'Mô Hình Genshin Impact Ganyu chiến đấu Cao - 27cm - nặng 700gram', 375000, 0, 'z4541944157083.png', 100, 0, 0, 0, 'Hàng Cao Cấp - Mô Hình Genshin Impact Ganyu chiến đấu Cao - 27cm - nặng 700gram + FULL BOX + Cung đi kèm - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 27cm\r\n\r\nTrọng Lượng : 700Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Ganyu\r\n\r\nFIGURE ANIME : Genshin Impact\r\n\r\n', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(45, 'Mô Hình Genshin Bộ 6 nhân vật bản B cao 8cm nặng 150 gram', 63000, 0, 'z4539888047955.png', 100, 0, 0, 0, 'Mô Hình Genshin Bộ 6 nhân vật bản B cao 8cm nặng 150 gram - Figure Genshin Impact - no box', 'Chiếu Cao : 8cm\r\n\r\nTrọng Lượng : 150Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : no box\r\n\r\nNhân vật :\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(46, 'Mô Hình Genshin Bộ 6 nhân vật bản A cao 8cm nặng 300 gram', 67000, 0, 'z4539956895591.png', 100, 0, 0, 0, 'Mô Hình Genshin Bộ 6 nhân vật bản A cao 8cm nặng 300 gram - Figure Genshin Impact - no box', 'Chiếu Cao : 8cm\r\n\r\nTrọng Lượng : 300Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : no box\r\n\r\nNhân vật :\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(47, 'Mô Hình Genshin Impact Hu Tao chiến đấu siêu đẹp - cao 18cm - nặng 180 gram', 103000, 0, 'z4518530851095.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact Hu Tao chiến đấu siêu đẹp - cao 18cm - nặng 180 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 18cm\r\n\r\nTrọng Lượng : 180Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Hu Tao\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(48, 'Mô Hình Genshin Impact Aether siêu đẹp - cao 19cm - nặng 180 gram', 99000, 0, 'z4518490449428.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact Aether siêu đẹp - cao 19cm - nặng 180 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 19cm\r\n\r\nTrọng Lượng : 180Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Aether\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(49, 'Mô Hình Genshin Impact Lumine siêu đẹp - cao 18cm - nặng 180 gram', 99000, 0, 'z4518476227960214.jpg', 100, 0, 0, 0, 'Mô Hình Genshin Impact Lumine siêu đẹp - cao 18cm - nặng 180 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 17cm\r\n\r\nTrọng Lượng : 110Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Lumine\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(50, 'Mô Hình Genshin Impact Nahida siêu đẹp - cao 17cm - nặng 180 gram', 99000, 0, 'z4518365048033212526.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact Nahida siêu đẹp - cao 17cm - nặng 180 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 17cm \r\n\r\nTrọng Lượng : 180Gram \r\n\r\nPhụ kiện đi kèm : không \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu \r\n\r\nNhân vật : Nahida \r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(51, 'Mô Hình Genshin Impact Kaedehara Kazuha siêu đẹp - cao 18cm - nặng 180 gram', 99000, 0, 'z4518329377684f3ghd.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact Kaedehara Kazuha siêu đẹp - cao 18cm - nặng 180 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 18cm\r\n\r\nTrọng Lượng : 180Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Kaedehara Kazuha\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(52, 'Mô Hình Genshin Impact Qiqi siêu đẹp - cao 17cm - nặng 110 gram', 99000, 0, 'z4461307553768khuk.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact Qiqi siêu đẹp - cao 17cm - nặng 110 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 17cm\r\n\r\nTrọng Lượng : 110Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Zhongli\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(53, 'Mô Hình Genshin Impact YAE MIKO siêu đẹp - cao 19cm - nặng 150 gram', 99000, 0, 'z4461245032824g43h.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact YAE MIKO siêu đẹp - cao 19cm - nặng 150 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 19cm\r\n\r\nTrọng Lượng : 130Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : YAE MIKO\r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(54, 'Mô Hình Genshin Impact Xiao siêu đẹp - cao 18cm - nặng 190 gram', 99000, 0, 'z4457339780501baaf.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact Xiao siêu đẹp - cao 18cm - nặng 190 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 18cm\r\n\r\nTrọng Lượng : 190Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Xiao \r\n\r\nFIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(55, 'Mô Hình Genshin Impact Zhongli siêu đẹp - cao 19cm - nặng 130 gram', 99000, 0, 'z4461271483917sadf2e12.png', 100, 0, 0, 0, 'Mô Hình Genshin Impact Zhongli siêu đẹp - cao 19cm - nặng 130 gram - Figure Genshin Impact - Có Hộp màu', 'Chiếu Cao : 19cm Trọng Lượng : 130Gram Phụ kiện đi kèm : không Chất liệu : Nhựa PVC cao cấp Vỏ hộp kèm sản phẩm : Có Hộp màu Nhân vật : Zhongli FIGURE ANIME : Genshin Impact', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 6),
(56, 'Mô hình DragonBall Vegeta Majin có led ở base - Cao 14cm - rộng 14cm - nặng 530Gram - Dragon Ball - Có Hộp màu', 139000, 0, 'z4882048922553.png', 100, 0, 0, 0, 'Mô hình DragonBall Vegeta Majin có led ở base - Cao 14cm - rộng 14cm - nặng 530Gram - Dragon Ball - Có Hộp màu', 'Chiếu Cao :14cm\r\n\r\nTrọng Lượng ~ 530 Gram \r\n\r\nPhụ kiện đi kèm : có led\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : Vegeta\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(57, 'Mô hình DragonBall Vegeta Majin dáng đứng siêu ngầu - Cao 44cm - nặng 3kg - Phụ kiện : 2 đầu thay thế + 1 bán thân - Dragon Ball - Có Hộp carton', 679000, 0, 'z4880185242067.png', 100, 0, 0, 0, 'Mô hình DragonBall Vegeta Majin dáng đứng siêu ngầu - Cao 44cm - nặng 3kg - Phụ kiện : 2 đầu thay thế + 1 bán thân - Dragon Ball - Có Hộp carton', 'Chiếu Cao :44cm\r\n\r\nTrọng Lượng ~ 3000 Gram \r\n\r\nPhụ kiện đi kèm : đầu thây thế + bán thân\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Carton\r\n\r\nNhân vật : Vegeta\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(58, 'Mô hình DragonBall Gohan Supper Saiyan - Cao 31cm - nặng 800gram - Dragon Ball - Bọc túi OPP + Có Hộp màu', 145000, 0, 'z4882058273500.png', 100, 0, 0, 0, 'Mô hình DragonBall Gohan Supper Saiyan - Cao 31cm - nặng 800gram - Dragon Ball - Bọc túi OPP + Có Hộp màu', 'Chiếu Cao :31cm\r\n\r\nTrọng Lượng ~ 800 Gram \r\n\r\nPhụ kiện đi kèm : đế kẹp chân\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Carton\r\n\r\nNhân vật : Gohan\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(59, 'Mô hình DragonBall Gohan chibi chiến đấu - Cao 12cm - nặng 290gram - Dragon Ball - Có Hộp màu', 89000, 0, 'z4881888594426.png', 100, 0, 0, 0, 'Mô hình DragonBall Gohan chibi chiến đấu - Cao 12cm - nặng 290gram - Dragon Ball - Có Hộp màu', 'Chiếu Cao :12cm\r\n\r\nTrọng Lượng ~ 290 Gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp màu\r\n\r\nNhân vật : Gohan\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(60, 'Mô hình DragonBall Gogeta ssj4 - Cao 25cm - nặng 600gram - Dragon Ball - Có Hộp màu', 198000, 0, 'z4820845764593.png', 100, 0, 0, 0, 'Mô hình DragonBall Gogeta ssj4 - Cao 25cm - nặng 600gram - Dragon Ball - Có Hộp màu', 'Chiếu Cao :25cm\r\n\r\nTrọng Lượng ~ 600 Gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : Gogeta\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(61, 'Mô hình DragonBall Goku ssj4 dáng đứng siêu đẹp - Cao 26cm - nặng 600gram - Dragon Ball - Có Hộp màu', 96000, 0, 'z4844270603235.png', 100, 0, 0, 0, 'Mô hình DragonBall Goku ssj4 dáng đứng siêu đẹp - Cao 26cm - nặng 600gram - Dragon Ball - Có Hộp màu', 'Chiếu Cao :26cm\r\n\r\nTrọng Lượng ~ 600 Gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : Goku\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(62, 'Hàng Loại 1 - Mô hình DragonBall Bộ tứ Vegeta , Goku , số 17 , Fieza đại chiến giữa các vũ trụ - Cao 52cm - rộng 39cm - nặng 7kg - Phụ kiện : 3 tay thay thế - Dragon Ball - Có Hộp màu', 1599000, 0, 'z4842206859179.png', 100, 0, 0, 0, 'Mô hình DragonBall Bộ tứ Vegeta , Goku , số 17 , Fieza đại chiến giữa các vũ trụ - Cao 52cm - rộng 39cm - nặng 7kg - Phụ kiện : 3 tay thay thế - Dragon Ball - Có Hộp màu', 'Chiếu Cao :52cm\r\n\r\nTrọng Lượng ~ 7000 Gram \r\n\r\nPhụ kiện đi kèm :có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật :Bộ 4\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG\r\n', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(63, 'Mô Hình Rồng YOYO Cao 25cm - rộng 25cm - nặng 1kg - Dragon Ball - Có Hộp Màu đẹp', 243000, 0, 'z4825478978950.png', 100, 0, 0, 0, 'Mô Hình Rồng YOYO Cao 25cm - rộng 25cm - nặng 1kg - Dragon Ball - Có Hộp Màu đẹp', 'Chiếu Cao :25cm\r\n\r\nTrọng Lượng 1kg\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : RỒNG YOYO\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(64, 'Hàng Loại 1 - Mô hình DragonBall SonGoku nâng cầu có led ở cầu và base siêu ngầu Cao 60cm - rộng 40cm - nặng 8kg5 - Phụ kiện : 2 đầu + có LED - Dragon Ball - Có Hộp màu', 1278000, 0, 'z4792191247545.png', 100, 0, 0, 0, 'Hàng Loại 1 - Mô hình DragonBall SonGoku nâng cầu có led ở cầu và base siêu ngầu Cao 60cm - rộng 40cm - nặng 8kg5 - Phụ kiện : 2 đầu + có LED - Dragon Ball - Có Hộp màu', 'Chiếu Cao :60cm\r\n\r\nTrọng Lượng ~ 8500 Gram \r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : SONGOKU\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(65, 'Mô hình DragonBall Goku cưỡi mây cầm gậy - Cao 21cm - rộng 14cm - nặng 900gram -Phụ kiện : gậy cầm tay - Dragon Ball - Có Hộp bìa', 149000, 0, 'z4738394334752.png', 100, 0, 0, 0, 'Mô hình DragonBall Goku cưỡi mây cầm gậy - Cao 21cm - rộng 14cm - nặng 900gram -Phụ kiện : gậy cầm tay - Dragon Ball - Có Hộp bìa', 'Chiếu Cao :21cm\r\n\r\nTrọng Lượng ~ 900 Gram \r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm :hộp bìa\r\n\r\nNhân vật : SONGOKU\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(66, 'Mô Hình DragonBall Trunks chiến đấu - Cao 43cm - nặng 3kg2 - Phụ kiện : 1 tay thay thế + 1 đầu thay thế + 1 đế đỡ đầu - Figure DragonBall - Hộp Carton', 285000, 0, 'o1cn01peahm31rmhjjaqth0.png', 100, 0, 0, 0, 'Mô Hình DragonBall Trunks chiến đấu - Cao 43cm - nặng 3kg2 - Phụ kiện : 1 tay thay thế + 1 đầu thay thế + 1 đế đỡ đầu - Figure DragonBall - Hộp Carton', 'Chiếu Cao : 43cm\r\n\r\nTrọng Lượng : 3200Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp Carton\r\n\r\nNhân vật : TRUNKS\r\n\r\nFIGURE ANIME : DRAGONBALL', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(67, 'Mô hình DragonBall Goku cắn đuôi frieza - Cao 25cm - rộng 20cm - nặng 1kg - Dragon Ball - Có Hộp màu', 345000, 0, 'z4713898068443.png', 100, 0, 0, 0, 'Mô hình DragonBall Goku cắn đuôi frieza - Cao 25cm - rộng 20cm - nặng 1kg - Dragon Ball - Có Hộp màu', 'Chiếu Cao :25cm\r\n\r\nTrọng Lượng ~ 1000 Gram \r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : SONGOKU\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(68, 'Mô Hình DragonBall Songoku Kid lái xe - Cao 21cm - rộng 20cm - nặng 1kg3 , Figure DragonBall - Có Hộp màu', 309000, 0, 'z4669575470386.png', 100, 0, 0, 0, 'Mô Hình DragonBall Songoku Kid lái xe - Cao 21cm - rộng 20cm - nặng 1kg3 , Figure DragonBall - Có Hộp màu', 'Chiếu Cao : 21cm\r\n\r\nTrọng Lượng : 1300Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có hộp đẹp\r\n\r\nNhân vật : Songoku\r\n\r\nFIGURE ANIME : DragonBall', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(69, 'Mô Hình DragonBall Frieza Gold siêu ngầu+ cao 27cm - nặng 530gram, Figure DragonBall - Có Hộp màu', 159000, 0, 'z4598772359771.png', 100, 0, 0, 0, 'Mô Hình DragonBall Frieza Gold siêu ngầu+ cao 27cm - nặng 530gram, Figure DragonBall - Có Hộp màu', 'Chiếu Cao : 27cm\r\n\r\nTrọng Lượng : 530Gram\r\n\r\nPhụ kiện đi kèm : không \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có hộp đẹp\r\n\r\nNhân vật : Frieza\r\n\r\nFIGURE ANIME : DragonBall', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(70, 'Mô hình DragonBall -- Broly dáng đứng siêu ngầu có led + 2 đầu thay thế cao 41cm nặng 3kg - Dragon Ball - Có Hộp Carton', 739000, 0, 'z4428854742135.png', 100, 0, 0, 0, 'Mô hình DragonBall Broly dáng đứng siêu ngầu có led + 2 đầu thay thế cao 41cm nặng 3kg - Dragon Ball - Có Hộp Carton', 'Chiếu Cao : 41cm \r\n\r\nTrọng Lượng ~ 3000 Gram \r\n\r\nPhụ kiện đi kèm : 1 đầu thay thế\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Hộp Carton\r\n\r\nNhân vật : BROLY\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(71, 'Mô Hình DragonBall Songoku Black có led - Hàng cao cấp có vũ khí cầm tay + bán thân siêu ngầu cao 50cm , figure DragonBall , có hộp màu', 759000, 0, 'z4384043730338.png', 100, 0, 0, 0, 'Mô Hình DragonBall Songoku Black - Hàng cao cấp có vũ khí cầm tay + bán thân siêu ngầu cao 50cm , figure DragonBall , có hộp màu', 'Chiếu Cao : 50cm\r\n\r\nTrọng Lượng : 4200Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : SONGOKU\r\n\r\nFIGURE ANIME : DragonBall', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(72, 'Mô hình DragonBall SonGoku Black SS3 - hàng cao cấp - Cao 45cm rộng 21cm - Nặng 5200 Gram - Dragon Ball - Có Hộp màu', 706000, 0, 'z4385757737549.png', 100, 0, 0, 0, 'Mô hình DragonBall SonGoku Black SS3 - hàng cao cấp - Cao 45cm rộng 21cm - Nặng 5200 Gram - Dragon Ball - Có Hộp màu', 'Chiếu Cao :45cm\r\n\r\nTrọng Lượng ~ 5200 Gram \r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : SONGOKU\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(73, 'Mô hình DragonBall Vegeta SSJ3 - hàng cao cấp - Cao 35cm - Nặng 2900 Gram - Dragon Ball - Có Hộp màu', 405000, 0, 'z4304716631700.png', 100, 0, 0, 0, 'Mô hình DragonBall Vegeta SSJ3 - hàng cao cấp - Cao 35cm - Nặng 2900 Gram - Dragon Ball - Có Hộp màu', 'Chiếu Cao :35cm\r\n\r\nTrọng Lượng ~ 2900 Gram \r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : SONGOKU\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(74, 'Mô hình DragonBall King Cold Bố của Frize - hàng cao cấp - Cao 28cm - Nặng 1500 Gram - Dragon Ball - Có Hộp màu', 315000, 0, 'z4362219682515.png', 100, 0, 0, 0, 'Mô hình DragonBall King Cold Bố của Frize - hàng cao cấp - Cao 28cm - Nặng 1500 Gram - Dragon Ball - Có Hộp màu', 'Chiếu Cao :28cm\r\n\r\nTrọng Lượng ~ 1500 Gram \r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : FRIZE\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(75, 'Mô Hình Dragon Ball Vegeta chiến đấu có 3 đầu thay thế - có đầu led usb ( ko sạc ) cao 41cm nặng 3kg7 - Figure DragonBall - Có hộp carton', 758000, 0, 'z4242482135237.png', 100, 0, 0, 0, 'Mô Hình Dragon Ball Vegeta chiến đấu có 3 đầu thay thế - có đầu led usb ( ko sạc ) cao 41cm nặng 3kg7 - Figure DragonBall - Có hộp carton', 'Chiếu Cao : 41cm \r\n\r\nTrọng Lượng : 3700Gram \r\n\r\nPhụ kiện đi kèm : 3 đầu + 3 tay \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp carton \r\n\r\nNhân vật : VEGETA \r\n\r\nFIGURE ANIME : DragonBall', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(76, 'Mô Hình DragonBall Gohan Best siêu ngầu có led cao 38cm - Figure DragonBall - Có Hộp màu', 379000, 0, 'z4031987063579.png', 100, 0, 0, 0, 'Mô Hình DragonBall Gohan Best siêu ngầu có led cao 38cm - Figure DragonBall - Có Hộp màu', 'Chiếu Cao : 38cm\r\n\r\nTrọng Lượng : 2000Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có hộp đẹp\r\n\r\nNhân vật : SONGOHAN\r\n\r\nFIGURE ANIME : DragonBall', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(77, 'Mô Hình DragonBall SonGoku SS4 siêu chất cao 28cm - Figure DragonBall - Có Hộp màu', 114000, 0, 'z3948882038737.png', 100, 0, 0, 0, 'Mô Hình DragonBall SonGoku SS4 siêu chất cao 28cm - Figure DragonBall - Có Hộp màu', 'Chiếu Cao : 28cm\r\n\r\nTrọng Lượng : 700Gram\r\n\r\nPhụ kiện đi kèm : Có Đế chân đi kèm\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có hộp đẹp\r\n\r\nNhân vật : SONGOKU\r\n\r\nFIGURE ANIME : DragonBall', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(78, 'Mô Hình DragonBall Dyspo dáng đứng siêu chất cao 34cm - Figure Dragonball - No Box', 105000, 0, 'o1cn01svhgwx1rmhfwzxx5a.png', 100, 0, 0, 0, 'Mô Hình DragonBall Dyspo dáng đứng siêu chất cao 34cm - Figure Dragonball - No Box', 'Chiếu Cao : 34cm\r\n\r\nTrọng Lượng : 300Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : No Box\r\n\r\nNhân vật : DYSPO\r\n\r\nFIGURE ANIME : DRAGONBALL', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(79, 'Mô Hình Frlize cao 14cm - Có Hộp Màu', 52000, 0, '2-c86ebb0a.png', 100, 0, 0, 0, 'Mô Hình Frlize cao 14cm - Full box', 'Chiếu Cao :14 cm\r\n\r\nTrọng Lượng ~ 400 Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : Frlize\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(80, 'Mô Hình DragonBall Jiren cao 21cm dáng đứng siêu ngầu - Có Hộp Đẹp - DragonBall', 82000, 0, '', 100, 0, 0, 0, 'Mô hình Dragon Ball Jiren', 'Chiếu Cao :21cm\r\n\r\nTrọng Lượng ~ 900 Gram \r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : JIREN DRAGON BALL\r\n\r\nFIGURE ANIME : MÔ HÌNH DRAGON BALL , 7 VIÊN NGỌC RỒNG', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2),
(81, 'Bugatti Bolide', 1299000, 0, '42151_1.webp', 100, 0, 0, 0, '', 'Bugatti Bolide là siêu xe thuần đua được thương hiệu chủ quản Pháp ra mắt vào tháng 10-2020 và hoàn thiện vào tháng 4-2023. Xe có số lượng giới hạn 40 xe, đã bán hết ngay từ khi công bố. Chiếc Bugatti Bolide đầu tiên sẽ được bàn giao tới tay người dùng vào đầu năm 2024.Trong thời gian người dùng vẫn đang ngóng đợi siêu xe này bàn giao, Bugatti đã hé lộ nhiều thông tin đáng chú ý xung quanh dự án này. Đầu tiên, dù sử dụng khung gầm Chiron, Bugatti Bolide sở hữu khả năng vận hành trong trường đua tốt hơn đáng kể nhờ tỉ lệ công suất: trọng lượng chỉ 0,91 kg/kW.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(82, 'Bugatti Bolide Agile Blue', 1299000, 0, '42162_1.webp', 100, 0, 0, 0, '', 'Bugatti Bolide là siêu xe thuần đua được thương hiệu chủ quản Pháp ra mắt vào tháng 10-2020 và hoàn thiện vào tháng 4-2023. Xe có số lượng giới hạn 40 xe, đã bán hết ngay từ khi công bố. Chiếc Bugatti Bolide đầu tiên sẽ được bàn giao tới tay người dùng vào đầu năm 2024.Trong thời gian người dùng vẫn đang ngóng đợi siêu xe này bàn giao, Bugatti đã hé lộ nhiều thông tin đáng chú ý xung quanh dự án này. Đầu tiên, dù sử dụng khung gầm Chiron, Bugatti Bolide sở hữu khả năng vận hành trong trường đua tốt hơn đáng kể nhờ tỉ lệ công suất: trọng lượng chỉ 0,91 kg/kW.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(83, 'Ferrari 488 GTE “AF Corse #51”', 5000000, 0, '42125_1.webp', 100, 0, 0, 0, '', 'Ferrari F8 Tributo ra mắt vào năm 2019, là cái tên hoàn toàn mới được sử dụng phiên bản nâng cấp của Ferrari 488 GTB. Dù kế thừa 488 GTB nhưng Ferrari F8 Tributo có nhiều sự thay đổi mới mẻ về thiết kế lẫn khả năng vận hành so với người tiền nhiệm.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(84, 'Ferrari Daytona SP3', 10999000, 0, '42143_1.webp', 100, 0, 0, 0, '', 'Ferrari Daytona SP3 là dòng xe Icona thứ 3 ra mắt sau bộ đôi Monza SP1 và SP2 (2018). Siêu xe mới được Ferrari sử dụng để (một lần nữa) vinh danh chiến thắng hoàn hảo của họ tại đường đua Daytona 24 giờ 1967 (giành cả 3 vị trí dẫn đầu) với vũ khí đặc biệt là động cơ đốt trong mạnh nhất từng xuất hiện trên một dòng xe \"ngựa chồm\".', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(85, 'Ford GT 2022', 2999000, 0, '42154_1.webp', 100, 0, 0, 0, '', 'Ford GT là dòng siêu xe 02 chỗ ngồi động cơ đặt giữa rất nổi tiếng của hãng xe FORD, Mỹ. Ra đời lần đầu năm 2005, đến nay Ford GT đang ở thế hệ thứ 2.Ford GT là sự kế thừa chiếc Ford GT40 huyền thoại, vốn đã 4 lần liên tiếp giành chiến thắng trong 24 giờ đua Le Mans (1966–1969), và được dựng thành bộ phim \"Cuộc đua lịch sử\"- Ford v Ferrari 2019.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(86, 'Ford Mustang', 4000000, 0, '10265_1.webp', 100, 0, 0, 0, '', 'Ford Mustang là dòng xe coupe thể thao được ưa chuộng trên thế giới. Ngay lần đầu ra mắt vào năm 1964, Mustang đã nhanh chóng trở thành mẫu xe bán chạy nhất lịch sử với hơn 1 triệu chiếc bàn giao đến khách hàng trong 18 tháng đầu tiên.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(87, 'Ford Mustang Shelby® GT500®', 1299000, 0, '42138_1.webp', 100, 0, 0, 0, '', 'Ford Mustang Shelby GT500 2020 được trang bị khối động cơ siêu tăng áp V8 5.2 lít, cho công suất cực đại lên đến 700 mã lực. Thời gian tăng tốc từ 0 – 96km/h chỉ mất 3,5 giây. Xe hoàn thành đạon đường dài 400m chỉ chưa đầy 11 giây.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(88, 'Lamborghini Countach', 499000, 0, '76908_1.webp', 100, 0, 0, 0, '', 'Lamborghini đưa Countach trở lại đã tạo ra khá nhiều tiếng vang nhưng đi kèm với đó cũng là những điều tiếng không hay gây tranh cãi không ngớt đối với fan thương hiệu Italia. Nhiều người không cho rằng chiếc Countach mới xứng đáng với tên gọi của mình khi ngoại trừ tên gọi và bộ bodykit lấy cảm hứng từ phiên bản gốc, bộ khung bên dưới của dòng xe này chỉ là Aventador mà thôi.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(89, 'Lamborghini Huracán Tecnica', 1299000, 0, '42161_1.webp', 100, 0, 0, 0, '', 'Lamborghini Huracan Tecnica đứng giữa phiên bản Evo và STO. Theo đại diện hãng siêu xe Ý, Huracan Tecnia là sự kết hợp hoàn hảo giữa năng lực thiết kế và kỹ thuật của Lamborghini, nhằm phát triển một phiên bản thú vị khi cầm lái thường nhật vừa hấp dẫn trên trường đua.Lamborghini Huracan Tecnica mang hiệu suất cao với động cơ V10, hứa hẹn sẽ tạo ra cảm giác lái phấn khích cho khách hàng đam mê tốc độ.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(90, 'Lamborghini Sián FKP 37', 10999000, 0, '42115_1.webp', 100, 0, 0, 0, '', 'Lamborghini Sián FKP 37 là dòng siêu xe động cơ lai (hybrid) hoàn toàn mới của hãng siêu xe Automobili Lamborghini S.p.A, Italy. Chính thức được ra mắt trong tháng 09-2019 tại triển lãm ô tô quốc tế IAA Frankfurt Motor Show 2019, Sian chỉ được sản xuất hạn chế 63 chiếc cho bản Coupe và 19 chiếc bản Roadster.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9);
INSERT INTO `product` (`id`, `name`, `price`, `promotion`, `img`, `qty`, `views`, `love`, `purchases`, `short_detail`, `description`, `is_special`, `is_trending`, `is_feature`, `is_upcomming`, `create_date`, `update_date`, `id_category`) VALUES
(91, 'Lotus Evija', 499000, 0, '76907_1.webp', 100, 0, 0, 0, '', 'Nóng phỏng tay khi hãng xe Lotus đến từ Anh mới cho ra mắt tại Auto Shanghai và tuần lễ xe Monterey Car Week, Lotus Evija khiến những tín đồ mê siêu xe thân thiện môi trường phải ngất ngây trước “sức mạnh khủng” của mình. Sở hữu 4 động cơ điện tạo ra sức mạnh 1.973 mã lực và mô men xoắn đạt 1.700 Nm. Khối động cơ này cho phép Lotus Evija tăng tốc từ 0 lên 100 km/h trong vòng 3 giây trước khi đạt tốc độ tối đa 320 km/h. Năng lượng cung cấp trực tiếp cho siêu xe điện Lotus Evija là bộ pin đặt giữa hai ghế. Tuy nhiên sở hữu khối động cơ có công suất gần 2.000 mã lực nhưng Lotus Evija chỉ đạt được tốc độ 320 km/h là không mấy tương xứng.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(92, 'McLaren Senna GTR™', 1299000, 0, '42123_1.webp', 100, 0, 0, 0, '', 'Về cơ bản, McLaren Senna GTR có diện mạo hầm hố hơn nhờ bộ chia gió cản trước mở rộng và kích thước lớn hơn. Hai bên sườn bổ sung thêm khe thoát gió so với bản đường phố. Đặc biệt, đuôi xe có cánh gió cỡ lớn cố định, gắn liền với cản sau. Bộ khuếch tán vuông vức và cắt xẻ mạnh hơn bản đường phố.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(93, 'NASCAR® Next Gen Chevrolet Camaro ZL1', 1299000, 0, '42153_1.webp', 100, 0, 0, 0, '', 'Chevrolet Camaro ZL1 nằm trong phân khúc xe thể thao hiệu năng cao tương tự như Ford Mustang Shelby GT500 hay Dodge Challenger SRT Hellcat, nhưng ít được ưa chuộng tại Việt Nam vì nhiều lý do. \r\nMặc dù vậy, Camaro ZL1 vẫn về Việt nam một chiếc duy nhất vào năm 2014. Chiếc xe thuộc thế hệ thứ năm (sản xuất từ năm 2012-2015).', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(94, 'Pagani Utopia', 599000, 0, '76915_1.webp', 100, 0, 0, 0, '', 'Pagani trình làng Utopia như một sản phẩm thay thế mẫu Huayra danh tiếng. Trong khi nhiều đường nét khá quen thuộc từ Huayra, hãng xe Italy cho biết cấu trúc của Utopia mới hoàn toàn. Mẫu siêu phẩm được xây dựng dựa trên ba tiêu chí do chính người sáng lập công ty, Horacio Pagani đặt ra: sự đơn giản, nhẹ nhàng và niềm vui khi lái xe.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(95, 'PEUGEOT 9X8 24H Le Mans Hybrid Hypercar', 5000000, 0, '42156_1.webp', 100, 0, 0, 0, '', 'Mẫu Hypercar chạy bằng động cơ Hybrid Peugeot 9X8 tới đây sẽ chính thức ra mắt tại Monza, Ý, vào ngày 10 tháng 7 và sẽ tham gia tranh tài tại phân hạng Le Mans Hypercar (LMH) nổi bật của Giải đua sức bền FIA và Le Mans 24 Hours với chiếc Hypercar mới chạy bằng động cơ Hybrid đang đóng góp thực sự vào việc thúc đẩy sự tiến bộ của Peugeot trong lĩnh vực công nghệ điện khí hóa.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(96, 'Porsche 911', 4000000, 0, '10295_1.webp', 100, 0, 0, 0, '', 'Porsche 911 là dòng xe thể thao hiệu suất cao ra đời lần đầu tiên vào năm 1963. Đến nay, dòng xe này đang ở thế hệ thứ 8 được giới thiệu tại triển lãm Los Angeles diễn ra vào ngày 26/11/2018.\r\nTrải qua lịch sử phát triển lâu đời với sự thành công vang dội toàn cầu, Porsche 911 trở thành sản phẩm mang tính biểu tượng của thương hiệu xe sang trứ danh nước Đức, đồng thời khiến các đối thủ \"máu mặt\" như Mclaren 570S hay Audi R8 đều phải kiêng nể.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(97, 'Porsche 911 RSR', 4325000, 0, '42096_1.webp', 100, 0, 0, 0, '', 'Porsche sẽ trình làng mùa giải 2017 với siêu xe thể thao GT hoàn toàn mới. 911 RSR đáp ứng đầy đủ yêu cầu của thể thức đua nổi tiếng 24h tại Le Mans, với thiết kế gọn nhẹ, hiện đại, động cơ phẳng 6 xy lanh được đặt ở phía trước của trục sau. Động cơ 4,0 lít cực nhẹ kết hợp với hệ thống phun nhiên liệu trực tiếp cũng như van cứng mang đến hiệu suất vượt trội. Màn đua ra mắt 911 RSR hoàn toàn mới sẽ diễn ra lần đầu tiên vào tháng 1/2017 tại cuộc đua 24 giờ ở Daytona.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(98, 'Porsche 963', 599000, 0, '76916_1.webp', 100, 0, 0, 0, '', 'Porsche 963 được trang bị động cơ xăng V8, dung tích 4.6L có nguồn gốc từ hypercar thương mại 918 Spyder nhưng được sửa đổi, lắp thêm cặp tăng áp kép và kết hợp với hệ thống hybrid thế hệ mới nhất hiện tại. Đặc biệt của Porsche 963 này là khả năng duy trì tốc độ cao từ khoảng 200-350km/h trong nhiều giờ vận hành liên tục trên đường đua - thậm chí có thể lên tới 24 giờ với một số chặng đua như Daytona hay Le Mans.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(99, 'THE BATMAN - BATMOBILE™', 2499000, 0, '42127_1.webp', 100, 0, 0, 0, '', '', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(100, 'Toyota GR Supra', 499000, 0, '76901_1.webp', 100, 0, 0, 0, '', 'Toyota GR Supra 2023 sở hữu diện mạo đầy nam tính và kiêu hãnh khi mang trong mình hơi thở của mẫu concept FT-1. Tổng thể diện mạo của Toyota GR Supra mang đến cái nhìn đầy mê hoặc khi được định hình bởi những đường cong với tỷ lệ vàng.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 9),
(101, 'Pack anime thẻ Naruto Cam ( 36 Pack 1 hộp - 1 Pack có 5 thẻ ) - dài 20 - cao 13cm', 89000, 0, 'z4877695901109asfc2.png', 100, 0, 0, 0, 'Pack anime thẻ Naruto Cam ( 36 Pack 1 hộp - 1 Pack có 5 thẻ ) - dài 20 - cao 13cm - Hộp màu\r\n', '- Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime kimetsu no yaiba\r\nBộ thẻ NARUTO có chia theo các cấp độ hiếm.\r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(102, 'Pack anime thẻ Naruto vàng ( 36 Pack 1 hộp - 1 Pack có 5 thẻ ) - dài 20 - cao 13cm', 89000, 0, 'z4877675431257cnsdjks.png', 100, 0, 0, 0, 'Pack anime thẻ Naruto vàng ( 36 Pack 1 hộp - 1 Pack có 5 thẻ ) - dài 20 - cao 13cm - Hộp màu', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime kimetsu no yaiba\r\nBộ thẻ NARUTO có chia theo các cấp độ hiếm.\r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(103, 'Pack anime Dragonball Supper A - 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm', 89000, 0, 'z4807099073016dahokasd.png', 100, 0, 0, 0, 'Pack anime Dragonball Supper - 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm\r\n- 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece\r\nBộ thẻ One Piece có chia theo các cấp độ hiếm.\r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(104, 'Pack anime Dragonball Supper B - 1 Hộp = 32PACK - Mỗi pack có 5 thẻ', 89000, 0, 'z4807116643265saf32e23.png', 100, 0, 0, 0, 'Pack anime Dragonball Supper - 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm \r\n- 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece \r\nBộ thẻ One Piece có chia theo các cấp độ hiếm. \r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(105, 'Pack thẻ genshin impact - 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm', 89000, 0, 'z4808265038192safas.png', 100, 0, 0, 0, 'Pack thẻ genshin impact - 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm \r\n- 1 hộp có 32 pack (160 thẻ bài)', '- Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece\r\nBộ thẻ One Piece có chia theo các cấp độ hiếm.\r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(106, 'Pack Skibidi Toilet- 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm', 89000, 0, 'z4807111487942asdacas.png', 100, 0, 0, 0, 'Pack Skibidi Toilet- 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm \r\n- 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece \r\nBộ thẻ One Piece có chia theo các cấp độ hiếm. \r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(107, 'Pack anime kimetsu no yaiba - 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm', 89000, 0, 'z4807091958905sada.png', 100, 0, 0, 0, 'Pack anime kimetsu no yaiba - 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm \r\n- 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece \r\nBộ thẻ One Piece có chia theo các cấp độ hiếm. \r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(108, 'Pack anime One Piece - 1 Hộp = 32PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm', 89000, 0, 'z4807079785952btger.png', 100, 0, 0, 0, 'Pack - 1 hôp = 32PACK - 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece\r\nBộ thẻ One Piece có chia theo các cấp độ hiếm.\r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(109, 'Pack anime Dragonball - 1 Hộp = 36PACK - Mỗi pack có 5 thẻ- Cao 13cm - rộng 14cm', 89000, 0, 'z4625269733020h35463.png', 100, 0, 0, 0, 'Pack - 1 hôp = 32PACK - 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece \r\nBộ thẻ One Piece có chia theo các cấp độ hiếm. \r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(110, 'Pack anime kimetsu no yaiba Xanh- 1 Hộp - 36 PACK - Mỗi pack có 5 thẻ Dài 13cm Rộng 14cm Nặng 400g - Hộp màu', 89000, 0, 'z4625215580336584df.png', 100, 0, 0, 0, 'Pack - 1 hôp = 32PACK - 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece \r\nBộ thẻ One Piece có chia theo các cấp độ hiếm. \r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(111, 'Pack anime kimetsu no yaiba Vàng - 1 Hộp - 36 PACK - Mỗi pack có 5 thẻ + 1 Pack Đặc Biệt . Dài 13cm Rộng 14cm Nặng 400g - Hộp màu', 89000, 0, 'z4625189335173fa1231.png', 100, 0, 0, 0, 'Pack - 1 hôp = 32PACK - 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece \r\nBộ thẻ One Piece có chia theo các cấp độ hiếm. \r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(112, 'Pack thẻ one piece sky piea hộp vàng ( 36 pack 1 hộp ) . Dài 20cm - cao 13cm', 89000, 0, 'z4572732706356gq312.png', 100, 0, 0, 0, 'Pack - 1 hôp = 32PACK - 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece \r\nBộ thẻ One Piece có chia theo các cấp độ hiếm. \r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(113, 'Pack thẻ one piece sky piea hộp vàng ( 36 pack 1 hộp ) . Dài 20cm - cao 13cm', 89000, 0, 'z457270631369984563.png', 100, 0, 0, 0, 'Pack - 1 hôp = 32PACK - 1 hộp có 32 pack (160 thẻ bài)', 'Chất liệu thẻ giấy, độ bền cao, phù hợp cho các bạn yêu thích sưu tầm thẻ bài của bộ anime One Piece \r\nBộ thẻ One Piece có chia theo các cấp độ hiếm. \r\nThứ tự thẻ hiếm: R, R+, SR, SSR, UR, LR, ZR, CP, SP.', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 8),
(114, 'Mô Hình Kimetsu No Yaiba Ác quỷ Tanjiro', 495000, 0, 'z4806389075226.jpg', 100, 0, 0, 0, 'Mô Hình Kimetsu No Yaiba Ác quỷ Tanjiro - Cao 21cm - nặng 1kg2 - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu', 'Mô Hình Kimetsu No Yaiba Ác quỷ Tanjiro - Cao 21cm - nặng 1kg2 - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu\r\n\r\nChiếu Cao : 21cm\r\n\r\nTrọng Lượng : 1200Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Vỏ Hộp màu \r\n\r\nNhân vật : Các Nhân Vật Trong Thanh Gươm Diệt Quỷ\r\n\r\nFIGURE ANIME : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(115, 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Thượng tam akaza dáng đứng siêu ngầu', 185000, 0, 'o1cn01aufkzo1rmhks0dq6p.jpg', 100, 0, 0, 0, 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Thượng tam akaza dáng đứng siêu ngầu - Cao 26,5cm - nặng 600gram - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Thượng tam akaza dáng đứng siêu ngầu - Cao 26,5cm - nặng 600gram - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu\r\n\r\nChiếu Cao : 26.5cm\r\n\r\nTrọng Lượng : 600Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Vỏ Hộp màu \r\n\r\nNhân vật : Thượng Tam\r\n\r\nFIGURE ANIME : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(116, 'Hàng Cao Cấp - Mô Hình Kimetsu No Yaiba Shinobu đứng trên mái siêu đẹp', 449000, 0, 'z4387166703697.jpg', 100, 0, 0, 0, 'Hàng Cao Cấp - Mô Hình Kimetsu No Yaiba Shinobu đứng trên mái siêu đẹp , có led ở ánh trăng cao 28cm nặng 1200 gram - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu', 'Hàng Cao Cấp - Mô Hình Kimetsu No Yaiba Shinobu đứng trên mái siêu đẹp , có led ở ánh trăng cao 28cm nặng 1200 gram - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu\r\n\r\nChiếu Cao : 28cm\r\n\r\nTrọng Lượng : 1200Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Box Nhựa - Hộp màu\r\n\r\nNhân vật : Shinobu\r\n\r\nFIGURE ANIME : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(117, 'Hàng Cao Cấp - Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp', 555000, 0, 'z4387274417825.jpg', 100, 0, 0, 0, 'Hàng Cao Cấp - Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp , có led cao 31cm rộng 23cm nặng 2000 gram - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu', 'Hàng Cao Cấp - Mô Hình Kimetsu No Yaiba Shinobu bắt bướm siêu đẹp , có led cao 31cm rộng 23cm nặng 2000 gram - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu\r\n\r\nChiếu Cao : 31cm\r\n\r\nTrọng Lượng : 2000Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Box Nhựa - Hộp màu\r\n\r\nNhân vật : Shinobu\r\n\r\nFIGURE ANIME : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(118, 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 - 8 cm', 3750000, 0, 'z4254057664987.jpg', 100, 0, 0, 0, 'Sỉ Thùng - giá 125k / bộ , Mã 816 - số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 - 8 cm - Figure Kimetsu No Yaiba - No Box', 'Sỉ Thùng - giá 125k / bộ , số lượng 30 bộ - Bộ 10 các nhân vật thanh gươm diệt quỷ , cao 7 - 8 cm - Figure Kimetsu No Yaiba - No Box\r\n\r\n\r\nChiếu Cao : 7-8cm\r\n\r\nTrọng Lượng : 300 Gram \r\n\r\nPhụ kiện đi kèm : Không \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : No Box\r\n\r\nNhân vật : các nhân vật trong KIMETSU NO YAIBA\r\n\r\nFIGURE ANIME : KIMETSU NO YAIBA , THANH GƯƠM DIỆT QUỶ , Demon Slayer', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(119, 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu', 235000, 0, 'o1cn01neo5km1iydp1foxjc.jpg', 100, 0, 0, 0, 'Hàng Loại 1 - Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu - có led - cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 'Mô Hình Thượng Nhất Kokushibou chiến đấu siêu ngầu - có led - cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu\r\n\r\nChiếu Cao : 30cm\r\n\r\nTrọng Lượng : ~ 2500 Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , hộp đẹp chắc chắn \r\n\r\nNhân vật : Thượng Nhất Kokushibou\r\n\r\nFIGURE ANIME , MANGA : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(120, 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm', 235000, 0, 'o1cn01lxyill1iydp6rgfis.jpg', 100, 0, 0, 0, 'Hàng Loại 1 - Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 'Mô Hình Tsugikuni Yoriichi chiến đấu - có led - cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu\r\n\r\nChiếu Cao : 30cm\r\n\r\nTrọng Lượng : ~ 2500 Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , hộp đẹp chắc chắn \r\n\r\nNhân vật : Thượng Nhất Kokushibou\r\n\r\nFIGURE ANIME , MANGA : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(121, 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu', 129000, 0, 'z4171778974597.jpg', 100, 0, 0, 0, 'Hàng Loại 1 - Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figure Thanh gươm diệt quỷ - No Box', 'Mô Hình Kimetsu No Yaiba Chúa Quỷ Muzan dáng đứng siêu ngầu cao 30cm nặng 800g - Figure Thanh gươm diệt quỷ - No Box\r\n\r\nChiếu Cao : 30cm\r\n\r\nTrọng Lượng : 800Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : No Box\r\n\r\nNhân vật : Chúa Quỷ\r\n\r\nFIGURE ANIME : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(122, 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu', 184000, 0, 'z4125798847221.jpg', 100, 0, 0, 0, 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Sabito dáng đứng siêu ngầu cao 29cm nặng 700g - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu\r\n\r\nChiếu Cao : 29cm\r\n\r\nTrọng Lượng : 700Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Vỏ Hộp màu \r\n\r\nNhân vật : Sabito\r\n\r\nFIGURE ANIME : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(123, 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu', 119000, 0, 'z4129410687341.jpg', 100, 0, 0, 0, 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 700g - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu', 'Hàng loại 1 -Mô Hình Kimetsu No Yaiba Phong Trụ dáng đứng siêu ngầu cao 31cm nặng 1 kg - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu\r\n\r\nChiếu Cao : 31cm\r\n\r\nTrọng Lượng : 700Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Vỏ Hộp màu \r\n\r\nNhân vật : Phong Trụ\r\n\r\nFIGURE ANIME : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(124, 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu', 289000, 0, 'z4143591786018.jpg', 100, 0, 0, 0, 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu', 'Mô Hình Kimetsu No Yaiba Luyến Trụ chiến đấu cao 22cm nặng 800 gram - Figure Thanh gươm diệt quỷ - Có Vỏ Hộp màu\r\n\r\nChiếu Cao : 22cm\r\n\r\nTrọng Lượng : 800Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Vỏ Hộp màu \r\n\r\nNhân vật : Các Nhân Vật Trong Thanh Gươm Diệt Quỷ\r\n\r\nFIGURE ANIME : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(125, 'Mô Hình Kimetsu No Yaiba Zenitshu chiến đấu', 469000, 0, 'z3948944117655.jpg', 100, 0, 0, 0, 'Mô Hình Kimetsu No Yaiba Zenitshu chiến đấu có led siêu đẹp cao 35cm - Figure Kimetsu No Yaiba - Có hộp màu', 'Mô Hình Kimetsu No Yaiba Zenitshu chiến đấu có led siêu đẹp cao 35cm - Figure Kimetsu No Yaiba - Có hộp màu\r\n\r\nChiếu Cao : 35cm\r\n\r\nTrọng Lượng : 1200Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Vỏ Hộp màu \r\n\r\nNhân vật : ZENITSHU\r\n\r\nFIGURE ANIME : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(126, 'Mô Hình Inosuke', 119000, 0, 'o1cn01twv4vo1rmherw3h3n.jpg', 100, 0, 0, 0, 'Mô Hình Inosuke Cao 29cm , nặng 700 Gram - Full box - Kimetsu No Yaiba - Có Hộp Màu', 'Mô Hình Inosuke Cao 29cm , nặng 700 Gram Cao 29cm - Full box - Kimetsu No Yaiba \r\n\r\nChiếu Cao : 29cm\r\n\r\nTrọng Lượng : ~ 700 Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , hộp đẹp chắc chắn \r\n\r\nNhân vật : INOSUKE\r\n\r\nFIGURE ANIME , MANGA : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(127, 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp', 329000, 0, 'o1cn01nqwhgd2ltrows52tn.jpg', 100, 0, 0, 0, 'Mô hình đồ chơi - Nezuko ánh trăng - Hiệu ứng base đẹp - Kimetsu No Yaiba - Có Hộp Màu', 'Mô hình Kimetsu No Yaiba figure Demon Slayer Kamado Tanjirou cao 16 cm trạng thái chiến đấu - figure thanh gươm diệt quỷ\r\n\r\n\r\nChiếu Cao : 31cm\r\n\r\nTrọng Lượng : 1 Kg \r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full Box - Có Hộp Đẹp\r\n\r\nNhân vật : các nhân vật trong KIMETSU NO YAIBA\r\n\r\nFIGURE ANIME : KIMETSU NO YAIBA , THANH GƯƠM DIỆT QUỶ , Demon Slayer', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(128, 'Mô Hình Thượng Lục Daki', 119000, 0, '812-1659158962579.jpg', 100, 0, 0, 0, 'Mô Hình Thượng Lục Daki Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp màu', 'Mô Hình Thượng Nhất Kokushibou Cao 30cm - Full box - Kimetsu No Yaiba \r\n\r\nChiếu Cao : 30cm\r\n\r\nTrọng Lượng : ~ 500 Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , hộp đẹp chắc chắn \r\n\r\nNhân vật : Thượng Nhất Kokushibou\r\n\r\nFIGURE ANIME , MANGA : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(129, 'Mô Hình Tsugikuni Yoriichi', 119000, 0, '813-1659159066516.jpg', 100, 0, 0, 0, 'Mô Hình Tsugikuni Yoriichi Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 'Mô Hình Thượng Nhất Kokushibou Cao 30cm - Full box - Kimetsu No Yaiba \r\n\r\nChiếu Cao : 30cm\r\n\r\nTrọng Lượng : ~ 500 Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , hộp đẹp chắc chắn \r\n\r\nNhân vật : Thượng Nhất Kokushibou\r\n\r\nFIGURE ANIME , MANGA : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(130, 'Mô Hình Thượng Lục Gyuutarou', 119000, 0, '811-1659158919593.jpg', 100, 0, 0, 0, 'Mô Hình Thượng Lục Gyuutarou Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 'Mô Hình Thượng Lục Gyuutarou Cao 30cm - Full box - Kimetsu No Yaiba \r\n\r\nChiếu Cao : 30cm\r\n\r\nTrọng Lượng : ~ 500 Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , hộp đẹp chắc chắn \r\n\r\nNhân vật : Thượng Nhất Kokushibou\r\n\r\nFIGURE ANIME , MANGA : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(131, 'Mô Hình Thượng Nhất Kokushibou', 119000, 0, '810-1659158869617.jpg', 100, 0, 0, 0, 'Mô Hình Thượng Nhất Kokushibou Cao 30cm - Full box - Kimetsu No Yaiba - Có Hộp Màu', 'Mô Hình Thượng Nhất Kokushibou Cao 30cm - Full box - Kimetsu No Yaiba \r\n\r\nChiếu Cao : 30cm\r\n\r\nTrọng Lượng : ~ 500 Gram\r\n\r\nPhụ kiện đi kèm : Không\r\n\r\nChất liệu : Nhựa PVC , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Full box , hộp đẹp chắc chắn \r\n\r\nNhân vật : Thượng Nhất Kokushibou\r\n\r\nFIGURE ANIME , MANGA : Kimetsu No Yaiba', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 4),
(132, 'MÃ 5002 - Sỉ Lẻ 135k - Sỉ Thùng 130k Thùng 12con Lego', 135000, 0, 'dasedihdqwio.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 55 cm \r\n\r\nDáng Gấu Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn \r\n\r\n', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(133, 'Mon Thần Tài 40cm - Mã 4100 - Sỉ Lẻ 110k - Sỉ Thùng 105k Thùng 12 con Lego', 110000, 0, 'safgwouq2197.png', 100, 0, 0, 0, 'Tặng 1 búa', 'Chiếu Cao : 40 cm \r\n\r\nDáng Gấu Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(134, 'Gấu bearbrick 55cm - MÃ 5004 - Sỉ Lẻ 135k - Sỉ Thùng 130k Thùng 12con Lego', 135000, 0, 'fw782934sd.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 55 cm \r\n\r\nDáng Gấu Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(135, 'Gấu bearbrick 55cm - MÃ 5001 - Sỉ Lẻ 135k - Sỉ Thùng 130k Thùng 12con Lego', 135000, 0, 'cdf23fcsd98.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 55 cm \r\n\r\nDáng Gấu Đẹp \r\n\r\n\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(136, 'Gấu bearbrick 55cm - MÃ 5009 - Sỉ Lẻ 135k - Sỉ Thùng 130k Thùng 12con Lego', 135000, 0, 'asdcbuqhrouq4.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 55 cm \r\n\r\nDáng Gấu Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(137, 'Gấu bearbrick 55cm - MÃ 5003 - Sỉ Lẻ 135k - Sỉ Thùng 130k Thùng 12con Lego', 135000, 0, 'e24y23918ascj.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 55 cm \r\n\r\nDáng Gấu Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(138, 'Gấu bearbrick 55cm - MÃ 5006 - Sỉ Lẻ 135k - Sỉ Thùng 130k Thùng 12con Lego', 135000, 0, 'casfhu13eh23.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 55 cm \r\n\r\nDáng Gấu Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(139, 'Gấu bearbrick 55cm - MÃ 5008 - Sỉ Lẻ 135k - Sỉ Thùng 130k Thùng 12con Lego', 135000, 0, 'fcaoh24872235.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 55 cm \r\n\r\nDáng Gấu Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(140, 'Gấu bearbrick 55cm - MÃ 5005 - Sỉ Lẻ 135k - Sỉ Thùng 130k Thùng 12con Lego', 135000, 0, 'feiuhr239472.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 55 cm \r\n\r\nDáng Gấu Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(141, 'Ông Già Noel và Xe ô Tô - Cao 35cm -Mã 2005 - Sỉ Lẻ 169k - Sỉ Thùng 163k Thùng 12 con', 135000, 0, 'sadfhe2u1io321.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 32 cm \r\n\r\nDáng Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(142, 'Người Tuyết và Xe ô Tô - Cao 32cm -Mã 2005 - Sỉ Lẻ 155k - Sỉ Thùng 148k Thùng 12 con lego', 135000, 0, 'asfaskhj23423.png', 100, 0, 0, 0, 'Tặng 1 búa \r\nSỉ thùng 12 con rẻ hơn 5k /con', 'Chiếu Cao : 32 cm \r\n\r\nDáng Đẹp \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(143, '6 K - Combo 5 hộp lego Mã 1354', 30000, 0, '6K-Combo5lego1354.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(144, '6 K - Combo 5 hộp Mã 1353', 30000, 0, '6K-Combo5lego1353.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(145, '6 K - Combo 5 hộp lego Mã 1352', 30000, 0, '6K-Combo5lego1352.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(146, '6 K - Combo 5 hộp lego Mã 1351', 30000, 0, '6K-Combo5lego1351.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(147, '6 K - Combo 5 hộp lego Mã 1350', 30000, 0, '6K-Combo5lego1350.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(148, '6.5 K - Combo 5 hộp lego Mã 1301', 32500, 0, '6.5K-Combo5lego1301.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(149, '6.5 K - Combo 5 hộp lego Mã 1302', 32500, 0, '6.5K-Combo5lego1302.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(150, '6.5 K - Combo 5 hộp lego Mã 1303', 32500, 0, '6.5K-Combo5lego1303.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(151, '6.5 K - Combo 5 hộp lego Mã 1305', 32500, 0, '6.5K-Combo5lego1305.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(152, '6 K - Combo 5 hộp lego Mã 1815', 30000, 0, '6K-Combo5lego1815.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm - 12 cm \r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép \r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(153, 'Sỉ Thùng : 7,5k/Hộp - Tổng 160 Hộp Kiếm 6 mẫu Lego Mã 1400 - 1405', 1200000, 0, '8-dda64e6b.png', 100, 0, 0, 0, 'Thùng 160 con 6 mẫu Các Mã từ 1400 - 1405 Số Lượng Các Mẫu trong Thùng đều được tối ưu mẫu nào bán chạy ... để cho vào nhiều hơn', 'Chiếu Cao : 42- 45 cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(154, 'Sỉ Thùng 7k/Hộp - Tổng 160 hộp 10 mẫu Lego Hải Tặc Mã 1500-1509 - Ship từ kho Hà Nội', 1120000, 0, '18-7c8e1d0a.png', 100, 0, 0, 0, 'Thùng 160 con 10 mẫu Các Mã từ 1500 - 1509 Số Lượng Các Mẫu trong Thùng đều được tối ưu mẫu nào bán chạy ... để cho vào nhiều hơn', 'Chiếu Cao : 10cm - 12 cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(155, 'Sỉ Thùng 8.5k / Hộp Tổng 160 Hộp 8 mẫu Lego mon Mã 1750 - 1757', 1360000, 0, '21-5cf58097.png', 100, 0, 0, 0, 'Thùng 160 con 6 mẫu Các Mã từ 1750 - 1757 Số Lượng Các Mẫu trong Thùng đều được tối ưu mẫu nào bán chạy ... để cho vào nhiều hơn', 'Chiếu Cao : 10cm - 12 cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(156, '7 K - Combo 5 hộp Lego Mã 1030', 35000, 0, '27-31ad904f.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(157, '7.5 K - Combo 5 hộp Lego Mã 1031', 37500, 0, '26-f0f4aa67.png', 100, 0, 0, 0, '', 'Chiếu Cao : 16cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(158, '8 K - Combo 5 hộp Lego Mã 1032', 40000, 0, '28-023b622f.png', 100, 0, 0, 0, '', 'Chiếu Cao : 11cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(159, '7.5 K - Combo 5 hộp Lego Mã 1033', 35000, 0, '29-0e5fcebe.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(160, '7 K - Combo 5 hộp Lego Mã 1034', 35000, 0, '31-9ff829e8.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(161, '7.5 K - Combo 5 hộp Lego Mã 1035', 0, 0, '30-827850ae.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(162, '7 K - Combo 5 hộp Lego Mã 1500', 35000, 0, '39-fd3cf141.png', 100, 0, 0, 0, '', 'Chiếu Cao : 10 cm\r\n\r\nPhụ kiện đi kèm : nhiều chi tiết lắp ghép\r\n\r\nChất liệu : Nhựa PP , ABS cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Box Màu đi kèm , box đẹp chắc chắn', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 10),
(163, 'Mô Hình OnePiece Bán Thân Zoro enma', 2899000, 0, 'z4842157162877.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10kg , Figure OnePiece - Hộp xốp + box bìa', 'Mô Hình OnePiece Bán Thân Zoro enma GK có led ở mắt , khớp nam châm- Cao 64cm - rộng 82cm - nặng 10kg , Figure OnePiece - Hộp xốp + box bìa\r\n\r\nChiếu Cao : 64cm\r\n\r\nTrọng Lượng : 10000Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : bọc túi opp - có hộp màu\r\n\r\nNhân vật : Zoro\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(164, 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido', 249000, 0, 'z4842806344834.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePiece - Có Hộp', 'Mô Hình OnePiece Luffy Gear 5 đại chiến rồng Kaido - Cao 23cm - rộng 18cm - nặng 1kg2 - Figure OnePiece - Có Hộp\r\n\r\nChiếu Cao :23cm\r\n\r\nTrọng Lượng : 1200Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Luffy\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(165, '\r\nMô Hình OnePiece Luffy Gear nắm đấm siêu ngầu', 325000, 0, 'z4806927801249.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece - Có Hộp', 'Mô Hình OnePiece Luffy Gear nắm đấm siêu ngầu - Cao 31cm - rộng 17cm - nặng 1kg2 - Figure OnePiece - Có Hộp\r\n\r\nChiếu Cao :32cm\r\n\r\nTrọng Lượng : 1200Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Luffy\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(166, 'Mô Hình OnePiece Zoro rồng lốc xoáy', 299000, 0, 'z4873102333596.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu - Figure OnePiece - Có Hộp', 'Mô Hình OnePiece Zoro rồng lốc xoáy - cao 28cm - rộng 25cm - nặng 2kg4 - phụ kiện : 3 kiếm + 2 đầu - Figure OnePiece - Có Hộp\r\n\r\nChiếu Cao :28cm\r\n\r\nTrọng Lượng : 2400Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Zoro\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(167, 'Mô Hình OnePiece Nami cầm gậy', 361000, 0, 'z4806997608749.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , có hộp đẹp', 'Mô Hình OnePiece Nami cầm gậy - Cao 40cm - nặng 850gram , figure OnePiece , no box\r\n\r\nChiếu Cao : 40cm\r\n\r\nTrọng Lượng : 850Gram\r\n\r\nPhụ kiện đi kèm : không \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : có box\r\n\r\nNhân vật : NAMI\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(168, 'Mô Hình OnePiece Shanks và luffy đại chiến đảo đầu lâu', 1184000, 0, 'z4818811807887.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Shanks và luffy đại chiến đảo đầu lâu - Cao 50cm - rộng 37cm - nặng 6kg5 - Figure OnePiece - Có Hộp Bìa', 'Mô Hình OnePiece Shanks và luffy đại chiến đảo đầu lâu - Cao 50cm - rộng 37cm - nặng 6kg5 - Figure OnePiece - Có Hộp Bìa\r\n\r\nChiếu Cao :50cm\r\n\r\nTrọng Lượng : 6500Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Luffy và Shanks\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(169, 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay', 418000, 0, 'z4806381455966.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - Có Hộp màu', 'Mô Hình OnePiece ACE hỏa quyền đứng chỉ tay - Cao 30cm - rộng 17cm - nặng 1kg7 - Figure OnePiece - Có Hộp màu\r\n\r\nChiếu Cao : 30cm \r\n\r\nTrọng Lượng : 1700Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : ACE\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(170, 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido', 1468, 0, 'z4819219427154.jpg', 100, 0, 0, 0, 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12kg - Figure OnePiece - Có Hộp', 'Hàng Loại 1 - Mô Hình OnePiece Luffy gear 5 đại chiến kaido có Led - Cao 60cm - rộng 43cm - nặng 12kg - Figure OnePiece - Có Hộp\r\n\r\nChiếu Cao :60cm\r\n\r\nTrọng Lượng : 12000Gram\r\n\r\nPhụ kiện đi kèm : củ sạc led\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Luffy\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(171, 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 35000000, 0, 'z4760077779118.jpg', 100, 0, 0, 0, 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg', 'Hàng Order - Zoro wano tỉ lệ 1:1 - Cao 2m2 - nặng 100kg\r\n\r\nChiếu Cao : 2m2\r\n\r\nTrọng Lượng : 100kg\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có xốp\r\n\r\nNhân vật : Zoro\r\n\r\nFIGURE ANIME : One Piece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(172, 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu', 390000, 0, 'z4774160120774.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu - Cao 50cm - rộng 26cm - nặng 3kg - Phụ Kiện : 5 đầu thay thế + Đế - BOX bìa Cator - Figure OnePiece - Có Hộp', 'Mô Hình OnePiece Zoro enma dáng đứng siêu ngầu - Cao 50cm - rộng 26cm - nặng 3kg - Phụ Kiện : 5 đầu thay thế + Đế - BOX bìa Cator - Figure OnePiece - Có Hộp\r\n\r\nChiếu Cao : 50cm\r\n\r\nTrọng Lượng : 3000Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : ZORO\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(173, 'Mô Hình OnePiece ACE và Yamato đại chiến', 499000, 0, 'o1cn012eofot1rmhkpldnez.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 khay rượu + 1 giấy sinh tử , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece ACE và Yamato đại chiến - Cao 29cm - nặng 2kg5 - Phụ kiện : 2 đầu ACE thay thế + 1 khay rượu + 1 giấy sinh tử , Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 29cm\r\n\r\nTrọng Lượng : 2500Gram\r\n\r\nPhụ kiện đi kèm : Có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : ACE YAMATO\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(174, 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp', 759000, 0, 'z4760423177401.jpg', 100, 0, 0, 0, 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện : Trùy Gai - Figure OnePiece - Có Hộp', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng lai rồng dáng đứng siêu đẹp Cao 33cm - nặng 4kg - Phụ kiện : Trùy Gai - Figure OnePiece - Có Hộp\r\n\r\nChiếu Cao : 33cm\r\n\r\nTrọng Lượng : 4000Gram\r\n\r\nPhụ kiện đi kèm : Có \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : KAIDO\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(175, 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido', 369000, 0, 'z4736704794268.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece Luffy Gear 4 đại chiến Kaido - Cao 26cm - rộng 20cm - nặng 2kg2 , Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 26cm\r\n\r\nTrọng Lượng : 2200Gram\r\n\r\nPhụ kiện đi kèm : Có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : LUFFY \r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(176, 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét', 669000, 0, 'z4665926866321.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu thay thế + 1 bán thân , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece Luffy gear 5 tay to cầm sét - Cao 33cm - rộng 23cm - nặng 1kg7 - Phục kiện : 3 đầu thay thế + 1 bán thân , Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 33cm\r\n\r\nTrọng Lượng : 1700Gram\r\n\r\nPhụ kiện đi kèm : Có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : LUFFY \r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(177, 'Mô Hình OnePiece ACE đại chiến Yamato', 155000, 0, 'z4761801601565.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece ACE đại chiến Yamato - Cao 12cm - nặng 160gram - Phụ Kiện : Đế + chùy gai + lửa , Figure OnePiece - bọc túi opp - có hộp màu', 'Mô Hình OnePiece ACE đại chiến Yamato - Cao 12cm - nặng 160gram - Phụ Kiện : Đế + chùy gai + lửa , Figure OnePiece - bọc túi opp - có hộp màu\r\n\r\nChiếu Cao : 12cm\r\n\r\nTrọng Lượng : 160Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : bọc túi opp - có hộp màu\r\n\r\nNhân vật : ACE YAMATO\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(178, 'Mô Hình OnePiece Shank tóc đỏ chiến đấu', 279000, 0, 'z4734069985425.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Haki , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece Shank tóc đỏ chiến đấu - Cao 16cm - rộng 28cm - nặng 330gram - Phụ Kiện : Kiếm + Haki , Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 16cm\r\n\r\nTrọng Lượng : 330Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : shanks\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(179, 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu', 319000, 0, 'z4695903950580.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu Cao 31cm - nặng 950gram - Phụ kiện đi kèm : 1 tay to + 1 tay haki cầm sét + 1 tay lửa + 1 thanh kim loại , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece Luffy nika gear 5 trạng thái chiến đấu siêu ngầu Cao 31cm - nặng 950gram - Phụ kiện đi kèm : 1 tay to + 1 tay haki cầm sét + 1 tay lửa + 1 thanh kim loại , Figure OnePiece - có vỏ hộp màu', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(180, 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama', 319000, 0, 'z4695929506558.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện : 3 tay thay thế, Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece Luffy nika gear 5 ngồi ghế Im sama - Cao 31cm - rộng 14cm - nặng 940gram - Phụ kiện : 3 tay thay thế, Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 31cm\r\n\r\nTrọng Lượng : 940Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : LUFFY \r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(181, 'Mô Hình OnePiece Luffy gear 5 siêu ngầu', 209000, 0, 'z4683328487826.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece Luffy gear 5 siêu ngầu - Cao 25cm - rộng 18cm - nặng 800gram , Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 25cm\r\n\r\nTrọng Lượng : 800Gram\r\n\r\nPhụ kiện đi kèm : Có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : LUFFY \r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(182, 'Mô Hình OnePiece Luffy gear 5 tay cầm sét chiến đấu', 165000, 0, 'z4713175845927.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi kèm : 1 đảo đầu lâu trên mặt trăng có LED + 1 tay thay thế + 1 sét cầm tay , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece Luffy gear 5 tcầm sét chiến đấu - Cao 26cm - rộng 22cm - nặng 880gram - Phụ kiện đi kèm : 1 đảo đầu lâu trên mặt trăng có LED + 1 tay thay thế + 1 sét cầm tay , Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 26cm\r\n\r\nTrọng Lượng : 880Gram\r\n\r\nPhụ kiện đi kèm : Có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : LUFFY \r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(183, 'Mô Hình OnePiece Zoro đẫm máu chiến đấu', 369000, 0, 'z4604185159873.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm gồm có 1 kiếm + 2 đầu thay thế - Figure OnePiece - Có Hộp', 'Mô Hình OnePiece Zoro đẫm máu chiến đấu - Cao 31cm - nặng 1kg5 + Box Bìa - hộp xốp + Phụ kiện đi kèm gồm có 1 kiếm + 2 đầu thay thế - Figure OnePiece - Có Hộp\r\n\r\nChiếu Cao : 31cm\r\n\r\nTrọng Lượng : 1500Gram\r\n\r\nPhụ kiện đi kèm : 1 kiếm + 2 đầu\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : ZORO\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(184, 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg', 1899000, 0, 'z4665609297998.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Box Bìa + hộp xốp- Figure OnePiece - Có Hộp', 'Mô Hình OnePiece Zoro enma - Cao 73cm - nặng 10kg - Phụ kiện : 2 kiếm + 2 đầu nam châm + 1 haki + Box Bìa + hộp xốp- Figure OnePiece - Có Hộp\r\n\r\nChiếu Cao : 73cm\r\n\r\nTrọng Lượng : 10000Gram\r\n\r\nPhụ kiện đi kèm : 2 kiếm + 2 đầu + haki\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : ZORO\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(185, 'Mô Hình OnePieceLuffy gear 5 tay To', 379000, 0, 'o1cn01cbvqb41rmhkhohpba.jpg', 100, 0, 0, 0, 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePieceLuffy gear 5 tay To - Cao 31cm - nặng 1kg3 , Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 31cm\r\n\r\nTrọng Lượng : 1300Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : LUFFY \r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(186, 'Mô Hình OnePiece Luffy gear 3 red Rock', 379000, 0, 'o1cn01ctmf0s1rmhka9clh4.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece Luffy gear 3 red Rock - Cao 26cm - nặng 1kg5 , Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 26cm\r\n\r\nTrọng Lượng : 1500Gram\r\n\r\nPhụ kiện đi kèm : không\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : LUFFY \r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7);
INSERT INTO `product` (`id`, `name`, `price`, `promotion`, `img`, `qty`, `views`, `love`, `purchases`, `short_detail`, `description`, `is_special`, `is_trending`, `is_feature`, `is_upcomming`, `create_date`, `update_date`, `id_category`) VALUES
(187, 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp', 929000, 0, 'z4511803759004.jpg', 100, 0, 0, 0, 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đi kèm Haki + chùy + nam châm đính kèm - Figure OnePiece - Có Hộp', 'Hàng Loại 1 - Mô Hình OnePiece Kaido dạng rồng siêu đẹp Cao 51cm - rộng 41cm - nặng 5kg + phụ kiện đi kèm Haki + chùy + nam châm đính kèm - Figure OnePiece - Có Hộp \r\n\r\nChiếu Cao : 51cm\r\n\r\nTrọng Lượng : 5000Gram\r\n\r\nPhụ kiện đi kèm : Có \r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : KAIDO\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(188, 'Mô Hình OnePiece Zoro máy móc', 684000, 0, 'z4514727547801.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePiece - Có Hộp', 'Mô Hình OnePiece Zoro máy móc - Cao 43 - rộng 28 - nặng 2kg8 + Có 1 bán thân + Có LED - Figure OnePiece - Có Hộp\r\n\r\nChiếu Cao : 43cm\r\n\r\nTrọng Lượng : 2800Gram\r\n\r\nPhụ kiện đi kèm : 1 bán thân\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : ZORO\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(189, 'Mô Hình OnePiece Zoro và những bại tướng', 329000, 0, 'z4537221775977.jpg', 100, 0, 0, 0, 'Mô Hình OnePiece Zoro và những bại tướng - Cao 23cm - nặng 1kg7 - FULL BOX - phụ kiện có 2 đầu + 4 kiếm , Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePiece Zoro và những bại tướng - Cao 23cm - nặng 1kg7 - FULL BOX - phụ kiện có 2 đầu + 4 kiếm , Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 23cm\r\n\r\nTrọng Lượng : 1700Gram\r\n\r\nPhụ kiện đi kèm : có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : Zoro\r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7),
(190, 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu', 412000, 0, 'z4619435016425.jpg', 100, 0, 0, 0, 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đinh ba + 1 đâu rồng gắn ghế Figure OnePiece - có vỏ hộp màu', 'Mô Hình OnePieceLuffy Ngồi ghế siêu ngầu - Cao 34cm - nặng 2kg5 + FULL BOX + Phụ Kiện Đi kèm : 1 đinh ba + 1 đâu rồng gắn ghế Figure OnePiece - có vỏ hộp màu\r\n\r\nChiếu Cao : 34cm\r\n\r\nTrọng Lượng : 2500Gram\r\n\r\nPhụ kiện đi kèm : Có\r\n\r\nChất liệu : Nhựa PVC cao cấp \r\n\r\nVỏ hộp kèm sản phẩm : Có Hộp màu\r\n\r\nNhân vật : LUFFY \r\n\r\nFIGURE ANIME : OnePiece', 0, 0, 0, 0, '0000-00-00', '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0 COMMENT '0: user, 2023: admin',
  `username` varchar(255) NOT NULL,
  `password` varchar(12) NOT NULL,
  `bio` varchar(1024) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: default, 1: active',
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `password`, `bio`, `img`, `active`, `email`, `fullname`, `phone`, `create_date`) VALUES
(1, 0, 'admin123aaaaa', 'admin123', 'Đây là một admin thích đi ngủ ', 'profile.jpg', 0, 'admin123@gmail.com', 'BOSS COFFEEaaaa', '19001220', '2023-11-14 20:03:59'),
(6, 0, 'admin123', 'admin123', 'asdasdsa', 'profile.jpg', 0, 'vohongson8520@gmail.com', 'Vo Hong Son', '0766116989', '2023-11-16 21:49:48'),
(7, 0, 'admin1234', 'admin123', 'asdasdsa', 'aaa - Copy(7).jpg', 0, 'vohongson8520@gmail.com', 'Vo Hong Son', '0766116989', '2023-11-16 21:51:43'),
(9, 0, 'ChuBe044', 'Son12345', 'asdsadsa', 'aaa - Copy(8).jpg', 0, 'vohongson8520@gmail.com', 'Vo Hong Son', '0766116989', '2023-11-17 01:15:04'),
(10, 0, 'ChuBe044', 'admin123', '', 'aaa - Copy(10).jpg', 0, 'vohongson8520@gmail.com', 'Vo Hong Son', '0766116989', '2023-11-17 01:15:27'),
(11, 2023, 'admin1', 'password', 'Admin 1', NULL, 1, 'admin1@example.com', NULL, NULL, '2023-11-21 07:02:05'),
(12, 2023, 'admin2', 'password', 'Admin 2', NULL, 1, 'admin2@example.com', NULL, NULL, '2023-11-21 07:02:05'),
(13, 2023, 'admin3', 'password', 'Admin 3', NULL, 1, 'admin3@example.com', NULL, NULL, '2023-11-21 07:02:05'),
(14, 2023, 'admin4', 'password', 'Admin 4', NULL, 1, 'admin4@example.com', NULL, NULL, '2023-11-21 07:02:05'),
(15, 2023, 'admin5', 'password', 'Admin 5', NULL, 1, 'admin5@example.com', NULL, NULL, '2023-11-21 07:02:05'),
(16, 0, 'user1', 'password1', 'Bio user 1', NULL, 1, 'user1@example.com', 'Nguyễn Văn A', '1234567800', '2023-11-21 07:06:54'),
(17, 0, 'user2', 'password2', 'Bio user 2', NULL, 1, 'user2@example.com', 'Trần Thị B', '1234567801', '2023-11-21 07:06:54'),
(18, 0, 'user3', 'password3', 'Bio user 3', NULL, 1, 'user3@example.com', 'Trần Thị C', '1334567801', '2023-11-21 07:06:54'),
(19, 0, 'user4', 'password4', 'Bio user 4', NULL, 1, 'user4@example.com', 'Trần Thị D', '1434567801', '2023-11-21 07:06:54'),
(20, 0, 'user5', 'password5', 'Bio user 5', NULL, 1, 'user5@example.com', 'Trần Thị E', '1534567801', '2023-11-21 07:06:54'),
(21, 0, 'user6', 'password6', 'Bio user 6', NULL, 1, 'user6@example.com', 'Trần Thị F', '1634667801', '2023-11-21 07:06:54'),
(22, 0, 'user7', 'password7', 'Bio user 7', NULL, 1, 'user7@example.com', 'Trần Thị G', '1734767801', '2023-11-21 07:06:54'),
(23, 0, 'user8', 'password8', 'Bio user 8', NULL, 1, 'user8@example.com', 'Trần Thị J', '1834867801', '2023-11-21 07:06:54'),
(24, 0, 'user9', 'password9', 'Bio user 9', NULL, 1, 'user9@example.com', 'Trần Thị Q', '1934967801', '2023-11-21 07:06:54'),
(25, 0, 'user10', 'password10', 'Bio user 10', NULL, 1, 'user10@example.com', 'Trần Thị P', '110341067801', '2023-11-21 07:06:54'),
(26, 0, 'user10', 'password10', 'Bio user 10', NULL, 1, 'user10@example.com', 'Trần Thị W', '110341067801', '2023-11-21 07:06:54'),
(27, 0, 'user11', 'password11', 'Bio user 11', NULL, 1, 'user11@example.com', 'Trần Thị E', '111341167801', '2023-11-21 07:06:54'),
(28, 0, 'user12', 'password12', 'Bio user 12', NULL, 1, 'user12@example.com', 'Trần Thị R', '112341267801', '2023-11-21 07:06:54'),
(29, 0, 'user13', 'password13', 'Bio user 13', NULL, 1, 'user13@example.com', 'Trần Thị B', '113341367801', '2023-11-21 07:06:54'),
(30, 0, 'user14', 'password14', 'Bio user 14', NULL, 1, 'user14@example.com', 'Trần Thị S', '114341467801', '2023-11-21 07:06:54'),
(31, 0, 'user15', 'password15', 'Bio user 15', NULL, 1, 'user15@example.com', 'Trần Thị D', '115341567801', '2023-11-21 07:06:54'),
(32, 0, 'user95', 'password95', 'Bio user 95', NULL, 1, 'user95@example.com', 'Lê Hoàng C', '1534567894', '2023-11-21 07:06:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_user` (`id_user`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`id_user`),
  ADD KEY `fk_bill_coupon` (`id_coupon`),
  ADD KEY `fk_bill_shipping` (`id_shipping`),
  ADD KEY `fk_bill_payment` (`id_payment`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog-comment_user` (`id_user`),
  ADD KEY `fk_blog-comment_blog` (`id_blog`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_user` (`id_user`),
  ADD KEY `fk_comment_product` (`id_product`);

--
-- Chỉ mục cho bảng `comment_img`
--
ALTER TABLE `comment_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comment-img_comment` (`id_comment`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_images_product` (`id_product`);

--
-- Chỉ mục cho bảng `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`id_category`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `comment_img`
--
ALTER TABLE `comment_img`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=858;

--
-- AUTO_INCREMENT cho bảng `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `blog_comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `blog_comment_ibfk_2` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `comment_img`
--
ALTER TABLE `comment_img`
  ADD CONSTRAINT `comment_img_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
