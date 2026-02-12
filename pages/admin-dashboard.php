<?php
session_start();

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: sign-in.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Crooks Cart Collectives</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <style>
    .content {
        max-width: 1200px;
        margin: 80px auto 20px;
        padding: 20px;
    }

    .admin-welcome {
        background: #f8f9fa;
        padding: 40px;
        border-radius: 8px;
        margin-bottom: 30px;
        text-align: center;
    }

    .admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .admin-card {
        background: white;
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .btn-admin {
        display: inline-block;
        background: #4a5568;
        color: white;
        padding: 12px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 20px;
        transition: background 0.3s;
    }

    .btn-admin:hover {
        background: #2d3748;
    }
    </style>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <div class="admin-welcome">
            <h1>Admin Dashboard</h1>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Admin'); ?>!</p>
            <p>Manage users, sellers, and platform settings.</p>
        </div>

        <div class="admin-grid">
            <div class="admin-card">
                <h3>Manage Users</h3>
                <p>View and manage all registered users</p>
                <a href="admin-users.php" class="btn-admin">Manage Users</a>
            </div>

            <div class="admin-card">
                <h3>Seller Verification</h3>
                <p>Verify seller applications</p>
                <a href="admin-sellers.php" class="btn-admin">Verify Sellers</a>
            </div>

            <div class="admin-card">
                <h3>Platform Settings</h3>
                <p>Configure system settings</p>
                <a href="admin-settings.php" class="btn-admin">Settings</a>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>