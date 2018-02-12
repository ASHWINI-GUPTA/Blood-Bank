<?php
    /**
     * Created by PhpStorm.
     * User: Ashwini
     * Date: 2/8/18
     */

    $con = mysqli_connect("localhost", "root", "Ash", "Test");
// Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
