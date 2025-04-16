<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới loại hàng hóa</title>
    <style>
        /* Toàn bộ CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="text"], input[type="submit"], input[type="reset"], input[type="button"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="text"]:disabled {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        input[type="submit"], input[type="reset"], input[type="button"] {
            width: auto;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="reset"] {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }

        input[type="reset"]:hover {
            background-color: #5a6268;
        }

        input[type="button"] {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        input[type="button"]:hover {
            background-color: #218838;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
        <form action="index.php?act=adddm" method="POST">
            <div class="form-group">
                <label for="maloai">Mã loại</label>
                <input type="text" id="maloai" name="maloai" placeholder="Nhập vào mã loại" disabled>
            </div>
            <div class="form-group">
                <label for="tenloai">Tên loại</label>
                <input type="text" id="tenloai" name="tenloai" placeholder="Nhập vào tên">
            </div>
            <div class="form-group d-flex">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listdm.php">
                    <input type="button" value="DANH SÁCH">
                </a>
            </div>
            <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo '<div class="message">' . $thongbao . '</div>';
                }
            ?>
        </form>
    </div>
</body>
</html>
