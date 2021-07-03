<?php

// include contains connect.php file which is connected to our database has
//  Every query related to SQL is in object oriented manner stored in connect.php file

clearstatcache();

$user;

// If the user is not logged in then this page will get redirected to login.php file
$GLOBALS['user'] = $server_Obj->load_user_profile($_SESSION['user_key']['id']);

?>

<!-- Start your project here-->
<!-- <div class="w-100 h-auto position-relative"> -->
<div class="search_field position-sticky w-100 p-0 pl-2 m-0">
    <div class="row">
        <div class="srch_icn col-1 p-0 w-100 h-100 d-flex justify-content-center align-items-center">
            <i class="fas fa-search"></i>
        </div>
        <div class="col-10 p-0 srch_inpt w-100 h-100 d-flex justify-content-center align-items-center">
            <input type="search" class="w-100 h-100" name="search_accounts" id="searchForAccounts" placeholder="Search for Users">
        </div>
        <div class="col-1 p-0 srch_inpt w-100 h-100 d-flex justify-content-center align-items-center"></div>
    </div>
</div>

<div class="container srchd_user_list position-relative w-100">


    <div id="loader_on_search" class="position-absolute">
        <img src="img/loader.gif" class="w-100 h-100" alt="">
    </div>

    <div class="w-100 h-100 bg-white rounded-lg">

        <div id="srch_results" class="w-100 h-100">

            <div id="suggestion" class="suggestion position-sticky w-100 border-bottom border-dark h-auto px-2 py-2">
                <div class="w-100 d-flex justify-content-start align-items-center">
                    <h6 class="m-0"> <b>Suggestions For You</b></h6>
                </div>
            </div>

            <?php

            $view_on_search = $server_Obj->load_user_on_search($_SESSION['user_key']['id']);

            $num_row = mysqli_num_rows($view_on_search);

            if ($num_row == 0) {

            ?>

                <div class="no_users bg-white w-100 border-top border-bottom py-5 d-flex justify-content-center align-items center">
                    <h5 class="d-flex justify-content-center align-items center">No Users to show</h4>
                </div>

                <?php } else {

                while ($run = mysqli_fetch_array($view_on_search)) {

                    $blocked_string = $_SESSION['user_key']['blocked_by'];

                    $array_blocked_by = explode(":", $blocked_string);

                    if (in_array($run['id'], $array_blocked_by)) {
                    } else {

                        if ($run['privacy_status'] == 'Private') {
                        } else {
                            $followers_string = $_SESSION['user_key']['following'];

                            $array_followers = explode(":", $followers_string);

                            if (in_array($run['id'], $array_followers)) {
                            } else {

                ?>

                                <div class="srchd_profile bg-white border-top border-bottom border-dark w-100">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 d-flex justify-content-center align-items-center p-0">
                                            <div class="srchd_user_profile_pic d-flex justify-content-center align-items-center rounded-circle overflow-hidden">
                                                <a href="profile.php?username=<?php echo $run['user_name']; ?>" class="w-100 h-100 d-flex justify-content-center align-items-center rounded-circle"><img src="<?php echo $run['profile_pic'] ?>" class="h-100" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-5 col-sm-6 col-5 p-0 d-flex align-items-center">
                                            <h6 class="m-0 p-0 font-weight-bold"> <a href="profile.php?username=<?php echo $run['user_name']; ?>"><?php echo $run['full_name'] ?></a>
                                                <small class="m-0 p-0 d-block"><?php echo $run['user_name'] ?></small>
                                            </h6>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-4 col-5 d-flex justify-content-center align-items-center p-1">

                                            <?php

                                            if ($run['privacy_status'] == 'Private') {
                                            } else {

                                                $following_string = $server_Obj->get_user_following($_SESSION['user_key']['id']);

                                                $array_user_following_list = explode(":", $following_string);

                                                if (in_array($run['id'], $array_user_following_list)) {


                                            ?>
                                                    <button type="button" class="d-None follow_user w-100 h-75 p-0 btn p-0 btn-primary btn-rounded rounded-pill" onclick="followUser(<?php echo $run['id'] ?>)">Follow</button>

                                                    <button type="button" class="unfollow_user w-100 h-75 p-0 btn btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $run['id'] ?>)">Following</button>
                                                <?php } else { ?>

                                                    <button type="button" class="follow_user w-100 h-75 p-0 outline-none btn-primary btn-rounded rounded-pill" onclick="followUser(<?php echo $run['id'] ?>)">Follow</button>

                                                    <button type="button" class="unfollow_user w-100 d-None h-75 p-0 btn btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $run['id'] ?>)">Following</button>

                                            <?php }
                                            } ?>

                                        </div>
                                    </div>
                                </div>

            <?php
                            }
                        }
                    }
                }
            } ?>

        </div>

    </div>

</div>
<!-- </div> -->

<div class="showerror"></div>