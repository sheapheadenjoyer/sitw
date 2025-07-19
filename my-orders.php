<?php
require_once __DIR__ . '/includes/config.php';

// بررسی ورود کاربر
if (!isset($_SESSION['user_id'])) {
    redirect('/auth/login.php?error=login_required');
}

$user_id = $_SESSION['user_id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$user_id]);
    $orders = $stmt->fetchAll();
} catch (PDOException $e) {
    die("خطا در دریافت سفارش‌ها: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>سفارش‌های من</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: "Vazir", sans-serif;
      padding: 20px;
      background: #f5f5f5;
    }
    h1 {
      color: #333;
      text-align: center;
      margin-bottom: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    th, td {
      padding: 12px 16px;
      border-bottom: 1px solid #eee;
      text-align: center;
    }
    th {
      background: #eee;
    }
    .status-paid { color: green; }
    .status-pending { color: orange; }
    .status-failed { color: red; }
  </style>
</head>
<body>
  <h1>سفارش‌های من</h1>
  <?php if (count($orders) === 0): ?>
    <p style="text-align:center;">شما هنوز سفارشی ثبت نکرده‌اید.</p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>کد سفارش</th>
          <th>نوع سرویس</th>
          <th>مبلغ (تومان)</th>
          <th>کد رهگیری</th>
          <th>وضعیت</th>
          <th>تاریخ</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $order): ?>
          <tr>
            <td>#<?= $order['id'] ?></td>
            <td><?= htmlspecialchars($order['service_type']) ?></td>
            <td><?= number_format($order['price']) ?></td>
            <td><?= htmlspecialchars($order['tracking_code']) ?></td>
            <td class="status-<?= $order['status'] ?>"><?= $order['status'] ?></td>
            <td><?= $order['created_at'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>
</html>