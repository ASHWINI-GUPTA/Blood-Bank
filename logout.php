<?php
/**
 * Created by PhpStorm.
 * User: Ashwini
 * Date: 2/7/18
 */

    session_start();
    if(session_destroy()) // Destroying All Sessions
    {
        header("Location: index.php"); // Redirecting To Home Page
    }