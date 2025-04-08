<?php
function loadall_muahang() {
    $sql = "SELECT * FROM mua_hang ORDER BY id DESC"; // Đúng tên bảng: mua_hang
    $conn = pdo_get_connection(); // Gọi hàm kết nối PDO
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insert_muahang($user_id, $product_id, $quantity, $total_price, $purchase_date) {
    $sql = "INSERT INTO mua_hang (user_id, product_id, quantity, total_price, purchase_date) 
            VALUES (:user_id, :product_id, :quantity, :total_price, :purchase_date)";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindParam(':total_price', $total_price);
    $stmt->bindParam(':purchase_date', $purchase_date);
    $stmt->execute();
}

function loadall_muahang_with_status() {
    $sql = "SELECT mh.*, ts.status 
            FROM mua_hang mh 
            LEFT JOIN trang_thai_don_hang ts ON mh.id = ts.order_id 
            ORDER BY mh.id DESC"; // Lấy thông tin trạng thái đi kèm
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

