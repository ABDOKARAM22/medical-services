<?php require 'config.php';  ?>
<?php require DIR . 'Func/validat.php';  ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css">

    <title>Medical Services</title>
</head>

<body>



    <div class="cont-main" style="background:url(<?php echo ASSETS . 'images/bg-1.jpg'; ?>)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                    <?php
                    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                        $service = $_POST['service'];
                        $city = $_POST['city'];
                        $mobile = $_POST['mobile'];
                        $notes = $_POST['notes'];
                        $name =  $_POST['name'];
                        $email = $_POST['email'];

                        if (!is_empty($mobile) && !is_empty($name) && !is_empty($city) && !is_empty($service)) {

                            $sql  = "INSERT INTO orders (`order_name`,`order_email`,`order_mobile`,`order_serv_id`,`order_city_id`,`order_notes`)
                            VALUES ('$name','$email','$mobile','$service','$city','$notes')
                         ";
                            $data_inserted = insert($sql);
                            if ($data_inserted) {
                                $_SESSION['Done_mss'] = "Data sent..We Well Call You";
                            } else {

                                $_SESSION["err_add"] = "Try Agin";
                            }
                        } else {
                            $_SESSION["err_add"] = "Please Fill The Required Fields";
                        }
                    }
                    ?>




                    <form class="row" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-5">
                        <div class="col-sm-6 ">
                            <div class="form-group mt-3">

                                <label for="serv" class="font-1">Choose Service *</label>
                                <select name="service" id="serv" class="form-control font-1">
                                    <?php $data = get_rwos('services');
                                    $x = 1; ?>
                                    <?php foreach ($data as $row) {   ?>
                                        <option value="<?php echo $row['serv_id']; ?>">
                                            <?php echo $row['serv_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>


                        <div class="col-sm-6 ">
                            <div class="form-group mt-3">

                                <label for="serv" class="font-1">Choose City *</label>
                                <select name="city" id="serv" class="form-control font-1">
                                    <?php $dataCity = get_rwos('city');
                                    $x = 1; ?>
                                    <?php foreach ($dataCity as $row) {   ?>
                                        <option value="<?php echo $row['city_id']; ?>">
                                            <?php echo $row['city_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>


                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">

                                <label for="serv" class="font-1">Type Your Name *</label>
                                <input type="text" name="name" class="form-control font-1 bg-base">

                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group ">

                                <label for="serv" class="font-1">Type Your Email</label>
                                <input type="email" name="email" class="form-control font-1 bg-base">

                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group ">

                                <label for="serv" class="font-1">Type Your Mobile *</label>
                                <input type="text" name="mobile" class="form-control font-1 bg-base">

                            </div>
                        </div>




                        <div class="col-sm-12">
                            <div class="form-group">

                                <label for="serv" class="font-1">Detailed Title And Any Notes</label>
                                <textarea name="notes" class="form-control font-1 bg-base" rows="5"></textarea>

                            </div>
                        </div>




                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success form-control">Send</button>
                            </div>
                            <?php if (isset($_SESSION['err_add'])) { ?>
                                <div class="form-group">
                                    <h3 class="alert alert-danger text-center"><?php echo $_SESSION['err_add']; ?></h3>
                                </div>
                            <?php
                                unset($_SESSION['err_add']);
                            } ?>
                            <?php if (isset($_SESSION['Done_mss'])) { ?>
                                <div class="alert alert-success text-center" role="alert">
                                    <?php echo "<h4>" . $_SESSION["Done_mss"] . "</h4>"; ?>
                                </div>
                            <?php
                                unset($_SESSION['Done_mss']);
                            } ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo ASSETS; ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/popper.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/bootstrap.min.js"></script>
</body>

</html>