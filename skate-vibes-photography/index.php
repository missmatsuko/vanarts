<!--code to use for javascript fxn 
onClick="toggleNav(); return false">
-->

<?php include '_header.php'; ?>

<div class='page-hero'>
    <div class="columns">
        <div class='row slideshow-arrows'>
            <div class="hide-for-small-only medium-12 columns above">
                <a href="#" class="left" onClick="prevSlide(); clearInterval(autoNext); return false"><i class="fa fa-angle-left fa-2x"></i></a>
                <a href="#" class="right" onClick="nextSlide(); clearInterval(autoNext); return false"><i class="fa fa-angle-right fa-2x"></i></a>
            </div><!--arrows ends-->
        </div>
        <div class='row'>
            <div class="hide-for-small-only medium-12 medium-6 large-4 columns small-offset-1 above">
                <h1>Professional Photography</h1>
                <h2>
                    Skate Vibes Photography is the premier photography studio for your skateboard-related photography needs and desires.
                </h2>
                <a class="button expanded" href='#contact'>Book Now</a>
            </div>
        </div>
    </div>
    <div class="slideshow-container">
        <img id="slide-1" src="img/slideshow/slide-1.jpg" alt="Photo of a guy a skateboarding without a helmet"/>
        <img id="slide-2" src="img/slideshow/slide-2.jpg" alt="Photo of a guy a skateboarding with a helmet"/>
        <img id="slide-3" src="img/slideshow/slide-3.jpg" alt="Photo of a guy a skateboarding at dusk"/>
        <img id="slide-4" src="img/slideshow/slide-4.jpg" alt="Photo of a guy a skateboarding at night"/>
        <img id="slide-5" src="img/slideshow/slide-5.jpg" alt="Photo of the legs of a guy a skateboarding on a boardwalk"/>
        <img id="slide-6" src="img/slideshow/slide-6.jpg" alt="Blurry photo of a guy skateboarding"/>
        <img id="slide-7" src="img/slideshow/slide-7.jpg" alt="Photo of the legs of a guy a skateboarding on a sidewalk"/>
        <img id="slide-8" src="img/slideshow/slide-8.jpg" alt="Photo of a guy a skateboarding in black and white"/>
        <img id="slide-9" src="img/slideshow/slide-9.jpg" alt="Photo of the feet of a guy a skateboarding with fancy shoes"/>
    </div>
</div><!--hero ends-->


<!--DECIDED AGAINST THIS IN THE END

<div class="page-gallery">
    '<div class='row collapse'>
        <div class='small-12 medium-3 large-2 columns hide-for-small-only'>
            <img src="img/theme/service-1.jpg" alt=""/>
        </div>thumbnail ends
        <div class='small-12 medium-3 large-2 columns hide-for-small-only'>
            <img src="img/theme/service-2.jpg" alt=""/>
        </div>thumbnail ends
        <div class='small-12 medium-3 large-2 columns hide-for-small-only'>
            <img src="img/theme/service-3.jpg" alt=""/>
        </div>thumbnail ends
        <div class='small-12 medium-3 large-2 columns hide-for-small-only'>
            <img src="img/theme/service-1.jpg" alt=""/>
        </div>thumbnail ends
        <div class='small-12 medium-3 large-2 columns show-for-large'>
            <img src="img/theme/service-2.jpg" alt=""/>
        </div>thumbnail ends
        <div class='small-12 medium-3 large-2 columns show-for-large'>
            <img src="img/theme/service-3.jpg" alt=""/>
        </div>thumbnail ends

    </div>
</div>thumbnail gallery ends-->

