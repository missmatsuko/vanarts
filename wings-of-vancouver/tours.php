<?php include '_header.php'; ?>

<div class="page-wrapper row">
    <div class="page-hero row">
        <div class="small-12 columns">
            <img src="img/content/hero/tours.jpg" alt="Aerial photo of the Rockies">
        </div>

        <div class="hero-content">
            <div class="small-8 columns">
                <h2 class="hero-text">Tours</h2>
            </div>
            <div class="small-4 columns hero-form-container">
                <h3 class="hero-form-title">Book a Tour</h3>
                    <form>
                        <div>
                            <label>Number of Guests</label>
                            <input type="number" min="1" max="12" required>
                        </div>
                        <div>
                            <label>Preferred Date</label>
                            <input type="date" required>
                        </div>
                        <div>
                            <label>Tour Destination</label>
                            <select>
                                <option>Bowen Island</option>
                                <option>Garibaldi Park</option>
                                <option selected>Rocky Mountains</option>
                                <option>Vancouver Harbour</option>
                                <option>Whistler</option>
                            </select>
                        </div>
                        <div>
                            <input class="button" type="submit" value="Book My Tour">
                        </div>
                    </form><!--form ends-->
            </div><!--hero form container ends-->
        </div><!--hero content ends-->
    </div><!--hero ends-->

    <div class="page-content">
        <div class="page-tours">
            <div class="tours-item row collapse">
                <div class="small-4 columns tours-image">
                    <img src="img/content/tours/bowen-island.jpg" alt="a photo of Bowen Island">
                </div><!--tour photo ends-->
                <div class="small-8 columns">
                    <div class="tours-item-desc">
                        <h4>Bowen Island</h4>
                        <p>Description of this tour and the location etc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam congue convallis tortor, quis consequat eros venenatis sit amet. Vivamus dictum sapien quis nisl consequat, a mattis tortor tempus.</p>
                        <a class="button" href="#">Book Now</a>
                    </div><!--description ends-->
                </div>
            </div><!--tours item ends-->
            <div class="tours-item row collapse">
                <div class="small-4 columns tours-image">
                    <img src="img/content/tours/garibaldi-park.jpg" alt="a photo of Garibaldi Park">
                </div><!--tour photo ends-->
                <div class="small-8 columns">
                    <div class="tours-item-desc">
                        <h4>Garibaldi Park</h4>
                        <p>Description of this tour and the location etc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam congue convallis tortor, quis consequat eros venenatis sit amet. Vivamus dictum sapien quis nisl consequat, a mattis tortor tempus.</p>
                        <a class="button" href="#">Book Now</a>
                    </div><!--description ends-->
                </div>
            </div><!--tours item ends-->
            <div class="tours-item row collapse">
                <div class="small-4 columns tours-image">
                    <img src="img/content/tours/rocky-mountains.jpg" alt="a photo of Bowen Island">
                </div><!--tour photo ends-->
                <div class="small-8 columns">
                    <div class="tours-item-desc">
                        <h4>Rocky Mountains</h4>
                        <p>Description of this tour and the location etc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam congue convallis tortor, quis consequat eros venenatis sit amet. Vivamus dictum sapien quis nisl consequat, a mattis tortor tempus.</p>
                        <a class="button" href="#">Book Now</a>
                    </div><!--description ends-->
                </div>
            </div><!--tours item ends-->
            <div class="tours-item row collapse">
                <div class="small-4 columns tours-image">
                    <img src="img/content/tours/vancouver-harbour.jpg" alt="a photo of Bowen Island">
                </div><!--tour photo ends-->
                <div class="small-8 columns">
                    <div class="tours-item-desc">
                        <h4>Vancouver Harbour</h4>
                        <p>Description of this tour and the location etc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam congue convallis tortor, quis consequat eros venenatis sit amet. Vivamus dictum sapien quis nisl consequat, a mattis tortor tempus.</p>
                        <a class="button" href="#">Book Now</a>
                    </div><!--description ends-->
                </div>
            </div><!--tours item ends-->
            <div class="tours-item row collapse">
                <div class="small-4 columns tours-image">
                    <img src="img/content/tours/whistler.jpg" alt="a photo of Bowen Island">
                </div><!--tour photo ends-->
                <div class="small-8 columns">
                    <div class="tours-item-desc">
                        <h4>Whistler</h4>
                        <p>Description of this tour and the location etc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam congue convallis tortor, quis consequat eros venenatis sit amet. Vivamus dictum sapien quis nisl consequat, a mattis tortor tempus.</p>
                        <a class="button" href="#">Book Now</a>
                    </div><!--description ends-->
                </div>
            </div><!--tours item ends-->
        </div><!--tours ends-->
    </div><!--content ends-->
</div><!--page wrapper ends-->

<?php
include '_footer.php';
