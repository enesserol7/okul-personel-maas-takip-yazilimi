-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Eyl 2020, 23:49:25
-- Sunucu sürümü: 10.3.23-MariaDB
-- PHP Sürümü: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yazili20_staffTrackingDB`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `advance_payment`
--

CREATE TABLE `advance_payment` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `personnel_name` varchar(255) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `payment_made` varchar(255) DEFAULT NULL,
  `remaining_payment` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `year_month` date DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `reason_for_rejection` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `branch_list`
--

CREATE TABLE `branch_list` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `branch_list`
--

INSERT INTO `branch_list` (`id`, `title`, `isActive`) VALUES
(2, 'Matematik', 1),
(3, 'Fizik', 1),
(4, 'Türkçe', 1),
(5, 'Tarih', 1),
(6, 'İngilizce', 1),
(7, 'Eğitim Danışmanı', 1),
(8, 'Müdür', 1),
(9, 'Temizlik Görevlisi', 1),
(10, 'Bilgi İşlem', 1),
(11, 'Güvenlik Görevlisi', 1),
(12, 'Sınıf Öğretmeni', 1),
(13, 'Biyoloji', 1),
(14, 'Coğrafya', 1),
(15, 'Rehber Öğretmeni', 1),
(16, 'Kimya Öğretmeni', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `personnel_name` varchar(255) DEFAULT NULL,
  `tc` varchar(20) DEFAULT NULL,
  `registration_number` int(11) DEFAULT NULL,
  `personnel_phone` varchar(25) DEFAULT NULL,
  `iban` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `sub_branch_id` int(11) DEFAULT NULL,
  `sub_branch` varchar(255) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `insurance_status` tinyint(4) DEFAULT NULL,
  `net_salary` varchar(100) DEFAULT NULL,
  `official_salary` varchar(100) DEFAULT NULL,
  `copy_of_identity_card` varchar(255) DEFAULT NULL,
  `criminal_record` varchar(255) DEFAULT NULL,
  `place_of_residence` varchar(255) DEFAULT NULL,
  `health_report` varchar(255) DEFAULT NULL,
  `contract` varchar(255) DEFAULT NULL,
  `diploma` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `customer_status` tinyint(4) DEFAULT NULL,
  `reason_for_rejection` text DEFAULT NULL,
  `black_list` tinyint(4) DEFAULT NULL,
  `black_list_description` text DEFAULT NULL,
  `isActivePersonnel` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `institution_id`, `institution_name`, `personnel_name`, `tc`, `registration_number`, `personnel_phone`, `iban`, `date_of_birth`, `branch`, `sub_branch_id`, `sub_branch`, `entry_date`, `insurance_status`, `net_salary`, `official_salary`, `copy_of_identity_card`, `criminal_record`, `place_of_residence`, `health_report`, `contract`, `diploma`, `image`, `gender`, `rank`, `isActive`, `customer_status`, `reason_for_rejection`, `black_list`, `black_list_description`, `isActivePersonnel`) VALUES
(1, 1, 'Bayi 1', 'ENES EROL', '164164646', 2147483647, '55555555', NULL, NULL, NULL, NULL, NULL, '2019-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 0),
(2, 1, 'Bayi 1', 'ZDGD ZDGFX', '45646', 53656, '5365346', NULL, NULL, NULL, NULL, NULL, '2011-05-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, NULL, NULL, NULL, NULL, 0),
(3, 2, 'Bayi 2', 'DGFDFG FDGF', '5645645', 5654654, '6546456', NULL, NULL, NULL, NULL, NULL, '2019-10-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, NULL, NULL, NULL, NULL, 0),
(4, 2, 'Bayi 2', 'DFGDFG ZDFG', '1565', 165654, '446546', NULL, NULL, NULL, NULL, NULL, '2019-11-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, NULL, NULL, NULL, NULL, 0),
(5, 3, 'Bayi 3', 'FCGXCF GHGFXH', '5151', 551515, '1556151', NULL, NULL, NULL, NULL, NULL, '2015-05-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, NULL, NULL, NULL, NULL, 0),
(6, 3, 'Bayi 3', 'FGX GHG', '154165', 4654654, '46546', NULL, NULL, NULL, NULL, NULL, '2016-05-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 6, NULL, NULL, NULL, NULL, 0),
(7, 3, 'Bayi 3', 'FGHCFG TFHG', '4654564', 56465465, '646654', NULL, NULL, NULL, NULL, NULL, '1997-04-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `institutions`
--

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `phone_1` varchar(25) DEFAULT NULL,
  `phone_2` varchar(25) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `administrator_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `institutions`
--

