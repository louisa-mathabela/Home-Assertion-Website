<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Assertion Website</title>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="#"><img src="HOME ASSERTION.jpg" class="logo" alt="Home Assertion Logo"></a>
        
        <div>
            <ul id="navbar">
                <li><a href="home.php">Home</a></li>
                <li><a class= "active" href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
            </ul>
        </div>
    
    </section>

    <section id="shop-hero">
            <h1>HOME ASSERTION</h1>
            <p>Shop with us</p>  
    </section> 

    <section id="shop-products"class="section-p1" >
        <div class="products-box">
             
            <div class="products" onclick="window.location.href='product_page.php';">
                <img src="shop/candle (1).jpg" alt="Enigma Vase">
                <div class ="description">
                    <span>Carrol Boyes</span>
                    <h5>Ceramic Vase</h5>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>R 650</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             
             <div class="products">
                <img src="shop/candle (2).jpg" alt="Enigma Vase">
                <div class ="description">
                    <span>Carrol Boyes</span>
                    <h5>Ceramic Vase</h5>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>R 650</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>   
             
             <div class="products">
                <img src="shop/candle (3).jpg" alt="Enigma Vase">
                <div class ="description">
                    <span>Carrol Boyes</span>
                    <h5>Ceramic Vase</h5>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>R 650</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>   
             
             <div class="products">
                <img src="shop/candle (4).jpg" alt="Enigma Vase">
                <div class ="description">
                    <span>Carrol Boyes</span>
                    <h5>Ceramic Vase</h5>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>R 650</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>      
        </div>
    </section>

    <section id="page-navigation" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>
 
    <section id="newsletter" class="section-p1">
        <div class="newsletter-text">
            <h4>Sign Up To Our Newsletter</h4>
            <P>Get e-mail updates about our latest shop and <span>special offers.</span></P>
        </div>
        <div class="form">
            <input type="text" placeholder="Email Adress">
            <button>Sign Up</button>
        </div>

    </section>
     
    <footer class="section-p1">
        <div class="column">
            <h4>Contact</h4>
            <p><strong>Adress: </strong>13 2nd Avenue, Northmead, Benoni, 1501</p>
            <p><strong>Phone: </strong>011-845-7171 / (+27) 78 389 4280</p>
            <p><strong>Hours: </strong> 9:00 - 17:30, Mon - Sat</p>
            <div class="follow">
                <br>
                <h4> Follow us on:</h4>
                <div class="social-media-icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </div>

        <div class="column">
                <h4>About</h4>
                <a href="#">About us</a>
                <a href="#">Delivery Information</a>
                <a href="#">Privacy Information</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Contact Us</a>
        </div>

        <div class="column">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="payment-gateway">
            <h4>Secured Payment Gateways</h4>
            <img src="payment_gateway.png" alt="Payment Gateway Logos">
        </div>

        <div class="copyright">
            <p>&#169 2024, LOUIS CREATIVE CO. Home Assertion. All rights reserved.</p>
        </div>

    </footer>

    <script src="script.js"></script>
</body>

</html> 