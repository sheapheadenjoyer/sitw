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
$token = $_GET['token'] ?? '';

// اعتبارسنجی توکن
if ($token) {
    $stmt = $pdo->prepare("
        SELECT u.id, u.username 
        FROM password_resets pr
        JOIN users u ON pr.user_id = u.id
        WHERE pr.token = ? AND pr.expires_at > NOW()
    ");
    $stmt->execute([$token]);
    $user = $stmt->fetch();
    
    if (!$user) {
        $error = 'لینک بازیابی نامعتبر یا منقضی شده است';
        $token = '';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $token) {
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    if (empty($password) || empty($confirmPassword)) {
        $error = 'لطفاً رمز عبور جدید را وارد کنید';
    } elseif ($password !== $confirmPassword) {
        $error = 'رمز عبور و تکرار آن مطابقت ندارند';
    } elseif (strlen($password) < 8) {
        $error = 'رمز عبور باید حداقل ۸ کاراکتر باشد';
    } else {
        // به روزرسانی رمز عبور
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        
        if ($stmt->execute([$hashedPassword, $user['id']])) {
            // حذف توکن استفاده شده
            $pdo->prepare("DELETE FROM password_resets WHERE token = ?")->execute([$token]);
            
            $success = 'رمز عبور با موفقیت تغییر یافت. اکنون می‌توانید وارد شوید.';
            header("Refresh: 3; url=login.php");
        } else {
            $error = 'خطا در تغییر رمز عبور. لطفاً مجدداً تلاش کنید.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تنظیم رمز عبور جدید</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <h1><i class="fas fa-key"></i> تنظیم رمز عبور جدید</h1>
            
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php elseif ($token): ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="password"><i class="fas fa-key"></i> رمز عبور جدید</label>
                        <input type="password" id="password" name="password" required minlength="8">
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password"><i class="fas fa-key"></i> تکرار رمز عبور</label>
                        <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
                    </div>
                    
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> ذخیره رمز عبور
                    </button>
                </form>
            <?php else: ?>
                <div class="alert alert-error">لینک بازیابی نامعتبر است</div>
                <div class="auth-links">
                    <a href="forgot-password.php">درخواست لینک جدید</a>
                    <a href="login.php">بازگشت به صفحه ورود</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>