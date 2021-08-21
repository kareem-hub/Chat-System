<?php

if (isset($_SERVER['HTTP_REFERER'])) {
    //ignore warnings
    error_reporting(0);

    session_start();

    //read messages.json file and store it in $msgs array
    $file = file_get_contents("../chat/messages.json");
    $msgs = json_decode($file);

?>

    <!-- -----------------------------------------------links------------------------------------------  -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/profilestyle.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- ---------------------------------------------profile section------------------------------------------ -->

    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <center>
                        <img src="../images/avatar.png" alt="sunil">
                    </center>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <?php
                            if (isset($_SESSION['name'])) echo $_SESSION['name'];
                            ?>
                        </div>
                        <div class="profile-usertitle-username">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo "@" . $_SESSION['username'];
                            } else {
                                header("location:../index.php");
                                die();
                            }
                            ?>
                        </div>
                        <div class="profile-usertitle-job">
                            <?php
                            if (isset($_SESSION['jobtitle'])) echo $_SESSION['jobtitle'];
                            ?>
                        </div>
                    </div>

                    <!-- SIDEBAR BUTTONS -->

                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-success btn-sm">Edit Profile</button>
                        <a href="logout.php" class="btn btn-custom btn-sm">Log Out</a>
                    </div>


                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="#">
                                    <i class="glyphicon glyphicon-home"></i>
                                    Overview </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Account Settings </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    Tasks </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    Help </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <center>
                    <div class="powered">

                        <strong>Powered by <a href="http://www.instagram.com/kareem.aladawy" target="_blank">Kareem Aladawy</a></strong>

                    </div>
                </center>
            </div>

            <!-- ---------------------------------------------chat section------------------------------------------ -->

            <div class="profile-content">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="mesgs">
                            <div class="msg_history">
                                <?php
                                //looping through msgs
                                foreach ($msgs as &$msg) {
                                    //check if msg is incoming or outgoing
                                    if ($msg->username == $_SESSION['username']) {
                                        echo
                                        "<div class=\"outgoing_msg\">
                                            <div class=\"sent_msg\">
                                                 <p>$msg->msg</p>
                                                <span class=\"time_date\"> $msg->date </span>
                                             </div>
                                        </div>";
                                    } else {
                                        echo "<div class=\"incoming_msg\">
                                    <h4>$msg->username</h4>
                                        <div class=\"incoming_msg_img\"> <img src=\"../images/avatar.png\" alt=\"sunil\"> </div>
                                        <div class=\"received_msg\">
                                            <div class=\"received_withd_msg\">
                                                <p>$msg->msg</p>
                                                <span class=\"time_date\"> $msg->date </span>
                                            </div>
                                        </div>
                                    </div>";
                                    }
                                }
                                // unset($msg);
                                ?>
                            </div>
                            <div class="type_msg">
                                <div class="input_msg_write">
                                    <form action="..\chat\processMsgs.php" method="post">
                                        <input type="text" name="msg" class="write_msg" placeholder="Type a message" />
                                        <input type="submit" name="send" id="" value="Send" class="msg_send_btn" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    header("location:../index.php");
    die();
}
