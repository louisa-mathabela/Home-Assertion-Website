<?php 

session_start();
include("connect.php")
?>

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
                <li><a class= "active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
            </ul>
        </div>
    </section>

    <section id="hero">
        <div class="hero-text">
            <h4>Trade-in-offer</h4>
            <h2>Super value deals</h2>
            <h1>On all product</h1>
            <p>Save up to 70%</p>
            <button>Shop Now</button>
        </div>
        <div class="hero-image">
            <img src="hero_image.jpg" alt="Hero Image">
        </div>
    </section>

    <section id="services"cl ass="section-p1" >
    <h2>Home Services</h2>
    <div class="service-box">
         
        <div class="service-image">
            <img src="services/h_design.jpg" alt="Enigma Vase">
            <div class ="description">
                <span>Home Design</span>
            </div>
         </div>
         
         <div class="service-image">
            <img src="services/h_design.jpg" alt="Enigma Vase">
            <div class ="description">
                <span>Home Staging</span>
            </div>
         </div>
         
         <div class="service-image">
            <img src="services/h_design.jpg" alt="Enigma Vase">
            <div class ="description">
                <span>Furniture Leasing</span>
            </div>
         </div>
    </div>
    </section>

    <section id="best-selling" class="section-p1">
        <h2>Best-Selling Products</h2>
        <div class="product-box">
            <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['product_name']; ?>">
                <div class="description">
                    <span><?php echo $product['category_name']; ?></span>
                    <h5><?php echo $product['product_name']; ?></h5>
                    <div class="rating">
                        <!-- You can add rating stars here if available -->
                    </div>
                    <h4>R <?php echo $product['price']; ?></h4>
                    <p><?php echo $product['description']; ?></p>
                    <p>SKU: <?php echo $product['sku']; ?></p>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="banner">

    </section>

    <section id="new-arrivals"class="section-p1 section-m1" >
        <h2>New Arrivals</h2>
        <div class="product-box">
             
            <div class="product">
                <img src="new_arrival.jpg" alt="Enigma Vase">
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
             
             <div class="product">
                <img src="new_arrival.jpg" alt="Enigma Vase">
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
             
             <div class="product">
                <img src="new_arrival.jpg" alt="Enigma Vase">
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
             
             <div class="product">
                <img src="new_arrival.jpg" alt="Enigma Vase">
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

    <script src="script.js"></script>
</body>

</html>