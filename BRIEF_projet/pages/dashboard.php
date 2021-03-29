<?php include "../includes/db.php" ?>
<?php ob_start() ?>
<?php session_start()?>
<?php
if (isset($_SESSION['userrole'])){
    if ($_SESSION['userrole'] !== "admin") {
        header("Location:../index.php");
    }

}
if (!isset($_SESSION['userrole'])){
        header("Location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Restaurant | dashboard</title>
</head>

<body>
    <div class="container">
        <div class="dashboard__logo">
           <a href="../index.php"> <img src="/sprint2/BRIEF_projet/images/logoB.svg" alt="" class="navbar__img" /></a>
        </div>
        <ul class="dashboard__ul">
            <li><a href="../index.php">HOME</a></li>
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">CONTACT</a></li>
        </ul>
        <div class="dashboard__profile">
            <a href="#"><img src="/sprint2/BRIEF_projet/images/admin.png" alt="admin" class="dashboard__img"></a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="admin__main">
        <h1>Welcome To Admin : <?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ; ?></h1>

        <h3 class="dashboard__heading">EDIT POST</h3>
        <div class="admin__btn">
            <button class="admin__add admin__btnstyle" type="submit"><a href="add_posts.php">ADD PRODUCT</a></button>
            <button class="admin__update admin__btnstyle" type="submit"><a href="edit.php">EDIT PRODUCT</a></button>
            <button class="admin__delete admin__btnstyle" type="submit">DELETE PRODUCT</button>
            <button class="admin__read admin__btnstyle" type="submit"> <a href="view_all_post.php">VIEW ALL POSTS</a></button>
        </div>
    </div>
</body>
</html>