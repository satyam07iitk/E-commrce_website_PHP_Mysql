<!-- Database Connection -->
<?php require_once("../resources/config.php") ?>

<!-- Header -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <?php 
                $id = escape_string($_GET['id']);
                $sql = "SELECT * FROM categories WHERE cat_id={$id}";
                $result = query($sql);
                confirm($result);
                while($row=fetch_array($result)){
                    $title = $row['cat_title'];
                    $description = $row['cat_description'];
                    echo "<h1>{$title}</h1>";
             ?>
            <p><?php echo $description; ?></p>
            <p><a href="contact.php" class="btn btn-primary btn-large">Contact us!</a>
            </p>
        <?php } ?>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row">
            <?php displayProdcutByCategory($_GET['id']) ?>
        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->

<!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
