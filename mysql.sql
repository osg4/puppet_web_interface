create dabatabase dashboard;

use dashboard;

create table modulos (
	id_modulo int not null auto_increment, 
	nombre char(25) not null, 
	primary key (id_modulo)
);

insert into modulos (nombre) values ('$nombre_modulo');