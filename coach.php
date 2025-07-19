<?php
// می‌توانی این بخش را برای پردازش اولیه یا چک لاگین استفاده کنی
// session_start();
// if (!isset($_SESSION['user_id'])) { header("Location: /login.php"); exit; }
?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width,initial-scale=1.0" name="viewport"/>
<title>Dota 2 Rush | مربیان حرفه‌ای</title>
<link href="https://fonts.cdnfonts.com/css/trajan-pro" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&amp;display=swap" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<link href="css/coachstyle.css" rel="stylesheet"/>
</head>
<body>
<!-- Header Section -->
<header class="header">
<div class="user-profile" id="userProfile">
<a href="support/panel.php" id="profileAvatar" style="color: white; text-decoration: none;"><div class="profile-avatar"><i class="fas fa-user"></i></div></a>
<a class="profile-name" href="support/panel.php" id="profileName" style="color: white; text-decoration: none;">مهمان</a>
<div class="profile-dropdown" id="profileDropdown">
<a class="dropdown-item" href="support/panel.php"><i class="fas fa-user-cog"></i>پروفایل من</a>
<a class="dropdown-item" href="panel-friends.php"><i class="fas fa-users"></i>دوستان</a>
<a class="dropdown-item" href="panel-team.php"><i class="fas fa-users-cog"></i>تیم من</a>
<a class="dropdown-item" href="panel-setting.php"><i class="fas fa-cog"></i>تنظیمات</a>
<a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i>خروج</a>
</div>
</div>
<div class="logo-title-container">
<img alt="Dota 2 Rush Logo" class="logo" src="images/logo.webp"/>
<h1>DOTA 2 RUSH</h1>
</div>
<p class="slogan">ارتقای مهارت‌های Dota 2 با مربیان حرفه‌ای</p>
<div class="quick-links">
<a class="quick-link" href="#coaches"><i class="fas fa-trophy"></i> مربیان ما</a>
<a class="quick-link" href="#booking"><i class="fas fa-gamepad"></i> درخواست جلسه</a>
<a class="quick-link" href="#benefits"><i class="fas fa-magic"></i> مزایای کوچینگ</a>
<a class="quick-link register" href="/register"><i class="fas fa-lock"></i> ثبت‌نام</a>
</div>
</header>

<!-- Main Content -->
<main class="main">
<!-- Booking Section -->
<section class="booking-section" id="booking">
<h2 class="section-title"><i class="fas fa-calendar-alt"></i> رزرو جلسه کوچینگ</h2>
<div class="booking-form">
<!-- Role Selection -->
<div class="form-group">
<label class="form-label">پوزیشن مورد نظر</label>
<div class="role-options">
<div class="option-btn selected" data-role="pos1">پوزیشن 1 (Carry)</div>
<div class="option-btn" data-role="pos2">پوزیشن 2 (Mid)</div>
<div class="option-btn" data-role="pos3">پوزیشن 3 (Offlane)</div>
<div class="option-btn" data-role="pos4">پوزیشن 4 (Soft Support)</div>
<div class="option-btn" data-role="pos5">پوزیشن 5 (Hard Support)</div>
</div>
<!-- Role Reasons -->
<div class="role-reasons" id="pos1-reasons">
<div class="reason-title">چرا کوچینگ پوزیشن 1 برای شما مفید است:</div>
<ul class="reason-list">
<li class="reason-item">بهبود مهارت‌های فارمینگ و مدیریت کریپ‌ها</li>
<li class="reason-item">انتخاب بهینه آیتم‌ها در مراحل مختلف بازی</li>
<li class="reason-item">شناسایی زمان‌های مناسب برای جنگیدن</li>
<li class="reason-item">مدیریت نقش در تیم فایتها</li>
<li class="reason-item">آشنایی با متاگیم فعلی کرای‌ها</li>

  <li><a href="/my-orders.php">📋 سفارش‌های من</a></li>

  <li><a href="/my-orders.php">📋 سفارش‌های من</a></li></ul>
