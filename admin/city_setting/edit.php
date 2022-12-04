<?php require '../../config.php';  ?>

<?php require DIRA . 'inc/header.php';  ?>
<?php

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $row = get_row("city", "city_id", $_GET["id"]);
    //there's a problem here  
    if ($row) {
        $city_id = $row["city_id"];
        $city_name = $row["city_name"];
    }
}elseif(isset($_SESSION['done']) || isset($_SESSION["err_edit"])){
   
}else{
    header("location:" . BURLA);

}

?>
<?php require DIRA . 'inc/nav.php';  ?>
<?php require DIR . 'Func/validat.php';  ?>



<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit the City</h3>
    <form method="POST" action="<?php echo BURLA . "city_setting/updat.php" ?>">

        <div class="form-group">
            <label>Name of City</label>
            <input type="text" name="name" class="form-control" value=<?php if(isset($city_name)): echo $city_name;endif ?>>
            <input type="hidden" name="id" value="<?php echo $city_id ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>



    <?php if (isset($_SESSION['done'])) { ?>
        <div class="alert alert-success text-center" role="alert">
            <?php echo "<h4>" . $_SESSION["done"] . "</h4>"; ?>
        </div>
    <?php
        unset($_SESSION['done']);
    } ?>
    <?php if (isset($_SESSION["err_edit"])) { ?>
        <div class="form-group">
            <h3 class="alert alert-danger text-center"><?php echo $_SESSION["err_edit"]; ?></h3>
        </div>
    <?php
        unset($_SESSION["err_edit"]);
    } ?>
</div>


<?php require DIRA . 'inc/footer.php';  ?>