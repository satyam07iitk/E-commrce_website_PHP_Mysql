<!-- Database Connection -->
<?php require_once("../resources/config.php") ?>

<?php 
      
    if(isset($_POST['cartTotalItem']) &&  isset($_POST['cartTotal']) ){
      $totalItem = $_POST['cartTotalItem'];
      $total = $_POST['cartTotal'];
    }

    if(isset($_POST['cashPayment'])){
        $name = escape_string($_POST['name']);
        $email = escape_string($_POST['email']);
        $address = escape_string($_POST['address']);
        $mobileNumber = escape_string($_POST['mobileNumber']);

        echo 'cash';

          $sql = "INSERT INTO `orders`(`order_id`, `user_id`, `product_id`, `customer_name`, `product_quantity`, `total_price`, `total_item`, `transection_id`, `paypal_email`, `payment_option`, `address`, `user_tel`) VALUES ('','','','{$name}','','{$total}','{$totalItem}','null','null','cash','{$address}','{$mobileNumber}')";


        $result = query($sql);
        confirm($result);
        session_destroy();
        redirect("ordersuccess.php");

    }

    

    if(isset($_POST['paypalPayment'])){
        $name = escape_string($_POST['name']);
        $email = escape_string($_POST['email']);
        $address = escape_string($_POST['address']);
        $mobileNumber = escape_string($_POST['mobileNumber']);
        $paypalEmail = escape_string($_POST['paypalEmail']);
        $transectionId = escape_string($_POST['transectionId']);

        echo 'cash';
        $sql = "INSERT INTO `orders`(`order_id`, `user_id`, `product_id`, `customer_name`, `product_quantity`, `total_price`, `total_item`, `transection_id`, `paypal_email`, `payment_option`, `address`, `user_tel`) VALUES ('','','','{$name}','','{$total}','{$totalItem}','{$transectionId}','{$paypalEmail}','paypal','{$address}','{$mobileNumber}')";

        $result = query($sql);
        confirm($result);
        session_destroy();
        redirect("ordersuccess.php");
    }

   
?>
<!-- Header -->
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<!-- Page Content -->
<div class="container">

    <!-- /.row --> 

    <!--  ***********CART TOTALS*************-->
  
  <div class="row">
    

    <h3>Cash Payment</h3>

    <div class='col-xs-8 pull-left'>
      <form action="" method="post">
        <label for="name">Name</label>
        <input id="name" name="name" placeholder="Enter your Name" class="form-control" type="text" required>
        <label for="email">Email</label>
        <input id="email" name="email" placeholder="Enter your Name" class="form-control" type="text" required>
        <label for="address">Address</label>
        <input id="address" name="address" placeholder="Enter your Adress" class="form-control" type="text" required>
        <label for="mobileNumber">Mobile number</label>
        <input id="mobileNumber" name="mobileNumber" placeholder="Enter your Number" class="form-control" type="number" required>
        <button style="margin-top:10px;" name="cashPayment" class="btn btn-primary p-2">Cash On Dalivary</button>

      </form>
    </div>


    <div class="col-xs-4 pull-right ">
      <h2>Cart Totals</h2>
      <table class="table table-bordered" cellspacing="0">
        <tr class="cart-subtotal">
          <th>Items:</th>
          <td><span class="amount">
            <?php echo $totalItem  ?>
          </span></td>
        </tr>
        <tr class="shipping">
          <th>Shipping and Handling</th>
          <td>Free Shipping</td>
        </tr>

        <tr class="order-total">
          <th>Order Total</th>
          <td><strong><span class="amount">
            <?php if($_SESSION['cartTotalItem']>0){ ?>
            <?php echo $total  ?>
          <?php }else{
            echo '0';
          } ?>
          </span></strong> </td>
        </tr>
      </table>
    </div><!-- CART TOTALS-->


  </div><!--Main Content-->

  <div class="row">

    <h3>Paypal Payment</h3>

     <div class='col-xs-8 pull-left'>
      <form action="" method="post">
        <label for="name">Name</label>
        <input id="name" name="name" placeholder="Enter your name" class="form-control" type="text" required>
        <label for="email">Email</label>
        <input id="email" name="email" placeholder="Enter your email" class="form-control" type="text" required>
        <label for="address">Address</label>
        <input id="address" name="address" placeholder="Enter your Adress" class="form-control" type="text" required>
        <label for="mobileNumber">Mobile number</label>
        <input id="mobileNumber" name="mobileNumber" placeholder="Enter your Number" class="form-control" type="number" required>
        <label for="paypalEmail">Paypal Email</label>
        <input id="paypalEmail" name="paypalEmail" placeholder="Enter your paypal Email adress" class="form-control" type="email" required>
         <label for="transectionId">Transection ID</label>
        <input id="transectionId" name="transectionId" placeholder="Enter your paypal Email adress" class="form-control" type="number" required>
        <button style="margin-top:10px;" name="paypalPayment" class="btn btn-primary p-2">Paypal Payment</button>
      </form>
    </div>
  </div>


</div>


<!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
