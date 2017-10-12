<?php
include("resources/library.php");

$url = $_GET["url"];

switch($url){
// Home Page
    case "":
        $template = render_template("templates/page_home.php");
        break;
        
// Admin
    case "admin/config":
        $database = connect();
        $shop_config_list = $database->query("select * from shop_config");
        $template = render_template("templates/admin/shop_config.php", [
            "shop_config_list" => $shop_config_list
        ]);
        break;
        
// Customer Pages
    case "customer/create":
        $template = render_template("templates/customer/create_customer.php");
        break;
    
    case "customer/list":
        $database = connect();
        $customer_list = $database->query("select * from customers");
        $num_customers = $customer_list->num_rows;
        $template = render_template("templates/customer/list_customer.php", [
            "customer_list" => $customer_list,
            "num_customers" => $num_customers
        ]);
        break;
        
    case "customer/details":
        $id = $_GET["id"];
        
        if(empty($id)) {
            redirect("/404");
        }
        
        $database = connect();
        $result = $database->query("select * from customers where id=$id");
        $customer = $result->fetch_assoc();
        
        if ($customer === NULL) {
            redirect("/404");
        }
        
        $template = render_template("templates/customer/details_customer.php", [
            "customer" => $customer
        ]);
        break;
        
// Product Pages
    case "product/create":
        $template = render_template("templates/product/create_product.php");
        break;
        
    case "product/list":
        $database = connect();
        $product_list = $database->query("select * from products");
        $num_products = $product_list->num_rows;
        $template = render_template("templates/product/list_product.php", [
            "product_list" => $product_list,
            "num_products" => $num_products
        ]);
        break;
        
    case "product/details":
        $id = $_GET["id"];
        
        if(empty($id)) {
            redirect("/404");
        }
        
        $database = connect();
        $result = $database->query("select * from products where id=$id");
        $product = $result->fetch_assoc();
        
        if ($product === NULL) {
            redirect("/404");
        }
        
        $template = render_template("templates/product/details_product.php", [
            "product" => $product
        ]);
        break;
        
// API Product End Points
    case "api/product/create":
        include_once("api/product.php");
        $status = check_parameters($_POST, [
            "name", "info", "quantity"
        ]);
        if($status === true) {
            insert_product($_POST);
            redirect("/product/list");
        } else {
            error_log("Failed to create product.");
            redirect("/product/create?error=$status");
        }
        break;
        
    case "api/product/edit":
        include_once("api/product.php");
        $status = check_parameters($_POST, [
            "id", "name", "info", "quantity"
        ]);
        if($status === true) {
            edit_product($_POST);
            redirect("/product/details?id={$_POST['id']}");
        } else {
            error_log("Failed to edit product details.");
            redirect("/product/details?error=$status");
        }
        break;
        
    case "api/product/delete":
        include_once("api/product.php");
        $status = check_parameters($_GET, [
            "id" => [
                "required" => true,
                "type" => "integer",
            ]
        ]);
        
        if($status === true) {
            delete_product($_GET);
            redirect("/product/list");
        } else {
            error_log("Failed to delete product.");
            redirect("/product/details?error=$status");
        }
        break;

// API Customer End Points        
    case "api/customer/create":
        include_once("api/customer.php");
        $status = check_parameters($_POST, [
            "name", "email", "phone"
        ]);
        if($status === true) {
            $customer_id = insert_customer($_POST);
            redirect("/customer/details?id=$customer_id");
        } else {
            error_log("Failed to create customer.");
            redirect("/customer/create?error=$status");
        }
        break;
        
    case "api/customer/edit":
        include_once("api/customer.php");
        $status = check_parameters($_POST, [
            "id", "name", "email", "phone"
        ]);
        if($status === true) {
            edit_customer($_POST);
            redirect("/customer/details?id={$_POST['id']}");
        } else {
            error_log("Failed to edit customer details.");
            redirect("/customer/details?error=$status");
        }
        break;
        
    case "api/customer/delete":
        include_once("api/customer.php");
        $status = check_parameters($_GET, ["id"]);
        
        if($status === true) {
            delete_customer($_GET);
            redirect("/customer/list");
        } else {
            error_log("Failed to delete customer.");
            redirect("/customer/details?error=$status");
        }
        break;

// API Admin End Points        
    case "api/admin/config/create":
        include_once("api/shop_config.php");
        $status = check_parameters($_POST, [
            "field", "value"
        ]);
        
        if($status !== true) {
            error_log("Failed to create new shop attribute.");
            redirect("/admin/config?error=$status");
        }
        
        if(insert_shop_config($_POST) == false) {
            error_log("Failed to create new shop attribute.");
            redirect("/admin/config?error=insert_failure");
            
        };
        
        redirect("/admin/config");
        break;
        
    case "api/admin/config/edit":
        include_once("api/shop_config.php");
        $status = check_parameters($_POST, [
            "id", "field", "value"
        ]);
        if($status === true) {
            edit_shop_config($_POST);
            redirect("/admin/config");
        } else {
            error_log("Failed to edit shop attribute.");
            redirect("/admin/config?error=$status");
        }
        break;
        
    case "api/admin/config/delete":
        include_once("api/shop_config.php");
        $status = check_parameters($_GET, ["id"]);
        
        if($status === true) {
            delete_shop_config($_GET);
            redirect("/admin/config");
        } else {
            error_log("Failed to delete customer.");
            redirect("/admin/config?error=$status");
        }
        break;
        
// Catch-All
    default:
        $template = render_template("templates/404.php", [
            "url" => $url
        ]);
        break;
};

$content = render_template("templates/page_skeleton.php",[
    "content" => $template
]);

print($content);