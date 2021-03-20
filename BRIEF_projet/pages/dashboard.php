<?php include "../includes/db.php" ?>

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
            <img src="/sprint2/BRIEF_projet/images/logoB.svg" alt="" class="navbar__img" />
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
        <h1>welcome admin</h1>
        <?php
        echo $_SESSION['username'];

        ?>
        <h3 class="dashboard__heading">EDIT POST</h3>
        <div class="admin__btn">
            <button class="admin__add admin__btnstyle" type="submit"><a href="add_posts.php">ADD PRODUCT</a></button>
            <button class="admin__update admin__btnstyle" type="submit">EDIT PRODUCT</button>
            <button class="admin__delete admin__btnstyle" type="submit">DELETE PRODUCT</button>
            <button class="admin__read admin__btnstyle" type="submit"> <a href="posts.php">VIEW ALL POSTS</a></button>
        </div>
    </div>

</body>

</html>