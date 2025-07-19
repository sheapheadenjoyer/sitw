<?php require_once 'session.php'; if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; } ?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: register.php'); exit(); }

require __DIR__.'/includes/config.php';
require __DIR__.'/includes/auth.php';

// احراز هویت کاربر
requireAuth();

// دریافت اطلاعات کاربر
$user = getCurrentUser();
if (!$user) {
    logoutUser();
    header("Location: login.php");
    exit;
}

// پردازش خروج کاربر
if (isset($_GET['logout'])) {
    logoutUser();
    header("Location: login.php");
    exit;
}

// پردازش ذخیره تنظیمات پروفایل
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_profile'])) {
    $fullName = trim($_POST['full_name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $bio = trim($_POST['bio'] ?? '');
    $position = $_POST['position'] ?? '1';
    $rank = $_POST['rank'] ?? 'Divine';
    
    try {
        $stmt = $pdo->prepare("UPDATE users SET 
            full_name = ?, 
            username = ?, 
            email = ?, 
            phone = ?, 
            bio = ?, 
            position = ?, 
            rank = ? 
            WHERE id = ?");
        
        $stmt->execute([
            $fullName,
            $username,
            $email,
            $phone,
            $bio,
            $position,
            $rank,
            $user['id']
        ]);
        
        $success = 'تغییرات با موفقیت ذخیره شد';
        $user = getCurrentUser(); // دریافت اطلاعات به‌روزرسانی شده
    } catch (PDOException $e) {
        $error = 'خطا در ذخیره تغییرات: ' . $e->getMessage();
    }
}

// پردازش تغییر رمز عبور
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    if (!password_verify($currentPassword, $user['password'])) {
        $error = 'رمز عبور فعلی اشتباه است';
    } elseif ($newPassword !== $confirmPassword) {
        $error = 'رمز عبور جدید و تکرار آن مطابقت ندارند';
    } elseif (strlen($newPassword) < 8) {
        $error = 'رمز عبور باید حداقل 8 کاراکتر باشد';
    } else {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        
        try {
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->execute([$hashedPassword, $user['id']]);
            $success = 'رمز عبور با موفقیت تغییر یافت';
        } catch (PDOException $e) {
            $error = 'خطا در تغییر رمز عبور: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width,initial-scale=1.0" name="viewport"/>
    <title>پنل کاربری | <?php echo htmlspecialchars($user['full_name'] ?? $user['username']); ?> - Dota 2 Rush</title>
    <link href="https://fonts.cdnfonts.com/css/trajan-pro" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="assets/css/panelstyle.css" rel="stylesheet"/>
    <style>
        /* استایل‌های اضافی */
        .alert-success {
            background: rgba(46, 213, 115, 0.2);
            color: #2ed573;
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        
        .alert-error {
            background: rgba(255, 107, 107, 0.2);
            color: #ff6b6b;
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body style="background: url('images/dota-bg.webp') no-repeat center center fixed; background-size: cover;">
    <header class="header">
        <div class="notif-bell" id="notificationBell">
            <i class="fas fa-bell"></i>
            <span class="notif-badge" id="notificationCount">0</span>
        </div>
        <div class="logo-title-container">
            <img alt="Dota 2 Rush Logo" class="logo" src="images/logo.webp"/>
            <h1>DOTA 2 RUSH</h1>
        </div>
    </header>
    
    <div class="container">
        <div class="dashboard">
            <aside class="sidebar">
                <div class="user-profile">
                    <div class="profile-avatar" id="currentAvatar">
                        <?php echo mb_substr($user['full_name'] ?? $user['username'], 0, 1, 'UTF-8'); ?>
                    </div>
                    <div class="profile-info">
                        <div class="profile-name" id="profileName">
                            <?php echo htmlspecialchars($user['full_name'] ?? $user['username']); ?>
                        </div>
                        <div class="profile-email" id="profileEmail">
                            <?php echo htmlspecialchars($user['email']); ?>
                        </div>
                    </div>
                </div>
                
                <h3 class="sidebar-title"><i class="fas fa-bars"></i> منو</h3>
                <ul class="nav-menu">
                    <li class="menu-item">
                        <a class="menu-link active" data-tab="dashboard" href="#">
                            <i class="fas fa-tachometer-alt"></i> پروفایل
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" data-tab="profile" href="#">
                            <i class="fas fa-user-cog"></i> تنظیمات پروفایل
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="team.php">
                            <i class="fas fa-users"></i> تیم من
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="?logout=1">
                            <i class="fas fa-sign-out-alt"></i> خروج
                        </a>
                    </li>
                </ul>
            </aside>
            
            <div class="content">
                <!-- تب پروفایل -->
                <div class="tab-content active" id="dashboard">
                    <?php if (isset($success)): ?>
                        <div class="alert-success"><?php echo htmlspecialchars($success); ?></div>
                    <?php endif; ?>
                    <?php if (isset($error)): ?>
                        <div class="alert-error"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    
                    <h2 class="content-title">
                        <i class="fas fa-user"></i> پروفایل کاربری
                    </h2>
                    
                    <div class="user-profile">
                        <div class="profile-avatar" id="profileAvatarDisplay">
                            <?php echo mb_substr($user['full_name'] ?? $user['username'], 0, 1, 'UTF-8'); ?>
                        </div>
                        <div class="profile-info">
                            <div class="profile-name" id="displayName">
                                <?php echo htmlspecialchars($user['full_name'] ?? $user['username']); ?>
                            </div>
                            <div class="profile-email" id="displayEmail">
                                <?php echo htmlspecialchars($user['email']); ?>
                            </div>
                            <div style="margin-top: 1rem;">
                                <p><strong>موقعیت اصلی:</strong> 
                                    <span id="displayPosition">
                                        <?php 
                                        $positions = [
                                            '1' => 'پوزیشن 1 (Carry)',
                                            '2' => 'پوزیشن 2 (Mid)',
                                            '3' => 'پوزیشن 3 (Offlane)',
                                            '4' => 'پوزیشن 4 (Support)',
                                            '5' => 'پوزیشن 5 (Hard Support)'
                                        ];
                                        echo $positions[$user['position'] ?? '1'];
                                        ?>
                                    </span>
                                </p>
                                <p><strong>رنک فعلی:</strong> 
                                    <span id="displayRank"><?php echo htmlspecialchars($user['rank'] ?? 'Divine'); ?></span>
                                </p>
                                <p><strong>تعداد بازی:</strong> 
                                    <span id="displayMatches"><?php echo number_format($user['matches_played'] ?? 0); ?></span>
                                </p>
                                <p><strong>نرخ برد:</strong> 
                                    <span id="displayWinRate">
                                        <?php 
                                        $wins = $user['wins'] ?? 0;
                                        $matches = $user['matches_played'] ?? 1;
                                        echo number_format(($wins / $matches) * 100, 1) . '%';
                                        ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="section-container">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i> اطلاعات کاربری
                        </h3>
                        <div style="background: var(--card-bg); padding: 1.5rem; border-radius: 8px;">
                            <p><strong>بیوگرافی:</strong> 
                                <span id="displayBio">
                                    <?php echo !empty($user['bio']) ? htmlspecialchars($user['bio']) : 'بیوگرافی وارد نشده است'; ?>
                                </span>
                            </p>
                            <p><strong>تاریخ عضویت:</strong> 
                                <span id="displayJoinDate">
                                    <?php echo jdate('Y/m/d', strtotime($user['created_at'])); ?>
                                </span>
                            </p>
                            <p><strong>آخرین فعالیت:</strong> 
                                <span id="displayLastActivity">
                                    <?php echo jdate('Y/m/d H:i', strtotime($user['last_login'])); ?>
                                </span>
                            </p>
                            <p><strong>وضعیت حساب:</strong> 
                                <span class="badge <?php echo ($user['is_premium'] ?? 0) ? 'badge-premium' : 'badge-basic'; ?>">
                                    <?php echo ($user['is_premium'] ?? 0) ? 'حساب ویژه' : 'حساب معمولی'; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="section-container" style="margin-top: 2rem;">
                        <h3 class="section-title">
                            <i class="fas fa-trophy"></i> آمار و دستاوردها
                        </h3>
                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-icon"><i class="fas fa-star"></i></div>
                                <div class="stat-value"><?php echo $user['achievements'] ?? 0; ?></div>
                                <div class="stat-label">دستاوردها</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon"><i class="fas fa-fire"></i></div>
                                <div class="stat-value"><?php echo $user['win_streak'] ?? 0; ?></div>
                                <div class="stat-label">برنده متوالی</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon"><i class="fas fa-heart"></i></div>
                                <div class="stat-value"><?php echo $user['satisfaction_rate'] ?? 0; ?>%</div>
                                <div class="stat-label">رضایت هم‌تیمی‌ها</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon"><i class="fas fa-clock"></i></div>
                                <div class="stat-value"><?php echo number_format($user['hours_played'] ?? 0); ?></div>
                                <div class="stat-label">ساعت بازی</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- تب تنظیمات پروفایل -->
                <div class="tab-content" id="profile">
                    <h2 class="content-title">
                        <i class="fas fa-user-cog"></i> تنظیمات پروفایل
                    </h2>
                    
                    <form method="POST" class="profile-form">
                        <input type="hidden" name="save_profile" value="1">
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">نام کامل</label>
                                <input class="form-control" name="full_name" type="text" 
                                    value="<?php echo htmlspecialchars($user['full_name'] ?? ''); ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="form-label">نام کاربری</label>
                                <input class="form-control" name="username" type="text" 
                                    value="<?php echo htmlspecialchars($user['username']); ?>"/>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">ایمیل</label>
                                <input class="form-control" name="email" type="email" 
                                    value="<?php echo htmlspecialchars($user['email']); ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="form-label">شماره تلفن</label>
                                <input class="form-control" name="phone" type="tel" 
                                    value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">بیوگرافی</label>
                            <textarea class="form-control" name="bio" rows="4"><?php 
                                echo htmlspecialchars($user['bio'] ?? ''); 
                            ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">موقعیت اصلی</label>
                            <div id="positionButtons" style="display:flex;gap:.5rem;flex-wrap:wrap">
                                <?php 
                                $positions = [
                                    '1' => 'پوزیشن 1 (Carry)',
                                    '2' => 'پوزیشن 2 (Mid)',
                                    '3' => 'پوزیشن 3 (Offlane)',
                                    '4' => 'پوزیشن 4 (Support)',
                                    '5' => 'پوزیشن 5 (Hard Support)'
                                ];
                                
                                foreach ($positions as $value => $label) {
                                    $active = ($user['position'] ?? '1') == $value ? 'active' : '';
                                    echo '<button type="button" class="btn pos' . $value . ' ' . $active . '" 
                                        data-position="' . $value . '">' . $label . '</button>';
                                    echo '<input type="hidden" name="position" id="selectedPosition" 
                                        value="' . ($user['position'] ?? '1') . '">';
                                }
                                ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">رنک فعلی</label>
                            <select class="form-control" name="rank">
                                <?php
                                $ranks = ['Herald', 'Guardian', 'Crusader', 'Archon', 'Legend', 'Ancient', 'Divine', 'Immortal'];
                                foreach ($ranks as $rank) {
                                    $selected = ($user['rank'] ?? 'Divine') == $rank ? 'selected' : '';
                                    echo '<option value="' . $rank . '" ' . $selected . '>' . $rank . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="profile-actions">
                            <button type="button" class="btn btn-danger" id="cancelBtn">
                                <i class="fas fa-times"></i> انصراف
                            </button>
                            <button type="submit" class="btn btn-primary" id="saveBtn">
                                <i class="fas fa-save"></i> ذخیره تغییرات
                            </button>
                        </div>
                    </form>
                    
                    <hr style="margin: 2rem 0; border-color: rgba(255, 215, 0, 0.3);">
                    
                    <h3 class="section-title">
                        <i class="fas fa-key"></i> تغییر رمز عبور
                    </h3>
                    
                    <form method="POST" class="profile-form">
                        <input type="hidden" name="change_password" value="1">
                        
                        <div class="form-group">
                            <label class="form-label">رمز عبور فعلی</label>
                            <input class="form-control" name="current_password" type="password" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">رمز عبور جدید</label>
                            <input class="form-control" name="new_password" type="password" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">تکرار رمز عبور جدید</label>
                            <input class="form-control" name="confirm_password" type="password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> تغییر رمز عبور
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <p>📞 پشتیبانی: @Dota2Rush_Support | تلفن: 021-12345678</p>
        <p>© <?php echo jdate('Y'); ?> Dota 2 Rush | تمامی حقوق محفوظ است</p>
    </footer>
    
    <script src="assets/js/panelscripts.js"></script>
    <script>
        // انتخاب موقعیت
        document.querySelectorAll('#positionButtons button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('#positionButtons button').forEach(btn => {
                    btn.classList.remove('active');
                });
                this.classList.add('active');
                document.getElementById('selectedPosition').value = this.dataset.position;
            });
        });
        
        // تغییر بین تب‌ها
        document.querySelectorAll('.menu-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // حذف کلاس active از همه لینک‌ها
                document.querySelectorAll('.menu-link').forEach(lnk => {
                    lnk.classList.remove('active');
                });
                
                // اضافه کردن کلاس active به لینک فعلی
                this.classList.add('active');
                
                // مخفی کردن همه تب‌ها
                document.querySelectorAll('.tab-content').forEach(tab => {
                    tab.classList.remove('active');
                });
                
                // نمایش تب مربوطه
                const tabId = this.dataset.tab;
                document.getElementById(tabId).classList.add('active');
            });
        });
    </script>
</body>
</html>

<!-- نمایش نام کاربر و فرم تغییر رمز -->

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit();
}
require_once 'config.php';

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT identifier FROM users WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<h2>سلام، <?php echo htmlspecialchars($user['identifier']); ?> 👋</h2>

<h3>تغییر رمز عبور</h3>
<form method="POST">
    <input type="password" name="new_password" placeholder="رمز جدید" required>
    <button type="submit" name="update_password">ذخیره</button>
</form>
<?php
if (isset($_POST['update_password'])) {
    $new_pass = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $update->bind_param("si", $new_pass, $user_id);
    $update->execute();
    echo "<p style='color:lime;'>رمز عبور با موفقیت به‌روزرسانی شد ✅</p>";
}
?>
