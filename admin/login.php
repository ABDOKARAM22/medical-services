<?php

require "../config.php";
require DIR . "Func/validat.php";

// Redirect if already logged in
if (isset($_SESSION["admin_is_log"])) {
    header("location:" . BURLA . "index.php");
    exit();
}

// Initialize login attempts counter
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // Brute force protection
    if ($_SESSION['login_attempts'] >= 5) {
        $_SESSION['err_log'] = "Too many failed attempts. Please try again later.";
    } else {

        $admin_email_log    = $_POST['email'];
        $admin_password_log = $_POST['password'];

        // Check fields are not empty and email format is valid
        if (!is_empty($admin_email_log) && !is_empty($admin_password_log)) {
            if (valid_email($admin_email_log)) {

                // Look up user in DB
                $check = get_row("admin", "admin_email", $admin_email_log);

                if ($check && password_verify($admin_password_log, $check['admin_password'])) {
                    // Success — regenerate session to prevent session fixation
                    session_regenerate_id(true);
                    $_SESSION['login_attempts'] = 0;
                    $_SESSION["admin_is_log"]   = $check["admin_name"];
                    header("location:" . BURLA . "index.php");
                    exit();
                } else {
                    $_SESSION['login_attempts']++;
                    $_SESSION['err_log'] = "Invalid email or password.";
                    }
                    
                } else {
                $_SESSION['login_attempts']++;
                $_SESSION['err_log'] = "Please enter a valid email address.";
            }
        } else {
            $_SESSION['err_log'] = "Please fill in all fields.";
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css">

    <title>Dashboard | Login</title>
</head>

<body>

    <div class="cont-login d-flex align-items-center justify-content-around">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>" method="POST" class="border p-5">

            <div class="row">

                <div class="col-sm-12">
                    <h3 class="text-center p-3 text-white">Login</h3>
                </div>

                <div class="col-sm-6 offset-sm-3">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <?php if (isset($_SESSION['err_log'])) { ?>
                        <div class="form-group">
                            <!-- htmlspecialchars to prevent XSS -->
                            <h3 class="alert alert-danger text-center">
                                <?php echo htmlspecialchars($_SESSION['err_log'], ENT_QUOTES, 'UTF-8'); ?>
                            </h3>
                        </div>
                    <?php
                        unset($_SESSION['err_log']);
                    } ?>

                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control btn btn-success" value="Login">
                    </div>

                </div>
            </div>

        </form>
    </div>

    <script src="<?php echo ASSETS; ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/popper.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/bootstrap.min.js"></script>

</body>

</html>