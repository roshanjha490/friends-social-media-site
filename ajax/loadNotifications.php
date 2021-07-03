<?php

include '../include/connect.php';

session_start();

if (!$_POST['user_id']) {
    header("location:index.php");
} else {

    $notification_array_json = $server_Obj->load_notification($_SESSION['user_key']['id']);

    if ($notification_array_json == null || $notification_array_json == " ") {
        echo '<div class="w-100 px-3 py-5 d-flex justify-content-center align-items-center h-auto">
                    <p class="m-0 pHeading"><b>There is no notification for you</b></p>
                </div>';
    } else {

        $notification_array = json_decode($notification_array_json, true);

        // $notification_array = array(
        //     "inactive" => array(
        //         array("id_related" => 10, "status" => "unseen", "link" => "profile.php", "type" => "follow"),
        //         array("id_related" => 10, "status" => "unseen", "link" => "profile.php", "type" => "post_like", "post_id" => 12,),
        //         array("id_related" => 10, "status" => "unseen", "link" => "profile.php", "type" => "post_reply", "post_id" => 12, "comment_id" => 17),
        //         array("id_related" => 10, "status" => "unseen", "link" => "profile.php", "type" => "post_comment", "post_id" => 12, "comment_id" => 17),
        //     ),

        //     "active" => array(
        //         array("id_related" => 12, "status" => "unseen", "link" => "profile.php", "type" => "follow"),
        //         array("id_related" => 13, "status" => "unseen", "link" => "profile.php", "type" => "post_like"),
        //     ),
        // );
?>

        <div class="w-100 h-auto new_notifications">

            <?php

            $number_of_new_notifications = count($notification_array['inactive']);

            if ($number_of_new_notifications == 0) {
            } else {
                // echo '<div class="w-100 px-3 h-auto pb-2">
                //         <p class="m-0 pHeading"><b>New Notifications</b></p>
                //     </div>';
                for ($i = 0; $i < $number_of_new_notifications; $i++) {

            ?>

                    <div class="w-100 h-auto" style="background-color: <?php if ($notification_array['inactive'][$i]['status'] == 'unseen') {
                                                                            echo "#33333321";
                                                                        } else {
                                                                            echo "white";
                                                                        } ?>">


                        <?php if ($notification_array['inactive'][$i]['type'] == 'follow') { ?>

                            <div class="follow_notifications w-100" onclick="Action_notification('active', <?php echo $i ?>, 'follow')">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <div class="notify_pic overflow-hidden d-flex justify-content-center align-items-center">
                                            <?php
                                            $user_in_notify = $server_Obj->load_user_profile($notification_array['inactive'][$i]['id_related']);

                                            $user_in_notfify_img = $user_in_notify['profile_pic'];

                                            $user_in_notfify_name = $user_in_notify['full_name'];
                                            ?>
                                            <img src="<?php echo $user_in_notfify_img ?>" class="h-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-10 p-0 d-flex justify-content-start align-items-center">
                                        <p class="m-0"><b><?php echo $user_in_notfify_name ?></b> started following you.</p>
                                    </div>
                                </div>
                            </div>

                        <?php } elseif ($notification_array['inactive'][$i]['type'] == 'post_like') { ?>

                            <div class="follow_notifications w-100" onclick="Action_notification('active', <?php echo $i ?>, 'follow')">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <div class="notify_pic overflow-hidden d-flex justify-content-center align-items-center">
                                            <?php
                                            $user_in_notify = $server_Obj->load_user_profile($notification_array['inactive'][$i]['id_related']);

                                            $user_in_notfify_img = $user_in_notify['profile_pic'];

                                            $user_in_notfify_name = $user_in_notify['full_name'];
                                            ?>
                                            <img src="<?php echo $user_in_notfify_img ?>" class="h-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-10 p-0 d-flex justify-content-start align-items-center">
                                        <p class="m-0"><b><?php echo $user_in_notfify_name ?></b> has liked your Post.</p>
                                    </div>
                                </div>
                            </div>

                        <?php  } elseif ($notification_array['inactive'][$i]['type'] == 'post_comment') { ?>

                            <div class="follow_notifications w-100" onclick="Action_notification('active', <?php echo $i ?>, 'post_comment')">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <div class="notify_pic overflow-hidden d-flex justify-content-center align-items-center">
                                            <?php
                                            $user_in_notify = $server_Obj->load_user_profile($notification_array['inactive'][$i]['id_related']);

                                            $user_in_notfify_img = $user_in_notify['profile_pic'];

                                            $user_in_notfify_name = $user_in_notify['full_name'];
                                            ?>
                                            <img src="<?php echo $user_in_notfify_img ?>" class="h-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-10 p-0 d-flex justify-content-start align-items-center">
                                        <p class="m-0 pr-5"><b><?php echo $user_in_notfify_name ?></b> has commented on your Post. "<?php echo $notification_array['inactive'][$i]['comment']; ?>"</p>
                                    </div>
                                </div>
                            </div>

                        <?php  } elseif ($notification_array['inactive'][$i]['type'] == 'post_reply') { ?>

                            <div class="follow_notifications w-100" onclick="Action_notification('active', <?php echo $i ?>, 'post_reply')">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <div class="notify_pic overflow-hidden d-flex justify-content-center align-items-center">
                                            <?php
                                            $user_in_notify = $server_Obj->load_user_profile($notification_array['inactive'][$i]['id_related']);

                                            $user_in_notfify_img = $user_in_notify['profile_pic'];

                                            $user_in_notfify_name = $user_in_notify['full_name'];
                                            ?>
                                            <img src="<?php echo $user_in_notfify_img ?>" class="h-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-10 p-0 d-flex justify-content-start align-items-center">
                                        <p class="m-0 pr-5"><b><?php echo $user_in_notfify_name ?></b> has replied to you.</p>
                                    </div>
                                </div>
                            </div>

                        <?php  } else {
                        } ?>

                    </div>
            <?php
                }
            }

            ?>
        </div>


        <div class="w-100 h-auto old_notifications">

            <?php

            $number_of_old_notifications = count($notification_array['active']);

            if ($number_of_old_notifications == 0) {
            } else {
                //     echo '<div class="w-100 px-3 h-auto pb-2">
                //     <p class="m-0 pHeading"><b>Previous Notifications</b></p>
                // </div>';

                // var_dump($number_of_old_notifications);

                for ($i = 0; $i < $number_of_old_notifications; $i++) {

            ?>

                    <div class="w-100 h-auto" style="background-color: <?php if ($notification_array['active'][$i]['status'] == 'unseen') {
                                                                            echo "#33333321";
                                                                        } else {
                                                                            echo "white";
                                                                        } ?>">



                        <?php if ($notification_array['active'][$i]['type'] == 'follow') { ?>

                            <div class="follow_notifications w-100" onclick="Action_notification('active', <?php echo $i ?>, 'follow')">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <div class="notify_pic overflow-hidden d-flex justify-content-center align-items-center">
                                            <?php
                                            $user_in_notify = $server_Obj->load_user_profile($notification_array['active'][$i]['id_related']);

                                            $user_in_notfify_img = $user_in_notify['profile_pic'];

                                            $user_in_notfify_name = $user_in_notify['full_name'];
                                            ?>
                                            <img src="<?php echo $user_in_notfify_img ?>" class="h-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-10 p-0 d-flex justify-content-start align-items-center">
                                        <p class="m-0"><b><?php echo $user_in_notfify_name ?></b> started following you.</p>
                                    </div>
                                </div>
                            </div>

                        <?php } elseif ($notification_array['active'][$i]['type'] == 'post_like') { ?>

                            <div class="follow_notifications w-100" onclick="Action_notification('active', <?php echo $i ?>, 'post_like')">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <div class="notify_pic overflow-hidden d-flex justify-content-center align-items-center">
                                            <?php
                                            $user_in_notify = $server_Obj->load_user_profile($notification_array['active'][$i]['id_related']);

                                            $user_in_notfify_img = $user_in_notify['profile_pic'];

                                            $user_in_notfify_name = $user_in_notify['full_name'];
                                            ?>
                                            <img src="<?php echo $user_in_notfify_img ?>" class="h-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-10 p-0 d-flex justify-content-start align-items-center">
                                        <p class="m-0"><b><?php echo $user_in_notfify_name ?></b> has liked your Post.</p>
                                    </div>
                                </div>
                            </div>

                        <?php  } elseif ($notification_array['active'][$i]['type'] == 'post_comment') { ?>

                            <div class="follow_notifications w-100" onclick="Action_notification('active', <?php echo $i ?>, 'post_comment')">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <div class="notify_pic overflow-hidden d-flex justify-content-center align-items-center">
                                            <?php
                                            $user_in_notify = $server_Obj->load_user_profile($notification_array['active'][$i]['id_related']);

                                            $user_in_notfify_img = $user_in_notify['profile_pic'];

                                            $user_in_notfify_name = $user_in_notify['full_name'];
                                            ?>
                                            <img src="<?php echo $user_in_notfify_img ?>" class="h-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-10 p-0 d-flex justify-content-start align-items-center">
                                        <p class="m-0 pr-5"><b><?php echo $user_in_notfify_name ?></b> has commented on your Post. "<?php echo $notification_array['active'][$i]['comment']; ?>"</p>
                                    </div>
                                </div>
                            </div>

                        <?php  } elseif ($notification_array['active'][$i]['type'] == 'post_reply') { ?>

                            <div class="follow_notifications w-100" onclick="Action_notification('active', <?php echo $i ?>, 'post_reply')">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <div class="notify_pic overflow-hidden d-flex justify-content-center align-items-center">
                                            <?php
                                            $user_in_notify = $server_Obj->load_user_profile($notification_array['active'][$i]['id_related']);

                                            $user_in_notfify_img = $user_in_notify['profile_pic'];

                                            $user_in_notfify_name = $user_in_notify['full_name'];
                                            ?>
                                            <img src="<?php echo $user_in_notfify_img ?>" class="h-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-10 p-0 d-flex justify-content-start align-items-center">
                                        <p class="m-0 pr-5"><b><?php echo $user_in_notfify_name ?></b> has replied to you.</p>
                                        <!-- <p class="m-0 pr-5"><b><?php // echo $user_in_notfify_name 
                                                                    ?></b> has replied to you. "<?php // echo $notification_array['active'][$i]['comment']; 
                                                                                                ?>"</p> -->
                                    </div>
                                </div>
                            </div>

                        <?php  } else {
                        } ?>
                    </div>
            <?php
                }
            }

            ?>

        </div>



<?php

        if ($number_of_new_notifications == 0) {
        } else {

            for ($i = 0; $i < $number_of_new_notifications; $i++) {
                # code...
                $notification = $notification_array['inactive'][$i];

                array_unshift($notification_array['active'], $notification);

                unset($notification_array['inactive'][$i]);

                $new_notification_array_json = json_encode($notification_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                $server_Obj->update_notification($_SESSION['user_key']['id'], $new_notification_array_json);
            }
        }
        echo '<hr class="mt-1"> <div class="w-100 px-3 d-flex justify-content-center align-items-center h-auto">
                <p class="m-0 pHeading"><b>You have seen all of your Notifications</b></p>
            </div> <hr class="mb-0">';
    }
}

sleep(2);

?>