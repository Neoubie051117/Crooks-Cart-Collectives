<?php
// Validation functions for admin authentication

function validateAdminSignUpInput($data) {
    $errors = [];
    
    // Required fields
    $required = ['first_name', 'last_name', 'email', 'contact_number', 'username', 'password', 'confirm_password'];
    
    foreach ($required as $field) {
        if (empty(trim($data[$field] ?? ''))) {
            $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
        }
    }
    
    if (!empty($errors)) {
        return ['valid' => false, 'errors' => $errors];
    }
    
    // Email validation
    $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    
    // Password validation
    $password = $data['password'];
    if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    } elseif (strlen($password) > 16) {
        $errors['password'] = 'Password must not exceed 16 characters';
    }
    
    // Password match
    if ($password !== $data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    }
    
    // Username validation
    $username = trim($data['username']);
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $errors['username'] = 'Username must be 3-20 characters (letters, numbers, underscore)';
    }
    
    // Phone validation (Philippine format)
    $phone = preg_replace('/[^0-9]/', '', $data['contact_number']);
    if (!preg_match('/^09\d{9}$/', $phone)) {
        $errors['contact_number'] = 'Invalid Philippine mobile number (must start with 09 and be 11 digits)';
    }
    
    return ['valid' => empty($errors), 'errors' => $errors];
}

function validateAdminSignInInput($data) {
    $errors = [];
    
    $identifier = trim($data['identifier'] ?? '');
    $password = $data['password'] ?? '';
    
    if (empty($identifier)) {
        $errors['identifier'] = 'Email or username is required';
    }
    
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }
    
    return [
        'valid' => empty($errors),
        'errors' => $errors,
        'identifier' => $identifier,
        'password' => $password
    ];
}

function checkAdminDuplicates($connection, $email, $username, $contact) {
    $duplicates = [];
    
    // Check email
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'email';
    }
    
    // Check username
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'username';
    }
    
    // Check contact
    $normalized = normalizePhoneNumber($contact);
    $stmt = $connection->prepare("SELECT COUNT(*) FROM administrators WHERE contact_number = ?");
    $stmt->execute([$normalized]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'contact';
    }
    
    return $duplicates;
}

function normalizePhoneNumber($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    if (preg_match('/^09(\d{9})$/', $phone, $matches)) {
        return $phone;
    } elseif (preg_match('/^63(\d{9})$/', $phone, $matches)) {
        return '0' . $matches[1];
    } elseif (preg_match('/^\+63(\d{9})$/', $phone, $matches)) {
        return '0' . $matches[1];
    }
    
    return $phone;
}

function logAdminError($message, $context = []) {
    $logEntry = date('Y-m-d H:i:s') . ' - ' . $message;
    if (!empty($context)) {
        $logEntry .= ' - Context: ' . json_encode($context);
    }
    error_log($logEntry . PHP_EOL, 3, __DIR__ . '/error_log.txt');
}
?>