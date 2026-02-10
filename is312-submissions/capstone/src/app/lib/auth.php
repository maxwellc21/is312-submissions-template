<?php
// auth.php - authentication helpers

declare(strict_types=1);

require_once __DIR__ . '/db.php';

function start_session(): void {
  if (session_status() === PHP_SESSION_NONE) session_start();
}

function current_user_id(): ?int {
  start_session();
  return isset($_SESSION["user_id"]) ? (int)$_SESSION["user_id"] : null;
}

function login_user(int $userId): void {
  start_session();
  $_SESSION["user_id"] = $userId;
}

function logout_user(): void {
  start_session();
  session_unset();
  session_destroy();
}

function require_login(): void {
  if (!current_user_id()) {
    header("Location: login.php");
    exit;
  }
}

function find_user_by_email(string $email): ?array {
  $stmt = db()->prepare("SELECT id, full_name, email, password_hash FROM users WHERE email = ?");
  $stmt->execute([$email]);
  $row = $stmt->fetch();
  return $row ?: null;
}
