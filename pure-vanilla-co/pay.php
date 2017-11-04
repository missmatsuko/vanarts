<?php 
	$thisPage = "shop";
	include("partials/header.php");
?>

	<div class="row column page-title">
		<h2>Checkout</h2>
	</div>

	<div class="row pay mobile-last-item">
		<div class="small-12 medium-6 medium-push-6 large-push-9 large-3 columns">
			<h4>Payment Information</h4>
			<p>Add your payment information. You will be able to confirm your order before payment is processed.</p>
			<p>Step 2/3</p>
			<a class="button" href="review.php">Add Payment Information</a><br>
			<a href="shop.php" class="small-link">Keep Shopping</a>
		</div>
		<div class="small-12 medium-6 medium-pull-6 large-pull-3 large-9 columns">
			<form>
				<h4>Billing Address</h4>
				<label><input type="checkbox"> Same as Shipping Address</label>
				<label>Address<input type="text" placeholder="Address Line 1">
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

				<h4>Payment Information</h4>
				<label>Payment Method</label>
				<label class="payment-method-icon"><img src="img/cc-icons/visa.png" alt="Visa"><input type="radio" name="paymentMethod"></label>
				<label class="payment-method-icon"><img src="img/cc-icons/mastercard.png" alt="MasterCard"><input type="radio" name="paymentMethod"></label>
				<label class="payment-method-icon"><img src="img/cc-icons/american-express.png" alt="American Express"><input type="radio" name="paymentMethod"></label>

				<label>Card Number
				<input type="number"></label>
				<label>Security Code
				<input type="number"></label>
				<label>Card Expiry
				<input type="date"></label>
			</form>
			<a class="button" href="review.php">Add Payment Information</a><br>
			<a href="shop.php" class="small-link">Keep Shopping</a>
		</div>
	</div>
	
<?php include("partials/footer.php");
