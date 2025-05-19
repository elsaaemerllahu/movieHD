-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 10:49 PM
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
-- Database: `moviehd`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie_reviews`
--

CREATE TABLE `movie_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_reviews`
--

INSERT INTO `movie_reviews` (`id`, `user_id`, `movie_id`, `rating`, `comment`, `created_at`) VALUES
(1, 8, 950387, 3, NULL, '2025-05-18 11:23:37'),
(2, 8, 950387, NULL, 'jj', '2025-05-18 11:07:13'),
(3, 8, 950387, NULL, 'ijfuoedn', '2025-05-18 11:07:19'),
(4, 8, 950387, NULL, 'kk', '2025-05-18 11:11:26'),
(5, 8, 1323784, 5, NULL, '2025-05-18 11:11:52'),
(6, 8, 1323784, NULL, ',d ,', '2025-05-18 11:11:52'),
(7, 8, 950387, 2, 'dee', '2025-05-18 11:20:11'),
(8, 8, 950387, 4, 'dfghyt', '2025-05-18 11:20:18'),
(9, 7, 950387, 2, 'good', '2025-05-18 11:24:12'),
(10, 8, 447273, 5, 'hi', '2025-05-18 11:31:53'),
(11, 10, 950387, 1, 'bad', '2025-05-18 11:58:56'),
(12, 10, 950387, 4, NULL, '2025-05-18 11:59:06'),
(0, 4, 447273, 3, NULL, '2025-05-19 20:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `email`) VALUES
(4, 'elsa', '$2y$10$1W87vkRoQ3KzgTOxfC4/r.updlsH7GX4UcHFVdrtc/4hJjU5AcYKS', 'admin', 'elsa@gmail.com'),
(6, 'erda', '$2y$10$RF9ldn/GB103veti29QHK.zgy5wJbJwL5qcVDMyfDNQDfqjE.MyOW', 'user', 'erda@gmail.com'),
(7, 'ronab', '$2y$10$hVdhFt1.bklbpQn1fdfKB.9/ncXHwLYUQhWNCoNIifbUZsnSEPP4K', 'admin', 'ronabeqiri@gmail.com'),
(8, 'gazi', '$2y$10$mCOIAw1fbFoI9/E9Xts4GeS1BdhjqNpTnWpvRrUWWg6WIWVHNXftK', 'user', 'gazi@gmail.com'),
(10, 'elsa123', '$argon2id$v=19$m=65536,t=4,p=1$QWx3Q2MvOHdpdXB0b2o3MA$e53Wdb244r468DJtEAmtvzavVLtGrOsBPE8nrlhTLUk', 'user', 'elsa12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `watched_movies`
--

CREATE TABLE `watched_movies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(255) DEFAULT NULL,
  `movie_poster` varchar(255) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watched_movies`
--

INSERT INTO `watched_movies` (`id`, `user_id`, `movie_id`, `movie_title`, `movie_poster`, `added_at`) VALUES
(7, 4, 1241982, 'Moana 2', 'https://image.tmdb.org/t/p/w500/aLVkiINlIeCkcZIzb7XHzPYgO6L.jpg', '2025-05-16 19:29:27'),
(10, 4, 1323784, 'Bad Influence', 'https://image.tmdb.org/t/p/w500/ghhooCOqQDqC6vhS1SVN2tCE0k8.jpg', '2025-05-16 19:52:09'),
(11, 4, 1359977, 'Conjuring the Cult', 'https://image.tmdb.org/t/p/w500/t4MiAeYpjL7saYvqvcn9xtOfA4K.jpg', '2025-05-16 19:52:41'),
(12, 4, 897160, 'Brave Citizen', 'https://image.tmdb.org/t/p/w500/6Ea5i6APeTfm4hHh6dg5Z733JVS.jpg', '2025-05-16 20:07:20'),
(15, 4, 447273, 'Snow White', 'https://image.tmdb.org/t/p/w500/oLxWocqheC8XbXbxqJ3x422j9PW.jpg', '2025-05-19 09:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `poster_path` varchar(255) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `release_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `user_id`, `movie_id`, `title`, `poster_path`, `genre`, `release_date`) VALUES
(4, 8, 1241982, 'Moana 2', '/aLVkiINlIeCkcZIzb7XHzPYgO6L.jpg', 'Animation, Adventure, Family, Comedy', '2024-11-21'),
(5, 8, 1094473, 'Bambi: A Life in the Woods', '/vWNVHtwOhcoOEUSrY1iHRGbgH8O.jpg', 'Adventure, Family', '2024-10-16'),
(7, 8, 897160, 'Brave Citizen', '/6Ea5i6APeTfm4hHh6dg5Z733JVS.jpg', 'Action, Drama, Comedy', '2023-10-25'),
(8, 8, 1447386, 'Mine!', '/cJOAQyDk2xcaLohJwaf5RNJI1Ck.jpg', 'Animation', '2025-03-08'),
(13, 9, 1197306, 'A Working Man', '/6FRFIogh3zFnVWn7Z6zcYnIbRcX.jpg', 'Action, Crime, Thriller', '2025-03-26'),
(14, 7, 1359977, 'Conjuring the Cult', '/t4MiAeYpjL7saYvqvcn9xtOfA4K.jpg', 'Horror, Drama', '2024-10-01'),
(16, 8, 447273, 'Snow White', '/oLxWocqheC8XbXbxqJ3x422j9PW.jpg', 'Family, Fantasy', '2025-03-12'),
(17, 10, 1094473, 'Bambi: A Life in the Woods', '/vWNVHtwOhcoOEUSrY1iHRGbgH8O.jpg', 'Adventure, Family', '2024-10-16'),
(0, 4, 447273, 'Snow White', '/oLxWocqheC8XbXbxqJ3x422j9PW.jpg', 'Family, Fantasy', '2025-03-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie_reviews`
--
ALTER TABLE `movie_reviews`
  ADD KEY `movie_reviews_ibfk_1` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watched_movies`
--
ALTER TABLE `watched_movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `watched_movies`
--
ALTER TABLE `watched_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_reviews`
--
ALTER TABLE `movie_reviews`
  ADD CONSTRAINT `movie_reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
