<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Friends | Social Media Site</title>
    <!-- MDB icon -->
    <!-- <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon"> -->
    <!-- Font Awesome -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/emj1.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <link href="scss new/index.css" rel="stylesheet">
    <link href="scss new/post.css" rel="stylesheet">
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


    <div class="w-100 nav_bar">
        <div class="container w-100 h-100">
            <div class="row">
                <div class="new_css_logo w-100 h-100 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 d-flex justify-content-start align-items-center">
                    <a href="index.php" class="w-auto h-75">
                        <img src="img/02.png" class="w-auto h-100" alt="">
                    </a>
                </div>
                <div class="new_css_notification w-100 h-100 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="row w-100 h-100">
                        <div class="col-10 p-0 w-100 h-100 d-flex justify-content-end align-items-center">

                            <div class="notify h-100 m-0 p-0">

                                <div id="notify" class="w-100 h-100 position-relative d-flex justify-content-center align-items-center">

                                    <i class="fas fa-bell"></i>
                                    <span id="new_notifications" class="position-absolute rounded-circle badge badge-danger ml-2">3</span>


                                </div>

                                <div id="notification_info" class="bg-white notification_info position-absolute overflow-auto">

                                    <div class="loaded_notifications w-100 h-100">
                                        <div class="w-100 h-auto p-3">
                                            <h6 class="m-0"> <b>Notifications For You</b></h6>
                                        </div>
                                        <hr class="p-0 m-0">
                                        <div class="w-100 h-auto ajax_loaded_notifications py-2" id="ajax_loaded_notifications">

                                            <div class="w-100 h-100 p-4 d-flex justify-content-center align-items-center" id="loader">
                                                <img src="img/loader.gif" alt="">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-2 w-100 h-100 d-flex justify-content-start align-items-center">

                            <div class="dropdown">

                                <div class="w-auto h-100 d-flex justify-content-center align-items-center" id="dropdownMenu6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="h-100 far fa-user"></i>
                                </div>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="profile.php?username=<?php echo $_SESSION['user_key']['user_name']; ?>">Go to your's Account</a>
                                    <a class="dropdown-item" href="profile.php?username=<?php echo $_SESSION['user_key']['user_name']; ?>&user_edit=true">Edit Profile</a>
                                    <a class="dropdown-item" href="logout.php">Log Out</a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>






    <div id="black_bx"></div>