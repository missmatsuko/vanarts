<?php include '_header.php'; ?>

<div class="page-wrapper row">
    <div class="page-hero row">
        <div class="small-12 columns">
            <img src="img/content/hero/home.jpg" alt="Aerial photo of Bowen Island's coast">
        </div>

        <div class="hero-content">
            <div class="small-8 columns">
                <h2 class="hero-text">Bowen Island</h2>
            </div>
            <div class="small-4 columns hero-form-container">
                <h3 class="hero-form-title">Find a Tour</h3>
                    <form>
                        <div>
                            <label>Number of Guests</label>
                            <input type="number" min="1" max="12" required></input>
                        </div>
                        <div>
                            <label>Preferred Date</label>
                            <input type="date" required></input>
                        </div>
                        <div>
                            <label>Tour Destination</label>
                            <select>
                                <option selected>Bowen Island</option>
                                <option>Garibaldi Park</option>
                                <option>Rocky Mountains</option>
                                <option>Vancouver Harbour</option>
                                <option>Whistler</option>
                            </select>
                        </div>
                        <div>
                            <input class="button" type="submit" value="Find My Tour"></input>
                        </div>
                    </form><!--form ends-->
            </div><!--hero form container ends-->
        </div><!--hero content ends-->
    </div><!--hero ends-->

    <div class="page-content">
        <div class="page-home">
            <div class="row collapse">
                <div class="small-8 columns">
                    <h4>Featured Destination</h4>
                    <p class="home-featured-desc">Bowen Island is a great place. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at mattis ex. Quisque posuere porttitor fermentum. Morbi mauris urna, vehicula eget purus id, fermentum bibendum ex. Cras non nulla auctor, placerat ipsum a, sagittis quam. Nam tincidunt justo lacinia auctor lacinia. Nunc ipsum augue, vulputate et orci ut, sodales pulvinar ipsum. Fusce id neque ac mi tempus ...and that's why you should go to Bowen Island.</p>
                </div>
                <div class="small-4 columns home-deals">
                    <div class="home-deals-content">
                        <h4>Last-Minute Seats</h4>
                        <ul>
                            <li><a href="tours.php">February 14 - Whistler (1 seat left)</a></li>
                            <li><a href="tours.php">February 28 - Rocky Mountains (3 seats left)</a></li>
                            <li><a href="tours.php">March 23 - Vancouver Harbour (5 seats left)</a></li>
                            <li><a href="tours.php">August 16 - Bowen Island (2 seats left)</a></li>
                            <li><a href="tours.php">September 12 - Garibaldi Park (1 seat left)</a></li>
                        </ul>
                    </div>
                </div>

            </div><!--row ends-->
        </div><!--home content ends-->
    </div><!--page content ends-->
</div><!--page wrapper ends-->

<?php
include '_footer.php';
