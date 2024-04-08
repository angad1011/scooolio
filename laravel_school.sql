/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 8.0.17 : Database - laravel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `laravel`;

/*Table structure for table `academic_years` */

DROP TABLE IF EXISTS `academic_years`;

CREATE TABLE `academic_years` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `its_current_year` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `academic_years` */

insert  into `academic_years`(`id`,`institute_id`,`year`,`its_current_year`,`created_at`,`updated_at`) values 
(1,1,'2019-2020',0,'2024-04-04 05:38:19','2024-04-04 05:58:01'),
(2,1,'2020-2021',0,'2024-04-04 05:38:36','2024-04-04 05:58:13'),
(3,1,'2024-2025',1,'2024-04-04 05:46:21','2024-04-04 05:58:02'),
(4,1,'2021-2022',0,'2024-04-04 05:58:25','2024-04-04 05:58:25'),
(5,1,'2022-2023',0,'2024-04-04 05:58:51','2024-04-04 05:58:51'),
(6,1,'2023-2024',0,'2024-04-04 05:59:02','2024-04-04 05:59:02');

/*Table structure for table `boards` */

DROP TABLE IF EXISTS `boards`;

CREATE TABLE `boards` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `boards` */

insert  into `boards`(`id`,`name`,`active`,`created_at`,`updated_at`) values 
(1,'Maharashtra',1,'2024-03-14 10:06:24','2024-03-14 11:24:10'),
(2,'Gujrat',1,'2024-03-14 10:09:23','2024-03-14 11:24:25'),
(3,'Dehli',1,'2024-03-14 11:24:43','2024-03-14 11:24:49'),
(4,'Uttar Pradesh',1,'2024-03-14 11:25:04','2024-03-14 11:25:04');

/*Table structure for table `class_students` */

DROP TABLE IF EXISTS `class_students`;

CREATE TABLE `class_students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `academic_year_id` int(11) DEFAULT NULL,
  `learn_space_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `role_no` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `class_students` */

insert  into `class_students`(`id`,`institute_id`,`academic_year_id`,`learn_space_id`,`student_id`,`role_no`,`created_at`,`updated_at`) values 
(1,1,3,1,2,'1','2024-04-08 09:42:46','2024-04-08 09:42:46'),
(2,1,3,1,1,'2','2024-04-08 09:42:46','2024-04-08 09:42:46'),
(3,1,3,1,3,'3','2024-04-08 09:42:46','2024-04-08 09:42:46'),
(4,1,3,1,4,'4','2024-04-08 09:42:46','2024-04-08 09:42:46'),
(5,1,3,1,29,'8','2024-04-08 09:42:46','2024-04-08 10:26:59'),
(6,1,3,1,26,'9','2024-04-08 10:43:32','2024-04-08 10:43:32');

/*Table structure for table `class_time_tables` */

DROP TABLE IF EXISTS `class_time_tables`;

