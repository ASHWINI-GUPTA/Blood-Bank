<?php
/**
 * Created by PhpStorm.
 * User: Ashwini
 * Date: 2/8/18
 */

$title = 'Blood Form';

require('config/db.php');
include("auth.php"); //include auth.php file on all secure pages
include("config/get_info.php"); //include for getting user info
require('layout/header.php');

//TODO: User can also able to add Blood sample to blood bank

    if (isset($_POST['blood_group'])) { // && ($_POST['role']=='Hospital')

        $blood_group = stripslashes($_REQUEST['blood_group']);
        $blood_group = mysqli_real_escape_string($con, $blood_group); //escapes special characters in a string

        $hospital_name = $_SESSION['name'];
        $hospital_id = $_SESSION['id'];

        //Inserting data into blood_index
        $query = "INSERT into `blood_index` (blood_group, hospital_name, hospital_id) VALUES ('$blood_group', '$hospital_name', '$hospital_id')";
        $result = mysqli_query($con,$query);
        if($result) {
            echo '<div class="alert alert-success" role="alert">
                     Record successfully added!
                  </div>';
        }
    }
?>
    <div class="col-md-6 offset-3">
        <h2 class="text-center">Add sample to Blood Bank</h2><hr>
        <form name="blood_index" action="" method="post">
            <div class="form-group">
                <label for="blood_group">Select Blood Group</label>
                <select class="form-control" id="blood_group" name="blood_group" required>
                    <option value="Select">-----Select-----</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

<?php
//include header template
require('layout/footer.php');
?>
