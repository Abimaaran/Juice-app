<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juice Wonder Land</title>
    <link rel="stylesheet" href="istyle.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; 
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .navbar {
            background-color: orange;
            padding: 15px 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 1000;
            height: 60px;
        }

        .navbar .navbar-brand {
            display: flex;
            align-items: center;
            color: #fff;
            text-decoration: none;
            font-size: 24px;
        }

        .navbar .navbar-brand img.logo {
            height: 40px;
            margin-right: 10px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .navbar-right .loginbtn {
            background-color: #fff;
            color: #ff6f61;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
        }

        .navbar-right .loginbtn:hover {
            background-color: #007bff;
            color: #fff;
        }

        .hero {
            background-color: #ff6f61;
            color: #fff;
            width: 100%;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .hero-text {
            max-width: 500px;
        }

        .hero-text h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .hero-text p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .hero-text .btn {
            background-color: #fff;
            color: #ff6f61;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .hero-text .btn:hover {
            background-color: #007bff;
            color: #fff;
        }

        .hero-image img {
            width: 300px;
            max-width: 100%;
            height: auto;
        }

        .hero-description {
            font-size: 16px;
            margin-top: 15px;
            color: #fff;
        }

        /* Carousel Styles */
        .carousel-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            background-color: #333;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-title {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            left: 20px;
        }

        .carousel-track {
            display: inline-flex;
            transition: transform 0.5s ease; 
            will-change: transform;
        }

        .carousel-card {
            display: inline-block;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            margin-right: 20px;
            width: 150px; 
            height: 200px; 
            flex-shrink: 0;
        }

        .carousel-card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }

        .carousel-card h4 {
            padding: 10px;
            font-size: 14px;
            color: #333;
            margin: 0;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="index.php">
            <img src="log.png" alt="Juice Wonderland" class="logo"> 
            <i style="color: rgb(11, 180, 78);">100% Natural Fruits</i>
        </a>
        <div class="navbar-right">
            <a href="login.php" class="loginbtn">Login</a>
        </div>
    </nav>

    <div class="hero">
        <div class="hero-text">
            <h1>It's Fruit Madness</h1>
            <p>Organic Cold Beverage</p>
            <a href="login.php" class="btn">Buy Now</a>
        </div>
        <div class="hero-image">
            <img src="Login_Sign_Up_BG/juice.png" alt="Fresh Juice">
            <p class="hero-description">Experience the refreshing taste of freshly squeezed fruit juices. Our beverages are made with 100% natural ingredients, ensuring you get the nutrients with every sip.</p>
        </div>
    </div>

    <div class="carousel-container">
        <div class="carousel-title">Our Juice</div>
        <div class="carousel-track">
            <div class="carousel-card">
                <img src="juice photoes/kiwi.png" alt="Kiwi Juice">
                <h4>Kiwi Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/Beerys.jpg" alt="Strawberry Juice">
                <h4>Strawberry Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/papaya.jpg" alt="Papaya Juice">
                <h4>Papaya Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/pineapple.jpg" alt="Pineapple Juice">
                <h4>Pineapple Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/tomato.jpg" alt="Tomato Juice">
                <h4>Tomato Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/carrot.jpg" alt="Carrot Juice">
                <h4>Carrot Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/grapefruit.jpg" alt="Grapefruit Juice">
                <h4>Grapefruit Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/beet.jpg" alt="Beet Juice">
                <h4>Beet Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/Cranberry.jpg" alt="Cranberry Juice">
                <h4>Cranberry Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/Pomegranate.jpg" alt="Pomegranate Juice">
                <h4>Pomegranate Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/black beery.png" alt="Blackberry Juice">
                <h4>Blackberry Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/Cucumber.jpg" alt="Cucumber Juice">
                <h4>Cucumber Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/coconut.jpg" alt="Coconut Juice">
                <h4>Coconut Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/peach.jpg" alt="Peach Juice">
                <h4>Peach Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/jackfruit.png" alt="Jackfruit Juice">
                <h4>Jackfruit Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/dragon fruit.jpg" alt="Dragon Fruit Juice">
                <h4>Dragon Fruit Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/cheery.jpg" alt="Cherry Juice">
                <h4>Cherry Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/pineapple.jpg" alt="Pineapple Juice">
                <h4>Pineapple Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/tomato.jpg" alt="Tomato Juice">
                <h4>Tomato Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/carrot.jpg" alt="Carrot Juice">
                <h4>Carrot Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/pineapple.jpg" alt="Pineapple Juice">
                <h4>Pineapple Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/tomato.jpg" alt="Tomato Juice">
                <h4>Tomato Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/carrot.jpg" alt="Carrot Juice">
                <h4>Carrot Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/grapefruit.jpg" alt="Grapefruit Juice">
                <h4>Grapefruit Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/beet.jpg" alt="Beet Juice">
                <h4>Beet Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/Beerys.jpg" alt="Strawberry Juice">
                <h4>Strawberry Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/papaya.jpg" alt="Papaya Juice">
                <h4>Papaya Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/pineapple.jpg" alt="Pineapple Juice">
                <h4>Pineapple Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/tomato.jpg" alt="Tomato Juice">
                <h4>Tomato Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/carrot.jpg" alt="Carrot Juice">
                <h4>Carrot Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/grapefruit.jpg" alt="Grapefruit Juice">
                <h4>Grapefruit Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/beet.jpg" alt="Beet Juice">
                <h4>Beet Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/Cranberry.jpg" alt="Cranberry Juice">
                <h4>Cranberry Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/Pomegranate.jpg" alt="Pomegranate Juice">
                <h4>Pomegranate Juice</h4>
            </div>
            <div class="carousel-card">
                <img src="juice photoes/black beery.png" alt="Blackberry Juice">
                <h4>Blackberry Juice</h4>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Juice Wonderland. All rights reserved.</p>
    </footer>

    <script>
        let currentIndex = 0;

        function autoMoveCarousel() {
            const track = document.querySelector('.carousel-track');
            const cardWidth = document.querySelector('.carousel-card').offsetWidth + 20; // Including margin
            const trackWidth = track.scrollWidth;
            const containerWidth = document.querySelector('.carousel-container').offsetWidth;

            currentIndex++;

            // If the carousel reaches the end, reset to the start
            if (currentIndex * cardWidth >= trackWidth - containerWidth) {
                currentIndex = 0;
            }

            track.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        }

        
        setInterval(autoMoveCarousel, 400);
    </script>
</body>
</html>
