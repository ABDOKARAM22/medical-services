<?php require '../../config.php';  ?>

<?php require DIRA . 'inc/header.php';  ?>
<?php require DIRA . 'inc/nav.php';  ?>


<div class="col-sm-12">
                <?php if(isset($_SESSION["err_edit"])){ ?>
                
                     <div class="form-group">
                            <h3 class="alert alert-danger text-center"><?php echo $_SESSION["err_edit"]; ?></h3>
                        </div>
                    <?php
                        unset($_SESSION["err_edit"]);
                    } ?>
    <h3 class="text-center p-3 bg-primary text-white">View All Admins</h3>
    <table class="table table-dark table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Type for Admin</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <?php $all_admin = get_rwos("admin");
        $x = 1;
        foreach ($all_admin as $row) { ?>
            <tbody>
                <tr class="text-center">
                    <td scope="row"><?php echo $x++ ?></td>
                    <td class="text-center"><?php echo $row["admin_name"] ?></td>
                    <td class="text-center"><?php echo $row["admin_email"] ?></td>
                    <td class="text-center"><?php echo $row["admin_type"] ?></td>
                    <?php if ($row["admin_type"] !== "super_admin") {   ?>
                        <td class="text-center">
                            <a href="<?php echo BURLA . 'setting/edit.php?id=' . $row["admin_id"] ?>" class="btn btn-info">Edit</a>
                            <a href=" <?php echo BURLA . 'setting/delet.php?id=' . $row["admin_id"] ?>" class="btn btn-danger delete" data-field="city_id" data-id="" data-table="cities">Delete</a>
                        </td>
                    <?php } ?>

                </tr>

            </tbody>
        <?php } ?>
    </table>
</div>


<?php require DIRA . 'inc/footer.php';  ?>