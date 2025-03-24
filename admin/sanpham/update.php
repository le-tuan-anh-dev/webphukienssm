<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinh_anh_path = "../uploads/" . $img;
if (is_file($hinh_anh_path)) {
    $hinh = "<img src='$hinh_anh_path' height='80' width='80'>";
} else {
    $hinh = " không có hình";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <style>
        /* Reset CSS */
        body, h1, form, input, select, textarea, button {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
        }

        /* Background */
        body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
            padding: 20px;
        }

        .row2 {
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .row2.font_title h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Form Styling */
        .form_content_container {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="file"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"], input[type="reset"], input[type="button"] {
            padding: 12px 25px;
            background: #f6d365;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-right: 10px;
        }

        input[type="submit"]:hover {
            background: #fda085;
        }

        input[type="reset"]:hover, input[type="button"]:hover {
            background: #ffc371;
        }

        /* Image Styling */
        .row2 img {
            display: block;
            margin-top: 10px;
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Notification Message */
        form div:last-child {
            text-align: center;
            margin-top: 20px;
        }

        form div:last-child p {
            color: #ff6b6b;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .row2 {
                padding: 15px;
            }

            input[type="submit"], input[type="reset"], input[type="button"] {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="row2">
        <div class="row2 font_title">
            <h1>CẬP NHẬT SẢN PHẨM</h1>
        </div>
        <div class="row2 form_content">
            <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
                <div class="row2 mb10 form_content_container">
                    <select name="iddm">
                        <option value="0">Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $dm) {
                            if($iddm==$dm['id']) $s="selected"; else $s="";
                            echo '<option value="'.$dm['id'].'"'.$s.'>'.$dm['name'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="row2 mb10">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="tensp" value="<?php echo $sanpham['name']?>">
                </div>

                <div class="row2 mb10">
                    <label>Giá</label>
                    <input type="text" name="giasp" value="<?php echo $sanpham['price'] ?>">
                </div>

                <div class="row2 mb10">
                    <label>Hình ảnh</label>
                    <input type="file" name="hinh">
                    <?php echo $hinh ?>
                </div>

                <div class="row2 mb10">
                    <label>Mô tả</label>
                    <input type="text" name="mota" value="<?php echo $sanpham['mota'] ?>">
                </div>

                <div class="row mb10">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="submit" name="capnhat_sp" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=san_pham"><input type="button" value="Danh sách"></a>
                </div>
                <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo $thongbao;
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
