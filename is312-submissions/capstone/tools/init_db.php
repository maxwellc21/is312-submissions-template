<?php
// init_db.php
// Initialize SQLite database using schema.sqlite.sql
declare(strict_types=1);

require_once __DIR__ . '/../src/app/lib/db.php';

$sql = file_get_contents(__DIR__ . '/../database/schema.sqlite.sql');
db()->exec($sql);

echo "Database initialised successfully.\n";

