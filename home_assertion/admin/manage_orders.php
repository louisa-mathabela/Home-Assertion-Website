<?php include('connect.php'); ?>
<?php include('header.php'); ?>

<link rel="stylesheet" href="admin/admin.css">

<h2>Manage Orders</h2>
<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->query("SELECT * FROM orders");
        while ($order = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$order['id']}</td>
                <td>{$order['customer_id']}</td>
                <td>R {$order['total']}</td>
                <td>{$order['status']}</td>
                <td>
                    <a href='edit_order.php?id={$order['id']}'>Edit</a>
                    <a href='delete_order.php?id={$order['id']}'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>

<?php include('footer.php'); ?>
