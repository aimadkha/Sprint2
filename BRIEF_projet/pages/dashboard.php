<?php include "../includes/db.php" ?>

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
    <!-- <li><a href="dashboard.php">DASHBOARD</a></li> -->
    
    <li><a href="#"><?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ; ?></a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
  

</nav>
<div class="header__toggle">
  <i class="fas fa-bars"></i>
</div>
</header>
    
    <div class="admin__main">
        <h1>Welcome To Admin : <?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ; ?></h1>

        <h3 class="dashboard__heading">EDIT POST</h3>
        <div class="admin__btn">
            <button class="admin__add admin__btnstyle" type="submit"><a href="add_posts.php">ADD PRODUCT</a></button>
            <!-- <button class="admin__update admin__btnstyle" type="submit"><a href="edit.php">EDIT PRODUCT</a></button> -->
            <!-- <button class="admin__delete admin__btnstyle" type="submit">DELETE PRODUCT</button> -->
            <button class="admin__read admin__btnstyle" type="submit"> <a href="view_all_post.php">VIEW ALL POSTS</a></button>
        </div>
    </div>
</body>
</html>