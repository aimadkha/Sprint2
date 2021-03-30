<?php include "../includes/db.php" ?>

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
<?php 

if (isset($_GET['source'])) {
    $source = $_GET['source'];
}
else {
    $source ='';
}
switch ($source) {
    case 'add_posts':
        include 'add_posts.php';
        break;
    case 'edit':
        include 'edit.php';
        break;
    
    
    default:
        include 'view_all_post.php';
        break;
}
?>
<!-- <main class="posts">
    <h1>Welcome To Admin</h1>

    <div class="posts__container">

        <table class="posts__table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>author</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>description</th>
                    <th>image</th>
                    <th>date</th>
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
        echo "<td>{$post_name}</td>";
        echo "<td>{$post_price}</td>";
        echo "<td>{$post_description}</td>";
        echo "<td><img src='{$post_img}' class='table__img'></td>";
        echo "<td></td>";
        echo "</td>";



    }


?> -->
            </tbody>
        </table>
        
    
    </div>

</main>
</body>