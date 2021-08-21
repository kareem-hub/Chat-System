<?php

session_start();

//require the class needed for instatiation of the msg
require 'MsgClass.php';

//create the msg object & store it in messages.json
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['msg']) and isset($_SESSION['username'])) {

    $newMsg = new Msg($_SESSION['username'], $_POST['msg'], date("h:i a"));

    $data = array(
        "username" => $newMsg->get_username(),
        "msg" => $newMsg->get_msg(),
        "date" => $newMsg->get_date()
    );

    $messages = file_get_contents('messages.json');
    $messages = json_decode($messages);
    $messages[] = $data;
    $messages = json_encode($messages);

    file_put_contents('messages.json', $messages);
} else {
    header("location:../index.php");
    die();
}

//return back to profile
header("location:../profiles/profile.php");
