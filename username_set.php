<?php

session_start();

// Page will egt redirected to index.php file if the user is logged in 
if (@$_SESSION['user_key']) {
    header("location:index.php");
}

// Page will egt redirected to login.php file if the New has signed up and filled up
// $_SESSION['new-user']  variables with the information 
if (!$_SESSION['new_user']) {
    header('location:login.php');
}

//File having Database Connection all query for the mySQL Database in OOPS form 
include 'include/connect.php';

// To clear Catche of the file
clearstatcache();

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
    <style>
        .loader_2021 {
            background-color: #ffffffbf;
            display: none;
            z-index: 999;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .loader_2021 img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>

    <!-- Start your project here-->
    <div class="position-absolute w-100 h-100">
        <div class="position-relative w-100 h-100">
            <div class="bgimg w-100 h-100">
                <!-- <img src="img/01.jpg" alt="bgImg" width="100%"> -->
            </div>
            <div class="blckbx w-100 h-100 position-absolute">
                <div class="position-relative d-flex justify-content-center align-items-center w-100 h-100">
                    <div class="formDiv p-4">
                        <!-- Default form register -->
                        <div class="Form_f_user d-flex justify-content-center align-items-center">
                            <h4 class="h4"><?php echo "Hi!" . " " . $_SESSION['new_user'][0] ?></h4>
                        </div>

                        <!-- Default form register -->
                        <div class="text-center mt-4">

                            <h5 class="mb-3">Choose a Username for you</h5>

                            <div class="form-row px-3">
                                <!-- E-mail -->
                                <div class="w-100 input-group position-relative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input id="defaultLoginFormEmail" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    <span class="loader position-absolute h-100 py-1" id="loader">
                                        <img src="img/loader.GIF" class="h-100" alt="loader.gif">
                                    </span>
                                    <!-- </div> -->
                                </div>

                                <div class="w-100 extr1 d-flex justify-content-center align-items-center">
                                    <small id="error"></small>
                                </div>
                                <!-- Sign up button -->
                                <button class="mx-2 mt-3 btn btn-info btn-block" disabled type="btn" id="username_sbm">Create Account</button>


                            </div>
                            <!-- Default form register -->
                            <!-- Default form register -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start your project here-->
        <div id="wrr"></div>
        <!-- SCRIPTS -->

        <!-- Loader for the login Process -->
        <div id="loader_2021" class="loader_2021 w-100 h-100 position-absolute">
            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                <img src="img/loader.GIF" alt="loader.gif">
            </div>
        </div>


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
            $(document).ready(function() {

                $("#defaultLoginFormEmail").keyup(function() {

                    // alert(true);

                    // useraname varible storing the unique username the New User has given
                    var username = $('#defaultLoginFormEmail').val();

                    $.ajax({
                        url: 'ajax/username_check.php',
                        type: 'post',
                        data: {
                            username: username,
                        },
                        beforeSend: function() {

                            // Before Send Loading Loader set Login Process
                            // $('#signIn').attr("disabled", true);

                            $('#loader').css("display", "inline");

                            $('.loader_2021').css("display", "inline");

                            $('#defaultLoginFormEmail').attr("disabled", "true");
                        },
                        success: function(response) {


                            if (response == "U_val_wrg") {
                                $('#defaultLoginFormEmail').css("color", "red");
                                $("#username_sbm").attr("disabled", true);
                                // $('#error').html(`Must start with letter having 3 - 32 characters with Letters and numbers only`);
                                $('#error').html(`This Username is not valid use atleast three charecters`);
                                $('#error').css('color', 'red');

                            } else {

                                if (response == "u_rght") {
                                    $("#username_sbm").attr("disabled", false);
                                    $('#error').html('You Choose a nice name for you');
                                    $('#error').css('color', 'green');
                                    $('#defaultLoginFormEmail').css("color", "black");
                                } else {
                                    $('#defaultLoginFormEmail').css("color", "red");
                                    $("#username_sbm").attr("disabled", true);
                                    $('#error').css('color', 'red');
                                    $('#error').html('Username already exists!');
                                }

                            }
                            $('#loader').css("display", "none");

                            $('.loader_2021').css("display", "none");

                            $('#defaultLoginFormEmail').removeAttr("disabled");
                            
                            $('#defaultLoginFormEmail').focus();

                        }

                    });

                    let inputVal = $("#defaultLoginFormEmail").val();

                    if (inputVal == '') {
                        $('#loader').css("display", "none");

                        $('.loader_2021').css("display", "none");

                        $('#defaultLoginFormEmail').attr("disabled", "false");

                    }
                });


                $('#username_sbm').click(function() {

                    // useraname varible storing the unique username the New User has given
                    var username = $('#defaultLoginFormEmail').val();

                    // Storing the New User Information ftom the session variable
                    var fullname = "<?php echo $_SESSION['new_user'][0] ?>";
                    var password = "<?php echo $_SESSION['new_user'][1] ?>";
                    var email = "<?php echo $_SESSION['new_user'][2] ?>";

                    // Ajax providing data to the username_check.php where the username get cheked if its already taken or not
                    $.ajax({
                        url: 'ajax/createNewUser.php',
                        type: 'post',
                        data: {
                            username: username,
                            fullname: fullname,
                            password: password,
                            email: email,
                        },
                        beforeSend: function() {
                            $('.loader_2021').css("display", "inline");
                        },
                        success: function(response) {
                            if (response == 'u_wrg') {

                                $('#defaultLoginFormEmail').val("");

                                $('#defaultLoginFormEmail').attr("placeholder", "* Username has already been taken");

                                $('#defaultLoginFormEmail').addClass('your-class');

                            }

                            if (response == "U_val_wrg") {
                                $('#defaultLoginFormEmail').css("color", "red");
                                $("#username_sbm").attr("disabled", true);
                                // $('#error').html(`Must start with letter having 3 - 32 characters with Letters and numbers only`);
                                $('#error').html(`This Username is not valid`);
                                $('#error').css('color', 'red');
                                $('#loader').css("display", "none");

                            }

                            if (response == 'u_rght') {
                                window.location.href = "new_user.php";
                            }

                            if (response == 'u0') {
                                $('#defaultLoginFormEmail').val("");

                                $('#defaultLoginFormEmail').attr("placeholder", "* Enter an Username");

                                $('#defaultLoginFormEmail').addClass('your-class');
                            }

                            $('.loader_2021').css("display", "none");

                        }
                    });
                });


            });
        </script>
</body>

</html>