<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Juice Wonderland</title>
    <link rel="stylesheet" href="lstyle.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center text-black">Login</h2>
        <form class="bg-white p-4 rounded shadow" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pwd" required>
            </div>
            <button type="submit" name="loginbtn" class="btn btn-primary btn-block">Login</button>
            <button type="button" class="btn btn-secondary btn-block" onclick="location.href='Signup.php'">Sign Up</button>
            <div class="text-center mt-3">
                <a href="forgot.php" class="text-primary">Forgot Password?</a>
            </div>
            <div class="text-center mt-3">
                <button type="button" class="btn btn-sm btn-secondary" onclick="location.href='index.php'">Back</button>
            </div>
        </form>
        
        <?php
        session_start();

        if (isset($_POST["loginbtn"])) {
            $email = $_POST["email"];
            $password = $_POST["pwd"];

            $con = mysqli_connect("localhost", "root", "", "juice", "3306");

            if (!$con) {
                die("Juice theenthu poochu...!! \n Nanri vanakkam!");
            }

            
            if ($email == 'admin@gmail.com' && $password == 'admin123') {
                $_SESSION["email"] = $email;
                header('Location: admin_dashboard.php');
            } else {
                
                $sql = "SELECT * FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."';";
                $results = mysqli_query($con, $sql);

                if (mysqli_num_rows($results) > 0) {
                    $_SESSION["email"] = $email;
                    header('Location: home.php');
                } else {
                    header('Location: login.php');
                }
            }
        }
        ?>

    </div>
    <!-- <script src="lscript.js"></script> -->
</body>
</html>
