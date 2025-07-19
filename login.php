<?php
require_once "auth/config.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user;
        header("Location: panel.php");
        exit;
    } else {
        echo "ورود نامعتبر!";
    }
}
?>
<!-- فرم ورود ساده -->
<form method="post" action="">
  <input type="email" name="email" placeholder="ایمیل" required>
  <input type="password" name="password" placeholder="رمز عبور" required>
  <button type="submit">ورود</button>
</form>
