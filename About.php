<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Juice Wonderland</title>
    <link rel="stylesheet" href="astyle.css">

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
    
    <div class="container" style="background-color: black;">
        <h2 class="text-center fade-in" style="color: yellow;">About Us</h2>

        
        <div class="carousel fade-in" >
            <div class="carousel-inner" >
                <div class="carousel-item active" >
                    <img src="juice for slide bar/slide1.jpg" alt="Fresh Orange Juice">
                    
                </div>
                <div class="carousel-item ">
                    <img src="juice for slide bar/slide2.jpg" alt="Refreshing Mango Juice">
                    
                </div>
                <div class="carousel-item ">
                    <img src="juice for slide bar/slide3.jpg" alt="Healthy Berry Juice">
                    
                </div>

                

               
            </div>
            <button class="carousel-control-prev" onclick="prevSlide()">&#10094;</button>
            <button class="carousel-control-next" onclick="nextSlide()">&#10095;</button>
        </div>
        <hr>

      
        <div class="about-text fade-in" style="background-color: yellow;" >
            <center><h1 style="color: red;">Welcome to Juice Wonderland</h1></center>
            
            <p>
                At Juice Wonderland, we believe in the power of fresh, natural ingredients. Our mission is to provide
                delicious and nutritious fruit juices that support a healthy lifestyle. Each of our juices is crafted from
                the finest, locally-sourced fruits and vegetables, ensuring that every sip is packed with vitamins, minerals,
                and antioxidants.
            </p>
            <h4>Benefits of Fresh Fruit Juices</h4>
            <ul>
                <li><strong>Rich in Nutrients:</strong> Fresh fruit juices are loaded with essential vitamins and minerals that
                    help boost your immune system and overall health.</li>
                <li><strong>Hydration:</strong> Juices like watermelon and cucumber are high in water content, keeping you
                    hydrated and refreshed.</li>
                <li><strong>Detoxification:</strong> Many fruit juices contain antioxidants that help detoxify your body and
                    reduce inflammation.</li>
                <li><strong>Improved Digestion:</strong> Ingredients like ginger and mint in juices can aid in digestion and
                    soothe your stomach.</li>
                <li><strong>Energy Boost:</strong> Natural sugars in fruits provide a quick and healthy energy boost, making
                    fruit juices a perfect pick-me-up.</li>
            </ul>
        </div>
    </div>

    <script src="ascript.js"></script>
</body>
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <img src="lastimg.jpg" alt=" Juice Logo">
            <address>
                915 40th hospital Road, Jaffna<br>
                <a href="juicewonderland@gmail.com">juicewonderland@gmail.com</a><br>
                Phone: +94 078-394-4510<br>
                Fax: 563-386-6200
            </address>
        </div>
        <div class="footer-section">
            <h3>Product</h3>
            <ul>
                <li><a href="pay.php">Home</a></li>
                <li><a href="About.php">About Us</a></li>
               
                <li><a href="view-juice.php">view-juice</a></li>
                <li><a href="pay.php">Pay</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Social Media Feeds</h3>
            <ul>
                <li><a href="https://web.facebook.com/abimaaran.nadesan.5">Facebook</a></li>
                <li><a href="https://x.com/?lang-en=">Twitter</a></li>
                <li><a href="https://www.instagram.com/">Instagram</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Free Nationwide Shipping</h3>
            <p>563-386-1999</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p><center> 2024  Juice Wonder Land. All rights reserved.</center></p>
        
    </div>
</footer>
</html>
