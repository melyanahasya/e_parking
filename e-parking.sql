/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.25-MariaDB : Database - e-parking
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`e-parking` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `e-parking`;

/*Table structure for table `history_parkir` */

DROP TABLE IF EXISTS `history_parkir`;

CREATE TABLE `history_parkir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `plat_nomor` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `nominal_bayar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `history_parkir_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4;

/*Data for the table `history_parkir` */

insert  into `history_parkir`(`id`,`kode`,`plat_nomor`,`merk`,`jenis`,`jam_masuk`,`jam_keluar`,`status`,`id_pengguna`,`nominal_bayar`) values 
(1,'sYFSku','HK 73734 G','Toyota','Mobil','09:27:47','09:27:55','selesai',3,2000),
(18,'ZYld2e','SD 72723 B','Daimler','Bus','09:30:49','09:30:59','selesai',1,2000),
(64,'ULn4j9','HD 280526 H','toyota yaris','mobil','08:07:37','08:32:55','selesai',1,2000),
(70,'toDPld','HD 280526 H','Toyota','Mobil','08:36:01','08:46:55','selesai',1,2000),
(71,'Wkj68K','HD 280526 H','Jeep','Mobil','08:47:13','08:47:19','selesai',1,2000),
(88,'fFiWTa','HD 280526 H','Toyota','Mobil','08:50:25','10:47:28','selesai',1,2000),
(94,NULL,NULL,NULL,NULL,NULL,'10:57:38','selesai',1,6000),
(95,NULL,NULL,NULL,NULL,NULL,'10:58:23','selesai',1,6000),
(96,NULL,NULL,NULL,NULL,NULL,'10:58:25','selesai',1,6000),
(97,NULL,NULL,NULL,NULL,NULL,'10:58:25','selesai',1,6000),
(98,NULL,NULL,NULL,NULL,NULL,'10:58:25','selesai',1,6000),
(99,NULL,NULL,NULL,NULL,NULL,'10:58:25','selesai',1,6000),
(100,NULL,NULL,NULL,NULL,NULL,'10:58:48','selesai',1,700);

/*Table structure for table `tb_daftar_parkir` */

DROP TABLE IF EXISTS `tb_daftar_parkir`;

CREATE TABLE `tb_daftar_parkir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `plat_nomor` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `nominal_bayar` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `tb_daftar_parkir_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_daftar_parkir` */

insert  into `tb_daftar_parkir`(`id`,`kode`,`plat_nomor`,`jenis`,`merk`,`status`,`jam_masuk`,`id_pengguna`,`nominal_bayar`) values 
(103,'mvCtY3','HD 280526 H','Mobil','Jeep','sedang parkir','10:50:36',1,2000);

/*Table structure for table `tb_login` */

DROP TABLE IF EXISTS `tb_login`;

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_login` */

insert  into `tb_login`(`id`,`username`,`email`,`password`,`role`) values 
(1,'pengguna','pengguna@gmail.com','b0a4b508ff239219a599b4027e2aeb48','pengguna'),
(2,'admin','admin@gmail.com','e64b78fc3bc91bcbc7dc232ba8ec59e0','admin'),
(3,'siregar','siregar@gmail.com','eaa0d97ef69c2a5c06507ab74b368567','pengguna'),
(15,'asyamdrp','asyamdrp@gmail.com','0e9989a422df1ba8f5cd5a8dff9a0ff1','pengguna'),
(16,'Coba','coba@gmail.com','1c079586e87b16e492af80e7679e7e9d','pengguna'),
(17,'siregar','siregar@gmail.com','eaa0d97ef69c2a5c06507ab74b368567','pengguna'),
(18,'naya','naya@gmail.com','1d07b6c95b674b39880cad5445c96bbb','pengguna'),
(19,'naya','naya@gmail.com','1d07b6c95b674b39880cad5445c96bbb','pengguna'),
(20,'finda','finda@gmail.com','cc3511a543c2ada65b6030e2678170b6','pengguna'),
(21,'davina','davina@gmail.com','034202d59d3f9614614bf90d04552747','pengguna'),
(22,'Rebeca Klopper','rebeca@gmail.com','6876508a8ca6c4a0a669f628074263cd','pengguna'),
(23,'abdul','abdul@gmail.com','428a78b4fee47253898d7918c0a09160','pengguna');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
