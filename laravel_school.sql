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
  `time_per_perioud` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `institute_timings` */

insert  into `institute_timings`(`id`,`institute_id`,`shift_type_id`,`shift_start`,`shift_end`,`break_time_start`,`break_durations`,`prayer_time`,`time_per_perioud`,`created_at`,`updated_at`) values 
(1,1,1,'07:30','12:30','10:30','45','15','45','2024-03-28 11:17:36','2024-03-28 11:17:36'),
(2,1,2,'12:30','17:30','14:30','45','15','45','2024-03-28 11:18:29','2024-03-28 11:18:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `learn_spaces` */

insert  into `learn_spaces`(`id`,`institute_id`,`teacher_id`,`shift_type_id`,`class_name`,`no_of_student`,`active`,`created_at`,`updated_at`) values 
(1,1,1,1,'1st - A',30,0,'2024-03-20 07:01:15','2024-03-26 06:16:47'),
(2,1,2,1,'1st - B',25,0,'2024-03-21 10:24:23','2024-03-26 06:16:58');

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

/*Table structure for table `student_details` */

DROP TABLE IF EXISTS `student_details`;

CREATE TABLE `student_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `father_name` varchar(45) NOT NULL,
  `mother_name` varchar(45) NOT NULL,
  `father_qualification` varchar(45) DEFAULT NULL,
  `mother_qualification` varchar(45) DEFAULT NULL,
  `address` text,
  `contact_no` varchar(45) DEFAULT NULL,
  `email_id` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `student_details` */

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `learn_space_id` int(11) DEFAULT NULL,
  `gr_no` varchar(45) DEFAULT NULL,
  `roll_no` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `date_of_birth` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `blood_group` varchar(45) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `students` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `teachers` */

insert  into `teachers`(`id`,`institute_id`,`name`,`email`,`contact`,`qualification`,`gender`,`address`,`profile_img`,`active`,`created_at`,`updated_at`) values 
(1,1,'Hetuk Sir','mukesh@puratech.in','8898927606','MBA','male','Vidya Vihar','cmsdes2.webp',1,'2024-03-21 06:48:16','2024-03-21 09:12:09'),
(2,1,'Rafique Shaikh','rafique@gmail.com','1234567890','D ed','male','B Sector E Line Room No. 12','dmc06.webp',1,'2024-03-21 09:13:21','2024-03-21 09:13:21');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `teachers_subjects` */

insert  into `teachers_subjects`(`id`,`teacher_id`,`subject_id`,`created_at`,`updated_at`) values 
(1,1,1,'2024-03-21 06:48:16','2024-03-21 06:48:16'),
(2,1,2,'2024-03-21 06:48:16','2024-03-21 06:48:16'),
(3,2,1,'2024-03-21 09:13:21','2024-03-21 09:13:21'),
(4,2,2,'2024-03-21 09:13:21','2024-03-21 09:13:21');

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
