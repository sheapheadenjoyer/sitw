<?php
session_start();
$timeout_duration = 900; // 15 دقیقه

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=1");
    exit;
}

$_SESSION['LAST_ACTIVITY'] = time();
?>

<?php
require __DIR__.'/includes/config.php';
require __DIR__.'/includes/auth.php';

if (isUserLoggedIn()) {
    header("Location: boost.php");
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    
    if (empty($email)) {
        $error = 'لطفاً ایمیل خود را وارد کنید';
    } else {
        // بررسی وجود کاربر با این ایمیل
        $stmt = $pdo->prepare("SELECT id, username FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user) {
            // ایجاد توکن بازیابی
            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', time() + 3600); // 1 ساعت اعتبار
            
            $stmt = $pdo->prepare("
                INSERT INTO password_resets (user_id, token, expires_at) 
                VALUES (?, ?, ?)
                ON DUPLICATE KEY UPDATE token = ?, expires_at = ?
            ");
            $stmt->execute([$user['id'], $token, $expires, $token, $expires]);
            
            // در اینجا باید ایمیل حاوی لینک بازیابی ارسال شود
            $resetLink = "https://yourdomain.com/support/reset-password.php?token=$token";
            
            // این بخش در عمل باید با یک سرویس ارسال ایمیل جایگزین شود
            $success = "لینک بازیابی رمز عبور به ایمیل شما ارسال شد. (در محیط آزمایشی: <a href='$resetLink'>$resetLink</a>)";
        } else {
            $error = 'ایمیل وارد شده در سیستم وجود ندارد';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بازیابی رمز عبور</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <h1><i class="fas fa-key"></i> بازیابی رمز عبور</h1>
            
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php else: ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> ایمیل</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-paper-plane"></i> ارسال لینک بازیابی
                    </button>
                </form>
                
                <div class="auth-links">
                    <a href="login.php">بازگشت به صفحه ورود</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>