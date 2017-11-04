<?php include "_header.php" ?>
<div class="page-wrapper">
    <div class="row column">
        <h2>Contact</h2>
    </div><!--row ends-->
    <div class="page-contact">
        <div class="row">
            <div class="small-5 columns">
                <h3>Contact Form</h3>

                <form class='contact-form'>
                    <ul class="unstyled-list">
                        <li>
                            <ul class="unstyled-list">
                                <li>Name:</li>
                                <li><input name='name' type="text" pattern="^[a-zA-Z'\s]+$" title='Name can only contain letters, spaces, and apostrophes.' required></li>
                            </ul>
                        </li>
                        <li>
                            <ul class="unstyled-list">
                                <li>Email:</li>
                                <li><input name='email' type="email" required></li>
                            </ul>
                        </li>
                        <li>
                            <ul class="unstyled-list">
                                <li>Message:</li>
                                <li><textarea name='message' maxlength='500' required></textarea></li>
                            </ul>
                        </li>
                        <li>
                            <input type="submit" value="Send Message" class="button">
                        </li>
                    </ul>
                </form>

            </div><!--column ends-->

            <div class="small-7 columns">

                <h3>Map</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10410.669816861457!2d-123.1153577!3d49.2826982!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa8d10bdb2ca1c083!2sVancouver+Institute+of+Media+Arts+(VanArts)!5e0!3m2!1sen!2sca!4v1460089398834" allowfullscreen></iframe>

                <div class="row contact-info">
                    <div class="small-4 columns">
                        <h3>Location</h3>
                        <p>
                            #600-570 Dunsmuir St.<br>
                            Seattle, WA<br> 123456
                        </p>
                    </div>
                    <div class="small-4 columns">
                        <h3>Contact</h3>
                        <ul class="unstyled-list">
                            <li>
                                <strong> E-mail:</strong><br>info@bizcoachplus.com
                            </li>
                            <li>
                                <strong>Phone:</strong><br>206-555-1234
                            </li>
                        </ul>
                    </div>
                    <div class="small-4 columns">
                        <h3>Office Hours</h3>
                        <ul class="unstyled-list">
                            <li>
                                <strong>Monday-Friday:</strong><br>9am-5pm
                            </li>
                            <li>
                                <strong>Weekends & Holidays:</strong><br>Closed
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--column ends-->

        </div><!--row ends-->
    </div><!--page contact ends-->
</div><!--page wrapper ends-->


<!--
-office location
-map
-business hours
-contact info
-contact form
-->

<?php include "_footer.php" ?>

