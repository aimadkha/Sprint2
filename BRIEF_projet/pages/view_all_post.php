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
    <link rel="stylesheet" href="../css/all.min.css">
    <title>RESTAURANT | View Posts</title>
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
    <li><a href="logout.php">Logout</a></li>
  </ul>
</nav>
<div class="header__toggle">
  <i class="fas fa-bars"></i>
</div>
</header>
<main class="posts">
    <div class="posts__container">
        <table class="posts__table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
<?php 
    $query = "SELECT * FROM products";
    $select_posts = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['product_id'];
        $post_name = $row['product_name'];
        $post_price = $row['product_price'];
        $post_description = $row['product_description'];
        $post_img = $row['product_img'];
        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_name}</td>";
        echo "<td>{$post_price}</td>";
        echo "<td>{$post_description}</td>";
        echo "<td><img src='{$post_img}' class='table__img'></td>";
        echo "<td><a href='view_all_post.php?delete={$post_id}'><i class='fas fa-trash-alt'></i></a></td>";
        echo "<td><a href='edit.php?source=edit&p_id={$post_id}'><i class='fas fa-edit'></i></a></td>";
        echo "</td>";
    }
?>
        </tbody>
        </table>
<?php 

if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];


    $sql_query =  "DELETE FROM products WHERE product_id = $post_id";
    if (mysqli_query($connection, $sql_query)) {
        echo '<h1>Deleted successful</h1>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}


?>
        
    
    </div>

</main>
</body>