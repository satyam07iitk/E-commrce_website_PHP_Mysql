<div class="col-md-3">
	
	<h3>All Category</h3>
	<div class="list-group">
		<?php 
			$sql = "SELECT * FROM categories";
			$result = query($sql);
			confirm($result);
			while($row = fetch_array($result)){
				$cat_id = $row['cat_id'];
		 ?>
		<a href="category.php?id=<?php echo $cat_id; ?>" class="list-group-item"><?php echo $row['cat_title'] ?></a>
		<?php } ?>
	</div>
</div>