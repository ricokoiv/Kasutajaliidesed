--kasutajad
create table t135190_klusers1
(id int(10) unsigned NOT NULL AUTO_INCREMENT,
username varchar(40),
password varchar(30),
fullname varchar(40),
is_oppejoud boolean,
primary key(id),

unique key username (username));


INSERT INTO t135190_klusers1 (username, password, fullname, is_oppejoud)
VALUES ('tudeng', 'parool', 'karl tudeng', false);


--hinded
create table t135190_klgrades2
(id int(10) unsigned NOT NULL AUTO_INCREMENT,
user_id INTEGER NOT NULL,
course_id INTEGER NOT NULL,
description varchar(60),
grade varchar(40),
primary key(id));

INSERT INTO t135190_klgrades2 (user_id, course_id, description, grade)
VALUES ('1','1','Kontrolltöö I','1');

INSERT INTO t135190_klgrades2 (user_id, course_id, description, grade)
VALUES ('4','1','Kontrolltöö I','1');

INSERT INTO t135190_klgrades2 (user_id, course_id, description, grade)
VALUES ('1','2','Kontrolltöö I','5');

INSERT INTO t135190_klgrades2 (user_id, course_id, description, grade)
VALUES ('1','2','Kontrolltöö II','3');

INSERT INTO t135190_klgrades2 (user_id, course_id, description, grade)
VALUES ('3','1','Kontrolltöö I','4');

INSERT INTO t135190_klgrades2 (user_id, course_id, description, grade)
VALUES ('3','1','Praktikum V','4');

INSERT INTO t135190_klgrades2 (user_id, course_id, description, grade)
VALUES ('3','1','Kontrolltöö II','3');




--kursused
create table t135190_klcourses1
(id int(10) unsigned NOT NULL AUTO_INCREMENT,
course varchar(40),
primary key(id));

INSERT INTO t135190_klcourses1 (course)
VALUES ('Loogiline programmeerimine');

INSERT INTO t135190_klcourses1 (course)
VALUES ('Lineaaralgebra');

INSERT INTO t135190_klcourses1 (course)
VALUES ('Algkursus Javas');



--loogilise progemise hinded koos nimedega

select grade, fullname from t135190_klgrades1, t135190_klusers1 where t135190_klgrades1.user_id = t135190_klusers1.id and course_id='1';

--yhe tudengi ained koos hinnetega

select course, grade, description from t135190_klgrades2, t135190_klusers1, t135190_klcourses1 
                  where t135190_klgrades2.user_id = t135190_klusers1.id and user_id='1'
                  and t135190_klgrades2.course_id = t135190_klcourses1.id;
		  
		  select * from t135190_klgrades2, t135190_klusers1, t135190_klcourses1 
                  where t135190_klgrades2.user_id = t135190_klusers1.id and user_id='1"'
                  and t135190_klgrades2.course_id = t135190_klcourses1.id;


--1 paring
select distinct course, course_id from t135190_klgrades2, t135190_klusers1, t135190_klcourses1 
                  where t135190_klgrades2.user_id = t135190_klusers1.id and user_id='1'
                  and t135190_klgrades2.course_id = t135190_klcourses1.id;
		  
--2 paring
select * from t135190_klgrades2 where course_id='1' and user_id='3';


select distinct grade, count(grade) as CountOf from t135190_klgrades2 where course_id='1' and description='Kontrolltöö I' group by grade;

select distinct grade, count(grade) as CountOf from t135190_klgrades2 where course_id='1' and description='Kontrolltöö II' group by grade;






select distinct columnName, count(columnName) as CountOf from tableName group by columnName






