-- Create Users database

CREATE DATABASE IF NOT EXISTS Users;
USE Users;

CREATE TABLE Credentials(
			ID int(9) NOT NULL auto_increment,
			UserName VARCHAR(40) NOT NULL,
			Password VARCHAR(100) NOT NULL,
			PRIMARY KEY (ID)
);

