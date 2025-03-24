<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Loại Hàng Hóa</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.container {
    width: 100%;
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    box-sizing: border-box;
}
body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
            padding: 20px;
        }
h1 {
    text-align: center;
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 20px;
}

input[type="text"], select {
    flex: 1;
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    min-width: 200px;
}

input[type="submit"] {
    padding: 12px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
}

table th, table td {
    text-align: left;
    padding: 16px;
    border: 1px solid #ddd;
    word-wrap: break-word;
}

table th {
    background-color: #f1f1f1;
    color: #333;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table img {
    width: 100px;
    height: auto;
    border-radius: 5px;
    display: block;
    margin: auto;
}

.actions {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.actions input[type="button"] {
    padding: 12px 16px;
    font-size: 16px;
    color: #fff;
    background-color: #28a745;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.actions input[type="button"]:hover {
    background-color: #218838;
}

.actions a input {
    background-color: #007bff;
}

.actions a input:hover {
    background-color: #0056b3;
}

@media screen and (max-width: 768px) {
    table img {
        width: 80px;
    }

    input[type="text"], select, input[type="submit"] {
        flex: 100%;
        margin-bottom: 10px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
        <form action="index.php?act=listsp" method="post">
            <input type="text" name="keyword" placeholder="Nhập tên/id danh mục">
            <select name="iddm">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listdanhmuc as $dm) {
                    extract($dm);
                    echo "<option value='$id'>$name</option>";
                }
                ?>
            </select>
            <input type="submit" name="listok" value="Lọc">
        </form>
        <div class="form_content">
            <form action="#" method="POST">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>HÌNH ẢNH</th>
                        <th>GIÁ</th>
                        <th>MÔ TẢ</th>
                        <th>LƯỢT XEM</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        $hinh_anh_path = "../uploads/" . $img;
                        if (is_file($hinh_anh_path)) {
                            $hinh = "<img src='$hinh_anh_path' height='80' width='80'>";
                        } else {
                            $hinh = "Không có hình";
                        }
                        echo "<tr>
                            <td><input type='checkbox'></td>
                            <td>$id</td>
                            <td>$name</td>
                            <td>$hinh</td>
                            <td>$price VNĐ</td>
                            <td>$mota</td>
                            <td>$luotxem</td>
                            <td>
                                <a href='$suasp'><input type='button' value='Sửa'></a>
                                <a href='$xoasp'><input type='button' value='Xóa'></a>
                            </td>
                        </tr>";
                    }
                    ?>
                </table>
                <div class="actions">
                    <input type="button" value="CHỌN TẤT CẢ">
                    <input type="button" value="BỎ CHỌN TẤT CẢ">
                    <a href="index.php?act=addsp"><input type="button" value="NHẬP THÊM"></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
