<?php
    /**
     * Created by PhpStorm.
     * User: Ashwini
     * Date: 2/8/18
     */

    require('config/db.php');

    session_start();
    if (isset($_SESSION["username"])) {
        $result = $con->query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
        $row = $result->fetch_assoc();
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['blood_group'] = $row['blood_group'];
    }