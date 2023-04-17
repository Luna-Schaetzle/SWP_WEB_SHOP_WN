
--create shop database
DROP DATABASE IF EXISTS web_shop;
CREATE DATABASE web_shop;
use web_shop;

--delete tables in DB-Schema 
DROP TABLE IF EXISTS artikel;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS kategorie;
DROP TABLE IF EXISTS warenkorb;

--Create tables in DB-Schema 
CREATE TABLE kategorien (
    kID int primary key AUTO_INCREMENT,
    kategorie VARCHAR(500) not null 
);

--user table

--DROP TABLE IF EXISTS user;
CREATE TABLE users (
user_id int primary key AUTO_INCREMENT,
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

--warenkorb alt
CREATE TABLE warenkorb (
wid INTEGER Primary key AUTO_Increment,
user_id integer not null,
artikel_name VARCHAR(300) not NULL,
preis decimal(8,2) not NULL,
gespreis decimal(8,2) not NULL,
FOREIGN KEY (user_id) REFERENCES users(user_id)
);

--warenkorb neu
Create Table warenkorb(
artikel_id INTEGER NOT NULL unique,
user_id integer not null,
quant integer,
preis decimal(20,2),
FOREIGN KEY (artikel_id) REFERENCES artikel(artikel_id),
FOREIGN KEY (user_id) REFERENCES users(user_id)
);


--Kaufhistorie
create Table kaufhistorie(
kaufid INTEGER Primary key AUTO_Increment,
kaufdatum date not null,
user_id integer not null,
artikel_id INTEGER NOT NULL,
methode varchar(300) not null,
FOREIGN KEY (user_id) REFERENCES users(user_id),
FOREIGN KEY (artikel_id) REFERENCES artikel(artikel_id)
);


--adresse
create Table adresse(
kaufid INTEGER Primary key AUTO_Increment,
strasse varchar(300) not null,
hausnummer varchar(300) not null,
plz varchar(300) not null,
ort varchar(300) not null,
Foreign key (kaufid) references kaufhistorie(kaufid)
);


