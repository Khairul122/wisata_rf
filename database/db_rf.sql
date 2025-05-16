-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 03:38 PM
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
-- Database: `db_rf`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `id_data_kriteria` int(11) NOT NULL,
  `id_objek` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `data_kriteria`
--

INSERT INTO `data_kriteria` (`id_data_kriteria`, `id_objek`, `id_kriteria`, `nilai`) VALUES
(11, 26, 1, '8'),
(12, 26, 4, '11517'),
(13, 26, 2, '5'),
(14, 26, 3, '4.8'),
(15, 26, 6, '6.1'),
(16, 27, 1, '5'),
(17, 27, 4, '942'),
(18, 27, 2, '3'),
(19, 27, 3, '5'),
(20, 27, 6, '35.9'),
(21, 28, 1, '8'),
(22, 28, 4, '24830'),
(23, 28, 2, '3'),
(24, 28, 3, '4'),
(25, 28, 6, '5.4'),
(26, 29, 1, '2'),
(27, 29, 4, '6292'),
(28, 29, 2, '1'),
(29, 29, 3, '4.4'),
(30, 29, 6, '15.7'),
(31, 30, 1, '6'),
(32, 30, 4, '9187'),
(33, 30, 2, '1'),
(34, 30, 3, '4.3'),
(35, 30, 6, '15.6'),
(36, 31, 1, '8'),
(37, 31, 4, '12234'),
(38, 31, 2, '3'),
(39, 31, 3, '4.7'),
(40, 31, 6, '15.2'),
(41, 32, 1, '8'),
(42, 32, 4, '19082'),
(43, 32, 2, '5'),
(44, 32, 3, '4.4'),
(45, 32, 6, '3.3'),
(46, 33, 1, '7'),
(47, 33, 4, '2360'),
(48, 33, 2, '3'),
(49, 33, 3, '4.3'),
(50, 33, 6, '36.7'),
(51, 34, 1, '7'),
(52, 34, 4, '2474'),
(53, 34, 2, '5'),
(54, 34, 3, '4'),
(55, 34, 6, '44.3'),
(56, 35, 1, '6'),
(57, 35, 4, '1665'),
(58, 35, 2, '3'),
(59, 35, 3, '3.4'),
(60, 35, 6, '15.4'),
(61, 36, 1, '7'),
(62, 36, 4, '54876'),
(63, 36, 2, '5'),
(64, 36, 3, '4.8'),
(65, 36, 6, '0.5'),
(66, 37, 1, '8'),
(67, 37, 4, '25005'),
(68, 37, 2, '3'),
(69, 37, 3, '5'),
(70, 37, 6, '22'),
(71, 38, 1, '7'),
(72, 38, 4, '6046'),
(73, 38, 2, '5'),
(74, 38, 3, '4'),
(75, 38, 6, '7.5'),
(76, 39, 1, '8'),
(77, 39, 4, '1199'),
(78, 39, 2, '1'),
(79, 39, 3, '4.5'),
(80, 39, 6, '20'),
(81, 40, 1, '8'),
(82, 40, 4, '84738'),
(83, 40, 2, '3'),
(84, 40, 3, '4.4'),
(85, 40, 6, '47.8'),
(86, 41, 1, '7'),
(87, 41, 4, '7525'),
(88, 41, 2, '5'),
(89, 41, 3, '3.9'),
(90, 41, 6, '6.1'),
(91, 42, 1, '8'),
(92, 42, 4, '30626'),
(93, 42, 2, '5'),
(94, 42, 3, '4.1'),
(95, 42, 6, '15'),
(96, 43, 1, '8'),
(97, 43, 4, '375'),
(98, 43, 2, '3'),
(99, 43, 3, '5'),
(100, 43, 6, '6'),
(101, 44, 1, '8'),
(102, 44, 4, '5741'),
(103, 44, 2, '5'),
(104, 44, 3, '4.1'),
(105, 44, 6, '3.6'),
(106, 45, 1, '1'),
(107, 45, 4, '1343'),
(108, 45, 2, '1'),
(109, 45, 3, '4'),
(110, 45, 6, '26'),
(111, 46, 1, '2'),
(112, 46, 4, '2524'),
(113, 46, 2, '1'),
(114, 46, 3, '3.5'),
(115, 46, 6, '21'),
(116, 47, 1, '4'),
(117, 47, 4, '1224'),
(118, 47, 2, '5'),
(119, 47, 3, '3.9'),
(120, 47, 6, '2.4'),
(121, 48, 1, '1'),
(122, 48, 4, '933'),
(123, 48, 2, '3'),
(124, 48, 3, '3'),
(125, 48, 6, '9.2'),
(126, 49, 1, '7'),
(127, 49, 4, '610'),
(128, 49, 2, '5'),
(129, 49, 3, '4.5'),
(130, 49, 6, '5.9'),
(131, 50, 1, '7'),
(132, 50, 4, '2464'),
(133, 50, 2, '3'),
(134, 50, 3, '4.2'),
(135, 50, 6, '10.2'),
(136, 56, 1, '3'),
(137, 56, 4, '1318'),
(138, 56, 2, '3'),
(139, 56, 3, '4.7'),
(140, 56, 6, '5.6'),
(141, 57, 1, '4'),
(142, 57, 4, '3195'),
(143, 57, 2, '3'),
(144, 57, 3, '4.6'),
(145, 57, 6, '14.5'),
(146, 58, 1, '5'),
(147, 58, 4, '153000'),
(148, 58, 2, '5'),
(149, 58, 3, '4.1'),
(150, 58, 6, '5.6'),
(151, 59, 1, '4'),
(152, 59, 4, '352'),
(153, 59, 2, '1'),
(154, 59, 3, '3.7'),
(155, 59, 6, '22.4'),
(156, 55, 1, '8'),
(157, 55, 4, '1927'),
(158, 55, 2, '1'),
(159, 55, 3, '3.5'),
(160, 55, 6, '12.8');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `id_objek` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `id_objek`, `nama_fasilitas`) VALUES
(510, 26, 'parkir'),
(511, 26, 'toilet'),
(512, 26, 'mushola'),
(513, 26, 'tempat sampah'),
(514, 26, 'gazebo'),
(515, 26, 'warung makan'),
(516, 26, 'pusat informasi'),
(517, 26, 'spot poto'),
(518, 55, 'parkir'),
(519, 55, 'toilet'),
(520, 55, 'mushola'),
(521, 55, 'tempat sampah'),
(522, 55, 'gazebo'),
(523, 55, 'warung makan'),
(524, 55, 'pusat informasi'),
(525, 55, 'spot poto'),
(526, 27, 'parkir'),
(527, 27, 'toilet'),
(528, 27, 'gazebo'),
(529, 27, 'warung makan'),
(530, 27, 'spot poto'),
(531, 28, 'parkir'),
(532, 28, 'toilet'),
(533, 28, 'mushola'),
(534, 28, 'tempat sampah'),
(535, 28, 'gazebo'),
(536, 28, 'warung makan'),
(537, 28, 'pusat informasi'),
(538, 28, 'spot poto'),
(539, 29, 'parkir'),
(540, 29, 'spot poto'),
(541, 30, 'parkir'),
(542, 30, 'toilet'),
(543, 30, 'mushola'),
(544, 30, 'tempat sampah'),
(545, 30, 'warung makan'),
(546, 30, 'spot poto'),
(547, 31, 'parkir'),
(548, 31, 'toilet'),
(549, 31, 'mushola'),
(550, 31, 'tempat sampah'),
(551, 31, 'gazebo'),
(552, 31, 'warung makan'),
(553, 31, 'pusat informasi'),
(554, 31, 'spot poto'),
(555, 32, 'parkir'),
(556, 32, 'toilet'),
(557, 32, 'mushola'),
(558, 32, 'tempat sampah'),
(559, 32, 'gazebo'),
(560, 32, 'warung makan'),
(561, 32, 'pusat informasi'),
(562, 32, 'spot poto'),
(563, 33, 'parkir'),
(564, 33, 'toilet'),
(565, 33, 'mushola'),
(566, 33, 'tempat sampah'),
(567, 33, 'gazebo'),
(568, 33, 'warung makan'),
(569, 33, 'spot poto'),
(570, 34, 'parkir'),
(571, 34, 'toilet'),
(572, 34, 'mushola'),
(573, 34, 'tempat sampah'),
(574, 34, 'gazebo'),
(575, 34, 'warung makan'),
(576, 34, 'spot poto'),
(577, 35, 'parkir'),
(578, 35, 'mushola'),
(579, 35, 'tempat sampah'),
(580, 35, 'gazebo'),
(581, 35, 'warung makan'),
(582, 35, 'spot poto'),
(583, 36, 'parkir'),
(584, 36, 'toilet'),
(585, 36, 'mushola'),
(586, 36, 'tempat sampah'),
(587, 36, 'warung makan'),
(588, 36, 'pusat informasi'),
(589, 36, 'spot poto'),
(590, 37, 'parkir'),
(591, 37, 'toilet'),
(592, 37, 'mushola'),
(593, 37, 'tempat sampah'),
(594, 37, 'gazebo'),
(595, 37, 'warung makan'),
(596, 37, 'pusat informasi'),
(597, 37, 'spot poto'),
(598, 38, 'parkir'),
(599, 38, 'toilet'),
(600, 38, 'mushola'),
(601, 38, 'tempat sampah'),
(602, 38, 'gazebo'),
(603, 38, 'warung makan'),
(604, 38, 'spot poto'),
(605, 39, 'parkir'),
(606, 39, 'toilet'),
(607, 39, 'mushola'),
(608, 39, 'tempat sampah'),
(609, 39, 'gazebo'),
(610, 39, 'warung makan'),
(611, 39, 'pusat informasi'),
(612, 39, 'spot poto'),
(613, 40, 'parkir'),
(614, 40, 'toilet'),
(615, 40, 'mushola'),
(616, 40, 'tempat sampah'),
(617, 40, 'gazebo'),
(618, 40, 'warung makan'),
(619, 40, 'pusat informasi'),
(620, 40, 'spot poto'),
(621, 41, 'parkir'),
(622, 41, 'toilet'),
(623, 41, 'mushola'),
(624, 41, 'tempat sampah'),
(625, 41, 'gazebo'),
(626, 41, 'warung makan'),
(627, 41, 'spot poto'),
(628, 42, 'parkir'),
(629, 42, 'toilet'),
(630, 42, 'mushola'),
(631, 42, 'tempat sampah'),
(632, 42, 'gazebo'),
(633, 42, 'warung makan'),
(634, 42, 'pusat informasi'),
(635, 42, 'spot poto'),
(636, 43, 'parkir'),
(637, 43, 'toilet'),
(638, 43, 'mushola'),
(639, 43, 'tempat sampah'),
(640, 43, 'gazebo'),
(641, 43, 'warung makan'),
(642, 43, 'pusat informasi'),
(643, 43, 'spot poto'),
(644, 44, 'parkir'),
(645, 44, 'toilet'),
(646, 44, 'mushola'),
(647, 44, 'tempat sampah'),
(648, 44, 'gazebo'),
(649, 44, 'warung makan'),
(650, 44, 'pusat informasi'),
(651, 44, 'spot poto'),
(652, 45, 'spot poto'),
(653, 46, 'parkir'),
(654, 46, 'spot poto'),
(655, 47, 'parkir'),
(656, 47, 'toilet'),
(657, 47, 'mushola'),
(658, 47, 'tempat sampah'),
(659, 48, 'parkir'),
(660, 49, 'parkir'),
(661, 49, 'toilet'),
(662, 49, 'mushola'),
(663, 49, 'tempat sampah'),
(664, 49, 'warung makan'),
(665, 49, 'pusat informasi'),
(666, 49, 'spot poto'),
(667, 50, 'parkir'),
(668, 50, 'toilet'),
(669, 50, 'mushola'),
(670, 50, 'tempat sampah'),
(671, 50, 'warung makan'),
(672, 50, 'pusat informasi'),
(673, 50, 'spot poto'),
(675, 56, 'Parkir'),
(676, 56, 'Toilet'),
(677, 56, 'Warung Makan'),
(678, 57, 'Parkir'),
(679, 57, 'Toilet'),
(680, 57, 'Tempat Sampah'),
(681, 57, 'Spot Foto'),
(682, 58, 'Parkir'),
(683, 58, 'Toilet'),
(684, 58, 'Tempat Sampah'),
(685, 58, 'Pusat Informasi'),
(686, 58, 'Spot Foto'),
(687, 59, 'Parkir'),
(688, 59, 'Toilet'),
(689, 59, 'Warung Makan'),
(690, 59, 'Spot Foto');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_prediksi`
--

CREATE TABLE `hasil_prediksi` (
  `id_prediksi` int(11) NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `hasil` varchar(100) NOT NULL,
  `id_objek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `penjelasan` text NOT NULL,
  `arah_potensi` varchar(10) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `bobot` float DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `penjelasan`, `arah_potensi`, `satuan`, `bobot`) VALUES
