<?php
// Determine path prefix based on where this file is included from
$pathPrefix = (defined('IN_ROOT_FOOTER') && IN_ROOT_FOOTER) ? '' : '../';
?>

<footer class="footer">
    <div class="footer-upper">
        <div class="queries">
            <h2>For more <span>inqiuries</span> & <span>questions</span></h2>
            <h2>Visit our <span>FAQs</span> in our <span>socials</span></h2>
        </div>
        <div class="socials">
            <a href="https://web.facebook.com/share/g/1EbBqNZHcK/" target="_blank"><img
                    src="<?php echo $pathPrefix; ?>assets/icons8-facebook.svg" alt="Facebook"></a>
            <a href="https://www.instagram.com/explore/locations/277280053/cainta-municipal-hall-caintarizal/?utm_source"
                target="_blank"><img src="<?php echo $pathPrefix; ?>assets/icons8-instagram.svg" alt="Instagram"></a>
            <a href="https://youtu.be/IXPuSHtnImE?si=PDIWER9ZU_M5NEuq" target="_blank"><img
                    src="<?php echo $pathPrefix; ?>assets/icons8-youtube.svg" alt="Youtube"></a>
        </div>
    </div>
    <div class="footer-lower">
        <div class="mail-button">
            <img src="<?php echo $pathPrefix; ?>assets/mail.svg" alt="Mail">
            <span>vist-us@baranggay-system.com</span>
        </div>
        <div class="policy-links">
            <a href="<?php echo $pathPrefix; ?>privacy-policy.html">Privacy Policy</a>
            <a href="<?php echo $pathPrefix; ?>terms-and-conditions.html">Terms & Conditions</a>
        </div>
    </div>
</footer>