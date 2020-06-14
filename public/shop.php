<!-- Database Connection -->
<?php require_once("../resources/config.php") ?>

<!-- Header -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

        <!-- Jumbotron Header -->
        
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            
                <h1 style="margin-bottom:10px;" class='text-center'>All Product</h1>
            
        </div>
        <div class="row">

            <!-- Sidenav -->
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>

            <div class="col-md-9">
                <div class="row">
                    <?php displayProdcut(); ?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