<div class="page-testimonials" id="testimonials">
    <div class="row">
        <h3>Testimonials</h3>
        <div class="small-3 columns">
            <a href="#testimonials" class="left" onClick="prevText(); return false"><i class="fa fa-angle-left fa-2x"></i></a>
        </div><!--left arrow ends-->
        <div class="small-6 columns">
            <div class="page-testimonials-text" id="testimonial-1">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit consequat tincidunt. Etiam quis tincidunt quam. Etiam maximus neque eget turpis aliquet elementum. Donec ac orci varius, efficitur urna et, lobortis purus. Morbi fringilla dapibus diam ac consequat. Nulla facilisi.
                </p>
                <p>Stacy's Mom, Blogger</p>
            </div><!--testimonial 1 ends-->
            <div class="page-testimonials-text" id="testimonial-2">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit consequat tincidunt. Etiam quis tincidunt quam. Etiam maximus neque eget turpis aliquet elementum. Donec ac orci varius, efficitur urna et, lobortis purus.
                </p>
                <p>Stacy, Happy Customer</p>
            </div><!--testimonial 2 ends-->
            <div class="page-testimonials-text" id="testimonial-3">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit consequat tincidunt. Etiam quis tincidunt quam. Etiam maximus neque eget turpis aliquet elementum.
                </p>
                <p>Stacy's Dads, Pro Skateboarding Team</p>
            </div><!--testimonial 3 ends-->
            <div class="page-testimonials-text" id="testimonial-4">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit consequat tincidunt. Etiam quis tincidunt quam. Etiam maximus neque eget turpis aliquet elementum. Donec ac orci varius, efficitur urna et, lobortis purus. Morbi fringilla dapibus diam ac consequat.
                </p>
                <p>Stacy's Life, Magazine</p>
            </div><!--testimonial 4 ends-->
        </div><!--testimonials content ends-->
        <div class="small-3 columns">
            <a href="#testimonials" class="right" onClick="nextText(); return false"><i class="fa fa-angle-right fa-2x"></i></a>
        </div><!--right arrow ends-->
    </div>
</div><!--testimonials end-->

<div class='page-services' id="services">
    <div class='row'>
        <h3 class="more-space">Services &amp; Pricing</h3>
        <div class='small-12 medium-4 columns'>
            <div class="callout">
                <img src='img/theme/service-1.jpg' alt='Photo of a girl doing a skateboard trick in-studio against a white backdrop'>
                <div class="page-services-text">
                    <h4>In-Studio<br>Sessions</h4>
                    <p>Short description of this service. Lorem ipsum dolor sit amet, consectetur elit.</p>
                    <ul>
                        <li>Attribute 1</li>
                        <li>Attribute 2</li>
                        <li>Attribute 3</li>
                    </ul>
                    <p>Starts at $90/hr</p>
                </div>
            </div>
            <a class="button expanded" href="#contact">Book Now</a>
        </div><!--service 1 ends-->
        <div class='small-12 medium-4 columns'>
            <div class="callout">
                <img src='img/theme/service-2.jpg' alt='Photo of a girl doing a skateboard trick in-studio against a white backdrop'>
                <div class="page-services-text">
                    <h4>Events<br>Coverage</h4>
                    <p>Short description of this service. Lorem ipsum dolor sit amet, consectetur elit.</p>
                    <ul>
                        <li>Attribute 1</li>
                        <li>Attribute 2</li>
                        <li>Attribute 3</li>
                    </ul>
                    <p>Starts at $200/hr<br>+ travel fees</p>
                </div>
            </div>
            <a class="button expanded" href="#contact">Book Now</a>
        </div><!--service 2 ends-->
        <div class='small-12 medium-4 columns end'>
            <div class="callout">
                <img src='img/theme/service-3.jpg' alt='Photo of a girl doing a skateboard trick in-studio against a white backdrop'>
                <div class="page-services-text">
                    <h4>Product<br>Photography</h4>
                    <p>Short description of this service. Lorem ipsum dolor sit amet, consectetur elit.</p>
                    <ul>
                        <li>Attribute 1</li>
                        <li>Attribute 2</li>
                        <li>Attribute 3</li>
                    </ul>
                    <p><a href="#contact">Contact Us</a> for<br>a custom quote</p>
                </div>
            </div>
            <a class="button expanded" href="#contact">Book Now</a>
        </div><!--service 3 ends-->
    </div>
    <div class="row">
        <div class="hide-for-small-only medium-push-1 medium-2 columns">
            <i class="fa fa-hand-peace-o"></i>
        </div>
        <div class="small-12 medium-push-1 medium-8 columns end">
            <p class="policy-text">
                <span class="bold">General Details and Policies</span> 
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit consequat tincidunt. Etiam quis tincidunt quam. Etiam maximus neque eget turpis aliquet elementum. Donec ac orci varius, efficitur urna et, lobortis purus. Morbi fringilla dapibus diam ac.</p>
        </div>
    </div>
