<?php
/**
 * Created by PhpStorm.
 * User: Ashwini
 * Date: 2/7/18
 */

$title = 'Login Page';

require('config/db.php');
require('layout/header.php');

session_start();
// If form submitted, insert values into the database.
    if (isset($_POST['username'])) {

        $username = stripslashes($_REQUEST['username']); // removes backslashes
        $username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Redirect user to dashboard.php
        } else {
            echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }
    else
        {
    ?>

    <div class="col-md-6 offset-3">

        <h3 class="text-center">Login here... </h3>
        <hr>
        <?php if ($_GET['not_login'] == True){
            echo '<div class="alert alert-danger" role="alert">
                      Please <strong>login</strong> before sending request to blood bank.
                  </div>';
        } ?>
        <form action="" method="post" name="login">
            <input class="form-control" type="text" name="username" placeholder="Username" required/>
            <input class="form-control" type="password" name="password" placeholder="Password" required/>
            <input class="btn btn-primary btn-block" name="submit" type="submit" value="Login"/>
        </form>
    </div>

    <?php
        }
        //include header template
        require('layout/footer.php');
    ?>

