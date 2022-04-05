/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 10.0.38-MariaDB : Database - car
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`car` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `car`;

/*Table structure for table `cars` */

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `year` int(6) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `engine` varchar(25) DEFAULT NULL,
  `engine_type_id` int(11) DEFAULT NULL,
  `kpp_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `isHave` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `fk-cars-engine_type_id` (`engine_type_id`),
  KEY `fk-kpps_kpp_id` (`kpp_id`),
  KEY `fk-currency_id` (`currency_id`),
  CONSTRAINT `fk-cars-engine_type_id` FOREIGN KEY (`engine_type_id`) REFERENCES `engine_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-currency_id` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-kpps_kpp_id` FOREIGN KEY (`kpp_id`) REFERENCES `kpps` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `cars` */

insert  into `cars`(`id`,`name`,`year`,`color`,`engine`,`engine_type_id`,`kpp_id`,`price`,`currency_id`,`photo`,`isHave`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`,`description`) values 
(10,'Hunday',2020,'Black','1.8',3,1,222333,1,'photo_2021-05-01_01-29-08_1649141445.jpg',1,1,'2022-04-05 11:50:45',100,NULL,NULL,'test test'),
(11,'Hunday',2020,'Black','1.8',3,1,222333,1,'photo_2021-05-01_01-29-08_1649141445.jpg',0,1,'2022-04-05 11:50:45',100,NULL,NULL,'test test'),
(12,'Hunday',2020,'Black','1.8',3,1,222333,1,'photo_2021-05-01_01-29-08_1649141445.jpg',0,1,'2022-04-05 11:50:45',100,NULL,NULL,'test test'),
(13,'Hunday',2020,'Black','1.8',3,1,222333,1,'photo_2021-05-01_01-29-08_1649141445.jpg',1,1,'2022-04-05 11:50:45',100,NULL,NULL,'test test');

/*Table structure for table `currencies` */

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `currencies` */

insert  into `currencies`(`id`,`name`,`status`) values 
(1,'₽',1),
(2,'$',1);

/*Table structure for table `engine_types` */

DROP TABLE IF EXISTS `engine_types`;

CREATE TABLE `engine_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `engine_types` */

insert  into `engine_types`(`id`,`name`,`status`) values 
(1,'Бензин',1),
(2,'Дизель',1),
(3,'Газ',1);

/*Table structure for table `kpps` */

DROP TABLE IF EXISTS `kpps`;

CREATE TABLE `kpps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `kpps` */

insert  into `kpps`(`id`,`name`,`status`) values 
(1,'Автоматическая',1),
(2,'Механическая',1);

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values 
('m000000_000000_base',1649070023),
('m220404_104913_create_engine_types_table',1649070026),
('m220404_104927_create_kpps_table',1649070028),
('m220404_104946_create_currensies_table',1649070029),
('m220404_105856_create_cars_table',1649070041),
('m220404_114304_add_column_cars_photo',1649072623),
('m220404_114540_add_column_cars_isHas',1649072941),
('m220405_063739_add_column_description_to_cars_table',1649140702);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
