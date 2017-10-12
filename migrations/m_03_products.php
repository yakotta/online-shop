<?php
$db = connect();

// Here is the query to create a new product table
$products=<<<QUERY
    create table if not exists products (
        id int not null auto_increment,
        name varchar(255),
        info varchar(255),
        quantity int default 0,
        
        primary key (id)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

// this will pass the create table query to the function
$db->query($products);