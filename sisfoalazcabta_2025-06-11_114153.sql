-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sisfoalazcabta
-- ------------------------------------------------------
-- Server version	8.0.32

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
  `username_elearning` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_elearning` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('Guru','Siswa') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mapel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_elearning`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dataelearning`
--

/*!40000 ALTER TABLE `dataelearning` DISABLE KEYS */;
INSERT INTO `dataelearning` VALUES (1,'zuliyanti529@gmail.com','alazcabta12345','Zuliyanti','7 Ar-Rahman','Guru','Informatika'),(2,'emildaqotrunnada99@gmail.com','Qotrun20','Emilda Qotrunnada','7 Ar Rahman','Guru','Bimbingan Konseling, IPS, PPKN'),(3,'Gavinalacza@gmail.com','123456','Gavin Fabian Agha Rafello','Ar- Rahman','Siswa',NULL);
/*!40000 ALTER TABLE `dataelearning` ENABLE KEYS */;

--
-- Table structure for table `dataipad`
--

DROP TABLE IF EXISTS `dataipad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dataipad` (
  `id_apple` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apple_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_handphone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_ipad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `konektivitas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `storage` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `serial_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_restrict` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('Guru','Siswa') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_apple`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dataipad`
--

/*!40000 ALTER TABLE `dataipad` DISABLE KEYS */;
INSERT INTO `dataipad` VALUES (1,'Emilda Qotrunnada','alazhacairoofficial06@icloud.com','123456','085809820379','Gen 10','WIFI','64 GB','HGV195DXD9','.','Guru',''),(2,'Nadia Izzatunnisa','nadia@gmail.com','232323','089256789872','Generasi 11','WIFI','256 GB','22222','1234','Siswa',''),(3,'Clara Herti Belbina','Clara@gmail.com','123456','123456789012','Generasi 10','WIFI','128 GB','3333333333','1234','Siswa','');
/*!40000 ALTER TABLE `dataipad` ENABLE KEYS */;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guru` (
  `id_guru` int NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik_guru` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mapel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomor_handphone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('Menikah','Belum Menikah') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `kelas_id` bigint DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_wali_kelas` enum('YA','TIDAK') COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES (1,'Moudy Hadillah Atani, S.Pd','160108690599001','-','S1 Administrasi Pendidikan','Perempuan','082376007084','Staff Adminsitrasi','Belum Menikah','Baturaja','1999-01-02','Islam','6848e0ccb6153901738903_6848e0ccb616b.jpeg',3,'2025-2026',NULL),(2,'Cahya Padma Sari, S.Tr.Ikom','160108090030002','Informatika','d3 akuntansi','Perempuan','083173692431','Wali Kelas','Belum Menikah','Raksa Jiwa','2002-01-03','Islam','6848e1b1a0b33147322028_6848e1b1a0b47.jpeg',7,'2025/2026',NULL),(3,'Emilda Qotrunnada.,S.Psi.,M.M.APHR','1601144406990005','Bimbingan Konseling, IPS, PPKN','S2','Perempuan','085809820379','Wali Kelas','Belum Menikah','Baturaja','1999-06-04','Islam','',10,'2025-2026',NULL),(4,'Egian Desta Sakinah, S.Pd','16010869040302001','Bahasa Arab','S1 Pendidikan Agama Islam','Perempuan','081503509326','Kepala Sekolah SD','Belum Menikah','Ogan Komering Ulu','2000-06-09','Islam','6848fee1a6fd9866550731_6848fee1a7035.png',10,'2025-2026',NULL);
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;

--
-- Table structure for table `jenjang`
--

DROP TABLE IF EXISTS `jenjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenjang` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenjang`
--

/*!40000 ALTER TABLE `jenjang` DISABLE KEYS */;
INSERT INTO `jenjang` VALUES (1,'TK-A'),(2,'TK-B'),(3,'SD'),(4,'SD GRADE 2'),(5,'SMP');
/*!40000 ALTER TABLE `jenjang` ENABLE KEYS */;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `jenjang_id` bigint DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,1,'Al-Asma’i'),(3,2,'Kelas Al-Fazari'),(5,2,'Kelas Al-Haytham'),(6,3,'Kelas Ibnu yunus'),(7,3,'Kelas Ibnu sina'),(8,3,'Kelas Ibnu khaldun'),(9,4,'Kelas Al-Jazari'),(10,5,'Kelas Ar-Rahman');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'Admin@gmail.com','password','Admin','IT'),(2,'chatri@gmail.com','123456','chatri','ADMIN'),(3,'zuliyanti529@gmail.com','292929','Zuliyanti','IT');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

--
-- Table structure for table `mata pelajaran`
--

