<!-- THIS IS SHOULD BE IGNORED, IT's JUST EXTRA -->

<?php
require_once('../includes/admin-auth-check.php');
require_once('../../database/database-connect.php');

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$report_id = $_POST['report_id'] ?? $_GET['id'] ?? 0;
$resolution = $_POST['resolution'] ?? '';

if ($action === 'resolve' && $report_id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $connection->prepare("UPDATE seller_reports SET status = 'resolved', admin_notes = ?, resolved_at = NOW() WHERE report_id = ?");
        $stmt->execute([$resolution, $report_id]);
        $_SESSION['admin_message'] = 'Report resolved.';
    } catch (PDOException $e) {
        error_log("Resolve report error: " . $e->getMessage());
        $_SESSION['admin_error'] = 'Failed to resolve report.';
    }
    header('Location: manage-reports.php');
    exit;
}

// Fetch all reports
$reports = [];
try {
    $stmt = $connection->prepare("
        SELECT r.*, u.username as reporter, s.business_name, s.user_id as seller_user_id
        FROM seller_reports r
        JOIN users u ON r.reporter_id = u.user_id
        JOIN sellers s ON r.seller_id = s.seller_id
        ORDER BY r.created_at DESC
    ");
    $stmt->execute();
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Fetch reports error: " . $e->getMessage());
}

$message = $_SESSION['admin_message'] ?? '';
$error = $_SESSION['admin_error'] ?? '';
unset($_SESSION['admin_message'], $_SESSION['admin_error']);
?>
<?php include_once('../includes/admin-header.php'); ?>

<div class="reports-container">
    <h1 class="page-title">Manage Reports</h1>

    <?php if ($message): ?>
    <div class="alert success"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
    <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if (empty($reports)): ?>
    <div class="empty-state">
        <img src="../../assets/image/icons/admin-reports.svg" alt="No reports">
        <p>No reports have been submitted.</p>
    </div>
    <?php else: ?>
    <div class="reports-list">
        <?php foreach ($reports as $report): ?>
        <div class="report-card <?php echo $report['status']; ?>">
            <div class="report-header">
                <span class="report-id">#<?php echo $report['report_id']; ?></span>
                <span
                    class="report-status status-<?php echo $report['status']; ?>"><?php echo ucfirst($report['status']); ?></span>
            </div>
            <div class="report-body">
                <p><strong>Reporter:</strong> <?php echo htmlspecialchars($report['reporter']); ?></p>
                <p><strong>Seller:</strong> <?php echo htmlspecialchars($report['business_name'] ?: 'Unknown'); ?></p>
                <p><strong>Reason:</strong> <?php echo htmlspecialchars($report['reason']); ?></p>
                <p><strong>Details:</strong> <?php echo nl2br(htmlspecialchars($report['details'])); ?></p>
                <p><strong>Submitted:</strong> <?php echo date('M j, Y g:i A', strtotime($report['created_at'])); ?></p>
                <?php if ($report['admin_notes']): ?>
                <p><strong>Admin notes:</strong> <?php echo nl2br(htmlspecialchars($report['admin_notes'])); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($report['status'] === 'pending'): ?>
            <div class="report-actions">
                <form method="POST">
                    <input type="hidden" name="report_id" value="<?php echo $report['report_id']; ?>">
                    <input type="hidden" name="action" value="resolve">
                    <textarea name="resolution" placeholder="Resolution notes (optional)" rows="2"></textarea>
                    <button type="submit" class="btn-resolve">Mark as Resolved</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<?php include_once('../includes/admin-footer.php'); ?>