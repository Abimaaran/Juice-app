<?php
session_start();


$con = mysqli_connect("localhost", "root", "", "juice", "3306");
if (!$con) {
    die("Sorry, we are facing a technical issue: " . mysqli_connect_error());
}


if (!isset($_SESSION['email'])) {
    echo "<script>alert('Please log in to view your cart.'); window.location.href='Login and signup.php';</script>";
    exit();
}


$user_email = $_SESSION['email'];


$sql = "SELECT * FROM `cart` WHERE `email` = '$user_email'";
$result = mysqli_query($con, $sql);
$totalPrice = 0;

if (isset($_POST['det_id'])) {
    $delete_id = $_POST['det_id'];
    $delete_sql = "DELETE FROM `cart` WHERE id = $delete_id AND email = '$user_email'";

    if (mysqli_query($con, $delete_sql)) {
        
        header("Location: Addcard.php");
        exit();
    } else {
        echo "<script>alert('Oops, something went wrong. Please try again.');</script>";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Juice Wonderland</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('juice for slide bar/slide3.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
        }
        table {
            width: 500px;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
            background-color: #f8f8f8;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        thead {
            background-color: #154567;
            color: white;
        }
        thead th,
        tbody td {
            padding: 12px;
        }
        tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        .del-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .del-btn:hover {
            background-color: #d32f2f;
        }
        .total-price {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
            color: green;
        }
        .back-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
       
    </header>
    <div class="container">
       <h3>Add to cart product details</h3>
       <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $totalPrice += $row['price'];
                        echo "
                            <tr>
                                <td>{$row['juice_name']}</td>
                                <td>{$row['price']}</td>
                                <td>
                                    <form method='POST'>
                                        <input type='hidden' name='det_id' value='{$row['id']}'>
                                        <button class='del-btn' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
       </table>
       <div class="total-price">Total Price: Rs.<?php echo number_format($totalPrice, 2); ?></div>
       <a href="pay.php" class="back-btn">Back to Pay</a>
    </div>
</body>
</html>
