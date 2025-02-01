<?php
require_once "../controllers/ProductController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Products</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script>
        // This function will be called when the user types in the search box
        function searchProducts() {
            var query = document.getElementById("search-query").value; // Get the search query
            $.ajax({
    url: '../controllers/ProductController.php', // Pointing to the controller that handles search
    type: 'GET',
    data: { query: query },
    success: function(response) {
        // Update the product list with the returned HTML from the controller
        document.getElementById("product-list").innerHTML = response;
    },
    error: function(xhr, status, error) {
        // Log error details to the console for debugging
        console.log("AJAX Error:", status, error);
        alert('Error occurred while searching. Please try again.');
    }
});
        }
    </script>
</head>
<body>
    <!-- Navbar Section -->
    <div class="navbar">
        <a href="../view/buyer.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'buyer.php') ? 'active' : ''; ?>">Home</a>
        <a href="../view/profile.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'profile.php') ? 'active' : ''; ?>">Profile</a>
        <a href="../view/cart.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'cart.php') ? 'active' : ''; ?>">Cart</a>
        <a href="../view/purchaseHistory.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'purchaseHistory.php') ? 'active' : ''; ?>">Purchase History</a>
        <a href="../controllers/logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['first_name']); ?>!</h1>
    <p>Here are the products available for purchase:</p>

    <!-- Search Bar -->
    <input type="text" id="search-query" placeholder="Search for products..." onkeyup="searchProducts()" />

    <div id="product-list" class="product-list">
        <?php if (count($products) > 0): ?>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <img src="../<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                    <p>Stock: <?php echo htmlspecialchars($product['stock']); ?></p>
                    <form action="" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>">
                        <input type="submit" name="add_to_cart" value="Add to Cart">
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products are available at the moment. Please check back later.</p>
        <?php endif; ?>
    </div>
</body>
</html>
