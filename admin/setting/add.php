<?php
require "../../config.php";
require DIRA . 'inc/header.php';
require DIRA . 'inc/nav.php';
require DIR . "Func/validat.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $admin_name = trim($_POST['name']);
    $admin_email = trim($_POST['email']);
    $admin_password = $_POST['password'];

    $errors = [];

    // ================= NAME VALIDATION =================
    if (is_empty($admin_name)) {
        $errors['name'] = "The name is required.";
    } elseif (length_max($admin_name, 20)) {
        $errors['name'] = "Name must be less than 20 chars.";
    } elseif (length_minmum($admin_name, 4)) {
        $errors['name'] = "Name must be more than 4 chars.";
    }

    // ================= EMAIL VALIDATION =================
    if (is_empty($admin_email)) {
        $errors['email'] = "The email is required.";
    } elseif (!valid_email($admin_email)) {
        $errors['email'] = "Enter a valid email.";
    }

    // ================= PASSWORD VALIDATION =================
    if (is_empty($admin_password)) {
        $errors['password'] = "Password is required.";
    } elseif (length_max($admin_password, 20)) {
        $errors['password'] = "Password must be less than 20 chars.";
    } elseif (length_minmum($admin_password, 4)) {
        $errors['password'] = "Password must be more than 4 chars.";
    }

    // ================= INSERT TO DATABASE =================
    if (empty($errors)) {

        $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

        $stmt = $conect->prepare("
            INSERT INTO admin (admin_name, admin_email, admin_password)
            VALUES (?, ?, ?)
        ");

        $stmt->bind_param("sss", $admin_name, $admin_email, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Admin added successfully.";
        } else {
            $_SESSION['err_Duplicate'] = "This email already exists or an error occurred.";
        }

        $stmt->close();

    } else {
        $_SESSION = array_merge($_SESSION, $errors);
    }
}
?>

<div class="col-sm-6 offset-sm-3 border p-3">

    <h3 class="text-center p-3 bg-primary text-white">Add New Admin</h3>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION['success']; ?>
            </div>
        <?php unset($_SESSION['success']); } ?>

        <!-- NAME -->
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <?php if (isset($_SESSION['name'])) { ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['name']; ?>
            </div>
        <?php unset($_SESSION['name']); } ?>

        <!-- EMAIL -->
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <?php if (isset($_SESSION['email'])) { ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['email']; ?>
            </div>
        <?php unset($_SESSION['email']); } ?>

        <!-- PASSWORD -->
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <?php if (isset($_SESSION['password'])) { ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['password']; ?>
            </div>
        <?php unset($_SESSION['password']); } ?>

        <button type="submit" class="btn btn-success">Save</button>

        <?php if (isset($_SESSION['err_Duplicate'])) { ?>
            <div class="alert alert-danger text-center mt-2">
                <?php echo $_SESSION['err_Duplicate']; ?>
            </div>
        <?php unset($_SESSION['err_Duplicate']); } ?>

    </form>

</div>

<?php require DIRA . 'inc/footer.php'; ?>