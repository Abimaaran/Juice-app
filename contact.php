<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Juice Wonderland</title>
    <link rel="stylesheet" href="ctsyle.css">

    <nav class="navbar">
        <a class="navbar-brand" href="home.php"><img src="log.png" alt="Juice Wonderland" class="logo"> <i style="color: rgb(11, 180, 78);">100% Natural Fruits</i></a>
       
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="About.php">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            <li class="nav-item"><a class="nav-link" href="view-juice.php">View Juice</a></li>
            <li class="nav-item"><a class="nav-link" href="pay.php">Pay Here</a></li>
        </ul>
        <div class="navbar-right">
            
        </div>
    </nav>

</head>
<body>

    <?php
    

    
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "juice";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);
        
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green; text-align: center;'>Message sent successfully!</p>";
        } else {
            echo "<p style='color: red; text-align: center;'>Error: " . $conn->error . "</p>";
        }
        
        $conn->close();
    }
    ?>

    <div class="container">
        <h2 class="text-center fade-in">Contact Us</h2>
        <div class="form-container fade-in">
            <form action="contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn" id='submit'>Send Message</button>
            </form>
        </div>
    </div>

    <script src="cscript.js"></script>
</body>
</html>
