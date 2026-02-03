<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo json_encode(["status" => "error", "message" => "Not logged in."]);
    exit;
}

// Database connection
require_once(__DIR__ . '/database-connect.php');

// Get input data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Validate input
if (!$data || !isset($data['about']) || !isset($data['message']) || !isset($data['residentID'])) {
    echo json_encode(["status" => "error", "message" => "Invalid input."]);
    exit;
}

$about = trim($data['about']);
$message = trim($data['message']);
$residentID = (int)$data['residentID'];

// Validate resident ID
if ($residentID <= 0) {
    echo json_encode(["status" => "error", "message" => "Invalid resident ID."]);
    exit;
}

// Base directory where complaints are stored
$baseDir = realpath(__DIR__ . '/../database/user-data');
$folderPath = $baseDir . '/' . $residentID . '/complaint';

// Create directory if it doesn't exist
if (!is_dir($folderPath)) {
    if (!mkdir($folderPath, 0755, true)) {
        error_log("Failed to create directory: $folderPath");
        echo json_encode(["status" => "error", "message" => "Failed to create directory."]);
        exit;
    }
}

// Create unique file name using date and time
$timestamp = date('m-d-Y_H-i-s');
$fileName = "{$residentID}_{$timestamp}.json";
$filePath = $folderPath . '/' . $fileName;

// Complaint content
$complaintData = [
    "residentID" => $residentID,
    "about" => $about,
    "message" => $message,
    "submittedAt" => date("Y-m-d H:i:s")
];

// Save complaint as JSON file
if (file_put_contents($filePath, json_encode($complaintData, JSON_PRETTY_PRINT))) {
    echo json_encode(["status" => "success"]);
} else {
    error_log("Failed to write to file: $filePath");
    echo json_encode(["status" => "error", "message" => "Failed to save complaint."]);
}