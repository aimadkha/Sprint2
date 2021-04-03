<?php include "./includes/db.php" ?>
<?php session_start()  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/all.min.css">
  <title>Youcode | Restaurant</title>
</head>

<body>
  <header class="header">


    <div class="header__logo">
      <a href="#"><img src="/sprint2/BRIEF_projet/images/logo.svg" alt="" class="header__img" /></a>
    </div>

    <nav class="navbar">
      <ul class="navbar__ul">


        <li><a href="#" class="navbar__ul--active">HOME</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
        <li><a href="./pages/login.php">LOGIN</a></li>
        <li id="nav__drop"><a href="#"><?php echo $_SESSION['firstname']." ". $_SESSION['lastname'] ; ?></a>
          <div class="navbar__content">
          <a href="./pages/dashboard.php">Dashboard</a>
          <a href="./pages/logout.php">Log Out</a>
          </div>
        </li>
        
      </ul>

    </nav>
    <div class="header__toggle">
      <i class="fas fa-bars"></i>
    </div>
  </header>
  <div class="clear"></div>
  <div class="home">
    <div class="home__content">
      <h1 class="home__title">OUR OFFERED MENU</h1>
      <p class="home__text">
        Lorem Ipsum is simply dummy text of the printing and typesetting
      </p>
    </div>
  </div>

  <div class="clear"></div>

  <main class="main">

    <p class="main__heading">Most loved dishes</p>
    <div class="menu">
      
      <?php 
            $sql_query_select = "SELECT * FROM products LIMIT 14 ";
            $result = mysqli_query($connection, $sql_query_select);
            
              while ($row = mysqli_fetch_assoc($result)) {
                $name_product = $row['product_name'];
                $desc_product = $row['product_description'];
                $price_product = $row['product_price'];
                $img_product = $row['product_img'];
                echo '<div class="menu__card">';
                echo "<img src='/sprint2/BRIEF_PROJET/images/$img_product' alt='' class='menu__img'>";
                
                echo '<div class="menu__content">';
                echo '<p class="menu__text">';
                echo '<span class="menu__name">'. $name_product. '</span><br>';
                echo '<span class="menu__price">'. $price_product .' DH</span><br>';
                
                 echo '</p>';
                 echo '<button type="submit" class="submit">Order now</button>';
                 echo '</div>';
              echo '</div>';
              }
            
          
          ?>

    </div>
  </main>
  

  <footer class="footer">
    <div class="contact">
      <div class="contact__info">
        <img src="/sprint2/BRIEF_projet/images/logoB.svg" alt="logo" class="contact__logo">
        <div class="contact__local">
          <i class="fas fa-map-marker-alt"></i>
          <p class="contact__desc">Lorem ipsum dolor sit amet ipsum dolor.</p>
        </div>
        <div class="contact__phone">
          <i class="fas fa-phone-alt"></i>
          <p class="contact__num">
            +212-65465765465
          </p>
        </div>
        <div class="contact__mail">
          <i class="fas fa-envelope"></i>
          <p class="contact__gmail">
            example@gmail.com
          </p>
        </div>
      </div>
      <div class="contact__socmedia">
        <h3 class="contact__heading">
          FOLLOW US
        </h3>
        <div class="contact__icons">
          <a href=""><i class="fab fa-facebook"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <div class="copyright">
    <p class="copyright__text">
      Copyright ©2021 All rights reserved | Youcode
    </p>

  </div>


  <script src="./js/app.js"></script>
</body>

</html>