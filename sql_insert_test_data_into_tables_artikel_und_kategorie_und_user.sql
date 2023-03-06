--kategorie
--INSERT kategorie (kategorie) VALUES ('');
INSERT kategorie (kategorie) VALUES ('test_kategorie');
INSERT kategorie (kategorie) VALUES ('SWP');
INSERT kategorie (kategorie) VALUES ('Furry');
INSERT kategorie (kategorie) VALUES ('IT');



--artikel
--INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,user_id) VALUES ('','',0.0,'',0);
--INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,user_id) VALUES ('Test','dies ist ein Test',999999.99,'test_kategorie',1);

--INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie) VALUES ('','',0.0,'');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie) VALUES ('Test','dies ist ein Test',999999.99,'test_kategorie');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie) VALUES ('SWP_Test','Der Test des Letzten Jahres',99.99,'SWP');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie) VALUES ('Furry paws','nice furry paws OwO',56.80,'Furry');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie) VALUES ('USW Kabel','Einfaches USB Kabel',1.99,'IT');

--user
--Insert user (user_psw,user_name,user_nachname,user_email) VALUES ('','','','');
Insert user (user_psw,user_name,user_nachname,user_email) VALUES ('psw','te','test','te@test.com');


--select *
select * from kategorie;
select * from artikel;
select * from user;