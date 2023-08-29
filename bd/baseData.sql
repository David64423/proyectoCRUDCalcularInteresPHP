create database proyectoInteres;
use proyectoInteres;

create table facturas(
fact_id int(4) primary key auto_increment,
monto float(7,2),
fechaEmision varchar(100),
fechaVencimiento varchar(100)
);


drop table facturas;
create table intereses(
id int(2) primary key auto_increment,
desde int(4),
hasta int(4),
interes int(4)
);

insert into intereses (desde,hasta,interes)values(1,7,5),(8,15,10),(16,30,20),(31,999,100);


select * from facturas;

select * from intereses;
