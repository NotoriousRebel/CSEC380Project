-- Create Users database

CREATE DATABASE IF NOT EXISTS Users;

USE Users;

CREATE TABLE Credentials(
			ID int(9) NOT NULL auto_increment,
			UserName VARCHAR(50) NOT NULL,
			Password VARCHAR(256) NOT NULL,
			PRIMARY KEY (ID)
);

