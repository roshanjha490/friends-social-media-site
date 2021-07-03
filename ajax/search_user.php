<?php


// database connection file 
include '../include/connect.php';

session_start();

$user = $server_Obj->load_user_profile($_SESSION['user_key']['id']);

$search = $_POST['searchVal'];

if ($_POST['searchVal'] == '') {
    header('location:../index.php');
} else {
    $view_on_search = $server_Obj->search_user($search);

    $num_row = mysqli_num_rows($view_on_search);
    if ($num_row == 0) {

?>

        <div class="no_users bg-white w-100 border-top border-bottom py-5 d-flex justify-content-center align-items center">
            <h5>No Results</h4>
        </div>

        <?php } else {

        while ($run = mysqli_fetch_array($view_on_search)) {

            $blocked_string = $_SESSION['user_key']['blocked_by'];

            $array_blocked_by = explode(":", $blocked_string);

            if (in_array($run['id'], $array_blocked_by)) {
            } else {

        ?>

                <div id="top_accounts" class="top_accounts h-auto position-sticky">
                    <div class="w-100 srchResults_heading d-none d-flex justify-content-center align-items center">
                        <div class="h-100 px-2 extr1 w-auto d-flex justify-content-center align-items center"><small>Top Accounts</small></div>
                    </div>
                </div>

                <div class="srchd_profile bg-white border-top border-bottom border-dark w-100">
                    <div class="row">
                        <div class="col-2 d-flex justify-content-center align-items-center p-0">
                            <div class="srchd_user_profile_pic d-flex justify-content-center align-items-center rounded-circle overflow-hidden">
                                <a href="profile.php?username=<?php echo $run['user_name']; ?>" class="w-100 h-100 d-flex justify-content-center align-items-center rounded-circle"><img src="<?php echo $run['profile_pic'] ?>" class="h-100" alt=""></a>
                            </div>
                        </div>
                        <div class="col-6 p-0 d-flex align-items-center">
                            <h6 class="m-0 p-0 font-weight-bold"> <a href="profile.php?username=<?php echo $run['user_name']; ?>"><?php echo $run['full_name'] ?></a>
                                <small class="m-0 p-0 d-block"><?php echo $run['user_name'] ?></small>
                            </h6>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center p-1">

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

    <?php }
        }
    } ?>

<?php
}

// sleep(2);

?>