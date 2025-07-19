
<?php
$service = $_POST['service'] ?? $_GET['service'] ?? 'boost';
$details = $_POST['details'] ?? $_GET['details'] ?? 'بدون توضیح';
$amount = $_POST['amount'] ?? $_GET['amount'] ?? 1200000;
$amount = preg_replace('/[^\d]/', '', $amount);
$amount = intval($amount);
$orderId = 'D2R-' . rand(1000, 9999) . '-' . rand(1000, 9999);
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>پرداخت | Dota 2 Rush</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root { --primary-color: #FFD700; --bg-color: #1A2A3A; --text-color: #fff; }
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Tajawal', sans-serif; }
    body { background: linear-gradient(135deg, #0D1B2A, #1A2A3A); color: var(--text-color); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
    .payment-container { background: rgba(26, 42, 58, 0.95); border-radius: 15px; max-width: 600px; width: 100%; padding: 30px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5); text-align: center; }
    .payment-logo { width: 80px; height: 80px; margin: 0 auto 15px; }
    .payment-logo img { width: 100%; height: 100%; object-fit: contain; border-radius: 10px; }
    .title { color: var(--primary-color); font-size: 22px; margin-bottom: 20px; }
    .summary { background: rgba(13, 27, 42, 0.8); padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: right; }
    .summary div { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed #444; font-size: 14px; }
    .form-group { text-align: right; margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; color: #ccc; font-size: 14px; }
    input { width: 100%; padding: 10px 15px; border-radius: 8px; border: 1px solid #333; background: rgba(13, 27, 42, 0.7); color: var(--text-color); }
    .btn { display: block; width: 100%; margin-top: 20px; padding: 12px; background-color: var(--primary-color); color: #000; border: none; border-radius: 30px; font-weight: bold; font-size: 16px; cursor: pointer; transition: 0.3s; }
    .btn:hover { background-color: #e6c200; }
    .error { color: #FF5252; font-size: 13px; margin-top: 5px; display: none; }
  </style>
</head>
<body>
  <div class="payment-container">
    <div class="payment-logo">
      <img src="https://uploadkon.ir/uploads/eb6710_25photo19655862447.jpg" alt="Logo">
    </div>
    <div class="title">تکمیل اطلاعات و پرداخت</div>
    <div class="summary">
      <div><span>شماره سفارش:</span><span><?= $orderId ?></span></div>
      <div><span>نوع سرویس:</span><span><?= htmlspecialchars($service) ?></span></div>
      <div><span>جزئیات:</span><span><?= htmlspecialchars($details) ?></span></div>
      <div><span>مبلغ قابل پرداخت:</span><span><?= number_format($amount) ?> تومان</span></div>
    </div>
    <form id="paymentForm" action="/verify-payment.php" method="GET" onsubmit="return validateForm()">
      <input type="hidden" name="order_id" value="<?= $orderId ?>">
      <input type="hidden" name="service" value="<?= htmlspecialchars($service) ?>">
      <input type="hidden" name="details" value="<?= htmlspecialchars($details) ?>">
      <input type="hidden" name="amount" value="<?= $amount ?>">
      <input type="hidden" name="status" value="ok">
      <div class="form-group">
        <label for="phone">شماره تماس</label>
        <input type="text" id="phone" name="phone" placeholder="مثلاً: 09901234567">
        <div class="error" id="phoneError">شماره تماس معتبر نیست</div>
      </div>
      <div class="form-group">
        <label for="telegram">آیدی تلگرام</label>
        <input type="text" id="telegram" name="telegram" placeholder="@example">
        <div class="error" id="telegramError">آیدی تلگرام باید با @ شروع شود</div>
      </div>
      <button type="submit" class="btn">ورود به درگاه پرداخت</button>
    </form>
  </div>
  <script>
    function validateForm() {
      let valid = true;
      const phone = document.getElementById('phone').value.trim();
      const telegram = document.getElementById('telegram').value.trim();
      document.getElementById('phoneError').style.display = 'none';
      document.getElementById('telegramError').style.display = 'none';
      if (!/^09\d{9}$/.test(phone)) {
        document.getElementById('phoneError').style.display = 'block';
        valid = false;
      }
      if (!/^@[\w\d_]{3,}$/.test(telegram)) {
        document.getElementById('telegramError').style.display = 'block';
        valid = false;
      }
      return valid;
    }
  </script>
</body>
</html>
