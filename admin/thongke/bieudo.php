<?php
$listthongke = [
    ['tenDanhMuc' => 'Phụ kiện', 'soLuong' => 80],
    ['tenDanhMuc' => 'Điện thoại', 'soLuong' => 10],
    ['tenDanhMuc' => 'Laptop', 'soLuong' => 5],
    ['tenDanhMuc' => 'Máy tính bảng', 'soLuong' => 5],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biểu đồ - Phụ kiện chiếm 80%</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
  
    body, html {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      font-family: 'Roboto', sans-serif;
    }

    
    .row2 {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 100%;
      height: 100vh; /* Chiều cao toàn màn hình */
      background-color: #f4f4f9; /* Màu nền */
    }


    .font_title {
      text-align: center;
      width: 100%;
      background-color: #007BFF; 
      color: white;
      padding: 20px;
      font-size: 2rem;
      font-weight: 600;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Đổ bóng */
      margin-bottom: 20px;
    }


    .form_content {
      width: 90%;
      max-width: 1000px; /* Giới hạn chiều rộng tối đa */
      padding: 20px;
      background-color: white;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Hiệu ứng nổi */
      border-radius: 8px; /* Bo góc */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Biểu đồ */
    #myChart {
      width: 100%; /* Chiều rộng biểu đồ */
      height: 500px; /* Chiều cao cố định */
    }
  </style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
  <div class="row2">
    <!-- Tiêu đề -->
    <div class="row2 font_title">
      <h1>BIỂU ĐỒ</h1>
    </div>

    <!-- Nội dung biểu đồ -->
    <div class="row2 form_content">
      <div id="myChart"></div>
    </div>
  </div>

  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Dữ liệu truyền từ PHP vào JavaScript
      const data = google.visualization.arrayToDataTable([
        ['Danh mục', 'Số lượng'],
        <?php
        foreach ($listthongke as $thongke) {
          echo "['{$thongke['tenDanhMuc']}', {$thongke['soLuong']}],";
        }
        ?>
      ]);

      // Tùy chọn biểu đồ
      const options = {
        title: 'BIỂU ĐỒ SỐ LƯỢNG SẢN PHẨM TRONG DANH MỤC',
        is3D: true
      };

      // Vẽ biểu đồ
      const chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, options);
    }
  </script>
</body>
</html>
