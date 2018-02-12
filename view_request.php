<?php
/**
 * Created by PhpStorm.
 * User: Ashwini
 * Date: 2/8/18
 */
    $title = 'View Request';
    require ('config/db.php');
    require ('layout/header.php');
    require ('config/get_info.php');
    $id = $_SESSION['id'];
    $int_val = 1;
?>

<div class="row">
    <div class="col-lg-12 text-center">
        <h2 class="mt-5">Requests</h2>
    </div>
</div><br>

<?php

//TODO: Remove the duplicate row from the request_table and find those values from user table using FOREIGN KEY

//Retrieving the value from blood_index table
$result = mysqli_query($con,"SELECT user_name, blood_group, user_id, email FROM request_table WHERE hospital_id = $id ");

echo '<table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Blood Type</th>
                    <th>Person Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>';

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo '<th scope="row">'.$int_val.'</th>';
                echo "<td>" . $row['blood_group'] . "</td>";
                echo "<td>" . $row['user_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";

                $int_val++; //Incrementing the # value in table
            }
            echo "</tbody>";
        echo "</table>";

//include header template
require('layout/footer.php');
?>
