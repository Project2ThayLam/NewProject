-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 08:17 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `su_kien`
--

CREATE TABLE IF NOT EXISTS `su_kien` (
`id` int(11) NOT NULL,
  `ten` text,
  `dia_diem` text,
  `dia_chi` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `su_kien`
--

INSERT INTO `su_kien` (`id`, `ten`, `dia_diem`, `dia_chi`) VALUES
(37, 'Ionah - A must see show in Hanoi', 'Star Galaxy', '87 L&#225;ng Hạ, Ba Đ&#236;nh, H&#224; Nội , Quận Ba Đ&#236;nh, H&#224; Nội'),
(38, 'L&#224;ng T&#244;i - Nh&#224; H&#225;t Tuồng Việt Nam', 'Nh&#224; H&#225;t Tuồng Việt Nam', '51A Đường Th&#224;nh, Quận Ho&#224;n Kiếm, Th&#224;nh Phố H&#224; Nội'),
(39, 'Vở diễn Tứ Phủ - The Four Palaces show', 'Rạp C&#244;ng Nh&#226;n', '42 Tr&#224;ng Tiền, Quận Ho&#224;n Kiếm, Th&#224;nh Phố H&#224; Nội'),
(40, 'Hi-5 Supers - Live In Ha Noi', 'CUNG VĂN H&#211;A HỮU NGHỊ VIỆT X&#212;', '91 Trần Hưng Đạo, Quận Ho&#224;n Kiếm, Th&#224;nh Phố H&#224; Nội'),
(41, 'BitCoin Thực chiến - 3 Chiến lược gi&#250;p bạn kiếm BTC trong 2018', 'UP Coworking Space', 'Tầng 8, t&#242;a nh&#224; Hanoi Creative City, 1 Lương Y&#234;n, Bạch Đằng, Hai B&#224; Trưng, H&#224; Nội 100000, Quận Hai B&#224; Trưng, Th&#224;nh Phố H&#224; Nội'),
(42, 'H&#224;i Kịch &quot;Quẫn&quot;', 'Trung t&#226;m Văn h&#243;a Ph&#225;p L&#39;Espace', '24 Tr&#224;ng Tiền, Quận Ho&#224;n Kiếm, Th&#224;nh Phố H&#224; Nội'),
(43, 'Workshop: Tổng quan Quản trị Chiến lược Doanh nghiệp', 'Hội trường 307, T&#242;a nh&#224; FPT Polytechnic (Nh&#224; H)', 'Đường H&#224;m Nghi, Mỹ Đ&#236;nh, Huyện Từ Li&#234;m, Th&#224;nh Phố H&#224; Nội'),
(44, 'TEDxHanoi 2018 Toward a Global Community', 'UNIS Hanoi Campus', 'G9 Ciputra Hanoi, Quận T&#226;y Hồ, Th&#224;nh Phố H&#224; Nội'),
(45, '[Hanoi] MAU5TRAP PRESENTS: DEADMAU5', 'THE TOILET', '6th Floor, 41 Hai Ba Trung, Quận Ho&#224;n Kiếm, Th&#224;nh Phố H&#224; Nội'),
(46, 'Kh&#243;a học &quot;Cẩm nang cho buổi hẹn h&#242; đầu ti&#234;n&quot;', 'Rudicaf', 'Tầng 4 số 35 Thợ Nhuộm, Quận Ho&#224;n Kiếm, Th&#224;nh Phố H&#224; Nội'),
(47, 'CHIẾN BINH SALES THIỆN CHIẾN 4.0', 'H&#224; Nội', 'Kh&#244;ng Gian Văn Ho&#225; Đ&#244;ng T&#226;y, 99 Ngụy Như Kon Tum, Nh&#226;n Ch&#237;nh, Quận Thanh Xu&#226;n, Th&#224;nh Phố H&#224; Nội'),
(48, 'Chung kết cuộc thi Bản Lĩnh Marketer 2018', 'Concert Hall', '77 H&#224;o Nam, Quận Đống Đa, Th&#224;nh Phố H&#224; Nội'),
(49, 'Kh&#243;a học &quot;Nghệ thuật viết CV v&#224; kỹ năng trả lời phỏng vấn xin việc&quot;&quot;', 'Tr&#224;ng An Complex', 'số 1 Ph&#249;ng Ch&#237; Ki&#234;n, H&#224; N&#244;i, Quận Cầu Giấy, Th&#224;nh Phố H&#224; Nội'),
(50, 'Vẽ thư gi&#227;n chủ đề &#39;&#39;Chớm hạ&quot;', 'KukuAcoustic Coffee', ' P102 A7 ng&#245; 1A T&#244;n Thất T&#249;ng, Đống Đa, H&#224; Nội , Quận Đống Đa, Th&#224;nh Phố H&#224; Nội'),
(51, 'Cua-rơ Nh&#237; - Giải đua xe thăng bằng d&#224;nh cho c&#225;c b&#233; 1-6t (H&#224; Nội)', 'TTTM LeParc by Gamuda', 'C&#244;ng vi&#234;n y&#234;n sở, Phường Y&#234;n Sở, Quận Ho&#224;ng Mai, Th&#224;nh Phố H&#224; Nội'),
(52, 'Kh&#243;a học  &quot;Kỹ năng b&#225;n h&#224;ng đỉnh cao&quot;', 'Tr&#224;ng an Complex', 'số 1 Ph&#249;ng Ch&#237; Ki&#234;n, H&#224; N&#244;i, Quận Cầu Giấy, Th&#224;nh Phố H&#224; Nội'),
(53, '(HN/HCM) Job Fair - Ng&#224;y hội Việc l&#224;m Ph&#225;p - Việt 2018', 'Pullman Hanoi  / Novotel Saigon Centre', '40 C&#225;t Linh, Đống Đa, HN / 167 Hai B&#224; Trưng, Quận 3, HCM, Quận Đống Đa, Th&#224;nh Phố H&#224; Nội'),
(54, 'Đ&#234;m nhạc &quot;Chẳng biết n&#243;i g&#236;&quot; - Tr&#250;c Nh&#226;n', 'Swing Lounge', '21 Tr&#224;ng Tiền, Quận Ho&#224;n Kiếm, Th&#224;nh Phố H&#224; Nội');

-- --------------------------------------------------------

--
-- Table structure for table `thanh_vien`
--

CREATE TABLE IF NOT EXISTS `thanh_vien` (
`user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `thanh_vien`
--

INSERT INTO `thanh_vien` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'tuấn', 'tuan', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Tuấn Vũ', 't0ny', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `thoi_gian`
--

CREATE TABLE IF NOT EXISTS `thoi_gian` (
  `id_su_kien` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `gio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thoi_gian`
--

INSERT INTO `thoi_gian` (`id_su_kien`, `ngay`, `gio`) VALUES
(37, '2018-04-26', '07:45 PM - 09:15 PM'),
(37, '2018-05-01', '07:45 PM - 09:15 PM'),
(37, '2018-05-03', '07:45 PM - 09:15 PM'),
(37, '2018-05-05', '07:45 PM - 09:15 PM'),
(37, '2018-05-08', '07:45 PM - 09:15 PM'),
(37, '2018-05-12', '08:45 PM - 09:15 PM'),
(37, '2018-05-15', '08:45 PM - 09:15 PM'),
(37, '2018-05-17', '07:45 PM - 09:15 PM'),
(37, '2018-05-19', '08:45 PM - 09:15 PM'),
(37, '2018-05-22', '08:45 PM - 09:15 PM'),
(37, '2018-05-24', '08:45 PM - 09:15 PM'),
(37, '2018-05-29', '05:45 PM - 07:15 PM'),
(37, '2018-05-31', '05:45 PM - 06:15 PM'),
(37, '2018-04-24', '07:45 PM - 09:15 PM'),
(38, '2018-04-22', '06:00 PM - 07:30 PM'),
(38, '2018-04-27', '06:00 PM - 07:30 PM'),
(38, '2018-04-29', '06:00 PM - 07:30 PM'),
(38, '2018-05-01', '06:00 PM - 07:30 PM'),
(38, '2018-05-02', '06:00 PM - 07:30 PM'),
(38, '2018-05-06', '06:00 PM - 07:30 PM'),
(38, '2018-05-09', '06:00 PM - 07:30 PM'),
(38, '2018-05-11', '06:00 PM - 07:30 PM'),
(38, '2018-05-13', '06:00 PM - 07:00 PM'),
(38, '2018-05-15', '06:00 PM - 07:30 PM'),
(38, '2018-05-16', '06:00 PM - 07:30 PM'),
(38, '2018-05-18', '06:00 PM - 07:30 PM'),
(38, '2018-05-20', '06:00 PM - 07:30 PM'),
(38, '2018-05-25', '06:00 PM - 07:30 PM'),
(38, '2018-05-27', '06:00 PM - 07:30 PM'),
(38, '2018-04-25', '06:00 PM - 07:30 PM'),
(39, '2018-04-26', '07:30 PM - 08:15 PM'),
(39, '2018-04-28', '06:00 PM - 06:45 PM'),
(39, '2018-04-28', '07:30 PM - 08:15 PM'),
(39, '2018-05-03', '06:00 PM - 06:45 PM'),
(39, '2018-05-03', '07:30 PM - 08:15 PM'),
(39, '2018-05-05', '06:00 PM - 06:45 PM'),
(39, '2018-05-05', '07:30 PM - 08:15 PM'),
(39, '2018-05-17', '06:00 PM - 06:45 PM'),
(39, '2018-05-17', '07:30 PM - 08:15 PM'),
(39, '2018-05-19', '06:00 PM - 06:45 PM'),
(39, '2018-05-19', '07:30 PM - 08:15 PM'),
(39, '2018-05-24', '06:00 PM - 06:45 PM'),
(39, '2018-05-24', '07:30 PM - 08:15 PM'),
(39, '2018-05-26', '06:00 PM - 06:45 PM'),
(39, '2018-05-26', '07:30 PM - 08:15 PM'),
(39, '2018-06-07', '06:00 PM - 06:45 PM'),
(39, '2018-06-07', '07:30 PM - 08:15 PM'),
(39, '2018-06-09', '06:00 PM - 06:45 PM'),
(39, '2018-06-09', '07:30 PM - 08:15 PM'),
(39, '2018-06-14', '06:00 PM - 06:45 PM'),
(39, '2018-06-14', '07:30 PM - 08:15 PM'),
(39, '2018-06-16', '06:00 PM - 06:45 PM'),
(39, '2018-06-16', '07:30 PM - 08:15 PM'),
(39, '2018-06-21', '06:00 PM - 06:45 PM'),
(39, '2018-06-21', '07:30 PM - 08:15 PM'),
(39, '2018-06-23', '06:00 PM - 06:45 PM'),
(39, '2018-06-23', '07:30 PM - 08:15 PM'),
(39, '2018-07-05', '06:00 PM - 06:45 PM'),
(39, '2018-07-05', '07:30 PM - 08:15 PM'),
(39, '2018-07-07', '06:00 PM - 06:45 PM'),
(39, '2018-07-07', '07:30 PM - 08:15 PM'),
(39, '2018-07-19', '06:00 PM - 06:45 PM'),
(39, '2018-07-19', '07:30 PM - 08:15 PM'),
(39, '2018-07-21', '06:00 PM - 06:45 PM'),
(39, '2018-07-21', '07:30 PM - 08:15 PM'),
(39, '2018-07-26', '06:00 PM - 06:45 PM'),
(39, '2018-07-26', '07:30 PM - 08:15 PM'),
(39, '2018-07-28', '06:00 PM - 06:45 PM'),
(39, '2018-07-28', '07:30 PM - 08:15 PM'),
(39, '2018-04-26', '06:00 PM - 06:45 PM'),
(40, '2018-04-29', '07:00 PM - 08:45 PM'),
(40, '2018-04-30', '11:30 AM - 01:45 PM'),
(40, '2018-04-30', '03:00 PM - 04:45 PM'),
(40, '2018-04-30', '07:00 PM - 08:45 PM'),
(40, '2018-05-01', '11:30 AM - 02:00 PM'),
(40, '2018-05-01', '03:00 PM - 05:30 PM'),
(40, '2018-05-01', '07:00 PM - 09:30 PM'),
(40, '2018-04-29', '03:00 PM - 04:45 PM'),
(41, '2018-04-08', '09:00 AM - 12:00 PM'),
(42, '2018-04-21', '08:00 PM - 09:30 PM'),
(43, '2018-04-26', '08:00 AM - 06:00 PM'),
(43, '2018-04-23', '08:00 AM - 06:00 PM'),
(44, '2018-06-02', '09:00 AM - 05:30 PM'),
(45, '2018-05-10', '08:00 PM - Đến Tối muộn'),
(46, '2018-05-12', '09:30 AM - 12:30 PM'),
(47, '2018-04-27', '08:00 AM - 05:30 PM'),
(47, '2018-04-27', '08:00 AM - 05:30 PM'),
(48, '2018-05-12', '06:00 PM - 10:00 PM'),
(49, '2018-05-29', '06:00 PM - 09:00 PM'),
(50, '2018-04-22', '09:00 AM - 11:00 AM'),
(51, '2018-05-06', '08:00 AM - 05:00 PM'),
(52, '2018-06-25', '06:00 PM - 09:00 PM'),
(52, '2018-06-25', '06:00 PM - 09:00 PM'),
(52, '2018-05-26', '08:30 AM - 04:30 PM'),
(53, '2018-05-12', '08:00 AM - 01:00 PM'),
(53, '2018-05-05', '08:00 AM - 01:00 PM'),
(54, '2018-04-28', '09:15 PM - 11:15 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `su_kien`
--
ALTER TABLE `su_kien`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanh_vien`
--
ALTER TABLE `thanh_vien`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `thoi_gian`
--
ALTER TABLE `thoi_gian`
 ADD KEY `id_su_kien` (`id_su_kien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `su_kien`
--
ALTER TABLE `su_kien`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `thanh_vien`
--
ALTER TABLE `thanh_vien`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `thoi_gian`
--
ALTER TABLE `thoi_gian`
ADD CONSTRAINT `thoi_gian_ibfk_1` FOREIGN KEY (`id_su_kien`) REFERENCES `su_kien` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
