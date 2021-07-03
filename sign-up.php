<?php

// to clear the stored catche
clearstatcache();


// session has been started
session_start();


// If the user is logged in then this will page will get redirected to index.php and @ is stoping to show error!
if (@$_SESSION['user_key']) {
    header("location:index.php");
}


// include contains connect.php file which is connected to our database has
//  Every query related to SQL is in object oriented manner stored in connect.php file
include 'include/connect.php';


// Variables starting with $p_h_ contains error messages all sign up inputs for placeholders
$p_h_fname = "First Name";
$p_h_lname = "Last Name";

$p_h_email = "E-mail";
$p_h_psswrd = "Password";
$p_h_Cf_psswrd = "Confirm Password";

// These Variables are storing information from the Post Method
$fname = $lname = $email = $psswrd = $Cf_psswrd = "";

// Variables starting with $p_h_c_ contains css-class Value which gives red color to placeholders
$p_h_c_fname = $p_h_c_lname = $p_h_c_email = $p_h_c_psswrd = $p_h_c_Cf_psswrd = "";


// To check if $post is set or not
if (isset($_POST['Submit_signup'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $email = $_POST['email'];
    $psswrd = $_POST['psswrd'];
    $Cf_psswrd = $_POST['Cf_psswrd'];


    // checking If the first name input is empty or not     
    if ($fname == '') {

        $fname = "";

        $p_h_fname = "Enter Your First Name";

        $p_h_c_fname = "your-class";
    }

    // Validating the Email and showing error in Email Input
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $email = "";

        $p_h_email = "Enter a valid Email-Address";

        $p_h_c_email = "your-class";
    }

    // Validating the password having At least 8 characters and 1 digit
    // and showing error in password Input
    if (!preg_match("/^[a-z0-9]{6,}$/", $psswrd)) {

        $psswrd = "";

        $p_h_psswrd = "At least 6 characters";

        $p_h_c_psswrd = "your-class";
    }

    // Checking if the confirm password value is equal to Password Input or not      
    if ($Cf_psswrd !== $psswrd) {

        $Cf_psswrd = "";

        $p_h_Cf_psswrd = "Password Does not Match";

        $p_h_c_Cf_psswrd = "your-class";
    }


    //Starting the sign up Process if every data enteres is correctly
    if ($fname !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-z0-9]{6,}$/", $psswrd) && $Cf_psswrd == $psswrd) {

        // Combining Firstname and lastname    
        $fullName = $fname . " " . $lname;

        // Launching check_email Method from the $server_Obj object from the connect.php file 
        $num_email = $server_Obj->check_email($email);

        if ($num_email == 0) {

            // session_start();

            // Storing the signup Information in a session variable as an array
            $_SESSION['new_user'] =  array($fullName, $psswrd, $email);

            // Redirecting the page to username_set.php where the New User will set its unique Username  
            header("location:username_set.php");
        } else if ($num_email == 1) {

            // Error Message if the user email already exits in the Database            
            $email = "";

            $p_h_email = "Email has already taken";

            $p_h_c_email = "your-class";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sahitya Social Site</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Your custom styles (New) -->
    <link href="scss new/signup.css?v=<?php echo time(); ?>" rel="stylesheet">

</head>

<body>

    <!-- Start your project here-->

    <div class="w-100 h-100 fixed-top bigDiv">
        <div class="position-relative w-100 h-100">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-6 col-sm-0 col-0 w-100 h-100 coverPhoto position-relative">
                    <div class="bgblack position-absolute w-100 h-100">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <img class="" src="img/02.png" alt="logo">
                        </div>
                    </div>
                    <img src="img/01.jpg" class="position-absolute" alt="coverPhoto">
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12 w-100 h-100 bgPhoto_in_form">
                    <div class="d-flex justify-content-center align-items-center w-100 h-100">
                        <div class="siteForm border border-light">
                            <div class="w-100 formLogo d-flex justify-content-center align-items-center">
                                <img src="img/01.png" height="80%" alt="logo">
                            </div>
                            <div class="w-100 container formInputs">
                                <hr>
                                <!-- Default form login -->
                                <form class="text-center p-2" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

                                    <p class="h4 mb-4">Sign up</p>

                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                            <!-- First name -->
                                            <input name="fname" type="text" id="defaultRegisterFormFirstName" class="form-control <?php echo $p_h_c_fname ?>" placeholder="<?php echo $p_h_fname ?>" value="<?php echo $fname ?>">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                                            <!-- Last name -->
                                            <input name="lname" type="text" id="defaultRegisterFormLastName" class="form-control <?php echo $p_h_c_lname ?>" placeholder="<?php echo $p_h_lname ?>" value="<?php echo $lname ?>">
                                        </div>
                                    </div>

                                    <!-- E-mail -->
                                    <input name="email" type="text" id="defaultRegisterFormEmail" class="form-control mb-4 <?php echo $p_h_c_email ?>" placeholder="<?php echo $p_h_email ?>" value="<?php echo $email ?>">

                                    <!-- Password -->
                                    <input name="psswrd" type="password" id="defaultRegisterFormPassword" class="form-control <?php echo $p_h_c_psswrd ?>" placeholder="<?php echo $p_h_psswrd ?>" value="<?php echo $psswrd ?>" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                        At least 6 characters
                                    </small>

                                    <!-- Phone number -->
                                    <input name="Cf_psswrd" type="password" id="defaultRegisterFormPassword" class="form-control <?php echo $p_h_c_Cf_psswrd ?>" placeholder="<?php echo $p_h_Cf_psswrd ?>" value="<?php echo $Cf_psswrd ?>" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                                    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                                        Same As the above one
                                    </small>

                                    <!-- Sign up button -->
                                    <button class="btn btn-info my-4 btn-block" type="submit" name="Submit_signup">Sign Up</button>
                                    <!-- <hr> -->

                                    <!-- Register -->
                                    <p>Already a member
                                        <a href="login.php" id="signUp">Log In</a>
                                    </p>

                                </form>
                                <!-- Default form login -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start your project here-->

    <!-- SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

</body>

</html>