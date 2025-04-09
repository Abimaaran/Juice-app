<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Juice Wonderland</title>
    <link rel="stylesheet" href="sstyle.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center text-black">Sign Up</h2>
        <form class="bg-white p-4 rounded shadow" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pwd" required>
            </div>
            <div class="form-group">
                <label for="confirmPwd">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPwd" name="confirmPwd" required>
            </div>
            <button type="submit" name="signupbtn" class="btn btn-primary btn-block">Sign Up</button>
            <button type="button" class="btn btn-secondary btn-block" onclick="location.href='login.php'">Login</button>
        </form>
        <?php
            if (isset($_POST["signupbtn"])) {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["pwd"];
                $conPassword = $_POST["confirmPwd"];

                if ($password == $conPassword) {
                    $con = mysqli_connect("localhost", "root", "", "juice", "3306");

                    if (!$con) {
                        die("Juice theenthu poochu...!! \n Nanri vanakkam!");
                    }

                    $sql = "INSERT into `user` (`email`, `username`, `password`) values ('".$email."', '".$username."', '".$password."');";
                    
                    mysqli_query($con,$sql);

                    header("Location:login.php");

                } else {
                    echo "<script>
                            alert('Passwords do not match!');
                        </script>";
                }
            }
        ?>
    </div>
    <!-- <script src="sscript.js"></script> -->
</body>
</html>
