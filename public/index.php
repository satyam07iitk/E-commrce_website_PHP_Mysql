<!-- Database Connection -->
<?php require_once("../resources/config.php") ?>

<!-- Header -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Sidenav -->
            <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>

            <div class="col-md-9">
                <!-- Slider -->
                 <?php include(TEMPLATE_FRONT . DS . "slider.php") ?>

                <div class="row">
                    <?php displayProdcut(); ?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>