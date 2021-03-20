<?php 

$db_server = 'localhost:3307';
$db_user = 'root';
$db_pass = '';
$db_name = 'restaurant';

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_description'];
$product_img = $_POST['product_img'];
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO products( product_name,product_price, product_description, product_img) VALUES('$product_name', $product_price,'$product_desc', '$product_img')";
    if (mysqli_query($connection, $sql)) {
        echo '<h1>new plat added</h1>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}


?>