CREATE TABLE `class_time_tables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) NOT NULL,
  `learn_space_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `week_day_id` int(11) NOT NULL,
  `period_number` int(11) DEFAULT NULL,
  `lecture_duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `class_time_tables` */

insert  into `class_time_tables`(`id`,`institute_id`,`learn_space_id`,`subject_id`,`teacher_id`,`week_day_id`,`period_number`,`lecture_duration`,`created_at`,`updated_at`) values 
(1,1,1,1,1,1,1,'07:40 AM-08:22 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(2,1,1,2,2,1,2,'08:22 AM-09:04 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(3,1,1,4,3,1,3,'09:04 AM-09:47 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(4,1,1,5,4,1,4,'09:47 AM-10:29 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(5,1,1,6,1,1,5,'11:00 AM-11:30 AM','2024-04-02 05:27:36','2024-04-02 06:18:07'),
(6,1,1,7,6,1,6,'11:30 AM-12:00 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(7,1,1,8,7,1,7,'12:00 PM-12:30 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(8,1,1,1,1,2,1,'07:40 AM-08:22 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(9,1,1,10,2,2,2,'08:22 AM-09:04 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(10,1,1,9,3,2,3,'09:04 AM-09:47 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(11,1,1,11,4,2,4,'09:47 AM-10:29 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(12,1,1,12,5,2,5,'11:00 AM-11:30 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(13,1,1,13,6,2,6,'11:30 AM-12:00 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(14,1,1,14,7,2,7,'12:00 PM-12:30 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(15,1,1,1,1,3,1,'07:40 AM-08:22 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(16,1,1,15,2,3,2,'08:22 AM-09:04 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(17,1,1,16,3,3,3,'09:04 AM-09:47 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(18,1,1,2,4,3,4,'09:47 AM-10:29 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(19,1,1,4,5,3,5,'11:00 AM-11:30 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(20,1,1,5,6,3,6,'11:30 AM-12:00 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(21,1,1,6,7,3,7,'12:00 PM-12:30 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(22,1,1,1,1,4,1,'07:40 AM-08:22 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(23,1,1,7,2,4,2,'08:22 AM-09:04 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(24,1,1,8,3,4,3,'09:04 AM-09:47 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(25,1,1,9,4,4,4,'09:47 AM-10:29 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(26,1,1,10,5,4,5,'11:00 AM-11:30 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(27,1,1,11,5,4,6,'11:30 AM-12:00 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(28,1,1,12,7,4,7,'12:00 PM-12:30 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(29,1,1,1,1,5,1,'07:40 AM-08:22 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(30,1,1,12,2,5,2,'08:22 AM-09:04 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(31,1,1,13,3,5,3,'09:04 AM-09:47 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(32,1,1,14,4,5,4,'09:47 AM-10:29 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(33,1,1,15,5,5,5,'11:00 AM-11:30 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(34,1,1,16,5,5,6,'11:30 AM-12:00 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(35,1,1,2,7,5,7,'12:00 PM-12:30 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(36,1,1,1,1,6,1,'07:40 AM-08:22 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(37,1,1,4,2,6,2,'08:22 AM-09:04 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(38,1,1,5,3,6,3,'09:04 AM-09:47 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(39,1,1,6,4,6,4,'09:47 AM-10:29 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(40,1,1,7,5,6,5,'11:00 AM-11:30 AM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(41,1,1,8,6,6,6,'11:30 AM-12:00 PM','2024-04-02 05:27:36','2024-04-02 05:27:36'),
(42,1,1,9,7,6,7,'12:00 PM-12:30 PM','2024-04-02 05:27:36','2024-04-02 05:27:36');

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `departments` */

insert  into `departments`(`id`,`name`,`active`,`created_at`,`updated_at`) values 
(1,'Super Admin',1,'2024-03-13 05:21:32','2024-03-13 05:25:55');

/*Table structure for table `institute_timings` */

DROP TABLE IF EXISTS `institute_timings`;

CREATE TABLE `institute_timings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) NOT NULL,
  `shift_type_id` int(11) NOT NULL,
  `shift_start` varchar(45) DEFAULT NULL,
  `shift_end` varchar(45) DEFAULT NULL,
  `break_time_start` varbinary(45) DEFAULT NULL,
  `break_durations` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prayer_time` varchar(45) DEFAULT NULL,
  `no_of_lect_fist_session` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_of_lect_secound_session` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `institute_timings` */

insert  into `institute_timings`(`id`,`institute_id`,`shift_type_id`,`shift_start`,`shift_end`,`break_time_start`,`break_durations`,`prayer_time`,`no_of_lect_fist_session`,`no_of_lect_secound_session`,`created_at`,`updated_at`) values 
(1,1,1,'07:30','12:30','10:30','30','10','4','3','2024-03-28 11:17:36','2024-04-01 09:55:46'),
(2,1,2,'12:30','17:30','14:30','45','15','45',NULL,'2024-03-28 11:18:29','2024-03-28 11:18:29');

/*Table structure for table `institute_types` */

DROP TABLE IF EXISTS `institute_types`;

