<?php
// page placeholder
declare(strict_types=1);

require_once __DIR__ . '/../app/middleware/require_login.php';
require_once __DIR__ . '/../app/lib/db.php';
require_once __DIR__ . '/../app/lib/auth.php';
require_once __DIR__ . '/../app/lib/csrf.php';

start_session();
$userId = current_user_id();

$accountsStmt = db()->prepare("SELECT id, account_number, balance FROM accounts WHERE user_id = ?");
$accountsStmt->execute([$userId]);
$accounts = $accountsStmt->fetchAll();

$errors = [];
$success = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!csrf_validate($_POST["csrf"] ?? "")) {
    $errors[] = "Invalid CSRF token.";
  } else {
    $fromId = (int)($_POST["from_account_id"] ?? 0);
    $toNumber = trim($_POST["to_account_number"] ?? "");
    $amount = (float)($_POST["amount"] ?? 0);

    if ($fromId <= 0 || $toNumber === "" || $amount <= 0) $errors[] = "All fields required and amount > 0.";

    if (!$errors) {
      $fromStmt = db()->prepare("SELECT id, balance FROM accounts WHERE id = ? AND user_id = ?");
      $fromStmt->execute([$fromId, $userId]);
      $from = $fromStmt->fetch();

      $toStmt = db()->prepare("SELECT id FROM accounts WHERE account_number = ?");
      $toStmt->execute([$toNumber]);
      $to = $toStmt->fetch();

      if (!$from) $errors[] = "Invalid source account.";
      if (!$to) $errors[] = "Destination account not found.";

      if (!$errors) {
        if ((float)$from["balance"] < $amount) {
          $errors[] = "Insufficient funds.";
        } else {
          db()->beginTransaction();
          try {
            db()->prepare("UPDATE accounts SET balance = balance - ? WHERE id = ?")->execute([$amount, $fromId]);
            db()->prepare("UPDATE accounts SET balance = balance + ? WHERE id = ?")->execute([$amount, (int)$to["id"]]);

            db()->prepare(
              "INSERT INTO transactions (from_account_id, to_account_id, amount, created_by_user_id)
               VALUES (?, ?, ?, ?)"
            )->execute([$fromId, (int)$to["id"], $amount, $userId]);

            db()->commit();
            $success = "Transfer completed.";
          } catch (Throwable $e) {
            db()->rollBack();
            $errors[] = "Transfer failed.";
          }
        }
      }
    }
  }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Transfer</title></head>
<body>
<h2>Transfer Funds</h2>
<?php if ($success): ?><p style="color:green;"><?php echo htmlspecialchars($success); ?></p><?php endif; ?>
<?php foreach ($errors as $e): ?><p style="color:red;"><?php echo htmlspecialchars($e); ?></p><?php endforeach; ?>

<form method="post">
  <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token()); ?>">

  <label>From Account</label><br>
  <select name="from_account_id" required>
    <?php foreach ($accounts as $acc): ?>
      <option value="<?php echo (int)$acc["id"]; ?>">
        <?php echo htmlspecialchars($acc["account_number"]); ?> (Bal: <?php echo number_format((float)$acc["balance"], 2); ?>)
      </option>
    <?php endforeach; ?>
  </select><br><br>

  <label>To Account Number</label><br>
  <input name="to_account_number" placeholder="ACC-000001" required><br><br>

  <label>Amount</label><br>
  <input name="amount" type="number" step="0.01" min="0.01" required><br><br>

  <button type="submit">Transfer</button>
</form>

<p><a href="dashboard.php">Back</a></p>
</body>
</html>
