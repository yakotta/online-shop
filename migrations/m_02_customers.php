<?php
$db = connect();

// Here is the query to create a new customer table
$customers=<<<QUERY
    create table if not exists customers (
        id int not null auto_increment,
        name varchar(255),
        email varchar(255),
        phone varchar(64),
        
        primary key (id)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

// this will pass the create table query to the function
$db->query($customers);