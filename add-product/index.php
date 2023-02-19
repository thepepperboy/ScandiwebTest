<!DOCTYPE html>
<html lang="EN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.5">
	<meta name="author" content="Aleksandrs Freimanis">
	
	<title>Product Add</title>

    <link rel="icon" type="image/x-icon" href="../Style&Assets/icon.png">
	<link rel="stylesheet" href="../Style&Assets/style.css">
    <script defer="" src="script.js"></script>
</head>
<body>
<?php
    require('../autoload.php');
    include('../config.php');
?>
    <nav>
        <h1> Add Product </h1>
        <span>
            <button type="submit" value="save" name="submit" form="product_form" >Save</button>	
            <button onclick="document.location='/'">Cancel</button>
        </span>	
    </nav>
    <hr>
    <?php    
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = new ProductSaver($_POST);
            $errors = $product->saveProduct($_POST);
        }
    ?>
      <form method="post" id="product_form" action="/add-product/index.php" class="f_add">
        <label for="sku">SKU</label>
        <span class="value">
            <input type="text" id="sku" name="SKU" value="<?php echo htmlspecialchars($_POST['SKU']) ?? '' ?>">
            <div class="error"><?php echo $errors['SKU'] ?? '' ?></div>
        </span>
        <label for="name">Name</label>
        <span class="value">
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name']) ?? '' ?>">
            <p class="error"><?php echo $errors['name'] ?? '' ?></p>
        </span>
        <label for="price">Price ($)</label>
        <span class="value">
            <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($_POST['price']) ?? '' ?>" min="0.01" step="0.01">
            <p class="error"><?php echo $errors['price'] ?? '' ?></p>
        </span>
        <label for="productType">Select Type</label>
        <span class="value">
            <select  id="productType" name="type" value="<?php echo htmlspecialchars($_POST['type']) ?? 'Base' ?>">
                <option value="Base" hidden <?php echo ($_POST['type'] == '') ? 'selected="selected"' : "" ?>>Product Type</option>
                <option value="Dvd" <?php echo ($_POST['type'] == 'Dvd') ? 'selected="selected"' : "" ?>>DVD</option>
                <option value="Book" <?php echo ($_POST['type'] == 'Book') ? 'selected="selected"' : "" ?>>Book</option>
                <option value="Furniture" <?php echo ($_POST['type'] == 'Furniture') ? 'selected="selected"' : "" ?>>Furniture</option>
            </select>
            <p class="error"><?php echo $errors['type'] ?? '' ?></p>
        </span>
        <div id="Dvd" class="description hidden">
            <label for="size">Size (MB)</label>
            <span class="value">
                <input type="number" id="size" name="size" value="<?php echo htmlspecialchars($_POST['size']) ?? '' ?>" min="0.001" step="0.001">
                <p class="error"><?php echo $errors['size'] ?? '' ?></p>
            </span>
        </div>
        <div id="Book" class="description hidden">
            <label for="weight">Weight (KG)</label>
            <span class="value">
                <input type="number" id="weight" name="weight" value="<?php echo htmlspecialchars($_POST['weight']) ?? '' ?>" min="0.001" step="0.001">
                <p class="error"><?php echo $errors['weight'] ?? '' ?></p>
            </span>
        </div>
        <div id="Furniture" class="description hidden">
            <label for="height">Height (CM)</label>
            <span class="value">
                <input type="number" id="height" name="height" value="<?php echo htmlspecialchars($_POST['height']) ?? '' ?>"min="0.001" step="0.001">
                <p class="error"><?php echo $errors['height'] ?? '' ?></p>
            </span>
            <label for="width">Width (CM)</label>
            <span class="value">
                <input type="number" id="width" name="width" value="<?php echo htmlspecialchars($_POST['width']) ?? '' ?>"min="0.001" step="0.001">
                <p class="error"><?php echo $errors['width'] ?? '' ?></p>
            </span>
            <label for="length">Length (CM)</label>
            <span class="value">
                <input type="number" id="length" name="length" value="<?php echo htmlspecialchars($_POST['length']) ?? '' ?>"min="0.001" step="0.001">
                <p class="error"><?php echo $errors['length'] ?? '' ?></p>
            </span>
        </div>
    </form>
    <hr>
    <footer id="footer">
        <h4>Scandiweb Test assignment</h4>
        <!--	<p>Author of the page: Aleksandrs Freimanis </p>	-->
	</footer>
</body>
</html>


