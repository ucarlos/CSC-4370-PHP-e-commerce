/* -----------------------------------------------------------------------------
 * Created by Ulysses Carlos for CSC 4370 Project 4 -- 12/11/2019
 *
 * Note
 *     Please make sure that you import? this file using whatever system you
 *     have. As I have XAMPP, it's as simple as opening /localhost/phpmyadmin
 *     and importing both this file and db_populate (IN THIS ORDER).
 *     
 * -----------------------------------------------------------------------------
 */
create database Project;
use Project; 

create table if not exists users (
    id int(8) not null auto_increment,
    user_name varchar(30) not null,
    first_name varchar(30) not null,
    last_name varchar(30) not null,
    email varchar(60) not null,
    password varchar(40) not null,
    primary key (id),
    unique key email (email)
);

create table if not exists inventory (
    id int(8) not null auto_increment,
    item_name varchar(50) not null,
    price int(4) not null,
    quantity int(2) not null,
    owner_id int(8) not null,
    primary key (id)
);

create table if not exists user_order (
	id int(8) not null auto_increment,
    item_name varchar(50) not null,
    price int(4) not null, 
    orderer_name varchar(50) not null,
    quantity int(8) not null,
    orderer_id int(8) not null, 
    primary key (id)
);

create table if not exists planes(
    id int(8) not null auto_increment,
    name varchar(30) not null,
    capacity int(3) not null,
    owner varchar(40) not null,
    primary key (id)
);


create table if not exists flight(
    id int(8) not null auto_increment,
    class_name varchar(30) not null,
    capacity int(2) not null,
    plane_type varchar(30) not null,
    price int(3),
    primary key (id)

);

create table if not exists parking_lots(
    id int(8) not null auto_increment,
    name varchar(30) not null,
    capacity int(2) not null,
    price int(3),
    primary key (id)
);