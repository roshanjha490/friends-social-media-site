<?php

include 'include/connect.php';

session_start();

// $abc = $server_Obj->follow_notification(8, 10);

// var_dump($abc);

// if($abc == null || $abc == " "){
//     echo 'skjbvdjbv';
// }else{
//     echo "aslcnja";
// }

// $htmlContent = 'ascnlkan @salkvnklsa asadscv';

// preg_match("/(\@\w+)/", $htmlContent, $match);

// $replied_username = @ $match[0];

// if(!$replied_username){
//     echo "askbvj";
// }else{
//     echo ";pk,pm";
// }


// to load profile info

// $replied_username = "@rshan";

// $abc = $server_Obj->load_profile_info($replied_username);

// if($abc == null){
//     echo "ascn";
// }else{
//     echo "ppl";
// }


//  echo $server_Obj->load_username(4);


// $notify_id = 0;

// $notify_status = 'active';

// $notification_array_json = $server_Obj->load_notification($_SESSION['user_key']['id']);

// $notification_array = json_decode($notification_array_json, true);

// var_dump($notification_array);

// // echo 'new array updated';

// $notification_array[$notify_status][$notify_id]['status'] = 'seen';

// $action_page = $notification_array[$notify_status][$notify_id]['link'];

// echo $action_page;

// var_dump($notification_array);



// $array = array(
//     array('id' => 0, "name" => "Roshan Jha", "class" => "10th"),
//     array('id' => 1, "name" => "Pankaj Jha", "class" => "12th"),
//     array('id' => 2, "name" => "golu Jha", "class" => "2th"),
// );

// var_dump($array);

// unset($array[1]);

// $json = json_encode($array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

// echo $json;

// $array2 = json_decode($json, true);

// var_dump($array2);

// echo count($array2);


echo time();
?>

<div class="follow_details w-100 p-2 d-flex justify-content-end align-items-center">
              <?php

              $current_user_following_string = $server_Obj->get_user_following($_SESSION['user_key']['id']);

              $array_user_following_list = explode(":", $current_user_following_string);

              if (in_array($otherUser['id'], $array_user_following_list)) {

              ?>
                <button type="button" class="d-None follow_user_2 m-0 btn btn-primary rounded-pill h-50" onclick="followUser(<?php echo $otherUser['id'] ?>)">Follow</button>

                <button type="button" class="unfollow_user_2 h-100 m-0 btn btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $otherUser['id'] ?>)">following</button>
                <?php } else {

                if ($otherUser['privacy_status'] == "Private") { ?>

                  <?php


                  $request_string = $_SESSION['user_key']['request_by'];

                  $array_request_by = explode(":", $request_string);


                  if (in_array($otherUser['id'], $array_request_by)) {

                  ?>
                    <button type="button" class="accept_request m-0 btn btn-primary rounded-pill h-50" onclick="followUser(<?php echo $otherUser['id'] ?>)">Accept Request</button>

                    <button type="button" class="unfollow_user d-None h-100 m-0 btn btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $otherUser['id'] ?>)">following</button>

                    <?php
                  } else {

                    $other_user_request_string = $otherUser['request_by'];

                    $other_user_array_request_by = explode(":", $other_user_request_string);


                    if (in_array($_SESSION['user_key']['id'], $other_user_array_request_by)) {
                    ?>

                      <button type="button" class="request_follow h-100 d-None m-0 btn btn-primary rounded-pill" onclick="followUser(<?php echo $otherUser['id']; ?>)">Request</button>

                      <button type="button" class="cancel_request_follow m-0 btn btn-danger btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $otherUser['id']; ?>)">Cancel Request</button>


                    <?php } else {
                    ?>
                      <button type="button" class="request_follow h-100 d-None m-0 btn btn-primary rounded-pill" onclick="followUser(<?php echo $otherUser['id'] ?>)">Request</button>

                      <button type="button" class="cancel_request_follow m-0 btn btn-danger btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $otherUser['id'] ?>)">Cancel Request</button>                                                                                                                          ?>)">Cancel Request</button>
                  <?php

                    }
                  }
                } else {
                  ?>

                  <?php


                  $request_string = $_SESSION['user_key']['request_by'];

                  $array_request_by = explode(":", $request_string);


                  if (in_array($otherUser['id'], $array_request_by)) {

                  ?>
                    <button type="button" class="accept_request m-0 btn btn-primary rounded-pill h-50" onclick="followUser(<?php echo $otherUser['id'] ?>)">Accept Request</button>

                    <button type="button" class="unfollow_user d-None h-100 m-0 btn btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $otherUser['id'] ?>)">following</button>

                  <?php
                  } else {
                  ?>

                    <button type="button" class="follow_user m-0 btn btn-primary rounded-pill h-50" onclick="followUser(<?php echo $otherUser['id'] ?>)">Follow</button>

                    <button type="button" class="unfollow_user d-None h-100 m-0 btn btn-rounded rounded-pill" onclick="unfollowUser(<?php echo $otherUser['id'] ?>)">following</button>

              <?php
                  }
                }
              } ?>
</div>