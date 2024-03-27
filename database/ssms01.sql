-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 11:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssms01`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE IF NOT EXISTS `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` varchar(255) DEFAULT NULL,
  `pass_mark` varchar(255) DEFAULT NULL,
  `subjective_mark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courseables`
--

CREATE TABLE IF NOT EXISTS `courseables` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `courseable_type` varchar(255) NOT NULL,
  `courseable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courseables_subject_id_foreign` (`subject_id`),
  KEY `courseables_courseable_type_courseable_id_index` (`courseable_type`,`courseable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE IF NOT EXISTS `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1st Term', NULL, '2024-03-26 14:17:08'),
(2, '2nd Term', NULL, '2024-03-26 14:17:27'),
(3, '3rd Term', NULL, '2024-03-26 14:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_10_102155_create_student_classes_table', 1),
(6, '2024_01_10_113144_create_student_years_table', 1),
(7, '2024_01_11_094600_create_student_groups_table', 1),
(8, '2024_01_12_115925_create_student_shifts_table', 1),
(9, '2024_01_12_143154_create_exam_types_table', 1),
(10, '2024_01_12_210950_create_subjects_table', 1),
(11, '2024_01_13_195741_create_assign_subjects_table', 1),
(12, '2024_01_21_210256_create_students_table', 1),
(13, '2024_01_22_195846_create_teachers_table', 1),
(14, '2024_02_17_215435_create_courseables_table', 1),
(15, '2024_02_19_142920_create_student_class_teacher_table', 1),
(16, '2024_02_19_155042_create_subject_teacher_table', 1),
(17, '2024_02_20_215737_create_student_class_subject_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `father_name` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `roll_number` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_user_id_foreign` (`user_id`),
  KEY `students_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `phone`, `address`, `id_no`, `roll_number`, `dob`, `user_id`, `parent_id`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 'Musa', 'Engineer', 'Salamatu', 'Civil Servant', '09890007', 'Minna', '3514', '20240001', '2000-03-26', 5, 12, 1, 1, 2, NULL, '2024-03-26 14:32:29', '2024-03-27 07:50:43'),
(2, 'Lawal', 'Business', 'Fatima', 'Hause Wife', '090890091', 'Katsina', '6963', '20240002', '2005-03-26', 6, 13, 3, 6, 1, NULL, '2024-03-26 14:35:44', '2024-03-27 08:37:29'),
(3, 'Anele', 'Lecturer', 'Blessing', 'Teacher', '09089009', 'Rivers', '3433', '20240003', '2007-03-08', 7, 13, 5, 11, 1, NULL, '2024-03-26 14:38:50', '2024-03-27 08:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE IF NOT EXISTS `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SSS3', NULL, NULL),
(2, 'SSS2', NULL, NULL),
(3, 'SSS1', NULL, NULL),
(4, 'JSS3', NULL, NULL),
(5, 'JSS2', NULL, NULL),
(6, 'JSS1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_class_subject`
--

CREATE TABLE IF NOT EXISTS `student_class_subject` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_class_subject_student_class_id_foreign` (`student_class_id`),
  KEY `student_class_subject_subject_id_foreign` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_class_subject`
--

INSERT INTO `student_class_subject` (`id`, `student_class_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(2, 6, 2, NULL, NULL),
(3, 5, 1, NULL, NULL),
(4, 5, 2, NULL, NULL),
(5, 5, 3, NULL, NULL),
(6, 5, 4, NULL, NULL),
(7, 5, 5, NULL, NULL),
(8, 5, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_class_teacher`
--

CREATE TABLE IF NOT EXISTS `student_class_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_class_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_class_teacher_student_class_id_foreign` (`student_class_id`),
  KEY `student_class_teacher_teacher_id_foreign` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_class_teacher`
--

INSERT INTO `student_class_teacher` (`id`, `student_class_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE IF NOT EXISTS `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', NULL, NULL),
(2, 'Art', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE IF NOT EXISTS `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE IF NOT EXISTS `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2010', NULL, NULL),
(2, '2011', NULL, NULL),
(3, '2012', NULL, NULL),
(4, '2013', NULL, NULL),
(5, '2014', NULL, NULL),
(6, '2015', NULL, NULL),
(7, '2016', NULL, NULL),
(8, '2017', NULL, NULL),
(9, '2018', NULL, NULL),
(10, '2019', NULL, NULL),
(11, '2020', NULL, NULL),
(12, '2021', NULL, NULL),
(13, '2022', NULL, NULL),
(14, '2023', NULL, NULL),
(15, '2024', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'English language', NULL, NULL),
(2, 'Mathematics', NULL, NULL),
(3, 'Agriculture', NULL, NULL),
(4, 'Civics', NULL, NULL),
(5, 'Economics', NULL, NULL),
(6, 'Science', NULL, NULL),
(7, 'Technology', NULL, NULL),
(8, 'Biology', NULL, NULL),
(9, 'Business studies', NULL, NULL),
(10, 'Physical Education', NULL, NULL),
(11, 'Art', NULL, NULL),
(12, 'Chemistry', NULL, NULL),
(13, 'Computer', NULL, NULL),
(14, 'Christian Religious Studies', NULL, NULL),
(15, 'General Mathematics', NULL, NULL),
(16, 'ICT', NULL, NULL),
(17, 'Social studies', NULL, NULL),
(18, 'Physics', NULL, NULL),
(19, 'Geography', NULL, NULL),
(20, 'History', NULL, NULL),
(21, 'Language', NULL, NULL),
(22, 'French', NULL, NULL),
(23, 'Yoruba', NULL, NULL),
(24, 'Arabic', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE IF NOT EXISTS `subject_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_teacher_subject_id_foreign` (`subject_id`),
  KEY `subject_teacher_teacher_id_foreign` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_teacher`
--

INSERT INTO `subject_teacher` (`id`, `subject_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 4, 1, NULL, NULL),
(3, 9, 2, NULL, NULL),
(4, 11, 2, NULL, NULL),
(5, 22, 3, NULL, NULL),
(6, 13, 4, NULL, NULL),
(7, 16, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_user_id_foreign` (`user_id`),
  KEY `teachers_class_id_foreign` (`class_id`),
  KEY `teachers_subject_id_foreign` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `class_id`, `subject_id`, `dob`, `created_at`, `updated_at`) VALUES
(1, 8, NULL, NULL, '1986-03-08', '2024-03-26 14:46:03', '2024-03-26 14:47:05'),
(2, 9, NULL, NULL, '2000-03-26', '2024-03-26 14:54:05', '2024-03-26 14:54:05'),
(3, 10, NULL, NULL, '1986-03-23', '2024-03-26 14:58:24', '2024-03-26 14:58:24'),
(4, 11, NULL, NULL, '1996-03-16', '2024-03-26 15:01:10', '2024-03-26 15:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` enum('Admin','Teacher','Student','Parent') NOT NULL DEFAULT 'Student',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `photo`, `address`, `gender`, `religion`, `phone`, `role`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'User', 'admin@user.com', NULL, 'Admin202403261527.png', 'Kaduna', NULL, NULL, '0801234', 'Admin', 'active', '$2y$12$zWYUTfuYE/zhIgCLgjUplOPDUVKofDf2g8OeN5D5BjA2nynK1ya9S', NULL, NULL, '2024-03-26 14:27:39'),
(5, 'Aisha', 'Mustapha', 'aishamustapha@gmail.com', NULL, 'Student202403261532.png', 'Minna', 'Female', 'Islam', '09890007', 'Student', 'active', '$2y$12$GHau8p2apsRX4QtH6lEhlu2qx/S2him4oqBgM3VhEfYk.13dhQpPS', NULL, '2024-03-26 14:32:29', '2024-03-26 14:32:29'),
(6, 'Ibrahim', 'Lawal', 'ilawal002@gmail.com', NULL, 'Student202403261539.png', 'Katsina', 'Male', 'Islam', '090890091', 'Student', 'active', '$2y$12$XqFy/zRZvDzyBkHfdUD7gOTPxZJ2hACivIGhdClSibXvKEg1ogSsa', NULL, '2024-03-26 14:39:58', '2024-03-26 14:39:58'),
(7, 'Atochi', 'Anele', 'atochibelinder@gmail.com', NULL, NULL, 'Rivers', 'Female', 'Christianity', '09089009', 'Student', 'active', '$2y$12$5i5jOeK7oa7dCGjOXzTdWunKUn1plWiAg9jkDQ0drl74HaxKTScNi', NULL, '2024-03-26 14:38:50', '2024-03-26 14:38:50'),
(8, 'Ribetan', 'Mnanjwan', 'ribetm09@gmail.com', NULL, 'Teacher202403261547.png', 'Cross River', 'Male', 'Christianity', '09890007', 'Teacher', 'active', '$2y$12$1pItIuL/.Kh8/P8tRwlCZOpSxs7KuAHTaFEMj68K/v4zlmCy8hot.', NULL, '2024-03-26 14:46:03', '2024-03-26 14:47:05'),
(9, 'Ololoma', 'Tekena', 'tekena022@gmail.com', NULL, 'Teacher202403261554.png', 'Port Harcourt', 'Male', 'Christianity', '09079890', 'Teacher', 'active', '$2y$12$jYZG0KJRNh/QAcYtEATsOOob5XU8oIWrh9qrYxEh/DK.Jn8if8xTq', NULL, '2024-03-26 14:54:05', '2024-03-26 14:54:05'),
(10, 'Kufreh', 'Abasi', 'abasikufreh@yahoo.com', NULL, NULL, 'Calabar', 'Male', 'Traditional', '987897989', 'Teacher', 'active', '$2y$12$gE/cyzeq6ga4p1yBtN9oEOO2kbvXfR1xcc2Qgi2DbxtBr/mZoaNca', NULL, '2024-03-26 14:58:23', '2024-03-26 14:58:23'),
(11, 'Muhammad', 'Jibril', 'muhammadj02@gmail.com', NULL, 'Teacher202403261601.png', 'Abuja', 'Male', 'Islam', '098776889', 'Teacher', 'active', '$2y$12$/rx2veuDumPeTim1Ig66lusx59siVOJJj2UvXpV1W/3AO.8.hoLLO', NULL, '2024-03-26 15:01:10', '2024-03-26 15:01:10'),
(12, 'Muktar', 'John', 'muktarjohn@gmail.com', NULL, 'Parent202403270848.png', 'Abuja', 'Male', 'Islam', '09079890', 'Parent', 'active', '$2y$12$LE8/QQaqtW8Q6eNt3vEW2OwcEQn/FL/UcoKU.Jjf.Dsu/4CPrdqJa', NULL, '2024-03-27 07:48:42', '2024-03-27 07:48:42'),
(13, 'Daniel', 'Favour', 'danifavour@gmail.com', NULL, 'Parent202403270937.png', 'Kogi', 'Male', 'Christianity', '09079890', 'Parent', 'active', '$2y$12$287QK7b2k36LpedwSsL22uZ9jTx/3/075CVD5iOGviGsa11/DMw7S', NULL, '2024-03-27 08:37:29', '2024-03-27 08:37:29'),
(14, 'Musa', 'Yusuf', 'musayusuf@gmail.com', NULL, NULL, 'Niger', 'Male', 'Islam', '09009089', 'Parent', 'active', '$2y$12$kgL5u/cN4Nwl1BDKa52jxOh30k7JEnnT1/a0Ki8UNpNX17uDanw6y', NULL, '2024-03-27 08:46:13', '2024-03-27 08:46:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courseables`
--
ALTER TABLE `courseables`
  ADD CONSTRAINT `courseables_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_class_subject`
--
ALTER TABLE `student_class_subject`
  ADD CONSTRAINT `student_class_subject_student_class_id_foreign` FOREIGN KEY (`student_class_id`) REFERENCES `student_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_class_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_class_teacher`
--
ALTER TABLE `student_class_teacher`
  ADD CONSTRAINT `student_class_teacher_student_class_id_foreign` FOREIGN KEY (`student_class_id`) REFERENCES `student_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_class_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `subject_teacher_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `student_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