</div>
<div class="role-reasons" id="pos2-reasons" style="display:none">
<div class="reason-title">چرا کوچینگ پوزیشن 2 برای شما مفید است:</div>
<ul class="reason-list">
<li class="reason-item">بهبود فاز لینینگ و کنترل ران‌ها</li>
<li class="reason-item">شناسایی زمان‌های مناسب برای رونق و فشار به خطوط</li>
<li class="reason-item">آشنایی با متاگیم میدلین</li>
<li class="reason-item">مدیریت بادی بلاک و تاثیر در میدگیم</li>
<li class="reason-item">یادگیری مکانیک‌های خاص هیروهای مید</li>
</ul>
</div>
<div class="role-reasons" id="pos3-reasons" style="display:none">
<div class="reason-title">چرا کوچینگ پوزیشن 3 برای شما مفید است:</div>
<ul class="reason-list">
<li class="reason-item">ایجاد فشار و اسپیس مؤثر برای تیم</li>
<li class="reason-item">انتخاب بهینه آیتم‌های ابتدایی و میدگیم</li>
<li class="reason-item">شناسایی زمان‌های مناسب برای اینیشیت</li>
<li class="reason-item">مدیریت نقش در تیم فایتها</li>
<li class="reason-item">آشنایی با متاگیم آفلاین‌ها</li>
</ul>
</div>
<div class="role-reasons" id="pos4-reasons" style="display:none">
<div class="reason-title">چرا کوچینگ پوزیشن 4 برای شما مفید است:</div>
<ul class="reason-list">
<li class="reason-item">ایجاد فشار و اسپیس مؤثر برای تیم</li>
<li class="reason-item">شناسایی زمان‌های مناسب برای رونق و گنگ</li>
<li class="reason-item">بهبود پوزیشنینگ در فایتها</li>
<li class="reason-item">مدیریت نقش در تیم فایتها</li>
<li class="reason-item">آشنایی با متاگیم ساپورت‌ها</li>
</ul>
</div>
<div class="role-reasons" id="pos5-reasons" style="display:none">
<div class="reason-title">چرا کوچینگ پوزیشن 5 برای شما مفید است:</div>
<ul class="reason-list">
<li class="reason-item">مدیریت پول دادن و منابع</li>
<li class="reason-item">شناسایی زمان‌های مناسب برای رونق و گنگ</li>
<li class="reason-item">بهبود پوزیشنینگ در فایتها</li>
<li class="reason-item">مدیریت نقش در تیم فایتها</li>
<li class="reason-item">آشنایی با متاگیم ساپورت‌ها</li>
</ul>
</div>
<!-- Trial Session -->
<div class="trial-section">
<h3 class="section-subtitle"><i class="fas fa-flask"></i> جلسه آزمایشی</h3>
<p class="trial-desc">
              جلسه آزمایشی کوچینگ بهترین راه برای آشنایی با خدمات ماست. مربی متخصص ما در مدت 30 تا 60 دقیقه، 
              نقاط قوت و ضعف شما را تحلیل کرده و راهکارهای اولیه را ارائه می‌دهد.
            </p>
<div class="trial-duration"><i class="fas fa-clock"></i> مدت زمان: 30 تا 60 دقیقه</div>
<div class="price-tag">قیمت: 50,000 تومان</div>
<div class="option-btn selected" data-hours="0.5" id="trial-option">
              انتخاب جلسه آزمایشی
            </div>
</div>
<!-- Pro Sessions -->
<div class="pro-sessions">
<h3 class="section-subtitle"><i class="fas fa-star"></i> جلسات حرفه‌ای</h3>
<p class="trial-desc">
              جلسات کامل یک ساعته با مربیان حرفه‌ای ما که به صورت تخصصی روی بهبود مهارت‌های شما کار می‌کنند.
              با خرید پکیج‌های چند جلسه‌ای از تخفیف ویژه برخوردار شوید.
            </p>
