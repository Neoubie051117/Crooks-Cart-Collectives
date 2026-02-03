<?php
include_once('./header.php');
require_once(__DIR__ . '/../database/database-connect.php');

// Fetch resident ID from session using username
$residentID = null;

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = $connection->prepare("SELECT residentID FROM residents WHERE username = :username");
    $query->execute([':username' => $username]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $residentID = (int)$result['residentID'];
    }
}

// Get resident's full name using resident ID
function getResidentName($connection, $residentID) {
    $query = $connection->prepare("SELECT firstName, middleName, lastName FROM residents WHERE residentID = :residentID");
    $query->execute([':residentID' => $residentID]);
    $resident = $query->fetch(PDO::FETCH_ASSOC);

    if ($resident) {
        $name = htmlspecialchars($resident['firstName']);
        if (!empty($resident['middleName'])) {
            $name .= ' ' . htmlspecialchars($resident['middleName']);
        }
        $name .= ' ' . htmlspecialchars($resident['lastName']);
        return $name;
    }
    return 'Unknown Resident';
}

// Load complaints from JSON files
$complaints = [];
$baseDir = realpath(__DIR__ . '/../database/user-data');

if ($baseDir && is_dir($baseDir)) {
    $residentDirs = array_diff(scandir($baseDir), ['.', '..']);
    foreach ($residentDirs as $residentFolderID) {
        $complaintDir = $baseDir . '/' . $residentFolderID . '/complaint';
        if (is_dir($complaintDir)) {
            $complaintFiles = array_diff(scandir($complaintDir), ['.', '..']);
            foreach ($complaintFiles as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'json') {
                    $filePath = $complaintDir . '/' . $file;
                    $jsonData = file_get_contents($filePath);
                    $complaint = json_decode($jsonData, true);
                    if ($complaint) {
                        $complaint['fileName'] = $file;
                        $complaint['filePath'] = $filePath;
                        $complaints[] = $complaint;
                    }
                }
            }
        }
    }

    // Sort complaints by submittedAt (latest first)
    usort($complaints, function($a, $b) {
        return strtotime($b['submittedAt']) - strtotime($a['submittedAt']);
    });
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Complaints</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <link rel="stylesheet" href="/Barangay-System/styles/header.css">
    <link rel="stylesheet" href="/Barangay-System/styles/complaint-page.css">
    <link rel="stylesheet" href="/Barangay-System/styles/footer.css">

    <!-- Scripts -->
    <script defer src="/Barangay-System/scripts/header.js"></script>

</head>

<script>
const residentID = <?= isset($_SESSION['residentID']) ? json_encode($_SESSION['residentID']) : 'null' ?>;
</script>

<body>
    <div class="content">
        <h1 class="page-title">Community Complaints</h1>

        <div class="complaints-container">
            <?php if (empty($complaints)): ?>
            <div class="no-complaints">No complaints have been submitted yet.</div>
            <?php else: ?>
            <?php foreach ($complaints as $complaint): ?>
            <?php
                        $authorName = getResidentName($connection, $complaint['residentID']);
                        $submittedDate = date('F j, Y, g:i a', strtotime($complaint['submittedAt']));
                    ?>
            <div class="complaint-card">
                <div class="complaint-header">
                    <h3 class="complaint-about"><?= htmlspecialchars($complaint['about']) ?></h3>
                    <div class="complaint-author">Submitted by: <?= $authorName ?></div>
                    <div class="complaint-date"><?= $submittedDate ?></div>
                </div>
                <div class="complaint-body">
                    <p><?= nl2br(htmlspecialchars($complaint['message'])) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Floating Button -->
    <button id="openComplaintButton" class="floating-complaint-button">
        <img src="/Barangay-System/assets/complaint-icon.png" alt="Complaint"> File a Complaint
    </button>

    <!-- Complaint Modal Overlay -->
    <div id="complaintOverlay" class="complaint-overlay">
        <div class="complaint-modal">
            <form id="complaintForm" class="complaint-form">
                <h2>File a Complaint</h2>
                <button type="button" id="closeComplaint" class="close-button">×</button>

                <div class="form-group">
                    <label for="complaint-about">About:</label>
                    <input type="text" id="complaint-about" name="complaintAbout" required>
                </div>

                <div class="form-group">
                    <label for="complaint-text">Complaint:</label>
                    <textarea id="complaint-text" name="complaintText" rows="6" required></textarea>
                </div>

                <div class="form-buttons">
                    <button type="button" id="cancelComplaint" class="cancel-button">Cancel</button>
                    <button type="submit" class="submit-button">Submit Complaint</button>
                </div>
            </form>
        </div>
    </div>

    <script src="/Barangay-System/scripts/complaint-form.js"></script>

    <?php include_once('../pages/footer.php'); ?>
</body>

</html>