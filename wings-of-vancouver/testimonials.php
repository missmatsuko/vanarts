<?php include '_header.php'; ?>

<div class="page-wrapper row">
    <div class="page-hero row">
        <div class="small-12 columns">
            <img src="img/content/hero/testimonial.jpg" alt="photo of mounaintops poking through the cloudtops">
        </div>

        <div class="hero-content">
            <div class="small-8 columns">
                <h2 class="hero-text">Testimonials</h2>
            </div>
            <div class="small-4 columns hero-form-container">
                <h3 class="hero-form-title">Leave a Review</h3>
                    <form action="insert-testimonial-handler.php" method="POST">
                        <div>
                            <label>Name</label>
                            <input name="name" type="text" required>
                        </div>
                        <div>
                            <label>E-mail</label>
                            <input name="email" type="email" required>
                        </div>
                        <div>
                            <label>Message</label>
                            <textarea name="message" maxlength="500" required></textarea>
                        </div>
                        <div>
                            <input class="button" name="submit" type="submit" value="Leave My Review">
                        </div>
                    </form><!--testimonials form ends-->
            </div><!--hero form container ends-->
        </div><!--hero content ends-->
    </div><!--hero ends-->
    <div class="page-content">
        <div class="row">
            <div class="small-12 columns">
                <div class="testimonial-list">
                    <?php
                    //to display testimonials from database
                    //login details
                    include("../_db.php");

                    //connect to database
                    $conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

                    //if connection fails, display error
                    if (!$conn) {
                        die("Sorry, there are no testimonials to display.");
                    }
                    //if connection successfull, display info from database
                    else {
                        $select = "SELECT name,message FROM wingsofvancouver_testimonials ORDER BY id DESC LIMIT 5";
                        $resultSelect = mysqli_query($conn, $select);

                        while ($row = mysqli_fetch_assoc($resultSelect)) {
                            $name = $row['name'];
                            $message = $row['message'];

                            echo "<div class='testimonials-item'>";
                            echo "<p class='testimonials-text'>\"" . $message . "\"</p>";
                            echo "<p class='testimonials-author'>-" . $name . "</p>";
                            echo "</div><!--testimonials item ends-->";
                        }
                    }
                    ?>
                </div><!--testimonial list ends-->
            </div>
        </div><!--row ends-->
    </div><!--page content ends-->
</div><!--page wrapper ends-->

<?php
include '_footer.php';
