<?php

// include contains connect.php file which is connected to our database has
//  Every query related to SQL is in object oriented manner stored in connect.php file
require 'include/connect.php';

session_start();



if (!$_SESSION['new_user']) {
    header('location:login.php');
} else {
    $_SESSION['new_user_edit'] = "set";
}

// If the user is not logged in then this page will get redirected to login.php file
if ($_SESSION['user_key'] == "") {
    header('location:login.php');
}

if ($_SESSION['new_user_edit'] == "set") {
} else {
    header('location:login.php');
}

// varible storing the logged in user information stored in session variable as an array
// $user = $_SESSION['user_key'];
// var_dump($user);
clearstatcache();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Social Media Site</title>
    <!-- MDB icon -->
    <!-- <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <link href="scss new/signup.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="scss new/index.css?v=<?php echo time(); ?>" rel="stylesheet">
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
                    <div class="editDiv position-relative border-light bg-white">
                        <div class="position-sticky update_heading w-100 px-3 py-4 d-flex justify-content-start align-items-center">
                            <h6 class="m-0"><b>Upload Your Details</b></h6>
                        </div>
                        <?php include 'include/user_edit_details.php' ?>

                        <?php
                        $_SESSION['new_user_edit'] = "Unset"; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start your project here-->


        <!-- End your project here-->

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

        <script type="text/javascript">
            var current_username = `<?php echo ltrim($user['user_name'], '@') ?>`;

            var newVar_id = '<?php echo $user_id ?>';

            var current_user_id = '<?php echo $_SESSION['user_key']['id'] ?>';
        </script>

        <script type="text/javascript" src="js-new/main.js"></script>
        <script type="text/javascript" src="js-new/user_edit_details.js"></script>

</body>

</html>