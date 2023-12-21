-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 08:11 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `name` varchar(22) DEFAULT NULL,
  `password` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `name`, `password`) VALUES
(2, 'admin', 'admin'),
(25, 'Kiki Kick off', 'Kiki'),
(26, 'manager', 'mamager'),
(27, 'Snoopy', 'Snoopy'),
(28, 'Max', 'Max');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) DEFAULT NULL,
  `money_reality` decimal(10,2) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `pay_way` smallint(6) DEFAULT NULL COMMENT '0=E Pay / 1=Bank Pay / 2 Cash on Delivery',
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `code`, `member_id`, `money`, `admin_id`, `datetime`, `status`, `money_reality`, `address_id`, `pay_way`, `time`) VALUES
(5, '20231201202738', 21, '39.00', NULL, '2023-12-01 12:27:38', 0, '39.00', NULL, 2, '2023-12-01 20:27:38'),
(6, '20231201210103', 5, '829.00', NULL, '2023-12-01 13:01:03', 1, '829.00', 2, 1, '2023-12-01 21:01:03'),
(7, '20231201210759', 5, '39.00', NULL, '2023-12-01 13:07:59', 1, '39.00', 2, 1, '2023-12-01 21:07:59'),
(8, '20231205152059', 6, '829.00', NULL, '2023-12-05 07:20:59', 0, '829.00', NULL, 1, '2023-12-05 15:20:59'),
(9, '20231205152302', 6, '829.00', NULL, '2023-12-05 07:23:02', 0, '829.00', NULL, 1, '2023-12-05 15:23:02'),
(10, '20231205152508', 6, '829.00', NULL, '2023-12-05 07:25:08', 0, '829.00', NULL, 1, '2023-12-05 15:25:08'),
(11, '20231205152540', 6, '829.00', NULL, '2023-12-05 07:25:40', 1, '829.00', NULL, 1, '2023-12-05 15:25:40'),
(12, '20231205152704', 6, '39.00', NULL, '2023-12-05 07:27:04', 1, '39.00', NULL, 1, '2023-12-05 15:27:04'),
(13, '20231214174254', 7, '3153.99', NULL, '2023-12-14 09:42:54', 2, '3153.99', 3, 1, '2023-12-14 17:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `code` varchar(7) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `code`, `name`) VALUES
(1, '01', 'Electronics'),
(2, '02', 'Food'),
(5, '0102', 'Computer'),
(6, '0201', 'Breakfast'),
(8, '0202', 'Cookie'),
(9, '0103', 'Smart Phone'),
(10, '0104', 'Other'),
(11, '0203', 'Fresh'),
(13, '03', 'Daily Supplies'),
(14, '0301', 'Room'),
(15, '0302', 'Kitchen'),
(16, '0204', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT '0',
  `content` varchar(255) DEFAULT NULL COMMENT 'Contents',
  `p_time` datetime DEFAULT NULL COMMENT 'Time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `goods_id`, `member_id`, `content`, `p_time`) VALUES
(1, 8, 2, 'very good', '2021-03-08 22:32:49'),
(2, 8, 3, 'good', '2021-03-10 22:32:49'),
(3, 105, 21, 'fair', '2023-12-01 20:57:35'),
(4, 108, 5, 'love it', '2023-12-01 21:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `cost_detail`
--

CREATE TABLE `cost_detail` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `m_id` int(11) DEFAULT '0',
  `price` decimal(10,2) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cost_detail`
--

INSERT INTO `cost_detail` (`id`, `goods_id`, `m_id`, `price`, `count`, `total`, `bill_id`, `attribute`) VALUES
(1, 1, 0, '249.00', 1, '249.00', 1, 'Small Packaging'),
(2, 9, 0, '109.00', 1, '109.00', 2, 'Large Packaging'),
(3, 10, 0, '123.00', 1, '123.00', 3, 'Large Packaging'),
(4, 2, 0, '189.00', 1, '189.00', 3, 'Large Packaging'),
(5, 8, 4, '1233.00', 1, '1233.00', 4, 'Small Packaging'),
(6, 105, 0, '39.00', 1, '39.00', 5, 'Large Packaging'),
(7, 108, 0, '829.00', 1, '829.00', 6, 'Large Packaging'),
(8, 105, 0, '39.00', 1, '39.00', 7, 'Small Packaging'),
(9, 108, 0, '829.00', 1, '829.00', 8, 'Large Packaging'),
(10, 105, 0, '39.00', 1, '39.00', 12, 'Large Packaging'),
(11, 121, 0, '14.99', 1, '14.99', 13, 'undefined'),
(12, 111, 0, '3139.00', 1, '3139.00', 13, 'Large Packaging');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL COMMENT 'id',
  `m_id` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `item_no` varchar(20) DEFAULT NULL,
  `content` text,
  `category_code` varchar(4) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `num` int(11) DEFAULT '0',
  `datetime` datetime DEFAULT NULL,
  `attr_id` int(11) DEFAULT NULL,
  `clicks` int(11) DEFAULT '0',
  `recommend` smallint(6) DEFAULT NULL,
  `special` smallint(6) DEFAULT NULL,
  `status` smallint(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `m_id`, `title`, `item_no`, `content`, `category_code`, `picture`, `price`, `num`, `datetime`, `attr_id`, `clicks`, `recommend`, `special`, `status`) VALUES
(105, 0, 'Napoleon cake', '02', '<dl style=\"margin: 0px; padding: 0px; line-height: 30px; overflow: hidden;\" microsoft=\"\" yahei\",=\"\" arial;\"=\"\"><span style=\"color:#666666;\">Napoleon cake</span></dl>', '0201', '2023-11-29/6566de14de4f9.jpg', '39.00', 8, '2023-11-29 14:45:40', 31, 10, 1, 0, 0),
(108, 0, 'Shuangli Ren Non stick Pot', '01', '<dl style=\"margin: 0px; padding: 0px; line-height: 30px; overflow: hidden;\" microsoft=\"\" yahei\",=\"\" arial;\"=\"\"><span style=\"color:#666666;\">Shuangli Ren Non stick Pot</span></dl>', '0302', '2023-11-29/6566dc3b2a5b1.jpg', '829.00', 10, '2023-11-29 14:37:47', 31, 7, 1, 1, 0),
(110, 0, 'Shuangli Ren Non stick Pot', '01', '<dl style=\"margin: 0px; padding: 0px; line-height: 30px; overflow: hidden;\" microsoft=\"\" yahei\",=\"\" arial;\"=\"\"><span style=\"color:#666666;\">Shuangli Ren Non stick Pot</span></dl>', '0302', '2023-11-29/6566db118913b.jpg', '839.00', 6, '2023-11-29 14:32:49', 31, 11, 1, 0, 0),
(111, 0, 'RUSHMORE French original imported 14 degree', '02', '<dl style=\"margin: 0px; padding: 0px; line-height: 30px; overflow: hidden;\" microsoft=\"\" yahei\",=\"\" arial;\"=\"\"><span style=\"color:#666666;\">RUSHMORE French original imported 14 degree</span></dl>', '0302', '2023-11-29/6566da3096899.jpg', '3139.00', 9, '2023-11-29 14:29:14', 31, 2, 1, 0, 0),
(112, 0, 'Maggie Xinxin Malaysia imported Kleenex heart Chicken', '01', '<dl style=\"margin: 0px; padding: 0px; line-height: 30px; overflow: hidden;\" microsoft=\"\" yahei\",=\"\" arial;\"=\"\"><br />\r\n<span style=\"color:#666666;\">Maggie Xinxin Malaysia imported Kleenex heart Chicken</span></dl>', '0202', '2023-11-29/6566d62f1ebfa.jpg', '39.00', 0, '2023-11-29 14:11:59', 31, 4, 1, 0, 0),
(113, 0, 'Mumian cream style fabric sofa, small living room', '02', '<dl style=\"margin: 0px; padding: 0px; line-height: 30px; overflow: hidden;\" microsoft=\"\" yahei\",=\"\" arial;\"=\"\"><span style=\"color:#666666;\">Mumian cream style fabric sofa, small living room</span></dl>', '0301', '2023-12-01/6569e17eefb35.jpg', '1659.00', 6, '2023-12-01 21:37:02', 1, 3, 1, 0, 0),
(114, 0, 'Lipo Coconut Flavored Bread Dried 300g/Bag', '03', 'Lipo Coconut Flavored Bread Dried 300g/Bag', '0201', '2023-11-29/6566d6d767a7c.jpg', '16.00', 0, '2023-11-29 14:14:47', 31, 0, 1, 0, 0),
(115, 0, ' Vidda 85V1K-S ', '01', '<dl style=\"margin:0px;padding:0px;line-height:30px;overflow:hidden;color:#666666;font-family:\" microsoft=\"\" yahei\",=\"\" arial;\"=\"\"><div class=\"p-price\" style=\"margin:0px 0px 8px;padding:0px;overflow:hidden;position:relative;line-height:22px;height:22px;width:220px;font-family:tahoma, arial, \" microsoft=\"\" yahei\",=\"\" \"hiragino=\"\" sans=\"\" gb\",=\"\" u5b8bu4f53,=\"\" sans-serif;\"=\"\"><span class=\"J_100067347828\" data-presale=\"0\" data-yuyue=\"0\" data-yushou=\"0\" data-done=\"1\" stock-done=\"1\" style=\"margin:0px 10px 0px 0px;padding:0px;color:#e4393c;font-family:Verdana;float:left;font-size:20px;\"><span style=\"margin:0px;padding:0px;font-size:16px;\">￥</span><span style=\"margin:0px;padding:0px;\">4699.00</span></span></div>\r\n<div class=\"p-name p-name-type-2\" style=\"margin:0px 0px 8px;padding:0px;overflow:hidden;height:40px;font-family:tahoma, arial, \" microsoft=\"\" yahei\",=\"\" \"hiragino=\"\" sans=\"\" gb\",=\"\" u5b8bu4f53,=\"\" sans-serif;\"=\"\"><a target=\"_blank\" title=\"【12月开门红，品牌钜惠】120Hz高刷高画质大屏活动价不高于4699元！ 购机享180天延保！以旧换新享优惠！晒单享50元E卡！\" href=\"https://item.jd.com/100067347828.html\" style=\"margin:0px;padding:0px;color:#666666;text-decoration-line:none;\"><span style=\"margin:0px;padding:0px;height:20px;line-height:20px;overflow:hidden;transition:height 0.08s ease 0s;\">Vidda 85V1K-S&nbsp;</span></a></div>\r\n</dl>', '0104', '2023-11-29/6566d418db93e.jpg', '4689.00', 0, '2023-11-29 14:05:20', 31, 3, 1, 0, 0),
(116, 0, 'Apple iPhone 15 (A3092) 128GB ', '02', '<h3 style=\"margin:0px 0px 6px;padding:0px;font-size:12px;color:#333333;font-weight:normal;line-height:12px;font-family:\" microsoft=\"\" yahei\";\"=\"\"><div class=\"p-price\" style=\"margin:0px 0px 8px;padding:0px;overflow:hidden;position:relative;line-height:22px;height:22px;width:220px;color:#666666;font-family:tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif;\"><br />\r\n</div>\r\n<div class=\"p-name p-name-type-2\" style=\"margin:0px 0px 8px;padding:0px;overflow:hidden;height:40px;color:#666666;font-family:tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif;\"><a target=\"_blank\" title=\"更多优惠详情请点击：\" href=\"https://item.jd.com/100066896214.html\" style=\"margin:0px;padding:0px;color:#666666;text-decoration-line:none;\"><span style=\"margin:0px;padding:0px;height:20px;line-height:20px;overflow:hidden;transition:height 0.08s ease 0s;\">Apple iPhone 15 (A3092) 128GB&nbsp;</span></a></div>\r\n</h3>', '0103', '2023-11-29/6566d21794337.jpg', '5949.00', 6, '2023-11-29 13:54:31', 1, 6, 1, 0, 0),
(117, 0, ' Apple iPhone 15 Pro Max (A3108) 256GB ', '02', '<dl style=\"margin:0px;padding:0px;line-height:30px;overflow:hidden;color:#666666;font-family:\" microsoft=\"\" yahei\",=\"\" arial;\"=\"\"><div class=\"p-price\" style=\"margin:0px 0px 8px;padding:0px;overflow:hidden;position:relative;line-height:22px;height:22px;width:220px;font-family:tahoma, arial, \" microsoft=\"\" yahei\",=\"\" \"hiragino=\"\" sans=\"\" gb\",=\"\" u5b8bu4f53,=\"\" sans-serif;\"=\"\"><br />\r\n</div>\r\n<div class=\"p-name p-name-type-2\" style=\"margin:0px 0px 8px;padding:0px;overflow:hidden;height:40px;font-family:tahoma, arial, \" microsoft=\"\" yahei\",=\"\" \"hiragino=\"\" sans=\"\" gb\",=\"\" u5b8bu4f53,=\"\" sans-serif;\"=\"\"><a target=\"_blank\" title=\"更多优惠详情请点击：\" href=\"https://item.jd.com/100068388451.html\" style=\"margin:0px;padding:0px;color:#666666;text-decoration-line:none;\"><span style=\"margin:0px;padding:0px;height:20px;line-height:20px;overflow:hidden;transition:height 0.08s ease 0s;\">Apple iPhone 15 Pro Max (A3108) 256GB&nbsp;</span></a></div>\r\n</dl>', '0103', '2023-11-29/6566d1811e608.jpg', '9999.00', 1, '2023-11-29 13:52:10', 1, 2, 1, 0, 0),
(118, 0, '（Apple）MacBook Air13.3', '01', '<div class=\"p-price\" style=\"margin:0px 0px 8px;padding:0px;overflow:hidden;position:relative;line-height:22px;height:22px;width:220px;color:#666666;font-family:tahoma, arial, \" microsoft=\"\" yahei\",=\"\" \"hiragino=\"\" sans=\"\" gb\",=\"\" u5b8bu4f53,=\"\" sans-serif;\"=\"\"><br />\r\n</div>\r\n<div class=\"p-name p-name-type-2\" style=\"margin:0px 0px 8px;padding:0px;overflow:hidden;height:40px;color:#666666;font-family:tahoma, arial, \" microsoft=\"\" yahei\",=\"\" \"hiragino=\"\" sans=\"\" gb\",=\"\" u5b8bu4f53,=\"\" sans-serif;\"=\"\"><a target=\"_blank\" title=\"全新22款MacbookAir13.6英寸，M2八核芯片强势驱动，超长续航，下单赠好礼，\" href=\"https://item.jd.com/10034525548998.html\" style=\"margin:0px;padding:0px;color:#f30213;text-decoration-line:none;\"><span style=\"margin:0px;padding:0px;height:20px;line-height:20px;overflow:hidden;transition:height 0.08s ease 0s;\">（Apple）MacBook Air13.3</span></a></div>', '0102', '2023-11-29/6566d04be0ca3.jpg', '3669.00', 3, '2023-11-29 13:47:00', 1, 1, 1, 0, 0),
(119, 0, 'Apple MacBook Air', '10036', '<span style=\"color:#666666;font-family:Arial, \" microsoft=\"\" yahei\";font-size:16px;font-weight:700;\"=\"\">Apple MacBook Air13.6 8M2 8G 256G SSD&nbsp; MLY33CH/A</span>', '0102', '2023-11-29/6566cf75edea6.jpg', '8199.00', 11, '2023-11-29 13:43:17', 1, 3, 1, 0, 0),
(120, 2, 'Organic Baby Spinach 1Lb', '120', '<p>CEO loves it!</p>\r\n<p>Good for your health.</p>', '0203', '2023-12-14/657acac40f077.jpg', '9.99', 0, '2023-12-14 17:28:36', 0, 0, 0, 0, 0),
(121, 2, 'Wei Lih Instant Noodles 5x90g', '121', 'Best instant noodles!', '0204', '2023-12-14/657aca74240b2.jpg', '14.99', 0, '2023-12-14 17:27:16', 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `goods_attr`
--

CREATE TABLE `goods_attr` (
  `id` int(11) NOT NULL,
  `norms` varchar(255) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods_attr`
--

INSERT INTO `goods_attr` (`id`, `norms`, `content`) VALUES
(1, 'producer', 'Domestic, Imported'),
(31, 'specifications', 'Large Packaging, Small Packaging');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reg_time` datetime DEFAULT NULL,
  `sex` smallint(6) DEFAULT '0',
  `birthday` varchar(20) DEFAULT NULL,
  `role_id` int(1) NOT NULL DEFAULT '0' COMMENT '0=User / 1=Seller / 2=Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `password`, `email`, `phone`, `money`, `reg_time`, `sex`, `birthday`, `role_id`) VALUES
(1, 'member', 'member', 'member@gmail.com', '13698562236', '0.00', NULL, 0, NULL, 2),
(2, 'Faye', 'Faye', 'faye@gmail.com', '12345678765', '0.00', NULL, 0, NULL, 1),
(3, 'aaa', 'aaa', NULL, NULL, '0.00', NULL, 0, NULL, 0),
(4, 'Lilly', 'Lilly', 'Lilly@outlook.com', '13698756536', '0.00', '2021-03-10 00:00:00', 0, NULL, 1),
(5, 'Jim', 'Jim', 'Jim@edu.tw', '13698562236', '0.00', NULL, 0, '', 1),
(6, 'Wang', 'Wang', 'Wang@corp.com', '123', '0.00', NULL, 0, NULL, 0),
(7, 'user', 'user', 'user@gmail.com', '2041233344', '0.00', NULL, 0, NULL, 0),
(8, 'user2', '123', 'user2@gmail.com', '', '0.00', NULL, 0, '2000-01-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mem_address`
--

CREATE TABLE `mem_address` (
  `id` int(11) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `postalcode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mem_address`
--

INSERT INTO `mem_address` (`id`, `member_id`, `phone`, `tel`, `postalcode`, `city`, `address`, `name`) VALUES
(1, 2, '13698562236', '', 'R2G E7H', 'Brandon', '123 Main St', 'Faye Lin'),
(2, 5, '2550099447', '2550099448', 'E1B T8D', 'Winnipeg', '99 Airport Rd', 'Jim Muller'),
(3, 7, '1234567890', '', NULL, '', '', 'Amber Kim');

-- --------------------------------------------------------

--
-- Table structure for table `mem_cart`
--

CREATE TABLE `mem_cart` (
  `id` int(11) NOT NULL,
  `goods_id` int(20) DEFAULT NULL,
  `count` int(20) DEFAULT NULL,
  `attribute` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mem_cart`
--

INSERT INTO `mem_cart` (`id`, `goods_id`, `count`, `attribute`, `member_id`) VALUES
(1, NULL, NULL, NULL, 1),
(10, NULL, NULL, NULL, 21),
(11, NULL, NULL, NULL, 21),
(12, 115, 1, 'Small Packaging', 21),
(34, NULL, NULL, NULL, 6),
(35, 110, 1, ' Small Packaging', 6),
(36, NULL, NULL, NULL, 7),
(37, NULL, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `mem_collect`
--

CREATE TABLE `mem_collect` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_collect`
--

INSERT INTO `mem_collect` (`id`, `goods_id`, `member_id`) VALUES
(1, 1, 21),
(2, 110, 6),
(3, 108, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_detail`
--
ALTER TABLE `cost_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_attr`
--
ALTER TABLE `goods_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mem_address`
--
ALTER TABLE `mem_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mem_cart`
--
ALTER TABLE `mem_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mem_collect`
--
ALTER TABLE `mem_collect`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cost_detail`
--
ALTER TABLE `cost_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `goods_attr`
--
ALTER TABLE `goods_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mem_address`
--
ALTER TABLE `mem_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mem_cart`
--
ALTER TABLE `mem_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `mem_collect`
--
ALTER TABLE `mem_collect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
