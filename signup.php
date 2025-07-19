<?php
require_once "auth/config.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $password])) {
        header("Location: login.php?success=1");
        exit;
    } else {
        echo "خطا در ثبت‌نام!";
    }
}
?>
<!-- فرم ثبت‌نام ساده -->
<form method="post" action="">
  <input type="text" name="username" placeholder="نام کاربری" required>
  <input type="email" name="email" placeholder="ایمیل" required>
  <input type="password" name="password" placeholder="رمز عبور" required>
  <button type="submit">ثبت‌نام</button>
</form>
