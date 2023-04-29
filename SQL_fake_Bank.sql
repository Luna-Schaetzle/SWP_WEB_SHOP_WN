use web_shop;
drop table if exists bankaccount;
create table bankaccount(
    Bank_id int not null primary key ,
    username varchar(255) not null,
    password varchar(255) not null,
    balance int not null
);
insert into bankaccount values(1,'admin','admin',1000000);
insert into bankaccount values(2,'user','user',1000000);

select * from bankaccount;