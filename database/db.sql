-- Book Catalogue Database SQL Dump
-- Version: 1.0

CREATE DATABASE IF NOT EXISTS `book_catalogue` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `book_catalogue`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";



-- Users table
CREATE TABLE `Users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  
 
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Books table
CREATE TABLE `Books` (
  `book_id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `author` VARCHAR(100),
  `image_url` VARCHAR(255),
 
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Summary table
CREATE TABLE `Summary` (
  `summary_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11),
  `book_id` INT(11),
  `summary_text` TEXT,
  
  PRIMARY KEY (`summary_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`),
  FOREIGN KEY (`book_id`) REFERENCES `Books`(`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- Progress table
CREATE TABLE `Progress` (
  `progress_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11),
  `period_start` DATE,
  `period_end` DATE,
  `pages_read` INT(11),
  `goal_pages` INT(11),
  
  PRIMARY KEY (`progress_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- Review table
CREATE TABLE `Review` (
  `review_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11),
  `book_id` INT(11),
  `review_text` TEXT,
  `rating` DECIMAL(2,1),
 
  PRIMARY KEY (`review_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`),
  FOREIGN KEY (`book_id`) REFERENCES `Books`(`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Goals table
CREATE TABLE `Goals` (
  `goal_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11),
  `goal_type` VARCHAR(50),
  `goal_value` INT(11),
  `achieved` BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (`goal_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Awards table
CREATE TABLE `Awards` (
  `award_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11),
  `award_name` VARCHAR(100),
  
  PRIMARY KEY (`award_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Publishing Table
CREATE TABLE `Publishing` (
  `publishing_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11),
  `year_published` YEAR,
  `book_title` VARCHAR(255),
  PRIMARY KEY (`publishing_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
