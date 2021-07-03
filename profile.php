<?php

// include contains connect.php file which is connected to our database has
//  Every query related to SQL is in object oriented manner stored in connect.php file
require 'include/connect.php';

session_start();

// If the user is not logged in then this page will get redirected to login.php file
if ($_SESSION['user_key'] == "") {
    header('location:login.php');
}


if ($_GET['username'] == $_SESSION['user_key']['user_name']) {

    $otherUser = $server_Obj->load_profile_info($_SESSION['user_key']['user_name']);
} else {
    header('location:other_user.php?username=' . $_GET["username"]);
}

$server_Obj->load_user_session_details($_SESSION['user_key']['id'], $_SESSION['user_key']['password']);


clearstatcache();

require 'include/header.php';
?>

<div class="mb_navs w-100">
    <!-- <div class="row"> -->
    <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link" id="mb_home_link">
        <a href="index.php" class="d-flex justify-content-center align-items-center w-100 h-100">
            <i class="fas fa-home"></i></a>
    </div>
    <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link" id="mb_srch_link">
        <a class="d-flex justify-content-center align-items-center w-100 h-100">
            <i class="fas fa-search"></i></a>
    </div>
    <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link active">
        <a href="profile.php?username=<?php echo $_SESSION['user_key']['user_name'] ?>" class="d-flex justify-content-center align-items-center w-100 h-100">
            <i class="fas fa-user-alt"></i></a>
    </div>
    <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link mb_notify_link" id="notify">
        <a class="d-flex justify-content-center align-items-center w-100 h-100">
            <i class="fas fa-bell"></i>
            <span id="new_notifications" class="position-absolute rounded-circle badge badge-danger ml-2">3</span>
        </a>
    </div>
    <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link" id="other_activity">
        <a class="d-flex justify-content-center align-items-center w-100 h-100">
            <i class="fas fa-bars"></i></a>
    </div>
    <!-- </div> -->
</div>