CREATE TABLE `institute_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `institute_types` */

insert  into `institute_types`(`id`,`name`,`active`,`created_at`,`updated_at`) values 
(1,'Private',1,'2024-03-14 14:41:21','2024-03-15 06:52:14'),
(2,'Goverment',1,'2024-03-14 14:41:51','2024-03-15 06:52:23'),
(3,'Trust',1,'2024-03-15 06:52:33','2024-03-15 06:52:33');

/*Table structure for table `institutes` */

DROP TABLE IF EXISTS `institutes`;

CREATE TABLE `institutes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `medium_id` int(11) DEFAULT NULL,
  `board_id` int(11) DEFAULT NULL,
  `institute_type_id` int(11) DEFAULT NULL,
  `stream_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `principal_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `est_since` varchar(45) DEFAULT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `pin_code` varchar(45) DEFAULT NULL,
  `address` text,
  `morning_shift_start` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `morning_shift_end` varchar(45) DEFAULT NULL,
  `afternoon_shift_start` varchar(45) DEFAULT NULL,
  `afternoon_shift_end` varchar(45) DEFAULT NULL,
  `image_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `its_college` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `institutes` */

insert  into `institutes`(`id`,`medium_id`,`board_id`,`institute_type_id`,`stream_id`,`name`,`email`,`contact_no`,`code`,`principal_name`,`est_since`,`branch`,`state`,`city`,`pin_code`,`address`,`morning_shift_start`,`morning_shift_end`,`afternoon_shift_start`,`afternoon_shift_end`,`image_file`,`active`,`its_college`,`created_at`,`updated_at`) values 
(1,2,2,2,NULL,'Ideal High School','shehzad215@gmail.com','88989279606','IDSC1','Islam','15 Mar, 2024','Cheeta Camp','Maharashtra','Mumbai','400088','B Sector E Line Room No. 12','19:14','19:14','18:14','18:15','CKRgu-CQ_400x400.jpg',0,0,'2024-03-15 11:45:04','2024-03-22 07:08:16'),
(2,1,1,1,NULL,'National Sarvodaya Jr College','national@gmail.com','9833276092','NACL02','Harish Chandar Ram Chandar Mir Chandani','18 Mar, 2024','Chembur','Maharashtra','Mumbai','400088','B Sector E Line Room No. 12','14:01','15:01','13:01','14:01','culture_india.png',0,1,'2024-03-18 06:32:04','2024-03-18 06:47:55');

/*Table structure for table `learn_spaces` */

DROP TABLE IF EXISTS `learn_spaces`;

CREATE TABLE `learn_spaces` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `shift_type_id` int(11) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `no_of_student` int(45) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `learn_spaces` */

insert  into `learn_spaces`(`id`,`institute_id`,`teacher_id`,`shift_type_id`,`class_name`,`no_of_student`,`active`,`created_at`,`updated_at`) values 
(1,1,1,1,'5th- A',6,0,'2024-03-20 07:01:15','2024-04-08 10:29:12'),
(2,1,2,1,'5th - B',5,0,'2024-03-21 10:24:23','2024-03-29 03:48:30'),
(3,1,3,1,'6th - A',5,0,'2024-03-29 05:44:49','2024-03-29 05:44:49'),
(4,1,4,2,'7th - A',5,0,'2024-03-29 05:45:20','2024-03-29 05:45:20'),
(5,1,6,2,'8th - A',5,0,'2024-03-29 05:45:35','2024-03-29 05:45:35'),
(6,1,7,2,'9th - A',5,0,'2024-03-29 05:45:59','2024-03-29 05:46:09');

/*Table structure for table `mediums` */

DROP TABLE IF EXISTS `mediums`;

CREATE TABLE `mediums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `mediums` */

