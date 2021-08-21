<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

    if (file_exists("..\usernames\\$username.json")) {

        $data = file_get_contents("..\usernames\\$username.json");
        $data = json_decode($data);

        if ($data) {

            $_SESSION['name'] = $data->name;
            $_SESSION['username'] = $data->username;
            $_SESSION['jobtitle'] = $data->jobtitle;

            header("location:..\profiles\profile.php", true, 301);
            die();
        } else {
            $_SESSION['msg-fail'] = "error with user data";
            header("location:../index.php");
            die();
        }
    } else {
        $_SESSION['msg-fail'] = "User not found! PLease Register first";
        header("location:../index.php");
        die();
    }
} else {
    header("location:../index.php");
}
