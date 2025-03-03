<?php
session_start();
header('Content-Type: application/json'); // Ensure JSON response

// Mock user data (Replace with a database query)
$users = [
    "iandavelemera" => password_hash("dave142002", PASSWORD_DEFAULT), // Hashed password
];

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true) ?? $_POST;

// Debugging: Log received data
error_log("Received data: " . print_r($data, true));

if (!isset($data['username']) || !isset($data['password'])) {
    echo json_encode(["success" => false, "message" => "Missing login credentials"]);
    exit;
}

$username = trim($data['username']);
$password = trim($data['password']);

if (!isset($users[$username])) {
    echo json_encode(["success" => false, "message" => "User not found"]);
    exit;
}

// Verify password
if (password_verify($password, $users[$username])) {
    $_SESSION['user'] = $username;
    
    // Send response with login status
    echo json_encode([
        "success" => true, 
        "message" => "Login successful! Reloading..."
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid username or password"]);
}
exit;
?>
