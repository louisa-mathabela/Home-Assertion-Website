<?php
include('connect.php');

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $sql = "DELETE FROM orders WHERE id = $order_id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Order deleted successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

header("Location: manage_orders.php");
exit();
?>
