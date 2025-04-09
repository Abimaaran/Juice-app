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

$cart_count = 0;

$sql_cart_count = "SELECT COUNT(*) AS count FROM cart WHERE email = '" . $_SESSION['email'] . "'";
$result = $conn->query($sql_cart_count);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cart_count = $row['count'];
} else {
    $cart_count = 0;
}


if (isset($_POST['add_to_cart'])) {
    $juice_name = $conn->real_escape_string($_POST['juice_name']);
    $price = $conn->real_escape_string($_POST['price']);
    $quantity = 1;
    $email = $_SESSION["email"]; 

    $sql = "INSERT INTO cart (juice_name, price, quantity, email) 
            VALUES ('$juice_name', '$price', '$quantity', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Added to cart successfully!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error: " . $conn->error . "</p>";
    }
}


if (isset($_POST['buy_now'])) {
    $juice_name = $conn->real_escape_string($_POST['juice_name']);
    $price = $conn->real_escape_string($_POST['price']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $total = $conn->real_escape_string($_POST['total']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $address = $conn->real_escape_string($_POST['address']);
    $email = $_SESSION["email"]; 

    
    $sql_pay = "INSERT INTO pay (juice_name, price, quantity, total, phone_number, address, email) 
                VALUES ('$juice_name', '$price', '$quantity', '$total', '$phone_number', '$address', '$email')";

    if ($conn->query($sql_pay) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Purchase successful!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error: " . $conn->error . "</p>";
    }
}


$sql_products = "SELECT * FROM products";
$result_products = $conn->query($sql_products);


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Juices - Juice Wonderland</title>
    <link rel="stylesheet" href="pstyle.css">
    <style>
       #buyModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 60px;
        }

        .buy-form {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            border-radius: 10px;
        }

        .buy-form input[type="text"], .buy-form input[type="number"], .buy-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .buy-form input[type="checkbox"] {
            margin-right: 10px;
        }

        .buy-form button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .buy-form button[type="button"] {
            background-color: #f44336;
        }

        .juice-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .juice-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            width: calc(33.333% - 20px);
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .juice-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .juice-card h4 {
            margin: 10px 0;
        }

        .juice-card .price {
            color: #4CAF50;
            font-size: 18px;
            font-weight: bold;
        }

        .btn-container {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-container form,
        .btn-container button {
            flex: 1;
            margin: 5px;
        }

        .btn-container form button {
            width: 100%;
        }
    </style>
    
    <script>
        function calculateTotal() {
            var quantity = document.getElementById("quantity").value;
            var unitPrice = document.getElementById("unitPrice").value;
            var total = quantity * unitPrice;
            document.getElementById("total").value = total.toFixed(2);
        }

        function showBuyForm(juiceName, unitPrice) {
            document.getElementById("juice_name").value = juiceName;
            document.getElementById("unitPrice").value = unitPrice;
            document.getElementById("total").value = unitPrice;
            document.getElementById("quantity").value = 1;
            document.getElementById("buyModal").style.display = "block";
        }

        function hideBuyForm() {
            document.getElementById("buyModal").style.display = "none";
        }
    </script>
</head>
<body>
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
            <a class="nav-link" href="Addcard.php">
                <img src="cartImg.png" alt="Cart" class="cart-icon">
                <span id="cart-count"><?php echo $cart_count; ?></span>
            </a> 
            <a class="nav-link" href="logout.php"><img src="logout imag1.png" alt=""></a> 
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center">Our Juice</h2>
        <div class="juice-grid">
            <?php
            if ($result_products->num_rows > 0) {
                while ($row = $result_products->fetch_assoc()) {
                    echo "<div class='juice-card'>";
                    echo "<img src='" . $row["image_url"] . "' alt='" . $row["juice_name"] . "'>";
                    echo "<h4>" . $row["juice_name"] . "</h4>";
                    echo "<p class='price'>Rs." . $row["price"] . "</p>";
                    echo "<div class='btn-container'>";
                    echo "<form method='POST' action=''>";
                    echo "<input type='hidden' name='juice_name' value='" . $row["juice_name"] . "'>";
                    echo "<input type='hidden' name='price' value='" . $row["price"] . "'>";
                    echo "<button type='submit' name='add_to_cart' class='btn btn-outline-primary' ><i class='fas fa-cart-plus'> Add to Cart</i></button>";
                    echo "</form>";
                    echo "<button class='btn btn-primary' type='button' onclick='showBuyForm(\"" . $row["juice_name"] . "\", " . $row["price"] . ")'>BUY</button>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Buy -->
    <div id="buyModal" style="display: none;">
        <form method="POST" action="" class="buy-form">
            <h3>Buy Juice</h3>
            <input type="hidden" id="juice_name" name="juice_name">
            <label for="unitPrice">Unit Price:</label>
            <input type="text" id="unitPrice" name="price" readonly><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1" oninput="calculateTotal()"><br>

            <label for="total">Total:</label>
            <input type="text" id="total" name="total" readonly><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br>

            <label for="confirm">Confirm Payment:</label>
            <input type="checkbox" id="confirm" name="confirm" required><br>

            <button type="submit" name="buy_now" class="btn btn-success">Buy Now</button>
            <button type="button" class="btn btn-secondary" onclick="hideBuyForm()">Cancel</button>
        </form>
    </div>

</body>
</html>
