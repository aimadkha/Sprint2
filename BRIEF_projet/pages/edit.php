<?php include "../includes/db.php" ?>
<?php ob_start() ?>
<?php session_start()?>

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
        <a href="../index.php"><img src="/sprint2/BRIEF_projet/images/logoB.svg" alt="" class="navbar__img"/></a>
    </div>
    <ul class="dashboard__ul">
        <li><a href="../index.php">HOME</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
    </ul>
    <div class="dashboard__profile">
        <a href="#"><img src="/sprint2/BRIEF_projet/images/admin.png" alt="admin" class="dashboard__img"></a>
        <h6><?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ; ?></h6>

    </div>
</div>
<?php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
    echo $the_post_id ;
    $query = "SELECT * FROM products WHERE product_id = $the_post_id";
    $select_posts = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['product_id'];
        $post_name = $row['product_name'];
        $post_price = $row['product_price'];
        $post_description = $row['product_description'];
        $post_img = $row['product_img'];
    
    }
}

if (isset($_POST['edit'])) {
    echo "hello";
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_description'];
    $product_img = $_POST['product_img'];
    $sql = "UPDATE products SET product_name = '{$product_name}',product_price = {$product_price}, product_description = '{$product_desc}', product_img = '{$product_img}' WHERE product_id = '{$product_id}'";
    if (mysqli_query($connection, $sql)) {
        echo '<h1>product updated</h1>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

?>
<div class="admin__main">
    <form action="/sprint2/BRIEF_PROJET/pages/edit.php" method="POST" enctype="multipart/form-data">
        <label for="product_name">id</label><br>
        <input value="<?php echo  $post_id; ?>" type="text" name="product_id" id=""><br>
        <label for="product_name">Edit Name</label><br>
        <input value="<?php echo  $post_name; ?>" type="text" name="product_name" id=""><br>
        <label for="product_name">Edit PRICE</label><br>
        <input value="<?php echo  $post_price; ?>" type="text" name="product_price" id=""><br>
        <label for="product_name">Edit DESCRIPTION</label><br>
        <input value="<?php echo  $post_description; ?>" type="text" name="product_description" id=""><br>
        <label for="product_name">Edit Url Image</label><br>
        <input value="<?php echo  $post_img; ?>" type="text" name="product_img" id=""><br>
        <!-- <label for="product_name">Upload IMAGE</label><br>
        <input type="file" name="product_upload_img" id=""><br> -->
        <input type="submit" value="Edit POST" name="edit">
    </form>
</div>



</body>

</html>