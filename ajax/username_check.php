<?php

include '../include/connect.php';

// getting usename and password

if (!$_POST['username']) {
    header("location:login.php");
}

if ($_POST['username']) {

    $username = $_POST['username'];

    if (preg_match('/^[A-Za-z]{1}[A-Za-z0-9-_]{2,31}$/', $username)) {

        $username = ltrim($username, '@');

        $username = "@" . $username;

        $num_rows = $server_Obj->check_username($username);

        if ($num_rows == 0) {
            echo "u_rght";
        } else {
            echo "u_wrg";
        }
    } else {
        echo "U_val_wrg";
    }
}

sleep(1);
