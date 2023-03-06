
--create shop database
DROP DATABASE IF EXISTS web_shop;
CREATE DATABASE web_shop;
use web_shop;

--delete tables in DB-Schema 
DROP TABLE IF EXISTS artikel;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS kategorie;

--Create tables in DB-Schema 
CREATE TABLE kategorie (
    kategorie VARCHAR(500) not null primary key UNIQUE
);

--user table

--DROP TABLE IF EXISTS user;
CREATE TABLE user (
user_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_psw VARCHAR(100) null,
user_name VARCHAR(300) not null,
user_nachname VARCHAR(300) not null,
user_email VARCHAR(300) not null,
);


--DROP TABLE IF EXISTS artikel;
CREATE TABLE artikel (
artikel_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
artikel_name VARCHAR(300) not NULL,
artikel_beschreibung VARCHAR(5000) NULL,
preis decimal(8,2) not NULL,
kategorie VARCHAR(500) not NULL,
bild_url VARCHAR(1000) null,
FOREIGN KEY (kategorie) REFERENCES kategorie(kategorie)
);

--user_id INTEGER NOT NULL,
--FOREIGN KEY (user_id) REFERENCES user(user_id),



