<?php require "../config.php" ?>
<?php require DIR . "Func/validat.php" ?>
<?php if(isset($_SESSION["admin_is_log"])){
    header("location:".BURLA."index.php");
}  ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css">

    <title>Dashboard | Login</title>
</head>
<?php
//_check a type for REQUEST_METHOD..
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $admin_email_log = $_POST['email'];
    $admin_password_log = $_POST['password'];
    //check if email and password not empty and email is valid..
    if (!is_empty($admin_email_log) && !is_empty($admin_password_log)) {
        if(valid_email($admin_email_log)){
           //check if the email is found in db , and get the hash_pass from db to combarn with password inserted. 
           $check= get_row("admin","admin_email","$admin_email_log");
           if($check){
               $check_pass= password_verify($admin_password_log,$check['admin_password']);
                    if($check_pass){
                        $_SESSION["admin_is_log"]=$check["admin_name"];
                        header("location:".BURLA."index.php");
                    }else
                    $_SESSION['err_log'] = "The Password is wrong..";
           }else{
                $_SESSION['err_log'] = "The Email is incorrect..";
           }

        
        }else{
         $_SESSION['err_log']="Enter a valid Email.";   
        }
    }else{
        $_SESSION['err_log'] ="Enter all fields";
    }
}







?>

<body>

    <div class="cont-login d-flex align-items-center justify-content-around">


        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="border p-5">
            <div class="row">


                <div class="col-sm-12  ">
                    <h3 class="text-center p-3 text-white">Login</h3>
                </div>


                <div class="col-sm-6 offset-sm-3 ">
                    <div class="form-group">
                        <label>Email </label>
                        <input type="text" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password </label>
                        <input type="password" name="password" class="form-control">
                    </div>

                <?php if (isset($_SESSION['err_log'])) { ?>
                    <div class="form-group">
                        <h3 class="alert alert-danger text-center"><?php echo $_SESSION['err_log']; ?></h3>
                    </div>
                <?php
                    unset($_SESSION['err_log']);
                } ?>
                    <div class="form-group">

                        <input type="submit" name="submit" class="form-control btn btn-success">
                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo ASSETS; ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/popper.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/bootstrap.min.js"></script>




</body>

</html>