(1, 'Fasilitas', 'Semakin sedikit fasilitas yang tersedia, maka potensi pengembangan wisata semakin tinggi', 'tinggi', 'jumlah', 1.2),
(2, 'Akses Jalan', 'Akses yang masih sulit menunjukkan area belum tergarap dan layak dibuka/diperbaiki infrastrukturnya', 'tinggi', 'mudah/sulit', 1),
(3, 'Rating Pengunjung', 'Rating tinggi dari pengunjung mencerminkan tempat tersebut disukai dan layak dikembangkan', 'rendah', 'rating (1–5)', 1.5),
(4, 'Jumlah Pengunjung', 'Banyak pengunjung dalam setahun menunjukkan tempat memiliki daya tarik yang tinggi', 'rendah', 'orang per tahun', 1.3),
(6, 'Jarak ke Kota', 'Semakin dekat jaraknya ke pusat kota, maka potensi wisata semakin tinggi karena mudah diakses.', 'tinggi', 'km', 1.1);

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan_wisata`
--

CREATE TABLE `kunjungan_wisata` (
  `id_kunjungan` int(11) NOT NULL,
  `id_objek` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_pengunjung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `kunjungan_wisata`
--

INSERT INTO `kunjungan_wisata` (`id_kunjungan`, `id_objek`, `tahun`, `jumlah_pengunjung`) VALUES
(1, 28, '2021', 3000),
(2, 28, '2022', 9310),
(3, 28, '2023', 7320),
(4, 28, '2024', 5200),
(5, 46, '2021', 851),
(6, 46, '2022', 732),
(7, 46, '2023', 636),
(8, 46, '2024', 305),
(9, 40, '2021', 8654),
(10, 40, '2022', 7062),
(11, 40, '2023', 16455),
(12, 40, '2024', 10198),
(13, 26, '2021', 1600),
(14, 26, '2022', 3705),
(15, 26, '2023', 4242),
(16, 26, '2024', 1970),
(17, 27, '2021', 0),
(18, 27, '2022', 0),
(19, 27, '2023', 202),
(20, 27, '2024', 740),
(21, 29, '2021', 643),
(22, 29, '2022', 5316),
(23, 29, '2023', 210),
(24, 29, '2024', 123),
(25, 30, '2021', 1025),
(26, 30, '2022', 7212),
(27, 30, '2023', 530),
(28, 30, '2024', 420),
(29, 31, '2021', 1020),
(30, 31, '2022', 786),
(31, 31, '2023', 7718),
(32, 31, '2024', 2710),
(33, 32, '2021', 1250),
(34, 32, '2022', 1462),
(35, 32, '2023', 10560),
(36, 32, '2024', 5810),
(37, 33, '2021', 420),
(38, 33, '2022', 585),
(39, 33, '2023', 625),
(40, 33, '2024', 730),
(41, 34, '2021', 240),
(42, 34, '2022', 478),
(43, 34, '2023', 792),
(44, 34, '2024', 964),
(45, 35, '2021', 390),
(46, 35, '2022', 537),
(47, 35, '2023', 420),
(48, 35, '2024', 318),
(49, 36, '2021', 16421),
(50, 36, '2022', 14025),
(51, 36, '2023', 12790),
(52, 36, '2024', 11640),
(53, 37, '2021', 1298),
(54, 37, '2022', 9930),
(55, 37, '2023', 7375),
(56, 37, '2024', 6402),
(57, 38, '2021', 2567),
(58, 38, '2022', 1589),
(59, 38, '2023', 1230),
(60, 38, '2024', 660),
(61, 39, '2021', 247),
(62, 39, '2022', 364),
(63, 39, '2023', 318),
(64, 39, '2024', 270),
(65, 40, '2021', 8654),
(66, 40, '2022', 7062),
(67, 40, '2023', 16455),
(68, 40, '2024', 10198),
(69, 41, '2021', 1021),
(70, 41, '2022', 993),
(71, 41, '2023', 3085),
(72, 41, '2024', 2426),
(73, 42, '2021', 8654),
(74, 42, '2022', 7872),
(75, 42, '2023', 9010),
(76, 42, '2024', 5090),
(77, 43, '2021', 180),
(78, 43, '2022', 113),
(79, 43, '2023', 40),
(80, 43, '2024', 42),
(81, 44, '2021', 1765),
(82, 44, '2022', 1231),
(83, 44, '2023', 1860),
(84, 44, '2024', 885),
(85, 45, '2021', 512),
(86, 45, '2022', 330),
(87, 45, '2023', 343),
(88, 45, '2024', 158),
(89, 47, '2021', 421),
(90, 47, '2022', 362),
(91, 47, '2023', 413),
(92, 47, '2024', 28),
(93, 48, '2021', 271),
(94, 48, '2022', 257),
(95, 48, '2023', 253),
(96, 48, '2024', 152),
(97, 49, '2021', 160),
(98, 49, '2022', 210),
(99, 49, '2023', 140),
(100, 49, '2024', 100),
(101, 50, '2021', 0),
(102, 50, '2022', 654),
(103, 50, '2023', 870),
(104, 50, '2024', 940),
(105, 55, '2021', 537),
(106, 55, '2022', 400),
(107, 55, '2023', 478),
(108, 55, '2024', 512),
(109, 56, '2021', 0),
(110, 56, '2022', 0),
(111, 56, '2023', 710),
(112, 56, '2024', 608),
(113, 57, '2021', 0),
(114, 57, '2022', 530),
(115, 57, '2023', 1830),
(116, 57, '2024', 835),
(117, 58, '2021', 0),
(118, 58, '2022', 40000),
(119, 58, '2023', 113000),
(120, 58, '2024', 0),
(121, 59, '2021', 0),
(122, 59, '2022', 187),
(123, 59, '2023', 140),
(124, 59, '2024', 25);

-- --------------------------------------------------------

--
-- Table structure for table `log_model`
--

CREATE TABLE `log_model` (
  `id_model` int(11) NOT NULL,
  `tanggal_latih` date NOT NULL,
  `akurasi` decimal(5,4) DEFAULT NULL,
  `presisi` decimal(5,4) DEFAULT NULL,
  `recal` decimal(5,4) DEFAULT NULL,
  `f1_score` decimal(5,4) DEFAULT NULL,
  `jumlah_pohon` int(11) DEFAULT NULL,
  `fitur_terpenting` text DEFAULT NULL,
  `conf_matrix_json` text DEFAULT NULL,
  `parameter_model` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `log_model`
--

INSERT INTO `log_model` (`id_model`, `tanggal_latih`, `akurasi`, `presisi`, `recal`, `f1_score`, `jumlah_pohon`, `fitur_terpenting`, `conf_matrix_json`, `parameter_model`) VALUES
(9, '2025-04-23', 1.0000, 1.0000, 1.0000, 1.0000, 100, '{\"fasilitas\": 0.047834931765592795, \"akses_jalan\": 0.0407155421924506, \"rating_pengunjung\": 0.07987047309374523, \"jumlah_pengunjung\": 0.5096265461499314, \"jarak_ke_kota\": 0.32195250679827997}', '[[6, 0, 0], [0, 0, 0], [0, 0, 0]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(10, '2025-04-23', 1.0000, 1.0000, 1.0000, 1.0000, 100, '{\"fasilitas\": 0.0, \"akses_jalan\": 0.0, \"rating_pengunjung\": 0.0, \"jumlah_pengunjung\": 0.0, \"jarak_ke_kota\": 0.0}', '[[0, 0, 0], [0, 0, 0], [0, 0, 6]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(11, '2025-04-23', 0.8333, 0.8750, 0.8333, 0.8286, 100, '{\"fasilitas\": 0.17167694772906217, \"akses_jalan\": 0.24072269766698237, \"rating_pengunjung\": 0.16655328742461153, \"jumlah_pengunjung\": 0.23929591159571603, \"jarak_ke_kota\": 0.18175115558362798}', '[[2, 1, 0], [0, 3, 0], [0, 0, 0]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(12, '2025-04-23', 0.8333, 0.8750, 0.8333, 0.8286, 100, '{\"fasilitas\": 0.18518328868298087, \"akses_jalan\": 0.2518439795178533, \"rating_pengunjung\": 0.16800256263725927, \"jumlah_pengunjung\": 0.26213226819042623, \"jarak_ke_kota\": 0.1328379009714803}', '[[2, 1, 0], [0, 3, 0], [0, 0, 0]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(13, '2025-04-23', 0.5000, 0.3333, 0.3889, 0.3556, 100, '{\"fasilitas\": 0.13789226699400006, \"akses_jalan\": 0.1739534947933112, \"rating_pengunjung\": 0.189940683030925, \"jumlah_pengunjung\": 0.3179924453274151, \"jarak_ke_kota\": 0.18022110985434858}', '[[2, 0, 1], [0, 0, 1], [1, 0, 1]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(14, '2025-04-23', 0.5000, 0.3333, 0.3889, 0.3556, 100, '{\"fasilitas\": 0.13789226699400006, \"akses_jalan\": 0.1739534947933112, \"rating_pengunjung\": 0.189940683030925, \"jumlah_pengunjung\": 0.3179924453274151, \"jarak_ke_kota\": 0.18022110985434858}', '[[2, 0, 1], [0, 0, 1], [1, 0, 1]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(15, '2025-04-23', 1.0000, 1.0000, 1.0000, 1.0000, 100, '{\"fasilitas\": 0.0, \"akses_jalan\": 0.0, \"rating_pengunjung\": 0.0, \"jumlah_pengunjung\": 0.0, \"jarak_ke_kota\": 0.0}', '[[6]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(16, '2025-04-23', 0.6667, 0.6667, 0.6667, 0.6667, 100, '{\"fasilitas\": 0.16431535759510382, \"akses_jalan\": 0.047443013217554154, \"rating_pengunjung\": 0.12354091379424058, \"jumlah_pengunjung\": 0.5672534954176275, \"jarak_ke_kota\": 0.09744721997547395}', '[[0, 0, 0], [0, 2, 1], [0, 1, 2]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(17, '2025-04-23', 1.0000, 1.0000, 1.0000, 1.0000, 100, '{\"fasilitas\": 0.047834931765592795, \"akses_jalan\": 0.0407155421924506, \"rating_pengunjung\": 0.07987047309374523, \"jumlah_pengunjung\": 0.5096265461499314, \"jarak_ke_kota\": 0.32195250679827997}', '[[6, 0, 0], [0, 0, 0], [0, 0, 0]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(18, '2025-04-23', 1.0000, 1.0000, 1.0000, 1.0000, 100, '{\"fasilitas\": 0.12934403693038873, \"akses_jalan\": 0.061154662972149595, \"rating_pengunjung\": 0.1304067402751902, \"jumlah_pengunjung\": 0.5750885464488311, \"jarak_ke_kota\": 0.10400601337344034}', '[[2, 0, 0], [0, 4, 0], [0, 0, 0]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(19, '2025-05-10', 1.0000, 1.0000, 1.0000, 1.0000, 100, '{\"fasilitas\": 0.12934403693038873, \"akses_jalan\": 0.061154662972149595, \"rating_pengunjung\": 0.1304067402751902, \"jumlah_pengunjung\": 0.5750885464488311, \"jarak_ke_kota\": 0.10400601337344034}', '[[2, 0, 0], [0, 4, 0], [0, 0, 0]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(20, '2025-05-14', 1.0000, 1.0000, 1.0000, 1.0000, 100, '{\"fasilitas\": 0.12934403693038873, \"akses_jalan\": 0.061154662972149595, \"rating_pengunjung\": 0.1304067402751902, \"jumlah_pengunjung\": 0.5750885464488311, \"jarak_ke_kota\": 0.10400601337344034}', '[[2, 0, 0], [0, 4, 0], [0, 0, 0]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}');

-- --------------------------------------------------------

--
-- Table structure for table `objek_wisata`
--

CREATE TABLE `objek_wisata` (
  `id_objek` int(11) NOT NULL,
  `nama_objek` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `objek_wisata`
--

INSERT INTO `objek_wisata` (`id_objek`, `nama_objek`, `deskripsi`, `kecamatan`, `latitude`, `longitude`, `foto`) VALUES
(26, 'Mesjid Asal peparik', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangjerango', '4.017576413941228', '97.26762983620505', 'MESJID ASAL PEPARIK.jpeg'),
(27, 'Puncak Dedalu', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Terangun', '4.061404322164484', '97.10172876983013', 'PUNCAK TERANGUN.jpeg'),
(28, 'Aih Kala Pinang ', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Bangkejeren', '4.035433766297055', '97.33441741488646', 'AIH KALA PINANG.jpeg'),
(29, 'Berawang Lopah', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangjerango', '4.022689775361257', '97.2438519796822', 'BERAWANG LOPAH.jpg'),
(30, 'Berawang Tasik', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangjerango', '4.025212243398782', '97.23968576618906', 'BERAWANG TASIK.jpeg'),
(31, 'Lestari Ayu Kedah', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangjerango', '3.9901352933750696', '97.25586029365179', 'LESTARI AYU KEDAH.jpeg'),
(32, 'Taman Mini Gayo Indah (TMGI)', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangkejeren', '3.996951537739622', '97.32596779573143', 'TAMAN MINI GAYO INDAH.jpg'),
(33, 'Bur Godang', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Pantan Cuaca', '4.21146196776865', '97.14596051044721', 'BUR GODANG (1).jpeg'),
(34, 'Makam Datok Pining', 'Makam Datuk Pining adalah situs bersejarah yang terletak di Kabupaten Gayo Lues, Provinsi Aceh, Indonesia. Makam ini menjadi tempat peristirahatan terakhir seorang tokoh yang dikenal sebagai Datuk Pining, yang dihormati oleh masyarakat setempat karena peran dan kontribusinya dalam sejarah daerah tersebut.', 'Kecamatan Pining', '4.109520105885751', '97.58930536618921', 'MAKAM DATOK PINING.jpeg'),
(35, 'Panorama Bur Reko', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Dabun Gelang', '3.9854070213087245', '97.48653787553722', 'BUR REKO.png'),
(36, 'Mesjid Asal Penampaan', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangkejeren', '3.9943968514993813', '97.34367872570978', 'MESJID ASAL PENAMPAAN FIKS.jpeg'),
(37, 'Kampung Inggris', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangkejeren', '3.90554754169594', '97.38600933396461', 'KAMPUNG INGGRIS.jpeg'),
(38, 'Uyem Beriring', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangkejeren', '3.9493640180417606', '97.36592668999604', 'UYEM BERIRING.jpeg'),
(39, 'Taman Nasional Gunung Leuser (TNGL)', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Kutapanjang', '3.75707575721471', '97.17395622481023', 'TAMAN NASIONAL GUNUNG LEUSER.jpeg'),
(40, 'Air terjun Rerebe', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Tripe Jaya', '4.057773108426153', '97.40632386577356', 'AIR TERJUN REREBE.jpeg'),
(41, 'Bukit Cinta', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangkejeren', '3.9569465283024665', '97.35648514268019', 'BUKIT CINTA.jpeg'),
(42, 'Puncak Genting', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Pining', '4.053857816984169', '97.40737527883213', 'PUNCAK GENTING.jpeg'),
(43, 'Pemandian Akang Siwah', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangpegayon', '3.9425760992733094', '97.31268120886729', 'AKANG SIWAH.jpeg'),
(44, 'Bur Jumpe', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangkejeren', '4.013863118651852', '97.35788742386038', 'BUR JUMPE.jpg'),
(45, 'Puncak Angkasan', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangjerango', '3.9348507811693705', '97.21576919502468', 'PUNCAK ANGKASAN.jpeg'),
(46, 'Air Terjun Pungke Jaya', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Putri Betung', '3.8955821859873856', '97.44048633813608', 'AIR TERJUN PUNGKE JAYA.jpeg'),
(47, 'Kolam Renang marmas', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Blangkejeren', '3.9780967609389903', '97.34758086194334', 'KOLAM RENANG MARMAS.jpeg'),
(48, 'TPU Datok Imem Bukit', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Kutapanjang', '4.0240881389193115', '97.30123315269606', 'TPU DATUK IMEM BUKIT.jpeg'),
(49, 'Pinus Blangsere', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Kutapanjang', '4.003797018348551', '97.31658189742518', 'WISATA BLANGSERE.jpeg'),
(50, 'Sumber Air Panas Singah Mulo', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'Putri Betung', '3.7716132542917826', '97.5867866061212', 'SUMBER AIR PANAS SINGAH MULO.jpeg'),
(55, 'Tobacco Hut', 'Tobacco Hut adalah tempat unik di Kabupaten Gayo Lues yang menghadirkan nuansa tradisional dan aroma khas tembakau pegunungan. Terletak di Kecamatan Blangkejeren, tempat ini menjadi destinasi favorit pecinta tembakau lokal dan wisatawan, menawarkan pengalaman autentik menikmati hasil bumi berkualitas tinggi dari dataran tinggi Aceh.', 'Blangkejeren', '3.983203351493721', '97.33299999462632', 'TOBACCO HUT.jpeg'),
(56, 'Kolam renang simpang telpi', 'Deksripsi', 'KecamatanContoh', '4.032156115073211', '97.355160814821', 'WhatsApp Image 2025-04-22 at 22.13.00_e348671b.jpg'),
(57, 'Pemandian Atu peltak', 'Deskripsi', 'Rikit gaib', '3.996502612425184', '97.34145041653514', 'ATU PELTAK.jpg'),
(58, 'Stadion Buntul Nege', 'Deskripsi', 'Blangpegayon', '3.9890411969150543', '97.30451833509858', 'STADION PACUAN KUDA BUNTUL NEGE.jpg'),
(59, 'Kolam Pemandian Penomon', 'Kolam Pemandian Penomon merupakan salah satu destinasi wisata alam yang menawarkan kesegaran air pegunungan yang jernih dan sejuk. Terletak di tengah suasana alam yang masih asri dan tenang, kolam ini menjadi tempat favorit bagi warga lokal maupun wisatawan yang ingin bersantai sambil menikmati kesejukan alam.', 'Kecamatan RIkit gaib', '4.120796309956227', '97.24846096629986', 'PENOMON.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user','guest') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'budi', 'budi@gmail.com', 'budi', 'user'),
(3, 'jeni', 'jeni@gmail.com', 'jeni', 'user'),
(4, 'sultan', 'sultan@gmail.com', 'sultan', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`id_data_kriteria`),
  ADD KEY `id_objek` (`id_objek`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_objek` (`id_objek`);

