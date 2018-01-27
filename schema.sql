drop database if exists rapids;

create database if not exists rapids;

use rapids;

drop table if exists users;

create table if not exists users(
   id integer primary key auto_increment,
   username varchar(20) unique,
   password varchar(30),
   email varchar(40) unique,
   salt varchar(10)
)engine=innodb;

drop table if exists flora;

create table if not exists flora( 
    id integer not null primary key auto_increment, 
    name varchar(30),
    content mediumtext,
    image mediumtext
)engine=innodb;

drop table if exists tombstones;

create table if not exists tombstones(
    id integer not null primary key auto_increment,
    name varchar(30),
    lat decimal(16,14),
    lon decimal(16,14),
    summary tinytext,
    content mediumtext,
    image mediumtext
)engine=innodb;

drop table if exists general_content;

create table if not exists general_content(
    id integer not null primary key auto_increment,
    title varchar(30),
    content mediumtext
)engine=innodb;

drop table if exists related_destination;

create table if not exists related_destination( 
    id integer not null primary key auto_increment, 
    name varchar(30),
    lat decimal(16,14),
    lon decimal(16,14),
    summary tinytext,
    image mediumtext
)engine=innodb;



