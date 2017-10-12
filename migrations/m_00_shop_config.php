<?php
$db = connect();

$shop_config=<<<QUERY
    create table if not exists shop_config (
        id int not null auto_increment,
        field varchar(255),
        value varchar(255),
        
        primary key (id)
    ) Engine=InnoDB, CHARACTER SET UTF8;
QUERY;

$db->query($shop_config);