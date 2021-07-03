<?php

include '../include/connect.php';

session_start();

// varible storing the logged in user information stored in session variable as an array
$user = $_SESSION['user_key'];

// varible storing the user unique id in stored in the database
$user_id = $user['id'];

$post_username = $user['user_name'];

$post_fullname = $user['full_name'];

$post_userprofile_pic = $user['profile_pic'];

// variable storing the caption of the post
$Post_Caption = $_POST['Post_Caption'];

// variable storing the image of the post
$Post_Image = $_POST['Post_Image'];

// if the post caption is not by post method then this page will get redirectted to the index.php file
if (!$Post_Caption) {
    header("location:index.php");
}

// Date setting the default indian time zone 
date_default_timezone_set("Asia/Kolkata");

// method ginving the current with seconds accuuracy
$php_date =  date("Y-m-d h:i:s");


// Variale is storing what value is returned when the insert post method 
// is called from $server_obj in the connect.php file
$run = $server_Obj->insert_post($user_id, $post_username, $post_fullname, $post_userprofile_pic, $Post_Caption, $Post_Image, $php_date);

// $run = $server_Obj->load_post($user_id, $php_date);

?>

<div class="w-100" id="showPost_bx">
    <div class="post mt-2">
        <div class="postHeading w-100 px-3 py-2">
            <div class="row">
                <div class="col-1 p-0 d-flex justify-content-center align-items-center">
                    <a href="profile.php?username=<?php echo ltrim($run['post_username'], '@'); ?>" class="pic2 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                        <img src="<?php echo $run['post_userprofile_pic'] ?>" class="h-100" alt="user_profile">
                    </a>
                </div>
                <div class="col-10 px-2 d-flex align-items-center">
                    <p class="m-0"> <a href="profile.php?username=<?php echo ltrim($run['post_username'], '@'); ?>"><?php echo $run['post_fullname'] ?></a><small class="d-block"><?php  ?>Just Now</small></p>
                </div>
                <div class="col-1 p-0 d-flex justify-content-center align-items-center">
                    <i class="fas fa-ellipsis-h p-3 rounded-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                    <?php if ($run['user_id'] == $_SESSION['user_key']['id']) { ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item delete_post" onclick="deleteMyPost(<?php echo $run['id'] ?>)">Delete</a>
                            <a class="dropdown-item" href="post?post_id=<?php echo $run['id'] ?>">Go to Post</a>
                        </div>
                    <?php } else { ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Report Inappropriate</a>
                            <a class="dropdown-item unfollow_user_post" onclick="unfollowUser(<?php echo $run['user_id'] ?>)">Unfollow</a>
                            <a class="dropdown-item" href="post?post_id=<?php echo $run['id'] ?>">Go To Post</a>
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
                        <a class="m-0" href="post?post_id=<?php echo $run['id'] ?>"><span class="likes_number_info">0</span> Likes,</a>

                    <?php } else {
                        $post_likes = $server_Obj->get_post_likes($run['id']);

                        $post_likes_in_array = explode(":", $post_likes);

                        $likes_number = count($post_likes_in_array);
                    ?>
                        <a class="m-0" href="post?post_id=<?php echo $run['id'] ?>"><span class="likes_number_info"><?php echo $likes_number ?></span> Likes,</a>
                    <?php } ?>
                    &nbsp;
                    <?php
                    if ($run['post_comments'] == null) { ?>
                        <a class="m-0" href="post?post_id=<?php echo $run['id'] ?>"><span class="commnts_number_info">0</span> Comments</a>
                    <?php } else {

                        $post_comments_array = json_decode($run['post_comments'], true);

                        $comment_number = count($post_comments_array);
                    ?>
                        <a class="m-0" href="post?post_id=<?php echo $run['id'] ?>"><span class="commnts_number_info"><?php echo $comment_number ?></span> Comments</a>
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
                } elseif ($comment_number <= 2) {

                    $post_comments_array = array_reverse($post_comments_array);

                    echo '<div class="px-4 py-2">';

                    for ($i = 0; $i < $comment_number; $i++) {
            ?>
                        <div class="w-100 h-auto mb-3">
                            <div class="row">
                                <div class="col-1 p-0 d-flex justify-content-center align-items-start">
                                    <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>">
                                        <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                    </a>
                                </div>
                                <div class="col-11 p-0 h-auto">

                                    <div class="w-auto h-auto userComment px-3 py-2 d-inline-flex justify-content-center align-items-center">
                                        <h6 class="mb-0 d-inline"> <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>" class="rounded-pill accnt_in_comment"><?php echo $commenters_details['full_name'] ?>:</a>&nbsp;
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
                                            <?php } else { ?>
                                                &nbsp;&nbsp; <small class="reply_btn_cmmnt" onclick="reply_btn('<?php echo $commenters_details['user_name'] ?>', '<?php echo $post_comments_array[$i]['id'] ?>')">Reply</small>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php }

                    echo '</div>';
                } elseif ($comment_number > 2) {

                    // $post_comments_array = array_reverse($post_comments_array);

                    echo '<div class="px-4 py-2">';

                    for ($i = 0; $i < 2; $i++) {

                        $commenters_details = $server_Obj->load_user_profile($post_comments_array[$i]['id']);

                    ?>

                        <div class="w-100 h-auto mb-3">
                            <div class="row">
                                <div class="col-1 p-0 d-flex justify-content-center align-items-start">
                                    <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>">
                                        <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                    </a>
                                </div>
                                <div class="col-11 p-0 h-auto">

                                    <div class="w-auto h-auto userComment px-3 py-2 d-inline-flex justify-content-center align-items-center">
                                        <h6 class="mb-0 d-inline"> <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>" class="rounded-pill accnt_in_comment"><?php echo $commenters_details['full_name'] ?>:</a>&nbsp;
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
                                            <?php } else { ?>
                                                &nbsp;&nbsp; <small class="reply_btn_cmmnt" onclick="reply_btn('<?php echo $commenters_details['user_name'] ?>', '<?php echo $post_comments_array[$i]['id'] ?>')">Reply</small>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

            <?php }
                    echo '<a href="post?post_id=' . $run["id"] . '">Load Previous Comments</a> </div>';
                }
            } ?>
        </div>
    </div>
</div>