insert  into `mediums`(`id`,`name`,`active`,`created_at`,`updated_at`) values 
(1,'Emglish',1,'2024-03-14 10:23:50','2024-03-14 10:23:50'),
(2,'Hindi',1,'2024-03-14 10:24:00','2024-03-14 10:24:00'),
(3,'Urdu',1,'2024-03-14 10:24:09','2024-03-14 10:24:09'),
(4,'Marathi',0,'2024-03-14 10:24:19','2024-03-14 10:26:56');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`active`,`created_at`,`updated_at`) values 
(1,'Admin',1,'2024-03-12 09:59:48','2024-03-15 11:40:05'),
(2,'School Admin',1,'2024-03-12 10:03:39','2024-03-13 05:19:01');

/*Table structure for table `shift_types` */

DROP TABLE IF EXISTS `shift_types`;

CREATE TABLE `shift_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `shift_types` */

insert  into `shift_types`(`id`,`name`) values 
(1,'Morning'),
(2,'Afternoon');

/*Table structure for table `streams` */

DROP TABLE IF EXISTS `streams`;

CREATE TABLE `streams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `streams` */

insert  into `streams`(`id`,`name`,`active`,`created_at`,`updated_at`) values 
(1,'Science',1,'2024-03-14 10:40:24','2024-03-14 10:41:49'),
(2,'Arts',1,'2024-03-14 10:41:33','2024-03-14 10:41:33'),
(3,'Commerce',1,'2024-03-14 10:41:43','2024-03-14 10:41:43');

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `gr_no` varchar(45) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `date_of_birth` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `blood_group` varchar(45) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `father_qualification` varchar(45) DEFAULT NULL,
  `mother_qualification` varchar(45) DEFAULT NULL,
  `date_of_admission` varchar(45) DEFAULT NULL,
  `date_of_leaving` varchar(45) DEFAULT NULL,
  `address` text,
  `current_class_id` int(11) DEFAULT NULL,
  `last_class_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `students` */

insert  into `students`(`id`,`institute_id`,`gr_no`,`name`,`email`,`contact_no`,`date_of_birth`,`gender`,`blood_group`,`profile_img`,`father_name`,`mother_name`,`father_qualification`,`mother_qualification`,`date_of_admission`,`date_of_leaving`,`address`,`current_class_id`,`last_class_id`,`active`,`created_at`,`updated_at`) values 
(1,1,'1','Shehzad Ahmed Sayyed','shehzad215@gmail.com','8898927606','1999-04-26','male','B+',NULL,'Shakil Ahmed Sayyed','Zubaida Khatton','7th Pass','5th Pass',NULL,NULL,NULL,NULL,NULL,0,'2024-04-05 05:29:28','2024-04-05 06:35:32'),
(2,1,'2','Zohrab Ahmed Sayyed','Zohrab143@gmail.com','9833276092','33583','male','B+',NULL,'Shakil Ahmed Sayyed','Zubaida Khatton','7th Pass','5th Pass',NULL,NULL,NULL,NULL,NULL,0,'2024-04-05 05:29:28','2024-04-05 05:29:28'),
(3,1,'3','Baba Jaan','baba@gmail.com','1234567890','33689','male','A+',NULL,'Gafoor Shaikh','Zulaikha bee','10th Pass','10th pass',NULL,NULL,NULL,NULL,NULL,0,'2024-04-05 05:29:28','2024-04-05 05:29:28'),
(4,1,'4','Zainul Abideen','janu@gmail.com','2589631470','33771','male','O+',NULL,'Janeef Pao wala','Nusrat Jaha','12th Pass','12th Pass',NULL,NULL,NULL,NULL,NULL,0,'2024-04-05 05:29:28','2024-04-05 05:29:28'),
(9,1,'4','Mohammed Mustafa','mustafa@gmail.com','134567901','1995-05-26','male','B+',NULL,'kamal Badsha','Nusrat Jaha','12th Fail','10th Fail',NULL,NULL,NULL,NULL,NULL,0,'2024-04-05 06:55:43','2024-04-08 05:49:39'),
(24,1,'5','Mohammed Raj','raj@gmail.com','134567901','1995-05-26','male','B+',NULL,'kamal Badsha','Nusrat Jaha','12th Fail','10th Fail',NULL,NULL,NULL,NULL,NULL,0,'2024-04-08 05:48:11','2024-04-08 05:49:30'),
(25,1,'6','Sameer Shaikh','sameer@gmail.com','134567901','1995-05-26','male','B+',NULL,'kamal Badsha','Nusrat Jaha','12th Fail','10th Fail',NULL,NULL,NULL,NULL,NULL,0,'2024-04-08 05:49:19','2024-04-08 05:49:19'),
(26,1,'7','Sultan Shaikh','sultan@gmail.com','123456790','1995-05-26','male','B+',NULL,'kamal Badsha','Nusrat Jaha','12th Fail','10th Fail',NULL,NULL,NULL,NULL,NULL,0,'2024-04-08 05:49:19','2024-04-08 05:49:19'),
(27,1,'8','athar ali','athar@gmail.com','1234567890','1991-10-07','male','B+',NULL,'kamal Badsha','Nusrat Jaha','12th Fail','10th Fail',NULL,NULL,NULL,NULL,NULL,0,'2024-04-08 05:51:15','2024-04-08 05:51:15'),
(28,1,'9','ismail shaikh','ismail@gmail.com','1234567890','1989-10-10','male','B+',NULL,'kamal Badsha','Nusrat Jaha','12th Fail','10th Fail',NULL,NULL,NULL,NULL,NULL,0,'2024-04-08 05:51:15','2024-04-08 05:51:15'),
(29,1,'10','abid chaoudry','abid@gmail.com','1234567890','1992-11-10','male','B+',NULL,'kamal Badsha','Nusrat Jaha','12th Fail','10th Fail',NULL,NULL,NULL,NULL,NULL,0,'2024-04-08 05:51:15','2024-04-08 05:51:15');

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`id`,`institute_id`,`name`,`active`,`created_at`,`updated_at`) values 
(1,1,'English',1,'2024-03-20 10:03:27','2024-03-20 10:07:58'),
(2,1,'Hindi',1,'2024-03-20 10:05:39','2024-03-20 10:05:39'),
(4,1,'Urdu',1,'2024-03-28 06:38:45','2024-03-28 06:38:45'),
(5,1,'Marathi',1,'2024-03-28 06:38:54','2024-03-28 06:38:54'),
(6,1,'History',1,'2024-03-28 06:39:18','2024-03-28 06:39:18'),
(7,1,'Civics',1,'2024-03-28 06:39:29','2024-03-28 06:39:29'),
(8,1,'Geography',1,'2024-03-28 06:39:46','2024-03-28 06:39:46'),
(9,1,'Economics',1,'2024-03-28 06:39:58','2024-03-28 06:39:58'),
(10,1,'EVS',1,'2024-03-28 06:40:12','2024-03-28 06:40:12'),
(11,1,'Maths-1',1,'2024-03-28 06:40:24','2024-03-28 06:40:24'),
(12,1,'Maths-2',1,'2024-03-28 06:40:35','2024-03-28 06:40:35'),
(13,1,'Science-1',1,'2024-03-28 06:41:05','2024-03-28 06:41:05'),
(14,1,'Science - 2',1,'2024-03-28 06:41:16','2024-03-28 06:41:16'),
(15,1,'PT',1,'2024-03-28 06:41:26','2024-03-28 06:41:26'),
(16,1,'Drawing',1,'2024-03-28 06:41:36','2024-03-28 06:41:36');

/*Table structure for table `teachers` */

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `shift_type_id` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `qualification` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `address` text,
  `profile_img` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `teachers` */

insert  into `teachers`(`id`,`institute_id`,`shift_type_id`,`name`,`email`,`contact`,`qualification`,`gender`,`address`,`profile_img`,`active`,`created_at`,`updated_at`) values 
(1,1,1,'Survey Usman Gani','mukesh@puratech.in','8898927606','MBA','male','Vidya Vihar','teacher-illustration.png',1,'2024-03-21 06:48:16','2024-04-02 08:29:06'),
(2,1,1,'Rafique Shaikh','rafique@gmail.com','1234567890','D ed','male','B Sector E Line Room No. 12','teacher-illustration.png',1,'2024-03-21 09:13:21','2024-04-02 08:36:55'),
(3,1,1,'Rehmat Shaikh','rehamt@gmail.com','1325634182','B ed','female','Cheeta Camp','female.png',1,'2024-03-29 03:57:20','2024-04-02 08:37:03'),
(4,1,1,'Shafique Khan','shafique@gmail.com','8523697410','D ed','male','B Sector E Line Room No. 12','teacher-illustration.png',1,'2024-03-29 03:58:50','2024-04-02 08:48:08'),
(5,1,1,'Shabana Shaikh','shabana@gmail.com','8524561230','MBA','female','B Sector E Line Room No. 12','female.png',1,'2024-03-29 04:31:23','2024-04-02 08:48:16'),
(6,1,1,'Rehana khan','rehana@gmail.com','2233114455','B Ed','female','Kurla','female.png',1,'2024-03-29 04:35:53','2024-04-02 08:48:26'),
(7,1,1,'Salauddin Shaikh','sallauddin@gmail.com','2356897410','D Ed','male','B Sector E Line Room No. 12','teacher-illustration.png',1,'2024-03-29 04:36:54','2024-04-02 08:48:33');

/*Table structure for table `teachers_learn_spaces` */

DROP TABLE IF EXISTS `teachers_learn_spaces`;

CREATE TABLE `teachers_learn_spaces` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `learn_space_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `teachers_learn_spaces` */

