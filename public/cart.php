<?php 
require_once("../resources/config.php");

if(isset($_GET['add'])){
	
	$getId = escape_string($_GET['add']);
	$product_query = "SELECT product_quantity,product_title from products where product_id={$getId}";
	$result = query($product_query);
	confirm($result);
	while($row=fetch_array($result)){
		if($row['product_quantity'] != $_SESSION['product_'.$_GET['add']]){
			$_SESSION['product_'.$_GET['add']] += 1;
			redirect('checkout.php');
		}else{
			setMessage("<h4 class='alert alert-warning'>We have just ".$row['product_quantity']." ".$row['product_title']." in stock</h4>");
			redirect('checkout.php');
		}
	}
}

if(isset($_GET['remove'])){
	
	if($_SESSION['product_'.$_GET['remove']] != 0){
		$_SESSION['product_'.$_GET['remove']] = $_SESSION['product_'.$_GET['remove']] -1 ;
		redirect('checkout.php');
	}else{
		redirect('checkout.php');
	}

}

if(isset($_GET['delete'])){
	$_SESSION['product_'.$_GET['delete']] = 0;
	redirect('checkout.php');
}

function cart(){
	$total = 0;
	$_SESSION['cartTotalItem'] = null;
	foreach ($_SESSION as $name => $value) {
		
		if($value > 0){
			if(substr($name, 0,8)=="product_"){
				$length = strlen($name)-8;
				$id = substr($name,8,$length);
				$query = "SELECT * from products where product_id={$id}";
				$result = query($query);
				confirm($result);
				while($row = fetch_array($result)){
					$subtotal = $row['product_price']*$value;
					$product =<<<DELIMITER
					<tr>
					<td>{$row['product_title']}</td>
					<td>&#36;{$row['product_price']}</td>
					<td>{$value}</td>
					<td>&#36;{$subtotal}</td>
					<td>
					<a class='btn btn-sm btn-success' href='cart.php?add={$row['product_id']}'>+</a>
					<a class='btn btn-sm btn-warning' href='cart.php?remove={$row['product_id']}'>-</a>
					<a class='btn btn-sm btn-danger' href='cart.php?delete={$row['product_id']}'>&times;</a>
					</td>
					</tr>
					DELIMITER;
					echo $product;
				}
				$_SESSION['cartTotal'] = $total += $subtotal;
				$_SESSION['cartTotalItem'] += $value;
			}
		}
	}
}








 ?>