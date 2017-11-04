<?php 
	$thisPage = "shop";
	include("partials/header.php");
?>

	<div class="row column page-title">
		<h2>Madagascar Beans + Kelowna Vodka</h2>
		<h3>Vanilla Extract | <a href="#reviews">Reviews (50)</a></h3>
	</div>

	<div class="row item mobile-last-item">
		<div class="small-12 medium-6 large-4 columns">
			<a href="img/vanilla-bottle.jpg">
				<img src="img/vanilla-bottle.jpg" alt="A bottle of Madagascar Beans + Kelowna Vodka">
			</a>
		</div>
		<div class="small-12 medium-6 large-4 columns item-desc">
			<h4>Description</h4>
			<p>100% pure vanilla extract made from organic, fair-trade Madagascar vanilla beans and locally-distilled Kelowna vodka...<a href="#">read more</a></p>

			<h4>$20.00</h4>
			<a href="cart.php?addItem=0" class="button">Add to Cart</a><br>
			<a href="#" class="small-link">Shipping &amp; Returns</a>
		</div>
		<div class="small-12 columns">
			<h4 id="reviews">Reviews</h4>
			<div class="review-wrapper">
				<p class="date">July 30, 2016</p>
				<p>"Absolutely the best Vanilla Extract!"</p>
				<p class="review-author">Stacy Q.</p>
			</div>
			<div class="review-wrapper">
				<p class="date">July 30, 2016</p>
				<p>"Absolutely the best Vanilla Extract!"</p>
				<p class="review-author">Stacy Q.</p>
			</div>
			<div class="review-wrapper">
				<p class="date">July 30, 2016</p>
				<p>"Absolutely the best Vanilla Extract!"</p>
				<p class="review-author">Stacy Q.</p>
			</div>
			<div class="review-wrapper">
				<p class="date">July 30, 2016</p>
				<p>"Absolutely the best Vanilla Extract!"</p>
				<p class="review-author">Stacy Q.</p>
			</div>
		</div>

	</div>
	
<?php include("partials/footer.php");
