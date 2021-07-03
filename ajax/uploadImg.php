<?php 

session_start();

include '../include/connect.php';

// if($_POST['user_id']){
//   echo true;
// }

$user_id = $_SESSION['user_key']['id'];

// echo $user_id;

// This page is for uploadinh image with ajax
if($_FILES["file"]['name'] != ''){
    $test =  explode('.', $_FILES["file"]["name"]); 

    $extension = end($test);

    $img_num = $server_Obj->user_images_list($user_id);

    $name = 'user_'.$user_id.'_'.$img_num.'.'.$extension;

    $location = '../img/'.$name;

    move_uploaded_file($_FILES["file"]["tmp_name"], $location);

    $server_Obj->update_user_images_list($user_id, 'img/'.$name);

    echo 'img/'.$name;

}else{
    echo `<div class="alert alert-danger" role="alert">
    A simple danger alert—check it out!
  </div>`;
}

?>