<?php
try {
    $pdo = new PDO('sqlite:' . __DIR__ . '/database.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);$pdo->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT, username TEXT NOT NULL UNIQUE, email TEXT NOT NULL)");
    $pdo->exec("INSERT OR IGNORE INTO users (username, email) VALUES ('admin', 'admin@example.com'), ('alex', 'alex@example.com'), ('ivan', 'ivan@example.com')");
} catch (PDOException $e) {
    echo json_encode(['error' => 'Ошибка базы данных: ' . $e->getMessage()]);
    exit;
}
