<?php
// Start session and include database connection
include_once('./header.php');
require_once('../database/database-connect.php');

// Modified session check to match old version's approach
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header('Location: sign-in.php');
    exit;
}

// Fetch resident data from database using username
try {
    $username = $_SESSION['username'];
    $stmt = $connection->prepare("SELECT * FROM residents WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $resident = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$resident) {
        throw new Exception("Resident not found");
    }
    
    // Store residentID in session for future use
    $_SESSION['residentID'] = $resident['residentID'];
    
    // Calculate age from birthdate
    $birthdate = new DateTime($resident['birthdate']);
    $today = new DateTime();
    $age = $today->diff($birthdate)->y;
    
    // Format registration date
    $dateRegistered = new DateTime($resident['dateRegistered']);
    $formattedDate = $dateRegistered->format('F j, Y');
    
    // Format resident ID
    $residentIDFormatted = 'BAR-' . date('Y', strtotime($resident['dateRegistered'])) . '-' . str_pad($resident['residentID'], 5, '0', STR_PAD_LEFT);
    
    // Get first name for welcome message
    $firstName = $resident['firstName'];
    
    // Generate initials for avatar
    $initials = substr($resident['firstName'], 0, 1) . substr($resident['lastName'], 0, 1);
    
    // Verification status
    $verificationStatus = $resident['isVerified'] ? 'Verified' : 'Pending';
    $statusClass = $resident['isVerified'] ? 'status-verified' : 'status-pending';
    
    // Handle profile image
    $proofPath = $resident['proofOfResidencyPath'];
    $relativeImagePath = '/Barangay-System/' . $proofPath;
    $absolutePath = realpath(__DIR__ . '/../' . $proofPath);
    
    if (!$proofPath || !file_exists($absolutePath)) {
        $relativeImagePath = '/Barangay-System/assets/images/default-profile.png';
    }
    
} catch (Exception $e) {
    // Handle errors gracefully
    error_log("Error fetching resident data: " . $e->getMessage());
    $errorMessage = "Unable to load profile data. Please try again later.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Profile - Barangay System</title>

    <!-- FIXED Styles -->
    <link rel="stylesheet" href="/Barangay-System/styles/header.css">
    <link rel="stylesheet" href="/Barangay-System/styles/home.css">
    <link rel="stylesheet" href="/Barangay-System/styles/footer.css">

    <!-- FIXED Scripts -->
    <script defer src="/Barangay-System/scripts/header.js"></script>
    <script defer src="/Barangay-System/scripts/home.js"></script>
</head>

<body>
    <!-- Main Content -->
    <div class="content">
        <?php if(isset($errorMessage)): ?>
        <div class="error-message">
            <?php echo $errorMessage; ?>
        </div>
        <?php else: ?>
        <!-- Profile Section -->
        <div class="profile-section">
            <img src="<?php echo $relativeImagePath; ?>" alt="Profile Picture" class="formal-picture">
            <div class="welcome-text">Welcome, <?php echo $firstName; ?>!</div>
            <div class="resident-id">Resident ID: <?php echo $residentIDFormatted; ?></div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <button class="action-button" id="complaintButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                    stroke="#3498db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path>
                    <path d="M8 7h6"></path>
                    <path d="M8 11h8"></path>
                </svg>
                <span>File Complaint</span>
            </button>
            <button class="action-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                    stroke="#2ecc71" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                <span>Request Document</span>
            </button>
            <button class="action-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                    stroke="#e74c3c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <span>View Events</span>
            </button>
        </div>

        <!-- Resident Information -->
        <section class="info-section">
            <h2 class="section-title">Personal Information</h2>
            <div class="info-grid">
                <!-- Column 1 -->
                <div class="info-column">
                    <div class="info-item">
                        <span class="info-label">Full Name:</span>
                        <span
                            class="info-value"><?php echo $resident['firstName'] . ' ' . $resident['middleName'] . ' ' . $resident['lastName']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Birthdate:</span>
                        <span
                            class="info-value"><?php echo date('F j, Y', strtotime($resident['birthdate'])) . ' (Age: ' . $age . ')'; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Gender:</span>
                        <span class="info-value"><?php echo $resident['gender']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Civil Status:</span>
                        <span class="info-value"><?php echo $resident['civilStatus']; ?></span>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="info-column">
                    <div class="info-item">
                        <span class="info-label">Contact Number:</span>
                        <span class="info-value"><?php echo $resident['contact']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><?php echo $resident['email']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Nationality:</span>
                        <span class="info-value"><?php echo $resident['nationality']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Resident Type:</span>
                        <span class="info-value"><?php echo $resident['residentType']; ?></span>
                    </div>
                </div>

                <!-- Column 3 -->
                <div class="info-column">
                    <div class="info-item">
                        <span class="info-label">Address:</span>
                        <span
                            class="info-value"><?php echo $resident['houseStreet'] . ', ' . $resident['barangay']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Username:</span>
                        <span class="info-value"><?php echo $resident['username']; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Date Registered:</span>
                        <span class="info-value"><?php echo $formattedDate; ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Verification Status:</span>
                        <span class="info-value <?php echo $statusClass; ?>"><?php echo $verificationStatus; ?></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Account Actions -->
        <section class="actions-section">
            <h2 class="section-title">Account Actions</h2>
            <div class="action-buttons">
                <button class="account-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="#3498db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    <span>Edit Profile</span>
                </button>
                <button class="account-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="#2ecc71" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                        </path>
                    </svg>
                    <span>Change Password</span>
                </button>
                <button class="account-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="#e74c3c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg>
                    <span>View History</span>
                </button>
            </div>
        </section>
        <?php endif; ?>
    </div>

    </div>

    <?php include_once('./footer.php'); ?>
</body>

</html>