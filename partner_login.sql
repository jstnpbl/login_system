-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 01:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pabale`
--

-- --------------------------------------------------------

--
-- Table structure for table `decrypted_users`
--

CREATE TABLE `decrypted_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decrypted_users`
--

INSERT INTO `decrypted_users` (`id`, `username`, `password`) VALUES
(1, 'justin', 'pabale'),
(2, 'justin', 'pabale'),
(3, 'lance', 'pabale'),
(4, 'lance', 'pabale'),
(5, 'lance', 'pabale'),
(6, 'lance', 'pabale'),
(7, 'lance', 'pabale'),
(8, 'lance', 'pabale'),
(9, 'lance', 'pabale'),
(10, 'jacee', 'pabale'),
(11, 'kim ', 'baterina'),
(12, '123', '456'),
(13, 'mark', '123'),
(14, 'test1', '123'),
(15, 'test1', '123'),
(16, 'iphone', '123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(2, 'jv1NQ1bCkwd/LW5r6BCfHvd9BvYEOT9OyDY9pHuhTrE=', 'LNuet0NpAQR+p8WXULUer7FPg9Crq0U7nVklFl/3OuA=', 'approved'),
(3, 'Uga28di4yYHuoscGWM4Tt5cbW4hvMkAnX9HUK5Spiac=', 'RHIyEXjn1hzEYwgDmt5wFvV5MoYtzHtIx0ge5RnnL34=', 'approved'),
(4, 'TVPM4gPVftFFitzlXfbzGA39jLq48e+gWVK+u9JVD+k=', 'Y47gFCdGXfqjulDUVmAcFBJIJBDtAPgdn7AB5rw6s08=', 'approved'),
(5, 'G+PHE7RBn2owY3t+NMhqde+XPQMMZEOxxX69Yh1ocfY=', 'XnFjg2OnDB81NtrqsKRf5DoZjp2SnPCToziqGN0lbhs=', 'approved'),
(6, 'OBPmGXLNc4Yx0ch2/jIz0Nwz3akQClKnvnSzwlYWPXY=', 'xyqDGtaNeOU34TPtsW9a19bct6fGsv3O/fhuSy+bvZA=', 'approved'),
(7, '0WlY0jJp4LVJQk6Xiiv+AF/GRSTG+Llro+mhKth1iC0=', '0oecYL26n/gMpGaw8KmL0UFgNG5C4fhi0R6M+WvuZrM=', 'approved'),
(8, 'mRx47hHi0Ctqdw9qXbGl0LbaUf1G58UpuvhUVb31lbI=', '14AkHWucc30++R6pox+jj+ZZ9bNQwVniu7SKuylsObI=', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `decrypted_users`
--
ALTER TABLE `decrypted_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decrypted_users`
--
ALTER TABLE `decrypted_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
