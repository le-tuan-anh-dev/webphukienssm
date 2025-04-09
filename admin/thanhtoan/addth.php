<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đơn hàng</title>
    <style>
        /* Đảm bảo rằng toàn bộ trang sẽ không tràn lề */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Đặt các kiểu chung cho trang */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            padding-top: 80px;  /* Giả sử header có chiều cao 80px */
            overflow-x: hidden; /* Ngăn tràn ngang */
        }

       

        /* Form container */
        .form-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px; /* Đảm bảo form không quá rộng */
            padding: 30px;
            margin-top: 120px;  /* Khoảng cách từ header xuống dưới */
            overflow: hidden; /* Ngăn phần tử bị tràn ra ngoài */
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-container label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .form-container input {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            width: 100%; /* Đảm bảo không tràn */
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-container input:focus {
            border-color: #007BFF;
            outline: none;
        }

        .form-container button {
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        /* Điều chỉnh cho thiết bị di động */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
                max-width: 100%;
            }

            .form-container h2 {
                font-size: 20px;
            }

            .form-container input {
                padding: 10px;
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
    <!-- Form để thêm đơn hàng -->
    <div class="form-container">
        <h2>Thêm đơn hàng</h2>
        <form action="index.php?act=addthanhtoan" method="post">
            <div>
                <label for="user_id">ID Người dùng:</label>
                <input type="number" name="user_id" id="user_id" required>
            </div>
            <div>
                <label for="product_id">ID Sản phẩm:</label>
                <input type="number" name="product_id" id="product_id" required>
            </div>
            <div>
                <label for="quantity">Số lượng:</label>
                <input type="number" name="quantity" id="quantity" required>
            </div>
            <div>
                <label for="total_price">Tổng giá:</label>
                <input type="number" step="0.01" name="total_price" id="total_price" required>
            </div>
            <div>
                <label for="purchase_date">Ngày mua:</label>
                <input type="datetime-local" name="purchase_date" id="purchase_date" required>
            </div>
            <div>
                <button type="submit" name="save_order">Lưu đơn hàng</button>
            </div>
        </form>
    </div>
</body>
</html>
