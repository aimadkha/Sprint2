<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Restaurant | dashboard</title>
</head>

<body>
<div class="container">
    <div class="dashboard__logo">
        <img src="/sprint2/BRIEF_projet/images/logoB.svg" alt="" class="navbar__img"/>
    </div>
    <ul class="dashboard__ul">
        <li><a href="#">HOME</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
    </ul>
    <div class="dashboard__profile">
        <a href="#"><img src="/sprint2/BRIEF_projet/images/admin.png" alt="admin" class="dashboard__img"></a>
    </div>
</div>
<div class="admin__main">
    <form action="/sprint2/BRIEF_PROJET/pages/add_posts.php" method="post">
        <label for="product_name">ADD Name</label><br>
        <input type="text" name="product_name" id=""><br>
        <label for="product_name">ADD PRICE</label><br>
        <input type="text" name="product_price" id=""><br>
        <label for="product_name">ADD DESCRIPTION</label><br>
        <input type="text" name="product_description" id=""><br>
        <label for="product_name">ADD IMAGE</label><br>
        <input type="text" name="product_img" id=""><br>
        <input type="submit" value="ADD POST" name='submit'>
    </form>
</div>
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
    $sql = "INSERT INTO products( product_name,product_price, product_description, product_img) VALUES('$product_name', $product_price,'$product_desc','$product_img')";
    if (mysqli_query($connection, $sql)) {
        echo '<h1>new plat added</h1>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}


?>

</body>

</html>