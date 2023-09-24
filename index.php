<!DOCTYPE html>
<html>
<head>
    <title>E-commerce Store</title>
    <link rel="stylesheet" href="style1.css">
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
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "ecommerce_db";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT products.id, products.name, products.description, products.price, products.image_url
                  FROM products";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                // Make product name clickable with a link to product_details.php
                echo "<h2><a href='product_details.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></h2>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<p>Price: $" . $row['price'] . "</p>";

                // Display the product image using the 'image_url' from the database
                echo "<img src='" . $row['image_url'] . "' alt='" . $row['name'] . "'>";

                echo "</div>";
            }
        } else {
            echo "No products available.";
        }

        $conn->close();
        ?>
    </main>

    <footer>
        &copy; 2023 E-commerce Store
    </footer>
</body>
</html>
