<?php include '_header.php'; ?>

<div class="page-wrapper row">
    <div class="page-hero row">
        <div class="small-12 columns">
            <img src="img/content/hero/contact.jpg" alt="Aerial photo of a BC coastal inlet">
        </div>

        <div class="hero-content">
            <div class="small-8 columns">
                <h2 class="hero-text">Contact</h2>
            </div>
            <div class="small-4 columns hero-form-container">
                <h3 class="hero-form-title">Send a Message</h3>
                    <form>
                        <div>
                            <label>Name</label>
                            <input type="text" required>
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" required>
                        </div>
                        <div>
                            <label>Phone</label>
                            <input type="text">
                        </div>
                        <div>
                            <label>Message</label>
                            <textarea></textarea>
                        </div>
                        <div>
                            <input class="button" type="submit" value="Send My Message">
                        </div>
                    </form><!--form ends-->
            </div><!--hero form container ends-->
        </div><!--hero content ends-->
    </div><!--hero ends-->

    <div class="page-content">
        <div class="page-contact">
            <div class="row">
                <div class="small-9 columns">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2602.666932824771!2d-123.11754558419138!3d49.28270807868966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5486717f2d2c89dd%3A0xcb54d8f90a8671e4!2sVanArts!5e0!3m2!1sen!2sca!4v1454694760793" allowfullscreen></iframe>
                    <!--google map ends-->
                </div><!--map column ends-->
                <div class="small-3 columns">
                    <div class="contact-details">
                         <h4>Contact Details</h4>
                        <ul>
                            <li>
                                <p>
                                    <span class="bold">Address</span><br>
                                    21 Jump Street<br>
                                    Vancouver, BC<br>
                                    A1A 1A1
                                </p>
                            </li>
                            <li>
                                <p><span class="bold">E-mail Address</span><br> info@wingsofvancouver.com</p>
                            </li>
                            <li>
                                <p><span class="bold">Phone Number</span><br> 123-456-7890</p>
                            </li>
                        </ul>
                    </div><!--contact info ends-->
                </div>
            </div><!--row ends-->
        </div>
    </div><!--page content ends-->
</div><!--page wrapper ends-->

<?php
include '_footer.php';
