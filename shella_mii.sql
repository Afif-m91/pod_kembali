-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2017 at 09:55 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shella_mii`
--

-- --------------------------------------------------------

--
-- Table structure for table `absenpeserta`
--

CREATE TABLE IF NOT EXISTS `absenpeserta` (
  `KdAbsen` int(11) NOT NULL AUTO_INCREMENT,
  `KdPeserta` char(15) NOT NULL,
  `KdMapping` char(15) NOT NULL,
  `TanggalAbsen` date NOT NULL,
  `JamAbsen` time NOT NULL,
  PRIMARY KEY (`KdAbsen`),
  UNIQUE KEY `KdPeserta` (`KdPeserta`,`KdMapping`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `absenpeserta`
--

INSERT INTO `absenpeserta` (`KdAbsen`, `KdPeserta`, `KdMapping`, `TanggalAbsen`, `JamAbsen`) VALUES
(1, 'P20170502001', 'MP201705250001', '2017-05-28', '17:24:44'),
(2, 'P20170502001', 'MP201705300001', '2017-05-31', '22:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `akseslevel`
--

CREATE TABLE IF NOT EXISTS `akseslevel` (
  `KdAksesLevel` char(3) NOT NULL,
  `NamaAksesLevel` varchar(50) NOT NULL,
  PRIMARY KEY (`KdAksesLevel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akseslevel`
--

INSERT INTO `akseslevel` (`KdAksesLevel`, `NamaAksesLevel`) VALUES
('A01', 'Admin Sistem'),
('A02', 'Trainer'),
('A03', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackdetail`
--

