<?php require '../../config.php'; ?>

<?php require DIRA . 'inc/header.php'; ?>
<?php require DIRA . 'inc/nav.php'; ?>

<div class="col-sm-12">

    <?php if (!empty($_SESSION["err_edit"])) { ?>
        <div class="form-group">
            <h3 class="alert alert-danger text-center">
                <?php echo htmlspecialchars($_SESSION["err_edit"]); ?>
            </h3>
        </div>
        <?php unset($_SESSION["err_edit"]); ?>
    <?php } ?>

    <h3 class="text-center p-3 bg-primary text-white">View All Admins</h3>

    <table class="table table-dark table-bordered">
        <thead>
            <tr class="text-center">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php
            $all_admin = get_rwos("admin"); 
            $x = 1;

            foreach ($all_admin as $row) {
        ?>
            <tr class="text-center">
                <td><?php echo $x++; ?></td>
                <td><?php echo htmlspecialchars($row["admin_name"]); ?></td>
                <td><?php echo htmlspecialchars($row["admin_email"]); ?></td>
                <td><?php echo htmlspecialchars($row["admin_type"]); ?></td>

                <td>
                    <?php if ($row["admin_type"] !== "Owner") { ?>
                        
                        <a href="<?php echo BURLA . 'setting/edit.php?id=' . $row["admin_id"]; ?>"
                           class="btn btn-info">
                            Edit
                        </a>

                        <!-- DELETE SAFE (POST instead of GET) -->
                        <form action="<?php echo BURLA . 'setting/delete.php'; ?>" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row["admin_id"]; ?>">
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?');">
                                Delete
                            </button>
                        </form>

                    <?php } else { ?>
                        <span class="text-warning">Owner</span>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>
</div>

<?php require DIRA . 'inc/footer.php'; ?>