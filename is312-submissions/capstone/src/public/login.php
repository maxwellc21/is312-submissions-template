<?php
// page placeholder
declare(strict_types=1);

require_once __DIR__ . '/../app/lib/auth.php';
require_once __DIR__ . '/../app/lib/csrf.php';

start_session();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!csrf_validate($_POST["csrf"] ?? "")) {
    $errors[] = "Invalid CSRF token.";
  } else {
    $email = strtolower(trim($_POST["email"] ?? ""));
    $pass = $_POST["password"] ?? "";

    $user = find_user_by_email($email);
    if (!$user || !password_verify($pass, $user["password_hash"])) {
      $errors[] = "Invalid email or password.";
    } else {
      login_user((int)$user["id"]);
      header("Location: dashboard.php");
      exit;
    }
  }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login</title></head>
<body>
<h2>Login</h2>
<?php foreach ($errors as $e): ?><p style="color:red;"><?php echo htmlspecialchars($e); ?></p><?php endforeach; ?>

<form method="post">
  <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token()); ?>">
  <label>Email</label><br><input name="email" type="email" required><br><br>
  <label>Password</label><br><input name="password" type="password" required><br><br>
  <button type="submit">Login</button>
</form>

<p><a href="register.php">Register</a> | <a href="index.php">Home</a></p>
</body>
</html>
