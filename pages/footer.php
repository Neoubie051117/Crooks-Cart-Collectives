<?php
$current_page = basename($_SERVER['PHP_SELF']);
$is_root = ($current_page == 'index.php');
$pathPrefix = $is_root ? '' : '../';
?>

<footer class="footer">
    <div class="footer-upper">
        <div class="queries">
            <h2>For more <span>inquiries</span> & <span>questions</span></h2>
            <h2>Visit our <span>FAQs</span> in our <span>socials</span></h2>
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
            <span>@crooks-cart-inquiry.com</span>
        </div>
        <div class="policy-links">
            <a href="<?php echo $pathPrefix; ?>pages/privacy-policy.php">Privacy Policy</a>
            <a href="<?php echo $pathPrefix; ?>pages/terms-and-conditions.php">Terms & Conditions</a>
        </div>
    </div>
</footer>