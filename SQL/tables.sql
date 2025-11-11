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
    createAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

create table teachers (
	id int primary key auto_increment,
    teacher_name varchar(100),
    sex enum("M", "F"),
    cpf varchar(15) unique,
    telephone varchar(20) unique,
	createAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

create table courses(
	id int auto_increment primary key,
    name varchar(100) unique,
    description text,
    teacher_id int,
	createAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    foreign key(teacher_id) references teachers(id) on delete set null 
);

create table register(
	register_number varchar(5) primary key,
	student_id int,
	course_id int,
	createAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

describe teachers;

drop table php_project.students;
DROP TABLE php_project.teachers;
DROP TABLE php_project.courses;

select * from students;
select * from teachers;
select * from courses;
select * from register;
select c.name, c.description , c.creation_date , t.teacher_name from courses c join teachers t on c.teacher_id = t.id;

DELETE FROM php_project.students
WHERE id=3;