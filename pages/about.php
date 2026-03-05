<?php // PHP File Content ?>
<?php
session_start();
$current_page = 'about';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Crooks Cart Collectives</title>

    <script src="../scripts/header.js" defer></script>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="stylesheet" href="../styles/about.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="content">
        <!-- Page Header -->
        <section class="page-header">
            <div class="header-content">
                <h1>About <span>Crooks Cart Collectives</span></h1>
                <p>IT 213 Elective 2 & ITC 124 Collaborative Project</p>
            </div>
        </section>

        <!-- Project Overview -->
        <section class="overview-section">
            <div class="overview-container">
                <div class="overview-content">
                    <h2>Project <span>Overview</span></h2>
                    <p>Crooks Cart Collectives is a collaborative academic project between two courses: <strong>IT 213
                            Elective 2 (Object-Oriented Programming)</strong> and <strong>ITC 124 Fundamentals of
                            Database Systems</strong>.</p>

                    <p>The name comes from internet meme culture: <strong>"Crook"</strong> refers to someone below the
                        mafia boss - representing affordable, second-hand, and budget items. <strong>"Cart"</strong>
                        represents the modern marketplace, and <strong>"Collectives"</strong> means collections.
                        Together, the platform is envisioned as a budget-friendly marketplace similar to an eBay-style
                        platform where users can buy and sell second-hand or affordable items.</p>

                    <p>This project applies Object-Oriented Programming principles (encapsulation, inheritance,
                        polymorphism, abstraction) alongside professional database design practices to create a
                        functional e-commerce simulation.</p>
                </div>
            </div>
        </section>

        <!-- Course Information -->
        <section class="courses-section">
            <div class="courses-grid">
                <div class="course-card">
                    <h3>IT 213: Elective 2</h3>
                    <p class="course-subject">Object-Oriented Programming</p>
                    <p class="instructor">Instructor: Ms. Marisol B. De Guzman</p>
                    <p class="course-description">This course teaches OOP concepts including encapsulation, inheritance,
                        polymorphism, and abstraction. For this project, students applied these principles to web
                        development instead of Java to lighten the academic burden while demonstrating server-side
                        programming collaboration.</p>
                </div>

                <div class="course-card">
                    <h3>ITC 124: Fundamentals of Database Systems</h3>
                    <p class="course-subject">Database Design & Management</p>
                    <p class="instructor">Instructor: Mr. Louise Vasquez</p>
                    <p class="course-description">This course covers professional database practices including ER
                        diagramming, normalization (1NF-3NF), entity relationships, and SQL implementation. Students
                        applied these concepts to design and implement the project's database structure.</p>
                </div>
            </div>
        </section>

        <!-- Development Team -->
        <section class="team-section">
            <h2>Development <span>Team</span></h2>
            <p class="team-subtitle">School of Computer Studies - Arellano University Bonifacio Campus</p>

            <!-- Lead Developer - Centered Card (Now matching mobile view styling) -->
            <div class="lead-container">
                <div class="team-card lead-card">
                    <div class="team-image">
                        <img src="../assets/image/team/lance-madelar.png" alt="Lance N. Madelar">
                    </div>
                    <div class="team-info">
                        <h3>Lance N. Madelar</h3>
                        <p class="team-role">Lead Developer / Programmer</p>
                        <p class="team-bio">Project leader responsible for system architecture, database design, core
                            functionality implementation, and team coordination. Implemented OOP principles in PHP and
                            integrated database operations.</p>
                    </div>
                </div>
            </div>

            <!-- Team Members - Grid Layout -->
            <div class="members-grid">
                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/christian-adviento.png" alt="Christian Ahron B. Adviento">
                    </div>
                    <h3>Christian Ahron B. Adviento</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Helped with documentation and gave feedback during meetings.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/william-aranez.png" alt="William G. Arañez">
                    </div>
                    <h3>William G. Arañez</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Assisted in documentation and provided suggestions to the team.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/rylle-bernardino.jpg" alt="Rylle Javerick S. Bernardino">
                    </div>
                    <h3>Rylle Javerick S. Bernardino</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Worked on documentation and shared feedback with the group.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/charles-canoneo.png" alt="Charles Symon Kieffer C. Cañoneo">
                    </div>
                    <h3>Charles Symon Kieffer C. Cañoneo</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Contributed to documentation and cooperated with team members.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/kishiekel-fernandez.png" alt="Kishiekel C. Fernandez">
                    </div>
                    <h3>Kishiekel C. Fernandez</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Assisted with documentation and gave input during discussions.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/clark-mallo.png" alt="Clark Luis F. Mallo">
                    </div>
                    <h3>Clark Luis F. Mallo</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Helped with documentation and provided feedback to the team.</p>
                </div>

                <div class="team-card">
                    <div class="team-image">
                        <img src="../assets/image/team/christian-mendoza.png" alt="Christian Ruel G. Mendoza">
                    </div>
                    <h3>Christian Ruel G. Mendoza</h3>
                    <p class="team-role">Member</p>
                    <p class="team-bio">Worked on documentation and offered suggestions during meetings.</p>
                </div>
            </div>

            <p class="team-note">All members contributed to documentation, testing, and collaborative development
                throughout the project lifecycle.</p>
        </section>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>