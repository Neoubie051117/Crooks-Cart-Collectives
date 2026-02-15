<?php
session_start();
require_once('../database/database-connect.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php');
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch all verified sellers for dropdown (excluding self if user is a seller)
$sellers = [];
try {
    $stmt = $connection->prepare("
        SELECT s.seller_id, u.username, s.business_name 
        FROM sellers s
        JOIN users u ON s.user_id = u.user_id
        WHERE s.is_verified = 1 AND u.user_id != ?
    ");
    $stmt->execute([$userId]);
    $sellers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching sellers: " . $e->getMessage());
}

// Fetch user's own reports
$reports = [];
try {
    $stmt = $connection->prepare("
        SELECT r.*, s.business_name, u.username as seller_username
        FROM seller_reports r
        JOIN sellers s ON r.seller_id = s.seller_id
        JOIN users u ON s.user_id = u.user_id
        WHERE r.reporter_id = ?
        ORDER BY r.created_at DESC
    ");
    $stmt->execute([$userId]);
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error fetching reports: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report a Seller - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/complaint-page.css">
    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <h1 class="page-title">Report a Seller</h1>

        <!-- Report Form -->
        <div class="report-form-container">
            <form id="reportForm" class="report-form">
                <div class="form-group">
                    <label for="seller_id">Select Seller *</label>
                    <select id="seller_id" name="seller_id" required>
                        <option value="">-- Choose a seller --</option>
                        <?php foreach ($sellers as $seller): ?>
                        <option value="<?= $seller['seller_id'] ?>">
                            <?= htmlspecialchars($seller['business_name'] ?: $seller['username']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="reason">Reason *</label>
                    <input type="text" id="reason" name="reason" required
                        placeholder="e.g., Fake product, Scam, Harassment">
                </div>

                <div class="form-group">
                    <label for="details">Details *</label>
                    <textarea id="details" name="details" rows="5" required
                        placeholder="Describe the incident in detail..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Report</button>
            </form>
        </div>

        <!-- User's Previous Reports -->
        <?php if (!empty($reports)): ?>
        <h2 class="section-title">Your Previous Reports</h2>
        <div class="reports-list">
            <?php foreach ($reports as $report): ?>
            <div class="report-card">
                <div class="report-header">
                    <strong>Seller:</strong>
                    <?= htmlspecialchars($report['business_name'] ?: $report['seller_username']) ?>
                    <span class="report-status status-<?= $report['status'] ?>"><?= $report['status'] ?></span>
                </div>
                <div class="report-body">
                    <p><strong>Reason:</strong> <?= htmlspecialchars($report['reason']) ?></p>
                    <p><strong>Details:</strong> <?= nl2br(htmlspecialchars($report['details'])) ?></p>
                    <p class="report-date">Submitted: <?= date('F j, Y, g:i a', strtotime($report['created_at'])) ?></p>
                    <?php if (!empty($report['admin_notes'])): ?>
                    <p class="admin-notes"><strong>Admin notes:</strong>
                        <?= nl2br(htmlspecialchars($report['admin_notes'])) ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Notifier Modal (reused) -->
    <div id="notifierModal" class="notifier hidden">
        <div class="notifier-content">
            <p id="notifierMessage"></p>
            <button id="notifierCloseBtn" class="btn btn-primary">OK</button>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="../scripts/report-seller.js"></script>
</body>

</html>