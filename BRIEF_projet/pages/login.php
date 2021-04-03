<?php include "../includes/db.php" ?>
<?php session_start() ?>


<?php     
    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login_message ;

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE user_name = '{$username}'";
        $select_user_query = mysqli_query($connection, $query);
        if (!$select_user_query){
            die("failed". mysqli_error($connection));
        }
        while ($row = mysqli_fetch_array($select_user_query)){
            $db_user_id = $row['user_id'];
            $db_user_firstname = $row['user_first_name'];
            $db_user_lastname = $row['user_last_name'];
            $db_user_name = $row['user_name'];
            $db_user_password = $row['user_pass'];
            $db_user_mail = $row['user_email'];
            $db_user_role = $row['user_role'];
        }
        if ($username === $db_user_name && password_verify($password, $db_user_password)){
            $_SESSION['username'] = $db_user_name;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['userrole'] = $db_user_role;

            header("Location: dashboard.php");

        } else{
            $login_message = "Invalid username or password ! Try again";
            echo "<h3 id='login_error'>{$login_message}</h3>";
            header("Location:login.php");

        }


    }
?>

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
            <h3 style="color:white;"id="login_error"></h3>
            
        </div>
        <div class="container__login">
            <div class="container__left">
                
            </div>
            <div class="container__right">
                <div class="form_box">
                    <form action="login.php" method="post">
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
