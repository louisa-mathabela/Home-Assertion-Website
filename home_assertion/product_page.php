<?php
include('connect.php');


$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;


$query = "
    SELECT p.*, c.category_name 
    FROM product p 
    JOIN product_category c ON p.category_id = c.id 
    WHERE p.id = $product_id
";
$result = $conn->query($query);

if (!$result || $result->num_rows == 0) {
    die("Product not found.");
}

$product = $result->fetch_assoc();


$small_images_query = "
    SELECT small_image_url 
    FROM product_small_images 
    WHERE product_id = $product_id 
    ORDER BY `order`
";
$small_images_result = $conn->query($small_images_query);

$small_images = [];
if ($small_images_result && $small_images_result->num_rows > 0) {
    while ($row = $small_images_result->fetch_assoc()) {
        $small_images[] = $row['small_image_url'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> | Home Assertion Website</title>
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
                <li><a class="active" href="shop.php">Shop</a></li>
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
                <img src="<?php echo $product['product_image']; ?>" id="main-image" alt="<?php echo $product['name']; ?>">
            </div> 
            
            <div class="small-images">
                <!-- Main image as the first small image -->
                <img src="<?php echo $product['product_image']; ?>" class="small-image" alt="Product Image">
                <?php foreach ($small_images as $small_image) : ?>
                    <img src="<?php echo $small_image; ?>" class="small-image" alt="Product Image">
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="product-details">
            <p class="navigation"><a href="home.php">Home</a> > <a href="shop.php">Shop</a></p>
            <span class="product-title"><?php echo $product['name']; ?></span>
            <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
            <p class="product-description"><?php echo $product['description']; ?></p>
            <div class="purchase-options">
                <form method="post" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="number" id="quantity" name="quantity" min="1" value="1">
                    <button type="submit" class="add-to-cart">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    

    

    <footer class="section-p1">
        <div class="column">
            <h4>Contact</h4>
            <p><strong>Address: </strong>13 2nd Avenue, Northmead, Benoni, 1501</p>
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

<?php
$conn->close();
?>
