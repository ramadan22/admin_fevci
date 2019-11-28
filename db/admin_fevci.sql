-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2019 at 05:45 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_fevci`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id_aboutus` int(5) NOT NULL,
  `title_aboutus` varchar(50) NOT NULL,
  `content_aboutus` longtext NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id_aboutus`, `title_aboutus`, `content_aboutus`, `create_date`, `update_date`, `delete_status`) VALUES
(1, 'Ford Everest Club Indonesia Banten', '<p class=\"has-medium-font-size\" style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; font-size: 20px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-size: 1rem;\">Dari latar belakang berbeda kami bertemu dan dengan memakai kendaraan yang sama, hingga terjalin SILATURAHMI yang kuat, bermakna dan bermanfaat sebagai keluarga besar FORD EVEREST CLUB INDONESIA CHAPTER BANTEN</span><br></p><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\"><br style=\"margin: 0px; padding: 0px; outline: 0px;\"></p><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\"><strong style=\"margin: 0px; padding: 0px; outline: 0px;\">SEKRETARIAT FEVCI BANTEN</strong><br style=\"margin: 0px; padding: 0px; outline: 0px;\"><br style=\"margin: 0px; padding: 0px; outline: 0px;\"></p><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\">Pabuaran, Karawaci Sub-District, Tangerang City, Banten 15114<br style=\"margin: 0px; padding: 0px; outline: 0px;\"><br style=\"margin: 0px; padding: 0px; outline: 0px;\"></p><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\"></p><p class=\"has-medium-font-size\" style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; font-size: 20px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\"><strong style=\"margin: 0px; padding: 0px; outline: 0px;\">Sejarah Ford Everest Club Indonesia</strong><br style=\"margin: 0px; padding: 0px; outline: 0px;\"></p><p style=\"margin-right: 0px; margin-bottom: 16px; margin-left: 0px; padding: 0px; outline: 0px; overflow-wrap: break-word; color: rgb(142, 157, 174); font-family: &quot;Open Sans&quot;, sans-serif;\">Ford Everest Club Indonesia (FEvCI) Terbentuk pada 30 April 2015 oleh sekumpulan pengguna dan pencinta Ford Everest di JABOTABEK. FEvCI adalah club Otomotif bersifat KOMUNITAS dan berazazkan KEKELUARGAAN.<br style=\"margin: 0px; padding: 0px; outline: 0px;\"><br style=\"margin: 0px; padding: 0px; outline: 0px;\">FEvCI sendiri berdiri dengan tujuan : – WADAH SILAHTURAHMI para Owner Ford Eveerest se-INDONESIA. – WADAH KOMUNIKASI para Owner Ford Everest se-INDONESIA. – WADAH BERBAGI INFORMASI pengetahuan &amp; Spare Parts seputar kendaraan Ford Everest. – WADAH BERBAGI Pengalaman Riding dan Berpetualang menikmati Indahnya Alam NUSANTARA INDONESIA. OPEN RECRUITMENTS.!! PLEASE CONTACT PENGURUS CHAPTER &amp; KORWIL di PENGUMUMAN Salam<br style=\"margin: 0px; padding: 0px; outline: 0px;\"><br style=\"margin: 0px; padding: 0px; outline: 0px;\">#adventuride #everestgetlost</p>', '2019-11-26 00:00:00', '2019-11-28 04:37:27', '0');

-- --------------------------------------------------------

--
-- Table structure for table `app_token`
--

CREATE TABLE `app_token` (
  `id_app_token` int(5) NOT NULL,
  `token` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `delete_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_token`
--

INSERT INTO `app_token` (`id_app_token`, `token`, `create_date`, `delete_status`) VALUES
(1, 'df7db256854f1dbe37a56820210437701da7e4f7', '2019-11-26 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `name_menu` varchar(25) NOT NULL,
  `name_modul` varchar(25) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `name_menu`, `name_modul`, `create_date`, `update_date`, `delete_status`) VALUES
(1, 'Manage Content', 'manage-content', '2019-11-25 00:00:00', '2019-11-27 08:04:16', '0'),
(2, 'Manage Articles', 'articles', '2019-11-26 00:00:00', '2019-11-26 04:45:39', '0');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id_privileges` int(5) NOT NULL,
  `view_action` enum('0','1') NOT NULL,
  `create_action` enum('0','1') NOT NULL,
  `edit_action` enum('0','1') NOT NULL,
  `delete_action` enum('0','1') NOT NULL,
  `created_by` int(5) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` enum('0','1') NOT NULL,
  `id_menu` int(5) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id_sub_menu` int(5) NOT NULL,
  `name_sub_menu` varchar(25) NOT NULL,
  `name_modul` varchar(25) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` enum('0','1') NOT NULL,
  `id_menu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id_sub_menu`, `name_sub_menu`, `name_modul`, `created_date`, `update_date`, `delete_status`, `id_menu`) VALUES
(1, 'About Us', 'about', '2019-11-25 00:00:00', '2019-11-27 08:05:12', '0', 1),
(2, 'Contact Us', 'contactus', '2019-11-26 00:00:00', '2019-11-26 02:07:30', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `address`, `username`, `password`, `email`, `status`, `created_date`, `update_date`, `delete_status`) VALUES
(1, 'super_admin', '-', 'super_admin', '736a95382da0c1b931dc87529706d25c636954e7', 'super_admin@gmail.com', '1', '2019-11-25 04:12:15', '2019-11-25 03:03:10', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id_aboutus`);

--
-- Indexes for table `app_token`
--
ALTER TABLE `app_token`
  ADD PRIMARY KEY (`id_app_token`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id_privileges`),
  ADD KEY `id_modul` (`id_menu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id_aboutus` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_token`
--
ALTER TABLE `app_token`
  MODIFY `id_app_token` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id_privileges` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_sub_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `privileges`
--
ALTER TABLE `privileges`
  ADD CONSTRAINT `privileges_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `privileges_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
