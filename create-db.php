
<?php
// ایجاد دیتابیس SQLite و جدول orders
$db = new SQLite3('orders.db');

$db->exec("CREATE TABLE IF NOT EXISTS orders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    info TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

echo "✅ دیتابیس و جدول با موفقیت ساخته شدند.";
?>
