<?php
// page placeholder

declare(strict_types=1);
require_once __DIR__ . '/../app/lib/auth.php';
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>IS312 Capstone</title></head>
<body>
  <h1>IS312 Capstone – Online Banking (SQLite)</h1>
  <ul>
    <?php if (current_user_id()): ?>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="transfer.php">Transfer</a></li>
      <li><a href="history.php">History</a></li>
      <li><a href="logout.php">Logout</a></li>
    <?php else: ?>
      <li><a href="register.php">Register</a></li>
      <li><a href="login.php">Login</a></li>
    <?php endif; ?>
  </ul>
</body>
</html>
