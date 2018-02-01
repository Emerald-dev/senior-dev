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
    page ENUM('Home', 'Tombstones & Natural History', 'Nearby Historical Trails', 'About Us') not null,
	dataType ENUM('Large Title', 'Medium Title', 'Small Title', 'Link', 'Paragraph') not null,
    text text  not null
)engine=innodb;




