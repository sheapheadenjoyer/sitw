<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dota2rush";

// اتصال
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("❌ اتصال برقرار نشد: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>مدیریت سفارش‌ها</title>
    <style>
        body { font-family: sans-serif; background: #f7f7f7; padding: 20px; }
        table { width: 100%%; border-collapse: collapse; background: #fff; box-shadow: 0 0 10px #ccc; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: right; }
        th { background: #333; color: white; }
        tr:nth-child(even) { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>📋 لیست سفارش‌ها</h2>
    <table>
        <tr>
            <th>شناسه</th>
            <th>اطلاعات سفارش</th>
            <th>تاریخ ثبت</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= htmlspecialchars($row["info"]) ?></td>
            <td><?= $row["created_at"] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>
