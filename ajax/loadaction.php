<?php

// database connection file 
include '../include/connect.php';

session_start();

$notify_id = $_POST['array_id'];

$notify_status = $_POST['action_status'];

$type = $_POST['action_type'];

if ($_POST['array_id'] == '') {
    header('location:../index.php');
} else {

    if ($type == 'follow') {

        $notification_array_json = $server_Obj->load_notification($_SESSION['user_key']['id']);

        $notification_array = json_decode($notification_array_json, true);

        $notification_array[$notify_status][$notify_id]['status'] = 'seen';

        $action_page = $notification_array[$notify_status][$notify_id]['link'];

        echo $action_page;

        $new_notification_array_json = json_encode($notification_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $server_Obj->update_notification($_SESSION['user_key']['id'], $new_notification_array_json);
    } else if ($type == 'post_like') {

        $notification_array_json = $server_Obj->load_notification($_SESSION['user_key']['id']);

        $notification_array = json_decode($notification_array_json, true);

        $notification_array[$notify_status][$notify_id]['status'] = 'seen';

        $action_page = $notification_array[$notify_status][$notify_id]['link'];

        echo $action_page;

        $new_notification_array_json = json_encode($notification_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $server_Obj->update_notification($_SESSION['user_key']['id'], $new_notification_array_json);
    } else if ($type == 'post_comment') {

        $notification_array_json = $server_Obj->load_notification($_SESSION['user_key']['id']);

        $notification_array = json_decode($notification_array_json, true);

        $notification_array[$notify_status][$notify_id]['status'] = 'seen';

        $action_page = $notification_array[$notify_status][$notify_id]['link'];

        echo $action_page;

        $new_notification_array_json = json_encode($notification_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $server_Obj->update_notification($_SESSION['user_key']['id'], $new_notification_array_json);
    } else if ($type == 'post_reply') {

        $notification_array_json = $server_Obj->load_notification($_SESSION['user_key']['id']);

        $notification_array = json_decode($notification_array_json, true);

        $notification_array[$notify_status][$notify_id]['status'] = 'seen';

        $action_page = $notification_array[$notify_status][$notify_id]['link'];

        echo $action_page;

        $new_notification_array_json = json_encode($notification_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $server_Obj->update_notification($_SESSION['user_key']['id'], $new_notification_array_json);
    }
}
