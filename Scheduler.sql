-- --------------------------------------------------------
-- Host:                         Localhost
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for scheduler
CREATE DATABASE IF NOT EXISTS `scheduler` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `scheduler`;

-- Dumping structure for table scheduler.days
CREATE TABLE IF NOT EXISTS `days` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scheduler.days: ~0 rows (approximately)
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
/*!40000 ALTER TABLE `days` ENABLE KEYS */;

-- Dumping structure for table scheduler.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scheduler.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(14, '2017_12_26_050630_create_subjects_table', 1),
	(15, '2017_12_26_050654_create_sections_table', 1),
	(16, '2017_12_26_050814_create_rooms_table', 1),
	(17, '2017_12_26_053915_create_users_table', 1),
	(18, '2018_03_06_130438_create_days_table', 1),
	(19, '2018_03_06_130504_create_times_table', 1),
	(20, '2018_07_25_082019_create_teachers_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table scheduler.rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scheduler.rooms: ~4 rows (approximately)
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` (`id`, `room_location`, `created_at`, `updated_at`) VALUES
	(1, 'CC09', '2018-09-10 05:21:08', '2018-09-10 05:21:08'),
	(2, 'CC10', '2018-09-10 05:21:13', '2018-09-10 05:21:13'),
	(3, 'CC06', '2018-09-10 05:21:17', '2018-09-10 05:21:17'),
	(4, 'UCS 301', '2018-09-11 04:22:13', '2018-09-11 04:22:13');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;

-- Dumping structure for table scheduler.sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scheduler.sections: ~0 rows (approximately)
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;

-- Dumping structure for table scheduler.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_code` text COLLATE utf8mb4_unicode_ci,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `units` int(11) DEFAULT NULL,
  `schedule_day` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_location` int(10) unsigned DEFAULT NULL,
  `instructor` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_subjects_teachers` (`instructor`),
  KEY `FK_subjects_rooms` (`room_location`),
  CONSTRAINT `FK_subjects_rooms` FOREIGN KEY (`room_location`) REFERENCES `rooms` (`id`),
  CONSTRAINT `FK_subjects_teachers` FOREIGN KEY (`instructor`) REFERENCES `teachers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scheduler.subjects: ~6 rows (approximately)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `subject_code`, `subject_name`, `section`, `subject_type`, `units`, `schedule_day`, `schedule_time`, `room_location`, `instructor`, `created_at`, `updated_at`) VALUES
	(1, 'History51', 'World History', 'A', 'Lecture', 3, 'Wed - Fri', '1:00 - 4:00 PM', 3, 5, '2018-09-11 05:32:26', '2018-09-11 05:32:26'),
	(2, 'History51', 'World History', 'A', 'Lecture', 3, 'Wed - Fri', '1:00 - 4:00', 1, 8, '2018-09-11 05:56:08', '2018-09-11 05:56:08'),
	(3, 'History51', 'World History', 'B', 'Lecture', 3, 'Wed - Fri', '2:30 - 4:00', 1, 8, '2018-09-11 05:56:23', '2018-09-11 05:56:23'),
	(4, 'CCS1', 'Computer Basics', 'A', 'Lecture and Laboratory', 3, 'Wed - Fri', '1:00 - 4:00', 1, 4, '2018-09-11 05:57:49', '2018-09-11 05:57:49'),
	(5, 'CCS1', 'Computer Basics', 'B', 'Lecture and Laboratory', 3, 'Wed - Fri', '1:30 - 4:30', 1, 4, '2018-09-11 05:58:03', '2018-09-11 05:58:03'),
	(6, 'ccs4', 'Fundamentals of Programming', 'C', 'Lecture and Laboratory', 3, 'Wed - Fri', '8:00 - 11:00', 1, 7, '2018-09-11 15:29:59', '2018-09-11 15:29:59');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table scheduler.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_picture` text COLLATE utf8mb4_unicode_ci,
  `teacher_FName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_MName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_LName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scheduler.teachers: ~5 rows (approximately)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`id`, `profile_picture`, `teacher_FName`, `teacher_MName`, `teacher_LName`, `created_at`, `updated_at`) VALUES
	(4, '1536306683.jpg', 'Charles', 'Ipsum', 'Carino', '2018-09-07 07:51:24', '2018-09-07 07:51:24'),
	(5, '1536306927.jpg', 'Lorem', 'Ipsum', 'Dolor', '2018-09-07 07:55:27', '2018-09-07 07:55:27'),
	(7, '1536563449.jpg', 'Sit', 'Amet', 'Consectetur', '2018-09-10 07:10:49', '2018-09-10 07:10:49'),
	(8, '1536563677.jpg', 'ONE', 'TWO', 'THREE', '2018-09-10 07:14:38', '2018-09-10 07:14:38'),
	(9, '1536730033.JPEG', 'This', 'is', 'Bat', '2018-09-12 05:27:13', '2018-09-12 05:27:13');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

-- Dumping structure for table scheduler.times
CREATE TABLE IF NOT EXISTS `times` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scheduler.times: ~0 rows (approximately)
/*!40000 ALTER TABLE `times` DISABLE KEYS */;
/*!40000 ALTER TABLE `times` ENABLE KEYS */;

-- Dumping structure for table scheduler.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `instructor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scheduler.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `instructor`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'John Doe', 'johndoe', '$2y$10$QUi2YXoWujCQ479J6Z6owuGeAM/XQjpUd2m35YG.kmcu3.AoGKHRi', 'k408DjS0qudhX5lVcYdhYGMzl822t3UcMB49wYUf1SUESzTQ3LbZE7iiE6rA', '2018-07-25 08:28:14', '2018-07-25 08:28:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
