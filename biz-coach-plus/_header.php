<?php session_start();?>
<?php if (isset($_GET['logOut'])) {
    session_unset();
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
}
else { ?>

<!DOCTYPE html>
<html>
    <head>
        <title>bizCoach+ Seattle Business, Professional, and Life Coaching</title><!--title ends-->
        <meta charset="UTF-8">
        <meta name="description" content="bizCoach+ provides coaching for business professionals, helping them get ahead in the real world.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="favicon.ico"><!--favicon-->
        <link href="https://cdn.jsdelivr.net/foundation/6.2.0/foundation.min.css" rel="stylesheet" type="text/css"/><!--foundation css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"><!--font awesome icons-->
        <link href='https://fonts.googleapis.com/css?family=Fjalla+One|Open+Sans:400,700,300' rel='stylesheet' type='text/css'><!--google fonts-->
        <link href="css/style.css" rel="stylesheet" type="text/css"/><!--custom style-->
    </head><!--head ends-->

    <body>

        <header>
            <div class="row columns">
                <p class="right">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "Hello, " . $_SESSION['username'] . ' <a href="?logOut=true">Log Out</a>';
                    } else {
                        echo '<a href="login.php">Log In/Sign Up</a>';
                    }
                    ?>
                </p>
            </div>
            <div class="row">
                <div class="small-12 medium-3 columns logo">
                    <a href="index.php"><h1>biz<span class="highlighted-text">COACH</span>+</h1></a>
                    <p class="tagline">helping you succeed</p>
                </div>
                <div class="small-12 medium-9 columns">
                    <ul class="header-contact horizontal-list unstyled-list right">
                        <li><i class="fa fa-phone"></i> 206-555-1234</li>
                        <li><i class="fa fa-envelope"></i> <a href="contact.php">info@bizcoachplus.com</a></li>
                    </ul>
                </div>
            </div>
        </header><!--header row ends-->

        <nav class="row column">
            <ul class="unstyled-list horizontal-list nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="team.php">Team</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="testimonials.php">Testimonials</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                    if (isset($_SESSION['username'])) {
                        echo'<li><a href="membersarea.php">Member Area</a></li>';
                    };
                ?>
            </ul>
        </nav>
<?php } ?>