</div><!--services end-->

<div class='page-contact' id="contact">
    <div class='row'>
        <h3 class="more-space">Contact Us</h3>
        <div class="small-12 large-6 columns">
            <div class="row">
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2602.6669328247717!2d-123.11754558419138!3d49.282708078689645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5486717f2d2c89dd%3A0xcb54d8f90a8671e4!2sVanArts!5e0!3m2!1sen!2sca!4v1452224015188" allowfullscreen></iframe>
            </div><!--map ends-->
            <div class="row page-contact-text ">
                <div class="small-12 large-4 columns">
                    <h5>Address</h5>
                    <p>
                        21 Jump Street<br>
                        Vancouver, BC<br>
                        A1A 1A1
                    </p>
                </div>


                <div class="small-12 large-4  columns">
                    <h5>Phone</h5>
                    <p>123-456-7890</p>
                </div>

                <div class="small-12 large-4  columns">
                    <h5>E-mail</h5>
                    <p>info@skatevibes.com</p>
                </div>
            </div><!--contact info ends-->
        </div>
        <div class="small-12 large-5 columns">
            <form action="_process_contact_form.php" method="POST">
                <div class="row">
                    <div class="column">
                        <label>Name:
                            <input type="text" name="name" required>
                        </label>
                    </div>
                    <div class="column">
                        <label>E-mail:
                            <input type="email" name="email" required>
                        </label>
                    </div>
                    <div class="column">
                        <label>Phone:
                            <input type="tel" name="phone" required>
                        </label>
                    </div>
                    <div class="column">
                        <label>
                            Message:
                            <textarea name="message" placeholder="Type your message here..." required></textarea>
                        </label>
                    </div>
                    <div class="small-10 medium-6 large-6 columns">
                        <input type="submit" class="button">
                    </div>
                </div>
            </form><!--form ends-->
        </div>
    </div>
</div><!--contact end-->

<div class='page-clients' id="clients">
    <div class='row'>
        <h3 class="more-space hide-for-small-only">Clients</h3>
        <div class="hide-for-small-only medium-10 small-centered columns">
            <div class="row small-up-6">
                <div class="column">
                    <a href="#clients">
                        <img src="img/client/client-1.png" alt="DC Logo"/>
                    </a>
                </div>
                <div class="column">
                    <a href="#clients">
                        <img src="img/client/client-2.png" alt="Adio Logo"/>
                    </a>
                </div>
                <div class="column">
                    <a href="#clients">
                        <img src="img/client/client-3.png" alt="Volcom Logo"/>
                    </a>
                </div>
                <div class="column">
                    <a href="#clients">
                        <img src="img/client/client-4.png" alt="Black Label Logo"/>
                    </a>
                </div>
                <div class="column">
                    <a href="#clients">
                        <img src="img/client/client-5.png" alt="Spitfire Logo"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div><!--clients end-->

<div class='page-cta-bottom'>
    <div class='row'>
        <div class="small-8 small-centered columns">
            <p>What are you waiting for?</p>
            <a class="button expanded" href="#contact">Book Now</a>
        </div>
    </div>
</div><!--bottom cta end-->

<?php
include '_footer.php';
