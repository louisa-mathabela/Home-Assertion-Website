<?php
session_start();
include('connect.php'); // Adjust this to your database connection file

$total = 0;
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

foreach ($products_in_cart as $product) {
    $subtotal = $product['price'] * $product['quantity'];
    $total += $subtotal;
}

$errors = []; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $delivery_option = htmlspecialchars($_POST['delivery_option']);
    $payment_option = htmlspecialchars($_POST['payment_option']);
    
    $delivery_address = '';
    if ($delivery_option == 'home_delivery') {
        $unit_number = htmlspecialchars($_POST['unit_number']);
        $street_number = htmlspecialchars($_POST['street_number']);
        $address_line_1 = htmlspecialchars($_POST['address_line_1']);
        $address_line_2 = htmlspecialchars($_POST['address_line_2']);
        $city = htmlspecialchars($_POST['city']);
        $province = htmlspecialchars($_POST['province']);
        $postal_code = htmlspecialchars($_POST['postal_code']);
        $country = htmlspecialchars($_POST['country']);
        $delivery_address = "$unit_number, $street_number, $address_line_1, $address_line_2, $city, $province, $postal_code, $country";
    }

    if ($payment_option == 'card') {
        $name_on_card = htmlspecialchars($_POST['name_on_card']);
        $card_number = htmlspecialchars($_POST['card_number']);
        $expiry_date = htmlspecialchars($_POST['expiry_date']);
        $cvv = htmlspecialchars($_POST['cvv']);

        if (empty($name_on_card) || empty($card_number) || empty($expiry_date) || empty($cvv)) {
            $errors[] = 'Please fill in all card details.';
        }
    }

    if (empty($errors)) {

        $merchant_id = '19652862';
        $merchant_key = 'uy7uuulfifvxw';
        $return_url = 'https://yourwebsite.com/thank_you.php'; 
        $cancel_url = 'https://yourwebsite.com/checkout.php'; 
        $notify_url = 'https://yourwebsite.com/payment_notify.php'; 

       
        $data = [
            'merchant_id' => $merchant_id,
            'merchant_key' => $merchant_key,
            'return_url' => $return_url,
            'cancel_url' => $cancel_url,
            'notify_url' => $notify_url,
            'name_first' => $first_name,
            'name_last' => $last_name,
            'email_address' => $email,
            'cell_number' => $phone,
            'amount' => number_format($total, 2, '.', ''),
            'item_name' => 'Order from Home Assertion', 
            'm_payment_id' => uniqid(), 
        ];


        $htmlForm = '<form action="https://www.payfast.co.za/eng/process" method="post">';
        foreach ($data as $key => $value) {
            $htmlForm .= '<input name="' . $key . '" type="hidden" value="' . htmlspecialchars($value) . '">';
        }
        $htmlForm .= '<button type="submit" id="pay-button">Proceed to PayFast</button></form>';


        echo $htmlForm;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Home Assertion Website</title>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="checkout.css">
</head>
<body>

    <section id="header">
        <a href="#"><img src="HOME ASSERTION.jpg" class="logo" alt="Home Assertion Logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
            </ul>
        </div>
    </section>

    <section id="checkout" class="section-p1">
        <h1>Checkout</h1>
        <div class="container">
            <div class="cart-summary">
                <h2>Cart Summary</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products_in_cart as $product) : ?>
                                <?php $subtotal = $product['price'] * $product['quantity']; ?>
                                <tr>
                                    <td><img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>"></td>
                                    <td><?= $product['name']; ?></td>
                                    <td>R <?= number_format($product['price'], 2); ?></td>
                                    <td><?= $product['quantity']; ?></td>
                                    <td>R <?= number_format($subtotal, 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="cart-total">
                    <h3>Total: R <?= number_format($total, 2); ?></h3>
                </div>
            </div>

            <div class="checkout-section">
                <h2>Shipping Information</h2>
                <?php if (!empty($errors)) : ?>
                    <div class="errors">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form class="checkout-form" method="POST" action="checkout.php">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label>Delivery Option</label>
                        <div class="delivery-options">
                            <input type="radio" id="delivery_home" name="delivery_option" value="home_delivery" onclick="toggleDeliveryDetails()" required>
                            <label for="delivery_home">Home Delivery</label>
                            <input type="radio" id="delivery_pickup" name="delivery_option" value="store_pickup" onclick="toggleDeliveryDetails()" required>
                            <label for="delivery_pickup">Store Pickup</label>
                        </div>
                    </div>
                    <div id="delivery-details" class="hidden">
                        <div class="form-group">
                            <label for="unit_number">Unit Number</label>
                            <input type="text" id="unit_number" name="unit_number">
                        </div>
                        <div class="form-group">
                            <label for="street_number">Street Number</label>
                            <input type="text" id="street_number" name="street_number">
                        </div>
                        <div class="form-group">
                            <label for="address_line_1">Address Line 1</label>
                            <input type="text" id="address_line_1" name="address_line_1">
                        </div>
                        <div class="form-group">
                            <label for="address_line_2">Address Line 2</label>
                            <input type="text" id="address_line_2" name="address_line_2">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city">
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" id="province" name="province">
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Payment Option</label>
                        <div class="payment-options">
                            <input type="radio" id="payment_card" name="payment_option" value="card" onclick="togglePaymentDetails()" required>
                            <label for="payment_card">Credit/Debit Card</label>
                            <input type="radio" id="payment_cash" name="payment_option" value="cash" onclick="togglePaymentDetails()" required>
                            <label for="payment_cash">Cash on Delivery</label>
                        </div>
                    </div>

                    <div id="card-details" class="hidden">
                        <div class="form-group">
                            <label for="name_on_card">Name on Card</label>
                            <input type="text" id="name_on_card" name="name_on_card">
                        </div>
                        <div class="form-group">
                            <label for="card_number">Card Number</label>
                            <input type="text" id="card_number" name="card_number">
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv">
                        </div>
                    </div>

                    <button type="submit" class="checkout-button">Place Order</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="section-p1">
        <div class="column">
            <h4>Contact</h4>
            <p><strong>Address: </strong>13 2nd Avenue, Northmead, Benoni, 1501</p>
            <p><strong>Phone: </strong>011-845-7171 / (+27) 78 389 4280</p>
            <p><strong>Hours: </strong> 9:00 - 17:30, Mon - Sat</p>
            <div class="follow">
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
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="payment-gateway">
            <h4>Secured Payment Gateways</h4>
            <img src="payment_gateway.png" alt="Payment Gateways">
        </div>
    </footer>
    <script src="checkout.js"></script>
</body>
</html>
