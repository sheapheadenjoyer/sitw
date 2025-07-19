<?php
session_start();
require_once(__DIR__ . '/auth/config.php');
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $new_identifier = trim($_POST['identifier'] ?? '');
  $current_password = $_POST['current_password'] ?? '';
  $new_password = $_POST['new_password'] ?? '';
  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($current_password, $user['password'])) {
    if ($new_identifier !== '') {
      $stmt = $conn->prepare("UPDATE users SET identifier = ? WHERE id = ?");
      $stmt->bind_param("si", $new_identifier, $user_id);
      $stmt->execute();
      $_SESSION['identifier'] = $new_identifier;
    }

    if ($new_password !== '') {
      $hashed = password_hash($new_password, PASSWORD_BCRYPT);
      $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
      $stmt->bind_param("si", $hashed, $user_id);
      $stmt->execute();
    }

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
      $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
      $filename = "avatar_" . $user_id . "." . $ext;
      $filepath = "uploads/" . $filename;
      move_uploaded_file($_FILES['avatar']['tmp_name'], $filepath);
      $_SESSION['avatar'] = $filepath;
    }

    $success = "تغییرات با موفقیت اعمال شد.";
  } else {
    $error = "رمز فعلی اشتباه است.";
  }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>ویرایش حساب</title>
  <style>
    body { background: #111; color: #fff; font-family: sans-serif; padding: 20px; }
    form { background: #222; padding: 20px; border-radius: 10px; width: 350px; margin: auto; }
    input { width: 100%; padding: 10px; margin: 10px 0; background: #333; border: none; color: #fff; border-radius: 5px; }
    button { background: #2196f3; border: none; padding: 10px; width: 100%; color: white; border-radius: 5px; }
    p { text-align: center; }
  </style>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">
    <h2 style="text-align:center;">ویرایش حساب</h2>
    <input type="text" name="identifier" placeholder="نام کاربری جدید">
    <input type="password" name="current_password" placeholder="رمز فعلی" required>
    <input type="password" name="new_password" placeholder="رمز جدید (اختیاری)">
    <input type="file" name="avatar" accept="image/*">
    <button type="submit">ثبت تغییرات</button>
    <p><a href="panel.php" style="color: #00c8ff;">بازگشت به پنل</a></p>
    <?php
    if ($error) echo "<p style='color:red;'>$error</p>";
    if ($success) echo "<p style='color:lightgreen;'>$success</p>";
    ?>
  </form>
</body>
</html>
