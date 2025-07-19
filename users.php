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
require __DIR__.'/../includes/config.php';
require __DIR__.'/../includes/auth.php';
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// فقط ادمین‌ها می‌توانند به این API دسترسی داشته باشند
if (!isAdminLoggedIn()) {
    http_response_code(403);
    echo json_encode(['error' => 'دسترسی غیرمجاز']);
    exit;
}

$userId = $_GET['id'] ?? null;

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($userId) {
            $stmt = $pdo->prepare("SELECT id, username, email, created_at FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $user = $stmt->fetch();
            
            if ($user) {
                echo json_encode($user);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'کاربر یافت نشد']);
            }
        } else {
            $stmt = $pdo->query("SELECT id, username, email, created_at FROM users ORDER BY created_at DESC");
            echo json_encode($stmt->fetchAll());
        }
        break;
        
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        
        // اعتبارسنجی داده‌ها
        if (empty($data['username']) || empty($data['email']) || empty($data['password'])) {
            http_response_code(400);
            echo json_encode(['error' => 'داده‌های ناقص']);
            exit;
        }
        
        // بررسی وجود کاربر با همین نام کاربری یا ایمیل
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$data['username'], $data['email']]);
        
        if ($stmt->fetch()) {
            http_response_code(409);
            echo json_encode(['error' => 'نام کاربری یا ایمیل تکراری']);
            exit;
        }
        
        // ایجاد کاربر جدید
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$data['username'], $data['email'], $hashedPassword]);
        
        echo json_encode(['id' => $pdo->lastInsertId()]);
        break;
        
    case 'PUT':
        if (!$userId) {
            http_response_code(400);
            echo json_encode(['error' => 'شناسه کاربر ضروری است']);
            exit;
        }
        
        $data = json_decode(file_get_contents('php://input'), true);
        
        // به روزرسانی اطلاعات کاربر
        $updateFields = [];
        $params = [];
        
        if (!empty($data['username'])) {
            $updateFields[] = "username = ?";
            $params[] = $data['username'];
        }
        
        if (!empty($data['email'])) {
            $updateFields[] = "email = ?";
            $params[] = $data['email'];
        }
        
        if (!empty($data['password'])) {
            $updateFields[] = "password = ?";
            $params[] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        if (empty($updateFields)) {
            http_response_code(400);
            echo json_encode(['error' => 'هیچ داده‌ای برای به روزرسانی ارسال نشده']);
            exit;
        }
        
        $params[] = $userId;
        $query = "UPDATE users SET " . implode(', ', $updateFields) . " WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        
        echo json_encode(['success' => true]);
        break;
        
    case 'DELETE':
        if (!$userId) {
            http_response_code(400);
            echo json_encode(['error' => 'شناسه کاربر ضروری است']);
            exit;
        }
        
        // حذف کاربر
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        
        echo json_encode(['success' => $stmt->rowCount() > 0]);
        break;
        
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
}
?>