<?php require '../../config.php';  ?>
<?php

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $row = get_row("admin", "admin_id", $_GET["id"]);
    if ($row) {
        $admin_id = $row["admin_id"];
        $admin_name = $row["admin_name"];
        $admin_email = $row["admin_email"];
    } else {
        header("location:" . BURLA);
    }
} else {
    header("location:" . BURLA);
}
?>
<?php require DIRA . 'inc/header.php';  ?>
<?php require DIRA . 'inc/nav.php';  ?>
<?php require DIR . 'Func/validat.php';  ?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit the Admin</h3>
    <form method="POST" action="<?php echo BURLA."setting/updat.php" ?>">

        <div class="form-group">
            <label>Name of Admin</label>
            <input type="text" name="name" class="form-control" value=<?php if (isset($admin_name)) : echo $admin_name; endif ?>>
            <label>Email</label>
            <input type="email" name="email" class="form-control" value=<?php if (isset($admin_email)) : echo $admin_email; endif ?>>
            <input type="hidden" name="id" value="<?php echo $admin_id ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>


























