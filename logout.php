<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Juice Wonderland</title>
    
   
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .logout-container {
            text-align: center;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logout-container h2 {
            margin-bottom: 20px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            background-color: #f7941d;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .btn:hover{
            background-color: rgb(14, 72, 164);
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>You have been logged out</h2>
        <p>Thank you for visiting Juice Wonderland. You have successfully logged out.</p>
        <a href="login.php" > <button class="btn">Go to Login Page</button></a>
    </div>

</body>
</html>
