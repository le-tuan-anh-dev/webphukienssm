<?php
// Kết nối database
$servername = "localhost";
$username = "root"; // Thay bằng username MySQL của bạn
$password = ""; // Thay bằng password MySQL của bạn
$dbname = "duan14";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý dữ liệu từ form
$message = ""; // Thông báo kết quả gửi góp ý
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    $sql = "INSERT INTO feedbacks (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        $message = "Gửi góp ý thành công!";
    } else {
        $message = "Lỗi: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Góp Ý</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .feedback {
            padding: 40px 20px;
            background-color: white;
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .feedback h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        .feedback p {
            font-size: 1.2em;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .feedback form {
            display: flex;
            flex-direction: column;
        }

        .feedback label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .feedback input, .feedback textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }

        .feedback button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        .feedback button:hover {
            background-color: #45a049;
        }

        .message {
            font-size: 1.2em;
            color: green;
            margin-bottom: 20px;
        }

        .error {
            font-size: 1.2em;
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <section class="feedback">
        <h2>Góp Ý</h2>
        <p>Chúng tôi rất trân trọng những ý kiến đóng góp của bạn. Vui lòng chia sẻ suy nghĩ của bạn qua biểu mẫu dưới đây:</p>
        
        <!-- Thông báo kết quả -->
        <?php if (!empty($message)): ?>
            <div class="<?= strpos($message, 'Lỗi') === false ? 'message' : 'error'; ?>">
                <?= htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <label for="name">Họ và Tên:</label>
            <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>

            <label for="feedback">Góp Ý:</label>
            <textarea id="feedback" name="feedback" rows="5" placeholder="Nhập ý kiến của bạn" required></textarea>

            <button type="submit">Gửi Góp Ý</button>
        </form>
    </section>
</body>
</html>
