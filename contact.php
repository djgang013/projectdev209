<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - E-commerce Store</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <header>
    <style>
            #logo1 {height: 40px; width:40px; background-color:white;}
        </style>
    <a href="index.php" id="logo">
            <img src="logo.png" alt="E-commerce Store Logo"id="logo1">
        </a>
        <h1>Contact Us</h1>
    </header>

    <main>
        <div class="contact-form">
            <h2>Send us a message</h2>
            <form action="sendmessage.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <input type="submit" value="Submit">
            </form>
        </div>
    </main>

    <footer>
        &copy; 2023 E-commerce Store
    </footer>
</body>
</html>
