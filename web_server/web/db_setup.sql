-- Create Users database

DROP DATABASE IF EXISTS Users;
CREATE DATABASE IF NOT EXISTS Users;
USE Users;

DROP TABLE IF EXISTS User;

CREATE TABLE Credentials(
			ID int(9) NOT NULL auto_increment,
			UserName VARCHAR(50) NOT NULL,
			Password VARCHAR(256) NOT NULL,
			PRIMARY KEY (ID)
);

DROP TABLE IF EXISTS Videos;

CREATE TABLE Videos(
                        VideoID int(9) NOT NULL auto_increment,
                        UserID int(9) NOT NULL,
                        VideoName VARCHAR(150) NOT NULL,
                        OrigName VARCHAR(150) NOT NULL,
                        PRIMARY KEY (VideoID),
                        CONSTRAINT FK_UserVideo FOREIGN KEY (UserID) REFERENCES Credentials(ID)
);

INSERT INTO Credentials Values(NULL, "admin", "admin");
