<?php
// To clear catche data from php
clearstatcache();


// This include connect.php having database connection and quesries
require 'include/connect.php';


// session has been started  
session_start();


//if the user is session is on then login page will be redirected to home page
if (@$_SESSION['user_key']) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Friends | Social Media Site</title>
    <!-- Font Awesome -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/emj1.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Your custom styles (New) -->
    <link href="scss new/login.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<body>

    <!-- Start your project here-->

    <!-- Start with a div having height and width 100% and then dividing it into grid of 7 and 5 the larger 
one to show the Mood Image(Imagery that tells about our Website) and the other one for our Login Form-->

    <div class="w-100 h-100 fixed-top bigDiv">
        <div class="position-relative w-100 h-100">
            <div class="row">
                <!-- Mood Board of our Webiste -->
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

                                <div class="text-center p-2">

                                    <p class="h4 mb-4">Sign in</p>

                                    <!-- Email -->
                                    <input name="userName" type="text" id="usernameOrEmail" class="form-control mb-4" placeholder="Username or E-Mail">

                                    <!-- Password -->
                                    <input name="password" type="password" id="loginPassword" class="form-control mb-4" placeholder="Password">

                                    <div class="d-flex justify-content-around">
                                        <div class="row">
                                            <div class="new_remember_me col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <!-- Remember me -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <!-- Forgot password -->
                                                <a href="">Forgot password?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sign in button -->
                                    <button id="signIn" class="btn btn-info btn-block my-4" type="btn" name="sign_in">Sign in</button>

                                    <!-- Register -->
                                    <p>Not a member?
                                        <a href="sign-up.php" id="signUp">Sign Up</a>
                                    </p>
                                </div>

                                <!-- Default form login -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loader for the login Process -->
    <div id="loader" class="loader w-100 h-100 position-absolute">
        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
            <img src="img/loader.GIF" alt="loader.gif">
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

    <script>
        // JQuery ajax for sending the login data to check the login details 

        $(document).ready(function() {

            $('#signIn').click(function() {

                // Variable containing Useraname or E-mail
                var tweetValue = $('#usernameOrEmail').val();

                // Variable containing user's Password
                var password = $('#loginPassword').val();

                // Nested if-else statements validating if the values are null or not and processing error code 
                if (tweetValue == '' && password == '') {

                    $('#usernameOrEmail').attr("placeholder", "Enter an Username or Email");

                    $('#usernameOrEmail').addClass('your-class');

                    $('#loginPassword').attr("placeholder", "Enter a Password");

                    $('#loginPassword').addClass('your-class');
                } else if (tweetValue == '') {
                    $('#usernameOrEmail').attr("placeholder", "Enter an Username or Email");

                    $('#usernameOrEmail').addClass('your-class');
                } else if (password == '') {

                    $('#loginPassword').attr("placeholder", "Enter a Password");

                    $('#loginPassword').addClass('your-class');
                } else if (password.length < 6) {

                    $('#loginPassword').attr("placeholder", "Enter Your Valid six Digit Password");

                    $('#loginPassword').addClass('your-class');

                    $('#loginPassword').val('');

                } else {
                    // If there is no null value then the Jquery Ajax code in this else statement starts


                    // Ajax statement Sending Data To login-check.php to check the login Information 
                    // If the Login is succesfull this will get redirected to index.php 

                    $.ajax({
                        url: 'ajax/login-check.php',
                        type: 'post',
                        data: {
                            // Parameters Sending Username and Password
                            tweet: tweetValue,
                            password: password,
                        },
                        beforeSend: function() {

                            // Before Send Loading Loader set Login Process
                            $('#signIn').attr("disabled", true);

                            $('#loader').show();
                        },
                        success: function(data) {

                            // Checking ajax sent Data and Processing information further 
                            if (data == 'u0_e0') {
                                $('#usernameOrEmail').val("");

                                $('#usernameOrEmail').attr("placeholder", "Couldn't find this username or email");

                                $('#usernameOrEmail').addClass('your-class');
                            }

                            // Checking ajax sent Data and Processing information further 
                            if (data == 'u0') {
                                $('#usernameOrEmail').val("");

                                $('#usernameOrEmail').attr("placeholder", "Couldn't find this username");

                                $('#usernameOrEmail').addClass('your-class');
                            }

                            if (data == 'u1_p0') {
                                $('#loginPassword').val("");

                                $('#loginPassword').attr("placeholder", "Password is Incorrect");

                                $('#loginPassword').addClass('your-class');
                            }

                            if (data == 'u1_p1') {
                                window.location.href = "index.php";
                            }

                            if (data == 'e0') {
                                $('#usernameOrEmail').val("");

                                $('#usernameOrEmail').attr("placeholder", "Couldn't find this email");

                                $('#usernameOrEmail').addClass('your-class');
                            }

                            if (data == 'e1_p0') {
                                $('#loginPassword').val("");

                                $('#loginPassword').attr("placeholder", "Password is Incorrect");

                                $('#loginPassword').addClass('your-class');
                            }

                            if (data == 'e1_p1') {
                                window.location.href = "index.php";
                            }

                            // Stoping Loader set for Login Process
                            $('#signIn').attr("disabled", false);

                            $('#loader').hide();
                        }
                    });
                }


            });

        });
    </script>
</body>

</html>