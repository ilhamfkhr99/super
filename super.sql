-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: super
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kondisi_barang`
--

DROP TABLE IF EXISTS `kondisi_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kondisi_barang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kondisi_barang`
--

LOCK TABLES `kondisi_barang` WRITE;
/*!40000 ALTER TABLE `kondisi_barang` DISABLE KEYS */;
INSERT INTO `kondisi_barang` VALUES (1,'Layak Pakai','2023-06-07 20:28:49','2023-06-07 20:28:49'),(2,'Kurang Baik','2023-06-07 20:29:04','2023-06-07 20:29:04'),(3,'Perlu Penggantian baru / Tidak baik','2023-06-07 20:29:32','2023-06-08 05:48:10');
/*!40000 ALTER TABLE `kondisi_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lampiran`
--

DROP TABLE IF EXISTS `lampiran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lampiran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_surat` int(10) unsigned DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lampiran_id_surat_foreign` (`id_surat`),
  CONSTRAINT `lampiran_id_surat_foreign` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lampiran`
--

LOCK TABLES `lampiran` WRITE;
/*!40000 ALTER TABLE `lampiran` DISABLE KEYS */;
INSERT INTO `lampiran` VALUES (2,15,'20230611153630.png','2023-06-11 08:36:30','2023-06-11 08:36:30'),(3,16,'20230611191157.png','2023-06-11 12:11:57','2023-06-11 12:11:57'),(4,17,'20230613194716.png','2023-06-13 12:47:16','2023-06-13 12:47:16'),(5,18,'20230613201426.jpg','2023-06-13 13:14:26','2023-06-13 13:14:26'),(11,24,'20230619214732.png','2023-06-19 14:47:32','2023-06-19 14:47:32'),(12,26,'20230629172806.png','2023-06-29 10:28:06','2023-06-29 10:28:06'),(13,27,'20230629172951.jpeg','2023-06-29 10:29:51','2023-06-29 10:29:51'),(14,28,'20230705210611.png','2023-07-05 14:06:11','2023-07-05 14:06:11');
/*!40000 ALTER TABLE `lampiran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level`
--

LOCK TABLES `level` WRITE;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` VALUES (1,'Direktur','2023-06-06 19:33:35','2023-06-06 19:33:35'),(2,'Wakil Direktur Medis','2023-06-06 19:33:41','2023-06-06 19:33:41'),(3,'Wakil Direktur Umum & Keuangan','2023-06-06 19:34:18','2023-06-06 19:34:18'),(4,'Kepala Bagian','2023-06-06 19:34:31','2023-06-06 19:34:31'),(5,'Kepala Unit','2023-06-06 19:34:38','2023-06-06 19:34:38'),(6,'Kepala Seksi','2023-06-06 19:34:44','2023-06-06 19:34:44'),(7,'Kepala Ruangan','2023-06-06 19:34:50','2023-06-06 19:34:50'),(8,'Super Admin','2023-06-06 19:34:56','2023-06-06 19:34:56'),(9,'Admin','2023-06-06 19:35:01','2023-06-06 19:35:01'),(10,'Karyawan','2023-06-06 19:35:06','2023-06-06 19:35:06');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `macam`
--

DROP TABLE IF EXISTS `macam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `macam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `macam`
--

