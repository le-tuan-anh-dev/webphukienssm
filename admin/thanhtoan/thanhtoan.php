<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách thanh toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* Header */
        h1 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-top: 20px;
        }

        /* Table container */
        .table-container {
            width: 90%;
            margin: 20px auto;
            overflow-x: auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        td {
            font-size: 14px;
            color: #555;
        }

        /* Highlight rows on hover */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Special styling for the status column */
        td:nth-child(7) {
            font-weight: bold;
            text-transform: capitalize;
            border-left: 4px solid transparent;
            border-radius: 4px;
        }

        /* Status colors */
        .pending {
            color: #ffc107;
        }

        .shipping {
            color: #007bff;
        }

        .completed {
            color: #28a745;
        }

        .cancelled {
            color: #dc3545;
        }

        .unknown {
            color: #6c757d;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            th, td {
                font-size: 12px;
                padding: 10px;
            }

            table {
                font-size: 14px;
            }
        }
        body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h1>Danh sách thanh toán</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID NGƯỜI DÙNG</th>
                    <th>ID SẢN PHẨM</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ (VND)</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>TRẠNG THÁI</th> <!-- Thêm cột trạng thái -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listmuahang as $mh): ?>
                    <?php 
                        // Xác định class trạng thái
                        $statusClass = '';
                        switch ($mh['status'] ?? 'N/A') {
                            case 'Chờ xử lý':
                                $statusClass = 'pending';
                                break;
                            case 'Đang giao hàng':
                                $statusClass = 'shipping';
                                break;
                            case 'Hoàn thành':
                                $statusClass = 'completed';
                                break;
                            case 'Hủy bỏ':
                                $statusClass = 'cancelled';
                                break;
                            default:
                                $statusClass = 'unknown';
                        }
                    ?>
                    <tr>
                        <td><?= $mh['id'] ?></td>
                        <td><?= $mh['user_id'] ?></td>
                        <td><?= $mh['product_id'] ?></td>
                        <td><?= $mh['quantity'] ?></td>
                        <td><?= number_format($mh['total_price'], 0, ',', '.') ?></td>
                        <td><?= $mh['purchase_date'] ?></td>
                        <td class="<?= $statusClass ?>"><?= $mh['status'] ?? 'N/A' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
