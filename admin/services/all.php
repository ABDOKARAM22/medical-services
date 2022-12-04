<?php require '../../config.php';  ?>

<?php require DIRA . 'inc/header.php';  ?>
<?php require DIRA . 'inc/nav.php';  ?>

<div class="col-sm-12">
    <?php if (isset($_SESSION["err_edit"])) { ?>

        <div class="form-group">
            <h3 class="alert alert-danger text-center"><?php echo $_SESSION["err_edit"]; ?></h3>
        </div>
    <?php
        unset($_SESSION["err_edit"]);
    } ?>
    <h3 class="text-center p-3 bg-primary text-white">View All Services</h3>
    <table class="table table-dark table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php $data = get_rwos('services');
            $x = 1; ?>
            <?php foreach ($data as $row) {   ?>
                <tr class="text-center">
                    <td scope="row"><?php echo $x; ?></td>
                    <td class="text-center"> <?php echo $row['serv_name'] ?> </td>

                    <td class="text-center">
                        <a href="<?php echo BURLA . 'services/edit.php?id=' . $row['serv_id']; ?>" class="btn btn-info">Edit</a>
                        <a href="<?php echo BURLA . 'services/delet.php?id=' . $row['serv_id']; ?>" class="btn btn-danger delete" data-field="serv_id" data-id="<?php echo $row['serv_id']; ?>" data-table="services">Delete</a>
                    </td>
                </tr>
            <?php $x++;
            } ?>

        </tbody>
    </table>
</div>


<?php require DIRA . 'inc/footer.php';  ?>