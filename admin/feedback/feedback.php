<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phản hồi</title>
    <style>
        /* Tổng thể */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* Tiêu đề */
        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        /* Bố cục bảng */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        /* Đầu bảng */
        table thead {
            background-color: #007bff;
            color: white;
        }

        table thead th {
            padding: 12px 15px;
            text-align: left;
            font-size: 16px;
            text-transform: uppercase;
            border-bottom: 2px solid #ddd;
        }

        /* Dòng dữ liệu */
        table tbody tr {
            border-bottom: 1px solid #ddd;
            transition: background-color 0.2s ease;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Ô dữ liệu */
        table tbody td {
            padding: 12px 15px;
            color: #555;
        }

        /* Các nút chỉnh sửa */
        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            gap: 10px;
        }

        .action-buttons a {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        /* Nút Xóa */
        .action-buttons a.delete {
            background-color: #dc3545;
        }

        .action-buttons a.delete:hover {
            background-color: #c82333;
        }
        body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1>Danh sách phản hồi</h1>

    <?php
    // Kết nối cơ sở dữ liệu
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=duan14;charset=utf8", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Lấy danh sách phản hồi
        $sql = "SELECT * FROM feedbacks ORDER BY created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $listFeedback = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Xử lý xóa phản hồi
        if (isset($_GET['delete']) && !empty($_GET['delete'])) {
            $id = $_GET['delete'];
            $deleteSql = "DELETE FROM feedbacks WHERE id = ?";
            $deleteStmt = $pdo->prepare($deleteSql);
            $deleteStmt->execute([$id]);

            // Refresh lại trang sau khi xóa
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    } catch (PDOException $e) {
        echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Nội dung</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($listFeedback)): ?>
                <?php foreach ($listFeedback as $feedback): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($feedback['id']); ?></td>
                        <td><?php echo htmlspecialchars($feedback['name']); ?></td>
                        <td><?php echo htmlspecialchars($feedback['email']); ?></td>
                        <td><?php echo htmlspecialchars($feedback['feedback']); ?></td>
                        <td><?php echo htmlspecialchars($feedback['created_at']); ?></td>
                        <td class="action-buttons">
                            <a href="?delete=<?php echo $feedback['id']; ?>" class="delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center; color: #777;">Không có phản hồi nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
