<?php 
	$thisPage = "shop";
	include("partials/header.php");
?>

	<div class="row column page-title">
		<h2>Checkout</h2>
	</div>

	<div class="row checkout mobile-last-item">
		<div class="small-12 medium-6 medium-push-6 large-push-9 large-3 columns">
			<h4>Shipping Information</h4>
			<p>Add your shipping information.</p>
			<p>Step 1/3</p>
			<a class="button" href="pay.php">Add Shipping Information</a><br>
			<a href="shop.php" class="small-link">Keep Shopping</a>
		</div>
		<div class="small-12 medium-6 medium-pull-6 large-pull-3 large-9 columns">
			<form>
				<h4>Shipping Address</h4>
				<label>Shipping Address<input type="text" placeholder="Address Line 1">
				<input type="text" placeholder="Address Line 2"></label>
				<label>City/Town
				<input type="text" placeholder="City/Town"></label>
				<label>Province/Territory
					<select>
						<option>Province/Territory</option>
						<option>Alberta</option>
						<option>British Columbia</option>
						<option>Manitoba</option>
						<option>New Brunswick</option>
						<option>Newfoundland and Labrador</option>
						<option>Northwest Territories</option>
						<option>Nova Scotia</option>
						<option>Nunavut</option>
						<option>Ontario</option>
						<option>Prince Edward Island</option>
						<option>Quebec</option>
						<option>Saskatchewan</option>
						<option>Yukon</option>
					</select>
				</label>
				<label>Postal Code<input type="text" placeholder="Postal Code"></label>
			<a class="button" href="pay.php">Add Shipping Information</a><br>
			<a href="shop.html" class="small-link">Keep Shopping</a>
		</div>
	</div>
	
<?php include("partials/footer.php");
