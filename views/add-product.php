<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/master.css">
    <title>Add Product</title>
</head>
<body>
    <!-- start header  -->
    <div class="header">
        <div class="container">
            <button id="save">Save</button>
            <button id="cancel">Cancel</button>
        </div>
    </div>
    <!-- end header  -->
    <!-- start form  -->
    <div class="form">
        <div class="container">
            <form action="" method="POST" id="product_form">
                <div class="sku">
                    <label for="sku">Sku</label>
                    <input type="text" name="sku" id="sku" onblur="validateSku()">
                </div>
                <div class="name">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" onblur="validateName()">
                </div>
                <div class="price">
                    <label for="price">price</label>
                    <input type="number" name="price" id="price" onblur="validatePrice()">
                </div>
                <div class="type">
                    <label for="productType">Type Switcher</label>
                    <select name="type" id="productType" onblur="validateType()">
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                        <option value="DVD">DVD</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <!-- end form  -->
    <script>
        // get all sku values and pass it javascript to make validation 
        let allSku = [];
        <?php foreach($skuValues as $sku): ?>
            allSku.push("<?php echo $sku ?>")
        <?php endforeach; ?>
    </script>
    <script src="assets/js/addProduct.js"></script>
</body>
</html>