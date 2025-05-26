-- MySQL dump 10.13  Distrib 9.3.0, for macos14.7 (x86_64)
--
-- Host: 127.0.0.1    Database: sisfoalazcabta
-- ------------------------------------------------------
-- Server version	9.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dataelearning`
--

DROP TABLE IF EXISTS `dataelearning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dataelearning` (
  `id_elearning` int NOT NULL AUTO_INCREMENT,
  `username_elearning` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password_elearning` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('Guru','Siswa') COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_elearning`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dataelearning`
--

/*!40000 ALTER TABLE `dataelearning` DISABLE KEYS */;
INSERT INTO `dataelearning` VALUES (2,'dinartrevor','password','Dinar','12345','Guru'),(3,'siswadinar','password123','Siswa','121313','Siswa');
/*!40000 ALTER TABLE `dataelearning` ENABLE KEYS */;

--
-- Table structure for table `dataipad`
--

DROP TABLE IF EXISTS `dataipad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dataipad` (
  `id_apple` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `apple_id` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_handphone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_ipad` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `konektivitas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `storage` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `serial_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_restrict` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('Guru','Siswa') COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_apple`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dataipad`
--

/*!40000 ALTER TABLE `dataipad` DISABLE KEYS */;
INSERT INTO `dataipad` VALUES (1,'Dinar','qwertyui','dadadafad','123456789','rtyuiop','poiuy','456','09876','9876','Guru'),(3,'Uzumaki Naruto update','apple id','uzumakidadad','24424243','fsrs','fsfgs','gsgsg','srsrs4','433','Siswa');
/*!40000 ALTER TABLE `dataipad` ENABLE KEYS */;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guru` (
  `id_guru` int NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nik_guru` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomor_handphone` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('Menikah','Belum Menikah') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES (1,'Dinar Abdul','124556788','informatika','SMK PI','Perempuan','085161030200','BOOSS','Belum Menikah','Bandung','2025-05-20','Islam','682c8d0551756643201732_682c8d0551760.jpeg');
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'dinar@gmail.com','password');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

--
-- Table structure for table `mata pelajaran`
--

DROP TABLE IF EXISTS `mata pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mata pelajaran` (
  `id_mapel` int NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pengajar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata pelajaran`
--

/*!40000 ALTER TABLE `mata pelajaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `mata pelajaran` ENABLE KEYS */;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `umur` int DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_handphone_ayah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_handphone_ibu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah_saudara` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_lengkap` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_general_ci,
  `jenjang` enum('TKA-A','TKA-B','SD','SD G2','SMP') COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (6,'DINAR','234241','ISLAM','BANDUNG','2000-02-20',25,'Perempuan','BANDUNG','2020','2','AYAH','IBU','AYAH BEKERJA','IBU BEKERJA','0821','2121','2','3','BANDUNG KOTA','68349d3c145a7677456527_68349d3c145af.jpg','SMP');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

--
-- Dumping routines for database 'sisfoalazcabta'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-26 23:57:38
