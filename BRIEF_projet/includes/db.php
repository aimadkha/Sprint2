<?php

$db_server = 'localhost:3307';
$db_user = 'root';
$db_pass = '';
$db_name = 'restaurant';

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if ($connection) {
    echo "DB connected";
}
else {
    echo 'error';
}

?>