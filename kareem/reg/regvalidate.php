<?php

session_start();

function test_input($item)
{
    $item = trim($item);
    $item = stripslashes($item);
    $item = htmlspecialchars($item);
    return $item;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = test_input($_POST['name']);
    $username = test_input($_POST['username']);
    $jobtitle = test_input($_POST['jobtitle']);

    //input validation
    if (strlen($name) < 4) {
        $_SESSION['msg-fail'] = "Name must be at least <strong>4 characters long</strong>";
        header("location:register.php");
        die();
    }
    if (strlen($username) < 4) {
        $_SESSION['msg-fail'] = "Username must be at least <strong>4 characters long</strong>";
        header("location:register.php");
        die();
    }
    if (strlen($jobtitle) < 4) {
        $_SESSION['msg-fail'] = "Job Title must be at least <strong>4 characters long</strong>";
        header("location:register.php");
        die();
    }

    $data = array(
        "name" => $name,
        "username" => $username,
        "jobtitle" => $jobtitle
    );


    //$files = scandir($_SERVER['DOCUMENT_ROOT'] . "\\usernames");

    if (file_exists("..\usernames\\$username.json")) {

        $_SESSION['msg-fail'] = "the username is alredy registered, please log in";
        header("location:register.php");
    } else {

        if (file_put_contents("..\usernames\\$username.json", json_encode($data))) {
            $_SESSION['msg-succ'] = "account created successfully, please log in to access profile";
            header("location:..\index.php");
            die();
        } else {
            $_SESSION['msg-fail'] = "some error happend, please try again later";
            header("location:register.php");
            die();
        }
    }
} else {
    header("location:register.php");
    die();
}
