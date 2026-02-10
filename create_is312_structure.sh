#!/usr/bin/env bash
set -e

ROOT="is312-submissions"

echo "Creating $ROOT structure..."

# -------------------------
# Labs
# -------------------------
mkdir -p \
  "$ROOT/labs/lab-01/submission" \
  "$ROOT/labs/lab-02/submission" \
  "$ROOT/labs/lab-03/submission" \
  "$ROOT/labs/lab-04/submission"

# Keep empty submission folders in git
touch \
  "$ROOT/labs/lab-01/submission/.gitkeep" \
  "$ROOT/labs/lab-02/submission/.gitkeep" \
  "$ROOT/labs/lab-03/submission/.gitkeep" \
  "$ROOT/labs/lab-04/submission/.gitkeep"

# -------------------------
# Capstone docs
# -------------------------
mkdir -p \
  "$ROOT/capstone/docs/PartA_DesignDocument" \
  "$ROOT/capstone/docs/PartB_Presentation" \
  "$ROOT/capstone/docs/PartC_FinalSubmission"

touch \
  "$ROOT/capstone/docs/PartA_DesignDocument/.gitkeep" \
  "$ROOT/capstone/docs/PartB_Presentation/.gitkeep" \
  "$ROOT/capstone/docs/PartC_FinalSubmission/.gitkeep"

# -------------------------
# Capstone database
# -------------------------
mkdir -p "$ROOT/capstone/database"

cat > "$ROOT/capstone/database/schema.sqlite.sql" <<'EOF'
-- SQLite schema for IS312 Capstone
-- Tables go here
EOF

# app.db is generated later (DO NOT COMMIT)
touch "$ROOT/capstone/database/app.db"

# -------------------------
# Capstone tools
# -------------------------
mkdir -p "$ROOT/capstone/tools"

cat > "$ROOT/capstone/tools/init_db.php" <<'EOF'
<?php
// init_db.php
// Initialize SQLite database using schema.sqlite.sql
echo "Database initialized\n";
EOF

# -------------------------
# Application source
# -------------------------
mkdir -p \
  "$ROOT/capstone/src/app/lib" \
  "$ROOT/capstone/src/app/middleware" \
  "$ROOT/capstone/src/public"

# Lib files
cat > "$ROOT/capstone/src/app/lib/db.php" <<'EOF'
<?php
// db.php - database connection
EOF

cat > "$ROOT/capstone/src/app/lib/auth.php" <<'EOF'
<?php
// auth.php - authentication helpers
EOF

cat > "$ROOT/capstone/src/app/lib/csrf.php" <<'EOF'
<?php
// csrf.php - CSRF protection
EOF

# Middleware
cat > "$ROOT/capstone/src/app/middleware/require_login.php" <<'EOF'
<?php
// require_login.php
// Redirect if user not logged in
EOF

# Public pages
for page in index register login logout dashboard transfer history; do
  cat > "$ROOT/capstone/src/public/$page.php" <<'EOF'
<?php
// page placeholder
EOF
done

echo "✅ IS312 submission structure created successfully."