<div class="session-options">
<div class="option-btn selected" data-sessions="1">1 جلسه (1 ساعت)</div>
<div class="option-btn" data-sessions="3">3 جلسه (10% تخفیف)</div>
<div class="option-btn" data-sessions="5">5 جلسه (15% تخفیف)</div>
<div class="option-btn" data-sessions="10">10 جلسه (20% تخفیف)</div>
</div>
</div>
</div>
<!-- Player Info -->
<div class="form-group">
<!-- Rank Selection -->
<div class="rank-selection">
<label class="form-label">رنک فعلی شما</label>
<div class="rank-options">
<div class="rank-option" data-rank="herald">
<img alt="Herald" class="rank-image" src="images/rank-herald.webp"/>
</div>
<div class="rank-option" data-rank="guardian">
<img alt="Guardian" class="rank-image" src="images/rank-guardian.webp"/>
</div>
<div class="rank-option" data-rank="crusader">
<img alt="Crusader" class="rank-image" src="images/rank-crusader.webp"/>
</div>
<div class="rank-option" data-rank="archon">
<img alt="Archon" class="rank-image" src="images/rank-archon.webp"/>
</div>
<div class="rank-option" data-rank="legend">
<img alt="Legend" class="rank-image" src="images/rank-legend.webp"/>
</div>
<div class="rank-option" data-rank="ancient">
<img alt="Ancient" class="rank-image" src="images/rank-ancient.webp"/>
</div>
<div class="rank-option" data-rank="divine">
<img alt="Divine" class="rank-image" src="images/rank-divine.webp"/>
</div>
<div class="rank-option" data-rank="immortal">
<img alt="Immortal" class="rank-image" src="images/rank-immortal.webp"/>
</div>
</div>
</div>
<!-- Additional Info -->
<div class="additional-info">
<label class="form-label">اهداف شما از کوچینگ:</label>
<textarea class="info-textarea" id="coaching-reasons" placeholder="چه مهارت‌هایی می‌خواهید بهبود دهید؟ چه مشکلات خاصی دارید؟"></textarea>
</div>
<!-- Contact Info -->
<div class="contact-info">
<label class="form-label">ساعات مناسب برای شما:</label>
<input class="contact-input" id="available-hours" placeholder="مثلاً 18 تا 24" type="text"/>
<label class="form-label" style="margin-top:1rem">راه ارتباطی (تلگرام یا شماره):</label>
<input class="contact-input" id="contact-info" placeholder="@username یا 0912..." type="text"/>
</div>
</div>
</div>
<!-- Price Display -->
<div class="price-display" id="payment">
<span class="discount-badge">تخفیف ویژه</span>
<strong>قیمت پایه: </strong>
<span id="base-price">180,000 تومان (ساعتی)</span>
<span class="original-price">200,000 تومان</span>
<div class="total-price" id="total-price">جمع کل: 180,000 تومان</div>
<a class="payment-link" href="#" id="payment-link">
<i class="fas fa-credit-card"></i> پرداخت آنلاین
        </a>
<img alt="زرین پال" class="zarinpal-logo" src="images/zarinpal-logo.webp"/>
</div>
</section>
<!-- Benefits Section -->
<section class="benefits-section" id="benefits">
<h2 class="section-title"><i class="fas fa-magic"></i> چرا کوچینگ حرفه‌ای؟</h2>
<div class="benefits-list">
<div class="benefit-item">
<div class="benefit-icon"><i class="fas fa-bullseye"></i></div>
<h3 class="benefit-title">تحلیل تخصصی</h3>
<p class="benefit-desc">
            مربیان ما با بررسی دقیق گیم‌پلی شما، نقاط ضعف را شناسایی و برنامه‌ای شخصی‌سازی شده 
            برای بهبود مهارت‌های شما طراحی می‌کنند.
          </p>
