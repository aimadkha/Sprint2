
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Restaurant | LOGIN</title>
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
    <!-- <li><a href="dashboard.php">DASHBOARD</a></li> -->
  </ul>
  

</nav>
<div class="header__toggle">
  <i class="fas fa-bars"></i>
</div>
</header>
   
    <main class="login">
        <div class="title">
            <h1 class="title__heading">Sign Up Form</h1>
        </div>
        <div class="container__login">
            <div class="container__left">
                
            </div>
            <div class="container__right">
                <div class="form_box">
                    <form action="display.php" method="post">
                        <p>Username</p>
                        <input type="text" name="username" placeholder="username">
                        <p>Password</p>
                        <input type="password" name="password" placeholder="*******">
                        <input type="submit" value="Log In" name="login">
                        <a href="registre.php">Registre</a>
                    </form>
                </div>
            </div>
        </div>
    </main>

    
    
    <script src="./js/app.js"></script>
</body>
</html>