CREATE TABLE IF NOT EXISTS `feedbackdetail` (
  `KdFeedbackTraining` varchar(15) NOT NULL,
  `KdFeedback` char(3) NOT NULL,
  `FeedbackPoint` text NOT NULL,
  UNIQUE KEY `KdFeedbackTraining` (`KdFeedbackTraining`,`KdFeedback`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedbackdetail`
--

INSERT INTO `feedbackdetail` (`KdFeedbackTraining`, `KdFeedback`, `FeedbackPoint`) VALUES
('FP201705310002', 'F08', 'Satisfied (memuaskan)'),
('FP201705310002', 'F07', 'Satisfied (memuaskan)'),
('FP201705310002', 'F06', 'Very Satisfied (sangat puas)'),
('FP201705310002', 'F05', 'Satisfied (memuaskan)'),
('FP201705310002', 'F04', 'Very Satisfied (sangat puas)'),
('FP201705310002', 'F03', 'Fair (cukup)'),
('FP201705310002', 'F02', 'Fair (cukup)'),
('FP201705310002', 'F01', 'Very dissatisfied (sangat tidak puas)'),
('FP201705310001', 'F08', 'Fair (cukup)'),
('FP201705310001', 'F07', 'Fair (cukup)'),
('FP201705310001', 'F06', 'Fair (cukup)'),
('FP201705310001', 'F05', 'Fair (cukup)'),
('FP201705310001', 'F04', 'Fair (cukup)'),
('FP201705310001', 'F03', 'Dissatisfied (tidak puas)'),
('FP201705310001', 'F02', 'Satisfied (memuaskan)'),
('FP201705310001', 'F01', 'Dissatisfied (tidak puas)');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackform`
--

CREATE TABLE IF NOT EXISTS `feedbackform` (
  `KdFeedback` char(3) NOT NULL,
  `DeskripsiFeedback` text NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`KdFeedback`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedbackform`
--

INSERT INTO `feedbackform` (`KdFeedback`, `DeskripsiFeedback`, `Keterangan`) VALUES
('F01', '1.	Technical knowledge related to training material\r\n(Kemampuan teknis trainer yg berkaitan langsung dengan materi training)', 'Trainer Skill'),
('F02', '2.	Presentation skill to conduct training\r\n(Kemampuan berkomunikasi dalam membawakan materi training)', 'Trainer Skill'),
('F03', '3.	Capability in answering student''s question\r\n(Kemampuan trainer dalam menjawab pertanyaan peserta training)', 'Trainer Skill'),
('F04', '4.	Overall satisfaction for the trainer\r\n(Penilaian keseluruhan terhadap kemampuan trainer)', 'Trainer Skill'),
('F05', '1.	Quality of course content and lab\r\n(kualitas materi dan soal latihan)', 'Course Material'),
('F06', '1.	Quality of services from enrollment process up to the end of course\r\n(Kualitas pelayanan sejak proses pendaftaran sampai training selesai)', 'Facility & Service Training'),
('F07', '2.	Quality of training facility (classroom, hardware and sofware)\r\n(Kualitas fasilitas training : ruang kelas, hardware dan software)', 'Facility & Service Training'),
('F08', '3.	Quality of meals, parking, and other services\r\n(Kualitas makanan, tempat parkir, dan pelayanan lainnya)', 'Facility & Service Training');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktraining`
--

CREATE TABLE IF NOT EXISTS `feedbacktraining` (
  `KdFeedbackTraining` varchar(15) NOT NULL,
  `KdMapping` varchar(15) NOT NULL,
  `KdPeserta` varchar(15) NOT NULL,
  `TanggalIsi` date NOT NULL,
  `Jam` time NOT NULL,
  PRIMARY KEY (`KdFeedbackTraining`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedbacktraining`
--

INSERT INTO `feedbacktraining` (`KdFeedbackTraining`, `KdMapping`, `KdPeserta`, `TanggalIsi`, `Jam`) VALUES
('FP201705310002', 'MP201705300001', 'P20170502002', '2017-05-31', '21:53:38'),
('FP201705310001', 'MP201705300001', 'P20170502001', '2017-05-31', '21:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `KdJabatan` char(3) NOT NULL,
  `NamaJabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`KdJabatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`KdJabatan`, `NamaJabatan`) VALUES
('J01', 'Staff Admin'),
('J02', 'Staff Trainer'),
('J03', 'Manager'),
('J04', 'Staff Sales');

-- --------------------------------------------------------

--
-- Table structure for table `loginuser`
--

CREATE TABLE IF NOT EXISTS `loginuser` (
  `KdUser` char(5) NOT NULL,
  `KdPegawai` char(15) NOT NULL,
  `KdAksesLevel` char(3) NOT NULL,
  `Password` varchar(55) NOT NULL,
  `StatusUser` int(1) NOT NULL,
  PRIMARY KEY (`KdUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginuser`
--

INSERT INTO `loginuser` (`KdUser`, `KdPegawai`, `KdAksesLevel`, `Password`, `StatusUser`) VALUES
('USR01', '2017043001', 'A01', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
('USR02', '2017043002', 'A02', '2c065aae9fcb37b49043a5a2012b3dbf', 1),
('USR03', '2017052903', 'A03', '9ed083b1436e5f40ef984b28255eef18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mappingkelas`
--

CREATE TABLE IF NOT EXISTS `mappingkelas` (
  `KdMapping` char(15) NOT NULL,
  `KdPegawai` char(15) NOT NULL,
  `KdRuangan` char(5) NOT NULL,
  `KdMateri` char(5) NOT NULL,
  `TanggalMulai` date NOT NULL,
  `TanggalSelesai` date NOT NULL,
  `Keterangan` text NOT NULL,
  `KdRequest` int(11) NOT NULL,
  PRIMARY KEY (`KdMapping`),
  UNIQUE KEY `KdPegawai` (`KdPegawai`,`KdRuangan`,`KdMateri`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mappingkelas`
--

INSERT INTO `mappingkelas` (`KdMapping`, `KdPegawai`, `KdRuangan`, `KdMateri`, `TanggalMulai`, `TanggalSelesai`, `Keterangan`, `KdRequest`) VALUES
('MP201706090001', '2017043002', 'R0001', 'M0001', '2017-06-01', '2017-06-07', 'Training Java J2 SE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mappingkelasdetail`
--

CREATE TABLE IF NOT EXISTS `mappingkelasdetail` (
  `KdMapping` varchar(15) NOT NULL,
  `KdPeserta` varchar(15) NOT NULL,
  UNIQUE KEY `KdMapping` (`KdMapping`,`KdPeserta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mappingkelasdetail`
--

INSERT INTO `mappingkelasdetail` (`KdMapping`, `KdPeserta`) VALUES
('MP201706090001', 'P20170502001'),
('MP201706090001', 'P20170502002'),
('MP201706090001', 'P20170525003');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `KdMateri` char(5) NOT NULL,
  `NamaMateri` varchar(100) NOT NULL,
  `JumlahPertemuan` int(3) NOT NULL,
  `Keterangan` text NOT NULL,
  `FileMateri` varchar(100) NOT NULL,
  PRIMARY KEY (`KdMateri`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`KdMateri`, `NamaMateri`, `JumlahPertemuan`, `Keterangan`, `FileMateri`) VALUES
('M0001', 'Belajar Java J2 SE', 5, 'Modul training Java advance', 'File_M0001.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `KdPegawai` char(15) NOT NULL,
  `NikPegawai` varchar(20) NOT NULL,
  `NamaPegawai` varchar(50) NOT NULL,
  `KdStatus` char(3) NOT NULL,
  `KdJabatan` char(3) NOT NULL,
  `JenisKelamin` varchar(12) NOT NULL,
  `NoIdentitas` varchar(15) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `TempatLahir` varchar(50) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `FotoPegawai` varchar(100) NOT NULL,
  PRIMARY KEY (`KdPegawai`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`KdPegawai`, `NikPegawai`, `NamaPegawai`, `KdStatus`, `KdJabatan`, `JenisKelamin`, `NoIdentitas`, `Alamat`, `NomorTelepon`, `Email`, `TempatLahir`, `TanggalLahir`, `FotoPegawai`) VALUES
('2017043001', '41815110209', 'Shella Puspitasari', 'S01', 'J01', 'Wanita', '87787767878', 'Jakarta', '081290301099', 'shella@gmail.com', 'Palembang', '1990-04-24', '2017043001.png'),
('2017043002', '1223838788', 'Nurahmat Raharjo', 'S02', 'J02', 'Pria', '78979898998', 'desas', '099898788989', 'rahmat@yahoo.com', 'Jambi', '1980-07-23', '2017043002.png'),
('2017052903', '41815349004', 'Eka Nurmalasari', 'S01', 'J04', 'Wanita', '32100000881798', 'Bekasi Barat', '09898988777888', 'eka@yahoo.com', 'Palembang', '1991-07-25', '2017052903.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesertatraining`
--

CREATE TABLE IF NOT EXISTS `pesertatraining` (
  `KdPeserta` varchar(15) NOT NULL,
  `NamaPeserta` varchar(20) NOT NULL,
  `JenisKelamin` varchar(12) NOT NULL,
  `PekerjaanPeserta` varchar(50) NOT NULL,
  `TempatLahir` varchar(50) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `AlamatPeserta` varchar(100) NOT NULL,
  `KontakPeserta` varchar(15) NOT NULL,
  `EmailPeserta` varchar(30) NOT NULL,
  `NoIdentitas` varchar(15) NOT NULL,
  `NamaPerusahaan` varchar(50) NOT NULL,
  `AlamatPerusahaan` varchar(100) NOT NULL,
  `TrainingDate` date NOT NULL,
  `TrainingEndDate` date NOT NULL,
  PRIMARY KEY (`KdPeserta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesertatraining`
--

INSERT INTO `pesertatraining` (`KdPeserta`, `NamaPeserta`, `JenisKelamin`, `PekerjaanPeserta`, `TempatLahir`, `TanggalLahir`, `AlamatPeserta`, `KontakPeserta`, `EmailPeserta`, `NoIdentitas`, `NamaPerusahaan`, `AlamatPerusahaan`, `TrainingDate`, `TrainingEndDate`) VALUES
('P20170502001', 'Rohana', 'Pria', 'Tukang', 'm/lk', '2013-12-29', 'm;l', '9888889', 'rohana@yahoo.com', '9877879', 'PT. HITACHI INDONESIA', 'Jakarta', '2017-06-01', '2017-06-07'),
('P20170502002', 'Nabila Puteri', 'Pria', 'Database Administrator', 'Bandung', '1989-07-19', 'Jakarta Selatan', '098877787878', 'nabila@yahoo.com', '323556565656567', 'PT. HITACHI INDONESIA', 'JL. Raya Narogong', '2017-06-01', '2017-06-07'),
('P20170525003', 'Juwita Ratnasari', 'Wanita', 'Analist', 'Ambon', '2006-11-22', 'Harapan Indah', '09889778787', 'juwita@yahoo.com', '23238888656565', 'PT. HITACHI INDONESIA', 'Jakarta', '2017-06-01', '2017-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `requestkelas`
--

CREATE TABLE IF NOT EXISTS `requestkelas` (
  `KdRequest` int(11) NOT NULL,
  `KdPegawai` varchar(15) NOT NULL,
  `TanggalRequest` date NOT NULL,
  `Perusahaan` varchar(200) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `KdMateri` char(5) NOT NULL,
  `JumlahPeserta` int(11) NOT NULL,
  `EstimasiTanggalTraining` varchar(50) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `Keterangan` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `ProgressRequest` varchar(30) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  PRIMARY KEY (`KdRequest`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requestkelas`
--

INSERT INTO `requestkelas` (`KdRequest`, `KdPegawai`, `TanggalRequest`, `Perusahaan`, `KdMateri`, `JumlahPeserta`, `EstimasiTanggalTraining`, `Keterangan`, `ProgressRequest`) VALUES
(1, '2017043001', '2017-05-01', 'PT. HITACHI INDONESIA', 'M0001', 78, 'mjj;o', 'mkok;ojk;o', 'Pengajuan Request');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
  `KdRuangan` char(5) NOT NULL,
  `NamaRuangan` varchar(50) NOT NULL,
  `Gedung` varchar(100) NOT NULL,
  `Lantai` int(3) NOT NULL,
  `Kapasitas` int(11) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`KdRuangan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`KdRuangan`, `NamaRuangan`, `Gedung`, `Lantai`, `Kapasitas`, `Alamat`) VALUES
('R0001', 'Seruni', 'Cyber park', 2, 100, 'Jakarta Selatan'),
('R0002', 'Planetrium', 'JCC Jakarta', 1, 1200, 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `statuspegawai`
--

CREATE TABLE IF NOT EXISTS `statuspegawai` (
  `KdStatus` char(3) NOT NULL,
  `NamaStatus` varchar(100) NOT NULL,
  PRIMARY KEY (`KdStatus`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuspegawai`
--

INSERT INTO `statuspegawai` (`KdStatus`, `NamaStatus`) VALUES
('S01', 'Pegawai Tetap'),
('S02', 'Pegawai Kontrak'),
('S03', 'Outsorching');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
