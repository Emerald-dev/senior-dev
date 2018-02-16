drop database if exists rapids;

create database if not exists rapids;

use rapids;

drop table if exists users;

create table if not exists users(
   id integer not null primary key auto_increment,
   username varchar(20) not null,
   password varchar(64) not null,
   email varchar(40) not null,
   salt varchar(10) not null,
   createPrivilege boolean DEFAULT FALSE,
   UNIQUE (email),
   UNIQUE (username)
)engine=innodb;

drop table if exists pins;

create table if not exists pins(
    id integer not null primary key auto_increment,
    name varchar(30) not null,
    lat decimal(16,14) not null,
    lon decimal(16,14) not null,
    summary tinytext,
    content mediumtext,
    image mediumtext,
	filters tinytext,
	UNIQUE (name)
)engine=innodb;

drop table if exists content;

create table if not exists content(
    id integer not null primary key auto_increment,
    page ENUM('Home', 'Tombstones_&_Natural_History', 'Nearby_Historical_Trails', 'About_Us') not null,
	dataType ENUM('Large_Title', 'Medium_Title', 'Small_Title', 'Link', 'Image', 'Paragraph') not null,
    text longtext  not null
)engine=innodb;




