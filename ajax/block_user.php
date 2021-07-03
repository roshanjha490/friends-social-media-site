<?php

// database connection file 
include '../include/connect.php';

$sh_be_block = intval($_POST['id']);
$id = intval($_POST['sh_be_block']);

if ($_POST['id'] == '') {
    header('location:../index.php');
}

session_start();

$post_likes = $server_Obj->blocked_this_user($id, $sh_be_block);

$post_likes = $server_Obj->unfollow_user($sh_be_block, $id);

$post_likes = $server_Obj->unfollow_user($$id, $sh_be_block);

echo $post_likes;

// echo $id . ' ' . $sh_be_block;
