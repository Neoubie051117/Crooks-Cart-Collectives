<?php
$current_page = basename($_SERVER['PHP_SELF']);
$is_root = ($current_page == 'admin-index.php');
$pathPrefix = $is_root ? '' : '../';
?>

<footer class="footer">
    <div class="footer-upper">
        <div class="queries">
            <h2>Admin <span>Control Panel</span></h2>
            <h2>Manage & <span>Monitor</span></h2>
        </div>
        <div class="socials">
            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/facebook.svg" alt="Facebook"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/icons/facebook.svg';">
            </a>
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/instagram.svg" alt="Instagram"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </a>
            <a href="https://youtube.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo $pathPrefix; ?>assets/image/icons/youtube.svg" alt="YouTube"
                    onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            </a>
        </div>
    </div>
    <div class="footer-lower">
        <div class="mail-button">
            <img src="<?php echo $pathPrefix; ?>assets/image/icons/mail.svg" alt="Mail"
                onerror="this.onerror=null; this.src='<?php echo $pathPrefix; ?>assets/image/brand/Logo.png';">
            <span>admin@crooks-cart.edu.ph</span>
        </div>
        <div class="policy-links">
            <a href="<?php echo $pathPrefix; ?>includes/admin-privacy-policy.php">Privacy Policy</a>
            <a href="<?php echo $pathPrefix; ?>includes/admin-terms-and-conditions.php">Terms & Conditions</a>
        </div>
    </div>
</footer>