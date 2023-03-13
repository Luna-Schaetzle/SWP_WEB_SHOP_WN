
--create shop database
DROP DATABASE IF EXISTS web_shop;
CREATE DATABASE web_shop;
use web_shop;

--delete tables in DB-Schema 
DROP TABLE IF EXISTS artikel;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS kategorie;

--Create tables in DB-Schema 
CREATE TABLE kategorien (
    kID int primary key AUTO_INCREMENT,
    kategorie VARCHAR(500) not null 
);

--user table

--DROP TABLE IF EXISTS user;
CREATE TABLE users (
user_id int   primary key AUTO_INCREMENT,
user_nachname VARCHAR(300) not null   ,
user_vorname VARCHAR(300) not null   ,
user_psw VARCHAR(100) null,
user_email VARCHAR(300) not null UNIQUE
);

--Rechte 0 alle 1 add/delet 2 veiw, 

--DROP TABLE IF EXISTS artikel;
CREATE TABLE artikel (
artikel_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
artikel_name VARCHAR(300) not NULL,
artikel_beschreibung VARCHAR(5000) NULL,
preis decimal(8,2) not NULL,
kID INTEGER not NULL,
bild_url VARCHAR(1000) null,
FOREIGN KEY (kID) REFERENCES kategorien(kID)
);

--user_id INTEGER NOT NULL,
--FOREIGN KEY (user_id) REFERENCES user(user_id),

--warenkorb

--Kaufhistorie


