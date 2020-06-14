<!-- Database Connection -->
<?php require_once("../resources/config.php") ?>

<!-- Header -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
    <div class="container">


            <h1 class="text-center">Login</h1>
            <?php LoginUser() ?>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
                <p><?php displayMessage() ?></p>
                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="loginSubmit" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </div>
    <!-- /.container -->



<!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

