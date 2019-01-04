-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for codeigniter_tutorial
DROP DATABASE IF EXISTS `codeigniter_tutorial`;
CREATE DATABASE IF NOT EXISTS `codeigniter_tutorial` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `codeigniter_tutorial`;

-- Dumping structure for table codeigniter_tutorial.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table codeigniter_tutorial.categories: ~2 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
	(1, 'business', '2018-12-26 21:49:49'),
	(2, 'technology', '2018-12-26 21:50:08'),
	(3, 'alabala', '2018-12-27 15:20:11');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table codeigniter_tutorial.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_comments_posts` (`post_id`),
  CONSTRAINT `FK_comments_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table codeigniter_tutorial.comments: ~0 rows (approximately)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `name`, `email`, `body`, `post_id`, `created_at`) VALUES
	(1, 'greger', 'ergege@avv.bg', '<p>gregergerg wegre</p>\r\n', 10, '2018-12-27 23:50:00'),
	(2, 'FIlip', 'ewfew@avv.bg', '<p>First Test</p>\r\n', 10, '2018-12-28 10:20:33');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table codeigniter_tutorial.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `FK_posts_categories` (`category_id`),
  KEY `FK_posts_users` (`user_id`),
  CONSTRAINT `FK_posts_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table codeigniter_tutorial.posts: ~9 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `post_image`, `category_id`, `user_id`, `created_at`) VALUES
	(1, 'Post one', 'post-one', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 1, 1, '2018-12-26 00:09:11'),
	(2, 'Post Two', 'post-two', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 1, 1, '2018-12-26 00:10:14'),
	(4, 'Post three Update 1', 'Post-three-Update-1', '<p>1 Update Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', 1, 1, '2018-12-26 11:05:15'),
	(6, 'Edit this shit', 'Edit-this-shit', 'Edit', '', 1, 1, '2018-12-26 15:14:29'),
	(7, 'opaaaa', 'opaaaa', '<p>test ala <strong>bala</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1><strong>efewfewfweffvdrfvreevevre</strong></h1>\r\n', '', 1, 1, '2018-12-26 15:19:29'),
	(8, 'svdsvsvds', 'svdsvsvds', '<p>sdvsvsvdvsdvsv</p>\r\n', '', 1, 1, '2018-12-26 22:10:53'),
	(9, 'rgegerg', 'rgegerg', '<p>ergregerge</p>\r\n', 'noimage.jpg', 1, 1, '2018-12-26 23:15:01'),
	(10, 'ergeg', 'ergeg', '<p>ergege</p>\r\n', '2111e89cd243a4dab235ae306fa63b46.jpg', 2, 1, '2018-12-26 23:16:50'),
	(11, 'test user', 'test-user', '<p>test user</p>\r\n', 'noimage.jpg', 1, 2, '2018-12-28 19:12:30');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table codeigniter_tutorial.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table codeigniter_tutorial.users: ~6 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
	(1, 'test', 'test@avv.bg', '$2y$10$FrpQV0IpuAWiEs653mSLDuig9L952nftNOL.0uPx8CXXItnSEqXeO', '2018-12-28 13:06:39'),
	(2, 'test1', '1test@avv.bg', '$2y$10$Wu00LpvflYg.8VJa/HwtzOTukz.2FImr6vbjKYnCpJajcyRdcrPZC', '2018-12-28 13:32:12'),
	(3, 'test3', 'test3@avv.bg', '$2y$10$u5XkYwYwmWhpgYtQWOSGFuuMmS9FvCWB.iXdsnfvDx4E7cyjbRDCW', '2018-12-28 13:46:51'),
	(4, 'test4', 'test4@avv.bg', '$2y$10$/q1nhBl/M.I2rdhnjFWAJeI3VfxDuamTe3r8BSwq4bjAq9Qt2xwoK', '2018-12-28 13:49:39'),
	(5, 'test5', 'test5@avv.bg', '$2y$10$GLV9w8zPgTLRIZg12B.jNOvCdTtYdbM2.uA9.B7qDLJvwwUvsU4uC', '2018-12-28 13:50:22'),
	(6, 'test6', 'test6@avv.bg', '$2y$10$bjltjuoKHoclIPKSlDOWTeXK3yJqUenm7GZDp1s.CVeAf310I8ndC', '2018-12-28 14:58:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
