<?php

// include contains connect.php file which is connected to our database has
//  Every query related to SQL is in object oriented manner stored in connect.php file
require 'include/connect.php';

session_start();

// If the user is not logged in then this page will get redirected to login.php file
if ($_SESSION['user_key'] == "") {
    header('location:login.php');
}

$server_Obj->load_user_session_details($_SESSION['user_key']['id'], $_SESSION['user_key']['password']);


$run;

if (!$_GET['post_id']) {
    header('location:login.php');
} else {
    $GLOBALS['run'] = $server_Obj->load_userPost($_GET['post_id']);
}


$blocked_string = $_SESSION['user_key']['blocked_by'];

$array_blocked_by = explode(":", $blocked_string);


if (in_array($run['user_id'], $array_blocked_by)) {
    header('location:index.php');
} else {

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
        <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link">
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



    <div class="w-100 mb-3" style="margin-top: 10px">
        <div class="row">

            <div class="new_for_user_info col-xl-3 col-lg-3 col-md-0 col-sm-0 col-12 px-2 m-0 w-100 h-auto">
                <div class="userInfo position-sticky w-100">
                    <?php include 'include/user_Info.php'; ?>
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

                    <div class="w-100" id="showPost_bx">
                        <div class="post mt-2">
                            <div class="postHeading w-100 px-3 py-2">
                                <div class="row">
                                    <div class="col-1 p-0 d-flex justify-content-center align-items-center">
                                        <a href="profile.php?username=<?php echo $run['post_username']; ?>" class="pic2 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="<?php echo $run['post_userprofile_pic'] ?>" class="h-100" alt="user_profile">
                                        </a>
                                    </div>
                                    <div class="col-10 px-2 d-flex align-items-center">
                                        <p class="m-0"> <a href="profile.php?username=<?php echo $run['post_username']; ?>"><?php echo $run['post_fullname'] ?></a><small class="d-block"><?php


                                                                                                                                                                                            // Date setting the default indian time zone 
                                                                                                                                                                                            date_default_timezone_set("Asia/Kolkata");

                                                                                                                                                                                            $start = strtotime($run['post_time']);
                                                                                                                                                                                            $end =  strtotime(date("Y-m-d h:i:s"));

                                                                                                                                                                                            // echo $end . '<br>';
                                                                                                                                                                                            // echo $start;

                                                                                                                                                                                            $year = intval(($end - $start) / 3.154e+7);

                                                                                                                                                                                            $months = intval(($end - $start) / 2.628e+6);

                                                                                                                                                                                            $days = intval(($end - $start) / 86400);

                                                                                                                                                                                            $hours = intval(($end - $start) / 3600);

                                                                                                                                                                                            $mins = (int) (($end - $start) / 60);

                                                                                                                                                                                            $sec = (int) (($end - $start));


                                                                                                                                                                                            if ($year > 0 && $year < 200) {

                                                                                                                                                                                                echo $year . ' year ago' . '<br>';
                                                                                                                                                                                            } elseif ($months > 0 && $months < 12) {

                                                                                                                                                                                                echo $months . ' months ago' . '<br>';
                                                                                                                                                                                            } elseif ($days > 0 && $days < 30) {

                                                                                                                                                                                                echo $days . ' day ago' . '<br>';
                                                                                                                                                                                            } elseif ($hours > 0 && $hours < 24) {

                                                                                                                                                                                                echo $hours . ' hours ago' . '<br>';
                                                                                                                                                                                            } elseif ($mins > 0 && $mins < 60) {

                                                                                                                                                                                                echo $mins . ' minutues ago' . '<br>';
                                                                                                                                                                                            } else {

                                                                                                                                                                                                echo $sec . ' seconds ago' . '<br>';
                                                                                                                                                                                            }


                                                                                                                                                                                            ?></small></p>
                                    </div>
                                    <div class="col-1 p-0 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-ellipsis-h p-3 rounded-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                                        <?php if ($run['user_id'] == $_SESSION['user_key']['id']) { ?>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item delete_post" onclick="deleteMyPost(<?php echo $run['id'] ?>)">Delete</a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Report Inappropriate</a>
                                                <a class="dropdown-item unfollow_user_post" onclick="unfollowUser(<?php echo $run['user_id'] ?>)">Unfollow</a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <?php if ($run['post_caption'] == ' ') {
                            } else {
                            ?>
                                <div class="postCaption w-100 px-3 pb-2">
                                    <p class="m-1"><?php echo $run['post_caption'] ?></p>
                                </div>

                            <?php } ?>

                            <?php if ($run['post_img'] == '') {
                            } else {
                            ?>

                                <div class="postImg w-100">
                                    <img src="<?php echo $run['post_img'] ?>" class="w-100" alt="">
                                </div>

                            <?php } ?>

                            <div class="postRctInfrmation border-top px-3 py-2 w-100">
                                <div class="row">
                                    <div class="col-12">
                                        <?php
                                        if ($run['post_likers'] == null || $run['post_likers'] == "") { ?>
                                            <a class="m-0" style="text-decoration-line: none; cursor: default;"><span class="likes_number_info">0</span> Likes,</a>

                                        <?php } else {
                                            $post_likes = $server_Obj->get_post_likes($run['id']);

                                            $post_likes_in_array = explode(":", $post_likes);

                                            $likes_number = count($post_likes_in_array);
                                        ?>
                                            <a onclick="get_post_likers_info(<?php echo $run['id'] ?>)" class="new_rct_like_info m-0" data-toggle="modal" data-target="#exampleModalCenter"><span class="likes_number_info"><?php echo $likes_number ?></span> Likes,</a>
                                        <?php } ?>
                                        &nbsp;
                                        <?php
                                        if ($run['post_comments'] == null) { ?>
                                            <a class="m-0" style="text-decoration-line: none; cursor: default;"><span class="commnts_number_info">0</span> Comments</a>
                                        <?php } else {

                                            $post_comments_array = json_decode($run['post_comments'], true);

                                            $comment_number = count($post_comments_array);
                                        ?>
                                            <a class="m-0" style="text-decoration-line: none; cursor: default;"><span class="commnts_number_info"><?php echo $comment_number ?></span> Comments</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="postReacts border-top border-bottom w-100">
                                <div class="row">

                                    <div class="col-6 p-0 w-100 h-auto">

                                        <?php
                                        $post_likes = $server_Obj->get_post_likes($run['id']);

                                        $post_likes_in_array = explode(":", $post_likes);

                                        $likes_number = count($post_likes_in_array);

                                        if (in_array($_SESSION['user_key']['id'], $post_likes_in_array)) {

                                        ?>

                                            <div class="rctBtn_frLike unactive w-100 h-auto" onclick="like_this_post('<?php echo $run['id'] ?>', '<?php echo $_SESSION['user_key']['id'] ?>')">
                                                <div class="w-100 h-auto py-2 d-flex justify-content-center align-items-center">
                                                    <p class="m-0"><i class="fas fa-thumbs-up"></i>&nbsp;Like</p>
                                                </div>
                                            </div>

                                            <div class="rctBtn_frLiked w-100 h-auto" onclick="dislike_this_post('<?php echo $run['id'] ?>', '<?php echo $_SESSION['user_key']['id'] ?>')">
                                                <div class="w-100 h-auto py-2 d-flex justify-content-center align-items-center">
                                                    <p class="m-0"><i class="fas fa-thumbs-up"></i>&nbsp;Liked</p>
                                                </div>
                                            </div>

                                        <?php } else { ?>

                                            <div class="rctBtn_frLike w-100 h-auto" onclick="like_this_post('<?php echo $run['id'] ?>', '<?php echo $_SESSION['user_key']['id'] ?>')">
                                                <div class="w-100 h-auto py-2 d-flex justify-content-center align-items-center">
                                                    <p class="m-0"><i class="fas fa-thumbs-up"></i>&nbsp;Like</p>
                                                </div>
                                            </div>

                                            <div class="rctBtn_frLiked unactive w-100 h-auto" onclick="dislike_this_post('<?php echo $run['id'] ?>', '<?php echo $_SESSION['user_key']['id'] ?>')">
                                                <div class="w-100 h-auto py-2 d-flex justify-content-center align-items-center">
                                                    <p class="m-0"><i class="fas fa-thumbs-up"></i>&nbsp;Liked</p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>

                                    <div class="rctBtn_frComment col-6 py-2 d-flex justify-content-center align-items-center">
                                        <p class="m-0"><i class="fas fa-comment-alt"></i>&nbsp; Comments</p>
                                    </div>
                                </div>
                            </div>

                            <div class="postComment w-100 px-3 py-2">
                                <div class="row">
                                    <div class="col-1 p-0 d-flex justify-content-center align-items-center">
                                        <div class="pic3 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="<?php echo $user['profile_pic'] ?>" class="h-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-10 px-2">
                                        <input class="user_post_comment w-100 h-100 px-3 rounded-pill" type="text" placeholder="Write a comment..." class="w-100 h-100">
                                    </div>
                                    <div class="col-1 p-0 d-flex justify-content-center align-items-center">
                                        <button class="post_btn_cmmnt h-100 w-100" disabled class="m-0" onclick="comment_made('<?php echo $run['id'] ?>', '<?php echo $user['id'] ?>', '<?php echo $user['full_name'] ?>', '<?php echo $user['user_name'] ?>', '<?php echo $user['profile_pic'] ?>')">Post</b>
                                    </div>
                                </div>
                            </div>

                            <div class="post_prev_comments border-top border-bottom w-100">
                                <?php $post_comments = $server_Obj->load_post_comment($run['id']);

                                if ($post_comments == null) {
                                } else {
                                    $post_comments_array = json_decode($post_comments, true);

                                    $comment_number = count($post_comments_array);

                                    if ($comment_number == 0) {
                                    } else {

                                        // var_dump($post_comments_array);

                                        $rogue_id = @$_GET['comment_id'];

                                        $comment_id;

                                        for ($i = 0; $i < count($post_comments_array); $i++) {
                                            # code...
                                            if (@$post_comments_array[$i]['rogue_id'] == $rogue_id) {
                                                $comment_id = $i;

                                                // echo $post_comments_array[$comment_id]['comment'];
                                            } else {
                                                // $comment_id = null;
                                            }
                                        };

                                        echo '<div class="px-4 py-2">';


                                        if (@$_GET['comment_id']) {
                                            if ($comment_id === null) {

                                                echo "<div class='px-4 py-2'><h6>The Comment your are looking has been Deleted</h6></div>";
                                            } else {

                                                $commenters_details = $server_Obj->load_user_profile($post_comments_array[$comment_id]['id']);

                                ?>

                                                <div class="w-100 h-auto mb-3">
                                                    <div class="row">
                                                        <div class="col-1 p-0 d-flex justify-content-center align-items-start">
                                                            <a href="profile.php?username=<?php echo $commenters_details['user_name']; ?>">
                                                                <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                                            </a>
                                                        </div>
                                                        <div class="col-11 p-0 h-auto">

                                                            <div class="w-auto h-auto userComment px-3 py-2 d-inline-flex justify-content-center align-items-center">
                                                                <h6 class="mb-0 d-inline"> <a href="profile.php?username=<?php echo $commenters_details['user_name']; ?>" class="rounded-pill accnt_in_comment"><?php echo $commenters_details['full_name'] ?>:</a>&nbsp;
                                                                    <p class="d-inline"><?php echo $post_comments_array[$comment_id]['comment'] ?></p>
                                                                </h6>
                                                            </div>

                                                            <div class="w-100 h-auto like_n_reply pl-3 mt-1">

                                                                <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center">

                                                                    <?php

                                                                    $comments_likes = $post_comments_array[$comment_id]['likes'];

                                                                    $comment_likes_in_array = explode(":", $comments_likes);

                                                                    $likes_number = count($comment_likes_in_array);

                                                                    if (in_array($_SESSION['user_key']['id'], $comment_likes_in_array)) {

                                                                    ?>
                                                                        <i class="far fa-heart comment_like_btn inactive" onclick="like_the_comment('<?php echo $_SESSION['user_key']['id']  ?>', '<?php echo $run['id']  ?>', '<?php echo $comment_id ?>')"></i>
                                                                        <i class="fas fa-heart comment_dislike_btn" onclick="dis_like_the_comment('<?php echo $_SESSION['user_key']['id']  ?>', '<?php echo $run['id']  ?>', '<?php echo $comment_id ?>')"></i>

                                                                    <?php } else { ?>

                                                                        <i class="far fa-heart comment_like_btn" onclick="like_the_comment('<?php echo $_SESSION['user_key']['id']  ?>', '<?php echo $run['id']  ?>', '<?php echo $comment_id ?>')"></i>
                                                                        <i class="fas fa-heart comment_dislike_btn inactive" onclick="dis_like_the_comment('<?php echo $_SESSION['user_key']['id']  ?>', '<?php echo $run['id']  ?>', '<?php echo $comment_id ?>')"></i>
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center">
                                                                    <small>( <b class="comment_like_no"> <?php
                                                                                                            if ($post_comments_array[$comment_id]['likes'] == null || $post_comments_array[$comment_id]['likes'] == "") {
                                                                                                                echo 0;
                                                                                                            } else {
                                                                                                                echo $likes_number;
                                                                                                            }
                                                                                                            ?> </b>)</small>
                                                                </div>

                                                                <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center">
                                                                    <?php if ($post_comments_array[$comment_id]['id'] == $_SESSION['user_key']['id']) { ?>
                                                                        &nbsp;&nbsp; <small class="delete_btn_cmmnt" onclick="delete_btn('<?php echo $run['id']  ?>', '<?php echo $comment_id ?>')">Delete</small>

                                                                    <?php } else if ($run['user_id'] == $_SESSION['user_key']['id']) {
                                                                    ?>
                                                                        &nbsp;&nbsp; <small class="reply_btn_cmmnt" onclick="reply_btn('<?php echo $commenters_details['user_name'] ?>', '<?php echo $post_comments_array[$comment_id]['id'] ?>')">Reply</small>
                                                                        &nbsp;&nbsp; <small class="delete_btn_cmmnt" onclick="delete_btn('<?php echo $run['id']  ?>', '<?php echo $i ?>')">Delete</small>
                                                                    <?php
                                                                    } else { ?>
                                                                        &nbsp;&nbsp; <small class="reply_btn_cmmnt" onclick="reply_btn('<?php echo $commenters_details['user_name'] ?>', '<?php echo $post_comments_array[$comment_id]['id'] ?>')">Reply</small>

                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                        } else {

                                            for ($i = 0; $i < $comment_number; $i++) {


                                                $commenters_details = $server_Obj->load_user_profile($post_comments_array[$i]['id']);
                                            ?>
                                                <div class="w-100 h-auto mb-3">
                                                    <div class="row">
                                                        <div class="col-1 p-0 d-flex justify-content-center align-items-start">
                                                            <a href="profile.php?username=<?php echo $commenters_details['user_name']; ?>">
                                                                <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                                            </a>
                                                        </div>
                                                        <div class="col-11 p-0 h-auto">

                                                            <div class="w-auto h-auto userComment px-3 py-2 d-inline-flex justify-content-center align-items-center">
                                                                <h6 class="mb-0 d-inline"> <a href="profile.php?username=<?php echo $commenters_details['user_name']; ?>" class="rounded-pill accnt_in_comment"><?php echo $commenters_details['full_name'] ?>:</a>&nbsp;
                                                                    <p class="d-inline"><?php echo $post_comments_array[$i]['comment'] ?></p>
                                                                </h6>
                                                            </div>

                                                            <div class="w-100 h-auto like_n_reply pl-3 mt-1">

                                                                <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center">

                                                                    <?php

                                                                    $comments_likes = $post_comments_array[$i]['likes'];

                                                                    $comment_likes_in_array = explode(":", $comments_likes);

                                                                    $likes_number = count($comment_likes_in_array);

                                                                    if (in_array($_SESSION['user_key']['id'], $comment_likes_in_array)) {

                                                                    ?>
                                                                        <i class="far fa-heart comment_like_btn inactive" onclick="like_the_comment('<?php echo $_SESSION['user_key']['id']  ?>', '<?php echo $run['id']  ?>', '<?php echo $i ?>')"></i>
                                                                        <i class="fas fa-heart comment_dislike_btn" onclick="dis_like_the_comment('<?php echo $_SESSION['user_key']['id']  ?>', '<?php echo $run['id']  ?>', '<?php echo $i ?>')"></i>

                                                                    <?php } else { ?>

                                                                        <i class="far fa-heart comment_like_btn" onclick="like_the_comment('<?php echo $_SESSION['user_key']['id']  ?>', '<?php echo $run['id']  ?>', '<?php echo $i ?>')"></i>
                                                                        <i class="fas fa-heart comment_dislike_btn inactive" onclick="dis_like_the_comment('<?php echo $_SESSION['user_key']['id']  ?>', '<?php echo $run['id']  ?>', '<?php echo $i ?>')"></i>
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center">
                                                                    <small>( <b class="comment_like_no"> <?php
                                                                                                            if ($post_comments_array[$i]['likes'] == null || $post_comments_array[$i]['likes'] == "") {
                                                                                                                echo 0;
                                                                                                            } else {
                                                                                                                echo $likes_number;
                                                                                                            }
                                                                                                            ?> </b>)</small>
                                                                </div>

                                                                <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center">
                                                                    <?php if ($post_comments_array[$i]['id'] == $_SESSION['user_key']['id']) { ?>

                                                                        &nbsp;&nbsp; <small class="delete_btn_cmmnt" onclick="delete_btn('<?php echo $run['id']  ?>', '<?php echo $i ?>')">Delete</small>
                                                                    <?php } else if ($run['user_id'] == $_SESSION['user_key']['id']) {
                                                                    ?>
                                                                        &nbsp;&nbsp; <small class="reply_btn_cmmnt" onclick="reply_btn('<?php echo $commenters_details['user_name'] ?>', '<?php echo $post_comments_array[$i]['id'] ?>')">Reply</small>
                                                                        &nbsp;&nbsp; <small class="delete_btn_cmmnt" onclick="delete_btn('<?php echo $run['id']  ?>', '<?php echo $i ?>')">Delete</small>
                                                                    <?php
                                                                    } else { ?>
                                                                        &nbsp;&nbsp; <small class="reply_btn_cmmnt" onclick="reply_btn('<?php echo $commenters_details['user_name'] ?>', '<?php echo $post_comments_array[$i]['id'] ?>')">Reply</small>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                <?php }
                                        }

                                        echo '</div>';
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
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




    <!-- Modal -->
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

    <div id="error"></div>

<?php

    include 'include/footer.php';
}
?>