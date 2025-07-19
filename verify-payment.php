
<?php
$orderId = $_GET['order_id'] ?? 'نامشخص';
$service = $_GET['service'] ?? 'نامشخص';
$details = $_GET['details'] ?? 'بدون توضیح';
$amount = $_GET['amount'] ?? 0;
$phone = $_GET['phone'] ?? 'ناشناخته';
$telegram = $_GET['telegram'] ?? 'ندارد';
$status = $_GET['status'] ?? 'fail';

$message = "سفارش جدید:\n";
$message .= "شماره سفارش: $orderId\n";
$message .= "سرویس: $service\n";
$message .= "جزئیات: $details\n";
$message .= "مبلغ: $amount تومان\n";
$message .= "شماره تماس: $phone\n";
$message .= "تلگرام: $telegram\n";
$message .= "وضعیت پرداخت: $status\n";
$message .= "------------------------\n";

file_put_contents("orders.log", $message, FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>پرداخت موفق | Dota 2 Rush</title>
  <style>
    body { background: #0D1B2A; color: #fff; font-family: 'Tajawal', sans-serif; text-align: center; padding: 50px; }
    .box { background: #1A2A3A; padding: 30px; border-radius: 15px; display: inline-block; text-align: right; max-width: 500px; }
    .box h2 { color: #4CAF50; }
    .row { margin-bottom: 10px; font-size: 14px; }
    .row span { color: #FFD700; }
  </style>
</head>
<body>
  <div class="box">
    <h2>پرداخت شما با موفقیت ثبت شد ✅</h2>
    <div class="row">شماره سفارش: <span><?= htmlspecialchars($orderId) ?></span></div>
    <div class="row">سرویس: <span><?= htmlspecialchars($service) ?></span></div>
    <div class="row">جزئیات: <span><?= htmlspecialchars($details) ?></span></div>
    <div class="row">مبلغ: <span><?= number_format($amount) ?> تومان</span></div>
    <div class="row">شماره تماس: <span><?= htmlspecialchars($phone) ?></span></div>
    <div class="row">تلگرام: <span><?= htmlspecialchars($telegram) ?></span></div>
    <p style="margin-top: 20px;">تا حداکثر 1 ساعت آینده با شما تماس گرفته خواهد شد.</p>
    <a href="index.php" style="color:#FFD700;">بازگشت به صفحه اصلی</a>
  </div>
</body>
</html>
