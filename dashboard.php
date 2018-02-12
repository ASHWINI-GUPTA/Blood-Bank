<?php
/**
 * Created by PhpStorm.
 * User: Ashwini
 * Date: 2/8/18
 */

//TODO: Implement Admin Section

    $title = 'Dashboard';

    require('config/db.php');
    include("auth.php"); //include auth.php file on all secure pages
    require('layout/header.php');
    $role = $_SESSION['role'];
    $blood_group = $_SESSION['blood_group'];
?>

<div class="row">
    <div class="col-md-4">
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="asset/life.jpg" alt="Card image cap" >
            <div class="card-block">
                <div style="color: red">WELCOME</div>
                <h4 class="card-title">
                    <?php
                        echo htmlspecialchars($_SESSION['name'], ENT_QUOTES);
                    ?>
                </h4>
                <p class="card-text">
                    Blood Group:
                    <strong>
                    <?php
                        echo $blood_group;
                    ?>
                    </strong><br>
                    Email:
                    <strong>
                    <?php
                        echo $_SESSION['email'];
                    ?>
                    </strong>
                </p>
            </div>
        </div><br>
        <div class="card"  style="width: 20rem;">
            <h4 class="card-header text-center">Notes</h4>
            <div class="card-block">
                <h4 class="card-title">Words from Creator</h4>
                <p class="card-text">This projest is created for the demonstration
                    purpose by Ashwini Gupta <a href="https://www.twitter.com/fnlsg">@fnlsg</a>.<br>
                     - Have following features:
                </p>
                <ul>
                    <li>Registration</li>
                    <li>Search and Request</li>
                    <li>Add blood to Bank</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8 text-center">
        <p class="lead">Important Links</p>
        <hr>
        <?php
            if ($role == 'Hospital'){
                require('dashboard/dashboard_hospital.php');
            } elseif ($role == 'User'){
                require('dashboard/dashboard_user.php');
            }
        ?>

    </div>
</div>

<?php
//include header template
require('layout/footer.php');
?>