</div>
<div class="benefit-item">
<div class="benefit-icon"><i class="fas fa-chart-line"></i></div>
<h3 class="benefit-title">پیشرفت سریع</h3>
<p class="benefit-desc">
            با راهنمایی مربیان حرفه‌ای، در کوتاه‌ترین زمان ممکن شاهد پیشرفت چشمگیر 
            در مهارت‌های فردی و تیمی خود خواهید بود.
          </p>
</div>
<div class="benefit-item">
<div class="benefit-icon"><i class="fas fa-chess"></i></div>
<h3 class="benefit-title">استراتژی‌های پیشرفته</h3>
<p class="benefit-desc">
            یادگیری متاگیم فعلی، استراتژی‌های پیشرفته و تکنیک‌های مورد استفاده 
            توسط بازیکنان سطح بالا و حرفه‌ای.
          </p>
</div>
<div class="benefit-item">
<div class="benefit-icon"><i class="fas fa-trophy"></i></div>
<h3 class="benefit-title">مربیان سطح بالا</h3>
<p class="benefit-desc">
            تمامی مربیان ما از بازیکنان با رنک 8000+ هستند که تجربه مربیگری 
            حرفه‌ای و تدریس مؤثر را دارند.
          </p>
</div>
</div>
</section>
<!-- Coaches Section -->
<section class="coaches-container" id="coaches">
<!-- Coach 1 -->
<div class="coach-card">
<div class="coach-header">
<img alt="4locker4" class="coach-avatar" src="images/coach1-puck.webp"/>
<div class="coach-info">
<div class="coach-name">4locker4</div>
<span class="coach-position">پوزیشن 2 (Mid Laner)</span>
<div class="coach-rating">
<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              (4.8/5 از 64 نظر)
            </div>
</div>
</div>
<div class="coach-content">
<div class="heroes-title"><i class="fas fa-user-ninja"></i> هیروهای تخصصی:</div>
<div class="heroes-list">
<div class="hero-item">Invoker</div>
<div class="hero-item">Pangolier</div>
<div class="hero-item">Puck</div>
</div>
<div class="coach-stats">
<div class="stat-item">
<div class="stat-value">8,250</div>
<div class="stat-label">MMR فعلی</div>
</div>
<div class="stat-item">
<div class="stat-value">500+</div>
<div class="stat-label">ساعت تجربه</div>
</div>
<div class="stat-item">
<div class="stat-value">97%</div>
<div class="stat-label">رضایت کاربران</div>
</div>
<div class="stat-item">
<div class="stat-value"><i class="fas fa-medal"></i></div>
<div class="stat-label">مربی ویژه میدلین</div>
</div>
</div>
<a class="payment-link" href="#booking"><i class="fas fa-calendar-check"></i> رزرو جلسه</a>
</div>
</div>
<!-- Coach 2 -->
<div class="coach-card">
<div class="coach-header">
<img alt="Amin" class="coach-avatar" src="images/coach2-amin.webp"/>
<div class="coach-info">
<div class="coach-name">Amin</div>
<span class="coach-position">پوزیشن 1 (Hard Carry)</span>
<div class="coach-rating">
<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              (4.9/5 از 72 نظر)
            </div>
</div>
</div>
<div class="coach-content">
<div class="heroes-title"><i class="fas fa-user-ninja"></i> هیروهای تخصصی:</div>
<div class="heroes-list">
<div class="hero-item">Anti-Mage</div>
<div class="hero-item">Ursa</div>
<div class="hero-item">Phantom Assassin</div>
</div>
<div class="coach-stats">
<div class="stat-item">
<div class="stat-value">8,750</div>
<div class="stat-label">MMR فعلی</div>
</div>
<div class="stat-item">
<div class="stat-value">700+</div>
<div class="stat-label">ساعت تجربه</div>
</div>
<div class="stat-item">
<div class="stat-value">98%</div>
<div class="stat-label">رضایت کاربران</div>
</div>
<div class="stat-item">
<div class="stat-value"><i class="fas fa-medal"></i></div>
<div class="stat-label">مربی ویژه کرای</div>
</div>
</div>
<a class="payment-link" href="#booking"><i class="fas fa-calendar-check"></i> رزرو جلسه</a>
</div>
</div>
<!-- Coach 3 -->
<div class="coach-card">
<div class="coach-header">
<img alt="Hamid" class="coach-avatar" src="images/coach3-hamid.webp"/>
<div class="coach-info">
<div class="coach-name">Hamid</div>
<span class="coach-position">پوزیشن 4-5 (Support)</span>
<div class="coach-rating">
<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              (4.7/5 از 58 نظر)
            </div>
