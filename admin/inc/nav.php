 <body>



     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <a class="navbar-brand" href=""> <img src="" width="70" alt="LOGO"> </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
             <ul class="navbar-nav">
                 <li class="nav-item active">
                     <a class="nav-link" href="<?php echo BURLA ?>">Home <span class="sr-only">(current)</span></a>
                 </li>

                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Cities
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="<?php echo BURLA . "city_setting/add_city.php" ?>">Add</a>
                         <a class="dropdown-item" href="<?php echo BURLA . "city_setting/city.php" ?>">View All</a>
                     </div>
                 </li>

                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Services
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="<?php echo BURLA . 'services/add.php' ?>">Add</a>
                         <a class="dropdown-item" href="<?php echo BURLA . 'services/all.php' ?>">View All</a>
                     </div>
                 </li>

                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Orders
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="<?php echo BURL."orders/order.php" ?>">View All</a>
                     </div>
                 </li>

                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Admins
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="<?php echo BURLA . 'setting/add.php' ?>">Add</a>
                         <a class="dropdown-item" href="<?php echo BURLA . 'setting/all_admin.php' ?>">View All</a>
                     </div>
                 </li>


                 <li class="nav-item ">
                     <a class="nav-link" href="<?php echo BURL ?>">View Site</a>
                 </li>


             </ul>
         </div>
         <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link" href="<?php echo BURLA . 'logout.php' ?>">Logout</a>
             </li>

         </ul>
     </nav>


     <div class="container-fluid mt-5 mb-5">
         <div class="row">