<?php 
session_start();
include("connect.php");

$query = "SELECT p.id, p.name, p.description, p.product_image, p.price, pc.category_name
          FROM product p
          JOIN product_category pc ON p.category_id = pc.id
          WHERE p.is_best_seller = 1";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Best sellers query failed: " . mysqli_error($conn));
}


$new_arrivals_query = "
    SELECT p.id, p.name, pc.category_name, p.price, p.description, p.product_image 
    FROM product p
    JOIN product_category pc ON p.category_id = pc.id
    WHERE p.is_new_arrival = 1
";

$new_arrivals_result = mysqli_query($conn, $new_arrivals_query);

if (!$new_arrivals_result) {
    die("New arrivals query failed: " . mysqli_error($conn));
}
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
                <li><a class="active" href="index.php">Home</a></li>
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
            <p>Welcome to Home Assertion</p>
            
            <h2>quality interior decor pieces</h2>
            <p>elevate your space with us</p>
            <button>Shop Now</button>
        </div>
        <div class="hero-image">
            <img src="hero_image.jpg" alt="Hero Image">
        </div>
    </section>

    <section id="services" class="section-p1">
        <h2>Home Services</h2>
        <div class="service-box">
            <div class="service-image">
                <img src="services/h_design.jpg" alt="Enigma Vase">
                <div class="description">
                    <span>Home Design</span>
                </div>
            </div>
            <div class="service-image">
                <img src="services/h_design.jpg" alt="Enigma Vase">
                <div class="description">
                    <span>Home Staging</span>
                </div>
            </div>
            <div class="service-image">
                <img src="services/h_design.jpg" alt="Enigma Vase">
                <div class="description">
                    <span>Furniture Leasing</span>
                </div>
            </div>
        </div>
    </section>

    <section id="best-selling" class="section-p1">
        <h2>Best-Selling Products</h2>
        <div class="product-box">
            <?php while ($product = mysqli_fetch_assoc($result)): ?>
            <a href="product.php?id=<?php echo $product['id']; ?>">
                <div class="product">
                    <img src="<?php echo $product['product_image']; ?>" alt="<?php echo $product['name']; ?>">
                    <div class="description">
                        <span><?php echo $product['category_name']; ?></span>
                        <h5><?php echo $product['name']; ?></h5>
                        <h4>R <?php echo $product['price']; ?></h4>
                    </div>
                </div>
            </a>
            <?php endwhile; ?>
        </div>
    </section>

    <section id="new-arrivals" class="section-p1 section-m1">
        <h2>New Arrivals</h2>
        <div class="product-box">
            <?php while ($new_arrival = mysqli_fetch_assoc($new_arrivals_result)): ?>
            <a href="product.php?id=<?php echo $new_arrival['id']; ?>">
                <div class="product">
                    <img src="<?php echo $new_arrival['product_image']; ?>" alt="<?php echo $new_arrival['name']; ?>">
                    <div class="description">
                        <span><?php echo $new_arrival['category_name']; ?></span>
                        <h5><?php echo $new_arrival['name']; ?></h5>
                        <h4>R <?php echo number_format($new_arrival['price'], 2); ?></h4>
                    </div>
                </div>
            </a>
            <?php endwhile; ?>
        </div>
    </section>

    <footer class="section-p1">
        <div class="column">
            <h4>Contact</h4>
            <p><strong>Address: </strong>13 2nd Avenue, Northmead, Benoni, 1501</p>
            <p><strong>Phone: </strong>011-845-7171 / (+27) 78 389 4280</p>
            <p><strong>Hours: </strong> 9:00 - 17:30, Mon - Sat</p>
            <div class="follow">
                <br>
                <h4>Follow us on:</h4>
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
