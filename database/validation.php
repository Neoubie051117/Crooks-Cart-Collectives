<?php
// Validation functions for authentication

function validateSignUpInput($data) {
    $errors = [];
    
    // Required fields
    $required = ['first_name', 'last_name', 'email', 'username', 'password', 
                 'confirm_password', 'birthdate', 'gender', 'contact_number', 'address'];
    
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
    $phone = preg_replace('/[^0-9+]/', '', $data['contact_number']);
    if (!preg_match('/^(09|\+639|639)\d{9}$/', $phone) && !preg_match('/^0\d{10}$/', $phone)) {
        $errors['contact_number'] = 'Invalid Philippine mobile number';
    }
    
    // Age validation
    $birthdate = new DateTime($data['birthdate']);
    $today = new DateTime();
    $age = $birthdate->diff($today)->y;
    
    if ($age < 13) {
        $errors['birthdate'] = 'You must be at least 13 years old';
    } elseif ($age > 120) {
        $errors['birthdate'] = 'Invalid birthdate';
    }
    
    // Name validation
    if (!preg_match('/^[a-zA-Z\s\-\']+$/', trim($data['first_name']))) {
        $errors['first_name'] = 'First name can only contain letters, spaces, hyphens';
    }
    
    if (!empty($data['last_name']) && !preg_match('/^[a-zA-Z\s\-\']+$/', trim($data['last_name']))) {
        $errors['last_name'] = 'Last name can only contain letters, spaces, hyphens';
    }
    
    // Address validation
    if (strlen(trim($data['address'])) < 10) {
        $errors['address'] = 'Address must be at least 10 characters';
    }
    
    return ['valid' => empty($errors), 'errors' => $errors];
}

function validateSignInInput($data) {
    $errors = [];
    
    $identifier = trim($data['identifier'] ?? $data['usernameOrEmail'] ?? '');
    $password = $data['password'] ?? $data['loginPassword'] ?? '';
    
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

function checkDuplicates($connection, $email, $username, $contact) {
    $duplicates = [];
    
    // Check email
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'email';
    }
    
    // Check username
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'username';
    }
    
    // Check contact
    $normalized = normalizePhoneNumber($contact);
    $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE contact_number = ?");
    $stmt->execute([$normalized]);
    if ($stmt->fetchColumn() > 0) {
        $duplicates[] = 'contact';
    }
    
    return $duplicates;
}

function normalizePhoneNumber($phone) {
    $phone = preg_replace('/[^0-9+]/', '', $phone);
    
    if (preg_match('/^09(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    } elseif (preg_match('/^639(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    } elseif (preg_match('/^\+63(\d{9})$/', $phone, $matches)) {
        return '+63' . $matches[1];
    }
    
    return $phone;
}

function logError($message, $context = []) {
    $logEntry = date('Y-m-d H:i:s') . ' - ' . $message;
    if (!empty($context)) {
        $logEntry .= ' - Context: ' . json_encode($context);
    }
    error_log($logEntry . PHP_EOL, 3, __DIR__ . '/error_log.txt');
}
?>