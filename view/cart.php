<style>
    /* Reset CSS */

/* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    line-height: 1.6;
}

/* Header */
header {
    background-color: #4CAF50;
    color: #fff;
    text-align: center;
    padding: 20px 0;
    font-size: 24px;
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    letter-spacing: 1px;
}

/* Container */
.cart-container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Table */
.cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.cart-table th {
    background-color: #4CAF50;
    color: #fff;
    text-transform: uppercase;
    padding: 15px;
    font-size: 16px;
}

.cart-table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.cart-table td img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
}

.cart-table .product-name {
    display: flex;
    align-items: center;
    gap: 15px;
    text-align: left;
}

.cart-table input[type="number"] {
    width: 60px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-align: center;
    outline: none;
}

.cart-table input[type="number"]:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 4px rgba(76, 175, 80, 0.4);
}

.cart-table a {
    color: #e74c3c;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
}

.cart-table a:hover {
    color: #c0392b;
    text-decoration: underline;
}

/* Total Section */
.total-section {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top: 10px;
    font-size: 18px;
    color: #555;
}

.total-section strong {
    font-size: 20px;
    color: #4CAF50;
    margin-left: 10px;
}

/* Buttons */
.button-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

.button-group a,
.button-group button {
    text-decoration: none;
    padding: 12px 25px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    border: none;
    transition: all 0.3s;
    cursor: pointer;
}

.checkout-btn {
    background-color: #4CAF50;
    color: white;
}

.checkout-btn:hover {
    background-color: #45a049;
}

.back-btn {
    background-color: #6c757d;
    color: white;
}

.back-btn:hover {
    background-color: #5a6268;
}

/* Empty Cart */
.empty-cart {
    text-align: center;
    font-size: 20px;
    color: #888;
    padding: 30px 0;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .cart-container {
        padding: 15px;
    }

    .cart-table th,
    .cart-table td {
        font-size: 14px;
        padding: 10px;
    }

    .button-group {
        flex-direction: column;
        gap: 10px;
    }
}

/* Chỉ thay đổi nút "Thanh TOÁN" */
a[href="xacNhanThanhToan.php"] {
    background-color: #e74c3c; /* Màu nền đỏ */
    color: #fff; /* Màu chữ trắng */
    padding: 12px 25px; /* Kích thước nút */
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none; /* Xóa gạch chân */
    transition: all 0.3s ease-in-out;
    display: inline-block;
    text-align: center;
}

a[href="xacNhanThanhToan.php"]:hover {
    background-color: #c0392b; /* Màu khi hover */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng */
    transform: scale(1.05); /* Hiệu ứng phóng to nhẹ */
}

/* Chỉ thay đổi nút "Thanh TOÁN" */
a[href="xacNhanThanhToan.php"] {
    background-color: #e74c3c; /* Màu nền đỏ */
    color: #fff; /* Màu chữ trắng */
    padding: 12px 25px; /* Kích thước nút */
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none; /* Xóa gạch chân */
    transition: all 0.3s ease-in-out;
    display: inline-block;
    text-align: center;
}

a[href="xacNhanThanhToan.php"]:hover {
    background-color: #c0392b; /* Màu khi hover */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng */
    transform: scale(1.05); /* Hiệu ứng phóng to nhẹ */
}

</style>
<?php
session_start();

// Kiểm tra POST dữ liệu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? null;
    $product_name = $_POST['product_name'] ?? '';
    $product_price = $_POST['product_price'] ?? 0;
    $product_image = $_POST['product_img'] ?? '';

    if ($product_id) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product_name,
                'price' => $product_price,
                'image' => $product_image,
                'quantity' => 1,
            ];
        }
    }
}

$cart = $_SESSION['cart'] ?? [];
$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>Giỏ Hàng</header>
    <div class="cart-container">
        <?php if (!empty($cart)): ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $id => $item): ?>
                        <?php $item_total = $item['price'] * $item['quantity']; ?>
                        <tr>
                            <td><img src="<?= $item['image'] ?>" alt="Product Image" width="50"></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= number_format($item['price'], 0, ',', '.') ?> VNĐ</td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= number_format($item_total, 0, ',', '.') ?> VNĐ</td>
                            <td>
                            <a href="remove.php?product_id=<?= $id ?>" onclick="return confirmDelete()">Xóa</a>

                            </td>
                        </tr>
                        <?php $total_price += $item_total; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="total-section">
                <strong>Tổng cộng: <?= number_format($total_price, 0, ',', '.') ?> VNĐ</strong>
            </div>
            <div class="button-group">

                <a href="../index.php" class="back-btn">Tiếp tục mua hàng</a>
                <a href="xacNhanThanhToan.php" class="back-btn">Thanh TOÁN</a>
            </div>
        <?php else: ?>
            <div class="empty-cart">Giỏ hàng của bạn đang trống.</div>
        <?php endif; ?>
    </div>
    <script>
    function confirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');
    }
</script>

</body>
</html>
