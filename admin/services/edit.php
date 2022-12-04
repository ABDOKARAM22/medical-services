<?php require '../../config.php';  ?>

<?php

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $row = get_row("services", "serv_id", $_GET["id"]);
    if ($row) {
        $id = $row["serv_id"];
        $serv_name = $row["serv_name"];
    } else {
        header("location:" . BURLA);
    }
}else {
    
    header("location:" . BURLA);
    }
?>
<?php require DIRA . 'inc/header.php';  ?>
<?php require DIRA . 'inc/nav.php';  ?>
<?php require DIR . 'Func/validat.php';  ?>

<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit the service</h3>
    <form method="POST" action="<?php echo BURLA . "services/update.php" ?>">

        <div class="form-group">
            <label>Name of service</label>
            <input type="text" name="name" class="form-control" value=<?php if (isset($serv_name)) : echo $serv_name;
                                                                        endif ?>>
    
            <input type="hidden" name="id" value="<?php echo $id ?>">

        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>