<?php require "../../config.php";
require DIRA . 'inc/header.php';
require DIRA . 'inc/nav.php';
require DIR . "Func/validat.php";

//_check a type for REQUEST_METHOD..
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $admin_name = $_POST['name'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    //check if a valid name..
    if (is_empty($admin_name)) {
        $_SESSION['err_name'] = "The name is require..";
    } elseif (length_max($admin_name, 20)) {
        $_SESSION['err_name'] = "The name must be leth than 20 chars..";
    } elseif (length_minmum($admin_name, 4)) {
        $_SESSION['err_name'] = "The name must be more than 4 chars..";
    }
    //check if a valid email..
    if (is_empty($admin_email)) {
        $_SESSION['err_email'] = "The email is require..";
    } elseif (!valid_email($admin_email)) {
        $_SESSION['err_email'] = "Enter a valid email..";
    }
    //check if a valid Passowrd..
    if (is_empty($admin_password)) {
        $_SESSION['err_password'] = "The password is require..";
    } elseif (length_max($admin_password, 20)) {
        $_SESSION['err_password'] = "The password must be leth than 20 chars..";
    } elseif (length_minmum($admin_password, 4)) {
        $_SESSION['err_password'] = "The password must be more than 4 chars..";
    } else {
        $password_with_hash = password_hash($admin_password, PASSWORD_DEFAULT);
    }

    //insert data into database if not found any error..
    if (!isset($_SESSION['err_name']) && !isset($_SESSION['err_email']) && !isset($_SESSION['err_password']) && isset($_POST['submit'])) {
        try {
        
        $sql = "INSERT INTO `admin` (admin_name,admin_email,admin_password) VALUE ('$admin_name','$admin_email','$password_with_hash')";
        $result = mysqli_query($conect, $sql);
        throw new Exception("The Email Already Exists..");
        }
        catch (Exception $e) {
            
            $_SESSION['err_Duplicate'] = "This Email Already Exists..";
        }
    }
}
?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php if (isset($result)) { ?>
            <div class="alert alert-success text-center" role="alert">
                <?php echo "<h4>Added successfully</h4>"; ?>

            </div>
        <?php  } ?>
        <div class="form-group">
            <label>Name </label>
            <input type="text" name="name" class="form-control">
        </div>

        <?php if (isset($_SESSION['err_name'])) { ?>
            <div class="form-group">
                <h3 class="alert alert-danger text-center"><?php echo $_SESSION['err_name']; ?></h3>
            </div>
        <?php
            unset($_SESSION['err_name']);
        } ?>

        <div class="form-group">
            <label>Email </label>
            <input type="email" name="email" class="form-control">
        </div>
        <?php if (isset($_SESSION['err_email'])) { ?>
            <div class="form-group">
                <h3 class="alert alert-danger text-center"><?php echo $_SESSION['err_email']; ?></h3>
            </div>
        <?php
            unset($_SESSION['err_email']);
        } ?>
        <div class="form-group">
            <label>Password </label>
            <input type="password" name="password" class="form-control">
        </div>
        <?php if (isset($_SESSION['err_password'])) { ?>
            <div class="form-group">
                <h3 class="alert alert-danger text-center"><?php echo $_SESSION['err_password']; ?></h3>
            </div>
        <?php
            unset($_SESSION['err_password']);
        } ?>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
        <?php if (isset($_SESSION['err_Duplicate'])) { ?>
            <div class="form-group">
                <h3 class="alert alert-danger text-center"><?php echo $_SESSION['err_Duplicate']; ?></h3>
            </div>
        <?php
            unset($_SESSION['err_Duplicate']);
        } ?>
    </form>

</div>


<?php require DIRA . 'inc/footer.php';  ?>