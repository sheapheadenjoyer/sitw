<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}
?>
<?php include 'incincludes/config.php'; ?>
<?php



?>
<?php
$newOrders = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM orders WHERE status='new'"));
$newMessages = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM messages WHERE seen=0 AND is_admin=0"));
$newChats = mysqli_num_rows(mysqli_query($conn, "SELECT DISTINCT user_id FROM messages WHERE seen=0 AND is_admin=0"));
?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>پنل ادمین - Dota2Rush</title>
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Vazirmatn', sans-serif;
      background-color: #f5f5f5;
      direction: rtl;
    }
    .admin-panel { display: flex; height: 100vh; }
    .sidebar {
      width: 250px;
      background: #2c3e50;
      color: #ecf0f1;
      padding: 20px;
      overflow-y: auto;
    }
    .sidebar h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .sidebar .menu-group { margin-bottom: 20px; }
    .sidebar .menu-title {
      margin-bottom: 10px;
      font-size: 14px;
      color: #bdc3c7;
    }
    .sidebar .menu-item {
      padding: 10px;
      cursor: pointer;
      color: #ecf0f1;
      border-radius: 5px;
      display: flex;
      justify-content: space-between;
    }
    .sidebar .menu-item:hover,
    .sidebar .menu-item.active {
      background: #34495e;
    }
    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .header {
      background: #fff;
      padding: 15px 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
    }
    .notif {
      position: relative;
      cursor: pointer;
    }
    .notif i {
      font-size: 18px;
      color: #333;
    }
    .notif .badge {
      position: absolute;
      top: -5px;
      left: -5px;
      background: red;
      color: white;
      font-size: 10px;
      padding: 2px 6px;
      border-radius: 10px;
    }
    .main-content {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
    }
    .section-content {
      display: none;
    }
    .section-content.active {
      display: block;
    }
    .card {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      margin-bottom: 20px;
    }
    canvas { max-width: 100%; }
    .chat-box {
      border: 1px solid #ccc;
      border-radius: 8px;
      height: 400px;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }
    .chat-messages {
      flex: 1;
      padding: 10px;
      overflow-y: auto;
      background: #f0f0f0;
    }
    .chat-input-area {
      display: flex;
      border-top: 1px solid #ccc;
      padding: 10px;
      background: #fff;
    }
    .chat-input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .chat-send-btn {
      margin-right: 10px;
      background: #3498db;
      color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="admin-panel">
    <div class="sidebar">
      <h2>Dota2Rush</h2>

      <div class="menu-group">
        <div class="menu-title">مدیریت</div>
        <div class="menu-item active" data-section="dashboard">📊 داشبورد</div>
        <div class="menu-item" data-section="orders">🧾 سفارشات جدید <span><?= $newOrders ?></span></div>
        <div class="menu-item" data-section="coaching">🎯 مربیگری‌ها</div>
        <div class="menu-item" data-section="boost">⚡ بوست رنک</div>
      </div>

      <div class="menu-group">
        <div class="menu-title">ارتباط با کاربران</div>
        <div class="menu-item" data-section="messages">💬 پیام‌ها <span><?= $newMessages ?></span></div>
        <div class="menu-item" data-section="chat">📢 چت آنلاین <span><?= $newChats ?></span></div>
      </div>

      <div class="menu-group">
        <div class="menu-title">محتوا</div>
        <div class="menu-item" data-section="coaches">👨‍🏫 مربیان</div>
        <div class="menu-item" data-section="services">🛠 خدمات</div>
      </div>

      <div class="menu-group">
        <div class="menu-title">تنظیمات</div>
        <div class="menu-item" data-section="system">⚙️ تنظیمات سیستم</div>
        <div class="menu-item" data-section="admins">👤 مدیریت ادمین‌ها</div>
      </div>
    </div>

    <div class="main">
      <div class="header">
        <div class="notif">
          <i class="fas fa-bell"></i>
          <span class="badge"><?= $newMessages ?></span>
        </div>
        <div class="welcome">
          خوش آمدید، ادمین!
        </div>
      </div>

      <div class="main-content">
        <!-- داشبورد -->
        <div class="section-content active" id="dashboard-section">
          <div class="card">
            <h3>نمودار فروش هفتگی</h3>
            <canvas id="salesChart" height="100"></canvas>
          </div>
        </div>

        <!-- سفارشات -->
        <div class="section-content" id="orders-section">
          
<div class="card">
  <?php
  $query = "SELECT * FROM orders WHERE status='new' ORDER BY created_at DESC LIMIT 10";
  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div><strong>کاربر:</strong> " . htmlspecialchars($row['username']) . 
           " | <strong>سرویس:</strong> " . htmlspecialchars($row['service']) . 
           " | <strong>تاریخ:</strong> " . htmlspecialchars($row['created_at']) . "</div><hr>";
    }
  } else {
    echo "هیچ سفارش جدیدی وجود ندارد.";
  }
  ?>
