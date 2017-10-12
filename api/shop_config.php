<?php
function insert_shop_config($datasource) 
{
    $field = get_shop_config($datasource["field"]);
    
    if(!empty($field)) {
        return false;
    }
    
$query=<<<QUERY
    insert into shop_config set
        field = "{$datasource["field"]}",
        value = "{$datasource["value"]}"
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

function edit_shop_config($datasource) 
{
$query=<<<QUERY
    update shop_config set
        field = "{$datasource["field"]}",
        value = "{$datasource["value"]}"
        
    where id = "{$datasource["id"]}"
QUERY;

    $db = connect();
    $result = $db->query($query);
    return($result);
}

function delete_shop_config($datasource) 
{
    $db = connect();
    $query = "delete from shop_config where id='{$datasource["id"]}'";
    return $db->query($query);
}

function get_shop_config($field) 
{
    $db = connect();
    $query = "select value from shop_config where field='$field'";
    $result = $db->query($query);
    $config = $result->fetch_assoc();
    return $config["value"];
}