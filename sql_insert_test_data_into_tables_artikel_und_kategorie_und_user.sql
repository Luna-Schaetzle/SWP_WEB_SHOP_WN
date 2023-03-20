--kategorie
--INSERT kategorien (kategorie) VALUES ('');
INSERT kategorien (kategorie) VALUES ('test_kategorie');
INSERT kategorien (kategorie) VALUES ('SWP');
INSERT kategorien (kategorie) VALUES ('Furry');
INSERT kategorien (kategorie) VALUES ('IT');
INSERT kategorien (kategorie) VALUES ('SFW');
INSERT kategorien (kategorie) VALUES ('communism');



--artikel
--INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,user_id) VALUES ('','',0.0,'',0);
--INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,user_id) VALUES ('Test','dies ist ein Test',999999.99,'test_kategorie',1);

--INSERT artikel (artikel_name,artikel_beschreibung,preis,kID,bild_url) VALUES ('','',0.0,0,'');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kID,bild_url) VALUES ('Test','dies ist ein Test',999999.99,1,'https://www.shutterstock.com/image-vector/caution-exclamation-mark-white-red-260nw-1055269061.jpg');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kID,bild_url) VALUES ('SWP_Test','Der Test des Letzten Jahres',99.99,2,'https://www.heimwerker-test.de/images/testbilder/thumb_big/stiga-kehrmaschine-swp-355-rund-ums-haus-54865.jpg');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kID,bild_url) VALUES ('Furry paws','nice furry paws OwO',56.80,3,'https://i.etsystatic.com/36744748/r/il/be5fb0/4099958655/il_fullxfull.4099958655_98r4.jpg');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kID,bild_url) VALUES ('USB Kabel','Einfaches USB Kabel',1.99,4,'https://snpi.dell.com/snp/images/products/large/de-at~A6927546/A6927546.jpg');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kID,bild_url) VALUES ('Nicis "SFW" Sammlung','Sammlung',420.69,5,'https://www.incimages.com/uploaded_files/image/1920x1080/getty_525041723_970647970450098_70024.jpg');

--user
--Insert users (user_nachname, user_vorname, user_psw,user_email) VALUES ('','','','');
Insert users (user_nachname, user_vorname, user_psw,user_email) VALUES ('Test','user','psw','te@test.com');
Insert users (user_nachname, user_vorname, user_psw,user_email) VALUES ('Luna', 'Schaetzle','pws','Luna@luna.com');


--select *
select * from kategorien;
select * from artikel;
select * from users;
--(a.artikel_name,a.artikel_beschreibung,a.preis,a.bild_url,b.kategorie)

SELECT *
  from artikel a
 inner join kategorien b
 on a.kID = b.kID
 where b.kategorie = 'Furry';

 SELECT (a.artikel_name, a.artikel_beschreibung,a.preis,a.bild_url,a.kID, b.kID,b.kategorie)
  from artikel a
 inner join kategorien b
 on a.kID = b.kID
 where a.kID = 3;

 SELECT (a.artikel_name, a.artikel_beschreibung,a.preis,a.bild_url,a.kID, b.kID,b.kategorie)
  from artikel a
 inner join kategorien b
 on a.kID = b.kID
 where a.kID = 3;

 SELECT a.artikel_name, a.artikel_beschreibung,a.preis,b.kategorie,a.bild_url from artikel a inner join kategorien b on a.kID = b.kID where b.kategorie = 'Furry';

