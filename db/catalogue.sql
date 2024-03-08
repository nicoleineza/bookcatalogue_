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

CREATE TABLE UserBooks (
    UserID INT,
    BookID INT,
    CategoryID INT,
    PRIMARY KEY (UserID, BookID),
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