</div>
</div>
<div class="coach-content">
<div class="heroes-title"><i class="fas fa-user-ninja"></i> هیروهای تخصصی:</div>
<div class="heroes-list">
<div class="hero-item">Ringmaster</div>
<div class="hero-item">Tusk</div>
<div class="hero-item">Clockwerk</div>
<div class="hero-item">Witch Doctor</div>
</div>
<div class="coach-stats">
<div class="stat-item">
<div class="stat-value">7,950</div>
<div class="stat-label">MMR فعلی</div>
</div>
<div class="stat-item">
<div class="stat-value">600+</div>
<div class="stat-label">ساعت تجربه</div>
</div>
<div class="stat-item">
<div class="stat-value">96%</div>
<div class="stat-label">رضایت کاربران</div>
</div>
<div class="stat-item">
<div class="stat-value"><i class="fas fa-medal"></i></div>
<div class="stat-label">مربی ویژه ساپورت</div>
</div>
</div>
<a class="payment-link" href="#booking"><i class="fas fa-calendar-check"></i> رزرو جلسه</a>
</div>
</div>
</section>
</main>

<!-- Footer -->
<footer class="footer">
<div>
<p><i class="fas fa-headset"></i> پشتیبانی: @Dota2Rush_Support</p>
<p style="margin-top:1rem"><i class="fas fa-user-friends"></i> سیستم معرفی دوستان: 20% تخفیف برای شما و دوستان</p>
</div>
<p style="margin-top:2rem">© 2023 Dota 2 Rush | تمامی حقوق محفوظ است</p>
</footer>

<!-- Live Chat Widget -->
<div class="live-chat">
    <div class="chat-toggle" id="liveChatToggle">
        <i class="fas fa-comments"></i>
        چت آنلاین
    </div>
    
    <div class="chat-modal" id="chatModal">
        <div class="chat-header">
            <h3>
                <i class="fas fa-headset"></i>
                پشتیبانی مربیگری
                <span class="chat-status">
                    <span class="status-indicator"></span>
                    آنلاین
                </span>
            </h3>
            <span class="close-chat">&times;</span>
        </div>
        
        <div class="chat-messages" id="chatMessages">
            <div class="admin-message">
                <p>سلام! چطور می‌توانم در مورد مربیگری به شما کمک کنم؟</p>
                <span class="message-time">همین حالا</span>
            </div>
        </div>
        
        <div class="chat-input-container">
            <input type="text" class="chat-input" id="chatInput" placeholder="پیام خود را بنویسید...">
            <button class="send-button" id="sendMessage">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<script src="js/coachscripts.js"></script>
<script src="js/coach-pricing.js"></script>

</body>
</html>
<!-- فرم پرداخت آنلاین -->
<form action="payment.php" method="post" action="/payment/process_payment.php" method="POST" id="coach-payment-form">
  <input type="hidden" name="service" value="coach">
  <input type="hidden" name="position" id="selectedPosition">
  <input type="hidden" name="rank" id="selectedRank">
  <input type="hidden" name="sessions" id="selectedSessions">
  <input type="hidden" name="price" id="finalPrice">
  <input type="hidden" name="goals" id="userGoals">
  <input type="hidden" name="available_hours" id="availableHours">
  <input type="hidden" name="contact" id="contactInfo">
  <button type="submit" class="payment-link">پرداخت آنلاین</button>
</form>