insert  into `teachers_learn_spaces`(`id`,`teacher_id`,`learn_space_id`,`created_at`,`updated_at`) values 
(1,1,1,'2024-03-26 05:38:29','2024-03-26 05:38:29');

/*Table structure for table `teachers_subjects` */

DROP TABLE IF EXISTS `teachers_subjects`;

CREATE TABLE `teachers_subjects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `teachers_subjects` */

insert  into `teachers_subjects`(`id`,`teacher_id`,`subject_id`,`created_at`,`updated_at`) values 
(1,1,1,'2024-03-21 06:48:16','2024-03-21 06:48:16'),
(2,1,2,'2024-03-21 06:48:16','2024-03-21 06:48:16'),
(3,2,1,'2024-03-21 09:13:21','2024-03-21 09:13:21'),
(4,2,2,'2024-03-21 09:13:21','2024-03-21 09:13:21'),
(7,3,1,'2024-03-29 03:57:20','2024-03-29 03:57:20'),
(8,3,2,'2024-03-29 03:57:20','2024-03-29 03:57:20'),
(9,3,4,'2024-03-29 03:57:20','2024-03-29 03:57:20'),
(10,4,5,'2024-03-29 03:58:50','2024-03-29 03:58:50'),
(11,4,13,'2024-03-29 03:58:50','2024-03-29 03:58:50'),
(12,4,14,'2024-03-29 03:58:50','2024-03-29 03:58:50'),
(13,5,4,'2024-03-29 04:31:23','2024-03-29 04:31:23'),
(14,5,5,'2024-03-29 04:31:23','2024-03-29 04:31:23'),
(15,5,10,'2024-03-29 04:31:23','2024-03-29 04:31:23'),
(16,6,11,'2024-03-29 04:35:53','2024-03-29 04:35:53'),
(17,6,12,'2024-03-29 04:35:53','2024-03-29 04:35:53'),
(18,6,13,'2024-03-29 04:35:53','2024-03-29 04:35:53'),
(19,6,14,'2024-03-29 04:35:53','2024-03-29 04:35:53'),
(20,7,4,'2024-03-29 04:36:54','2024-03-29 04:36:54'),
(21,7,6,'2024-03-29 04:36:54','2024-03-29 04:36:54'),
(22,7,10,'2024-03-29 04:36:54','2024-03-29 04:36:54');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternat_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`role_id`,`department_id`,`institute_id`,`name`,`email`,`password`,`remember_token`,`contact_no`,`alternat_no`,`dob`,`gender`,`image_file`,`active`,`created_at`,`updated_at`) values 
(1,1,1,NULL,'Athar Ali Badsha','athar@gmail.com','$2y$12$yHFu9cF..zMI1ENGyvF2l.wzjS8MVliyghWTP.YuKrY6hSiDgcnsK',NULL,'8898927606','9619905242','7 Oct, 1991','female','EkaSandalwood.jpg',1,'2024-03-13 07:20:05','2024-03-14 08:53:25'),
(3,1,1,NULL,'Shehzad','shehzad215@gmail.com','$2y$12$YgMZh8/5f.dgkg.Y2W4Sf.AORuyutQVuuE1/kkHvtCPyT.8RlqrHO',NULL,'9619905242','8898927606','19 Mar, 2024','male','Alleppey.jpg',1,'2024-03-19 05:31:42','2024-03-19 05:31:42'),
(4,2,1,1,'Moin','moin@puratech.in','$2y$12$U//fZUmve063iMdAMZlWreCWtLkiac8.pTmdZhTBQKU5NtHsv10LC',NULL,'8523697410','8898927606','19 Mar, 2024','male','gateway-of-india-mumbai.webp',1,'2024-03-19 06:05:25','2024-03-19 06:05:25'),
(5,2,1,1,'Dinesh','dinesh@gmail.com','$2y$12$sY7YgCxbXxWSus/E77rdDeiOoKHjUTcMvCTM3JAqicqknzvFa2g.a',NULL,'258741000','8898927606','19 Mar, 2024','male',NULL,1,'2024-03-19 06:38:51','2024-03-19 06:38:51'),
(6,2,1,1,'Shubham','shubham@gmail.com','$2y$12$CZHZ45Nzz.iC0D8GYJlfg.SDfr1IjcxKxWfhElzCDBzTTVDdrQqfK',NULL,'9632581111','8898927606','19 Mar, 2024','male',NULL,1,'2024-03-19 06:42:13','2024-03-19 06:42:13'),
(7,2,1,1,'Hameed Khan','hamid@gmail.com','$2y$12$NfATJYHqm8VE18tuNuggM.6f8POnbsFCPnRQ8NxbGs0ZK4UOLS9Oe',NULL,'123467980','8898927606','19 Mar, 2024','male',NULL,1,'2024-03-19 06:46:23','2024-03-19 06:46:23'),
(8,2,1,1,'Waseem','wasim@gmail.com','$2y$12$v1e5hV/H93gVjYmVX42fWOmTQFewdpJNbv8A1MqwBG.OB/.K84xM.',NULL,'8522587410','8898927606','19 Mar, 2024','male',NULL,1,'2024-03-19 06:47:29','2024-03-19 06:47:29'),
(9,2,1,2,'Vivek','vivek@gmail.com','$2y$12$2qW2JrYRT7H0IQgzcckrEeaInw7P.BexwEVDaASEqSwUy6w0buKcK',NULL,'9874563210','8898927606','19 Mar, 2024','male',NULL,1,'2024-03-19 06:51:05','2024-03-19 06:51:05');

/*Table structure for table `week_days` */

DROP TABLE IF EXISTS `week_days`;

CREATE TABLE `week_days` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(45) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `week_days` */

insert  into `week_days`(`id`,`day`,`active`,`created_at`,`updated_at`) values 
(1,'Monday',1,'2024-03-29 11:45:10','2024-03-29 11:45:13'),
(2,'Tuesday',1,'2024-03-29 11:45:15','2024-03-29 11:45:17'),
(3,'Wednesday',1,'2024-03-29 11:45:21','2024-03-29 11:45:24'),
(4,'Thusday',1,'2024-03-29 11:45:25','2024-03-29 11:45:27'),
(5,'Friday',1,'2024-03-29 11:45:31','2024-03-29 11:45:38'),
(6,'Saturday',1,'2024-03-29 11:45:33','2024-03-29 11:45:41'),
(7,'Sunday',0,'2024-03-29 11:45:35','2024-03-29 11:45:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
