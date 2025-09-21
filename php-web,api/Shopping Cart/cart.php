<?php
session_start();
$conn = new mysqli("localhost","root","","shopdb");
if ($conn->connect_error) die("DB Error: ".$conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        foreach($_POST['qty'] as $pid => $qty) {
            if ($qty > 0) {
                $_SESSION['cart'][$pid] = $qty;
            } else {
                unset($_SESSION['cart'][$pid]);
            }
        }
    } elseif (isset($_POST['clear'])) {
        unset($_SESSION['cart']);
    }
    header("Location: cart.php");
    exit;
}

$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cart</title>
</head>
<body>
<h1>Your Cart</h1>
<a href="products.php">Continue Shopping</a><br><br>

<?php if(empty($cartItems)): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
<form method="post">
<table border="1" cellpadding="10">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
    <?php 
    $total = 0;
    foreach($cartItems as $pid => $qty):
        $res = $conn->query("SELECT * FROM products WHERE id=$pid");
        $product = $res->fetch_assoc();
        $subtotal = $product['price'] * $qty;
        $total += $subtotal;
    ?>
    <tr>
        <td><?php echo htmlspecialchars($product['name']); ?></td>
        <td>₹<?php echo number_format($product['price'],2); ?></td>
        <td><input type="number" name="qty[<?php echo $pid; ?>]" value="<?php echo $qty; ?>" min="0" style="width:50px;"></td>
        <td>₹<?php echo number_format($subtotal,2); ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td>₹<?php echo number_format($total,2); ?></td>
    </tr>
</table><br>
<button type="submit" name="update">Update Cart</button>
<button type="submit" name="clear">Clear Cart</button>
</form>
<?php endif; ?>
</body>
</html>
