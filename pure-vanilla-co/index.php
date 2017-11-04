<?php 
	$thisPage = "home";
	include("partials/header.php");
?>

	<div class="row hero">
		<div class="small-12 medium-offset-1 medium-6 columns">
			<h1>100% Pure Vanilla&nbsp;Extract</h1>
			<ul>
				<li>Fair-Trade Vanilla Beans</li>
				<li>Locally-Distilled Spirits</li>
				<li>Small-Batch Production</li>
			</ul>
			<a href="shop.php" class="button">Shop Now</a>
		</div>
	</div><!-- hero ends-->

	<div class="row products mobile-last-item">
		<h3 class="text-center">Unable to Load Products</h3>
	</div><!--products end-->

	<div class="row reviews text-center expanded hide-for-small-only">
		<h2>Reviews</h2>
		<p>Some amazing quote from an amazing customer who loves our products.</p>
		<p>-Mary J.</p>
	</div><!--reviews end-->

<?php include("partials/footer.php");
