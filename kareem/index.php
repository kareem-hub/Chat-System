<?php
session_start();
?>

<!-- -----------------------------------------------links------------------------------------------  -->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="loginjs.js"></script>
<link rel="stylesheet" href="css/loginstyle.css">

<!-- ---------------------------------------------content------------------------------------------ -->

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Log in with your username</h1>
                    <?php if (!empty($_SESSION['msg-succ'])) {
                    ?>
                        <div class="form-group">
                            <div class="alert alert-success">
                                <center>
                                    <?php
                                    echo $_SESSION['msg-succ'];
                                    ?>
                                </center>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if (!empty($_SESSION['msg-fail'])) {
                    ?>
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <center>
                                    <?php
                                    echo $_SESSION['msg-fail'];
                                    ?>
                                </center>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <form role="form" action="login/loginvalidate.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Type your username" required>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log In">
                    </form>
                    <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                    <hr>
                    <a href="reg\register.php" class="forget">Register here</a>
                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Page © - 2021</p>
            </div>
        </div>
    </div>
</footer>
<?php
unset($_SESSION['msg-fail']);
unset($_SESSION['msg-succ']);
session_destroy();
?>