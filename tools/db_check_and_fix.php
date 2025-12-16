<?php
// DB check and repair helper for SLiMS
// Usage (browser): http://localhost/.../tools/db_check_and_fix.php
// To reset admin password (use only once): ?reset=1&user=admin

require __DIR__ . '/../sysconfig.inc.php';

header('Content-Type: text/plain; charset=utf-8');

try {
    $db = \SLiMS\DB::getInstance('mysqli');
} catch (Exception $e) {
    echo "ERROR: Cannot get DB instance: " . $e->getMessage() . "\n";
    exit(1);
}

echo "Connected to database profile OK\n";

// show current database name (best effort)
try {
    $res = $db->query('SELECT DATABASE() AS dbname')->first();
    echo "Database in use: " . ($res['dbname'] ?? '(unknown)') . "\n\n";
} catch (Exception $e) {
    echo "Warning: cannot read current database: " . $e->getMessage() . "\n\n";
}

// Check user table exists
try {
    $tbl = $db->query("SHOW TABLES LIKE 'user'");
    if ($tbl->count() < 1) {
        echo "ERROR: `user` table not found. Check your database or table prefix.\n";
        exit(1);
    }
    echo "`user` table found.\n";
} catch (Exception $e) {
    echo "ERROR: Could not check tables: " . $e->getMessage() . "\n";
    exit(1);
}

// list admin users (uid, username, realname)
try {
    $users = $db->query('SELECT user_id, username, realname, passwd FROM `user` ORDER BY user_id ASC');
    echo "\nUsers found: " . $users->count() . "\n";
    foreach ($users as $u) {
        echo sprintf("uid=%s\tusername=%s\trealname=%s\tpasswd_len=%d\n", $u['user_id'], $u['username'], $u['realname'], strlen($u['passwd']));
    }
} catch (Exception $e) {
    echo "ERROR: cannot list users: " . $e->getMessage() . "\n";
    exit(1);
}

// If requested, perform password reset for a username
if (isset($_GET['reset']) && $_GET['reset'] == '1' && !empty($_GET['user'])) {
    $target = trim($_GET['user']);
    // generate a new strong password
    $newpass = bin2hex(random_bytes(6)) . 'A!1'; // 14+ chars
    $hash = password_hash($newpass, PASSWORD_BCRYPT);

    try {
        $q = $db->query('UPDATE `user` SET `passwd` = ?, `last_update` = CURRENT_DATE() WHERE `username` = ?', [$hash, $target]);
        if ($q->isAffected()) {
            echo "\nPassword for user '{$target}' has been reset.\n";
            echo "NEW PASSWORD: {$newpass}\n";
            echo "Please login immediately and change the password.\n";
        } else {
            echo "\nNo rows affected. Either user '{$target}' not found or update failed.\n";
            echo "Error: " . $q->getError() . "\n";
        }
    } catch (Exception $e) {
        echo "\nERROR: failed to update password: " . $e->getMessage() . "\n";
    }
}

echo "\nDone. Remove this file after use.\n";
