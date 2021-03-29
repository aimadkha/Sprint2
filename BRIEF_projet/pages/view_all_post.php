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
    <title>RESTAURANT | View Posts</title>
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

<main class="posts">
    <h1>Welcome To Admin</h1>

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
        echo "<td><a href='view_all_post.php?delete={$post_id}'>Delete</a></td>";
        echo "<td><a href='edit.php?source=edit&p_id={$post_id}'>update</a></td>";
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