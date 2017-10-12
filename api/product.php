<?php
function insert_product($datasource) 
{
$query=<<<QUERY
    insert into products set
        name = "{$datasource["name"]}",
        info = "{$datasource["info"]}",
        quantity = "{$datasource["quantity"]}"
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

function edit_product($datasource) 
{
$query=<<<QUERY
    update products set
        name = "{$datasource["name"]}",
        info = "{$datasource["info"]}",
        quantity = "{$datasource["quantity"]}"
        
    where id = "{$datasource["id"]}"
QUERY;

    $db = connect();
    return $db->query($query);
}

function delete_product($datasource) 
{
    $db = connect();
    $query = "delete from products where id='{$datasource["id"]}'";
    return $db->query($query);
}