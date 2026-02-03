<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $connection = new PDO('mysql:host=localhost;dbname=barangay_system', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['validate'])) {
        handleValidationRequest($connection);
    } else {
        handleFormSubmission($connection);
    }
    exit;
}

function handleValidationRequest($connection) {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = trim($data['email'] ?? '');
    $username = trim($data['username'] ?? '');

    $response = [
        'emailExists' => false,
        'usernameExists' => false
    ];

    if ($email) {
        $stmt = $connection->prepare("SELECT COUNT(*) FROM residents WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $response['emailExists'] = $stmt->fetchColumn() > 0;
    }

    if ($username) {
        $stmt = $connection->prepare("SELECT COUNT(*) FROM residents WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $response['usernameExists'] = $stmt->fetchColumn() > 0;
    }

    echo json_encode($response);
}

function handleFormSubmission($connection) {
    $input = [];
    foreach ($_POST as $key => $value) {
        $input[$key] = trim($value);
    }

    $errors = [];

    if (empty($input['password'])) {
        $errors['password'] = 'Password is required';
    } elseif ($input['password'] !== $input['confirmPassword']) {
        $errors['confirmPassword'] = 'Passwords do not match';
    }

    if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    $stmtEmail = $connection->prepare("SELECT COUNT(*) FROM residents WHERE email = ?");
    $stmtEmail->execute([$input['email']]);
    $emailExists = $stmtEmail->fetchColumn() > 0;

    $stmtUsername = $connection->prepare("SELECT COUNT(*) FROM residents WHERE username = ?");
    $stmtUsername->execute([$input['username']]);
    $usernameExists = $stmtUsername->fetchColumn() > 0;

    if ($emailExists && $usernameExists) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email duplicate-username']);
        exit;
    } elseif ($emailExists) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-email']);
        exit;
    } elseif ($usernameExists) {
        echo json_encode(['status' => 'error', 'message' => 'duplicate-username']);
        exit;
    }

    $fileErrors = validateUploadedFiles();
    if (!empty($fileErrors)) {
        $errors = array_merge($errors, $fileErrors);
    }

    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'errors' => $errors]);
        exit;
    }

    // Insert temporary user to get ID
    $passwordHash = $input['password']; // Plaintext (bad, fix later if needed)

    $query = "INSERT INTO residents (
        firstName, middleName, lastName, birthdate, gender, contact,
        email, username, passwordHash, houseStreet, barangay, residentType,
        civilStatus, nationality, proofOfResidencyPath, validIDPath
    ) VALUES (
        :firstName, :middleName, :lastName, :birthdate, :gender, :contact,
        :email, :username, :passwordHash, :houseStreet, :barangay, :residentType,
        :civilStatus, :nationality, '', ''
    )";

    $params = [
        ':firstName' => $input['firstName'],
        ':middleName' => $input['middleName'] ?? null,
        ':lastName' => $input['lastName'],
        ':birthdate' => $input['birthdate'],
        ':gender' => $input['gender'],
        ':contact' => $input['contact'],
        ':email' => $input['email'],
        ':username' => $input['username'],
        ':passwordHash' => $passwordHash,
        ':houseStreet' => $input['houseStreet'],
        ':barangay' => $input['barangay'],
        ':residentType' => $input['residentType'],
        ':civilStatus' => $input['civilStatus'],
        ':nationality' => $input['nationality']
    ];

    try {
        $stmt = $connection->prepare($query);
        $stmt->execute($params);
        $residentID = $connection->lastInsertId();

        // Create resident directory and credentials subfolder
        $basePath = realpath(__DIR__ . '/../') . '/database/user-data/';
        $residentDir = $basePath . $residentID;
        $credentialsDir = $residentDir . '/credentials';

        // Clean up existing directory if it exists
        if (is_dir($residentDir)) {
            removeDirectory($residentDir);
        }

        // Create fresh directory
        if (!mkdir($credentialsDir, 0755, true)) {
            throw new Exception("Failed to create directory structure");
        }

        $proofPath = saveUploadedFile('imageFormalPictureUpload', $credentialsDir, "formal_", $residentID);
        $validIDPath = saveUploadedFile('imageResidencyProofUpload', $credentialsDir, "valid_", $residentID);

        if (!$proofPath || !$validIDPath) {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
            exit;
        }

        // Update paths
        $updateQuery = "UPDATE residents SET proofOfResidencyPath = :proof, validIDPath = :valid WHERE residentID = :id";
        $update = $connection->prepare($updateQuery);
        $update->execute([
            ':proof' => $proofPath,
            ':valid' => $validIDPath,
            ':id' => $residentID
        ]);

        echo json_encode(['status' => 'success']);

    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Internal server error: ' . $e->getMessage()]);
    }
}

function validateUploadedFiles() {
    $errors = [];
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxSize = 2 * 1024 * 1024;

    foreach (['imageFormalPictureUpload', 'imageResidencyProofUpload'] as $field) {
        if (empty($_FILES[$field]['name'])) {
            $errors[$field] = 'File required';
            continue;
        }

        $file = $_FILES[$field];
        if (is_uploaded_file($file['tmp_name'])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);
        } else {
            $errors[$field] = 'Upload failed or invalid file.';
            continue;
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[$field] = 'Upload error: ' . $file['error'];
        } elseif (!in_array($mime, $allowedTypes)) {
            $errors[$field] = 'Invalid file type';
        } elseif ($file['size'] > $maxSize) {
            $errors[$field] = 'File too large (max 2MB)';
        }
    }

    return $errors;
}

function saveUploadedFile($field, $targetDir, $prefix, $residentID) {
    if (!isset($_FILES[$field]) || !is_uploaded_file($_FILES[$field]['tmp_name'])) return null;

    $ext = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
    $ext = preg_replace("/[^a-z0-9]/", "", $ext);
    $filename = $prefix . uniqid() . '.' . $ext;
    $relativePath = 'database/user-data/' . $residentID . '/credentials/' . $filename;
    $fullPath = $targetDir . '/' . $filename;

    if (move_uploaded_file($_FILES[$field]['tmp_name'], $fullPath)) {
        return $relativePath; // stored in DB
    }

    return null;
}

// Recursively remove directory and its contents
function removeDirectory($dir) {
    if (!is_dir($dir)) return;
    
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        $path = "$dir/$file";
        is_dir($path) ? removeDirectory($path) : unlink($path);
    }
    rmdir($dir);
}