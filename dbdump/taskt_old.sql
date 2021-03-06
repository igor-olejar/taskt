-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2014 at 10:53 AM
-- Server version: 5.5.37
-- PHP Version: 5.5.13-2+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taskt`
--
CREATE DATABASE IF NOT EXISTS `taskt`;

USE `taskt`;

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE IF NOT EXISTS `checkins` (
  `start_date` datetime DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `task_id` int(10) unsigned NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `checkins`
--

INSERT INTO `checkins` (`start_date`, `id`, `created_at`, `updated_at`, `task_id`, `start`, `end`) VALUES
(NULL, 1, '2014-06-30 09:14:20', '2014-06-30 09:14:20', 1, 1404119660, 1404123260);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`, `name`, `description`, `website`) VALUES
(1, '2014-06-30 09:14:20', '2014-06-30 09:14:20', 'Happy Company', 'We are very happy', 'http://www.happy.com'),
(2, '2014-06-30 09:14:20', '2014-06-30 09:14:20', 'Sad Company', 'We are very sad', 'http://www.sad.com'),
(3, '2014-06-30 09:14:20', '2014-06-30 09:14:20', 'Third Company', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_06_27_133240_create_users_table', 1),
('2014_06_27_133500_create_projects_table', 1),
('2014_06_27_133602_create_tasks_table', 1),
('2014_06_27_133705_create_clients_table', 1),
('2014_06_27_133806_create_checkins_table', 1),
('2014_06_27_143348_create_project_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `client_id` int(10) unsigned NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `roundup` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `created_at`, `updated_at`, `name`, `description`, `client_id`, `start_date`, `end_date`, `rate`, `roundup`) VALUES
(1, '2014-06-30 09:14:20', '2014-06-30 09:14:20', 'Project1', 'I am the first project ever', 1, '2014-06-12 00:00:00', '2014-07-12 00:00:00', NULL, NULL),
(2, '2014-06-30 09:14:20', '2014-06-30 09:14:20', 'Project2', 'I am the second project', 1, '2014-06-10 00:00:00', '2015-07-10 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE IF NOT EXISTS `project_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2014-06-30 09:14:20', '2014-06-30 09:14:20'),
(2, 2, 2, '2014-06-30 09:14:20', '2014-06-30 09:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'todo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `created_at`, `updated_at`, `description`, `user_id`, `project_id`, `start_date`, `end_date`, `status`) VALUES
(1, '2014-06-30 09:14:20', '2014-06-30 09:14:20', 'I am task one', 2, 1, '2014-06-27 00:00:00', '0000-00-00 00:00:00', 'in progress'),
(2, '2014-06-30 09:14:20', '2014-06-30 09:14:20', 'I am task two', 2, 1, '2014-06-27 00:00:00', '2014-06-27 00:00:00', 'completed'),
(3, '2014-06-30 09:14:20', '2014-06-30 09:14:20', 'I am task one', 2, 2, NULL, NULL, 'todo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `username`, `password`, `firstname`, `lastname`, `email`, `company`, `remember_token`) VALUES
(1, '2014-06-30 09:14:20', '2014-07-17 07:38:12', 'igor', '$2y$10$GRwfCQ38nNz/HfAB0g7/lOHrBFTRBZM3bzSp5x3sG7dE64.tbTuOq', 'Igor', 'Olejar', 'igor.olejar@gmail.com', 'TeknoStan Limited', 'ykavtNfCMU5zjMDL4Rrk93B2bWHTmCP3WdHLAh74PxRKXpIAXxjpind7kz9m');
