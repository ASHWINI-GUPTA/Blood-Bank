<?php
/**
 * Created by PhpStorm.
 * User: Ashwini
 * Date: 2/7/18
 */

$role = 'User';
if (!$_GET['id'] == ''){
    $role = $_GET['id'];
}
$title = $role.' '.'Registration Page';
require('config/db.php');
require('layout/header.php');

    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){

		$name = stripslashes($_REQUEST['name']); // removes backslashes
		$name = mysqli_real_escape_string($con,$name); //escapes special characters in a string

        if ($role == 'User'){
            $blood_group = stripslashes($_REQUEST['blood_group']);
            $blood_group = mysqli_real_escape_string($con, $blood_group);
        } else {
            $blood_group = '-';
        }

        $username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username);

		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);

		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");

        $query = "INSERT into `users` (name, username, password, email, role, trn_date, blood_group) 
                  VALUES ('$name', '$username', '".md5($password)."', '$email', '$role' , '$trn_date', '$blood_group')";

        $result = mysqli_query($con,$query);

        if($result){
            echo '<div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Well done!</h4>
                      <p><strong>Aww yeah</strong>, your now Blood Bank member.</p>
                      <hr>
                      <p class="mb-0">Click here to <a href=\'login.php\'>Login</a>.</p>
                  </div>';
        } else {
            echo "Error Occur!";
        }
    }else{
?>
            <div class="col-md-6 offset-3">
                <h3 class="text-center"><?php echo $role?> Registration</h3>
                <hr>
                <?php
                    if ($role == 'User'){
                        echo '<div class="alert alert-info" role="alert">
                                  <strong>Hospital!</strong> follow this <a href="registration.php?id=Hospital">link</a>.
                              </div>';
                    }
                ?>
                <div class="form">
                            <form name="registration" action="" method="post">
                                <input class="form-control" type="text" name="name" placeholder="<?php if ($role == 'Hospital'){ echo 'Hospital Name'; } else { echo 'Name'; }?>" required />
                                <?php if ($role == 'User'){
                                        echo '<label for="blood_group">Select Blood Group</label>
                                                <select class="form-control" id="blood_group" name="blood_group" required>
                                                    <option value="Select">-----Select-----</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>';
                                    }
                                ?>
                                <input class="form-control" type="text" name="username" placeholder="Username" required />
                                <input class="form-control" type="email" name="email" placeholder="Email" required />
                                <input class="form-control" type="password" name="password" placeholder="Password" required />
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="Register" />
                            </form>
                        </div>
            </div>

<?php }

    //include header template
    require('../layout/footer.php');
?>
