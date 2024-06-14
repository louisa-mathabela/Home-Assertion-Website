<?php include('connect.php'); ?>
<?php include('header.php'); ?>

<link rel="stylesheet" href="admin/admin.css">

<h2>Add New Product</h2>
<form action="add_product.php" method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" required>

    <label for="image">Product Image:</label>
    <input type="file" name="image" id="image" required>

    <button type="submit" name="add_product">Add Product</button>
</form>

<?php
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    $sql = "INSERT INTO product (name, price, product_image) VALUES ('$name', '$price', '$image')";
    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "<p>Product added successfully!</p>";
        } else {
            echo "<p>Failed to upload image.</p>";
        }
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>

<?php include('footer.php'); ?>
