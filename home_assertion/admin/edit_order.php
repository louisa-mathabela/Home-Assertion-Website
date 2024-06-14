<?php include('connect.php'); ?>
<?php include('header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM orders WHERE id = $order_id");
    $order = $result->fetch_assoc();
}
?>

<link rel="stylesheet" href="admin/admin.css">

<h2>Edit Order #<?php echo $order['id']; ?></h2>
<form action="edit_order.php?id=<?php echo $order['id']; ?>" method="POST">
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="Pending" <?php if ($order['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
        <option value="Processing" <?php if ($order['status'] == 'Processing') echo 'selected'; ?>>Processing</option>
        <option value="Completed" <?php if ($order['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
        <option value="Cancelled" <?php if ($order['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
    </select>

    <button type="submit" name="update_order">Update Order</button>
</form>

<?php
if (isset($_POST['update_order'])) {
    $status = $_POST['status'];
    $sql = "UPDATE orders SET status = '$status' WHERE id = $order_id";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Order updated successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>

<?php include('footer.php'); ?>
