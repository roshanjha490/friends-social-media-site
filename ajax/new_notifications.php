<?php 

include '../include/connect.php';

session_start();

if (!$_POST['user_id']) {
    header("location:index.php");
} else {
    $notification_array_json = $server_Obj->load_notification($_SESSION['user_key']['id']);

    if ($notification_array_json == null || $notification_array_json == " ") {
        echo 0;
    } else {       

        $notification_array = json_decode($notification_array_json, true);
        
        $number_of_new_notifications = count($notification_array['inactive']);

        echo $number_of_new_notifications;
    }
}




?>