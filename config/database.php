<?php
/**
 * Database Configuration
 * Gretex Share Broking Limited
 */

if (!function_exists('db_env')) {
    function db_env(string $key, string $default = ''): string
    {
        $value = getenv($key);
        if ($value === false || $value === null || $value === '') {
            return $default;
        }
        return (string) $value;
    }
}

// Database credentials
define('DB_HOST', db_env('DB_HOST', 'localhost'));
define('DB_USER', db_env('DB_USER', 'root'));
define('DB_PASS', db_env('DB_PASS', ''));
define('DB_NAME', db_env('DB_NAME', 'gretex_broking'));

// Create connection
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if ($conn->connect_error) {
        error_log('Database connection failed.');
        throw new RuntimeException('Database connection unavailable.');
    }
    
    // Set charset to utf8mb4 for proper character support
    $conn->set_charset("utf8mb4");
    
    return $conn;
}

// Close connection
function closeDBConnection($conn) {
    if ($conn) {
        $conn->close();
    }
}
?>
