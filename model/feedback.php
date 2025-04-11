<?php
function loadAllFeedback() {
    $sql = "SELECT * FROM feedbacks ORDER BY created_at DESC"; // Truy vấn bảng feedbacks
    return pdo_query($sql); // Sử dụng hàm pdo_query để thực hiện truy vấn
}
?>
