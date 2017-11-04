<?php 
$active="contact";
include("_header.php"); 
include "_nav.php";?>

<div class="row page-wrapper">
    <div class="page-main small-12 medium-8 columns">
        <?php if (isset($_POST['submit'])) {
            echo"<p>Message was sent. Thank you!</p>";
        } ?>
        <h1>Contact</h1>
        <!--main content-->
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <ul class="list-unstyle">
                <li>
                    <input type="text" placeholder="Name" required>
                </li>
                <li>
                    <input type="email" placeholder="Email" required>
                </li>
                <li>
                    <textarea maxlength="500" required>Message</textarea>
                </li>
                <li>
                    <input type="submit" name="submit" value="send message">
                </li>
            </ul>
        </form><!--contact form ends-->

        <p>
            We are located at #600-570 Dunsmuir Street in downtown Vancouver.<br>
            You can use the form above to contact us, or e-mail us directly at contact@example.com<br>
            If calling is your thing, you can reach us at 604-682-2781.
        </p>

    </div><!--main column ends-->
    <div class="page-sidebar hide-for-small-only medium-4 columns">
        <!--sidebar content-->
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10410.669816861457!2d-123.1153577!3d49.2826982!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa8d10bdb2ca1c083!2sVancouver+Institute+of+Media+Arts+(VanArts)!5e0!3m2!1sen!2sca!4v1462507699958" allowfullscreen></iframe>
        <!--map ends-->
    </div><!--sidebar column ends-->
</div><!--pagewrapper row ends-->

<?php include("_footer.php"); ?>