<?php
// require_login.php
// Redirect if user not logged in

declare(strict_types=1);

require_once __DIR__ . '/../lib/auth.php';
require_login();
