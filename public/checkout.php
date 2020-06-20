<!-- Database Connection -->
<?php require_once("../resources/config.php") ?>
<?php require_once("cart.php") ?>

<!-- Header -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>



<!-- Page Content -->
<div class="container">

    <!-- /.row --> 

    <div class="row">
      <?php if(displayMessage()){
        displayMessage();
      }
      ?>
      
      <h1>Checkout</h1>

      <form action="">
        <table class="table table-striped">
          <thead>
            <tr>
             <th>Product</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>Sub Total</th>
             <th>Actions</th>
           </tr>
         </thead>
         <tbody>
              <?php 
                  cart();
               ?>
        </tbody>
      </table>
    </form>
    </div>

    <!--  ***********CART TOTALS*************-->
  <div class="row">
    <div class="col-xs-4 pull-right ">
      <h2>Cart Totals</h2>
      <table class="table table-bordered" cellspacing="0">
        <tr class="cart-subtotal">
          <th>Items:</th>
          <td><span class="amount">
            <?php 
            if($_SESSION['cartTotalItem']>0){
              if(isset($_SESSION['cartTotalItem'])){
                if($_SESSION['cartTotalItem'] != 0){
                  echo $_SESSION['cartTotalItem'];
                }else{
                  echo "0";
                }
              }else{
                echo "0";
              }
            }else{
              echo '0';
            }
             ?>
            
          </span></td>
        </tr>
        <tr class="shipping">
          <th>Shipping and Handling</th>
          <td>Free Shipping</td>
        </tr>

        <tr class="order-total">
          <th>Order Total</th>
          <td><strong><span class="amount">
            <?php 
            if($_SESSION['cartTotalItem']>0){
              if(isset($_SESSION['cartTotal'])){
                if($_SESSION['cartTotal'] == '0'){
                  echo "0";
                }else{
                  echo "&#36;".$_SESSION['cartTotal'];
                }
              }else{
                echo "0";
              }
            }else{
              echo "0";
            }
             ?>
          </span></strong> </td>
        </tr>
      </table>
      <form action="payment.php" method="POST">
        <input name="cartTotalItem" type="hidden" value="<?php echo  $_SESSION['cartTotalItem'] ?>">
        <input name="cartTotal" type="hidden" value="<?php echo  $_SESSION['cartTotal'] ?>">
        <?php 
            if($_SESSION['cartTotalItem']>0){
         ?>
        <button type="submit" name='payment' class='btn btn-info'>Buy Now</button>

      <?php }else{ ?>
        <button type="submit" name='payment' class='btn btn-info disabled'>Buy Now</button>
      <?php } ?>
      </form>
    </div><!-- CART TOTALS-->


  </div><!--Main Content-->

</div>

<!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
