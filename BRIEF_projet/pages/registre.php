<?php include "../includes/db.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Restaurant | Sign In</title>
</head>
<body>
<?php 

if (isset($_POST['registre'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $user_name = $_POST['username'];
    $user_email = $_POST['useremail'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    // $hashed_pass = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(user_first_name,user_last_name,user_name,user_pass,user_email,user_role) VALUES('$first_name','$last_name','$user_name','$password','$user_email','user')";
    if (mysqli_query($connection, $sql)) {
        echo '<h1>new user added</h1>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

}

?>
   
    <main class="login">
        <div class="title">
            <h1 class="title__heading">Sign In Form</h1>
        </div>
        <div class="container__login">
            <div class="container__left">
            </div>
            <div class="container__right">
                <div class="form_box">
                    <form action="registre.php" method="post">
                        <p>First Name</p>
                        <input type="text" name="firstname" placeholder="First Name">
                        <p>Last Name</p>
                        <input type="text" name="lastname" placeholder="Last Name">
                        <p>Username</p>
                        <input type="text" name="username" placeholder="username">
                        <p>Email</p>
                        <input type="email" name="useremail" placeholder="email">
                        <p>Password</p>
                        <input type="password" name="password" placeholder="*******">
                        <input type="submit" value="Registre" name="registre">
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>