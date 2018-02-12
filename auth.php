<?php
/**
 * Created by PhpStorm.
 * User: Ashwini
 * Date: 2/8/18
 */

session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

