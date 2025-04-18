-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2025 at 08:11 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.1

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
  `id_data_kriteria` int NOT NULL,
  `id_objek` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `nilai` varchar(100) COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `data_kriteria`
--

INSERT INTO `data_kriteria` (`id_data_kriteria`, `id_objek`, `id_kriteria`, `nilai`) VALUES
(2, 26, 1, '8'),
(3, 27, 1, '5'),
(4, 28, 1, '9'),
(5, 29, 1, '2'),
(6, 30, 1, '6'),
(7, 31, 1, '8'),
(8, 32, 1, '8'),
(9, 33, 1, '7'),
(10, 34, 1, '7'),
(11, 35, 1, '6'),
(12, 36, 1, '7'),
(13, 37, 1, '8'),
(14, 38, 1, '7'),
(15, 39, 1, '8'),
(16, 40, 1, '8'),
(17, 41, 1, '7'),
(18, 42, 1, '8'),
(19, 43, 1, '8'),
(20, 44, 1, '8'),
(21, 45, 1, '1'),
(22, 46, 1, '2'),
(23, 47, 1, '4'),
(24, 48, 1, '1'),
(25, 49, 1, '7'),
(26, 50, 1, '7'),
(27, 55, 1, '8'),
(28, 26, 2, '5'),
(29, 27, 2, '1'),
(30, 28, 2, '3'),
(31, 29, 2, '3'),
(32, 30, 2, '1'),
(33, 31, 2, '1'),
(34, 32, 2, '3'),
(35, 33, 2, '5'),
(36, 34, 2, '3'),
(37, 35, 2, '5'),
(38, 36, 2, '3'),
(39, 37, 2, '5'),
(40, 38, 2, '3'),
(41, 39, 2, '5'),
(42, 40, 2, '1'),
(43, 41, 2, '1'),
(44, 42, 2, '5'),
(45, 43, 2, '3'),
(46, 44, 2, '3'),
(47, 45, 2, '5'),
(48, 46, 2, '1'),
(49, 47, 2, '1'),
(50, 48, 2, '5'),
(51, 49, 2, '3'),
(52, 50, 2, '5'),
(53, 55, 2, '3'),
(54, 26, 3, '4.8'),
(55, 27, 3, '5.0'),
(56, 28, 3, '4.0'),
(57, 29, 3, '4.4'),
(58, 30, 3, '4.3'),
(59, 31, 3, '4.7'),
(60, 32, 3, '4.4'),
(61, 33, 3, '4.3'),
(62, 34, 3, '4.0'),
(63, 35, 3, '3.4'),
(64, 36, 3, '4.8'),
(65, 37, 3, '5.0'),
(66, 38, 3, '4.0'),
(67, 39, 3, '4.5'),
(68, 40, 3, '4.4'),
(69, 41, 3, '3.9'),
(70, 42, 3, '4.1'),
(71, 43, 3, '5.0'),
(72, 44, 3, '4.1'),
(73, 45, 3, '4.0'),
(74, 46, 3, '4.0'),
(75, 47, 3, '3.9'),
(76, 48, 3, '3.0'),
(77, 49, 3, '4.0'),
(78, 50, 3, '4.0'),
(79, 55, 3, '3.5'),
(80, 26, 4, '11517'),
(81, 27, 4, '942'),
(82, 28, 4, '108620'),
(83, 29, 4, '6292'),
(84, 30, 4, '9187'),
(85, 31, 4, '12234'),
(86, 32, 4, '19082'),
(87, 33, 4, '2360'),
(88, 34, 4, '2474'),
(89, 35, 4, '1665'),
(90, 36, 4, '54876'),
(91, 37, 4, '25005'),
(92, 38, 4, '6046'),
(93, 39, 4, '1199'),
(94, 40, 4, '42369'),
(95, 41, 4, '7525'),
(96, 42, 4, '30626'),
(97, 43, 4, '375'),
(98, 44, 4, '5741'),
(99, 45, 4, '1343'),
(100, 46, 4, '2524'),
(101, 47, 4, '1224'),
(102, 48, 4, '933'),
(103, 49, 4, '610'),
(104, 50, 4, '2689'),
(105, 55, 4, '1927'),
(106, 26, 6, '6.1'),
(107, 27, 6, '35.9'),
(108, 28, 6, '5.4'),
(109, 29, 6, '15.7'),
(110, 30, 6, '15.6'),
(111, 31, 6, '15.2'),
(112, 32, 6, '3.3'),
(113, 33, 6, '36.7'),
(114, 34, 6, '44.3'),
(115, 35, 6, '15.4'),
(116, 36, 6, '0.5'),
(117, 37, 6, '22.0'),
(118, 38, 6, '7.5'),
(119, 39, 6, '47.8'),
(120, 40, 6, '47.8'),
(121, 41, 6, '6.1'),
(122, 42, 6, '15.0'),
(123, 43, 6, '6.0'),
(124, 44, 6, '3.6'),
(125, 45, 6, '26.0'),
(126, 46, 6, '21.0'),
(127, 47, 6, '2.4'),
(128, 48, 6, '9.4'),
(129, 49, 6, '5.9'),
(130, 50, 6, '4.2'),
(131, 55, 6, '4.5');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int NOT NULL,
  `id_objek` int NOT NULL,
  `nama_fasilitas` varchar(100) COLLATE utf8mb3_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

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
(673, 50, 'spot poto');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_prediksi`
--

CREATE TABLE `hasil_prediksi` (
  `id_prediksi` int NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `hasil` varchar(100) COLLATE utf8mb3_swedish_ci NOT NULL,
  `id_objek` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `hasil_prediksi`
--

INSERT INTO `hasil_prediksi` (`id_prediksi`, `tanggal`, `hasil`, `id_objek`) VALUES
(9, '2025-04-19 01:27:33', 'Rendah', 28),
(10, '2025-04-19 02:54:21', 'Rendah', 28),
(11, '2025-04-19 02:55:17', 'Rendah', 46),
(12, '2025-04-19 02:55:43', 'Rendah', 40);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int NOT NULL,
  `nama_kriteria` varchar(100) COLLATE utf8mb3_swedish_ci NOT NULL,
  `penjelasan` text COLLATE utf8mb3_swedish_ci NOT NULL,
  `arah_potensi` varchar(10) COLLATE utf8mb3_swedish_ci NOT NULL,
  `satuan` varchar(50) COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `bobot` float DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

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
  `id_kunjungan` int NOT NULL,
  `id_objek` int NOT NULL,
  `tahun` year NOT NULL,
  `jumlah_pengunjung` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `kunjungan_wisata`
--

INSERT INTO `kunjungan_wisata` (`id_kunjungan`, `id_objek`, `tahun`, `jumlah_pengunjung`) VALUES
(1, 26, 2022, 1250),
(2, 26, 2023, 1580),
(3, 26, 2024, 1875),
(4, 27, 2022, 3420),
(5, 27, 2023, 4150),
(6, 27, 2024, 5680),
(7, 28, 2022, 2340),
(8, 28, 2023, 2780),
(9, 28, 2024, 3150),
(10, 29, 2022, 980),
(11, 29, 2023, 1120),
(12, 29, 2024, 1350),
(13, 30, 2022, 1150),
(14, 30, 2023, 1420),
(15, 30, 2024, 1680),
(16, 31, 2022, 1850),
(17, 31, 2023, 2240),
(18, 31, 2024, 2560),
(19, 32, 2022, 4650),
(20, 32, 2023, 5320),
(21, 32, 2024, 6780),
(22, 33, 2022, 2150),
(23, 33, 2023, 2580),
(24, 33, 2024, 3120),
(25, 34, 2022, 1580),
(26, 34, 2023, 1920),
(27, 34, 2024, 2350),
(28, 35, 2022, 3250),
(29, 35, 2023, 3780),
(30, 35, 2024, 4520),
(31, 36, 2022, 1420),
(32, 36, 2023, 1680),
(33, 36, 2024, 1950),
(34, 37, 2022, 3850),
(35, 37, 2023, 4320),
(36, 37, 2024, 5150),
(37, 38, 2022, 2150),
(38, 38, 2023, 2580),
(39, 38, 2024, 2950),
(40, 39, 2022, 7820),
(41, 39, 2023, 8650),
(42, 39, 2024, 9750),
(43, 40, 2022, 3450),
(44, 40, 2023, 4120),
(45, 40, 2024, 4850),
(46, 41, 2022, 4250),
(47, 41, 2023, 5120),
(48, 41, 2024, 6350),
(49, 42, 2022, 3650),
(50, 42, 2023, 4280),
(51, 42, 2024, 5150),
(52, 43, 2022, 2980),
(53, 43, 2023, 3450),
(54, 43, 2024, 4120),
(55, 44, 2022, 2150),
(56, 44, 2023, 2580),
(57, 44, 2024, 3120),
(58, 45, 2022, 1850),
(59, 45, 2023, 2240),
(60, 45, 2024, 2680),
(61, 46, 2022, 2350),
(62, 46, 2023, 2780),
(63, 46, 2024, 3450),
(64, 47, 2022, 3250),
(65, 47, 2023, 3680),
(66, 47, 2024, 4150),
(67, 48, 2022, 950),
(68, 48, 2023, 1150),
(69, 48, 2024, 1320),
(70, 49, 2022, 3150),
(71, 49, 2023, 3850),
(72, 49, 2024, 4620),
(73, 50, 2022, 2580),
(74, 50, 2023, 3120),
(75, 50, 2024, 3850),
(76, 55, 2022, 2150),
(77, 55, 2023, 2680),
(78, 55, 2024, 3250);

-- --------------------------------------------------------

--
-- Table structure for table `log_model`
--

CREATE TABLE `log_model` (
  `id_model` int NOT NULL,
  `tanggal_latih` date NOT NULL,
  `akurasi` decimal(5,4) DEFAULT NULL,
  `presisi` decimal(5,4) DEFAULT NULL,
  `recal` decimal(5,4) DEFAULT NULL,
  `f1_score` decimal(5,4) DEFAULT NULL,
  `jumlah_pohon` int DEFAULT NULL,
  `fitur_terpenting` text COLLATE utf8mb3_swedish_ci,
  `conf_matrix_json` text COLLATE utf8mb3_swedish_ci,
  `parameter_model` text COLLATE utf8mb3_swedish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `log_model`
--

INSERT INTO `log_model` (`id_model`, `tanggal_latih`, `akurasi`, `presisi`, `recal`, `f1_score`, `jumlah_pohon`, `fitur_terpenting`, `conf_matrix_json`, `parameter_model`) VALUES
(6, '2025-04-19', '1.0000', '1.0000', '1.0000', '1.0000', 100, '{\"Fasilitas\": 0.1639027359280484, \"Akses Jalan\": 0.04766457425493512, \"Rating Pengunjung\": 0.05646881233991183, \"Jumlah Pengunjung\": 0.4925195282112053, \"Jarak ke Kota\": 0.2394443492658993}', '[[6]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}'),
(7, '2025-04-19', '1.0000', '1.0000', '1.0000', '1.0000', 100, '{\"fasilitas\": 0.1639027359280484, \"akses_jalan\": 0.04766457425493512, \"rating_pengunjung\": 0.05646881233991183, \"jumlah_pengunjung\": 0.4925195282112053, \"jarak_ke_kota\": 0.2394443492658993}', '[[6, 0, 0], [0, 0, 0], [0, 0, 0]]', '{\"bootstrap\": \"True\", \"ccp_alpha\": \"0.0\", \"class_weight\": \"None\", \"criterion\": \"gini\", \"max_depth\": \"None\", \"max_features\": \"sqrt\", \"max_leaf_nodes\": \"None\", \"max_samples\": \"None\", \"min_impurity_decrease\": \"0.0\", \"min_samples_leaf\": \"1\", \"min_samples_split\": \"2\", \"min_weight_fraction_leaf\": \"0.0\", \"monotonic_cst\": \"None\", \"n_estimators\": \"100\", \"n_jobs\": \"None\", \"oob_score\": \"False\", \"random_state\": \"42\", \"verbose\": \"0\", \"warm_start\": \"False\"}');

-- --------------------------------------------------------

--
-- Table structure for table `objek_wisata`
--

CREATE TABLE `objek_wisata` (
  `id_objek` int NOT NULL,
  `nama_objek` varchar(100) COLLATE utf8mb3_swedish_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb3_swedish_ci,
  `kecamatan` varchar(100) COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb3_swedish_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb3_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `objek_wisata`
--

INSERT INTO `objek_wisata` (`id_objek`, `nama_objek`, `deskripsi`, `kecamatan`, `latitude`, `longitude`, `foto`) VALUES
(26, 'Mesjid Asal peparik', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.017576413941228', '97.26762983620505', 'MESJID ASAL PEPARIK.jpeg'),
(27, 'Puncak Dedalu', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.061404322164484', '97.10172876983013', 'PUNCAK TERANGUN.jpeg'),
(28, 'Aih Kala Pinang ', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.035433766297055', '97.33441741488646', 'AIH KALA PINANG.jpeg'),
(29, 'Berawang Lopah', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.022689775361257', '97.2438519796822', 'BERAWANG LOPAH.jpg'),
(30, 'Berawang Tasik', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.025212243398782', '97.23968576618906', 'BERAWANG TASIK.jpeg'),
(31, 'Lestari Ayu Kedah', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.9901352933750696', '97.25586029365179', 'LESTARI AYU KEDAH.jpeg'),
(32, 'Taman Mini Gayo Indah (TMGI)', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.996951537739622', '97.32596779573143', 'TAMAN MINI GAYO INDAH.jpg'),
(33, 'Bur Godang', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.21146196776865', '97.14596051044721', 'BUR GODANG (1).jpeg'),
(34, 'Makam Datok Pining', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.109520105885751', '97.58930536618921', 'MAKAM DATOK PINING.jpeg'),
(35, 'Panorama Bur Reko', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.9854070213087245', '97.48653787553722', 'BUR REKO.png'),
(36, 'Mesjid Asal Penampaan', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.9943968514993813', '97.34367872570978', 'MESJID ASAL PENAMPAAN FIKS.jpeg'),
(37, 'Kampung Inggris', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.90554754169594', '97.38600933396461', 'KAMPUNG INGGRIS.jpeg'),
(38, 'Uyem Beriring', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.9493640180417606', '97.36592668999604', 'UYEM BERIRING.jpeg'),
(39, 'Taman Nasional Gunung Leuser (TNGL)', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.75707575721471', '97.17395622481023', 'TAMAN NASIONAL GUNUNG LEUSER.jpeg'),
(40, 'Air terjun Rerebe', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.057773108426153', '97.40632386577356', 'AIR TERJUN REREBE.jpeg'),
(41, 'Bukit Cinta', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.9569465283024665', '97.35648514268019', 'BUKIT CINTA.jpeg'),
(42, 'Puncak Genting', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.053857816984169', '97.40737527883213', 'PUNCAK GENTING.jpeg'),
(43, 'Pemandian Akang Siwah', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.9425760992733094', '97.31268120886729', 'AKANG SIWAH.jpeg'),
(44, 'Bur Jumpe', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.013863118651852', '97.35788742386038', 'BUR JUMPE.jpg'),
(45, 'Puncak Angkasan', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.9348507811693705', '97.21576919502468', 'PUNCAK ANGKASAN.jpeg'),
(46, 'Air Terjun Pungke Jaya', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.5311636656944625', '96.00570339016275', 'AIR TERJUN PUNGKE JAYA.jpeg'),
(47, 'Kolam Renang marmas', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.9780967609389903', '97.34758086194334', 'KOLAM RENANG MARMAS.jpeg'),
(48, 'TPU Datok Imem Bukit', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.0240881389193115', '97.30123315269606', 'TPU DATUK IMEM BUKIT.jpeg'),
(49, 'Pinus Blangsere', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '4.003797018348551', '97.31658189742518', 'WISATA BLANGSERE.jpeg'),
(50, 'Sumber Air Panas Singah Mulo', 'Deskripsi singkat objek wisata ini menjelaskan daya tarik alam, budaya, atau sejarah yang khas dari tempat tersebut.', 'KecamatanContoh', '3.7716132542917826', '97.5867866061212', 'SUMBER AIR PANAS SINGAH MULO.jpeg'),
(55, 'Tobacco Hut', 'Tobacco Hut adalah tempat unik di Kabupaten Gayo Lues yang menghadirkan nuansa tradisional dan aroma khas tembakau pegunungan. Terletak di Kecamatan Blangkejeren, tempat ini menjadi destinasi favorit pecinta tembakau lokal dan wisatawan, menawarkan pengalaman autentik menikmati hasil bumi berkualitas tinggi dari dataran tinggi Aceh.', 'Blangkejeren', '3.983203351493721', '97.33299999462632', 'TOBACCO HUT.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb3_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_swedish_ci NOT NULL,
  `level` enum('admin','user','guest') COLLATE utf8mb3_swedish_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'budi', 'budi@gmail.com', 'budi', 'user'),
(3, 'jeni', 'jeni@gmail.com', 'jeni', 'user');

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
  MODIFY `id_data_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=675;

--
-- AUTO_INCREMENT for table `hasil_prediksi`
--
ALTER TABLE `hasil_prediksi`
  MODIFY `id_prediksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kunjungan_wisata`
--
ALTER TABLE `kunjungan_wisata`
  MODIFY `id_kunjungan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `log_model`
--
ALTER TABLE `log_model`
  MODIFY `id_model` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `objek_wisata`
--
ALTER TABLE `objek_wisata`
  MODIFY `id_objek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
