
CREATE TABLE IF NOT EXISTS pending_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    telegram VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
