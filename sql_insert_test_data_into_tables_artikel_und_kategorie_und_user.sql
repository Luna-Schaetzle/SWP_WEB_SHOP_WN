--kategorie
--INSERT kategorie (kategorie) VALUES ('');
INSERT kategorie (kategorie) VALUES ('test_kategorie');
INSERT kategorie (kategorie) VALUES ('SWP');
INSERT kategorie (kategorie) VALUES ('Furry');
INSERT kategorie (kategorie) VALUES ('IT');
INSERT kategorie (kategorie) VALUES ('SFW');



--artikel
--INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,user_id) VALUES ('','',0.0,'',0);
--INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,user_id) VALUES ('Test','dies ist ein Test',999999.99,'test_kategorie',1);

--INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,bild_url) VALUES ('','',0.0,'','');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,bild_url) VALUES ('Test','dies ist ein Test',999999.99,'test_kategorie','https://www.shutterstock.com/image-vector/caution-exclamation-mark-white-red-260nw-1055269061.jpg');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,bild_url) VALUES ('SWP_Test','Der Test des Letzten Jahres',99.99,'SWP','https://www.heimwerker-test.de/images/testbilder/thumb_big/stiga-kehrmaschine-swp-355-rund-ums-haus-54865.jpg');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,bild_url) VALUES ('Furry paws','nice furry paws OwO',56.80,'Furry','https://i.etsystatic.com/36744748/r/il/be5fb0/4099958655/il_fullxfull.4099958655_98r4.jpg');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,bild_url) VALUES ('USB Kabel','Einfaches USB Kabel',1.99,'IT','https://snpi.dell.com/snp/images/products/large/de-at~A6927546/A6927546.jpg');
INSERT artikel (artikel_name,artikel_beschreibung,preis,kategorie,bild_url) VALUES ('Nicis "SFW" Sammlung','Sammlung',420.69,'SFW','https://www.incimages.com/uploaded_files/image/1920x1080/getty_525041723_970647970450098_70024.jpg');

--user
--Insert user (user_psw,user_name,user_nachname,user_email) VALUES ('','','','');
Insert user (user_psw,user_name,user_nachname,user_email) VALUES ('psw','te','test','te@test.com');


--select *
select * from kategorie;
select * from artikel;
select * from user;