DROP TABLE IF EXISTS `mata pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mata pelajaran` (
  `id_mapel` int NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pengajar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata pelajaran`
--

/*!40000 ALTER TABLE `mata pelajaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `mata pelajaran` ENABLE KEYS */;

--
-- Table structure for table `sapras`
--

DROP TABLE IF EXISTS `sapras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sapras` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `nama_barang` varchar(255) DEFAULT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sapras`
--

/*!40000 ALTER TABLE `sapras` DISABLE KEYS */;
INSERT INTO `sapras` VALUES (4,'Proyektor','Accer','68410aac9d0b7487008115_68410aacad0eb.jpeg',1,'diruangan TK'),(5,'Proyektor','EB-X06 2','6848e99924fe9556462544_6848e99925018.jpeg',2,'Diruangan Kelas Ibnu Sina dan Ibnu Khaldun'),(6,'Proyektor','EB-E600','6848ea5b9e25e517857345_6848ea5b9e272.png',6,'Di Ibnu Khaldun, Ibnu Sina, Ibnu Yunus, Al-Jazari, Al-fazari, Al-Asmai'),(7,'Apple TV','4K','6848ee159b8ac211034116_6848ee159b8cc.jpeg',3,'Di Aula, Di SMP, Di Hall'),(8,'Ipad','Apple','6848ee3b7b779663589362_6848ee3b7b788.jpeg',10,'Semua Guru'),(9,'Kabel HDMI','Eyota','6848ee834b042378428650_6848ee834b057.jpeg',10,'Setiap Kelas'),(10,'Conector HDMI','Olike','6848eef5442bf127547899_6848eef5442df.jpeg',10,'Semua Kelas'),(11,'Printer','Epson L3210 ','',3,'Di Ruangan IT, Ruangan Admin , Ruang Guru'),(12,'Meja  Hitam IT','-','6848ef570e098957621962_6848ef570e0a5.jpeg',2,'Ruang IT'),(13,'Lemari Kaca Setengah','-','6848ef6bf0888376237343_6848ef6bf08a4.jpeg',1,'Diruangan IT'),(14,'Lemari Kaca Full','-','',1,'Ruangan IT'),(15,'Kursi IT','-','',4,'Diruangan IT');
/*!40000 ALTER TABLE `sapras` ENABLE KEYS */;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `umur` int DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `angkatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas_id` bigint DEFAULT NULL,
  `nama_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_handphone_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_handphone_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anak_ke` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah_saudara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `jenjang` enum('TK-A','TK-B','SD','SD GRADE 2','SMP') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (1,'Adibah Rumaisa Fristian','123','islam','baturaja','2020-06-02',5,'Perempuan','tk fatonah','2025/2026',1,'anton','indah','pns','dokter','123456789012','98765432123','1','3','bakung','6848f62dc1561955837785_6848f62dc156f.png','TK-A'),(2,'Gavin Fabian Agha Rafello','124','Islam','Lampung ','2013-03-16',12,'Laki-Laki','SDN 3 OKU','2025-2026',10,'Hengki Ranando','Ramdona Oktari','PNS','Dinkes','+1 (261) 508-8116','+1 (431) 946-4307','1','2','Jl Ahmad yani baturaja timur','6848f1e66a748907326686_6848f1e66a75f.png','SMP'),(3,'Abdul Baasith Hussain','1234','Islam','Gunung Meraksa','2021-01-29',4,'Laki-Laki','-','2025/2026',5,'Muhammad Hussein','Bela Ramadhani','Karyawan Swasta','PNS','1234567890','1234567890','2','3','Jl linta sumatera lr marmut rt 3, rw 3, gunung meraksa','','TK-B'),(4,'Clara Herti Belbina','123','Islam','Ogan Komering Ulu','2012-10-11',12,'Perempuan','SD Tuncen','2020/2025',10,'Budi utomo','Irianah','Karyawan BUMN','PPPK','085245678901','08123456789','1','2','Jl Dr.Moh Hatta.Kemala raja Bakung','','SMP'),(5,'a','001','1','vb','2012-06-12',12,'Perempuan','1','1',10,'greg','gerte','eyrtu','erttt','erggher','1234567789','1','2','Jl Lintas timur batukuning','6848f9050f196073397637_6848f9050f1db.png','SMP'),(6,'M. Rayyanka Faeyza Nusa','123','Islam','Palembang','2019-06-11',6,'Laki-Laki','TK- Al fathonah','2025/2026',6,'Rafindo ','Rini','Kepala Sekolah','Dinas Kesehatan','123456789012','987654321091','1','3','Baturaja OKU','6849085b2dc3e426627339_6849085b53c6f.png','SD');
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

-- Dump completed on 2025-06-11 11:42:06
