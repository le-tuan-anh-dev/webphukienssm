<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án mẫu</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        /* Toàn bộ CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            height: 100vh; /* Đảm bảo body chiếm toàn bộ chiều cao màn hình */
            display: flex;
            flex-direction: column;
        }

        .container {
            width: 100%;
            height: 100%; /* Chiếm hết chiều cao */
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #1d3557;
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 3em;
            font-weight: 700;
            margin: 0;
        }

        .menu {
            background-color: #457b9d;
        }

        .menu ul {
            display: flex;
            justify-content: center;
            list-style: none;
            margin: 0;
            padding: 10px 0;
            background-color: #2a3d52;
            flex-wrap: wrap;  /* Allow wrapping of items on smaller screens */
        }

        .menu ul li {
            margin: 0 20px;
        }

        .menu ul li a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            font-size: 1.1em;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .menu ul li a:hover {
            background-color: #e63946;
            color: white;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5em;
            }

            .menu ul {
                flex-direction: column;
                text-align: center;
                padding: 15px;
            }

            .menu ul li {
                margin: 10px 0;
            }

            .menu ul li a {
                padding: 12px 20px;
            }
        }

        /* Footer */
        footer {
            background-color: #1d3557;
            color: white;
            padding: 10px 0;
            text-align: center;
            font-size: 1em;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- BEGIN HEADER -->
        <header>
            <h1>Admin Dashboard</h1>
        </header>
        <!-- END HEADER -->

        <!-- BEGIN MENU -->
        <div class="menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?act=listdm">Danh mục</a></li>
                <li><a href="index.php?act=listsp">Hàng hóa</a></li>
                <li><a href="index.php?act=dskh">Khách hàng</a></li>
                <li><a href="index.php?act=dsbl">Bình luận</a></li>
                <li><a href="index.php?act=thongke">Thống kê</a></li>
                <li><a href="index.php?act=listthanhtoan">Danh sách thanh toán</a></li>
                <li><a href="index.php?act=addthanhtoan">Thêm đơn hàng</a></li>
                <li><a href="index.php?act=listfeedback">Feedback</a></li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>

    <!-- BEGIN FOOTER -->
    <footer>
        &copy; 2025 Admin Dashboard. All Rights Reserved.
    </footer>
    <!-- END FOOTER -->
</body>
</html>
