<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật loại hàng hóa</title>
    <style>
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

        input[type="text"], input[type="submit"], input[type="reset"], a.button-link {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:disabled {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="reset"] {
            background-color: #6c757d;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="reset"]:hover {
            background-color: #5a6268;
        }

        a.button-link {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        a.button-link:hover {
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
        <h1>CẬP NHẬT CÁC LOẠI HÀNG HÓA</h1>
        <form action="index.php?act=updatedm" method="POST">
            <label for="maloai">Mã loại</label>
            <input type="text" id="maloai" name="maloai" disabled value="<?= isset($id) ? $id : '' ?>">

            <label for="tenloai">Tên loại</label>
            <input type="text" id="tenloai" name="tenloai" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>">

            <input type="hidden" name="id_dm" value="<?= isset($id) ? $id : '' ?>">

            <input type="submit" name="capnhat" value="CẬP NHẬT">
            <input type="reset" value="NHẬP LẠI">
            <a class="button-link" href="index.php?act=danh_muc">DANH SÁCH</a>

            <?php if (isset($thongbao) && $thongbao != ""): ?>
                <div class="message"><?= $thongbao ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
