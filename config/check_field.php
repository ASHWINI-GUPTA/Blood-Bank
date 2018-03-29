<?php
    /**
     * Created by PhpStorm.
     * User: ashwini
     * Date: 3/28/18
     * Time: 11:48 AM
     */
require('db.php');

#Checking for Username
if(!empty($_POST["username"])) {

    $username = $_POST["username"];

    $check_username = "SELECT username FROM `users` WHERE username = '$username'";

    $res_u = mysqli_query($con, $check_username);

    if (mysqli_num_rows($res_u) > 0 ) {
        echo "True";
    } else {
        echo "False";
    }
}

#Checking for Email
if(!empty($_POST["email"])) {

    $email = $_POST["email"];

    $check_email = "SELECT email FROM `users` WHERE email = '$email'";

    $res_e = mysqli_query($con, $check_email);

    if (mysqli_num_rows($res_e) > 0 ) {
        echo "True";
    } else {
        echo "False";
    }
}