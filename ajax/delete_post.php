<?php 

include '../include/connect.php';

session_start();

if(!$_POST['Post_id']){
    header("location:index.php");
}else{
    $post_id = $_POST['Post_id']; 

    // echo $post_id;

    echo $server_Obj->delete_myPost($post_id);
}

?>