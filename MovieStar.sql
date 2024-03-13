create database moviestar;
use moviestar;
delete from movies where id='11';


UPDATE `moviestar`.`users` SET `name` = 'Pedro' WHERE (`id` = '1');
select * from users;
delete from users;

CREATE TABLE users(
id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
lastname VARCHAR(100),
email VARCHAR(120),
password VARCHAR(200),
image VARCHAR(200),
token VARCHAR(200),
bio TEXT
);

select * from movies;


CREATE TABLE movies(
id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(120),
description TEXT,
image VARCHAR(200),
trailer VARCHAR(150),
category VARCHAR(50),
length VARCHAR(45),
users_id INT(12) UNSIGNED,
FOREIGN KEY(users_id) REFERENCES users(id)
);

CREATE TABLE reviews(
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
rating INT,
review TEXT,
users_id INT(11) UNSIGNED,
movies_id INT(11) UNSIGNED,
FOREIGN KEY(users_id) REFERENCES users(id),
FOREIGN KEY(movies_id) REFERENCES movies(id)
);