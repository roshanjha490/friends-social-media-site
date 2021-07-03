<?php

// database connection file 
include '../include/connect.php';

$id = intval($_POST['post_id_f_ajax']);

if ($_POST['post_id_f_ajax'] == '') {
    header('location:../index.php');
}

session_start();

$post_likes = $server_Obj->get_post_likes($id);

$post_likes_in_array = explode(":", $post_likes);

$likes_number = count($post_likes_in_array);

?>

<!-- Start your project here-->
<div class="container w-100 mt-1">
    <?php

    // $view_on_search = $server_Obj->load_user_on_search($_SESSION['user_key']['id']);

    $num_row = count($post_likes_in_array);

    if ($num_row == 0 or $post_likes == Null) {

    ?>

        <div class="no_users_in_this bg-white w-100 border-top border-bottom py-5 d-flex justify-content-center align-items center">
            <h5>No Likes</h4>
        </div>

        <?php } else {

        foreach ($post_likes_in_array as $value) {

            $follower = $server_Obj->load_user_profile($value);

            $blocked_string = $_SESSION['user_key']['blocked_by'];

            $array_blocked_by = explode(":", $blocked_string);


            if (in_array($follower['id'], $array_blocked_by)) {
            } else {
        ?>

                <div class="srchd_profile bg-white w-100 border-top border-bottom">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 d-flex justify-content-center align-items-center p-0">
                            <div class="srchd_user_profile_pic d-flex justify-content-center align-items-center rounded-circle overflow-hidden">
                                <a href="other_user.php?userId=<?php echo $follower['id']; ?>"><img src="<?php echo $follower['profile_pic'] ?>" class="w-100 h-100" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-5 p-0 d-flex align-items-center">
                            <h6 class="m-0 p-0 font-weight-bold"> <a href="other_user.php?userId=<?php echo $follower['id']; ?>"><?php echo $follower['full_name'] ?></a>
                                <small class="m-0 p-0 d-block"><?php echo $follower['user_name'] ?></small>
                            </h6>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-5 d-flex justify-content-center align-items-center p-1">

                            <?php

                            $current_user_following_string = $server_Obj->get_user_following($_SESSION['user_key']['id']);

                            $array_user_following_list = explode(":", $current_user_following_string);

                            if ($follower['id'] == $_SESSION['user_key']['id']) {
                            ?>
                                <button type="button" class="d-None follow_user_in_modal w-100 h-75 p-0 btn p-0 btn-primary btn-rounded rounded-pill">aslcbnaksjcn</button>
                            <?php
                            } else if (in_array($follower['id'], $array_user_following_list)) {


                            ?>
                                <button type="button" class="d-None follow_user_in_modal w-100 h-75 p-0 btn p-0 btn-primary btn-rounded rounded-pill" onclick="followUser(<?php echo $follower['id'] ?>)">Follow</button>

                                <button type="button" class="unfollow_user_in_modal w-100 h-75 p-0 btn btn-danger btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $follower['id'] ?>)">Unfollow</button>
                            <?php } else { ?>

                                <button type="button" class="follow_user_in_modal w-100 h-75 p-0 outline-none btn-primary btn-rounded rounded-pill" onclick="followUser(<?php echo $follower['id'] ?>)">Follow</button>

                                <button type="button" class="unfollow_user_in_modal w-100 d-None h-75 p-0 btn btn-danger btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $follower['id'] ?>)">Unfollow</button>

                            <?php } ?>

                        </div>
                    </div>
                </div>

    <?php }
        }
    } ?>

</div>