-- Book Catalogue Database SQL Dump
-- Version: 1.0

CREATE DATABASE IF NOT EXISTS `BC2025` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `BC2025`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";



-- Users table
CREATE TABLE `Users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(50) NOT NULL,
  `lastname` VARCHAR(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `dob` date NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `psw` VARCHAR(100) NOT NULL,
  
  
 
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `books` (
  `BookID` int(11) NOT NULL AUTO_INCREMENT,
  `Author` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Cover` varchar(255) DEFAULT NULL,
  `ISBN` varchar(13) NOT NULL,
  `PublicationDate` date DEFAULT NULL,
  `Description` varchar(3000),
  PRIMARY KEY (`BookID`),
  UNIQUE KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categories` (
  `CategoryID` INT(11) NOT NULL AUTO_INCREMENT,
  `Category` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `userbooks` (
  `UserID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`, `BookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `bookcategories` (
  `UserID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`, `BookID`, `CategoryID`),
  FOREIGN KEY (`UserID`, `BookID`) REFERENCES `userbooks` (`UserID`, `BookID`),
  FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `usercategories` (
  `UserID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`, `CategoryID`),
  FOREIGN KEY (`UserID`) REFERENCES `Users` (`user_id`),
  FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Summary table
CREATE TABLE `Summary` (
  `summary_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11),
  `book_id` INT(11),
  `summary_text` TEXT,
  
  PRIMARY KEY (`summary_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`),
  FOREIGN KEY (`book_id`) REFERENCES `books`(`BookID`)
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



CREATE TABLE `reviews` (
  `ReviewID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL,
  `ReviewText` text DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` >= 1 and `Rating` <= 5),
  `ReviewDate` date DEFAULT NULL,
  PRIMARY KEY (`ReviewID`),
  KEY `UserID` (`UserID`),
  KEY `BookID` (`BookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`);
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
  'content' VARCHAR (1000000),
  PRIMARY KEY (`publishing_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `books` (`BookID`, `Author`, `Title`,`Genre`, `Cover`, `ISBN`, `PublicationDate`) VALUES
(1, 'Matt Haig', 'The Midnight Library','horror', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1602190253i/52578297.jpg', '978-3-16-1484', '2021-01-01'),
(2, 'V.E. Schwab', 'The Invisible Life of Addie LaRue','mystery','https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1584633432i/50623864.jpg', '978-0-7653-87', '2020-10-06'),
(3, 'Taylor Jenkins Reid', 'The Seven Husbands of Evelyn Hugo','thriller', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1664458703i/32620332.jpg', '978-1-5111-34', '2017-06-13'),
(4, 'Robert Jackson Bennet', 'The Tainted Cup', 'mystery','https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1689268335i/150247395.jpg', '978-1-5311-34', '2024-02-06'),
(5, 'Heather Webb', 'Queens of London', 'comedy','https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1682386426i/136276918.jpg', '978-1-5411-34', '2024-02-06');


INSERT INTO `categories` (`CategoryID`, `Category`) VALUES
(1, 'Read'),
(2, 'Want to Read'),
(3, 'Currently Reading');



INSERT INTO `userbooks` (`UserID`, `BookID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5);

INSERT INTO `bookcategories` (`UserID`, `BookID`, `CategoryID`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 1),
(1, 5, 2);

