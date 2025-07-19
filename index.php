<?php include 'session.php'; ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
}
?><?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . '/auth/config.php'); // فایل تنظیمات اتصال به دیتابیس

// بررسی لاگین بودن کاربر
$isLoggedIn = isset($_SESSION['user_id']);
$username = '';
$avatar = '';

if ($isLoggedIn) {
    // اتصال به دیتابیس و دریافت اطلاعات کاربر
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("SELECT username, avatar FROM users WHERE id = :user_id");
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $username = $user['username'];
            $avatar = $user['avatar'];
        }
    } catch(PDOException $e) {
        // در صورت خطا می‌توانید لاگ کنید یا پیام مناسب نمایش دهید
        error_log("Database error: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width,initial-scale=1.0" name="viewport"/>
    <meta content="ارائه خدمات حرفه‌ای Dota 2 شامل کوچینگ توسط بازیکنان رنک 8000+، بوست امن رنک و تورنمنت‌های ماهانه با جوایز نقدی. افزایش MMR تضمینی با روش‌های قانونی." name="description"/>
    <meta content="Dota 2,کوچینگ,بوست رنک,تورنمنت,افزایش MMR,آموزش Dota 2,افزایش رنک,بازی Dota 2" name="keywords"/>
    <meta content="Dota 2 Rush" name="author"/>
    <!-- Open Graph -->
    <meta content="Dota 2 Rush | خدمات حرفه‌ای Dota 2" property="og:title"/>
    <meta content="کوچینگ حرفه‌ای، بوست رنک و تورنمنت‌های ماهانه با جوایز نقدی" property="og:description"/>
    <meta content="images/main-bg.webp" property="og:image"/>
    <meta content="https://dota2rush.ir" property="og:url"/>
    <meta content="website" property="og:type"/>
    <title>Dota 2 Rush | کوچینگ حرفه‌ای، بوست رنک و تورنمنت</title>
    <!-- فونت‌ها و آیکون‌ها -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.cdnfonts.com/css/trajan-pro" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <!-- استایل اصلی -->
    <link href="css/style.css" rel="stylesheet"/>
    <!-- Favicon -->
    <link href="images/logo.webp" rel="icon" type="image/webp"/>
    <!-- استایل افکت‌های ویژه -->
    <style>
        /* افکت ذرات یخ */
        .ice-particle {
            position: absolute;
            width: 8px;
            height: 8px;
            background: rgba(173, 216, 230, 0.8);
            border-radius: 50%;
            filter: blur(1px);
            animation: ice-fall 3s linear forwards;
            z-index: 2;
        }

        @keyframes ice-fall {
            0% { transform: translateY(-20px) rotate(0deg); opacity: 1; }
            100% { transform: translateY(400px) rotate(360deg); opacity: 0; }
        }

        /* افکت ذرات آتش */
        .fire-particle {
            position: absolute;
            width: 12px;
            height: 12px;
            background: radial-gradient(circle, 
                      rgba(255,100,0,0.9) 30%, 
                      rgba(255,215,0,0.7) 100%);
            border-radius: 50%;
            filter: blur(1px);
            animation: fire-flicker 2s linear forwards;
            z-index: 2;
        }

        @keyframes fire-flicker {
            0% { transform: scale(1) translateY(0); opacity: 1; }
            50% { transform: scale(1.3) translateY(-10px); opacity: 0.8; }
            100% { transform: scale(0.5) translateY(50px); opacity: 0; }
        }

        /* افکت ذرات رعد و برق */
        .storm-particle {
            position: absolute;
            width: 2px;
            height: 20px;
            background: linear-gradient(to bottom, 
                      rgba(138, 43, 226, 0.8), 
                      rgba(200, 160, 255, 0.8));
            animation: storm-flash 1.5s linear forwards;
            z-index: 2;
            transform: rotate(45deg);
        }

        @keyframes storm-flash {
            0% { opacity: 0; transform: translateY(-50px) rotate(45deg); }
            20% { opacity: 1; }
            100% { opacity: 0; transform: translateY(300px) rotate(45deg); }
        }

        /* افکت پس‌زمینه کارت‌ها */
        .coaching-card .card-effect {
            background: radial-gradient(circle at center, 
                      rgba(100, 200, 255, 0.8) 0%, 
                      rgba(0,0,0,0) 70%);
            animation: pulse-ice 4s infinite alternate;
        }

        .boosting-card .card-effect {
            background: radial-gradient(circle at center, 
                      rgba(255, 100, 0, 0.8) 0%, 
                      rgba(0,0,0,0) 70%);
            animation: pulse-fire 3s infinite alternate;
        }

        .tournament-card .card-effect {
            background: radial-gradient(circle at center, 
                      rgba(150, 50, 255, 0.8) 0%, 
                      rgba(0,0,0,0) 70%);
            animation: pulse-storm 5s infinite alternate;
        }

        @keyframes pulse-ice {
            0% { opacity: 0.1; transform: scale(1); }
            50% { opacity: 0.2; transform: scale(1.02); }
            100% { opacity: 0.1; transform: scale(1); }
        }

        @keyframes pulse-fire {
            0% { opacity: 0.1; transform: scale(1); }
            50% { opacity: 0.25; transform: scale(1.03); }
            100% { opacity: 0.1; transform: scale(1); }
        }

        @keyframes pulse-storm {
            0% { opacity: 0.1; transform: scale(1); }
            50% { opacity: 0.3; transform: scale(1.04); }
            100% { opacity: 0.1; transform: scale(1); }
        }
    </style>
    <style>
        /* Contact Bubble */
        .contact-bubble {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: linear-gradient(to right, #9D50BB, #FF6B6B);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            z-index: 1000;
        }
        .contact-bubble i {
            font-size: 1.5rem;
            color: white;
        }
        .contact-modal {
            display: none;
            position: fixed;
            bottom: 90px;
            left: 20px;
            width: 300px;
            background: rgba(26,42,58,0.95);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.5);
            z-index: 1000;
            border: 1px solid #FFD700;
        }
        .contact-modal h3 {
            color: #FFD700;
            margin-bottom: 15px;
            text-align: center;
        }
        .contact-modal textarea {
            width: 100%;
            background: #1A2A3A;
            border: 1px solid #2A3A4A;
            border-radius: 5px;
            padding: 10px;
            color: white;
            margin-bottom: 15px;
            min-height: 100px;
        }
        .contact-modal button {
            background: linear-gradient(to right, #FF6B6B, #9D50BB);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
<?php
include 'session.php';
?>
<div style="position: absolute; top: 10px; right: 10px;">
<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo '<img src="' . $user['avatar'] . '" width="30" height="30" style="border-radius:50%;"> ';
    echo '<strong>' . htmlspecialchars($user['username']) . '</strong> | ';
    echo '<a href="panel.php">پنل کاربری</a> | <a href="logout.php">خروج</a>';
} else {
    echo '<a href="login.php">ورود</a> | <a href="signup.php">ثبت‌نام</a>';
}
?>
</div>


<?php if (isset($_SESSION['user_id'])): ?>
  <div style="position:absolute; top:10px; right:15px;">
    <a href="panel.php" style="color:#fff; text-decoration:none;">
      <img src="<?php echo $_SESSION['avatar']; ?>" style="width:30px;height:30px;border-radius:50%;vertical-align:middle;">
      <span style="margin-right:5px;"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
    </a>
  </div>
<?php else: ?>
  <div style="position:absolute; top:10px; right:15px;">
    <a href="auth/login.php" style="color:#fff;">ورود</a> | 
    <a href="auth/register.php" style="color:#fff;">ثبت‌نام</a>
  </div>
<?php endif; ?>

    <!-- هدر -->
    <header class="header">
        <button class="mobile-menu-toggle">☰</button>
        <a class="join-us-link" href="estekhdam.html">
            <i class="fas fa-user-plus"></i> همکاری با ما
        </a>
        <div class="user-profile-container">
            <?php if ($isLoggedIn): ?>
                <a class="simple-profile-link" href="panel.php">
                    <div class="user-avatar">
                        <?php if (!empty($avatar)): ?>
                            <img src="images/avatars/<?php echo htmlspecialchars($avatar); ?>" alt="آواتار کاربر" style="width: 100%; height: 100%;">
                        <?php else: ?>
                            <i class="fas fa-user"></i>
                        <?php endif; ?>
                    </div>
                    <span class="user-name"><?php echo htmlspecialchars($username); ?></span>
                </a>
            <?php else: ?>
                <a class="simple-profile-link" href="auth/login.php">
                    <div class="user-avatar"><i class="fas fa-user"></i></div>
                    <span class="user-name">ورود / ثبت‌نام</span>
                </a>
            <?php endif; ?>
        </div>
        <div class="logo-title-container">
            <picture>
                <source srcset="images/logo.webp" type="image/webp"/>
                <img alt="Dota 2 Rush Logo" class="logo" loading="lazy" src="images/logo.webp"/>
            </picture>
            <h1>DOTA 2 RUSH</h1>
        </div>
        <p class="slogan">سه قدم تا اوج: یادگیری، پیشرفت، قهرمانی</p>
        <div class="quick-links">
            <a class="quick-link" href="#coaching">
                <i class="fas fa-chalkboard-teacher"></i> کوچینگ
            </a>
            <a class="quick-link" href="#boosting">
                <i class="fas fa-bolt"></i> بوست
            </a>
            <a class="quick-link" href="#tournament">
                <i class="fas fa-trophy"></i> تورنمنت
            </a>
            <a class="quick-link" href="#loyalty">
                <i class="fas fa-medal"></i> امتیازات
            </a>
            <?php if (!$isLoggedIn): ?>
                <a class="quick-link register" href="auth/register.php">
                    <i class="fas fa-user-plus"></i> ثبت‌نام
                </a>
            <?php endif; ?>
        </div>
    </header>

    <!-- محتوای اصلی -->
    <main class="main">
        <!-- بخش خدمات -->
        <section class="services-container">
            <!-- کارت کوچینگ -->
            <article class="service-card coaching-card" id="coaching">
                <div class="card-effect"></div>
                <div class="service-img-container">
                    <div class="img-orb"></div>
                    <picture>
                        <source srcset="images/coaching-card.webp" type="image/webp"/>
                        <img alt="کوچینگ حرفه‌ای Dota 2" class="service-img" loading="lazy" src="images/coaching-card.webp"/>
                    </picture>
                </div>
                <div class="service-content">
                    <span class="highlight">کوچینگ VIP</span>
                    <ul>
                        <li>جلسات خصوصی با بازیکنان رنک 8000+</li>
                        <li>آنالیز حرفه‌ای ریکوردهای بازی</li>
                        <li>آموزش نقش‌های تخصصی</li>
                        <li>برنامه‌ریزی پیشرفت شخصی</li>
                    </ul>
                    <a class="cta-button pulse" href="coach.php">
                        <i class="fas fa-calendar-check"></i> درخواست جلسه
                    </a>
                </div>
            </article>

            <!-- کارت بوست -->
            <article class="service-card boosting-card" id="boosting">
                <div class="card-effect"></div>
                <div class="service-img-container">
                    <div class="img-orb"></div>
                    <picture>
                        <source srcset="images/boosting-card.webp" type="image/webp"/>
                        <img alt="بوست رنک Dota 2" class="service-img" loading="lazy" src="images/boosting-card.webp"/>
                    </picture>
                </div>
                <div class="service-content">
                    <span class="highlight">بوست اکانت</span>
                    <div class="service-options">
                        <div class="service-option">
                            <div><i class="fas fa-arrow-up"></i> افزایش MMR</div>
                            <div class="option-details">
                                <span>زمان تحویل: 3-5 روز</span>
                                <span>از 50,000 تومان</span>
                            </div>
                        </div>
                        <div class="service-option">
                            <div><i class="fas fa-smile"></i> Behavior Score</div>
                            <div class="option-details">
                                <span>اصلاح رفتار در 24 ساعت</span>
                                <span>از 30,000 تومان</span>
                            </div>
                        </div>
                        <div class="service-option">
                            <div><i class="fas fa-exclamation-triangle"></i> Low Priority</div>
                            <div class="option-details">
                                <span>حذف Low Priority</span>
                                <span>از 25,000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-check-circle"></i>
                        <span>بیش از 500 کاربر راضی</span>
                    </div>
                    <a class="cta-button" href="boost.php">
                        <i class="fas fa-rocket"></i> درخواست بوست
                    </a>
                </div>
            </article>

            <!-- کارت تورنمنت -->
            <article class="service-card tournament-card coming-soon" id="tournament">
                <div class="card-effect"></div>
                <div class="service-img-container">
                    <div class="img-orb"></div>
                    <img alt="تورنمنت Dota 2" class="service-img" loading="lazy" src="images/article-2.webp"/>
                </div>
                <div class="service-content">
                    <span class="highlight">تورنمنت ماهانه</span>
                    <p>مسابقات با جوایز نقدی و بن استیم برای تیم‌های برتر</p>
                    <div class="countdown">
                        <div>
                            <div class="countdown-number" id="days">00</div>
                            <div class="countdown-label">روز</div>
                        </div>
                        <div>
                            <div class="countdown-number" id="hours">00</div>
                            <div class="countdown-label">ساعت</div>
                        </div>
                        <div>
                            <div class="countdown-number" id="minutes">00</div>
                            <div class="countdown-label">دقیقه</div>
                        </div>
                        <div>
                            <div class="countdown-number" id="seconds">00</div>
                            <div class="countdown-label">ثانیه</div>
                        </div>
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-pen"></i>
                        <span>پیش‌ثبت‌نام شروع شد</span>
                    </div>
                    <button class="cta-button" disabled="">
                        <i class="fas fa-hourglass-start"></i> به زودی...
                    </button>
                </div>
            </article>
        </section>

        <!-- بخش سیستم امتیازات -->
        <section class="loyalty-program" id="loyalty">
            <h2><i class="fas fa-medal"></i> سیستم امتیازات</h2>
            <p>با هر خرید، امتیاز دریافت کنید و به سطوح نقره‌ای و طلایی برسید تا از مزایای ویژه برخوردار شوید.</p>
            <div class="tier-cards">
                <div class="tier-card silver">
                    <div class="tier-header">
                        <i class="fas fa-medal"></i>
                        <h3>نقره‌ای</h3>
                    </div>
                    <ul>
                        <li>۱۰% تخفیف جلسات کوچینگ</li>
                        <li>پشتیبانی VIP</li>
                        <li>دسترسی به تحلیل‌های اختصاصی</li>
                        <li>هدیه آیتم ایمورتال (کد اختصاصی)</li>
                    </ul>
                    <div class="progress">
                        <span>امتیاز شما: ۱۵۰/۵۰۰</span>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 30%;"></div>
                        </div>
                    </div>
                </div>
                <div class="tier-card gold">
                    <div class="tier-header">
                        <i class="fas fa-trophy"></i>
                        <h3>طلایی</h3>
                    </div>
                    <ul>
                        <li>۲۰% تخفیف همه خدمات</li>
                        <li>جلسه رایگان هر ماه</li>
                        <li>اولویت در تورنمنت‌ها</li>
                        <li>مشاوره اختصاصی</li>
                        <li>هدیه آیتم ایمورتال + ست کامل میتیکال</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- بخش مقالات -->
        <section class="blog-section">
            <h2><i class="fas fa-book-open"></i> مقالات</h2>
            <article class="blog-card" id="article1">
                <picture>
                    <source srcset="images/article-1.webp" type="image/webp"/>
                    <img alt="مقاله آموزشی" class="service-img" loading="lazy" src="images/article-1.webp"/>
                </picture>
                <div class="blog-content">
                    <h3>۵ اشتباه مهلک در نقش Carry</h3>
                    <p>تحلیل اشتباهات رایج Carryهای رنک متوسط با مثال‌های عملی از بازی‌های واقعی و راهکارهای حرفه‌ای برای بهبود عملکرد در نقش Carry.</p>
                    <a class="read-more read-article" data-article="article1" href="#article1">ادامه مطلب <i class="fas fa-chevron-left"></i></a>
                    <div class="article-content" id="article1-content">
                        <p>نقش Carry یکی از حیاتی‌ترین نقش‌ها در Dota 2 است که مسئولیت اصلی پیروزی در اواخر بازی را بر عهده دارد. بسیاری از بازیکنان متوسط در این نقش اشتباهات مشابهی مرتکب می‌شوند که مانع پیشرفت آن‌ها می‌شود.</p>
                        <h3>۱. تمرکز بیش از حد بر روی کشتن</h3>
                        <p>بسیاری از Carryها فکر می‌کنند وظیفه اصلی آن‌ها کشتن حریفان است. در حالی که در مراحل اولیه بازی، تمرکز اصلی باید بر روی فارمینگ و افزایش قدرت باشد. کشتن حریفان باید در اولویت دوم قرار گیرد.</p>
                        <h3>۲. عدم آگاهی از نقشه</h3>
                        <p>یک Carry موفق باید دائماً از موقعیت حریفان و تیم خود آگاه باشد. بسیاری از Carryهای متوسط به حدی درگیر فارمینگ می‌شوند که کاملاً از نقشه غافل می‌شوند و در دام گنک می‌افتند.</p>
                        <h3>۳. انتخاب اشتباه آیتم‌ها</h3>
                        <p>هر بازی شرایط خاص خود را دارد و کپی کردن بی‌فکرۀ آیتم‌های پیش‌فرض می‌تواند فاجعه‌بار باشد. یک Carry حرفه‌ای باید بر اساس ترکیب تیم خود و حریفان، آیتم‌های مناسب را انتخاب کند.</p>
                        <h3>۴. عدم مشارکت در تیم‌فایت‌های مهم</h3>
                        <p>اگرچه Carry باید بیشتر وقت خود را صرف فارمینگ کند، اما مشارکت در تیم‌فایت‌های کلیدی بسیار حیاتی است. تشخیص این تیم‌فایت‌ها نیاز به تجربه و آگاهی دارد.</p>
                        <h3>۵. مدیریت ضعیف منابع</h3>
                        <p>بسیاری از Carryها نمی‌دانند چگونه به طور مؤثر از جنگل و لین استفاده کنند. مدیریت صحیح منابع می‌تواند تفاوت بین یک Carry متوسط و یک Carry حرفه‌ای باشد.</p>
                    </div>
                </div>
            </article>
            <article class="blog-card" id="article2">
                <picture>
                    <source srcset="images/article-2.webp" type="image/webp"/>
                    <img alt="مقاله آموزشی" class="service-img" loading="lazy" src="images/article-2.webp"/>
                </picture>
                <div class="blog-content">
                    <h3>راهنمای جامع نقش‌ها در Dota 2</h3>
                    <p>Dota 2 یک بازی استراتژیک با 5 نقش اصلی است که هر کدام مسئولیت‌های منحصر به فردی دارند. در این مقاله به بررسی عمیق هر نقش و استراتژی‌های مربوط به آن می‌پردازیم.</p>
                    <a class="read-more read-article" data-article="article2" href="#article2">ادامه مطلب <i class="fas fa-chevron-left"></i></a>
                    <div class="article-content" id="article2-content">
                        <h3>1. نقش Carry (پوزیشن 1)</h3>
                        <p>Carry قلب تیم در اواخر بازی است. مسئولیت اصلی این نقش فارمینگ مؤثر و تبدیل شدن به نیروی غالب در مراحل پایانی بازی است. Carryهای موفق باید:</p>
                        <ul>
                            <li>مدیریت دقیق منابع طلا و تجربه داشته باشند</li>
                            <li>از موقعیت‌های خطرناک دوری کنند</li>
                            <li>زمان مناسب برای پیوستن به تیم‌فایت‌ها را تشخیص دهند</li>
                        </ul>
                        <h3>2. نقش Midlaner (پوزیشن 2)</h3>
                        <p>Midlaner معمولاً قوی‌ترین بازیکن تیم از نظر مهارت فردی است. این نقش باید:</p>
                        <ul>
                            <li>کنترل رن (rune) را در دست بگیرد</li>
                            <li>در زمان مناسب به سایر لین‌ها کمک کند (gank)</li>
                            <li>فضای کافی برای Carry ایجاد کند</li>
                        </ul>
                        <h3>3. نقش Offlaner (پوزیشن 3)</h3>
                        <p>Offlaner نقش کلیدی در ایجاد اختلال در فارمینگ حریف دارد. ویژگی‌های یک Offlaner خوب:</p>
                        <ul>
                            <li>تحمل فشار لین مقابل را داشته باشد</li>
                            <li>در زمان مناسب initiator باشد</li>
                            <li>فضاسازی مناسب برای تیم انجام دهد</li>
                        </ul>
                        <h3>4. نقش Soft Support (پوزیشن 4)</h3>
                        <p>این نقش ترکیبی از حمایت و ایجاد مزاحمت است. مسئولیت‌های اصلی:</p>
                        <ul>
                            <li>کمک به کنترل رن‌ها</li>
                            <li>ایجاد گنک‌های مؤثر</li>
                            <li>تهیه آیتم‌های utility برای تیم</li>
                        </ul>
                        <h3>5. نقش Hard Support (پوزیشن 5)</h3>
                        <p>ستون فقرات تیم در مراحل اولیه بازی. این نقش باید:</p>
                        <ul>
                            <li>حفظ جان Carry اولویت اصلی‌اش باشد</li>
                            <li>ویژن و کنترل نقشه را مدیریت کند</li>
                            <li>با حداقل منابع بیشترین تأثیر را بگذارد</li>
                        </ul>
                        <p>درک صحیح از این نقش‌ها و هماهنگی بین آن‌ها کلید موفقیت در Dota 2 است. هر نقش مکمل دیگری است و عملکرد ضعیف در یک نقش می‌تواند کل تیم را تحت تأثیر قرار دهد.</p>
                    </div>
                </div>
            </article>
        </section>

        <!-- بخش سوالات متداول -->
        <section class="faq-container">
            <h2><i class="fas fa-question-circle"></i> سوالات متداول</h2>
            <article class="faq-item">
                <div><strong>آیا بوست اکانت امن است؟</strong></div>
                <div><i class="fas fa-check-circle"></i> بله، با روش‌های کاملاً قانونی و بدون ریسک برای اکانت شما. ما از روش‌های دستی استفاده می‌کنیم و هیچگونه نرم‌افزار غیرمجاز به کار نمی‌بریم.</div>
            </article>
            <article class="faq-item">
                <div><strong>مدت زمان هر جلسه کوچینگ چقدر است؟</strong></div>
                <div><i class="fas fa-check-circle"></i> هر جلسه 60 دقیقه با امکان تمدید در صورت نیاز. جلسات به صورت آنلاین و از طریق Discord برگزار می‌شود.</div>
            </article>
            <article class="faq-item">
                <div><strong>آیا برای تورنمنت‌ها هزینه ثبت‌نام وجود دارد؟</strong></div>
                <div><i class="fas fa-check-circle"></i> تورنمنت‌های ما به دو صورت رایگان و با هزینه برگزار می‌شوند. تورنمنت‌های با هزینه، جوایز نقدی بیشتری دارند.</div>
            </article>
            <article class="faq-item">
                <div><strong>چگونه می‌توانم از پیشرفت خودم مطمئن شوم؟</strong></div>
                <div><i class="fas fa-check-circle"></i> پس از هر جلسه کوچینگ، گزارش تحلیلی دریافت می‌کنید و می‌توانید پیشرفت MMR خود را در بازه‌های زمانی مشخص پیگیری کنید.</div>
            </article>
        </section>
    </main>

    <!-- فوتر -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>خدمات ما</h3>
                <ul>
                    <li><a href="#coaching">کوچینگ حرفه‌ای</a></li>
                    <li><a href="#boosting">بوست رنک</a></li>
                    <li><a href="#tournament">تورنمنت‌ها</a></li>
                    <li><a href="#loyalty">سیستم امتیازات</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>لینک‌های مفید</h3>
                <ul>
                    <li><a href="#">مقالات آموزشی</a></li>
                    <li><a href="#">قوانین و مقررات</a></li>
                    <li><a href="#">حریم خصوصی</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>تماس با ما</h3>
                <ul>
                    <li><i class="fas fa-headset"></i> پشتیبانی 24/7: @Dota2Rush_Support</li>
                    <li><i class="fas fa-envelope"></i> ایمیل: info@dota2rush.ir</li>
                    <li><i class="fas fa-map-marker-alt"></i> دفتر مرکزی: خراسان شمالی، بجنورد</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>فرصت‌های شغلی</h3>
                <ul>
                    <li><a href="estekhdam.html?type=coaches">استخدام مربی</a></li>
                    <li><a href="estekhdam.html?type=boosters">استخدام بوستر</a></li>
                    <li><a href="estekhdam.html?type=marketing">همکاری در بازاریابی</a></li>
                </ul>
            </div>
        </div>
        <div class="social-links">
            <a class="social-link" href="https://t.me/Dota2Rush_Support" rel="noopener noreferrer" target="_blank">
                <i class="fab fa-telegram"></i>
            </a>
            <a class="social-link" href="https://instagram.com/dota2rush" rel="noopener noreferrer" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="social-link" href="https://twitter.com/dota2rush" rel="noopener noreferrer" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </div>
        <p class="copyright">
            © 2023 Dota 2 Rush | تمامی حقوق محفوظ است
        </p>
    </footer>

    <!-- دکمه بازگشت به بالا -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- اسکریپت‌ها -->
    <script src="js/script.js"></script>

    <!-- اسکریپت افکت‌های ویژه -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // افکت یخ برای بخش کوچینگ
            const coachingCard = document.querySelector('.coaching-card');
            function createIceParticles() {
                for (let i = 0; i < 15; i++) {
                    const iceParticle = document.createElement('div');
                    iceParticle.className = 'ice-particle';
                    iceParticle.style.left = `${Math.random() * 100}%`;
                    iceParticle.style.animationDelay = `${Math.random() * 3}s`;
                    coachingCard.appendChild(iceParticle);
                }
            }
            
            // افکت آتش برای بخش بوست
            const boostingCard = document.querySelector('.boosting-card');
            function createFireParticles() {
                for (let i = 0; i < 10; i++) {
                    const fireParticle = document.createElement('div');
                    fireParticle.className = 'fire-particle';
                    fireParticle.style.left = `${Math.random() * 100}%`;
                    fireParticle.style.animationDelay = `${Math.random() * 2}s`;
                    boostingCard.appendChild(fireParticle);
                }
            }
            
            // افکت رعد و برق برای بخش تورنمنت
            const tournamentCard = document.querySelector('.tournament-card');
            function createStormParticles() {
                for (let i = 0; i < 8; i++) {
                    const stormParticle = document.createElement('div');
                    stormParticle.className = 'storm-particle';
                    stormParticle.style.left = `${Math.random() * 100}%`;
                    stormParticle.style.animationDelay = `${Math.random() * 1.5}s`;
                    tournamentCard.appendChild(stormParticle);
                }
            }
            
            // ایجاد افکت‌ها
            if (coachingCard) createIceParticles();
            if (boostingCard) createFireParticles();
            if (tournamentCard) createStormParticles();
        });
    </script>

    <!-- ویجت پشتیبانی -->
    <div class="contact-bubble" id="contactBubble">
        <i class="fas fa-comment-dots"></i>
    </div>
    <div class="contact-modal" id="contactModal">
        <h3>پیام به پشتیبانی</h3>
        <textarea placeholder="پیام خود را اینجا بنویسید..."></textarea>
        <button id="sendMessage">ارسال پیام</button>
        <div style="margin-top:15px;">
            <h4>سوالات سریع:</h4>
            <ul style="list-style:none;padding-right:0;">
                <li style="padding:5px 0;border-bottom:1px dashed #2A3A4A;cursor:pointer">وضعیت سفارش من؟</li>
                <li style="padding:5px 0;border-bottom:1px dashed #2A3A4A;cursor:pointer">روش‌های پرداخت؟</li>
                <li style="padding:5px 0;border-bottom:1px dashed #2A3A4A;cursor:pointer">تخفیف برای سفارش‌های حجمی؟</li>
                <li style="padding:5px 0;cursor:pointer">مشکل در پرداخت دارم</li>
            </ul>
        </div>
    </div>

    <script>
    // Initialize contact bubble
    function initContactBubble() {
        const contactBubble = document.getElementById('contactBubble');
        const contactModal = document.getElementById('contactModal');

        contactBubble.addEventListener('click', () => {
            contactModal.style.display = contactModal.style.display === 'block' ? 'none' : 'block';
        });

        document.getElementById('sendMessage').addEventListener('click', () => {
            alert('پیام شما با موفقیت ارسال شد!');
            contactModal.style.display = 'none';
        });

        document.querySelectorAll('.contact-modal ul li').forEach(item => {
            item.addEventListener('click', () => {
                const text = item.textContent;
                document.querySelector('.contact-modal textarea').value = text;
            });
        });
    }
    document.addEventListener("DOMContentLoaded", initContactBubble);
    </script>

</body>
</html>