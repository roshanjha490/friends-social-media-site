<?php

// include contains connect.php file which is connected to our database has
//  Every query related to SQL is in object oriented manner stored in connect.php file

$user;

// If the user is not logged in then this page will get redirected to login.php file

clearstatcache();

$GLOBALS['user'] = $server_Obj->load_user_profile($_SESSION['user_key']['id']);

if (@$_GET['username']) {

    if ($_GET['username'] == $_SESSION['user_key']['user_name']) {
?>

        <!-- Start your project here-->

        <div class="create_post aside">
            <!-- This div has got the header for Create Post Heading-->

            <div class="createPostHeading p-2">
                <h6 class="m-0">Create Post</h6>
            </div>
            <!-- This div have a form for user if he wants to post something-->
            <div class="postForm w-100 h-auto">
                <div class="row">
                    <div class="col-12 px-3 my-2">
                        <div class="row">
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-start">
                                <div class="pic1 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                    <img src="<?php echo $user['profile_pic'] ?>" class="h-100" alt="">
                                </div>
                            </div>
                            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-10 d-flex justify-content-center align-items-center">
                                <textarea id="post_form_Caption" type="text" placeholder="Write Something Here..." class="w-100"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 w-100 py-2 border-top my-2" id="showupload_file_bx">
                        <div class="w-100 h-100 overflow-hidden d-flex justify-content-center align-items-center" id="showupload_file">
                            <img src='' class="w-100" alt="" id="Post_Image">
                        </div>
                    </div>

                    <div class="col-12 w-100 h-auto p-0" id="uploadPostErr">
                        <div class="m-0 alert alert-danger" role="alert">
                            Invalid file format Use only gif, png, jpg, jpeg
                        </div>
                    </div>

                    <div class="col-12 p-0 border-top w-100 h-auto">
                        <div class="row">
                            <div class="col-6 fileIcon w-100 h-100 d-flex justify-content-start align-items-center" id="fileIcon">
                                <ul id="fileIconList" class="m-0">
                                    <li>
                                        <div title="Photo" onclick="chooseFile()" class="upload_icn d-flex justify-content-center align-items-center">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div title="Video" onclick="chooseFile()" class="upload_icn d-flex justify-content-center align-items-center">
                                            <i class="fas fa-video"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div title="Audio File" onclick="chooseFile()" class="upload_icn d-flex justify-content-center align-items-center">
                                            <i class="fas fa-file-audio"></i>
                                        </div>
                                    </li>
                                </ul>

                                <!-- <div title="Photo" onclick="chooseFile()" class="upload_icn d-flex justify-content-center align-items-center">
                                <i class="fas fa-image"></i>
                            </div> -->

                                <!-- <div id="fileIconList" class="w-auto h-auto upload_icn py-2 px-3" onclick="chooseFile()">
                                <div class="Photo_icn d-inline-block position-relative">
                                    <i class="fas fa-image m-0 position-absolute"></i>
                                </div>
                                <p class="m-0 d-inline-block"><b>Add Photo/Video</b></p>
                            </div> -->


                            </div>
                            <div class="col-6 p-0 w-100 h-100">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-3 p-0 w-100 h-100 justify-content-center align-items-center">
                                        <button type="button" id="cancelFormBtn" class="btn btn-danger btn-rounded rounded-pill">Cancel</button>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-9 p-0 w-100 h-100 justify-content-center align-items-center">
                                        <button type="button" id="postFormBtn" class="btn btn-primary btn-rounded rounded-pill" disabled>Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- This div has all the post that our user News feed is going to show him Bases to his followers -->
        <?php

        $current_users_view = $server_Obj->load_other_user_newsfeed($_GET['username']);

        $num_row = mysqli_num_rows($current_users_view);

        if ($num_row == 0) {

        ?>
            <div class="w-100" id="showPost_bx">

                <div class="w-100 mt-2" id="nopost_bx">
                    <div class="nopost_div w-100 d-flex justify-content-center align-items-center">
                        <div class="w-auto h-auto">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <h4 class="m-0">No Posts to Show</h4>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <p class="m-0">Create Posts or Follow people</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php } else {

            while ($run = mysqli_fetch_array($current_users_view)) {

            ?>

                <div class="w-100" id="showPost_bx">
                    <div class="post mt-2">
                        <div class="postHeading w-100 px-3 py-2">
                            <div class="row">
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
                                    <a href="profile.php?username=<?php echo $run['post_username']; ?>" class="pic2 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="<?php echo $run['post_userprofile_pic'] ?>" class="h-100" alt="user_profile">
                                    </a>
                                </div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-8 px-2 d-flex align-items-center">
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
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
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
                                        <a class="m-0" style="text-decoration-line: none; cursor: default;"><span class="likes_number_info">0</span> Likes,</a>

                                    <?php } else {
                                        $post_likes = $server_Obj->get_post_likes($run['id']);

                                        $post_likes_in_array = explode(":", $post_likes);

                                        $likes_number = count($post_likes_in_array);
                                    ?>
                                        <a class="new_rct_like_info m-0" onclick="get_post_likers_info(<?php echo $run['id'] ?>)" data-toggle="modal" data-target="#exampleModalCenter"><span class="likes_number_info"><?php echo $likes_number ?></span> Likes,</a>
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
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
                                    <div class="pic3 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="<?php echo $user['profile_pic'] ?>" class="h-100" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-8 px-2">
                                    <input class="user_post_comment w-100 h-100 px-3 rounded-pill" type="text" placeholder="Write a comment..." class="w-100 h-100">
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
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

                                    // $post_comments_array = array_reverse($post_comments_array);

                                    echo '<div class="px-4 py-2">';

                                    for ($i = 0; $i < $comment_number; $i++) {


                                        $commenters_details = $server_Obj->load_user_profile($post_comments_array[$i]['id']);
                            ?>
                                        <div class="w-100 h-auto mb-3">
                                            <div class="row">
                                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-start">
                                                    <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>">
                                                        <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                                    </a>
                                                </div>
                                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-10 p-0 h-auto">

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

                                    echo '</div>';
                                } elseif ($comment_number > 2) {

                                    // $post_comments_array = array_reverse($post_comments_array);

                                    echo '<div class="px-4 py-2">';

                                    for ($i = 0; $i < 2; $i++) {

                                        $commenters_details = $server_Obj->load_user_profile($post_comments_array[$i]['id']);

                                    ?>

                                        <div class="w-100 h-auto mb-3">
                                            <div class="row">
                                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-start">
                                                    <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>">
                                                        <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                                    </a>
                                                </div>
                                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-10 p-0 h-auto">

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
                                    echo '<a href="post?post_id=' . $run["id"] . '">Load Previous Comments</a> </div>';
                                }
                            } ?>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <div class="w-100 mt-2 d-flex justify-content-center align-items-center" id="end_post">
                <h5 class="m-0">You Have Seen all of your's Posts</h5>
            </div>

        <?php
        }
        ?>



        <div id="ajax_rslts"></div>

        <form id="img_upload_form">
            <input id="file-input" type="file" name="file" class="d-none">
        </form>

    <?php
    } else {
    ?>
        <!-- Start your project here-->

        <div class="create_post aside">
            <!-- This div has got the header for Create Post Heading-->

            <?php $other_user_id = $server_Obj->load_profile_info($_GET['username']) ?>

            <div class="createPostHeading p-2">
                <h6 class="m-0"><?php echo $other_user_id['full_name'] ?>'s Posts</h6>
            </div>
            <!-- This div have a form for user if he wants to post something-->
        </div>
        <!-- This div has all the post that our user News feed is going to show him Bases to his followers -->
        <?php

        $current_users_view = $server_Obj->load_other_user_newsfeed($_GET['username']);

        $num_row = mysqli_num_rows($current_users_view);

        if ($num_row == 0) {

        ?>
            <div class="w-100" id="showPost_bx">

                <div class="w-100 mt-2" id="nopost_bx">
                    <div class="nopost_div w-100 d-flex justify-content-center align-items-center">
                        <div class="w-auto h-auto">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <h5 class="m-0"><?php echo $other_user_id['full_name'] ?> has not posted yet</h5>
                                </div>
                                <!-- <div class="col-12 d-flex justify-content-center align-items-center">
                                        <p class="m-0">Create Posts or Follow people</p>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php } else {

            while ($run = mysqli_fetch_array($current_users_view)) {

            ?>

                <div class="w-100" id="showPost_bx">
                    <div class="post mt-2">
                        <div class="postHeading w-100 px-3 py-2">
                            <div class="row">
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
                                    <a href="profile.php?username=<?php echo $run['post_username']; ?>" class="pic2 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="<?php echo $run['post_userprofile_pic'] ?>" class="h-100" alt="user_profile">
                                    </a>
                                </div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-8 px-2 d-flex align-items-center">
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
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
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
                                        <a class="m-0" style="text-decoration-line: none; cursor: default;"><span class="likes_number_info">0</span> Likes,</a>

                                    <?php } else {
                                        $post_likes = $server_Obj->get_post_likes($run['id']);

                                        $post_likes_in_array = explode(":", $post_likes);

                                        $likes_number = count($post_likes_in_array);
                                    ?>
                                        <a class="new_rct_like_info m-0" onclick="get_post_likers_info(<?php echo $run['id'] ?>)" data-toggle="modal" data-target="#exampleModalCenter"><span class="likes_number_info"><?php echo $likes_number ?></span> Likes,</a>
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
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
                                    <div class="pic3 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="<?php echo $user['profile_pic'] ?>" class="h-100" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-8 px-2">
                                    <input class="user_post_comment w-100 h-100 px-3 rounded-pill" type="text" placeholder="Write a comment..." class="w-100 h-100">
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
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

                                    // $post_comments_array = array_reverse($post_comments_array);

                                    echo '<div class="px-4 py-2">';

                                    for ($i = 0; $i < $comment_number; $i++) {


                                        $commenters_details = $server_Obj->load_user_profile($post_comments_array[$i]['id']);
                            ?>
                                        <div class="w-100 h-auto mb-3">
                                            <div class="row">
                                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-start">
                                                    <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>">
                                                        <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                                    </a>
                                                </div>
                                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-10 p-0 h-auto">

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

                                    echo '</div>';
                                } elseif ($comment_number > 2) {

                                    // $post_comments_array = array_reverse($post_comments_array);

                                    echo '<div class="px-4 py-2">';

                                    for ($i = 0; $i < 2; $i++) {

                                        $commenters_details = $server_Obj->load_user_profile($post_comments_array[$i]['id']);

                                    ?>

                                        <div class="w-100 h-auto mb-3">
                                            <div class="row">
                                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-start">
                                                    <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>">
                                                        <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                                    </a>
                                                </div>
                                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-10 p-0 h-auto">

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
                                    echo '<a href="post?post_id=' . $run["id"] . '">Load Previous Comments</a> </div>';
                                }
                            } ?>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <div class="w-100 mt-2 d-flex justify-content-center align-items-center" id="end_post">
                <h5 class="m-0">You Have Seen all of <?php echo $other_user_id['full_name'] ?>'s Posts</h5>
            </div>

        <?php
        }
        ?>

        <div id="ajax_rslts"></div>

        <form id="img_upload_form">
            <input id="file-input" type="file" name="file" class="d-none">
        </form>

    <?php }
} else {
    $GLOBALS['user'] = $server_Obj->load_user_profile($_SESSION['user_key']['id']);
    ?>

    <!-- Start your project here-->

    <div class="create_post aside">
        <!-- This div has got the header for Create Post Heading-->

        <div class="createPostHeading p-2">
            <h6 class="m-0">Create Post</h6>
        </div>
        <!-- This div have a form for user if he wants to post something-->
        <div class="postForm w-100 h-auto">
            <div class="row">
                <div class="col-12 px-3 my-2">
                    <div class="row">
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-start">
                            <div class="pic1 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                <img src="<?php echo $user['profile_pic'] ?>" class="h-100" alt="">
                            </div>
                        </div>
                        <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-10 d-flex justify-content-center align-items-center">
                            <textarea id="post_form_Caption" type="text" placeholder="Write Something Here..." class="w-100"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 w-100 py-2 border-top my-2" id="showupload_file_bx">
                    <div class="w-100 h-100 overflow-hidden d-flex justify-content-center align-items-center" id="showupload_file">
                        <img src='' class="w-100" alt="" id="Post_Image">
                    </div>
                </div>

                <div class="col-12 w-100 h-auto p-0" id="uploadPostErr">
                    <div class="m-0 alert alert-danger" role="alert">
                        Invalid file format
                    </div>
                </div>

                <div class="col-12 p-0 border-top w-100 h-auto">
                    <div class="row">
                        <div class="col-6 fileIcon w-100 h-100 d-flex justify-content-start align-items-center" id="fileIcon">
                            <ul id="fileIconList" class="m-0">
                                <li>
                                    <div title="Photo" onclick="chooseFile()" class="upload_icn d-flex justify-content-center align-items-center">
                                        <i class="fas fa-image"></i>
                                    </div>
                                </li>
                                <li>
                                    <div title="Video" onclick="chooseFile()" class="upload_icn d-flex justify-content-center align-items-center">
                                        <i class="fas fa-video"></i>
                                    </div>
                                </li>
                                <li>
                                    <div title="Audio File" onclick="chooseFile()" class="upload_icn d-flex justify-content-center align-items-center">
                                        <i class="fas fa-file-audio"></i>
                                    </div>
                                </li>
                            </ul>

                            <!-- <div title="Photo" onclick="chooseFile()" class="upload_icn d-flex justify-content-center align-items-center">
                                <i class="fas fa-image"></i>
                            </div> -->

                            <!-- <div id="fileIconList" class="w-auto h-auto upload_icn py-2 px-3" onclick="chooseFile()">
                                <div class="Photo_icn d-inline-block position-relative">
                                    <i class="fas fa-image m-0 position-absolute"></i>
                                </div>
                                <p class="m-0 d-inline-block"><b>Add Photo/Video</b></p>
                            </div> -->


                        </div>
                        <div class="col-6 p-0 w-100 h-100">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-3 p-0 w-100 h-100 justify-content-center align-items-center">
                                    <button type="button" id="cancelFormBtn" class="btn btn-danger btn-rounded rounded-pill">Cancel</button>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-9 p-0 w-100 h-100 justify-content-center align-items-center">
                                    <button type="button" id="postFormBtn" class="btn btn-primary btn-rounded rounded-pill" disabled>Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- This div has all the post that our user News feed is going to show him Bases to his followers -->
    <?php

    $current_users_view = $server_Obj->load_userView($_SESSION['user_key']['id']);

    $num_row = mysqli_num_rows($current_users_view);

    if ($num_row == 0) {

    ?>
        <div class="w-100" id="showPost_bx">

            <div class="w-100 mt-2" id="nopost_bx">
                <div class="nopost_div w-100 d-flex justify-content-center align-items-center">
                    <div class="w-auto h-auto">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <h4 class="m-0">No Posts to Show</h4>
                            </div>
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <p class="m-0">Create Posts or Follow people</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php } else {

        while ($run = mysqli_fetch_array($current_users_view)) {

        ?>

            <div class="w-100" id="showPost_bx">
                <div class="post mt-2">
                    <div class="postHeading w-100 px-3 py-2">
                        <div class="row">
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
                                <a href="profile.php?username=<?php echo $run['post_username']; ?>" class="pic2 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                    <img src="<?php echo $run['post_userprofile_pic'] ?>" class="h-100" alt="user_profile">
                                </a>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-8 px-2 d-flex align-items-center">
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
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
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
                                    <a class="m-0" style="text-decoration-line: none; cursor: default;"><span class="likes_number_info">0</span> Likes,</a>

                                <?php } else {
                                    $post_likes = $server_Obj->get_post_likes($run['id']);

                                    $post_likes_in_array = explode(":", $post_likes);

                                    $likes_number = count($post_likes_in_array);
                                ?>
                                    <a class="new_rct_like_info m-0" onclick="get_post_likers_info(<?php echo $run['id'] ?>)" data-toggle="modal" data-target="#exampleModalCenter"><span class="likes_number_info"><?php echo $likes_number ?></span> Likes,</a>
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
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
                                <div class="pic3 overflow-hidden rounded-circle d-flex justify-content-center align-items-center">
                                    <img src="<?php echo $user['profile_pic'] ?>" class="h-100" alt="">
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-8 px-2">
                                <input class="user_post_comment w-100 h-100 px-3 rounded-pill" type="text" placeholder="Write a comment..." class="w-100 h-100">
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-center">
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

                                // $post_comments_array = array_reverse($post_comments_array);

                                echo '<div class="px-4 py-2">';

                                for ($i = 0; $i < $comment_number; $i++) {


                                    $commenters_details = $server_Obj->load_user_profile($post_comments_array[$i]['id']);
                        ?>
                                    <div class="w-100 h-auto mb-3">
                                        <div class="row">
                                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-start">
                                                <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>">
                                                    <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                                </a>
                                            </div>
                                            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-10 p-0 h-auto">

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

                                echo '</div>';
                            } elseif ($comment_number > 2) {

                                // $post_comments_array = array_reverse($post_comments_array);

                                echo '<div class="px-4 py-2">';

                                for ($i = 0; $i < 2; $i++) {

                                    $commenters_details = $server_Obj->load_user_profile($post_comments_array[$i]['id']);

                                ?>

                                    <div class="w-100 h-auto mb-3">
                                        <div class="row">
                                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 p-0 d-flex justify-content-center align-items-start">
                                                <a href="profile.php?username=<?php echo ltrim($commenters_details['user_name'], '@'); ?>">
                                                    <img src="<?php echo $commenters_details['profile_pic'] ?>" class="comments_pic" alt="...">
                                                </a>
                                            </div>
                                            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-10 p-0 h-auto">

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
                                echo '<a href="post?post_id=' . $run["id"] . '">Load Previous Comments</a> </div>';
                            }
                        } ?>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="w-100 mt-2 d-flex justify-content-center align-items-center" id="end_post">
            <h5 class="m-0">You Have Seen all of your's Posts</h5>
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
    }
    ?>



    <div id="ajax_rslts"></div>

    <form id="img_upload_form">
        <input id="file-input" type="file" name="file" class="d-none">
    </form>
<?php } ?>