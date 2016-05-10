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


