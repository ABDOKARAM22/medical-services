<?php require '../../config.php';  ?>

<?php require DIRA . 'inc/header.php';  ?>
<?php require DIRA . 'inc/nav.php';  ?>













<div class="col-sm-12">
    <h3 class="text-center p-3 bg-primary text-white">View All Cities</h3>
    <table class="table table-dark table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <?php $all_city = get_rwos("city");
        $x = 1;
        foreach ($all_city as $row) { ?>
            <tbody>
                <tr class="text-center">
                    <td scope="row"><?php echo $x++ ?></td>
                    <td class="text-center"><?php echo $row["city_name"] ?></td>

                    <td class="text-center">
                        <a href="<?php echo BURLA . 'city_setting/edit.php?id=' . $row["city_id"] ?>" class="btn btn-info">Edit</a>
                        <a href="<?php echo BURLA . 'city_setting/delet.php?id=' . $row["city_id"] ?>" class="btn btn-danger delete" data-field="city_id" data-id="" data-table="cities">Delete</a>
                    </td>
                </tr>

            </tbody>
        <?php } ?>
    </table>
</div>


<?php require DIRA . 'inc/footer.php';  ?>