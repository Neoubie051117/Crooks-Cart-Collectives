<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Portal</title>

    <!-- Load CSS and JS FIRST -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/footer.css">

    <script defer src="scripts/central-link-navigation.js"></script>
    <script defer src="scripts/header.js"></script>
    <script defer src="scripts/index.js"></script>

    <!-- THEN include header.php -->
    <?php 
    // Define a constant to tell header.php we're in root
    define('IN_ROOT', true);
    include_once('pages/header.php'); 
    ?>

</head>

<body>

    <div class="content">

        <!-- Upper Background Hook -->
        <section class="quoteSection">
            <div class="quoteImageShowcase" id="quoteImageShowcase"
                style="background-image: url('assets/Showcase1.png');"></div>
            <div class="quoteText" id="quoteText">
                <h1>Burden becomes lighter when <span>everyone</span> helps</h1>
            </div>
        </section>

        <!-- Content Section -->
        <section class="body-content">
            <div class="image-container">
                <img src="assets/BodyContentImage.png" alt="Body Content">
            </div>

            <div class="text-container">
                <div class="title-container">
                    <div class="vertical-line"></div>
                    <h2>Community Introductions</h2>
                </div>
                <p>Welcome to the official portal of our barangay. We are dedicated to serving the needs of our
                    community through transparent governance and efficient public service</p>
                <p>This digital platform was created to bring our services closer to you, making it easier for every
                    resident to connect with the barangay anytime and anywhere.</p>
                <a href="https://www.cainta.gov.ph/newsandarticles" class="join-button" target="_blank">EXPLORE</a>
            </div>

        </section>

    </div>

    <?php 
    // Define constant for footer.php too
    define('IN_ROOT_FOOTER', true);
    include_once('pages/footer.php'); 
    ?>
</body>

</html>