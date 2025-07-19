<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    if ($code == $_SESSION['expected_code']) {
        $db = new PDO('sqlite:users.db');
        $stmt = $db->prepare("UPDATE users SET is_verified = 1 WHERE email = ?");
        $stmt->execute([$_SESSION['pending_email']]);

        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$_SESSION['pending_email']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user'] = $user;
        unset($_SESSION['pending_email'], $_SESSION['expected_code']);

        header('Location: index.php');
        exit;
    } else {
        echo "کد وارد شده اشتباه است.";
    }
}
?>
<form method="POST">
  <input name="code" placeholder="کد تایید" required><br>
  <button type="submit">تایید</button>
</form>
