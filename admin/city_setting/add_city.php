<?php require '../../config.php';  ?>

<?php require DIRA . 'inc/header.php';  ?>
<?php require DIRA . 'inc/nav.php';  ?>
<?php require DIR . 'Func/validat.php';  ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $city_name = $_POST['name'];
    if (!is_empty($city_name)) {
        if(!length_minmum($city_name,3)){
            
            $done = insert("INSERT INTO `city` (`city_name`) VALUE ('$city_name')");
            if ($done) {
    
                $_SESSION["done"] = "Added Done";
            } else {
                $_SESSION["err_add"] = "Faild add";
            }
        }else{

            $_SESSION["err_add"] = "the name of city must be more than 3 chars";

        }

    } else {

        $_SESSION["err_add"] = "the name is require";
    }
}
?>
<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Add New City</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <div class="form-group">
            <label>Name of City</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

    <?php if (isset($_SESSION['err_add'])) { ?>
        <div class="form-group">
            <h3 class="alert alert-danger text-center"><?php echo $_SESSION['err_add']; ?></h3>
        </div>
    <?php
        unset($_SESSION['err_add']);
    } ?>

    <?php if (isset($_SESSION['done'])) { ?>
        <div class="alert alert-success text-center" role="alert">
            <?php echo "<h4>".$_SESSION["done"]."</h4>"; ?>
        </div>
    <?php
        unset($_SESSION['done']);
    } ?>
</div>


<?php require DIRA . 'inc/footer.php';  ?>