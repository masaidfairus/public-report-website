-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2024 at 04:27 AM
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
-- Database: `e-report`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('ADDED','PENDING','DONE') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `title`, `description`, `status`, `created_at`) VALUES
(7, 1, 'Laporan Terpanjang', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet sem finibus, fringilla tortor id, interdum libero. Nulla lacinia placerat justo a faucibus. Nam egestas, nisl at pharetra facilisis, libero ex dapibus odio, sed condimentum enim lacus quis turpis. Cras eget dolor a augue sodales cursus at nec enim. Morbi viverra fringilla porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fringilla ut libero non sagittis. Nullam consequat purus justo. In quis nibh sem. Praesent id tincidunt ex.\r\n\r\nProin at posuere elit. Donec urna mi, fringilla at iaculis quis, auctor pulvinar massa. In pretium mi non luctus ornare. Maecenas libero sem, ultrices at ultricies sit amet, consequat ullamcorper neque. Donec a diam mauris. Phasellus sed urna vel tellus vehicula vehicula vel id lorem. Vivamus blandit vestibulum dictum. Suspendisse molestie euismod dolor id tincidunt.\r\n\r\nNulla facilisi. Integer suscipit vel turpis in dignissim. Fusce efficitur gravida sagittis. Aenean nec massa ullamcorper, lacinia ante vel, mattis ligula. Nullam molestie urna ut magna sollicitudin, sit amet pellentesque dui semper. Nam ac nulla eu libero ultricies porta in eu augue. Quisque consequat turpis vitae faucibus pulvinar. Phasellus et elit vel magna commodo accumsan. Pellentesque suscipit velit blandit sem accumsan lobortis. Nulla at iaculis ante. Vestibulum gravida metus vitae risus interdum dictum. Suspendisse facilisis, ante sit amet elementum ullamcorper, est risus faucibus ex, at ultrices eros purus sed mi. Mauris interdum placerat enim non finibus. Integer eget rutrum eros. Aliquam lacinia ex quis tristique volutpat.\r\n\r\nMaecenas consequat mauris nec malesuada venenatis. Pellentesque consequat finibus sapien, malesuada dignissim mauris aliquet vel. Morbi imperdiet, orci vitae malesuada rutrum, sapien dui gravida est, vitae tincidunt neque ante at ligula. Suspendisse ut vehicula risus. Praesent at nisi id ante maximus placerat et et velit. Ut euismod purus sit amet sapien convallis fringilla. Ut maximus nibh id volutpat varius. Nunc vestibulum gravida dolor sed vestibulum. Phasellus vel diam quis enim iaculis tempus. Nunc nec orci eu mi pharetra euismod. Nullam lacinia tortor et enim consequat, ut vestibulum quam luctus. Nunc sed varius risus. Integer et euismod enim. Cras nec dolor a lacus tristique cursus vel vitae lacus. Vivamus vitae hendrerit sapien. Vivamus tincidunt purus sit amet dolor porttitor, eu aliquam lacus fringilla.\r\n\r\nVivamus vehicula id justo sed fermentum. Donec quis suscipit eros, molestie lobortis ligula. Duis sed tincidunt lorem, pulvinar egestas metus. Phasellus nec aliquet mi, ac vehicula elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget consectetur risus, id porta ligula. Sed sollicitudin, quam nec pharetra accumsan, nisi nisi vulputate leo, ut eleifend eros est consequat quam. Donec erat sapien, sagittis vitae felis ac, vestibulum eleifend elit. Curabitur in hendrerit sapien.', 'PENDING', '2024-11-25 03:19:03'),
(8, 1, 'Kerusakan Jalan di Desa Sukamaju', 'Kami warga Desa Sukamaju ingin mengadukan kondisi jalan utama desa yang rusak parah. Banyak lubang di jalan yang membahayakan pengendara, terutama saat hujan karena genangan air menutupi lubang tersebut. Mohon perhatian dari pemerintah daerah untuk segera memperbaiki jalan ini demi keselamatan masyarakat.', 'ADDED', '2024-11-25 02:58:00'),
(9, 1, 'Sampah Menumpuk di Pasar Tradisional', 'Sampah di area pasar tradisional Desa Melati sudah menumpuk dan belum diangkut selama beberapa hari. Hal ini menimbulkan bau tidak sedap dan dapat menjadi sumber penyakit. Kami berharap instansi terkait segera mengambil tindakan untuk mengatasi masalah ini.', 'ADDED', '2024-11-25 02:58:19'),
(10, 2, 'Air Sungai Tercemar Limbah Pabrik', 'Kami warga sekitar Sungai Citarum melaporkan bahwa air sungai semakin tercemar oleh limbah pabrik yang dibuang secara sembarangan. Air sungai yang sebelumnya digunakan warga untuk mencuci dan irigasi kini tidak bisa digunakan lagi. Mohon tindak lanjut agar pabrik tersebut diberi sanksi dan air sungai dapat kembali bersih.', 'DONE', '2024-11-25 03:19:06'),
(11, 2, 'Antrian Panjang di Kantor Pelayanan KTP', 'Saya ingin melaporkan antrian yang sangat panjang di Kantor Pelayanan KTP di Kecamatan Sukahati. Proses pengurusan KTP sering kali lambat karena kurangnya petugas yang melayani. Kami berharap ada tambahan petugas dan perbaikan sistem antrean agar pelayanan lebih cepat dan nyaman.', 'ADDED', '2024-11-25 03:13:42'),
(12, 4, 'Fire at the field', 'there are a big fire at the field of haunted village', 'ADDED', '2024-11-25 07:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Masaid Fairus', 'masaidfairustrimarsongko@gmail.com', '$2y$10$pB5ee76OtUcFHRPjG/nTHOnmeIdFZwIDYVA2nKXY30uNmc86dqErO', '2024-11-21 14:33:56'),
(2, 'RUSDI DGAMING', 'rusdi@gmail.com', '$2y$10$vMbz8OfQFBkQHJb7yfQvRu/WFlN41QgQhyeB4NJrg5QFTXFnZNv4S', '2024-11-22 02:55:25'),
(3, 'Ahnaf', 'ahnaf@gmail.com', '$2y$10$bPJUGdeaafrbzRW.Hd5GnuQddTLYTS2GzRJ8./kiShogz1WpVd6o2', '2024-11-22 13:55:33'),
(4, 'Hazim', 'hazim@gmail.com', '$2y$10$wNyzCokPV.fUqIOLbQbjIeMU8/IE7YkRP.KM4kOk46mahIiJweKC.', '2024-11-25 07:22:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
