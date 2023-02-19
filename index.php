<!DOCTYPE html>
<!-- This code is a working progres of "the_pepperboy" learning how to code FROM ZERO. Knowledge of php before receiving test was zero :D -->
<html lang="EN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.5">
	<meta name="author" content="Aleksandrs Freimanis">
	
	<title>Product List</title>

	<link rel="icon" type="image/x-icon" href="Style&Assets/icon.png">
	<link rel="stylesheet" href="Style&Assets/style.css">
</head>
<body>
	<?php
		include('autoload.php');
		include('config.php');
	?>
	<nav>
		<h1> Product List </h1>
		<span>
			<a href="add-product"><button>ADD</button></a>
			<form action="Backend/MassDelete.php" method="POST" id="delete" class="zero">
				<button type="submit" id="delete-product-btn" name="MassDelete" form="delete">MASS DELETE</button>
			</form>
		</span>
	</nav>
	<hr>
		<div id="list">
			<?php
				include('Backend/OutputItem.php');
			?>
		</div>
	<hr>
	<footer id="footer">
		<h4>Scandiweb Test assignment</h4>
		<!--	<p>Author of the page: Aleksandrs Freimanis </p>	-->	
	</footer>
</body>
</html>