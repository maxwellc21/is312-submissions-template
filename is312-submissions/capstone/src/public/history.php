<?php
// page placeholder
declare(strict_types=1);

require_once __DIR__ . '/../app/middleware/require_login.php';
require_once __DIR__ . '/../app/lib/db.php';
require_once __DIR__ . '/../app/lib/auth.php';

$userId = current_user_id();

$stmt = db()->prepare(
  "SELECT t.id, t.amount, t.created_at,
          fa.account_number AS from_acc,
          ta.account_number AS to_acc
   FROM transactions t
   JOIN accounts fa ON fa.id = t.from_account_id
   JOIN accounts ta ON ta.id = t.to_account_id
   WHERE t.created_by_user_id = ?
   ORDER BY t.created_at DESC
   LIMIT 50"
);
$stmt->execute([$userId]);
$tx = $stmt->fetchAll();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>History</title></head>
<body>
<h2>Transaction History</h2>
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>From</th><th>To</th><th>Amount</th><th>Date</th></tr>
  <?php foreach ($tx as $t): ?>
    <tr>
      <td><?php echo (int)$t["id"]; ?></td>
      <td><?php echo htmlspecialchars($t["from_acc"]); ?></td>
      <td><?php echo htmlspecialchars($t["to_acc"]); ?></td>
      <td><?php echo number_format((float)$t["amount"], 2); ?></td>
      <td><?php echo htmlspecialchars($t["created_at"]); ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<p><a href="dashboard.php">Back</a></p>
</body>
</html>
