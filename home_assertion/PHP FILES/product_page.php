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

    <div id="product-details" class="container">
        <div class="image-column">
            <div class="product-image">
                <img src="shop/candle (3).jpg" id="main-image" alt="Product Image">
            </div> 
            
            <div class="small-images">
                <img src="shop/candle (1).jpg"  class="small-image" alt="Product Image 1">
                <img src="shop/candle (2).jpg" class="small-image" alt="Product Image 2">
                <img src="shop/candle (3).jpg" class="small-image" alt="Product Image 3">
                <img src="shop/candle (4).jpg" class="small-image" alt="Product Image 4">
            </div>
    
           
        </div>
        
        <div class="product-details">
            <p class="navigation"><a href="index.php">Home</a> > <a href="shop.php">Shop</a></p>
            <span class="product-title">Product Title</span>
            <p class="product-price">$99.99</p>
            <p class="product-description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent venenatis metus at tortor pulvinar varius.
            </p>
            <div class="purchase-options">
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
    </div>
    
    <section id="similar-products"class="section-p1" >
        <h2>you might also like</h2>
        <div class="similar-box">
             
            <div class="similar">
                <img src="enigma.jpg" alt="Enigma Vase">
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
             
             <div class="similar">
                <img src="enigma.jpg" alt="Enigma Vase">
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
             
             <div class="similar">
                <img src="enigma.jpg" alt="Enigma Vase">
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
             
             <div class="similar">
                <img src="enigma.jpg" alt="Enigma Vase">
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

    <script>
        var mainImage = document.getElementById("main-image");
        var smallImages = document.querySelectorAll(".small-image");

        smallImages.forEach(function(smallImage) {
            smallImage.onclick = function() {
                mainImage.src = smallImage.src;
            }
        });
    </script>

    <script src="script.js"></script>
</body>

</html> 
