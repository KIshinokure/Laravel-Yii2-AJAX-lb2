<?php
header('Content-Type: application/json');
require_once 'db.php';

$username = isset($_GET['username']) ? trim($_GET['username']) : '';

if (empty($username)) {
    echo json_encode(['status' => 'empty', 'message' => 'Введите логин']);
    exit;
}

$stmt =$pdo->prepare("SELECT id FROM users WHERE username = :username");
$stmt->execute([':username' =>$username]);

if ($stmt->fetch()) {
    echo json_encode(['status' => 'exists', 'message' => 'Логин уже занят']);
} else {
    echo json_encode(['status' => 'available', 'message' => 'Логин свободен']);
}
