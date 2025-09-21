<!--  Create a database schema for products.
  Develop an interface to display products. -->

<?php
$conn = new mysqli("localhost", "root", "", "shopdb");
if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

// Fetch products
$result = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-card {
            width: 250px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            max-width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .product-price {
            color: green;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .product-desc {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>

<body>
    <h1>Product List</h1>
    <div class="product-container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="product-card">
                <?php if ($row['image']): ?>
                    <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image">
                <?php else: ?>
                    <img src="https://via.placeholder.com/250x150?text=No+Image" alt="No Image">
                <?php endif; ?>

                <div class="product-name"><?php echo htmlspecialchars($row['name']); ?></div>
                <div class="product-price">₹<?php echo number_format($row['price'], 2); ?></div>
                <div class="product-desc"><?php echo htmlspecialchars($row['description']); ?></div>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>