LOCK TABLES `macam` WRITE;
/*!40000 ALTER TABLE `macam` DISABLE KEYS */;
INSERT INTO `macam` VALUES (1,'Software','2023-06-07 18:45:46','2023-06-07 18:45:46'),(2,'Hardware','2023-06-07 19:03:47','2023-06-07 19:03:47'),(3,'Jaringan','2023-06-07 19:03:55','2023-06-07 19:03:55');
/*!40000 ALTER TABLE `macam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2023_05_11_102425_create_level_table',1),(5,'2023_05_11_102425_create_organisasi_table',1),(6,'2023_05_11_103146_create_users_table',1),(7,'2023_05_11_103456_create_macam_table',1),(8,'2023_05_11_104115_create_kondisi_barang_table',1),(9,'2023_05_11_104706_create_surat_table',1),(10,'2023_05_11_110234_create_progres_table',1),(13,'2023_06_09_060755_create_lampiran_table',2),(14,'2023_06_29_181505_create_ttd_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisasi`
--

DROP TABLE IF EXISTS `organisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent` int(10) unsigned DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organisasi_id_parent_foreign` (`id_parent`),
  CONSTRAINT `organisasi_id_parent_foreign` FOREIGN KEY (`id_parent`) REFERENCES `organisasi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisasi`
--

LOCK TABLES `organisasi` WRITE;
/*!40000 ALTER TABLE `organisasi` DISABLE KEYS */;
INSERT INTO `organisasi` VALUES (1,NULL,'Direktur','2023-06-06 19:45:07','2023-06-06 19:45:07'),(2,1,'Wakil Direktur Medis','2023-06-06 19:48:32','2023-06-06 19:48:32'),(3,1,'Wakil Direktur Umum & Keuangan','2023-06-06 19:49:12','2023-06-06 19:49:12'),(4,2,'Bidang Pelayanan Medis','2023-06-06 19:50:04','2023-06-06 21:00:00'),(5,2,'Bidang Penunjang Medis','2023-06-06 19:50:32','2023-06-06 19:50:32'),(6,2,'Bidang Keperawatan','2023-06-06 19:50:58','2023-06-06 19:50:58'),(7,2,'Bidang Administrasi Medis','2023-06-06 19:51:16','2023-06-06 19:51:16'),(8,2,'Bagian Humas & Pemasaran','2023-06-06 19:51:31','2023-06-06 19:51:31'),(9,3,'Bagian Tata Usaha & SDM','2023-06-06 19:55:25','2023-06-06 19:55:25'),(10,3,'Bagian Umum','2023-06-06 19:55:52','2023-06-06 19:55:52'),(11,3,'Bagian Keuangan','2023-06-06 19:56:12','2023-06-06 19:56:12'),(12,3,'Bagian Sistem Informasi & Manajemen','2023-06-06 19:56:28','2023-06-06 19:56:28'),(13,4,'IGD','2023-06-06 20:09:33','2023-06-06 20:09:33'),(14,4,'Instalasi Rawat Jalan','2023-06-06 20:17:04','2023-06-06 20:17:04'),(15,4,'Instalasi Rawat Inap','2023-06-06 20:17:15','2023-06-06 20:17:15'),(16,4,'Instalasi Rawat Khusus','2023-06-06 20:17:21','2023-06-06 20:17:21'),(17,4,'Seksi Bina Rohani','2023-06-06 20:17:31','2023-06-06 20:17:31'),(18,12,'Seksi Pengendali Operasional & Pengembangan','2023-06-06 20:25:14','2023-06-06 20:25:14'),(19,12,'Seksi Administrasi dan Pemeliharaan','2023-06-06 20:25:43','2023-06-06 20:25:43'),(20,12,'Seksi Jaringan','2023-06-06 20:25:57','2023-06-06 20:25:57'),(25,5,'Instalasi Farmasi & CSSD','2023-06-08 06:28:02','2023-06-08 06:28:02'),(26,5,'Instalasi Laboratorium','2023-06-08 06:28:25','2023-06-08 06:28:25'),(27,5,'Instalasi Radiologi','2023-06-08 06:28:34','2023-06-08 06:28:34'),(28,5,'Instalasi Gizi','2023-06-08 06:28:43','2023-06-08 06:28:43'),(29,5,'Seksi Pemeliharaan Sarana Medis','2023-06-08 06:29:07','2023-06-08 06:29:07'),(30,14,'Poli Jantung','2023-06-13 13:10:08','2023-06-13 13:10:08'),(31,14,'Poli Paru','2023-06-13 13:10:13','2023-06-13 13:10:13');
/*!40000 ALTER TABLE `organisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progres`
--

DROP TABLE IF EXISTS `progres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `progres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_surat` int(10) unsigned DEFAULT NULL,
  `id_user` int(10) unsigned DEFAULT NULL,
  `waktu` datetime NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `progres_id_surat_foreign` (`id_surat`),
  KEY `progres_id_user_foreign` (`id_user`),
  CONSTRAINT `progres_id_surat_foreign` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`),
  CONSTRAINT `progres_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progres`
--

LOCK TABLES `progres` WRITE;
/*!40000 ALTER TABLE `progres` DISABLE KEYS */;
INSERT INTO `progres` VALUES (1,24,1,'2023-06-22 09:14:26','okkk','2023-06-21 13:31:39','2023-06-22 02:14:26');
/*!40000 ALTER TABLE `progres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat`
--

DROP TABLE IF EXISTS `surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_organisasi` int(10) unsigned DEFAULT NULL,
  `id_macam` int(10) unsigned DEFAULT NULL,
  `id_user` int(10) unsigned DEFAULT NULL,
  `id_kondisi` int(10) unsigned DEFAULT NULL,
  `nomer` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pemeliharaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kerusakan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_id_organisasi_foreign` (`id_organisasi`),
  KEY `surat_id_macam_foreign` (`id_macam`),
  KEY `surat_id_user_foreign` (`id_user`),
  KEY `surat_id_kondisi_foreign` (`id_kondisi`),
  CONSTRAINT `surat_id_kondisi_foreign` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi_barang` (`id`),
  CONSTRAINT `surat_id_macam_foreign` FOREIGN KEY (`id_macam`) REFERENCES `macam` (`id`),
  CONSTRAINT `surat_id_organisasi_foreign` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`),
  CONSTRAINT `surat_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat`
--

LOCK TABLES `surat` WRITE;
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
INSERT INTO `surat` VALUES (1,4,1,2,1,'1','Medify','Permintaan Hak Akses User di Medify','Penambahan Akses User','2023-06-10 08:40:52','Proses','Bidang Pelayanan Medis','2023-06-10 01:43:14','2023-06-27 07:32:11'),(2,4,2,2,1,NULL,'Printer Cannon G1020','Catridge Full','Replace Chip maintenance Catridge','2023-06-10 09:59:31','Menunggu','Bidang Pelayanan Medis','2023-06-10 03:01:51','2023-06-10 03:01:51'),(15,4,2,2,1,'3','Printer Cannon G2010','Tinta Habis','Tinta diisi','2023-06-11 03:36:05','Proses','Bidang Pelayanan Medis','2023-06-11 08:36:30','2023-06-11 09:07:56'),(16,13,3,4,1,NULL,'Wifi','Jaringan Internet Lemot',NULL,'2023-06-11 07:11:18','Menunggu','IGD','2023-06-11 12:11:57','2023-06-11 12:11:57'),(17,14,2,5,1,NULL,'PC HP','PC Lemot',NULL,'2023-06-13 07:46:34','Menunggu','Instalasi Rawat Jalan','2023-06-13 12:47:16','2023-06-13 12:47:16'),(18,30,2,9,1,NULL,'Komputer','Layar Mati',NULL,'2023-06-13 08:13:55','Menunggu','Poli Jantung','2023-06-13 13:14:26','2023-06-13 13:14:26'),(24,30,2,9,1,NULL,'PC Ruangan','PC Lemot',NULL,'2023-06-19 21:42:23','Menunggu','Poli Jantung','2023-06-19 14:47:32','2023-06-19 14:47:32'),(26,13,1,10,1,NULL,'Medify','Buat upload berkas lemot',NULL,'2023-06-29 17:27:13','Menunggu','IGD','2023-06-29 10:28:06','2023-06-29 10:28:06'),(27,13,2,10,1,NULL,'PC Accer','Lemot ga bisa nyala',NULL,'2023-06-29 17:28:06','Menunggu','IGD','2023-06-29 10:29:51','2023-06-29 10:29:51'),(28,30,1,9,1,NULL,'Medify','Gak bisa login',NULL,'2023-07-05 21:04:51','Menunggu','Poli Jantung','2023-07-05 14:06:11','2023-07-05 14:06:11');
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttd`
--

DROP TABLE IF EXISTS `ttd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttd` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_surat` int(10) unsigned DEFAULT NULL,
  `id_user` int(10) unsigned DEFAULT NULL,
  `tanda_tangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ttd_id_user_foreign` (`id_user`),
  KEY `ttd_id_surat_foreign` (`id_surat`),
  CONSTRAINT `ttd_id_surat_foreign` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ttd_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttd`
--

LOCK TABLES `ttd` WRITE;
/*!40000 ALTER TABLE `ttd` DISABLE KEYS */;
INSERT INTO `ttd` VALUES (22,28,11,'64a81b519ab29.png','2023-07-07 14:04:01','2023-07-07 14:04:01'),(23,27,11,'64a81c6e55272.png','2023-07-07 14:08:46','2023-07-07 14:08:46'),(26,1,11,'64af5af83568b.png','2023-07-13 02:01:28','2023-07-13 02:01:28'),(27,1,13,'64af5b2b56808.png','2023-07-13 02:02:19','2023-07-13 02:02:19'),(28,1,12,'64af5b7e2525e.png','2023-07-13 02:03:42','2023-07-13 02:03:42'),(29,1,2,'64af5bbf617a4.png','2023-07-13 02:04:47','2023-07-13 02:04:47');
/*!40000 ALTER TABLE `ttd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_level` int(10) unsigned DEFAULT NULL,
  `id_organisasi` int(10) unsigned DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanda_tangan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_level_foreign` (`id_level`),
  KEY `users_id_organisasi_foreign` (`id_organisasi`),
  CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`),
  CONSTRAINT `users_id_organisasi_foreign` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,8,12,'Super Admin','superadmin@gmail.com',NULL,'$2y$10$ZO.RDC01KlUIfRWLKuXnKupsSBdGw2RLEYoDYgRmRUb8MF/VDIDH2',NULL,NULL,'2023-06-06 19:33:15','2023-06-06 19:33:15'),(2,4,4,'dr. Wiwit Pujiati Royah','wiwit.dr@gmail.com',NULL,'$2y$10$M4prsRtKJLxIP.ladu2kjeBDM5wAacLa.UNmIuig66LofcVKJAf9q',NULL,NULL,'2023-06-06 23:03:08','2023-06-06 23:03:08'),(4,5,13,'dr. Sigit Wijanarko, Sp.B','sigit.dr@gmail.com',NULL,'$2y$10$3jRhopZgsAt/mDkoQQdcK.JSvrJpqF1ygQf7Vfk247pRSWkSbgBvS',NULL,NULL,'2023-06-07 17:58:00','2023-06-07 17:58:00'),(5,5,14,'drg. Hj. Hesti Nur Farida','hesti@gmail.com',NULL,'$2y$10$KeBSbn/4bXn2V9KDRI8RPenRwLyP8mymuCfnsywuaSp8chRpTEKw6',NULL,NULL,'2023-06-08 06:27:06','2023-06-08 06:27:06'),(6,4,5,'Apt. Dewanti Wardhani, S.Farm','dewanti@gmail.com',NULL,'$2y$10$1.k1278fggujdcfMhk/AHe3Fc6edALw44/JjXSQwc4weIcib.Yy/C',NULL,NULL,'2023-06-08 06:44:12','2023-06-08 06:44:12'),(7,5,26,'dr. Nathalya Dwi Kartika Sari, Sp.PK','nathalya@gmail.com',NULL,'$2y$10$0aE1auOpaUHRHiC8tudyT.6mXlq1lQ4979Ft9Ly7nqhz4/LjmelXK',NULL,NULL,'2023-06-08 06:45:33','2023-06-08 06:51:44'),(8,5,27,'Artha Dewi Nurani, S.Tr.Kes','artha@gmail.com',NULL,'$2y$10$gmK5LoJoDTcHk/.cdXRGOeOQ1fO3zTfsF91YKJOgaWkI5elm3sts.',NULL,NULL,'2023-06-08 06:46:30','2023-06-08 06:46:30'),(9,10,30,'Coba','coba@gmail.com',NULL,'$2y$10$Ofy6pWSN/2I6m3EeBeIMPeCKvDJt4ohUsG6bGKfUDO1fM32IC2bkC',NULL,NULL,'2023-06-13 13:11:12','2023-06-13 13:11:12'),(10,10,13,'Coba2','coba2@gmail.com',NULL,'$2y$10$FDzveL/VwtY963JrE1XwIOMFbF1Ia.nrAdg/w68h.t4mnwNi15ALu',NULL,NULL,'2023-06-29 10:19:31','2023-06-29 10:19:31'),(11,10,18,'Ilham Fakhri Huda','ilhamhuda9@gmail.com',NULL,'$2y$10$P0FiyKA5gcr8Uwvh9LPi7.BFOmpr5F.voPAKrYNFbAP7b3VR6Biuu',NULL,NULL,'2023-07-04 02:50:51','2023-07-04 02:50:51'),(12,6,18,'Farris Fardiansyah','farris@gmail.com',NULL,'$2y$10$lTT1Gz.s54xFZc.zz.Z32OIYKrsBo9qqwHwwna3heQFKB08uyoWEu',NULL,NULL,'2023-07-12 03:57:07','2023-07-12 03:57:07'),(13,10,18,'Adeyaksa Galuh','galuh@gmail.com',NULL,'$2y$10$WVR5tcGNbtHxzUHxNEfrPOZxzZUmlmbJ3H9bZUHP.4O7ZXV/kiCrq',NULL,NULL,'2023-07-13 01:52:24','2023-07-13 01:52:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-21  7:50:08
