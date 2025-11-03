create database php_project;
use php_project;

create table students (
	id int primary key,
    name varchar(100),
    date date,
    sex enum('M', 'F'),
	cpf varchar(11) unique,
	address varchar(255),
    complement varchar(100),
	cep int,
    nearby varchar(255),
    city varchar(255),
    state varchar(70),
    telephone int unique,
    course_id int,
    
    foreign key(course_id) references courses(id) on delete set null 
);

create table courses(
	id int auto_increment primary key,
    name varchar(100),
    description text,
    release_date date
);

describe students;

insert into students values (
	 1, "test", 2025-02-12, 'M', 123456, "Moro em test, 333", "Casa", 9090, "Bairro Teste", "Cidade Test", "MG", 123423
);

select * from students;