--
-- Indexes for table `hasil_prediksi`
--
ALTER TABLE `hasil_prediksi`
  ADD PRIMARY KEY (`id_prediksi`),
  ADD KEY `fk_objek` (`id_objek`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kunjungan_wisata`
--
ALTER TABLE `kunjungan_wisata`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `id_objek` (`id_objek`);

--
-- Indexes for table `log_model`
--
ALTER TABLE `log_model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `objek_wisata`
--
ALTER TABLE `objek_wisata`
  ADD PRIMARY KEY (`id_objek`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kriteria`
--
ALTER TABLE `data_kriteria`
  MODIFY `id_data_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=691;

--
-- AUTO_INCREMENT for table `hasil_prediksi`
--
ALTER TABLE `hasil_prediksi`
  MODIFY `id_prediksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kunjungan_wisata`
--
ALTER TABLE `kunjungan_wisata`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `log_model`
--
ALTER TABLE `log_model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `objek_wisata`
--
ALTER TABLE `objek_wisata`
  MODIFY `id_objek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD CONSTRAINT `data_kriteria_ibfk_1` FOREIGN KEY (`id_objek`) REFERENCES `objek_wisata` (`id_objek`),
  ADD CONSTRAINT `data_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_objek`) REFERENCES `objek_wisata` (`id_objek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_prediksi`
--
ALTER TABLE `hasil_prediksi`
  ADD CONSTRAINT `fk_objek` FOREIGN KEY (`id_objek`) REFERENCES `objek_wisata` (`id_objek`);

--
-- Constraints for table `kunjungan_wisata`
--
ALTER TABLE `kunjungan_wisata`
  ADD CONSTRAINT `kunjungan_wisata_ibfk_1` FOREIGN KEY (`id_objek`) REFERENCES `objek_wisata` (`id_objek`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
