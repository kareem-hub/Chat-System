<?php
session_start();

?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="registerjs.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../css/registerstyle.css">
<!------ Include the above in your HEAD tag ---------->

<section id="register">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Register</h1>
                    <?php if (!empty($_SESSION['msg-fail'])) {
                    ?>
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <?php
                                echo $_SESSION['msg-fail'];
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if (!empty($_SESSION['msg-succ'])) {
                    ?>
                        <div class="form-group">
                            <div class="alert alert-success">
                                <?php
                                echo $_SESSION['msg-succ'];
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <form role="form" action="regvalidate.php" method="post" id="reg-form" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Type your name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Type your username" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="jobtitle" id="jobtitle" class="form-control" placeholder="Type your job title" required>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Sign Up">
                    </form>
                    <hr>
                </div>
                <a href="..\index.php" class="forget" data-toggle="modal">login here</a>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <hr>
                <p>Page © - 2021</p>
            </div>
        </div>
    </div>
</footer>
<?php
unset($_SESSION['msg-fail']);
unset($_SESSION['msg-succ']);
?>