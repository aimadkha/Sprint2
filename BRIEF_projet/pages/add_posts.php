<?php include "../includes/db.php" ?>

<?php session_start()?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Restaurant | dashboard</title>
</head>

<body>
<header class="header">


    <div class="header__logo">
      <a href="../index.php"><img src="/sprint2/BRIEF_projet/images/logo.svg" alt="" class="header__img" /></a>
    </div>

    <nav class="navbar">
      <ul class="navbar__ul">


        <li><a href="../index.php" class="navbar__ul--active">HOME</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
        <li><a href="login.php">LOGIN</a></li>
        <li><a href="dashboard.php">DASHBOARD</a></li>
        <li><a href="#"><?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ; ?></a></li>
      </ul>
      

    </nav>
    <div class="header__toggle">
      <i class="fas fa-bars"></i>
    </div>
</header>
<div class="main__admin">
<div class="add">
    <form action="/sprint2/BRIEF_PROJET/pages/add_posts.php" method="post" enctype="multipart/form-data" class="add__form">
        <label for="product_name">ADD Name</label><br>
        <input type="text" name="product_name" id="" class="add__input"><br>
        <label for="product_name">ADD PRICE</label><br>
        <input type="text" name="product_price" id=""><br>
        <label for="product_name">ADD DESCRIPTION</label><br>
        <input type="text" name="product_description" id=""><br>
        <!-- <label for="product_name">Add Url Image</label><br>
        <input type="text" name="product_img" id=""><br> -->
        <label for="product_name">Upload IMAGE</label><br>
        <input type="file" name="product_upload_img" id=""><br>
        <input type="submit" value="ADD POST" name='submit'>
    </form>
</div>
</div>

<?php

// $db_server = 'localhost:3307';
// $db_user = 'root';
// $db_pass = '';
// $db_name = 'restaurant';

// $connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_description'];
    // $product_img = $_POST['product_img'];
    $product_upload_img = $_FILES['product_upload_img']['name'];
    $product_img_temp = $_FILES['product_upload_img']['tmp_name'];
    move_uploaded_file($product_img_temp, "../images/".$product_upload_img);
    

    $sql = "INSERT INTO products( product_name,product_price, product_description, product_img) VALUES('$product_name', $product_price,'$product_desc','$product_upload_img')";
    if (mysqli_query($connection, $sql)) {
        echo '<h1>new plat added</h1>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}


?>

<script src="../js/app.js"></script>

</body>

</html>