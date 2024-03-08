DROP DATABASE IF EXISTS catalogue ;
CREATE DATABASE IF NOT EXISTS catalogue;


CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    UserName VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE Categories (
    CategoryID INT PRIMARY KEY AUTO_INCREMENT, 
    Category VARCHAR(255) NOT NULL
);

INSERT INTO Categories (Category)
VALUES ('Read'), ('To Be Read'), ('Currently Reading');

CREATE TABLE UserCategories (
    UserID INT,
    CategoryID INT,
    PRIMARY KEY (UserID, CategoryID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);

CREATE TABLE Books (
    BookID INT PRIMARY KEY AUTO_INCREMENT,
    Author VARCHAR(255) NOT NULL,
    Title VARCHAR(255) NOT NULL,
    Cover VARCHAR(255),
    ISBN VARCHAR(13) UNIQUE NOT NULL,
    PublicationDate DATE
);

INSERT INTO Books (Author, Title, Cover, ISBN, PublicationDate) VALUES
('Matt Haig', 'The Midnight Library', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1602190253i/52578297.jpg', '978-3-16-148410-0', '2021-01-01'),
('V.E. Schwab', 'The Invisible Life of Addie LaRue', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1584633432i/50623864.jpg', '978-0-7653-8756-1', '2020-10-06'),
('Taylor Jenkins Reid', 'The Seven Husbands of Evelyn Hugo', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1664458703i/32620332.jpg', '978-1-5011-3478-2', '2017-06-13'),
('Robert Jackson Bennet', 'The Tainted Cup', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1689268335i/150247395.jpg', '978-1-5011-3478-2', '2024-02-06'),
('Heather Webb', 'Queens of London', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1682386426i/136276918.jpg', '978-1-5011-3478-2','2024-02-06')


CREATE TABLE UserBooks (
    UserID INT,
    BookID INT,
    CategoryID INT,
    PRIMARY KEY (UserID, BookID, CategoryID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (BookID) REFERENCES Books(BookID),
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);

CREATE TABLE Reviews (
    ReviewID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    BookID INT,
    ReviewText TEXT,
    Rating INT CHECK (Rating >= 1 AND Rating <= 5),
    ReviewDate DATE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (BookID) REFERENCES Books(BookID)
);
