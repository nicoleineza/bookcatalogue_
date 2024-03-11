CREATE DATABASE IF NOT EXISTS `catalogue`;
USE `catalogue`;

CREATE TABLE `books` (
  `BookID` int(11) NOT NULL AUTO_INCREMENT,
  `Author` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Cover` varchar(255) DEFAULT NULL,
  `ISBN` varchar(13) NOT NULL,
  `PublicationDate` date DEFAULT NULL,
  PRIMARY KEY (`BookID`),
  UNIQUE KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(255) NOT NULL,
  PRIMARY KEY (`CategoryID`)
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

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usercategories` (
  `UserID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`, `CategoryID`),
  FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`);


INSERT INTO `books` (`BookID`, `Author`, `Title`, `Cover`, `ISBN`, `PublicationDate`) VALUES
(1, 'Matt Haig', 'The Midnight Library', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1602190253i/52578297.jpg', '978-3-16-1484', '2021-01-01'),
(2, 'V.E. Schwab', 'The Invisible Life of Addie LaRue', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1584633432i/50623864.jpg', '978-0-7653-87', '2020-10-06'),
(3, 'Taylor Jenkins Reid', 'The Seven Husbands of Evelyn Hugo', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1664458703i/32620332.jpg', '978-1-5111-34', '2017-06-13'),
(4, 'Robert Jackson Bennet', 'The Tainted Cup', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1689268335i/150247395.jpg', '978-1-5311-34', '2024-02-06'),
(5, 'Heather Webb', 'Queens of London', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1682386426i/136276918.jpg', '978-1-5411-34', '2024-02-06');


INSERT INTO `categories` (`CategoryID`, `Category`) VALUES
(1, 'Read'),
(2, 'To Be Read'),
(3, 'Currently Reading');


INSERT INTO `users` (`UserID`, `UserName`) VALUES
(1, 'Joel Kodji');

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
(1, 4, 3),
(1, 5, 3),
(1, 1, 2),
(1, 2, 3);

INSERT INTO `usercategories` (`UserID`, `CategoryID`) VALUES
(1, 1),
(1, 2),
(1, 3);

