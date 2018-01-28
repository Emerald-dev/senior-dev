drop database if exists rapids;

create database if not exists rapids;

use rapids;

drop table if exists users;

create table if not exists users(
   id integer not null primary key auto_increment,
   username varchar(20) not null,
   password varchar(30) not null,
   email varchar(40) not null,
   salt varchar(10) not null,
   createPrivilege boolean,
   UNIQUE (email),
   UNIQUE (username)
)engine=innodb;

drop table if exists related_destination;

create table if not exists related_destination( 
    id integer not null primary key auto_increment, 
    name varchar(50) not null,
    lat decimal(16,14) not null,
    lon decimal(16,14) not null,
    link tinytext,
	UNIQUE (name)
)engine=innodb;

drop table if exists tombstones;

create table if not exists tombstones(
    id integer not null primary key auto_increment,
    name varchar(30) not null,
    lat decimal(16,14) not null,
    lon decimal(16,14) not null,
    summary tinytext,
    content mediumtext,
    image mediumtext,
	filter tinytext,
	UNIQUE (name)
)engine=innodb;

drop table if exists general_content;

create table if not exists general_content(
    id integer not null primary key auto_increment,
    page ENUM('Home', 'Flora', 'History', 'Tombstone', 'Destination', 'About') not null,
	dataType ENUM('title', 'subtitle', 'link', 'text') not null,
    content mediumtext  not null
)engine=innodb;




