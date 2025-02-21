<?php 
include "inc/head.php" ;
include "inc/nav.php" ;
include "class.php" ;
?>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = !empty($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : null;
    $password = !empty($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : null;


    if (empty($email)) {
        Session::set("email", "email is required to login");
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Session::set("email", "email is invalid");
        }
    }

    if (empty($password)) {
        Session::set("password", "password is required to login");
    } else {
        if (strlen($password) < 2 || strlen($password) > 20) {
            Session::set("password", "password must be greater than 2 char");
        }
    }
    if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
        Session::set("success", "you have login successfully");
    }
} ?>

<body>
    <div class="container">
        <div class="row">
            <div class='col-8 mx-auto m-5'>
                <h2 style="text-align:center; color:#8CCEF9; font-size:100px;">login </h2>
                <form class="row g-3 needs-validation" action='' method="POST">
                    <?php if (Session::has("success") == 'true') { ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <?php Session::flash("success"); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group p-2 m-1">


                        <div class="form-group p-2 m-1">
                            <label for="email" class="form-label" name='email' style="color:white;">email</label>
                            <input type="text" class="form-control" name="email">
                            <?php if (Session::has("email") == 'true') { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?php Session::flash("email"); ?>
                                </div>
                            <?php } ?>

                        </div>

                        <div class="form-group p-2 m-1">
                            <label for="password" class="form-label" name='password' style="color:white;">password</label>
                            <input type="password" class="form-control" name="password">
                            <?php if (Session::has("password") == 'true') { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?php Session::flash("password"); ?>
                                </div>
                            <?php } ?>

                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">login</button>
                        </div>
                    </div>
            </div>
        </div>
        </form>

       <?php include "inc/footer.php" ;?>