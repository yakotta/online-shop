<?php
function insert_customer($datasource) 
{
$query=<<<QUERY
    insert into customers set
        name = "{$datasource["name"]}",
        email = "{$datasource["email"]}",
        phone = "{$datasource["phone"]}"
QUERY;

    $db = connect();
    $result = $db->query($query);
    $last_id = $db->insert_id;
    
    if ($result === true) {
        return $last_id;
    } else {
        return $result;
    }
}

function edit_customer($datasource) 
{
$query=<<<QUERY
    update customers set
        name = "{$datasource["name"]}",
        email = "{$datasource["email"]}",
        phone = "{$datasource["phone"]}"
        
    where id = "{$datasource["id"]}"
QUERY;

    $db = connect();
    $result = $db->query($query);
    return($result);
}

function delete_customer($datasource) 
{
    $db = connect();
    $query = "delete from customers where id='{$datasource["id"]}'";
    return $db->query($query);
}