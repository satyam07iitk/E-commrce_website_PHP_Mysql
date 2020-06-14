<?php 

// -----------------------------Helper Function-----------------------------
// session_destroy();
function setMessage($msg){
	$_SESSION['message'] = $msg;
}

function displayMessage(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function redirect($location){
	header("Location: $location");
}

function query($sql){
	global $connection;
	return mysqli_query($connection,$sql);
}

function confirm($result){
	global $connection;
	if(!$result){
		die("Query Error".mysqli_error($connection));
	}
}

function escape_string($string){
	global $connection;
	return mysqli_real_escape_string($connection,$string);
}

function fetch_array($result){
	return mysqli_fetch_array($result);
}


// -----------------------------Display Product-----------------------------

function displayProdcut(){
	$result = query("SELECT * FROM products");
	confirm($result);
	while($row = fetch_array($result) ){
		$price = $row['product_price'];
		$title = $row['product_title'];
		$pic = $row['product_image'];
		$id = $row['product_id'];
		
		$product = <<<DELIMETER
		<div class="col-sm-4 col-lg-4 col-md-4">
	        <div class="thumbnail">
	            <img style='width:320px; height:150px;' src="{$pic}" alt="">
	            <div class="caption">
	                <h4 class="pull-right">&#36 {$price}</h4>
	                <h4><a href="item.php?id={$id}">{$title}</a>
	                </h4>
	                <p>See more snippets like this online store item at <a target="_blank" href="item.php?id={$id}">Read more</a>.</p>
	            </div>
	            <div class="ratings">
	                <p class="pull-right">15 reviews</p>
	                <p>
	                    <span class="glyphicon glyphicon-star"></span>
	                    <span class="glyphicon glyphicon-star"></span>
	                    <span class="glyphicon glyphicon-star"></span>
	                    <span class="glyphicon glyphicon-star"></span>
	                    <span class="glyphicon glyphicon-star"></span>
	                </p>
	            </div>
	            <a style='margin-left:10px; margin-bottom:10px;' class="btn btn-primary" href="cart.php?add={$id}">Add to Cart</a>
	            <a style='margin-left:2px; margin-bottom:10px;' class="btn btn-info" target="_blank" href="item.php?id={$id}">View Details</a>
	        </div>
	    </div>
	DELIMETER;
    	echo $product;
	}
}


function displayProdcutByCategory($product_cat_id){
	$result = query("SELECT * FROM products WHERE product_cat_id={$product_cat_id}");
	confirm($result);
	while($row = fetch_array($result) ){
		$price = $row['product_price'];
		$title = $row['product_title'];
		$pic = $row['product_image'];
		$id = $row['product_id'];
		
		$product = <<<DELIMETER
		<div class="col-sm-4 col-lg-4 col-md-4">
	        <div class="thumbnail">
	            <img style='width:320px; height:150px;' src="{$pic}" alt="">
	            <div class="caption">
	                <h4 class="pull-right">&#36 {$price}</h4>
	                <h4><a href="item.php?id={$id}">{$title}</a>
	                </h4>
	                <p>See more snippets like this online store item at <a target="_blank" href="item.php?id={$id}">Read more</a>.</p>
	            </div>
	            <div class="ratings">
	                <p class="pull-right">15 reviews</p>
	                <p>
	                    <span class="glyphicon glyphicon-star"></span>
	                    <span class="glyphicon glyphicon-star"></span>
	                    <span class="glyphicon glyphicon-star"></span>
	                    <span class="glyphicon glyphicon-star"></span>
	                    <span class="glyphicon glyphicon-star"></span>
	                </p>
	            </div>
	            <a style='margin-left:10px; margin-bottom:10px;' class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">Add to Cart</a>
	            <a style='margin-left:2px; margin-bottom:10px;' class="btn btn-info" target="_blank" href="item.php?id={$id}">View Details</a>
	        </div>
	    </div>
	DELIMETER;
    	echo $product;
	}
}


// ---------------------------------- Login User ------------------------------

function LoginUser(){
	if(isset($_POST['loginSubmit'])){
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);
		$result = query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}' ");
		confirm($result);
		if(mysqli_num_rows($result)==0){
			setMessage("Invalid username or password");
		}else{
			setMessage("Welcome, {$username}");
			redirect("admin");
		}

	}
}

// ----------------------------------- Contact Message -------------------------------

function contactFormSubmit(){
	if(isset($_POST['contactSubmit'])){
		$name = escape_string($_POST['name']);
		$email = escape_string($_POST['email']);
		$phone = escape_string($_POST['phone']);
		$message = escape_string($_POST['message']);
		$result = query("INSERT INTO contact VALUES('','{$name}','{$email}','{$phone}','{$message}',now() ) ");
		confirm($result);
		if($result){
			echo "<script>alert('Your Message have been sent')</script>";
		}

	}
}























?>
