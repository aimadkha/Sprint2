CREATE DATABASE restaurant;

CREATE TABLE users(
user_id int,
user_first_name varchar(255),
user_last_name varchar(255),
user_name varchar(255),
user_pass varchar(255),
user_email varchar(255),
user_role varchar(255),
PRIMARY KEY (user_id)
);

CREATE TABLE products(
product_id int,
product_name varchar(255),
product_price int,
product_description varchar(255),
product_img varchar(255),
PRIMARY KEY (product_id)
);

CREATE TABLE category(
cat_id int,
cat_title varchar(255),
PRIMARY KEY (cat_id)
);

$query = "SELECT * FROM users WHERE user_name = '{$username}'";


$sql = "INSERT INTO products( product_name,product_price, product_description, product_img) 
VALUES('$product_name', $product_price,'$product_desc','$product_img')";


$query = "SELECT * FROM products WHERE product_id = $the_post_id";

$sql = "UPDATE products SET product_name = '{$product_name}',product_price = {$product_price}, product_description = '{$product_desc}', product_img = '{$product_img}' WHERE product_id = '{$product_id}'";

$query = "SELECT * FROM products";

$sql = "INSERT INTO users(user_first_name,user_last_name,user_name,user_pass,user_email,user_role) VALUES('$first_name','$last_name','$user_name','$password','$user_email','user')";

$sql_query =  "DELETE FROM products WHERE product_id = $post_id";