</div>

        </div>

        <!-- مربیگری -->
        <div class="section-content" id="coaching-section">
          <div class="card">لیست مربیگری‌ها نمایش داده می‌شود...</div>
        </div>

        <!-- بوست رنک -->
        <div class="section-content" id="boost-section">
          <div class="card">سفارشات بوست رنک اینجاست...</div>
        </div>

        <!-- پیام‌ها -->
        <div class="section-content" id="messages-section">
          <div class="card">پیام‌های دریافتی کاربران نمایش داده می‌شود...</div>
        </div>

        <!-- چت آنلاین -->
        <div class="section-content" id="chat-section">
          <div class="card">
    <?php
    $messages = mysqli_query($conn, "SELECT * FROM messages ORDER BY created_at ASC");
    ?>
    <div class="chat-messages">
      <?php while($msg = mysqli_fetch_assoc($messages)): ?>
        <div>
          <strong><?= $msg['is_admin'] ? 'ادمین' : 'کاربر' ?>:</strong>
          <?= htmlspecialchars($msg['message']) ?>
        </div>
      <?php endwhile; ?>
    </div>
    <form class="chat-input-area" method="POST" action="send-message.php">
      <input class="chat-input" type="text" name="message" placeholder="پیام خود را بنویسید..." required>
      <input type="hidden" name="is_admin" value="1">
      <input type="hidden" name="user_id" value="1">
      <button class="chat-send-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
    </form>
  </div>
</div>
        </div>

        <!-- مربیان -->
        <div class="section-content" id="coaches-section">
          <div class="card">مدیریت مربیان سایت...</div>
        </div>

        <!-- خدمات -->
        <div class="section-content" id="services-section">
          <div class="card">مدیریت خدمات سایت...</div>
        </div>

        <!-- تنظیمات سیستم -->
        <div class="section-content" id="system-section">
          <div class="card">پیکربندی تنظیمات کلی...</div>
        </div>

        <!-- مدیریت ادمین‌ها -->
        <div class="section-content" id="admins-section">
          <div class="card">افزودن یا ویرایش ادمین‌ها...</div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const menuItems = document.querySelectorAll('.menu-item');
    const sections = document.querySelectorAll('.section-content');

    menuItems.forEach(item => {
      item.addEventListener('click', e => {
        e.preventDefault();
        menuItems.forEach(i => i.classList.remove('active'));
        item.classList.add('active');
        sections.forEach(section => section.classList.remove('active'));

        const sectionId = item.getAttribute('data-section') + '-section';
        const activeSection = document.getElementById(sectionId);
        if (activeSection) {
          activeSection.classList.add('active');
        }
      });
    });

    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['شنبه', 'یک‌شنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنج‌شنبه', 'جمعه'],
        datasets: [{
          label: 'تومان',
          data: [1250000, 1950000, 1850000, 2750000, 2150000, 3450000, 2450000],
          backgroundColor: 'rgba(76, 175, 80, 0.2)',
          borderColor: '#4CAF50',
          borderWidth: 2,
          tension: 0.4,
          fill: true
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            ticks: {
              callback: function(value) {
                return value.toLocaleString('fa-IR') + ' تومان';
              }
            }
          }
        },
        plugins: {
          legend: { display: false }
        }
      }
    });
  </script>
</body>
</html>
