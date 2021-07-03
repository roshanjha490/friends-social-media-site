<?php

// database connection file 
include '../include/connect.php';

// clearstatcache();
// getting usename and password

$username = $_POST['username'];

$fullName = $_POST['fullname'];

$password = $_POST['password'];

$email = $_POST['email'];

$joined_Date = date("j F Y");

// $post_table_name = ltrim($username, '@') . 'posts';

$status = 'public';

if (!$email) {
    header("location:login.php");
}

// code for username check

if ($_POST['username']) {

    $username = $_POST['username'];

    if (preg_match('/^[A-Za-z]{1}[A-Za-z0-9-_]{2,31}$/', $username)) {
        
        // $username = ltrim($username, '@');

        $username = "@" . $username;

        $num_rows = $server_Obj->check_username($username);

        if ($num_rows == 0) {

            $server_Obj->insert_user($username, $fullName, $password, $email, $joined_Date, $status);

            $server_Obj->login_information_check($username, $password);

            echo "u_rght";
        } else if ($num_rows == 1) {
            echo "u_wrg";
        }
    } else {
        echo "U_val_wrg";
    }
} else {
    echo "u0";
}
