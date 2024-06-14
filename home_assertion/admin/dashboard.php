<?php
session_start();
include('connect.php');


$product_count_query = "SELECT COUNT(*) AS count FROM product";
$product_count_result = $conn->query($product_count_query);
$product_count = $product_count_result->fetch_assoc()['count'];

$order_count_query = "SELECT COUNT(*) AS count FROM orders";
$order_count_result = $conn->query($order_count_query);
$order_count = $order_count_result->fetch_assoc()['count'];

$pending_order_query = "SELECT COUNT(*) AS count FROM orders WHERE status='pending'";
$pending_order_result = $conn->query($pending_order_query);
$pending_order_count = $pending_order_result->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Home Assertion</title>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <li><a href="dashboard.php" class="active">Dashboard</a></li>
            <li><a href="manage_products.php">Manage Products</a></li>
            <li><a href="manage_orders.php">Manage Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="dashboard-overview">
        <div class="card">
            <h3>Total Products</h3>
            <p><?php echo $product_count; ?></p>
        </div>
        <div class="card">
            <h3>Total Orders</h3>
            <p><?php echo $order_count; ?></p>
        </div>
        <div class="card">
            <h3>Pending Orders</h3>
            <p><?php echo $pending_order_count; ?></p>
        </div>
    </section>

    <section class="dashboard-details">
        <h2>Recent Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $recent_orders_query = "SELECT * FROM orders ORDER BY order_date DESC LIMIT 5";
                $recent_orders_result = $conn->query($recent_orders_query);

                if ($recent_orders_result->num_rows > 0) {
                    while ($order = $recent_orders_result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$order['id']}</td>
                            <td>{$order['customer_name']}</td>
                            <td>R {$order['total']}</td>
                            <td>{$order['status']}</td>
                            <td>{$order['order_date']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No recent orders.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <p>&#169 2024, Home Assertion. All rights reserved.</p>
</footer>

</body>
</html>

<?php
$conn->close();
?>