<div id="mb_newfeed" class="w-100" style="margin-top: 10px">
    <div class="row">
        <div class="new_for_user_info col-xl-3 col-lg-3 col-md-0 col-sm-0 col-12 px-2 m-0 w-100 h-auto">
            <div class="userInfo position-sticky w-100">
                <?php include 'include/user_Info.php' ?>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12 col-12 px-2 m-0 w-100 h-auto">

            <div class="userNewsFeed w-100">

                <div class="w-100 h-auto w-100 other_page_header">
                    <div class="row">
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 d-flex justify-content-center align-items-center"> <a href="index.php"><i class="fas fa-arrow-left p-2 rounded-circle"></i> </a></div>
                        <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-10 p-2 d-flex justify-content-start align-items-center">
                            <h6 class="m-0"><a href="index.php">Home</a></h6>
                        </div>
                    </div>
                </div>
                <div class="w-100 h-auto bg-white">
                    <?php
                    if (@$_GET['user_edit'] == 'true') {
                        include 'include/user_edit_details.php';
                    } else {
                    ?>
                        <div class="w-100 user_details">

                            <div class="w-100 user_pics position-relative">
                                <div class="w-100 h-100 cover_pic overflow-hidden position-relative">
                                    <img src="<?php echo $otherUser['cover_pic']; ?>" class="h-100 position-absolute" alt="cover_pic">
                                </div>
                                <div class="profile_pic position-absolute p-2">
                                    <div class="profile_pic_bg w-100 h-100 d-flex justify-content-center align-items-center overflow-hidden rounded-circle">
                                        <img src="<?php echo $otherUser['profile_pic']; ?>" alt="" class=" h-100">
                                    </div>
                                </div>
                            </div>

                            <div class="follow_details w-100 h-auto p-4 mb-2 d-flex justify-content-end align-items-center">

                            </div>

                            <div class="user_info pb-2 w-100 h-auto">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="d-flex m-0 justify-content-start align-items-center">
                                            <b>
                                                <?php echo $otherUser['full_name'] ?>
                                            </b>
                                        </h5>
                                        <p class="mb-1"><?php echo $otherUser['user_name'] ?></p>
                                        <p class="my-1"><i class="fas fa-calendar-alt"></i> &nbsp;Joined on <?php echo $otherUser['joined_date'] ?></p>
                                        <p class="my-1">
                                            <a data-toggle="modal" data-target="#exampleModalCenter" id="followers_request"><b><?php if ($otherUser['followers'] == 'n_value') {
                                                                                                                                    echo 0;
                                                                                                                                } else {
                                                                                                                                    $followers_string = $server_Obj->get_user_followers($otherUser['id']);

                                                                                                                                    $followers_array = explode(":", $followers_string);

                                                                                                                                    echo count($followers_array) - 1;
                                                                                                                                } ?> </b> followers</a>

                                            &nbsp;<a data-toggle="modal" data-target="#exampleModalCenter" id="following_request"> <b><?php if ($otherUser['following'] == 'n_value') {
                                                                                                                                            echo 0;
                                                                                                                                        } else {
                                                                                                                                            $following_string = $server_Obj->get_user_following($otherUser['id']);

                                                                                                                                            $following_array = explode(":", $following_string);

                                                                                                                                            echo count($following_array) - 1;
                                                                                                                                        } ?></b> following</a>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
                            <li class="w-50 nav-item">
                                <a class="nav-link w-100 active d-flex justify-content-center align-items-center" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Timeline</a>
                            </li>
                            <li class="w-50 nav-item">
                                <a class="nav-link w-100 d-flex justify-content-center align-items-center" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md" aria-selected="false">Details</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContentMD">
                            <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">

                                <?php include 'include/user_newsfeed.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
                                <?php include 'include/user_edit_details.php' ?>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="new_for_user_activity" class="new_for_user_activity col-xl-4 col-lg-4 col-md-5 col-sm-0 col-4 px-2 m-0 w-100 h-auto">
            <div class="user_activity position-sticky w-100">
                <?php include 'include/user_activity.php'; ?>
            </div>
        </div>
    </div>
</div>




<div class="px-2 m-0 w-100 h-auto" id="mb_srch">

</div>

<div class="user_activity position-fixed bg-white mb_notification_info overflow-auto" id="mb_notification">

</div>

<div class="px-2 m-0 w-100 h-100 user_activity position-fixed bg-white overflow-auto" id="mb_other_activity">
    <div class="w-100 h-auto">

        <div class="row">

            <a href="profile.php?username=<?php echo $user['user_name']; ?>" class="col-12 mb-3 w-100 h-auto">

                <div class="w-100 mb_activity_hgt">
                    <!-- <div class="row"> -->
                    <div class="d-inline h-100">
                        <img src="<?php echo $user['profile_pic'] ?>" alt="" class="h-100">
                    </div>
                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <p class="m-0"> <?php echo $user['full_name'] ?> </p>
                    </div>
                    <!-- </div> -->
                </div>

            </a>

            <a href="profile.php?username=<?php echo $user['user_name']; ?>&user_edit=true" class="col-12 mb-3 w-100 h-auto">

                <div class="mb_activity_hgt">
                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <i class="fas fa-user-edit"></i>
                    </div>

                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <p class="m-0"> Edit Profile</p>
                    </div>
                </div>

            </a>

        </div>

        <div class="col-12 w-100 h-auto h_s py-2 px-2">
            <div class="w-100 h-auto">
                <p class="m-0"> <b>Help & Settings</b></p>
            </div>
        </div>

        <div class="row">

            <a class="col-12 mb-3 w-100 h-auto">

                <div class="mb_activity_hgt">
                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <i class="fas fa-language"></i>
                    </div>

                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <p class="m-0">Language</p>
                    </div>
                </div>

            </a>

            <a class="col-12 mb-3 w-100 h-auto">

                <div class="mb_activity_hgt">
                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <i class="fas fa-question-circle"></i>
                    </div>

                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <p class="m-0">Help Center</p>
                    </div>
                </div>

            </a>

            <a class="col-12 mb-3 w-100 h-auto">

                <div class="mb_activity_hgt">
                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <i class="fas fa-cog"></i>
                    </div>

                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <p class="m-0">Settings</p>
                    </div>
                </div>

            </a>

            <a class="col-12 mb-3 w-100 h-auto">

                <div class="mb_activity_hgt">
                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <i class="fas fa-user-secret"></i>
                    </div>

                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <p class="m-0">Privacy Shortcuts</p>
                    </div>
                </div>

            </a>

            <a class="col-12 mb-3 w-100 h-auto">

                <div class="mb_activity_hgt">
                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <i class="fas fa-bug"></i>
                    </div>

                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <p class="m-0">Report a Problem</p>
                    </div>
                </div>

            </a>

            <a class="col-12 mb-3 w-100 h-auto">

                <div class="mb_activity_hgt">
                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <i class="fas fa-ankh"></i>
                    </div>

                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <p class="m-0">Terms & Policies</p>
                    </div>
                </div>

            </a>

            <a href="logout.php" class="col-12 mb-3 w-100 h-auto">

                <div class="mb_activity_hgt">
                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>

                    <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
                        <p class="m-0">Logout</p>
                    </div>
                </div>

            </a>

        </div>

    </div>
</div>




<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="loader_for_user_info" class="w-100">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="img/loader.gif" alt="" class="h-100">
                    </div>
                </div>

                <div id="ajax_results">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php

include 'include/footer.php';

?>