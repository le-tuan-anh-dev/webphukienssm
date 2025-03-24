<style>
    .row2 {
    margin: 0; /* Loại bỏ khoảng cách */
    padding: 20px;
    width: 100%; /* Tràn toàn bộ chiều ngang màn hình */
    background-color: #f8f9fa;
    border-radius: 0; /* Không bo góc */
    box-shadow: none; /* Loại bỏ hiệu ứng bóng nếu không cần */
}

.font_title h1 {
    text-align: center;
    color: #343a40;
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 20px;
}

.formds_loai table {
    width: 100%; /* Bảng tràn toàn màn */
    border-collapse: collapse;
    margin: 20px 0;
}

.formds_loai th, .formds_loai td {
    text-align: center;
    padding: 12px;
    border: 1px solid #ddd;
}

.formds_loai th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    font-size: 16px;
}

.formds_loai tr:nth-child(even) {
    background-color: #f2f2f2;
}

.formds_loai tr:hover {
    background-color: #e9ecef;
}

.formds_loai td {
    font-size: 14px;
    color: #495057;
    word-break: break-word; /* Đảm bảo không bị tràn chữ */
}

.row.mb10 {
    text-align: center;
    margin-top: 20px;
}

.row.mb10 input[type="button"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.row.mb10 input[type="button"]:hover {
    background-color: #0056b3;
}

.row.mb10 a {
    text-decoration: none;
}

/* Toàn màn hình */
body {
    margin: 0;
    padding: 0;
}
body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
            padding: 20px;
        }
</style>
<div class="row2">
    <div class="row2 font_title">
        <h1>THỐNG KÊ SẢN PHẨM TRONG DANH MỤC</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>

                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ NHỎ NHẤT</th>
                        <th>GIÁ LỚN NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>

                    </tr>

                    <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                    ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $soluong ?></td>
                            <td><?php echo $gia_min ?> VND</td>
                            <td><?php echo $gia_max ?> VND</td>
                            <td><?php echo number_format($gia_avg, 2) ?> VND</td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?act=bieudo"> <input class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
            </div>
        </form>
    </div>
</div>