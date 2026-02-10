<?php
// page placeholder

declare(strict_types=1);

require_once __DIR__ . '/../app/middleware/require_login.php';
require_once __DIR__ . '/../app/lib/db.php';
require_once __DIR__ . '/../app/lib/auth.php';

$userId = current_user_id();

$u = db()->prepare("SELECT full_name, email FROM users WHERE id = ?");
$u->execute([$userId]);
$user = $u->fetch();

$a = db()->prepare("SELECT id, account_number, balance FROM accounts WHERE user_id = ?");
$a->execute([$userId]);
$accounts = $a->fetchAll();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Dashboard</title></head>
<body>
<h2>Dashboard</h2>
<p>Welcome, <b><?php echo htmlspecialchars($user["full_name"] ?? ""); ?></b></p>

<h3>Your Accounts</h3>
<ul>
<?php foreach ($accounts as $acc): ?>
  <li><?php echo htmlspecialchars($acc["account_number"]); ?> — Balance: <?php echo number_format((float)$acc["balance"], 2); ?></li>
<?php endforeach; ?>
</ul>

<p><a href="transfer.php">Transfer</a> | <a href="history.php">History</a> | <a href="logout.php">Logout</a></p>
</body>
</html>
