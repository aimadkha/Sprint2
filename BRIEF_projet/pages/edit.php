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
    <!-- <li><a href="login.php">LOGIN</a></li> -->
    <li><a href="dashboard.php">DASHBOARD</a></li>
    
    <li><a href="#"><?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ; ?></a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
  

</nav>
<div class="header__toggle">
  <i class="fas fa-bars"></i>
</div>
</header>
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
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_description'];
    $product_img = $_POST['product_img'];
    $upload_img = $_FILES['product_upload_img']['name'];
    $product_temp = $_FILES['product_upload_img']['tmp_name'];
    if ($upload_img) {
      move_uploaded_file($product_temp, "../images/".$upload_img);
      $sql = "UPDATE products SET product_name = '{$product_name}',product_price = {$product_price}, product_description = '{$product_desc}', product_img = '{$upload_img}' WHERE product_id = '{$product_id}'";
    } else {
      $sql = "UPDATE products SET product_name = '{$product_name}',product_price = {$product_price}, product_description = '{$product_desc}', product_img = '{$product_img}' WHERE product_id = '{$product_id}'";
    }

    // move_uploaded_file($product_temp, "../images/".$upload_img);
    // $sql = "UPDATE products SET product_name = '{$product_name}',product_price = {$product_price}, product_description = '{$product_desc}', product_img = '{$upload_img}' WHERE product_id = '{$product_id}'";
    if (mysqli_query($connection, $sql)) {
        echo '<h1>product updated</h1>';
        header('Location:view_all_post.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

?>
<div class="admin__main">
    <form action="/sprint2/BRIEF_PROJET/pages/edit.php" method="POST" enctype="multipart/form-data">
        <label for="product_name">id</label><br>
        <input value="<?php echo  $post_id; ?>" type="text" name="product_id" id="" class="edit_input" disabled><br>
        <label for="product_name">Edit Name</label><br>
        <input value="<?php echo  $post_name; ?>" type="text" name="product_name" id=""><br>
        <label for="product_name">Edit PRICE</label><br>
        <input value="<?php echo  $post_price; ?>" type="text" name="product_price" id=""><br>
        <label for="product_name">Edit DESCRIPTION</label><br>
        <input value="<?php echo  $post_description; ?>" type="text" name="product_description" id=""><br>
        <label for="product_name">Edit Url Image</label><br>
        <input value="<?php echo  $post_img; ?>" type="text" name="product_img" id=""><br>
        <label for="product_name">Upload IMAGE</label><br>
        <input type="file" name="product_upload_img" id=""><br>
        <input type="submit" value="Edit POST" name="edit">
    </form>
</div>


<script src="../js/app.js"></script>
</body>

</html>