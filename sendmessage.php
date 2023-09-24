<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create a database connection (replace with your database credentials)
    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "ecommerce_db";
    $conn = new mysqli($host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the form data into the database
    $sql = "INSERT INTO contact_submissions (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        // Redirect to the home page on successful submission
        header("Location: index.php");
        exit; // Ensure no further code is executed after the redirection
    } else {
        echo "There was an error sending your message. Please try again later.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
