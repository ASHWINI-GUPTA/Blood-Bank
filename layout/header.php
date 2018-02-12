<?php
    include("config/get_info.php"); //include for getting user info
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if (isset($title)) {
            echo $title;
        } ?></title>
    <!--    CND Link-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!--    Local Path-->
    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-light navbar-expand-lg fixed-top navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="index.php">Blood Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php
                    if (!isset($_SESSION["username"])) {
                        echo '<li class="nav-item">
                                      <a href="login.php" class="nav-link" role="button">Login</a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="registration.php?id=User" class="nav-link" role="button">User Register</a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="registration.php?id=Hospital" class="nav-link" role="button">Hospital Register</a>
                                  </li>                                                  
                                  ';
                    }
                    if (isset($_SESSION["username"])) {
                        if ($_SESSION["role"] == 'Hospital') {
                            echo '<li class="nav-item">
                                        <a href="dashboard.php" class="nav-link" role="button">Dashboard</a>
                                      </li>';

                            echo '<li class="nav-item">
                                        <a href="add_blood_form.php" class="nav-link" role="button">Add Record | </a>
                                      </li>';
                        } elseif ($_SESSION["role"] == 'User') {
                            echo '<li class="nav-item">
                                        <a href="dashboard.php" class="nav-link" role="button">Dashboard | </a>
                                      </li>';
                        }
                        echo '<li class="nav-item">
                                      <a href="logout.php" class="btn btn-primary" role="button">Logout</a>
                                  </li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!--    Nav End-->

<div class="container">
