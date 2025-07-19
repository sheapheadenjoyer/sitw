<?php
try {
    $db = new PDO('sqlite:users.db');
    $passwordHash = password_hash('123456', PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (email, password, username, is_verified) VALUES (?, ?, ?, ?)");
    $stmt->execute(['test@example.com', $passwordHash, 'تست', 1]);
    echo "✅ کاربر تست با ایمیل test@example.com و رمز 123456 با موفقیت ساخته شد.";
} catch (Exception $e) {
    echo "❌ خطا: " . $e->getMessage();
}
?>