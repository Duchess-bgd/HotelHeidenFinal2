-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 09:07 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `mailing_list`
--

CREATE TABLE `mailing_list` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailing_list`
--

INSERT INTO `mailing_list` (`id`, `mail`, `delete`) VALUES
(14, 'hallorann@yahoo.com', 0),
(15, 'ullman@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `guests` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_id`, `guests`, `check_in`, `check_out`, `price`, `user_id`, `rate`) VALUES
(13, 103, 1, '2019-12-12', '2019-12-15', '899.97', 10, 0),
(14, 101, 3, '2019-12-27', '2020-01-02', '2159.89', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_info_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_info_id`, `description`, `price`) VALUES
(101, 1, 'city view', '199.99'),
(102, 2, 'pool view', '249.99'),
(103, 3, 'pool view', '299.99'),
(201, 1, 'pool view', '199.99'),
(202, 2, 'city view', '249.99'),
(203, 3, 'city view', '299.99'),
(301, 1, 'city view', '199.99'),
(302, 2, 'pool view', '249.99'),
(303, 3, 'pool view', '299.99');

-- --------------------------------------------------------

--
-- Table structure for table `room_imgs`
--

CREATE TABLE `room_imgs` (
  `id` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_info_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_imgs`
--

INSERT INTO `room_imgs` (`id`, `img`, `room_info_id`) VALUES
(1, 's1.jpg', 1),
(2, 's2.jpg', 1),
(3, 's3.jpg', 1),
(4, 's4.jpg', 1),
(5, 's5.jpg', 1),
(6, 's6.jpg', 1),
(7, 'd1.jpg', 2),
(8, 'd2.jpg', 2),
(9, 'd3.jpg', 2),
(10, 'd4.jpg', 2),
(11, 'd5.jpg', 2),
(12, 'd6.jpg', 2),
(13, 'a1.jpg', 3),
(14, 'a2.jpg', 3),
(15, 'a3.jpg', 3),
(16, 'a4.jpg', 3),
(17, 'a5.jpg', 3),
(18, 'a6.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`id`, `type`, `description`) VALUES
(1, 'Standard', 'The Standard Room comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk &amp; Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony. ... Smoking rooms &amp; inter-connecting rooms are also available. A standard room comes in the category of the hotel’s cheapest room. It is a type of single room, which has a king-size bed, or as two beds — this room is decorated with two queen-size beds. A standard room includes all kinds of basic facilities such as a table, chair, desk, cupboard, dressing table, DVD player, television, telephone, coffee maker and a private bathroom. Offerings other amenities in the standard room also depend on the type of hotel. For the example, two-star hotels can provide slightly more than the basics. The standard rooms of a five-star hotel include flat-screen TVs, separate bars, expensive bath tubs and designer interior decoration in the room. A?'),
(2, 'Deluxe', 'As the name describes Deluxe, in this room view, location, advanced furnishings, decorations and shapes are deluxe in every way. Some hotels include additional amenities in these rooms such as a large writing desk, flattering flowers, upgraded bathroom and beautiful bathrobes. This room maximum comes in 4- and 5-star categories. Their facilities also depend on the types of hotels. Each and every facility of a deluxe room, you can take in the hotel in bhedaghat Jabalpur. This room is designed to accommodate the families and family members. Some hotels provide family rooms with three or more beds. This one can accommodate three queen-size beds in a room, therefore it is also known as a triple room. Family rooms also provide spacious seating areas, which are doubled as a sleeping place, when the sofa exists on the bed. Some hotels offer bunk beds for the children. Family rooms are more commonly found in suits because they can accommodate many beds. There are maximum numbers of family rooms provided by the marvelous hotel in bhedaghat. '),
(3, 'Apartment', 'When staying in a Apartment you can look forward to a nice and quiet start to the day with our special Executive Breakfast on the 11th floor - free of charge*. Suite with VIP package.The Suites at Tivoli Hotel are all situated on the top floors and offers a magnificent panorama view of either the city of Copenhagen or Islands Brygge through the huge floor-to-ceiling windows. The Suites are each 40m2 with enough room for a King-size bed, separate sofa area, guest toilet and on request a dining table and a bubble bath.The VIP package treats you with a bottle of champagne upon arrival, a wellness gift set and 16 gourmet chocolates in a box. The Suites are perfect for a romantic weekend together. Bathrobes, slippers and mineral water & snacks await you upon arrival. With a Suite, you will also have access to our Executive Lounge, where you can enjoy a cup of coffee, croissants, fruit, juice etc all day long.When staying in a Suite you can look forward to a nice and quiet start to the day with our special Executive Breakfast on the 11th floor - free of charge*.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `personal_id`, `address`, `city`, `country`, `pass`, `email`, `tel`, `user_type`) VALUES
(9, 'Stephen ', 'King', '21091947', '29 Neibolt Street', 'Portland', 'Maine', 'k', 'king@k.k', '5555327', 1),
(10, 'Stanley ', 'Kubrick', '26071928', 'Harpenden street', 'Harpenden', 'England UK', 's', 's@s.s', '5555963', 0),
(13, 'Jack', 'Torrance', '1980217', 'Overlook Hotel', 'Clackamas County', 'Oregon', 't', 'jt@t.t', '237217', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mailing_list`
--
ALTER TABLE `mailing_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_imgs`
--
ALTER TABLE `room_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mailing_list`
--
ALTER TABLE `mailing_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room_imgs`
--
ALTER TABLE `room_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
