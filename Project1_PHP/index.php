<?php
// --- PHẦN BACKEND (PHP) ---
// Lấy cấu hình từ biến môi trường (Chuẩn bị sẵn cho Docker/Cloud sau này)
$servername = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$dbname = getenv('DB_NAME') ?: 'demo_db';

$status_icon = "⚪";
$status_msg = "Chưa kết nối Database";

// Giả lập logic kết nối Database
try {
    // Code kết nối thật (sẽ hoạt động khi có Docker/Hosting)
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }
    $status_icon = "✅";
    $status_msg = "Kết nối MySQL thành công!";
} catch (Exception $e) {
    // Nếu lỗi (do chưa cài DB) thì hiện thông báo nhẹ nhàng
    $status_icon = "⚠️";
    $status_msg = "Database chưa sẵn sàng (Đang chạy chế độ Demo)";
}

// Dữ liệu mẫu (Giả lập dữ liệu lấy từ DB)
$products = [
    ["id" => 1, "name" => "Laptop Gaming", "price" => "20.000.000 VND"],
    ["id" => 2, "name" => "Chuột không dây", "price" => "500.000 VND"],
    ["id" => 3, "name" => "Bàn phím cơ", "price" => "1.200.000 VND"]
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Project 1 - PHP Fullstack</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding: 50px; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
        h1 { color: #4F5D75; }
        .status { padding: 10px; border: 1px solid #ddd; background: #eee; margin-bottom: 20px; border-radius: 5px; }
        ul { list-style: none; padding: 0; }
        li { background: #fff; border-bottom: 1px solid #ddd; padding: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📦 PROJECT 1: PHP + MYSQL</h1>
        <div class="status">
            Trạng thái DB: <b><?php echo $status_icon . " " . $status_msg; ?></b>
        </div>

        <h3>Danh sách sản phẩm:</h3>
        <ul>
            <?php foreach ($products as $p): ?>
                <li><b><?php echo $p['name']; ?></b> - <span><?php echo $p['price']; ?></span></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>