<?php
// Simple test script to check database connection and users
require_once 'vendor/autoload.php';

use Config\Database;

try {
    $db = Database::connect();
    echo "Database connection successful!\n";
    
    // Check if users table exists
    $query = $db->query("SELECT COUNT(*) as count FROM users");
    $result = $query->getRow();
    echo "Users in database: " . $result->count . "\n";
    
    // Show first few users (without passwords)
    $query = $db->query("SELECT id, email, name, org_id, role_id FROM users LIMIT 3");
    $users = $query->getResult();
    
    echo "Sample users:\n";
    foreach ($users as $user) {
        echo "ID: {$user->id}, Email: {$user->email}, Name: {$user->name}\n";
    }
    
} catch (\Exception $e) {
    echo "Database error: " . $e->getMessage() . "\n";
}
