<?php
session_start();


$conn = new mysqli("localhost", "root", "", "shopdb");
if ($conn->connect_error) die("DB Error: " . $conn->connect_error);


if (isset($_POST['product_id'])) {
    $pid = (int)$_POST['product_id'];
    $qty = (int)$_POST['quantity'];

    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    if (isset($_SESSION['cart'][$pid])) {
        $_SESSION['cart'][$pid] += $qty; 
    } else {
        $_SESSION['cart'][$pid] = $qty; 
    }
    header("Location: products.php");
    exit;
}


$result = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Products</title>
<style>
.product { border:1px solid #ccc; padding:10px; margin:10px; display:inline-block; width:200px; text-align:center; }
</style>
</head>
<body>
<h1>Products</h1>
<a href="cart.php">View Cart (<?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?>)</a>
<div>
<?php while($row = $result->fetch_assoc()): ?>
    <div class="product">
        <img src="<?php echo $row['image'] ? 'uploads/'.$row['image'] : 'https://via.placeholder.com/150'; ?>" width="150"><br>
        <strong><?php echo htmlspecialchars($row['name']); ?></strong><br>
        ₹<?php echo number_format($row['price'], 2); ?><br>
        <form method="post">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <input type="number" name="quantity" value="1" min="1" style="width:50px;">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
<?php endwhile; ?>
</div>
</body>
</html>
