<!DOCTYPE html>
<html>
<head>
    <title>Product Details - E-commerce Store</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <header>
    <style>
            #logo1 {height: 40px; width:40px; background-color:white;}
        </style>
    <a href="index.php" id="logo">
            <img src="logo.png" alt="E-commerce Store Logo"id="logo1">
        </a>
        <h1>Welcome to Our E-commerce Store</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        // Check if the 'id' parameter is provided in the URL
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];

            // Connect to the database (replace with your database credentials)
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "ecommerce_db";

            $conn = new mysqli($host, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute the SQL query
            $query = "SELECT * FROM products WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $productId); // "i" indicates integer type

            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Fetch and store product details in $productDetails
                    $productDetails = $result->fetch_assoc();

                    echo "<div class='product-details-container'>";
                    // Display the product image using the 'image_url' from the database
                    echo "<img class='product-image' src='" . $productDetails['image_url'] . "' alt='" . $productDetails['name'] . "'>";
                    echo "<h1>" . $productDetails['name'] . "</h1>";
                    echo "<p class='price'>$" . $productDetails['price'] . "</p>"; // Price with special styling
                    echo "<p>" . $productDetails['description'] . "</p>";

                    // Add to Cart button
                    echo "<button class='add-to-cart-button'>Add to cart</button>";

                    echo "</div>";
                } else {
                    echo "Product not found.";
                }
            } else {
                echo "Query failed: " . $stmt->error;
            }

            // Close the database connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Product ID not provided.";
        }
        ?>
    </main>

    <footer>
        &copy; 2023 E-commerce Store
    </footer>
</body>
</html>
