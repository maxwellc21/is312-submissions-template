<?php
// page placeholder

declare(strict_types=1);

require_once __DIR__ . '/../app/lib/db.php';
require_once __DIR__ . '/../app/lib/auth.php';
require_once __DIR__ . '/../app/lib/csrf.php';

start_session();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!csrf_validate($_POST["csrf"] ?? "")) {
    $errors[] = "Invalid CSRF token.";
  } else {
    $name = trim($_POST["full_name"] ?? "");
    $email = strtolower(trim($_POST["email"] ?? ""));
    $pass = $_POST["password"] ?? "";

    if ($name === "" || $email === "" || $pass === "") $errors[] = "All fields are required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email.";

    if (!$errors) {
      try {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = db()->prepare("INSERT INTO users (full_name, email, password_hash) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hash]);
        $userId = (int)db()->lastInsertId();

        $accNo = "ACC-" . str_pad((string)$userId, 6, "0", STR_PAD_LEFT);
        db()->prepare("INSERT INTO accounts (user_id, account_number, balance) VALUES (?, ?, ?)")
          ->execute([$userId, $accNo, 1000.00]);

        login_user($userId);
        header("Location: dashboard.php");
        exit;
      } catch (Throwable $e) {
        $errors[] = "Registration failed. Email may already exist.";
      }
    }
  }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Register</title></head>
<body>
<h2>Register</h2>
<?php foreach ($errors as $e): ?><p style="color:red;"><?php echo htmlspecialchars($e); ?></p><?php endforeach; ?>

<form method="post">
  <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token()); ?>">
  <label>Full Name</label><br><input name="full_name" required><br><br>
  <label>Email</label><br><input name="email" type="email" required><br><br>
  <label>Password</label><br><input name="password" type="password" required><br><br>
  <button type="submit">Create Account</button>
</form>

<p><a href="login.php">Login</a> | <a href="index.php">Home</a></p>
</body>
</html>
