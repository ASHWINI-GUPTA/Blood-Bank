<?php
/**
 * Created by PhpStorm.
 * User: Ashwini
 * Date: 2/8/18
 * Time: 6:56 PM
 */

require('config/db.php');
//require ('auth.php');
require ('config/get_info.php');
require('layout/header.php');

$user_id = $_SESSION['id'];
$user_name = $_SESSION['name'];
$user_email = $_SESSION['email'];
$id = $_GET['id'];

session_start();
if (!isset($_SESSION["username"])) {
        header("Location: login.php?not_login=True");
        exit();
} else {

    $fetch_query = "SELECT hospital_id, hospital_name, blood_group  
                                             FROM blood_index 
                                             WHERE  id = $id";

    $fetch_result = mysqli_query($con, $fetch_query);

    $fetch_row = mysqli_fetch_array($fetch_result);

    $hospital_name = $fetch_row['hospital_name'];
    $hospital_id = $fetch_row['hospital_id'];
    $blood_group = $fetch_row['blood_group'];

    $query = "INSERT into `request_table` (user_id, blood_id, user_name, email, blood_group, hospital_name, hospital_id) 
                  VALUES ('$user_id', '$id', '$user_name', '$user_email', '$blood_group', '$hospital_name', '$hospital_id' )";

    $result = mysqli_query($con, $query);

    if($result){
        header("Location: index.php?success=True");
    }
    else{
        echo "<h2>Something Went Wrong :-)</h2>";
    }
}

//include header template
require('layout/footer.php');
