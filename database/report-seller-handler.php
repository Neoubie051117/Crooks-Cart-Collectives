<?php
session_start();
header('Content-Type: application/json');

// Use the main error log
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Not logged in."]);
    exit;
}

require_once(__DIR__ . '/database-connect.php');

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (!$data || !isset($data['seller_id']) || !isset($data['reason']) || !isset($data['details'])) {
    echo json_encode(["status" => "error", "message" => "Invalid input."]);
    exit;
}

$seller_id = intval($data['seller_id']);
$reason = trim($data['reason']);
$details = trim($data['details']);
$reporter_id = $_SESSION['user_id'];

try {
    // Check if seller exists and is verified
    $checkSeller = $connection->prepare("SELECT seller_id FROM sellers WHERE seller_id = ? AND is_verified = 1");
    $checkSeller->execute([$seller_id]);
    
    if (!$checkSeller->fetch()) {
        echo json_encode(["status" => "error", "message" => "Seller not found or not verified."]);
        exit;
    }
    
    // Insert report
    $query = "INSERT INTO seller_reports (reporter_id, seller_id, reason, details, status, created_at) 
              VALUES (:reporter_id, :seller_id, :reason, :details, 'pending', NOW())";
    
    $stmt = $connection->prepare($query);
    $stmt->execute([
        ':reporter_id' => $reporter_id,
        ':seller_id' => $seller_id,
        ':reason' => $reason,
        ':details' => $details
    ]);
    
    $report_id = $connection->lastInsertId();
    
    echo json_encode([
        "status" => "success",
        "message" => "Report submitted successfully. An administrator will review it.",
        "report_id" => $report_id
    ]);
    
} catch (Exception $e) {
    error_log("Report submission error: " . $e->getMessage());
    echo json_encode(["status" => "error", "message" => "Failed to save report."]);
}
?>