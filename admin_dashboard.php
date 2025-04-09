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

//remove
if (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];
    $sql = "DELETE FROM products WHERE id = '$product_id'";
    mysqli_query($conn, $sql);
    header("Location: admin_dashboard.php");
    exit();
}


if (isset($_POST['remove_contact'])) {
    $contact_id = $_POST['contact_id'];
    $sql = "DELETE FROM contact_messages WHERE id = '$contact_id'";
    mysqli_query($conn, $sql);
    header("Location: admin_dashboard.php");
    exit();
}


if (isset($_POST['remove_user'])) {
    $user_email = $_POST['user_email'];
    $sql = "DELETE FROM user WHERE email = '$user_email'";
    mysqli_query($conn, $sql);
    header("Location: admin_dashboard.php");
    exit();
}


if (isset($_POST['remove_payment'])) {
    $payment_id = $_POST['payment_id'];
    $sql = "DELETE FROM pay WHERE id = '$payment_id'";
    mysqli_query($conn, $sql);
    header("Location: admin_dashboard.php");
    exit();
}

//  updating
if (isset($_POST['add_product'])) {
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;
    $product_name = $_POST['product_name'];
    $ingredients = $_POST['ingredients'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    
    $image = $_FILES['product_image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file) || empty($image)) {
        if ($product_id) {
            
            $sql = "UPDATE products SET 
                        juice_name='$product_name', 
                        ingredients='$ingredients', 
                        price='$price', 
                        quantity='$quantity'";
            if (!empty($image)) {
                $sql .= ", image_url='$target_file'";
            }
            $sql .= " WHERE id='$product_id'";
        } else {
            //add
            $sql = "INSERT INTO products (juice_name, ingredients, price, quantity, image_url) 
                    VALUES ('$product_name', '$ingredients', '$price', '$quantity', '$target_file')";
        }

        mysqli_query($conn, $sql);
        header("Location: admin_dashboard.php");


        exit();
    } else {
        echo "Failed to upload image";
    }
}


$edit_product = null;
if (isset($_GET['edit_product'])) {
    $product_id = $_GET['edit_product'];
    $sql = "SELECT * FROM products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    $edit_product = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juice Wonderland Admin Dashboard</title>
    <style>
        /body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.admin-container {
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: red;
}

nav {
    position: sticky;
    top: 0;
    z-index: 1000;
    background-color: orange;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav a {
    color: white;
    text-decoration: none;
    margin: 0 15px;
    padding: 8px 16px;
    display: inline-block;
}

nav a:hover {
    background-color: #dde4e9;
    color: #000000;
    border-radius: 10px;
}

.logout-button {
    background-color: #2093e6;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
}

.logout-button:hover {
    background-color: #0d7bcc;
    color: white;
}

.section {
    background: white;
    margin-bottom: 20px;
    padding: 65px 20px 20px 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.section h2 {
    margin-top: 0;
    color: green;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #2093e6;
    color: white;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input[type="text"], 
.form-group input[type="number"], 
.form-group input[type="file"],
.form-group textarea {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

.form-group button {
    background-color: #2093e6;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.form-group button:hover {
    background-color: #0d7bcc;
}

.action-buttons a {
    margin-right: 10px;
    text-decoration: none;
    color: #2093e6;
    cursor: pointer;
}

.action-buttons form {
    display: inline-block;
}

.action-buttons form button {
    background: none;
    border: none;
    color: #2093e6;
    cursor: pointer;
    padding: 0;
    font-size: inherit;
}

.action-buttons form button:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <h1>Juice Wonderland Admin Dashboard</h1>
    <nav>
        <div class="nav-links">
            <a href="#add-products">Add Products</a>
            <a href="#manage-products">Manage Products</a>
            <a href="#manage-contacts">Contact</a>
            <a href="#manage-users">Users</a>
            <a href="#manage-payments">Payments</a>
        </div>
        <div class="logout">
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </nav>

    <div class="admin-container">

        <!-- Section to Add Products -->
        <div class="section" id="add-products">
            <h2 align="center"><?php echo $edit_product ? 'Edit Product' : 'Add Products'; ?></h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?php echo $edit_product['id'] ?? ''; ?>">
                <div class="form-group">
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="product-name" name="product_name" required value="<?php echo $edit_product['juice_name'] ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label for="ingredients">Ingredients:</label>
                    <textarea id="ingredients" name="ingredients" required><?php echo $edit_product['ingredients'] ?? ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" required value="<?php echo $edit_product['quantity'] ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label for="product-image">Product Image:</label>
                    <input type="file" id="product-image" name="product_image">
                    <?php if ($edit_product && $edit_product['image_url']): ?>
                        <img src="<?php echo $edit_product['image_url']; ?>" alt="Product Image" style="width: 100px; margin-top: 10px;">
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required placeholder="Rs." value="<?php echo $edit_product['price'] ?? ''; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" name="add_product"><?php echo $edit_product ? 'Update Product' : 'Add Product'; ?></button>
                </div>
            </form>
        </div>

        <!-- html Manage Products -->
        <div class="section" id="manage-products">
            <h2 align="center">Manage Products</h2>
            <table>
                <thead>
                    <tr>
                        <th>Juice Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Ingredients</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="product-list">
                    <?php
                    $sql = "SELECT * FROM products";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["juice_name"] . "</td>";
                            echo "<td>" . $row["price"] . "</td>";
                            echo "<td>" . $row["quantity"] . "</td>";
                            echo "<td>" . $row["ingredients"] . "</td>";
                            echo "<td><img src='" . $row["image_url"] . "' alt='" . $row["juice_name"] . "' style='width:100px;'></td>";
                            echo "<td class='action-buttons'>
                                    <a href='admin_dashboard.php?edit_product=" . $row["id"] . "'>Edit</a>
                                    <form method='POST' action='' style='display:inline-block;'>
                                        <input type='hidden' name='product_id' value='" . $row["id"] . "'>
                                        <button type='submit' name='remove_product'>Remove</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No products available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- html Manage Contact Messages -->
        <div class="section" id="manage-contacts">
            <h2 align="center">Contact Messages</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="contact-list">
                    <?php
                    $sql = "SELECT * FROM contact_messages";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["message"] . "</td>";
                            echo "<td class='action-buttons'>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='contact_id' value='" . $row["id"] . "'>
                                        <button type='submit' name='remove_contact'>Remove</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No contact messages available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- html to  Users -->
        <div class="section" id="manage-users">
            <h2 align="center">Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="user-list">
                    <?php
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td>" . $row["password"] . "</td>";
                            echo "<td class='action-buttons'>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='user_email' value='" . $row["email"] . "'>
                                        <button type='submit' name='remove_user'>Remove</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No users available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- htmlto Manage Payments -->
        <div class="section" id="manage-payments">
            <h2 align="center">Payments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Juice Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="payment-list">
                    <?php
                    $sql = "SELECT * FROM pay";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["juice_name"] . "</td>";
                            echo "<td>" . $row["price"] . "</td>";
                            echo "<td>" . $row["quantity"] . "</td>";
                            echo "<td>" . $row["total"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td>" . $row["phone_number"] . "</td>";
                            echo "<td class='action-buttons'>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='payment_id' value='" . $row["id"] . "'>
                                        <button type='submit' name='remove_payment'>Remove</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No payments available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
