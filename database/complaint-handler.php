<?php
session_start();
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/complaint_errors.log');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Not logged in."]);
    exit;
}

// Database connection
require_once(__DIR__ . '/database-connect.php');

// Get input data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Validate input
if (!$data || !isset($data['about']) || !isset($data['message'])) {
    echo json_encode(["status" => "error", "message" => "Invalid input."]);
    exit;
}

$about = trim($data['about']);
$message = trim($data['message']);
$userID = $_SESSION['user_id'];

try {
    // Insert complaint into database (you'll need to create a complaints table)
    $query = "INSERT INTO complaints (userID, about, message, status, createdAt) 
              VALUES (:userID, :about, :message, 'pending', NOW())";
    
    $stmt = $connection->prepare($query);
    $stmt->execute([
        ':userID' => $userID,
        ':about' => $about,
        ':message' => $message
    ]);
    
    $complaintID = $connection->lastInsertId();
    
    echo json_encode([
        "status" => "success",
        "message" => "Complaint submitted successfully.",
        "complaintID" => $complaintID
    ]);
    
} catch (Exception $e) {
    error_log("Complaint submission error: " . $e->getMessage());
    echo json_encode(["status" => "error", "message" => "Failed to save complaint."]);
}
?>