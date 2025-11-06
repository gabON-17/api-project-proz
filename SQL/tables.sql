create database php_project;
use php_project;

create table students (
	id int primary key auto_increment,
    name varchar(100),
    birth date,
    sex enum('M', 'F'),
	cpf varchar(15) unique,
	address varchar(255),
    complement varchar(100),
	cep varchar(10),
    nearby varchar(255),
    city varchar(255),
    state varchar(70),
    telephone varchar(30) unique,
    course_id int,
    createAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    foreign key(course_id) references courses(id) on delete set null 
);

create table teachers (
	id int primary key auto_increment,
    name varchar(100),
    sex enum("M", "F"),
    cpf varchar(15) unique,
    telephone varchar(20) unique,
	createAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

create table courses(
	id int auto_increment primary key,
    name varchar(100),
    description text,
    creation_date date,
    teacher int,
	createAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

describe students;

insert into students values (
	 1, "test", 2025-02-12, 'M', 123456, "Moro em test, 333", "Casa", 9090, "Bairro Teste", "Cidade Test", "MG", 123423
);

drop table students;
select * from students;