INSERT INTO `institutions` (`id`, `title`, `url`, `phone_1`, `phone_2`, `email`, `administrator_name`, `address`, `description`, `isActive`, `rank`, `createdAt`) VALUES
(8, 'Florya Final Etüt Merkezi', 'florya-final-etut-merkezi', '', '', '', '', 'Florya', '', 1, 0, '2019-03-08 00:12:35'),
(7, 'Sultangazi Çözüm Temel Lisesi', 'sultangazi-cozum-temel-lisesi', '', '', '', '', 'Sultangazi', '', 1, 0, '2019-03-08 00:11:29'),
(9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'tepeustu-atakent-ozel-ogretim-kursu', '', '', '', '', 'Tepeüstü', '', 1, 0, '2019-03-08 00:12:55'),
(10, 'Şişli Final Okulları', 'sisli-final-okullari', '', '', '', '', 'Şişli', '', 1, 0, '2019-03-08 00:13:18'),
(11, 'Genel Müdürlük', 'genel-mudurluk', '', '', '', '', 'Genel Müdürlük', '', 1, 0, '2019-03-08 00:13:39'),
(12, 'Bahçelievler Final Etüt Merkezi', 'bahcelievler-final-etut-merkezi', '', '', '', '', 'Bahçelievler', '', 1, 0, '2019-03-08 00:13:57'),
(13, 'Bayrampaşa Uğur Temel Lisesi', 'bayrampasa-ugur-temel-lisesi', '', '', '', '', 'Bayrampaşa', '', 1, 0, '2019-03-08 00:14:31'),
(14, 'Avcılar Çözüm Etüt Merkezi', 'avcilar-cozum-etut-merkezi', '', '', '', '', 'Avcılar', '', 1, 0, '2019-03-08 00:14:57'),
(15, 'Tarabya Final Özel Öğretim Kursu', 'tarabya-final-ozel-ogretim-kursu', '', '', '', '', 'Tarabya', '', 1, 0, '2019-03-08 00:15:13'),
(16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'esenler-fen-bilimleri-ozel-ogretim-kursu', '', '', '', '', 'Esenler', '', 1, 0, '2019-03-08 00:15:35'),
(17, 'Sultangazi Final Etüt Merkezi', 'sultangazi-final-etut-merkezi', '', '', '', '', 'Sultangazi', '', 1, 0, '2019-03-08 00:15:53'),
(18, 'Çamlıca Final Okulları', 'camlica-final-okullari', '', '', '', '', 'Çamlıca', '', 1, 0, '2019-03-08 00:16:07'),
(19, 'Mimaroba Final Özel Öğretim Kursu', 'mimaroba-final-ozel-ogretim-kursu', '', '', '', '', 'Mimaroba', '', 1, 0, '2019-03-08 00:16:20'),
(20, 'Beşyol Final Özel Öğretim Kursu', 'besyol-final-ozel-ogretim-kursu', '', '', '', '', 'Beşyol', '', 1, 0, '2019-03-08 00:16:34'),
(21, 'Halkalı Final Etüt Merkezi', 'halkali-final-etut-merkezi', '', '', '', '', 'Halkalı', '', 1, 0, '2019-03-08 00:16:48'),
(22, 'Kağıthane Final Özel Öğretim Kursu', 'kagithane-final-ozel-ogretim-kursu', '', '', '', '', 'Kağıthane', '', 1, 0, '2019-03-08 00:17:01'),
(23, 'Kağıthane Final Temel Lisesi', 'kagithane-final-temel-lisesi', '', '', '', '', 'Kağıthane', '', 1, 0, '2019-03-08 00:17:18'),
(24, 'Şirinevler Final Özel Öğretim Kursu', 'sirinevler-final-ozel-ogretim-kursu', '', '', '', '', 'Şirinevler', '', 1, 0, '2019-03-08 00:17:32'),
(25, 'Samsun Sevinç Okulları', 'samsun-sevinc-okullari', '', '', '', '', 'Samsun', '', 1, 0, '2019-03-08 00:17:46'),
(26, 'Halkalı Çözüm Temel Lisesi', 'halkali-cozum-temel-lisesi', '', '', '', '', 'Halkalı', '', 1, 0, '2019-03-08 00:18:00'),
(27, 'Ankara Final Okulları', 'ankara-final-okullari', '', '', '', '', 'Ankara', '', 1, 0, '2019-03-08 00:18:14'),
(28, 'Mimaroba Final Okulları', 'mimaroba-final-okullari', '', '', '', '', 'Mimaroba', '', 1, 0, '2019-03-08 00:18:28'),
(29, 'Halkalı Çözüm Etüt Merkezi', 'halkali-cozum-etut-merkezi', '', '', '', '', 'Halkalı', '', 1, 0, '2019-03-08 00:18:43'),
(30, 'Ümraniye Atakent Özel Öğretim Kursu', 'umraniye-atakent-ozel-ogretim-kursu', '', '', '', '', 'Ümraniye', '', 1, 0, '2019-03-08 00:18:56'),
(31, 'Şirinevler Final Etüt Merkezi', 'sirinevler-final-etut-merkezi', '', '', '', '', 'Şirinevler', '', 1, 0, '2019-03-08 00:19:09'),
(32, 'Sultangazi Uğur Temel Lisesi', 'sultangazi-ugur-temel-lisesi', '', '', '', '', 'Sultangazi', '', 1, 0, '2019-03-08 00:19:24'),
(33, 'Tarabya Final Okulları', 'tarabya-final-okullari', '', '', '', '', 'Tarabya', '', 1, 0, '2019-03-08 00:19:36'),
(34, 'Sefaköy Final Etüt Merkezi', 'sefakoy-final-etut-merkezi', '', '', '', '', 'Sefaköy', '', 1, 0, '2019-03-08 00:19:51'),
(35, 'Avcılar Çözüm Okulları', 'avcilar-cozum-okullari', '', '', '', '', 'Avcılar', '', 1, 0, '2019-03-08 00:20:04'),
(36, 'Avcılar Çözüm Özel Öğretim Kursu', 'avcilar-cozum-ozel-ogretim-kursu', '', '', '', '', 'Avcılar', '', 1, 0, '2019-03-08 00:20:19'),
(37, 'Kağıthane Final Okulları', 'kagithane-final-okullari', '', '', '', '', 'Kağıthane', '', 1, 0, '2019-03-08 00:20:34'),
(38, 'Bakırköy Final Etüt Merkezi', 'bakirkoy-final-etut-merkezi', '', '', '', '', 'Bakırköy', '', 1, 0, '2019-03-08 00:20:46'),
(39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'halkali-fen-bilimleri-ozel-ogretim-kursu', '', '', '', '', 'Halkalı', '', 1, 0, '2019-03-08 00:20:59'),
(40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'fen-bilimleri-okullari-atakent', '', '', '', '', 'ATAKENT', '', 1, 0, '2019-03-08 00:21:59'),
(41, 'Bahçelievler Final Özel Öğretim Kursu', 'bahcelievler-final-ozel-ogretim-kursu', '0533 655 29 06', '', 'fatihozbay34@gmail.com', 'FATİH ÖZBAY', 'Bahçelievler', 'Bahçelievler Final Özel Öğretim Kursu', 1, 0, '2019-03-21 01:15:09'),
(42, 'Bahçelievler Final Okulları', 'bahcelievler-final-okullari', '0505 765 91 93', '', 'ayhancandir@hotmail.com', 'AYHAN ÇANDIR', 'Bahçelievler', 'Bahçelievler Final Okulları', 1, 0, '2019-03-21 01:15:42'),
(43, 'Bakırköy Final Kişisel Gelişim Kursu', 'bakirkoy-final-kisisel-gelisim-kursu', '0545 857 51 03', '', 'muhammedbeyhan@hotmail.com', 'MUHAMMED BEYHAN', 'Bakırköy', 'Bakırköy Final Kişisel Gelişim Kursu', 1, 0, '2019-03-21 01:16:05'),
(44, 'Bağcılar Final Özel Öğretim Kursu', 'bagcilar-final-ozel-ogretim-kursu', '0553 650 07 53', '', 'mail.muratyavuz@gmail.com', 'MURAT YAVUZ', 'Bağcılar', 'Bağcılar Final Özel Öğretim Kursu', 1, 0, '2019-03-21 01:16:52'),
(45, 'Halkalı Final Özel Öğretim Kursu', 'halkali-final-ozel-ogretim-kursu', '0555 014 35 75', '', 'edebiyatertugrul@gmail.com', 'ERTUĞRUL ALTUNTAŞ', 'Halkalı', 'Halkalı Final Özel Öğretim Kursu', 1, 0, '2019-03-21 01:17:26'),
(46, 'Kağıthane Final Etüt Merkezi', 'kagithane-final-etut-merkezi', '0532 742 78 94', '', 'selcuk-036@hotmail.com', 'SELÇUK BAŞKAYA', 'Kağıthane', 'Kağıthane Final Etüt Merkezi', 1, 0, '2019-03-21 01:17:59'),
(47, 'Şirinevler Final Kişisel Gelişim Kursu', 'sirinevler-final-kisisel-gelisim-kursu', '0532 212 23 78', '', 'huseyin_cozum@hotmail.com', 'HÜSEYİN AYDIN', 'Şirinevler', 'Şirinevler Final Kişisel Gelişim Kursu', 1, 0, '2019-03-21 01:18:25'),
(49, 'Bayrampaşa Atakent Özel Öğretim Kursu', 'bayrampasa-atakent-ozel-ogretim-kursu', '90 507 840 01 07', '', 'harun.turkan@ugurokullari.k12.tr', 'Harun Türkan', 'Yenidoğan Mah. Abdi İpekçi Cad. No:69 Bayrampaşa/İstanbul', '', 1, 0, '2019-07-31 10:43:38'),
(50, 'Bayrampaşa Atakent Okulları', 'bayrampasa-atakent-okullari', '0505 708 41 17', '', 'cmfinal57@gmail.com', 'Cumali Mısırlı', 'Yenidoğan Mah. Numunebağ cad. Özgür sok. No 5. Bayrampaşa / İstanbul\r\n', '', 1, 0, '2019-07-31 15:34:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `institution_report`
--

CREATE TABLE `institution_report` (
  `id` int(11) NOT NULL,
  `institution_user_id` int(11) DEFAULT NULL,
  `institution_user_name` varchar(255) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `report` varchar(255) DEFAULT NULL,
  `report_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `institution_users`
--

CREATE TABLE `institution_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_role_id` int(11) NOT NULL DEFAULT 2,
  `institution_id` int(11) NOT NULL,
  `institution_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `institution_users`
--

INSERT INTO `institution_users` (`id`, `user_name`, `full_name`, `email`, `password`, `permissions`, `user_role_id`, `institution_id`, `institution_name`, `isActive`, `createdAt`) VALUES
(19, 'kefeli_61@hotmail.com', 'serkan', 'kefeli_61@hotmail.com', 'a215a57f7e25318fd8746685713ec37a', '{\"27\":{\"read\":\"on\"},\"35\":{\"read\":\"on\"},\"36\":{\"read\":\"on\"},\"11\":{\"read\":\"on\"}}', 16, 11, 'Genel Müdürlük', 1, '2019-03-13 17:11:58'),
(20, 'muratdereli', 'MURAT DERELİ', 'mdereli24@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"14\":{\"read\":\"on\"}}', 19, 14, 'Avcılar Çözüm Etüt Merkezi', 0, '2019-03-21 00:49:14'),
(21, 'cagdacal', 'ÇAĞDA ÇAL', 'cagdacal@gmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"29\":{\"read\":\"on\"}}', 34, 29, 'Halkalı Çözüm Etüt Merkezi', 0, '2019-03-21 00:50:23'),
(22, 'onurayrilma', 'ONUR AYRILMA', 'onuray_78@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"35\":{\"read\":\"on\"}}', 40, 35, 'Avcılar Çözüm Okulları', 0, '2019-03-21 00:51:22'),
(23, 'firat1', 'FIRAT AKŞİN', 'sosyo.firat@gmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"36\":{\"read\":\"on\"}}', 41, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 0, '2019-03-21 00:53:26'),
(24, 'sinemparlak', 'SİNEM PARLAK', 'sinem.parlak34@gmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"26\":{\"read\":\"on\"}}', 31, 26, 'Halkalı Çözüm Temel Lisesi', 0, '2019-03-21 00:54:08'),
(25, 'fatihozbay', 'FATİH ÖZBAY', 'fatihozbay34@gmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"41\":{\"read\":\"on\"}}', 12, 7, 'Sultangazi Çözüm Temel Lisesi', 0, '2019-03-21 00:55:07'),
(26, 'emreyayci', 'EMRE YAYCI', 'emreyayci1907@gmail.com', '512e1825b6cd4447f6fb5bcf73f7acc9', '{\"16\":{\"read\":\"on\"}}', 21, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 0, '2019-03-21 00:56:00'),
(27, 'sedatyildiz', 'SEDAT YILDIZ', 'sedat.yildiz6221@gmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"39\":{\"read\":\"on\"}}', 44, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 0, '2019-03-21 00:57:46'),
(28, 'arafataktas', 'ARAFAT AKTAŞ', 'arafatt_aktas@hotmail.com.tr', '25d55ad283aa400af464c76d713c07ad', '{\"8\":{\"read\":\"on\"}}', 13, 8, 'Florya Final Etüt Merkezi', 0, '2019-03-21 01:00:50'),
(29, 'muhammetvurkan', 'muhammet vurkan', 'fthmuhammet@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"34\":{\"read\":\"on\"}}', 39, 34, 'Sefaköy Final Etüt Merkezi', 0, '2019-03-21 01:02:36'),
(30, 'korayormanci', 'KORAY ORMANCI', 'korayormanci@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"17\":{\"read\":\"on\"}}', 22, 17, 'Sultangazi Final Etüt Merkezi', 0, '2019-03-21 01:03:15'),
(31, 'serkanuguryalap', 'SERKAN UĞUR YALAP', 'ugur8384@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"27\":{\"read\":\"on\"}}', 32, 27, 'Ankara Final Okulları', 0, '2019-03-21 01:04:23'),
(32, 'salimyasar', 'SALİM YAŞAR', 'salimyasar79@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"18\":{\"read\":\"on\"}}', 23, 18, 'Çamlıca Final Okulları', 0, '2019-03-21 01:04:50'),
(34, 'bernarabiaes', 'BERNA RABİA EŞ', 'bernarabiaes@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"28\":{\"read\":\"on\"}}', 33, 28, 'Mimaroba Final Okulları', 0, '2019-03-21 01:06:06'),
(35, 'mertarslan', 'MEHMET MERT ARSLAN', 'mehmetmertarslann@gmail.com', '234ef7ce6edd06dddfd6f2405f425c1f', '{\"10\":{\"read\":\"on\"}}', 15, 10, 'Şişli Final Okulları', 0, '2019-03-21 01:06:33'),
(36, 'muhammedalp', 'MUHAMMED ALP', 'alp@hotmail.fi', '25d55ad283aa400af464c76d713c07ad', '{\"33\":{\"read\":\"on\"}}', 38, 33, 'Tarabya Final Okulları', 0, '2019-03-21 01:07:11'),
(37, 'aliberaterzu', 'ALİ BERAT ERZÜ', 'aliberaterzu@gmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"20\":{\"read\":\"on\"}}', 25, 20, 'Beşyol Final Özel Öğretim Kursu', 0, '2019-03-21 01:08:18'),
(38, 'selcukbaskaya', 'SELÇUK BAŞKAYA', 'selcuk-036@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"22\":{\"read\":\"on\"}}', 27, 22, 'Kağıthane Final Özel Öğretim Kursu', 0, '2019-03-21 01:08:59'),
(39, 'candizdar', 'CAN DİZDAR', 'candizdar_28@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"19\":{\"read\":\"on\"}}', 24, 19, 'Mimaroba Final Özel Öğretim Kursu', 0, '2019-03-21 01:09:44'),
(40, 'rasulates', 'RESÜL ATEŞ', 'atesresul@hotmail.com', '25d55ad283aa400af464c76d713c07ad', 'null', 54, 24, 'Şirinevler Final Özel Öğretim Kursu', 0, '2019-03-21 01:10:13'),
(41, 'mehmetgunduz', 'Mehmet GÜNDÜZ', 'boltedyoung@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"37\":{\"read\":\"on\"}}', 42, 37, 'Kağıthane Final Okulları', 0, '2019-03-21 01:10:47'),
(42, 'cumalimisirli', 'CUMALİ MISIRLI', 'cmfinal57@gmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"50\":{\"read\":\"on\"}}', 28, 23, 'Kağıthane Final Temel Lisesi', 0, '2019-03-21 01:11:20'),
(43, 'erhanyildirim', 'ERHAN YILDIRIM', 'erhanyldrm34@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"9\":{\"read\":\"on\"}}', 14, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 0, '2019-03-21 01:12:17'),
(44, 'meltemalbayrak', 'MELTEM ALBAYRAK', 'meltem_albayrak@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"30\":{\"read\":\"on\"}}', 35, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 0, '2019-03-21 01:12:47'),
(45, 'semihates', 'SEMİH ATEŞ', 'himes_seta@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"25\":{\"read\":\"on\"}}', 30, 25, 'Samsun Sevinç Okulları', 0, '2019-03-21 01:13:18'),
(47, 'umutemreerdogan', 'UMUT EMRE ERDOĞAN', 'erdoganumutemre@gmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"32\":{\"read\":\"on\"}}', 37, 32, 'Sultangazi Uğur Temel Lisesi', 0, '2019-03-21 01:14:21'),
(48, 'fatihozbay1', 'FATİH ÖZBAY', 'fatihozbay341@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'null', 46, 41, 'Bahçelievler Final Özel Öğretim Kursu', 0, '2019-03-21 01:21:24'),
(49, 'ayhancandir', 'AYHAN ÇANDIR', 'ayhancandir@hotmail.com', 'c4b2e8e8786ab1eac2700c49da4b9269', '{\"42\":{\"read\":\"on\"}}', 47, 42, 'Bahçelievler Final Okulları', 0, '2019-03-21 01:21:57'),
(50, 'muhammedbeyhan', 'MUHAMMED BEYHAN', 'muhammedbeyhan@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"44\":{\"read\":\"on\"}}', 49, 38, 'Bakırköy Final Etüt Merkezi', 0, '2019-03-21 01:22:45'),
(52, 'ertugrulaltuntas', 'ERTUĞRUL ALTUNTAŞ', 'edebiyatertugrul@gmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"24\":{\"read\":\"on\"}}', 50, 45, 'Halkalı Final Özel Öğretim Kursu', 0, '2019-03-21 01:23:50'),
(53, 'selcukbaskaya1', 'SELÇUK BAŞKAYA', 'selcuk-0361@hotmail.com', '52368756395c0b274828494e06cd0b69', '{\"46\":{\"read\":\"on\"}}', 51, 46, 'Kağıthane Final Etüt Merkezi', 0, '2019-03-21 01:24:40'),
(54, 'huseyinaydin', 'HÜSEYİN AYDIN', 'huseyin_cozum@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"47\":{\"read\":\"on\"}}', 45, 47, 'Şirinevler Final Kişisel Gelişim Kursu', 0, '2019-03-21 01:25:08'),
(55, 'hakantaspulat', 'HAKAN TAŞPULAT', 'hakantaspulat@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"40\":{\"read\":\"on\"}}', 45, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 0, '2019-04-18 17:21:16'),
(56, 'boltedyoung@hotmail.com', 'MEHMET GÜNDÜZ', 'boltedyoung@hotmail.com.TR', '25d55ad283aa400af464c76d713c07ad', '{\"15\":{\"read\":\"on\"}}', 20, 15, 'Tarabya Final Özel Öğretim Kursu', 0, '2019-04-24 11:37:32'),
(60, 'denemeuser', 'deneme user', 'denemeuser@denemeuser.com', '8b4cf0258846b23e0a8272bee22c38dd', '{\"27\":{\"read\":\"on\"},\"14\":{\"read\":\"on\"},\"36\":{\"read\":\"on\"},\"44\":{\"read\":\"on\"},\"41\":{\"read\":\"on\"},\"38\":{\"read\":\"on\"},\"43\":{\"read\":\"on\"},\"8\":{\"read\":\"on\"},\"11\":{\"read\":\"on\"},\"21\":{\"read\":\"on\"},\"45\":{\"read\":\"on\"},\"37\":{\"read\":\"on\"},\"34\":{\"read\":\"on\"},\"47\":{\"read\":\"on\"},\"32\":{\"read\":\"on\"},\"33\":{\"read\":\"on\"},\"9\":{\"read\":\"on\"},\"30\":{\"read\":\"on\"}}', 13, 0, '', 0, '2019-05-20 21:46:56'),
(61, 'kefeliserkan', 'serkan kefeli', 'kefeliserkan@gmail.com', '25f9e794323b453885f5181f1b624d0b', '{\"46\":{\"read\":\"on\"},\"37\":{\"read\":\"on\"},\"23\":{\"read\":\"on\"}}', 51, 0, '', 0, '2019-05-21 14:38:45'),
(63, 'fatihince', 'FATİH İNCE', 'fatih37_ince@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '{\"49\":{\"read\":\"on\"}}', 54, 0, '', 0, '2019-08-02 12:01:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `institution_user_roles`
--

CREATE TABLE `institution_user_roles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `permissions` text DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `institution_user_roles`
--

INSERT INTO `institution_user_roles` (`id`, `title`, `permissions`, `institution_id`, `isActive`, `createdAt`) VALUES
(41, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 36, 1, '2019-03-08 00:28:11'),
(42, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"branch\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 37, 1, '2019-03-08 00:28:31'),
(43, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 38, 1, '2019-03-08 00:28:40'),
(44, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 39, 1, '2019-03-08 00:28:48'),
(45, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 40, 1, '2019-03-08 00:28:56'),
(40, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 35, 1, '2019-03-08 00:28:03'),
(26, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 21, 1, '2019-03-08 00:25:42'),
(27, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 22, 1, '2019-03-08 00:25:49'),
(28, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"branch\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 23, 1, '2019-03-08 00:25:58'),
(29, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 24, 1, '2019-03-08 00:26:10'),
(30, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 25, 1, '2019-03-08 00:26:18'),
(31, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 26, 1, '2019-03-08 00:26:25'),
(32, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 27, 1, '2019-03-08 00:26:36'),
(33, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 28, 1, '2019-03-08 00:26:46'),
(34, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 29, 1, '2019-03-08 00:26:55'),
(35, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 30, 1, '2019-03-08 00:27:03'),
(36, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 31, 1, '2019-03-08 00:27:21'),
(37, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 32, 1, '2019-03-08 00:27:34'),
(38, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 33, 1, '2019-03-08 00:27:43'),
(39, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 34, 1, '2019-03-08 00:27:52'),
(25, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 20, 1, '2019-03-08 00:25:34'),
(12, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 7, 1, '2019-03-08 00:23:34'),
(13, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 8, 1, '2019-03-08 00:23:42'),
(14, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 9, 1, '2019-03-08 00:23:52'),
(15, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 10, 1, '2019-03-08 00:23:59'),
(16, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 11, 1, '2019-03-08 00:24:08'),
(17, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 12, 1, '2019-03-08 00:24:16'),
(18, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 13, 1, '2019-03-08 00:24:25'),
(19, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 14, 1, '2019-03-08 00:24:34'),
(20, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 15, 1, '2019-03-08 00:24:47'),
(21, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 16, 1, '2019-03-08 00:24:58'),
(22, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 17, 1, '2019-03-08 00:25:08'),
(23, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 18, 1, '2019-03-08 00:25:16'),
(24, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 19, 1, '2019-03-08 00:25:24'),
(46, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 41, 1, '2019-03-21 01:18:56'),
(47, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 42, 1, '2019-03-21 01:19:08'),
(48, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 43, 1, '2019-03-21 01:19:19'),
(49, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 44, 1, '2019-03-21 01:19:28'),
(50, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 45, 1, '2019-03-21 01:19:55'),
(51, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"branch\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 46, 1, '2019-03-21 01:20:06'),
(52, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institutions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 47, 1, '2019-03-21 01:20:17'),
(54, 'admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 49, 1, '2019-07-22 19:12:27'),
(55, 'Admin', NULL, 50, 1, '2019-08-02 01:49:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `personnel_name` varchar(255) DEFAULT NULL,
  `tc` varchar(20) DEFAULT NULL,
  `registration_number` int(11) DEFAULT NULL,
  `personnel_phone` varchar(25) DEFAULT NULL,
  `iban` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `sub_branch_id` int(11) DEFAULT NULL,
  `sub_branch` varchar(255) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `insurance_status` tinyint(4) DEFAULT NULL,
  `net_salary` varchar(100) DEFAULT NULL,
  `official_salary` varchar(100) DEFAULT NULL,
  `copy_of_identity_card` varchar(255) DEFAULT NULL,
  `criminal_record` varchar(255) DEFAULT NULL,
  `place_of_residence` varchar(255) DEFAULT NULL,
  `health_report` varchar(255) DEFAULT NULL,
  `contract` varchar(255) DEFAULT NULL,
  `diploma` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `reason_for_rejection` text DEFAULT NULL,
  `black_list` tinyint(4) DEFAULT NULL,
  `black_list_description` text DEFAULT NULL,
  `isActivePersonnel` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `personnel`
--

INSERT INTO `personnel` (`id`, `institution_id`, `institution_name`, `personnel_name`, `tc`, `registration_number`, `personnel_phone`, `iban`, `date_of_birth`, `branch`, `sub_branch_id`, `sub_branch`, `entry_date`, `insurance_status`, `net_salary`, `official_salary`, `copy_of_identity_card`, `criminal_record`, `place_of_residence`, `health_report`, `contract`, `diploma`, `image`, `gender`, `rank`, `isActive`, `reason_for_rejection`, `black_list`, `black_list_description`, `isActivePersonnel`) VALUES
(29, 11, 'Genel Müdürlük', 'GÖKSEL YERLİ', '17153619744', NULL, '', 'TR270006200018700006625661', '1990-10-14', 'finans', NULL, NULL, '2019-03-13', 1, '2400,00', '2020,90', 'ön.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, NULL, NULL, NULL, 1),
(750, 15, 'Tarabya Final Özel Öğretim Kursu', 'BAHADIR BOZDEMİR', '35020928324', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '3700,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(20, 4, 'Final Okulları - TARABYA', 'ABDULMÜTALİP ALP', '43231383415', NULL, NULL, '1232131513513515346541315646546543513135', '2000-01-01', '654165316531', NULL, NULL, '2222-02-22', 1, '3500', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(53, 10, 'Şişli Final Okulları', 'ABDULHEKİM HEMDEM', '23729776698', NULL, '', '', '0000-00-00', '', NULL, NULL, '2012-08-21', 1, '2600,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(54, 10, 'Şişli Final Okulları', 'ONUR CANKAYA', '48448361468', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1144, 44, 'Bağcılar Final Özel Öğretim Kursu', 'ELİF KÜREKSİZ', '68713058930', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-19', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(56, 10, 'Şişli Final Okulları', 'SETENAY ŞAHİN', '13592861454', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-01-13', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1143, 44, 'Bağcılar Final Özel Öğretim Kursu', 'EBRU  ÖZORMAN', '14429633046', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-12', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(58, 10, 'Şişli Final Okulları', 'ADİL GEBEŞ', '33176235662', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-23', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(59, 10, 'Şişli Final Okulları', 'AYTEN AKKOÇ', '65038070616', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-21', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(60, 10, 'Şişli Final Okulları', 'BATUHAN ALBAYRAK', '38137616627', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-15', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(61, 10, 'Şişli Final Okulları', 'CANSU AKKAYA', '11164810350', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-01', 1, '2450,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(62, 10, 'Şişli Final Okulları', 'ÇİÇEK DEMİRHAN', '27676007904', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2400,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(63, 10, 'Şişli Final Okulları', 'ELİF İŞLER', '49894690188', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-06', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1147, 44, 'Bağcılar Final Özel Öğretim Kursu', 'MUHAMMED BEYHAN', '71413055512', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-16', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(65, 10, 'Şişli Final Okulları', 'HİLAL GENÇ', '19211473862', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-18', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(66, 10, 'Şişli Final Okulları', 'EZGİ BOZKURT', '29804035438', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-15', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(67, 10, 'Şişli Final Okulları', 'FURKAN ARSLAN', '61870113580', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-15', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(68, 10, 'Şişli Final Okulları', 'MEHMET ŞAHİN', '11674429622', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-21', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(70, 10, 'Şişli Final Okulları', 'MUJİTABA SAANI', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-15', 1, '2600,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(71, 10, 'Şişli Final Okulları', 'AYDIN SAĞLAM', '42385763378', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-15', 1, '2184,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(72, 10, 'Şişli Final Okulları', 'HALİL KEBAPÇI', '32296684268', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-02', 1, '2184,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(73, 10, 'Şişli Final Okulları', 'HÜLYA ALAGÖZ', '10837880386', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-05-13', 1, '2184,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1145, 44, 'Bağcılar Final Özel Öğretim Kursu', 'ERSİN YILMAZ', '29329246210', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-05-27', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(75, 10, 'Şişli Final Okulları', 'YILMAZ FARUK', '43981400650', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-07-17', 1, '2116,84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(76, 10, 'Şişli Final Okulları', 'HÜSEYİN DELAL', '10853288364', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-13', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1146, 44, 'Bağcılar Final Özel Öğretim Kursu', 'KADRİYE AYGÜN', '33440066220', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2020.19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(78, 10, 'Şişli Final Okulları', 'MELEK GÜLTEKİN', '33338206974', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(79, 10, 'Şişli Final Okulları', 'BEYZA GENİŞOL', '43447292836', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-19', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(80, 10, 'Şişli Final Okulları', 'YAREN KOPAL', '56104025586', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-11-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(81, 14, 'Avcılar Çözüm Etüt Merkezi', 'MURAT DERELİ', '37673145196', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-04-01', 1, '4000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(82, 14, 'Avcılar Çözüm Etüt Merkezi', 'ADEM AKSOY', '15941999030', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-01', 1, '1000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1107, 14, 'Avcılar Çözüm Etüt Merkezi', 'ZEYNEP KARA', '55207666030', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-05-03', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1108, 14, 'Avcılar Çözüm Etüt Merkezi', 'MÜRÜVET ALTUN', '17327952714', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-04-24', 1, '2020.90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(91, 27, 'Ankara Final Okulları', 'UĞUR SERKAN', '10348390626', 0, '', '', '0001-01-01', 'İdari Personel', 8, 'Müdür', '2018-07-25', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(92, 27, 'Ankara Final Okulları', 'CEM MEHMET', '20602946896', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-07', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(93, 27, 'Ankara Final Okulları', 'FATMA NUR', '11461172946', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(94, 27, 'Ankara Final Okulları', 'ÇAĞLA ÇAĞAL', '50374775660', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1155, 49, 'Bayrampaşa Atakent Özel Öğretim Kursu', 'ÖZNUR BAYAR', '28502301562', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-04-22', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1156, 49, 'Bayrampaşa Atakent Özel Öğretim Kursu', 'RÜYA BEYTOR', '11549744386', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-05-30', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(98, 27, 'Ankara Final Okulları', 'TANSU KADAKOĞLU', '57136582658', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(99, 14, 'Avcılar Çözüm Etüt Merkezi', 'MÜNEVVER YÜCESOY', '54871696220', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-26', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(103, 27, 'Ankara Final Okulları', 'HASAN SAYGILI', '14059100482', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(104, 14, 'Avcılar Çözüm Etüt Merkezi', 'SEMRA HOŞ', '39157258606', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-09-02', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(105, 27, 'Ankara Final Okulları', 'HACER KAYA', '20989850472', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-17', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(106, 27, 'Ankara Final Okulları', 'SADIK EMRE', '37063151882', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-15', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(112, 27, 'Ankara Final Okulları', 'SEDA NUR', '10234126346', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-12-19', 1, '570,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(114, 27, 'Ankara Final Okulları', 'TUĞBA BÜYÜKYILDIZ', '19543762580', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2018-12-19', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1133, 27, 'Ankara Final Okulları', 'FALY SPEAKİNG', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1195, 27, 'Ankara Final Okulları', 'NURAN SEVER', '12362624848', 0, '', '', '0000-00-00', 'İdari Personel', 10, 'Bilgi İşlem', '2019-04-09', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(119, 18, 'Çamlıca Final Okulları', 'ARZU DEMİREL', '25640418404', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-12-11', 1, '3250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(120, 18, 'Çamlıca Final Okulları', 'ASUMAN SANDIKÇI', '44818285976', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-18', 1, '2700,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(121, 18, 'Çamlıca Final Okulları', 'AYSUN KAMBUROĞLU', '13132291574', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2700,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(122, 18, 'Çamlıca Final Okulları', 'AYŞE ŞAHAN', '17698592366', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-07-08', 1, '2049,68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(123, 18, 'Çamlıca Final Okulları', 'AYŞE CEREN', '17053424882', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-18', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(125, 18, 'Çamlıca Final Okulları', 'AYŞE GÜLBİN', '29887156174', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-07-03', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1123, 41, 'Bahçelievler Final Özel Öğretim Kursu', 'SEYHAN  ÖZER', '53845326118', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-04-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(127, 18, 'Çamlıca Final Okulları', 'AYTEN ASLANKAYA', '71464139926', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-21', 1, '3350,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(128, 18, 'Çamlıca Final Okulları', 'BEYHAN GÜNEL', '24670863376', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-07-05', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(131, 18, 'Çamlıca Final Okulları', 'BURCU RÜMEYSA', '30944222220', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-03', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(132, 29, 'Halkalı Çözüm Etüt Merkezi', 'SÜNDÜZ YEŞİLÖZ', '41278439222', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-07-01', 1, '2116.84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(133, 18, 'Çamlıca Final Okulları', 'BÜŞRA TEKGÜL', '24197429154', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(134, 29, 'Halkalı Çözüm Etüt Merkezi', 'ÜLGER ESEN', '18785582802', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-01', 1, '2116,84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(135, 18, 'Çamlıca Final Okulları', 'DEMİR GÜNEŞ', '19103604138', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-21', 1, '3400,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(136, 18, 'Çamlıca Final Okulları', 'EBRU YILDIRIM', '48664276362', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2017-07-24', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(137, 18, 'Çamlıca Final Okulları', 'EMİNE TELLİOĞLU', '44545914286', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-15', 1, '2150,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(138, 18, 'Çamlıca Final Okulları', 'ESRA TEKGÜL', '24194429218', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-02', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(139, 18, 'Çamlıca Final Okulları', 'GÜLAY TUNCAY', '42316964768', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2018-09-17', 1, '2100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(140, 18, 'Çamlıca Final Okulları', 'GÜZİN KANDAZ', '15170144508', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-01', 1, '3300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(141, 18, 'Çamlıca Final Okulları', 'HAMZA BUDAK', '46423975808', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-18', 1, '2650,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(142, 18, 'Çamlıca Final Okulları', 'İSMAİL KORKULMAZ', '41333145778', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-05', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(143, 18, 'Çamlıca Final Okulları', 'İSMAİL SARITAŞ', '18763348482', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-27', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(144, 18, 'Çamlıca Final Okulları', 'MEVLÜT ASLANKAYA', '71569136424', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-21', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(145, 18, 'Çamlıca Final Okulları', 'MİNE GÜNAY', '31936183666', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-02-19', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(146, 18, 'Çamlıca Final Okulları', 'MUHARREM GÜNER', '18565714782', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(147, 18, 'Çamlıca Final Okulları', 'MURAT BABAYİĞİT', '36737263838', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-08', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(148, 18, 'Çamlıca Final Okulları', 'MUSTAFA ŞAHAN', '17776589752', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-16', 1, '2400,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(149, 18, 'Çamlıca Final Okulları', 'NECLA GÖKTAŞ', '54370183382', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2017-09-20', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(150, 18, 'Çamlıca Final Okulları', 'NURİYE SİNEM', '22979260490', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-15', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(151, 18, 'Çamlıca Final Okulları', 'RUKİYE KOCUR', '14002262052', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-05', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(152, 18, 'Çamlıca Final Okulları', 'RÜMEYSA ÖZTÜRK', '16309766424', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(153, 18, 'Çamlıca Final Okulları', 'SALİM YAŞAR', '27481899930', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-06-17', 1, '4200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(154, 18, 'Çamlıca Final Okulları', 'SEZER SARITAŞ', '26387395058', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-21', 1, '2950,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(155, 18, 'Çamlıca Final Okulları', 'SEZGİN TEZCAN', '22009995668', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2017-09-10', 1, '2350,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(156, 18, 'Çamlıca Final Okulları', 'SİBEL BABAYİĞİT', '52141306114', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-21', 1, '3350,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(157, 18, 'Çamlıca Final Okulları', 'SİNAN KÖKSOY', '42302108336', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(158, 18, 'Çamlıca Final Okulları', 'SÜMEYYE İNAN', '34081199612', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-07-21', 1, '2850,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(159, 29, 'Halkalı Çözüm Etüt Merkezi', 'HAMZA SALMANLI', '42299106384', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-08-27', 1, '2535', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(160, 29, 'Halkalı Çözüm Etüt Merkezi', 'TAYYİP İSMAİL', '16934088908', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(161, 18, 'Çamlıca Final Okulları', 'ŞENEL TAHTACI', '55675139876', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(164, 18, 'Çamlıca Final Okulları', 'ŞÜKRÜ ALTUN', '69892098922', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-16', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1110, 18, 'Çamlıca Final Okulları', 'ÇAĞLA İKAN', '49888302530', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-06-20', 1, '2020.90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(166, 29, 'Halkalı Çözüm Etüt Merkezi', 'ÇAĞLA TAŞÇI', '17377955734', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-01', 1, '4000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1109, 18, 'Çamlıca Final Okulları', 'NEZAKET KARAGÖZ', '13040289298', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-05-07', 1, '2020.90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(168, 29, 'Halkalı Çözüm Etüt Merkezi', 'DİLEK CANOĞLU', '48460890762', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(171, 29, 'Halkalı Çözüm Etüt Merkezi', 'ÜMİT ÇELTİK', '19945164302', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-01', 1, '2400,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(176, 7, 'Sultangazi Çözüm Temel Lisesi', 'İZZET KORKMAZ', '13859329550', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2017-08-20', 1, '2800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(178, 7, 'Sultangazi Çözüm Temel Lisesi', 'BELGİN ÖZDEMİR', '20171610716', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(179, 7, 'Sultangazi Çözüm Temel Lisesi', 'GÜLDALİ ARSLAN', '22586272688', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-11-05', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1124, 34, 'Sefaköy Final Etüt Merkezi', 'MİKAİL ERGÜVEN', '40753852846', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-02-02', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(184, 7, 'Sultangazi Çözüm Temel Lisesi', 'ZELİHA ŞAHİN', '40861753554', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(186, 7, 'Sultangazi Çözüm Temel Lisesi', 'İSMAİL DEMİR', '42202384656', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-20', 1, '2400,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(187, 7, 'Sultangazi Çözüm Temel Lisesi', 'NEFİSE KÜÇÜK', '42580571372', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(189, 7, 'Sultangazi Çözüm Temel Lisesi', 'PINAR KOÇ', '47758393220', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(190, 7, 'Sultangazi Çözüm Temel Lisesi', 'FATİH ÖZBAY', '48514057004', NULL, '', '', '0000-00-00', '', NULL, NULL, '2014-11-27', 1, '4500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(195, 7, 'Sultangazi Çözüm Temel Lisesi', 'ŞAFAK BEKTAŞ', '62290202250', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(197, 7, 'Sultangazi Çözüm Temel Lisesi', 'KEREM DUMAN', '43402115088', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '2100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(198, 7, 'Sultangazi Çözüm Temel Lisesi', 'FATİH AKSOY', '63334382990', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(199, 7, 'Sultangazi Çözüm Temel Lisesi', 'HÜSEYİN ŞİMŞEK', '30635336076', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-17', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(202, 19, 'Mimaroba Final Özel Öğretim Kursu', 'CAN DİZDAR', '29686666256', NULL, '', '', '0000-00-00', '', NULL, NULL, '2015-03-14', 1, '4000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1129, 33, 'Tarabya Final Okulları', 'DENİZ ÖZCAN', '24022176048', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-04-01', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1126, 33, 'Tarabya Final Okulları', 'NEJDET ATİK', '35350048402', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-05-20', 1, '2184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1127, 33, 'Tarabya Final Okulları', 'ESRA YILMAZ', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '1600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1128, 33, 'Tarabya Final Okulları', 'ECEM ŞAFAK KOKOÇ', '14558806052', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-04-01', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(217, 19, 'Mimaroba Final Özel Öğretim Kursu', 'CÜNEYT DOKUMACI', '47398297346', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '4200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(219, 19, 'Mimaroba Final Özel Öğretim Kursu', 'ÖZDEN ÇALIŞKAN', '23566751094', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-01-23', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(220, 19, 'Mimaroba Final Özel Öğretim Kursu', 'ÖZAY TURAN', '19819964502', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-05', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(221, 19, 'Mimaroba Final Özel Öğretim Kursu', 'SEVİM DOLU', '10535998628', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-07', 1, '2116,84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(222, 19, 'Mimaroba Final Özel Öğretim Kursu', 'SAMET ÖZTÜRK', '17158403188', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2018-08-29', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(223, 19, 'Mimaroba Final Özel Öğretim Kursu', 'BUSE ÇELİK', '54430059954', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-08-29', 1, '450', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(224, 19, 'Mimaroba Final Özel Öğretim Kursu', 'NEZAKET BAYHAN', '58282248504', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-12-12', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(225, 28, 'Mimaroba Final Okulları', 'RABİA EŞ', '19481607646', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-06', 1, '3750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(226, 28, 'Mimaroba Final Okulları', 'LEYLA ORHAN', '31213846390', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-28', 1, '3465,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(227, 28, 'Mimaroba Final Okulları', 'MEDİHA YEŞİLYURT', '23399734684', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-28', 1, '3300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(228, 28, 'Mimaroba Final Okulları', 'MELEHAT ALKAN', '53734388258', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-28', 1, '3355,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(229, 28, 'Mimaroba Final Okulları', 'MÜZEYYEN ÇAKICI', '43855891744', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-28', 1, '3750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(230, 28, 'Mimaroba Final Okulları', 'MUHARREM SONGÜR', '44578617710', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-09', 1, '3650,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(231, 28, 'Mimaroba Final Okulları', 'ZÜHRE YILMAZ', '27593157256', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-28', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(232, 28, 'Mimaroba Final Okulları', 'AKIN KAFLI', '17632402522', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-11-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(233, 28, 'Mimaroba Final Okulları', 'BARIŞ ERDOST', '52879208674', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-28', 1, '3200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(234, 28, 'Mimaroba Final Okulları', 'CANAN İNAN', '40309971182', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-09', 1, '2550,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(235, 28, 'Mimaroba Final Okulları', 'DİDEM TÜRKYILMAZ', '17941864516', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-28', 1, '2310,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(236, 28, 'Mimaroba Final Okulları', 'SEDA YILMAZ', '46516334956', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-12-28', 1, '2200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(237, 28, 'Mimaroba Final Okulları', 'AYTUĞ BEŞELMA', '19058736076', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-09', 1, '2200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(238, 28, 'Mimaroba Final Okulları', 'GÖKÇEN OSMANLIOĞLU', '12518486498', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(239, 28, 'Mimaroba Final Okulları', 'GÜNAY KADER', '17957142196', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-09', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1175, 11, 'Genel Müdürlük', 'İHSAN  KÖMÜRCÜOĞLU', '27728600428', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2016-08-12', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(241, 28, 'Mimaroba Final Okulları', 'FERDİ BOĞA', '28625399644', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-09', 1, '2700,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(242, 28, 'Mimaroba Final Okulları', 'DERYA ÖZBAY', '57850172364', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-04-08', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(243, 28, 'Mimaroba Final Okulları', 'NURGÜL KULBAK', '44533389874', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-28', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(244, 28, 'Mimaroba Final Okulları', 'NECATİ DEVELİOĞLU', '37915734324', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-04-08', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(245, 28, 'Mimaroba Final Okulları', 'HATİCE KURTULMUŞ', '20033251286', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-07', 1, '2800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(246, 28, 'Mimaroba Final Okulları', 'NALAN BAHÇIVAN', '14633723526', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(247, 28, 'Mimaroba Final Okulları', 'BUSE ÇELİK', '54430059954', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2700,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(248, 28, 'Mimaroba Final Okulları', 'ÖZLEM ARSLAN', '13556924768', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(249, 28, 'Mimaroba Final Okulları', 'PETEK TALAY', '0', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-17', 1, '1100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(251, 28, 'Mimaroba Final Okulları', 'MERT DEVELİOĞLU', '37867735950', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-12', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(252, 28, 'Mimaroba Final Okulları', 'BÜŞRA ŞEN', '26863446526', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1176, 11, 'Genel Müdürlük', 'İLKER BALCIOĞLU', '28139451654', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-01-01', 1, '5600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(254, 28, 'Mimaroba Final Okulları', 'EBRU ÖZDEŞ', '47332536340', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(255, 28, 'Mimaroba Final Okulları', 'MERVE UÇAR', '37532000550', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(256, 28, 'Mimaroba Final Okulları', 'BESTE YILDIZ', '16523758984', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-20', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(257, 28, 'Mimaroba Final Okulları', 'FATMANUR YILDIZ', '15377490804', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-26', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(258, 28, 'Mimaroba Final Okulları', 'ÖZLEM YILDIRIM', '55639019626', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-11-19', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(259, 28, 'Mimaroba Final Okulları', 'LEYLA KORKMAZ', '57961534976', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-18', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(260, 28, 'Mimaroba Final Okulları', 'TUĞBA DAĞDEVİRİN', '65668176252', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-03-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(261, 28, 'Mimaroba Final Okulları', 'YUNUS EMRE', '51604070722', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-03-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(262, 28, 'Mimaroba Final Okulları', 'FATMA SENEM', '0', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-12-20', 1, '800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(263, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ABDULLAH ÖZTÜRK', '61867451480', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(264, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ADİLE KARATAY', '20041552672', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '4000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1184, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'MULLA MEHMET CEREN', '54616376660', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(266, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ALİ HAYDAR', '50812266910', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '4100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(267, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ARZU AYCAN', '28580347018', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '4500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(268, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'AYSUN ÇELİK', '19229201488', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(270, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'BAYRAM KİRELLİ', '27005176288', NULL, '', '', '0000-00-00', '', NULL, NULL, '0000-00-00', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(271, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'BERKAN ACAR', '11090425888', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3150,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(275, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'BÜŞRA AYDEMİR', '15410244494', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(278, 22, 'Kağıthane Final Özel Öğretim Kursu', 'SELÇUK BAŞKAYA', '45721234648', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-05-20', 1, '3300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(279, 22, 'Kağıthane Final Özel Öğretim Kursu', 'KURBAN DURAN', '21578797376', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(283, 22, 'Kağıthane Final Özel Öğretim Kursu', 'GÜNHAN EROĞLU', '16415039986', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(284, 22, 'Kağıthane Final Özel Öğretim Kursu', 'MERVE ', '66565186856', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(285, 22, 'Kağıthane Final Özel Öğretim Kursu', 'ESİN DUR', '15272272154', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(933, 35, 'Avcılar Çözüm Okulları', 'SERHAT OZAN KAYA', '48391896086', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-07-14', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(289, 22, 'Kağıthane Final Özel Öğretim Kursu', 'TUĞBA POLAT', '44692863574', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-05-11', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(290, 22, 'Kağıthane Final Özel Öğretim Kursu', 'ÖMER GÜL', '42275105950', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(934, 35, 'Avcılar Çözüm Okulları', 'SEVDE HİLAL SAĞLAM', '30565368444', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(292, 22, 'Kağıthane Final Özel Öğretim Kursu', 'TUĞBA ÇELİK', '43639140662', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-08-08', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(293, 22, 'Kağıthane Final Özel Öğretim Kursu', 'YETER TEPE', '37177936610', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-01-03', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(294, 22, 'Kağıthane Final Özel Öğretim Kursu', 'CUMA ERDOĞAN', '17153777918', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-24', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(296, 22, 'Kağıthane Final Özel Öğretim Kursu', 'MUSTAFA DUR', '23951295950', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-06', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(297, 22, 'Kağıthane Final Özel Öğretim Kursu', 'TANJU KARAHÜSEYİN', '30511653600', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-11-21', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(299, 22, 'Kağıthane Final Özel Öğretim Kursu', 'AHMET AY', '36247769240', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-11-04', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(300, 22, 'Kağıthane Final Özel Öğretim Kursu', 'YAVUZ SELİM', '16151642860', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-11-24', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(301, 22, 'Kağıthane Final Özel Öğretim Kursu', 'EMİNE YAVUZ', '25868466218', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-11-14', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(302, 22, 'Kağıthane Final Özel Öğretim Kursu', 'BİLGEHAN ÇINAR', '41059389852', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-02', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(305, 22, 'Kağıthane Final Özel Öğretim Kursu', 'HAKNUR ÖZDEMİR', '27256910990', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-07', 1, '1250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(306, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'CANAN DOĞAN', '40927431662', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(307, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'CENNET ARAT', '56257503474', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2078,46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(310, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'DİDEM GUHER', '37679278010', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(311, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'DUYGU BOZKIR', '11369126560', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(313, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'EBRU DOĞAN', '50266526608', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2116,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(315, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ECEM YARICI', '43246455654', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(316, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'EFSAL EFE', '57691593588', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2116,84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(318, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'EMİNE ARSLAN', '43312628166', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '4000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(320, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'EZEL VURAL', '11560676192', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(322, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'FATMA BÜKER', '45364612292', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '4550,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(326, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'GÖZDE GENÇ', '12692985800', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(327, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'HAŞMET YILDIRIM', '24664112466', NULL, '', '', '0000-00-00', '', NULL, NULL, '2020-01-01', 1, '2088,06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(330, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'LEYLA KİRS', '23189022670', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '5000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(331, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'MAKBULE KARAKOÇ', '43504355290', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2078,46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(332, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'MEHMET UYAR', '60472306840', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(334, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'MERVE KURAL', '34757240990', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(335, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'MEVLÜDE BALTACI', '46150202628', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '4550,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(340, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'NİLAY ARSLAN', '20270831890', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(344, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ÖZNUR TÜRKMEN', '40108338872', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2900,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(348, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'SATI ÖZGÜR', '25970653568', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(349, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'SEDA AKINCI', '62563429704', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(351, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'SULTAN TOPRAK', '15863374816', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(352, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'UMUT VEDAT', '32074241294', NULL, '', '', '2019-01-01', '', NULL, NULL, '2019-01-01', 1, '3750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(353, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'VAROL GÜLER', '10912695294', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2700,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(355, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'YASEMİN UYGUR', '25484054226', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(358, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ZEYNEP SEZEN', '36190655072', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(359, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ABRAHAM ALUDO', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '4000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(360, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ZAKAİRA TAKKA', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(361, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'KHAUB ATTAR', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-01', 1, '3500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(362, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'MARAL NEİNAVAEİ', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(363, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'GÜLSER USTAMAHMUTOĞLU', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-01', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(364, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'FATMA KAVUNCU', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(366, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'MERVE NUR', '17035325398', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-01', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1);
INSERT INTO `personnel` (`id`, `institution_id`, `institution_name`, `personnel_name`, `tc`, `registration_number`, `personnel_phone`, `iban`, `date_of_birth`, `branch`, `sub_branch_id`, `sub_branch`, `entry_date`, `insurance_status`, `net_salary`, `official_salary`, `copy_of_identity_card`, `criminal_record`, `place_of_residence`, `health_report`, `contract`, `diploma`, `image`, `gender`, `rank`, `isActive`, `reason_for_rejection`, `black_list`, `black_list_description`, `isActivePersonnel`) VALUES
(367, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'AYÇA BOZKIR', '31651805492', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '4000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(369, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'HAKAN TAŞPULAT', '48883484760', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '5000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(370, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'HÜSNE CEREN', '54442382484', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(371, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'TOLGAHAN ŞİMŞEK', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-01', 1, '2890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(372, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'GAMZE BERKÜN', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(373, 40, 'FEN BİLİMLERİ OKULLARI ATAKENT', 'ESRA YILMAZ', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-01', 1, '2420', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(377, 47, 'Şirinevler Final Kişisel Gelişim Kursu', 'FERYA YILDIZ', '47467608530', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-14', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(378, 47, 'Şirinevler Final Kişisel Gelişim Kursu', 'HATİCE GÜZELER', '52006151842', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-08', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(380, 47, 'Şirinevler Final Kişisel Gelişim Kursu', 'HEDİYE TÜREN', '40024667650', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-08-05', 1, '2078,46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(387, 47, 'Şirinevler Final Kişisel Gelişim Kursu', 'RAMAZAN AKKUŞLU', '13310628048', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(389, 47, 'Şirinevler Final Kişisel Gelişim Kursu', 'SEDA SEBİHA', '33578405724', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(393, 47, 'Şirinevler Final Kişisel Gelişim Kursu', 'OKAN YILDIZ', '58570232956', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-07', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(394, 47, 'Şirinevler Final Kişisel Gelişim Kursu', 'KADİR ÇİFTÇİ', '13631786106', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-29', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(400, 37, 'Kağıthane Final Okulları', 'MEHMET GÜNDÜZ', '17795532616', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-15', 1, '3750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(401, 24, 'Şirinevler Final Özel Öğretim Kursu', 'RESUL ATEŞ', '51907598442', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-06-01', 1, '4200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(402, 24, 'Şirinevler Final Özel Öğretim Kursu', 'BETÜL BOZTEKİN', '58894299284', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-07-19', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1198, 27, 'Ankara Final Okulları', 'GFJFY YJYUGKG', '3525353', 53535353, '53535353', 'tr454353528', '2019-10-22', 'İdari Personel', 10, 'Bilgi İşlem', '2019-10-26', 1, '1111', NULL, 'nfs.png', NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, NULL, NULL, NULL, NULL, 0),
(407, 24, 'Şirinevler Final Özel Öğretim Kursu', 'CENGİZ İNANGİL', '12884687284', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-10-25', 1, '4500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1194, 24, 'Şirinevler Final Özel Öğretim Kursu', 'YUNUS ÖCALAN', '33319411960', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '3300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(413, 24, 'Şirinevler Final Özel Öğretim Kursu', 'İSMAİL ÇUVALCI', '27983473058', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(421, 37, 'Kağıthane Final Okulları', 'KADER URUN', '13253531092', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-16', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(422, 37, 'Kağıthane Final Okulları', 'İREM UYMAZ', '29716342532', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-21', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(423, 37, 'Kağıthane Final Okulları', 'GALİP UÇAN', '36682970652', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-11', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(424, 37, 'Kağıthane Final Okulları', 'BETÜL YILMAZ', '21637565106', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-27', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1191, 24, 'Şirinevler Final Özel Öğretim Kursu', 'KADRİYE BİLİCİ', '28202497206', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1192, 24, 'Şirinevler Final Özel Öğretim Kursu', 'MEHMET MEŞE', '30193617594', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1193, 24, 'Şirinevler Final Özel Öğretim Kursu', 'TOLGA TUNCAY IŞIK', '51043483862', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(429, 37, 'Kağıthane Final Okulları', 'MEHMET ALİ', '28930390756', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-29', 1, '2020,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(431, 37, 'Kağıthane Final Okulları', 'OGÜN ÖZDEMİR', '41830266730', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-15', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1113, 37, 'Kağıthane Final Okulları', 'MÜZEYYEN SOKU', '24332313416', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-06-29', 1, '3250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(434, 37, 'Kağıthane Final Okulları', 'EMRAH GÖKÇELİ', '19796202062', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(435, 37, 'Kağıthane Final Okulları', 'ELİF KÖROĞLU', '13094111088', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '2800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(437, 37, 'Kağıthane Final Okulları', 'FERHAT KARA', '40666820642', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(438, 37, 'Kağıthane Final Okulları', 'EBRU TÜRKMEN', '48442670252', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(440, 37, 'Kağıthane Final Okulları', 'NURGÜL KÖSE', '55687467288', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(441, 37, 'Kağıthane Final Okulları', 'VİLDAN ÖZER', '39059035206', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2600,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(442, 37, 'Kağıthane Final Okulları', 'MERVE POYRAZ', '31714489850', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(443, 37, 'Kağıthane Final Okulları', 'HATİCE MODA', '18227467940', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(446, 37, 'Kağıthane Final Okulları', 'BÜŞRANUR YÜCEL', '24587705806', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(447, 37, 'Kağıthane Final Okulları', 'GAMZE ULU', '13696934696', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(448, 37, 'Kağıthane Final Okulları', 'SEFA İPEK', '13697860932', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(449, 37, 'Kağıthane Final Okulları', 'MERVE TOPÇU', '50647609142', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1114, 37, 'Kağıthane Final Okulları', 'NESLİHAN ÖNEN', '24038558046', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-04-10', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(451, 37, 'Kağıthane Final Okulları', 'BÜŞRA KOÇER', '11069812244', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(452, 37, 'Kağıthane Final Okulları', 'AYHAN UÇAN', '11408186470', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-11', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(453, 37, 'Kağıthane Final Okulları', 'ELVAN MORAL', '27415865918', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(454, 37, 'Kağıthane Final Okulları', 'ÜMRAN ÖZDEMİR', '16492792606', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(455, 37, 'Kağıthane Final Okulları', 'SERKAN ÖKSÜZ', '27208628140', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '3250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1115, 37, 'Kağıthane Final Okulları', 'TUĞÇE UÇAR', '34384518332', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-05-06', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(458, 37, 'Kağıthane Final Okulları', 'HÜLYA BORA', '45295474976', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-17', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(459, 37, 'Kağıthane Final Okulları', 'GAMZE ÇETİN', '27871398296', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(460, 37, 'Kağıthane Final Okulları', 'FRANC MARC', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2225,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(461, 37, 'Kağıthane Final Okulları', 'GÜNEL MAMMADOV', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '3150,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(463, 37, 'Kağıthane Final Okulları', 'DURMUŞ KARAÇAM', '21599355548', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-09-05', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(464, 37, 'Kağıthane Final Okulları', 'RİAL ALAFANDI', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-10', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(465, 37, 'Kağıthane Final Okulları', 'AHMET GÖÇER', '26519281600', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-23', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(466, 37, 'Kağıthane Final Okulları', 'NAZLI DÜKKEL', '29533721732', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-12-10', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(470, 37, 'Kağıthane Final Okulları', 'ÖZDEM FUNDA', '44840030148', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-27', 1, '2800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1112, 37, 'Kağıthane Final Okulları', 'KEZBAN ÖZBAY', '15782752344', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-05-04', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(473, 37, 'Kağıthane Final Okulları', 'FATMA SEVDE', '21910612046', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-30', 1, '2350,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(474, 37, 'Kağıthane Final Okulları', 'SAADETNUR SOLMAZ', '31474775064', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-15', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(477, 32, 'Sultangazi Uğur Temel Lisesi', 'BAŞAK DURMAZ', '28568163470', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-01-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(478, 32, 'Sultangazi Uğur Temel Lisesi', 'BAYRAM KARAŞOĞLU', '46714428174', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(480, 32, 'Sultangazi Uğur Temel Lisesi', 'BİRSEL ÇAKMAK', '11993788578', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(481, 32, 'Sultangazi Uğur Temel Lisesi', 'DERYA GÖNEN', '12295956672', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(486, 32, 'Sultangazi Uğur Temel Lisesi', 'ESMA SAV', '10303477072', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-21', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(488, 32, 'Sultangazi Uğur Temel Lisesi', 'ESRA DELİBAY', '17657556002', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-26', 1, '2100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(491, 32, 'Sultangazi Uğur Temel Lisesi', 'GÖKMEN YETER', '51580176418', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3600,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(494, 32, 'Sultangazi Uğur Temel Lisesi', 'HATİCE GÜLER', '25151710158', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(501, 32, 'Sultangazi Uğur Temel Lisesi', 'MURAT GİRGİN', '16925955226', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2415,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1116, 27, 'Ankara Final Okulları', 'HALİL AK', '21752650312', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-06-25', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 0, '', NULL, NULL, 0),
(512, 32, 'Sultangazi Uğur Temel Lisesi', 'UMUT EMRE', '42910451602', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-30', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(513, 32, 'Sultangazi Uğur Temel Lisesi', 'ESRA DURMUŞ', '63178011704', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-12-26', 1, '1350,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(516, 34, 'Sefaköy Final Etüt Merkezi', 'ASLIHAN YEŞİLKAYA', '50851821460', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(517, 34, 'Sefaköy Final Etüt Merkezi', 'RASİM CENGİZ', '19930703608', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(518, 34, 'Sefaköy Final Etüt Merkezi', 'RAİF AKÇAY', '66577055034', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(523, 34, 'Sefaköy Final Etüt Merkezi', 'MERYEM ÖZER', '18524060400', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(526, 34, 'Sefaköy Final Etüt Merkezi', 'SEVDA AKOT', '68284240284', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-07', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(527, 34, 'Sefaköy Final Etüt Merkezi', 'SEVİLAY UZUN', '35881365290', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2078,46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(528, 34, 'Sefaköy Final Etüt Merkezi', 'HANİFE KARA', '12062265082', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(529, 34, 'Sefaköy Final Etüt Merkezi', 'MUHYETTİN SÜLE', '14728732846', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-16', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(530, 34, 'Sefaköy Final Etüt Merkezi', 'BÜŞRA YAVUZASLAN', '22630066386', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-03-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(531, 34, 'Sefaköy Final Etüt Merkezi', 'CANSU ASLAN', '24581088400', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-15', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(533, 34, 'Sefaköy Final Etüt Merkezi', 'ESRA YAYLA', '15052979266', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(534, 34, 'Sefaköy Final Etüt Merkezi', 'HASAN SERT', '14990653894', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(535, 34, 'Sefaköy Final Etüt Merkezi', 'TUĞÇE KARAKURT', '30629103172', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(536, 34, 'Sefaköy Final Etüt Merkezi', 'HATİCE AKAY', '13487860838', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(537, 34, 'Sefaköy Final Etüt Merkezi', 'EDA ERSOY', '30838168030', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(538, 34, 'Sefaköy Final Etüt Merkezi', 'FATMANUR DEMİRELLİ', '44257596114', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(539, 34, 'Sefaköy Final Etüt Merkezi', 'GİZEM ERSOY', '36491061718', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-08-27', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(540, 34, 'Sefaköy Final Etüt Merkezi', 'NURCAN GİRAY', '55669170830', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(541, 34, 'Sefaköy Final Etüt Merkezi', 'MÜRSEL KARA', '12176261208', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-08-20', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(542, 34, 'Sefaköy Final Etüt Merkezi', 'ÖMER ER', '38858203298', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-30', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(544, 34, 'Sefaköy Final Etüt Merkezi', 'ÖZGENUR KARIKSIZ', '19961237974', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-12-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(545, 34, 'Sefaköy Final Etüt Merkezi', 'SALİH YAZAR', '11155699704', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-26', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(547, 34, 'Sefaköy Final Etüt Merkezi', 'MUHAMMET VURKAN', '17221337488', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-11-28', 1, '4200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(550, 26, 'Halkalı Çözüm Temel Lisesi', 'SİNEM PARLAK', '34204359022', NULL, '', '', '0000-00-00', '', NULL, NULL, '2014-04-19', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(551, 26, 'Halkalı Çözüm Temel Lisesi', 'FATMA ALP', '43225383640', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-04-25', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(552, 26, 'Halkalı Çözüm Temel Lisesi', 'MERVE  DUZLA', '51097287324', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-08-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(553, 26, 'Halkalı Çözüm Temel Lisesi', 'FATMA DİZDAROĞLU', '24856838778', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-02-19', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(554, 26, 'Halkalı Çözüm Temel Lisesi', 'SELMA TÜNAY', '15077484264', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-06-19', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(555, 26, 'Halkalı Çözüm Temel Lisesi', 'NİMET ULUGANA', '22774459976', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-03-02', 1, '2850,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(556, 26, 'Halkalı Çözüm Temel Lisesi', 'MERT AYDIN', '32689733528', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-25', 1, '3100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(557, 26, 'Halkalı Çözüm Temel Lisesi', 'ZEYNEP YILMAZ', '59293302070', NULL, '', '', '0000-00-00', '', NULL, NULL, '2013-12-28', 1, '2850,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(559, 26, 'Halkalı Çözüm Temel Lisesi', 'BATUHAN İLHAN', '22262682954', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-14', 1, '2100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(560, 26, 'Halkalı Çözüm Temel Lisesi', 'DİLEK ARSLAN', '16540921996', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-06-28', 1, '2400,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(569, 26, 'Halkalı Çözüm Temel Lisesi', 'AYNUR SONUÇ', '38614224246', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-11', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(578, 26, 'Halkalı Çözüm Temel Lisesi', 'HACER ALDEMİR', '15661433920', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-14', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(580, 26, 'Halkalı Çözüm Temel Lisesi', 'GAMZE AKSINIR', '15413756710', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-15', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(584, 26, 'Halkalı Çözüm Temel Lisesi', 'SABİRE KABADAYI', '17402916976', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-09-18', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1172, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'KÜBRA AYDINLI', '10049572536', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-07', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(594, 26, 'Halkalı Çözüm Temel Lisesi', 'ŞEHRİ YILDIRIM', '15470859706', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-02', 1, '2100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(595, 33, 'Tarabya Final Okulları', 'AYŞEGÜL İNCE', '14776574214', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2600,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(596, 33, 'Tarabya Final Okulları', 'AYŞEGÜL ŞENCAN', '32407575508', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3150,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(597, 33, 'Tarabya Final Okulları', 'BERFİN KAPLAN', '32771316516', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(598, 33, 'Tarabya Final Okulları', 'BERKAY AĞCAABAT', '34900738060', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(599, 33, 'Tarabya Final Okulları', 'BUSE ERENLERDEN', '54184080044', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2600,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(601, 33, 'Tarabya Final Okulları', 'CEREN YAŞIN', '44416389830', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(602, 33, 'Tarabya Final Okulları', 'CİHAN ASLANBAY', '71440002930', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(603, 33, 'Tarabya Final Okulları', 'DEMET KARAALİOĞLU', '65962154536', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(604, 33, 'Tarabya Final Okulları', 'DERYA ENGÜL DEMİRBAĞ', '17843311828', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(605, 33, 'Tarabya Final Okulları', 'DİLAN DOĞANBATIR', '37213620688', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2400,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(607, 33, 'Tarabya Final Okulları', 'DÖNDÜ HURİYE', '59110091736', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(611, 33, 'Tarabya Final Okulları', 'EKREM ÖZDEMİR', '25546946056', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(612, 33, 'Tarabya Final Okulları', 'ELİF ŞENSOY', '48418667026', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2650,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(614, 33, 'Tarabya Final Okulları', 'ELİF SEZER', '20297758606', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-01', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(615, 33, 'Tarabya Final Okulları', 'EMEL YALIN', '33955480276', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(616, 33, 'Tarabya Final Okulları', 'ESRA ARSLAN', '41515960090', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(617, 33, 'Tarabya Final Okulları', 'FATMA SADIKOĞLU', '61279246568', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(619, 33, 'Tarabya Final Okulları', 'GÖZDE ALİUSTAOĞLU', '25292679642', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(620, 33, 'Tarabya Final Okulları', 'GÜNAY ÇETİN', '37543610526', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(623, 33, 'Tarabya Final Okulları', 'HURİYE DEMİR', '50389679670', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3050,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(624, 33, 'Tarabya Final Okulları', 'İREM TÜYLÜ', '42124893250', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(625, 33, 'Tarabya Final Okulları', 'İSMET ŞENYER', '15671878520', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(626, 33, 'Tarabya Final Okulları', 'İBRAHİM ODABAŞ', '21583941092', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3550,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(627, 33, 'Tarabya Final Okulları', 'IŞIN ÖZEL', '23161110742', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(628, 33, 'Tarabya Final Okulları', 'KAAN ŞAN', '12033075450', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3575,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(629, 33, 'Tarabya Final Okulları', 'KÜBRA ÇETİN', '37522611254', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(630, 33, 'Tarabya Final Okulları', 'MAHSA HARANDI', '99461525214', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(632, 33, 'Tarabya Final Okulları', 'MEHMET HANİFİ', '20458180086', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3150,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(633, 33, 'Tarabya Final Okulları', 'MEHTAP GÜNEŞ', '23726390170', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(637, 33, 'Tarabya Final Okulları', 'MELİSA NARSÜZ', '52819127522', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(638, 33, 'Tarabya Final Okulları', 'MERT KAYABAŞI', '17173921742', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(640, 33, 'Tarabya Final Okulları', 'MEVLİYE ÖZER', '16376593190', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(641, 33, 'Tarabya Final Okulları', 'MUHAMMED ALP', '43237383294', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '5800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(642, 33, 'Tarabya Final Okulları', 'PINAR ATMACA', '30017296974', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(643, 33, 'Tarabya Final Okulları', 'RABİA FATMA TATLI', '18005263498', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(645, 33, 'Tarabya Final Okulları', 'SANEM ŞENTÜRK', '15812384170', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(646, 33, 'Tarabya Final Okulları', 'SELAHATTİN KÖSEOĞLU', '18542064954', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(647, 33, 'Tarabya Final Okulları', 'SELİN İSLAM', '45862766756', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(648, 33, 'Tarabya Final Okulları', 'SELMA AKVERAN', '18988765620', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2700,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(649, 33, 'Tarabya Final Okulları', 'SEVDA DİLEK', '39071018706', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2800,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(651, 33, 'Tarabya Final Okulları', 'SOMAYFH TABAKHAN', '37687197', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(652, 33, 'Tarabya Final Okulları', 'SULTAN GÜLER', '59695307116', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2700,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(653, 33, 'Tarabya Final Okulları', 'OĞUZHAN KURUCU', '25448427646', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(655, 33, 'Tarabya Final Okulları', 'YASİN KÖROĞLU', '10073639212', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(656, 33, 'Tarabya Final Okulları', 'YEŞİM GÜNDÜZ', '29800480034', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3565,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1131, 7, 'Sultangazi Çözüm Temel Lisesi', 'MUHAMMET YILDIZ', '31279507150', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2016-08-08', 1, '2750', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(658, 33, 'Tarabya Final Okulları', 'YULFER AZİSOVA', '99556028330', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3600,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(659, 33, 'Tarabya Final Okulları', 'YUSUF BOZKURT', '47134624528', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(660, 33, 'Tarabya Final Okulları', 'YUSUF YOĞURTÇUOĞLU', '52531583002', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3150,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1130, 33, 'Tarabya Final Okulları', 'ÖZGE ÇINAROĞLU', '13805409190', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '0000-00-00', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(662, 33, 'Tarabya Final Okulları', 'HADİYE TOPALOĞLU', '30380328388', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(665, 33, 'Tarabya Final Okulları', 'TOLGAHAN ŞİMŞEK', '50026610516', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(667, 33, 'Tarabya Final Okulları', 'GONCA KARACA', '20879614726', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(669, 33, 'Tarabya Final Okulları', 'HATİCE NARİN BAR', '72469003304', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(671, 33, 'Tarabya Final Okulları', 'NURDAN ATAÇ', '36050095840', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2700,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1125, 33, 'Tarabya Final Okulları', 'RABİA YÜKSEL', '66667137114', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-21', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(673, 33, 'Tarabya Final Okulları', 'SEZER RECEP', '18482265534', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1132, 33, 'Tarabya Final Okulları', 'TUTKU KAYIŞ', '28658409440', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-06-21', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(675, 33, 'Tarabya Final Okulları', 'EMMA ARFAOUİ', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(676, 33, 'Tarabya Final Okulları', 'BEYZANUR ÖNAL', '15668822840', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-01', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(679, 33, 'Tarabya Final Okulları', 'MEDİNE ÇAKMAK', '24712832278', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(680, 33, 'Tarabya Final Okulları', 'SABİRE ELMAS', '62164108930', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(681, 33, 'Tarabya Final Okulları', 'AHMET DEMİRCAN', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-01', 1, '2184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(684, 33, 'Tarabya Final Okulları', 'AKANTORANA DOREEN', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(685, 33, 'Tarabya Final Okulları', 'MERİSA TURSONUVİÇ', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '3500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(686, 33, 'Tarabya Final Okulları', 'ASEL AYAN', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '1000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(687, 33, 'Tarabya Final Okulları', 'BÜŞRA GÜNEY', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-01', 1, '1000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(692, 45, 'Halkalı Final Özel Öğretim Kursu', 'FATMA ARAT', '25634275464', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1165, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'MURAT CEYLAN', '50749118252', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-04-24', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1166, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'ELVAN YAHŞİ', '37627718360', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-04-28', 1, '1300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(695, 45, 'Halkalı Final Özel Öğretim Kursu', 'FARUK ARGUZ', '26855292346', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-16', 1, '2184,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(696, 45, 'Halkalı Final Özel Öğretim Kursu', 'YILMAZ CÜRE', '35078336904', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-13', 1, '2184,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(697, 45, 'Halkalı Final Özel Öğretim Kursu', 'YASEMİN DEMİRBİLEK', '47359408224', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(699, 45, 'Halkalı Final Özel Öğretim Kursu', 'UĞUR ERKILIÇ', '32215159884', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-29', 1, '2600,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1167, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'HAVVA DOĞAN', '10552468630', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-09-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1168, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'EMRE YAYCI', '14581454350', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2015-07-01', 1, '3500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(704, 45, 'Halkalı Final Özel Öğretim Kursu', 'FERHAT KELEŞ', '44356849890', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3150,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1161, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'FARUK AYDIN', '40804260712', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-08-09', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(707, 45, 'Halkalı Final Özel Öğretim Kursu', 'GÜLAY ÖNDER', '28138055518', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-12', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1162, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'PINAR TÜRKAN', '53809536874', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-09-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1163, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'EBRU ARSLAN', '55315509946', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-04-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1164, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'EBRU KİRMİK', '26792079574', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-04-01', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(712, 45, 'Halkalı Final Özel Öğretim Kursu', 'SEVGİ TOPUZ', '51178661982', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-19', 1, '2250,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(713, 45, 'Halkalı Final Özel Öğretim Kursu', 'SONGÜL ULUGANA', '32197146148', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-12-23', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1158, 45, 'Halkalı Final Özel Öğretim Kursu', 'MESUT YILMAZ', '20404175104', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-21', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1159, 45, 'Halkalı Final Özel Öğretim Kursu', 'ŞAFAK ALKUŞ', '20002837978', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-03-01', 1, '2300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1160, 16, 'Esenler Fen Bilimleri Özel Öğretim Kursu', 'RAHİME KAHRAMAN', '71722016310', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-08-09', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(720, 45, 'Halkalı Final Özel Öğretim Kursu', 'AYLENUR MAZI', '14873189922', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-12-10', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1189, 24, 'Şirinevler Final Özel Öğretim Kursu', 'KADİR ÖZDEMİR', '50596597118', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1190, 24, 'Şirinevler Final Özel Öğretim Kursu', 'KADRİYE BİLİCİ', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 0, '', NULL, NULL, 0),
(727, 24, 'Şirinevler Final Özel Öğretim Kursu', 'FERAHİ ERZÜ', '43102474690', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-01-04', 1, '2049,68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(730, 24, 'Şirinevler Final Özel Öğretim Kursu', 'ROJDAN EROL', '57778408286', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-06-30', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1185, 24, 'Şirinevler Final Özel Öğretim Kursu', 'AYŞE ÖZTÜRK', '44161000882', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(733, 24, 'Şirinevler Final Özel Öğretim Kursu', 'ADEM YILDIRIM', '15449860412', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-06-26', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(734, 24, 'Şirinevler Final Özel Öğretim Kursu', 'YADİN ZUREL', '40816153446', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-25', 1, '2184,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(735, 24, 'Şirinevler Final Özel Öğretim Kursu', 'NURİYE ÖZYURT', '57175533758', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-06', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(736, 24, 'Şirinevler Final Özel Öğretim Kursu', 'YETER DEMİR', '53980318580', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-11', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(737, 24, 'Şirinevler Final Özel Öğretim Kursu', 'AYFER ÇIKAR', '59539309092', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-14', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(738, 24, 'Şirinevler Final Özel Öğretim Kursu', 'AYŞE BALTA', '13446050430', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-13', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(741, 24, 'Şirinevler Final Özel Öğretim Kursu', 'HALİL GÜNEŞ', '24617670340', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-01', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1186, 24, 'Şirinevler Final Özel Öğretim Kursu', 'BELGİN SARIÇİÇEK', '61306070722', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1187, 24, 'Şirinevler Final Özel Öğretim Kursu', 'ERTUĞRUL ALTUNTAŞ', '30068446472', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '3500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1188, 24, 'Şirinevler Final Özel Öğretim Kursu', 'GAMZE ÖZTÜRK', '50827639808', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(747, 15, 'Tarabya Final Özel Öğretim Kursu', 'SEVAL KABLAN', '63151372402', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-01', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(751, 15, 'Tarabya Final Özel Öğretim Kursu', 'CEYLAN KAYA', '52534010864', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '4100,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(932, 35, 'Avcılar Çözüm Okulları', 'ONUR AYRILMA', '25064686502', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-01-01', 1, '4000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1);
INSERT INTO `personnel` (`id`, `institution_id`, `institution_name`, `personnel_name`, `tc`, `registration_number`, `personnel_phone`, `iban`, `date_of_birth`, `branch`, `sub_branch_id`, `sub_branch`, `entry_date`, `insurance_status`, `net_salary`, `official_salary`, `copy_of_identity_card`, `criminal_record`, `place_of_residence`, `health_report`, `contract`, `diploma`, `image`, `gender`, `rank`, `isActive`, `reason_for_rejection`, `black_list`, `black_list_description`, `isActivePersonnel`) VALUES
(752, 15, 'Tarabya Final Özel Öğretim Kursu', 'ELİF BAYRAK', '69460028566', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-16', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(753, 15, 'Tarabya Final Özel Öğretim Kursu', 'DİLEK KAYNAK ÇAYLI', '15362845510', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-04', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1121, 8, 'Florya Final Etüt Merkezi', 'HALİL AK', '21752650312', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-06-25', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(757, 15, 'Tarabya Final Özel Öğretim Kursu', 'HALİL İBRAHİM', '22939888504', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-03', 1, '2750,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1122, 29, 'Halkalı Çözüm Etüt Merkezi', 'ENGİN TALAYHAN', '', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-06-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(762, 15, 'Tarabya Final Özel Öğretim Kursu', 'HATİCE AYDIN', '52807409746', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-03-30', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(763, 15, 'Tarabya Final Özel Öğretim Kursu', 'DERVİŞ ERDİ', '40948307410', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-14', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(767, 15, 'Tarabya Final Özel Öğretim Kursu', 'ENGİN KUTLUAY', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-13', 1, '1000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(768, 15, 'Tarabya Final Özel Öğretim Kursu', 'EKREM ÖZDEMİR', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-13', 1, '2500,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(771, 15, 'Tarabya Final Özel Öğretim Kursu', 'ÜMRAN VURAL', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-04', 1, '4000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(772, 15, 'Tarabya Final Özel Öğretim Kursu', 'HANDE KÖROĞLU', '62779384804', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-26', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(773, 15, 'Tarabya Final Özel Öğretim Kursu', 'MİNE BABAL', '56350410914', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-13', 1, '2300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(774, 41, 'Bahçelievler Final Özel Öğretim Kursu', 'BURAK BURAK	ÇİFTÇİ', '73924073184', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-02', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(775, 41, 'Bahçelievler Final Özel Öğretim Kursu', 'ŞURA NUR', '29873295566', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-16', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(776, 41, 'Bahçelievler Final Özel Öğretim Kursu', 'SERPİL ', '13556423414', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-05-09', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(781, 41, 'Bahçelievler Final Özel Öğretim Kursu', 'CEMAL MORKOÇ', '37385265908', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3300,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(791, 41, 'Bahçelievler Final Özel Öğretim Kursu', 'MURAT AKTÜRK', '61417430972', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3200,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(796, 41, 'Bahçelievler Final Özel Öğretim Kursu', 'KENAN OĞUZ', '40588651164', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3000,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(797, 41, 'Bahçelievler Final Özel Öğretim Kursu', 'ALİ EKBER', '16211013432', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-07-19', 1, '2184,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(799, 41, 'Bahçelievler Final Özel Öğretim Kursu', 'MÜRÜVVET DURMAZ', '35621180602', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-02-19', 1, '2020,90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(805, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'BERNA KOPUZ', '14541033786', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-21', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1118, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'BÜŞRA ÖZTÜRK', '17924036664', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-05-17', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1119, 15, 'Tarabya Final Özel Öğretim Kursu', 'BERİTAN DEMİRKAPU', '52873151440', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-06-07', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1120, 15, 'Tarabya Final Özel Öğretim Kursu', 'HATİCE SEVİNÇ', '13223465488', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-05-17', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(811, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'ŞENAY TAŞKINOĞLU', '18983817904', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-02', 1, '3500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(812, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'İSRAFİL ÇARPAR', '13889659986', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-01', 1, '2800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(813, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'ENGİN ŞİT', '23522728078', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-01', 1, '3500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(814, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'HÜSEYİN AY', '32563349746', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-14', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(817, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'BİLAL KARAKURT', '12638547512', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-26', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(820, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'ZEHRA ZIVALI', '56401406668', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-29', 1, '2136.03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(821, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'MELTEM ALBAYRAK', '31621670624', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-15', 1, '3300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(822, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'MUHARREM AYHAN', '63175062976', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-07', 1, '3800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(825, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'MUSTAFA İKİZLER', '13214931688', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-06', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(827, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'MEHMET GÜNEŞ', '19501421856', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-23', 1, '1300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(828, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'ASLI DEMİR', '27008117882', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-30', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(829, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'KÜBRA AYDEMİR', '14558312492', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-24', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(830, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'SEVİM ALAN', '10739402624', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-05', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(831, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'MURAT KULAK', '41980261944', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-15', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(832, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'MURAT ÇİVRİL', '38341156292', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-15', 1, '3500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(833, 20, 'Beşyol Final Özel Öğretim Kursu', 'ALİ BERAT ERZÜ', '43111474308', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-01', 1, '4200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(834, 20, 'Beşyol Final Özel Öğretim Kursu', 'AYŞE KORKMAZ', '53551335886', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-30', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(835, 20, 'Beşyol Final Özel Öğretim Kursu', 'DURMUŞ KUTBAY', '46288779450', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-25', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(843, 20, 'Beşyol Final Özel Öğretim Kursu', 'REVA SEMİZ', '46264780210', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-16', 1, '2078.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(847, 20, 'Beşyol Final Özel Öğretim Kursu', 'SERHAT AKBAŞ', '16423217062', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(848, 20, 'Beşyol Final Özel Öğretim Kursu', 'UĞUR POLAT', '33665076714', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-25', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(850, 20, 'Beşyol Final Özel Öğretim Kursu', 'YILMAZ KORKMAZ', '26965325682', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-19', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1171, 26, 'Halkalı Çözüm Temel Lisesi', 'MELEK PAÇİN', '41479778816', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-15', 1, '2400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(854, 20, 'Beşyol Final Özel Öğretim Kursu', 'MEHMET YILDIZ', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-25', 1, '2400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(855, 20, 'Beşyol Final Özel Öğretim Kursu', 'ÖZNUR KARADAĞ', '32149894202', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-25', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(856, 20, 'Beşyol Final Özel Öğretim Kursu', 'FATMA KORKMAZ', '53560335594', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-27', 1, '2088.6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(860, 20, 'Beşyol Final Özel Öğretim Kursu', 'HASAN İRENCİ', '53029197770', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-15', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(863, 17, 'Sultangazi Final Etüt Merkezi', 'MUHAMMET KAYA', '29281232504', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-26', 1, '2250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(864, 17, 'Sultangazi Final Etüt Merkezi', 'FAZIL KORKMAZ', '37582582976', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-26', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(882, 17, 'Sultangazi Final Etüt Merkezi', 'HÜLYA KONDUR', '19390173294', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-14', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(883, 17, 'Sultangazi Final Etüt Merkezi', 'BÜŞRA YAYCI', '14494457288', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-07-13', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(884, 17, 'Sultangazi Final Etüt Merkezi', 'EMİNE İNCE', '16118032260', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-16', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(885, 17, 'Sultangazi Final Etüt Merkezi', 'KORAY ORMANCI', '11471513654', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-07', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1111, 17, 'Sultangazi Final Etüt Merkezi', 'SEHER YILDIRIM', '15869062120', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-06-13', 1, '2020.90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(893, 17, 'Sultangazi Final Etüt Merkezi', 'BİRSEL DURSUN', '12914757062', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-12-19', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(896, 13, 'Bayrampaşa Uğur Temel Lisesi', 'HARUN TURKAN', '37964235032', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2016-03-24', 1, '2800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(899, 13, 'Bayrampaşa Uğur Temel Lisesi', 'GÖZDE KARACA', '22324230772', NULL, '', '', '0000-00-00', '', NULL, NULL, '2015-10-12', 1, '2120.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(900, 13, 'Bayrampaşa Uğur Temel Lisesi', 'SEVGİ PAKNA', '15752343336', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-10', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(901, 13, 'Bayrampaşa Uğur Temel Lisesi', 'AYŞEN ÇAYIRLI', '41029528090', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-06-29', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(923, 13, 'Bayrampaşa Uğur Temel Lisesi', 'EBRU CORA KAYA', '71299089410', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-17', 1, '1250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(926, 13, 'Bayrampaşa Uğur Temel Lisesi', 'KORHAN YILDIZ', '35839671350', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-10-17', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(927, 49, 'Bayrampaşa Atakent Özel Öğretim Kursu', 'SEHER GERLİKHAN', '44053417378', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2016-02-10', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(928, 13, 'Bayrampaşa Uğur Temel Lisesi', 'SELVİNAZ AKAN', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-17', 1, '900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(931, 13, 'Bayrampaşa Uğur Temel Lisesi', 'CUMALİ MISIRLI', '10973975236', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-01', 1, '4000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1150, 44, 'Bağcılar Final Özel Öğretim Kursu', 'RAMAZAN YARDIMCIOĞLU', '27382501536', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1151, 44, 'Bağcılar Final Özel Öğretim Kursu', 'ŞABAN KAYA', '57892565940', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-16', 1, '2400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1152, 44, 'Bağcılar Final Özel Öğretim Kursu', 'ŞÜHEDA KORKUT', '33817990684', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-28', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(941, 35, 'Avcılar Çözüm Okulları', 'KAMİLE ÜRESİN', '56047612270', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-12', 1, '2100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(942, 35, 'Avcılar Çözüm Okulları', 'KADİR GÜNDÜZ', '44044214856', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-25', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(943, 35, 'Avcılar Çözüm Okulları', 'NAZMİ AKKOÇ', '55297193652', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(944, 35, 'Avcılar Çözüm Okulları', 'PELİN DENİZ', '18650376444', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-30', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(945, 35, 'Avcılar Çözüm Okulları', 'NİLAY BÜYÜKSAATÇI', '31492454934', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(946, 35, 'Avcılar Çözüm Okulları', 'NESLİHAN SAYKIN', '22631622734', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-08-31', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(947, 35, 'Avcılar Çözüm Okulları', 'SAMET KORKUT', '63373274768', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1196, 49, 'Bayrampaşa Atakent Özel Öğretim Kursu', 'FATİH İNCE', '', 0, '', '', '0000-00-00', 'İdari Personel', 10, 'Bilgi İşlem', '0000-00-00', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(950, 35, 'Avcılar Çözüm Okulları', 'ŞÜKRÜ ÇAM', '29713408712', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-17', 1, '2184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(951, 35, 'Avcılar Çözüm Okulları', 'VİLDAN DOĞAN', '54724664536', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-27', 1, '1077.61', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1153, 44, 'Bağcılar Final Özel Öğretim Kursu', 'TUĞBA TEKE', '13387944874', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-01-28', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1148, 44, 'Bağcılar Final Özel Öğretim Kursu', 'ÖZLEM ', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 0, '', NULL, NULL, 0),
(1149, 44, 'Bağcılar Final Özel Öğretim Kursu', 'ÖZLEM GÜLLÜCE', '38950266290', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-26', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(955, 35, 'Avcılar Çözüm Okulları', 'YETER AKIN', '20578733544', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-11-16', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(956, 35, 'Avcılar Çözüm Okulları', 'TUBA YAZICIOĞLU', '22048503138', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-01-22', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(957, 35, 'Avcılar Çözüm Okulları', 'EDA UĞURCAN', '12767480858', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-04', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(958, 35, 'Avcılar Çözüm Okulları', 'FADİME GÜLDALİ', '37906808102', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-02-28', 1, '1500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(959, 35, 'Avcılar Çözüm Okulları', 'MELTEM  NEGİZ', '67441022466', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-01', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1154, 44, 'Bağcılar Final Özel Öğretim Kursu', 'ZEKİ ACAR', '60079308070', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-05-24', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(961, 25, 'Samsun Sevinç Okulları', 'METİN KILIÇ', '14072344634', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-26', 1, '3500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(962, 25, 'Samsun Sevinç Okulları', 'KÜBRA ÖZGÜMÜŞDAĞ', '50011655812', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-29', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1179, 11, 'Genel Müdürlük', 'ABDULLAH ALP', '43231383412', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2017-10-10', 1, '4500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(964, 25, 'Samsun Sevinç Okulları', 'BANU DOĞAN', '48424709604', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1178, 11, 'Genel Müdürlük', 'KENAN YENİYOL', '10802558852', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2017-10-10', 1, '4000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(967, 25, 'Samsun Sevinç Okulları', 'ELİF YILMAZ', '12224921160', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(968, 25, 'Samsun Sevinç Okulları', 'ESRA GERMİOĞLU', '34715157148', NULL, '0', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '2300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1177, 11, 'Genel Müdürlük', 'KADİR KILIÇ', '18443456544', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2017-10-10', 1, '3300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 0, '', NULL, NULL, 0),
(970, 25, 'Samsun Sevinç Okulları', 'ÖZLEM REÇBER', '44059855044', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(971, 25, 'Samsun Sevinç Okulları', 'SEMA BİLGİÇ', '60499321802', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(972, 25, 'Samsun Sevinç Okulları', 'TÜRKAN YILDIZ', '41371943350', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '2700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(973, 25, 'Samsun Sevinç Okulları', 'YASEMİN GÜLER', '24859169688', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-10', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(975, 25, 'Samsun Sevinç Okulları', 'SEDA KAÇAN', '57718465744', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-12', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(976, 25, 'Samsun Sevinç Okulları', 'FATİH RIFKI KÖKSAL', '49642665260', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(977, 25, 'Samsun Sevinç Okulları', 'YÜKSELEN KURU', '46936758806', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-06', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(978, 25, 'Samsun Sevinç Okulları', 'GÜLER GENÇ', '67411081660', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-16', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(979, 25, 'Samsun Sevinç Okulları', 'SEMRA GÜNEŞ', '27845260116', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-11-10', 1, '1100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(980, 25, 'Samsun Sevinç Okulları', 'GÜNEL TÜKELTÜRK', '31006969688', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-11-06', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(981, 25, 'Samsun Sevinç Okulları', 'SEMİH ATEŞ', '28316342638', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-01-01', 1, '2800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1174, 28, 'Mimaroba Final Okulları', 'GİZEM DEMİRCİOĞLU', '38425018102', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-04-27', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(983, 25, 'Samsun Sevinç Okulları', 'REYHAN YILMAZ', '47341900064', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-01', 1, '1475', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(984, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'ERHAN YILDIRIM', '18064917714', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-14', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1106, 42, 'Bahçelievler Final Okulları', 'NURAY ERTÜRK', '49597324328', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-20', 1, '843', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(988, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'FATMA TUTAN', '44302780536', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(989, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'NAZMİ CİĞER', '53305074344', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(990, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'SIDDIKA ÜNÜVAR', '54067277042', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-08', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(991, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'ZEKİ SAĞATCI', '58420034792', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-10', 1, '3200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(993, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'MÜGE KARACA', '37039112916', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '2300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1103, 42, 'Bahçelievler Final Okulları', 'AYHAN ÇANDIR', '10085843256', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-08-06', 1, '4500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(995, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'ÖZKAN GÜLAY', '14636915072', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(996, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'ÖZLEM ÖRS', '48727851024', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-19', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(997, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'BÜŞRA TAŞDEMİR', '34795073468', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-05-15', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1104, 42, 'Bahçelievler Final Okulları', 'ÇİÇEK ŞİMŞEK', '32759402316', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-05-03', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1105, 42, 'Bahçelievler Final Okulları', 'EMİN  ÖZCAN', '15281832134', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-03-01', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1002, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'TUĞBA POLAT', '23603221740', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-01', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1003, 9, 'Tepeüstü Atakent Özel Öğretim Kursu', 'SONGÜL ÇELEBİ', '34264313422', NULL, '', '', '0000-00-00', '', NULL, NULL, '0019-03-23', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1004, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'YAZGI YAZAR', '33862090292', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-14', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1005, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'ZAFER ÖNDER', '28189053860', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-03', 1, '2184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1006, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'ÖMER ERDANIŞMAN', '22117781122', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-05', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1008, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'SEDAT YILDIZ', '47479608184', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-01-01', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1009, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'HÜLYA SANCAR', '27814066374', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-06', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1012, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'DOĞAN SARI', '26248580128', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1013, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'AÇELYA GÖKÇELİ', '17569168294', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1014, 39, 'Halkalı Fen Bilimleri Özel Öğretim Kursu', 'GÖKHAN TÜRKMEN', '32566453464', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '4000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1173, 25, 'Samsun Sevinç Okulları', 'DUYGU KOCAER', '69979099996', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-04-09', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1180, 11, 'Genel Müdürlük', 'ADİL ÖZKAN', '15168018606', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2017-10-10', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1181, 11, 'Genel Müdürlük', 'UĞUR YAVUZ', '37741291824', 0, '', '', '0000-00-00', 'İdari Personel', 6, 'İngilizce', '2017-10-10', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1182, 11, 'Genel Müdürlük', 'ŞAHİN ERİNÇ YÜCEİL', '12664097500', 0, '', '', '1989-06-29', 'İdari Personel', 6, 'İngilizce', '2019-03-11', 1, '2400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1183, 11, 'Genel Müdürlük', 'OSMAN GERÇEK', '14630165770', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-05-06', 1, '4500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1023, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'FIRAT AKŞİN', '23989424810', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-15', 1, '2300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1024, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'ELİF YAŞAR', '21344631262', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-15', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1025, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'ZELİHA SAĞLAM', '43114880694', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '3000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1026, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'YAĞMUR YÜKSEL', '22322004252', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-06-06', 1, '2750', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1101, 27, 'Ankara Final Okulları', 'ÇİĞDEM AYGÜN', '15014030554', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-04-10', 1, '2120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 0, '', NULL, NULL, 0),
(1098, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'DUDU DOĞAN', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-26', 1, '2020.90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1032, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'TUĞBA GEÇİT', '33290211214', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-03-27', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1033, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'ÖMER NURAL', '39721894216', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-04-26', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1034, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'GAMZE MEMİŞ', '36922309846', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-02', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1102, 38, 'Bakırköy Final Etüt Merkezi', 'ÇİĞDEM AYGÜN', '15014030554', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-04-10', 1, '2120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1037, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'EMİNE AKARMUT', '25015628650', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-03-28', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1094, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'ERHAN ÇETİNTÜRK', '11454055454', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '0000-00-00', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1095, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'BURAK TAŞKIRAN', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-17', 1, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1097, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'FATMA  İŞLER', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-22', 1, '2020.90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1042, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'AHSEN ÇAKI', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-03-22', 1, '2020.90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1043, 36, 'Avcılar Çözüm Özel Öğretim Kursu', 'ESRAGÜL KAVAL', '', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-20', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1044, 38, 'Bakırköy Final Etüt Merkezi', 'AYŞE ÖZER', '40162923984', NULL, '', '', '0000-00-00', '', NULL, NULL, '0216-04-26', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1045, 38, 'Bakırköy Final Etüt Merkezi', 'BÜŞRA ADANUR ', '24155600700', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-10-22', 1, '2300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1046, 38, 'Bakırköy Final Etüt Merkezi', 'DAMLA SEÇGİN', '15931335640', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1048, 38, 'Bakırköy Final Etüt Merkezi', 'EZGİ ULUTAŞ', '61909061226', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '2500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1049, 38, 'Bakırköy Final Etüt Merkezi', 'HARUN MAMAŞ', '14177802718', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '2400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1050, 38, 'Bakırköy Final Etüt Merkezi', 'MEHMET ATA ACAR', '41656819752', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1051, 38, 'Bakırköy Final Etüt Merkezi', 'MELİH MERT OSKAY', '42058464182', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-01', 1, '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1052, 38, 'Bakırköy Final Etüt Merkezi', 'MERVE TÜREN', '40009668160', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-06-20', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1100, 38, 'Bakırköy Final Etüt Merkezi', 'FERDİ YILDIZ', '37015589312', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-05-06', 1, '2170', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1054, 38, 'Bakırköy Final Etüt Merkezi', 'SEMİHA OKUMUŞ', '37223235704', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1055, 38, 'Bakırköy Final Etüt Merkezi', 'TUĞÇE YILMAZ', '33980141548', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-28', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1099, 38, 'Bakırköy Final Etüt Merkezi', 'ADEM CORUK', '66748129250', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2018-07-01', 1, '2250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1057, 38, 'Bakırköy Final Etüt Merkezi', 'AKİF MIÇI', '22973764000', NULL, '', '', '0000-00-00', '', NULL, NULL, '2019-03-01', 1, '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1058, 23, 'Kağıthane Final Temel Lisesi', 'ÖZLEM ÇOBANOĞLU', '17795797978', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-07-01', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1059, 23, 'Kağıthane Final Temel Lisesi', 'BERRE ALTUNLU', '47359414614', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1060, 23, 'Kağıthane Final Temel Lisesi', 'MERVE ÖZKUL', '48439648028', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1170, 13, 'Bayrampaşa Uğur Temel Lisesi', 'MUAMMER ALBAYRAK', '26932984294', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-05-17', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1062, 23, 'Kağıthane Final Temel Lisesi', 'ÖZLEM AKSÖZ BAŞARAN', '68233196402', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1063, 23, 'Kağıthane Final Temel Lisesi', 'PELİN GEDİKOĞLU', '12422395244', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1169, 13, 'Bayrampaşa Uğur Temel Lisesi', 'ARZU PAŞAHAN', '', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '0000-00-00', 1, '750', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1065, 23, 'Kağıthane Final Temel Lisesi', 'MUSTAFA DÖNMEZ', '21958261060', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1067, 23, 'Kağıthane Final Temel Lisesi', 'SÜMEYRA KAYA', '38857985744', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-27', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1068, 23, 'Kağıthane Final Temel Lisesi', 'ARİF EROL', '11211042888', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-09-29', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1069, 23, 'Kağıthane Final Temel Lisesi', 'SEDA DOĞAN', '11085153116', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-12-10', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1071, 8, 'Florya Final Etüt Merkezi', 'ARAFAT AKTAŞ', '33128114182', NULL, '', '', '0000-00-00', '', NULL, NULL, '2016-10-03', 1, '2400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1072, 8, 'Florya Final Etüt Merkezi', 'SİBEL YILDIRIM', '18067917650', NULL, '', '', '0000-00-00', '', NULL, NULL, '2017-07-12', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1117, 30, 'Ümraniye Atakent Özel Öğretim Kursu', 'NAİLE KILIÇ', '55534427037', 0, '', '', '0000-00-00', 'Personel', 3, 'Fizik', '2019-06-24', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1076, 8, 'Florya Final Etüt Merkezi', 'SEVGÜLER MUSTAFOV', '43231383412', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-08-14', 1, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erkek', 0, 1, '', NULL, NULL, 1),
(1078, 8, 'Florya Final Etüt Merkezi', 'SEMA BAŞOĞLU', '13481412712', NULL, '', '', '0000-00-00', '', NULL, NULL, '2018-09-18', 1, '2020.9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1),
(1157, 49, 'Bayrampaşa Atakent Özel Öğretim Kursu', 'AYŞEGÜL ZAVALSIZ', '68284033756', 0, '', '', '0000-00-00', 'İdari Personel', 3, 'Fizik', '2019-06-24', 1, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kadın', 0, 1, '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personnel_exit_table`
--

CREATE TABLE `personnel_exit_table` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `personnel_name` varchar(255) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `output_reason` text DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `reason_for_rejection` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personnel_payments`
--

CREATE TABLE `personnel_payments` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `personnel_name` varchar(255) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `net_salary` varchar(255) DEFAULT NULL,
  `advance_payment` varchar(255) DEFAULT NULL,
  `receivable_amount` varchar(255) DEFAULT NULL,
  `bank_payment` varchar(255) DEFAULT NULL,
  `manuel_payment` varchar(255) DEFAULT NULL,
  `bes_payment` varchar(255) DEFAULT NULL,
  `executive_payment` varchar(255) DEFAULT NULL,
  `payment_made` varchar(255) DEFAULT NULL,
  `remaining_payment` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `working_day` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `year_month` date DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `reason_for_rejection` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `personnel_payments`
--

INSERT INTO `personnel_payments` (`id`, `personnel_id`, `personnel_name`, `institution_id`, `institution_name`, `net_salary`, `advance_payment`, `receivable_amount`, `bank_payment`, `manuel_payment`, `bes_payment`, `executive_payment`, `payment_made`, `remaining_payment`, `description`, `working_day`, `date`, `year_month`, `isActive`, `reason_for_rejection`) VALUES
(1529, 441, 'VİLDAN ÖZER', 37, 'Kağıthane Final Okulları', '2600,00', NULL, '2600,00', NULL, NULL, NULL, NULL, '2600,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1525, 468, 'SEVİM KONCA', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1523, 472, 'SERAP KISRAK', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1484, 446, 'BÜŞRANUR YÜCEL', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1485, 469, 'CİHAD DENİZLİ', 37, 'Kağıthane Final Okulları', '2300,00', NULL, '2300,00', NULL, NULL, NULL, NULL, '2300,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1486, 463, 'DURMUŞ KARAÇAM', 37, 'Kağıthane Final Okulları', '2184,00', NULL, '2184,00', NULL, NULL, NULL, NULL, '2184,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1487, 438, 'EBRU TÜRKMEN', 37, 'Kağıthane Final Okulları', '3000,00', NULL, '3000,00', NULL, NULL, NULL, NULL, '3000,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1488, 435, 'ELİF KÖROĞLU', 37, 'Kağıthane Final Okulları', '2800,00', NULL, '2800,00', NULL, NULL, NULL, NULL, '2800,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1489, 453, 'ELVAN MORAL', 37, 'Kağıthane Final Okulları', '2200,00', NULL, '2200,00', NULL, NULL, NULL, NULL, '2200,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1490, 420, 'EMİNE CABAŞ', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1491, 434, 'EMRAH GÖKÇELİ', 37, 'Kağıthane Final Okulları', '2500,00', NULL, '2500,00', NULL, NULL, NULL, NULL, '2500,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1492, 417, 'ERKEN ALTINDAŞ', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1493, 457, 'ESMA ADALI', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1494, 473, 'FATMA SEVDE', 37, 'Kağıthane Final Okulları', '2350,00', NULL, '2350,00', NULL, NULL, NULL, NULL, '2350,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1495, 437, 'FERHAT KARA', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1496, 460, 'FRANC MARC', 37, 'Kağıthane Final Okulları', '2225,00', NULL, '2225,00', NULL, NULL, NULL, NULL, '2225,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1497, 423, 'GALİP UÇAN', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1498, 459, 'GAMZE ÇETİN', 37, 'Kağıthane Final Okulları', '2200,00', NULL, '2200,00', NULL, NULL, NULL, NULL, '2200,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1499, 461, 'GÜNEL MAMMADOV', 37, 'Kağıthane Final Okulları', '3150,00', NULL, '3150,00', NULL, NULL, NULL, NULL, '3150,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1500, 445, 'HABİBE CANDAN', 37, 'Kağıthane Final Okulları', '2200,00', NULL, '2200,00', NULL, NULL, NULL, NULL, '2200,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1501, 471, 'HALE YETİŞEN', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1502, 443, 'HATİCE MODA', 37, 'Kağıthane Final Okulları', '2200,00', NULL, '2200,00', NULL, NULL, NULL, NULL, '2200,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1503, 458, 'HÜLYA BORA', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1504, 422, 'İREM UYMAZ', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1505, 421, 'KADER URUN', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1506, 429, 'MEHMET ALİ', 37, 'Kağıthane Final Okulları', '2020,00', NULL, '2020,00', NULL, NULL, NULL, NULL, '2020,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1507, 400, 'MEHMET GÜNDÜZ', 37, 'Kağıthane Final Okulları', '3750,00', NULL, '3750,00', NULL, NULL, NULL, NULL, '3750,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1508, 444, 'MELTEM AKGÜL', 37, 'Kağıthane Final Okulları', '2200,00', NULL, '2200,00', NULL, NULL, NULL, NULL, '2200,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1530, 1068, 'ARİF EROL', 23, 'Kağıthane Final Temel Lisesi', '2020.9', NULL, '1010.45', NULL, NULL, NULL, NULL, '1010.45', '0', NULL, 15, '2019-07-24', '2019-07-01', 1, NULL),
(1528, 454, 'ÜMRAN ÖZDEMİR', 37, 'Kağıthane Final Okulları', '2300,00', NULL, '2300,00', NULL, NULL, NULL, NULL, '2300,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1527, 475, 'ÜMİT POTUR', 37, 'Kağıthane Final Okulları', '2300,00', NULL, '2300,00', NULL, NULL, NULL, NULL, '2300,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1526, 456, 'TUĞBA BAYRAM', 37, 'Kağıthane Final Okulları', '2100,00', NULL, '2100,00', NULL, NULL, NULL, NULL, '2100,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1524, 455, 'SERKAN ÖKSÜZ', 37, 'Kağıthane Final Okulları', '3250,00', NULL, '3250,00', NULL, NULL, NULL, NULL, '3250,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1522, 448, 'SEFA İPEK', 37, 'Kağıthane Final Okulları', '2200,00', NULL, '2200,00', NULL, NULL, NULL, NULL, '2200,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1521, 474, 'SAADETNUR SOLMAZ', 37, 'Kağıthane Final Okulları', '2750,00', NULL, '2750,00', NULL, NULL, NULL, NULL, '2750,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1520, 462, 'RIDVAN KAKIZ', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1518, 470, 'ÖZDEM FUNDA', 37, 'Kağıthane Final Okulları', '2800,00', NULL, '2800,00', NULL, NULL, NULL, NULL, '2800,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1519, 464, 'RİAL ALAFANDI', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1515, 431, 'OGÜN ÖZDEMİR', 37, 'Kağıthane Final Okulları', '3000,00', NULL, '3000,00', NULL, NULL, NULL, NULL, '3000,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1516, 450, 'ÖMER SELÇUK', 37, 'Kağıthane Final Okulları', '2800,00', NULL, '2800,00', NULL, NULL, NULL, NULL, '2800,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1517, 436, 'ONUR ÇAM', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1514, 440, 'NURGÜL KÖSE', 37, 'Kağıthane Final Okulları', '2500,00', NULL, '2500,00', NULL, NULL, NULL, NULL, '2500,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1513, 466, 'NAZLI DÜKKEL', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1511, 439, 'MURATCAN TEMURÇİN', 37, 'Kağıthane Final Okulları', '2800,00', NULL, '2800,00', NULL, NULL, NULL, NULL, '2800,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1512, 433, 'NARİN ARSLAN', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020,90', NULL, NULL, NULL, NULL, '2020,90', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1510, 449, 'MERVE TOPÇU', 37, 'Kağıthane Final Okulları', '2500,00', NULL, '2500,00', NULL, NULL, NULL, NULL, '2500,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1509, 442, 'MERVE POYRAZ', 37, 'Kağıthane Final Okulları', '2300,00', NULL, '2300,00', NULL, NULL, NULL, NULL, '2300,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1482, 467, 'BURCU YÜKSEL', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '1212', NULL, NULL, NULL, NULL, '1212', '0', NULL, 18, '2019-07-18', '2019-07-01', 1, NULL),
(1483, 451, 'BÜŞRA KOÇER', 37, 'Kağıthane Final Okulları', '2200,00', NULL, '2200,00', NULL, NULL, NULL, NULL, '2200,00', '0', NULL, 30, '2019-07-18', '2019-07-01', 1, NULL),
(1480, 424, 'BETÜL YILMAZ', 37, 'Kağıthane Final Okulları', '3000,00', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', 'Çalışmadı', 0, '2019-07-18', '2019-07-01', 1, NULL),
(1481, 447, 'GAMZE ULU', 37, 'Kağıthane Final Okulları', '2200,00', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', 'Çalışmadı', 0, '2019-07-18', '2019-07-01', 1, NULL),
(1476, 465, 'AHMET GÖÇER', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '1010', NULL, NULL, NULL, NULL, '1010', '0', NULL, 15, '2019-07-18', '2019-07-01', 1, NULL),
(1477, 452, 'AYHAN UÇAN', 37, 'Kağıthane Final Okulları', '3500,00', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', 'Çalışmadı', 0, '2019-07-18', '2019-07-01', 1, NULL),
(1478, 430, 'ASLI ÖZER', 37, 'Kağıthane Final Okulları', '2200,00', NULL, '1686.6666666667', NULL, NULL, NULL, NULL, '1686.6666666667', '0', NULL, 23, '2019-07-18', '2019-07-01', 1, NULL),
(1479, 432, 'AYŞEGÜL ALTINDAŞ', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '1346.6666666667', NULL, NULL, NULL, NULL, '1346.6666666667', '0', NULL, 20, '2019-07-18', '2019-07-01', 1, NULL),
(1542, 1092, 'ISMAIL YOK', 48, 'deneme kurum-1', '4000', NULL, '1333.3333333333', NULL, NULL, NULL, NULL, '1333.3333333333', '0', NULL, 10, '2019-07-24', '2019-07-01', 1, NULL),
(1543, 1091, 'MEHMET KARATAş', 48, 'deneme kurum-1', '3000', NULL, '3000', NULL, NULL, NULL, NULL, '3000', '0', NULL, 30, '2019-07-24', '2019-07-01', 1, NULL),
(1556, 465, 'AHMET GÖÇER', 37, 'Kağıthane Final Okulları', '2020,90', NULL, '2020', '1270,90', '500', '250', '0', '0', '0', NULL, NULL, '2019-08-02', '2019-08-01', 2, NULL),
(1557, 1068, 'ARİF EROL', 23, 'Kağıthane Final Temel Lisesi', '2020.9', NULL, '2020', '1270,90', '500', '250', '0', '0', '0', NULL, NULL, '2019-08-02', '2019-08-01', 2, NULL),
(1558, 1059, 'BERRE ALTUNLU', 23, 'Kağıthane Final Temel Lisesi', '2020.9', NULL, '2020', '1270,90', '500', '250', '0', '0', '0', NULL, NULL, '2019-08-02', '2019-08-01', 4, NULL),
(1559, 1060, 'MERVE ÖZKUL', 23, 'Kağıthane Final Temel Lisesi', '2020.9', NULL, '2020', '1270,90', '500', '250', '0', '0', '0', NULL, NULL, '2019-08-02', '2019-08-01', 4, NULL),
(1560, 1063, 'PELİN GEDİKOĞLU', 23, 'Kağıthane Final Temel Lisesi', '2020.9', NULL, '2020', '1270,90', '500', '250', '0', '0', '0', NULL, NULL, '2019-08-02', '2019-08-01', 4, NULL),
(1561, 1058, 'ÖZLEM ÇOBANOĞLU', 23, 'Kağıthane Final Temel Lisesi', '2020.9', NULL, '2020', '1270,90', '500', '250', '0', '0', '0', NULL, NULL, '2019-08-02', '2019-08-01', 4, NULL),
(1562, 1062, 'ÖZLEM AKSÖZ BAŞARAN', 23, 'Kağıthane Final Temel Lisesi', '2020.9', NULL, '2020', '1270,90', '500', '250', '0', '0', '0', NULL, NULL, '2019-08-02', '2019-08-01', 4, NULL),
(1563, 1179, 'ABDULLAH ALP', 11, 'Genel Müdürlük', '4500', NULL, '4500', NULL, NULL, NULL, NULL, '4000', '500', NULL, 30, '2019-10-12', '2019-10-01', 1, NULL),
(1564, 1180, 'ADİL ÖZKAN', 11, 'Genel Müdürlük', '2020.9', NULL, '2020.9', NULL, NULL, NULL, NULL, '2020.9', '0', NULL, 30, '2019-10-12', '2019-10-01', 1, NULL),
(1565, 29, 'GÖKSEL YERLİ', 11, 'Genel Müdürlük', '2400,00', NULL, '2400,00', NULL, NULL, NULL, NULL, '2400,00', '0', NULL, 30, '2019-10-12', '2019-10-01', 1, NULL),
(1566, 1175, 'İHSAN  KÖMÜRCÜOĞLU', 11, 'Genel Müdürlük', '2500', NULL, '2500', NULL, NULL, NULL, NULL, '2500', '0', NULL, 30, '2019-10-12', '2019-10-01', 1, NULL),
(1567, 1176, 'İLKER BALCIOĞLU', 11, 'Genel Müdürlük', '5600', NULL, '5600', NULL, NULL, NULL, NULL, '5600', '0', NULL, 30, '2019-10-12', '2019-10-01', 1, NULL),
(1568, 1178, 'KENAN YENİYOL', 11, 'Genel Müdürlük', '4000', NULL, '4000', NULL, NULL, NULL, NULL, '4000', '0', NULL, 30, '2019-10-12', '2019-10-01', 1, NULL),
(1569, 1183, 'OSMAN GERÇEK', 11, 'Genel Müdürlük', '4500', NULL, '4500', NULL, NULL, NULL, NULL, '4500', '0', NULL, 30, '2019-10-12', '2019-10-01', 1, NULL),
(1570, 1182, 'ŞAHİN ERİNÇ YÜCEİL', 11, 'Genel Müdürlük', '2400', NULL, '2400', NULL, NULL, NULL, NULL, '2400', '0', NULL, 30, '2019-10-12', '2019-10-01', 1, NULL),
(1571, 1181, 'UĞUR YAVUZ', 11, 'Genel Müdürlük', '2020.9', NULL, '2020.9', NULL, NULL, NULL, NULL, '2020.9', '0', NULL, 30, '2019-10-12', '2019-10-01', 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personnel_permissions`
--

CREATE TABLE `personnel_permissions` (
  `id` int(11) NOT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `personnel_name` varchar(255) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `date_of_return` date DEFAULT NULL,
  `output_reason` text DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `permission_status` tinyint(4) DEFAULT NULL,
  `document_status` tinyint(4) DEFAULT NULL,
  `operating_status` tinyint(4) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `system_report`
--

CREATE TABLE `system_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `report` varchar(255) DEFAULT NULL,
  `report_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_role_id` int(11) NOT NULL DEFAULT 2,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `system_users`
--

INSERT INTO `system_users` (`id`, `user_name`, `full_name`, `email`, `password`, `permissions`, `user_role_id`, `isActive`, `createdAt`) VALUES
(3, 'enesserol7', 'Enes Erol', 'enesserol7@gmail.com', '232e8540842a61631dbf74fca879e286', '{\"brands\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"courses\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"emailsettings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"galleries\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"news\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"popups\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio_categories\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"product\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"references\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"services\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"settings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"slides\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"testimonials\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"', 1, 1, '2018-06-07 16:57:03'),
(9, 'ozermi', 'Osman Zermi', 'ozermi@hotmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 1, 0, '2019-03-08 00:48:22'),
(10, 'ALP', 'abdullah alp', 'aselamm@hotmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 1, 0, '2019-03-09 11:01:28'),
(11, 'alp65q@gmail.com', 'mutalipalp', 'alp65q@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, 1, 0, '2019-03-13 16:13:48'),
(12, 'teknolojig', 'teknolojig', 'info@teknolojig.com', '2997f2ef32ddcfb9a74b8eb5bf8cdc4f', NULL, 3, 1, '2019-09-30 17:38:18'),
(13, 'weepay', 'weepay', 'ik@weepay.co', '5db0607b8970e0a2c21d354d34f3581b', NULL, 4, 1, '2019-09-30 17:53:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `system_user_roles`
--

CREATE TABLE `system_user_roles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `permissions` text DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `system_user_roles`
--

INSERT INTO `system_user_roles` (`id`, `title`, `permissions`, `isActive`, `createdAt`) VALUES
(1, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"branch\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institutions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"userop\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2018-09-21 23:57:09'),
(2, 'Kullanıcı', '{\"branch\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2018-09-21 23:57:19'),
(3, 'demoteknolojig', '{\"advance_payment\":{\"read\":\"on\"},\"branch\":{\"read\":\"on\"},\"dashboard\":{\"read\":\"on\"},\"institution_personnel\":{\"read\":\"on\"},\"institution_users\":{\"read\":\"on\"},\"institutions\":{\"read\":\"on\"},\"personnel\":{\"read\":\"on\"},\"personnel_exit\":{\"read\":\"on\"},\"personnel_payments\":{\"read\":\"on\"},\"personnel_permissions\":{\"read\":\"on\"},\"userop\":{\"read\":\"on\"},\"users\":{\"read\":\"on\"}}', 1, '2019-09-30 17:36:41'),
(4, 'demoweepay', '{\"advance_payment\":{\"read\":\"on\"},\"branch\":{\"read\":\"on\"},\"dashboard\":{\"read\":\"on\"},\"institution_personnel\":{\"read\":\"on\"},\"institution_users\":{\"read\":\"on\"},\"institutions\":{\"read\":\"on\"},\"personnel\":{\"read\":\"on\"},\"personnel_exit\":{\"read\":\"on\"},\"personnel_payments\":{\"read\":\"on\"},\"personnel_permissions\":{\"read\":\"on\"},\"userop\":{\"read\":\"on\"},\"users\":{\"read\":\"on\"}}', 1, '2019-09-30 17:51:17');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `advance_payment`
--
ALTER TABLE `advance_payment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `branch_list`
--
ALTER TABLE `branch_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `institution_report`
--
ALTER TABLE `institution_report`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `institution_users`
--
ALTER TABLE `institution_users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `institution_user_roles`
--
ALTER TABLE `institution_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personnel_exit_table`
--
ALTER TABLE `personnel_exit_table`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personnel_payments`
--
ALTER TABLE `personnel_payments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personnel_permissions`
--
ALTER TABLE `personnel_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `system_report`
--
ALTER TABLE `system_report`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `system_user_roles`
--
ALTER TABLE `system_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `advance_payment`
--
ALTER TABLE `advance_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `branch_list`
--
ALTER TABLE `branch_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Tablo için AUTO_INCREMENT değeri `institution_report`
--
ALTER TABLE `institution_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `institution_users`
--
ALTER TABLE `institution_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Tablo için AUTO_INCREMENT değeri `institution_user_roles`
--
ALTER TABLE `institution_user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Tablo için AUTO_INCREMENT değeri `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1200;

--
-- Tablo için AUTO_INCREMENT değeri `personnel_exit_table`
--
ALTER TABLE `personnel_exit_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `personnel_payments`
--
ALTER TABLE `personnel_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1572;

--
-- Tablo için AUTO_INCREMENT değeri `personnel_permissions`
--
ALTER TABLE `personnel_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `system_report`
--
ALTER TABLE `system_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `system_user_roles`
--
ALTER TABLE `system_user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
