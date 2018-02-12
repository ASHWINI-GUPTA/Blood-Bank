<?php
/**
 * Created by PhpStorm.
 * User: Ashwini
 * Date: 2/8/18
 */


//TODO: We can populate only indexes which are of User Blood Group type. So the role of Request button will be eliminated.
/*
 * We have User Blood Group, We will get the Blood Group name
 * And compare the User Blood Group and Table Blood group
 * if compare is True Register Button is Enable otherwise Disable
 */

    $title = 'Index Page';
    require('config/db.php');
    require('config/get_info.php');
    require('layout/header.php');
    $int_val = 1;
    $role = $_SESSION['role'];
    $blood_group_user = $_SESSION['blood_group'];
    $success = $_GET['success'];
?>

    <div class="row">
        <div class="col-md-12 text-center">
            <?php
                if($success){
                    echo '<div class=" col-md-4 alert alert-success offset-4" role="alert">
                              Request Sent...
                          </div><br>';
                }
            ?>
            <h2>Available records in Blood Bank</h2><br>
            <?php if ($role == 'User'){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Your blood type is <strong> ( ';
                echo $blood_group_user;
                echo ' )</strong>. Currently, You can only request blood group of you blood type from any Hospital.</div>';
            } ?>

        </div>
    </div><br>

<?php

//Retrieving the value from blood_index table
$result = mysqli_query($con,"SELECT * FROM blood_index");
//echo '<form action="POST">';
    echo '<table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Blood Type</th>
                    <th>Hospital Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                        echo '<th scope="row">'.$int_val.'</th>';
                        echo "<td>" . $row['blood_group'] . "</td>";
                        echo "<td>" . $row['hospital_name'] . "</td>";
                        if ($role == 'Hospital'){
                            echo '<td><a class="btn btn-warning disabled" role="button" aria-disabled="true"  href="request_blood.php?id='.$row['id'].' ">Request</a></td>';
                        } elseif ($role == 'User') {
                            if ($blood_group_user == $row['blood_group']) {
                                echo '<td><a class="btn btn-primary" role="button" href="request_blood.php?id=' . $row['id'] . '">Request</a></td>';
                            } else {
                                echo '<td><a class="btn btn-warning disabled" role="button" aria-disabled="true"  href="request_blood.php?id='.$row['id'].' ">Request</a></td>';
                            }
                        } else {
                            echo '<td><a class="btn btn-primary" role="button" href="request_blood.php?id=' . $row['id'] . '">Request</a></td>';
                        }
                    echo "</tr>";

                    $int_val++; //Incrementing the # value in table
                }
        echo "</tbody>";
    echo "</table>";
//echo '</form>';

    //include header template
    require('layout/footer.php');
?>
