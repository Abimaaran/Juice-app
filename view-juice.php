<?php
session_start();


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "juice";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Juices - Juice Wonderland</title>
    <link rel="stylesheet" href="vstyle.css">

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
            <a class="nav-link" href="logout.php"><img src="logout imag1.png" alt=""></a> 
        </div>
    </nav>

</head>
<body>

    <div class="container">
        <h2 class="text-center">Our Juice</h2>
        <div class="juice-grid">
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="juice-card">';
                    echo '<img src="' . $row["image_url"] . '" alt="' . $row["juice_name"] . '">';
                    echo '<h4>' . $row["juice_name"] . '</h4>';
                    echo '<p class="see-more" onclick="toggleIngredients(this)">See More</p>';
                    echo '<p class="ingredients">Ingredients: ' . $row["ingredients"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>
        </div>
    </div>

    <script src="vscript.js"></script>
</body>
</html>

<?php

$conn->close();
?>
