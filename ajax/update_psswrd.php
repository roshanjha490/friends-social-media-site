<?php


include '../include/connect.php';

session_start();



$id = $_POST['user_id'];

$old_passwrd = $_POST['old_psswrd'];

$new_psswrd = $_POST['new_psswrd'];


echo $server_Obj->update_passwrd($id, $old_passwrd, $new_psswrd);


?>